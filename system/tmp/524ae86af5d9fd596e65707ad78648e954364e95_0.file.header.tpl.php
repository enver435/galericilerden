<?php /* Smarty version 3.1.27, created on 2018-01-19 11:56:31
         compiled from "C:\xampp\htdocs\galericilerden\app\view\store\static\header.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:61845a61cedf61bd08_72489029%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '524ae86af5d9fd596e65707ad78648e954364e95' => 
    array (
      0 => 'C:\\xampp\\htdocs\\galericilerden\\app\\view\\store\\static\\header.tpl',
      1 => 1509029128,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '61845a61cedf61bd08_72489029',
  'variables' => 
  array (
    'header' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5a61cee0548d65_17055910',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5a61cee0548d65_17055910')) {
function content_5a61cee0548d65_17055910 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '61845a61cedf61bd08_72489029';
?>
<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, shrink-to-fit=no, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta name="rating" content="general">
	<meta name="robots" content="NOODP,index,follow">

	<meta name="og:type" content="store">
	<meta name="og:title" content="<?php echo mb_strtoupper($_smarty_tpl->tpl_vars['header']->value['storeInfo']['store_name'], 'UTF-8');?>
">
	<meta name="og:site_name" content="galericilerden.com">
	<meta name="og:image" content="<?php echo siteUrl('public/images/store/header');
echo $_smarty_tpl->tpl_vars['header']->value['storeInfo']['store_theme'];?>
.jpg">
	<meta name="og:url" content="<?php echo $_SERVER['HTTP_HOST'];?>
">
	<meta name="description" content="<?php echo mb_strtoupper($_smarty_tpl->tpl_vars['header']->value['storeInfo']['store_name'], 'UTF-8');?>
 - <?php echo DESC;?>
">
	<meta name="author" content="<?php echo AUTHOR;?>
">
	<link rel="shortcut icon" href="<?php echo siteUrl('favicon.ico');?>
">
	<title><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['header']->value['storeInfo']['store_name'], 'UTF-8');?>
 İlanları galericilerden.com'da!</title>
	
	<link rel="canonical" href="<?php echo $_SERVER['HTTP_HOST'];?>
">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="<?php if ($_smarty_tpl->tpl_vars['header']->value['siteConfig']['minify'] === false) {
echo siteUrl('public/styles/styles.css');
} else {
echo siteUrl('public/styles/styles.min.css');
}?>" />
	<link rel="stylesheet" href="<?php if ($_smarty_tpl->tpl_vars['header']->value['siteConfig']['minify'] === false) {
echo siteUrl('public/styles/responsive.css');
} else {
echo siteUrl('public/styles/responsive.min.css');
}?>" />
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo siteUrl('public/scripts/jquery-2.2.4.min.js');?>
"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript">var siteUrl = '<?php echo SITE_URL;?>
', ajaxLock = false;<?php echo '</script'; ?>
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
</head>
</html><?php }
}
?>