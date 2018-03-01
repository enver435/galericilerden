<?php

	# @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2018-01-19 00:39:04
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2018-01-19 00:46:41

	if(session('login'))
	{
		$favoriteId = post('favoriteId');
		$name       = post('name');

		if($favoriteId != '' AND $name != '')
		{
			$edit = $FavoritesSearch->edit($favoriteId, array('name' => $name));

			if($edit === true)
			{
				$returnArray['success'] = 'success';
			}
			else
			{
				$returnArray['error'] = 'error';
			}
		}
		else
		{
			$returnArray['error'] = 'error';
		}

		echo json_encode($returnArray);
	}

?>