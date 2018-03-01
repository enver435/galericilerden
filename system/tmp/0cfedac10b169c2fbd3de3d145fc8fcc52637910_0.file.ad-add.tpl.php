<?php /* Smarty version 3.1.27, created on 2018-01-18 19:46:58
         compiled from "C:\xampp\htdocs\galericilerden\app\view\ad-add.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:172905a60eba2c20d16_02173449%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0cfedac10b169c2fbd3de3d145fc8fcc52637910' => 
    array (
      0 => 'C:\\xampp\\htdocs\\galericilerden\\app\\view\\ad-add.tpl',
      1 => 1516278710,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '172905a60eba2c20d16_02173449',
  'variables' => 
  array (
    'return' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5a60eba2cbd8e1_32610512',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5a60eba2cbd8e1_32610512')) {
function content_5a60eba2cbd8e1_32610512 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '172905a60eba2c20d16_02173449';
?>
<div id="main">
	<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

	<div class="page-content">
		<div class="container">
			<?php if ($_smarty_tpl->tpl_vars['return']->value['userInfo']['user_status'] == 1) {?>
				<?php if ($_smarty_tpl->tpl_vars['return']->value['adsLimit'] < $_smarty_tpl->tpl_vars['return']->value['userTypeAdsLimit'] || $_smarty_tpl->tpl_vars['return']->value['userInfo']['adAddShow'] == 1) {?>
					<?php echo $_smarty_tpl->getSubTemplate ("ad-add-content.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

		        <?php } else { ?>
		        	<div class="block">
			        	<div class="block-title">
			        		<h5>Yıllık ilan verme limitiniz dolmuş</h5>
			        	</div>
		        		<div class="block-content">
			        		<div class="text-center">
								<i class="material-icons" style="margin-bottom: 25px;font-size: 100px;color: #ff263a;">close</i>
								<p style="font-weight: 500;">Yıllık ilan limitiniz dolmuş.</p>
								<p style="font-weight: 500;">Yinede ilan vermek istermisiniz ? O zaman ödeme yapıp yeniden ilan vere bilirsiniz!</p>
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
		        <?php }?>
			<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['userInfo']['user_status'] == 2) {?>
				<?php if ($_smarty_tpl->tpl_vars['return']->value['adAdd'] === true && $_smarty_tpl->tpl_vars['return']->value['endTimeStore'] === false && $_smarty_tpl->tpl_vars['return']->value['endLimitStore'] === false && $_smarty_tpl->tpl_vars['return']->value['endTimeStoreAdmin'] === false && $_smarty_tpl->tpl_vars['return']->value['endStoreLimitAdmin'] === false && $_smarty_tpl->tpl_vars['return']->value['createNewStore'] === false) {?>
					<?php echo $_smarty_tpl->getSubTemplate ("ad-add-content.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

				<?php }?>
	
				<div class="step-content">
					<?php if ($_smarty_tpl->tpl_vars['return']->value['adAdd'] === false && $_smarty_tpl->tpl_vars['return']->value['storeCloseAdmin'] === true) {?>
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
					<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['adAdd'] === false && $_smarty_tpl->tpl_vars['return']->value['createNewStore'] === true) {?>
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
					<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['adAdd'] === false && $_smarty_tpl->tpl_vars['return']->value['endTimeStore'] === true) {?>
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
					<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['adAdd'] === false && $_smarty_tpl->tpl_vars['return']->value['endTimeStoreAdmin'] === true) {?>
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
					<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['adAdd'] === false && $_smarty_tpl->tpl_vars['return']->value['endStoreLimitAdmin'] === true) {?>
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
					<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['adAdd'] === false && $_smarty_tpl->tpl_vars['return']->value['endLimitStore'] === true) {?>
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
					<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['adAdd'] === false && $_smarty_tpl->tpl_vars['return']->value['userStore'] === false) {?>
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
		</div>
	</div>
</div>
<?php }
}
?>