<?php /* Smarty version 3.1.27, created on 2018-01-19 10:56:14
         compiled from "C:\xampp\htdocs\galericilerden\app\view\my-store.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:46215a61c0bebac558_07578676%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9340fc2e56fc6b73e6ba392aac5f22a19026d411' => 
    array (
      0 => 'C:\\xampp\\htdocs\\galericilerden\\app\\view\\my-store.tpl',
      1 => 1516302250,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '46215a61c0bebac558_07578676',
  'variables' => 
  array (
    'return' => 0,
    'onayYillik' => 0,
    'onayLimit' => 0,
    'activity_area' => 0,
    'business_type' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5a61c0bed278e6_17257332',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5a61c0bed278e6_17257332')) {
function content_5a61c0bed278e6_17257332 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_capitalize')) require_once 'C:\\xampp\\htdocs\\galericilerden\\system\\plugin\\smarty\\plugins\\modifier.capitalize.php';
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\xampp\\htdocs\\galericilerden\\system\\plugin\\smarty\\plugins\\modifier.date_format.php';

$_smarty_tpl->properties['nocache_hash'] = '46215a61c0bebac558_07578676';
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
					<li>
						<a href="<?php echo siteUrl('my-info');?>
">
							<i class="material-icons">person</i> Üyeliğim
						</a>
					</li>
					<?php if (userInfo($_SESSION['userId'],'user_status') == 2) {?>
						<li class="active">
							<a href="<?php echo siteUrl('my-store');?>
">
								<i class="material-icons">store</i> Mağazam
							</a>
						</li>
					<?php }?>
				</ul>
			</div>
	
			<h4 class="hidden-lg hidden-md" style="margin-bottom: 25px;">Mağazam</h4>
			<?php if ($_smarty_tpl->tpl_vars['return']->value['userStore'] === false) {?>
				<div class="default-block">
		        	<div class="block">
			        	<div class="block-title">
			        		<h5>Mağazanız bulunmuyor</h5>
			        	</div>
		        		<div class="block-content">
			        		<div class="text-center">
								<i class="material-icons" style="margin-bottom: 25px;font-size: 100px;color: #ff263a;">close</i>
								<p style="font-weight: 500;">Üzgünüz mağazanız yok.</p>
								<a href="<?php echo siteUrl('create-store');?>
">
									<button type="button" class="btn btn-primary" style="margin-top: 25px;">Şimdi mağaza açın</button>
								</a>
							</div>
						</div>
					</div>
				</div>
			<?php } else { ?>
				<?php if (!getUrl(1)) {?>
					<div class="block my-store desktop hidden-sm hidden-xs">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th></th>
										<th>Mağaza İsmi</th>
										<th>Oluşturulma Tarihi</th>
										<th>Bitiş Tarihi</th>
										<th>Kalan İlan Adedi</th>
										<th>Durum</th>
										<th>İşlemler</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td width="130">
											<img src="<?php echo siteUrl('files/store/thumb');?>
/<?php echo $_smarty_tpl->tpl_vars['return']->value['userStore']['store_logo'];?>
.jpg" width="130" alt="<?php echo $_smarty_tpl->tpl_vars['return']->value['userStore']['store_name'];?>
">
										</td>
										<td><?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['return']->value['userStore']['store_name']);?>
</td>
										<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['return']->value['userStore']['create_time'],"%d.%m.%Y");?>
</td>
										<td><?php if ($_smarty_tpl->tpl_vars['return']->value['userStore']['end_time'] != 0) {
echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['return']->value['userStore']['end_time'],"%d.%m.%Y");
} else { ?>-<?php }?></td>
										<td>
											<?php if ($_smarty_tpl->tpl_vars['return']->value['Store']->storeInfo($_smarty_tpl->tpl_vars['return']->value['userStore']['store_type'],'ad_limit') > 0) {?>
												<?php echo $_smarty_tpl->tpl_vars['return']->value['Store']->storeInfo($_smarty_tpl->tpl_vars['return']->value['userStore']['store_type'],'ad_limit')-$_smarty_tpl->tpl_vars['return']->value['Ads']->checkLimit($_smarty_tpl->tpl_vars['return']->value['userStore']['user_id']);?>

											<?php } else { ?>
												Limitsiz
											<?php }?>
										</td>
										<td>
											<?php if ($_smarty_tpl->tpl_vars['return']->value['userStore']['end_time'] != 0) {?>
												<?php if ($_smarty_tpl->tpl_vars['return']->value['userStore']['status'] == 1) {?>
													
													<?php if (isset($_smarty_tpl->tpl_vars['onayYillik'])) {$_smarty_tpl->tpl_vars['onayYillik'] = clone $_smarty_tpl->tpl_vars['onayYillik'];
$_smarty_tpl->tpl_vars['onayYillik']->value = false; $_smarty_tpl->tpl_vars['onayYillik']->nocache = null; $_smarty_tpl->tpl_vars['onayYillik']->scope = 0;
} else $_smarty_tpl->tpl_vars['onayYillik'] = new Smarty_Variable(false, null, 0);?>
													<?php if (isset($_smarty_tpl->tpl_vars['onayLimit'])) {$_smarty_tpl->tpl_vars['onayLimit'] = clone $_smarty_tpl->tpl_vars['onayLimit'];
$_smarty_tpl->tpl_vars['onayLimit']->value = false; $_smarty_tpl->tpl_vars['onayLimit']->nocache = null; $_smarty_tpl->tpl_vars['onayLimit']->scope = 0;
} else $_smarty_tpl->tpl_vars['onayLimit'] = new Smarty_Variable(false, null, 0);?>

													<?php if ($_smarty_tpl->tpl_vars['return']->value['Store']->storeInfo($_smarty_tpl->tpl_vars['return']->value['userStore']['store_type'],'ad_limit') > 0) {?>
														<?php if ($_smarty_tpl->tpl_vars['return']->value['Ads']->checkLimit($_smarty_tpl->tpl_vars['return']->value['userStore']['user_id']) >= $_smarty_tpl->tpl_vars['return']->value['Store']->storeInfo($_smarty_tpl->tpl_vars['return']->value['userStore']['store_type'],'ad_limit')) {?>
															Mağaza Yıllık Limiti Bitmiş
														<?php } else { ?>
															<?php if (isset($_smarty_tpl->tpl_vars['onayYillik'])) {$_smarty_tpl->tpl_vars['onayYillik'] = clone $_smarty_tpl->tpl_vars['onayYillik'];
$_smarty_tpl->tpl_vars['onayYillik']->value = true; $_smarty_tpl->tpl_vars['onayYillik']->nocache = null; $_smarty_tpl->tpl_vars['onayYillik']->scope = 0;
} else $_smarty_tpl->tpl_vars['onayYillik'] = new Smarty_Variable(true, null, 0);?>
														<?php }?>
													<?php } else { ?>
														<?php if (isset($_smarty_tpl->tpl_vars['onayYillik'])) {$_smarty_tpl->tpl_vars['onayYillik'] = clone $_smarty_tpl->tpl_vars['onayYillik'];
$_smarty_tpl->tpl_vars['onayYillik']->value = true; $_smarty_tpl->tpl_vars['onayYillik']->nocache = null; $_smarty_tpl->tpl_vars['onayYillik']->scope = 0;
} else $_smarty_tpl->tpl_vars['onayYillik'] = new Smarty_Variable(true, null, 0);?>
													<?php }?>

													<?php if (time() > $_smarty_tpl->tpl_vars['return']->value['userStore']['end_time']) {?>
														Mağaza Yıllık Süresi Bitmiş
													<?php } else { ?>
														<?php if (isset($_smarty_tpl->tpl_vars['onayLimit'])) {$_smarty_tpl->tpl_vars['onayLimit'] = clone $_smarty_tpl->tpl_vars['onayLimit'];
$_smarty_tpl->tpl_vars['onayLimit']->value = true; $_smarty_tpl->tpl_vars['onayLimit']->nocache = null; $_smarty_tpl->tpl_vars['onayLimit']->scope = 0;
} else $_smarty_tpl->tpl_vars['onayLimit'] = new Smarty_Variable(true, null, 0);?>
													<?php }?>

													<?php if ($_smarty_tpl->tpl_vars['onayYillik']->value === true && $_smarty_tpl->tpl_vars['onayLimit']->value === true) {?>
														Onaylandı
													<?php }?>

												<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['userStore']['status'] == 0) {?>
													Admin Kontrolünde
												<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['userStore']['status'] == 2) {?>
													Onaylanmadı
												<?php }?>
											<?php } else { ?>
												<!-- Yeni mağaza açma -->

												<?php if ($_smarty_tpl->tpl_vars['return']->value['userStore']['status'] == 0) {?>
													Admin Kontrolünde
												<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['userStore']['status'] == 1) {?>
													Onaylandı
												<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['userStore']['status'] == 2) {?>
													Onaylanmadı
												<?php }?>
											<?php }?>
										</td>
										<td width="25%">
											<?php if ($_smarty_tpl->tpl_vars['return']->value['userStore']['end_time'] != 0 && time() > $_smarty_tpl->tpl_vars['return']->value['userStore']['end_time']) {?>
												<?php if ($_smarty_tpl->tpl_vars['return']->value['userStore']['status'] == 1) {?>
													<a href="<?php echo siteUrl('update-store-year');?>
">
														<button type="button" class="btn btn-primary" style="font-size: 13px;">Mağazayı Güncelle</button>
													</a>
												<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['userStore']['status'] == 2) {?>
													<a href="<?php echo siteUrl('my-store/edit-store');?>
">
														<button type="button" class="btn btn-primary" style="font-size: 13px;">Mağazamı Düzenle</button>
													</a>
												<?php } else { ?>
													-
												<?php }?>
											<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['userStore']['end_time'] != 0 && $_smarty_tpl->tpl_vars['return']->value['Store']->storeInfo($_smarty_tpl->tpl_vars['return']->value['userStore']['store_type'],'ad_limit') != 0 && $_smarty_tpl->tpl_vars['return']->value['Ads']->checkLimit($_smarty_tpl->tpl_vars['return']->value['userStore']['user_id']) >= $_smarty_tpl->tpl_vars['return']->value['Store']->storeInfo($_smarty_tpl->tpl_vars['return']->value['userStore']['store_type'],'ad_limit')) {?>
												<?php if ($_smarty_tpl->tpl_vars['return']->value['userStore']['status'] == 1) {?>
													<a href="<?php echo siteUrl('update-store-limit');?>
">
														<button type="button" class="btn btn-primary" style="font-size: 13px;">Mağazayı Güncelle</button>
													</a>
												<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['userStore']['status'] == 2) {?>
													<a href="<?php echo siteUrl('my-store/edit-store');?>
">
														<button type="button" class="btn btn-primary" style="font-size: 13px;">Mağazamı Düzenle</button>
													</a>
												<?php } else { ?>
													-
												<?php }?>
											<?php } else { ?>
												<!-- Yeni mağaza aç -->
												<?php if ($_smarty_tpl->tpl_vars['return']->value['userStore']['status'] == 2) {?>
													<a href="<?php echo siteUrl('my-store/edit-store');?>
">
														<button type="button" class="btn btn-primary" style="font-size: 13px;">Mağazamı Düzenle</button>
													</a>
												<?php } else { ?>
													<?php if ($_smarty_tpl->tpl_vars['return']->value['userStore']['status'] != 0) {?>
														<a href="http://<?php echo $_smarty_tpl->tpl_vars['return']->value['userStore']['store_domain'];
echo $_smarty_tpl->tpl_vars['return']->value['siteConfig']['siteStoreDomain'];?>
" target="_blank">
															<button type="button" class="btn btn-primary" style="font-size: 13px;">Mağazama Git</button>
														</a>
														<a href="<?php echo siteUrl('my-store/edit-store');?>
">
															<button type="button" class="btn btn-primary" style="font-size: 13px;">Mağazamı Düzenle</button>
														</a>
													<?php } else { ?>
														-
													<?php }?>
												<?php }?>
											<?php }?>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="block my-store list-mobile hidden-lg hidden-md">
						<ul>
							<li>
								<img src="<?php echo siteUrl('files/store/thumb');?>
/<?php echo $_smarty_tpl->tpl_vars['return']->value['userStore']['store_logo'];?>
.jpg" width="130" alt="<?php echo $_smarty_tpl->tpl_vars['return']->value['userStore']['store_name'];?>
">
								<div class="title">
									<?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['return']->value['userStore']['store_name']);?>

								</div>
								<div class="list-mobile-bottom">
									<div class="list-mobile-bottom-info">
										<span>
											<b>Oluşturulma Tarihi: </b>
											<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['return']->value['userStore']['create_time'],"%d.%m.%Y");?>

										</span>
										<span>
											<b>Bitiş Tarihi: </b>
											<?php if ($_smarty_tpl->tpl_vars['return']->value['userStore']['end_time'] != 0) {
echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['return']->value['userStore']['end_time'],"%d.%m.%Y");
} else { ?>-<?php }?>
										</span>
										<span>
											<b>Kalan İlan Adedi: </b>
											<?php if ($_smarty_tpl->tpl_vars['return']->value['Store']->storeInfo($_smarty_tpl->tpl_vars['return']->value['userStore']['store_type'],'ad_limit') > 0) {?>
												<?php echo $_smarty_tpl->tpl_vars['return']->value['Store']->storeInfo($_smarty_tpl->tpl_vars['return']->value['userStore']['store_type'],'ad_limit')-$_smarty_tpl->tpl_vars['return']->value['Ads']->checkLimit($_smarty_tpl->tpl_vars['return']->value['userStore']['user_id']);?>

											<?php } else { ?>
												Limitsiz
											<?php }?>
										</span>
										<span>
											<b>Durum: </b>
											<?php if ($_smarty_tpl->tpl_vars['return']->value['userStore']['end_time'] != 0 && time() > $_smarty_tpl->tpl_vars['return']->value['userStore']['end_time']) {?>
												Mağaza Yıllık Süresi Bitmiş
											<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['userStore']['end_time'] != 0 && $_smarty_tpl->tpl_vars['return']->value['Ads']->checkLimit($_smarty_tpl->tpl_vars['return']->value['userStore']['user_id']) >= $_smarty_tpl->tpl_vars['return']->value['Store']->storeInfo($_smarty_tpl->tpl_vars['return']->value['userStore']['store_type'],'ad_limit')) {?>
												Mağaza Yıllık Limiti Bitmiş
											<?php } else { ?>
												<?php if ($_smarty_tpl->tpl_vars['return']->value['userStore']['status'] == 0) {?>
													Admin Kontrolünde
												<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['userStore']['status'] == 1) {?>
													Onaylandı
												<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['userStore']['status'] == 2) {?>
													Onaylanmadı
												<?php }?>
											<?php }?>
										</span>
										<span style="display: block;margin-top: 10px;padding: 0;">
											<?php if ($_smarty_tpl->tpl_vars['return']->value['userStore']['end_time'] != 0 && time() > $_smarty_tpl->tpl_vars['return']->value['userStore']['end_time']) {?>
												<?php if ($_smarty_tpl->tpl_vars['return']->value['userStore']['status'] == 1) {?>
													<a href="<?php echo siteUrl('update-store-year');?>
">
														<button type="button" class="btn btn-primary" style="width: 100%;font-size: 13px;margin-bottom: 10px;">Mağazayı Güncelle</button>
													</a>
												<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['userStore']['status'] == 2) {?>
													<a href="<?php echo siteUrl('my-store/edit-store');?>
">
														<button type="button" class="btn btn-primary" style="width: 100%;font-size: 13px;">Mağazamı Düzenle</button>
													</a>
												<?php } else { ?>
													-
												<?php }?>
											<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['userStore']['end_time'] != 0 && $_smarty_tpl->tpl_vars['return']->value['Store']->storeInfo($_smarty_tpl->tpl_vars['return']->value['userStore']['store_type'],'ad_limit') != 0 && $_smarty_tpl->tpl_vars['return']->value['Ads']->checkLimit($_smarty_tpl->tpl_vars['return']->value['userStore']['user_id']) >= $_smarty_tpl->tpl_vars['return']->value['Store']->storeInfo($_smarty_tpl->tpl_vars['return']->value['userStore']['store_type'],'ad_limit')) {?>
												<?php if ($_smarty_tpl->tpl_vars['return']->value['userStore']['status'] == 1) {?>
													<a href="<?php echo siteUrl('update-store-limit');?>
">
														<button type="button" class="btn btn-primary" style="width: 100%;font-size: 13px;margin-bottom: 10px;">Mağazayı Güncelle</button>
													</a>
												<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['userStore']['status'] == 2) {?>
													<a href="<?php echo siteUrl('my-store/edit-store');?>
">
														<button type="button" class="btn btn-primary" style="width: 100%;font-size: 13px;">Mağazamı Düzenle</button>
													</a>
												<?php } else { ?>
													-
												<?php }?>
											<?php } else { ?>
												<!-- Yeni mağaza aç -->
												<?php if ($_smarty_tpl->tpl_vars['return']->value['userStore']['status'] == 2) {?>
													<a href="<?php echo siteUrl('my-store/edit-store');?>
">
														<button type="button" class="btn btn-primary" style="width: 100%;font-size: 13px;">Mağazamı Düzenle</button>
													</a>
												<?php } else { ?>
													<?php if ($_smarty_tpl->tpl_vars['return']->value['userStore']['status'] != 0) {?>
														<a href="http://<?php echo $_smarty_tpl->tpl_vars['return']->value['userStore']['store_domain'];
echo $_smarty_tpl->tpl_vars['return']->value['siteConfig']['siteStoreDomain'];?>
" target="_blank">
															<button type="button" class="btn btn-primary" style="width: 100%;font-size: 13px;margin-bottom: 10px;">Mağazama Git</button>
														</a>
														<a href="<?php echo siteUrl('my-store/edit-store');?>
">
															<button type="button" class="btn btn-primary" style="width: 100%;font-size: 13px;">Mağazamı Düzenle</button>
														</a>
													<?php } else { ?>
														-
													<?php }?>
												<?php }?>
											<?php }?>
										</span>
									</div>
								</div>
							</li>
						</ul>
					</div>
				<?php } else { ?>
					<?php if (getUrl(1) == 'edit-store') {?>
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
							<div class="add-store-info">
								<div class="block">
									<div class="block-title">
										<h5>Mağaza Bilgileri</h5>
									</div>
									<div class="block-content">
										<form name="edit-store" action="" method="POST">
											<div class="hidden-inputs">
												<input type="hidden" name="store-image" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['userStore']['store_logo'];?>
">
												<input type="hidden" name="store-theme" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['userStore']['store_theme'];?>
">
												<input type="hidden" name="firm_name" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['userStore']['store_name'];?>
">
												<input type="hidden" name="sales_name" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['userStore']['sales_name'];?>
">
												<input type="hidden" name="sales_surname" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['userStore']['sales_surname'];?>
">
												<input type="hidden" name="sales_phone" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['userStore']['sales_phone'];?>
">
												<input type="hidden" name="completed" value="completed">
											</div>
											<div class="col-md-11" style="margin-left: 35px;">
												<div class="form-group">
													<div class="row">
														<div class="col-md-6 col-sm-6 col-xs-12">
															<label>Mağaza Adı:</label>
															<input type="text" name="store_name" class="form-control" placeholder="Mağaza Adı" onkeypress="return restrictCharacters(this, event, alphaOnly);" onpaste="return false;" autocomplete="off" onkeyup="showDomainName(); checkDomain();" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['userStore']['store_domain'];?>
">
														</div>
														<div class="col-md-6 col-sm-6 col-xs-12">
															<label>Mağaza Domain:</label>
															<input type="text" disabled="disabled" name="domainname" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['userStore']['store_domain'];
echo $_smarty_tpl->tpl_vars['return']->value['siteConfig']['siteStoreDomain'];?>
">
														</div>
													</div>
													<div class="domain-name-message" style="margin-top: 15px;"></div>
												</div>
												<div class="form-group">
													<label>Mağaza Açıklaması: </label>
													<textarea name="store_text" class="form-control" cols="30" rows="10"><?php echo $_smarty_tpl->tpl_vars['return']->value['userStore']['store_text'];?>
</textarea>
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
														<div class="uploaded-images">
															<div class="col-md-4 col-sm-3 col-xs-6">
																<div class="image">
																	<img src="<?php echo siteUrl('files/store/thumb');?>
/<?php echo $_smarty_tpl->tpl_vars['return']->value['userStore']['store_logo'];?>
.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['return']->value['userStore']['store_name'];?>
" style="width: 100%;height: 90px;" />
																</div>
															</div>
														</div>
														
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
" width="100%" alt="store theme 1" onclick="selectStoreTheme(1);">
															<div class="selected <?php if ($_smarty_tpl->tpl_vars['return']->value['userStore']['store_theme'] == 1) {?>active<?php }?>">
																<i class="material-icons">check</i>
															</div>
														</div>
														<div class="col-md-6 col-sm-3 col-xs-12" data-theme="2" style="margin-bottom: 15px;">
															<img src="<?php echo siteUrl('public/images/store/header2.jpg');?>
" width="100%" alt="store theme 2" onclick="selectStoreTheme(2);">
															<div class="selected <?php if ($_smarty_tpl->tpl_vars['return']->value['userStore']['store_theme'] == 2) {?>active<?php }?>">
																<i class="material-icons">check</i>
															</div>
														</div>
														<div class="col-md-6 col-sm-3 col-xs-12" data-theme="3" style="margin-bottom: 15px;">
															<img src="<?php echo siteUrl('public/images/store/header3.jpg');?>
" width="100%" alt="store theme 3" onclick="selectStoreTheme(3);">
															<div class="selected <?php if ($_smarty_tpl->tpl_vars['return']->value['userStore']['store_theme'] == 3) {?>active<?php }?>">
																<i class="material-icons">check</i>
															</div>
														</div>
														<div class="col-md-6 col-sm-3 col-xs-12" data-theme="4" style="margin-bottom: 15px;">
															<img src="<?php echo siteUrl('public/images/store/header4.jpg');?>
" width="100%" alt="store theme 4" onclick="selectStoreTheme(4);">
															<div class="selected <?php if ($_smarty_tpl->tpl_vars['return']->value['userStore']['store_theme'] == 4) {?>active<?php }?>">
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
								<div class="block">
									<div class="block-title">
										<h5>Firma Bilgileri</h5>
									</div>
									<div class="block-content">
										<div class="col-md-11" style="margin-left: 35px;">
											<div class="form-group">
												<label>Firma Adı: </label>
												<input type="text" name="firm_name" onkeyup="$('form[name=edit-store] input[name=firm_name]').val($(this).val());" class="form-control" placeholder="Firma Adı" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['userStore']['store_name'];?>
">
											</div>
											<div class="form-group">
												<label>Satış Temsilci İsim: </label>
												<input type="text" name="sales_name" onkeyup="$('form[name=edit-store] input[name=sales_name]').val($(this).val());" class="form-control" placeholder="Satış Temsilci Adı" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['userStore']['sales_name'];?>
">
											</div>
											<div class="form-group">
												<label>Satış Temsilci Soyisim: </label>
												<input type="text" name="sales_surname" onkeyup="$('form[name=edit-store] input[name=sales_surname]').val($(this).val());" class="form-control" placeholder="Satış Temsilci Soyisim" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['userStore']['sales_surname'];?>
">
											</div>
											<div class="form-group">
												<label>Satış Temsilci Numarası: </label>
												<input id="phone" type="tel" name="sales_phone" onkeyup="$('form[name=edit-store] input[name=sales_phone]').val($(this).val());" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['userStore']['sales_phone'];?>
">
											</div>
											<div class="form-group">
												<?php if (isset($_smarty_tpl->tpl_vars['activity_area'])) {$_smarty_tpl->tpl_vars['activity_area'] = clone $_smarty_tpl->tpl_vars['activity_area'];
$_smarty_tpl->tpl_vars['activity_area']->value = userInfo($_smarty_tpl->tpl_vars['return']->value['userStore']['user_id'],'activity_area'); $_smarty_tpl->tpl_vars['activity_area']->nocache = null; $_smarty_tpl->tpl_vars['activity_area']->scope = 0;
} else $_smarty_tpl->tpl_vars['activity_area'] = new Smarty_Variable(userInfo($_smarty_tpl->tpl_vars['return']->value['userStore']['user_id'],'activity_area'), null, 0);?>
												<label>Faaliyet Alanı: </label>
												<input type="text" disabled="disabled" value="<?php if ($_smarty_tpl->tpl_vars['activity_area']->value == 1) {?>Galeri<?php } elseif ($_smarty_tpl->tpl_vars['activity_area']->value == 2) {?>Yetkili Bayi<?php } elseif ($_smarty_tpl->tpl_vars['activity_area']->value == 3) {?>Üretici Firma<?php }?>" class="form-control">
											</div>
											<div class="form-group">
												<?php if (isset($_smarty_tpl->tpl_vars['business_type'])) {$_smarty_tpl->tpl_vars['business_type'] = clone $_smarty_tpl->tpl_vars['business_type'];
$_smarty_tpl->tpl_vars['business_type']->value = userInfo($_smarty_tpl->tpl_vars['return']->value['userStore']['user_id'],'business_type'); $_smarty_tpl->tpl_vars['business_type']->nocache = null; $_smarty_tpl->tpl_vars['business_type']->scope = 0;
} else $_smarty_tpl->tpl_vars['business_type'] = new Smarty_Variable(userInfo($_smarty_tpl->tpl_vars['return']->value['userStore']['user_id'],'business_type'), null, 0);?>
												<label>İşletme Türü: </label>
												<input type="text" disabled="disabled" value="<?php if ($_smarty_tpl->tpl_vars['business_type']->value == 1) {?>Şahıs Şirketi<?php } elseif ($_smarty_tpl->tpl_vars['business_type']->value == 2) {?>Limited veya Anonim Şirketi<?php }?>" class="form-control">
											</div>
											<div class="form-group">
												<label>TC Kimlik No: </label>
												<input type="text" disabled="disabled" value="<?php echo userInfo($_smarty_tpl->tpl_vars['return']->value['userStore']['user_id'],'tc');?>
" class="form-control">
											</div>
											<?php if ($_smarty_tpl->tpl_vars['business_type']->value == 2) {?>
												<div class="form-group">
													<label>Ticari Ünvan: </label>
													<input type="text" disabled="disabled" value="<?php echo userInfo($_smarty_tpl->tpl_vars['return']->value['userStore']['user_id'],'commercial_title');?>
" class="form-control">
												</div>
											<?php }?>
											<div class="form-group">
												<label>İl: </label>
												<input type="text" disabled="disabled" value="<?php echo cityInfo(userInfo($_smarty_tpl->tpl_vars['return']->value['userStore']['user_id'],'city'),'CityName');?>
" class="form-control">
											</div>
											<div class="form-group">
												<label>İlçe: </label>
												<input type="text" disabled="disabled" value="<?php echo countyInfo(userInfo($_smarty_tpl->tpl_vars['return']->value['userStore']['user_id'],'county'),'CountyName');?>
" class="form-control">
											</div>
											<div class="form-group">
												<label>Vergi Dairesi: </label>
												<input type="text" disabled="disabled" value="<?php echo taxInfo(userInfo($_smarty_tpl->tpl_vars['return']->value['userStore']['user_id'],'tax'),'daire');?>
" class="form-control">
											</div>
											<div class="form-group">
												<label>Vergi Numarası: </label>
												<input type="text" disabled="disabled" value="<?php echo userInfo($_smarty_tpl->tpl_vars['return']->value['userStore']['user_id'],'tax_no');?>
" class="form-control">
											</div>
											<div class="form-group">
												<label>Adres Detayı: </label>
												<textarea disabled="disabled" cols="20" rows="5" class="form-control"><?php echo userInfo($_smarty_tpl->tpl_vars['return']->value['userStore']['user_id'],'address');?>
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
								
								<button type="button" class="btn btn-primary pull-right" onclick="$('form[name=edit-store]').submit();" style="padding: 10px 50px;">Kaydet</button>
							</div>
						</div>
					<?php }?>
				<?php }?>
			<?php }?>
		</div>
	</div>
</div><?php }
}
?>