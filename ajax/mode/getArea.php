<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-16 12:54:59
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-08-16 12:55:19
	
	$countyId = post('countyId');

	if($countyId != '')
	{
		echo json_encode($Other->area($countyId));
	}

?>