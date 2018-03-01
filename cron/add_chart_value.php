<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-09-13 12:58:19
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-09-16 15:27:17

    // her gunun sonunda run edilecek
	
	require_once '../app/init.php';

	$users = $User->users();
	$time  = time();

	foreach ($users as $user) 
	{
		$userAds = $Ads->userAds($user['id']);

		if($userAds !== false)
		{	
			$countAd = count($userAds);

			if($countAd > 0) // varsa
			{
				$Chart->add(
					array(
						'userId'      => $user['id'],
						'countAd'     => $countAd,
						'countAdView' => $user['daylingViewAds'],
						'time'        => $time
					)
				);
			}
		}

		$User->update($user['id'], array('daylingViewAds' => 0));
	}

?>