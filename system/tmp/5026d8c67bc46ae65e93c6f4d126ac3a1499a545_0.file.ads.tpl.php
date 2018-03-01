<?php /* Smarty version 3.1.27, created on 2018-01-18 14:47:00
         compiled from "C:\xampp\htdocs\galericilerden\app\view\admin\ads.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:105885a60a55423e4a2_06695917%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5026d8c67bc46ae65e93c6f4d126ac3a1499a545' => 
    array (
      0 => 'C:\\xampp\\htdocs\\galericilerden\\app\\view\\admin\\ads.tpl',
      1 => 1516282984,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '105885a60a55423e4a2_06695917',
  'variables' => 
  array (
    'return' => 0,
    'ads' => 0,
    'image' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5a60a554311bc7_64059271',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5a60a554311bc7_64059271')) {
function content_5a60a554311bc7_64059271 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_capitalize')) require_once 'C:\\xampp\\htdocs\\galericilerden\\system\\plugin\\smarty\\plugins\\modifier.capitalize.php';

$_smarty_tpl->properties['nocache_hash'] = '105885a60a55423e4a2_06695917';
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
						<?php if (getUrl(2) != 'edit' && getUrl(3) != 'not-confirm' && getUrl(2) != 'delete') {?>
							<div>
								<table id="dynamic-table" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>İlan No</th>
											<th>Başlık</th>
											<th>Fiyat</th>
											<th>İlan Sahibi</th>
											<th></th>
										</tr>
									</thead>

									<tbody>
										<?php if ($_smarty_tpl->tpl_vars['return']->value['ads']) {?>
											<?php
$_from = $_smarty_tpl->tpl_vars['return']->value['ads'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['ads'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['ads']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['ads']->value) {
$_smarty_tpl->tpl_vars['ads']->_loop = true;
$foreach_ads_Sav = $_smarty_tpl->tpl_vars['ads'];
?>
												<tr>
													<td><?php echo $_smarty_tpl->tpl_vars['ads']->value['id'];?>
</td>
													<td><?php echo $_smarty_tpl->tpl_vars['ads']->value['title'];?>
</td>
													<td>
														<?php echo number_format($_smarty_tpl->tpl_vars['ads']->value['price'],0,".",",");?>

														<?php if ($_smarty_tpl->tpl_vars['ads']->value['price_type'] == 0) {?>
															TL
														<?php } elseif ($_smarty_tpl->tpl_vars['ads']->value['price_type'] == 1) {?>
															EUR
														<?php } elseif ($_smarty_tpl->tpl_vars['ads']->value['price_type'] == 2) {?>
															USD
														<?php }?>
													</td>
													<td><a href="#"><?php echo smarty_modifier_capitalize(userInfo($_smarty_tpl->tpl_vars['ads']->value['user_id'],'name'));?>
 <?php echo smarty_modifier_capitalize(userInfo($_smarty_tpl->tpl_vars['ads']->value['user_id'],'surname'));?>
</a></td>
													<td>
														<div class="hidden-sm hidden-xs action-buttons">
															<a class="blue" target="_blank" href="<?php echo siteUrl('view');?>
/<?php echo $_smarty_tpl->tpl_vars['ads']->value['seflink'];?>
-<?php echo $_smarty_tpl->tpl_vars['ads']->value['id'];?>
">
																<i class="ace-icon fa fa-search-plus bigger-130" title="Görüntüle"></i>
															</a>

															<a class="green" href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/ads/edit/<?php echo $_smarty_tpl->tpl_vars['ads']->value['id'];?>
">
																<i class="ace-icon fa fa-pencil bigger-130" title="Düzenle"></i>
															</a>

															<?php if (getUrl(2) == 'pending') {?>
																<a class="green" href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/ads/pending/confirm/<?php echo $_smarty_tpl->tpl_vars['ads']->value['id'];?>
">
																	<i class="ace-icon fa fa-check bigger-130" title="İlanı Onayla"></i>
																</a>
																<a class="red" href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/ads/pending/not-confirm/<?php echo $_smarty_tpl->tpl_vars['ads']->value['id'];?>
">
																	<i class="ace-icon fa fa-close bigger-130" title="İlanı Onaylama"></i>
																</a>
															<?php }?>
															
															<?php if (getUrl(2) == 'approved') {?>
																<a class="green" href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/ads/approved/doping/<?php echo $_smarty_tpl->tpl_vars['ads']->value['id'];?>
">
																	<i class="ace-icon fa fa-arrow-up bigger-130" title="Ana Sayfa Vitrin Doping Uygula"></i>
																</a>
																<!--<a class="red" href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/ads/hanger/<?php echo $_smarty_tpl->tpl_vars['ads']->value['id'];?>
">
																	<i class="ace-icon fa fa-close bigger-130" title="Askıya Al"></i>
																</a>-->
															<?php }?>

															<?php if (getUrl(2) == 'expired') {?>
																<a class="green" href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/ads/expired/active/<?php echo $_smarty_tpl->tpl_vars['ads']->value['id'];?>
">
																	<i class="ace-icon fa fa-check bigger-130" title="İlanı yeniden aktifleştir"></i>
																</a>
															<?php }?>
															<a class="red" href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/ads/delete/<?php echo $_smarty_tpl->tpl_vars['ads']->value['id'];?>
">
																<i class="ace-icon fa fa-trash-o bigger-130" title="Sil"></i>
															</a>
														</div>

														<div class="hidden-md hidden-lg">
															<div class="inline pos-rel">
																<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
																	<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
																</button>

																<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
																	<li>
																		<a target="_blank" href="<?php echo siteUrl('view');?>
/<?php echo $_smarty_tpl->tpl_vars['ads']->value['seflink'];?>
-<?php echo $_smarty_tpl->tpl_vars['ads']->value['id'];?>
" class="tooltip-info" data-rel="tooltip" title="Görüntüle">
																			<span class="blue">
																				<i class="ace-icon fa fa-search-plus bigger-120"></i>
																			</span>
																		</a>
																	</li>

																	<li>
																		<a href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/ads/edit/<?php echo $_smarty_tpl->tpl_vars['ads']->value['id'];?>
" class="tooltip-success" data-rel="tooltip" title="Düzenle">
																			<span class="green">
																				<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																			</span>
																		</a>
																	</li>

																	<?php if (getUrl(2) == 'pending') {?>
																		<li>
																			<a href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/ads/pending/confirm/<?php echo $_smarty_tpl->tpl_vars['ads']->value['id'];?>
" class="tooltip-success" data-rel="tooltip" title="İlanı Onayla">
																				<span class="green">
																					<i class="ace-icon fa fa-check bigger-120"></i>
																				</span>
																			</a>
																		</li>

																		<li>
																			<a href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/ads/pending/not-confirm/<?php echo $_smarty_tpl->tpl_vars['ads']->value['id'];?>
" class="tooltip-success" data-rel="tooltip" title="İlanı Onaylama">
																				<span class="red">
																					<i class="ace-icon fa fa-close bigger-120"></i>
																				</span>
																			</a>
																		</li>
																	<?php }?>
																	
																	<?php if (getUrl(2) == 'approved') {?>
																		<li>
																			<a href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/ads/approved/doping/<?php echo $_smarty_tpl->tpl_vars['ads']->value['id'];?>
" class="tooltip-success" data-rel="tooltip" title="Ana Sayfa Vitrin Doping Uygula">
																				<span class="green">
																					<i class="ace-icon fa fa-arrow-up bigger-120"></i>
																				</span>
																			</a>
																		</li>
																		<!--<li>
																			<a href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/ads/hanger/<?php echo $_smarty_tpl->tpl_vars['ads']->value['id'];?>
" class="tooltip-error" data-rel="tooltip" title="Askıya Al">
																				<span class="red">
																					<i class="ace-icon fa fa-close bigger-120"></i>
																				</span>
																			</a>
																		</li>-->
																	<?php }?>

																	<?php if (getUrl(2) == 'expired') {?>
																		<li>
																			<a href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/ads/expired/active/<?php echo $_smarty_tpl->tpl_vars['ads']->value['id'];?>
" class="tooltip-success" data-rel="tooltip" title="İlanı yeniden aktifleştir">
																				<span class="green">
																					<i class="ace-icon fa fa-check bigger-120"></i>
																				</span>
																			</a>
																		</li>
																	<?php }?>
																	<li>
																		<a href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/ads/delete/<?php echo $_smarty_tpl->tpl_vars['ads']->value['id'];?>
" class="tooltip-error" data-rel="tooltip" title="Sil">
																			<span class="red">
																				<i class="ace-icon fa fa-trash-o bigger-120"></i>
																			</span>
																		</a>
																	</li>
																</ul>
															</div>
														</div>
													</td>
												</tr>
											<?php
$_smarty_tpl->tpl_vars['ads'] = $foreach_ads_Sav;
}
?>
										<?php }?>
									</tbody>
								</table>
							</div>
						<?php } else { ?>
							<?php if (getUrl(2) == 'edit') {?>
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
									<div class="form-group" style="overflow: hidden;">
										<div class="col-md-6 col-xs-12">
											<label>İlan Başlığı: </label>
											<input type="text" name="ad_name" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['title'];?>
" class="form-control">
										</div>
										<div class="col-md-6 col-xs-12">
											<div class="row">
												<div class="col-xs-6">
													<div class="form-group">
														<label>İlan Fiyatı: </label>
														<input type="text" name="ad_price" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['price'];?>
" class="form-control">
													</div>
												</div>
												<div class="col-xs-6">
													<div class="form-group">
														<label>Fiyat türü: </label>
														<select name="price_type" class="form-control">
															<option value="0" <?php if ($_smarty_tpl->tpl_vars['return']->value['adInfo']['price_type'] == 0) {?>selected="selected"<?php }?>>TL</option>
															<option value="1" <?php if ($_smarty_tpl->tpl_vars['return']->value['adInfo']['price_type'] == 1) {?>selected="selected"<?php }?>>EUR</option>
															<option value="2" <?php if ($_smarty_tpl->tpl_vars['return']->value['adInfo']['price_type'] == 2) {?>selected="selected"<?php }?>>USD</option>
														</select>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group" style="overflow: hidden;">
										<div class="col-md-12">
											<label>İlan Açıklaması: </label>
											<textarea name="ad_text" id="default-editor" cols="30" rows="10"><?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['text'];?>
</textarea>
										</div>
										<link rel="stylesheet" href="<?php echo siteUrl('public/scripts/editor/ui/trumbowyg.css');?>
">
					                    <link rel="stylesheet" href="<?php echo siteUrl('public/scripts/editor/plugins/colors/ui/trumbowyg.colors.css');?>
">
					                    <?php echo '<script'; ?>
 src="<?php echo siteUrl('public/scripts/editor/trumbowyg.js');?>
"><?php echo '</script'; ?>
>
					                    <?php echo '<script'; ?>
 src="<?php echo siteUrl('public/scripts/editor/plugins/base64/trumbowyg.base64.js');?>
"><?php echo '</script'; ?>
>
					                    <?php echo '<script'; ?>
 src="<?php echo siteUrl('public/scripts/editor/plugins/colors/trumbowyg.colors.js');?>
"><?php echo '</script'; ?>
>
					                    <?php echo '<script'; ?>
 src="<?php echo siteUrl('public/scripts/editor/plugins/noembed/trumbowyg.noembed.js');?>
"><?php echo '</script'; ?>
>
					                    <?php echo '<script'; ?>
 src="<?php echo siteUrl('public/scripts/editor/plugins/pasteimage/trumbowyg.pasteimage.js');?>
"><?php echo '</script'; ?>
>
					                    <?php echo '<script'; ?>
 src="<?php echo siteUrl('public/scripts/editor/plugins/preformatted/trumbowyg.preformatted.js');?>
"><?php echo '</script'; ?>
>
					                    <?php echo '<script'; ?>
 src="<?php echo siteUrl('public/scripts/editor/plugins/upload/trumbowyg.upload.js');?>
"><?php echo '</script'; ?>
> 
					                     
					                        <?php echo '<script'; ?>
 type="text/javascript">
					                            jQuery(function($) {
					                                var uploadOptions = {
					                                    serverPath: 'https://api.imgur.com/3/image',
					                                    fileFieldName: 'image',
					                                    headers: {'Authorization': 'Client-ID 9e57cb1c4791cea'},
					                                    urlPropertyName: 'data.link'
					                                };
					                                jQuery('#default-editor').trumbowyg({
					                                	lang: 'tr',
					                                    resetCss: true,
					                                    autogrow: true,
					                                    btnsDef: {
					                                        image: {
					                                            dropdown: ['insertImage', 'upload', 'base64'],
					                                            ico: 'insertImage'
					                                        }
					                                    },
					                                    btns: ['viewHTML',
					                                        '|', 'formatting',
					                                        '|', 'btnGrp-design',
					                                        '|', 'link',
					                                        '|', 'image',
					                                        '|', 'btnGrp-justify',
					                                        '|', 'btnGrp-lists',
					                                        '|', 'foreColor', 'backColor',
					                                        '|', 'horizontalRule'],
					                                    plugins: {
					                                        upload: uploadOptions
					                                    }    
					                                });
					                            });    
					                        <?php echo '</script'; ?>
>
					                    
									</div>
									<div class="col-md-12">
										
											<style type="text/css">
												.uploaded-images .image .load {display: none;position: absolute;bottom: 0;left: 0;right: 0;overflow: hidden;font-size: 14px;background-color: #ff263a;color: #fff;text-align: center;line-height: 1.77;}
												.uploaded-images .image {margin-bottom: 15px;position: relative;}
												.uploaded-images .image .image-bottom {position: absolute;bottom: 0;left: 0;right: 0;overflow: hidden;font-size: 13px;}
												.uploaded-images .image .image-bottom .title-image {text-align: center;background-color: #8e8e8e;color: #fff;line-height: 1.9;padding: 0px 5px;cursor: pointer;}
												.uploaded-images .image .image-bottom .title-image.active {background-color: #ff263a;}
												.uploaded-images .image .image-bottom .delete-image {text-align: center;background-color: #fd0017;cursor: pointer;}
												.uploaded-images .image .image-bottom .delete-image i {font-size: 21px;line-height: 1.15;color: #fff;}
												.uploaded-images .image {height: 120px;}
											</style>
											<?php echo '<script'; ?>
 type="text/javascript">
												jQuery(function($) {
													/* SET TITLE IMAGE UPLOADED IMAGES */
													$('.uploaded-images').on('click', '.title-image:not(.active)', function() {

														$('.uploaded-images .title-image').removeClass('active');
														$(this).addClass('active');

														var image = $(this).parent().parent().attr('data-image');
														
														$('.input-hidden-images input[name=ad-title-image]').val(image);

													});

													/* REMOVE UPLOADED IMAGE */
													$('.uploaded-images').on('click', '.delete-image', function() {

														var _this = $(this);
														var adId  = <?php echo getUrl(3);?>
;

														var image = $(this).parent().parent().attr('data-image');

														if(image == $('input[name=ad-title-image]').val())
														{
															$('.upload-message').html('\
																<div class="alert alert-danger" style="margin-top: 20px;">\
																	<strong>Hata!</strong> Vitrin resmini silemezsiniz\
																<div>\
															');
														}
														else
														{
															$.ajax({
																type: 'POST',
																url: siteUrl + '/request',
																dataType: 'json',
																data: {'mode': 'delete-ad-image', 'image': image, 'adId': adId, 'db': 'true'},
																success: function(response)
																{
																	if(response.success)
																	{
																		_this.parent().parent().parent().remove();
																	}
																	else
																	{
																		$('.upload-message').html('\
																			<div class="alert alert-danger" style="margin-top: 20px;">\
																				<strong>Hata!</strong> ' + response.error + '\
																			<div>\
																		');
																	}
																}
															});
														}

													});
												})
											<?php echo '</script'; ?>
