<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-21 09:44:41
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-09-16 11:50:31
	
	if(session('login'))
	{
		set_time_limit(0); 
		ini_set('memory_limit', '20000M');
		
		$image = new Upload(files('image'));
	
	    if($image->uploaded) 
	    {
	    	
	    	$randomString = randomString('alnum', 20);
			
			$image->file_new_name_body     = $randomString;
			$image->allowed 		   	   = array ('image/*');
			$image->image_max_width        = 220;
			$image->image_max_height       = 165;
			$image->image_convert 	   	   = 'jpg';
			$image->image_ratio_fill       = true;

			$image->Process('../uploads/store');

			if($image->processed) 
			{
			   	$response['success'] = 'success';
				$response['image']   = $randomString;
		   	}
		   	else
		   	{
		   		$response['error'] = $image->error;
		   	}
	    }
	    else
	    {
	    	$response['error'] = $image->error;
	    }

	    echo json_encode($response);
	}

?>