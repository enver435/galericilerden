<?php

	# @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2018-01-18 20:26:29
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2018-01-19 15:26:14

	if(session('login'))
	{
		$categoryID      = post('categoryID');
		$name            = post('name');
		$priceMin        = post('priceMin');
		$priceMax        = post('priceMax');
		$city            = post('city');
		$county          = post('county');
		$userType        = post('userType');
		$orderby         = post('orderby');
		$categorySpecial = post('categorySpecial');

		if($categoryID != '' AND $name != '')
		{
			$lock = false;

			if($categorySpecial == 'false')
			{
				$arrayInsert = array(
					'user_id'   => session('userId'),
					'name'      => $name,
					'price_min' => $priceMin,
					'price_max' => $priceMax,
					'category'  => $categoryID,
					'city'      => $city,
					'county'    => $county,
					'user_type' => $userType,
					'orderby'   => $orderby
				);
			}
			else
			{
				$arrayInsert = array(
					'user_id'          => session('userId'),
					'name'             => $name,
					'price_min'        => $priceMin,
					'price_max'        => $priceMax,
					'category_special' => $categoryID,
					'city'             => $city,
					'county'           => $county,
					'user_type'        => $userType,
					'orderby'          => $orderby
				);
			}

			$addFavoriteSearch = $FavoritesSearch->add($arrayInsert);

			if($addFavoriteSearch != '')
			{
				foreach ($_POST as $key => $value) 
				{
					if($key != 'city' AND $key != 'county' AND $key != 'priceMin' AND $key != 'priceMax' AND $key != 'categoryID' AND $key != 'mode' AND $key != 'name' AND $key != 'userType' AND $key != 'orderby' AND $key != 'categorySpecial')
					{
						$itemExplode = explode('_', $key);

						if(!$itemExplode[2])
						{
							if($value > 0)
							{
								$FavoritesSearch->addItems(
									array(
										'itemId'      => $itemExplode[1],
										'itemSelect'  => $value,
										'favorite_id' => $addFavoriteSearch,
										'type'        => 2 // selectbox
									)
								);
							}
						}
						else
						{
							if($lock === false)
							{
								$lock = true;

								$FavoritesSearch->addItems(
									array(
										'itemId'       => $itemExplode[1],
										'itemValueMin' => $_POST['item_' . $itemExplode[1] . '_min'],
										'itemValueMax' => $_POST['item_' . $itemExplode[1] . '_max'],
										'favorite_id'  => $addFavoriteSearch,
										'type'         => 1 // input number
									)
								);
							}

							if($itemExplode[2] == 'max')
							{
								$lock = false;
							}
						}
					}
				}

				$returnArray['success'] = 'success'; 
			}
			else
			{
				$returnArray['error'] = 'error';
			}
		}
		else
		{
			$returnArray['error'] = 'error';
		}

		echo json_encode($returnArray);
	}

?>