<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-16 16:02:04
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-09-04 16:47:27
	
	if(session('login'))
	{
		$image = post('image');
		$db    = post('db');

		if($image != '')
		{
			if(file_exists('../uploads/ads/' . $image . '.jpg'))
			{
				$deleteImage = unlink('../uploads/ads/' . $image . '.jpg');

				if($db == 'false')
				{
					if($deleteImage === true)
					{
						$response['success'] = 'success';
					}
					else
					{
						$response['error'] = 'Bir hata oluştu. Lütfen daha sonra tekrar deneyiniz';
					}
				}
				elseif($db == 'true') // db den sil
				{
					if($deleteImage === true)
					{
						$adId = post('adId');

						if($adId != '')
						{
							$Ads->deleteAdImage($adId, $image);

							$response['success'] = 'success';
						}
					}
					else
					{
						$response['error'] = 'Bir hata oluştu. Lütfen daha sonra tekrar deneyiniz';
					}
				}
			}
			else
			{
				$response['error'] = 'Bir hata oluştu. Lütfen daha sonra tekrar deneyiniz';
			}

			echo json_encode($response);
		}
	}

?>