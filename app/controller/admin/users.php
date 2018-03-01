<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-22 10:01:43
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-08-24 17:13:47
	
	if(session('adminLogin'))
	{
		$type        = $_url[2];
		$returnArray = array();

		if($type != '')
		{
			if($type == 'edit')
			{
				$page_param = 2;
				$id         = $_url[3];

				if($id != '')
				{
					if(issetPost('save'))
					{
						foreach ($_POST as $key => $value) 
						{
							if($key != 'save')
							{
								if($key != 'pass')
								{
									$update = $UserAdmin->update($id, array($key => $value));
								}
								else
								{
									if($value != '')
									{
										$update = $UserAdmin->update($id, array($key => md5($value)));
									}
								}
							}
						}

						if($update === true)
						{
							$messageType = 'success';
							$message     = 'Üye başarıyla güncellendi';
						}
						else
						{
							$messageType = 'error';
							$message     = 'Bir hata oluştu. Lütfen daha sonra tekrar deneyiniz';
						}

						$returnArray['messageType'] = $messageType;
						$returnArray['message']     = $message;
					}

					$userInfo = $UserAdmin->userInfo($id);

					if($userInfo !== false)
					{
						$returnArray['userInfo'] = $userInfo;
						$returnArray['cities']   = $Other->cities();
					}
					else
					{
						redirect(SITE_ADMIN . '/users');
					}	
				}
			}
			elseif($type == 'login')
			{
				$page_param = 2;
				$id         = $_url[3];

				if($id != '')
				{
					$userInfo = $UserAdmin->userInfo($id);

					if($userInfo !== false)
					{
						setSession('login', true);
						setSession('userId', $id);

						redirect();
					}
					else
					{
						redirect(SITE_ADMIN . '/users');
					}
				}
			}
			elseif($type == 'delete')
			{
				$page_param = 2;
				$id         = $_url[3];

				if($id != '')
				{
					$UserAdmin->delete($id);
					$StoreAdmin->deleteUserStore($id);

					foreach ($AdsAdmin->userAds($id) as $value) 
					{
						$AdsAdmin->delete($value['id']);
						$AdsAdmin->deleteAdImages($value['id']);
						$AdsAdmin->deleteAdItemValues($value['id']);
						$AdsAdmin->deleteAdFeatures($value['id']);
					}
				}

				redirect(SITE_ADMIN . '/users');
			}
		}
		else
		{
			$returnArray['users'] = $UserAdmin->users();
		}

		$returnArray['siteConfig'] = $config;

		$smarty->assign('return', $returnArray);
		$smarty->display('admin/users.tpl');
	}	
	else
	{
		redirect(SITE_ADMIN);
	}

?>