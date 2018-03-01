<?php

	# @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-14 15:27:35
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-08-14 16:21:30
	
	function sendSms($phone, $message)
	{

		$postUrl      = 'http://panel.vatansms.com/panel/smsgonder1Npost.php';
		$MUSTERİNO    = '21068'; //5 haneli müşteri numarası
		$KULLANICIADI = '905322952551';
		$SIFRE        = '517927';       
		$ORGINATOR    = 'glriclerden';        

		$TUR          = 'Normal';  // Normal yada Turkce
		//$ZAMAN='2014-04-07 10:00:00';

		$xmlString='data=<sms>
		<kno>' . $MUSTERİNO . '</kno>
		<kulad>' . $KULLANICIADI . '</kulad>
		<sifre>' . $SIFRE . '</sifre>
		<gonderen>' .  $ORGINATOR . '</gonderen>
		<mesaj>' . $message . '</mesaj>
		<numaralar>' . $phone . '</numaralar>
		<tur>' . $TUR . '</tur>
		</sms>';

		// Xml içinde aşağıdaki alanlarıda gönderebilirsiniz.
		//<zaman>'. $ZAMAN.'</zaman> İleri tarih için kullanabilirsiniz

		$Veriler =  $xmlString;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $postUrl);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $Veriler);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		$response = curl_exec($ch);
		curl_close($ch);
		return $response;
	}

?>