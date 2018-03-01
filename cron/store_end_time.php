<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-09-07 08:11:37
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-09-14 18:57:27

	// her 1 deqiqeden 1 run edilecek
	
	require_once '../app/init.php';

	$stores = $Store->stores('id, user_id, end_time, sendMail');
	$time   = time();

	if($stores !== false)
	{
		foreach ($stores as $store) 
		{
			if($time >= $store['end_time'] AND $store['sendMail'] == 0)
			{
				$storeTypeInfo = $Store->storeInfo();
				$userInfo      = $User->userInfo($store['user_id']);

				if($userInfo !== false)
				{
					ob_start();
					require_once ROOT . '/app/email/store-end-time.php';
					$content = ob_get_clean();

					$sendEmail = sendEmail('no-reply', $userInfo['email'], 'Galericilerden.com - Mağazanızın Yıllık Süresi Bitmiştir', $content);

					// add notification
					$addNotification = $Notifications->add(
						array(
							'storeId'     => $store['id'],
							'userId'      => $store['user_id'],
							'type'        => 6, // magazanin illik vaxti bitdi
							'create_time' => $time
						)
					);

					if($sendEmail === true AND $addNotification === true)
					{
						$Store->updateStore($store['user_id'], array('sendMail' => 1));
					}
				}
			}
		}
	}

?>