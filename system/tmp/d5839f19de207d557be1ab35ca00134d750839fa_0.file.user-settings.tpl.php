<?php /* Smarty version 3.1.27, created on 2017-09-15 16:41:43
         compiled from "C:\xampp\htdocs\galericilerden\app\view\admin\user-settings.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1152059bbe6a7104ad6_17823440%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd5839f19de207d557be1ab35ca00134d750839fa' => 
    array (
      0 => 'C:\\xampp\\htdocs\\galericilerden\\app\\view\\admin\\user-settings.tpl',
      1 => 1504699735,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1152059bbe6a7104ad6_17823440',
  'variables' => 
  array (
    'return' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_59bbe6a718d672_28290125',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_59bbe6a718d672_28290125')) {
function content_59bbe6a718d672_28290125 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1152059bbe6a7104ad6_17823440';
?>
<body class="no-skin">
<div class="main-container ace-save-state" id="main-container">
	
		<?php echo '<script'; ?>
 type="text/javascript">
			try{ace.settings.loadState('main-container')}catch(e){}
		<?php echo '</script'; ?>
>
	

	<?php echo $_smarty_tpl->getSubTemplate ("admin/static/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

	
	<div class="main-content">
		<div class="main-content-inner">
			<div class="breadcrumbs ace-save-state" id="breadcrumbs">
				<ul class="breadcrumb" style="margin-top: 10px;">
					<li>
						<i class="ace-icon fa fa-home home-icon"></i>
						<a href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
">Ana Sayfa</a>
					</li>

					<!--<li>
						<a href="#">Other Pages</a>
					</li>
					<li class="active">Blank Page</li>-->
				</ul>
			</div>

			<div class="page-content">
				<div class="row">
					<div class="col-xs-12">
						<?php if (isset($_POST['save'])) {?>
							<?php if ($_smarty_tpl->tpl_vars['return']->value['messageType'] == 'success') {?>
								<div class="alert alert-success">
									<strong>Başarılı!</strong> <?php echo $_smarty_tpl->tpl_vars['return']->value['message'];?>

								</div>
							<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['messageType'] == 'error') {?>
								<div class="alert alert-danger">
									<strong>Hata!</strong> <?php echo $_smarty_tpl->tpl_vars['return']->value['message'];?>

								</div>
							<?php }?>
						<?php }?>
						<form action="" method="POST">
							<div class="form-group">
								<label>Bireysel Kullanıcı Yıllık İlan Limiti: </label>
								<input type="number" name="individual_ad_limit" value="<?php echo getSetting('individual_ad_limit');?>
" class="form-control">
							</div>
							<div class="form-group">
								<label>Kurumsal Kullanıcı Yıllık İlan Limiti: </label>
								<input type="number" name="corporate_ad_limit" value="<?php echo getSetting('corporate_ad_limit');?>
" class="form-control">
							</div>
							<div class="form-group">
								<label>Bireysel Kullanıcı İlan Resim Limiti: </label>
								<input type="number" name="individual_upload" value="<?php echo getSetting('individual_upload');?>
" class="form-control">
							</div>
							<div class="form-group">
								<label>Kurumsal Kullanıcı İlan Resim Limiti: </label>
								<input type="number" name="corporate_upload" value="<?php echo getSetting('corporate_upload');?>
" class="form-control">
							</div>
							<div class="form-group">
								<label>Bireysel Kullanıcı İlan Fıyatı (Eğer yıllık ilan limiti dolmuşsa ödenecek tutar): </label>
								<div class="input-group">
									<input type="number" step="any" name="individual_ad_limit_price" value="<?php echo getSetting('individual_ad_limit_price');?>
" class="form-control">
									<span class="input-group-addon">TL</span>
								</div>
							</div>
							<button type="submit" name="save" class="btn btn-primary pull-right">Kaydet</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="footer">
		<div class="footer-inner">
			<div class="footer-content">
				<span class="bigger-120">
					<span class="blue bolder">Galericilerden</span>
					&copy; 2016-2017
				</span>
			</div>
		</div>
	</div>

	<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
		<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
	</a>
</div><?php }
}
?>