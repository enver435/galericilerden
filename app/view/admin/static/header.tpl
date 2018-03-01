<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	<title>{SITE_NAME} | Admin</title>
	<link rel="stylesheet" href="{siteUrl('public/admin/assets/css/bootstrap.min.css')}" />
	<link rel="stylesheet" href="{siteUrl('public/admin/assets/font-awesome/4.5.0/css/font-awesome.min.css')}" />
	<link rel="stylesheet" href="{siteUrl('public/admin/assets/css/fonts.googleapis.com.css')}" />
	<link rel="stylesheet" href="{siteUrl('public/admin/assets/css/ace.min.css')}" />
	<!--[if lte IE 9]>
		<link rel="stylesheet" href="{siteUrl('public/admin/assets/css/ace-part2.min.css')}" />
	<![endif]-->
	<link rel="stylesheet" href="{siteUrl('public/admin/assets/css/ace-rtl.min.css')}" />
	<link rel="stylesheet" href="{siteUrl('public/admin/assets/css/responsive.dataTables.min.css')}" />
	<!--[if lte IE 9]>
	  <link rel="stylesheet" href="{siteUrl('public/admin/ssets/css/ace-ie.min.css')}" />
	<![endif]-->
	<!--[if lte IE 8]>
	<script src="{siteUrl('public/admin/assets/js/html5shiv.min.js')}"></script>
	<script src="{siteUrl('public/admin/assets/js/respond.min.js')}"></script>
	<![endif]-->
	<script src="{siteUrl('public/admin/assets/js/jquery-2.1.4.min.js')}"></script>
	{literal}<script type="text/javascript">var siteUrl = '{/literal}{SITE_URL}{literal}'</script>{/literal}
</head>
{if $smarty.session.adminLogin}
	{include file="admin/header.tpl"}
{/if}
</html>