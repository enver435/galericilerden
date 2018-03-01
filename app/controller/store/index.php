<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-31 11:46:11
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-09-19 14:11:29
	
	$actualLink         = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$getStoreDomainInfo = $Store->getStoreDomainInfo($storeSubdomain);

	/* ORDER BY */
	$orderby = get('orderby');

	if($orderby == 'pricehigh')
	{
		$orderBy        = 'price';
		$orderByDescAsc = 'DESC';
	}
	elseif($orderby == 'pricelow')
	{
		$orderBy        = 'price';
		$orderByDescAsc = 'ASC';
	}
	elseif($orderby == 'datenew')
	{
		$orderBy        = 'create_time';
		$orderByDescAsc = 'DESC';
	}
	elseif($orderby == 'dateold')
	{
		$orderBy        = 'create_time';
		$orderByDescAsc = 'ASC';
	}
	elseif($orderby == 'kmlow')
	{
		$orderBy        = 'km';
		$orderByDescAsc = 'ASC';
	}
	elseif($orderby == 'kmhigh')
	{
		$orderBy        = 'km';
		$orderByDescAsc = 'DESC';
	}
	elseif($orderby == 'yearold')
	{
		$orderBy        = 'year';
		$orderByDescAsc = 'ASC';
	}
	elseif($orderby == 'yearnew')
	{
		$orderBy        = 'year';
		$orderByDescAsc = 'DESC';
	}
	else
	{
		$orderBy        = 'create_time';
		$orderByDescAsc = 'DESC';
	}

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

	/* ADS ROWS */
	if(!get('catId'))
	{
		$ads      = $Ads->userAds($getStoreDomainInfo['user_id'], $orderBy, $orderByDescAsc, $offset, $items_per_page);
		$adsCount = count($Ads->userAds($getStoreDomainInfo['user_id'], $orderBy, $orderByDescAsc, null, null));
	}
	else
	{
		$ads      = $Ads->categoryStoreAds(get('catId'), $getStoreDomainInfo['user_id'], $orderBy, $orderByDescAsc, $offset, $items_per_page);
		$adsCount = count($Ads->categoryStoreAds(get('catId'), $getStoreDomainInfo['user_id'], $orderBy, $orderByDescAsc, null, null));
	}

	if (0 !== $adsCount) 
	{  
	    $page_count = (int)ceil($adsCount / $items_per_page);
	   	if($page > $page_count) 
	   	{
	       $page = 1;
	   	}
	}

	$pagination = paginationStore($items_per_page, $page_count, $page, $actualLink);

	$actualLinkPageSize = str_replace(array('&pageSize=15', '?pageSize=15', '?pageSize=50', '&pageSize=50', '?page=' . get('page'), '&page=' . get('page')), array('', '', '', '', '', ''), $actualLink); 

	$returnArray['storeInfo']          = $getStoreDomainInfo;
	$returnArray['storeAds']           = $ads;
	$returnArray['storeAdsCount']      = $adsCount;
	$returnArray['pagination']         = $pagination;
	$returnArray['actualLink']         = $actualLink;
	$returnArray['actualLinkPageSize'] = $actualLinkPageSize;
	$returnArray['Category']           = $Category;
	$returnArray['Ads']                = $Ads;
	$returnArray['realDomain']         = (isset($_SERVER['HTTPS']) ? "https" : "http") . '://' . $matches[1] . $config['siteStoreDomain'];

	$smarty->assign('return', $returnArray);
	$smarty->display('store/index.tpl');

?>