<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-09-11 11:20:25
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-09-30 16:28:25
	
	if(session('login'))
	{
		$page = $_url[1];

		if($page != '')
		{
			if($page == 'view')
			{
				$id         = $_url[2];
				$page_param = 2;

				if($id != '')
				{
					$notificationInfo = $Notifications->notificationInfo($id);

					if($notificationInfo !== false)
					{
						$Notifications->update($id, array('view' => 1));

						$returnArray['notificationInfo'] = $notificationInfo;
					}
					else
					{
						redirect('my-notifications');
					}
				}
				else
				{
					redirect('my-notifications');
				}
			}
			else
			{
				redirect('my-notifications');
			}
		}
		else
		{
			if(issetPost('operation') AND post('operation') == 'delete')
			{
				$deleted = $_POST['deleted'];

				foreach ($deleted as $deleteId) 
				{
					$Notifications->delete($deleteId);
				}
			}

			/* ACTUAL LINK */
			$actualLink = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

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

			$items_per_page = 10;
			$offset         = ($page - 1) * $items_per_page;
			$page_count     = 0;

			/* ROWS */
			$notifications      = $Notifications->notifications(false, $offset, $items_per_page);
			$notificationsCount = count($Notifications->notifications(false, null, null));

			/* ROWS PAGINATION */
			if (0 !== $notificationsCount) 
			{  
			    $page_count = (int)ceil($notificationsCount / $items_per_page);
			   	if($page > $page_count) 
			   	{
			       $page = 1;
			   	}
			}

			$pagination = pagination($items_per_page, $page_count, $page, $actualLink);

			$returnArray['notifications'] = $notifications;
			$returnArray['pagination']    = $pagination;
		}

		$returnArray['Ads'] = $Ads;

		$smarty->assign('return', $returnArray);
		$smarty->display('my-notifications.tpl');
	}
	else
	{
		redirect('login');
	}

?>