<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-22 10:01:43
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2018-01-18 17:39:58
	
	if(session('adminLogin'))
	{
		$type        = $_url[2];
		$returnArray = array();

		if($type != '')
		{
			if($type != 'edit' AND $type != 'delete')
			{
				if($type == 'pending' || $type == 'approved' || $type == 'expired')
				{	
					$id = $_url[4];

					if($id == '')
					{
						$page_param = 1;

						$ads = $AdsAdmin->ads($type);

						if($ads !== false)
						{
							$returnArray['ads'] = $ads;
						}
					}
					else
					{
						if($type == 'pending' AND getUrl(3) == 'confirm')
						{
							$page_param = 3;

							$adInfo = $AdsAdmin->adInfo($id);

							if($adInfo !== false AND $adInfo['status'] == 2) // elan varsa ve statusu onay bekleyen dise
							{
								if($adInfo['public_start_date'] == 0 AND $adInfo['public_end_date'] == 0) // elan yeni yaradilibsa veya vaxti yenilenibse
								{
									$update = $AdsAdmin->update($id, 
										array(
											'status'            => 1,
											'public_start_date' => time(),
											'public_end_date'   => strtotime('+30 day'),
											'update_count'      => $adInfo['update_count'] + 1,
											'sendMail'          => 0
										)
									);

									// add notification
									if($update === true)
									{
										$getUserStore = $Store->getUserStore($adInfo['user_id']);

										if($getUserStore !== false) // bu istifadecinin magazasi varsa
										{
											$storeTypeInfo = $StoreAdmin->storeTypeInfo($getUserStore['store_type']);

											if($storeTypeInfo['ad_limit'] > 0)
											{
												$userAdsLimit = $AdsAdmin->checkLimit($adInfo['user_id']);

												if($userAdsLimit >= $storeTypeInfo['ad_limit'])
												{
													$addNotification = $NotificationsAdmin->add(
														array(
															'storeId'     => $getUserStore['id'],
															'userId'      => $getUserStore['user_id'],
															'type'        => 7, // magaza illik limiti bitdi
															'create_time' => time()
														)
													);
												}
											}
										}
									}
								}
								else // elan duzenlenibse
								{
									$update = $AdsAdmin->update($id, 
										array(
											'status' => 1
										)
									);
								}

								if($update === true)
								{
									$userInfo = $User->userInfo($adInfo['user_id']);

									ob_start();
									require_once ROOT . '/app/email/ad-confirm.php';
									$content = ob_get_clean();

									$sendEmail = sendEmail('no-reply', $userInfo['email'], 'Galericilerden.com - İlanınız Onaylandı', $content);

									// add notification
									$addNotification = $NotificationsAdmin->add(
										array(
											'adId'        => $id,
											'userId'      => $adInfo['user_id'],
											'type'        => 1, // elan qebul edildi
											'create_time' => time()
										)
									);

									if($sendEmail === true AND $addNotification === true)
									{
										$referer = explode('ads/', $_SERVER['HTTP_REFERER'])[1];
										redirect(SITE_ADMIN . '/ads/' . $referer);
									}
								}
							}
							else
							{
								$referer = explode('ads/', $_SERVER['HTTP_REFERER'])[1];
								redirect(SITE_ADMIN . '/ads/' . $referer);
							}
						}
						elseif($type == 'pending' AND getUrl(3) == 'not-confirm')
						{
							$page_param = 3;

							$adInfo = $AdsAdmin->adInfo($id);

							if($adInfo !== false AND $adInfo['status'] == 2) // elan varsa ve statusu onay bekleyen dise
							{
								if(issetPost('save'))
								{
									$update = $AdsAdmin->update($id, 
										array(
											'status' => 3
										)
									);

									if($update === true)
									{
										$userInfo = $User->userInfo($adInfo['user_id']);

										ob_start();
										require_once ROOT . '/app/email/ad-not-confirm.php';
										$content = ob_get_clean();

										$sendEmail = sendEmail('no-reply', $userInfo['email'], 'Galericilerden.com - İlanınız Onaylanamadı', $content);

										// add notification
										$addNotification = $NotificationsAdmin->add(
											array(
												'adId'        => $id,
												'userId'      => $adInfo['user_id'],
												'adType'      => post('sebep'),
												'type'        => 2, // elan qebul edilmedi
												'create_time' => time()
											)
										);

										if($sendEmail === true AND $addNotification === true)
										{
											$referer = explode('ads/', $_SERVER['HTTP_REFERER'])[1];
											redirect(SITE_ADMIN . '/ads/' . $referer);
										}
									}
								}
							}
							else
							{
								$referer = explode('ads/', $_SERVER['HTTP_REFERER'])[1];
								redirect(SITE_ADMIN . '/ads/' . $referer);
							}
						}
						elseif($type == 'approved' AND getUrl(3) == 'doping')
						{
							$page_param = 3;

							$update = $AdsAdmin->update($id, 
								array(
									'doping_home' => 1 // ana sayfa vitrinine cixar
								)
							);

							$referer = explode('ads/', $_SERVER['HTTP_REFERER'])[1];
							redirect(SITE_ADMIN . '/ads/' . $referer);
						}
						elseif($type == 'expired' AND getUrl(3) == 'active')
						{
							$page_param = 3;

							$update = $AdsAdmin->update($id, 
								array(
									'status'             => 1,
									'public_start_date'  => time(),
									'public_end_date'    => strtotime('+30 day'),
									'update_count'       => 1,
									'doping_home'        => 0,
									'doping_acil'        => 0,
									'doping_up'          => 0,
									'doping_differently' => 0,
									'doping_sahibinden'  => 0,
									'doping_yenigibi'    => 0,
									'doping_ekspertizli' => 0,
									'sendMail'           => 0
								)
							);

							$referer = explode('ads/', $_SERVER['HTTP_REFERER'])[1];
							redirect(SITE_ADMIN . '/ads/' . $referer);
						}
					}
				}
			}
			else
			{
				$page_param = 2;
				$id         = $_url[3];

				if($id != '')
				{
					if($type == 'edit')
					{
						if(issetPost('save'))
						{
							$ad_name     = post('ad_name');
							$ad_price    = post('ad_price');
							$price_type  = post('price_type');
							$ad_text     = post('ad_text');
							$title_image = post('ad-title-image');

							if($ad_name != '' AND $ad_price != '' AND $ad_price > 0 AND $title_image != '')
							{
								$update = $AdsAdmin->update($id, 
									array(
										'title'       => $ad_name,
										'price'       => $ad_price,
										'price_type'  => $price_type,
										'text'        => $ad_text,
										'title_image' => $title_image
									)
								);

								if($update === true)
								{
									$messageType = 'success';
									$message     = 'İlan başarıyla güncellenmiştir';
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
								$message     = 'Lütfen satırları boş bırakmayınız';
							}

							$returnArray['messageType'] = $messageType;
							$returnArray['message']     = $message;
						}

						$adInfo = $AdsAdmin->adInfo($id);

						if($adInfo !== false)
						{
							$adImages = $AdsAdmin->adImages($adInfo['id']);

							$returnArray['adInfo']   = $adInfo;
							$returnArray['adImages'] = $adImages;
						}
						else
						{
							$referer = explode('ads/', $_SERVER['HTTP_REFERER'])[1];
							redirect(SITE_ADMIN . '/ads/' . $referer);
						}
					}
					elseif($type == 'delete')
					{
						/*$AdsAdmin->delete($id);
						$AdsAdmin->deleteAdFeatures($id);
						$AdsAdmin->deleteAdImages($id);
						$AdsAdmin->deleteAdItemValues($id);*/

						$page_param = 2;
						$id         = $_url[3];

						$adInfo = $AdsAdmin->adInfo($id);

						if($adInfo !== false)
						{
							if(issetPost('save'))
							{
								$update = $AdsAdmin->update($id, 
									array(
										'status' => 3
									)
								);

								if($update === true)
								{
									$userInfo = $User->userInfo($adInfo['user_id']);

									ob_start();
									require_once ROOT . '/app/email/ad-delete.php';
									$content = ob_get_clean();

									$sendEmail = sendEmail('no-reply', $userInfo['email'], 'Galericilerden.com - İlanınız Silindi', $content);

									// add notification
									$addNotification = $NotificationsAdmin->add(
										array(
											'adId'        => $id,
											'userId'      => $adInfo['user_id'],
											'adType'      => post('sebep'),
											'type'        => 8, // ilaniniz silindi
											'create_time' => time()
										)
									);

									if($sendEmail === true AND $addNotification === true)
									{
										$referer = explode('ads/', $_SERVER['HTTP_REFERER'])[1];
										redirect(SITE_ADMIN . '/ads/' . $referer);
									}
								}
							}
						}
						else
						{
							$referer = explode('ads/', $_SERVER['HTTP_REFERER'])[1];
							redirect(SITE_ADMIN . '/ads/' . $referer);
						}
					}
				}
			}
		}

		$smarty->assign('return', $returnArray);
		$smarty->display('admin/ads.tpl');
	}	
	else
	{
		redirect(SITE_ADMIN);
	}

?>