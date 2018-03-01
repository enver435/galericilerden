<?php

	# @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-07-31 15:02:45
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2018-01-19 14:56:53

	require_once 'app/init.php';

	if(session('showAppHeader') != 'closedAppHeader')
	{
		setSession('showAppHeader', true);
	}

	$_url = get('url');
	$_url = array_filter(explode('/', $_url));

	$page_param = 0; // page parameter length

	$realDomain = explode('.', explode('/', $config['siteStoreDomain'])[0])[1];
	$pregMatch  = '/([^.]+)\.' . $realDomain[0] . '/';

	preg_match($pregMatch, $_SERVER['SERVER_NAME'], $matches);

	if(isset($matches[1]) AND $matches[1] != 'www') // eger subdomen varsa demeli magazaya giris edib. magaza fayllarini include et
	{
	    $storeSubdomain     = $matches[1];
	    $getStoreDomainInfo = $Store->getStoreDomainInfo($storeSubdomain);

	    if($getStoreDomainInfo !== false)
	    {
	    	$returnHeader['Notifications'] = $Notifications;
	    	$returnHeader['Messages']      = $Messages;
	    	$returnHeader['storeInfo']     = $getStoreDomainInfo;
	    	$returnHeader['siteConfig']    = $config;

	    	$smarty->assign('header', $returnHeader);
	    	$smarty->display('store/static/header.tpl');

	    	if(isset($_url[0])) 
			{
				if(file_exists(controller('store/' . $_url[0]))) 
				{
					require_once controller('store/' . $_url[0]);

					if((count($_url) - 1) > $page_param)
					{
						redirect($_url[0]);
					}
				}
				else
				{
					require_once controller('404');
				}
			}
			else
			{
				require_once controller('store/index');
			}
	    }
	    else
	    {
	    	require_once controller('404');
	    }
	}
	else
	{
		// url ssl deyilse
		/*if($_SERVER["HTTPS"] != "on")
		{
			$locationWWW = (stripos($_SERVER['HTTP_HOST'], 'www.') !== false) ? 'https://' : 'https://www.';

		    header('Location: ' . $locationWWW . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
		    exit();
		}*/

		if(@$_url[0] != 'uploads')
		{
			ob_start();
			if(isset($_url[0]) AND $_url[0] == SITE_ADMIN) 
			{
				$smarty->display('admin/static/header.tpl');

				if(isset($_url[1])) {
					if(file_exists(controller('admin/' . $_url[1]))) 
					{
						require_once controller('admin/' . $_url[1]);

						if((count($_url) - 2) > $page_param)
						{
							redirect($_url[0]);
						}
					}
					else
					{
						require_once controller('404');
					}
				}
				else
				{
					require_once controller('admin/index');
				}
				
				$smarty->display('admin/static/footer.tpl');
			}
			else
			{
				$returnHeader['Category']      = $Category;
				$returnHeader['Notifications'] = $Notifications;
				$returnHeader['Messages']      = $Messages;
				$returnHeader['News']          = $News;
				$returnHeader['Ads']           = $Ads;
				$returnHeader['siteConfig']    = $config;

				$smarty->assign('header', $returnHeader);
				$smarty->display('static/header.tpl');

				if(isset($_url[0])) 
				{
					if(file_exists(controller($_url[0]))) 
					{
						require_once controller($_url[0]);

						if((count($_url) - 1) > $page_param)
						{
							redirect($_url[0]);
						}
					}
					else
					{
						require_once controller('404');
					}
				}
				else
				{
					require_once controller('index');
				}

				$smarty->display('static/footer.tpl');
		 		
		 		// istifadəçi qeydiyyata aid heç bir post etməyibsə onda bunları et
				if(!issetPost('reg') AND !issetPost('activate'))
				{
					if(session('login'))
					{
						$userInfo = $User->userInfo(session('userId'));

						if($userInfo === false)
						{
							removeSession('login');
							removeSession('userId');
						}

						removeSession('phoneActivate');
						removeSession('regUserId');
						removeSession('activationCode');
					}
					else
					{
						if(session('phoneActivate'))
						{
							$User->delete(session('regUserId'));

							removeSession('phoneActivate');
							removeSession('regUserId');
							removeSession('activationCode');
						}
					}
				}

				// lock view count remove
				if(@$_url[0] != 'view')
				{
					removeSession('lockViewCount');
				}
			}
		}
		else
		{
			require_once controller('404');
		}
	}

	// günlük ziyaretçi sayısı
	$date = strtotime(date('d.m.Y') . '00:00');

	if($Visitors->checkIp($_SERVER['REMOTE_ADDR'], $date) === false)
	{
		$Visitors->add(
			array(
				'ip'   => $_SERVER['REMOTE_ADDR'],
				'date' => $date
			)
		);
	}

?>
