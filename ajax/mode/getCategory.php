<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-15 10:36:02
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-09-12 11:27:39
	
	$categoryId = post('categoryId');

	if($categoryId != '')
	{
		$getSubCategory = $Category->getSubCategory($categoryId);

		if($getSubCategory !== false)
		{
			$counts = array();

			foreach ($getSubCategory as $value) 
			{
				$counts[] = $Ads->categoryAdsCount($value['Id']);
			}

			$responseArray = array(
				'categorys' => $getSubCategory,
				'counts'    => $counts
			);

			$response = json_encode($responseArray);
		}
		else
		{
			$response = json_encode(null);
		}

		echo $response;
	}

?>