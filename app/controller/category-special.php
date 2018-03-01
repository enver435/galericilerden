<?php

	# @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-14 22:27:56
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-09-15 07:35:44
	
	$catType     = get('catType');
	$returnArray = array();

	if($catType != '')
	{
		if($catType == 'ilk-sahibinden')
		{
			$catTypeQuery = ' AND ads.doping_sahibinden = 1';
		}
		elseif($catType == 'yeni-gibi')
		{
			$catTypeQuery = ' AND ads.doping_yenigibi = 1';
		}
		elseif($catType == 'ekspertizli')
		{
			$catTypeQuery = ' AND ads.doping_ekspertizli = 1';
		}
		elseif($catType == 'acil')
		{
			$catTypeQuery = ' AND ads.doping_acil = 1';
		}
		elseif($catType == 'fiyati-dusenler')
		{
			$catTypeQuery = ' AND ads.doping_fiyatidusenler = 1';
		}
		else
		{
			redirect();
		}

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
		$select = '*, ads.id AS adId, ads.city AS adCity, ads.county AS adCounty, ads.area AS adArea, ads.neighborhood AS adNeighborhood, ads.status AS adStatus, ads.seflink AS adSeflink';
		$type   = (!issetGet('type')) ? null : get('type');

		if($type !== null)
		{
			if($Ads->checkTypeAds(null, $catType, $type) === false)
			{
				redirect('category-special/' . $catType);
			}
		}

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

		$adsQuery  .= '(ads.public_end_date > ' . time() . ') AND ads.status = 1' . $catTypeQuery;

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
			$whereInFullAds .= $ads['adId'] . ', ';
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

		/* RESULT ADS DOPING UPS */
		$dopingUpQuery = $adsQuery . ' AND ads.doping_up = 1';

		$adsQueryResultFullUps = $db->query($dopingUpQuery);
		$adsQueryResultFullUps->execute();
		$resultAdsUpsFull = $adsQueryResultFullUps->fetchAll(PDO::FETCH_ASSOC);

		$fullAdsUps = array();
		foreach ($resultAdsUpsFull as $ads) 
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
			/* GET ROWS */
			$dopingUpQuery = 'SELECT * FROM ads WHERE id IN (' . $whereInFullAdsUps . ')' . (!$orderby ? ' ORDER BY public_start_date DESC' : $orderbySql);

			$dopingUpQuery = $db->query($dopingUpQuery);
			$dopingUpQuery->execute();
			$resultDopingUp = $dopingUpQuery->fetchAll(PDO::FETCH_ASSOC);
		}

		/* ACTUAL LINK ORDER BY */
		$actualLinkOrderBy = str_replace(array('&orderby=pricehigh', '&orderby=pricelow', '&orderby=datenew', '&orderby=dateold', '&orderby=kmlow', '&orderby=kmhigh', '&orderby=yearold', '&orderby=yearnew'), array('', '', '', '', '', '', '', ''), $actualLink);

		$returnArray['categoryAds']           = $resultAds;
		$returnArray['categoryAdsCount']      = $resultAdsCount;
		$returnArray['categoryDopingUpAds']   = $resultDopingUp;
		$returnArray['categoryAdsPagination'] = $pagination;
		$returnArray['actualLink']            = $actualLink;
		$returnArray['actualLinkOrderBy']     = $actualLinkOrderBy;
		$returnArray['cities']                = $Other->cities();
		$returnArray['Category']              = $Category;
		$returnArray['Ads']                   = $Ads;
		
	}
	else
	{
		redirect();
	}

	$smarty->assign('return', $returnArray);
	$smarty->display('category-special.tpl');

?>