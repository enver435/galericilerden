<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-09-14 19:29:59
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-09-15 16:05:25
	
	if(session('adminLogin'))
	{
		if(issetPost('save'))
		{
			/* BANNER 250X250 */
			$bannerType250x250      = post('250x250banner');
			$bannerBannerImg250x250 = files('250x250banner');
			$bannerImageLink250x250 = post('250x250bannerImageLink');
			$bannerLink250x250      = post('250x250BannerLink');
			$htmlCode250x250        = post('htmlCode250x250', false);

			$updateBannerInfo = $BannerAdmin->getBannerInfo(0);

			if($bannerType250x250 == 1) // image and link
			{
				if($bannerBannerImg250x250['name'] != '')
				{
					$image = new Upload($bannerBannerImg250x250);
					if($image->uploaded) 
					{
						$randomString = randomString('alnum', 20);

						$image->file_new_name_body = $randomString;
						$image->allowed 		   = array ('image/*');
						$image->image_resize 	   = true;
						$image->image_ratio_fill   = true;
						$image->image_ratio_crop   = true;
						$image->image_x 		   = 250;
						$image->image_y   		   = 250;
						$image->image_convert 	   = 'jpg';

						$image->Process(realpath('.') . '/uploads/banner');

						if($image->processed) 
						{
							$uploadedImage = $randomString . '.jpg';
						}
					}
				}
				else
				{
					if($BannerAdmin->getBannerInfo(0)['banner_type'] == $bannerType250x250)
					{
						if($bannerImageLink250x250 != '')
						{
							$BannerAdmin->updateBanner(0, array('banner_img' => ''));
						}
					}

					$uploadedImage = $BannerAdmin->getBannerInfo(0)['banner_img'];
				}

				$BannerAdmin->updateBanner(0, 
					array(
						'banner_img'      => $uploadedImage,
						'banner_img_link' => $bannerImageLink250x250,
						'banner_link'     => $bannerLink250x250,
						'banner_type'     => 1
					)
				);
			}
			elseif($bannerType250x250 == 2) // html code
			{
				$BannerAdmin->updateBanner(0, 
					array(
						'banner_html' => $htmlCode250x250,
						'banner_type' => 2
					)
				);
			}



			/* ILAN DETAY BANNER WEB */
			$ilanDetayWebBanner          = post('ilanDetayWebBanner');
			$ilanDetayWebBannerImg       = files('ilanDetayWebBanner');
			$ilanDetayWebBannerImageLink = post('ilanDetayWebBannerImageLink');
			$ilanDetayWebBannerLink      = post('ilanDetayWebBannerLink');
			$ilanDetayWebHtmlCode        = post('ilanDetayWebHtmlCode', false);

			if($ilanDetayWebBanner == 1) // image and link
			{
				if($ilanDetayWebBannerImg['name'] != '')
				{
					$image = new Upload($ilanDetayWebBannerImg);
					if($image->uploaded) 
					{
						$randomString = randomString('alnum', 20);

						$image->file_new_name_body = $randomString;
						$image->allowed 		   = array ('image/*');
						$image->image_resize 	   = true;
						$image->image_ratio_fill   = true;
						$image->image_ratio_crop   = true;
						$image->image_x 		   = 250;
						$image->image_y   		   = 300;
						$image->image_convert 	   = 'jpg';

						$image->Process(realpath('.') . '/uploads/banner');

						if($image->processed) 
						{
							$uploadedImage = $randomString . '.jpg';
						}
					}

					$BannerAdmin->updateBanner(1, array('banner_img_link' => ''));
				}
				else
				{
					if($BannerAdmin->getBannerInfo(1)['banner_type'] == $ilanDetayWebBanner)
					{
						if($ilanDetayWebBannerImageLink != '')
						{
							$BannerAdmin->updateBanner(1, array('banner_img' => ''));
						}
					}

					$uploadedImage = $BannerAdmin->getBannerInfo(1)['banner_img'];
				}

				$BannerAdmin->updateBanner(1, 
					array(
						'banner_img'      => $uploadedImage,
						'banner_img_link' => $ilanDetayWebBannerImageLink,
						'banner_link'     => $ilanDetayWebBannerLink,
						'banner_type'     => 1
					)
				);
			}
			elseif($ilanDetayWebBanner == 2) // html code
			{
				$BannerAdmin->updateBanner(1, 
					array(
						'banner_html' => $ilanDetayWebHtmlCode,
						'banner_type' => 2
					)
				);
			}


			/* ILAN DETAY BANNER MOBIL */
			$ilanDetayMobilBanner          = post('ilanDetayMobilBanner');
			$ilanDetayMobilBannerImg       = files('ilanDetayMobilBanner');
			$ilanDetayMobilBannerImageLink = post('ilanDetayMobilBannerImageLink');
			$ilanDetayMobilBannerLink      = post('ilanDetayMobilBannerLink');
			$ilanDetayMobilHtmlCode        = post('ilanDetayMobilHtmlCode', false);

			if($ilanDetayMobilBanner == 1) // image and link
			{
				if($ilanDetayMobilBannerImg['name'] != '')
				{
					$image = new Upload($ilanDetayMobilBannerImg);
					if($image->uploaded) 
					{
						$randomString = randomString('alnum', 20);

						$image->file_new_name_body = $randomString;
						$image->allowed 		   = array ('image/*');
						$image->image_convert 	   = 'jpg';

						$image->Process(realpath('.') . '/uploads/banner');

						if($image->processed) 
						{
							$uploadedImage = $randomString . '.jpg';
						}
					}

					$BannerAdmin->updateBanner(2, array('banner_img_link' => ''));
				}
				else
				{
					if($BannerAdmin->getBannerInfo(2)['banner_type'] == $ilanDetayMobilBanner)
					{
						if($ilanDetayMobilBannerImageLink != '')
						{
							$BannerAdmin->updateBanner(2, array('banner_img' => ''));
						}
					}

					$uploadedImage = $BannerAdmin->getBannerInfo(2)['banner_img'];
				}

				$BannerAdmin->updateBanner(2, 
					array(
						'banner_img'      => $uploadedImage,
						'banner_img_link' => $ilanDetayMobilBannerImageLink,
						'banner_link'     => $ilanDetayMobilBannerLink,
						'banner_type'     => 1
					)
				);
			}
			elseif($ilanDetayMobilBanner == 2) // html code
			{
				$BannerAdmin->updateBanner(2, 
					array(
						'banner_html' => $ilanDetayMobilHtmlCode,
						'banner_type' => 2
					)
				);
			}


			/* MAGAZA BANNER */
			$magazaBanner          = post('magazaBanner');
			$magazaBannerImg       = files('magazaBanner');
			$magazaBannerImageLink = post('magazaBannerImageLink');
			$magazaBannerLink      = post('magazaBannerLink');
			$magazaBannerHtmlCode  = post('magazaBannerHtmlCode', false);

			if($magazaBanner == 1) // image and link
			{
				if($magazaBannerImg['name'] != '')
				{
					$image = new Upload($magazaBannerImg);
					if($image->uploaded) 
					{
						$randomString = randomString('alnum', 20);

						$image->file_new_name_body = $randomString;
						$image->allowed 		   = array ('image/*');
						$image->image_convert 	   = 'jpg';

						$image->Process(realpath('.') . '/uploads/banner');

						if($image->processed) 
						{
							$uploadedImage = $randomString . '.jpg';
						}
					}

					$BannerAdmin->updateBanner(3, array('banner_img_link' => ''));
				}
				else
				{
					if($BannerAdmin->getBannerInfo(3)['banner_type'] == $magazaBanner)
					{
						if($magazaBannerImageLink != '')
						{
							$BannerAdmin->updateBanner(3, array('banner_img' => ''));
						}
					}

					$uploadedImage = $BannerAdmin->getBannerInfo(3)['banner_img'];
				}

				$BannerAdmin->updateBanner(3, 
					array(
						'banner_img'      => $uploadedImage,
						'banner_img_link' => $magazaBannerImageLink,
						'banner_link'     => $magazaBannerLink,
						'banner_type'     => 1
					)
				);
			}
			elseif($magazaBanner == 2) // html code
			{
				$BannerAdmin->updateBanner(3, 
					array(
						'banner_html' => $magazaBannerHtmlCode,
						'banner_type' => 2
					)
				);
			}
		}

		$bannerInfo250x250        = $BannerAdmin->getBannerInfo(0); // 250x250
		$bannerInfoIlanDetayWeb   = $BannerAdmin->getBannerInfo(1); // ilan detay web
		$bannerInfoIlanDetayMobil = $BannerAdmin->getBannerInfo(2); // ilan detay mobil
		$bannerInfoMagazaMobil    = $BannerAdmin->getBannerInfo(3); // magaza mobil

		$returnArray['bannerInfo250x250']        = $bannerInfo250x250;
		$returnArray['bannerInfoIlanDetayWeb']   = $bannerInfoIlanDetayWeb;
		$returnArray['bannerInfoIlanDetayMobil'] = $bannerInfoIlanDetayMobil;
		$returnArray['bannerInfoMagazaMobil']    = $bannerInfoMagazaMobil;

		$smarty->assign('return', $returnArray);
		$smarty->display('admin/banner.tpl');
	}
	else
	{
		redirect(SITE_ADMIN);
	}

?>