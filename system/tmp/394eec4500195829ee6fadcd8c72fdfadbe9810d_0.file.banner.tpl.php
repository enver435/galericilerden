<?php /* Smarty version 3.1.27, created on 2018-01-18 11:46:04
         compiled from "C:\xampp\htdocs\galericilerden\app\view\admin\banner.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:795a607aec5805e3_93006732%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '394eec4500195829ee6fadcd8c72fdfadbe9810d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\galericilerden\\app\\view\\admin\\banner.tpl',
      1 => 1507788125,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '795a607aec5805e3_93006732',
  'variables' => 
  array (
    'return' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5a607aed01aa60_98469463',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5a607aed01aa60_98469463')) {
function content_5a607aed01aa60_98469463 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '795a607aec5805e3_93006732';
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
			
			
				<style>
					.image-and-link {display: none;}
					.html-code {display: none;}
				</style>
			
			<div class="page-content">
				<div class="row">
					<form action="" method="POST" enctype="multipart/form-data">
						<div class="col-md-8 col-md-offset-2">
							<div class="250x250banner" style="border: 1px solid #ddd;overflow: hidden;padding: 25px;margin-top: 25px;margin-bottom: 25px;">
								<h4>Anasayfa Banneri (250x250)</h4>
								<div class="form-group">
									<label>Seçenek: </label><br>
									<input type="radio" name="250x250banner" value="1" <?php if ($_smarty_tpl->tpl_vars['return']->value['bannerInfo250x250']['banner_type'] == 1) {?>checked="checked"<?php }?>> Resim ve Link<br>
									<input type="radio" name="250x250banner" value="2" <?php if ($_smarty_tpl->tpl_vars['return']->value['bannerInfo250x250']['banner_type'] == 2) {?>checked="checked"<?php }?>> Html Kod
								</div>
								<div class="image-and-link" <?php if ($_smarty_tpl->tpl_vars['return']->value['bannerInfo250x250']['banner_type'] == 1) {?>style="display: block;"<?php }?>>
									<div class="col-md-8 col-md-offset-2">
										<div class="image">
											<h5 class="text-center">Resim Yükle</h5> 
											<input type="file" name="250x250banner" class="form-control">
											<?php if ($_smarty_tpl->tpl_vars['return']->value['bannerInfo250x250']['banner_img'] != '') {?>
												<img src="<?php echo siteUrl('files/banner');?>
/<?php echo $_smarty_tpl->tpl_vars['return']->value['bannerInfo250x250']['banner_img'];?>
" style="margin-top: 15px;display: block;margin-left: auto;margin-right: auto;" alt="">
											<?php }?>
											<h5 class="text-center">veya<br><br> Resim Linki Yaz</h5> 
											<input type="url" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['bannerInfo250x250']['banner_img_link'];?>
" name="250x250bannerImageLink">
										</div>

										<div class="bannerLink" style="margin-top: 25px;border-top: 1px solid #ddd;padding-top: 15px;">
											<h5 class="text-center">Banner Linki: </h5>
											<input type="url" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['bannerInfo250x250']['banner_link'];?>
" name="250x250BannerLink">
										</div>
									</div>
								</div>
								<div class="html-code" <?php if ($_smarty_tpl->tpl_vars['return']->value['bannerInfo250x250']['banner_type'] == 2) {?>style="display: block;"<?php }?>>
									<textarea name="htmlCode250x250" cols="30" rows="10" class="form-control"><?php echo $_smarty_tpl->tpl_vars['return']->value['bannerInfo250x250']['banner_html'];?>
</textarea>
								</div>
							</div>

							<div class="ilanDetayWebBanner" style="border: 1px solid #ddd;overflow: hidden;padding: 25px;margin-top: 25px;margin-bottom: 25px;">
								<h4>İlan Detay (Web) Banneri (250x300)</h4>
								<div class="form-group">
									<label>Seçenek: </label><br>
									<input type="radio" name="ilanDetayWebBanner" value="1" <?php if ($_smarty_tpl->tpl_vars['return']->value['bannerInfoIlanDetayWeb']['banner_type'] == 1) {?>checked="checked"<?php }?>> Resim ve Link<br>
									<input type="radio" name="ilanDetayWebBanner" value="2" <?php if ($_smarty_tpl->tpl_vars['return']->value['bannerInfoIlanDetayWeb']['banner_type'] == 2) {?>checked="checked"<?php }?>> Html Kod
								</div>
								<div class="image-and-link" <?php if ($_smarty_tpl->tpl_vars['return']->value['bannerInfoIlanDetayWeb']['banner_type'] == 1) {?>style="display: block;"<?php }?>>
									<div class="col-md-8 col-md-offset-2">
										<div class="image">
											<h5 class="text-center">Resim Yükle</h5> 
											<input type="file" name="ilanDetayWebBanner" class="form-control">
											<?php if ($_smarty_tpl->tpl_vars['return']->value['bannerInfoIlanDetayWeb']['banner_img'] != '') {?>
												<img src="<?php echo siteUrl('files/banner');?>
/<?php echo $_smarty_tpl->tpl_vars['return']->value['bannerInfoIlanDetayWeb']['banner_img'];?>
" style="margin-top: 15px;display: block;margin-left: auto;margin-right: auto;" alt="">
											<?php }?>
											<h5 class="text-center">veya<br><br> Resim Linki Yaz</h5> 
											<input type="url" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['bannerInfoIlanDetayWeb']['banner_img_link'];?>
" name="ilanDetayWebBannerImageLink">
										</div>

										<div class="bannerLink" style="margin-top: 25px;border-top: 1px solid #ddd;padding-top: 15px;">
											<h5 class="text-center">Banner Linki: </h5>
											<input type="url" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['bannerInfoIlanDetayWeb']['banner_link'];?>
" name="ilanDetayWebBannerLink">
										</div>
									</div>
								</div>
								<div class="html-code" <?php if ($_smarty_tpl->tpl_vars['return']->value['bannerInfoIlanDetayWeb']['banner_type'] == 2) {?>style="display: block;"<?php }?>>
									<textarea name="ilanDetayWebHtmlCode" cols="30" rows="10" class="form-control"><?php echo $_smarty_tpl->tpl_vars['return']->value['bannerInfoIlanDetayWeb']['banner_html'];?>
</textarea>
								</div>
							</div>

							<div class="ilanDetayMobilBanner" style="border: 1px solid #ddd;overflow: hidden;padding: 25px;margin-top: 25px;margin-bottom: 25px;">
								<h4>İlan Detay (Mobil) Banneri (Responsive)</h4>
								<div class="form-group">
									<label>Seçenek: </label><br>
									<input type="radio" name="ilanDetayMobilBanner" value="1" <?php if ($_smarty_tpl->tpl_vars['return']->value['bannerInfoIlanDetayMobil']['banner_type'] == 1) {?>checked="checked"<?php }?>> Resim ve Link<br>
									<input type="radio" name="ilanDetayMobilBanner" value="2" <?php if ($_smarty_tpl->tpl_vars['return']->value['bannerInfoIlanDetayMobil']['banner_type'] == 2) {?>checked="checked"<?php }?>> Html Kod
								</div>
								<div class="image-and-link" <?php if ($_smarty_tpl->tpl_vars['return']->value['bannerInfoIlanDetayMobil']['banner_type'] == 1) {?>style="display: block;"<?php }?>>
									<div class="col-md-8 col-md-offset-2">
										<div class="image">
											<h5 class="text-center">Resim Yükle</h5> 
											<input type="file" name="ilanDetayMobilBanner" class="form-control">
											<?php if ($_smarty_tpl->tpl_vars['return']->value['bannerInfoIlanDetayMobil']['banner_img'] != '') {?>
												<img src="<?php echo siteUrl('files/banner');?>
/<?php echo $_smarty_tpl->tpl_vars['return']->value['bannerInfoIlanDetayMobil']['banner_img'];?>
" width="100%" style="margin-top: 15px;display: block;margin-left: auto;margin-right: auto;" alt="">
											<?php }?>
											<h5 class="text-center">veya<br><br> Resim Linki Yaz</h5> 
											<input type="url" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['bannerInfoIlanDetayMobil']['banner_img_link'];?>
" name="ilanDetayMobilBannerImageLink">
										</div>

										<div class="bannerLink" style="margin-top: 25px;border-top: 1px solid #ddd;padding-top: 15px;">
											<h5 class="text-center">Banner Linki: </h5>
											<input type="url" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['bannerInfoIlanDetayMobil']['banner_link'];?>
" name="ilanDetayMobilBannerLink">
										</div>
									</div>
								</div>
								<div class="html-code" <?php if ($_smarty_tpl->tpl_vars['return']->value['bannerInfoIlanDetayMobil']['banner_type'] == 2) {?>style="display: block;"<?php }?>>
									<textarea name="ilanDetayMobilHtmlCode" cols="30" rows="10" class="form-control"><?php echo $_smarty_tpl->tpl_vars['return']->value['bannerInfoIlanDetayMobil']['banner_html'];?>
</textarea>
								</div>
							</div>

							<div class="magazaBanner" style="border: 1px solid #ddd;overflow: hidden;padding: 25px;margin-top: 25px;margin-bottom: 25px;">
								<h4>Anasayfa Mağaza Altı (Mobil) Banneri (Responsive)</h4>
								<div class="form-group">
									<label>Seçenek: </label><br>
									<input type="radio" name="magazaBanner" value="1" <?php if ($_smarty_tpl->tpl_vars['return']->value['bannerInfoMagazaMobil']['banner_type'] == 1) {?>checked="checked"<?php }?>> Resim ve Link<br>
									<input type="radio" name="magazaBanner" value="2" <?php if ($_smarty_tpl->tpl_vars['return']->value['bannerInfoMagazaMobil']['banner_type'] == 2) {?>checked="checked"<?php }?>> Html Kod
								</div>
								<div class="image-and-link" <?php if ($_smarty_tpl->tpl_vars['return']->value['bannerInfoMagazaMobil']['banner_type'] == 1) {?>style="display: block;"<?php }?>>
									<div class="col-md-8 col-md-offset-2">
										<div class="image">
											<h5 class="text-center">Resim Yükle</h5> 
											<input type="file" name="magazaBanner" class="form-control">
											<?php if ($_smarty_tpl->tpl_vars['return']->value['bannerInfoMagazaMobil']['banner_img'] != '') {?>
												<img src="<?php echo siteUrl('files/banner');?>
/<?php echo $_smarty_tpl->tpl_vars['return']->value['bannerInfoMagazaMobil']['banner_img'];?>
" width="100%" style="margin-top: 15px;display: block;margin-left: auto;margin-right: auto;" alt="">
											<?php }?>
											<h5 class="text-center">veya<br><br> Resim Linki Yaz</h5> 
											<input type="url" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['bannerInfoMagazaMobil']['banner_img_link'];?>
" name="magazaBannerImageLink">
										</div>

										<div class="bannerLink" style="margin-top: 25px;border-top: 1px solid #ddd;padding-top: 15px;">
											<h5 class="text-center">Banner Linki: </h5>
											<input type="url" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['bannerInfoMagazaMobil']['banner_link'];?>
" name="magazaBannerLink">
										</div>
									</div>
								</div>
								<div class="html-code" <?php if ($_smarty_tpl->tpl_vars['return']->value['bannerInfoMagazaMobil']['banner_type'] == 2) {?>style="display: block;"<?php }?>>
									<textarea name="magazaBannerHtmlCode" cols="30" rows="10" class="form-control"><?php echo $_smarty_tpl->tpl_vars['return']->value['bannerInfoMagazaMobil']['banner_html'];?>
</textarea>
								</div>
							</div>
							
							<button type="submit" name="save" class="btn btn-primary" style="width: 100%;">Kaydet</button>

							
								<?php echo '<script'; ?>
 type="text/javascript">
									$(function() {
										$('input[type=radio]').change(function() {
											var value = $(this).val();

											if(value == 1)
											{
												$(this).parent().parent().find('.html-code').hide();
												$(this).parent().parent().find('.image-and-link').show();
											}
											else if(value == 2)
											{
												$(this).parent().parent().find('.html-code').show();
												$(this).parent().parent().find('.image-and-link').hide();
											}
										});
									});
								<?php echo '</script'; ?>
>
							
						</div>
					</form>
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