<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-22 10:01:43
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-08-23 19:01:58
	
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
						$doping_name             = post('doping_name');
						$doping_text             = post('doping_text');
						$doping_individual_price = post('doping_individual_price');
						$doping_corporate_price  = post('doping_corporate_price');

						if($doping_name != '' AND $doping_text != '' AND $doping_individual_price != '' AND $doping_corporate_price != '')
						{
							$dopingUpdate = $DopingAdmin->update($id, 
								array(
									'doping_name'             => $doping_name,
									'doping_text'             => $doping_text,
									'doping_individual_price' => $doping_individual_price,
									'doping_corporate_price'  => $doping_corporate_price
								)
							);

							if($dopingUpdate === true)
							{
								$messageType = 'success';
								$message     = 'Doping başarıyla güncellendi';
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

					$dopingInfo = $DopingAdmin->dopingInfo($id);

					if($dopingInfo !== false)
					{
						$returnArray['dopingInfo'] = $dopingInfo;
					}
					else
					{
						redirect(SITE_ADMIN . '/doping');
					}
				}
			}
		}
		else
		{
			$returnArray['dopingList'] = $DopingAdmin->dopingList();
		}

		$returnArray['siteConfig'] = $config;

		$smarty->assign('return', $returnArray);
		$smarty->display('admin/doping.tpl');
	}	
	else
	{
		redirect(SITE_ADMIN);
	}

?>