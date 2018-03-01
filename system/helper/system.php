<?php
	
	# @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-07-31 15:02:45
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-07-31 15:06:17

	function controller($name) 
	{
		return ROOT . '/app/controller/' . $name . '.php';
	}

	function siteUrl($page = null) 
	{
		return SITE_URL . '/' . $page;
	}

	function redirect($url = null) 
	{
		header('Location: ' . SITE_URL . '/' . $url);
	}

	function refresh($url = null, $time = 3) 
	{
		header('Refresh: ' . $time . ';url=' . SITE_URL . '/' . $url);
	}

?>
