<?php
	
	# @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-07-31 15:02:45
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-07-31 15:07:08

	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
	{

		define('ROOT_AJAX', str_replace('ajax', '', str_replace(DIRECTORY_SEPARATOR, '/', dirname(__FILE__))));

		require_once ROOT_AJAX . 'app/init.php';

		if($_POST) 
		{
	    	$mode = post('mode');
	   		if(file_exists('mode/' . $mode . '.php')) 
	   		{
	   			require_once 'mode/' . $mode . '.php';
	   		}
	   		else
	   		{
	   			die('File not found');
	   		}
	    }

	}	

?>
