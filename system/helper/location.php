<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-19 11:58:46
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-08-29 09:41:20
	
	function cityInfo($cityId, $column)
	{
		global $Other;

		return $Other->cityInfo($cityId)[$column];
	}

	function countyInfo($countyId, $column)
	{
		global $Other;

		return $Other->countyInfo($countyId)[$column];
	}

	function neighborhoodInfo($id, $column)
	{
		global $Other;

		return $Other->neighborhoodInfo($id)[$column];
	}

?>