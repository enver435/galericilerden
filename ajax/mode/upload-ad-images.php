<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-16 16:01:55
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-11-01 13:16:37
	
	if(session('login'))
	{
		set_time_limit(0); 
		ini_set('memory_limit', '20000M');

		// big    -> 800x600
	    // medium -> 430x320
		// thumb  -> 116x87

		$image = new Upload(files('image'));
		list($width, $height) = getimagesize(files('image')['tmp_name']);
		
	    if($image->uploaded) 
	    {
	    	
	    	$randomString = randomString('alnum', 20);
			
			$image->file_new_name_body = $randomString;
			$image->allowed 		   = array('image/*');

			if($width > 800)
			{
				$image->image_x       = 800;
				$image->image_ratio_y = true;
				$image->image_resize  = true;
			}
			$image->image_convert 	  = 'jpg';

			$image->Process('../uploads/ads');

			if($image->processed) 
			{
			   	$response['success'] = 'success';
				$response['image']   = $randomString;
		   	}
		   	else
		   	{
		   		$response['error'] = 'error';
		   	}
	    }
	    else
	    {
	    	$response['error'] = $image->error;
	    }

	    echo json_encode($response);
	}

?>