<?php /* Smarty version 3.1.27, created on 2018-01-18 22:03:25
         compiled from "C:\xampp\htdocs\galericilerden\app\view\my-ads.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:48705a610b9d86b841_20882256%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9f00a5a544129b0a8fd41ba577089fc078f8620b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\galericilerden\\app\\view\\my-ads.tpl',
      1 => 1516283358,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '48705a610b9d86b841_20882256',
  'variables' => 
  array (
    'return' => 0,
    'ads' => 0,
    'favoriteCount' => 0,
    'find' => 0,
    'repl' => 0,
    'city' => 0,
    'image' => 0,
    'doping' => 0,
    'doping_user_price' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5a610b9da7e1a8_47539350',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5a610b9da7e1a8_47539350')) {
function content_5a610b9da7e1a8_47539350 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\xampp\\htdocs\\galericilerden\\system\\plugin\\smarty\\plugins\\modifier.date_format.php';
if (!is_callable('smarty_modifier_replace')) require_once 'C:\\xampp\\htdocs\\galericilerden\\system\\plugin\\smarty\\plugins\\modifier.replace.php';

$_smarty_tpl->properties['nocache_hash'] = '48705a610b9d86b841_20882256';
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
					<li class="active">
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
					<li>
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
			
			<h4 class="hidden-lg hidden-md" style="margin-bottom: 25px;">İlanlarım</h4>
			<?php if ($_smarty_tpl->tpl_vars['return']->value['userInfo']['user_status'] == 1) {?>
		        <?php if ($_smarty_tpl->tpl_vars['return']->value['adsLimit'] >= $_smarty_tpl->tpl_vars['return']->value['userTypeAdsLimit'] && $_smarty_tpl->tpl_vars['return']->value['userInfo']['adAddShow'] == 0) {?>
		        	<div class="step-content">
			        	<div class="block">
				        	<div class="block-title">
				        		<h5>Yıllık ilan limitiniz dolmuş</h5>
				        	</div>
			        		<div class="block-content">
				        		<div class="text-center">
									<i class="material-icons" style="margin-bottom: 25px;font-size: 100px;color: #ff263a;">close</i>
									<p style="font-weight: 500;">Yıllık ilan limitiniz dolmuş.</p>
									<p style="font-weight: 500;">Yinede ilanınızı yayına almak istermisiniz ? O zaman ödeme yapıp yeniden ilanınızı yayına bilirsiniz!</p>
								</div>
							</div>
						</div>
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
											<form name="limit-card">
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
													    		<button type="button" class="btn btn-primary" onclick="limitPayment();" style="line-height: 30px;width: 100%;">Ödeme Yap</button>
													    	</div>
												    	</div>
												    </div>
											    </div>
											</form>
											
												<?php echo '<script'; ?>
 type="text/javascript">
													var limitPrice = <?php echo getSetting('individual_ad_limit_price');?>
;

													$('form[name=limit-card]').card({
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
			<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['userInfo']['user_status'] == 2) {?>
				<div class="step-content">
					<?php if ($_smarty_tpl->tpl_vars['return']->value['updateAd'] === false && $_smarty_tpl->tpl_vars['return']->value['storeCloseAdmin'] === true) {?>
						<div class="block">
							<div class="block-title">
				        		<h5>Mağazanız onaylanmamıştır</h5>
				        	</div>
							<div class="block-content">
					        	<div class="text-center">
									<i class="material-icons" style="margin-bottom: 25px;font-size: 100px;color: #ff263a;">close</i>
									<p style="font-weight: 500;">
										Mağazanız onaylanmamıştır
										<a href="<?php echo siteUrl('my-store/edit-store');?>
">
											<button type="button" class="btn btn-primary" style="margin-top: 25px;">Mağazanızı güncelleyin</button>
										</a>
									</p>
								</div>
							</div>
						</div>
					<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['updateAd'] === false && $_smarty_tpl->tpl_vars['return']->value['createNewStore'] === true) {?>
						<div class="block">
							<div class="block-title">
				        		<h5>Mağazanız oluşturulmuştur</h5>
				        	</div>
							<div class="block-content">
					        	<div class="text-center">
									<i class="material-icons" style="margin-bottom: 25px;font-size: 100px;color: #ff263a;">close</i>
									<p style="font-weight: 500;">
										Mağazanız oluşturulmuş<?php if ($_smarty_tpl->tpl_vars['return']->value['siteConfig']['iyzicoPayment'] === true) {?>, ödeme yapılmış<?php }?> ve admin kontrolüne gönderilmiştir. Onaylandıkdan sonra tekrar bu sayfayı ziyaret ediniz
									</p>
								</div>
							</div>
						</div>
					<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['updateAd'] === false && $_smarty_tpl->tpl_vars['return']->value['endTimeStore'] === true) {?>
						<div class="block">
							<div class="block-title">
				        		<h5>Mağazanızın yıllık süresi dolmuş</h5>
				        	</div>
							<div class="block-content">
					        	<div class="text-center">
									<i class="material-icons" style="margin-bottom: 25px;font-size: 100px;color: #ff263a;">close</i>
									<p style="font-weight: 500;">
										Mağazanızın yıllık süresi dolmuş
										<a href="<?php echo siteUrl('update-store-year');?>
">
											<button type="button" class="btn btn-primary" style="margin-top: 25px;">Mağazanızı güncelleyin</button>
										</a>
									</p>
								</div>
							</div>
						</div>
					<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['updateAd'] === false && $_smarty_tpl->tpl_vars['return']->value['endTimeStoreAdmin'] === true) {?>
						<div class="block">
							<div class="block-title">
				        		<h5>Mağazanızın yıllık süresi dolmuş</h5>
				        	</div>
							<div class="block-content">
					        	<div class="text-center">
									<i class="material-icons" style="margin-bottom: 25px;font-size: 100px;color: #ff263a;">close</i>
									<p style="font-weight: 500;">
										Mağazanızın yıllık süresi dolmuş<?php if ($_smarty_tpl->tpl_vars['return']->value['siteConfig']['iyzicoPayment'] === true) {?>, ödeme yapılmış<?php }?> ve admin kontrolüne gönderilmiştir. Onaylandıkdan sonra tekrar bu sayfayı ziyaret ediniz
									</p>
								</div>
							</div>
						</div>
					<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['updateAd'] === false && $_smarty_tpl->tpl_vars['return']->value['endStoreLimitAdmin'] === true) {?>
						<div class="block">
							<div class="block-title">
				        		<h5>Mağazanızın yıllık ilan limiti dolmuş</h5>
				        	</div>
							<div class="block-content">
					        	<div class="text-center">
									<i class="material-icons" style="margin-bottom: 25px;font-size: 100px;color: #ff263a;">close</i>
									<p style="font-weight: 500;">
										Mağazanızın yıllık ilan limiti dolmuş<?php if ($_smarty_tpl->tpl_vars['return']->value['siteConfig']['iyzicoPayment'] === true) {?>, ödeme yapılmış<?php }?> ve admin kontrolüne gönderilmiştir. Onaylandıkdan sonra tekrar bu sayfayı ziyaret ediniz
									</p>
								</div>
							</div>
						</div>
					<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['updateAd'] === false && $_smarty_tpl->tpl_vars['return']->value['endLimitStore'] === true) {?>
						<div class="block">
							<div class="block-title">
				        		<h5>Mağazanızın yıllık ilan limiti dolmuş</h5>
				        	</div>
							<div class="block-content">
					        	<div class="text-center">
									<i class="material-icons" style="margin-bottom: 25px;font-size: 100px;color: #ff263a;">close</i>
									<p style="font-weight: 500;">
										Mağazanızın yıllık ilan limiti dolmuş
										<a href="<?php echo siteUrl('update-store-limit');?>
">
											<button type="button" class="btn btn-primary" style="margin-top: 25px;">Mağazanızı güncelleyin</button>
										</a>
									</p>
								</div>
							</div>
						</div>
					<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['updateAd'] === false && $_smarty_tpl->tpl_vars['return']->value['userStore'] === false) {?>
						<div class="block">
							<div class="block-title">
				        		<h5>Yıllık ilan limitiniz dolmuş</h5>
				        	</div>
							<div class="block-content">
					        	<div class="text-center">
									<i class="material-icons" style="margin-bottom: 25px;font-size: 100px;color: #ff263a;">close</i>
									<p style="font-weight: 500;">
										Yıllık ilan limitiniz dolmuş. 
										<a href="<?php echo siteUrl('create-store');?>
">
											<button type="button" class="btn btn-primary" style="margin-top: 25px;">Mağaza açın</button>
										</a>
									</p>
								</div>
							</div>
						</div>
					<?php }?>
				</div>
			<?php }?>

			<?php if ($_smarty_tpl->tpl_vars['return']->value['updateAd'] === true && getUrl(1) != 'ad-edit' && getUrl(1) != 'add-doping' && getUrl(1) != 'public-end' && getUrl(1) != 'update-public') {?>
				<ul class="profile-tab">
					<li <?php if (getUrl(1) == 'active') {?>class="active"<?php }?>>
						<a href="<?php echo siteUrl('my-ads/active');?>
">Aktif</a>
					</li>
					<li <?php if (getUrl(1) == 'passive') {?>class="active"<?php }?>>
						<a href="<?php echo siteUrl('my-ads/passive');?>
">Pasif</a>
					</li>
					<li <?php if (getUrl(1) == 'finished') {?>class="active"<?php }?>>
						<a href="<?php echo siteUrl('my-ads/finished');?>
">Süresi Biten</a>
					</li>
					<li <?php if (getUrl(1) == 'pending') {?>class="active"<?php }?>>
						<a href="<?php echo siteUrl('my-ads/pending');?>
">Onay Bekleyen</a>
					</li>
					<li <?php if (getUrl(1) == 'unconfirmed') {?>class="active"<?php }?>>
						<a href="<?php echo siteUrl('my-ads/unconfirmed');?>
">Onaylanmayan</a>
					</li>
				</ul>
				
				<div class="block my-ads desktop hidden-sm hidden-xs">
					<?php if ($_smarty_tpl->tpl_vars['return']->value['ads']) {?>
						<table class="table">
							<thead>
								<tr>
									<th></th>
									<th>İlan Başlığı</th>
									<th>Bitiş Tarihi</th>
									<th>Hit</th>
									<th>Favori</th>
									<th>Fiyat</th>
									<th>Dopingler</th>
									<th>İşlemler</th>
								</tr>
							</thead>
							<tbody>
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
									<tr data-id="<?php echo $_smarty_tpl->tpl_vars['ads']->value['id'];?>
">
										<td width="80">
											<img src="<?php echo siteUrl('files/ads/thumb');?>
/<?php echo $_smarty_tpl->tpl_vars['ads']->value['title_image'];?>
.jpg" width="80" alt="<?php echo $_smarty_tpl->tpl_vars['ads']->value['title'];?>
">
										</td>
										<td><?php echo strShorten($_smarty_tpl->tpl_vars['ads']->value['title'],35,'...');?>
</td>
										<td><?php if ($_smarty_tpl->tpl_vars['ads']->value['public_end_date'] != 0) {
echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['ads']->value['public_end_date'],"%d");?>
 <?php echo monthName($_smarty_tpl->tpl_vars['ads']->value['public_end_date']);?>
 <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['ads']->value['public_end_date'],"%Y");
} else { ?>-<?php }?></td>
										<td><?php echo $_smarty_tpl->tpl_vars['ads']->value['hit'];?>
</td>
										<td>
											<?php if (isset($_smarty_tpl->tpl_vars['favoriteCount'])) {$_smarty_tpl->tpl_vars['favoriteCount'] = clone $_smarty_tpl->tpl_vars['favoriteCount'];
$_smarty_tpl->tpl_vars['favoriteCount']->value = $_smarty_tpl->tpl_vars['return']->value['Favorites']->adsFavorites($_smarty_tpl->tpl_vars['ads']->value['id']); $_smarty_tpl->tpl_vars['favoriteCount']->nocache = null; $_smarty_tpl->tpl_vars['favoriteCount']->scope = 0;
} else $_smarty_tpl->tpl_vars['favoriteCount'] = new Smarty_Variable($_smarty_tpl->tpl_vars['return']->value['Favorites']->adsFavorites($_smarty_tpl->tpl_vars['ads']->value['id']), null, 0);?>

											<?php if ($_smarty_tpl->tpl_vars['favoriteCount']->value !== false) {
echo count($_smarty_tpl->tpl_vars['favoriteCount']->value);
} else { ?>0<?php }?>
										</td>
										<td style="color: #ff0000;font-weight: bold;">
											<?php echo number_format($_smarty_tpl->tpl_vars['ads']->value['price'],0,".",",");?>

											<?php if ($_smarty_tpl->tpl_vars['ads']->value['price_type'] == 0) {?>
												<i class="icon icon-tl"></i>
											<?php } elseif ($_smarty_tpl->tpl_vars['ads']->value['price_type'] == 1) {?>
												<i class="icon icon-euro"></i>
											<?php } elseif ($_smarty_tpl->tpl_vars['ads']->value['price_type'] == 2) {?>
												<i class="icon icon-usd"></i>
											<?php }?>
										</td>
										<td>
											<?php if ($_smarty_tpl->tpl_vars['ads']->value['doping_home'] == 1) {?><p style="margin-bottom: 0;">Ana Sayfa Vitrini</p><?php }?>
											<?php if ($_smarty_tpl->tpl_vars['ads']->value['doping_acil'] == 1) {?><p style="margin-bottom: 0;">Acil Vitrin</p><?php }?>
											<?php if ($_smarty_tpl->tpl_vars['ads']->value['doping_up'] == 1) {?><p style="margin-bottom: 0;">Üst Sıradayım</p><?php }?>
											<?php if ($_smarty_tpl->tpl_vars['ads']->value['doping_differently'] == 1) {?><p style="margin-bottom: 0;">Kalın Yazı Renkli Çerçeve</p><?php }
if ($_smarty_tpl->tpl_vars['ads']->value['doping_sahibinden'] == 1) {?><p style="margin-bottom: 0;">İlk Sahibinden</p><?php }
if ($_smarty_tpl->tpl_vars['ads']->value['doping_yenigibi'] == 1) {?><p style="margin-bottom: 0;">Yeni Gibi</p><?php }
if ($_smarty_tpl->tpl_vars['ads']->value['doping_ekspertizli'] == 1) {?><p style="margin-bottom: 0;">Ekspertizli</p><?php }?>
											<?php if ($_smarty_tpl->tpl_vars['ads']->value['doping_home'] == 0 && $_smarty_tpl->tpl_vars['ads']->value['doping_acil'] == 0 && $_smarty_tpl->tpl_vars['ads']->value['doping_up'] == 0 && $_smarty_tpl->tpl_vars['ads']->value['doping_differently'] == 0 && $_smarty_tpl->tpl_vars['ads']->value['doping_sahibinden'] == 0 && $_smarty_tpl->tpl_vars['ads']->value['doping_yenigibi'] == 0 && $_smarty_tpl->tpl_vars['ads']->value['doping_ekspertizli'] == 0) {?>Doping Yüklü Değil<?php }?>
										</td>
										<td>
											<?php if (getUrl(1) == 'active') {?>
												<select name="operation" class="form-control" style="padding: 5px;">
													<option value="0">Seçiniz</option>
													<option value="get-ad">İlana Git</option>
													<option value="ad-edit">İlanı Düzenle</option>
													<option value="add-doping">Doping Ver</option>
													<option value="public-end">Yayından Kaldır</option>
												</select>
											<?php } elseif (getUrl(1) == 'passive') {?>
												<select name="operation" class="form-control" style="padding: 5px;">
													<option value="0">Seçiniz</option>
													<?php if ($_smarty_tpl->tpl_vars['ads']->value['public_end_date'] > time()) {?>
														<option value="get-ad">İlana Git</option>
													<?php }?>
													<option value="ad-edit">İlanı Düzenle</option>
													<option value="public-start">Yayına Al</option>
													<option value="delete-ad">İlanı Sil</option>
												</select>
											<?php } elseif (getUrl(1) == 'finished') {?>
												<select name="operation" class="form-control" style="padding: 5px;">
													<option value="0">Seçiniz</option>
													<option value="update-public">İlan Tarihini Güncelle</option>
													<option value="delete-ad">İlanı Sil</option>
												</select>
											<?php } elseif (getUrl(1) == 'unconfirmed') {?>
												<select name="operation" class="form-control" style="padding: 5px;">
													<option value="0">Seçiniz</option>
													<option value="ad-edit">İlanı Düzenle</option>
													<option value="delete-ad">İlanı Sil</option>
												</select>
											<?php } elseif (getUrl(1) == 'pending') {?>
												<select name="operation" class="form-control" style="padding: 5px;">
													<option value="0">Seçiniz</option>
													<option value="get-ad">İlana Git</option>
												</select>
											<?php }?>
										</td>
									</tr>
								<?php
$_smarty_tpl->tpl_vars['ads'] = $foreach_ads_Sav;
}
?>
							</tbody>
						</table>
						<link rel="stylesheet" href="<?php echo siteUrl('public/styles/sweetalert.css');?>
" />
						<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo siteUrl('public/scripts/sweetalert.min.js');?>
"><?php echo '</script'; ?>
>
						
							<?php echo '<script'; ?>
 type="text/javascript">
								$(function() {

									$('select[name=operation]').change(function() {
										var operation = $(this).val();
										var adId      = $(this).parent().parent().attr('data-id');

										$(this).val(0);

										if(operation == 'get-ad')
										{
											window.open('<?php echo SITE_URL;?>
/my-ads/' + operation + '/' + adId);
										}
										else if(operation == 'delete-ad')
										{
											swal({
											    title: 'Eminmisiniz ?',
											    text: 'İlanınızı sitemizden tamamen silmek istediğinize eminmisiniz ?',
											    type: 'warning',
											    showCancelButton: true,
											    confirmButtonColor: '#ff263a',
											    confirmButtonText: 'Evet',
											    cancelButtonText: 'Hayır',
											    closeOnConfirm: false
											},
											function() {
											    window.location.href = '<?php echo SITE_URL;?>
/my-ads/' + operation + '/' + adId;
											});
										}
										else
										{
											window.location.href = '<?php echo SITE_URL;?>
/my-ads/' + operation + '/' + adId;
										}
									});

								});
							<?php echo '</script'; ?>
>
						
					<?php } else { ?>
						<div class="block" style="margin-bottom: 0;">
							<p class="text-danger text-center" style="margin-top: 15px;"><b>Bir sonuç bulunamadı</b></p>
						</div>
					<?php }?>
				</div>
				<div class="block my-ads list-mobile hidden-lg hidden-md">
					<?php if ($_smarty_tpl->tpl_vars['return']->value['ads']) {?>
						<ul>
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
								<li>
									<img src="<?php echo siteUrl('files/ads/thumb');?>
/<?php echo $_smarty_tpl->tpl_vars['ads']->value['title_image'];?>
.jpg" width="80" alt="<?php echo $_smarty_tpl->tpl_vars['ads']->value['title'];?>
">
									<div class="title">
										<a href="<?php echo siteUrl('view');?>
/<?php echo $_smarty_tpl->tpl_vars['ads']->value['seflink'];?>
-<?php echo $_smarty_tpl->tpl_vars['ads']->value['id'];?>
"><?php echo strShorten($_smarty_tpl->tpl_vars['ads']->value['title'],50,'...');?>
</a>
									</div>
									<span class="address">
										<i class="material-icons">list</i>
										<?php if ($_smarty_tpl->tpl_vars['ads']->value['category1'] != 0) {?>
											<?php echo categoryInfo($_smarty_tpl->tpl_vars['ads']->value['category1'],'kategori_adi');?>

										<?php }?>

										<?php if ($_smarty_tpl->tpl_vars['ads']->value['category2'] != 0) {?>
											-> <?php echo categoryInfo($_smarty_tpl->tpl_vars['ads']->value['category2'],'kategori_adi');?>

										<?php }?>

										<?php if ($_smarty_tpl->tpl_vars['ads']->value['category3'] != 0) {?>
											-> <?php echo categoryInfo($_smarty_tpl->tpl_vars['ads']->value['category3'],'kategori_adi');?>

										<?php }?>

										<?php if ($_smarty_tpl->tpl_vars['ads']->value['category4'] != 0) {?>
											-> <?php echo categoryInfo($_smarty_tpl->tpl_vars['ads']->value['category4'],'kategori_adi');?>

										<?php }?>

										<?php if ($_smarty_tpl->tpl_vars['ads']->value['category5'] != 0) {?>
											-> <?php echo categoryInfo($_smarty_tpl->tpl_vars['ads']->value['category5'],'kategori_adi');?>

										<?php }?>

										<?php if ($_smarty_tpl->tpl_vars['ads']->value['category6'] != 0) {?>
											-> <?php echo categoryInfo($_smarty_tpl->tpl_vars['ads']->value['category6'],'kategori_adi');?>

										<?php }?>

										<?php if ($_smarty_tpl->tpl_vars['ads']->value['category7'] != 0) {?>
											-> <?php echo categoryInfo($_smarty_tpl->tpl_vars['ads']->value['category7'],'kategori_adi');?>

										<?php }?>

										<?php if ($_smarty_tpl->tpl_vars['ads']->value['category8'] != 0) {?>
											-> <?php echo categoryInfo($_smarty_tpl->tpl_vars['ads']->value['category8'],'kategori_adi');?>

										<?php }?>

										<?php if ($_smarty_tpl->tpl_vars['ads']->value['category9'] != 0) {?>
											-> <?php echo categoryInfo($_smarty_tpl->tpl_vars['ads']->value['category9'],'kategori_adi');?>

										<?php }?>

										<?php if ($_smarty_tpl->tpl_vars['ads']->value['category10'] != 0) {?>
											-> <?php echo categoryInfo($_smarty_tpl->tpl_vars['ads']->value['category10'],'kategori_adi');?>

										<?php }?>
									</span>
									<span class="price">
										<?php echo number_format($_smarty_tpl->tpl_vars['ads']->value['price'],0,".",",");?>

										<?php if ($_smarty_tpl->tpl_vars['ads']->value['price_type'] == 0) {?>
											<i class="icon icon-tl"></i>
										<?php } elseif ($_smarty_tpl->tpl_vars['ads']->value['price_type'] == 1) {?>
											<i class="icon icon-euro"></i>
										<?php } elseif ($_smarty_tpl->tpl_vars['ads']->value['price_type'] == 2) {?>
											<i class="icon icon-usd"></i>
										<?php }?>
									</span>
									<div class="list-mobile-bottom" data-id="<?php echo $_smarty_tpl->tpl_vars['ads']->value['id'];?>
">
										<div class="list-mobile-bottom-info">
											<span>
												<b>Bitiş Tarihi: </b>
												<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['ads']->value['public_end_date'],"%d");?>
 <?php echo monthName($_smarty_tpl->tpl_vars['ads']->value['public_end_date']);?>
 <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['ads']->value['public_end_date'],"%Y");?>

											</span>
											<span>
												<b>Hit:</b> 
												<?php echo $_smarty_tpl->tpl_vars['ads']->value['hit'];?>

											</span>
											<span>
												<b>Favori: </b>
												<?php if (isset($_smarty_tpl->tpl_vars['favoriteCount'])) {$_smarty_tpl->tpl_vars['favoriteCount'] = clone $_smarty_tpl->tpl_vars['favoriteCount'];
$_smarty_tpl->tpl_vars['favoriteCount']->value = $_smarty_tpl->tpl_vars['return']->value['Favorites']->adsFavorites($_smarty_tpl->tpl_vars['ads']->value['id']); $_smarty_tpl->tpl_vars['favoriteCount']->nocache = null; $_smarty_tpl->tpl_vars['favoriteCount']->scope = 0;
} else $_smarty_tpl->tpl_vars['favoriteCount'] = new Smarty_Variable($_smarty_tpl->tpl_vars['return']->value['Favorites']->adsFavorites($_smarty_tpl->tpl_vars['ads']->value['id']), null, 0);?>
												<?php if ($_smarty_tpl->tpl_vars['favoriteCount']->value !== false) {
echo count($_smarty_tpl->tpl_vars['favoriteCount']->value);
} else { ?>0<?php }?>
											</span>
										</div>
										<div class="list-mobile-dopings">
											<span><b>Dopingler:</b>
											<?php if ($_smarty_tpl->tpl_vars['ads']->value['doping_home'] == 1) {?><p style="margin-bottom: 0;">Ana Sayfa Vitrini</p><?php }?>
											<?php if ($_smarty_tpl->tpl_vars['ads']->value['doping_acil'] == 1) {?><p style="margin-bottom: 0;">Acil Vitrin</p><?php }?>
											<?php if ($_smarty_tpl->tpl_vars['ads']->value['doping_up'] == 1) {?><p style="margin-bottom: 0;">Üst Sıradayım</p><?php }?>
											<?php if ($_smarty_tpl->tpl_vars['ads']->value['doping_differently'] == 1) {?><p style="margin-bottom: 0;">Kalın Yazı Renkli Çerçeve</p><?php }
if ($_smarty_tpl->tpl_vars['ads']->value['doping_sahibinden'] == 1) {?><p style="margin-bottom: 0;">İlk Sahibinden</p><?php }
if ($_smarty_tpl->tpl_vars['ads']->value['doping_yenigibi'] == 1) {?><p style="margin-bottom: 0;">Yeni Gibi</p><?php }
if ($_smarty_tpl->tpl_vars['ads']->value['doping_ekspertizli'] == 1) {?><p style="margin-bottom: 0;">Ekspertizli</p><?php }?>
											<?php if ($_smarty_tpl->tpl_vars['ads']->value['doping_home'] == 0 && $_smarty_tpl->tpl_vars['ads']->value['doping_acil'] == 0 && $_smarty_tpl->tpl_vars['ads']->value['doping_up'] == 0 && $_smarty_tpl->tpl_vars['ads']->value['doping_differently'] == 0 && $_smarty_tpl->tpl_vars['ads']->value['doping_sahibinden'] == 0 && $_smarty_tpl->tpl_vars['ads']->value['doping_yenigibi'] == 0 && $_smarty_tpl->tpl_vars['ads']->value['doping_ekspertizli'] == 0) {?><p>Doping Yüklü Değil</p><?php }?></span>
										</div>
										<div class="list-mobile-operation">
											<?php if (getUrl(1) == 'active') {?>
												<select name="operation" class="form-control" style="padding: 5px;">
													<option value="0">Seçiniz</option>
													<option value="get-ad">İlana Git</option>
													<option value="ad-edit">İlanı Düzenle</option>
													<option value="add-doping">Doping Ver</option>
													<option value="public-end">Yayından Kaldır</option>
												</select>
											<?php } elseif (getUrl(1) == 'passive') {?>
												<select name="operation" class="form-control" style="padding: 5px;">
													<option value="0">Seçiniz</option>
													<?php if ($_smarty_tpl->tpl_vars['ads']->value['public_end_date'] > time()) {?>
														<option value="get-ad">İlana Git</option>
													<?php }?>
													<option value="ad-edit">İlanı Düzenle</option>
													<option value="public-start">Yayına Al</option>
												</select>
											<?php } elseif (getUrl(1) == 'finished') {?>
												<select name="operation" class="form-control" style="padding: 5px;">
													<option value="0">Seçiniz</option>
													<option value="update-public">İlan Tarihini Güncelle</option>
												</select>
											<?php } elseif (getUrl(1) == 'unconfirmed') {?>
												<select name="operation" class="form-control" style="padding: 5px;">
													<option value="0">Seçiniz</option>
													<option value="ad-edit">İlanı Düzenle</option>
												</select>
											<?php } elseif (getUrl(1) == 'pending') {?>
												<select name="operation" class="form-control" style="padding: 5px;">
													<option value="0">Seçiniz</option>
													<option value="get-ad">İlana Git</option>
												</select>
											<?php }?>
										</div>
									</div>
								</li>
							<?php
$_smarty_tpl->tpl_vars['ads'] = $foreach_ads_Sav;
}
?>
						</ul>
					<?php } else { ?>
						<div class="block" style="margin-bottom: 0;">
							<p class="text-danger text-center" style="margin-top: 15px;"><b>Bir sonuç bulunamadı</b></p>
						</div>
					<?php }?>
				</div>
				<?php if ($_smarty_tpl->tpl_vars['return']->value['pagination']['desktopPagination'] != '') {?>
					<div class="list-bottom-pagination hidden-sm hidden-xs">
						<ul class="pagination"><?php echo $_smarty_tpl->tpl_vars['return']->value['pagination']['desktopPagination'];?>
</ul>
						
						<?php if (isset($_smarty_tpl->tpl_vars["find"])) {$_smarty_tpl->tpl_vars["find"] = clone $_smarty_tpl->tpl_vars["find"];
$_smarty_tpl->tpl_vars["find"]->value = array('&pageSize=15','&pageSize=50','?pageSize=15','?pageSize=50'); $_smarty_tpl->tpl_vars["find"]->nocache = null; $_smarty_tpl->tpl_vars["find"]->scope = 0;
} else $_smarty_tpl->tpl_vars["find"] = new Smarty_Variable(array('&pageSize=15','&pageSize=50','?pageSize=15','?pageSize=50'), null, 0);?>
						<?php if (isset($_smarty_tpl->tpl_vars["repl"])) {$_smarty_tpl->tpl_vars["repl"] = clone $_smarty_tpl->tpl_vars["repl"];
$_smarty_tpl->tpl_vars["repl"]->value = array('','','',''); $_smarty_tpl->tpl_vars["repl"]->nocache = null; $_smarty_tpl->tpl_vars["repl"]->scope = 0;
} else $_smarty_tpl->tpl_vars["repl"] = new Smarty_Variable(array('','','',''), null, 0);?>
						<div class="pageSize">
							<span>Her sayfada</span>
							<ul class="pagination">
								<li <?php if ($_GET['pageSize'] == 15) {?>class="active"<?php }?>>
									<a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['return']->value['actualLink'],$_smarty_tpl->tpl_vars['find']->value,$_smarty_tpl->tpl_vars['repl']->value);
if ($_GET['page']) {?>&<?php } else { ?>?<?php }?>pageSize=50">15</a>
								</li>
								<li <?php if ($_GET['pageSize'] == 50) {?>class="active"<?php }?>>
									<a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['return']->value['actualLink'],$_smarty_tpl->tpl_vars['find']->value,$_smarty_tpl->tpl_vars['repl']->value);
if ($_GET['page']) {?>&<?php } else { ?>?<?php }?>pageSize=50">50</a>
								</li>
							</ul>
							<span>sonuç göster</span>
						</div>
					</div>
					<div class="mobilePagination hidden-lg hidden-md" style="margin-top: 0;"><?php echo $_smarty_tpl->tpl_vars['return']->value['pagination']['mobilePagination'];?>
</div>
				<?php }?>
			<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['updateAd'] === true && getUrl(1) == 'ad-edit') {?>
				<?php echo '<script'; ?>
 type="text/javascript">var adEdit = true;<?php echo '</script'; ?>
>
				<div class="step-content">
					<?php if (isset($_POST['ad_update'])) {?>
						<?php if ($_smarty_tpl->tpl_vars['return']->value['messageType'] == 'error') {?>
							<div class="alert alert-danger">
								<strong>Hata!</strong> <?php echo $_smarty_tpl->tpl_vars['return']->value['message'];?>

							</div>
						<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['messageType'] == 'success') {?>
							<div class="alert alert-success">
								<strong>Başarılı!</strong> <?php echo $_smarty_tpl->tpl_vars['return']->value['message'];?>

							</div>
						<?php }?>
					<?php }?>
					<form name="update-ad" action="" method="POST">
						<input type="hidden" name="ad_update" value="ad-update">
						<div class="contact-info">
							<div class="block">
								<div class="block-title">
									<h5>İletişim Bilgileri</h5>
								</div>
								<div class="block-content">
									<div class="col-md-11" style="margin-left: 35px;">
										<div class="row" style="margin-right: 0;">
											<div class="col-md-6">
												<div class="radio" style="margin-bottom: 25px;">
													<input type="radio" name="phone_status" value="1" <?php if ($_smarty_tpl->tpl_vars['return']->value['adInfo']['phone_status'] == 1) {?>checked="checked"<?php }?> class="magic-radio">
													<label>İlanda telefon numaram yayınlansın</label>
												</div>
												<div class="radio" style="margin-bottom: 25px;">
													<input type="radio" name="phone_status" <?php if ($_smarty_tpl->tpl_vars['return']->value['adInfo']['phone_status'] == 0) {?>checked="checked"<?php }?> value="0" class="magic-radio">
													<label>İlanda telefon numaram yayınlanmasın</label>
												</div>
												<div class="radio">
													<input type="checkbox" name="message_status" <?php if ($_smarty_tpl->tpl_vars['return']->value['adInfo']['message_status'] == 0) {?>checked="checked"<?php }?> value="0" class="magic-checkbox">
													<label>Diğer kullanıcılardan mesaj almak istemiyorum</label>
												</div>
											</div>
											<div class="contact-information col-md-6">
												<div class="row">
													<div class="inf">
														<div class="col-xs-6">
															<strong>Ad Soyad</strong>
														</div>
														<div class="col-xs-6"><span class="text-capitalize"><?php echo userInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['user_id'],'name');?>
</span> <span class="text-uppercase"><?php echo userInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['user_id'],'surname');?>
</span></div>
													</div>
													<div class="inf">
														<div class="col-xs-6">
															<strong>Cep Telefonu</strong>
														</div>
														<div class="col-xs-6"><?php echo userInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['user_id'],'phone');?>
</div>
													</div>
													<?php if (userInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['user_id'],'phone_work')) {?>
														<div class="inf">
															<div class="col-xs-6">
																<strong>İş Telefonu</strong>
															</div>
															<div class="col-xs-6"><?php echo userInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['user_id'],'phone_work');?>
</div>
														</div>
													<?php }?>
													<?php if (userInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['user_id'],'phone_more')) {?>
														<div class="inf">
															<div class="col-xs-6">
																<strong>Sabit Telefon</strong>
															</div>
															<div class="col-xs-6"><?php echo userInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['user_id'],'phone_more');?>
</div>
														</div>
													<?php }?>
													<div class="inf" style="padding-left: 15px;">
														<a href="javascript:void(0);" style="padding: 0;">İletişim bilgilerini değiştir</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="ad-info">
							<div class="block">
								<div class="block-title">
									<h5>İlan Detayları (Zorunlu Alan)</h5>
								</div>
								<div class="block-content">
									<div class="col-md-11" style="margin-left: 35px;">
										<div class="form-group">
											<div class="row">
												<div class="col-md-8 col-sm-7 col-xs-12">
													<label>İlan Başlığı*: </label>
													<input type="text" name="ad_name" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['title'];?>
" class="form-control">
												</div>
												<div class="col-md-4 col-sm-5 col-xs-12">
													<div class="row">
														<div class="col-xs-6">
															<div class="form-group">
																<label>İlan Fiyatı*: </label>
																<input type="number" name="ad_price" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['price'];?>
" class="form-control">
															</div>
														</div>
														<div class="col-xs-6">
															<div class="form-group">
																<label>Fiyat türü*: </label>
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
										</div>
										<div class="form-group">
											<label>İlan Açıklaması: </label>
											<textarea name="ad_text" id="default-editor" cols="30" rows="10"><?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['text'];?>
</textarea>
										</div>
										<div class="category-items"><?php echo $_smarty_tpl->tpl_vars['return']->value['categoryItems'];?>
</div>
										<div class="category-features"><?php echo $_smarty_tpl->tpl_vars['return']->value['categoryFeatures'];?>
</div>
										<div class="category-features-hidden"></div>
										
											<?php echo '<script'; ?>
 type="text/javascript">
												$(function() {

													$('.category-features input').change(function() {
														
														var value = $(this).val();

														$('.category-features-hidden input[value=' + value + ']').remove();

														if($('.category-features').find('input[value=' + value + ']').attr('checked') && !$('.category-features').find('input[value=' + value + ']').is(':checked'))
														{
															$('.category-features-hidden').append('<input type="hidden" name="deleted-features[]" value="' + value + '" />');
														}

													});

												});
											<?php echo '</script'; ?>
>
										
									</div>
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
 type="text/javascript" src="<?php echo siteUrl('public/scripts/editor/langs/tr.min.js');?>
"><?php echo '</script'; ?>
>
			                     
			                        <?php echo '<script'; ?>
 type="text/javascript">
			                            $(function() {
			                                var uploadOptions = {
			                                    serverPath: 'https://api.imgur.com/3/image',
			                                    fileFieldName: 'image',
			                                    headers: {'Authorization': 'Client-ID 9e57cb1c4791cea'},
			                                    urlPropertyName: 'data.link'
			                                };
			                                $('#default-editor').trumbowyg({
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
						</div>
						<div class="ad-location">
							<div class="block">
								<div class="block-title">
									<h5>İlan Konumu (Zorunlu Alan)</h5>
								</div>
								<div class="block-content">
									<div class="col-md-11" style="margin-left: 35px;">
										<div class="row">
											<div class="col-md-12">
												<div class="row">
													<div class="col-md-3">
														<div class="form-group">
															<label>İl*: </label>
															<select name="city" class="form-control">
																<option value="0" disabled="disabled" selected="selected">İl Seçin</option>
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
" <?php if ($_smarty_tpl->tpl_vars['return']->value['adInfo']['city'] == $_smarty_tpl->tpl_vars['city']->value['CityID']) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['city']->value['CityName'];?>
</option>
																<?php
$_smarty_tpl->tpl_vars['city'] = $foreach_city_Sav;
}
?>
															</select>
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<label>İlçe*: </label>
															<select name="county" class="form-control">
																<option value="0" disabled="disabled" selected="selected">İlçe Seçin</option>
															</select>
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<label>Semt*: </label>
															<select name="area" class="form-control">
																<option value="0" disabled="disabled" selected="selected">Semt Seçin</option>
															</select>
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<label>Mahalle*: </label>
															<select name="neighborhood" class="form-control">
																<option value="0" disabled="disabled" selected="selected">Mahalle Seçin</option>
															</select>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-12">
												<div id="map-canvas" style="width: 100%;height: 100%;"></div>
												<div class="map-message"></div>
												<input id="zoomFld" type="hidden" name="zoom" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['zoom'];?>
">
												<input id="latFld" type="hidden" name="lat" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['lat'];?>
">
												<input id="lngFld" type="hidden" name="lng" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['lng'];?>
">
												<input id="markerLatFld" type="hidden" name="markerlat" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['marker_lat'];?>
">
												<input id="markerLngFld" type="hidden" name="markerlng" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['marker_lng'];?>
">
												<input id="address" type="hidden" name="address" value="">
												<?php echo '<script'; ?>
 type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZaVsbFgc-jiF8IKiLavvLc5DTbJeHDUk&language=tr&region=TR"><?php echo '</script'; ?>
>
													
													<?php echo '<script'; ?>
 type="text/javascript">
												        var map;
												        var markersArray = [];

												        function initMap(lat = null, lng = null, zoomField = null)
												        {
												            if(lat == null && lng == null && zoomField == null)
												            {
												            	var latlng = new google.maps.LatLng(39.1988, 34.0723);
												            	var myOptions = {
													                zoom: 5,
													                maxZoom: 19,
													                center: latlng,
													                mapTypeId: google.maps.MapTypeId.ROADMAP,
													                streetViewControl: false,
													                panControl: true,
													                scrollwheel: true,
													                zoomControlOptions: {
													                    style: google.maps.ZoomControlStyle.LARGE,
													                    position: google.maps.ControlPosition.TOP_LEFT
													                },
													                mapTypeControl: true,
													                mapTypeControlOptions: {
													                    position: google.maps.ControlPosition.TOP_RIGHT,
													                    style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
													                }
													            };
												            }
												            else
												            {
												            	var latlng = new google.maps.LatLng(lat, lng);
												            	var myOptions = {
													                zoom: zoomField,
													                maxZoom: 19,
													                center: latlng,
													                mapTypeId: google.maps.MapTypeId.ROADMAP,
													                streetViewControl: false,
													                panControl: true,
													                scrollwheel: true,
													                zoomControlOptions: {
													                    style: google.maps.ZoomControlStyle.LARGE,
													                    position: google.maps.ControlPosition.TOP_LEFT
													                },
													                mapTypeControl: true,
													                mapTypeControlOptions: {
													                    position: google.maps.ControlPosition.TOP_RIGHT,
													                    style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
													                }
													            };
												            }

												            geocoder = new google.maps.Geocoder();
												            map      = new google.maps.Map(document.getElementById("map-canvas"), myOptions);

												            // add a click event handler to the map object
												            google.maps.event.addListener(map, "click", function(event)
												            {
												                // place a marker
												                placeMarker(event.latLng);

												                document.getElementById("markerLatFld").value = event.latLng.lat();
												                document.getElementById("markerLngFld").value = event.latLng.lng();
												            });

												            google.maps.event.addListener(map, 'zoom_changed', function() {
															    zoomLevel = map.getZoom();
															    document.getElementById("zoomFld").value = zoomLevel;
															});
												        }

												        var geocoder;	
												        function codeAddress() {
													    	var address = document.getElementById('address').value;
													    	geocoder.geocode( { 'address': address}, function(results, status) {
														      	if (status == 'OK') {
														        	map.setCenter(results[0].geometry.location);
														        	var geometry = results[0].geometry.location.toString();
														        	var latFld = geometry.split('(')[1].split(', ')[0];
														        	var lngFld = geometry.split(')')[0].split(', ')[1];

														        	document.getElementById("latFld").value = latFld;
												                	document.getElementById("lngFld").value = lngFld;
														      	} else {
														        	alert('Geocode was not successful for the following reason: ' + status);
														      	}
													    	});
														}

												        function placeMarker(location, lat = null, lng = null) {
												            // first remove all markers if there are any
												            deleteOverlays();

												            if(location != null)
												            {
												            	var marker = new google.maps.Marker({
													                position: location, 
													                map: map,
													                icon: "<?php echo siteUrl('public/images/mapIcon.png');?>
"
													            });
												            }
												            else
												            {
												            	var marker = new google.maps.Marker({
													                position: {lat: lat, lng: lng}, 
													                map: map,
													                icon: "<?php echo siteUrl('public/images/mapIcon.png');?>
"
													            });
												            }

												            // add marker in markers array
												            markersArray.push(marker);
												        }

												        function deleteOverlays() 
												        {
												            if (markersArray) 
												            {
												                
												                for (i in markersArray) 
												                {
												                    markersArray[i].setMap(null);
												                }
												            	markersArray.length = 0;

												            }
												        }

												        initMap(<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['lat'];?>
, <?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['lng'];?>
, <?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['zoom'];?>
);
												        placeMarker(null, <?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['marker_lat'];?>
, <?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['marker_lng'];?>
);

												        $(function() {

												        	var city         = <?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['city'];?>
;
												        	var county       = <?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['county'];?>
;
												        	var area         = <?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['area'];?>
;
												        	var neighborhood = <?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['neighborhood'];?>
;

												        	if(city != 0)
												        	{
												        		$.ajax({
																	type: 'POST',
																	url: siteUrl + '/request',
																	dataType: 'json',
																	data: {'mode': 'getCounties', 'cityId': city},
																	success: function(response)
																	{

																		var options = '<option value="0" disabled="disabled" selected="selected">İlçe Seçin</option>';

																		$.each(response, function(i, value) {
																			
																			if(county == value.CountyID)
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

																		$('select[name=county]').html(options);
																		
																	}
																});
												        	}

												        	if(county != 0)
												        	{
												        		$.ajax({
																	type: 'POST',
																	url: siteUrl + '/request',
																	dataType: 'json',
																	data: {'mode': 'getArea', 'countyId': county},
																	success: function(response)
																	{

																		var options = '<option value="0" disabled="disabled" selected="selected">Semt Seçin</option>';

																		$.each(response, function(i, value) {
																			
																			if(value.AreaID == area)
																			{
																				options += '\
																					<option value="' + value.AreaID + '" selected="selected">' + value.AreaName + '</option>\
																				';
																			}
																			else
																			{
																				options += '\
																					<option value="' + value.AreaID + '">' + value.AreaName + '</option>\
																				';
																			}

																		});

																		$('select[name=area]').html(options);
																		
																	}
																});
												        	}

												        	if(area != 0)
												        	{
												        		$.ajax({
																	type: 'POST',
																	url: siteUrl + '/request',
																	dataType: 'json',
																	data: {'mode': 'getNeighborhood', 'areaId': area},
																	success: function(response)
																	{

																		var options = '<option value="0" disabled="disabled" selected="selected">Mahalle Seçin</option>';

																		$.each(response, function(i, value) {
																			
																			if(neighborhood == value.NeighborhoodID)
																			{
																				options += '\
																					<option value="' + value.NeighborhoodID + '" selected="selected">' + value.NeighborhoodName + '</option>\
																				';
																			}
																			else
																			{
																				options += '\
																					<option value="' + value.NeighborhoodID + '">' + value.NeighborhoodName + '</option>\
																				';
																			}

																		});

																		$('select[name=neighborhood]').html(options);
																		
																	}
																});
												        	}

												        	$('select[name=city]').change(function() {

																var cityId = $(this).val();

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

																		$('select[name=county]').html(options);
																		
																	}
																});
															});

															$('select[name=county]').change(function() {

																var countyId = $(this).val();

																$.ajax({
																	type: 'POST',
																	url: siteUrl + '/request',
																	dataType: 'json',
																	data: {'mode': 'getArea', 'countyId': countyId},
																	success: function(response)
																	{

																		var options = '<option value="0" disabled="disabled" selected="selected">Semt Seçin</option>';

																		$.each(response, function(i, value) {
																			
																			options += '\
																				<option value="' + value.AreaID + '">' + value.AreaName + '</option>\
																			';

																		});

																		$('select[name=area]').html(options);
																		
																	}
																});
															});

															$('select[name=area]').change(function() {

																var areaId = $(this).val();

																$.ajax({
																	type: 'POST',
																	url: siteUrl + '/request',
																	dataType: 'json',
																	data: {'mode': 'getNeighborhood', 'areaId': areaId},
																	success: function(response)
																	{

																		var options = '<option value="0" disabled="disabled" selected="selected">Mahalle Seçin</option>';

																		$.each(response, function(i, value) {
																			options += '\
																				<option value="' + value.NeighborhoodID + '">' + value.NeighborhoodName + '</option>\
																			';
																		});

																		$('select[name=neighborhood]').html(options);
																		
																	}
																});
															});

												        	var value = '';
												        	$('.ad-location select').change(function() {
												        		
												        		var name = $(this).attr('name');

												        		if(name == 'city')
												        		{
												        			$('#map-canvas').hide();

																	document.getElementById("zoomFld").value = 10;

																	$('input[name=address]').val($('.ad-location select:first option:selected').text());

																	$('.ad-location select:eq(1), .ad-location select:eq(2), .ad-location select:eq(3)').val(0);
																	$('#markerLatFld, #markerLngFld, #latFld, #lngFld, #zoomFld').val('');
												        		}
												        		else if(name == 'county')
												        		{
												        			$('#map-canvas').hide();

																	document.getElementById("zoomFld").value = 12;

																	$('input[name=address]').val($('.ad-location select:first option:selected').text() + ', ' + $('.ad-location select:eq(1) option:selected').text());

																	$('.ad-location select:eq(2), .ad-location select:eq(3)').val(0);
																	$('#markerLatFld, #markerLngFld, #latFld, #lngFld, #zoomFld').val('');
												        		}
												        		else if(name == 'area')
												        		{
												        			$('#map-canvas').hide();

																	document.getElementById("zoomFld").value = 15;

																	$('input[name=address]').val($('.ad-location select:eq(2) option:selected').text() + ', ' + $('.ad-location select:eq(1) option:selected').text() + ', ' + $('.ad-location select:first option:selected').text());

																	$('.ad-location select:eq(3)').val(0);
																	$('#markerLatFld, #markerLngFld, #latFld, #lngFld, #zoomFld').val('');
												        		}
												        		else if(name == 'neighborhood')
												        		{
																	document.getElementById("zoomFld").value = 15;

																	$('input[name=address]').val($('.ad-location select:eq(3) option:selected').text().replace('MAH.', 'mahallesi') + ', ' + $('.ad-location select:eq(2) option:selected').text() + ', ' + $('.ad-location select:eq(1) option:selected').text() + ', ' + $('.ad-location select:first option:selected').text());

																	$('#map-canvas').show();
																	initMap();
																	codeAddress();

																	map.setZoom(15);
												        		}

												        	});
												        });
												    <?php echo '</script'; ?>
>
												
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="input-hidden-images">
							<input type="hidden" name="ad-title-image" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['title_image'];?>
">

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
								<input id="uploaded-image" type="hidden" name="ad-images[]" value="<?php echo $_smarty_tpl->tpl_vars['image']->value['image'];?>
" data-image="<?php echo $_smarty_tpl->tpl_vars['image']->value['image'];?>
">
							<?php
$_smarty_tpl->tpl_vars['image'] = $foreach_image_Sav;
}
?>
						</div>
					</form>
					<div class="ad-images">
						<div class="block">
							<div class="block-title">
								<h5>İlan Resimleri (Zorunlu Alan)</h5>
							</div>
							<div class="block-content">
								<div class="col-md-11" style="margin-left: 35px;">
									<div class="progress">
									  	<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
									</div>
									
									<div class="row">
										<div class="uploaded-images">
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
												<div class="col-md-2 col-sm-3 col-xs-6" data-image="<?php echo $_smarty_tpl->tpl_vars['image']->value['image'];?>
">
													<div class="image">
														<img src="<?php echo siteUrl('files/ads/thumb');?>
/<?php echo $_smarty_tpl->tpl_vars['image']->value['image'];?>
.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['title'];?>
 - <?php echo $_smarty_tpl->tpl_vars['image']->value['image'];?>
" style="width: 100%;height: 100%;" />
														<div class="image-bottom">
															<div class="col-xs-6 title-image <?php if ($_smarty_tpl->tpl_vars['image']->value['image'] == $_smarty_tpl->tpl_vars['return']->value['adInfo']['title_image']) {?>active<?php }?>">Vitrin</div>
															<div class="col-xs-6 delete-image">
																<i class="material-icons">close</i>
															</div>
														</div>
													</div>
												</div>
											<?php
$_smarty_tpl->tpl_vars['image'] = $foreach_image_Sav;
}
?>
										</div>
										
										<div class="col-md-2 col-sm-3 col-xs-6">
								    		<div class="upload-button">
									    		<input type="file" name="upload-images[]" multiple="multiple" accept="image/*" id="upload-input">
									    		<i class="material-icons">file_upload</i>
									    		<span style="display: block;text-align: center;margin-top: -22px;margin-bottom: 5px;font-weight: 500;font-size: 13px;color: #777;">Fotograf Yükle</span>
								    		</div>
								    	</div>
									</div>
									<div class="upload-message"></div>
								</div>
								<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo siteUrl('public/scripts/image-compressor.js');?>
"><?php echo '</script'; ?>
>
							</div>
						</div>
					</div>
				</div>
				<button type="button" class="btn btn-primary pull-right" onclick="$('form[name=update-ad]').submit();" style="padding: 10px 50px;">Kaydet</button>
			<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['updateAd'] === true && getUrl(1) == 'add-doping') {?>
				<?php if (issetPost('dopings') && issetPost('dopingsPrice')) {?>
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
					<div class="ad-doping-step" style="display: block;">
						<form name="ad-update" action="" method="POST">
							<input type="hidden" name="dopings" value="">
							<input type="hidden" name="dopingsPrice" value="">
						</form>
						<div class="doping-step-1">
							<div class="block">
								<div class="block-title">
									<h5>Daha Fazla Kullanıcıya Ulaşması İçin Doping Yükleyin</h5>
								</div>
								<div class="block-content">
									<?php if ($_smarty_tpl->tpl_vars['return']->value['siteConfig']['iyzicoPayment'] === false) {?>
										<div class="alert alert-danger" style="margin-right: 15px;margin-left: 15px;">1 Ocak 2018 tarihine kadar ücretsizdir</div>
									<?php }?>
									<div class="doping-lists">
										<?php
$_from = $_smarty_tpl->tpl_vars['return']->value['dopingList'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['doping'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['doping']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['doping']->value) {
$_smarty_tpl->tpl_vars['doping']->_loop = true;
$foreach_doping_Sav = $_smarty_tpl->tpl_vars['doping'];
?>
											<div class="col-md-6">
												<?php if ($_smarty_tpl->tpl_vars['return']->value['limitType'] == 'individual_ad_limit') {?>
													<?php if (isset($_smarty_tpl->tpl_vars['doping_user_price'])) {$_smarty_tpl->tpl_vars['doping_user_price'] = clone $_smarty_tpl->tpl_vars['doping_user_price'];
$_smarty_tpl->tpl_vars['doping_user_price']->value = $_smarty_tpl->tpl_vars['doping']->value['doping_individual_price']; $_smarty_tpl->tpl_vars['doping_user_price']->nocache = null; $_smarty_tpl->tpl_vars['doping_user_price']->scope = 0;
} else $_smarty_tpl->tpl_vars['doping_user_price'] = new Smarty_Variable($_smarty_tpl->tpl_vars['doping']->value['doping_individual_price'], null, 0);?>
												<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['limitType'] == 'corporate_ad_limit') {?>
													<?php if (isset($_smarty_tpl->tpl_vars['doping_user_price'])) {$_smarty_tpl->tpl_vars['doping_user_price'] = clone $_smarty_tpl->tpl_vars['doping_user_price'];
$_smarty_tpl->tpl_vars['doping_user_price']->value = $_smarty_tpl->tpl_vars['doping']->value['doping_corporate_price']; $_smarty_tpl->tpl_vars['doping_user_price']->nocache = null; $_smarty_tpl->tpl_vars['doping_user_price']->scope = 0;
} else $_smarty_tpl->tpl_vars['doping_user_price'] = new Smarty_Variable($_smarty_tpl->tpl_vars['doping']->value['doping_corporate_price'], null, 0);?>
												<?php }?>

												<div class="doping" data-doping="<?php echo $_smarty_tpl->tpl_vars['doping']->value['id'];?>
" data-price="<?php echo $_smarty_tpl->tpl_vars['doping_user_price']->value;?>
" data-time="<?php echo $_smarty_tpl->tpl_vars['doping']->value['doping_time'];?>
" data-name="<?php echo $_smarty_tpl->tpl_vars['doping']->value['doping_name'];?>
" onclick="selectDoping(<?php echo $_smarty_tpl->tpl_vars['doping']->value['id'];?>
);">
													<div class="doping-header">
														<div class="col-md-3 col-xs-12">
															<div class="doping-icon">
																<?php if ($_smarty_tpl->tpl_vars['doping']->value['id'] == 1) {?>
																	<i class="material-icons">store</i>
																<?php } elseif ($_smarty_tpl->tpl_vars['doping']->value['id'] == 2) {?>
																	<i class="material-icons">alarm</i>
																<?php } elseif ($_smarty_tpl->tpl_vars['doping']->value['id'] == 3) {?>
																	<i class="material-icons">trending_up</i>
																<?php } elseif ($_smarty_tpl->tpl_vars['doping']->value['id'] == 4) {?>
																	<i class="material-icons">view_day</i>
																<?php }?>
															</div>
														</div>
														<div class="col-md-9 col-xs-12">
															<h4 class="doping-name"><?php echo $_smarty_tpl->tpl_vars['doping']->value['doping_name'];?>
</h4>
															<a class="preview-doping" href="#">Nasıl Görünür?</a>
															<div class="doping-bottom">
																<p><?php echo $_smarty_tpl->tpl_vars['doping']->value['doping_text'];?>
</p>
																<div class="doping-price">
																	<label><?php echo $_smarty_tpl->tpl_vars['doping']->value['doping_time'];?>
 Gün</label>
																	<span>
																		<?php if ($_smarty_tpl->tpl_vars['doping_user_price']->value > 0) {?>
																			<?php echo $_smarty_tpl->tpl_vars['doping_user_price']->value;?>
 TL
																		<?php } else { ?>
																			Ücretsiz
																		<?php }?>
																	</span>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										<?php
$_smarty_tpl->tpl_vars['doping'] = $foreach_doping_Sav;
}
?>
										<div class="col-md-6">
											<div class="doping" data-doping="-1" data-price="0" data-time="30" data-name="İlk Sahibinden" onclick="selectDoping(-1);">
												<div class="doping-header">
													<div class="col-md-3 col-xs-12">
														<div class="doping-icon">
															<i class="material-icons">directions_car</i>
														</div>
													</div>
													<div class="col-md-9 col-xs-12">
														<h4 class="doping-name">İlk Sahibinden</h4>
														<a class="preview-doping" href="#">Nasıl Görünür?</a>
														<div class="doping-bottom">
															<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vel pharetra nunc, vulputate luctus risus. Nullam non justo at risus vehicula feugiat in ut purus.</p>
															<div class="doping-price">
																<label>30 Gün</label>
																<span>Ücretsiz</span>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="doping" data-doping="-2" data-price="0" data-time="30" data-name="Yeni Gibi" onclick="selectDoping(-2);">
												<div class="doping-header">
													<div class="col-md-3 col-xs-12">
														<div class="doping-icon">
															<i class="material-icons">fiber_new</i>
														</div>
													</div>
													<div class="col-md-9 col-xs-12">
														<h4 class="doping-name">Yeni Gibi</h4>
														<a class="preview-doping" href="#">Nasıl Görünür?</a>
														<div class="doping-bottom">
															<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vel pharetra nunc, vulputate luctus risus. Nullam non justo at risus vehicula feugiat in ut purus.</p>
															<div class="doping-price">
																<label>30 Gün</label>
																<span>Ücretsiz</span>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="doping" data-doping="-3" data-price="0" data-time="30" data-name="Ekspertizli" onclick="selectDoping(-3);">
												<div class="doping-header">
													<div class="col-md-3 col-xs-12">
														<div class="doping-icon">
															<i class="material-icons">check_circle</i>
														</div>
													</div>
													<div class="col-md-9 col-xs-12">
														<h4 class="doping-name">Ekspertizli</h4>
														<a class="preview-doping" href="#">Nasıl Görünür?</a>
														<div class="doping-bottom">
															<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vel pharetra nunc, vulputate luctus risus. Nullam non justo at risus vehicula feugiat in ut purus.</p>
															<div class="doping-price">
																<label>30 Gün</label>
																<span>Ücretsiz</span>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<button type="button" name="complete" onclick="$('form[name=ad-add], form[name=ad-update]').submit();" class="btn btn-primary pull-right" style="padding: 10px 50px;">Devam Et</button>
						</div>
						<?php if ($_smarty_tpl->tpl_vars['return']->value['siteConfig']['iyzicoPayment'] === true) {?>
							<div class="doping-step-2">
								<div class="doping-step-2-header">
									<div class="block">
										<div class="block-title">
											<h5>Sepetiniz</h5>
										</div>
										<div class="block-content">
											<table class="table" style="border: 1px solid #ddd;">
												<thead>
													<tr>
														<th>Açıklama</th>
														<th>Süre</th>
														<th>Fiyat</th>
													</tr>
												</thead>
												<tbody></tbody>
											</table>
											<div class="total-doping-price">Genel Toplam: <span>0</span> TL</div>
										</div>
									</div>
								</div>
								<div class="doping-step-2-bottom">
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
														<form name="doping-card">
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
																    		<button type="button" class="btn btn-primary" onclick="dopingPayment();" style="line-height: 30px;width: 100%;">Ödeme Yap</button>
																    	</div>
															    	</div>
															    </div>
														    </div>
														</form>
														<?php echo '<script'; ?>
 type="text/javascript">
															$('form[name=doping-card]').card({
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
							</div>
						<?php }?>
					</div>
				</div>
			<?php }?>	
		</div>
	</div>
</div><?php }
}
?>