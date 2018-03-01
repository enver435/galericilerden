{include file="../header.tpl"}
<div class="store-main-page">
	<div class="container">
		<div class="store-theme hidden-sm hidden-xs">
			<img src="{siteUrl('public/images/store/header')}{$return.storeInfo.store_theme}.jpg" width="100%" alt="{$header.storeInfo.store_name}">
		</div>
		<div class="store-content">
			<div class="col-md-3">
				<div class="left-sidebar">
					<div class="block col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0 col-sm-6 col-sm-offset-3" style="padding: 0;float: none;">
						<div class="block-content">
							<div class="store-info">
								<img src="{siteUrl('files/store/big')}/{$return.storeInfo.store_logo}.jpg" width="100%" alt="{$return.storeInfo.store_name}">
								<h1>{$return.storeInfo.store_name|upper}</h1>
								{if userInfo($return.storeInfo.user_id, 'phone') != ''}
									<p>
										<i class="material-icons">phone</i> {userInfo($return.storeInfo.user_id, 'phone')}
									</p>
								{/if}
								{if userInfo($return.storeInfo.user_id, 'phone_work') != ''}
									<p>
										<i class="material-icons">phone</i> {userInfo($return.storeInfo.user_id, 'phone_work')}
									</p>
								{/if}
								{if userInfo($return.storeInfo.user_id, 'phone_more')}
									<p>
										<i class="material-icons">phone</i> {userInfo($return.storeInfo.user_id, 'phone_more')}
									</p>
								{/if}
							</div>
						</div>
					</div>
					{if $return.storeAds}
						<div class="block hidden-sm hidden-xs">
							<div class="block-title">
								<h5>Araçlarımız</h5>
							</div>
							<div class="block-content" style="height: 300px;overflow-y: auto;">
								<ul>
									{if !isset($smarty.get.catId)}
										{foreach $return.Category->getStoreCategorys(null, $return.storeInfo.user_id, false) as $category}
											{if !empty($category)}
												<li>
													<a href="{$return.realDomain}?catId={$category.Id}">
														<i class="material-icons">list</i> {$category.kategori_adi} ({$return.Ads->categoryStoreAds($category.Id, $return.storeInfo.user_id, null, null, null, null)|count}) <i class="material-icons arrow-right">keyboard_arrow_right</i>
													</a>
												</li>
											{/if}
										{/foreach}
									{/if}

									{if isset($smarty.get.catId)}
										<li>
											<a href="{$return.realDomain}">
												<i class="material-icons">list</i> Tümü <i class="material-icons arrow-right">keyboard_arrow_right</i>
											</a>
										</li>
										{if categoryInfo($smarty.get.catId, 'ustkategoriId') != 0}
											<li>
												<a href="{$return.realDomain}?catId={categoryInfo(categoryInfo($smarty.get.catId, 'ustkategoriId'), 'Id')}">
													<i class="material-icons">list</i> {categoryInfo(categoryInfo($smarty.get.catId, 'ustkategoriId'), 'kategori_adi')} <i class="material-icons arrow-right">keyboard_arrow_right</i>
												</a>
											</li>
										{else}
											<li>
												<a href="{$return.realDomain}?catId={$smarty.get.catId}">
													<i class="material-icons">list</i> {categoryInfo($smarty.get.catId, 'kategori_adi')} <i class="material-icons arrow-right">keyboard_arrow_right</i>
												</a>
											</li>
										{/if}
										{assign var=subcategorys value=$return.Category->getStoreCategorys($smarty.get.catId,  $return.storeInfo.user_id, true)}
										
										{if !empty($subcategorys)}
											{foreach $subcategorys as $subcategory}
												{if !empty($subcategory)}
													<li>
														<a href="{$return.realDomain}?catId={$subcategory.Id}">
															<i class="material-icons">list</i> {$subcategory.kategori_adi} ({$return.Ads->categoryStoreAds($subcategory.Id, $return.storeInfo.user_id, null, null, null, null)|count}) <i class="material-icons arrow-right">keyboard_arrow_right</i>
														</a>
													</li>
												{/if}
											{/foreach}
										{/if}
									{/if}
								</ul>
							</div>
						</div>
					{/if}
					<div class="block sales-info hidden-sm hidden-xs">
						<div class="block-title">
							<h5>Satış Temsilcisi</h5>
						</div>
						<div class="block-content">
							<img src="" width="50" height="50" alt="">
							<p>{$return.storeInfo.sales_name|capitalize} {$return.storeInfo.sales_surname|capitalize}</p>
							<span>{$return.storeInfo.sales_phone}</span>
						</div>
					</div>
					<div class="block about-store hidden-sm hidden-xs">
						<div class="block-title">
							<h5>Hakkımızda</h5>
						</div>
						<div class="block-content">{$return.storeInfo.store_text}</div>
					</div>
				</div>
			</div>
			<div class="col-md-9">
				<div class="ads-container-top">
					<div class="row"> 
						{if ($return.storeInfo.end_time|date_format:"%Y" - $return.storeInfo.create_time|date_format:"%Y") > 0}
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="certificate">
									<span>ÜYELİK</span>
									<img src="{siteUrl('public/images/certificate.svg')}" width="35" alt="certificate">
									<span>{$return.storeInfo.end_time|date_format:"%Y" - $return.storeInfo.create_time|date_format:"%Y"}.YIL</span>
								</div>
							</div>
						{/if}
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="row">
								<div class="ads-count col-md-4 col-sm-4 col-xs-12">
									<span>İLAN SAYISI</span>
									<strong>{if $return.storeAds === false}0{else}{$return.storeAdsCount}{/if}</strong>
								</div>
								<div class="ads-orderby col-md-8 col-sm-8 col-xs-12">
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
								{literal}
									<script type="text/javascript">
										$(function() {
											$('select[name=orderby]').change(function() {

												var val        = $(this).val();
												var actualLink = '{/literal}{$return.realDomain}{literal}';

												if($.urlParam('page') !== null)
												{
													if(val != 0)
													{
														if($.urlParam('catId') !== null)
														{
															actualLink = '{/literal}{$return.realDomain}{literal}?catId=' + $.urlParam('catId') + '&orderby=' + val + '&page=' + $.urlParam('page');
														}
														else
														{
															actualLink = '{/literal}{$return.realDomain}{literal}?orderby=' + val + '&page=' + $.urlParam('page');
														}
													}
													else
													{
														if($.urlParam('catId') !== null)
														{
															actualLink = '{/literal}{$return.realDomain}{literal}?catId=' + $.urlParam('catId') + '&page=' + $.urlParam('page');
														}
														else
														{
															actualLink = '{/literal}{$return.realDomain}{literal}?page=' + $.urlParam('page');
														}
													}
												}
												else
												{
													if(val != 0)
													{
														if($.urlParam('catId') !== null)
														{
															actualLink = '{/literal}{$return.realDomain}{literal}?catId=' + $.urlParam('catId') + '&orderby=' + val;
														}
														else
														{
															actualLink = '{/literal}{$return.realDomain}{literal}?orderby=' + val;
														}
													}
													else
													{
														if($.urlParam('catId') !== null)
														{
															actualLink = '{/literal}{$return.realDomain}{literal}?catId=' + $.urlParam('catId');
														}
														else
														{
															actualLink = '{/literal}{$return.realDomain}{literal}';
														}
													}
												}

												window.location.href = actualLink;
											});

											$.urlParam = function(name)
											{
											    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
											    
											    if (results == null)
											    {
											       return null;
											    }
											    else
											    {
											       return decodeURI(results[1]) || 0;
											    }

											}
										});
									</script>
								{/literal}
							</div>
						</div>
					</div>
				</div>
				<div class="block ads-container desktop hidden-sm hidden-xs">
					<div class="block-content">
						{if $return.storeAds}
							<table class="table">
								<thead>
									<tr>
										<th></th>
										<th>Seri</th>
										<th>Model</th>
										<th>Yıl</th>
										<th>Km</th>
										<th>Fiyat</th>
										<th>İl / İlçe</th>
									</tr>
								</thead>
								<tbody>	
									{foreach $return.storeAds as $ads}
										<tr onclick="window.open('{siteUrl('view')}/{$ads.seflink}-{$ads.id}');">
											<td width="116">
												<img src="{siteUrl('files/ads/thumb')}/{$ads.title_image}.jpg" width="116" alt="{$ads.title}">
											</td>
											<td>{if !categoryInfo($ads.category3, 'kategori_adi')}Yok{else}{categoryInfo($ads.category3, 'kategori_adi')}{/if}</td>
											<td>{if !categoryInfo($ads.category4, 'kategori_adi')}Yok{else}{categoryInfo($ads.category4, 'kategori_adi')}{/if}</td>
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
											<td>{cityInfo($ads.city, 'CityName')} / {countyInfo($ads.county, 'CountyName')}</td>
										</tr>
									{/foreach}
								</tbody>
							</table>
						{else}
							<p class="text-danger text-center" style="margin-top: 15px;"><b>Bir sonuç bulunamadı</b></p>
						{/if}
					</div>
				</div>
				<div class="block list-mobile hidden-lg hidden-md">
					{if $return.storeAds}
						<ul>
							{foreach $return.storeAds as $ads}
								<li>
									<img src="{siteUrl('files/ads/thumb')}/{$ads.title_image}.jpg" width="80" alt="{$ads.title}">
									<div class="title">
										<a href="{siteUrl('view')}/{$ads.seflink}-{$ads.id}">{strShorten($ads.title, 50, '...')}</a>
									</div>
									<span class="address"><i class="material-icons">location_on</i> {cityInfo($ads.city, 'CityName')} / {countyInfo($ads.county, 'CountyName')}</span>
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
									<a class="overlay" href="{siteUrl('view')}/{$ads.seflink}-{$ads.id}"></a>
								</li>
							{/foreach}
						</ul>
					{else}
						<div class="block" style="margin-bottom: 0;">
							<p class="text-danger text-center" style="margin-top: 15px;"><b>Bir sonuç bulunamadı</b></p>
						</div>
					{/if}
				</div>
				{if $return.pagination.desktopPagination != ''}
					<div class="list-bottom-pagination hidden-sm hidden-xs">
						<ul class="pagination">{$return.pagination.desktopPagination}</ul>
						
						<div class="pageSize">
							<span>Her sayfada</span>
							<ul class="pagination">
								<li {if $smarty.get.pageSize == 15}class="active"{/if}>
									<a href="{$return.actualLinkPageSize}{if $smarty.get.catId || $smarty.get.orderby}&{else}?{/if}pageSize=15">15</a>
								</li>
								<li {if $smarty.get.pageSize == 50}class="active"{/if}>
									<a href="{$return.actualLinkPageSize}{if $smarty.get.catId || $smarty.get.orderby}&{else}?{/if}pageSize=50">50</a>
								</li>
							</ul>
							<span>sonuç göster</span>
						</div>
					</div>
					<div class="mobilePagination hidden-lg hidden-md" style="margin-top: 0;margin-bottom: 15px;">{$return.pagination.mobilePagination}</div>
				{/if}
			</div>
		</div>
	</div>
</div>
{include file="../static/footer.tpl"}