<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-23 13:40:09
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-08-23 13:42:30
	
	$domainName = post('domainName');

	if($domainName != '')
	{
		$checkStoreDomainName = $Store->checkStoreDomainName($domainName);

		if($checkStoreDomainName !== false)
		{
			$response['error'] = 'Bu mağaza adı artık kullanılıyor. Lütfen başka bir mağaza adı seçiniz';
		}
		else
		{
			$response['success'] = 'success';
		}

		echo json_encode($response);
	}

?>