<?php /* Smarty version 3.1.27, created on 2017-09-23 14:41:18
         compiled from "C:\xampp\htdocs\galericilerden\app\view\create-store.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2824459c6566eefdb70_34916105%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1ecd468ac34908502b3ffa84e33c3757015b743d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\galericilerden\\app\\view\\create-store.tpl',
      1 => 1505653212,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2824459c6566eefdb70_34916105',
  'variables' => 
  array (
    'return' => 0,
    'store' => 0,
    'activity_area' => 0,
    'business_type' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_59c6566f1980e5_28289841',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_59c6566f1980e5_28289841')) {
function content_59c6566f1980e5_28289841 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2824459c6566eefdb70_34916105';
?>
<body onload="setStore();">
<div id="main">
	<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

	<div class="page-content">
		<div class="container">
			<div class="row">
				<ul class="breadcrumb">
				    <li><a href="<?php echo SITE_URL;?>
">Anasayfa</a></li>
				    <li class="active">Mağaza Aç</li>
				</ul>
				<div class="steps hidden-xs">
					<ul>
				        <li class="step-one active"><i class="step">1</i>
				            <h6>MAĞAZA BİLGİLERİ</h6>
				            <span id="spGeneral" class="active" style="width: 165px;">
				                <img src="<?php echo siteUrl('public/images/spacer.png');?>
" width="7" height="14" alt="Arrow" class="arrow">
				                <a id="hlGeneral">Mağaza Bilgilerini Gir</a>
				            </span>
				        </li>
				        <li id="liFirm" class="step-two <?php if ($_POST['completed'] == 'completed') {?>active<?php }?>"><i class="step">2</i>
				            <h6>FİRMA BİLGİLERİ</h6> 
				            <span <?php if ($_POST['completed'] == 'completed') {?>class="active"<?php }?>><img src="<?php echo siteUrl('public/images/spacer.png');?>
" width="7" height="14" alt="Arrow" class="arrow">
				            	<a>Firma Bilgileri</a>
				            </span>
				        </li>
				        <li id="liPayment" class="step-three <?php if ($_POST['completed'] == 'completed') {?>active<?php }?>"><i class="step">3</i>
				            <h6>ÖDEME</h6> 
				            <span <?php if ($_POST['completed'] == 'completed') {?>class="active"<?php }?>><img src="<?php echo siteUrl('public/images/spacer.png');?>
" width="7" height="14" alt="Arrow" class="arrow">
				            	<a>Ödeme Bilgileriniz</a>
				            </span>
				        </li>
				        <li id="liConfirm" class="step-four <?php if ($_POST['completed'] == 'completed') {?>active<?php }?>"><i class="step">4</i>
				            <h6>TEBRİKLER</h6>
				            <span <?php if ($_POST['completed'] == 'completed') {?>class="active"<?php }?>>
				            	<img src="<?php echo siteUrl('public/images/spacer.png');?>
" width="7" height="14" alt="Arrow" class="arrow">
				            	<a>Onayla</a>
				            </span>
				        </li>
				    </ul>
				</div>
				<?php if (isset($_POST['completed'])) {?>
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
				<div class="step-content">
					<?php if (!isset($_POST['completed']) && $_POST['completed'] != 'completed') {?>
						<div class="add-store-info">
							<div class="block">
								<div class="block-title">
									<h5>Mağaza Bilgileri</h5>
								</div>
								<div class="block-content">
									<form name="create-store" action="" method="POST">
										<div class="hidden-inputs">
											<input type="hidden" name="store-image" value="">
											<input type="hidden" name="store-theme" value="">
											<input type="hidden" name="firm_name" value="">
											<input type="hidden" name="sales_name" value="">
											<input type="hidden" name="sales_surname" value="">
											<input type="hidden" name="sales_phone" value="">
											<input type="hidden" name="completed" value="completed">
										</div>
										<div class="col-md-11" style="margin-left: 35px;">
											<div class="form-group">
												<div class="row">
													<div class="col-md-6 col-sm-6 col-xs-12">
														<label>Mağaza Adı:</label>
														<input type="text" name="store_name" class="form-control" placeholder="Mağaza Adı" onkeypress="return restrictCharacters(this, event, alphaOnly);" onpaste="return false;" autocomplete="off" onkeyup="showDomainName(); checkDomain();">
													</div>
													<div class="col-md-6 col-sm-6 col-xs-12">
														<label>Mağaza Domain:</label>
														<input type="text" disabled="disabled" name="domainname" class="form-control" value="domainadi<?php echo $_smarty_tpl->tpl_vars['return']->value['siteConfig']['siteStoreDomain'];?>
">
													</div>
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
" data-price="<?php echo $_smarty_tpl->tpl_vars['store']->value['store_price'];?>
"><?php echo $_smarty_tpl->tpl_vars['store']->value['store_type_name'];?>
 (<?php if ($_smarty_tpl->tpl_vars['store']->value['ad_limit'] == 0) {?>Limitsiz İlan Limiti<?php } else {
echo $_smarty_tpl->tpl_vars['store']->value['ad_limit'];?>
 İlan Limiti<?php }?>)</option>
													<?php
$_smarty_tpl->tpl_vars['store'] = $foreach_store_Sav;
}
?>
												</select>
												<?php if ($_smarty_tpl->tpl_vars['return']->value['siteConfig']['iyzicoPayment'] === true) {?>
													<div class="paymentPrice" style="margin-top: 15px;">
														<div class="alert alert-info">Ödeyeceğiniz Tutar: <span></span></div>
													</div>
												<?php } else { ?>
													<div class="alert alert-danger" style="margin-top: 15px;">1 Ocak 2018 tarihine kadar ücretsizdir</div>
												<?php }?>
											</div>
											<div class="form-group">
												<label>Mağaza Açıklaması: </label>
												<textarea name="store_text" class="form-control" cols="30" rows="10"></textarea>
											</div>
										</div>
									</form>
									<div class="col-md-11" style="margin-left: 35px;">
										<div class="row">
											<div class="col-md-6">
												<label>Mağaza Logosu (Max Genişlik: 220px, Max Yükseklik: 165px): </label>
												<div class="progress">
												  	<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
												</div>
												
												<div class="row">
													<div class="uploaded-images"></div>
													
													<div class="col-md-3 col-sm-3 col-xs-6">
											    		<div class="upload-button">
												    		<input type="file" name="upload-image" accept="image/*" id="upload-input">
												    		<i class="material-icons">file_upload</i>
												    		<span style="display: block;text-align: center;margin-top: -22px;margin-bottom: 5px;font-weight: 500;font-size: 13px;color: #777;">Fotograf Yükle</span>
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
														<div class="selected">
															<i class="material-icons">check</i>
														</div>
													</div>
													<div class="col-md-6 col-sm-3 col-xs-12" data-theme="2" style="margin-bottom: 15px;">
														<img src="<?php echo siteUrl('public/images/store/header2.jpg');?>
" width="100%" alt="" onclick="selectStoreTheme(2);">
														<div class="selected">
															<i class="material-icons">check</i>
														</div>
													</div>
													<div class="col-md-6 col-sm-3 col-xs-12" data-theme="3" style="margin-bottom: 15px;">
														<img src="<?php echo siteUrl('public/images/store/header3.jpg');?>
" width="100%" alt="" onclick="selectStoreTheme(3);">
														<div class="selected">
															<i class="material-icons">check</i>
														</div>
													</div>
													<div class="col-md-6 col-sm-3 col-xs-12" data-theme="4" style="margin-bottom: 15px;">
														<img src="<?php echo siteUrl('public/images/store/header4.jpg');?>
" width="100%" alt="" onclick="selectStoreTheme(4);">
														<div class="selected">
															<i class="material-icons">check</i>
														</div>
													</div>
												</div>
												<div class="theme-message"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<button type="button" class="btn btn-primary pull-right" onclick="getStoreFirm();" style="padding: 10px 50px;">Devam Et</button>
						</div>
						<div class="add-store-firms" style="display: none;">
							<div class="block">
								<div class="block-title">
									<h5>Firma Bilgileri</h5>
								</div>
								<div class="block-content">
									<div class="col-md-11" style="margin-left: 35px;">
										<div class="form-group">
											<label>Firma Adı: </label>
											<input type="text" name="firm_name" onkeyup="$('form[name=create-store] input[name=firm_name]').val($(this).val());" class="form-control" placeholder="Firma Adı">
										</div>
										<div class="form-group">
											<label>Satış Temsilci İsim: </label>
											<input type="text" name="sales_name" onkeyup="$('form[name=create-store] input[name=sales_name]').val($(this).val());" class="form-control" placeholder="Satış Temsilci Adı">
										</div>
										<div class="form-group">
											<label>Satış Temsilci Soyisim: </label>
											<input type="text" name="sales_surname" onkeyup="$('form[name=create-store] input[name=sales_surname]').val($(this).val());" class="form-control" placeholder="Satış Temsilci Soyisim">
										</div>
										<div class="form-group">
											<label>Satış Temsilci Numarası: </label>
											<input id="phone" type="tel" name="sales_phone" onkeyup="$('form[name=create-store] input[name=sales_phone]').val($(this).val());" class="form-control">
										</div>
										<div class="form-group">
											<?php if (isset($_smarty_tpl->tpl_vars['activity_area'])) {$_smarty_tpl->tpl_vars['activity_area'] = clone $_smarty_tpl->tpl_vars['activity_area'];
$_smarty_tpl->tpl_vars['activity_area']->value = userInfo($_SESSION['userId'],'activity_area'); $_smarty_tpl->tpl_vars['activity_area']->nocache = null; $_smarty_tpl->tpl_vars['activity_area']->scope = 0;
} else $_smarty_tpl->tpl_vars['activity_area'] = new Smarty_Variable(userInfo($_SESSION['userId'],'activity_area'), null, 0);?>
											<label>Faaliyet Alanı: </label>
											<input type="text" disabled="disabled" value="<?php if ($_smarty_tpl->tpl_vars['activity_area']->value == 1) {?>Galeri<?php } elseif ($_smarty_tpl->tpl_vars['activity_area']->value == 2) {?>Yetkili Bayi<?php } elseif ($_smarty_tpl->tpl_vars['activity_area']->value == 3) {?>Üretici Firma<?php }?>" class="form-control">
										</div>
										<div class="form-group">
											<?php if (isset($_smarty_tpl->tpl_vars['business_type'])) {$_smarty_tpl->tpl_vars['business_type'] = clone $_smarty_tpl->tpl_vars['business_type'];
$_smarty_tpl->tpl_vars['business_type']->value = userInfo($_SESSION['userId'],'business_type'); $_smarty_tpl->tpl_vars['business_type']->nocache = null; $_smarty_tpl->tpl_vars['business_type']->scope = 0;
} else $_smarty_tpl->tpl_vars['business_type'] = new Smarty_Variable(userInfo($_SESSION['userId'],'business_type'), null, 0);?>
											<label>İşletme Türü: </label>
											<input type="text" disabled="disabled" value="<?php if ($_smarty_tpl->tpl_vars['business_type']->value == 1) {?>Şahıs Şirketi<?php } elseif ($_smarty_tpl->tpl_vars['business_type']->value == 2) {?>Limited veya Anonim Şirketi<?php }?>" class="form-control">
										</div>
										<div class="form-group">
											<label>TC Kimlik No: </label>
											<input type="text" disabled="disabled" value="<?php echo userInfo($_SESSION['userId'],'tc');?>
" class="form-control">
										</div>
										<?php if ($_smarty_tpl->tpl_vars['business_type']->value == 2) {?>
											<div class="form-group">
												<label>Ticari Ünvan: </label>
												<input type="text" disabled="disabled" value="<?php echo userInfo($_SESSION['userId'],'commercial_title');?>
" class="form-control">
											</div>
										<?php }?>
										<div class="form-group">
											<label>İl: </label>
											<input type="text" disabled="disabled" value="<?php echo cityInfo(userInfo($_SESSION['userId'],'city'),'CityName');?>
" class="form-control">
										</div>
										<div class="form-group">
											<label>İlçe: </label>
											<input type="text" disabled="disabled" value="<?php echo countyInfo(userInfo($_SESSION['userId'],'county'),'CountyName');?>
" class="form-control">
										</div>
										<div class="form-group">
											<label>Vergi Dairesi: </label>
											<input type="text" disabled="disabled" value="<?php echo taxInfo(userInfo($_SESSION['userId'],'tax'),'daire');?>
" class="form-control">
										</div>
										<div class="form-group">
											<label>Vergi Numarası: </label>
											<input type="text" disabled="disabled" value="<?php echo userInfo($_SESSION['userId'],'tax_no');?>
" class="form-control">
										</div>
										<div class="form-group">
											<label>Adres Detayı: </label>
											<textarea disabled="disabled" cols="20" rows="5" class="form-control"><?php echo userInfo($_SESSION['userId'],'address');?>
</textarea>
										</div>
									</div>
								</div>
							</div>
							<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo siteUrl('public/scripts/jquery.maskedinput.min.js');?>
"><?php echo '</script'; ?>
>
							
								<?php echo '<script'; ?>
 type="text/javascript">
									$(function() {
										$("#phone").mask("0 (999) 999 99 99");
									});
								<?php echo '</script'; ?>
>
							
							<?php if ($_smarty_tpl->tpl_vars['return']->value['siteConfig']['iyzicoPayment'] === true) {?>
								<button type="button" class="btn btn-primary pull-right" onclick="getStorePayment();" style="padding: 10px 50px;">Devam Et</button>
							<?php } else { ?>
								<button type="button" class="btn btn-primary pull-right" onclick="$('form[name=create-store]').submit();" style="padding: 10px 50px;">Devam Et</button>
							<?php }?>
						</div>
						<?php if ($_smarty_tpl->tpl_vars['return']->value['siteConfig']['iyzicoPayment'] === true) {?>
							<div class="add-store-payment" style="display: none;">
								<div class="row">
									<div class="col-md-5">
										<div class="block">
											<div class="block-title">
												<h5>Fatura Bilgileri</h5>
											</div>
											<div class="block-content">
												<table class="table">
													<tbody>
														<tr>
															<td style="width: 40%;">Adı Soyadı</td>
															<td style="width: 60%;" class="text-capitalize"><b><?php echo userInfo($_SESSION['userId'],'name');?>
 <?php echo userInfo($_SESSION['userId'],'surname');?>
</b></td>
														</tr>
														<tr>
															<td style="width: 40%;">İl</td>
															<td style="width: 60%;" class="text-capitalize"><b><?php echo cityInfo(userInfo($_SESSION['userId'],'city'),'CityName');?>
</b></td>
														</tr>
														<tr>
															<td style="width: 40%;">İlçe</td>
															<td style="width: 60%;" class="text-capitalize"><b><?php echo countyInfo(userInfo($_SESSION['userId'],'county'),'CountyName');?>
</b></td>
														</tr>
														<tr>
															<td style="width: 40%;">Cep Telefonu</td>
															<td style="width: 60%;" class="text-capitalize"><b><?php echo userInfo($_SESSION['userId'],'phone');?>
</b></td>
														</tr>
														<tr>
															<td style="width: 40%;">Açık Adres</td>
															<td style="width: 60%;" class="text-capitalize"><b><?php echo userInfo($_SESSION['userId'],'address');?>
</b></td>
														</tr>
														<tr>
															<td style="width: 40%;">Tc No</td>
															<td style="width: 60%;" class="text-capitalize"><b><?php echo userInfo($_SESSION['userId'],'tc');?>
</b></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<div class="col-md-7">
										<div class="block">
											<div class="block-title">
												<h5>Ödeme Bilgileriniz</h5>
											</div>
											<div class="block-content">
												<div class="paymentPrice">
													<div class="alert alert-info">Ödeyeceğiniz Tutar: <span></span></div>
												</div>
												<div class="payment-message"></div>
												<div class="payment-loader">
													<div class="loader"></div>
												</div>
												<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
													<div class='card-wrapper'></div>
													<link rel="stylesheet" href="<?php echo siteUrl('public/styles/card.css');?>
">
													<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo siteUrl('public/scripts/jquery.card.js');?>
"><?php echo '</script'; ?>
>
													<form name="storeCreate-card">
														<div class="row">
															<div class="col-md-12">
																<div class="row">
																    <div class="form-group col-md-6 col-xs-6">
																    	<input type="text" id="number" name="number" placeholder="Kart Numarası" class="form-control" />
																    </div>
																    <div class="form-group col-md-6 col-xs-6">
																    	<input type="text" id="name" name="name" placeholder="Ad Soyad" class="form-control" />
																    </div>
															    </div>
														    </div>
														    <div class="col-md-12">
														    	<div class="row">
															    	<div class="form-group col-md-3 col-xs-6">
															    		<input type="text" id="expiry" name="expiry" placeholder="MM/YYYY" class="form-control" />
															    	</div>
															    	<div class="form-group col-md-3 col-xs-6">
															    		<input type="text" id="cvc" name="cvc" placeholder="CVC" class="form-control" />
															    	</div>
															    	<div class="form-group col-md-6 col-xs-12">
															    		<button type="button" class="btn btn-primary" onclick="storeCreatePayment();" style="line-height: 30px;width: 100%;">Ödeme Yap</button>
															    	</div>
														    	</div>
														    </div>
													    </div>
													</form>
													<?php echo '<script'; ?>
 type="text/javascript">
														$('form[name=storeCreate-card]').card({
														    container: '.card-wrapper',
														    //width: 200,
														    formatting: true,
														    messages: {
														        validDate: 'valid\ndate',
														        monthYear: 'mm/yyyy',
														    },
														    placeholders: {
														        number: '•••• •••• •••• ••••',
														        name: 'Ad Soyad',
														        expiry: '••/••',
														        cvc: '•••'
														    }
														});
													<?php echo '</script'; ?>
>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php }?>
					<?php } else { ?>
						<div class="add-store-message">
							<div class="step-content">
								<div class="block">
									<?php if ($_smarty_tpl->tpl_vars['return']->value['messageType'] == 'success') {?>
										<div class="block-title">
											<h5>Başarılı</h5>
										</div>
										<div class="block-content">
											<div class="text-center">
												<i class="material-icons" style="margin-bottom: 25px;font-size: 100px;color: #3c763d;">check</i>
												<p style="font-weight: 500;"><?php echo $_smarty_tpl->tpl_vars['return']->value['message'];?>
</p>
											</div>
										</div>
									<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['messageType'] == 'error') {?>
										<div class="block-title">
											<h5>Hata</h5>
										</div>
										<div class="block-content">
											<div class="text-center">
												<i class="material-icons" style="margin-bottom: 25px;font-size: 100px;color: #ff263a;">close</i>
												<p style="font-weight: 500;"><?php echo $_smarty_tpl->tpl_vars['return']->value['message'];?>
</p>
											</div>
										</div>
									<?php }?>
								</div>
							</div>
						</div>
					<?php }?>
				</div>
			</div>
		</div>
	</div>
</div><?php }
}
?>