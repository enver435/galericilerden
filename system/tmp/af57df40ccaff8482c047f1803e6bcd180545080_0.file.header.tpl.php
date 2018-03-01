<?php /* Smarty version 3.1.27, created on 2018-01-19 12:06:00
         compiled from "C:\xampp\htdocs\galericilerden\app\view\header.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:38145a61d118ee07a1_94833824%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'af57df40ccaff8482c047f1803e6bcd180545080' => 
    array (
      0 => 'C:\\xampp\\htdocs\\galericilerden\\app\\view\\header.tpl',
      1 => 1516359794,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '38145a61d118ee07a1_94833824',
  'variables' => 
  array (
    'Notifications' => 0,
    'Messages' => 0,
    'messages' => 0,
    'notifications' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5a61d119047c10_73423896',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5a61d119047c10_73423896')) {
function content_5a61d119047c10_73423896 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '38145a61d118ee07a1_94833824';
if ($_SESSION['login']) {?>
	<?php if (isset($_smarty_tpl->tpl_vars['notifications'])) {$_smarty_tpl->tpl_vars['notifications'] = clone $_smarty_tpl->tpl_vars['notifications'];
$_smarty_tpl->tpl_vars['notifications']->value = $_smarty_tpl->tpl_vars['Notifications']->value->notifications(true,null,null); $_smarty_tpl->tpl_vars['notifications']->nocache = null; $_smarty_tpl->tpl_vars['notifications']->scope = 0;
} else $_smarty_tpl->tpl_vars['notifications'] = new Smarty_Variable($_smarty_tpl->tpl_vars['Notifications']->value->notifications(true,null,null), null, 0);?>
	<?php if (isset($_smarty_tpl->tpl_vars['messages'])) {$_smarty_tpl->tpl_vars['messages'] = clone $_smarty_tpl->tpl_vars['messages'];
$_smarty_tpl->tpl_vars['messages']->value = $_smarty_tpl->tpl_vars['Messages']->value->messages(true,null,null); $_smarty_tpl->tpl_vars['messages']->nocache = null; $_smarty_tpl->tpl_vars['messages']->scope = 0;
} else $_smarty_tpl->tpl_vars['messages'] = new Smarty_Variable($_smarty_tpl->tpl_vars['Messages']->value->messages(true,null,null), null, 0);?>
<?php }?>
<?php if ($_SESSION['showAppHeader'] === true) {?>
	<div class="google-play-app hidden-lg hidden-md hidden-sm">
		<div class="container">
			<div class="row">
				<div class="col-xs-8" style="padding-right: 0;">
					<a href="javascript:void(0);" class="close">&times;</a>
					<img src="https://lh3.googleusercontent.com/RzEWMwhJWU4s0VwnmAphy3hY02foJypz__rWMPXns0bNvcRgtbOpf40pOKZurkL-HQ0=w300-rw" width="42" height="42" alt="">
					<h4>galericilerden.com</h4>
					<h5>Android Uygulaması</h5>
				</div>
				<div class="col-xs-4" style="padding-left: 0;margin-top: 15px;">
					<a href="https://play.google.com/store/apps/details?id=com.galericilerden" target="_blank">
						<button class="btn btn-primary pull-right">Uygulamada Aç</button>
					</a>
				</div>
			</div>
		</div>
	</div>
<?php }?>
<div id="header"<?php if ($_SESSION['showAppHeader'] === true) {?>class="showApp"<?php }?>>
	<div class="container">
		<div class="mobile hidden-lg hidden-md">
			<a href="<?php echo SITE_URL;?>
" style="display: block;">
				<div class="logo"></div>
			</a>
			<i class="material-icons icon-search">search</i>
			<i class="material-icons icon-menu" onclick="openNav();">menu</i>
			<div class="search mobile-search">
				<form action="<?php echo siteUrl('search');?>
" method="GET">
					<input type="text" name="query" placeholder="Kelime veya ilan no'ya göre ara" class="form-control">
					<i class="material-icons close-search">close</i>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="desktop col-lg-6 col-md-6 pull-left hidden-sm hidden-xs">
				<a href="<?php echo SITE_URL;?>
">
					<div class="logo pull-left"></div>
				</a>
				<div class="search pull-right hidden-sm hidden-xs">
					<form action="<?php echo siteUrl('search');?>
" method="GET">
						<input type="text" name="query" placeholder="Kelime veya ilan no'ya göre ara" class="form-control">
						<i class="material-icons">search</i>
					</form>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 hidden-xs hidden-sm pull-right">
				<div class="pull-right">
					<?php if (!$_SESSION['login']) {?>
						<a href="<?php echo siteUrl('login');?>
">
							<button type="button" class="btn btn-primary login">
								<i class="material-icons">person_outline</i> Giriş yap
							</button>
						</a>
						<a href="<?php echo siteUrl('register');?>
">
							<button type="button" class="btn btn-primary register">
								<i class="material-icons">add</i> Üyelik oluştur
							</button>
						</a>
						<a href="<?php echo siteUrl('ad-add');?>
">
							<button type="button" class="btn btn-primary add">
								<i class="material-icons">directions_car</i> İlan ver
							</button>
						</a>
					<?php } else { ?>
						<a href="<?php echo siteUrl('ad-add');?>
">
							<button type="button" class="btn btn-primary add">
								<i class="material-icons">directions_car</i> İlan ver
							</button>
						</a>
						<div class="menu-profile">
							<button type="button" class="btn btn-primary profile">
								<i class="material-icons">person_outline</i> Hoşgeldin, 
								<span class="text-capitalize"><?php echo mb_strtolower(userInfo($_SESSION['userId'],'name'), 'UTF-8');?>
</span>
								<span class="text-capitalize"><?php echo mb_strtolower(userInfo($_SESSION['userId'],'surname'), 'UTF-8');?>
</span>
								<i class="material-icons">arrow_drop_down</i>
							</button>

							<ul class="submenu">
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
										<span class="menuCount"><?php if ($_smarty_tpl->tpl_vars['messages']->value !== false) {
echo count($_smarty_tpl->tpl_vars['messages']->value);
} else { ?>0<?php }?></span>
									</a>
								</li>
								<li>
									<a href="<?php echo siteUrl('my-notifications');?>
">
										<i class="material-icons">notifications</i> Bildirimlerim
										<span class="menuCount"><?php if ($_smarty_tpl->tpl_vars['notifications']->value !== false) {
echo count($_smarty_tpl->tpl_vars['notifications']->value);
} else { ?>0<?php }?></span>
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
								<li>
									<a href="<?php echo siteUrl('exit');?>
">
										<i class="material-icons">exit_to_app</i> Çıkış
									</a>
								</li>
							</ul>
						</div>
					<?php }?>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="sidebar-menu" class="sidenav <?php if ($_SESSION['showAppHeader'] === true) {?>showApp<?php }?> hidden-lg hidden-md">
	<ul>
		<li>
			<a href="<?php echo SITE_URL;?>
"><i class="material-icons">home</i> Ana Sayfa</a>
		</li>
		<li>
			<a href="<?php echo SITE_URL;?>
/search-ad"><i class="material-icons">search</i> İlan Ara</a>
		</li>
		<h5>İşlemler</h5>
		<ul>
			<?php if (!$_SESSION['login']) {?>
				<li>
					<a href="<?php echo siteUrl('login');?>
"><i class="material-icons">person_outline</i> Giriş Yap</a>
				</li>
				<li>
					<a href="<?php echo siteUrl('register');?>
"><i class="material-icons">add</i> Üyelik Oluştur</a>
				</li>
				<li>
					<a href="<?php echo siteUrl('ad-add');?>
"><i class="material-icons">directions_car</i> İlan Ver</a>
				</li>
			<?php } else { ?>
				<li class="userInfo">
					<a href="<?php echo siteUrl('profile-menu');?>
">
						<span class="userProfile">
							<b>BANA ÖZEL</b><br>
							<span class="text-capitalize"><?php echo mb_strtolower(userInfo($_SESSION['userId'],'name'), 'UTF-8');?>
</span>
							<span class="text-capitalize"><?php echo mb_strtolower(userInfo($_SESSION['userId'],'surname'), 'UTF-8');?>
</span>
						</span>
					</a>
					<span class="userInfo-right">
						<a href="<?php echo siteUrl('my-messages');?>
" style="display: inline-block;">
							<span class="message">
								<i class="material-icons" style="font-size: 20px;">message</i>
								<span class="menuCount"><?php if ($_smarty_tpl->tpl_vars['messages']->value !== false) {
echo count($_smarty_tpl->tpl_vars['messages']->value);
} else { ?>0<?php }?></span>
							</span>
						</a>
						<a href="<?php echo siteUrl('my-notifications');?>
" style="display: inline-block;">
							<span class="notification">
								<i class="material-icons" style="font-size: 22px;">notifications</i>
								<span class="menuCount"><span class="menuCount"><?php if ($_smarty_tpl->tpl_vars['notifications']->value !== false) {
echo count($_smarty_tpl->tpl_vars['notifications']->value);
} else { ?>0<?php }?></span></span>
							</span>
						</a>
					</span>
				</li>
				<li>
					<a href="<?php echo siteUrl('ad-add');?>
"><i class="material-icons">directions_car</i> İlan Ver</a>
				</li>
				<li>
					<a href="<?php echo siteUrl('exit');?>
"><i class="material-icons">exit_to_app</i> Çıkış Yap</a>
				</li>
			<?php }?>
		</ul>
		<h5>Sayfalar</h5>
		<ul>
			<li>
				<a href="<?php echo siteUrl('page/doping');?>
"><i class="material-icons">flash_on</i> Doping</a>
			</li>
			<li>
				<a href="<?php echo siteUrl('news');?>
"><i class="material-icons">wallpaper</i> Haberler</a>
			</li>
			<li>
				<a href="<?php echo siteUrl('page/contact');?>
"><i class="material-icons">mail</i> İletişim</a>
			</li>
		</ul>
	</ul>
</div><?php }
}
?>