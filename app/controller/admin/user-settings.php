<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-09-06 14:46:47
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-09-06 15:07:50
	
	if(session('adminLogin'))
	{
		$returnArray = array();

		if(issetPost('save'))
		{
			$individual_ad_limit       = post('individual_ad_limit');
			$corporate_ad_limit        = post('corporate_ad_limit');
			$individual_upload         = post('individual_upload');
			$corporate_upload          = post('corporate_upload');
			$individual_ad_limit_price = post('individual_ad_limit_price');

			$updateSetting = $Other->updateSetting(
				array(
					'individual_ad_limit'       => $individual_ad_limit,
					'corporate_ad_limit'        => $corporate_ad_limit,
					'individual_upload'         => $individual_upload,
					'corporate_upload'          => $corporate_upload,
					'individual_ad_limit_price' => $individual_ad_limit_price
 				)
			);

			if($updateSetting === true)
			{
				$messageType = 'success';
				$message     = 'Kullanıcı ayarları başarıyla güncellendi';
			}
			else
			{
				$messageType = 'error';
				$message     = 'Bir hata oluştu. Lütfen daha sonra tekrar deneyiniz';
			}

			$returnArray['messageType'] = $messageType;
			$returnArray['message']     = $message;
		}

		$smarty->assign('return', $returnArray);
		$smarty->display('admin/user-settings.tpl');
	}
	else
	{
		redirect(SITE_ADMIN);
	}

?>