<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-09-07 08:11:37
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-09-14 18:40:05

	// her 1 deqiqeden 1 run edilecek
	
	require_once '../app/init.php';

	$ads  = $Ads->adsMail();
	$time = time();

	if($ads !== false)
	{
		foreach ($ads as $ad) 
		{
			$adInfo   = $Ads->adInfo($ad['id']);
			$userInfo = $User->userInfo($ad['user_id']);

			if($userInfo !== false)
			{
				ob_start();
				require_once ROOT . '/app/email/ad-end-time.php';
				$content = ob_get_clean();

				$sendEmail = sendEmail('no-reply', $userInfo['email'], 'Galericilerden.com - İlanınızın Yayın Süresi Bitmiş', $content);
                
                // add notification
				$addNotification = $Notifications->add(
					array(
						'adId'        => $ad['id'],
						'userId'      => $adInfo['user_id'],
						'type'        => 3, // elanin vaxti bitdi
						'create_time' => $time
					)
				);

				if($sendEmail === true AND $addNotification === true)
				{
					$Ads->updateAd($ad['id'], array('sendMail' => 1));
				}
			}
		}
	}

?>