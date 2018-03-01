<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-09-11 09:52:15
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-09-15 10:47:07
	
	if(session('login'))
	{
		$getChart = $Chart->getChart(session('userId'));
		$userAds  = $Ads->userAds(session('userId'));

		$dataCountAd     = array();
		$dataCountAdView = array();

		if($getChart !== false)
		{
			foreach ($getChart as $chart) 
			{
				extract($chart);

			    $dataCountAd[]     = "[Date.UTC(" . date('Y', $time) . ", " . (date('m', $time) - 1) . ", " . date('d', $time) . "), $countAd]";
			    $dataCountAdView[] = "[Date.UTC(" . date('Y', $time) . ", " . (date('m', $time) - 1) . ", " . date('d', $time) . "), $countAdView]";
			}
		}

		$returnArray['dataCountAd']          = $dataCountAd;
		$returnArray['dataCountAdView']      = $dataCountAdView;
		$returnArray['userAdsCount']         = ($userAds !== false) ? count($userAds) : 0;
		$returnArray['countViewMonthly']     = $Chart->countAdsMonthly(session('userId'));
		$returnArray['countMessageMonthly']  = $Messages->countMessageMonthly(session('userId'));
		$returnArray['countFavoriteMonthly'] = $Favorites->countFavoriteMonthly(session('userId'));

		$smarty->assign('return', $returnArray);
		$smarty->display('my.tpl');
	}
	else
	{
		redirect('login');
	}

?>