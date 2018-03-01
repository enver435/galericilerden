<?php
	
	# @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-07-31 15:02:45
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2018-01-19 13:51:21
	
	if(issetPost('login'))
	{

		$user = post('user');
		$pass = post('pass');

		if($user != '' AND $pass != '')
		{
			$login = $Admin->adminLogin($user, $pass);

			if($login !== false)
			{
				redirect(SITE_ADMIN);
			}
		}

	}

	if(issetPost('corporateUpdate'))
	{
		$activity_area = post('activity_area');

		if($activity_area != 'empty')
		{
			if($activity_area > 0)
			{
				$UserAdmin->update(session('userId'), array('user_status' => 2, 'activity_area' => $activity_area, 'corporateMessage' => 0, 'corporateRequest' => 0));
			}
			else
			{
				$UserAdmin->update(session('userId'), array('user_status' => 1, 'activity_area' => 0, 'corporateMessage' => 0, 'corporateRequest' => 0));
			}
		}
	}

	$returnArray['allAdsCount']           = $AdsAdmin->ads('all');
	$returnArray['pendingAdsCount']       = $AdsAdmin->ads('pending');
	$returnArray['allActiveAdsCount']     = $AdsAdmin->ads('active');
	$returnArray['allPassiveAdsCount']    = $AdsAdmin->ads('expired');
	$returnArray['pendingStoreCount']     = $StoreAdmin->stores('pending');
	$returnArray['allActiveStoreCount']   = $StoreAdmin->stores('not-expired');
	$returnArray['usersCount']            = $UserAdmin->users();
	$returnArray['dailyVisitors']         = $Visitors->dailyVisitors();
	$returnArray['corporateRequestUsers'] = $UserAdmin->corporateRequestUsers();

	$smarty->assign('return', $returnArray);
	$smarty->display('admin/index.tpl');

?>
