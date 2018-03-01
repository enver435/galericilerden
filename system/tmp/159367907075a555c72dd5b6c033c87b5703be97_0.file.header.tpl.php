<?php /* Smarty version 3.1.27, created on 2017-12-11 14:27:55
         compiled from "C:\xampp\htdocs\galericilerden\app\view\static\header.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:313355a2e87dbab7c50_17107878%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '159367907075a555c72dd5b6c033c87b5703be97' => 
    array (
      0 => 'C:\\xampp\\htdocs\\galericilerden\\app\\view\\static\\header.tpl',
      1 => 1509031661,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '313355a2e87dbab7c50_17107878',
  'variables' => 
  array (
    'header' => 0,
    'adInfo' => 0,
    'categoryInfo2' => 0,
    'categoryInfo3' => 0,
    'categoryInfo4' => 0,
    'adImages' => 0,
    'image' => 0,
    'categoryInfo1' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5a2e87dbc03181_31083282',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5a2e87dbc03181_31083282')) {
function content_5a2e87dbc03181_31083282 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once 'C:\\xampp\\htdocs\\galericilerden\\system\\plugin\\smarty\\plugins\\modifier.replace.php';

$_smarty_tpl->properties['nocache_hash'] = '313355a2e87dbab7c50_17107878';
?>
<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, shrink-to-fit=no, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta name="rating" content="general">
	<meta name="robots" content="NOODP,index,follow<?php if (getUrl(0) == 'view') {?>,noarchive<?php }?>">
	<?php if (getUrl(0) == 'view') {?>

		<?php if (isset($_smarty_tpl->tpl_vars['adInfo'])) {$_smarty_tpl->tpl_vars['adInfo'] = clone $_smarty_tpl->tpl_vars['adInfo'];
$_smarty_tpl->tpl_vars['adInfo']->value = $_smarty_tpl->tpl_vars['header']->value['Ads']->adInfo($_GET['id']); $_smarty_tpl->tpl_vars['adInfo']->nocache = null; $_smarty_tpl->tpl_vars['adInfo']->scope = 0;
} else $_smarty_tpl->tpl_vars['adInfo'] = new Smarty_Variable($_smarty_tpl->tpl_vars['header']->value['Ads']->adInfo($_GET['id']), null, 0);?>
		<?php if (isset($_smarty_tpl->tpl_vars['adImages'])) {$_smarty_tpl->tpl_vars['adImages'] = clone $_smarty_tpl->tpl_vars['adImages'];
$_smarty_tpl->tpl_vars['adImages']->value = $_smarty_tpl->tpl_vars['header']->value['Ads']->adImages($_GET['id']); $_smarty_tpl->tpl_vars['adImages']->nocache = null; $_smarty_tpl->tpl_vars['adImages']->scope = 0;
} else $_smarty_tpl->tpl_vars['adImages'] = new Smarty_Variable($_smarty_tpl->tpl_vars['header']->value['Ads']->adImages($_GET['id']), null, 0);?>
	
		<?php if (isset($_smarty_tpl->tpl_vars['categoryInfo1'])) {$_smarty_tpl->tpl_vars['categoryInfo1'] = clone $_smarty_tpl->tpl_vars['categoryInfo1'];
$_smarty_tpl->tpl_vars['categoryInfo1']->value = smarty_modifier_replace($_smarty_tpl->tpl_vars['header']->value['Category']->categoryInfo($_smarty_tpl->tpl_vars['adInfo']->value['category1']),' ',''); $_smarty_tpl->tpl_vars['categoryInfo1']->nocache = null; $_smarty_tpl->tpl_vars['categoryInfo1']->scope = 0;
} else $_smarty_tpl->tpl_vars['categoryInfo1'] = new Smarty_Variable(smarty_modifier_replace($_smarty_tpl->tpl_vars['header']->value['Category']->categoryInfo($_smarty_tpl->tpl_vars['adInfo']->value['category1']),' ',''), null, 0);?>
		<?php if (isset($_smarty_tpl->tpl_vars['categoryInfo2'])) {$_smarty_tpl->tpl_vars['categoryInfo2'] = clone $_smarty_tpl->tpl_vars['categoryInfo2'];
$_smarty_tpl->tpl_vars['categoryInfo2']->value = smarty_modifier_replace($_smarty_tpl->tpl_vars['header']->value['Category']->categoryInfo($_smarty_tpl->tpl_vars['adInfo']->value['category2']),' ',''); $_smarty_tpl->tpl_vars['categoryInfo2']->nocache = null; $_smarty_tpl->tpl_vars['categoryInfo2']->scope = 0;
} else $_smarty_tpl->tpl_vars['categoryInfo2'] = new Smarty_Variable(smarty_modifier_replace($_smarty_tpl->tpl_vars['header']->value['Category']->categoryInfo($_smarty_tpl->tpl_vars['adInfo']->value['category2']),' ',''), null, 0);?>
		<?php if (isset($_smarty_tpl->tpl_vars['categoryInfo3'])) {$_smarty_tpl->tpl_vars['categoryInfo3'] = clone $_smarty_tpl->tpl_vars['categoryInfo3'];
$_smarty_tpl->tpl_vars['categoryInfo3']->value = smarty_modifier_replace($_smarty_tpl->tpl_vars['header']->value['Category']->categoryInfo($_smarty_tpl->tpl_vars['adInfo']->value['category3']),' ',''); $_smarty_tpl->tpl_vars['categoryInfo3']->nocache = null; $_smarty_tpl->tpl_vars['categoryInfo3']->scope = 0;
} else $_smarty_tpl->tpl_vars['categoryInfo3'] = new Smarty_Variable(smarty_modifier_replace($_smarty_tpl->tpl_vars['header']->value['Category']->categoryInfo($_smarty_tpl->tpl_vars['adInfo']->value['category3']),' ',''), null, 0);?>
		<?php if (isset($_smarty_tpl->tpl_vars['categoryInfo4'])) {$_smarty_tpl->tpl_vars['categoryInfo4'] = clone $_smarty_tpl->tpl_vars['categoryInfo4'];
$_smarty_tpl->tpl_vars['categoryInfo4']->value = smarty_modifier_replace($_smarty_tpl->tpl_vars['header']->value['Category']->categoryInfo($_smarty_tpl->tpl_vars['adInfo']->value['category4']),' ',''); $_smarty_tpl->tpl_vars['categoryInfo4']->nocache = null; $_smarty_tpl->tpl_vars['categoryInfo4']->scope = 0;
} else $_smarty_tpl->tpl_vars['categoryInfo4'] = new Smarty_Variable(smarty_modifier_replace($_smarty_tpl->tpl_vars['header']->value['Category']->categoryInfo($_smarty_tpl->tpl_vars['adInfo']->value['category4']),' ',''), null, 0);?>
		
		<meta name="og:type" content="product">
		<meta name="og:title" content="<?php if ($_smarty_tpl->tpl_vars['categoryInfo2']->value != '') {
echo $_smarty_tpl->tpl_vars['categoryInfo2']->value['kategori_adi'];
}
if ($_smarty_tpl->tpl_vars['categoryInfo2']->value != '') {?> / <?php echo $_smarty_tpl->tpl_vars['categoryInfo3']->value['kategori_adi'];
}
if ($_smarty_tpl->tpl_vars['categoryInfo4']->value != '') {?> / <?php echo $_smarty_tpl->tpl_vars['categoryInfo4']->value['kategori_adi'];
}?> / <?php echo mb_strtoupper($_smarty_tpl->tpl_vars['adInfo']->value['title'], 'UTF-8');?>
 galericilerden.comda - <?php echo $_smarty_tpl->tpl_vars['adInfo']->value['id'];?>
">
		<meta name="og:site_name" content="galericilerden.com">
		<?php
$_from = $_smarty_tpl->tpl_vars['adImages']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['image'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['image']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
$foreach_image_Sav = $_smarty_tpl->tpl_vars['image'];
?>
			<meta name="og:image" content="<?php echo siteUrl('files/ads/big');?>
/<?php echo $_smarty_tpl->tpl_vars['image']->value['image'];?>
.jpg">
		<?php
$_smarty_tpl->tpl_vars['image'] = $foreach_image_Sav;
}
?>
		<meta name="og:url" content="<?php echo siteUrl('view');?>
/<?php echo $_smarty_tpl->tpl_vars['adInfo']->value['seflink'];?>
-<?php echo $_smarty_tpl->tpl_vars['adInfo']->value['id'];?>
">
		<meta name="twitter:card" content="summary">
		<meta name="twitter:url" content="<?php echo siteUrl('view');?>
/<?php echo $_smarty_tpl->tpl_vars['adInfo']->value['seflink'];?>
-<?php echo $_smarty_tpl->tpl_vars['adInfo']->value['id'];?>
">
		<meta name="twitter:title" content="<?php if ($_smarty_tpl->tpl_vars['categoryInfo2']->value != '') {
echo $_smarty_tpl->tpl_vars['categoryInfo2']->value['kategori_adi'];
}
if ($_smarty_tpl->tpl_vars['categoryInfo3']->value != '') {?> / <?php echo $_smarty_tpl->tpl_vars['categoryInfo3']->value['kategori_adi'];
}
if ($_smarty_tpl->tpl_vars['categoryInfo4']->value != '') {?> / <?php echo $_smarty_tpl->tpl_vars['categoryInfo4']->value['kategori_adi'];
}?> / <?php echo mb_strtoupper($_smarty_tpl->tpl_vars['adInfo']->value['title'], 'UTF-8');?>
 galericilerden.comda - <?php echo $_smarty_tpl->tpl_vars['adInfo']->value['id'];?>
">
		<meta name="twitter:description" content="<?php if ($_smarty_tpl->tpl_vars['categoryInfo2']->value != '') {
echo $_smarty_tpl->tpl_vars['categoryInfo2']->value['kategori_adi'];
}
if ($_smarty_tpl->tpl_vars['categoryInfo3']->value != '') {?> / <?php echo $_smarty_tpl->tpl_vars['categoryInfo3']->value['kategori_adi'];
}
if ($_smarty_tpl->tpl_vars['categoryInfo4']->value != '') {?> / <?php echo $_smarty_tpl->tpl_vars['categoryInfo4']->value['kategori_adi'];
}?> / <?php echo mb_strtoupper($_smarty_tpl->tpl_vars['adInfo']->value['title'], 'UTF-8');?>
 galericilerden.comda - <?php echo $_smarty_tpl->tpl_vars['adInfo']->value['id'];?>
">
		<meta name="twitter:image" content="<?php echo siteUrl('files/ads/big');?>
/<?php echo $_smarty_tpl->tpl_vars['adInfo']->value['title_image'];?>
.jpg">
		<meta name="description" content="<?php if ($_smarty_tpl->tpl_vars['categoryInfo2']->value != '') {
echo $_smarty_tpl->tpl_vars['categoryInfo2']->value['kategori_adi'];
}
if ($_smarty_tpl->tpl_vars['categoryInfo3']->value != '') {?> / <?php echo $_smarty_tpl->tpl_vars['categoryInfo3']->value['kategori_adi'];
}
if ($_smarty_tpl->tpl_vars['categoryInfo4']->value != '') {?> / <?php echo $_smarty_tpl->tpl_vars['categoryInfo4']->value['kategori_adi'];
}?> / <?php echo mb_strtoupper($_smarty_tpl->tpl_vars['adInfo']->value['title'], 'UTF-8');?>
 galericilerden.comda - <?php echo $_smarty_tpl->tpl_vars['adInfo']->value['id'];?>
">
		<meta name="keywords" content="Galeriden <?php if ($_smarty_tpl->tpl_vars['categoryInfo2']->value != '') {
echo $_smarty_tpl->tpl_vars['categoryInfo2']->value['kategori_adi'];
}?> <?php if ($_smarty_tpl->tpl_vars['categoryInfo3']->value != '') {
echo $_smarty_tpl->tpl_vars['categoryInfo3']->value['kategori_adi'];
}?> <?php if ($_smarty_tpl->tpl_vars['categoryInfo4']->value != '') {
echo $_smarty_tpl->tpl_vars['categoryInfo4']->value['kategori_adi'];
}?>, <?php if ($_smarty_tpl->tpl_vars['categoryInfo1']->value != '') {
echo $_smarty_tpl->tpl_vars['categoryInfo1']->value['kategori_adi'];
}?>, <?php if ($_smarty_tpl->tpl_vars['categoryInfo2']->value != '') {
echo $_smarty_tpl->tpl_vars['categoryInfo2']->value['kategori_adi'];
}
if ($_smarty_tpl->tpl_vars['categoryInfo3']->value != '') {?>, <?php echo $_smarty_tpl->tpl_vars['categoryInfo3']->value['kategori_adi'];
}
if ($_smarty_tpl->tpl_vars['categoryInfo4']->value != '') {?>, <?php echo $_smarty_tpl->tpl_vars['categoryInfo4']->value['kategori_adi'];
}?>, Satılık <?php if ($_smarty_tpl->tpl_vars['categoryInfo2']->value != '') {
echo $_smarty_tpl->tpl_vars['categoryInfo2']->value['kategori_adi'];
}
if ($_smarty_tpl->tpl_vars['adInfo']->value['year'] > 0) {?>, <?php echo $_smarty_tpl->tpl_vars['adInfo']->value['year'];?>
 <?php if ($_smarty_tpl->tpl_vars['categoryInfo2']->value != '') {
echo $_smarty_tpl->tpl_vars['categoryInfo2']->value['kategori_adi'];
}?> <?php if ($_smarty_tpl->tpl_vars['categoryInfo3']->value != '') {
echo $_smarty_tpl->tpl_vars['categoryInfo3']->value['kategori_adi'];
}
}?>">
		<link rel="shortcut icon" href="<?php echo siteUrl('favicon.ico');?>
">
		<title><?php if ($_smarty_tpl->tpl_vars['categoryInfo2']->value != '') {
echo $_smarty_tpl->tpl_vars['categoryInfo2']->value['kategori_adi'];
}
if ($_smarty_tpl->tpl_vars['categoryInfo3']->value != '') {?> / <?php echo $_smarty_tpl->tpl_vars['categoryInfo3']->value['kategori_adi'];
}
if ($_smarty_tpl->tpl_vars['categoryInfo4']->value != '') {?> / <?php echo $_smarty_tpl->tpl_vars['categoryInfo4']->value['kategori_adi'];
}?> / <?php echo $_smarty_tpl->tpl_vars['adInfo']->value['title'];?>
 galericilerden.comda - <?php echo $_smarty_tpl->tpl_vars['adInfo']->value['id'];?>
</title>
		<link rel="canonical" href="<?php echo siteUrl('view');?>
/<?php echo $_smarty_tpl->tpl_vars['adInfo']->value['seflink'];?>
-<?php echo $_smarty_tpl->tpl_vars['adInfo']->value['id'];?>
">
	<?php } else { ?>
		<meta name="description" content="<?php echo DESC;?>
">
	    <meta name="keywords" content="<?php echo KEYS;?>
">
	    <meta name="author" content="<?php echo AUTHOR;?>
">
	    <link rel="shortcut icon" href="<?php echo siteUrl('favicon.ico');?>
">

	    <?php if (getUrl(0) == 'category') {?>
	    	<link rel="canonical" href="<?php echo siteUrl('cat-');
echo get('catId');?>
/<?php echo get('catSeflink');?>
">
	    <?php } elseif (getUrl(0) == 'category-special') {?>
	    	<link rel="canonical" href="<?php echo siteUrl('category-special');?>
/<?php echo get('catType');?>
">
	    <?php } elseif (getUrl(0) == 'user') {?>
	    	<link rel="canonical" href="<?php echo siteUrl('user-');
echo get('userId');?>
/<?php echo get('userSeflink');?>
">
    	<?php } elseif (getUrl(0) == 'page') {?>
			<link rel="canonical" href="<?php echo siteUrl('page');?>
/<?php echo getUrl(1);?>
">
		<?php } elseif (getUrl(0) == 'ad-add') {?>
			<link rel="canonical" href="<?php echo siteUrl('ad-add');?>
">
		<?php } elseif (getUrl(0) == 'my') {?>
			<link rel="canonical" href="<?php echo siteUrl('my');?>
">
		<?php } elseif (getUrl(0) == 'my-ads' && getUrl(1) == 'active' || getUrl(1) == 'passive' || getUrl(1) == 'finished' || getUrl(1) == 'pending' || getUrl(1) == 'unconfirmed') {?>
			<link rel="canonical" href="<?php echo siteUrl('my-ads');?>
/<?php echo getUrl(1);?>
">
		<?php } elseif (getUrl(0) == 'my-favorites' || getUrl(1) == 'ads' || getUrl(1) == 'search') {?>
			<link rel="canonical" href="<?php echo siteUrl('my-favorites');?>
/<?php echo getUrl(1);?>
">
		<?php } elseif (!getUrl(0)) {?>
			<link rel="canonical" href="<?php echo SITE_URL;?>
">
			<meta name="x-canonical-url" content="/">
	    <?php }?>
	    <title><?php echo SITE_NAME;?>
</title>
    <?php }?>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="<?php if ($_smarty_tpl->tpl_vars['header']->value['siteConfig']['minify'] === false) {
echo siteUrl('public/styles/styles.css');
} else {
echo siteUrl('public/styles/styles.min.css');
}?>" media="screen" />
	<link rel="stylesheet" href="<?php if ($_smarty_tpl->tpl_vars['header']->value['siteConfig']['minify'] === false) {
echo siteUrl('public/styles/responsive.css');
} else {
echo siteUrl('public/styles/responsive.min.css');
}?>" media="screen" />
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo siteUrl('public/scripts/jquery-2.2.4.min.js');?>
"><?php echo '</script'; ?>
>
	<?php if (getUrl(0) == 'ad-add' || getUrl(0) == 'my-ads') {?>
		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo siteUrl('public/scripts/jquery.form.min.js');?>
"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript">var uploadImageLimit = <?php if (userInfo($_SESSION['userId'],'user_status') == 1) {
echo getSetting('individual_upload');
} elseif (userInfo($_SESSION['userId'],'user_status') == 2) {
echo getSetting('corporate_upload');
}?>, userType = <?php echo userInfo($_SESSION['userId'],'user_status');?>
, adEdit = false;<?php echo '</script'; ?>
>
	<?php }?>
	<?php if (getUrl(0) == 'create-store' || getUrl(0) == 'my-store') {?>
		<?php echo '<script'; ?>
 type="text/javascript">var subdomainName = '<?php echo $_smarty_tpl->tpl_vars['header']->value['siteConfig']['siteStoreDomain'];?>
'<?php echo '</script'; ?>
>
	<?php }?>
	<?php if (!getUrl(0) || getUrl(0) == 'index' || getUrl(0) == 'ad-add' || getUrl(0) == 'view') {?>
		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo siteUrl('public/scripts/owl.carousel.min.js');?>
"><?php echo '</script'; ?>
>
	<?php }?>
	<?php if (!getUrl(0) || getUrl(0) == 'index') {?>
		<?php echo '<script'; ?>
 type="text/javascript">
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
		<?php echo '</script'; ?>
>
	<?php }?>
	<?php echo '<script'; ?>
 type="text/javascript">var siteUrl = '<?php echo SITE_URL;?>
', ajaxLock = false, upInt = 0;<?php echo '</script'; ?>
>
	<!--[if lt IE 9]>
        <?php echo '<script'; ?>
 src="<?php echo siteUrl('public/scripts/html5shiv.js');?>
"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo siteUrl('public/scripts/respond.min.js');?>
"><?php echo '</script'; ?>
>
    <![endif]-->

    <?php if (isset($_smarty_tpl->tpl_vars['Category'])) {$_smarty_tpl->tpl_vars['Category'] = clone $_smarty_tpl->tpl_vars['Category'];
$_smarty_tpl->tpl_vars['Category']->value = $_smarty_tpl->tpl_vars['header']->value['Category']; $_smarty_tpl->tpl_vars['Category']->nocache = null; $_smarty_tpl->tpl_vars['Category']->scope = 3;
} else $_smarty_tpl->tpl_vars['Category'] = new Smarty_Variable($_smarty_tpl->tpl_vars['header']->value['Category'], null, 3);
$_ptr = $_smarty_tpl->parent; while ($_ptr != null) {$_ptr->tpl_vars['Category'] = clone $_smarty_tpl->tpl_vars['Category']; $_ptr = $_ptr->parent; }
Smarty::$global_tpl_vars['Category'] = clone $_smarty_tpl->tpl_vars['Category'];?>
    <?php if (isset($_smarty_tpl->tpl_vars['Notifications'])) {$_smarty_tpl->tpl_vars['Notifications'] = clone $_smarty_tpl->tpl_vars['Notifications'];
$_smarty_tpl->tpl_vars['Notifications']->value = $_smarty_tpl->tpl_vars['header']->value['Notifications']; $_smarty_tpl->tpl_vars['Notifications']->nocache = null; $_smarty_tpl->tpl_vars['Notifications']->scope = 3;
} else $_smarty_tpl->tpl_vars['Notifications'] = new Smarty_Variable($_smarty_tpl->tpl_vars['header']->value['Notifications'], null, 3);
$_ptr = $_smarty_tpl->parent; while ($_ptr != null) {$_ptr->tpl_vars['Notifications'] = clone $_smarty_tpl->tpl_vars['Notifications']; $_ptr = $_ptr->parent; }
Smarty::$global_tpl_vars['Notifications'] = clone $_smarty_tpl->tpl_vars['Notifications'];?>
    <?php if (isset($_smarty_tpl->tpl_vars['Messages'])) {$_smarty_tpl->tpl_vars['Messages'] = clone $_smarty_tpl->tpl_vars['Messages'];
$_smarty_tpl->tpl_vars['Messages']->value = $_smarty_tpl->tpl_vars['header']->value['Messages']; $_smarty_tpl->tpl_vars['Messages']->nocache = null; $_smarty_tpl->tpl_vars['Messages']->scope = 3;
} else $_smarty_tpl->tpl_vars['Messages'] = new Smarty_Variable($_smarty_tpl->tpl_vars['header']->value['Messages'], null, 3);
$_ptr = $_smarty_tpl->parent; while ($_ptr != null) {$_ptr->tpl_vars['Messages'] = clone $_smarty_tpl->tpl_vars['Messages']; $_ptr = $_ptr->parent; }
Smarty::$global_tpl_vars['Messages'] = clone $_smarty_tpl->tpl_vars['Messages'];?>
    <?php if (isset($_smarty_tpl->tpl_vars['News'])) {$_smarty_tpl->tpl_vars['News'] = clone $_smarty_tpl->tpl_vars['News'];
$_smarty_tpl->tpl_vars['News']->value = $_smarty_tpl->tpl_vars['header']->value['News']; $_smarty_tpl->tpl_vars['News']->nocache = null; $_smarty_tpl->tpl_vars['News']->scope = 3;
} else $_smarty_tpl->tpl_vars['News'] = new Smarty_Variable($_smarty_tpl->tpl_vars['header']->value['News'], null, 3);
$_ptr = $_smarty_tpl->parent; while ($_ptr != null) {$_ptr->tpl_vars['News'] = clone $_smarty_tpl->tpl_vars['News']; $_ptr = $_ptr->parent; }
Smarty::$global_tpl_vars['News'] = clone $_smarty_tpl->tpl_vars['News'];?>
</head>
</html><?php }
}
?>