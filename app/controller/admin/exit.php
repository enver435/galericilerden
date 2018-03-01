<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-22 19:03:17
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-08-22 19:03:42
	
	if(session('adminLogin'))
	{
		$Admin->_exit();
	}

	redirect(SITE_ADMIN);

?>