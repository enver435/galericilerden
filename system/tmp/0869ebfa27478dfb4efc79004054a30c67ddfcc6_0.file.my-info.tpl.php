<?php /* Smarty version 3.1.27, created on 2018-01-19 10:49:40
         compiled from "C:\xampp\htdocs\galericilerden\app\view\my-info.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:134765a61bf3437a1e8_03470900%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0869ebfa27478dfb4efc79004054a30c67ddfcc6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\galericilerden\\app\\view\\my-info.tpl',
      1 => 1516354918,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '134765a61bf3437a1e8_03470900',
  'variables' => 
  array (
    'return' => 0,
    'cities' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5a61bf344249f8_78270269',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5a61bf344249f8_78270269')) {
function content_5a61bf344249f8_78270269 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '134765a61bf3437a1e8_03470900';
?>
<div id="main">
	<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

	<div class="page-content">
		<div class="container">
			<div class="profile-header-menu block hidden-sm hidden-xs">
				<ul>
					<li>
						<a href="<?php echo siteUrl('my');?>
">
							<i class="material-icons">home</i> Özet
						</a>
					</li>
					<li>
						<a href="<?php echo siteUrl('my-ads/active');?>
">
							<i class="material-icons">view_stream</i> İlanlarım
						</a>
					</li>
					<li>
						<a href="<?php echo siteUrl('my-favorites/ads');?>
">
							<i class="material-icons">star</i> Favorilerim
						</a>
					</li>
					<li>
						<a href="<?php echo siteUrl('my-messages');?>
">
							<i class="material-icons">message</i> Mesajlarım
						</a>
					</li>
					<li>
						<a href="<?php echo siteUrl('my-notifications');?>
">
							<i class="material-icons">notifications</i> Bildirimlerim
						</a>
					</li>
					<li class="active">
						<a href="<?php echo siteUrl('my-info');?>
">
							<i class="material-icons">person</i> Üyeliğim
						</a>
					</li>
					<?php if (userInfo($_SESSION['userId'],'user_status') == 2) {?>
						<li>
							<a href="<?php echo siteUrl('my-store');?>
">
								<i class="material-icons">store</i> Mağazam
							</a>
						</li>
					<?php }?>
				</ul>
			</div>
			
			<h4 class="hidden-lg hidden-md" style="margin-bottom: 25px;">Üyeliğim</h4>
			<?php if (isset($_POST['save'])) {?>
				<?php if ($_smarty_tpl->tpl_vars['return']->value['messageType'] == 'success') {?>
					<div class="alert alert-success">
						<strong>Başarılı!</strong> <?php echo $_smarty_tpl->tpl_vars['return']->value['message'];?>

					</div>
				<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['messageType'] == 'error') {?>
					<div class="alert alert-danger">
						<strong>Başarısız!</strong> <?php echo $_smarty_tpl->tpl_vars['return']->value['message'];?>

					</div>
				<?php }?>
			<?php }?>
			<div class="block default-block my-info">
				<div class="block-title hidden-sm hidden-xs">
					<h5>Üyeliğim</h5>
				</div>
				<div class="block-content">
					<form action="" method="POST">
						<input type="hidden" name="save" value="save">
						<div class="col-md-6 col-md-offset-3">
							<div class="row">
								<div class="col-md-6 col-xs-12">
									<div class="form-group">
										<label>Ad: </label>
										<input type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['userInfo']['name'];?>
" required="required" class="form-control">
									</div>
								</div>
								<div class="col-md-6 col-xs-12">
									<div class="form-group">
										<label>Soyad: </label>
										<input type="text" name="surname" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['userInfo']['surname'];?>
" required="required" class="form-control">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>E-Posta: </label>
								<input type="email" name="email" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['userInfo']['email'];?>
" required="required" class="form-control">
							</div>
							<div class="form-group">
								<label>Cep Telefonu: </label>
								<input id="phone" type="text" name="phone" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['userInfo']['phone'];?>
" required="required" class="form-control">
							</div>
							<div class="form-group">
								<label>İş Telefonu:</label>
								<input id="phone_work" type="text" name="phone_work" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['userInfo']['phone_work'];?>
" placeholder="İş Telefonu" class="form-control">
							</div>
							<div class="form-group">
								<label>Sabit Telefon:</label>
								<input id="phone_more" type="text" name="phone_more" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['userInfo']['phone_more'];?>
" placeholder="Sabit Telefon" class="form-control">
							</div>
							<div class="form-group">
								<label>İl: </label>
								<select name="city" class="form-control">
									<option value="0" disabled="disabled" selected="selected">İl Seçin</option>
									<?php
$_from = $_smarty_tpl->tpl_vars['return']->value['cities'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['cities'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['cities']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['cities']->value) {
$_smarty_tpl->tpl_vars['cities']->_loop = true;
$foreach_cities_Sav = $_smarty_tpl->tpl_vars['cities'];
?>
										<option value="<?php echo $_smarty_tpl->tpl_vars['cities']->value['CityID'];?>
" <?php if ($_smarty_tpl->tpl_vars['return']->value['userInfo']['city'] == $_smarty_tpl->tpl_vars['cities']->value['CityID']) {?>selected="selected"<?php }?> data-plate="<?php echo $_smarty_tpl->tpl_vars['cities']->value['PlateNo'];?>
"><?php echo $_smarty_tpl->tpl_vars['cities']->value['CityName'];?>
</option>
									<?php
$_smarty_tpl->tpl_vars['cities'] = $foreach_cities_Sav;
}
?>
								</select>
							</div>
							<div class="form-group">
								<label>İlçe: </label>
								<select name="counties" class="form-control" disabled="disabled">İlçe Seçin</select>
							</div>
							<div class="form-group">
								<label>Adres Detayı: </label>
								<textarea name="address" cols="30" rows="5" class="form-control"><?php echo $_smarty_tpl->tpl_vars['return']->value['userInfo']['address'];?>
</textarea>
							</div>

							<?php if ($_smarty_tpl->tpl_vars['return']->value['userInfo']['user_status'] == 2) {?>
								<div class="form-group">
									<label>Faaliyet Alanınız: </label>
									<select name="activity_area" disabled="disabled" class="form-control">
										<option value="1" <?php if ($_smarty_tpl->tpl_vars['return']->value['userInfo']['activity_area'] == 1) {?>selected="selected"<?php }?>>Galeri</option>
										<option value="2" <?php if ($_smarty_tpl->tpl_vars['return']->value['userInfo']['activity_area'] == 2) {?>selected="selected"<?php }?>>Yetkili Bayi</option>
										<option value="3" <?php if ($_smarty_tpl->tpl_vars['return']->value['userInfo']['activity_area'] == 3) {?>selected="selected"<?php }?>>Üretici Firma</option>
									</select>
								</div>
								<div class="form-group radio-primary">
									<label>İşletme Türü: </label>
									<div class="radio">
		                                <input type="radio" name="business_type" value="1" <?php if ($_smarty_tpl->tpl_vars['return']->value['userInfo']['business_type'] == 1) {?>checked="checked"<?php }?> class="magic-radio">
		                                <label>Şahıs Şirketi</label>
		                            </div>
		                            <div class="radio">
		                                <input type="radio" name="business_type" value="2" <?php if ($_smarty_tpl->tpl_vars['return']->value['userInfo']['business_type'] == 2) {?>checked="checked"<?php }?> class="magic-radio">
		                                <label>Limited veya Anonim Şirketi</label>
		                            </div>
								</div>
								<div class="form-group business_type_1" <?php if ($_smarty_tpl->tpl_vars['return']->value['userInfo']['business_type'] == 1) {?>style="display: block;"<?php } else { ?>style="display: none;"<?php }?>>
									<label>TC Kimlik No: </label>
									<input id="tc" type="text" name="tc" maxlength="11" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['userInfo']['tc'];?>
" placeholder="TC Kimlik No" class="form-control">
								</div>
								<div class="form-group business_type_2" <?php if ($_smarty_tpl->tpl_vars['return']->value['userInfo']['business_type'] == 2) {?>style="display: block;"<?php } else { ?>style="display: none;"<?php }?>>
									<label>Ticari Ünvan: </label>
									<input type="text" name="commercial_title" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['userInfo']['commercial_title'];?>
" placeholder="Ticari Ünvan" class="form-control">
								</div>
								<div class="form-group">
									<label>Vergi Dairesi: </label>
									<select name="taxs" class="form-control" disabled="disabled"></select>
								</div>
								<div class="form-group">
									<label>Vergi Numarası: </label>
									<input type="text" id="taxno" name="tax_no" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['userInfo']['tax_no'];?>
" class="form-control">
								</div>
							<?php }?>

							<div class="form-group">
								<div class="alert alert-info">Şifre alanını boş bırakırsanız şifreniz değişmez</div>
								<label>Şifre: </label>
								<input type="password" name="pass" placeholder="******" class="form-control">
							</div>
						</div>
					</form>
					<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo siteUrl('public/scripts/jquery.maskedinput.min.js');?>
"><?php echo '</script'; ?>
>
					
						<?php echo '<script'; ?>
 type="text/javascript">
							$(function() {

								var cityId   = <?php echo $_smarty_tpl->tpl_vars['return']->value['userInfo']['city'];?>
;
								var countyId = <?php echo $_smarty_tpl->tpl_vars['return']->value['userInfo']['county'];?>
;
								var taxId    = <?php echo $_smarty_tpl->tpl_vars['return']->value['userInfo']['tax'];?>
;
								var plateNo  = $('select[name=city] option:selected').attr('data-plate');

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
												<option value="' + value.CountyID + '" ' + ((value.CountyID == countyId) ? 'selected="selected"' : null) + '>' + value.CountyName + '</option>\
											';
										});

										$('select[name=counties]').html(options).removeAttr('disabled', true);
										
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
												<option value="' + value.id + '" ' + ((value.id == taxId) ? 'selected="selected"' : null) + '>' + value.daire + '</option>\
											';
										});

										$('select[name=taxs]').html(options).removeAttr('disabled', true);
										$('input[name=tax_no]').html(options).removeAttr('disabled', true);
										
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
													<option value="' + value.CountyID + '">' + value.CountyName + '</option>\
												';
											});

											$('select[name=counties]').html(options).removeAttr('disabled', true);
											
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
											$('input[name=tax_no]').html(options).removeAttr('disabled', true);
											
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

								$("#phone, #phone_work").mask("0 (999) 999 99 99");
								$("#phone_more").mask("0(999) 999 99 99");
								$("#tc").mask("99999999999");
								$("#taxno").mask("9999999999");
							});
						<?php echo '</script'; ?>
>
					
				</div>
			</div>
			<button type="button" onclick="$('form').submit();" class="btn btn-primary pull-right" style="padding: 10px 50px;">Kaydet</button>
		</div>
	</div>
</div><?php }
}
?>