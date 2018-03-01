<?php
	
	# @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-07-31 15:02:45
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-07-31 15:05:44

	Class Autoloader {

		static public function AutoloaderModels()
		{
			spl_autoload_register(function($modelName) 
			{
				if(file_exists(ROOT . '/app/models/model.' . strtolower($modelName) . '.php')) 
				{
					require_once ROOT . '/app/models/model.' . strtolower($modelName) . '.php';
				}
				if(file_exists(ROOT . '/app/models/admin/model.' . strtolower($modelName) . '.php')) 
				{
					require_once ROOT . '/app/models/admin/model.' . strtolower($modelName) . '.php';
				}
			});
		}

		static public function AutoloaderHelper()
		{
			$helperDir = ROOT . '/system/helper';
		    if ($dh = opendir($helperDir)) 
		    {
		      	while($file = readdir($dh)) 
		      	{
		        	if (is_file($helperDir . '/' . $file)) 
		        	{
		          		require_once $helperDir . '/' . $file;
		        	}
		      	}
		    }
		}

	}

?>
