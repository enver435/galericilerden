<div id="main">
	{include file="header.tpl"}
	<div class="page-content">
		<div class="container">
			<div class="row">
				{assign var=categoryInfo value=$return.categoryInfo scope="global"}
				{assign var=categoryModulItems value=$return.categoryModulItems scope="global"}
				{assign var=cities value=$return.cities}
				{assign var=Ads value=$return.Ads scope="global"}
				{assign var=actualLinkOrderBy value=$return.actualLinkOrderBy scope="global"}

				{assign var=typeAracSahibi value=$Ads->checkTypeAds($smarty.get.catId, null, 0)}
				{assign var=typeGaleriden value=$Ads->checkTypeAds($smarty.get.catId, null, 1)}
				{assign var=typeYetkiliBayiden value=$Ads->checkTypeAds($smarty.get.catId, null, 2)}
				{assign var=typeUreticiden value=$Ads->checkTypeAds($smarty.get.catId, null, 3)}

				{include file="static/sidebar.tpl"}
				
				<div class="ad-list">
					<div class="col-lg-10 col-md-10" style="padding-left: 0;width: 80%;">
						<div class="block category-step">
							<p style="display: inline-block;"><b>"{$return.Category->getAllTopCategory($smarty.get.catId)}"</b> aramanızda <strong style="color: #ff263a;">{$return.categoryAdsCount|number_format:0:".":","} ilan</strong> bulundu</p>
							{if $smarty.session.login}
								<link rel="stylesheet" href="{siteUrl('public/styles/sweetalert.css')}" />
								<script type="text/javascript" src="{siteUrl('public/scripts/sweetalert.min.js')}"></script>
								<p class="pull-right save-search" onclick="{literal}addFavoriteSearch({/literal}{$categoryInfo.Id}, {if !$smarty.get.type}null{else}{$smarty.get.type}{/if}, {if !$smarty.get.orderby}0{else}{if $smarty.get.orderby == 'pricehigh'}1{elseif $smarty.get.orderby == 'pricelow'}2{elseif $smarty.get.orderby == 'datenew'}3{elseif $smarty.get.orderby == 'dateold'}4{elseif $smarty.get.orderby == 'kmlow'}5{elseif $smarty.get.orderby == 'kmhigh'}6{elseif $smarty.get.orderby == 'yearold'}7{elseif $smarty.get.orderby == 'yearnew'}8{/if}{/if}{literal});{/literal}"><i class="material-icons" style="vertical-align: middle;">search</i> Aramayı Kaydet</p>
							{else}
								<p class="pull-right save-search" onclick="{literal}window.location.href='{/literal}{SITE_URL}{literal}/login'{/literal}"><i class="material-icons" style="vertical-align: middle;">search</i> Aramayı Kaydet</p>
							{/if}
						</div>
						
						<div class="ads-container">
							<div class="block hidden-sm hidden-xs">
								<div class="tab-menu">
									<ul>
										{assign "find" array('&type=0', '&type=1', '&type=2', '&type=3')}
										{assign "repl" array('', '', '', '')}

										<li {if !isset($smarty.get.type)}class="active"{/if}>
											<a href="{$return.actualLink|replace:$find:$repl}">Tüm İlanlar</a>
										</li>
										{if $typeAracSahibi === true}
											<li {if isset($smarty.get.type) AND $smarty.get.type == 0}class="active"{/if}>
												<a href="{$return.actualLink|replace:$find:$repl}&type=0">Araç Sahibi</a>
											</li>
										{/if}
										{if $typeGaleriden === true}
											<li {if $smarty.get.type == 1}class="active"{/if}>
												<a href="{$return.actualLink|replace:$find:$repl}&type=1">Galeriden</a>
											</li>
										{/if}
										{if $typeYetkiliBayiden === true}
											<li {if $smarty.get.type == 2}class="active"{/if}>
												<a href="{$return.actualLink|replace:$find:$repl}&type=2">Yetkili Bayiden</a>
											</li>
										{/if}
										{if $typeUreticiden === true}
											<li {if $smarty.get.type == 3}class="active"{/if}>
												<a href="{$return.actualLink|replace:$find:$repl}&type=3">Üreticiden</a>
											</li>
										{/if}
									</ul>
								</div>
							</div>
							<div class="orderby hidden-sm hidden-xs">
								<div class="row">
									<div class="col-md-9"></div>
									<div class="col-md-3">
										<select name="orderby" class="form-control">
											<option value="0" {if !$smarty.get.orderby}selected="selected"{/if}>Sıralama Seçenekleri</option>
											<option value="pricehigh" {if $smarty.get.orderby == 'pricehigh'}selected="selected"{/if}>Fiyata Göre (Önce en yüksek)</option>
											<option value="pricelow" {if $smarty.get.orderby == 'pricelow'}selected="selected"{/if}>Fiyata Göre (Önce en düşük)</option>
											<option value="datenew" {if $smarty.get.orderby == 'datenew'}selected="selected"{/if}>Tarihe Göre (Önce en yeni ilan)</option>
											<option value="dateold" {if $smarty.get.orderby == 'dateold'}selected="selected"{/if}>Tarihe Göre (Önce en eski ilan)</option>
											<option value="kmlow" {if $smarty.get.orderby == 'kmlow'}selected="selected"{/if}>Km'ye Göre (Önce en düşük)</option>
											<option value="kmhigh" {if $smarty.get.orderby == 'kmhigh'}selected="selected"{/if}>Km'ye Göre (Önce en yüksek)</option>
											<option value="yearold" {if $smarty.get.orderby == 'yearold'}selected="selected"{/if}>Yıla Göre (Önce en eski)</option>
											<option value="yearnew" {if $smarty.get.orderby == 'yearnew'}selected="selected"{/if}>Yıla Göre (Önce en yeni)</option>
										</select>
									</div>
								</div>
							</div>
							<div class="block">
								<div class="list-desktop hidden-sm hidden-xs">
									{if $return.categoryDopingUpAds}
										<div class="doping-up" style="margin-bottom: 15px;">
											<table class="table">
												<thead>
													<tr>
														<th></th>
														<th>Seri</th>
														<th>Model</th>
														<th>İlan Başlığı</th>
														<th>Yıl</th>
														<th>Km</th>
														<th>Fiyat</th>
														<th>İlan Tarihi</th>
														<th>İl / İlçe</th>
													</tr>
												</thead>
												<tbody>	
													{foreach $return.categoryDopingUpAds as $ads}
														<tr onclick="location.href='{siteUrl('view')}/{$ads.adSeflink}-{$ads.adId}'" class="{if $ads.doping_differently == 1}doping-differently{/if}{if $ads.doping_acil == 1} doping-acil{/if}">
															<td width="116">
																<img src="{siteUrl('files/ads/thumb')}/{$ads.title_image}.jpg" width="116" alt="{$ads.title}">
															</td>
															<td>{if !categoryInfo($ads.category3, 'kategori_adi')}Yok{else}{categoryInfo($ads.category3, 'kategori_adi')}{/if}</td>
															<td>{if !categoryInfo($ads.category4, 'kategori_adi')}Yok{else}{categoryInfo($ads.category4, 'kategori_adi')}{/if}</td>
															<td>{$ads.title}</td>
															<td>{if $ads.year > 0}{$ads.year}{else}Yok{/if}</td>
															<td>{if $ads.km > 0}{$ads.km}{else}Yok{/if}</td>
															<td>
																{$ads.price|number_format:0:".":","}
																{if $ads.price_type == 0}
																	<i class="icon icon-tl"></i>
																{elseif $ads.price_type == 1}
																	<i class="icon icon-euro"></i>
																{elseif $ads.price_type == 2}
																	<i class="icon icon-usd"></i>
																{/if}
															</td>
															<td>{$ads.create_time|date_format:"%d"} {monthName($ads.create_time)} {$ads.create_time|date_format:"%Y"}</td>
															<td>{cityInfo($ads.adCity, 'CityName')} / {countyInfo($ads.adCounty, 'CountyName')}</td>
														</tr>
													{/foreach}
												</tbody>
											</table>
										</div>
										<div class="message-doping-up">SİZ DE İLANINIZIN YUKARIDA YER ALMASINI İSTİYORSANIZ <a href="#" style="color: #fff;">TIKLAYIN</a>.</div>
									{/if}
									{if $return.categoryAds}
										<table class="table">
											<thead>
												<tr>
													<th></th>
													<th>Seri</th>
													<th>Model</th>
													<th>İlan Başlığı</th>
													<th>Yıl</th>
													<th>Km</th>
													<th>Fiyat</th>
													<th>İlan Tarihi</th>
													<th>İl / İlçe</th>
												</tr>
											</thead>
											<tbody>
												{foreach $return.categoryAds as $ads}
													<tr onclick="location.href='{siteUrl('view')}/{$ads.adSeflink}-{$ads.adId}'" class="{if $ads.doping_differently == 1}doping-differently{/if}{if $ads.doping_acil == 1} doping-acil{/if}">
														<td width="116">
															<img src="{siteUrl('files/ads/thumb')}/{$ads.title_image}.jpg" width="116" alt="{$ads.title}">
														</td>
														<td>{if !categoryInfo($ads.category3, 'kategori_adi')}Yok{else}{categoryInfo($ads.category3, 'kategori_adi')}{/if}</td>
														<td>{if !categoryInfo($ads.category4, 'kategori_adi')}Yok{else}{categoryInfo($ads.category4, 'kategori_adi')}{/if}</td>
														<td>{$ads.title}</td>
														<td>{if $ads.year > 0}{$ads.year}{else}Yok{/if}</td>
														<td>{if $ads.km > 0}{$ads.km}{else}Yok{/if}</td>
														<td>
															{$ads.price|number_format:0:".":","}
															{if $ads.price_type == 0}
																<i class="icon icon-tl"></i>
															{elseif $ads.price_type == 1}
																<i class="icon icon-euro"></i>
															{elseif $ads.price_type == 2}
																<i class="icon icon-usd"></i>
															{/if}
														</td>
														<td>{$ads.create_time|date_format:"%d"} {monthName($ads.create_time)} {$ads.create_time|date_format:"%Y"}</td>
														<td>{cityInfo($ads.adCity, 'CityName')} / {countyInfo($ads.adCounty, 'CountyName')}</td>
													</tr>
												{/foreach}
											</tbody>
										</table>
									{else}
										<div class="block" style="margin-bottom: 0;">
											<p class="text-danger text-center" style="margin-top: 15px;"><b>Bu kategoriye ait sonuç bulunamadı</b></p>
										</div>
									{/if}
								</div>
								<div class="list-mobile hidden-lg hidden-md">
									{if $return.categoryDopingUpAds}
										<ul class="doping-up">
											{foreach $return.categoryDopingUpAds as $ads}
												<li class="{if $ads.doping_differently == 1}doping-differently{/if}{if $ads.doping_acil == 1} doping-acil{/if}">
													<img src="{siteUrl('files/ads/thumb')}/{$ads.title_image}.jpg" width="80" alt="{$ads.title}">
													<div class="title">
														<a href="{siteUrl('view')}/{siteUrl('view')}/{$ads.adSeflink}-{$ads.adId}">{strShorten($ads.title, 40, '...')}</a>
													</div>
													<span class="address"><i class="material-icons">location_on</i> {cityInfo($ads.adCity, 'CityName')} / {countyInfo($ads.adCounty, 'CountyName')}</span>
													<span class="price">
														{$ads.price|number_format:0:".":","}
														{if $ads.price_type == 0}
															<i class="icon icon-tl"></i>
														{elseif $ads.price_type == 1}
															<i class="icon icon-euro"></i>
														{elseif $ads.price_type == 2}
															<i class="icon icon-usd"></i>
														{/if}
													</span>
													<span class="date">{$ads.create_time|date_format:"%d"} {monthName($ads.create_time)}</span>
													<a class="overlay" href="{siteUrl('view')}/{$ads.adSeflink}-{$ads.adId}"></a>
												</li>
											{/foreach}
										</ul>
										<div class="message-doping-up">SİZ DE İLANINIZIN YUKARIDA YER ALMASINI İSTİYORSANIZ <a href="#" style="color: #fff;">TIKLAYIN</a>.</div>
									{/if}
									{if $return.categoryAds}
										<ul>
											{foreach $return.categoryAds as $ads}
												<li class="{if $ads.doping_differently == 1}doping-differently{/if}{if $ads.doping_acil == 1} doping-acil{/if}">
													<img src="{siteUrl('files/ads/thumb')}/{$ads.title_image}.jpg" width="80" alt="{$ads.title}">
													<div class="title">
														<a href="{siteUrl('view')}/{$ads.adSeflink}-{$ads.adId}">{strShorten($ads.title, 40, '...')}</a>
													</div>
													<span class="address"><i class="material-icons">location_on</i> {cityInfo($ads.adCity, 'CityName')} / {countyInfo($ads.adCounty, 'CountyName')}</span>
													<span class="price">
														{$ads.price|number_format:0:".":","}
														{if $ads.price_type == 0}
															<i class="icon icon-tl"></i>
														{elseif $ads.price_type == 1}
															<i class="icon icon-euro"></i>
														{elseif $ads.price_type == 2}
															<i class="icon icon-usd"></i>
														{/if}
													</span>
													<span class="date">{$ads.create_time|date_format:"%d"} {monthName($ads.create_time)}</span>
													<a class="overlay" href="{siteUrl('view')}/{$ads.adSeflink}-{$ads.adId}"></a>
												</li>
											{/foreach}
										</ul>
									{else}
										<div class="block" style="margin-bottom: 0;">
											<p class="text-danger text-center" style="margin-top: 15px;"><b>Bu kategoriye ait sonuç bulunamadı</b></p>
										</div>
									{/if}
								</div>
								<div class="list-bottom hidden-lg hidden-md">
									<div class="row">
										<div class="col-xs-6" onclick="adsFilter();">
											<i class="material-icons">build</i>
											<span>Filtrele</span>
										</div>
										<div class="col-xs-6" data-toggle="modal" data-target="#sortModal">
											<i class="material-icons">sort</i>
											<span>Sırala</span>
										</div>
									</div>
								</div>
							</div>
							{if $return.categoryAdsPagination.desktopPagination != ''}
								<div class="list-bottom-pagination hidden-sm hidden-xs">
									<ul class="pagination">{$return.categoryAdsPagination.desktopPagination}</ul>
									
									{assign "find" array('&pageSize=15', '&pageSize=50')}
									{assign "repl" array('', '')}
									<div class="pageSize">
										<span>Her sayfada</span>
										<ul class="pagination">
											<li {if $smarty.get.pageSize == 15}class="active"{/if}>
												<a href="{$return.actualLink|replace:$find:$repl}&pageSize=15">15</a>
											</li>
											<li {if $smarty.get.pageSize == 50}class="active"{/if}>
												<a href="{$return.actualLink|replace:$find:$repl}&pageSize=50">50</a>
											</li>
										</ul>
										<span>sonuç göster</span>
									</div>
								</div>
								<div class="mobilePagination hidden-lg hidden-md">{$return.categoryAdsPagination.mobilePagination}</div>
							{/if}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="mobile-filters hidden-lg hidden-md">
	<div class="col-md-12" style="margin-top: 15px;">
		<i class="material-icons" onclick="{literal}$('.mobile-filters').hide(); $('.ad-list').show();{/literal}" style="margin-bottom: 15px;display: block;text-align: right;font-size: 30px;cursor: pointer;color: #fb2539;font-weight: bold;">close</i>
		<div class="form-group">
			<label>Kimden: </label>
			<select name="type" class="form-control">
				<option value="all" {if !isset($smarty.get.type)}selected="selected"{/if}>Tüm İlanlar</option>
				{if $typeAracSahibi === true}
					<option value="0" {if isset($smarty.get.type) AND $smarty.get.type == 0}selected="selected"{/if}>Araç Sahibi</option>
				{/if}
				{if $typeGaleriden === true}
					<option value="1" {if isset($smarty.get.type) AND $smarty.get.type == 1}selected="selected"{/if}>Galeriden</option>
				{/if}
				{if $typeYetkiliBayiden === true}
					<option value="2" {if isset($smarty.get.type) AND $smarty.get.type == 2}selected="selected"{/if}>Yetkili Bayiden</option>
				{/if}
				{if $typeUreticiden === true}
					<option value="3" {if isset($smarty.get.type) AND $smarty.get.type == 3}selected="selected"{/if}>Üreticiden</option>
				{/if}
			</select>
		</div>
		<div class="form-group">
			<label>İl: </label>
			<select name="city" class="form-control">
				<option value="0" selected="selected">Tümü</option>
				{foreach $cities as $city}
					<option value="{$city.CityID}" {if $smarty.get.city == $city.CityID}selected="selected"{/if}>{$city.CityName}</option>
				{/foreach}
			</select>
		</div>
		<div class="form-group">
			<label>İlçe: </label>
			<select name="county" class="form-control">
				<option value="0" selected="selected">Tümü</option>
			</select>
		</div>
		<div class="form-group">
			<label>Fiyat: </label>
			<div class="row input-inline">
				<div class="col-md-6 col-xs-12">
					<input type="number" name="priceMin" value="{$smarty.get.priceMin}" placeholder="min" class="form-control">
				</div>
				<div class="col-md-6 col-xs-12">
					<input type="number" name="priceMax" value="{$smarty.get.priceMax}" placeholder="max" class="form-control">
				</div>
			</div>
		</div>
		{$categoryModulItems.template}
		<div class="list-bottom" style="left: 0;right: 0;display: none;">
			<div class="col-xs-6 result" style="width: 100%;">Aramayı Daralt</div>
		</div>
	</div>
