<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-16 12:54:59
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-08-16 12:57:39
	
	$areaId = post('areaId');

	if($areaId != '')
	{
		echo json_encode($Other->neighborhood($areaId));
	}

?>