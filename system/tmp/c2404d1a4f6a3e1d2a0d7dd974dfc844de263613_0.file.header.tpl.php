<?php /* Smarty version 3.1.27, created on 2017-09-15 11:48:35
         compiled from "C:\xampp\htdocs\galericilerden\app\view\admin\static\header.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2757559bba1f3b94a81_35365049%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c2404d1a4f6a3e1d2a0d7dd974dfc844de263613' => 
    array (
      0 => 'C:\\xampp\\htdocs\\galericilerden\\app\\view\\admin\\static\\header.tpl',
      1 => 1503481275,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2757559bba1f3b94a81_35365049',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_59bba1f3c9e4c4_38269930',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_59bba1f3c9e4c4_38269930')) {
function content_59bba1f3c9e4c4_38269930 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2757559bba1f3b94a81_35365049';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	<title><?php echo SITE_NAME;?>
 | Admin</title>
	<link rel="stylesheet" href="<?php echo siteUrl('public/admin/assets/css/bootstrap.min.css');?>
" />
	<link rel="stylesheet" href="<?php echo siteUrl('public/admin/assets/font-awesome/4.5.0/css/font-awesome.min.css');?>
" />
	<link rel="stylesheet" href="<?php echo siteUrl('public/admin/assets/css/fonts.googleapis.com.css');?>
" />
	<link rel="stylesheet" href="<?php echo siteUrl('public/admin/assets/css/ace.min.css');?>
" />
	<!--[if lte IE 9]>
		<link rel="stylesheet" href="<?php echo siteUrl('public/admin/assets/css/ace-part2.min.css');?>
" />
	<![endif]-->
	<link rel="stylesheet" href="<?php echo siteUrl('public/admin/assets/css/ace-rtl.min.css');?>
" />
	<link rel="stylesheet" href="<?php echo siteUrl('public/admin/assets/css/responsive.dataTables.min.css');?>
" />
	<!--[if lte IE 9]>
	  <link rel="stylesheet" href="<?php echo siteUrl('public/admin/ssets/css/ace-ie.min.css');?>
" />
	<![endif]-->
	<!--[if lte IE 8]>
	<?php echo '<script'; ?>
 src="<?php echo siteUrl('public/admin/assets/js/html5shiv.min.js');?>
"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo siteUrl('public/admin/assets/js/respond.min.js');?>
"><?php echo '</script'; ?>
>
	<![endif]-->
	<?php echo '<script'; ?>
 src="<?php echo siteUrl('public/admin/assets/js/jquery-2.1.4.min.js');?>
"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript">var siteUrl = '<?php echo SITE_URL;?>
'<?php echo '</script'; ?>
>
</head>
<?php if ($_SESSION['adminLogin']) {?>
	<?php echo $_smarty_tpl->getSubTemplate ("admin/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php }?>
</html><?php }
}
?>