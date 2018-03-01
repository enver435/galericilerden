<?php /* Smarty version 3.1.27, created on 2018-01-18 13:33:21
         compiled from "C:\xampp\htdocs\galericilerden\app\view\view.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:90695a609411ecef42_64417634%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '05e0247d03a5373b2898cc3679b71fcf07365f2b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\galericilerden\\app\\view\\view.tpl',
      1 => 1516278690,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '90695a609411ecef42_64417634',
  'variables' => 
  array (
    'return' => 0,
    'Category' => 0,
    'time' => 0,
    'image' => 0,
    'titleI' => 0,
    'thumbI' => 0,
    'item' => 0,
    'itemInfo' => 0,
    'itemSelectInfo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5a609412179ca8_20474305',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5a609412179ca8_20474305')) {
function content_5a609412179ca8_20474305 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\xampp\\htdocs\\galericilerden\\system\\plugin\\smarty\\plugins\\modifier.date_format.php';
if (!is_callable('smarty_modifier_capitalize')) require_once 'C:\\xampp\\htdocs\\galericilerden\\system\\plugin\\smarty\\plugins\\modifier.capitalize.php';

$_smarty_tpl->properties['nocache_hash'] = '90695a609411ecef42_64417634';
$_smarty_tpl->_capture_stack[0][] = array('default', 'time', null); ob_start(); ?>@<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['update_time'];
list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<div id="main">
	<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

	<div class="page-content">
		<div class="container">
			<div class="ad-detail">
				<ul class="breadcrumb hidden-sm hidden-xs">
				    <li><a href="<?php echo SITE_URL;?>
">Anasayfa</a></li>
				    <?php echo $_smarty_tpl->tpl_vars['Category']->value->getAllTopCategory($_smarty_tpl->tpl_vars['return']->value['categoryInfo']['Id'],true);?>

				</ul>
				<?php if ($_smarty_tpl->tpl_vars['return']->value['adInfo']['user_id'] == $_SESSION['userId'] && $_smarty_tpl->tpl_vars['return']->value['adInfo']['status'] == 4) {?>
					<div class="message-panel" style="text-align: center;">
						<i class="material-icons" style="font-size: 70px;color: #ff263a;">info_outline</i>
						<h4 style="margin-bottom: 0;color: #ff263a;">İlan Pasiftir</h4>
						<p style="color: #ff263a;padding-top: 10px;padding-bottom: 0;">Bu ilan pasif olduğu için yanlız siz görebilirsiniz</p>
					</div>
				<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['adInfo']['user_id'] == $_SESSION['userId'] && $_smarty_tpl->tpl_vars['return']->value['adInfo']['status'] == 2) {?>
					<div class="message-panel" style="text-align: center;padding: 10px;padding-top: 25px;">
						<i class="material-icons" style="font-size: 70px;color: #ff263a;">access_time</i>
						<h4 style="margin-bottom: 0;color: #ff263a;">İlan Onay Sürecindedir</h4>

						<p style="color: #ff263a;padding-top: 10px;padding-bottom: 0px;margin-bottom: 0;">İlan Giriş Tarihi: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['return']->value['adInfo']['update_time'],"%d");?>
 <?php echo monthName($_smarty_tpl->tpl_vars['return']->value['adInfo']['update_time']);?>
 <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['return']->value['adInfo']['update_time'],"%Y");?>
 <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['return']->value['adInfo']['update_time'],"%H:%M");?>
</p>
						<p style="color: #ff263a;padding-top: 0px;padding-bottom: 0;">İlan Onay Tahmini Bekleme Süresi: <?php echo time_elapsed_string($_smarty_tpl->tpl_vars['time']->value);?>
</p>

						<p style="line-height: inherit;">Onay sürecinde geçilen süre, doping süresine eklenecektir.<br>Onay sürecindeki ilanlarla ilgili çağrı merkezinden işlem yapılmamaktadır.</p>
					</div>
				<?php }?>
				<div class="row">
					<div class="col-md-5">
						<h1 class="ad-title" style="margin-bottom: 15px;font-size: 18px;"><?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['title'];?>
</h1>
						<div class="ad-detail-block">
							<div class="ad-images-title">
								<?php if (isset($_smarty_tpl->tpl_vars['titleI'])) {$_smarty_tpl->tpl_vars['titleI'] = clone $_smarty_tpl->tpl_vars['titleI'];
$_smarty_tpl->tpl_vars['titleI']->value = 0; $_smarty_tpl->tpl_vars['titleI']->nocache = null; $_smarty_tpl->tpl_vars['titleI']->scope = 0;
} else $_smarty_tpl->tpl_vars['titleI'] = new Smarty_Variable(0, null, 0);?>
								
								<a class="item" href="<?php echo siteUrl('files/ads/big');?>
/<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['title_image'];?>
.jpg">
				                    <img src="<?php echo siteUrl('files/ads/medium');?>
/<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['title_image'];?>
.jpg" width="100%" alt="">
				                </a>
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
									<?php if ($_smarty_tpl->tpl_vars['image']->value['image'] != $_smarty_tpl->tpl_vars['return']->value['adInfo']['title_image']) {?>
										<a class="item" href="<?php echo siteUrl('files/ads/big');?>
/<?php echo $_smarty_tpl->tpl_vars['image']->value['image'];?>
.jpg">
						                    <img src="<?php echo siteUrl('files/ads/medium');?>
/<?php echo $_smarty_tpl->tpl_vars['image']->value['image'];?>
.jpg" width="100%" alt="">
						                </a>
					                <?php }?>

					                <?php if (isset($_smarty_tpl->tpl_vars['titleI'])) {$_smarty_tpl->tpl_vars['titleI'] = clone $_smarty_tpl->tpl_vars['titleI'];
$_smarty_tpl->tpl_vars['titleI']->value = $_smarty_tpl->tpl_vars['titleI']->value+1; $_smarty_tpl->tpl_vars['titleI']->nocache = null; $_smarty_tpl->tpl_vars['titleI']->scope = 0;
} else $_smarty_tpl->tpl_vars['titleI'] = new Smarty_Variable($_smarty_tpl->tpl_vars['titleI']->value+1, null, 0);?>
								<?php
$_smarty_tpl->tpl_vars['image'] = $foreach_image_Sav;
}
?>
							</div>
							<div class="mobile-ad-view hidden-lg hidden-md">
								<div class="list-bottom">
									<div class="row">
										<div class="col-xs-6" style="padding: 10px;line-height: 35px;" onclick="showText();">
											<span>Açıklama</span>
										</div>
										<div class="col-xs-6" style="padding: 10px;line-height: 17px;" onclick="showLocation(<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['marker_lat'];?>
, <?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['marker_lng'];?>
, <?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['zoom'];?>
);">
											<span>Konum</span><br>
											<small style="font-size: 10px;"><span class="text-capitalize"><?php echo mb_strtolower(cityInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['city'],'CityName'), 'UTF-8');?>
</span>, <span class="text-capitalize"><?php echo mb_strtolower(countyInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['county'],'CountyName'), 'UTF-8');?>
</span></small>
										</div>
									</div>
								</div>
								<div class="map-content" style="display: none;">
									<div class="col-md-12">
										<button type="button" onclick="closeLocation();" class="btn btn-primary" style="margin-top: 15px;margin-bottom: 15px;width: 100%;">Kapat</button>
									</div>
									<div id="ad-detail-map2"></div>
								</div>
								<div class="ad-text" style="display: none;word-break: break-word;">
									<div class="col-md-12">
										<button type="button" onclick="closeText();" class="btn btn-primary" style="margin-top: 15px;margin-bottom: 15px;width: 100%;border: 1px solid #e8e8e8;">Kapat</button>
										<div class="texts" style="padding-bottom: 15px;">
											<?php if ($_smarty_tpl->tpl_vars['return']->value['adInfo']['text'] != '') {?>
												<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['text'];?>

											<?php } else { ?>
												Açıklama Yok
											<?php }?>
										</div>
									</div>
								</div>
								<div class="mobile-ad-user">
									<?php if ($_smarty_tpl->tpl_vars['return']->value['adInfo']['phone_status'] == 1) {?>
										<div class="col-xs-4">
											<a href="javascript:;" data-toggle="modal" data-target="#phonesModal" style="padding: 0;">
												<i class="material-icons">phone</i> Ara
											</a>
										</div>
									<?php }?>
									<div class="<?php if ($_smarty_tpl->tpl_vars['return']->value['adInfo']['phone_status'] == 0 && $_smarty_tpl->tpl_vars['return']->value['adInfo']['message_status'] == 0) {?>col-xs-12<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['adInfo']['phone_status'] == 0 || $_smarty_tpl->tpl_vars['return']->value['adInfo']['message_status'] == 0) {?>col-xs-8<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['adInfo']['phone_status'] == 1 && $_smarty_tpl->tpl_vars['return']->value['adInfo']['message_status'] == 1) {?>col-xs-4<?php }?> text-capitalize">
										<?php if ($_smarty_tpl->tpl_vars['return']->value['getUserStore'] === false) {?>
											<a href="<?php echo siteUrl('user');?>
-<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['user_id'];?>
/<?php echo userInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['user_id'],'seflink');?>
" style="padding: 0;">
												<?php echo userInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['user_id'],'name');?>
 <?php echo userInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['user_id'],'surname');?>

											</a>
										<?php } else { ?>
											<a href="http://<?php echo $_smarty_tpl->tpl_vars['return']->value['getUserStore']['store_domain'];
echo $_smarty_tpl->tpl_vars['return']->value['siteConfig']['siteStoreDomain'];?>
" style="padding: 0;" target="_blank">
												<?php echo mb_strtoupper($_smarty_tpl->tpl_vars['return']->value['getUserStore']['store_name'], 'UTF-8');?>

											</a>
										<?php }?>
									</div>
									<?php if ($_smarty_tpl->tpl_vars['return']->value['adInfo']['message_status'] == 1) {?>
										<div class="col-xs-4" <?php if ($_smarty_tpl->tpl_vars['return']->value['adInfo']['phone_status'] == 0) {?>style="width: 30%;"<?php }?>>
											<a href="<?php if ($_SESSION['login']) {
if ($_SESSION['userId'] != $_smarty_tpl->tpl_vars['return']->value['adInfo']['user_id']) {
echo siteUrl('send-message');?>
/<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['id'];
} else { ?>javascript:;<?php }
} else { ?>javascript:;<?php }?>" <?php if (!$_SESSION['login']) {?>data-toggle="modal" data-target="#loginModal"<?php }?>>
												<i class="material-icons">message</i> Soru Sor
											</a>
										</div>
									<?php }?>
								</div>
								<div class="mobile-location">
									<ul>
										<li class="city text-capitalize"><?php echo mb_strtolower(cityInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['city'],'CityName'), 'UTF-8');?>
, </li><li class="county text-capitalize"><?php echo mb_strtolower(countyInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['county'],'CountyName'), 'UTF-8');?>
</li><?php if ($_smarty_tpl->tpl_vars['return']->value['adInfo']['neighborhood'] > 0) {?><li class="neighborhood text-capitalize">, <?php echo mb_strtolower(neighborhoodInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['neighborhood'],'NeighborhoodName'), 'UTF-8');?>
</li><?php }?>
									</ul>
									<div class="share-buttons" style="text-align: center;">
										<ul>
											<li>
												<a href="javascript:;" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php echo siteUrl('view');?>
/<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['seflink'];?>
-<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['id'];?>
');return false;">
													<img src="<?php echo siteUrl('public/images/facebook.svg');?>
" width="32" height="32" alt="facebook">
												</a>
											</li>
											<li>
												<a href="javascript:;" onclick="window.open('https://twitter.com/share?url=<?php echo siteUrl('view');?>
/<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['seflink'];?>
-<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['id'];?>
&text=<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['title'];?>
');return false;">
													<img src="<?php echo siteUrl('public/images/twitter.svg');?>
" width="32" height="32" alt="twitter">
												</a>
											</li>
											<li>
												<a href="javascript:;" onclick="window.open('https://plus.google.com/share?url=<?php echo siteUrl('view');?>
/<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['seflink'];?>
-<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['id'];?>
');return false;">
													<img src="<?php echo siteUrl('public/images/google-plus.svg');?>
" width="32" height="32" alt="google plus">
												</a>
											</li>
											<li>
												<a href="javascript:;" onclick="window.open('http://pinterest.com/pin/create/button/?url=<?php echo siteUrl('view');?>
/<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['seflink'];?>
-<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['id'];?>
&media=<?php echo siteUrl('files/ads/medium');?>
/<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['title_image'];?>
.jpg&description=<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['title'];?>
');return false;">
													<img src="<?php echo siteUrl('public/images/pinterest.svg');?>
" width="32" height="32" alt="pinterest">
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="ad-thumb-images">
								<?php if (isset($_smarty_tpl->tpl_vars['thumbI'])) {$_smarty_tpl->tpl_vars['thumbI'] = clone $_smarty_tpl->tpl_vars['thumbI'];
$_smarty_tpl->tpl_vars['thumbI']->value = 0; $_smarty_tpl->tpl_vars['thumbI']->nocache = null; $_smarty_tpl->tpl_vars['thumbI']->scope = 0;
} else $_smarty_tpl->tpl_vars['thumbI'] = new Smarty_Variable(0, null, 0);?>
								
								<div class="swiper-container">
							        <div class="swiper-wrapper">
							            <div class="swiper-slide">
							            	<a href="javascript:void(0);" onclick="$('.ad-images-title').trigger('to.owl.carousel', 0)">
							                    <img src="<?php echo siteUrl('files/ads/thumb');?>
/<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['title_image'];?>
.jpg" width="100%" alt="<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['title'];?>
 küçük resim 1">
							                </a>
							            </div>
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
											<?php if ($_smarty_tpl->tpl_vars['image']->value['image'] != $_smarty_tpl->tpl_vars['return']->value['adInfo']['title_image']) {?>
												<div class="swiper-slide">
													<a href="javascript:void(0);" onclick="$('.ad-images-title').trigger('to.owl.carousel', <?php echo $_smarty_tpl->tpl_vars['thumbI']->value;?>
)">
									                    <img src="<?php echo siteUrl('files/ads/thumb');?>
/<?php echo $_smarty_tpl->tpl_vars['image']->value['image'];?>
.jpg" width="100%" alt="<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['title'];?>
 küçük resim <?php echo $_smarty_tpl->tpl_vars['titleI']->value;?>
">
									                </a>
												</div>
							                <?php }?>

							                <?php if (isset($_smarty_tpl->tpl_vars['thumbI'])) {$_smarty_tpl->tpl_vars['thumbI'] = clone $_smarty_tpl->tpl_vars['thumbI'];
$_smarty_tpl->tpl_vars['thumbI']->value = $_smarty_tpl->tpl_vars['thumbI']->value+1; $_smarty_tpl->tpl_vars['thumbI']->nocache = null; $_smarty_tpl->tpl_vars['thumbI']->scope = 0;
} else $_smarty_tpl->tpl_vars['thumbI'] = new Smarty_Variable($_smarty_tpl->tpl_vars['thumbI']->value+1, null, 0);?>
										<?php
$_smarty_tpl->tpl_vars['image'] = $foreach_image_Sav;
}
?>
							        </div>
							        <!-- Add Pagination -->
							        <div class="swiper-pagination"></div>

							        <div class="swiper-button-prev"></div>
    								<div class="swiper-button-next"></div>
							    </div>
							</div>
							
							<link rel="stylesheet" href="<?php echo siteUrl('public/styles/swiper.min.css');?>
">
							<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo siteUrl('public/scripts/lightgallery-all.min.js');?>
"><?php echo '</script'; ?>
>
							<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo siteUrl('public/scripts/swiper.min.js');?>
"><?php echo '</script'; ?>
>
							
								<?php echo '<script'; ?>
 type="text/javascript">
									$(function() {

										var owlEventTitle = $('.ad-images-title');
							            owlEventTitle.owlCarousel({
							                items: 1,
							                lazyLoad: true,
							                loop: false,
							                margin: 0,
							                dots: true,
							                nav: false,
							                autoHeight: false
							            });

							            var swiper = new Swiper('.swiper-container', {
									        pagination: '.swiper-pagination',
									        paginationType: 'fraction',
									        slidesPerView: 4,
									        slidesPerColumn: 2,
									        paginationClickable: true,
									        spaceBetween: 5,
									        keyboardControl: true
									    });

							            var slide = 0;

									    $('.swiper-button-next').click(function() {

									    	var countSlide = $('.swiper-slide').length;

									    	if(countSlide > 8 && countSlide > (slide + 8))
									    	{
									    		slide = slide + 9;
									    	}

									    	swiper.slideTo(slide, 300);
									    });

									    $('.swiper-button-prev').click(function() {

									    	var countSlide = $('.swiper-slide').length;

									    	if(slide > 0)
									    	{
									    		slide = slide - 9;
									    	}

									    	swiper.slideTo(slide, 300);
									    });

							            $('.ad-images-title').lightGallery({selector: '.item'}); 
								            
									});
								<?php echo '</script'; ?>
>
							
						</div>
					</div>
					<div class="col-md-4">
						<div class="ad-detail-block">
							<font color="#ff0000">
								<h4 class="ad-price">
									<?php echo number_format($_smarty_tpl->tpl_vars['return']->value['adInfo']['price'],0,".",",");?>

									<?php if ($_smarty_tpl->tpl_vars['return']->value['adInfo']['price_type'] == 0) {?>
										<i class="icon icon-tl"></i>
									<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['adInfo']['price_type'] == 1) {?>
										<i class="icon icon-euro"></i>
									<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['adInfo']['price_type'] == 2) {?>
										<i class="icon icon-usd"></i>
									<?php }?>
								</h4>
							</font>
							<div class="ad-location hidden-sm hidden-xs">
								<ul>
									<li class="city text-capitalize"><?php echo mb_strtolower(cityInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['city'],'CityName'), 'UTF-8');?>
</li> / <li class="county text-capitalize"><?php echo mb_strtolower(countyInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['county'],'CountyName'), 'UTF-8');?>
</li><?php if ($_smarty_tpl->tpl_vars['return']->value['adInfo']['neighborhood'] > 0) {?> / <li class="neighborhood text-capitalize"><?php echo mb_strtolower(neighborhoodInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['neighborhood'],'NeighborhoodName'), 'UTF-8');?>
</li><?php }?>
								</ul>
							</div>
							<div class="ad-details">
								<ul>
									<li>
										<strong class="detail-list-title">İlan No: </strong>
										<span class="detail-list-value"><?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['id'];?>
</span>
									</li>
									<li>
										<strong class="detail-list-title">İlan Tarihi: </strong>
										<span class="detail-list-value"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['return']->value['adInfo']['create_time'],"%d");?>
 <?php echo monthName($_smarty_tpl->tpl_vars['return']->value['adInfo']['create_time']);?>
 <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['return']->value['adInfo']['create_time'],"%Y");?>
</span>
									</li>
									<?php if ($_smarty_tpl->tpl_vars['return']->value['adInfo']['category2'] != 0) {?>
										<li>
											<strong class="detail-list-title">Marka: </strong>
											<span class="detail-list-value"><?php echo categoryInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['category2'],'kategori_adi');?>
</span>
										</li>
									<?php }?>
									<?php if ($_smarty_tpl->tpl_vars['return']->value['adInfo']['category3'] != 0) {?>
										<li>
											<strong class="detail-list-title">Seri: </strong>
											<span class="detail-list-value"><?php echo categoryInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['category3'],'kategori_adi');?>
</span>
										</li>
									<?php }?>
									<?php if ($_smarty_tpl->tpl_vars['return']->value['adInfo']['category4'] != 0) {?>
										<li>
											<strong class="detail-list-title">Model: </strong>
											<span class="detail-list-value"><?php echo categoryInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['category4'],'kategori_adi');?>
</span>
										</li>
									<?php }?>
									<?php if ($_smarty_tpl->tpl_vars['return']->value['adItems']) {?>
										<?php
$_from = $_smarty_tpl->tpl_vars['return']->value['adItems'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['item']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$foreach_item_Sav = $_smarty_tpl->tpl_vars['item'];
?>
											<?php if (isset($_smarty_tpl->tpl_vars['itemInfo'])) {$_smarty_tpl->tpl_vars['itemInfo'] = clone $_smarty_tpl->tpl_vars['itemInfo'];
$_smarty_tpl->tpl_vars['itemInfo']->value = $_smarty_tpl->tpl_vars['return']->value['Ads']->itemInfo($_smarty_tpl->tpl_vars['item']->value['itemId']); $_smarty_tpl->tpl_vars['itemInfo']->nocache = null; $_smarty_tpl->tpl_vars['itemInfo']->scope = 0;
} else $_smarty_tpl->tpl_vars['itemInfo'] = new Smarty_Variable($_smarty_tpl->tpl_vars['return']->value['Ads']->itemInfo($_smarty_tpl->tpl_vars['item']->value['itemId']), null, 0);?>
											<li>
												<strong class="detail-list-title"><?php echo $_smarty_tpl->tpl_vars['itemInfo']->value['name'];?>
: </strong>
												<span class="detail-list-value">
													<?php if ($_smarty_tpl->tpl_vars['itemInfo']->value['classx'] == 1 || $_smarty_tpl->tpl_vars['itemInfo']->value['classx'] == 3) {?>
														<?php echo $_smarty_tpl->tpl_vars['item']->value['itemValue'];?>

													<?php } elseif ($_smarty_tpl->tpl_vars['itemInfo']->value['classx'] == 2) {?>
														<?php if (isset($_smarty_tpl->tpl_vars['itemSelectInfo'])) {$_smarty_tpl->tpl_vars['itemSelectInfo'] = clone $_smarty_tpl->tpl_vars['itemSelectInfo'];
$_smarty_tpl->tpl_vars['itemSelectInfo']->value = $_smarty_tpl->tpl_vars['return']->value['Ads']->itemSelectInfo($_smarty_tpl->tpl_vars['item']->value['itemSelect']); $_smarty_tpl->tpl_vars['itemSelectInfo']->nocache = null; $_smarty_tpl->tpl_vars['itemSelectInfo']->scope = 0;
} else $_smarty_tpl->tpl_vars['itemSelectInfo'] = new Smarty_Variable($_smarty_tpl->tpl_vars['return']->value['Ads']->itemSelectInfo($_smarty_tpl->tpl_vars['item']->value['itemSelect']), null, 0);?>

														<?php echo $_smarty_tpl->tpl_vars['itemSelectInfo']->value['name'];?>

													<?php }?>
												</span>
											</li>
										<?php
$_smarty_tpl->tpl_vars['item'] = $foreach_item_Sav;
}
?>
									<?php }?>
								</ul>
							</div>
						</div>
					</div>
					<div class="bannerViewMobile col-sm-12 col-xs-12 hidden-lg hidden-md" style="margin-top: 25px;">
						<?php if ($_smarty_tpl->tpl_vars['return']->value['bannerViewMobile']['banner_type'] == 1) {?>
							<?php if ($_smarty_tpl->tpl_vars['return']->value['bannerViewMobile']['banner_img'] != '' || $_smarty_tpl->tpl_vars['return']->value['bannerViewMobile']['banner_img_link'] != '') {?>
								<a href="<?php echo $_smarty_tpl->tpl_vars['return']->value['bannerViewMobile']['banner_link'];?>
" target="_blank">
									<img src="<?php if ($_smarty_tpl->tpl_vars['return']->value['bannerViewMobile']['banner_img_link'] == '') {
echo siteUrl('files/banner');?>
/<?php echo $_smarty_tpl->tpl_vars['return']->value['bannerViewMobile']['banner_img'];
} else {
echo $_smarty_tpl->tpl_vars['return']->value['bannerViewMobile']['banner_img_link'];
}?>" width="100%" alt="banner mobile">
								</a>
							<?php }?>
						<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['bannerViewMobile']['banner_type'] == 2) {?>
							<?php if ($_smarty_tpl->tpl_vars['return']->value['bannerViewMobile']['banner_html'] != '') {?>
								<?php echo $_smarty_tpl->tpl_vars['return']->value['bannerViewMobile']['banner_html'];?>

							<?php }?>
						<?php }?>
					</div>
					<?php if ($_smarty_tpl->tpl_vars['return']->value['categoryFeatures']) {?>
						<div class="mobile-features col-sm-12 col-xs-12 hidden-lg hidden-md">
							<div class="ad-detail-block" style="margin-top: 25px;">
								<div id="ad-features2"><div class="col-md-12"><?php echo $_smarty_tpl->tpl_vars['return']->value['categoryFeatures'];?>
</div></div>
							</div>
						</div>
					<?php }?>
					<div class="col-md-3 hidden-sm hidden-xs">
						<div class="share-buttons">
							<ul>
								<li>
									<a href="javascript:;" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php echo siteUrl('view');?>
/<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['seflink'];?>
-<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['id'];?>
','','height=368,width=600,left=100,top=100,menubar=0');return false;">
										<img src="<?php echo siteUrl('public/images/facebook.svg');?>
" width="32" height="32" alt="facebook">
									</a>
								</li>
								<li>
									<a href="javascript:;" onclick="window.open('https://twitter.com/share?url=<?php echo siteUrl('view');?>
/<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['seflink'];?>
-<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['id'];?>
&text=<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['title'];?>
','','height=260,width=550,left=100,top=100,menubar=0');return false;">
										<img src="<?php echo siteUrl('public/images/twitter.svg');?>
" width="32" height="32" alt="twitter">
									</a>
								</li>
								<li>
									<a href="javascript:;" onclick="window.open('https://plus.google.com/share?url=<?php echo siteUrl('view');?>
/<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['seflink'];?>
-<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['id'];?>
','','height=550,width=525,left=100,top=100,menubar=0');return false;">
										<img src="<?php echo siteUrl('public/images/google-plus.svg');?>
" width="32" height="32" alt="google plus">
									</a>
								</li>
								<li>
									<a href="javascript:;" onclick="window.open('http://pinterest.com/pin/create/button/?url=<?php echo siteUrl('view');?>
/<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['seflink'];?>
-<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['id'];?>
&media=<?php echo siteUrl('files/ads/medium');?>
/<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['title_image'];?>
.jpg&description=<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['title'];?>
','','height=368,width=600,left=100,top=100,menubar=0');return false;">
										<img src="<?php echo siteUrl('public/images/pinterest.svg');?>
" width="32" height="32" alt="pinterest">
									</a>
								</li>
							</ul>
						</div>
						<div class="ad-detail-block" style="margin-top: 15px;">
							<?php if ($_smarty_tpl->tpl_vars['return']->value['getUserStore'] === false) {?>
								<div class="ad-user text-capitalize">
									<?php echo userInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['user_id'],'name');?>
 <?php echo userInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['user_id'],'surname');?>

								</div>
							<?php } else { ?>
								<div class="ad-user" style="overflow: hidden;">
									<div class="storeDetail">
										<div class="certificate">
											<img src="<?php echo siteUrl('public/images/certificate.svg');?>
" width="35" alt="certificate">
											<span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['return']->value['getUserStore']['end_time'],"%Y")-smarty_modifier_date_format($_smarty_tpl->tpl_vars['return']->value['getUserStore']['create_time'],"%Y");?>
.YIL</span>
										</div>
										<img src="<?php echo siteUrl('files/store/thumb');?>
/<?php echo $_smarty_tpl->tpl_vars['return']->value['getUserStore']['store_logo'];?>
.jpg" width="110" class="storeLogo" alt="<?php echo $_smarty_tpl->tpl_vars['return']->value['getUserStore']['store_name'];?>
">
										<h3>
											<a href="http://<?php echo $_smarty_tpl->tpl_vars['return']->value['getUserStore']['store_domain'];
echo $_smarty_tpl->tpl_vars['return']->value['siteConfig']['siteStoreDomain'];?>
"><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['return']->value['getUserStore']['store_name'], 'UTF-8');?>
</a>
										</h3>
									</div>
								</div>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['return']->value['adInfo']['phone_status'] == 1) {?>
								<div class="user-phones">
									<ul>
										<li>
											<a href="tel:<?php echo userInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['user_id'],'phone');?>
" title="Cep Telefonu">
												<i class="material-icons">phone</i> <?php echo userInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['user_id'],'phone');?>

											</a>
										</li>
										<?php if (userInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['user_id'],'phone_work') != '') {?>
											<li>
												<a href="tel:<?php echo userInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['user_id'],'phone_work');?>
" title="İş Telefonu">
													<i class="material-icons">phone</i> <?php echo userInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['user_id'],'phone_work');?>

												</a>
											</li>
										<?php }?>
										<?php if (userInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['user_id'],'phone_more') != '') {?>
											<li>
												<a href="tel:<?php echo userInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['user_id'],'phone_more');?>
" title="Sabit Telefon">
													<i class="material-icons">phone</i> <?php echo userInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['user_id'],'phone_more');?>

												</a>
											</li>
										<?php }?>
									</ul>
								</div>
							<?php }?>

							<div class="detail-bottom">
								<?php if ($_smarty_tpl->tpl_vars['return']->value['adInfo']['message_status'] == 1) {?>
									<a href="<?php if ($_SESSION['login']) {
if ($_SESSION['userId'] != $_smarty_tpl->tpl_vars['return']->value['adInfo']['user_id']) {
echo siteUrl('send-message');?>
/<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['id'];
} else { ?>javascript:;<?php }
} else { ?>javascript:;<?php }?>" <?php if (!$_SESSION['login']) {?>data-toggle="modal" data-target="#loginModal"<?php }?> class="send-message">
										<i class="material-icons">message</i> İlan Sahibine Mesaj Gönder
									</a>
								<?php }?>

								<?php if ($_smarty_tpl->tpl_vars['return']->value['getUserStore'] === false) {?>
									<a href="<?php echo siteUrl('user');?>
-<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['user_id'];?>
/<?php echo userInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['user_id'],'seflink');?>
"><i class="material-icons">directions_car</i> Tüm İlanları</a>
								<?php } else { ?>
									<a href="http://<?php echo $_smarty_tpl->tpl_vars['return']->value['getUserStore']['store_domain'];
echo $_smarty_tpl->tpl_vars['return']->value['siteConfig']['siteStoreDomain'];?>
"><i class="material-icons">directions_car</i> Tüm İlanları</a>
								<?php }?>

								<a href="<?php if ($_SESSION['login']) {
if ($_smarty_tpl->tpl_vars['return']->value['adInfo']['user_id'] != $_SESSION['userId']) {
echo siteUrl('my-favorites/ads/add/');
echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['id'];
} else { ?>javascript:;<?php }
} else { ?>javascript:;<?php }?>" <?php if (!$_SESSION['login']) {?>data-toggle="modal" data-target="#loginModal"<?php }?>><i class="material-icons">star</i> İlanı Favorilerime Ekle</a>
							</div>
						</div>
						<?php if ($_smarty_tpl->tpl_vars['return']->value['bannerViewDesktop']['banner_type'] == 1) {?>
							<?php if ($_smarty_tpl->tpl_vars['return']->value['bannerViewDesktop']['banner_img'] != '' || $_smarty_tpl->tpl_vars['return']->value['bannerViewDesktop']['banner_img_link'] != '') {?>
								<div class="banner250" style="margin-top: 15px;height: 300px;">
									<a href="<?php echo $_smarty_tpl->tpl_vars['return']->value['bannerViewDesktop']['banner_link'];?>
" target="_blank" style="padding: 0;">
										<img src="<?php if ($_smarty_tpl->tpl_vars['return']->value['bannerViewDesktop']['banner_img_link'] == '') {
echo siteUrl('files/banner');?>
/<?php echo $_smarty_tpl->tpl_vars['return']->value['bannerViewDesktop']['banner_img'];
} else {
echo $_smarty_tpl->tpl_vars['return']->value['bannerViewDesktop']['banner_img_link'];
}?>" width="100%" style="height: 300px;" alt="banner desktop">
									</a>
								</div>
							<?php }?>
						<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['bannerViewDesktop']['banner_type'] == 2) {?>
							<?php if ($_smarty_tpl->tpl_vars['return']->value['bannerViewDesktop']['banner_html'] != '') {?>
								<div class="banner250" style="margin-top: 15px;height: 300px;">
									<?php echo $_smarty_tpl->tpl_vars['return']->value['bannerViewDesktop']['banner_html'];?>

								</div>
							<?php }?>
						<?php }?>
						<!--<button type="button" class="btn btn-primary" style="width: 100%;padding: 10px;">Vasıta Alırken Bunlara Dikkat Edin</button>-->
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12 hidden-sm hidden-xs">
						<div id="tab" class="ad-tabs">
							<div class="ad-detail-block" style="margin-top: 25px;">
								<ul class="nav nav-tabs">
									<?php if ($_smarty_tpl->tpl_vars['return']->value['adInfo']['text'] != '') {?>
										<li class="active"><a data-toggle="tab" href="#ad-texts">Açıklama</a></li>
									<?php }?>
									<?php if ($_smarty_tpl->tpl_vars['return']->value['categoryFeatures']) {?>
								  		<li <?php if ($_smarty_tpl->tpl_vars['return']->value['adInfo']['text'] == '') {?>class="active"<?php }?>><a data-toggle="tab" href="#ad-features">Özellikler</a></li>
								  	<?php }?>
								  	<li <?php if ($_smarty_tpl->tpl_vars['return']->value['adInfo']['text'] == '' && $_smarty_tpl->tpl_vars['return']->value['categoryFeatures'] == '') {?>class="active"<?php }?>><a id="ad-map" data-toggle="tab" href="#ad-location">Konum</a></li>
								  	<li><a data-toggle="tab" href="#kredi">Kredi / Finansman Teklifleri</a></li>
								</ul>

								<div class="tab-content">
									<?php if ($_smarty_tpl->tpl_vars['return']->value['adInfo']['text'] != '') {?>
										<div id="ad-texts" class="tab-pane fade in active"><?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['text'];?>
</div>
									<?php }?>
									<?php if ($_smarty_tpl->tpl_vars['return']->value['categoryFeatures']) {?>
									  	<div id="ad-features" class="tab-pane fade <?php if ($_smarty_tpl->tpl_vars['return']->value['adInfo']['text'] == '') {?>in active<?php }?>"><?php echo $_smarty_tpl->tpl_vars['return']->value['categoryFeatures'];?>
</div>
								  	<?php }?>
								  	<div id="ad-location" class="tab-pane fade <?php if ($_smarty_tpl->tpl_vars['return']->value['adInfo']['text'] == '' && $_smarty_tpl->tpl_vars['return']->value['categoryFeatures'] == '') {?>in active<?php }?>">
								  		<?php echo '<script'; ?>
 type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZaVsbFgc-jiF8IKiLavvLc5DTbJeHDUk&language=tr&region=TR"><?php echo '</script'; ?>
>
								  		<div id="ad-detail-map"></div>
								  		
								  			<?php echo '<script'; ?>
 type="text/javascript">
												var mapPreview;
												var markersArrayPreview = [];
												var bounds = new google.maps.LatLngBounds();

								  				function initMapPreview(id, lat, lng, zooms)
												{
												    var latlngPreview = new google.maps.LatLng(lat, lng);
												    var myOptionsPreview = {
												        zoom: zooms,
												        maxZoom: 19,
												        center: latlngPreview,
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

												    mapPreview = new google.maps.Map(document.getElementById(id), myOptionsPreview);

												    placeMarkerPreview(latlngPreview);
												    bounds.extend(latlngPreview);
													mapPreview.panToBounds(bounds);  
												}

												function placeMarkerPreview(location) 
												{
												    // first remove all markers if there are any
												    deleteOverlaysPreview();

											        var markerPreview = new google.maps.Marker({
											            position: location, 
											            map: mapPreview,
											            icon: siteUrl + "/public/images/mapIcon.png"
											        });

											        // add marker in markers array
											        markersArrayPreview.push(markerPreview);
												    
												}

												function deleteOverlaysPreview() 
												{
												    if (markersArrayPreview) {
												        for (i in markersArrayPreview) {
												            markersArrayPreview[i].setMap(null);
												        }
												        markersArrayPreview.length = 0;
												    }
												}

												$('a#ad-map').click(function() {
												    initMapPreview('ad-detail-map', <?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['marker_lat'];?>
, <?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['marker_lng'];?>
, <?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['zoom'];?>
);

												    $('.ad-detail #ad-detail-map').css({'pointer-events': 'all'});
												});

												$('.ad-detail .ad-tabs .nav li a:not(#ad-map)').click(function() {
													$('.ad-detail #ad-detail-map').css({'pointer-events': 'none'});
												});

												initMapPreview('ad-detail-map', <?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['marker_lat'];?>
, <?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['marker_lng'];?>
, <?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['zoom'];?>
);
								  			<?php echo '</script'; ?>
>
								  		
								  	</div>
								  	<div id="kredi" class="tab-pane fade"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="mobile-phones hidden-lg hidden-md">
	<div class="modal fade" id="phonesModal" role="dialog">
	    <div class="modal-dialog modal-sm">
	      	<div class="modal-content">
		        <div class="modal-header">
		          	<button type="button" class="close" data-dismiss="modal">&times;</button>
		          	<h4 class="modal-title">İletişim Bilgileri</h4>
		        </div>
		        <div class="modal-body">
		        	<div class="modal-top">
			          	<i class="material-icons">security</i>
			          	<p>Satıcıyla yüz yüze görüşmeden ve alacağınız ürünü görmeden kapora ödemeyin, para göndermeyin.</p>
			          	<p>
			          		<a href="#">Güvenli Alışverişin İpuçları için tıklayın.</a>
			          	</p>
		          	</div>
		          	<div class="modal-center">
		          		<?php if ($_smarty_tpl->tpl_vars['return']->value['getUserStore'] === false) {?>
		          			<strong class="text-center" style="display: block;"><?php echo smarty_modifier_capitalize(userInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['user_id'],'name'));?>
 <?php echo smarty_modifier_capitalize(userInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['user_id'],'surname'));?>
</strong>
		          		<?php } else { ?>
		          			<strong class="text-center" style="display: block;"><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['return']->value['getUserStore']['store_name'], 'UTF-8');?>
</strong>
		          		<?php }?>
		          	</div>
		          	<div class="modal-bottom">
		          		<ul>
		          			<?php if (userInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['user_id'],'phone') != '') {?>
		          				<li>
			          				<a href="tel:<?php echo userInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['user_id'],'phone');?>
">
				          				<strong>Cep</strong>
				          				<strong><?php echo userInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['user_id'],'phone');?>
</strong>
			          				</a>
			          			</li>
		          			<?php }?>
		          			<?php if (userInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['user_id'],'phone_work') != '') {?>
			          			<li>
			          				<a href="tel:<?php echo userInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['user_id'],'phone_work');?>
">
				          				<strong>İş</strong>
				          				<strong><?php echo userInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['user_id'],'phone_work');?>
</strong>
			          				</a>
			          			</li>
		          			<?php }?>
		          			<?php if (userInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['user_id'],'phone_more') != '') {?>
			          			<li>
			          				<a href="tel:<?php echo userInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['user_id'],'phone_more');?>
">
				          				<strong>Sabit</strong>
				          				<strong><?php echo userInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['user_id'],'phone_more');?>
</strong>
			          				</a>
			          			</li>
		          			<?php }?>
		          		</ul>
		          	</div>
		        </div>
	      	</div>
	    </div>
  	</div>
</div>
<?php if (!$_SESSION['login']) {?>
	<div class="login-modal">
		<div class="modal fade" id="loginModal" role="dialog" style="z-index: 99999;">
		    <div class="modal-dialog modal-md" style="margin-top: 10%;">
		      	<div class="modal-content">
			        <div class="modal-header">
			          	<button type="button" class="close" data-dismiss="modal">&times;</button>
			          	<h4 class="modal-title">Giriş Yap / Üye Ol</h4>
			        </div>
			        <div class="modal-body">
			        	<p style="margin-top: 15px;margin-bottom: 15px;font-weight: 500;display: block;text-align: center;">Üye değilmisiniz ? O zaman hemen</p>
			        	<a href="<?php echo siteUrl('register');?>
">
			        		<button type="button" class="btn btn-primary" style="width: 100%;padding: 10px;">Üye Ol</button>
			        	</a>
			        	<p style="margin-top: 15px;margin-bottom: 15px;font-weight: 500;display: block;text-align: center;">Üyeliğiniz varmı ? O zaman hemen</p>
			        	<a href="<?php echo siteUrl('login');?>
">
			        		<button type="button" class="btn btn-primary" style="width: 100%;padding: 10px;">Giriş Yap</button>
			        	</a>
			        </div>
		        </div>
	        </div>
	    </div>
	</div>
<?php }
}
}
?>