<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-09-03 11:22:41
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2018-01-19 11:54:52
	
	if(session('login'))
	{
		$updateAd        = true;
		$userInfo        = $User->userInfo(session('userId'));
		$getUserStore    = $Store->getUserStore();
		$limitType       = ($userInfo['user_status'] == 1) ? 'individual_ad_limit' : 'corporate_ad_limit';
		$dopingPriceType = ($userInfo['user_status'] == 1) ? 'doping_individual_price' : 'doping_corporate_price';
		$actualLink      = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

		$type      = $_url[1];
		$operation = $_url[1];
		
		if($operation == 'ad-edit' || $operation == 'add-doping' || $operation == 'public-end' || $operation == 'public-start' || $operation == 'update-public' || $operation == 'get-ad' || $operation == 'delete-ad')
		{
			$adId       = $_url[2];
			$page_param = 2;

			$updateAd           = false;
			$endTimeStore       = false;
			$endLimitStore      = false;
			$endTimeStoreAdmin  = false;
			$endStoreLimitAdmin = false;
			$createNewStore     = false;
			$storeCloseAdmin    = false;

			if($userInfo['user_status'] == 2)
			{
				if($getUserStore !== false)
				{
					$storeInfo = $Store->storeInfo($getUserStore['store_type']);

					if($getUserStore['status'] == 1) // admin yoxlanisinda deyilse ve admin legv etmeyibse
					{
						if(time() > $getUserStore['end_time']) // magazanin vaxti bitib
						{
							$endTimeStore = true;
						}
						else
						{
							if($storeInfo['ad_limit'] > 0)
							{
								//echo $storeInfo['ad_limit'] - $Ads->checkLimit();
								if($Ads->checkLimit() < $storeInfo['ad_limit'])
								{
									$updateAd = true;
								}
								else
								{
									$endLimitStore = true;
								}
							}
							else
							{
								$updateAd = true;
							}
						}
					}
					elseif($getUserStore['status'] == 2) // admin legv edibse
					{
						$storeCloseAdmin = true;
					}
					elseif($getUserStore['status'] == 0) // admin yoxlanisindadisa
					{
						if($getUserStore['end_time'] != 0)
						{
							if(time() > $getUserStore['end_time']) // magazanin vaxti bitib ve admin yoxlanisindadi
							{
								$endTimeStoreAdmin = true;
							}
							elseif($Ads->checkLimit() >= $storeInfo['ad_limit']) // magazanin limiti bitib ve admin yoxlanisindadi
							{
								$endStoreLimitAdmin = true;
							}
						}
						else // yeni magaza yaradilib ve admin yoxlanisindadi
						{
							$createNewStore = true;
						}
					}
				}
				else
				{
					if($Ads->checkLimit() < $Other->getSetting($limitType))
					{
						$updateAd = true;
					}
				}
			}
			else
			{
				if($Ads->checkLimit() < $Other->getSetting($limitType) || $userInfo['adAddShow'] == 1)
				{
					$updateAd = true;
				}
			}

			
			if($operation == 'ad-edit')
			{
				if($userInfo['user_status'] == 1)
				{
					$updateAd = true;
				}
				elseif($userInfo['user_status'] == 2)
				{
					$endLimitStore      = false;
					$endLimitStoreAdmin = false;
					$updateAd           = true;
				}

				if($updateAd === true)
				{
					if($adId != '')
					{
						$adInfo = $Ads->adInfo($adId);

						$edit = false;

						if($adInfo !== false AND $adInfo['status'] == 3 AND $adInfo['public_start_date'] == 0 AND $adInfo['public_end_date'] == 0) // elan yeni yaradilibsa ve admin yoxlanisindan onaylanmayibsa
						{
							$edit = true;
						}
						elseif($adInfo !== false AND $adInfo['status'] != 2 AND $adInfo['public_end_date'] > time()) // elan aktivdirse ve vaxti bitmeyibse
						{
							$edit = true;
						}

						if($edit === true)
						{
							if(issetPost('ad_update'))
							{
								$phone_status     = post('phone_status');
								$ad_name          = post('ad_name');
								$ad_price         = post('ad_price');
								$price_type       = post('price_type');
								$ad_text          = post('ad_text', false);
								$city             = post('city');
								$county           = post('county');
								$area             = post('area');
								$neighborhood     = post('neighborhood');
								$zoom             = post('zoom');
								$lat              = post('lat');
								$lng              = post('lng');
								$markerlat        = post('markerlat');
								$markerlng        = post('markerlng');
								$ad_title_image   = post('ad-title-image');
								$ad_images        = $_POST['ad-images'];
								$delete_ad_images = $_POST['delete-ad-images'];

								if($markerlat == '' || $markerlng == '' || $lat == '' || $lng == '')
								{
									$messageType = 'error';
									$message     = 'Harita üzerinde konum seçmelisiniz';
								}
								else
								{
									if($ad_name != '' AND $ad_price != '' AND $ad_price > 0 AND $city > 0 AND $county > 0 AND $area > 0 AND $neighborhood > 0 AND $ad_title_image != '' AND count($ad_images) > 0)
									{
										$message_status = (issetPost('message_status') ? 0 : 1);

										$updateAd = $Ads->updateAd($adId,
											array(
												'title'          => $ad_name,
												'title_image'    => $ad_title_image,
												'text'           => $ad_text,
												'price'          => $ad_price,
												'price_type'     => $price_type,
												'city'           => $city,
												'county'         => $county,
												'area'           => $area,
												'neighborhood'   => $neighborhood,
												'lat'            => $lat,
												'lng'            => $lng,
												'marker_lat'     => $markerlat,
												'marker_lng'     => $markerlng,
												'zoom'           => $zoom,
												'status'         => 2, // onay bekleyen
												'phone_status'   => $phone_status,
												'message_status' => $message_status,
												'seflink'        => permalink($ad_name),
												'update_time'    => time()
											)
										);

										if($updateAd === true)
										{
											$year = 0;
											$km   = 0;

											/* IMAGES */
											foreach ($ad_images as $image) 
											{
												if($Ads->adImageCheck($adId, $image) === false)
												{
													$Ads->addAdsImages(
														array(
															'ads_id' => $adId,
															'image'  => $image
														)
													);
												}
											}

											if(!empty($delete_ad_images))
											{
												foreach ($delete_ad_images as $image) 
												{
													$Ads->deleteAdImage($adId, $image);
												}
											}

											/* FEATURES */
											if(!empty($_POST['features']))
											{
												foreach ($_POST['features'] as $value) 
												{
													if($value != '')
													{
														$featureListInfo = $Modul->featureListInfo($value);

														if($featureListInfo !== false)
														{
															if($Ads->adsFeatureCheck($adId, $value) === false)
															{
																$Ads->addAdsFeatures(
																	array(
																		'adsId'     => $adId,
																		'featureId' => $value,
																		'groupId'   => $featureListInfo['groupId']
																	)
																);
															}
														}
													}
												}
											}
											else
											{
												$Ads->deleteAdAllFeatures($adId); // delete all features
											}

											if(!empty($_POST['deleted-features']))
											{
												foreach ($_POST['deleted-features'] as $value) 
												{
													if($value != '')
													{
														$Ads->deleteAdFeature($adId, $value);
													}
												}
											}
											
											/* ITEMS */
											if(!empty($_POST['item']))
											{
												$updateValue = false;
												$deleteValue = false;

												foreach($_POST['item'] as $itemID => $itemValue)
												{
													$itemInfo = $Modul->itemInfo($itemID);

													if($itemInfo['classx'] == 1 || $itemInfo['classx'] == 3) // number and text
													{
														if($itemInfo['classx'] == 1) // input number
														{
															if($itemValue[0] > 0)
															{
																if($itemInfo['name'] == 'Model Yılı' || $itemInfo['name'] == 'model yılı')
																{
																	$year = $itemValue[0];
																}
																elseif($itemInfo['name'] == 'Kilometre' || $itemInfo['name'] == 'kilometre')
																{
																	$km = $itemValue[0];
																}

																$itemValue[0] = floatval($itemValue[0]);
																$updateValue  = true;
															}
															else
															{
																$deleteValue = true;

																$year = 0;
																$km   = 0;
															}
														}
														elseif($itemInfo['classx'] == 3) // input text
														{
															if($itemValue[0] != '')
															{
																$updateValue = true;
															}
															else
															{
																$deleteValue = true;
															}
														}

														if($updateValue === true AND $deleteValue === false)
														{
															if($Ads->adItemCheck($adId, $itemID) === false)
															{
																if($itemInfo['classx'] == 1) // input number
																{
																	$addArray = array(
																		'itemId'    => $itemID,
																		'adsId'     => $adId,
																		'itemValue' => $itemValue[0]
																	);
																}
																elseif($itemInfo['classx'] == 3) // input text
																{
																	$addArray = array(
																		'itemId'        => $itemID,
																		'adsId'         => $adId,
																		'itemValueText' => $itemValue[0]
																	);
																}

																$Ads->addAdsItem($addArray);
															}
															else
															{
																if($itemInfo['classx'] == 1) // input number
																{
																	$updateArray = array(
																		'itemValue' => $itemValue[0]
																	);
																}
																elseif($itemInfo['classx'] == 3) // input text
																{
																	$updateArray = array(
																		'itemValueText' => $itemValue[0]
																	);
																}

																$Ads->updateAdItem($adId, $itemID, $updateArray);
															}
														}
														elseif($updateValue === false AND $deleteValue === true)
														{
															$Ads->deleteAdItem($adId, $itemID);
														}
													}
													elseif($itemInfo['classx'] == 2) // select
													{
														if($itemValue[0] > 0)
														{
															if($Ads->adItemCheck($adId, $itemID) === false)
															{
																$Ads->addAdsItem(
																	array(
																		'itemId'     => $itemID,
																		'adsId'      => $adId,
																		'itemSelect' => $itemValue[0]
																	)
																);
															}
															else
															{
																$Ads->updateAdItem($adId, $itemID, 
																	array(
																		'itemSelect' => $itemValue[0]
																	)
																);
															}
														}
														else
														{
															$Ads->deleteAdItem($adId, $itemID);
														}
													}
												}

												$Ads->updateAd($adId, array('year' => $year, 'km' => $km));
											}
											else
											{
												$Ads->deleteAdAllItem($adId); // delete all item
											}

											if($adInfo['price'] > $ad_price AND $adInfo['price_type'] == $price_type) // fiyati dusenler
											{
												$Ads->updateAd($adId, array('doping_fiyatidusenler' => 1));
											}

											$messageType = 'success';
											$message     = 'İlanınız başarıyla güncellendi. Onaylandıktan sonra yayınlanacaktır';
										}
										else
										{
											$messageType = 'error';
											$message     = 'Bir hata oluştu. Lütfen daha sonra tekrar deneyiniz';
										}
									}
									else
									{
										$messageType = 'error';
										$message     = 'Lütfen zorunlu alanları boş bırakmayınız';
									}
								}

								$returnArray['messageType'] = $messageType;
								$returnArray['message']     = $message;
							}

							$getLastCategory  = $Ads->adGetLastCategory($adId);
							$categoryInfo     = $Category->categoryInfo($getLastCategory);
							$categoryItems    = $Modul->categoryModulItems($categoryInfo['Id'], null, $adId); // null olduguna baxma iceride true ile deyisilir
							$categoryFeatures = $Modul->categoryFeatures($categoryItems['modulId'], true, $adId);

							$returnArray['adInfo']           = $adInfo;
							$returnArray['categoryFeatures'] = $categoryFeatures;
							$returnArray['categoryItems']    = $categoryItems['template'];
							$returnArray['adImages']         = $Ads->adImages($adId);
							$returnArray['cities']           = $Other->cities();
						}
						else
						{
							redirect('my-ads/active');
						}
					}
				}
			}
			elseif($operation == 'public-end')
			{
				$page_param = 2;

				$adInfo = $Ads->adInfo($adId);

				if($adInfo !== false)
				{
					if($userInfo['user_status'] == 1)
					{
						$updateAd = true;
					}
					elseif($userInfo['user_status'] == 2)
					{
						$endLimitStore      = false;
						$endLimitStoreAdmin = false;
						$updateAd           = true;
					}

					if($updateAd === true)
					{
						$updateAd = $Ads->updateAd($adId, 
							array(
								'status' => 4
							)
						);

						redirect('my-ads/passive');
					}
				}
				else
				{
					redirect('my-ads/active');
				}
			}
			elseif($operation == 'public-start')
			{
				$page_param = 2;

				$adInfo = $Ads->adInfo($adId);

				if($adInfo !== false)
				{
					if($userInfo['user_status'] == 1)
					{
						$updateAd = true;
					}
					elseif($userInfo['user_status'] == 2)
					{
						$endLimitStore      = false;
						$endLimitStoreAdmin = false;
						$updateAd           = true;
					}

					if($updateAd === true)
					{
						$updateAd = $Ads->updateAd($adId, 
							array(
								'status' => 1
							)
						);

						redirect('my-ads/active');
					}
				}
				else
				{
					redirect('my-ads/active');
				}
			}
			elseif($operation == 'add-doping')
			{
				$page_param = 2;

				$adInfo = $Ads->adInfo($adId);

				if($adInfo !== false AND $adInfo['status'] == 1 AND $adInfo['public_end_date'] > time())
				{
					if($userInfo['user_status'] == 1)
					{
						$updateAd = true;
					}
					elseif($userInfo['user_status'] == 2)
					{
						$endLimitStore      = false;
						$endLimitStoreAdmin = false;
						$updateAd           = true;
					}

					if($updateAd === true)
					{
						if(issetPost('dopings') AND issetPost('dopingsPrice'))
						{
							$lock         = false;
							$dopings      = post('dopings');
							$dopingsPrice = post('dopingsPrice');

							if($dopings != '' AND $dopingsPrice != '')
							{
								if($config['iyzicoPayment'] === true)
								{
									if(session('dopingPaymentSuccess'))
									{
										$lock = false;
									}
									else
									{
										$lock = true;
									}
								}

								$dopingTotalPrice = 0;
								foreach ($dopings as $doping) 
								{
									if($doping == 1 || $doping == 2 || $doping == 3 || $doping == 4)
									{
										$dopingInfo = $Doping->dopingInfo($doping);

										$dopingTotalPrice += $dopingInfo[$dopingPriceType];
									}
								}

								if($dopingTotalPrice == 0)
								{
									$lock = false;
								}

								if($lock === false)
								{
									$i            = 0;
									$dopingsPrice = explode('|', $dopingsPrice);
									$dopings      = explode('|', $dopings);

									$doping_home        = (array_search('1', $dopings) !== false ? 1 : $adInfo['doping_home']);
									$doping_acil        = (array_search('2', $dopings) !== false ? 1 : $adInfo['doping_acil']);
									$doping_up          = (array_search('3', $dopings) !== false ? 1 : $adInfo['doping_up']);
									$doping_differently = (array_search('4', $dopings) !== false ? 1 : $adInfo['doping_differently']);
									$doping_sahibinden  = (array_search('-1', $dopings) !== false ? 1 : $adInfo['doping_sahibinden']);
									$doping_yenigibi    = (array_search('-2', $dopings) !== false ? 1 : $adInfo['doping_yenigibi']);
									$doping_ekspertizli = (array_search('-3', $dopings) !== false ? 1 : $adInfo['doping_ekspertizli']);

									foreach ($dopings as $doping) 
									{
										if($doping == 1 || $doping == 2 || $doping == 3 || $doping == 4)
										{
											$dopingInfo = $Doping->dopingInfo($doping);

											if($dopingInfo !== false)
											{
												if($dopingsPrice[$i] != $dopingInfo[$dopingPriceType])
												{
													if($doping == 1)
													{
														$doping_home = 0;
													}

													if($doping == 2)
													{
														$doping_acil = 0;
													}

													if($doping == 3)
													{
														$doping_up = 0;
													}

													if($doping == 4)
													{
														$doping_differently = 0;
													}
												}
											}
										}

										$i++;
									}

									$updateAd = $Ads->updateAd($adId,
										array(
											'doping_home'         => $doping_home,
											'doping_acil'         => $doping_acil,
											'doping_up'           => $doping_up,
											'doping_differently'  => $doping_differently,
											'doping_sahibinden'   => $doping_sahibinden,
											'doping_yenigibi'     => $doping_yenigibi,
											'doping_ekspertizli'  => $doping_ekspertizli
										)
									);

									if($updateAd === true)
									{
										removeSession('dopingPaymentSuccess'); // odemeni silirik

										$messageType = 'success';
										$message     = 'Doping başarıyla yüklendi';
									}
									else
									{
										// iyzico terefinden iade edilecek burda. eger error varsa

										$messageType = 'error';
										$message     = 'Bir hata oluştu. Lütfen daha sonra tekrar deneyiniz';
									}
								}
							}
							else
							{
								$messageType = 'error';
								$message     = 'Doping seçmediniz';
							}

							$returnArray['messageType'] = $messageType;
							$returnArray['message']     = $message;
 						}
					}
				}
			}
			elseif($operation == 'update-public')
			{
				$page_param = 2;

				$adInfo = $Ads->adInfo($adId);

				if($adInfo !== false AND time() > $adInfo['public_end_date'])
				{
					if($updateAd === true)
					{
						$updateAd = $Ads->updateAd($adId,
							array(
								'doping_home'           => 0,
								'doping_acil'           => 0,
								'doping_up'             => 0,
								'doping_differently'    => 0,
								'doping_sahibinden'     => 0,
								'doping_yenigibi'       => 0,
								'doping_ekspertizli'    => 0,
								'doping_fiyatidusenler' => 0,
								'public_start_date'     => 0,
								'public_end_date'       => 0,
								'update_time'           => time(),
								'status'                => 2 // onay bekleyen
							)
						);

						if($updateAd === true)
						{
							$User->update(session('userId'), array('adAddShow' => 0));

							redirect('my-ads/pending');
						}
						else
						{
							// iyzico terefinden iade edilecek burda. eger error varsa
						}
					}
				}
				else
				{
					redirect('my-ads/active');
				}
			}
			elseif($operation == 'get-ad')
			{
				$page_param = 2;

				$adInfo = $Ads->adInfo($adId);

				if($adInfo !== false)
				{
					if($adInfo['status'] == 1 AND $adInfo['public_end_date'] > time())
					{
						redirect('view/' . $adInfo['seflink'] . '-' . $adInfo['id']);
					}
					elseif($adInfo['status'] == 4 || $adInfo['status'] == 2)
					{
						redirect('view/' . $adInfo['seflink'] . '-' . $adInfo['id']);
					}
					else
					{
						redirect('my-ads/active');
					}
				}
				else
				{
					redirect('my-ads/active');
				}
			}
			elseif($operation == 'delete-ad')
			{
				$page_param = 2;

				$adInfo  = $Ads->adInfo($adId);
				$referer = explode('my-ads/', $_SERVER['HTTP_REFERER'])[1];

				if($referer == 'passive' || $referer == 'finished' || $referer == 'unconfirmed')
				{
					if($adInfo !== false AND $adInfo['user_id'] == session('userId'))
					{
						$Ads->deleteAdAllImage($adId);
						$Ads->deleteAdAllItem($adId);
						$Ads->deleteAdAllFeatures($adId);
						$Ads->deleteAdFavorites($adId);
						$Ads->deleteAdMessages($adId);

						$Ads->deleteAd($adId);
					}
				}
				
				redirect('my-ads/' . $referer);
			}
			
		}
		elseif($type == 'active' || $type == 'passive' || $type == 'finished' || $type == 'pending' || $type == 'unconfirmed')
		{
			if(!$type)
			{
				redirect();
			}
			else
			{
				$page_param = 1;
			}

			$page = 1;
			if(get('page') != '') 
			{
			    $page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);
			    if(false === $page) 
			    {
			        $page = 1;
			    }
			}

			$items_per_page = (get('pageSize') == 15 ? 15 : (get('pageSize') == 50 ? 50 : 15));
			$offset         = ($page - 1) * $items_per_page;
			$page_count     = 0;

			/* ADS ROWS */
			$ads      = $Ads->ads($type, $offset, $items_per_page);
			$adsCount = count($Ads->ads($type, null, null));

			if (0 !== $adsCount) 
			{  
			    $page_count = (int)ceil($adsCount / $items_per_page);
			   	if($page > $page_count) 
			   	{
			       $page = 1;
			   	}
			}

			$pagination = pagination($items_per_page, $page_count, $page, $actualLink);
		}
		else
		{
			redirect();
		}

		$returnArray['ads']                = $ads;
		$returnArray['pagination']         = $pagination;
		$returnArray['Favorites']          = $Favorites;
		$returnArray['Category']           = $Category;
		$returnArray['Ads']                = $Ads;
		$returnArray['adsLimit']           = $Ads->checkLimit();
		$returnArray['userTypeAdsLimit']   = $Other->getSetting($limitType);
		$returnArray['limitType']		   = $limitType;
		$returnArray['userStore']          = $getUserStore;
		$returnArray['updateAd']           = $updateAd;
		$returnArray['endTimeStore']       = $endTimeStore;
		$returnArray['endTimeStoreAdmin']  = $endTimeStoreAdmin;
		$returnArray['endStoreLimitAdmin'] = $endStoreLimitAdmin;
		$returnArray['endLimitStore']      = $endLimitStore;
		$returnArray['createNewStore']     = $createNewStore;
		$returnArray['storeCloseAdmin']    = $storeCloseAdmin;
		$returnArray['userInfo']           = $userInfo;
		$returnArray['siteConfig']         = $config;
		$returnArray['dopingList']         = $Doping->dopingList();

		$smarty->assign('return', $returnArray);
		$smarty->display('my-ads.tpl');
	}
	else
	{
		redirect('login');
	}

?>