<?php

	# @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2018-01-19 14:17:48
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2018-01-19 14:18:19

	if(session('showAppHeader') === true)
	{
		setSession('showAppHeader', 'closedAppHeader');
	}

?>