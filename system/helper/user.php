<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-15 22:29:46
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-08-15 22:31:07
	
	function userInfo($id, $column)
	{
		global $User;

		return $User->userInfo($id, $column);
	}

?>