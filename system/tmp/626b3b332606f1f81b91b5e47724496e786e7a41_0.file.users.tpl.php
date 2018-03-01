<?php /* Smarty version 3.1.27, created on 2017-10-11 13:59:48
         compiled from "C:\xampp\htdocs\galericilerden\app\view\admin\users.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:3096659de07b48af220_71663205%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '626b3b332606f1f81b91b5e47724496e786e7a41' => 
    array (
      0 => 'C:\\xampp\\htdocs\\galericilerden\\app\\view\\admin\\users.tpl',
      1 => 1504167048,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3096659de07b48af220_71663205',
  'variables' => 
  array (
    'return' => 0,
    'user' => 0,
    'city' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_59de07b498dcd4_12244396',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_59de07b498dcd4_12244396')) {
function content_59de07b498dcd4_12244396 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_capitalize')) require_once 'C:\\xampp\\htdocs\\galericilerden\\system\\plugin\\smarty\\plugins\\modifier.capitalize.php';

$_smarty_tpl->properties['nocache_hash'] = '3096659de07b48af220_71663205';
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
											<th>Üye No</th>
											<th>Üye Adı Soyadı</th>
											<th>Üye Email</th>
											<th>Üye Tipi</th>
											<th></th>
										</tr>
									</thead>

									<tbody>
										<?php if ($_smarty_tpl->tpl_vars['return']->value['users']) {?>
											<?php
$_from = $_smarty_tpl->tpl_vars['return']->value['users'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['user'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['user']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->_loop = true;
$foreach_user_Sav = $_smarty_tpl->tpl_vars['user'];
?>
												<tr>
													<td><?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
</td>
													<td><?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['user']->value['name']);?>
 <?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['user']->value['surname']);?>
</td>
													<td><?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
</td>
													<td><?php if ($_smarty_tpl->tpl_vars['user']->value['user_status'] == 1) {?>Bireysel<?php } elseif ($_smarty_tpl->tpl_vars['user']->value['user_status'] == 2) {?>Kurumsal<?php }?></td>
													<td>
														<div class="hidden-sm hidden-xs action-buttons">
															<a class="green" href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/users/edit/<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
">
																<i class="ace-icon fa fa-pencil bigger-130" title="Düzenle"></i>
															</a>

															<a class="green" href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/users/login/<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
" target="_blank">
																<i class="ace-icon fa fa-sign-in bigger-130" title="Üye ile sisteme giriş yap"></i>
															</a>

															<a class="red" href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/users/delete/<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
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
/users/edit/<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
" class="tooltip-success" data-rel="tooltip" title="Düzenle">
																			<span class="green">
																				<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																			</span>
																		</a>
																	</li>
																	<li>
																		<a href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/users/login/<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
" class="tooltip-success" data-rel="tooltip" title="Düzenle" target="_blank">
																			<span class="green">
																				<i class="ace-icon fa fa-sign-in bigger-120"></i>
																			</span>
																		</a>
																	</li>
																	<li>
																		<a href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/users/delete/<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
" class="tooltip-success" data-rel="tooltip" title="Düzenle">
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
$_smarty_tpl->tpl_vars['user'] = $foreach_user_Sav;
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
									<div class="form-group">
										<div class="row">
											<div class="col-md-6">
												<label>Adı: </label>
												<input type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['userInfo']['name'];?>
" class="form-control">
											</div>
											<div class="col-md-6">
												<label>Soyadı: </label>
												<input type="text" name="surname" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['userInfo']['surname'];?>
" class="form-control">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label>E-Posta: </label>
										<input type="email" name="email" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['userInfo']['email'];?>
" class="form-control">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-md-4">
												<label>Cep Telefonu: </label>
												<input type="tel" id="phone" name="phone" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['userInfo']['phone'];?>
" class="form-control">
											</div>
											<div class="col-md-4">
												<label>İş Telefonu: </label>
												<input type="tel" id="phone_work" name="phone_work" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['userInfo']['phone_work'];?>
" class="form-control">
											</div>
											<div class="col-md-4">
												<label>Sabit Telefonu: </label>
												<input type="tel" name="phone_more" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['userInfo']['phone_more'];?>
" class="form-control">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-md-6">
												<label>İl: </label>
												<select name="city" class="form-control">
													<option value="0" disabled="disabled">İl Seçin</option>
													<?php
$_from = $_smarty_tpl->tpl_vars['return']->value['cities'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['city'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['city']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['city']->value) {
$_smarty_tpl->tpl_vars['city']->_loop = true;
$foreach_city_Sav = $_smarty_tpl->tpl_vars['city'];
?>
														<option value="<?php echo $_smarty_tpl->tpl_vars['city']->value['CityID'];?>
" <?php if ($_smarty_tpl->tpl_vars['return']->value['userInfo']['city'] == $_smarty_tpl->tpl_vars['city']->value['CityID']) {?>selected="selected"<?php }?> data-plate="<?php echo $_smarty_tpl->tpl_vars['city']->value['PlateNo'];?>
"><?php echo $_smarty_tpl->tpl_vars['city']->value['CityName'];?>
</option>
													<?php
$_smarty_tpl->tpl_vars['city'] = $foreach_city_Sav;
}
?>
												</select>
											</div>
											<div class="col-md-6">
												<label>İlçe: </label>
												<select name="county" class="form-control">
													<option value="0" disabled="disabled">İlçe Seçin</option>
												</select>
											</div>
										</div>
									</div>
									<?php if ($_smarty_tpl->tpl_vars['return']->value['userInfo']['user_status'] == 2) {?>
										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>Vergi Dairesi: </label>
													<select name="taxs" class="form-control" disabled="disabled"></select>
												</div>
												<div class="col-md-6">
													<label>Vergi Numarası: </label>
													<input type="number" id="taxno" name="tax_no" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['userInfo']['tax_no'];?>
" class="form-control">
												</div>
											</div>
										</div>
									<?php }?>
									<div class="form-group">
										<label>Adres Detayı: </label>
										<textarea name="address" cols="30" rows="5" class="form-control"><?php echo $_smarty_tpl->tpl_vars['return']->value['userInfo']['address'];?>
</textarea>
									</div>
									<?php if ($_smarty_tpl->tpl_vars['return']->value['userInfo']['user_status'] == 2) {?>
										<div class="form-group">
											<label>Faaliyet Alanı: </label>
											<select name="activity_area" class="form-control">
												<option value="1" <?php if ($_smarty_tpl->tpl_vars['return']->value['userInfo']['activity_area'] == 1) {?>selected="selected"<?php }?>>Galeri</option>
												<option value="2" <?php if ($_smarty_tpl->tpl_vars['return']->value['userInfo']['activity_area'] == 2) {?>selected="selected"<?php }?>>Yetkili Bayi</option>
												<option value="3" <?php if ($_smarty_tpl->tpl_vars['return']->value['userInfo']['activity_area'] == 3) {?>selected="selected"<?php }?>>Üretici Firma</option>
											</select>
										</div>
										<div class="form-group radio-primary">
											<label>İşletme Türü: </label>
											<div class="radio">
			                                    <label>
			                                    	<input type="radio" name="business_type" value="1" <?php if ($_smarty_tpl->tpl_vars['return']->value['userInfo']['business_type'] == 1) {?>checked="checked"<?php }?> class="ace">
			                                    	<span class="lbl">Şahıs Şirketi</span>
			                                    </label>
				                            </div>
				                            <div class="radio">
			                                    <label>
			                                    	<input type="radio" name="business_type" value="2" <?php if ($_smarty_tpl->tpl_vars['return']->value['userInfo']['business_type'] == 2) {?>checked="checked"<?php }?> class="ace">
			                                   		<span class="lbl">Limited veya Anonim Şirketi</span>
			                                    </label>
				                            </div>
										</div>
										<div class="form-group business_type_2" <?php if ($_smarty_tpl->tpl_vars['return']->value['userInfo']['business_type'] == 2) {?>style="display: block;"<?php } else { ?>style="display: none;"<?php }?>>
											<label>Ticari Ünvan: </label>
											<input type="text" name="commercial_title" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['userInfo']['commercial_title'];?>
" placeholder="Ticari Ünvan" class="form-control">
										</div>
									<?php }?>
									<div class="form-group business_type_1">
										<label>TC Kimlik No: </label>
										<input id="tc" type="text" name="tc" maxlength="11" placeholder="<?php echo $_smarty_tpl->tpl_vars['return']->value['userInfo']['tc'];?>
" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['userInfo']['tc'];?>
">
									</div>
									<div class="form-group">
										<label>Şifre (Boş bırakırsanız aynı şifrede kalır): </label>
										<input type="pass" name="pass" class="form-control">
									</div>
									<button type="submit" name="save" class="btn btn-primary pull-right">Kaydet</button>
								</form>
								
									<?php echo '<script'; ?>
 type="text/javascript">
										$(function() {

											var countyID = <?php echo $_smarty_tpl->tpl_vars['return']->value['userInfo']['county'];?>
;

											$.ajax({
												type: 'POST',
												url: siteUrl + '/request',
												dataType: 'json',
												data: {'mode': 'getCounties', 'cityId': <?php echo $_smarty_tpl->tpl_vars['return']->value['userInfo']['city'];?>
},
												success: function(response)
												{

													var options = '<option value="0" disabled="disabled">İlçe Seçin</option>';

													$.each(response, function(i, value) {
														
														if(countyID == value.CountyID)
														{
															options += '\
																<option value="' + value.CountyID + '" selected="selected">' + value.CountyName + '</option>\
															';
														}
														else
														{
															options += '\
																<option value="' + value.CountyID + '">' + value.CountyName + '</option>\
															';
														}

													});

													$('select[name=county]').html(options).removeAttr('disabled', true);
													
												}
											});

											var plateNo = $('option:selected', this).attr('data-plate');
											var tax     = <?php echo $_smarty_tpl->tpl_vars['return']->value['userInfo']['tax'];?>
;

											$.ajax({
												type: 'POST',
												url: siteUrl + '/request',
												dataType: 'json',
												data: {'mode': 'getTaxs', 'plateNo': plateNo},
												success: function(response)
												{

													var options = '';

													$.each(response, function(i, value) {
														if(value.id == tax)
														{
															options += '\
																<option value="' + value.id + '" selected="selected">' + value.daire + '</option>\
															';
														}
														else
														{
															options += '\
																<option value="' + value.id + '">' + value.daire + '</option>\
															';
														}
													});

													$('select[name=taxs]').html(options).removeAttr('disabled', true);
													
												}
											});

											$('select[name=city]').change(function() {

												var cityId  = $(this).val();
												var plateNo = $('option:selected', this).attr('data-plate'); 

												$.ajax({
													type: 'POST',
													url: siteUrl + '/request',
													dataType: 'json',
													data: {'mode': 'getCounties', 'cityId': cityId},
													success: function(response)
													{

														var options = '<option value="0" disabled="disabled" selected="selected">İlçe Seçin</option>';

														$.each(response, function(i, value) {
															options += '\
																<option value="' + value.CountryID + '">' + value.CountyName + '</option>\
															';
														});

														$('select[name=county]').html(options).removeAttr('disabled', true);
														
													}
												});

												$.ajax({
													type: 'POST',
													url: siteUrl + '/request',
													dataType: 'json',
													data: {'mode': 'getTaxs', 'plateNo': plateNo},
													success: function(response)
													{

														var options = '';

														$.each(response, function(i, value) {
															options += '\
																<option value="' + value.id + '">' + value.daire + '</option>\
															';
														});

														$('select[name=taxs]').html(options).removeAttr('disabled', true);
														
													}
												});
											});

											$('input[name=business_type]').change(function() {
												
												if($('input[name=business_type]:checked').val() == 2)
												{
													$('.form-group.business_type_2').show();
												}
												else
												{
													$('.form-group.business_type_2').hide();
												}

											});
										});
									<?php echo '</script'; ?>
>
								
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