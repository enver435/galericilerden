<div id="main">
	{include file="header.tpl"}
	<div class="page-content">
		<div class="container">
			<div class="row">
				{assign var=Ads value=$return.Ads scope="global"}
				{include file="static/sidebar.tpl"}
				<div class="col-lg-9 col-md-9">
					<div class="home-top" {if !$return.sliders}style="margin-bottom: 0;"{/if}>
						<div class="row">
							<div class="col-md-8">
								{if $return.sliders}
									<div class="slider">
										<div class="owl-carousel owl-theme">
											{foreach $return.sliders as $slider}
												<div class="item" style="background-image: url({siteUrl('files/slider/')}{$slider.image})"></div>
											{/foreach}
										</div>
									</div>
								{/if}
							</div>
							<div class="col-md-4 hidden-sm hidden-xs">
								{if $return.bannerHome.banner_type == 1}
									{if $return.bannerHome.banner_img != '' || $return.bannerHome.banner_img_link != ''}
										<div class="banner250">
											<a href="{$return.bannerHome.banner_link}" target="_blank">
												<img src="{if $return.bannerHome.banner_img_link == ''}{siteUrl('files/banner')}/{$return.bannerHome.banner_img}{else}{$return.bannerHome.banner_img_link}{/if}" width="100%" height="100%" alt="banner250x250">
											</a>
										</div>
									{/if}
								{elseif $return.bannerHome.banner_type == 2}
									{if $return.bannerHome.banner_html != ''}
										<div class="banner250">
											{$return.bannerHome.banner_html}
										</div>
									{/if}
								{/if}
							</div>
						</div>
					</div>
					<div class="home-bottom">
						<div class="blocks">
							<div class="block">
								<div class="block-title">
									<h5>Ana Sayfa Vitrini</h5>
								</div>
								<div class="block-content">
									{if $return.showCaseHomeAds}
										{foreach $return.showCaseHomeAds as $ads}
											<div class="col-md-2 col-sm-2 col-xs-4">
												<div class="list">
													<a href="{siteUrl('view')}/{$ads.seflink}-{$ads.id}" style="padding-bottom: 0;">
														<img src="{siteUrl('files/ads/thumb')}/{$ads.title_image}.jpg" width="100%" height="100%" alt="{$ads.title}">
													</a>
													<div class="title">
														<a href="{siteUrl('view')}/{$ads.seflink}-{$ads.id}" style="padding: 4px;font-size: 11px;">{strShorten($ads.title, 35, '...')}</a>
													</div>
												</div>
											</div>
										{/foreach}
									{else}
									{/if}
								</div>
							</div>
							<div class="block">
								<div class="block-title">
									<h5>Acil İlanlar</h5>
								</div>
								<div class="block-content">
									{if $return.showCaseAcil}
										{foreach $return.showCaseAcil as $ads}
											<div class="col-md-2 col-sm-2 col-xs-4">
												<div class="list">
													<a href="{siteUrl('view')}/{$ads.seflink}-{$ads.id}" style="padding-bottom: 0;">
														<img src="{siteUrl('files/ads/thumb')}/{$ads.title_image}.jpg" width="100%" height="100%" alt="{$ads.title}">
													</a>
													<div class="title">
														<a href="{siteUrl('view')}/{$ads.seflink}-{$ads.id}" style="padding: 4px;font-size: 11px;">{strShorten($ads.title, 35, '...')}</a>
													</div>
												</div>
											</div>
										{/foreach}
									{else}
									{/if}
								</div>
							</div>
							<div class="block">
								<div class="block-title">
									<h5>Mağazalar</h5>
								</div>
								<div class="block-content" style="padding-bottom: 25px;padding-left: 25px;padding-right: 25px;">
									{if $return.stores}
										<div class="store-slider">
											<div class="owl-carousel owl-theme" style="position: static;">
												{foreach $return.stores as $store}
													<div class="item">
														<a href="http://{$store.store_domain}{$return.siteConfig.siteStoreDomain}" style="padding: 0;" target="_blank">
															<img src="{siteUrl('files/store/big')}/{$store.store_logo}.jpg" width="100%" height="100%" alt="{$store.store_name}">
															<h5 style="margin-bottom: 0;text-align: center;font-size: 13px;">{$store.store_name|capitalize}</h5>
														</a>
													</div>
												{/foreach}
											</div>
										</div>
									{/if}
								</div>
							</div>
							<div class="bannerHomeMobile hidden-lg hidden-md">
								{if $return.bannerHomeMobile.banner_type == 1}
									{if $return.bannerHomeMobile.banner_img != '' || $return.bannerHomeMobile.banner_img_link != ''}
										<a href="{$return.bannerHomeMobile.banner_link}" target="_blank">
											<img src="{if $return.bannerHomeMobile.banner_img_link == ''}{siteUrl('files/banner')}/{$return.bannerHomeMobile.banner_img}{else}{$return.bannerHomeMobile.banner_img_link}{/if}" width="100%" height="100%" alt="banner home mobile">
										</a>
									{/if}
								{elseif $return.bannerHomeMobile.banner_type == 2}
									{if $return.bannerHomeMobile.banner_html != ''}
										{$return.bannerHomeMobile.banner_html}
									{/if}
								{/if}
							</div>
							<div class="block">
								<div class="block-title">
									<h5>En Son Eklenen İlanlar</h5>
								</div>
								<div class="block-content">
									{if $return.lastAds}
										{foreach $return.lastAds as $ads}
											<div class="col-md-2 col-sm-2 col-xs-4">
												<div class="list">
													<a href="{siteUrl('view')}/{$ads.seflink}-{$ads.id}" style="padding-bottom: 0;">
														<img src="{siteUrl('files/ads/thumb')}/{$ads.title_image}.jpg" width="100%" height="100%" alt="{$ads.title}">
													</a>
													<div class="title">
														<a href="{siteUrl('view')}/{$ads.seflink}-{$ads.id}" style="padding: 4px;font-size: 11px;">{strShorten($ads.title, 35, '...')}</a>
													</div>
												</div>
											</div>
										{/foreach}
									{else}
									{/if}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>