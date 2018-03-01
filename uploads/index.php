<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-16 22:57:56
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-10-19 11:34:46

	set_time_limit(0); 
	ini_set('memory_limit', '20000M');
	
	require_once '../app/init.php';

	$folder = get('folder');
	$size   = get('size');
	$hash   = get('imageHash');

	if($folder != '')
	{
		$fileDirectory = $folder . '/' . $hash . '.jpg';

		if(file_exists($fileDirectory)) 
		{
			$image = new SimpleImage($fileDirectory);

			if($size != '')
			{
				if($size == 'big')
				{
					if($folder == 'ads')
					{
						$image->maxareafill(800, 600, 255, 255, 255);
						$image->waterMark('watermark.png', 'center');
					}
				}
				elseif($size == 'medium')
				{
					if($folder == 'ads')
					{
						$image->maxareafill(430, 320, 255, 255, 255);
						$image->waterMark('watermark.png', 'center');
					}
				}
				elseif($size == 'thumb')
				{
					if($folder == 'ads')
					{
						$image->maxareafill(116, 87, 255, 255, 255);
					}
					elseif($folder == 'store')
					{
						$image->maxareafill(145, 90, 255, 255, 255);
					}
					elseif($folder == 'news')
					{
						$image->resize(255, 150);
					}
				}

				$image->output();
				exit();
			}
			else
			{
				require_once controller('404');
			}
		}
		else
		{
			require_once controller('404');
		}
	}
	else
	{
		require_once controller('404');
	}

?>