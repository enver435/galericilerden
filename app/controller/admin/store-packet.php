<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-22 10:01:43
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-08-23 19:01:31
	
	if(session('adminLogin'))
	{
		$type        = $_url[2];
		$returnArray = array();

		if($type != '')
		{
			if($type == 'edit')
			{
				$page_param = 2;
				$id         = $_url[3];

				if($id != '')
				{
					if(issetPost('save'))
					{
						$store_type_name = post('store_type_name');
						$ad_limit        = post('ad_limit');
						$store_price     = post('store_price');

						if($store_type_name != '' AND $ad_limit != '' AND $store_price != '')
						{
							$storeTypeUpdate = $StoreAdmin->storeTypeUpdate($id, 
								array(
									'store_type_name' => $store_type_name,
									'ad_limit'		  => $ad_limit,
									'store_price'     => $store_price
								)
							);

							if($storeTypeUpdate === true)
							{
								$messageType = 'success';
								$message     = 'Paket başarıyla güncellendi';
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

					$storeTypeInfo = $StoreAdmin->storeTypeInfo($id);

					if($storeTypeInfo !== false)
					{
						$returnArray['storeTypeInfo'] = $storeTypeInfo;
					}
					else
					{
						redirect(SITE_ADMIN . '/store-packet');
					}
				}
			}
		}
		else
		{
			$returnArray['storeList'] = $StoreAdmin->storeTypeList();
		}

		$returnArray['siteConfig'] = $config;

		$smarty->assign('return', $returnArray);
		$smarty->display('admin/store-packet.tpl');
	}	
	else
	{
		redirect(SITE_ADMIN);
	}

?>