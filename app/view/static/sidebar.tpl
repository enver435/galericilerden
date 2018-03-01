<div class="sidebar">
	<div class="col-lg-3 col-md-3 hidden-sm hidden-xs" {if getUrl(0) == 'category' || getUrl(0) == 'category-special' || getUrl(0) == 'user' || getUrl(0) == 'search'}style="width: 20%;"{/if}>
		<div class="row">
			<div class="col-lg-12 col-md-12">
				{if getUrl(0) != 'category'}
					<div class="block sidebar-top">
						<div class="block-title">
							<h5>Özel İlanlar</h5>
						</div>
						<div class="block-content">
							<ul>
								<li>
									<a href="{siteUrl('category-special/ilk-sahibinden')}">
										<i class="material-icons icon-sidebar">directions_car</i> İlk Sahibinden ({$Ads->specialCategoryAdsCount('doping_sahibinden')}) <i class="material-icons arrow-right">keyboard_arrow_right</i>
									</a>
								</li>
								<li>
									<a href="{siteUrl('category-special/yeni-gibi')}">
										<i class="material-icons icon-sidebar">fiber_new</i> Yeni Gibi ({$Ads->specialCategoryAdsCount('doping_yenigibi')}) <i class="material-icons arrow-right">keyboard_arrow_right</i>
									</a>
								</li>
								<li>
									<a href="{siteUrl('category-special/ekspertizli')}">
										<i class="material-icons icon-sidebar">check_circle</i> Ekspertizli ({$Ads->specialCategoryAdsCount('doping_ekspertizli')}) <i class="material-icons arrow-right">keyboard_arrow_right</i>
									</a>
								</li>
								<li>
									<a href="{siteUrl('category-special/acil')}">
										<i class="material-icons icon-sidebar">notifications</i> Acil ({$Ads->specialCategoryAdsCount('doping_acil')}) <i class="material-icons arrow-right">keyboard_arrow_right</i>
									</a>
								</li>
								<li>
									<a href="{siteUrl('category-special/fiyati-dusenler')}">
										<i class="material-icons icon-sidebar">arrow_downward</i> Fiyatı düşenler ({$Ads->specialCategoryAdsCount('doping_fiyatidusenler')}) <i class="material-icons arrow-right">keyboard_arrow_right</i>
									</a>
								</li>
							</ul>
						</div>
					</div>
					{if getUrl(0) == 'category-special' || getUrl(0) == 'user' || getUrl(0) == 'search'}
						<div class="block sidebar-search">
							<div class="block-title">
								<h5>Arama Daraltma</h5>
							</div>
							<div class="block-content">
								<div class="form-search col-md-12" style="margin-top: 15px;">
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
										<div class="row input-inline" style="margin-top: 0;">
											<div class="col-md-6 col-xs-12" style="padding-left: 0;">
												<input type="number" name="priceMin" value="{$smarty.get.priceMin}" placeholder="min" class="form-control">
											</div>
											<div class="col-md-6 col-xs-12" style="padding-right: 0;">
												<input type="number" name="priceMax" value="{$smarty.get.priceMax}" placeholder="max" class="form-control">
											</div>
										</div>
									</div>
									<button type="button" name="searchAds" class="btn btn-primary" style="width: 100%;margin-top: -15px;margin-bottom: 15px;margin-top: 0;">Aramayı Daralt</button>
								</div>
							</div>
						</div>
					{/if}
				{else}
					<div class="block">
						<div class="block-title">
							<h5>Kategoriler</h5>
						</div>
						<div class="block-content" style="height: 300px;overflow-y: auto;">
							<ul>
								<ul class="topCategoryAll">{$Category->getAllTopCategory($smarty.get.catId, false, true)}</ul>
								<ul class="subCategoryAll">
									{foreach $Category->getSubCategory($smarty.get.catId) as $category}
										{if !empty($category)}
											<li>
												<a href="{SITE_URL}/cat-{$category.Id}/{$category.seflink}">
													{$category.kategori_adi} ({$Ads->categoryAdsCount($category.Id)})
												</a>
											</li>
										{/if}
									{/foreach}
								</ul>
							</ul>
						</div>
					</div>
					<div class="block sidebar-search">
						<div class="block-title">
							<h5>Arama Daraltma</h5>
						</div>
						<div class="block-content">
							<div class="form-search col-md-12" style="margin-top: 15px;">
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
									<div class="row input-inline" style="margin-top: 0;">
										<div class="col-md-6 col-xs-12" style="padding-left: 0;">
											<input type="number" name="priceMin" value="{$smarty.get.priceMin}" placeholder="min" class="form-control">
										</div>
										<div class="col-md-6 col-xs-12" style="padding-right: 0;">
											<input type="number" name="priceMax" value="{$smarty.get.priceMax}" placeholder="max" class="form-control">
										</div>
									</div>
								</div>
								{$categoryModulItems.template}
								<button type="button" name="searchAds" class="btn btn-primary" style="width: 100%;margin-top: -15px;margin-bottom: 15px;margin-top: 0;">Aramayı Daralt</button>
							</div>
						</div>
					</div>
				{/if}
				{literal}
					<script type="text/javascript">
						$(function() {
							$('select[name=city]').change(function() {

								var cityId  = $(this).val();

								$.ajax({
									type: 'POST',
									url: siteUrl + '/request',
									dataType: 'json',
									data: {'mode': 'getCounties', 'cityId': cityId},
									success: function(response)
									{

										var options = '<option value="0" selected="selected">Tümü</option>';

										$.each(response, function(i, value) {
											options += '\
												<option value="' + value.CountyID + '">' + value.CountyName + '</option>\
											';
										});

										$('select[name=county]').html(options).removeAttr('disabled', true);
										
									}
								});
							});

							var cityId   = {/literal}{if $smarty.get.city}{$smarty.get.city}{else}0{/if}{literal};
							var countyId = {/literal}{if $smarty.get.county}{$smarty.get.county}{else}0{/if}{literal};

							if(cityId > 0)
							{
								$.ajax({
									type: 'POST',
									url: siteUrl + '/request',
									dataType: 'json',
									data: {'mode': 'getCounties', 'cityId': cityId},
									success: function(response)
									{

										var options = '<option value="0" selected="selected">Tümü</option>';

										$.each(response, function(i, value) {
											if(countyId == value.CountyID)
											{
												options += '\
													<option value="' + value.CountyID + '" selected="selected">' + value.CountyName + '</option>\
												';
											}
											else
											{
												options += '\
													<option value="' + value.CountyID + '">' + value.CountyName + '</option>\
												';
											}
										});

										$('select[name=county]').html(options).removeAttr('disabled', true);
										
									}
								});
							}

							var fields = '';

							$('.form-search button').click(function() {
								
								$('.form-search input, .form-search select').each(function() {
									var name = $(this).attr('name');
									var type = $(this).attr('type');
									var val  = $(this).val();

									if(type == 'number')
									{
										if(val != '')
										{
											fields += name + '=' + val + '&';
										}
									}
									else
									{
										if(val != '' && val > 0)
										{
											fields += name + '=' + val + '&';
										}
									}
									
								});

								fields = fields.slice(0, -1);

								if($.urlParam('type') !== null)
								{
									if(fields != '')
									{
										fields += '&type=' + $.urlParam('type');
									}
									else
									{
										fields += 'type=' + $.urlParam('type');
									}
								}

								if(fields != '')
								{
									var locationUrl = '{/literal}{if $smarty.get.catType}{$smarty.get.catType}{elseif $smarty.get.catSeflink}{$smarty.get.catSeflink}{elseif $smarty.get.userId AND $smarty.get.userSeflink}{$smarty.get.userSeflink}{elseif $smarty.get.query}search?query={$smarty.get.query}{/if}{literal}&' + fields;
								}
								else
								{
									var locationUrl = '{/literal}{if $smarty.get.catType}{$smarty.get.catType}{elseif $smarty.get.catSeflink}{$smarty.get.catSeflink}{elseif $smarty.get.userId AND $smarty.get.userSeflink}{$smarty.get.userSeflink}{elseif $smarty.get.query}search?query={$smarty.get.query}{/if}{literal}';
								}
								window.location.href = locationUrl;

							});

							$('.mobile-filters .list-bottom .result').click(function() {

								$('.mobile-filters input, .mobile-filters select').each(function() {
									var name = $(this).attr('name');
									var type = $(this).attr('type');
									var val  = $(this).val();

									if(type == 'number')
									{
										if(val != '')
										{
											fields += name + '=' + val + '&';
										}
									}
									else if(name == 'type' && val != 'all')
									{
										fields += name + '=' + val + '&';
									}
									else
									{
										if(val != '' && val > 0 && name != 'type')
										{
											fields += name + '=' + val + '&';
										}
									}
									
								});

								fields = fields.slice(0, -1);

								if(fields != '')
								{
									var locationUrl = '{/literal}{if $smarty.get.catType}{$smarty.get.catType}{elseif $smarty.get.catSeflink}{$smarty.get.catSeflink}{elseif $smarty.get.userId AND $smarty.get.userSeflink}{$smarty.get.userSeflink}{elseif $smarty.get.query}search?query={$smarty.get.query}{/if}{literal}&' + fields;
								}
								else
								{
									var locationUrl = '{/literal}{if $smarty.get.catType}{$smarty.get.catType}{elseif $smarty.get.catSeflink}{$smarty.get.catSeflink}{elseif $smarty.get.userId AND $smarty.get.userSeflink}{$smarty.get.userSeflink}{elseif $smarty.get.query}search?query={$smarty.get.query}{/if}{literal}';
								}
								window.location.href = locationUrl;

							});

							$('select[name=orderby]').change(function() {

								var val        = $(this).val();
								var actualLink = '{/literal}{$actualLinkOrderBy}{literal}';

								if(val != 0)
								{
									actualLink += '&orderby=' + val;
								}

								window.location.href = actualLink;
							});

							$('.mobile-sort li').click(function() {
								var sort = $(this).attr('data-sort');

								var actualLink = '{/literal}{$actualLinkOrderBy}{literal}';

								if(sort != 0)
								{
									actualLink += '&orderby=' + sort;
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
			{if getUrl(0) != 'category' AND getUrl(0) != 'search'}
				<div class="col-lg-12 col-md-12">
					<div class="block sidebar-bottom">
						<div class="block-title">
							<h5>Kategoriler</h5>
						</div>
						<div class="block-content">
							<ul>
								{assign var=i value=1}

								{foreach $Category->categoryFirst() as $category}
									<li>
										<a href="{SITE_URL}/cat-{$category.Id}/{$category.seflink}">
											<i class="icon icon-category{$i}"></i>
											{$category.kategori_adi} ({$Ads->categoryAdsCount($category.Id)}) <i class="material-icons arrow-right">keyboard_arrow_right</i>
										</a>
									</li>

									{$i=$i+1}
								{/foreach}
							</ul>
						</div>
					</div>
				</div>
				{assign var=newsAll value=$News->news()}

				{if $newsAll}
					<div class="col-lg-12 col-md-12">
						<div class="block">
							<div class="block-title">
								<h5>Haberler</h5>
							</div>
							<div class="block-content" style="padding-top: 20px;">
								{foreach $newsAll as $news}
									<div class="col-md-12 news">
				                        <a class="pull-left news-link" href="{SITE_URL}/news/{$news.news_seflink}">
				                            <img class="news-object" width="100%" height="100%" src="{siteUrl('files/news/thumb')}/{$news.news_image}.jpg" alt="{$news.news_title}">
				                            <i class="material-icons">search</i>
				                        </a>
				                        <div class="news-body">
				                            <h4 class="news-heading">
				                            	<a href="{SITE_URL}/news/{$news.news_seflink}">{$news.news_title}</a>
				                            </h4>
				                        </div>
				                    </div>
			                    {/foreach}

			                    <a href="{siteUrl('news')}">
			                    	<button type="button" class="btn btn-primary" style="width: 100%;">Tüm Haberler</button>
			                    </a>
		                	</div>
	               		</div>
					</div>
				{/if}
			{/if}
		</div>
	</div>
</div>