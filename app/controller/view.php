<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-28 15:38:59
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-09-22 11:54:20
	
	$seflink = get('seflink');
	$id      = get('id');

	if($seflink != '' AND $id != '')
	{
		$adInfo = $Ads->adInfo($id);
		$getUserStore = $Store->getUserStore($adInfo['user_id']);

		$showAd = false;

		if(!session('adminLogin'))
		{
			if($getUserStore !== false)
			{
				if($getUserStore['end_time'] > time())
				{
					if($adInfo['seflink'] == $seflink)
					{
						if($adInfo['status'] == 1 AND $adInfo['public_end_date'] > time())
						{
							$showAd = true;
						}
						elseif($adInfo['user_id'] == session('userId'))
						{
							if($adInfo['status'] == 4 || $adInfo['status'] == 2)
							{
								$showAd = true;
							}
						}
					}
				}
			}
			else
			{
				if($adInfo['seflink'] == $seflink)
				{
					if($adInfo['status'] == 1 AND $adInfo['public_end_date'] > time())
					{
						$showAd = true;
					}
					elseif($adInfo['user_id'] == session('userId'))
					{
						if($adInfo['status'] == 4 || $adInfo['status'] == 2)
						{
							$showAd = true;
						}
					}
				}
			}
		}
		else
		{
			$showAd = true;
		}

		if($showAd === true)
		{
			if(!session('lockViewCount'))
			{
				$db->update('ads')->where('id', $id)->set('hit', '+1');
				$db->update('users')->where('id', $adInfo['user_id'])->set('daylingViewAds', '+1'); // dayling

				setSession('lockViewCount', true);
			}

			$getLastCategory  = $Ads->adGetLastCategory($id);
			$categoryInfo     = $Category->categoryInfo($getLastCategory);
			$getCategoryModul = $Modul->getCategoryModul($categoryInfo['Id']); // get category modul
			$categoryFeatures = $Modul->categoryFeatures($getCategoryModul['modulId'], false, $id);

			$returnArray['adInfo']            = $adInfo;
			$returnArray['adImages']          = $Ads->adImages($id);
			$returnArray['adItems']           = $Ads->adItems($id);
			$returnArray['categoryFeatures']  = $categoryFeatures;
			$returnArray['categoryInfo']      = $categoryInfo;
			$returnArray['Ads']               = $Ads;
			$returnArray['Category']          = $Category;
			$returnArray['getUserStore']      = $Store->getUserStore($adInfo['user_id']);
			$returnArray['siteConfig']        = $config;
			$returnArray['bannerViewDesktop'] = $Banner->getBannerInfo(1);
			$returnArray['bannerViewMobile']  = $Banner->getBannerInfo(2);
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
	$smarty->display('view.tpl');

?>