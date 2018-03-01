<?php /* Smarty version 3.1.27, created on 2018-01-18 14:59:45
         compiled from "C:\xampp\htdocs\galericilerden\app\view\admin\store.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:259145a60a851030f42_63920564%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '86312856a943732709dfbb1abf6048538b0538c6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\galericilerden\\app\\view\\admin\\store.tpl',
      1 => 1507788251,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '259145a60a851030f42_63920564',
  'variables' => 
  array (
    'return' => 0,
    'store' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5a60a851186e83_80779584',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5a60a851186e83_80779584')) {
function content_5a60a851186e83_80779584 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_capitalize')) require_once 'C:\\xampp\\htdocs\\galericilerden\\system\\plugin\\smarty\\plugins\\modifier.capitalize.php';

$_smarty_tpl->properties['nocache_hash'] = '259145a60a851030f42_63920564';
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
						<?php if (getUrl(2) != 'edit') {?>
							<div>
								<table id="dynamic-table" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>Mağaza No</th>
											<th>Mağaza Adı</th>
											<th>Mağaza Sahibi</th>
											<th>Mağaza Url</th>
											<th>Mağaza Tipi</th>
											<?php if (getUrl(2) == 'pending') {?>
												<th>Mağaza Onaylama Sebebi</th>
											<?php }?>
											<th></th>
										</tr>
									</thead>

									<tbody>
										<?php if ($_smarty_tpl->tpl_vars['return']->value['stores']) {?>
											<?php
$_from = $_smarty_tpl->tpl_vars['return']->value['stores'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['store'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['store']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['store']->value) {
$_smarty_tpl->tpl_vars['store']->_loop = true;
$foreach_store_Sav = $_smarty_tpl->tpl_vars['store'];
?>
												<tr>
													<td><?php echo $_smarty_tpl->tpl_vars['store']->value['id'];?>
</td>
													<td><?php echo $_smarty_tpl->tpl_vars['store']->value['store_name'];?>
</td>
													<td><a href="#"><?php echo smarty_modifier_capitalize(userInfo($_smarty_tpl->tpl_vars['store']->value['user_id'],'name'));?>
 <?php echo smarty_modifier_capitalize(userInfo($_smarty_tpl->tpl_vars['store']->value['user_id'],'surname'));?>
</a></td>
													<td><a href="http://<?php echo $_smarty_tpl->tpl_vars['store']->value['store_domain'];
echo $_smarty_tpl->tpl_vars['return']->value['siteConfig']['siteStoreDomain'];?>
" target="_blank">http://<?php echo $_smarty_tpl->tpl_vars['store']->value['store_domain'];
echo $_smarty_tpl->tpl_vars['return']->value['siteConfig']['siteStoreDomain'];?>
</a></td>
													<td><?php echo $_smarty_tpl->tpl_vars['return']->value['StoreAdmin']->storeTypeInfo($_smarty_tpl->tpl_vars['store']->value['store_type'],'store_type_name');?>
</td>
													<?php if (getUrl(2) == 'pending') {?>
														<td>
															<?php if ($_smarty_tpl->tpl_vars['store']->value['end_time'] != 0) {?>
																<?php if (time() > $_smarty_tpl->tpl_vars['store']->value['end_time']) {?>
																	Mağaza Yıllık Süre
																<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['AdsAdmin']->checkLimit($_smarty_tpl->tpl_vars['store']->value['user_id']) >= $_smarty_tpl->tpl_vars['return']->value['StoreAdmin']->storeTypeInfo($_smarty_tpl->tpl_vars['store']->value['store_type'],'ad_limit')) {?>
																	Mağaza Yıllık Limit
																<?php }?>
															<?php } else { ?>
																Yeni Mağaza Açma
															<?php }?>
														</td>
													<?php }?>
													<td>
														<div class="hidden-sm hidden-xs action-buttons">
															<a class="green" href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/store/edit/<?php echo $_smarty_tpl->tpl_vars['store']->value['id'];?>
">
																<i class="ace-icon fa fa-pencil bigger-130" title="Düzenle"></i>
															</a>

															<?php if (getUrl(2) == 'pending') {?>
																<a class="green" href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/store/pending/confirm/<?php echo $_smarty_tpl->tpl_vars['store']->value['id'];?>
">
																	<i class="ace-icon fa fa-check bigger-130" title="İlanı Onayla"></i>
																</a>
																<a class="red" href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/store/pending/not-confirm/<?php echo $_smarty_tpl->tpl_vars['store']->value['id'];?>
">
																	<i class="ace-icon fa fa-close bigger-130" title="İlanı Onaylama"></i>
																</a>
															<?php }?>

															<?php if (getUrl(2) == 'expired') {?>
																<a class="green" href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/store/expired/active/<?php echo $_smarty_tpl->tpl_vars['store']->value['id'];?>
">
																	<i class="ace-icon fa fa-check bigger-130" title="Mağazanı yeniden aktifleştir"></i>
																</a>
															<?php }?>
															<a class="red" href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/store/delete/<?php echo $_smarty_tpl->tpl_vars['store']->value['id'];?>
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
																		<a href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/store/edit/<?php echo $_smarty_tpl->tpl_vars['store']->value['id'];?>
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
/store/pending/confirm/<?php echo $_smarty_tpl->tpl_vars['store']->value['id'];?>
" class="tooltip-success" data-rel="tooltip" title="Mağazanı Onayla">
																				<span class="green">
																					<i class="ace-icon fa fa-check bigger-120"></i>
																				</span>
																			</a>
																		</li>

																		<li>
																			<a href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/store/pending/not-confirm/<?php echo $_smarty_tpl->tpl_vars['store']->value['id'];?>
" class="tooltip-success" data-rel="tooltip" title="Mağazanı Onaylama">
																				<span class="red">
																					<i class="ace-icon fa fa-close bigger-120"></i>
																				</span>
																			</a>
																		</li>
																	<?php }?>

																	<?php if (getUrl(2) == 'expired') {?>
																		<li>
																			<a href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/store/expired/active/<?php echo $_smarty_tpl->tpl_vars['store']->value['id'];?>
" class="tooltip-success" data-rel="tooltip" title="Mağazanı yeniden aktifleştir">
																				<span class="green">
																					<i class="ace-icon fa fa-check bigger-120"></i>
																				</span>
																			</a>
																		</li>
																	<?php }?>
																	<li>
																		<a href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/store/delete/<?php echo $_smarty_tpl->tpl_vars['store']->value['id'];?>
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
$_smarty_tpl->tpl_vars['store'] = $foreach_store_Sav;
}
?>
										<?php }?>
									</tbody>
								</table>
							</div>
						<?php } else { ?>
							<?php if (getUrl(2) == 'edit') {?>
								
									<?php echo '<script'; ?>
 type="text/javascript">
									    var digitsOnly = /[1234567890]/g;
									    var integerOnly = /[0-9\.]/g;
									    var alphaOnly = /[A-Za-z1234567890]/g;
									    function restrictCharacters(myfield, e, restrictionType) {
									        if (!e)
									            var e = window.event
									        if (e.keyCode)
									            code = e.keyCode;
									        else if (e.which)
									            code = e.which;
									        var character = String.fromCharCode(code);
									        if (code == 27) {
									            this.blur();
									            return false;
									        }
									        if (!e.ctrlKey && code != 9 && code != 8 && code != 36 && code != 37 && code != 38 && (code != 39 || (code == 39 && character == "'")) && code != 40) {
									            if (character.match(restrictionType)) {
									                return true;
									            } else {
									                return false;
									            }
									        }
										}
										
										function checkDomain()
										{
										    var domainName = $('input[name=store_domain]').val();

										    if(domainName != '' && domainName != $('input[name=store_domain]').attr('value'))
										    {
										        $.ajax({
										            type: 'POST',
										            url: siteUrl + '/request',
										            dataType: 'json',
										            data: {'mode': 'checkDomainName', 'domainName': domainName},
										            success: function(response)
										            {
										                if(response.error)
										                {
										                    jQuery('.domain-name-message').html('\
										                        <div class="alert alert-danger">\
										                            <strong>Hata!</strong> ' + response.error + '\
										                        </div>\
										                    ');
										                }
										                else
										                {
										                    jQuery('.domain-name-message').html('');
										                }
										            }
										        })
										    }
										    else
										    {
										    	$('.domain-name-message').html('');
										    }
										}

										function selectStoreTheme(storeTheme)
										{
										    $('.select-store-theme .selected').removeClass('active');
										    $('.select-store-theme .col-md-6.col-sm-3.col-xs-12[data-theme=' + storeTheme + ']').find('.selected').addClass('active');

										    $('input[name=store-theme]').val(storeTheme);
										}

										function progress(e, count)
										{
										    if(e.lengthComputable)
										    {
										        var max = e.total;
										        var current = e.loaded;

										        var Percentage = (current * 100) / max;
										        Percentage = parseInt(Percentage);

										        if(count !== null)
										        {
										            $('.uploaded-images .col-md-2.col-sm-3.col-xs-6[data-id="' + count + '"] .load').show().text(Percentage + '%');
										        }
										        else
										        {
										            $('.uploaded-images .col-md-3.col-sm-3.col-xs-6 .load').show().text(Percentage + '%');
										        }
										    }
										}

										jQuery(function($) {
											var upInt = 0;

											/* UPLOAD STORE IMAGE */
											$('#upload-input').change(function() {

												var _this           = $(this);
												var imageFilesCount = $(this).get(0).files.length;
												var files           = $(this).get(0).files;

												$('.upload-message').html('');

												if(upInt == 0) 
											    {
											        var progressBarWidthCalc = 100 / imageFilesCount;
											        var progressBarWidth     = 0; 

										        	upInt + 1;

											       	var reader  = new FileReader();

											       	reader.onload = function(e)
											       	{
											       		var image = new Image();
													    image.src = e.target.result;

													    image.onload = function() 
													    {
													    	if(this.width <= 220 && this.height <= 165)
													    	{
													    		$('.uploaded-images').html('<div class="col-md-3 col-sm-3 col-xs-6"><div class="image"><img src="" alt="" style="width: 100%;height: 90px;" /><div class="load"></div></div></div>');
																$('.uploaded-images .image img').attr('src', e.target.result);
													    	}
													    }
											       	}
													reader.readAsDataURL(files[0]);

											        // upload button deactive
											        $('.upload-button input').css({'pointer-events': 'none'});

										        	var form = $('form#uploadForm')[0];
													var formData = new FormData(form);
													formData.append('mode', 'upload-store-image');
													formData.append('image', $('input[type=file]')[0].files[0]); 

													$.ajax({
														type: 'POST',
													    url: siteUrl + '/request',
													    data: formData,
													    dataType: 'json',
													    xhr: function() 
													    {
											                var myXhr = $.ajaxSettings.xhr();
											                if(myXhr.upload)
											                {
											                    myXhr.upload.addEventListener('progress', function(e) {
											                    	progress(e, null);
											                    }, false);

											                    progressBarWidth += progressBarWidthCalc;
											                }
											                return myXhr;
												        },
												        contentType: false,
														processData: false,
													    success: function(resp) 
											            {
											                if(resp.success) 
											                {
										                        upInt = 0;

										                        // upload button active
										                        $('.upload-button input').css({'pointer-events': 'all'});

										                        if($('input[name=store-image]').val() == '')
										                        {
										                        	// set image
										                        	$('input[name=store-image]').val(resp.image);
										                        }

										                        // upload button clear values
										                        _this.val('');
											                    
											                    // set value progress bar
											                    $('.progress-bar').width(progressBarWidth + '%');
											                }
											                else
											                {
											                	// upload button active
										                        $('.upload-button input').css({'pointer-events': 'all'});

											                	$('.upload-message').html('\
											                		<div class="alert alert-danger" style="margin-top: 17px;">\
											                			<strong>Hata!</strong> ' + resp.error + '\
											                		</div>\
										                		')

											                    $('input[name=store-image]').val('');

											                    upInt = 0;

											                    // upload button clear values
											                    _this.val('');
											                }
											            }
													});

													formData.delete('image');
											    }

											});
										});
									<?php echo '</script'; ?>
