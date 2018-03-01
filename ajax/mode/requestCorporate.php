<?php

	# @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2018-01-19 12:57:09
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2018-01-19 13:04:55

	if(session('login') AND session('userId'))
	{
		$update = $db->update('users')->where('id', session('userId'))->set(array('corporateRequest' => 1));

		if($update === true)
		{
			$db->update('users')->where('id', session('userId'))->set(array('corporateMessage' => 0));
			$returnArray['success'] = 'success';
		}
		else
		{
			$returnArray['error'] = 'error';
		}

		echo json_encode($returnArray);
	}

?>