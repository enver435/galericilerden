<?php

	# @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-14 22:27:56
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2018-01-18 22:43:05
	
	$catId       = get('catId');
	$catSeflink  = get('catSeflink');
	$returnArray = array();

	if($catId != '' AND $catSeflink != '')
	{
		$page_param   = 2;
		$categoryInfo = $Category->categoryInfo($catId);

		if($categoryInfo !== false AND $categoryInfo['seflink'] == $catSeflink)
		{
			/* ACTUAL LINK */
			$actualLink = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

			/* ORDER BY */
			$orderby = get('orderby');

			if($orderby == 'pricehigh')
			{
				$orderbySql          = ' ORDER BY price DESC';
				$orderbySqlUpNoItems = ' ORDER BY ads.price DESC';
			}
			elseif($orderby == 'pricelow')
			{
				$orderbySql          = ' ORDER BY price ASC';
				$orderbySqlUpNoItems = ' ORDER BY ads.price ASC';
			}
			elseif($orderby == 'datenew')
			{
				$orderbySql          = ' ORDER BY create_time DESC';
				$orderbySqlUpNoItems = ' ORDER BY ads.create_time DESC';
			}
			elseif($orderby == 'dateold')
			{
				$orderbySql          = ' ORDER BY create_time ASC';
				$orderbySqlUpNoItems = ' ORDER BY ads.create_time ASC';
			}
			elseif($orderby == 'kmlow')
			{
				$orderbySql          = ' ORDER BY km ASC';
				$orderbySqlUpNoItems = ' ORDER BY ads.km ASC';
			}
			elseif($orderby == 'kmhigh')
			{
				$orderbySql          = ' ORDER BY km DESC';
				$orderbySqlUpNoItems = ' ORDER BY ads.km DESC';
			}
			elseif($orderby == 'yearold')
			{
				$orderbySql          = ' ORDER BY year ASC';
				$orderbySqlUpNoItems = ' ORDER BY ads.year ASC';
			}
			elseif($orderby == 'yearnew')
			{
				$orderbySql          = ' ORDER BY year DESC';
				$orderbySqlUpNoItems = ' ORDER BY ads.year DESC';
			}
			else
			{
				$orderbySql          = ' ORDER BY create_time DESC';
				$orderbySqlUpNoItems = ' ORDER BY ads.create_time DESC';
			}

			/* PAGINATION SETTINGS */
			$page = 1;
			if(get('page') != '') 
			{
			    $page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);
			    if(false === $page) 
			    {
			        $page = 1;
			    }
			}

			$items_per_page = (get('pageSize') == 15 ? 15 : (get('pageSize') == 50 ? 50 : 15));
			$offset         = ($page - 1) * $items_per_page;
			$page_count     = 0;

			/* QUERY DEFAULT SETTINGS */
			//$betweenQuery    = '';
			$betweenQuery    = 'SELECT * FROM ads_items_values WHERE ';
			$selectJoin      = '*, ads.id AS adId, ads.city AS adCity, ads.county AS adCounty, ads.area AS adArea, ads.neighborhood AS adNeighborhood, ads.status AS adStatus, ads.seflink AS adSeflink';
			$select          = '*, id AS adId, city AS adCity, county AS adCounty, area AS adArea, neighborhood AS adNeighborhood, status AS adStatus, seflink AS adSeflink';
			$whereInValues   = '';
			$lock            = false;
			$fullArrayAds    = array();
			$countWhere      = 0;
			$type            = (!issetGet('type')) ? null : get('type');

			if($type !== null)
			{
				if($Ads->checkTypeAds($catId, null, $type) === false)
				{
					redirect('cat-' . $catId . '/' . $catSeflink);
				}
			}

			/* SEARCH ITEMS */
			$items = explode('&item_', $_SERVER['QUERY_STRING']);
			unset($items[0]);

			if(!empty($items))
			{
				foreach ($items as $value) 
				{
					$value = explode('=', $value);

					$itemId    = $value[0];
					$itemValue = explode('&', $value[1])[0];

					$itemInfo = $Modul->itemInfo($itemId);

					if($itemInfo['classx'] == 1) // input number
					{
						$itemMinMax = explode('_', $itemId);

						if($lock == false)
						{
							$lock = true;

							$betweenQuery .= 'itemId = ' . $itemMinMax[0];
						
							if(get('item_' . $itemMinMax[0] . '_min') != '' AND get('item_' . $itemMinMax[0] . '_max') == '')
							{
								$betweenQuery .= ' && itemValue >= ' . get('item_' . $itemMinMax[0] . '_min') . ' || ';
							}
							elseif(get('item_' . $itemMinMax[0] . '_min') == '' AND get('item_' . $itemMinMax[0] . '_max') != '')
							{
								$betweenQuery .= ' && itemValue <= ' . get('item_' . $itemMinMax[0] . '_max')  . ' || ';
							}
							elseif(get('item_' . $itemMinMax[0] . '_min') != '' AND get('item_' . $itemMinMax[0] . '_max') != '')
							{
								$betweenQuery .= ' && itemValue >= ' . get('item_' . $itemMinMax[0] . '_min') . ' && itemValue <= ' . get('item_' . $itemMinMax[0] . '_max') . ' || ';
							}
						}

						if($itemMinMax[1] == 'max')
						{
							$lock = false;
						}
					}
					elseif($itemInfo['classx'] == 2) // select
					{
						$whereInValues .= $itemValue . ', ';
						$countWhere++;
					}
					elseif($itemInfo['classx'] == 3) // input text
					{

					}
				}

				$betweenQuery  = rtrim($betweenQuery, ' || ');
				$whereInValues = rtrim($whereInValues, ', ');
				$betweenQuery .= ' GROUP BY adsId';

				if($whereInValues != '')
				{
					/* SELECT VALUES */
					$queryItemValues  = 'SELECT * FROM ads_items_values WHERE itemSelect IN (' . $whereInValues . ') GROUP BY adsId Having COUNT(*) = ' . $countWhere;
					$queryItemValues = $db->query($queryItemValues);
					$queryItemValues->execute();
					$resultItemValues = $queryItemValues->fetchAll(PDO::FETCH_ASSOC);

					/* PUSH SELECT ARRAYS */
					foreach ($resultItemValues as $key => $value) 
					{
						array_push($fullArrayAds, $value);
					}

					$betweenArrayAds = array();
					/* RANGE VALUES */
					if($betweenQuery != 'SELECT * FROM ads_items_values WHERE GROUP BY adsId')
					{
						/* RANGE VALUES */
						$betweenQuery = $db->query($betweenQuery);
						$betweenQuery->execute();
						$betweenQueryResult = $betweenQuery->fetchAll(PDO::FETCH_ASSOC);

						/* PUSH RANGE ARRAYS */
						foreach ($betweenQueryResult as $key => $value) 
						{
							array_push($betweenArrayAds, $value);
						}
					}



					/*foreach ($fullArrayAds as $ads) 
					{
						$adItems = $Ads->adItems($ads['adsId']);

						foreach ($adItems as $item) 
						{
							foreach ($betweenArrayAds as $ads2) 
							{
								if(get('item_' . $ads2['itemId'] . '_min') != '' AND get('item_' . $ads2['itemId'] . '_max') == '')
								{
									if($item['itemId'] == $ads2['itemId'])
									{
										if($ads2['itemValue'] >= get('item_' . $item['itemId'] . '_min'))
										{
											array_push($fullArrayAds, $ads2);
										}
									}
								}
								elseif(get('item_' . $ads2['itemId'] . '_min') == '' AND get('item_' . $ads2['itemId'] . '_max') != '')
								{
									if($item['itemId'] == $ads2['itemId'])
									{
										if($item['itemValue'] <= get('item_' . $ads2['itemId'] . '_max'))
										{
											array_push($fullArrayAds, $ads2);
										}
										else
										{
											$indexAdId = array_search($ads2['adsId'], $fullArrayAds);
											unset($fullArrayAds[$indexAdId]);
										}
									}
									else
									{
										$indexAdId = array_search($ads2['adsId'], $fullArrayAds);
										unset($fullArrayAds[$indexAdId]);
									}
								}
								elseif(get('item_' . $ads2['itemId'] . '_min') != '' AND get('item_' . $ads2['itemId'] . '_max') != '')
								{
									if($item['itemId'] == $ads2['itemId'])
									{
										if($ads2['itemValue'] >= get('item_' . $item['itemId'] . '_min') AND $ads2['itemValue'] <= get('item_' . $item['itemId'] . '_max'))
										{
											array_push($fullArrayAds, $ads2);
										}
									}
								}
							}
						}
					}*/
				}
				else
				{
					/* RANGE VALUES */
					if($betweenQuery != 'SELECT * FROM ads_items_values WHERE GROUP BY adsId')
					{
						/* RANGE VALUES */
						$betweenQuery = $db->query($betweenQuery);
						$betweenQuery->execute();
						$betweenQueryResult = $betweenQuery->fetchAll(PDO::FETCH_ASSOC);

						/* PUSH RANGE ARRAYS */
						foreach ($betweenQueryResult as $key => $value) 
						{
							array_push($fullArrayAds, $value);
						}
					}
				}
				
				/* DELETE DUBLICATE ARRAYS */
				foreach($fullArrayAds as $k => $v) 
				{
				    foreach($fullArrayAds as $key => $value) 
				    {
				        if($k != $key && $v['adsId'] == $value['adsId'])
				        {
				            unset($fullArrayAds[$k]);
				        }
				    }
				}
				
				/* GET ALL ADS */
				$IDS = '';
				foreach ($fullArrayAds as $key => $value) 
				{
					$IDS .= $value['adsId'] . ',';
				}
				$IDS = rtrim($IDS, ',');

				if($IDS != '')
				{
					if($type == null)
					{
						$adsQuery = 'SELECT ' . $selectJoin . ' FROM ads LEFT JOIN users ON users.id = ads.user_id WHERE ads.id IN (' . $IDS . ') AND (ads.category1 = ' . $catId . ' OR ads.category2 = ' . $catId . ' OR ads.category3 = ' . $catId . ' OR ads.category4 = ' . $catId . ' OR ads.category5 = ' . $catId . ' OR ads.category6 = ' . $catId . ' OR ads.category7 = ' . $catId . ' OR ads.category8 = ' . $catId . ' OR ads.category9 = ' . $catId . ' OR ads.category10 = ' . $catId . ') AND (ads.public_end_date > ' . time() . ') AND ads.status = 1';
					}
					else
					{
						$adsQuery = 'SELECT ' . $selectJoin . ' FROM ads LEFT JOIN users ON users.id = ads.user_id WHERE ads.id IN (' . $IDS . ') AND users.activity_area = ' . $type . ' AND (ads.category1 = ' . $catId . ' OR ads.category2 = ' . $catId . ' OR ads.category3 = ' . $catId . ' OR ads.category4 = ' . $catId . ' OR ads.category5 = ' . $catId . ' OR ads.category6 = ' . $catId . ' OR ads.category7 = ' . $catId . ' OR ads.category8 = ' . $catId . ' OR ads.category9 = ' . $catId . ' OR ads.category10 = ' . $catId . ') AND (ads.public_end_date > ' . time() . ') AND ads.status = 1';
					}

					$adsQueryResultFull = $db->query($adsQuery);
					$adsQueryResultFull->execute();
					$resultAdsFull = $adsQueryResultFull->fetchAll(PDO::FETCH_ASSOC);

					/* FILTER ADS */
					$fullAds = array();
					foreach ($resultAdsFull as $ads) 
					{
						$push      = false;
						$pushPrice = false;

						/* CHECK LOCATION */
						if(issetGet('city') AND get('city') != '')
						{
							if($ads['adCity'] == get('city'))
							{
								$push = true;
							}

							if(issetGet('county') AND get('county') != '')
							{
								if($ads['adCounty'] == get('county'))
								{
									$push = true;
								}
								else
								{
									$push = false;
								}
							}
						}
						else
						{
							$push = true;
						}

						/* CHECK PRICE */
						if(issetGet('priceMin') AND get('priceMin') != '' AND issetGet('priceMax') AND get('priceMax') != '')
						{
							if(get('priceMin') <= $ads['price'] AND get('priceMax') >= $ads['price'])
							{
								$pushPrice = true;
							}
						}
						elseif(issetGet('priceMin') AND get('priceMin') != '')
						{
							if(get('priceMin') <= $ads['price'])
							{
								$pushPrice = true;
							}
						}
						elseif(issetGet('priceMax') AND get('priceMax') != '')
						{
							if(get('priceMax') >= $ads['price'])
							{
								$pushPrice = true;
							}
						}
						else
						{
							$pushPrice = true;
						}
						
						if($push === true AND $pushPrice === true)
						{
							$getUserStore = $Store->getUserStore($ads['user_id']);

							if($getUserStore !== false)
							{
								if($getUserStore['end_time'] > time() AND $getUserStore['status'] != 2)
								{
									$fullAds[] = $ads;
								}
							}
							else
							{
								$fullAds[] = $ads;
							}
						}
					}

					$whereInFullAds = '';
					foreach ($fullAds as $ads) 
					{
						$whereInFullAds .= $ads['adId'] . ', ';
					}
					$whereInFullAds = rtrim($whereInFullAds, ', ');

					if($whereInFullAds != '')
					{
						$adsQuery = 'SELECT ' . $select . ' FROM ads WHERE id IN (' . $whereInFullAds . ')';

						/* GET ROWS COUNT */
						$adsQueryCount = $db->query($adsQuery);
						$adsQueryCount->execute();
						$resultAdsCount = $adsQueryCount->rowCount();

						/* GET ROWS */
						$adsQueryResult = $db->query($adsQuery . $orderbySql . ' LIMIT ' . $offset . ',' . $items_per_page);
						$adsQueryResult->execute();
						$resultAds = $adsQueryResult->fetchAll(PDO::FETCH_ASSOC);

						/* ROWS PAGINATION */
						if (0 !== $resultAdsCount) 
						{  
						    $page_count = (int)ceil($resultAdsCount / $items_per_page);
						   	if($page > $page_count) 
						   	{
						       $page = 1;
						   	}
						}

						$pagination = pagination($items_per_page, $page_count, $page, $actualLink);
					}

					/* CATEGORY DOPING UPS */
					// itemslerden cixan neticelerden eger ust sira (doping up) varsa hamisini listele
					$dopingUpQuery = $adsQuery . ' AND doping_up = 1'  . (!$orderby ? ' ORDER BY public_start_date DESC' : $orderbySql);

					$dopingUpQuery = $db->query($dopingUpQuery);
					$dopingUpQuery->execute();
					$resultAdsQueryUpFull = $dopingUpQuery->fetchAll(PDO::FETCH_ASSOC);
				}
			}
			else
			{
				// burdada sadece axtarisda default olanlar axtarilacaq (modul itemslerinden hec biri secilmeyibse, il, ilce ve ya fiyat secilibse)
				if($type === null)
				{
					$adsQuery = 'SELECT ' . $selectJoin . ' FROM ads LEFT JOIN users ON users.id = ads.user_id WHERE ';
				}
				else
				{
					$adsQuery = 'SELECT ' . $selectJoin . ' FROM ads LEFT JOIN users ON users.id = ads.user_id WHERE users.activity_area = ' . $type . ' AND ';
				}

				if(issetGet('city') AND get('city') != '')
				{
					$adsQuery .= 'ads.city = ' . get('city') . ' AND ';

					if(issetGet('county') AND get('county') != '')
					{
						$adsQuery .= 'ads.county = ' . get('county') . ' AND ';
					}
				}

				if(issetGet('priceMin') AND get('priceMin') != '' AND issetGet('priceMax') AND get('priceMax') != '')
				{
					$adsQuery .= 'ads.price >= ' . get('priceMin') . ' AND ads.price <= ' . get('priceMax') . ' AND ';
				}
				elseif(issetGet('priceMin') AND get('priceMin') != '')
				{
					$adsQuery .= 'ads.price >= ' . get('priceMin') . ' AND ';
				}
				elseif(issetGet('priceMax') AND get('priceMax') != '')
				{
					$adsQuery .= 'ads.price <= ' . get('priceMax') . ' AND ';
				}

				$adsQuery  .= '(ads.category1 = ' . $catId . ' OR ads.category2 = ' . $catId . ' OR ads.category3 = ' . $catId . ' OR ads.category4 = ' . $catId . ' OR ads.category5 = ' . $catId . ' OR ads.category6 = ' . $catId . ' OR ads.category7 = ' . $catId . ' OR ads.category8 = ' . $catId . ' OR ads.category9 = ' . $catId . ' OR ads.category10 = ' . $catId . ') AND (ads.public_end_date > ' . time() . ') AND ads.status = 1';

				/* GET ROWS ALL */
				$adsQueryResultAll = $db->query($adsQuery);
				$adsQueryResultAll->execute();
				$resultAdsAll = $adsQueryResultAll->fetchAll(PDO::FETCH_ASSOC);

				$fullAdsAll = array();
				foreach ($resultAdsAll as $ads) 
				{
					$getUserStore = $Store->getUserStore($ads['user_id']);

					if($getUserStore !== false)
					{
						if($getUserStore['end_time'] > time() AND $getUserStore['status'] != 2)
						{
							$fullAdsAll[] = $ads;
						}
					}
					else
					{
						$fullAdsAll[] = $ads;
					}
				}

				$whereInFullAdsAll = '';
				foreach ($fullAdsAll as $ads) 
				{
					$whereInFullAdsAll .= $ads['adId'] . ', ';
				}
				$whereInFullAdsAll = rtrim($whereInFullAdsAll, ', ');

				if($whereInFullAdsAll != '')
				{
					$adsQuerySql = 'SELECT ' . $select . ' FROM ads WHERE id IN (' . $whereInFullAdsAll . ')';

					/* GET ROW COUNT */
					$adsQueryCount  = $db->query($adsQuerySql);
					$adsQueryCount->execute();
					$resultAdsCount = $adsQueryCount->rowCount();

					/* GET ROWS */
					$adsQuerySql = 'SELECT ' . $select . ' FROM ads WHERE id IN (' . $whereInFullAdsAll . ')' . $orderbySql . ' LIMIT ' . $offset . ',' . $items_per_page;

					$adsQuerySql = $db->query($adsQuerySql);
					$adsQuerySql->execute();
					$resultAds = $adsQuerySql->fetchAll(PDO::FETCH_ASSOC);

					/* ROWS PAGINATION */
					if (0 !== $resultAdsCount) 
					{  
					    $page_count = (int)ceil($resultAdsCount / $items_per_page);
					   	if($page > $page_count) 
					   	{
					       	$page = 1;
					   	}
					}

					$pagination = pagination($items_per_page, $page_count, $page, $actualLink);
				}

				/* CATEGORY DOPING UPS */
				$dopingUpQuery = $adsQuery . ' AND ads.doping_up = 1'  . (!$orderby ? ' ORDER BY ads.public_start_date DESC' : $orderbySqlUpNoItems);
		
				$dopingUpQuery = $db->query($dopingUpQuery);
				$dopingUpQuery->execute();
				$resultAdsQueryUpFull = $dopingUpQuery->fetchAll(PDO::FETCH_ASSOC);
			}

			/* ACTUAL LINK ORDER BY */
			$actualLinkOrderBy = str_replace(array('&orderby=pricehigh', '&orderby=pricelow', '&orderby=datenew', '&orderby=dateold', '&orderby=kmlow', '&orderby=kmhigh', '&orderby=yearold', '&orderby=yearnew'), array('', '', '', '', '', '', '', ''), $actualLink);

			$returnArray['categoryInfo']          = $categoryInfo;
			$returnArray['categoryAds']           = $resultAds;
			$returnArray['categoryAdsCount']      = $resultAdsCount;
			$returnArray['categoryDopingUpAds']   = $resultAdsQueryUpFull;
			$returnArray['categoryAdsPagination'] = $pagination;
			$returnArray['actualLink']            = $actualLink;
			$returnArray['actualLinkOrderBy']     = $actualLinkOrderBy;
			$returnArray['categoryModulItems']    = $Modul->categoryModulItems($catId, false);
			$returnArray['cities']                = $Other->cities();
			$returnArray['Category']              = $Category;
			$returnArray['Ads']                   = $Ads;
		}
		else
		{
			redirect();
		}
	}
	else
	{
		redirect();
	}

	$smarty->assign('return', $returnArray);
	$smarty->display('category.tpl');

?>