</div>
<div class="mobile-sort hidden-lg hidden-md">
	<div class="modal fade" id="sortModal" role="dialog">
	    <div class="modal-dialog modal-sm">
	      	<div class="modal-content">
		        <div class="modal-header">
		          	<button type="button" class="close" data-dismiss="modal">&times;</button>
		          	<h4 class="modal-title">Sıralama Seçenekleri</h4>
		        </div>
		        <div class="modal-body">
		          	<ul>
		          		<li data-sort="0">Normal Sıralama</li>
		          		<li data-sort="pricehigh">Fiyata Göre (Önce en yüksek)</li>
		          		<li data-sort="pricelow">Fiyata Göre (Önce en düşük)</li>
		          		<li data-sort="datenew">Tarihe Göre (Önce en yeni ilan)</li>
		          		<li data-sort="dateold">Tarihe Göre (Önce en eski ilan)</li>
		          		<li data-sort="kmlow">Km'ye Göre (Önce en düşük)</li>
		          		<li data-sort="kmhigh">Km'ye Göre (Önce en yüksek)</li>
		          		<li data-sort="yearold">Yıla Göre (Önce en eski)</li>
		          		<li data-sort="yearnew">Yıla Göre (Önce en yeni)</li>
		          	</ul>
		        </div>
	      	</div>
	    </div>
  	</div>
</div>