>
									<style type="text/css">
										.select-store-theme {cursor: pointer;}
										.select-store-theme .selected {display: none;}
										.select-store-theme .selected.active {display: block;position: absolute;top: 0;bottom: 0;left: 11px;right: 11px;color: #fff;background-color: rgba(0, 0, 0, 0.50);display: flex;justify-content: center;align-items: center;}
										.select-store-theme .selected.active i {font-size: 35px;}
										.upload-button {position: relative;display: inline-block;overflow: hidden;border: 1px solid #e8e8e8;-webkit-box-shadow: 0px 0px 80px -15px rgba(0,0,0,0.5);-moz-box-shadow: 0px 0px 80px -15px rgba(0,0,0,0.5);box-shadow: 0px 0px 80px -15px rgba(0,0,0,0.5);border: 1px solid #dcdcdc;width: 100%;}
										.upload-button input {width: 100%;min-height: 90px;position: absolute;outline: none;cursor: pointer;opacity: 0;}
										.upload-button i {color: #777;width: 100%;min-height: 90px;display: flex;justify-content: center;align-items: center;cursor: pointer;font-size: 45px;}
										.upload-button:hover i {color: #333;}
										.uploaded-images .image .load {display: none;position: absolute;bottom: 0;left: 0;right: 0;overflow: hidden;font-size: 14px;background-color: #ff263a;color: #fff;text-align: center;line-height: 1.77;}
										.uploaded-images .image {margin-bottom: 15px;position: relative;}
										.uploaded-images .image .image-bottom {position: absolute;bottom: 0;left: 0;right: 0;overflow: hidden;font-size: 13px;}
										.uploaded-images .image .image-bottom .title-image {text-align: center;background-color: #8e8e8e;color: #fff;line-height: 1.9;padding: 0px 5px;cursor: pointer;}
										.uploaded-images .image .image-bottom .title-image.active {background-color: #ff263a;}
										.uploaded-images .image .image-bottom .delete-image {text-align: center;background-color: #fd0017;cursor: pointer;}
										.uploaded-images .image .image-bottom .delete-image i {font-size: 21px;line-height: 1.15;color: #fff;}
										.uploaded-images .image {height: 90px;}
									</style>
								
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
								<form action="" name="save" method="POST">
									<input type="hidden" name="save" value="save">
									<input type="hidden" name="store-theme" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['storeInfo']['store_theme'];?>
">
									<input type="hidden" name="store-image" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['storeInfo']['store_logo'];?>
">
									<div class="form-group">
										<label>Firma Adı: </label>
										<input type="text" name="firm_name" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['storeInfo']['store_name'];?>
" class="form-control">
									</div>
									<div class="form-group">
										<label>Mağaza Url: </label>
										<div class="input-group">
											<input type="text" name="store_domain" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['storeInfo']['store_domain'];?>
" class="form-control" onkeypress="return restrictCharacters(this, event, alphaOnly);" onpaste="return false;" autocomplete="off" onchange="checkDomain();">
											<span class="input-group-addon"><?php echo $_smarty_tpl->tpl_vars['return']->value['siteConfig']['siteStoreDomain'];?>
</span>
										</div>
										<div class="domain-name-message" style="margin-top: 15px;"></div>
									</div>
									<div class="form-group">
										<label>Mağaza Tipi: </label>
										<select name="store_type" onchange="setStore();" class="form-control">
											<?php
$_from = $_smarty_tpl->tpl_vars['return']->value['storeList'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['store'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['store']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['store']->value) {
$_smarty_tpl->tpl_vars['store']->_loop = true;
$foreach_store_Sav = $_smarty_tpl->tpl_vars['store'];
?>
												<option value="<?php echo $_smarty_tpl->tpl_vars['store']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['return']->value['storeInfo']['store_type'] == $_smarty_tpl->tpl_vars['store']->value['id']) {?>selected="selected"<?php }?> data-price="<?php echo $_smarty_tpl->tpl_vars['store']->value['store_price'];?>
"><?php echo $_smarty_tpl->tpl_vars['store']->value['store_type_name'];?>
 (<?php if ($_smarty_tpl->tpl_vars['store']->value['ad_limit'] == 0) {?>Limitsiz İlan Limiti<?php } else {
echo $_smarty_tpl->tpl_vars['store']->value['ad_limit'];?>
 İlan Limiti<?php }?>)</option>
											<?php
$_smarty_tpl->tpl_vars['store'] = $foreach_store_Sav;
}
?>
										</select>
									</div>
									<div class="form-group">
										<label>Mağaza Açıklaması: </label>
										<textarea name="store_text" class="form-control" cols="30" rows="10"><?php echo $_smarty_tpl->tpl_vars['return']->value['storeInfo']['store_text'];?>
</textarea>
									</div>
								</form>
								<div class="row">
									<div class="col-md-6">
										<label>Mağaza Logosu (Max Genişlik: 220px, Max Yükseklik: 165px): </label>
										<div class="progress">
										  	<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
										</div>
										
										<div class="row">
											<div class="uploaded-images">
												<div class="col-md-3 col-sm-3 col-xs-6">
													<div class="image">
														<img src="<?php echo siteUrl('files/store/thumb');?>
/<?php echo $_smarty_tpl->tpl_vars['return']->value['storeInfo']['store_logo'];?>
.jpg" alt="" style="height: 90px; width: 100%;" />
														<div class="load"></div>
													</div>
												</div>
											</div>
											
											<div class="col-md-3 col-sm-3 col-xs-6">
									    		<div class="upload-button">
										    		<input type="file" name="upload-image" accept="image/*" id="upload-input">
										    		<i class="fa fa-upload"></i>
									    		</div>
									    	</div>
											<form id="uploadForm" action="<?php echo siteUrl('request');?>
" method="POST" enctype="multipart/form-data"></form>
										</div>
										<div class="upload-message"></div>
									</div>
									<div class="col-md-6 select-store-theme">
										<label>Mağaza Teması: </label>
										<div class="row">
											<div class="col-md-6 col-sm-3 col-xs-12" data-theme="1" style="margin-bottom: 15px;">
												<img src="<?php echo siteUrl('public/images/store/header1.jpg');?>
" width="100%" alt="" onclick="selectStoreTheme(1);">
												<div class="selected <?php if ($_smarty_tpl->tpl_vars['return']->value['storeInfo']['store_theme'] == 1) {?>active<?php }?>">
													<i class="fa fa-check"></i>
												</div>
											</div>
											<div class="col-md-6 col-sm-3 col-xs-12" data-theme="2" style="margin-bottom: 15px;">
												<img src="<?php echo siteUrl('public/images/store/header2.jpg');?>
" width="100%" alt="" onclick="selectStoreTheme(2);">
												<div class="selected <?php if ($_smarty_tpl->tpl_vars['return']->value['storeInfo']['store_theme'] == 2) {?>active<?php }?>">
													<i class="fa fa-check"></i>
												</div>
											</div>
											<div class="col-md-6 col-sm-3 col-xs-12" data-theme="3" style="margin-bottom: 15px;">
												<img src="<?php echo siteUrl('public/images/store/header3.jpg');?>
" width="100%" alt="" onclick="selectStoreTheme(3);">
												<div class="selected <?php if ($_smarty_tpl->tpl_vars['return']->value['storeInfo']['store_theme'] == 3) {?>active<?php }?>">
													<i class="fa fa-check"></i>
												</div>
											</div>
											<div class="col-md-6 col-sm-3 col-xs-12" data-theme="4" style="margin-bottom: 15px;">
												<img src="<?php echo siteUrl('public/images/store/header4.jpg');?>
" width="100%" alt="" onclick="selectStoreTheme(4);">
												<div class="selected <?php if ($_smarty_tpl->tpl_vars['return']->value['storeInfo']['store_theme'] == 4) {?>active<?php }?>">
													<i class="fa fa-check"></i>
												</div>
											</div>
										</div>
										<div class="theme-message"></div>
									</div>
								</div>
								<button type="submit" onclick="$('form[name=save]').submit();" class="btn btn-primary pull-right">Kaydet</button>
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