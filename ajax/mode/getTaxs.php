<?php

	# @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-14 12:53:59
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-08-15 14:43:25
	
	$plateNo = post('plateNo');

	if($plateNo != '')
	{
		echo json_encode($Other->taxs($plateNo));
	}

?>