<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-21 15:09:38
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-08-31 16:18:43
	
	if(session('login'))
	{
		$lock         = false;
		$getUserStore = $Store->getUserStore();
		$userInfo     = $User->userInfo(session('userId'));

		if($getUserStore !== false AND $getUserStore['end_time'] > time() AND $getUserStore['status'] == 1 AND $userInfo['user_status'] == 2) // magaza varsa, magazanin vaxti bitmeyibse, magazanin admin statusu (qebul edilib) se, istifadeci statusu kurumsaldisa bu sehifeni goster
		{	
			$storeInfo = $Store->storeInfo($getUserStore['store_type']);

			if($storeInfo['ad_limit'] > 0)
			{
				if($storeInfo['ad_limit'] <= $Ads->checkLimit())
				{
					if(issetPost('completed') AND post('completed') == 'completed')
					{
						if($config['iyzicoPayment'] === true)
						{
							if(session('storeLimitUpdatePaymentSuccess'))
							{
								$lock = false;
							}
							else
							{
								$lock = true;
							}
						}

						if($lock === false)
						{
							$store_type = post('store_type');
							$storeInfo  = $Store->storeInfo($store_type);

							if($storeInfo !== false)
							{
								$updateStore = $Store->updateStore(session('userId'), 
									array(
										'update_store_type' => $store_type,
										'status'            => 0 // admine gonder
									)
								);

								if($updateStore === true)
								{
									removeSession('storeLimitUpdatePaymentSuccess'); // odemeni silirik

									$messageType = 'success';
									$message     = 'Mağaza limitiniz başarıyla güncellendi. Admin onayından sonra ilan verme sayfasını tekrar ziyaret ediniz';
								}
								else
								{
									// iyzico terefinden iade edilecek burda. eger error varsa

									$messageType = 'error';
									$message     = 'Bir hata oluştu. Lütfen daha sonra tekrar deneyiniz';
								}
							}
							else
							{
								// iyzico terefinden iade edilecek burda. eger error varsa

								$messageType = 'error';
								$message     = 'Bir hata oluştu. Lütfen daha sonra tekrar deneyiniz';
							}

							$returnArray['messageType'] = $messageType;
							$returnArray['message']     = $message;
						}
					}

					$returnArray['storeList'] = $Store->storeList();
				}
				else
				{
					redirect();
				}
			}
			else
			{
				redirect();
			}

			$returnArray['siteConfig'] = $config;

			$smarty->assign('return', $returnArray);
			$smarty->display('update-store-limit.tpl');
		}
		else
		{
			redirect();
		}
	}
	else
	{
		redirect();
	}

?>