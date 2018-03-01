<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-10-11 16:38:07
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-10-14 18:59:19
	
	if(session('adminLogin'))
	{
		$page = $_url[2];

		if(!$page)
		{
			$news                = $NewsAdmin->newsPagination(15);
			$returnArray['news'] = $news;
		}
		else
		{
			if($page == 'add')
			{
				$page_param = 1;

				if(issetPost('add'))
				{
					$title   = post('title');
					$image   = files('image');
					$content = post('content', false);

					if($title != '' AND $image['name'][0] != '' AND $content != '')
					{
					    $imageUpload = new Upload($image);

						if($imageUpload->uploaded) 
						{
							$randomString = randomString('alnum', 20);

							$imageUpload->file_new_name_body = $randomString;
							$imageUpload->allowed 		     = array ('image/*');
							$imageUpload->image_resize 	     = true;
							$imageUpload->image_ratio_fill   = true;
							$imageUpload->image_ratio_crop   = true;
							$imageUpload->image_x 		     = 600;
							$imageUpload->image_y   		 = 355;
							$imageUpload->image_convert 	 = 'jpg';
							$imageUpload->jpeg_quality       = 65;

							$imageUpload->Process(realpath('.') . '/uploads/news');

							if($imageUpload->processed) 
							{
								$addNews = $NewsAdmin->add(
									array(
										'news_title'   => $title,
										'news_image'   => $randomString,
										'news_content' => $content,
										'news_seflink' => permalink($title)
									)
								);

								if($addNews === true)
								{
									$messageType = 'success';
									$message     = 'Haber başarıyla eklendi';
								}
								else
								{
									$messageType = 'error';
									$message     = 'Bir hata oluştu. Lütfen daha sonra tekrar deneyiniz';
								}
							}
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
			elseif($page == 'edit')
			{
				$newsID = $_url[3];

				if($newsID != '')
				{
					$page_param = 2;

					if(issetPost('save'))
					{
						$title   = post('title');
						$image   = files('image');
						$content = post('content', false);

						if($title != '' AND $content != '')
						{
							if($image['name'] != '')
							{
								$imageUpload = new Upload($image);

								if($imageUpload->uploaded) 
								{
									$randomString = randomString('alnum', 20);

									$imageUpload->file_new_name_body = $randomString;
									$imageUpload->allowed 		     = array ('image/*');
									$imageUpload->image_resize 	     = true;
									$imageUpload->image_ratio_fill   = true;
									$imageUpload->image_ratio_crop   = true;
									$imageUpload->image_x 		     = 600;
									$imageUpload->image_y   		 = 355;
									$imageUpload->image_convert 	 = 'jpg';
									$imageUpload->jpeg_quality       = 65;

									$imageUpload->Process(realpath('.') . '/uploads/news');

									if($imageUpload->processed) 
									{
										$newsImage = $randomString;
									}
								}
							}
							else
							{
								$newsImage = $NewsAdmin->newsInfo($newsID)['news_image'];
							}

							$updateNews = $NewsAdmin->update($newsID,
								array(
									'news_title'   => $title,
									'news_image'   => $newsImage,
									'news_content' => $content,
									'news_seflink' => permalink($title)
								)
							);

							if($updateNews === true)
							{
								$messageType = 'success';
								$message     = 'Haber başarıyla güncellendi';
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

					$newsInfo = $NewsAdmin->newsInfo($newsID);

					if($newsInfo !== false)
					{
						$returnArray['newsInfo'] = $newsInfo;
					}
					else
					{
						redirect(SITE_ADMIN . '/news');
					}
				}
				else
				{
					redirect(SITE_ADMIN);
				}
			}
			elseif($page == 'delete')
			{
				$newsID = $_url[3];

				if($newsID != '')
				{
					$page_param = 2;

					$newsInfo = $NewsAdmin->newsInfo($newsID);

					if($newsInfo !== false)
					{
						$NewsAdmin->delete($newsID);
					}

					redirect(SITE_ADMIN . '/news');
				}
			}
		}

		$smarty->assign('return', $returnArray);
		$smarty->display('admin/news.tpl');
	}
	else
	{
		redirect(SITE_ADMIN);
	}

?>