<?php

	# @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-14 22:27:56
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-09-23 21:05:13
	
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
				$orderbySql = ' ORDER BY price DESC';
			}
			elseif($orderby == 'pricelow')
			{
				$orderbySql = ' ORDER BY price ASC';
			}
			elseif($orderby == 'datenew')
			{
				$orderbySql = ' ORDER BY create_time DESC';
			}
			elseif($orderby == 'dateold')
			{
				$orderbySql = ' ORDER BY create_time ASC';
			}
			elseif($orderby == 'kmlow')
			{
				$orderbySql = ' ORDER BY km ASC';
			}
			elseif($orderby == 'kmhigh')
			{
				$orderbySql = ' ORDER BY km DESC';
			}
			elseif($orderby == 'yearold')
			{
				$orderbySql = ' ORDER BY year ASC';
			}
			elseif($orderby == 'yearnew')
			{
				$orderbySql = ' ORDER BY year DESC';
			}
			else
			{
				$orderbySql = ' ORDER BY create_time DESC';
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
			$betweenQuery    = 'SELECT * FROM ads_items_values WHERE ';
			$select          = '*, ads.id AS adId, ads.city AS adCity, ads.county AS adCounty, ads.area AS adArea, ads.neighborhood AS adNeighborhood, ads.status AS adStatus, ads.seflink AS adSeflink';
			$whereInValues   = '';
			$lock            = false;
			$fullArrayAds    = array();
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
								$betweenQuery .= ' && itemValue >= ' . get('item_' . $itemMinMax[0] . '_min');
							}
							elseif(get('item_' . $itemMinMax[0] . '_min') == '' AND get('item_' . $itemMinMax[0] . '_max') != '')
							{
								$betweenQuery .= ' && itemValue <= ' . get('item_' . $itemMinMax[0] . '_max');
							}
							elseif(get('item_' . $itemMinMax[0] . '_min') != '' AND get('item_' . $itemMinMax[0] . '_max') != '')
							{
								$betweenQuery .= ' && itemValue >= ' . get('item_' . $itemMinMax[0] . '_min') . ' && itemValue <= ' . get('item_' . $itemMinMax[0] . '_max');
							}

							$betweenQueryPDO = $db->query($betweenQuery);
							$betweenQueryPDO->execute();
							$betweenQueryResult = $betweenQueryPDO->fetchAll(PDO::FETCH_ASSOC);

							if(get('item_' . $itemMinMax[0] . '_min') != '' AND get('item_' . $itemMinMax[0] . '_max') == '')
							{
								foreach ($betweenQueryResult as $key => $value) 
								{
									if($value['itemValue'] >= get('item_' . $itemMinMax[0] . '_min'))
									{
										array_push($fullArrayAds, $value);
									}
								}
							}
							elseif(get('item_' . $itemMinMax[0] . '_min') == '' AND get('item_' . $itemMinMax[0] . '_max') != '')
							{
								foreach ($betweenQueryResult as $key => $value) 
								{
									if($value['itemValue'] <= get('item_' . $itemMinMax[0] . '_max'))
									{
										array_push($fullArrayAds, $value);
									}
								}
							}
							elseif(get('item_' . $itemMinMax[0] . '_min') != '' AND get('item_' . $itemMinMax[0] . '_max') != '')
							{
								foreach ($betweenQueryResult as $key => $value) 
								{
									if($value['itemValue'] >= get('item_' . $itemMinMax[0] . '_min') AND $value['itemValue'] <= get('item_' . $itemMinMax[0] . '_max'))
									{
										array_push($fullArrayAds, $value);
									}
								}
							}

							$betweenQuery = 'SELECT * FROM ads_items_values WHERE ';

						}

						if($itemMinMax[1] == 'max')
						{
							$lock = false;
						}
					}
					elseif($itemInfo['classx'] == 2) // select
					{
						$whereInValues .= 'itemSelect = ' . $itemValue . ' || ';
					}
					elseif($itemInfo['classx'] == 3) // input text
					{

					}
				}

				$whereInValues = rtrim($whereInValues, ' || ');

				if($whereInValues != '')
				{
					$fullArrayAds = array();

					/* SELECT VALUES */
					$queryItemValues  = 'SELECT * FROM ads_items_values WHERE ' . $whereInValues . ' GROUP BY adsId';
					$queryItemValues = $db->query($queryItemValues);
					$queryItemValues->execute();
					$resultItemValues = $queryItemValues->fetchAll(PDO::FETCH_ASSOC);

					var_dump($resultItemValues);

					/* PUSH SELECT ARRAYS */
					foreach ($resultItemValues as $key => $value) 
					{
						array_push($fullArrayAds, $value);
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
						$adsQuery = 'SELECT ' . $select . ' FROM ads LEFT JOIN users ON users.id = ads.user_id WHERE ads.id IN (' . $IDS . ') AND (ads.category1 = ' . $catId . ' OR ads.category2 = ' . $catId . ' OR ads.category3 = ' . $catId . ' OR ads.category4 = ' . $catId . ' OR ads.category5 = ' . $catId . ' OR ads.category6 = ' . $catId . ' OR ads.category7 = ' . $catId . ' OR ads.category8 = ' . $catId . ' OR ads.category9 = ' . $catId . ' OR ads.category10 = ' . $catId . ') AND (ads.public_end_date > ' . time() . ') AND ads.status = 1';
					}
					else
					{
						$adsQuery = 'SELECT ' . $select . ' FROM ads LEFT JOIN users ON users.id = ads.user_id WHERE ads.id IN (' . $IDS . ') AND users.activity_area = ' . $type . ' AND (ads.category1 = ' . $catId . ' OR ads.category2 = ' . $catId . ' OR ads.category3 = ' . $catId . ' OR ads.category4 = ' . $catId . ' OR ads.category5 = ' . $catId . ' OR ads.category6 = ' . $catId . ' OR ads.category7 = ' . $catId . ' OR ads.category8 = ' . $catId . ' OR ads.category9 = ' . $catId . ' OR ads.category10 = ' . $catId . ') AND (ads.public_end_date > ' . time() . ') AND ads.status = 1';
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
								if($ads['adCity'] == get('county'))
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
						$adsQuery = 'SELECT * FROM ads WHERE id IN (' . $whereInFullAds . ')';

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
					$dopingUpQuery = $adsQuery . ' AND ads.doping_up = 1';

					$dopingUpQuery = $db->query($dopingUpQuery);
					$dopingUpQuery->execute();
					$adsQueryUpFull = $dopingUpQuery->fetchAll(PDO::FETCH_ASSOC);

					$fullAdsUps = array();
					foreach ($adsQueryUpFull as $ads) 
					{
						$push      = false;
						$pushPrice = false;

						/* CHECK LOCATION */
						if(issetGet('city') AND get('city') != '')
						{
							if($ads['city'] == get('city'))
							{
								$push = true;
							}

							if(issetGet('county') AND get('county') != '')
							{
								if($ads['county'] == get('county'))
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
									$fullAdsUps[] = $ads;
								}
							}
							else
							{
								$fullAdsUps[] = $ads;
							}
						}
					}

					$whereInFullAdsUps = '';
					foreach ($fullAdsUps as $ads) 
					{
						$whereInFullAdsUps .= $ads['id'] . ', ';
					}
					$whereInFullAdsUps = rtrim($whereInFullAdsUps, ', ');

					if($whereInFullAdsUps != '')
					{
						$adsQueryUpSql = 'SELECT * FROM ads WHERE id IN (' . $whereInFullAdsUps . ')' . (!$orderby ? ' ORDER BY public_start_date DESC' : $orderbySql);

						$adsQueryUpSql = $db->query($adsQueryUpSql);
						$adsQueryUpSql->execute();
						$resultAdsQueryUpFull = $adsQueryUpSql->fetchAll(PDO::FETCH_ASSOC);
					}
				}
			}
			else
			{
				// burdada sadece axtarisda default olanlar axtarilacaq (modul itemslerinden hec biri secilmeyibse)
				if($type === null)
				{
					$adsQuery = 'SELECT ' . $select . ' FROM ads LEFT JOIN users ON users.id = ads.user_id WHERE ';
				}
				else
				{
					$adsQuery = 'SELECT ' . $select . ' FROM ads LEFT JOIN users ON users.id = ads.user_id WHERE users.activity_area = ' . $type . ' AND ';
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
					$adsQuerySql = 'SELECT * FROM ads WHERE id IN (' . $whereInFullAdsAll . ')';

					/* GET ROW COUNT */
					$adsQueryCount  = $db->query($adsQuerySql);
					$adsQueryCount->execute();
					$resultAdsCount = $adsQueryCount->rowCount();

					/* GET ROWS */
					$adsQuerySql = 'SELECT * FROM ads WHERE id IN (' . $whereInFullAdsAll . ')' . $orderbySql . ' LIMIT ' . $offset . ',' . $items_per_page;

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
				$dopingUpQuery = $adsQuery . ' AND ads.doping_up = 1';
		
				$dopingUpQuery = $db->query($dopingUpQuery);
				$dopingUpQuery->execute();
				$adsQueryUpFull = $dopingUpQuery->fetchAll(PDO::FETCH_ASSOC);

				$fullAdsUps = array();
				foreach ($adsQueryUpFull as $ads) 
				{
					$getUserStore = $Store->getUserStore($ads['user_id']);

					if($getUserStore !== false)
					{
						if($getUserStore['end_time'] > time() AND $getUserStore['status'] != 2)
						{
							$fullAdsUps[] = $ads;
						}
					}
					else
					{
						$fullAdsUps[] = $ads;
					}
				}

				$whereInFullAdsUps = '';
				foreach ($fullAdsUps as $ads) 
				{
					$whereInFullAdsUps .= $ads['adId'] . ', ';
				}
				$whereInFullAdsUps = rtrim($whereInFullAdsUps, ', ');

				if($whereInFullAdsUps != '')
				{
					$adsQueryUpSql = 'SELECT * FROM ads WHERE id IN (' . $whereInFullAdsUps . ')' . (!$orderby ? ' ORDER BY public_start_date DESC' : $orderbySql);

					$adsQueryUpSql = $db->query($adsQueryUpSql);
					$adsQueryUpSql->execute();
					$resultAdsQueryUpFull = $adsQueryUpSql->fetchAll(PDO::FETCH_ASSOC);
				}
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