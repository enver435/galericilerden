<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-22 10:01:43
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-09-15 17:42:14
	
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

						$stores = $StoreAdmin->stores($type);

						if($stores !== false)
						{
							$returnArray['stores'] = $stores;
						}
					}
					else
					{
						if($type == 'pending' AND getUrl(3) == 'confirm')
						{
							$page_param = 3;

							$storeInfo     = $StoreAdmin->storeInfo($id);
							$storeTypeInfo = $StoreAdmin->storeTypeInfo($storeInfo['store_type']);

							if($storeInfo !== false AND $storeInfo['status'] == 0) // magaza varsa ve magazanin statusu onay bekleyen dise
							{
								if($storeInfo['end_time'] != 0)
								{
									if(time() > $storeInfo['end_time']) // magazanin vaxti bitib
									{
										$update = $StoreAdmin->update($id, 
											array(
												'update_store_type' => 0,
												'store_type'        => $storeInfo['update_store_type'],
												'end_time'          => strtotime('+365 day', $storeInfo['update_time']),
												'status'            => 1
											)
										);
									}
									elseif($Ads->checkLimit() >= $storeTypeInfo['ad_limit']) // magazanin limiti bitib
									{
										$update = $StoreAdmin->update($id, 
											array(
												'update_store_type' => 0,
												'store_type'        => $storeInfo['update_store_type'],
												'status'            => 1
											)
										);
									}

									$updateAdUser = $AdsAdmin->updateAdUser($storeInfo['user_id'], 
										array(
											'update_count' => 0 // bu istifadeciye aid butun elanlarin hamisinin update_count 0 la (yeni magaza limitinden sil)
										)
									);
								}
								else // yeni magaza
								{
									$update = $StoreAdmin->update($id, 
										array(
											'end_time' => strtotime('+365 day', $storeInfo['update_time']),
											'status'   => 1
										)
									);
								}

								$userInfo = $User->userInfo($storeInfo['user_id']);

								ob_start();
								require_once ROOT . '/app/email/store-confirm.php';
								$content = ob_get_clean();

								$sendEmail = sendEmail('no-reply', $userInfo['email'], 'Galericilerden.com - Mağazanız Onaylandı', $content);

								// add notification
								$addNotification = $NotificationsAdmin->add(
									array(
										'storeId'     => $id,
										'userId'      => $storeInfo['user_id'],
										'type'        => 4, // magaza qebul edildi
										'create_time' => time()
									)
								);

								if($sendEmail === true AND $addNotification === true)
								{
									$referer = explode('store/', $_SERVER['HTTP_REFERER'])[1];
									redirect(SITE_ADMIN . '/store/' . $referer);
								}
							}
						}
						elseif($type == 'pending' AND getUrl(3) == 'not-confirm')
						{
							$page_param = 3;

							$storeInfo = $StoreAdmin->storeInfo($id);

							if($storeInfo !== false AND $storeInfo['status'] == 0) // magaza varsa ve magazanin statusu onay bekleyen dise
							{
								$update = $StoreAdmin->update($id, 
									array(
										'status' => 2
									)
								);

								$userInfo = $User->userInfo($storeInfo['user_id']);

								ob_start();
								require_once ROOT . '/app/email/store-not-confirm.php';
								$content = ob_get_clean();

								$sendEmail = sendEmail('no-reply', $userInfo['email'], 'Galericilerden.com - Mağazanız Onaylanamadı', $content);

								// add notification
								$addNotification = $NotificationsAdmin->add(
									array(
										'storeId'     => $id,
										'userId'      => $storeInfo['user_id'],
										'type'        => 5, // magaza qebul edilmedi
										'create_time' => time()
									)
								);

								if($sendEmail === true AND $addNotification === true)
								{
									$referer = explode('store/', $_SERVER['HTTP_REFERER'])[1];
									redirect(SITE_ADMIN . '/store/' . $referer);
								}
							}
						}
						elseif($type == 'expired' AND getUrl(3) == 'active')
						{
							$page_param = 3;

							$update = $AdsAdmin->update($id, 
								array(
									'update_time' => time(),
									'end_time'    => strtotime('+365 day'),
									'status'      => 1
								)
							);

							$referer = explode('store/', $_SERVER['HTTP_REFERER'])[1];
							redirect(SITE_ADMIN . '/store/' . $referer);
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
							$store_image  = post('store-image');
							$store_theme  = post('store-theme');
							$store_type   = post('store_type');
							$firm_name    = post('firm_name');
							$store_domain = post('store_domain');
							$store_text   = post('store_text');

							if($store_image != '' AND $store_theme != '' AND $store_type != '' AND $firm_name != '' AND $store_text != '')
							{
								if($store_theme == 1 || $store_theme == 2 || $store_theme == 3 || $store_theme == 4)
								{
									$storeTypeInfo = $StoreAdmin->storeTypeInfo($store_type);

									if($storeTypeInfo !== false)
									{
										$updateStore = $StoreAdmin->update($id,
											array(
												'store_name'   => $firm_name,
												'store_logo'   => $store_image,
												'store_type'   => $store_type,
												'store_theme'  => $store_theme,
												'store_text'   => $store_text,
												'store_domain' => permalink($store_domain, array('delimiter' => ''))
											)
										);

										if($updateStore === true)
										{
											$messageType = 'success';
											$message     = 'Mağaza başarılı bir şekilde yenilendi';
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
										$message     = 'Bir hata oluştu. Lütfen daha sonra tekrar deneyiniz';
									}
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

						$storeInfo = $StoreAdmin->storeInfo($id);

						if($storeInfo !== false)
						{
							$returnArray['storeInfo'] = $storeInfo;
						}
						else
						{
							redirect(SITE_ADMIN . '/store');
						}
					}
					elseif($type == 'delete')
					{
						$storeInfo = $StoreAdmin->storeInfo($id);

						if($storeInfo !== false)
						{
							$StoreAdmin->delete($id);
							$userAds = $AdsAdmin->userAds($storeInfo['user_id']);

							if($userAds !== false)
							{
								foreach ($userAds as $value) 
								{
									$AdsAdmin->delete($value['id']);
									$AdsAdmin->deleteAdImages($value['id']);
									$AdsAdmin->deleteAdItemValues($value['id']);
									$AdsAdmin->deleteAdFeatures($value['id']);
								}
							}

							// lazim olarsa istifadecinin emailine magazanin silinmesi ile bagli mesaj gedecek
						}

						$referer = explode('store/', $_SERVER['HTTP_REFERER'])[1];
						redirect(SITE_ADMIN . '/store/' . $referer);
					}
				}
			}
		}

		$returnArray['AdsAdmin']   = $AdsAdmin;
		$returnArray['StoreAdmin'] = $StoreAdmin;
		$returnArray['siteConfig'] = $config;
		$returnArray['storeList']  = $StoreAdmin->storeTypeList();

		$smarty->assign('return', $returnArray);
		$smarty->display('admin/store.tpl');
	}	
	else
	{
		redirect(SITE_ADMIN);
	}

?>