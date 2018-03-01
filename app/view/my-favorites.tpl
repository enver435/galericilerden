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
					<li class="active">
						<a href="{siteUrl('my-favorites/ads')}">
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
				</ul>
			</div>

			<h4 class="hidden-lg hidden-md" style="margin-bottom: 25px;">Favorilerim</h4>
			<ul class="profile-tab">
				<li {if getUrl(1) == 'ads'}class="active"{/if}>
					<a href="{siteUrl('my-favorites/ads')}">Favori İlanlarım</a>
				</li>
				<li {if getUrl(1) == 'search'}class="active"{/if}>
					<a href="{siteUrl('my-favorites/search')}">Favori Aramalarım</a>
				</li>
			</ul>
	
			<div class="my-favorites"> 
				{if getUrl(1) == 'ads'}
					{if $return.favorites}
						{foreach $return.favorites as $favorite}
							{assign var=adInfo value=$return.Ads->adInfo($favorite.adsId)}
							
							<div class="favorite block" style="padding: 10px;">
								<a href="{siteUrl('view')}/{$adInfo.seflink}-{$adInfo.id}">
									<img src="{siteUrl('files/ads/thumb')}/{$adInfo.title_image}.jpg" width="100" alt="{$return.adInfo.title}">
									<div class="favorite-left">
										<h5 style="margin-bottom: 5px;">{$adInfo.title}</h5>
										<small style="display: block;">
											{if $adInfo.category1 != 0}
												{categoryInfo($adInfo.category1, 'kategori_adi')}
											{/if}

											{if $adInfo.category2 != 0}
												-> {categoryInfo($adInfo.category2, 'kategori_adi')}
											{/if}

											{if $adInfo.category3 != 0}
												-> {categoryInfo($adInfo.category3, 'kategori_adi')}
											{/if}

											{if $adInfo.category4 != 0}
												-> {categoryInfo($adInfo.category4, 'kategori_adi')}
											{/if}

											{if $adInfo.category5 != 0}
												-> {categoryInfo($adInfo.category5, 'kategori_adi')}
											{/if}

											{if $adInfo.category6 != 0}
												-> {categoryInfo($adInfo.category6, 'kategori_adi')}
											{/if}

											{if $adInfo.category7 != 0}
												-> {categoryInfo($adInfo.category7, 'kategori_adi')}
											{/if}

											{if $adInfo.category8 != 0}
												-> {categoryInfo($adInfo.category8, 'kategori_adi')}
											{/if}

											{if $adInfo.category9 != 0}
												-> {categoryInfo($adInfo.category9, 'kategori_adi')}
											{/if}

											{if $adInfo.category10 != 0}
												-> {categoryInfo($adInfo.category10, 'kategori_adi')}
											{/if}
										</small>
										{assign var=userStore value=$return.Store->getUserStore($adInfo.user_id)}

										{if $userStore === false}
											{if $adInfo.status == 1 AND $adInfo.public_end_date > $smarty.now}
												<span style="font-weight: 700;color: #3c763d;font-size: 13px;">Yayında</span>
											{elseif $adInfo.status == 1 AND $adInfo.public_end_date < $smarty.now || $adInfo.status == 2 || $adInfo.status == 3 || $adInfo.status == 4}
												<span style="font-weight: 700;color: #ff263a;font-size: 13px;">Yayında Değil</span>
											{/if}
										{else}
											{if $userStore.status == 1}

												{if $smarty.now > $userStore.end_time}
													<span style="font-weight: 700;color: #ff263a;font-size: 13px;">Yayında Değil</span>
												{else}
													{if $adInfo.status == 1 AND $adInfo.public_end_date > $smarty.now}
														<span style="font-weight: 700;color: #3c763d;font-size: 13px;">Yayında</span>
													{elseif $adInfo.status == 1 AND $adInfo.public_end_date < $smarty.now || $adInfo.status == 2 || $adInfo.status == 3 || $adInfo.status == 4}
														<span style="font-weight: 700;color: #ff263a;font-size: 13px;">Yayında Değil</span>
													{/if}
												{/if}

											{elseif $userStore.status == 0}
												<span style="font-weight: 700;color: #ff263a;font-size: 13px;">Yayında Değil</span>
											{elseif $userStore.status == 2}
												<span style="font-weight: 700;color: #ff263a;font-size: 13px;">Yayında Değil</span>
											{/if}
										{/if}
									</div>
								</a>
								<div class="favorite-right">
									<a href="{siteUrl('my-favorites/ads/delete')}/{$favorite.id}" title="Sil" style="display: block;color: #333;text-align: right;margin-top: 15px;">
										<i class="material-icons">delete</i>
									</a>
								</div>
							</div>
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
				{elseif getUrl(1) == 'search'}
					{if $return.favorites}
						<link rel="stylesheet" href="{siteUrl('public/styles/sweetalert.css')}" />
						<script type="text/javascript" src="{siteUrl('public/scripts/sweetalert.min.js')}"></script>
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
									{foreach $return.favorites as $favorite}
										<tr>
											<td width="5%">{$favorite.id}</td>
											<td>
												<a href="{if $favorite.category > 0}{siteUrl('cat-')}{$favorite.category}/{categoryInfo($favorite.category, 'seflink')}{if $favorite.city > 0}&city={$favorite.city}{/if}{if $favorite.county > 0}&county={$favorite.county}{/if}{if $favorite.price_min > 0}&priceMin={$favorite.price_min}{/if}{if $favorite.price_max > 0}&priceMax={$favorite.price_max}{/if}{else}{siteUrl('category-special')}/{if $favorite.category_special == 1}ilk-sahibinden{elseif $favorite.category_special == 2}yeni-gibi{elseif $favorite.category_special == 3}ekspertizli{elseif $favorite.category_special == 4}acil{elseif $favorite.category_special == 5}fiyati-dusenler{/if}{if $favorite.city > 0}&city={$favorite.city}{/if}{if $favorite.county > 0}&county={$favorite.county}{/if}{if $favorite.price_min > 0}&priceMin={$favorite.price_min}{/if}{if $favorite.price_max > 0}&priceMax={$favorite.price_max}{/if}{/if}{foreach $return.FavoritesSearch->favoriteSearchItems($favorite.id) as $item}{if $item.type == 1}{if $item.itemValueMin > 0}&item_{$item.itemId}_min={$item.itemValueMin}{/if}{if $item.itemValueMax > 0}&item_{$item.itemId}_max={$item.itemValueMax}{/if}{elseif $item.type == 2}{if $item.itemSelect > 0}&item_{$item.itemId}={$item.itemSelect}{/if}{/if}{/foreach}{if $favorite.user_type != 'null'}&type={$favorite.user_type}{/if}{if $favorite.orderby != 0}&orderby={if $favorite.orderby == 1}pricehigh{elseif $favorite.orderby == 2}pricelow{elseif $favorite.orderby == 3}datenew{elseif $favorite.orderby == 4}dateold{elseif $favorite.orderby == 5}kmlow{elseif $favorite.orderby == 6}kmhigh{elseif $favorite.orderby == 7}yearold{elseif $favorite.orderby == 8}yearnew{/if}{/if}" style="display: block;width: 100%;height: 100%;" target="_blank">{$favorite.name}</a>
											</td>
											<td width="20%">
												<a href="javascript:void(0);" onclick="{literal}editFavoriteSearch({/literal}{$favorite.id}, '{$favorite.name}'{literal});{/literal}" style="display: inline-block;width: auto;padding: 0;">
													<button type="button" class="btn btn-primary" style="font-size: 13px;">Düzenle</button>
												</a>
												<a href="{siteUrl('my-favorites/search/delete')}/{$favorite.id}" style="display: inline-block;width: auto;padding: 0;">
													<button type="button" class="btn btn-primary" style="font-size: 13px;">Sil</button>
												</a>
											</td>
										</tr>
									{/foreach}
								</tbody>
							</table>
						</div>

						<ul class="pagination pull-right hidden-sm hidden-xs" style="margin-top: 0;">{$return.pagination.desktopPagination}</ul>
						<div class="mobilePagination hidden-lg hidden-md" style="margin-top: 0;">{$return.pagination.mobilePagination}</div>
					{else}
						<div class="block">
							<div class="block-content">
								<p class="text-danger text-center" style="margin-top: 15px;margin-bottom: 15px;"><b>Bir sonuç bulunamadı</b></p>
							</div>
						</div>
					{/if}
				{/if}
			</div>
		</div>
	</div>
</div>