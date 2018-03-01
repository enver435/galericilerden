<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-22 10:01:43
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-08-24 15:57:32
	
	if(session('adminLogin'))
	{
		$type = $_url[2];

		if($type == 'edit' || $type == 'delete')
		{
			$page_param = 2;
			$id         = $_url[3];
			
			if($id != '')
			{
				if($type == 'edit')
				{
					if(issetPost('save'))
					{
						$name       = post('name');
						$item       = $_POST['item'];
						$deleteItem = $_POST['delete-item'];

						if($name != '')
						{
							$modulFeatureGroupInfo = $ModulAdmin->modulFeatureGroupInfo($id);
							$updateFeatureGroup    = $ModulAdmin->updateFeatureGroup($id, array('name' => $name));

							if($updateFeatureGroup === true)
							{
								if(!empty($item))
								{
									foreach ($item as $key => $value) 
									{
										if($key == 0)
										{
											foreach ($value as $value2) 
											{
												if($value2 != '')
												{
													$addModulFeatureList = $ModulAdmin->addModulFeatureList(
														array(
															'modulId' => $modulFeatureGroupInfo['modulId'],
															'name'    => $value2,
															'groupId' => $id
														)
													);
												}
											}
										}
									}
								}

								if(!empty($deleteItem))
								{
									foreach ($deleteItem as $key => $value) 
									{
										$ModulAdmin->deleteFeatureList($key);
										$ModulAdmin->deleteFeatureListAds($key);
									}
								}

								$messageType = 'success';
								$message     = 'Grup ve grup özellikleri başarıyla güncellendi';
							}
							else
							{
								$messageType = 'error';
								$message     = 'Bir hata oluştu. Lütfen daha sonra tekrar deneyiniz';
							}
						}
						else
						{
							$messageType = 'error';
							$message     = 'Lütfen satırları boş bırakmayınız';
						}

						$returnArray['messageType'] = $messageType;
						$returnArray['message']     = $message;
					}

					$modulFeatureGroupInfo = $ModulAdmin->modulFeatureGroupInfo($id);

					if($modulFeatureGroupInfo !== false)
					{
						$returnArray['modulFeatureGroupInfo'] = $modulFeatureGroupInfo;
						$returnArray['modulFeaturesList']     = $ModulAdmin->modulFeaturesList($modulFeatureGroupInfo['Id']);
					}
					else
					{
						redirect(SITE_ADMIN . '/modul');
					}
				}
				elseif($type == 'delete')
				{
					if($id != '')
					{
						$ModulAdmin->deleteFeatureGroup($id);
						$ModulAdmin->deleteFeatureListGroup($id);
						$ModulAdmin->deleteFeatureListGroupAds($id);
					}

					$referer = explode('modul-features/', $_SERVER['HTTP_REFERER'])[1];
					redirect(SITE_ADMIN . '/modul-features/' . $referer);
				}
			}
			else
			{
				redirect(SITE_ADMIN . '/modul');
			}
		}
		elseif($type == 'add')
		{
			$page_param = 2;
			$id         = $_url[3];

			if($id != '')
			{
				if(issetPost('add'))
				{
					$name = post('name');
					$item = $_POST['item'];

					if($name != '')
					{
						$addModulFeatureGroup = $ModulAdmin->addModulFeatureGroup(
							array(
								'name'    => $name,
								'modulId' => $id
							)
						);

						if($addModulFeatureGroup != '')
						{
							if(!empty($item))
							{
								foreach ($item as $key => $value) 
								{
									if($key == 0)
									{
										foreach ($value as $value2) 
										{
											if($value2 != '')
											{
												$addModulFeatureList = $ModulAdmin->addModulFeatureList(
													array(
														'modulId' => $id,
														'name'    => $value2,
														'groupId' => $addModulFeatureGroup
													)
												);
											}
										}
									}
								}
							}
							
							$messageType = 'success';
							$message     = 'Grup ve grup özellikleri başarıyla eklendi';
						}
						else
						{
							$messageType = 'error';
							$message     = 'Bir hata oluştu. Lütfen daha sonra tekrar deneyiniz';
						}
					}
					else
					{
						$messageType = 'error';
						$message     = 'Lütfen satırları boş bırakmayınız';
					}

					$returnArray['messageType'] = $messageType;
					$returnArray['message']     = $message;
				}
			}
			else
			{
				redirect(SITE_ADMIN . '/modul');
			}
		}
		else
		{
			$page_param = 1;
			$id         = $_url[2];

			$returnArray['modulFeatures'] = $ModulAdmin->modulFeatures($id);
		}

		$returnArray['siteConfig'] = $config;

		$smarty->assign('return', $returnArray);
		$smarty->display('admin/modul-features.tpl');
	}	
	else
	{
		redirect(SITE_ADMIN);
	}

?>