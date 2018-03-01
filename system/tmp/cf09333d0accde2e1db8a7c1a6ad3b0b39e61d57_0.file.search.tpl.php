<?php /* Smarty version 3.1.27, created on 2018-01-18 13:34:25
         compiled from "C:\xampp\htdocs\galericilerden\app\view\search.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:316505a6094513636e8_57896549%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cf09333d0accde2e1db8a7c1a6ad3b0b39e61d57' => 
    array (
      0 => 'C:\\xampp\\htdocs\\galericilerden\\app\\view\\search.tpl',
      1 => 1516278632,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '316505a6094513636e8_57896549',
  'variables' => 
  array (
    'return' => 0,
    'ads' => 0,
    'find' => 0,
    'repl' => 0,
    'cities' => 0,
    'city' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5a60945145d4d5_27485185',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5a60945145d4d5_27485185')) {
function content_5a60945145d4d5_27485185 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\xampp\\htdocs\\galericilerden\\system\\plugin\\smarty\\plugins\\modifier.date_format.php';
if (!is_callable('smarty_modifier_replace')) require_once 'C:\\xampp\\htdocs\\galericilerden\\system\\plugin\\smarty\\plugins\\modifier.replace.php';

$_smarty_tpl->properties['nocache_hash'] = '316505a6094513636e8_57896549';
?>
<div id="main">
	<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

	<div class="page-content">
		<div class="container">
			<?php if ($_smarty_tpl->tpl_vars['return']->value['notfound']) {?>
				<div class="block" style="margin-bottom: 0;">
					<p class="text-danger text-center" style="margin-top: 15px;"><b>Arama kriterlerine uygun ilan bulunamadı.</b></p>
				</div>
			<?php } else { ?>
				<div class="row">
					<?php if (isset($_smarty_tpl->tpl_vars['categoryInfo'])) {$_smarty_tpl->tpl_vars['categoryInfo'] = clone $_smarty_tpl->tpl_vars['categoryInfo'];
$_smarty_tpl->tpl_vars['categoryInfo']->value = $_smarty_tpl->tpl_vars['return']->value['categoryInfo']; $_smarty_tpl->tpl_vars['categoryInfo']->nocache = null; $_smarty_tpl->tpl_vars['categoryInfo']->scope = 3;
} else $_smarty_tpl->tpl_vars['categoryInfo'] = new Smarty_Variable($_smarty_tpl->tpl_vars['return']->value['categoryInfo'], null, 3);
$_ptr = $_smarty_tpl->parent; while ($_ptr != null) {$_ptr->tpl_vars['categoryInfo'] = clone $_smarty_tpl->tpl_vars['categoryInfo']; $_ptr = $_ptr->parent; }
Smarty::$global_tpl_vars['categoryInfo'] = clone $_smarty_tpl->tpl_vars['categoryInfo'];?>
					<?php if (isset($_smarty_tpl->tpl_vars['categoryModulItems'])) {$_smarty_tpl->tpl_vars['categoryModulItems'] = clone $_smarty_tpl->tpl_vars['categoryModulItems'];
$_smarty_tpl->tpl_vars['categoryModulItems']->value = $_smarty_tpl->tpl_vars['return']->value['categoryModulItems']; $_smarty_tpl->tpl_vars['categoryModulItems']->nocache = null; $_smarty_tpl->tpl_vars['categoryModulItems']->scope = 3;
} else $_smarty_tpl->tpl_vars['categoryModulItems'] = new Smarty_Variable($_smarty_tpl->tpl_vars['return']->value['categoryModulItems'], null, 3);
$_ptr = $_smarty_tpl->parent; while ($_ptr != null) {$_ptr->tpl_vars['categoryModulItems'] = clone $_smarty_tpl->tpl_vars['categoryModulItems']; $_ptr = $_ptr->parent; }
Smarty::$global_tpl_vars['categoryModulItems'] = clone $_smarty_tpl->tpl_vars['categoryModulItems'];?>
					<?php if (isset($_smarty_tpl->tpl_vars['cities'])) {$_smarty_tpl->tpl_vars['cities'] = clone $_smarty_tpl->tpl_vars['cities'];
$_smarty_tpl->tpl_vars['cities']->value = $_smarty_tpl->tpl_vars['return']->value['cities']; $_smarty_tpl->tpl_vars['cities']->nocache = null; $_smarty_tpl->tpl_vars['cities']->scope = 0;
} else $_smarty_tpl->tpl_vars['cities'] = new Smarty_Variable($_smarty_tpl->tpl_vars['return']->value['cities'], null, 0);?>
					<?php if (isset($_smarty_tpl->tpl_vars['Ads'])) {$_smarty_tpl->tpl_vars['Ads'] = clone $_smarty_tpl->tpl_vars['Ads'];
$_smarty_tpl->tpl_vars['Ads']->value = $_smarty_tpl->tpl_vars['return']->value['Ads']; $_smarty_tpl->tpl_vars['Ads']->nocache = null; $_smarty_tpl->tpl_vars['Ads']->scope = 3;
} else $_smarty_tpl->tpl_vars['Ads'] = new Smarty_Variable($_smarty_tpl->tpl_vars['return']->value['Ads'], null, 3);
$_ptr = $_smarty_tpl->parent; while ($_ptr != null) {$_ptr->tpl_vars['Ads'] = clone $_smarty_tpl->tpl_vars['Ads']; $_ptr = $_ptr->parent; }
Smarty::$global_tpl_vars['Ads'] = clone $_smarty_tpl->tpl_vars['Ads'];?>
					<?php if (isset($_smarty_tpl->tpl_vars['actualLinkOrderBy'])) {$_smarty_tpl->tpl_vars['actualLinkOrderBy'] = clone $_smarty_tpl->tpl_vars['actualLinkOrderBy'];
$_smarty_tpl->tpl_vars['actualLinkOrderBy']->value = $_smarty_tpl->tpl_vars['return']->value['actualLinkOrderBy']; $_smarty_tpl->tpl_vars['actualLinkOrderBy']->nocache = null; $_smarty_tpl->tpl_vars['actualLinkOrderBy']->scope = 3;
} else $_smarty_tpl->tpl_vars['actualLinkOrderBy'] = new Smarty_Variable($_smarty_tpl->tpl_vars['return']->value['actualLinkOrderBy'], null, 3);
$_ptr = $_smarty_tpl->parent; while ($_ptr != null) {$_ptr->tpl_vars['actualLinkOrderBy'] = clone $_smarty_tpl->tpl_vars['actualLinkOrderBy']; $_ptr = $_ptr->parent; }
Smarty::$global_tpl_vars['actualLinkOrderBy'] = clone $_smarty_tpl->tpl_vars['actualLinkOrderBy'];?>

					<?php echo $_smarty_tpl->getSubTemplate ("static/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

					
					<div class="ad-list">
						<div class="col-lg-10 col-md-10" style="padding-left: 0;width: 80%;">
							<div class="block category-step">
								<p style="display: inline-block;"><b>"<?php echo $_GET['query'];?>
"</b> aramanızda <strong style="color: #ff263a;"><?php echo number_format($_smarty_tpl->tpl_vars['return']->value['searchAdsCount'],0,".",",");?>
 ilan</strong> bulundu</p>
								<?php if ($_SESSION['login']) {?>
									<!--<p class="pull-right save-search"><i class="material-icons" style="vertical-align: middle;">search</i> Aramayı Kaydet</p>-->
								<?php }?>
							</div>
							
							<div class="ads-container">
								<div class="block hidden-sm hidden-xs">
									<div class="tab-menu">
										<ul>
											<li class="active">
												<a href="<?php echo $_smarty_tpl->tpl_vars['return']->value['actualLink'];?>
">Tüm İlanlar</a>
											</li>
										</ul>
									</div>
								</div>
								<div class="orderby hidden-sm hidden-xs">
									<div class="row">
										<div class="col-md-9"></div>
										<div class="col-md-3">
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
									</div>
								</div>
								<div class="block">
									<div class="list-desktop hidden-sm hidden-xs">
										<?php if ($_smarty_tpl->tpl_vars['return']->value['searchAds']) {?>
											<table class="table">
												<thead>
													<tr>
														<th></th>
														<th>Seri</th>
														<th>Model</th>
														<th>İlan Başlığı</th>
														<th>Yıl</th>
														<th>Km</th>
														<th>Fiyat</th>
														<th>İlan Tarihi</th>
														<th>İl / İlçe</th>
													</tr>
												</thead>
												<tbody>
													<?php
$_from = $_smarty_tpl->tpl_vars['return']->value['searchAds'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['ads'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['ads']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['ads']->value) {
$_smarty_tpl->tpl_vars['ads']->_loop = true;
$foreach_ads_Sav = $_smarty_tpl->tpl_vars['ads'];
?>
														<tr onclick="location.href='<?php echo siteUrl('view');?>
/<?php echo $_smarty_tpl->tpl_vars['ads']->value['seflink'];?>
-<?php echo $_smarty_tpl->tpl_vars['ads']->value['id'];?>
'" class="<?php if ($_smarty_tpl->tpl_vars['ads']->value['doping_differently'] == 1) {?>doping-differently<?php }
if ($_smarty_tpl->tpl_vars['ads']->value['doping_acil'] == 1) {?> doping-acil<?php }?>">
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
															<td><?php echo strShorten($_smarty_tpl->tpl_vars['ads']->value['title'],35,'...');?>
</td>
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
															<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['ads']->value['create_time'],"%d");?>
 <?php echo monthName($_smarty_tpl->tpl_vars['ads']->value['create_time']);?>
 <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['ads']->value['create_time'],"%Y");?>
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
											<div class="block" style="margin-bottom: 0;">
												<p class="text-danger text-center" style="margin-top: 15px;"><b>Arama kriterlerine uygun ilan bulunamadı.</b></p>
											</div>
										<?php }?>
									</div>
									<div class="list-mobile hidden-lg hidden-md">
										<?php if ($_smarty_tpl->tpl_vars['return']->value['searchAds']) {?>
											<ul>
												<?php
$_from = $_smarty_tpl->tpl_vars['return']->value['searchAds'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['ads'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['ads']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['ads']->value) {
$_smarty_tpl->tpl_vars['ads']->_loop = true;
$foreach_ads_Sav = $_smarty_tpl->tpl_vars['ads'];
?>
													<li class="<?php if ($_smarty_tpl->tpl_vars['ads']->value['doping_differently'] == 1) {?>doping-differently<?php }
if ($_smarty_tpl->tpl_vars['ads']->value['doping_acil'] == 1) {?> doping-acil<?php }?>">
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
												<p class="text-danger text-center" style="margin-top: 15px;"><b>Arama kriterlerine uygun ilan bulunamadı.</b></p>
											</div>
										<?php }?>
									</div>
									<div class="list-bottom hidden-lg hidden-md">
										<div class="row">
											<div class="col-xs-6" onclick="adsFilter();">
												<i class="material-icons">build</i>
												<span>Filtrele</span>
											</div>
											<div class="col-xs-6" data-toggle="modal" data-target="#sortModal">
												<i class="material-icons">sort</i>
												<span>Sırala</span>
											</div>
										</div>
									</div>
								</div>
								<?php if ($_smarty_tpl->tpl_vars['return']->value['searchAdsPagination']['desktopPagination'] != '') {?>
									<div class="list-bottom-pagination hidden-sm hidden-xs">
										<ul class="pagination"><?php echo $_smarty_tpl->tpl_vars['return']->value['searchAdsPagination']['desktopPagination'];?>
</ul>
										
										<?php if (isset($_smarty_tpl->tpl_vars["find"])) {$_smarty_tpl->tpl_vars["find"] = clone $_smarty_tpl->tpl_vars["find"];
$_smarty_tpl->tpl_vars["find"]->value = array('&pageSize=15','&pageSize=50'); $_smarty_tpl->tpl_vars["find"]->nocache = null; $_smarty_tpl->tpl_vars["find"]->scope = 0;
} else $_smarty_tpl->tpl_vars["find"] = new Smarty_Variable(array('&pageSize=15','&pageSize=50'), null, 0);?>
										<?php if (isset($_smarty_tpl->tpl_vars["repl"])) {$_smarty_tpl->tpl_vars["repl"] = clone $_smarty_tpl->tpl_vars["repl"];
$_smarty_tpl->tpl_vars["repl"]->value = array('',''); $_smarty_tpl->tpl_vars["repl"]->nocache = null; $_smarty_tpl->tpl_vars["repl"]->scope = 0;
} else $_smarty_tpl->tpl_vars["repl"] = new Smarty_Variable(array('',''), null, 0);?>
										<div class="pageSize">
											<span>Her sayfada</span>
											<ul class="pagination">
												<li <?php if ($_GET['pageSize'] == 15) {?>class="active"<?php }?>>
													<a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['return']->value['actualLink'],$_smarty_tpl->tpl_vars['find']->value,$_smarty_tpl->tpl_vars['repl']->value);?>
&pageSize=15">15</a>
												</li>
												<li <?php if ($_GET['pageSize'] == 50) {?>class="active"<?php }?>>
													<a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['return']->value['actualLink'],$_smarty_tpl->tpl_vars['find']->value,$_smarty_tpl->tpl_vars['repl']->value);?>
&pageSize=50">50</a>
												</li>
											</ul>
											<span>sonuç göster</span>
										</div>
									</div>
									<div class="mobilePagination hidden-lg hidden-md"><?php echo $_smarty_tpl->tpl_vars['return']->value['searchAdsPagination']['mobilePagination'];?>
</div>
								<?php }?>
							</div>
						</div>
					</div>
				</div>
			<?php }?>
		</div>
	</div>
</div>
<div class="mobile-filters hidden-lg hidden-md">
	<div class="col-md-12" style="margin-top: 15px;">
		<i class="material-icons" onclick="$('.mobile-filters').hide(); $('.ad-list').show();" style="margin-bottom: 15px;display: block;text-align: right;font-size: 30px;cursor: pointer;color: #fb2539;font-weight: bold;">close</i>
		<div class="form-group">
			<label>İl: </label>
			<select name="city" class="form-control">
				<option value="0" selected="selected">Tümü</option>
				<?php
$_from = $_smarty_tpl->tpl_vars['cities']->value;
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
" <?php if ($_GET['city'] == $_smarty_tpl->tpl_vars['city']->value['CityID']) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['city']->value['CityName'];?>
</option>
				<?php
$_smarty_tpl->tpl_vars['city'] = $foreach_city_Sav;
}
?>
			</select>
		</div>
		<div class="form-group">
			<label>İlçe: </label>
			<select name="county" class="form-control">
				<option value="0" selected="selected">Tümü</option>
			</select>
		</div>
		<div class="form-group">
			<label>Fiyat: </label>
			<div class="row input-inline">
				<div class="col-md-6 col-xs-12">
					<input type="number" name="priceMin" value="<?php echo $_GET['priceMin'];?>
" placeholder="Minimum" class="form-control">
				</div>
				<div class="col-md-6 col-xs-12">
					<input type="number" name="priceMax" value="<?php echo $_GET['priceMax'];?>
" placeholder="Maksimum" class="form-control">
				</div>
			</div>
		</div>
		<div class="list-bottom" style="left: 0;right: 0;display: none;">
			<div class="col-xs-6 result" style="width: 100%;">Aramayı Daralt</div>
		</div>
	</div>
</div>
<div class="mobile-sort hidden-lg hidden-md">
	<div class="modal fade" id="sortModal" role="dialog">
	    <div class="modal-dialog modal-sm">
	      	<div class="modal-content">
		        <div class="modal-header">
		          	<button type="button" class="close" data-dismiss="modal">&times;</button>
		          	<h4 class="modal-title">Sıralama Seçenekleri</h4>
		        </div>
		        <div class="modal-body">
		          	<ul>
		          		<li data-sort="0">Normal Sıralama</li>
		          		<li data-sort="pricehigh">Fiyata Göre (Önce en yüksek)</li>
		          		<li data-sort="pricelow">Fiyata Göre (Önce en düşük)</li>
		          		<li data-sort="datenew">Tarihe Göre (Önce en yeni ilan)</li>
		          		<li data-sort="dateold">Tarihe Göre (Önce en eski ilan)</li>
		          		<li data-sort="kmlow">Km'ye Göre (Önce en düşük)</li>
		          		<li data-sort="kmhigh">Km'ye Göre (Önce en yüksek)</li>
		          		<li data-sort="yearold">Yıla Göre (Önce en eski)</li>
		          		<li data-sort="yearnew">Yıla Göre (Önce en yeni)</li>
		          	</ul>
		        </div>
	      	</div>
	    </div>
  	</div>
</div><?php }
}
?>