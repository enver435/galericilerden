<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-09-15 18:14:55
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-10-10 10:18:53
	
	set_time_limit(0); 
	ini_set('memory_limit', '20000M');

	require_once 'app/init.php';

	/*$adsImages = $db->from('ads_imagess')->where('updates', 0)->run();

	foreach ($adsImages as $value) 
	{
		if(file_exists('uploads/ads/' . $value['image'] . '.jpg'))
		{
			$image = new Upload('uploads/ads/' . $value['image'] . '.jpg');

			$image->jpeg_quality = 50;

			$image->Process('../uploads/ads');

			if($image->processed) 
			{
				$db->update('ads_imagess')->where('id', $value['id'])->set(array('updates' => 1));
			   	echo $value['image'] . ' -> yes<br>';
		   	}
		   	else
		   	{
		   		echo $value['image'] . ' -> no<br>';
		   	}
		}
	}

	$adsImages = $db->from('ads_imagess')->where('updates', 0)->run();

	echo '<br><br> qalan: ' . count($adsImages);*/


	

	/*$users = $db->from('userss')->run();

	foreach ($users as $user) 
	{
		$name    = explode(' ', $user['ad_soyad'])[0];
		$surname = explode(' ', $user['ad_soyad'])[1];
		$email   = $user['eposta'];
		$pass    = $user['parola'];
		$phone   = str_replace(array('(', ')', ' '), array('', '', ''), $user['telefon']);
		$seflink = permalink($name . ' ' . $surname);
		$status  = 1;
		
		if($phone != '')
		{
			if(is_numeric($phone))
			{
				$phone = '+9' . substr($phone, 0, 1) . ' (' . substr($phone, 1, 3) . ') ' . substr($phone, 4);
			}
		}

		$db->insert('users')->set(
			array(
				'name'    => $name,
				'surname' => $surname,
				'email'   => $email,
				'pass'    => $pass,
				'phone'   => $phone,
				'seflink' => $seflink,
				'status'  => $status,
				'user_status' => 1
			)
		);
	}*/

	/*foreach ($users as $user) 
	{

		$phone      = str_replace(array('(', ')', ' '), array('', '', ''), $user['phone']);
		$phone_work = str_replace(array('(', ')', ' '), array('', '', ''), $user['phone_work']);
		$phone_more = str_replace(array('(', ')', ' '), array('', '', ''), $user['phone_more']);

		if($user['phone'] != '')
		{
			if(is_numeric($phone))
			{
				$phone = '+0' . ' (' . substr($phone, 3, 3) . ') ' . substr($phone, 6, 3) . ' ' . substr($phone, 9, 2) . ' ' . substr($phone, 11, 2);
			}
		}

		if($user['phone_work'] != '')
		{
			if(is_numeric($phone_work))
			{
				$phone_work = '+0' . ' (' . substr($phone_work, 3, 3) . ') ' . substr($phone_work, 6, 3) . ' ' . substr($phone_work, 9, 2) . ' ' . substr($phone_work, 11, 2);
			}
		}

		if($user['phone_more'] != '')
		{
			if(is_numeric($phone_more))
			{
				$phone_more = '+0' . ' (' . substr($phone_more, 3, 3) . ') ' . substr($phone_more, 6, 3) . ' ' . substr($phone_more, 9, 2) . ' ' . substr($phone_more, 11, 2);
			}
		}

		$db->update('users')->where('id', $user['id'])->set(
			array(
				'phone'      => $phone,
				'phone_work' => $phone_work,
				'phone_more' => $phone_more
			)
		);
		
	}*/

?>