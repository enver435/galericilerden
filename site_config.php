<?php
	
	# @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-07-31 15:02:45
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-10-09 19:43:17
	
	$config = array();

	/* SITE DB SETTINGS */
	$config['db'] = [
		'host'   => 'localhost',
		'dbname' => 'galeri_newsite',
		'user'	 => 'galeri_newsite',
		'pass'   => 'galericilerden435326'
	];

	$config['default_language'] = 'tr';
	$config['siteStoreDomain']  = '.galericilerden.com'; // .galericilerden.com

	/* MINIFY ASSETS FILES */
	$config['minify'] = true;

	/* PAYMENT */
	$config['iyzicoPayment']   = false;
	$config['iyzicoApiKey']    = 'sandbox-YpgfOwGJuzKD3Zicy1LNlw8CxmfN9Yhs';
	$config['iyzicoSecretKey'] = 'sandbox-WEDSX8sZLz5dltcaJ1lS852L5kQ4vpvC';
	$config['iyzicoBaseUrl']   = 'https://sandbox-api.iyzipay.com';

	/* SMTP EMAIL SETTINGS */
	$config['emailSiteName'] = 'Galericilerden.com';
	$config['emailHost']     = 'galericilerden.com';
	$config['emailPort']     = 465;
	$config['emailSecure']   = 'ssl';
	$config['emailNoReply']  = 'no-reply@galericilerden.com';
	$config['emailPass']     = 'galericilerden435326';

	/* SITE SETTINGS */
	define('SITE_URL', 'https://www.galericilerden.com');
	define('SITE_ADMIN', 'admin');
	define('SITE_NAME', "Galericilerden.com - Satılık, Kiralık, Sıfır ve İkinci El Araçlar");
	define('DESC', "Galericilerden, Sahibinden satılık, kiralık, ikinci el, otomobil, Ticari Araç, Vasıta - Türkiye'nin en büyük ücretsiz ilan sitesi.");
	define('KEYS', 'sizdenilanlar, galericilerden, sahibinden, 2.el oto, ikinci el araba fiyatları, motorsiklet fiyatları, motor, oto yedek parça fiyatları, çocuk oto koltuğu, klasik araba, tekne, ücretsiz ilan, ücretsiz oto ilan, seri ilan, ücretsiz iş ilanı');
	define('AUTHOR', 'Galericilerden.com | info@galericilerden.com');

?>
