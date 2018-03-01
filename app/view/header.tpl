{if $smarty.session.login}
	{assign var=notifications value=$Notifications->notifications(true, null, null)}
	{assign var=messages value=$Messages->messages(true, null, null)}
{/if}
{if $smarty.session.showAppHeader === true}
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
{/if}
<div id="header"{if $smarty.session.showAppHeader === true}class="showApp"{/if}>
	<div class="container">
		<div class="mobile hidden-lg hidden-md">
			<a href="{SITE_URL}" style="display: block;">
				<div class="logo"></div>
			</a>
			<i class="material-icons icon-search">search</i>
			<i class="material-icons icon-menu" onclick="openNav();">menu</i>
			<div class="search mobile-search">
				<form action="{siteUrl('search')}" method="GET">
					<input type="text" name="query" placeholder="Kelime veya ilan no'ya göre ara" class="form-control">
					<i class="material-icons close-search">close</i>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="desktop col-lg-6 col-md-6 pull-left hidden-sm hidden-xs">
				<a href="{SITE_URL}">
					<div class="logo pull-left"></div>
				</a>
				<div class="search pull-right hidden-sm hidden-xs">
					<form action="{siteUrl('search')}" method="GET">
						<input type="text" name="query" placeholder="Kelime veya ilan no'ya göre ara" class="form-control">
						<i class="material-icons">search</i>
					</form>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 hidden-xs hidden-sm pull-right">
				<div class="pull-right">
					{if !$smarty.session.login}
						<a href="{siteUrl('login')}">
							<button type="button" class="btn btn-primary login">
								<i class="material-icons">person_outline</i> Giriş yap
							</button>
						</a>
						<a href="{siteUrl('register')}">
							<button type="button" class="btn btn-primary register">
								<i class="material-icons">add</i> Üyelik oluştur
							</button>
						</a>
						<a href="{siteUrl('ad-add')}">
							<button type="button" class="btn btn-primary add">
								<i class="material-icons">directions_car</i> İlan ver
							</button>
						</a>
					{else}
						<a href="{siteUrl('ad-add')}">
							<button type="button" class="btn btn-primary add">
								<i class="material-icons">directions_car</i> İlan ver
							</button>
						</a>
						<div class="menu-profile">
							<button type="button" class="btn btn-primary profile">
								<i class="material-icons">person_outline</i> Hoşgeldin, 
								<span class="text-capitalize">{userInfo($smarty.session.userId, 'name')|lower}</span>
								<span class="text-capitalize">{userInfo($smarty.session.userId, 'surname')|lower}</span>
								<i class="material-icons">arrow_drop_down</i>
							</button>

							<ul class="submenu">
								<li>
									<a href="{siteUrl('my-ads/active')}">
										<i class="material-icons">view_stream</i> İlanlarım
									</a>
								</li>
								<li>
									<a href="{siteUrl('my-favorites/ads')}">
										<i class="material-icons">star</i> Favorilerim
									</a>
								</li>
								<li>
									<a href="{siteUrl('my-messages')}">
										<i class="material-icons">message</i> Mesajlarım
										<span class="menuCount">{if $messages !== false}{$messages|count}{else}0{/if}</span>
									</a>
								</li>
								<li>
									<a href="{siteUrl('my-notifications')}">
										<i class="material-icons">notifications</i> Bildirimlerim
										<span class="menuCount">{if $notifications !== false}{$notifications|count}{else}0{/if}</span>
									</a>
								</li>
								<li>
									<a href="{siteUrl('my-info')}">
										<i class="material-icons">person</i> Üyeliğim
									</a>
								</li>
								{if userInfo($smarty.session.userId, 'user_status') == 2}
									<li>
										<a href="{siteUrl('my-store')}">
											<i class="material-icons">store</i> Mağazam
										</a>
									</li>
								{/if}
								<li>
									<a href="{siteUrl('exit')}">
										<i class="material-icons">exit_to_app</i> Çıkış
									</a>
								</li>
							</ul>
						</div>
					{/if}
				</div>
			</div>
		</div>
	</div>
</div>
<div id="sidebar-menu" class="sidenav {if $smarty.session.showAppHeader === true}showApp{/if} hidden-lg hidden-md">
	<ul>
		<li>
			<a href="{SITE_URL}"><i class="material-icons">home</i> Ana Sayfa</a>
		</li>
		<li>
			<a href="{SITE_URL}/search-ad"><i class="material-icons">search</i> İlan Ara</a>
		</li>
		<h5>İşlemler</h5>
		<ul>
			{if !$smarty.session.login}
				<li>
					<a href="{siteUrl('login')}"><i class="material-icons">person_outline</i> Giriş Yap</a>
				</li>
				<li>
					<a href="{siteUrl('register')}"><i class="material-icons">add</i> Üyelik Oluştur</a>
				</li>
				<li>
					<a href="{siteUrl('ad-add')}"><i class="material-icons">directions_car</i> İlan Ver</a>
				</li>
			{else}
				<li class="userInfo">
					<a href="{siteUrl('profile-menu')}">
						<span class="userProfile">
							<b>BANA ÖZEL</b><br>
							<span class="text-capitalize">{userInfo($smarty.session.userId, 'name')|lower}</span>
							<span class="text-capitalize">{userInfo($smarty.session.userId, 'surname')|lower}</span>
						</span>
					</a>
					<span class="userInfo-right">
						<a href="{siteUrl('my-messages')}" style="display: inline-block;">
							<span class="message">
								<i class="material-icons" style="font-size: 20px;">message</i>
								<span class="menuCount">{if $messages !== false}{$messages|count}{else}0{/if}</span>
							</span>
						</a>
						<a href="{siteUrl('my-notifications')}" style="display: inline-block;">
							<span class="notification">
								<i class="material-icons" style="font-size: 22px;">notifications</i>
								<span class="menuCount"><span class="menuCount">{if $notifications !== false}{$notifications|count}{else}0{/if}</span></span>
							</span>
						</a>
					</span>
				</li>
				<li>
					<a href="{siteUrl('ad-add')}"><i class="material-icons">directions_car</i> İlan Ver</a>
				</li>
				<li>
					<a href="{siteUrl('exit')}"><i class="material-icons">exit_to_app</i> Çıkış Yap</a>
				</li>
			{/if}
		</ul>
		<h5>Sayfalar</h5>
		<ul>
			<li>
				<a href="{siteUrl('page/doping')}"><i class="material-icons">flash_on</i> Doping</a>
			</li>
			<li>
				<a href="{siteUrl('news')}"><i class="material-icons">wallpaper</i> Haberler</a>
			</li>
			<li>
				<a href="{siteUrl('page/contact')}"><i class="material-icons">mail</i> İletişim</a>
			</li>
		</ul>
	</ul>
</div>