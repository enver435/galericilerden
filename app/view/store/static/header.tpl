<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, shrink-to-fit=no, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta name="rating" content="general">
	<meta name="robots" content="NOODP,index,follow">

	<meta name="og:type" content="store">
	<meta name="og:title" content="{$header.storeInfo.store_name|upper}">
	<meta name="og:site_name" content="galericilerden.com">
	<meta name="og:image" content="{siteUrl('public/images/store/header')}{$header.storeInfo.store_theme}.jpg">
	<meta name="og:url" content="{$smarty.server.HTTP_HOST}">
	<meta name="description" content="{$header.storeInfo.store_name|upper} - {DESC}">
	<meta name="author" content="{AUTHOR}">
	<link rel="shortcut icon" href="{siteUrl('favicon.ico')}">
	<title>{$header.storeInfo.store_name|upper} İlanları galericilerden.com'da!</title>
	
	<link rel="canonical" href="{$smarty.server.HTTP_HOST}">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="{if $header.siteConfig.minify === false}{siteUrl('public/styles/styles.css')}{else}{siteUrl('public/styles/styles.min.css')}{/if}" />
	<link rel="stylesheet" href="{if $header.siteConfig.minify === false}{siteUrl('public/styles/responsive.css')}{else}{siteUrl('public/styles/responsive.min.css')}{/if}" />
	<script type="text/javascript" src="{siteUrl('public/scripts/jquery-2.2.4.min.js')}"></script>
	{literal}<script type="text/javascript">var siteUrl = '{/literal}{SITE_URL}{literal}', ajaxLock = false;</script>{/literal}
	<!--[if lt IE 9]>
        <script src="{siteUrl('public/scripts/html5shiv.js')}"></script>
        <script src="{siteUrl('public/scripts/respond.min.js')}"></script>
    <![endif]-->

    {assign var=Notifications value=$header.Notifications scope="global"}
    {assign var=Messages value=$header.Messages scope="global"}
</head>
</html>