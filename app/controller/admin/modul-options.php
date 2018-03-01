<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-22 10:01:43
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-08-24 15:57:44
	
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
							$updateModulItem = $ModulAdmin->updateModulItem($id, array('name' => $name));

							if($updateModulItem === true)
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
													$addModulItemSelect = $ModulAdmin->addModulItemSelect($id, $value2);
												}
											}
										}
									}
								}

								if(!empty($deleteItem))
								{
									foreach ($deleteItem as $key => $value) 
									{
										$ModulAdmin->deleteSelect($key);
										$ModulAdmin->deleteSelectAds($key);
									}
								}

								$messageType = 'success';
								$message     = 'Seçenek başarıyla güncellendi';
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

					$modulItemInfo = $ModulAdmin->modulItemInfo($id);

					if($modulItemInfo !== false)
					{
						$returnArray['modulItemInfo']    = $modulItemInfo;
						$returnArray['modulItemsSelect'] = $ModulAdmin->modulItemsSelect($modulItemInfo['Id']);
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
						$ModulAdmin->deleteItem($id);
						$ModulAdmin->deleteModulItemsSelect($id);
						$ModulAdmin->deleteItemsAds($id);
					}

					$referer = explode('modul-options/', $_SERVER['HTTP_REFERER'])[1];
					redirect(SITE_ADMIN . '/modul-options/' . $referer);
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
					$name   = post('name');
					$classx = post('classx');
					$item   = $_POST['item'];

					if($name != '' AND $classx != '')
					{
						$addModulItem = $ModulAdmin->addModulItem(
							array(
								'name'     => $name,
								'classx'   => $classx,
								'modulsId' => $id,
								'goster'   => 1
							)
						);

						if($addModulItem != '')
						{
							if($classx == 2)
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
													$addModulItemSelect = $ModulAdmin->addModulItemSelect($addModulItem, $value2);
												}
											}
										}
									}
								}
							}

							$messageType = 'success';
							$message     = 'Seçenek başarıyla eklendi';
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

			$returnArray['modulOptionsList'] = $ModulAdmin->modulItems($id);
		}

		$returnArray['siteConfig'] = $config;

		$smarty->assign('return', $returnArray);
		$smarty->display('admin/modul-options.tpl');
	}	
	else
	{
		redirect(SITE_ADMIN);
	}

?>