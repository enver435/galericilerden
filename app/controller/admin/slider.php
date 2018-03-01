<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-09-14 19:29:21
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-09-15 13:56:18
	
	if(session('adminLogin'))
	{
		$function = $_url[2];

		if($function != '')
		{
			if($function == 'delete')
			{
				$page_param = 2;
				$slider     = $_url[3];

				if($slider != '')
				{
					$SliderAdmin->sliderDelete($slider);
				}

				redirect(SITE_ADMIN . '/slider');
			}
		}

		if(issetPost('update_slider'))
		{
			$slider_img = $_FILES['slider_img'];
			
			if($slider_img['name'][0] != '')
			{
				$images = array();
				foreach ($slider_img as $k => $l) {
				  	foreach ($l as $i => $v) {
					   	if (!array_key_exists($i, $images))
					     	$images[$i] = array();
					    $images[$i][$k] = $v;
				  	}
				}

				$i = 0;
			
				foreach ($images as $value) {
					/* UPLOAD IMAGES */
					$image = new Upload($value);
					if($image->uploaded) 
					{
						$randomString = randomString('alnum', 20);

						$image->file_new_name_body = $randomString;
						$image->allowed 		   = array ('image/*');
						$image->image_resize 	   = true;
						$image->image_ratio_fill   = true;
						$image->image_ratio_crop   = true;
						$image->image_x 		   = 800;
						$image->image_y   		   = 300;
						$image->image_convert 	   = 'jpg';

						$image->Process(realpath('.') . '/uploads/slider');

						if($image->processed) 
						{
							$SliderAdmin->addSlider($randomString . '.jpg');
						}
					}
				}
			}
		}

		$sliders = $SliderAdmin->sliders();

		$returnArray['sliders'] = $sliders;

		$smarty->assign('return', $returnArray);
		$smarty->display('admin/slider.tpl');
	}
	else
	{
		redirect(SITE_ADMIN);
	}

?>