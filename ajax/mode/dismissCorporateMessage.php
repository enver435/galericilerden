<?php

	# @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2018-01-19 12:50:37
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2018-01-19 12:52:00

	if(session('login') AND session('userId'))
	{
		$db->update('users')->where('id', session('userId'))->set(array('corporateMessage' => 0));
	}

?>