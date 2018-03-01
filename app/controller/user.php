<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-09-12 16:40:31
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-09-20 14:53:12
	
	$userId      = get('userId');
	$userSeflink = get('userSeflink');

	if($userId != '' AND $userSeflink != '')
	{
		$userInfo = $User->userInfo($userId);

		if($userInfo['seflink'] == $userSeflink)
		{
			/* ACTUAL LINK */
			$actualLink = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

			/* ACTUAL LINK ORDER BY */
			$actualLinkOrderBy = str_replace(array('&orderby=pricehigh', '&orderby=pricelow', '&orderby=datenew', '&orderby=dateold', '&orderby=kmlow', '&orderby=kmhigh', '&orderby=yearold', '&orderby=yearnew'), array('', '', '', '', '', '', '', ''), $actualLink);

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
			$adsQuery = 'SELECT * FROM ads WHERE user_id = ' . $userId . ' AND ';

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

			/* ADS COUNT */
			$adsQueryCount  = $db->query($adsQuery);
			$adsQueryCount->execute();
			$resultAdsCount = $adsQueryCount->rowCount();

			/* RESULT ADS */
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

			$returnArray['userAds']           = $resultAds;
			$returnArray['userAdsCount']      = $resultAdsCount;
			$returnArray['pagination']        = $pagination;
			$returnArray['actualLink']        = $actualLink;
			$returnArray['actualLinkOrderBy'] = $actualLinkOrderBy;
			$returnArray['cities']            = $Other->cities();
			$returnArray['Ads']               = $Ads;

			$smarty->assign('return', $returnArray);
			$smarty->display('user.tpl');
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
	
?>