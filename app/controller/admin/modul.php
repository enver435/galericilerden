<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-22 10:01:43
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-08-24 14:09:25
	
	if(session('adminLogin'))
	{
		$type        = $_url[2];
		$returnArray = array();

		if($type != '')
		{
			if($type == 'add')
			{
				$page_param = 1;

				if(issetPost('add'))
				{
					$name = post('name');

					if($name != '')
					{
						$addModul = $ModulAdmin->addModul(
							array(
								'name'  => $name,
								'durum' => 1
							)
						);

						if($addModul === true)
						{
							$messageType = 'success';
							$message     = 'Modül başarıyla eklendi';
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
			elseif($type == 'delete')
			{
				$page_param = 2;
				$id         = $_url[3];

				if($id != '')
				{
					$ModulAdmin->deleteModul($id);
				}

				redirect(SITE_ADMIN . '/modul');
			}
		}
		else
		{
			$returnArray['modulList'] = $ModulAdmin->modulList();
		}

		$returnArray['siteConfig'] = $config;

		$smarty->assign('return', $returnArray);
		$smarty->display('admin/modul.tpl');
	}	
	else
	{
		redirect(SITE_ADMIN);
	}

?>