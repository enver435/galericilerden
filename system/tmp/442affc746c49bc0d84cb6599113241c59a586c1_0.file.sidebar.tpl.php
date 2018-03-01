<?php /* Smarty version 3.1.27, created on 2017-10-11 13:35:47
         compiled from "C:\xampp\htdocs\galericilerden\app\view\admin\static\sidebar.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2211759de0213555997_02713007%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '442affc746c49bc0d84cb6599113241c59a586c1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\galericilerden\\app\\view\\admin\\static\\sidebar.tpl',
      1 => 1507721745,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2211759de0213555997_02713007',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_59de02135ceb23_83293790',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_59de02135ceb23_83293790')) {
function content_59de02135ceb23_83293790 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2211759de0213555997_02713007';
?>
<div id="sidebar" class="sidebar responsive ace-save-state">
	
		<?php echo '<script'; ?>
 type="text/javascript">
			try{ace.settings.loadState('sidebar')}catch(e){}
		<?php echo '</script'; ?>
>
	

	<!--<div class="sidebar-shortcuts" id="sidebar-shortcuts">
		<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
			<button class="btn btn-success">
				<i class="ace-icon fa fa-signal"></i>
			</button>

			<button class="btn btn-info">
				<i class="ace-icon fa fa-pencil"></i>
			</button>

			<button class="btn btn-warning">
				<i class="ace-icon fa fa-users"></i>
			</button>

			<button class="btn btn-danger">
				<i class="ace-icon fa fa-cogs"></i>
			</button>
		</div>

		<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
			<span class="btn btn-success"></span>

			<span class="btn btn-info"></span>

			<span class="btn btn-warning"></span>

			<span class="btn btn-danger"></span>
		</div>
	</div>-->

	<ul class="nav nav-list">
		<li <?php if (!getUrl(1) || getUrl(1) == 'index') {?>class="open"<?php }?>>
			<a href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
">
				<i class="menu-icon fa fa-tachometer"></i>
				<span class="menu-text">Ana Sayfa</span>
			</a>

			<b class="arrow"></b>
		</li>
		<li <?php if (getUrl(1) == 'ads') {?>class="open"<?php }?>>
			<a href="#" class="dropdown-toggle <?php if (getUrl(1) == 'ads') {?>active<?php }?>">
				<i class="menu-icon fa fa-picture-o"></i>
				<span class="menu-text">İlan Yönetimi</span>
			</a>
			<ul class="submenu <?php if (getUrl(1) == 'ads') {?>nav-show<?php }?>">
				<li>
					<a href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/ads/pending">
						<i class="menu-icon fa fa-caret-right"></i>
						Onay Bekleyen
					</a>
				</li>
				<li>
					<a href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/ads/approved">
						<i class="menu-icon fa fa-caret-right"></i>
						Onaylanmış
					</a>
				</li>
				<li>
					<a href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/ads/expired">
						<i class="menu-icon fa fa-caret-right"></i>
						Süresi Bitenler
					</a>
				</li>
				<!--<li>
					<a href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/ads/complaints">
						<i class="menu-icon fa fa-caret-right"></i>
						Şikayetler
					</a>
				</li>-->
			</ul>

			<b class="arrow"></b>
		</li>
		<li <?php if (getUrl(1) == 'store' || getUrl(1) == 'store-packet') {?>class="open"<?php }?>>
			<a href="#" class="dropdown-toggle <?php if (getUrl(1) == 'store') {?>active<?php }?>">
				<i class="menu-icon fa fa-shopping-bag"></i>
				<span class="menu-text">Mağaza Yönetimi</span>
			</a>
			<ul class="submenu <?php if (getUrl(1) == 'store') {?>nav-show<?php }?>">
				<li>
					<a href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/store/pending">
						<i class="menu-icon fa fa-caret-right"></i>
						Onay Bekleyen
					</a>
				</li>
				<li>
					<a href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/store/approved">
						<i class="menu-icon fa fa-caret-right"></i>
						Onaylanmış
					</a>
				</li>
				<li>
					<a href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/store/expired">
						<i class="menu-icon fa fa-caret-right"></i>
						Süresi Bitenler
					</a>
				</li>
				<li>
					<a href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/store-packet">
						<i class="menu-icon fa fa-caret-right"></i>
						Mağaza Paketleri
					</a>
				</li>
			</ul>

			<b class="arrow"></b>
		</li>
		<li <?php if (getUrl(1) == 'doping') {?>class="open"<?php }?>>
			<a href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/doping" class="<?php if (getUrl(1) == 'doping') {?>active<?php }?>">
				<i class="menu-icon fa fa-chevron-circle-up"></i>
				<span class="menu-text">Doping Yönetimi</span>
			</a>

			<b class="arrow"></b>
		</li>
		<li <?php if (getUrl(1) == 'users') {?>class="open"<?php }?>>
			<a href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/users" class="<?php if (getUrl(1) == 'users') {?>active<?php }?>">
				<i class="menu-icon fa fa-users"></i>
				<span class="menu-text">Üye Yönetimi</span>
			</a>

			<b class="arrow"></b>
		</li>
		<li <?php if (getUrl(1) == 'modul' || getUrl(1) == 'modul-options' || getUrl(1) == 'modul-features') {?>class="open"<?php }?>>
			<a href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/modul" class="<?php if (getUrl(1) == 'modul') {?>active<?php }?>">
				<i class="menu-icon fa fa-adjust"></i>
				<span class="menu-text">Modül Yönetimi</span>
			</a>

			<b class="arrow"></b>
		</li>
		<li <?php if (getUrl(1) == 'category' || getUrl(1) == 'add-category') {?>class="open"<?php }?>>
			<a href="#" class="dropdown-toggle <?php if (getUrl(1) == 'category' || getUrl(1) == 'add-category') {?>active<?php }?>">
				<i class="menu-icon fa fa-list"></i>
				<span class="menu-text">Kategori Yönetimi</span>
			</a>
			<ul class="submenu">
				<li>
					<a href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/add-category/main-category">
						<i class="menu-icon fa fa-caret-right"></i>
						Anakategori Ekle
					</a>
				</li>
				<li>
					<a href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/add-category/sub-category">
						<i class="menu-icon fa fa-caret-right"></i>
						Altkategori Ekle
					</a>
				</li>
				<li>
					<a href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/category">
						<i class="menu-icon fa fa-caret-right"></i>
						Kategoriler
					</a>
				</li>
			</ul>

			<b class="arrow"></b>
		</li>

		<li <?php if (getUrl(1) == 'user-settings') {?>class="open"<?php }?>>
			<a href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/user-settings">
				<i class="menu-icon fa fa-user"></i>
				<span class="menu-text">Kullanıcı Ayarları</span>
			</a>

			<b class="arrow"></b>
		</li>

		<li <?php if (getUrl(1) == 'slider') {?>class="open"<?php }?>>
			<a href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/slider">
				<i class="menu-icon fa fa-picture-o"></i>
				<span class="menu-text">Slider Yönetimi</span>
			</a>

			<b class="arrow"></b>
		</li>

		<li <?php if (getUrl(1) == 'banner') {?>class="open"<?php }?>>
			<a href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/banner">
				<i class="menu-icon fa fa-bullhorn"></i>
				<span class="menu-text">Banner Yönetimi</span>
			</a>

			<b class="arrow"></b>
		</li>

		<li <?php if (getUrl(1) == 'news') {?>class="open"<?php }?>>
			<a href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/news">
				<i class="menu-icon fa fa-image"></i>
				<span class="menu-text">Haber Yönetimi</span>
			</a>

			<b class="arrow"></b>
		</li>

		<li <?php if (getUrl(1) == 'send-all-mail') {?>class="open"<?php }?>>
			<a href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/send-all-mail">
				<i class="menu-icon fa fa-envelope"></i>
				<span class="menu-text">Toplu Mail Gönderimi</span>
			</a>

			<b class="arrow"></b>
		</li>
	</ul>

	<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
		<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
	</div>
</div><?php }
}
?>