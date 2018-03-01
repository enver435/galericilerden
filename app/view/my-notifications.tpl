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
					<li>
						<a href="{siteUrl('my-messages')}">
							<i class="material-icons">message</i> Mesajlarım
						</a>
					</li>
					<li class="active">
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
			
			<h4 class="hidden-lg hidden-md" style="margin-bottom: 25px;">Bildirimlerim</h4>
			{if !getUrl(1)}
				<div class="my-notifications">
					{if $return.notifications !== false}
						<div class="block-title hidden-sm hidden-xs">
							<h5>Bildirimlerim</h5>
						</div>
						<div class="row" style="margin-top: 25px;">
							<div class="col-md-10">
								<div class="checkbox">
									<input type="checkbox" name="checkedAll" value="1" class="magic-checkbox">
									<label><b>Hepsini Seç</b></label>
								</div>
							</div>
							<div class="col-md-2">
								<form action="" method="POST">
									<select name="operation" class="form-control" style="padding: 7px;">
										<option value="0">Seçiniz</option>
										<option value="delete">Sil</option>
									</select>

									<div class="deleted"></div>
								</form>
							</div>
						</div>
						<ul>
							{foreach $return.notifications as $notification}
								<a href="{siteUrl('my-notifications/view')}/{$notification.id}" style="display: block;">
									<li class="block notification {if $notification.view == 1}read{/if}" data-id="{$notification.id}">
										<div class="pull-left">
											<div class="checkbox" style="display: inline-block;margin: 0;top: 20px;">
												<input type="checkbox" id="notCheck" name="notification" value="{$notification.id}" class="magic-checkbox">
												<label></label>
											</div>
											<i class="material-icons">notifications</i>
											<strong style="display: inline-block;position: relative;top: 17px;">
												{if $notification.type == 1}İlanınız Onaylandı{elseif $notification.type == 2}İlanınız Onaylanamadı{elseif $notification.type == 3}İlanınızın Yayın Süresi Bitmiştir{elseif $notification.type == 4}Mağazanız Onaylandı{elseif $notification.type == 5}Mağazanız Onaylanamadı{elseif $notification.type == 6}Mağazanızın Yıllık Süresi Bitmiştir{elseif $notification.type == 7}Mağazanızın Yıllık İlan Limiti Bitmiştir{elseif $notification.type == 8}İlanınız Silinmiştir{/if}
											</strong>
										</div>
										<div class="pull-right">
											<strong style="font-size: 13px;color: #333;position: relative;top: 15px;">{$notification.create_time|date_format:"%d.%m.%Y"}</strong>
										</div>
									</li>
								</a>
							{/foreach}
						</ul>
						<ul class="pagination pull-right hidden-sm hidden-xs" style="margin-top: 0;">{$return.pagination.desktopPagination}</ul>
						<div class="mobilePagination hidden-lg hidden-md" style="margin-top: 0;">{$return.pagination.mobilePagination}</div>
						{literal}
							<script type="text/javascript">
								$(function() {
									$('input[name=checkedAll]').change(function() {
										
										if($('input[name=checkedAll]').is(':checked'))
										{
											var htmlInput = '';

											for(var i = 0; i < $('input#notCheck').length; i++)
											{
												$('input#notCheck').attr('checked', true);
												$('input#notCheck')[i].checked = true;

												htmlInput += '<input type="hidden" name="deleted[]" value="' + $('input#notCheck:eq(' + i + ')').val() + '" />';
											}

											$('.deleted').html(htmlInput);
										}
										else
										{
											for(var i = 0; i < $('input#notCheck').length; i++)
											{
												$('input#notCheck').removeAttr('checked', true);
												$('input#notCheck')[i].checked = false;
											}

											$('.deleted').html('');
										}

									});

									$('input[name=notification]').change(function() {

										var val = $(this).val();

										if($(this).is(':checked'))
										{
											$('.deleted').append('<input type="hidden" name="deleted[]" value="' + val + '" />');
										}
										else
										{
											$('.deleted input[value=' + val + ']').remove();
										}

									});

									$('select[name=operation]').change(function() {
										$('form').submit();
									});
								});
							</script>
						{/literal}
					{else}
						<div class="block" style="margin-bottom: 0;">
							<div class="block-title hidden-sm hidden-xs">
								<h5>Bildirimlerim</h5>
							</div>
							<div class="block-content">
								<p class="text-danger text-center" style="margin-top: 15px;margin-bottom: 15px;"><b>Bir sonuç bulunamadı</b></p>
							</div>
						</div>
					{/if}
				</div>
			{else}
				<div class="block default-block my-notifications">
					<div class="block-title hidden-sm hidden-xs">
						<h5>Bildirimlerim</h5>
					</div>
					<div class="block-content">
						<div class="col-md-12">
							<h4>{if $return.notificationInfo.type == 1}İlanınız Onaylandı{elseif $return.notificationInfo.type == 2}İlanınız Onaylanamadı{elseif $return.notificationInfo.type == 3}İlanınızın Yayın Süresi Bitmiştir{elseif $return.notificationInfo.type == 4}Mağazanız Onaylandı{elseif $return.notificationInfo.type == 5}Mağazanız Onaylanamadı{elseif $return.notificationInfo.type == 6}Mağazanızın Yıllık Süresi Bitmiştir{elseif $return.notificationInfo.type == 7}Mağazanızın Yıllık İlan Limiti Bitmiştir{elseif $return.notificationInfo.type == 8}İlanınız Uygun Görülmediğinden Silinmiştir{/if}</h4>

							{if $return.notificationInfo.type == 1}
								<strong>
									<p>{$return.notificationInfo.adId} no lu ilanınız onaylanarak yayına alınmıştır. İlanınızı görüntülemek için <a href="{siteUrl('view')}/{$return.Ads->adInfo($return.notificationInfo.adId, 'seflink')}-{$return.notificationInfo.adId}">tıklayın</a></p>
								</strong>
							{elseif $return.notificationInfo.type == 2 || $return.notificationInfo.type == 8}
								<strong>
									{if $return.notificationInfo.type == 2}
										<p>{$return.notificationInfo.adId} no lu ilanınız onaylanamadı.</p>
									{elseif $return.notificationInfo.type == 8}
										<p>{$return.notificationInfo.adId} no lu ilanınız silinmiştir.</p>
									{/if}
									<p>Lütfen aşağıda belirttiğimiz uygunsuz görülen alanları <a href="{siteUrl('my-ads/ad-edit')}/{$return.notificationInfo.adId}">İlanlarım</a> sayfasından düzeltiniz.</p>

									<p class="error">
										{if $return.notificationInfo.adType == 1}
											İlan başlığı veya ilan açıklaması kurallara uymadığı için ilanınız onaylanmamıştır
										{elseif $return.notificationInfo.adType == 2}
											İlan resimleri orjinal olmadığı için ilanınız onaylanmamıştır
										{elseif $return.notificationInfo.adType == 3}
											Reklam ve spam nedeniyle ilanınız onaylanmamıştır
										{/if}
									</p>
								</strong>
							{elseif $return.notificationInfo.type == 3}
								<strong>
									<p>{$return.notificationInfo.adId} no lu ilanınızın yayın süresi doldu. <a href="{siteUrl('my-ads/finished')}">İlanlarım</a> sayfasından ilanınızın süresini uzatabilirsiniz.</p>
								</strong>
							{elseif $return.notificationInfo.type == 4}
								<strong>
									<p>{$return.notificationInfo.storeId} no lu mağazanız onaylandı. <a href="{siteUrl('my-store')}">Mağazam</a> sayfasından mağazanızı yönetebilirsiniz.</p>
								</strong>
							{elseif $return.notificationInfo.type == 5}
								<strong>
									<p>{$return.notificationInfo.storeId} no lu mağazanız onaylanamadı.</p>
									<p>Lütfen aşağıda belirttiğimiz uygunsuz görülen alanları <a href="{siteUrl('my-store/edit-store')}">Mağazam</a> sayfasından düzeltiniz.</p>

									<p class="error">Mağaza bilgileri yanlış olduğu için aktif edilmemiştir</p>
								</strong>
							{elseif $return.notificationInfo.type == 6}
								<strong>
									<p>{$return.notificationInfo.storeId} no lu mağazanızın yıllık süresi bitmiştir. Mağaza süresini uzatmak için lütfen <a href="{siteUrl('update-store-year')}">tıklayın</a>.</p>
								</strong>
							{elseif $return.notificationInfo.type == 7}
								<strong>
									<p>{$return.notificationInfo.storeId} no lu mağazanızın yıllık ilan limiti bitmiştir. Mağaza limitini yükseltmek için lütfen <a href="{siteUrl('update-store-limit')}">tıklayın</a>.</p>
								</strong>
							{/if}
						</div>
					</div>
				</div>
			{/if}
		</div>
	</div>
</div>