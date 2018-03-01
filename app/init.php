<?php
	
	# @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-07-31 15:02:45
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2018-01-19 15:13:01

	error_reporting(0);

	/* DEFINE ROOT */
	define('ROOT', str_replace('app', '', str_replace(DIRECTORY_SEPARATOR, '/', dirname(__FILE__))));

	//date_default_timezone_set('Europe/Istanbul');

	/* REQUIRE CONFIG */
	require_once ROOT . '/config.php';

	/* START SESSION */
	//session_set_cookie_params(0, '/', $config['siteStoreDomain']);
	//session_name('login');
	//session_name('userId');
	//session_name('showAppHeader');
	session_start();

	/* REQUIRE AUTOLOADER */
	require_once ROOT . '/system/autoloader/autoloader.php';

	/* REQUIRE PLUGINS */
	require_once ROOT . '/system/plugin/smarty/SmartyBC.class.php';
	require_once ROOT . '/system/plugin/mail/class.phpmailer.php';
	require_once ROOT . '/system/plugin/mail/class.smtp.php';
	require_once ROOT . '/system/plugin/upload/class.upload.php';
	require_once ROOT . '/system/plugin/upload/SimpleImage.php';
	require_once ROOT . '/system/plugin/db/db.php';
	require_once ROOT . '/system/plugin/iyzipay/config.php';

	/* AUTOLOADER */
	Autoloader::AutoloaderModels();
	Autoloader::AutoloaderHelper();

    /* CONNECTION DB */
	$db = new DB($config['db']['host'], $config['db']['dbname'], $config['db']['user'], $config['db']['pass']);

	/* MODELS */ 
	$User            = new User($db);
	$Other           = new Other($db);
	$Category        = new Category($db);
	$Ads             = new Ads($db);
	$Modul           = new Modul($db);
	$Doping          = new Doping($db);
	$Store           = new Store($db);
	$Favorites       = new Favorites($db);
	$FavoritesSearch = new FavoritesSearch($db);
	$Notifications   = new Notifications($db);
	$Chart           = new Chart($db);
	$Messages        = new Messages($db);
	$Slider          = new Slider($db);
	$Banner          = new Banner($db);
	$Visitors        = new Visitors($db);
	$News            = new News($db);

	/* MODELS ADMIN */
	$Admin              = new Admin($db);
	$AdsAdmin           = new AdsAdmin($db);
	$StoreAdmin         = new StoreAdmin($db);
	$DopingAdmin        = new DopingAdmin($db);
	$UserAdmin          = new UserAdmin($db);
	$ModulAdmin         = new ModulAdmin($db);
	$CategoryAdmin      = new CategoryAdmin($db);
	$NotificationsAdmin = new NotificationsAdmin($db);
	$SliderAdmin        = new SliderAdmin($db);
	$BannerAdmin        = new BannerAdmin($db);
	$NewsAdmin          = new NewsAdmin($db);

	/* SMARTY SETTINGS */
	$smarty = new SmartyBC;
    $smarty->template_dir 	 = ROOT . '/app/view';
    $smarty->compile_dir  	 = ROOT . '/system/tmp';
    $smarty->error_reporting = E_ALL & ~E_NOTICE;

?>
