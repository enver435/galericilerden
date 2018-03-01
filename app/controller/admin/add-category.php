<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-24 18:01:39
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-08-24 18:40:52
	
	if(session('adminLogin'))
	{
		$type = $_url[2];

		if($type != '')
		{
			$page_param = 1;

			if(issetPost('add'))
			{
				if($type == 'main-category')
				{
					$category_name  = post('category_name');
					$category_modul = post('category_modul');

					if($category_name != '' AND $category_modul != '')
					{
						$addCategory = $CategoryAdmin->addCategory(
							array(
								'kategori_adi' => $category_name,
								'modul'        => $category_modul,
								'seflink'      => permalink($category_name)
							)
						);

						if($addCategory === true)
						{
							$messageType = 'success';
							$message     = 'Kategori başarıyla eklendi';
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
				}
				elseif($type == 'sub-category')
				{
					$category_name  = post('category_name');
					$category_modul = post('category_modul');
					$category       = post('category');

					if($category_name != '' AND $category_modul != '')
					{
						$addCategory = $CategoryAdmin->addCategory(
							array(
								'kategori_adi'  => $category_name,
								'modul'         => $category_modul,
								'ustkategoriId' => $category,
								'seflink'       => permalink($category_name)
							)
						);

						if($addCategory === true)
						{
							$messageType = 'success';
							$message     = 'Kategori başarıyla eklendi';
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
				}

				$returnArray['messageType'] = $messageType;
				$returnArray['message']     = $message;
			}

			$returnArray['modulList']    = $ModulAdmin->modulList();
			$returnArray['mainCategory'] = $CategoryAdmin->mainCategory();

			$smarty->assign('return', $returnArray);
			$smarty->display('admin/add-category.tpl');
		}
		else
		{
			redirect(SITE_ADMIN);
		}
	}
	else
	{
		redirect(SITE_ADMIN);
	}

?>