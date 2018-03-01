<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-21 15:09:38
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-09-08 12:52:59
	
	if(session('login'))
	{
		$lock 		  = false;
		$getUserStore = $Store->getUserStore();
		$userInfo     = $User->userInfo(session('userId'));

		if($getUserStore !== false AND time() > $getUserStore['end_time'] AND $getUserStore['status'] == 1 AND $userInfo['user_status'] == 2) // magaza varsa, magazanin vaxti bitibse, magazanin admin statusu (qebul edilib) se, istifadeci statusu kurumsaldisa bu sehifeni goster
		{	
			$storeInfo = $Store->storeInfo($getUserStore['store_type']);

			if(issetPost('completed') AND post('completed') == 'completed')
			{
				if($config['iyzicoPayment'] === true)
				{
					if(session('storeYearUpdatePaymentSuccess'))
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
								'update_time'       => time(),
								'status'            => 0 // admine gonder
							)
						);

						if($updateStore === true)
						{
							removeSession('storeYearUpdatePaymentSuccess'); // odemeni silirik

							$messageType = 'success';
							$message     = 'Mağazanızın yıllık süresi başarıyla güncellendi. Admin onayından sonra ilan verme sayfasını tekrar ziyaret ediniz';
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

			$returnArray['storeList']  = $Store->storeList();
			$returnArray['siteConfig'] = $config; 

			$smarty->assign('return', $returnArray);
			$smarty->display('update-store-year.tpl');
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