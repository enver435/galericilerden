<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-09-08 09:06:56
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-09-18 08:18:54

	if(session('login'))
	{
		$userInfo     = $User->userInfo(session('userId'));
		$getUserStore = $Store->getUserStore();

		if($userInfo['user_status'] == 2)
		{
			$edit = false;
			$page = $_url[1];

			if($page != '')
			{
				if($page == 'edit-store')
				{
					$page_param = 1;

					if($getUserStore['status'] == 1 AND $getUserStore['end_time'] > time())
					{
						$edit = true;
					}
					elseif($getUserStore['status'] == 2)
					{
						$edit = true;
					}

					if($edit === true)
					{
						if(issetPost('completed') AND post('completed') == 'completed')
						{
							$store_image   = post('store-image');
							$store_theme   = post('store-theme');
							$store_name    = post('store_name');
							$store_text    = post('store_text');
							$firm_name     = post('firm_name');
							$firm_name     = mb_strtolower($firm_name, 'UTF-8');
							$sales_name    = post('sales_name');
							$sales_name    = mb_strtolower($sales_name, 'UTF-8');
							$sales_surname = post('sales_surname');
							$sales_surname = mb_strtolower($sales_surname, 'UTF-8');
							$sales_phone   = post('sales_phone');

							if($store_image != '' AND $store_theme != '' AND $store_name != '' AND $store_text != '' AND $firm_name != '' AND $sales_name != '' AND $sales_surname != '' AND $sales_phone != '')
							{
								if($store_theme == 1 || $store_theme == 2 || $store_theme == 3 || $store_theme == 4)
								{
									$phoneReplace = str_replace(array(' ', '(', ')'), array('', '', ''), trim($sales_phone));

									if(substr($phoneReplace, 0, 2) == '02' OR substr($phoneReplace, 0, 2) == '03' OR substr($phoneReplace, 0, 2) == '05' OR substr($phoneReplace, 0, 2) == '08')
									{
										$updateStore = $Store->updateStore($getUserStore['user_id'],
											array(
												'store_name'    => $firm_name,
												'store_logo'    => $store_image,
												'store_theme'   => $store_theme,
												'store_text'    => $store_text,
												'sales_name'    => $sales_name,
												'sales_surname' => $sales_surname,
												'sales_phone'   => $sales_phone,
												'store_domain'  => permalink($store_name, array('delimiter' => ''))
											)
										);

										if($updateStore === true)
										{
											$messageType = 'success';

											if($getUserStore['status'] == 2) // admin onaylamasa guncellense
											{
												$message = 'Mağazanız başarılı bir şekilde güncellendi. Admin onayından sonra mağazanız açılacaktır';

												if($getUserStore['status'] == 2)
												{
													$Store->updateStore($getUserStore['user_id'], array('status' => 0));
												}
											}
											else
											{
												$message = 'Mağazanız başarılı bir şekilde güncellendi.';
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
										$message     = 'Telefon numara formatı yanlış';
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
					}
					else
					{
						redirect('my-store');
					}
				}
				else
				{
					redirect('my-store');
				}
			}

			$returnArray['userStore']  = $getUserStore;
			$returnArray['Ads']        = $Ads;
			$returnArray['Store']      = $Store;
			$returnArray['siteConfig'] = $config;

			$smarty->assign('return', $returnArray);
			$smarty->display('my-store.tpl');
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