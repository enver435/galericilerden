<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, shrink-to-fit=no, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta name="rating" content="general">
	<meta name="robots" content="NOODP,index,follow{if getUrl(0) == 'view'},noarchive{/if}">
	{if getUrl(0) == 'view'}

		{assign var=adInfo value=$header.Ads->adInfo($smarty.get.id)}
		{assign var=adImages value=$header.Ads->adImages($smarty.get.id)}
	
		{assign var=categoryInfo1 value=$header.Category->categoryInfo($adInfo.category1)|replace:' ':''}
		{assign var=categoryInfo2 value=$header.Category->categoryInfo($adInfo.category2)|replace:' ':''}
		{assign var=categoryInfo3 value=$header.Category->categoryInfo($adInfo.category3)|replace:' ':''}
		{assign var=categoryInfo4 value=$header.Category->categoryInfo($adInfo.category4)|replace:' ':''}
		
		<meta name="og:type" content="product">
		<meta name="og:title" content="{if $categoryInfo2 != ''}{$categoryInfo2.kategori_adi}{/if}{if $categoryInfo2 != ''} / {$categoryInfo3.kategori_adi}{/if}{if $categoryInfo4 != ''} / {$categoryInfo4.kategori_adi}{/if} / {$adInfo.title|upper} galericilerden.comda - {$adInfo.id}">
		<meta name="og:site_name" content="galericilerden.com">
		{foreach $adImages as $image}
			<meta name="og:image" content="{siteUrl('files/ads/big')}/{$image.image}.jpg">
		{/foreach}
		<meta name="og:url" content="{siteUrl('view')}/{$adInfo.seflink}-{$adInfo.id}">
		<meta name="twitter:card" content="summary">
		<meta name="twitter:url" content="{siteUrl('view')}/{$adInfo.seflink}-{$adInfo.id}">
		<meta name="twitter:title" content="{if $categoryInfo2 != ''}{$categoryInfo2.kategori_adi}{/if}{if $categoryInfo3 != ''} / {$categoryInfo3.kategori_adi}{/if}{if $categoryInfo4 != ''} / {$categoryInfo4.kategori_adi}{/if} / {$adInfo.title|upper} galericilerden.comda - {$adInfo.id}">
		<meta name="twitter:description" content="{if $categoryInfo2 != ''}{$categoryInfo2.kategori_adi}{/if}{if $categoryInfo3 != ''} / {$categoryInfo3.kategori_adi}{/if}{if $categoryInfo4 != ''} / {$categoryInfo4.kategori_adi}{/if} / {$adInfo.title|upper} galericilerden.comda - {$adInfo.id}">
		<meta name="twitter:image" content="{siteUrl('files/ads/big')}/{$adInfo.title_image}.jpg">
		<meta name="description" content="{if $categoryInfo2 != ''}{$categoryInfo2.kategori_adi}{/if}{if $categoryInfo3 != ''} / {$categoryInfo3.kategori_adi}{/if}{if $categoryInfo4 != ''} / {$categoryInfo4.kategori_adi}{/if} / {$adInfo.title|upper} galericilerden.comda - {$adInfo.id}">
		<meta name="keywords" content="Galeriden {if $categoryInfo2 != ''}{$categoryInfo2.kategori_adi}{/if} {if $categoryInfo3 != ''}{$categoryInfo3.kategori_adi}{/if} {if $categoryInfo4 != ''}{$categoryInfo4.kategori_adi}{/if}, {if $categoryInfo1 != ''}{$categoryInfo1.kategori_adi}{/if}, {if $categoryInfo2 != ''}{$categoryInfo2.kategori_adi}{/if}{if $categoryInfo3 != ''}, {$categoryInfo3.kategori_adi}{/if}{if $categoryInfo4 != ''}, {$categoryInfo4.kategori_adi}{/if}, Satılık {if $categoryInfo2 != ''}{$categoryInfo2.kategori_adi}{/if}{if $adInfo.year > 0}, {$adInfo.year} {if $categoryInfo2 != ''}{$categoryInfo2.kategori_adi}{/if} {if $categoryInfo3 != ''}{$categoryInfo3.kategori_adi}{/if}{/if}">
		<link rel="shortcut icon" href="{siteUrl('favicon.ico')}">
		<title>{if $categoryInfo2 != ''}{$categoryInfo2.kategori_adi}{/if}{if $categoryInfo3 != ''} / {$categoryInfo3.kategori_adi}{/if}{if $categoryInfo4 != ''} / {$categoryInfo4.kategori_adi}{/if} / {$adInfo.title} galericilerden.comda - {$adInfo.id}</title>
		<link rel="canonical" href="{siteUrl('view')}/{$adInfo.seflink}-{$adInfo.id}">
	{else}
		<meta name="description" content="{DESC}">
	    <meta name="keywords" content="{KEYS}">
	    <meta name="author" content="{AUTHOR}">
	    <link rel="shortcut icon" href="{siteUrl('favicon.ico')}">

	    {if getUrl(0) == 'category'}
	    	<link rel="canonical" href="{siteUrl('cat-')}{get('catId')}/{get('catSeflink')}">
	    {elseif getUrl(0) == 'category-special'}
	    	<link rel="canonical" href="{siteUrl('category-special')}/{get('catType')}">
	    {elseif getUrl(0) == 'user'}
	    	<link rel="canonical" href="{siteUrl('user-')}{get('userId')}/{get('userSeflink')}">
    	{elseif getUrl(0) == 'page'}
			<link rel="canonical" href="{siteUrl('page')}/{getUrl(1)}">
		{elseif getUrl(0) == 'ad-add'}
			<link rel="canonical" href="{siteUrl('ad-add')}">
		{elseif getUrl(0) == 'my'}
			<link rel="canonical" href="{siteUrl('my')}">
		{elseif getUrl(0) == 'my-ads' AND getUrl(1) == 'active' || getUrl(1) == 'passive' || getUrl(1) == 'finished' || getUrl(1) == 'pending' || getUrl(1) == 'unconfirmed'}
			<link rel="canonical" href="{siteUrl('my-ads')}/{getUrl(1)}">
		{elseif getUrl(0) == 'my-favorites' || getUrl(1) == 'ads' || getUrl(1) == 'search'}
			<link rel="canonical" href="{siteUrl('my-favorites')}/{getUrl(1)}">
		{elseif !getUrl(0)}
			<link rel="canonical" href="{SITE_URL}">
			<meta name="x-canonical-url" content="/">
	    {/if}
	    <title>{SITE_NAME}</title>
    {/if}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="{if $header.siteConfig.minify === false}{siteUrl('public/styles/styles.css')}{else}{siteUrl('public/styles/styles.min.css')}{/if}" media="screen" />
	<link rel="stylesheet" href="{if $header.siteConfig.minify === false}{siteUrl('public/styles/responsive.css')}{else}{siteUrl('public/styles/responsive.min.css')}{/if}" media="screen" />
	<script type="text/javascript" src="{siteUrl('public/scripts/jquery-2.2.4.min.js')}"></script>
	{if getUrl(0) == 'ad-add' || getUrl(0) == 'my-ads'}
		<script type="text/javascript" src="{siteUrl('public/scripts/jquery.form.min.js')}"></script>
		{literal}<script type="text/javascript">var uploadImageLimit = {/literal}{if userInfo($smarty.session.userId, 'user_status') == 1}{getSetting('individual_upload')}{elseif userInfo($smarty.session.userId, 'user_status') == 2}{getSetting('corporate_upload')}{/if}{literal}, userType = {/literal}{userInfo($smarty.session.userId, 'user_status')}{literal}, adEdit = false;</script>{/literal}
	{/if}
	{if getUrl(0) == 'create-store' || getUrl(0) == 'my-store'}
		{literal}<script type="text/javascript">var subdomainName = '{/literal}{$header.siteConfig.siteStoreDomain}{literal}'</script>{/literal}
	{/if}
	{if !getUrl(0) OR getUrl(0) == 'index' OR getUrl(0) == 'ad-add' OR getUrl(0) == 'view'}
		<script type="text/javascript" src="{siteUrl('public/scripts/owl.carousel.min.js')}"></script>
	{/if}
	{if !getUrl(0) OR getUrl(0) == 'index'}
		<script type="text/javascript">
			$(function() {
				$('.slider .owl-carousel').owlCarousel({
				    margin:0,
				    responsive:{
				        0:{
				            items:1
				        },
				        600:{
				            items:1
				        },
				        1000:{
				            items:1
				        }
				    }
				});

				$('.store-slider .owl-carousel').owlCarousel({
					autoplay: true,
					nav: true,
					navText: ['<i class="material-icons">keyboard_arrow_left</i>','<i class="material-icons">keyboard_arrow_right</i>'],
				    margin:10,
				    responsive:{
				        0:{
				            items:1,
				            margin:0
				        },
				        600:{
				            items:3,
				            margin:10
				        },
				        1000:{
				            items:5,
				            margin:10
				        }
				    }
				});
			});
		</script>
	{/if}
	{literal}<script type="text/javascript">var siteUrl = '{/literal}{SITE_URL}{literal}', ajaxLock = false, upInt = 0;</script>{/literal}
	<!--[if lt IE 9]>
        <script src="{siteUrl('public/scripts/html5shiv.js')}"></script>
        <script src="{siteUrl('public/scripts/respond.min.js')}"></script>
    <![endif]-->

    {assign var=Category value=$header.Category scope="global"}
    {assign var=Notifications value=$header.Notifications scope="global"}
    {assign var=Messages value=$header.Messages scope="global"}
    {assign var=News value=$header.News scope="global"}
</head>
</html>