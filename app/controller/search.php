<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-09-15 18:18:43
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-09-21 10:36:02
	
	$query = get('query');

	if(is_numeric($query)) // ilan no'ya gore arama
	{
		$adInfo = $Ads->adInfo($query);

		if($adInfo !== false)
		{
			$getUserStore = $Store->getUserStore($adInfo['user_id']);

			$showAd = false;

			if(!session('adminLogin'))
			{
				if($getUserStore !== false)
				{
					if($getUserStore['end_time'] > time())
					{
						if($adInfo['status'] == 1 AND $adInfo['public_end_date'] > time())
						{
							$showAd = true;
						}
					}
				}
				else
				{
					if($adInfo['status'] == 1 AND $adInfo['public_end_date'] > time())
					{
						$showAd = true;
					}
				}
			}
			else
			{
				$showAd = true;
			}

			if($showAd === true)
			{
				redirect('view/' . $adInfo['seflink'] . '-' . $adInfo['id']);
			}
			else
			{
				$returnArray['notfound'] = true;
			}
		}
		else
		{
			$returnArray['notfound'] = true;
		}
	}
	else
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

		$adsQuery = "SELECT * FROM ads WHERE lower(title) LIKE '%" . $query . "%' AND ";

		if(issetGet('city') AND get('city') != '')
		{
			$adsQuery .= 'city = ' . get('city') . ' AND ';

			if(issetGet('county') AND get('county') != '')
			{
				$adsQuery .= 'county = ' . get('county') . ' AND ';
			}
		}

		if(issetGet('priceMin') AND get('priceMin') != '' AND issetGet('priceMax') AND get('priceMax') != '')
		{
			$adsQuery .= 'price >= ' . get('priceMin') . ' AND price <= ' . get('priceMax') . ' AND ';
		}
		elseif(issetGet('priceMin') AND get('priceMin') != '')
		{
			$adsQuery .= 'price >= ' . get('priceMin') . ' AND ';
		}
		elseif(issetGet('priceMax') AND get('priceMax') != '')
		{
			$adsQuery .= 'price <= ' . get('priceMax') . ' AND ';
		}

		$adsQuery  .= '(public_end_date > ' . time() . ') AND status = 1';

		/* RESULT ADS */
		$adsQueryResultFull = $db->query($adsQuery);
		$adsQueryResultFull->execute();
		$resultAdsFull = $adsQueryResultFull->fetchAll(PDO::FETCH_ASSOC);
		
		$fullAds = array();
		foreach ($resultAdsFull as $ads) 
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

		$whereInFullAds = '';
		foreach ($fullAds as $ads) 
		{
			$whereInFullAds .= $ads['id'] . ', ';
		}
		$whereInFullAds = rtrim($whereInFullAds, ', ');

		if($whereInFullAds != '')
		{
			$adsQuerySql = 'SELECT * FROM ads WHERE id IN (' . $whereInFullAds . ')';

			/* GET ROW COUNT */
			$adsQueryCount  = $db->query($adsQuerySql);
			$adsQueryCount->execute();
			$resultAdsCount = $adsQueryCount->rowCount();

			/* GET ROWS */
			$adsQuerySql = 'SELECT * FROM ads WHERE id IN (' . $whereInFullAds . ')' . $orderbySql . ' LIMIT ' . $offset . ',' . $items_per_page;
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
	}

	/* ACTUAL LINK ORDER BY */
	$actualLinkOrderBy = str_replace(array('&orderby=pricehigh', '&orderby=pricelow', '&orderby=datenew', '&orderby=dateold', '&orderby=kmlow', '&orderby=kmhigh', '&orderby=yearold', '&orderby=yearnew'), array('', '', '', '', '', '', '', ''), $actualLink);

	$returnArray['searchAds']           = $resultAds;
	$returnArray['searchAdsCount']      = $resultAdsCount;
	$returnArray['searchAdsPagination'] = $pagination;
	$returnArray['actualLink']          = $actualLink;
	$returnArray['actualLinkOrderBy']   = $actualLinkOrderBy;
	$returnArray['cities']              = $Other->cities();
	$returnArray['Category']            = $Category;
	$returnArray['Ads']                 = $Ads;

	$smarty->assign('return', $returnArray);
	$smarty->display('search.tpl');

?>