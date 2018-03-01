<?php /* Smarty version 3.1.27, created on 2018-01-19 11:56:33
         compiled from "C:\xampp\htdocs\galericilerden\app\view\store\index.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:105615a61cee188f2b4_92128783%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e0b842d20a9ed4f2ff28142bcac515dcb4261298' => 
    array (
      0 => 'C:\\xampp\\htdocs\\galericilerden\\app\\view\\store\\index.tpl',
      1 => 1516283877,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '105615a61cee188f2b4_92128783',
  'variables' => 
  array (
    'return' => 0,
    'header' => 0,
    'category' => 0,
    'subcategorys' => 0,
    'subcategory' => 0,
    'ads' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5a61cee1c86738_99391935',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5a61cee1c86738_99391935')) {
function content_5a61cee1c86738_99391935 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_capitalize')) require_once 'C:\\xampp\\htdocs\\galericilerden\\system\\plugin\\smarty\\plugins\\modifier.capitalize.php';
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\xampp\\htdocs\\galericilerden\\system\\plugin\\smarty\\plugins\\modifier.date_format.php';

$_smarty_tpl->properties['nocache_hash'] = '105615a61cee188f2b4_92128783';
echo $_smarty_tpl->getSubTemplate ("../header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<div class="store-main-page">
	<div class="container">
		<div class="store-theme hidden-sm hidden-xs">
			<img src="<?php echo siteUrl('public/images/store/header');
echo $_smarty_tpl->tpl_vars['return']->value['storeInfo']['store_theme'];?>
.jpg" width="100%" alt="<?php echo $_smarty_tpl->tpl_vars['header']->value['storeInfo']['store_name'];?>
">
		</div>
		<div class="store-content">
			<div class="col-md-3">
				<div class="left-sidebar">
					<div class="block col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0 col-sm-6 col-sm-offset-3" style="padding: 0;float: none;">
						<div class="block-content">
							<div class="store-info">
								<img src="<?php echo siteUrl('files/store/big');?>
/<?php echo $_smarty_tpl->tpl_vars['return']->value['storeInfo']['store_logo'];?>
.jpg" width="100%" alt="<?php echo $_smarty_tpl->tpl_vars['return']->value['storeInfo']['store_name'];?>
">
								<h1><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['return']->value['storeInfo']['store_name'], 'UTF-8');?>
</h1>
								<?php if (userInfo($_smarty_tpl->tpl_vars['return']->value['storeInfo']['user_id'],'phone') != '') {?>
									<p>
										<i class="material-icons">phone</i> <?php echo userInfo($_smarty_tpl->tpl_vars['return']->value['storeInfo']['user_id'],'phone');?>

									</p>
								<?php }?>
								<?php if (userInfo($_smarty_tpl->tpl_vars['return']->value['storeInfo']['user_id'],'phone_work') != '') {?>
									<p>
										<i class="material-icons">phone</i> <?php echo userInfo($_smarty_tpl->tpl_vars['return']->value['storeInfo']['user_id'],'phone_work');?>

									</p>
								<?php }?>
								<?php if (userInfo($_smarty_tpl->tpl_vars['return']->value['storeInfo']['user_id'],'phone_more')) {?>
									<p>
										<i class="material-icons">phone</i> <?php echo userInfo($_smarty_tpl->tpl_vars['return']->value['storeInfo']['user_id'],'phone_more');?>

									</p>
								<?php }?>
							</div>
						</div>
					</div>
					<?php if ($_smarty_tpl->tpl_vars['return']->value['storeAds']) {?>
						<div class="block hidden-sm hidden-xs">
							<div class="block-title">
								<h5>Araçlarımız</h5>
							</div>
							<div class="block-content" style="height: 300px;overflow-y: auto;">
								<ul>
									<?php if (!isset($_GET['catId'])) {?>
										<?php
$_from = $_smarty_tpl->tpl_vars['return']->value['Category']->getStoreCategorys(null,$_smarty_tpl->tpl_vars['return']->value['storeInfo']['user_id'],false);
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['category'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['category']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
$foreach_category_Sav = $_smarty_tpl->tpl_vars['category'];
?>
											<?php if (!empty($_smarty_tpl->tpl_vars['category']->value)) {?>
												<li>
													<a href="<?php echo $_smarty_tpl->tpl_vars['return']->value['realDomain'];?>
?catId=<?php echo $_smarty_tpl->tpl_vars['category']->value['Id'];?>
">
														<i class="material-icons">list</i> <?php echo $_smarty_tpl->tpl_vars['category']->value['kategori_adi'];?>
 (<?php echo count($_smarty_tpl->tpl_vars['return']->value['Ads']->categoryStoreAds($_smarty_tpl->tpl_vars['category']->value['Id'],$_smarty_tpl->tpl_vars['return']->value['storeInfo']['user_id'],null,null,null,null));?>
) <i class="material-icons arrow-right">keyboard_arrow_right</i>
													</a>
												</li>
											<?php }?>
										<?php
$_smarty_tpl->tpl_vars['category'] = $foreach_category_Sav;
}
?>
									<?php }?>

									<?php if (isset($_GET['catId'])) {?>
										<li>
											<a href="<?php echo $_smarty_tpl->tpl_vars['return']->value['realDomain'];?>
">
												<i class="material-icons">list</i> Tümü <i class="material-icons arrow-right">keyboard_arrow_right</i>
											</a>
										</li>
										<?php if (categoryInfo($_GET['catId'],'ustkategoriId') != 0) {?>
											<li>
												<a href="<?php echo $_smarty_tpl->tpl_vars['return']->value['realDomain'];?>
?catId=<?php echo categoryInfo(categoryInfo($_GET['catId'],'ustkategoriId'),'Id');?>
">
													<i class="material-icons">list</i> <?php echo categoryInfo(categoryInfo($_GET['catId'],'ustkategoriId'),'kategori_adi');?>
 <i class="material-icons arrow-right">keyboard_arrow_right</i>
												</a>
											</li>
										<?php } else { ?>
											<li>
												<a href="<?php echo $_smarty_tpl->tpl_vars['return']->value['realDomain'];?>
?catId=<?php echo $_GET['catId'];?>
">
													<i class="material-icons">list</i> <?php echo categoryInfo($_GET['catId'],'kategori_adi');?>
 <i class="material-icons arrow-right">keyboard_arrow_right</i>
												</a>
											</li>
										<?php }?>
										<?php if (isset($_smarty_tpl->tpl_vars['subcategorys'])) {$_smarty_tpl->tpl_vars['subcategorys'] = clone $_smarty_tpl->tpl_vars['subcategorys'];
$_smarty_tpl->tpl_vars['subcategorys']->value = $_smarty_tpl->tpl_vars['return']->value['Category']->getStoreCategorys($_GET['catId'],$_smarty_tpl->tpl_vars['return']->value['storeInfo']['user_id'],true); $_smarty_tpl->tpl_vars['subcategorys']->nocache = null; $_smarty_tpl->tpl_vars['subcategorys']->scope = 0;
} else $_smarty_tpl->tpl_vars['subcategorys'] = new Smarty_Variable($_smarty_tpl->tpl_vars['return']->value['Category']->getStoreCategorys($_GET['catId'],$_smarty_tpl->tpl_vars['return']->value['storeInfo']['user_id'],true), null, 0);?>
										
										<?php if (!empty($_smarty_tpl->tpl_vars['subcategorys']->value)) {?>
											<?php
$_from = $_smarty_tpl->tpl_vars['subcategorys']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['subcategory'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['subcategory']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['subcategory']->value) {
$_smarty_tpl->tpl_vars['subcategory']->_loop = true;
$foreach_subcategory_Sav = $_smarty_tpl->tpl_vars['subcategory'];
?>
												<?php if (!empty($_smarty_tpl->tpl_vars['subcategory']->value)) {?>
													<li>
														<a href="<?php echo $_smarty_tpl->tpl_vars['return']->value['realDomain'];?>
?catId=<?php echo $_smarty_tpl->tpl_vars['subcategory']->value['Id'];?>
">
															<i class="material-icons">list</i> <?php echo $_smarty_tpl->tpl_vars['subcategory']->value['kategori_adi'];?>
 (<?php echo count($_smarty_tpl->tpl_vars['return']->value['Ads']->categoryStoreAds($_smarty_tpl->tpl_vars['subcategory']->value['Id'],$_smarty_tpl->tpl_vars['return']->value['storeInfo']['user_id'],null,null,null,null));?>
) <i class="material-icons arrow-right">keyboard_arrow_right</i>
														</a>
													</li>
												<?php }?>
											<?php
$_smarty_tpl->tpl_vars['subcategory'] = $foreach_subcategory_Sav;
}
?>
										<?php }?>
									<?php }?>
								</ul>
							</div>
						</div>
					<?php }?>
					<div class="block sales-info hidden-sm hidden-xs">
						<div class="block-title">
							<h5>Satış Temsilcisi</h5>
						</div>
						<div class="block-content">
							<img src="" width="50" height="50" alt="">
							<p><?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['return']->value['storeInfo']['sales_name']);?>
 <?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['return']->value['storeInfo']['sales_surname']);?>
</p>
							<span><?php echo $_smarty_tpl->tpl_vars['return']->value['storeInfo']['sales_phone'];?>
</span>
						</div>
					</div>
					<div class="block about-store hidden-sm hidden-xs">
						<div class="block-title">
							<h5>Hakkımızda</h5>
						</div>
						<div class="block-content"><?php echo $_smarty_tpl->tpl_vars['return']->value['storeInfo']['store_text'];?>
</div>
					</div>
				</div>
			</div>
			<div class="col-md-9">
				<div class="ads-container-top">
					<div class="row"> 
						<?php if ((smarty_modifier_date_format($_smarty_tpl->tpl_vars['return']->value['storeInfo']['end_time'],"%Y")-smarty_modifier_date_format($_smarty_tpl->tpl_vars['return']->value['storeInfo']['create_time'],"%Y")) > 0) {?>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="certificate">
									<span>ÜYELİK</span>
									<img src="<?php echo siteUrl('public/images/certificate.svg');?>
" width="35" alt="certificate">
									<span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['return']->value['storeInfo']['end_time'],"%Y")-smarty_modifier_date_format($_smarty_tpl->tpl_vars['return']->value['storeInfo']['create_time'],"%Y");?>
.YIL</span>
								</div>
							</div>
						<?php }?>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="row">
								<div class="ads-count col-md-4 col-sm-4 col-xs-12">
									<span>İLAN SAYISI</span>
									<strong><?php if ($_smarty_tpl->tpl_vars['return']->value['storeAds'] === false) {?>0<?php } else {
echo $_smarty_tpl->tpl_vars['return']->value['storeAdsCount'];
}?></strong>
								</div>
								<div class="ads-orderby col-md-8 col-sm-8 col-xs-12">
									<select name="orderby" class="form-control">
										<option value="0" <?php if (!$_GET['orderby']) {?>selected="selected"<?php }?>>Sıralama Seçenekleri</option>
										<option value="pricehigh" <?php if ($_GET['orderby'] == 'pricehigh') {?>selected="selected"<?php }?>>Fiyata Göre (Önce en yüksek)</option>
										<option value="pricelow" <?php if ($_GET['orderby'] == 'pricelow') {?>selected="selected"<?php }?>>Fiyata Göre (Önce en düşük)</option>
										<option value="datenew" <?php if ($_GET['orderby'] == 'datenew') {?>selected="selected"<?php }?>>Tarihe Göre (Önce en yeni ilan)</option>
										<option value="dateold" <?php if ($_GET['orderby'] == 'dateold') {?>selected="selected"<?php }?>>Tarihe Göre (Önce en eski ilan)</option>
										<option value="kmlow" <?php if ($_GET['orderby'] == 'kmlow') {?>selected="selected"<?php }?>>Km'ye Göre (Önce en düşük)</option>
										<option value="kmhigh" <?php if ($_GET['orderby'] == 'kmhigh') {?>selected="selected"<?php }?>>Km'ye Göre (Önce en yüksek)</option>
										<option value="yearold" <?php if ($_GET['orderby'] == 'yearold') {?>selected="selected"<?php }?>>Yıla Göre (Önce en eski)</option>
										<option value="yearnew" <?php if ($_GET['orderby'] == 'yearnew') {?>selected="selected"<?php }?>>Yıla Göre (Önce en yeni)</option>
									</select>
								</div>
								
									<?php echo '<script'; ?>
 type="text/javascript">
										$(function() {
											$('select[name=orderby]').change(function() {

												var val        = $(this).val();
												var actualLink = '<?php echo $_smarty_tpl->tpl_vars['return']->value['realDomain'];?>
';

												if($.urlParam('page') !== null)
												{
													if(val != 0)
													{
														if($.urlParam('catId') !== null)
														{
															actualLink = '<?php echo $_smarty_tpl->tpl_vars['return']->value['realDomain'];?>
?catId=' + $.urlParam('catId') + '&orderby=' + val + '&page=' + $.urlParam('page');
														}
														else
														{
															actualLink = '<?php echo $_smarty_tpl->tpl_vars['return']->value['realDomain'];?>
?orderby=' + val + '&page=' + $.urlParam('page');
														}
													}
													else
													{
														if($.urlParam('catId') !== null)
														{
															actualLink = '<?php echo $_smarty_tpl->tpl_vars['return']->value['realDomain'];?>
?catId=' + $.urlParam('catId') + '&page=' + $.urlParam('page');
														}
														else
														{
															actualLink = '<?php echo $_smarty_tpl->tpl_vars['return']->value['realDomain'];?>
?page=' + $.urlParam('page');
														}
													}
												}
												else
												{
													if(val != 0)
													{
														if($.urlParam('catId') !== null)
														{
															actualLink = '<?php echo $_smarty_tpl->tpl_vars['return']->value['realDomain'];?>
?catId=' + $.urlParam('catId') + '&orderby=' + val;
														}
														else
														{
															actualLink = '<?php echo $_smarty_tpl->tpl_vars['return']->value['realDomain'];?>
?orderby=' + val;
														}
													}
													else
													{
														if($.urlParam('catId') !== null)
														{
															actualLink = '<?php echo $_smarty_tpl->tpl_vars['return']->value['realDomain'];?>
?catId=' + $.urlParam('catId');
														}
														else
														{
															actualLink = '<?php echo $_smarty_tpl->tpl_vars['return']->value['realDomain'];?>
';
														}
													}
												}

												window.location.href = actualLink;
											});

											$.urlParam = function(name)
											{
											    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
											    
											    if (results == null)
											    {
											       return null;
											    }
											    else
											    {
											       return decodeURI(results[1]) || 0;
											    }

											}
										});
									<?php echo '</script'; ?>
>
								
							</div>
						</div>
					</div>
				</div>
				<div class="block ads-container desktop hidden-sm hidden-xs">
					<div class="block-content">
						<?php if ($_smarty_tpl->tpl_vars['return']->value['storeAds']) {?>
							<table class="table">
								<thead>
									<tr>
										<th></th>
										<th>Seri</th>
										<th>Model</th>
										<th>Yıl</th>
										<th>Km</th>
										<th>Fiyat</th>
										<th>İl / İlçe</th>
									</tr>
								</thead>
								<tbody>	
									<?php
$_from = $_smarty_tpl->tpl_vars['return']->value['storeAds'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['ads'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['ads']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['ads']->value) {
$_smarty_tpl->tpl_vars['ads']->_loop = true;
$foreach_ads_Sav = $_smarty_tpl->tpl_vars['ads'];
?>
										<tr onclick="window.open('<?php echo siteUrl('view');?>
/<?php echo $_smarty_tpl->tpl_vars['ads']->value['seflink'];?>
-<?php echo $_smarty_tpl->tpl_vars['ads']->value['id'];?>
');">
											<td width="116">
												<img src="<?php echo siteUrl('files/ads/thumb');?>
/<?php echo $_smarty_tpl->tpl_vars['ads']->value['title_image'];?>
.jpg" width="116" alt="<?php echo $_smarty_tpl->tpl_vars['ads']->value['title'];?>
">
											</td>
											<td><?php if (!categoryInfo($_smarty_tpl->tpl_vars['ads']->value['category3'],'kategori_adi')) {?>Yok<?php } else {
echo categoryInfo($_smarty_tpl->tpl_vars['ads']->value['category3'],'kategori_adi');
}?></td>
											<td><?php if (!categoryInfo($_smarty_tpl->tpl_vars['ads']->value['category4'],'kategori_adi')) {?>Yok<?php } else {
echo categoryInfo($_smarty_tpl->tpl_vars['ads']->value['category4'],'kategori_adi');
}?></td>
											<td><?php if ($_smarty_tpl->tpl_vars['ads']->value['year'] > 0) {
echo $_smarty_tpl->tpl_vars['ads']->value['year'];
} else { ?>Yok<?php }?></td>
											<td><?php if ($_smarty_tpl->tpl_vars['ads']->value['km'] > 0) {
echo $_smarty_tpl->tpl_vars['ads']->value['km'];
} else { ?>Yok<?php }?></td>
											<td>
												<?php echo number_format($_smarty_tpl->tpl_vars['ads']->value['price'],0,".",",");?>

												<?php if ($_smarty_tpl->tpl_vars['ads']->value['price_type'] == 0) {?>
													<i class="icon icon-tl"></i>
												<?php } elseif ($_smarty_tpl->tpl_vars['ads']->value['price_type'] == 1) {?>
													<i class="icon icon-euro"></i>
												<?php } elseif ($_smarty_tpl->tpl_vars['ads']->value['price_type'] == 2) {?>
													<i class="icon icon-usd"></i>
												<?php }?>
											</td>
											<td><?php echo cityInfo($_smarty_tpl->tpl_vars['ads']->value['city'],'CityName');?>
 / <?php echo countyInfo($_smarty_tpl->tpl_vars['ads']->value['county'],'CountyName');?>
</td>
										</tr>
									<?php
$_smarty_tpl->tpl_vars['ads'] = $foreach_ads_Sav;
}
?>
								</tbody>
							</table>
						<?php } else { ?>
							<p class="text-danger text-center" style="margin-top: 15px;"><b>Bir sonuç bulunamadı</b></p>
						<?php }?>
					</div>
				</div>
				<div class="block list-mobile hidden-lg hidden-md">
					<?php if ($_smarty_tpl->tpl_vars['return']->value['storeAds']) {?>
						<ul>
							<?php
$_from = $_smarty_tpl->tpl_vars['return']->value['storeAds'];
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
									<span class="address"><i class="material-icons">location_on</i> <?php echo cityInfo($_smarty_tpl->tpl_vars['ads']->value['city'],'CityName');?>
 / <?php echo countyInfo($_smarty_tpl->tpl_vars['ads']->value['county'],'CountyName');?>
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
									<span class="date"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['ads']->value['create_time'],"%d");?>
 <?php echo monthName($_smarty_tpl->tpl_vars['ads']->value['create_time']);?>
</span>
									<a class="overlay" href="<?php echo siteUrl('view');?>
/<?php echo $_smarty_tpl->tpl_vars['ads']->value['seflink'];?>
-<?php echo $_smarty_tpl->tpl_vars['ads']->value['id'];?>
"></a>
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
						
						<div class="pageSize">
							<span>Her sayfada</span>
							<ul class="pagination">
								<li <?php if ($_GET['pageSize'] == 15) {?>class="active"<?php }?>>
									<a href="<?php echo $_smarty_tpl->tpl_vars['return']->value['actualLinkPageSize'];
if ($_GET['catId'] || $_GET['orderby']) {?>&<?php } else { ?>?<?php }?>pageSize=15">15</a>
								</li>
								<li <?php if ($_GET['pageSize'] == 50) {?>class="active"<?php }?>>
									<a href="<?php echo $_smarty_tpl->tpl_vars['return']->value['actualLinkPageSize'];
if ($_GET['catId'] || $_GET['orderby']) {?>&<?php } else { ?>?<?php }?>pageSize=50">50</a>
								</li>
							</ul>
							<span>sonuç göster</span>
						</div>
					</div>
					<div class="mobilePagination hidden-lg hidden-md" style="margin-top: 0;margin-bottom: 15px;"><?php echo $_smarty_tpl->tpl_vars['return']->value['pagination']['mobilePagination'];?>
</div>
				<?php }?>
			</div>
		</div>
	</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("../static/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>