<?php

	# @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-07-31 15:02:45
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-09-15 16:43:06
	
	$returnArray['Ads']              = $Ads;
	$returnArray['showCaseHomeAds']  = $Ads->showCaseHomeAds();
	$returnArray['showCaseAcil']     = $Ads->showCaseAcil();
	$returnArray['lastAds']          = $Ads->lastAds();
	$returnArray['stores']           = $Store->stores('*', 10);
	$returnArray['siteConfig']       = $config;
	$returnArray['sliders']          = $Slider->sliders();
	$returnArray['bannerHome']       = $Banner->getBannerInfo(0);
	$returnArray['bannerHomeMobile'] = $Banner->getBannerInfo(3);

	$smarty->assign('return', $returnArray);
	$smarty->display('index.tpl');

?>
