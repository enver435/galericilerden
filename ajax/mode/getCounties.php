<?php

	# @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-14 12:53:59
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-08-15 14:45:55
	
	$cityId = post('cityId');

	if($cityId != '')
	{
		echo json_encode($Other->counties($cityId));
	}

?>