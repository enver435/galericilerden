<?php

	# @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-14 23:18:21
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2018-01-18 16:04:54
	
	if(session('login'))
	{
		$userInfo     = $User->userInfo(session('userId'));
		$getUserStore = $Store->getUserStore();

		$limitType       = ($userInfo['user_status'] == 1) ? 'individual_ad_limit' : 'corporate_ad_limit';
		$dopingPriceType = ($userInfo['user_status'] == 1) ? 'doping_individual_price' : 'doping_corporate_price';

		if(!issetPost('getStep'))
		{
			setSession('step', 1); // set session step one
			removeSession('categories');
		}

		if(issetPost('getStep'))
		{
			$step = post('step');

			if(session('step') == 1)
			{
				foreach ($_POST as $key => $value) 
				{
					if($value != '')
					{
						if($key != 'step')
						{
							$categories[] = $value;
						}
						else
						{
							setSession($key, $value);
						}
					}
				}

				setSession('categories', $categories);
				removeSession('step'); // remove step
			}
			
			if($step == 2)
			{
				$categoryModulItems = $Modul->categoryModulItems(session('categories'), true, null);
				$categoryFeatures   = $Modul->categoryFeatures($categoryModulItems['modulId'], true, null);

				$returnArray['categoryModulItems'] = $categoryModulItems['template'];
				$returnArray['categoryFeatures']   = $categoryFeatures;
				$returnArray['cities']             = $Other->cities();
				$returnArray['dopingList']         = $Doping->dopingList();
			}

		}

		$adAdd              = false;
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
								$adAdd = true;
							}
							else
							{
								$endLimitStore = true;
							}
						}
						else
						{
							$adAdd = true;
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
					$adAdd = true;
				}
			}
		}
		else
		{
			if($Ads->checkLimit() < $Other->getSetting($limitType) || $userInfo['adAddShow'] == 1)
			{
				$adAdd = true;
			}
		}

		if(issetPost('step'))
		{
			if(post('step') == 'completed')
			{
				if(post('postToken') == session('postToken'))
				{
					if($adAdd === true)
					{
						$category1      = post('category_1');
						$category2      = post('category_2');
						$category3      = post('category_3');
						$category4      = post('category_4');
						$category5      = post('category_5');
						$category6      = post('category_6');
						$category7      = post('category_7');
						$category8      = post('category_8');
						$category9      = post('category_9');
						$category10     = post('category_10');
						$dopings        = post('dopings');
						$dopingsPrice   = post('dopingsPrice');
						$phone_status   = post('phone_status');
						$ad_name        = post('ad_name');
						$ad_price       = post('ad_price');
						$price_type     = post('price_type');
						$ad_text        = post('ad_text', false);
						$city           = post('city');
						$county         = post('county');
						$area           = post('area');
						$neighborhood   = post('neighborhood');
						$zoom           = post('zoom');
						$lat            = post('lat');
						$lng            = post('lng');
						$markerlat      = post('markerlat');
						$markerlng      = post('markerlng');
						$ad_title_image = post('ad-title-image');
						$ad_images      = $_POST['ad-images'];

						if($markerlat == '' || $markerlng == '' || $lat == '' || $lng == '')
						{
							$messageType = 'error';
							$message     = 'Harita üzerinde konum seçmelisiniz';
						}
						else
						{
							if($ad_name != '' AND $ad_price != '' AND $ad_price > 0 AND $city > 0 AND $county > 0 AND $area > 0 AND $neighborhood > 0 AND $ad_title_image != '' AND count($ad_images) > 0)
							{
								$i            = 0;
								$dopings      = explode('|', $dopings);
								$dopingsPrice = explode('|', $dopingsPrice);

								$doping_home        = (array_search('1', $dopings) !== false ? 1 : 0);
								$doping_acil        = (array_search('2', $dopings) !== false ? 1 : 0);
								$doping_up          = (array_search('3', $dopings) !== false ? 1 : 0);
								$doping_differently = (array_search('4', $dopings) !== false ? 1 : 0);
								$doping_sahibinden  = (array_search('-1', $dopings) !== false ? 1 : 0);
								$doping_yenigibi    = (array_search('-2', $dopings) !== false ? 1 : 0);
								$doping_ekspertizli = (array_search('-3', $dopings) !== false ? 1 : 0);

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

								$message_status = (issetPost('message_status') ? 0 : 1);

								$addAds = $Ads->add(
									array(
										'user_id'           	=> session('userId'),
										'title'             	=> $ad_name,
										'title_image'       	=> $ad_title_image,
										'text'              	=> $ad_text,
										'price'             	=> $ad_price,
										'price_type'            => $price_type,
										'city'              	=> $city,
										'county'            	=> $county,
										'area'              	=> $area,
										'neighborhood'      	=> $neighborhood,
										'category1'         	=> $category1,
										'category2'         	=> $category2,
										'category3'         	=> $category3,
										'category4'         	=> $category4,
										'category5'         	=> $category5,
										'category6'         	=> $category6,
										'category7'         	=> $category7,
										'category8'         	=> $category8,
										'category9'         	=> $category9,
										'category10'        	=> $category10,
										'lat'               	=> $lat,
										'lng'               	=> $lng,
										'marker_lat'        	=> $markerlat,
										'marker_lng'        	=> $markerlng,
										'zoom'              	=> $zoom,
										'status'            	=> 2, // onay bekleyen
										'create_time'           => time(),
										'update_time'           => time(),
										'doping_home'        	=> $doping_home,
										'doping_acil'        	=> $doping_acil,
										'doping_up'          	=> $doping_up,
										'doping_differently' 	=> $doping_differently,
										'doping_sahibinden'  	=> $doping_sahibinden,
										'doping_yenigibi'    	=> $doping_yenigibi,
										'doping_ekspertizli' 	=> $doping_ekspertizli,
										'doping_fiyatidusenler' => 0,
										'phone_status'          => $phone_status,
										'message_status'        => $message_status,
										'update_count'          => 0,
										'seflink'               => permalink($ad_name)
									)
								);

								if($addAds != '')
								{
									if(!empty($_POST['ad-images']))
									{
										foreach ($_POST['ad-images'] as $image) 
										{
											if($image != '')
											{
												$Ads->addAdsImages(
													array(
														'ads_id' => $addAds,
														'image'  => $image
													)
												);
											}
										}
									}

									if(!empty($_POST['features']))
									{
										foreach ($_POST['features'] as $value) 
										{
											if($value != '')
											{
												$featureListInfo = $Modul->featureListInfo($value);

												if($featureListInfo !== false)
												{
													$Ads->addAdsFeatures(
														array(
															'adsId'     => $addAds,
															'featureId' => $value,
															'groupId'   => $featureListInfo['groupId']
														)
													);
												}
											}
										}
									}

									$year = 0;
									$km   = 0;
									
									if(!empty($_POST['item']))
									{
										$addValue = false;

										foreach($_POST['item'] as $itemID => $itemValue)
										{
											$itemInfo = $Modul->itemInfo($itemID);

											if($itemInfo['classx'] == 1 || $itemInfo['classx'] == 3) // input and text
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
														$addValue     = true;
													}
												}
												elseif($itemInfo['classx'] == 3) // input text
												{
													if($itemValue[0] != '')
													{
														$addValue = true;
													}
												}

												if($addValue === true)
												{
													if($itemInfo['classx'] == 1) // input number
													{
														$addArray = array(
															'itemId'    => $itemID,
															'adsId'     => $addAds,
															'itemValue' => $itemValue[0]
														);
													}
													elseif($itemInfo['classx'] == 3) // input text
													{
														$addArray = array(
															'itemId'        => $itemID,
															'adsId'         => $addAds,
															'itemValueText' => $itemValue[0]
														);
													}

													$Ads->addAdsItem($addArray);
												}
											}
											elseif($itemInfo['classx'] == 2) // select
											{
												if($itemValue[0] > 0)
												{
													$Ads->addAdsItem(
														array(
															'itemId'     => $itemID,
															'adsId'      => $addAds,
															'itemSelect' => $itemValue[0]
														)
													);
												}
											}
										}

										$Ads->updateAd($addAds, array('year' => $year, 'km' => $km));
									}

									$messageType = 'success';
									$message     = 'Tebrikler . #' . $addAds . ' ilanınız başarıyla kaydedilmiştir. İlanınız editörlerimiz tarafından onaylandıkdan sonra yayınlanacaktır. Sizi E-Posta ile bilgilendireceğiz.';
								}
								else
								{
									// iyzico terefinden iade edilecek burda. eger error varsa (doping ve eger bireysel istifadeci odenis edibdise limitle bagli)

									$messageType = 'error';
									$message     = 'Bir hata oluştu. Lütfen daha sonra tekrar deneyiniz';
								}
							}
							else
							{
								redirect('ad-add');
							}
						}
					}
				}
				else
				{
					redirect('ad-add');
				}

				$returnArray['messageType'] = $messageType;
				$returnArray['message']     = $message;
				$returnArray['limitType']   = $limitType;
			}
		}

		$returnArray['categories']         = $Category->categoryFirst(); 
		$returnArray['adsLimit']           = $Ads->checkLimit();
		$returnArray['userTypeAdsLimit']   = $Other->getSetting($limitType);
		$returnArray['limitType']		   = $limitType;
		$returnArray['userStore']          = $Store->getUserStore();
		$returnArray['adAdd']              = $adAdd;
		$returnArray['endTimeStore']       = $endTimeStore;
		$returnArray['endTimeStoreAdmin']  = $endTimeStoreAdmin;
		$returnArray['endStoreLimitAdmin'] = $endStoreLimitAdmin;
		$returnArray['endLimitStore']      = $endLimitStore;
		$returnArray['createNewStore']     = $createNewStore;
		$returnArray['storeCloseAdmin']    = $storeCloseAdmin;
		$returnArray['userInfo']           = $userInfo;
		$returnArray['siteConfig']         = $config;
		$returnArray['month']              = date('d.m.Y', strtotime('+30 day'));

		setSession('postToken', randomString('alnum', 35)); // create post token

		$smarty->assign('return', $returnArray);
		$smarty->display('ad-add.tpl');

		// eger istifadecinin limiti dolubsa ve odenis edib elan veribse axirda istifadecini heminki statusa qaytar
		if(@$messageType == 'success')
		{
			$updateUser = $User->update(session('userId'), array('adAddShow' => 0));
		}
	}
	else
	{
		redirect('login');
	}

?>