<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-27 15:25:20
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-09-12 11:16:41
	
	$returnArray['Ads'] = $Ads;
	
	$smarty->assign('return', $returnArray);
	$smarty->display('mobile/search-ad.tpl');

?>