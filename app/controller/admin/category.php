<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-22 10:01:43
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-09-03 09:23:49
	
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
						$category_name  = post('category_name');
						$category_modul = post('category_modul');

						if($category_name != '' AND $category_modul != '')
						{
							$updateCategory = $CategoryAdmin->updateCategory($id, 
								array(
									'kategori_adi' => $category_name,
									'modul'        => $category_modul,
									'seflink'      => permalink($category_name)
								)
							);

							if($category_modul != $CategoryAdmin->categoryInfo($id)['modul'])
							{
								$modulItems    = $ModulAdmin->modulItems($category_modul);
								$modulFeatures = $ModulAdmin->getModulFeaturesList($category_modul);

								foreach ($modulItems as $item) 
								{
									$ModulAdmin->deleteItemsAds($item['Id']);
								}

								foreach ($modulFeatures as $feature) 
								{
									$ModulAdmin->deleteFeatureListAds($feature['Id']);
								}
							}

							if($updateCategory === true)
							{
								$messageType = 'success';
								$message     = 'Kategori başarıyla güncellendi';
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

					$categoryInfo = $CategoryAdmin->categoryInfo($id);

					if($categoryInfo !== false)
					{
						$returnArray['categoryInfo'] = $categoryInfo;
						$returnArray['modulList']    = $ModulAdmin->modulList();
					}
					else
					{
						redirect(SITE_ADMIN . '/category');
					}
				}
			}
		}
		else
		{
			if(get('s') != '')
			{
				$returnArray['categoryList'] = $CategoryAdmin->category(0, 15, true);
			}
			else
			{
				$returnArray['categoryList'] = $CategoryAdmin->category(0, 15, false);
			}
		}

		$returnArray['siteConfig'] = $config;

		$smarty->assign('return', $returnArray);
		$smarty->display('admin/category.tpl');
	}	
	else
	{
		redirect(SITE_ADMIN);
	}

?>