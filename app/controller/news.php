<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-10-11 15:15:16
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-10-14 18:57:57
	
	$newsSeflink = $_url[1];

	if(!$newsSeflink)
	{
		$news                = $News->newsPagination(12);
		$returnArray['news'] = $news;
	}
	else
	{
		$page_param = 1;

		$newsInfo = $News->newsInfo($newsSeflink);

		if($newsInfo !== false)
		{
			$returnArray['newsInfo'] = $newsInfo;
		}
		else
		{
			redirect('news');
		}
	}

	$smarty->assign('return', $returnArray);
	$smarty->display('news.tpl');

?>