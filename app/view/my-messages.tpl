<div id="main">
	{include file="header.tpl"}
	<div class="page-content">
		<div class="container">
			<div class="profile-header-menu block hidden-sm hidden-xs">
				<ul>
					<li>
						<a href="{siteUrl('my')}">
							<i class="material-icons">home</i> Özet
						</a>
					</li>
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
					<li class="active">
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
				</ul>
			</div>

			<h4 class="hidden-lg hidden-md" style="margin-bottom: 25px;">Mesajlarım</h4>
			<div class="my-messages">
				{if !getUrl(1)}
					{if $return.messages}
						{foreach $return.messages as $message}
							{assign var=adInfo value=$return.Ads->adInfo($message.adsId)}
							
							<a href="{siteUrl('my-messages/view')}/{$message.id}">
								<div class="message block {if $message.view == 1}read{/if}" style="padding: 10px;">
									<img src="{siteUrl('files/ads/thumb')}/{$adInfo.title_image}.jpg" width="80" alt="{$adInfo.title}">
									<div class="message-left">
										<h5><i class="icon icon-message"></i> {$adInfo.title}</h5>
										<small>{userInfo($message.sendUser, 'name')|capitalize} {userInfo($message.sendUser, 'surname')|capitalize}</small>
									</div>
									<div class="message-right">
										<span>{$message.time|date_format:"%d"} {monthName($message.time)} {$message.time|date_format:"%Y"}</span><br>
										<span class="pull-right">{$message.time|date_format:"%H:%M"}</span>
									</div>
								</div>
							</a>
						{/foreach}

						<ul class="pagination pull-right hidden-sm hidden-xs" style="margin-top: 0;">{$return.pagination.desktopPagination}</ul>
						<div class="mobilePagination hidden-lg hidden-md" style="margin-top: 0;">{$return.pagination.mobilePagination}</div>
					{else}
						<div class="block">
							<div class="block-content">
								<p class="text-danger text-center" style="margin-top: 15px;margin-bottom: 15px;"><b>Bir sonuç bulunamadı</b></p>
							</div>
						</div>
					{/if}
				{else}
					{if getUrl(1) == 'view'}
						<div class="ad-info">
							<div class="block">
								<div class="ad-left">
									<img src="{siteUrl('files/ads/thumb')}/{$return.adInfo.title_image}.jpg" alt="{$return.adInfo.title}">
								</div>
								<div class="ad-right">
									<a href="{siteUrl('view')}/{$return.adInfo.seflink}-{$return.adInfo.id}">{$return.adInfo.title}</a>
									<small>
										{if $return.adInfo.category1 != 0}
											{categoryInfo($return.adInfo.category1, 'kategori_adi')}
										{/if}

										{if $return.adInfo.category2 != 0}
											-> {categoryInfo($return.adInfo.category2, 'kategori_adi')}
										{/if}

										{if $return.adInfo.category3 != 0}
											-> {categoryInfo($return.adInfo.category3, 'kategori_adi')}
										{/if}

										{if $return.adInfo.category4 != 0}
											-> {categoryInfo($return.adInfo.category4, 'kategori_adi')}
										{/if}

										{if $return.adInfo.category5 != 0}
											-> {categoryInfo($return.adInfo.category5, 'kategori_adi')}
										{/if}

										{if $return.adInfo.category6 != 0}
											-> {categoryInfo($return.adInfo.category6, 'kategori_adi')}
										{/if}

										{if $return.adInfo.category7 != 0}
											-> {categoryInfo($return.adInfo.category7, 'kategori_adi')}
										{/if}

										{if $return.adInfo.category8 != 0}
											-> {categoryInfo($return.adInfo.category8, 'kategori_adi')}
										{/if}

										{if $return.adInfo.category9 != 0}
											-> {categoryInfo($return.adInfo.category9, 'kategori_adi')}
										{/if}

										{if $return.adInfo.category10 != 0}
											-> {categoryInfo($return.adInfo.category10, 'kategori_adi')}
										{/if}
									</small>
									<strong>
										{$return.adInfo.price|number_format:0:".":","}
										{if $return.adInfo.price_type == 0}
											<i class="icon icon-tl"></i>
										{elseif $return.adInfo.price_type == 1}
											<i class="icon icon-euro"></i>
										{elseif $return.adInfo.price_type == 2}
											<i class="icon icon-usd"></i>
										{/if}
									</strong>
								</div>
							</div>
						</div>
						<div class="block" style="overflow: hidden;padding: 15px;">
							{if $smarty.session.userId != $return.messageInfo.sendUser}
								<b class="name-surname">{userInfo($return.messageInfo.sendUser, 'name')|capitalize} {userInfo($return.messageInfo.sendUser, 'surname')|capitalize}</b>
								<span class="phone-no">{userInfo($return.messageInfo.sendUser, 'phone')}</span>
							{/if}

							{if $smarty.session.userId != $return.messageInfo.toUser}
								<b class="name-surname">{userInfo($return.messageInfo.toUser, 'name')|capitalize} {userInfo($return.messageInfo.toUser, 'surname')|capitalize}</b>
								<span class="phone-no">{userInfo($return.messageInfo.toUser, 'phone')}</span>
							{/if}

							<a href="{siteUrl('my-messages/delete')}/{$return.messageInfo.id}" title="Sil" style="display: block;float: right;color: #333;">
								<i class="material-icons">delete</i>
							</a>
						</div>
						<div class="messages">
							{foreach $return.messagesContent as $message}
								{if $smarty.session.userId != $message.sendUser}
									<div class="sendUser">
										<div class="message-left">
											<b>{userInfo($return.messageInfo.sendUser, 'name')|capitalize} {userInfo($return.messageInfo.sendUser, 'surname')|capitalize}</b>
											<span>{$message.message}</span>
										</div>
										<div class="message-right">
											<span>{$message.time|date_format:"%d"} {monthName($message.time)} {$message.time|date_format:"%Y"}</span><br>
											<span class="pull-right">{$message.time|date_format:"%H:%M"}</span>
										</div>
									</div>
								{/if}

								{if $smarty.session.userId != $message.toUser}
									<div class="myUser">
										<div class="message-left">
											<b>Ben</b>
											<span>{$message.message}</span>
										</div>
										<div class="message-right">
											<span>{$message.time|date_format:"%d"} {monthName($message.time)} {$message.time|date_format:"%Y"}</span><br>
											<span class="pull-right">{$message.time|date_format:"%H:%M"}</span>
										</div>
									</div>
								{/if}
							{/foreach}
						</div>
						<div class="block">
							<div class="default-block">
								<div class="block-content">
									<i class="material-icons" style="float: left;">security</i>
						          	<p>Satıcıyla yüz yüze görüşmeden ve alacağınız ürünü görmeden kapora ödemeyin, para göndermeyin.</p>
						          	<p>
						          		<a href="#">Güvenli Alışverişin İpuçları için tıklayın.</a>
						          	</p>
						          	<form action="" method="POST">
						          		<textarea name="message" class="form-control" cols="30" rows="10" placeholder="Mesajınız"></textarea>
						          		<button type="button" class="btn btn-primary" disabled="disabled">Gönder</button>
						          	</form>
						          	{literal}
						          		<script type="text/javascript">
						          			$(function() {
						          				$('textarea').keyup(function() {
						          					
						          					var length = $(this).val().length;

						          					if(length > 0)
						          					{
						          						$('.my-messages button').removeAttr('disabled', true).attr('type', 'submit').attr('name', 'send_message');
						          					}
						          					else
						          					{
						          						$('.my-messages button').attr('disabled', true).attr('type', 'button').removeAttr('name', true);
						          					}

						          				});
						          			});
						          		</script>
						          	{/literal}
					          	</div>
				          	</div>
						</div>
					{/if}
				{/if}
			</div>
		</div>
	</div>
</div>