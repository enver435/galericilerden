{include file="header.tpl"}
<div id="main" class="profile-menu">
	<div class="page-content">
		<ul class="submenu">
			<li>
				<a href="{siteUrl('my-ads/active')}">
					<i class="material-icons">view_stream</i> İlanlarım
				</a>
			</li>
			<li>
				<a href="{siteUrl('my-favorites')}">
					<i class="material-icons">star</i> Favorilerim
				</a>
			</li>
			<li>
				<a href="{siteUrl('my-messages')}">
					<i class="material-icons">message</i> Mesajlarım
				</a>
			</li>
			<li>
				<a href="{siteUrl('my-notifications')}">
					<i class="material-icons">notifications</i> Bildirimlerim
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
</div>
{literal}
	<script type="text/javascript">
		$(function() {

			var windowWidth = $(window).width();

			if(windowWidth > 991)
			{
				window.location.href = '{/literal}{SITE_URL}{literal}';
			}

			$(window).resize(function() {
				var windowWidth = $(window).width();

				if(windowWidth > 991)
				{
					window.location.href = '{/literal}{SITE_URL}{literal}';
				}
			});
		});
	</script>
{/literal}