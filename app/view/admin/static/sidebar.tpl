<div id="sidebar" class="sidebar responsive ace-save-state">
	{literal}
		<script type="text/javascript">
			try{ace.settings.loadState('sidebar')}catch(e){}
		</script>
	{/literal}

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
		<li {if !getUrl(1) || getUrl(1) == 'index'}class="open"{/if}>
			<a href="{SITE_URL}/{SITE_ADMIN}">
				<i class="menu-icon fa fa-tachometer"></i>
				<span class="menu-text">Ana Sayfa</span>
			</a>

			<b class="arrow"></b>
		</li>
		<li {if getUrl(1) == 'ads'}class="open"{/if}>
			<a href="#" class="dropdown-toggle {if getUrl(1) == 'ads'}active{/if}">
				<i class="menu-icon fa fa-picture-o"></i>
				<span class="menu-text">İlan Yönetimi</span>
			</a>
			<ul class="submenu {if getUrl(1) == 'ads'}nav-show{/if}">
				<li>
					<a href="{SITE_URL}/{SITE_ADMIN}/ads/pending">
						<i class="menu-icon fa fa-caret-right"></i>
						Onay Bekleyen
					</a>
				</li>
				<li>
					<a href="{SITE_URL}/{SITE_ADMIN}/ads/approved">
						<i class="menu-icon fa fa-caret-right"></i>
						Onaylanmış
					</a>
				</li>
				<li>
					<a href="{SITE_URL}/{SITE_ADMIN}/ads/expired">
						<i class="menu-icon fa fa-caret-right"></i>
						Süresi Bitenler
					</a>
				</li>
				<!--<li>
					<a href="{SITE_URL}/{SITE_ADMIN}/ads/complaints">
						<i class="menu-icon fa fa-caret-right"></i>
						Şikayetler
					</a>
				</li>-->
			</ul>

			<b class="arrow"></b>
		</li>
		<li {if getUrl(1) == 'store' || getUrl(1) == 'store-packet'}class="open"{/if}>
			<a href="#" class="dropdown-toggle {if getUrl(1) == 'store'}active{/if}">
				<i class="menu-icon fa fa-shopping-bag"></i>
				<span class="menu-text">Mağaza Yönetimi</span>
			</a>
			<ul class="submenu {if getUrl(1) == 'store'}nav-show{/if}">
				<li>
					<a href="{SITE_URL}/{SITE_ADMIN}/store/pending">
						<i class="menu-icon fa fa-caret-right"></i>
						Onay Bekleyen
					</a>
				</li>
				<li>
					<a href="{SITE_URL}/{SITE_ADMIN}/store/approved">
						<i class="menu-icon fa fa-caret-right"></i>
						Onaylanmış
					</a>
				</li>
				<li>
					<a href="{SITE_URL}/{SITE_ADMIN}/store/expired">
						<i class="menu-icon fa fa-caret-right"></i>
						Süresi Bitenler
					</a>
				</li>
				<li>
					<a href="{SITE_URL}/{SITE_ADMIN}/store-packet">
						<i class="menu-icon fa fa-caret-right"></i>
						Mağaza Paketleri
					</a>
				</li>
			</ul>

			<b class="arrow"></b>
		</li>
		<li {if getUrl(1) == 'doping'}class="open"{/if}>
			<a href="{SITE_URL}/{SITE_ADMIN}/doping" class="{if getUrl(1) == 'doping'}active{/if}">
				<i class="menu-icon fa fa-chevron-circle-up"></i>
				<span class="menu-text">Doping Yönetimi</span>
			</a>

			<b class="arrow"></b>
		</li>
		<li {if getUrl(1) == 'users'}class="open"{/if}>
			<a href="{SITE_URL}/{SITE_ADMIN}/users" class="{if getUrl(1) == 'users'}active{/if}">
				<i class="menu-icon fa fa-users"></i>
				<span class="menu-text">Üye Yönetimi</span>
			</a>

			<b class="arrow"></b>
		</li>
		<li {if getUrl(1) == 'modul' || getUrl(1) == 'modul-options' || getUrl(1) == 'modul-features'}class="open"{/if}>
			<a href="{SITE_URL}/{SITE_ADMIN}/modul" class="{if getUrl(1) == 'modul'}active{/if}">
				<i class="menu-icon fa fa-adjust"></i>
				<span class="menu-text">Modül Yönetimi</span>
			</a>

			<b class="arrow"></b>
		</li>
		<li {if getUrl(1) == 'category' || getUrl(1) == 'add-category'}class="open"{/if}>
			<a href="#" class="dropdown-toggle {if getUrl(1) == 'category' || getUrl(1) == 'add-category'}active{/if}">
				<i class="menu-icon fa fa-list"></i>
				<span class="menu-text">Kategori Yönetimi</span>
			</a>
			<ul class="submenu">
				<li>
					<a href="{SITE_URL}/{SITE_ADMIN}/add-category/main-category">
						<i class="menu-icon fa fa-caret-right"></i>
						Anakategori Ekle
					</a>
				</li>
				<li>
					<a href="{SITE_URL}/{SITE_ADMIN}/add-category/sub-category">
						<i class="menu-icon fa fa-caret-right"></i>
						Altkategori Ekle
					</a>
				</li>
				<li>
					<a href="{SITE_URL}/{SITE_ADMIN}/category">
						<i class="menu-icon fa fa-caret-right"></i>
						Kategoriler
					</a>
				</li>
			</ul>

			<b class="arrow"></b>
		</li>

		<li {if getUrl(1) == 'user-settings'}class="open"{/if}>
			<a href="{SITE_URL}/{SITE_ADMIN}/user-settings">
				<i class="menu-icon fa fa-user"></i>
				<span class="menu-text">Kullanıcı Ayarları</span>
			</a>

			<b class="arrow"></b>
		</li>

		<li {if getUrl(1) == 'slider'}class="open"{/if}>
			<a href="{SITE_URL}/{SITE_ADMIN}/slider">
				<i class="menu-icon fa fa-picture-o"></i>
				<span class="menu-text">Slider Yönetimi</span>
			</a>

			<b class="arrow"></b>
		</li>

		<li {if getUrl(1) == 'banner'}class="open"{/if}>
			<a href="{SITE_URL}/{SITE_ADMIN}/banner">
				<i class="menu-icon fa fa-bullhorn"></i>
				<span class="menu-text">Banner Yönetimi</span>
			</a>

			<b class="arrow"></b>
		</li>

		<li {if getUrl(1) == 'news'}class="open"{/if}>
			<a href="{SITE_URL}/{SITE_ADMIN}/news">
				<i class="menu-icon fa fa-image"></i>
				<span class="menu-text">Haber Yönetimi</span>
			</a>

			<b class="arrow"></b>
		</li>

		<li {if getUrl(1) == 'send-all-mail'}class="open"{/if}>
			<a href="{SITE_URL}/{SITE_ADMIN}/send-all-mail">
				<i class="menu-icon fa fa-envelope"></i>
				<span class="menu-text">Toplu Mail Gönderimi</span>
			</a>

			<b class="arrow"></b>
		</li>
	</ul>

	<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
		<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
	</div>
</div>