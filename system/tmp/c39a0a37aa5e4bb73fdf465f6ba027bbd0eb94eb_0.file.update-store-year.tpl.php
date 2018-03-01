<?php /* Smarty version 3.1.27, created on 2017-09-17 13:08:37
         compiled from "C:\xampp\htdocs\galericilerden\app\view\update-store-year.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2835759be57b58861b4_73314148%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c39a0a37aa5e4bb73fdf465f6ba027bbd0eb94eb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\galericilerden\\app\\view\\update-store-year.tpl',
      1 => 1503479444,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2835759be57b58861b4_73314148',
  'variables' => 
  array (
    'return' => 0,
    'store' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_59be57b5987ef3_44968350',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_59be57b5987ef3_44968350')) {
function content_59be57b5987ef3_44968350 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2835759be57b58861b4_73314148';
?>
<body onload="setStore();">
<div id="main">
	<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

	<div class="page-content">
		<div class="container">
			<ul class="breadcrumb">
			    <li><a href="<?php echo SITE_URL;?>
">Anasayfa</a></li>
			    <li class="active">Mağaza Yılını Güncelle</li>
			</ul>
			<div class="step-content">
				<div class="block">
					<div class="block-title">
						<h5>Mağaza Tipi Seçin</h5>
					</div>
					<div class="block-content">
						<form name="store-year-update" action="" method="POST">
							<div class="hidden-inputs">
								<input type="hidden" name="completed" value="completed">
							</div>
							<div class="col-md-11" style="margin-left: 35px;">
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
									<?php }?>
								</div>
							</div>
						</form>
					</div>
				</div>
				<?php if ($_smarty_tpl->tpl_vars['return']->value['siteConfig']['iyzicoPayment'] === false) {?>
					<button type="submit" name="complete" onclick="$('form[name=store-year-update]').submit();" class="btn btn-primary pull-right" style="padding: 10px 20px;">Mağazanızı Güncelleyin</button>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['return']->value['siteConfig']['iyzicoPayment'] === true) {?>
					<div class="storeLimitPayment">
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
											<form name="storeyearupdate-card">
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
													    		<button type="button" class="btn btn-primary" onclick="storeUpdateLimitPayment();" style="line-height: 30px;width: 100%;">Ödeme Yap</button>
													    	</div>
												    	</div>
												    </div>
											    </div>
											</form>
											<?php echo '<script'; ?>
 type="text/javascript">
												$('form[name=storeyearupdate-card]').card({
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
			</div>
		</div>
	</div>
</div><?php }
}
?>