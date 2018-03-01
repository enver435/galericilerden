<?php /* Smarty version 3.1.27, created on 2018-01-19 10:51:51
         compiled from "C:\xampp\htdocs\galericilerden\app\view\my-favorites.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:219975a61bfb7be1330_47188956%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4ec6def75a66809ae90558d089c268ed7fa94e41' => 
    array (
      0 => 'C:\\xampp\\htdocs\\galericilerden\\app\\view\\my-favorites.tpl',
      1 => 1516354926,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '219975a61bfb7be1330_47188956',
  'variables' => 
  array (
    'return' => 0,
    'favorite' => 0,
    'adInfo' => 0,
    'userStore' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5a61bfb7cfade1_37798105',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5a61bfb7cfade1_37798105')) {
function content_5a61bfb7cfade1_37798105 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '219975a61bfb7be1330_47188956';
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
					<li class="active">
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

			<h4 class="hidden-lg hidden-md" style="margin-bottom: 25px;">Favorilerim</h4>
			<ul class="profile-tab">
				<li <?php if (getUrl(1) == 'ads') {?>class="active"<?php }?>>
					<a href="<?php echo siteUrl('my-favorites/ads');?>
">Favori İlanlarım</a>
				</li>
				<li <?php if (getUrl(1) == 'search') {?>class="active"<?php }?>>
					<a href="<?php echo siteUrl('my-favorites/search');?>
">Favori Aramalarım</a>
				</li>
			</ul>
	
			<div class="my-favorites"> 
				<?php if (getUrl(1) == 'ads') {?>
					<?php if ($_smarty_tpl->tpl_vars['return']->value['favorites']) {?>
						<?php
$_from = $_smarty_tpl->tpl_vars['return']->value['favorites'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['favorite'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['favorite']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['favorite']->value) {
$_smarty_tpl->tpl_vars['favorite']->_loop = true;
$foreach_favorite_Sav = $_smarty_tpl->tpl_vars['favorite'];
?>
							<?php if (isset($_smarty_tpl->tpl_vars['adInfo'])) {$_smarty_tpl->tpl_vars['adInfo'] = clone $_smarty_tpl->tpl_vars['adInfo'];
$_smarty_tpl->tpl_vars['adInfo']->value = $_smarty_tpl->tpl_vars['return']->value['Ads']->adInfo($_smarty_tpl->tpl_vars['favorite']->value['adsId']); $_smarty_tpl->tpl_vars['adInfo']->nocache = null; $_smarty_tpl->tpl_vars['adInfo']->scope = 0;
} else $_smarty_tpl->tpl_vars['adInfo'] = new Smarty_Variable($_smarty_tpl->tpl_vars['return']->value['Ads']->adInfo($_smarty_tpl->tpl_vars['favorite']->value['adsId']), null, 0);?>
							
							<div class="favorite block" style="padding: 10px;">
								<a href="<?php echo siteUrl('view');?>
/<?php echo $_smarty_tpl->tpl_vars['adInfo']->value['seflink'];?>
-<?php echo $_smarty_tpl->tpl_vars['adInfo']->value['id'];?>
">
									<img src="<?php echo siteUrl('files/ads/thumb');?>
/<?php echo $_smarty_tpl->tpl_vars['adInfo']->value['title_image'];?>
.jpg" width="100" alt="<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['title'];?>
">
									<div class="favorite-left">
										<h5 style="margin-bottom: 5px;"><?php echo $_smarty_tpl->tpl_vars['adInfo']->value['title'];?>
</h5>
										<small style="display: block;">
											<?php if ($_smarty_tpl->tpl_vars['adInfo']->value['category1'] != 0) {?>
												<?php echo categoryInfo($_smarty_tpl->tpl_vars['adInfo']->value['category1'],'kategori_adi');?>

											<?php }?>

											<?php if ($_smarty_tpl->tpl_vars['adInfo']->value['category2'] != 0) {?>
												-> <?php echo categoryInfo($_smarty_tpl->tpl_vars['adInfo']->value['category2'],'kategori_adi');?>

											<?php }?>

											<?php if ($_smarty_tpl->tpl_vars['adInfo']->value['category3'] != 0) {?>
												-> <?php echo categoryInfo($_smarty_tpl->tpl_vars['adInfo']->value['category3'],'kategori_adi');?>

											<?php }?>

											<?php if ($_smarty_tpl->tpl_vars['adInfo']->value['category4'] != 0) {?>
												-> <?php echo categoryInfo($_smarty_tpl->tpl_vars['adInfo']->value['category4'],'kategori_adi');?>

											<?php }?>

											<?php if ($_smarty_tpl->tpl_vars['adInfo']->value['category5'] != 0) {?>
												-> <?php echo categoryInfo($_smarty_tpl->tpl_vars['adInfo']->value['category5'],'kategori_adi');?>

											<?php }?>

											<?php if ($_smarty_tpl->tpl_vars['adInfo']->value['category6'] != 0) {?>
												-> <?php echo categoryInfo($_smarty_tpl->tpl_vars['adInfo']->value['category6'],'kategori_adi');?>

											<?php }?>

											<?php if ($_smarty_tpl->tpl_vars['adInfo']->value['category7'] != 0) {?>
												-> <?php echo categoryInfo($_smarty_tpl->tpl_vars['adInfo']->value['category7'],'kategori_adi');?>

											<?php }?>

											<?php if ($_smarty_tpl->tpl_vars['adInfo']->value['category8'] != 0) {?>
												-> <?php echo categoryInfo($_smarty_tpl->tpl_vars['adInfo']->value['category8'],'kategori_adi');?>

											<?php }?>

											<?php if ($_smarty_tpl->tpl_vars['adInfo']->value['category9'] != 0) {?>
												-> <?php echo categoryInfo($_smarty_tpl->tpl_vars['adInfo']->value['category9'],'kategori_adi');?>

											<?php }?>

											<?php if ($_smarty_tpl->tpl_vars['adInfo']->value['category10'] != 0) {?>
												-> <?php echo categoryInfo($_smarty_tpl->tpl_vars['adInfo']->value['category10'],'kategori_adi');?>

											<?php }?>
										</small>
										<?php if (isset($_smarty_tpl->tpl_vars['userStore'])) {$_smarty_tpl->tpl_vars['userStore'] = clone $_smarty_tpl->tpl_vars['userStore'];
$_smarty_tpl->tpl_vars['userStore']->value = $_smarty_tpl->tpl_vars['return']->value['Store']->getUserStore($_smarty_tpl->tpl_vars['adInfo']->value['user_id']); $_smarty_tpl->tpl_vars['userStore']->nocache = null; $_smarty_tpl->tpl_vars['userStore']->scope = 0;
} else $_smarty_tpl->tpl_vars['userStore'] = new Smarty_Variable($_smarty_tpl->tpl_vars['return']->value['Store']->getUserStore($_smarty_tpl->tpl_vars['adInfo']->value['user_id']), null, 0);?>

										<?php if ($_smarty_tpl->tpl_vars['userStore']->value === false) {?>
											<?php if ($_smarty_tpl->tpl_vars['adInfo']->value['status'] == 1 && $_smarty_tpl->tpl_vars['adInfo']->value['public_end_date'] > time()) {?>
												<span style="font-weight: 700;color: #3c763d;font-size: 13px;">Yayında</span>
											<?php } elseif ($_smarty_tpl->tpl_vars['adInfo']->value['status'] == 1 && $_smarty_tpl->tpl_vars['adInfo']->value['public_end_date'] < time() || $_smarty_tpl->tpl_vars['adInfo']->value['status'] == 2 || $_smarty_tpl->tpl_vars['adInfo']->value['status'] == 3 || $_smarty_tpl->tpl_vars['adInfo']->value['status'] == 4) {?>
												<span style="font-weight: 700;color: #ff263a;font-size: 13px;">Yayında Değil</span>
											<?php }?>
										<?php } else { ?>
											<?php if ($_smarty_tpl->tpl_vars['userStore']->value['status'] == 1) {?>

												<?php if (time() > $_smarty_tpl->tpl_vars['userStore']->value['end_time']) {?>
													<span style="font-weight: 700;color: #ff263a;font-size: 13px;">Yayında Değil</span>
												<?php } else { ?>
													<?php if ($_smarty_tpl->tpl_vars['adInfo']->value['status'] == 1 && $_smarty_tpl->tpl_vars['adInfo']->value['public_end_date'] > time()) {?>
														<span style="font-weight: 700;color: #3c763d;font-size: 13px;">Yayında</span>
													<?php } elseif ($_smarty_tpl->tpl_vars['adInfo']->value['status'] == 1 && $_smarty_tpl->tpl_vars['adInfo']->value['public_end_date'] < time() || $_smarty_tpl->tpl_vars['adInfo']->value['status'] == 2 || $_smarty_tpl->tpl_vars['adInfo']->value['status'] == 3 || $_smarty_tpl->tpl_vars['adInfo']->value['status'] == 4) {?>
														<span style="font-weight: 700;color: #ff263a;font-size: 13px;">Yayında Değil</span>
													<?php }?>
												<?php }?>

											<?php } elseif ($_smarty_tpl->tpl_vars['userStore']->value['status'] == 0) {?>
												<span style="font-weight: 700;color: #ff263a;font-size: 13px;">Yayında Değil</span>
											<?php } elseif ($_smarty_tpl->tpl_vars['userStore']->value['status'] == 2) {?>
												<span style="font-weight: 700;color: #ff263a;font-size: 13px;">Yayında Değil</span>
											<?php }?>
										<?php }?>
									</div>
								</a>
								<div class="favorite-right">
									<a href="<?php echo siteUrl('my-favorites/ads/delete');?>
/<?php echo $_smarty_tpl->tpl_vars['favorite']->value['id'];?>
" title="Sil" style="display: block;color: #333;text-align: right;margin-top: 15px;">
										<i class="material-icons">delete</i>
									</a>
								</div>
							</div>
						<?php
$_smarty_tpl->tpl_vars['favorite'] = $foreach_favorite_Sav;
}
?>

						<ul class="pagination pull-right hidden-sm hidden-xs" style="margin-top: 0;"><?php echo $_smarty_tpl->tpl_vars['return']->value['pagination']['desktopPagination'];?>
</ul>
						<div class="mobilePagination hidden-lg hidden-md" style="margin-top: 0;"><?php echo $_smarty_tpl->tpl_vars['return']->value['pagination']['mobilePagination'];?>
</div>
					<?php } else { ?>
						<div class="block">
							<div class="block-content">
								<p class="text-danger text-center" style="margin-top: 15px;margin-bottom: 15px;"><b>Bir sonuç bulunamadı</b></p>
							</div>
						</div>
					<?php }?>
				<?php } elseif (getUrl(1) == 'search') {?>
					<?php if ($_smarty_tpl->tpl_vars['return']->value['favorites']) {?>
						<link rel="stylesheet" href="<?php echo siteUrl('public/styles/sweetalert.css');?>
" />
						<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo siteUrl('public/scripts/sweetalert.min.js');?>
"><?php echo '</script'; ?>
>
						<div class="block my-store table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>#</th>
										<th>Arama Adı</th>
										<th>İşlemler</th>
									</tr>
								</thead>
								<tbody>
									<?php
$_from = $_smarty_tpl->tpl_vars['return']->value['favorites'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['favorite'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['favorite']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['favorite']->value) {
$_smarty_tpl->tpl_vars['favorite']->_loop = true;
$foreach_favorite_Sav = $_smarty_tpl->tpl_vars['favorite'];
?>
										<tr>
											<td width="5%"><?php echo $_smarty_tpl->tpl_vars['favorite']->value['id'];?>
</td>
											<td>
												<a href="<?php if ($_smarty_tpl->tpl_vars['favorite']->value['category'] > 0) {
echo siteUrl('cat-');
echo $_smarty_tpl->tpl_vars['favorite']->value['category'];?>
/<?php echo categoryInfo($_smarty_tpl->tpl_vars['favorite']->value['category'],'seflink');
if ($_smarty_tpl->tpl_vars['favorite']->value['city'] > 0) {?>&city=<?php echo $_smarty_tpl->tpl_vars['favorite']->value['city'];
}
if ($_smarty_tpl->tpl_vars['favorite']->value['county'] > 0) {?>&county=<?php echo $_smarty_tpl->tpl_vars['favorite']->value['county'];
}
if ($_smarty_tpl->tpl_vars['favorite']->value['price_min'] > 0) {?>&priceMin=<?php echo $_smarty_tpl->tpl_vars['favorite']->value['price_min'];
}
if ($_smarty_tpl->tpl_vars['favorite']->value['price_max'] > 0) {?>&priceMax=<?php echo $_smarty_tpl->tpl_vars['favorite']->value['price_max'];
}
} else {
echo siteUrl('category-special');?>
/<?php if ($_smarty_tpl->tpl_vars['favorite']->value['category_special'] == 1) {?>ilk-sahibinden<?php } elseif ($_smarty_tpl->tpl_vars['favorite']->value['category_special'] == 2) {?>yeni-gibi<?php } elseif ($_smarty_tpl->tpl_vars['favorite']->value['category_special'] == 3) {?>ekspertizli<?php } elseif ($_smarty_tpl->tpl_vars['favorite']->value['category_special'] == 4) {?>acil<?php } elseif ($_smarty_tpl->tpl_vars['favorite']->value['category_special'] == 5) {?>fiyati-dusenler<?php }
if ($_smarty_tpl->tpl_vars['favorite']->value['city'] > 0) {?>&city=<?php echo $_smarty_tpl->tpl_vars['favorite']->value['city'];
}
if ($_smarty_tpl->tpl_vars['favorite']->value['county'] > 0) {?>&county=<?php echo $_smarty_tpl->tpl_vars['favorite']->value['county'];
}
if ($_smarty_tpl->tpl_vars['favorite']->value['price_min'] > 0) {?>&priceMin=<?php echo $_smarty_tpl->tpl_vars['favorite']->value['price_min'];
}
if ($_smarty_tpl->tpl_vars['favorite']->value['price_max'] > 0) {?>&priceMax=<?php echo $_smarty_tpl->tpl_vars['favorite']->value['price_max'];
}
}
$_from = $_smarty_tpl->tpl_vars['return']->value['FavoritesSearch']->favoriteSearchItems($_smarty_tpl->tpl_vars['favorite']->value['id']);
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['item']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$foreach_item_Sav = $_smarty_tpl->tpl_vars['item'];
if ($_smarty_tpl->tpl_vars['item']->value['type'] == 1) {
if ($_smarty_tpl->tpl_vars['item']->value['itemValueMin'] > 0) {?>&item_<?php echo $_smarty_tpl->tpl_vars['item']->value['itemId'];?>
_min=<?php echo $_smarty_tpl->tpl_vars['item']->value['itemValueMin'];
}
if ($_smarty_tpl->tpl_vars['item']->value['itemValueMax'] > 0) {?>&item_<?php echo $_smarty_tpl->tpl_vars['item']->value['itemId'];?>
_max=<?php echo $_smarty_tpl->tpl_vars['item']->value['itemValueMax'];
}
} elseif ($_smarty_tpl->tpl_vars['item']->value['type'] == 2) {
if ($_smarty_tpl->tpl_vars['item']->value['itemSelect'] > 0) {?>&item_<?php echo $_smarty_tpl->tpl_vars['item']->value['itemId'];?>
=<?php echo $_smarty_tpl->tpl_vars['item']->value['itemSelect'];
}
}
$_smarty_tpl->tpl_vars['item'] = $foreach_item_Sav;
}
if ($_smarty_tpl->tpl_vars['favorite']->value['user_type'] != 'null') {?>&type=<?php echo $_smarty_tpl->tpl_vars['favorite']->value['user_type'];
}
if ($_smarty_tpl->tpl_vars['favorite']->value['orderby'] != 'null') {?>&orderby=<?php echo $_smarty_tpl->tpl_vars['favorite']->value['orderby'];
}?>" style="display: block;width: 100%;height: 100%;" target="_blank"><?php echo $_smarty_tpl->tpl_vars['favorite']->value['name'];?>
</a>
											</td>
											<td width="20%">
												<a href="javascript:void(0);" onclick="editFavoriteSearch(<?php echo $_smarty_tpl->tpl_vars['favorite']->value['id'];?>
, '<?php echo $_smarty_tpl->tpl_vars['favorite']->value['name'];?>
');" style="display: inline-block;width: auto;padding: 0;">
													<button type="button" class="btn btn-primary" style="font-size: 13px;">Düzenle</button>
												</a>
												<a href="<?php echo siteUrl('my-favorites/search/delete');?>
/<?php echo $_smarty_tpl->tpl_vars['favorite']->value['id'];?>
" style="display: inline-block;width: auto;padding: 0;">
													<button type="button" class="btn btn-primary" style="font-size: 13px;">Sil</button>
												</a>
											</td>
										</tr>
									<?php
$_smarty_tpl->tpl_vars['favorite'] = $foreach_favorite_Sav;
}
?>
								</tbody>
							</table>
						</div>

						<ul class="pagination pull-right hidden-sm hidden-xs" style="margin-top: 0;"><?php echo $_smarty_tpl->tpl_vars['return']->value['pagination']['desktopPagination'];?>
</ul>
						<div class="mobilePagination hidden-lg hidden-md" style="margin-top: 0;"><?php echo $_smarty_tpl->tpl_vars['return']->value['pagination']['mobilePagination'];?>
</div>
					<?php } else { ?>
						<div class="block">
							<div class="block-content">
								<p class="text-danger text-center" style="margin-top: 15px;margin-bottom: 15px;"><b>Bir sonuç bulunamadı</b></p>
							</div>
						</div>
					<?php }?>
				<?php }?>
			</div>
		</div>
	</div>
</div><?php }
}
?>