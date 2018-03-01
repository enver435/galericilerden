<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-20 18:22:55
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-09-27 11:25:46

	if(session('login'))
	{
		$lock         = false;
		$getUserStore = $Store->getUserStore();
		$userInfo     = $User->userInfo(session('userId'));

		if($getUserStore === false AND $userInfo['user_status'] == 2) // magaza yoxdusa, istifadeci statusu kurumsaldisa bu sehifeni goster
		{
			if(issetPost('completed') AND post('completed') == 'completed')
			{
				if($config['iyzicoPayment'] === true)
				{
					if(session('storeCreatePaymentSuccess'))
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
					$store_image   = post('store-image');
					$store_theme   = post('store-theme');
					$store_name    = post('store_name');
					$store_type    = post('store_type');
					$store_text    = post('store_text');
					$firm_name     = post('firm_name');
					$firm_name     = mb_strtolower($firm_name, 'UTF-8');
					$sales_name    = post('sales_name');
					$sales_name    = mb_strtolower($sales_name, 'UTF-8');
					$sales_surname = post('sales_surname');
					$sales_surname = mb_strtolower($sales_surname, 'UTF-8');
					$sales_phone   = post('sales_phone');

					if($store_image != '' AND $store_theme != '' AND $store_name != '' AND $store_type > 0 AND $store_text != '' AND $firm_name != '' AND $sales_name != '' AND $sales_surname != '' AND $sales_phone != '')
					{
						if($store_theme == 1 || $store_theme == 2 || $store_theme == 3 || $store_theme == 4)
						{
							$phoneReplace = str_replace(array(' ', '(', ')'), array('', '', ''), trim($sales_phone));

							if(substr($phoneReplace, 0, 2) == '02' OR substr($phoneReplace, 0, 2) == '03' OR substr($phoneReplace, 0, 2) == '05' OR substr($phoneReplace, 0, 2) == '08')
							{
								$storeInfo = $Store->storeInfo($store_type);

								if($storeInfo !== false)
								{
									$createStore = $Store->createStore(
										array(
											'store_name'    => $firm_name,
											'store_logo'    => $store_image,
											'store_type'    => $store_type,
											'store_theme'   => $store_theme,
											'store_text'    => $store_text,
											'sales_name'    => $sales_name,
											'sales_surname' => $sales_surname,
											'sales_phone'   => $sales_phone,
											'user_id'       => session('userId'),
											'update_time'   => time(),
											'create_time'   => time(),
											'store_domain'  => permalink($store_name, array('delimiter' => '')),
											'status'        => 0 // admin yoxlanisina gonder
										)
									);

									if($createStore === true)
									{
										removeSession('storeCreatePaymentSuccess'); // odemeni silirik

										$messageType = 'success';
										$message     = 'Mağazanız başarılı bir şekilde oluşturuldu. Admin onayından sonra mağazanız açılacaktır';
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
							}
							else
							{
								$messageType = 'error';
								$message     = 'Telefon numara formatı yanlış';
							}
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
						$message     = 'Lütfen satırları boş bırakmayınız';
					}

					$returnArray['messageType'] = $messageType;
					$returnArray['message']     = $message;
				}
			}

			$returnArray['storeList']  = $Store->storeList();
			$returnArray['siteConfig'] = $config; 

			$smarty->assign('return', $returnArray);
			$smarty->display('create-store.tpl');
		}
		else
		{
			redirect();
		}
	}
	else
	{
		redirect('login');
	}

?>