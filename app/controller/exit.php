<?php

	# @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-14 17:01:29
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-08-14 17:01:44
	
	if(session('login'))
	{
		$User->_exit();
	}

	redirect();

?>