>
										
										<div class="row">
											<div class="input-hidden-images">
												<input type="hidden" name="ad-title-image" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['title_image'];?>
">
											</div>
											<div class="uploaded-images" style="overflow: hidden;">
												<?php
$_from = $_smarty_tpl->tpl_vars['return']->value['adImages'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['image'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['image']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
$foreach_image_Sav = $_smarty_tpl->tpl_vars['image'];
?>
													<div class="col-md-2 col-sm-3 col-xs-6">
														<div class="image" data-image="<?php echo $_smarty_tpl->tpl_vars['image']->value['image'];?>
">
															<img src="<?php echo siteUrl('files/ads/thumb');?>
/<?php echo $_smarty_tpl->tpl_vars['image']->value['image'];?>
.jpg" alt="" style="width: 100%;height: 100%;" />
															<div class="image-bottom">
																<div class="col-xs-6 title-image <?php if ($_smarty_tpl->tpl_vars['image']->value['image'] == $_smarty_tpl->tpl_vars['return']->value['adInfo']['title_image']) {?>active<?php }?>">Vitrin</div>
																<div class="col-xs-6 delete-image">
																	<i class="fa fa-close"></i>
																</div>
															</div>
														</div>
													</div>
												<?php
$_smarty_tpl->tpl_vars['image'] = $foreach_image_Sav;
}
?>
											</div>
											<div class="upload-message"></div>
										</div>
									</div>
									<button type="submit" name="save" class="btn btn-primary pull-right">Kaydet</button>
								</form>
							<?php } elseif (getUrl(3) == 'not-confirm') {?>
								<form action="" method="POST">
									<div class="form-group">
										<label>İlanın neden onaylanmadığını seçiniz: </label>
										<select name="sebep" class="form-control">
											<option value="1">İlan Başlığı veya İlan Açıklaması Kurallara Uymadığı İçin İlanınız Onaylanmamıştır</option>
											<option value="2">İlan Resimleri Orjinal Olmadığı için İlanınız Onaylanmamıştır</option>
											<option value="3">Reklam ve Spam Nedeniyle İlanınız Onaylanmamıştır</option>
										</select>
									</div>
									<button type="submit" name="save" class="btn btn-primary pull-right">İlanı Onaylama</button>
								</form>
							<?php } elseif (getUrl(2) == 'delete') {?>
								<form action="" method="POST">
									<div class="form-group">
										<label>İlanın neden silindiğini seçiniz: </label>
										<select name="sebep" class="form-control">
											<option value="1">İlan Başlığı veya İlan Açıklaması Kurallara Uymadığı İçin İlanınız Onaylanmamıştır</option>
											<option value="2">İlan Resimleri Orjinal Olmadığı için İlanınız Onaylanmamıştır</option>
											<option value="3">Reklam ve Spam Nedeniyle İlanınız Onaylanmamıştır</option>
										</select>
									</div>
									<button type="submit" name="save" class="btn btn-primary pull-right">İlanı Sil</button>
								</form>
							<?php }?>
						<?php }?>
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