<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-24 16:25:09
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-08-24 16:25:44
	
	function modulInfo($modulId, $column)
	{
		global $Modul;

		return $Modul->modulInfo($modulId)[$column];
	}

?>