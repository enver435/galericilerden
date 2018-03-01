<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-21 11:39:11
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-08-21 11:41:05
	
	function taxInfo($taxId, $column)
	{
		global $Other;

		return $Other->taxInfo($taxId)[$column];
	}

?>