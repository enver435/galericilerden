<?php /* Smarty version 3.1.27, created on 2017-12-11 14:27:56
         compiled from "C:\xampp\htdocs\galericilerden\app\view\index.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:123085a2e87dc509c11_97123490%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a12493decb1c8b1c97ecdcb39dc170c427714550' => 
    array (
      0 => 'C:\\xampp\\htdocs\\galericilerden\\app\\view\\index.tpl',
      1 => 1509031656,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '123085a2e87dc509c11_97123490',
  'variables' => 
  array (
    'return' => 0,
    'slider' => 0,
    'ads' => 0,
    'store' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5a2e87dc586035_33311565',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5a2e87dc586035_33311565')) {
function content_5a2e87dc586035_33311565 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_capitalize')) require_once 'C:\\xampp\\htdocs\\galericilerden\\system\\plugin\\smarty\\plugins\\modifier.capitalize.php';

$_smarty_tpl->properties['nocache_hash'] = '123085a2e87dc509c11_97123490';
?>
<div id="main">
	<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

	<div class="page-content">
		<div class="container">
			<div class="row">
				<?php if (isset($_smarty_tpl->tpl_vars['Ads'])) {$_smarty_tpl->tpl_vars['Ads'] = clone $_smarty_tpl->tpl_vars['Ads'];
$_smarty_tpl->tpl_vars['Ads']->value = $_smarty_tpl->tpl_vars['return']->value['Ads']; $_smarty_tpl->tpl_vars['Ads']->nocache = null; $_smarty_tpl->tpl_vars['Ads']->scope = 3;
} else $_smarty_tpl->tpl_vars['Ads'] = new Smarty_Variable($_smarty_tpl->tpl_vars['return']->value['Ads'], null, 3);
$_ptr = $_smarty_tpl->parent; while ($_ptr != null) {$_ptr->tpl_vars['Ads'] = clone $_smarty_tpl->tpl_vars['Ads']; $_ptr = $_ptr->parent; }
Smarty::$global_tpl_vars['Ads'] = clone $_smarty_tpl->tpl_vars['Ads'];?>
				<?php echo $_smarty_tpl->getSubTemplate ("static/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

				<div class="col-lg-9 col-md-9">
					<div class="home-top" <?php if (!$_smarty_tpl->tpl_vars['return']->value['sliders']) {?>style="margin-bottom: 0;"<?php }?>>
						<div class="row">
							<div class="col-md-8">
								<?php if ($_smarty_tpl->tpl_vars['return']->value['sliders']) {?>
									<div class="slider">
										<div class="owl-carousel owl-theme">
											<?php
$_from = $_smarty_tpl->tpl_vars['return']->value['sliders'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['slider'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['slider']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['slider']->value) {
$_smarty_tpl->tpl_vars['slider']->_loop = true;
$foreach_slider_Sav = $_smarty_tpl->tpl_vars['slider'];
?>
												<div class="item" style="background-image: url(<?php echo siteUrl('files/slider/');
echo $_smarty_tpl->tpl_vars['slider']->value['image'];?>
)"></div>
											<?php
$_smarty_tpl->tpl_vars['slider'] = $foreach_slider_Sav;
}
?>
										</div>
									</div>
								<?php }?>
							</div>
							<div class="col-md-4 hidden-sm hidden-xs">
								<?php if ($_smarty_tpl->tpl_vars['return']->value['bannerHome']['banner_type'] == 1) {?>
									<?php if ($_smarty_tpl->tpl_vars['return']->value['bannerHome']['banner_img'] != '' || $_smarty_tpl->tpl_vars['return']->value['bannerHome']['banner_img_link'] != '') {?>
										<div class="banner250">
											<a href="<?php echo $_smarty_tpl->tpl_vars['return']->value['bannerHome']['banner_link'];?>
" target="_blank">
												<img src="<?php if ($_smarty_tpl->tpl_vars['return']->value['bannerHome']['banner_img_link'] == '') {
echo siteUrl('files/banner');?>
/<?php echo $_smarty_tpl->tpl_vars['return']->value['bannerHome']['banner_img'];
} else {
echo $_smarty_tpl->tpl_vars['return']->value['bannerHome']['banner_img_link'];
}?>" width="100%" height="100%" alt="banner250x250">
											</a>
										</div>
									<?php }?>
								<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['bannerHome']['banner_type'] == 2) {?>
									<?php if ($_smarty_tpl->tpl_vars['return']->value['bannerHome']['banner_html'] != '') {?>
										<div class="banner250">
											<?php echo $_smarty_tpl->tpl_vars['return']->value['bannerHome']['banner_html'];?>

										</div>
									<?php }?>
								<?php }?>
							</div>
						</div>
					</div>
					<div class="home-bottom">
						<div class="blocks">
							<div class="block">
								<div class="block-title">
									<h5>Ana Sayfa Vitrini</h5>
								</div>
								<div class="block-content">
									<?php if ($_smarty_tpl->tpl_vars['return']->value['showCaseHomeAds']) {?>
										<?php
$_from = $_smarty_tpl->tpl_vars['return']->value['showCaseHomeAds'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['ads'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['ads']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['ads']->value) {
$_smarty_tpl->tpl_vars['ads']->_loop = true;
$foreach_ads_Sav = $_smarty_tpl->tpl_vars['ads'];
?>
											<div class="col-md-2 col-sm-2 col-xs-4">
												<div class="list">
													<a href="<?php echo siteUrl('view');?>
/<?php echo $_smarty_tpl->tpl_vars['ads']->value['seflink'];?>
-<?php echo $_smarty_tpl->tpl_vars['ads']->value['id'];?>
" style="padding-bottom: 0;">
														<img src="<?php echo siteUrl('files/ads/thumb');?>
/<?php echo $_smarty_tpl->tpl_vars['ads']->value['title_image'];?>
.jpg" width="100%" height="100%" alt="<?php echo $_smarty_tpl->tpl_vars['ads']->value['title'];?>
">
													</a>
													<div class="title">
														<a href="<?php echo siteUrl('view');?>
/<?php echo $_smarty_tpl->tpl_vars['ads']->value['seflink'];?>
-<?php echo $_smarty_tpl->tpl_vars['ads']->value['id'];?>
" style="padding: 4px;font-size: 11px;"><?php echo strShorten($_smarty_tpl->tpl_vars['ads']->value['title'],35,'...');?>
</a>
													</div>
												</div>
											</div>
										<?php
$_smarty_tpl->tpl_vars['ads'] = $foreach_ads_Sav;
}
?>
									<?php } else { ?>
									<?php }?>
								</div>
							</div>
							<div class="block">
								<div class="block-title">
									<h5>Acil İlanlar</h5>
								</div>
								<div class="block-content">
									<?php if ($_smarty_tpl->tpl_vars['return']->value['showCaseAcil']) {?>
										<?php
$_from = $_smarty_tpl->tpl_vars['return']->value['showCaseAcil'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['ads'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['ads']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['ads']->value) {
$_smarty_tpl->tpl_vars['ads']->_loop = true;
$foreach_ads_Sav = $_smarty_tpl->tpl_vars['ads'];
?>
											<div class="col-md-2 col-sm-2 col-xs-4">
												<div class="list">
													<a href="<?php echo siteUrl('view');?>
/<?php echo $_smarty_tpl->tpl_vars['ads']->value['seflink'];?>
-<?php echo $_smarty_tpl->tpl_vars['ads']->value['id'];?>
" style="padding-bottom: 0;">
														<img src="<?php echo siteUrl('files/ads/thumb');?>
/<?php echo $_smarty_tpl->tpl_vars['ads']->value['title_image'];?>
.jpg" width="100%" height="100%" alt="<?php echo $_smarty_tpl->tpl_vars['ads']->value['title'];?>
">
													</a>
													<div class="title">
														<a href="<?php echo siteUrl('view');?>
/<?php echo $_smarty_tpl->tpl_vars['ads']->value['seflink'];?>
-<?php echo $_smarty_tpl->tpl_vars['ads']->value['id'];?>
" style="padding: 4px;font-size: 11px;"><?php echo strShorten($_smarty_tpl->tpl_vars['ads']->value['title'],35,'...');?>
</a>
													</div>
												</div>
											</div>
										<?php
$_smarty_tpl->tpl_vars['ads'] = $foreach_ads_Sav;
}
?>
									<?php } else { ?>
									<?php }?>
								</div>
							</div>
							<div class="block">
								<div class="block-title">
									<h5>Mağazalar</h5>
								</div>
								<div class="block-content" style="padding-bottom: 25px;padding-left: 25px;padding-right: 25px;">
									<?php if ($_smarty_tpl->tpl_vars['return']->value['stores']) {?>
										<div class="store-slider">
											<div class="owl-carousel owl-theme" style="position: static;">
												<?php
$_from = $_smarty_tpl->tpl_vars['return']->value['stores'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['store'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['store']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['store']->value) {
$_smarty_tpl->tpl_vars['store']->_loop = true;
$foreach_store_Sav = $_smarty_tpl->tpl_vars['store'];
?>
													<div class="item">
														<a href="http://<?php echo $_smarty_tpl->tpl_vars['store']->value['store_domain'];
echo $_smarty_tpl->tpl_vars['return']->value['siteConfig']['siteStoreDomain'];?>
" style="padding: 0;" target="_blank">
															<img src="<?php echo siteUrl('files/store/big');?>
/<?php echo $_smarty_tpl->tpl_vars['store']->value['store_logo'];?>
.jpg" width="100%" height="100%" alt="<?php echo $_smarty_tpl->tpl_vars['store']->value['store_name'];?>
">
															<h5 style="margin-bottom: 0;text-align: center;font-size: 13px;"><?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['store']->value['store_name']);?>
</h5>
														</a>
													</div>
												<?php
$_smarty_tpl->tpl_vars['store'] = $foreach_store_Sav;
}
?>
											</div>
										</div>
									<?php }?>
								</div>
							</div>
							<div class="bannerHomeMobile hidden-lg hidden-md">
								<?php if ($_smarty_tpl->tpl_vars['return']->value['bannerHomeMobile']['banner_type'] == 1) {?>
									<?php if ($_smarty_tpl->tpl_vars['return']->value['bannerHomeMobile']['banner_img'] != '' || $_smarty_tpl->tpl_vars['return']->value['bannerHomeMobile']['banner_img_link'] != '') {?>
										<a href="<?php echo $_smarty_tpl->tpl_vars['return']->value['bannerHomeMobile']['banner_link'];?>
" target="_blank">
											<img src="<?php if ($_smarty_tpl->tpl_vars['return']->value['bannerHomeMobile']['banner_img_link'] == '') {
echo siteUrl('files/banner');?>
/<?php echo $_smarty_tpl->tpl_vars['return']->value['bannerHomeMobile']['banner_img'];
} else {
echo $_smarty_tpl->tpl_vars['return']->value['bannerHomeMobile']['banner_img_link'];
}?>" width="100%" height="100%" alt="banner home mobile">
										</a>
									<?php }?>
								<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['bannerHomeMobile']['banner_type'] == 2) {?>
									<?php if ($_smarty_tpl->tpl_vars['return']->value['bannerHomeMobile']['banner_html'] != '') {?>
										<?php echo $_smarty_tpl->tpl_vars['return']->value['bannerHomeMobile']['banner_html'];?>

									<?php }?>
								<?php }?>
							</div>
							<div class="block">
								<div class="block-title">
									<h5>En Son Eklenen İlanlar</h5>
								</div>
								<div class="block-content">
									<?php if ($_smarty_tpl->tpl_vars['return']->value['lastAds']) {?>
										<?php
$_from = $_smarty_tpl->tpl_vars['return']->value['lastAds'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['ads'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['ads']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['ads']->value) {
$_smarty_tpl->tpl_vars['ads']->_loop = true;
$foreach_ads_Sav = $_smarty_tpl->tpl_vars['ads'];
?>
											<div class="col-md-2 col-sm-2 col-xs-4">
												<div class="list">
													<a href="<?php echo siteUrl('view');?>
/<?php echo $_smarty_tpl->tpl_vars['ads']->value['seflink'];?>
-<?php echo $_smarty_tpl->tpl_vars['ads']->value['id'];?>
" style="padding-bottom: 0;">
														<img src="<?php echo siteUrl('files/ads/thumb');?>
/<?php echo $_smarty_tpl->tpl_vars['ads']->value['title_image'];?>
.jpg" width="100%" height="100%" alt="<?php echo $_smarty_tpl->tpl_vars['ads']->value['title'];?>
">
													</a>
													<div class="title">
														<a href="<?php echo siteUrl('view');?>
/<?php echo $_smarty_tpl->tpl_vars['ads']->value['seflink'];?>
-<?php echo $_smarty_tpl->tpl_vars['ads']->value['id'];?>
" style="padding: 4px;font-size: 11px;"><?php echo strShorten($_smarty_tpl->tpl_vars['ads']->value['title'],35,'...');?>
</a>
													</div>
												</div>
											</div>
										<?php
$_smarty_tpl->tpl_vars['ads'] = $foreach_ads_Sav;
}
?>
									<?php } else { ?>
									<?php }?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><?php }
}
?>