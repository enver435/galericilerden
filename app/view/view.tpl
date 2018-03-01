{capture assign=time}@{$return.adInfo.update_time}{/capture}
<div id="main">
	{include file="header.tpl"}
	<div class="page-content">
		<div class="container">
			<div class="ad-detail">
				<ul class="breadcrumb hidden-sm hidden-xs">
				    <li><a href="{SITE_URL}">Anasayfa</a></li>
				    {$Category->getAllTopCategory($return.categoryInfo.Id, true)}
				</ul>
				{if $return.adInfo.user_id == $smarty.session.userId AND $return.adInfo.status == 4}
					<div class="message-panel" style="text-align: center;">
						<i class="material-icons" style="font-size: 70px;color: #ff263a;">info_outline</i>
						<h4 style="margin-bottom: 0;color: #ff263a;">İlan Pasiftir</h4>
						<p style="color: #ff263a;padding-top: 10px;padding-bottom: 0;">Bu ilan pasif olduğu için yanlız siz görebilirsiniz</p>
					</div>
				{elseif $return.adInfo.user_id == $smarty.session.userId AND $return.adInfo.status == 2}
					<div class="message-panel" style="text-align: center;padding: 10px;padding-top: 25px;">
						<i class="material-icons" style="font-size: 70px;color: #ff263a;">access_time</i>
						<h4 style="margin-bottom: 0;color: #ff263a;">İlan Onay Sürecindedir</h4>

						<p style="color: #ff263a;padding-top: 10px;padding-bottom: 0px;margin-bottom: 0;">İlan Giriş Tarihi: {$return.adInfo.update_time|date_format:"%d"} {monthName($return.adInfo.update_time)} {$return.adInfo.update_time|date_format:"%Y"} {$return.adInfo.update_time|date_format:"%H:%M"}</p>
						<p style="color: #ff263a;padding-top: 0px;padding-bottom: 0;">İlan Onay Tahmini Bekleme Süresi: {time_elapsed_string($time)}</p>

						<p style="line-height: inherit;">Onay sürecinde geçilen süre, doping süresine eklenecektir.<br>Onay sürecindeki ilanlarla ilgili çağrı merkezinden işlem yapılmamaktadır.</p>
					</div>
				{/if}
				<div class="row">
					<div class="col-md-5">
						<h1 class="ad-title" style="margin-bottom: 15px;font-size: 18px;">{$return.adInfo.title}</h1>
						<div class="ad-detail-block">
							<div class="ad-images-title">
								{assign var=titleI value=0}
								
								<a class="item" href="{siteUrl('files/ads/big')}/{$return.adInfo.title_image}.jpg">
				                    <img src="{siteUrl('files/ads/medium')}/{$return.adInfo.title_image}.jpg" width="100%" alt="">
				                </a>
								{foreach $return.adImages as $image}
									{if $image.image != $return.adInfo.title_image}
										<a class="item" href="{siteUrl('files/ads/big')}/{$image.image}.jpg">
						                    <img src="{siteUrl('files/ads/medium')}/{$image.image}.jpg" width="100%" alt="">
						                </a>
					                {/if}

					                {$titleI=$titleI+1}
								{/foreach}
							</div>
							<div class="mobile-ad-view hidden-lg hidden-md">
								<div class="list-bottom">
									<div class="row">
										<div class="col-xs-6" style="padding: 10px;line-height: 35px;" onclick="showText();">
											<span>Açıklama</span>
										</div>
										<div class="col-xs-6" style="padding: 10px;line-height: 17px;" onclick="{literal}showLocation({/literal}{$return.adInfo.marker_lat}{literal}, {/literal}{$return.adInfo.marker_lng}{literal}, {/literal}{$return.adInfo.zoom}{literal});{/literal}">
											<span>Konum</span><br>
											<small style="font-size: 10px;"><span class="text-capitalize">{cityInfo($return.adInfo.city, 'CityName')|lower}</span>, <span class="text-capitalize">{countyInfo($return.adInfo.county, 'CountyName')|lower}</span></small>
										</div>
									</div>
								</div>
								<div class="map-content" style="display: none;">
									<div class="col-md-12">
										<button type="button" onclick="closeLocation();" class="btn btn-primary" style="margin-top: 15px;margin-bottom: 15px;width: 100%;">Kapat</button>
									</div>
									<div id="ad-detail-map2"></div>
								</div>
								<div class="ad-text" style="display: none;word-break: break-word;">
									<div class="col-md-12">
										<button type="button" onclick="closeText();" class="btn btn-primary" style="margin-top: 15px;margin-bottom: 15px;width: 100%;border: 1px solid #e8e8e8;">Kapat</button>
										<div class="texts" style="padding-bottom: 15px;">
											{if $return.adInfo.text != ''}
												{$return.adInfo.text}
											{else}
												Açıklama Yok
											{/if}
										</div>
									</div>
								</div>
								<div class="mobile-ad-user">
									{if $return.adInfo.phone_status == 1}
										<div class="col-xs-4">
											<a href="javascript:;" data-toggle="modal" data-target="#phonesModal" style="padding: 0;">
												<i class="material-icons">phone</i> Ara
											</a>
										</div>
									{/if}
									<div class="{if $return.adInfo.phone_status == 0 AND $return.adInfo.message_status == 0}col-xs-12{elseif $return.adInfo.phone_status == 0 || $return.adInfo.message_status == 0}col-xs-8{elseif $return.adInfo.phone_status == 1 AND $return.adInfo.message_status == 1}col-xs-4{/if} text-capitalize">
										{if $return.getUserStore === false}
											<a href="{siteUrl('user')}-{$return.adInfo.user_id}/{userInfo($return.adInfo.user_id, 'seflink')}" style="padding: 0;">
												{userInfo($return.adInfo.user_id, 'name')} {userInfo($return.adInfo.user_id, 'surname')}
											</a>
										{else}
											<a href="http://{$return.getUserStore.store_domain}{$return.siteConfig.siteStoreDomain}" style="padding: 0;" target="_blank">
												{$return.getUserStore.store_name|upper}
											</a>
										{/if}
									</div>
									{if $return.adInfo.message_status == 1}
										<div class="col-xs-4" {if $return.adInfo.phone_status == 0}style="width: 30%;"{/if}>
											<a href="{if $smarty.session.login}{if $smarty.session.userId != $return.adInfo.user_id}{siteUrl('send-message')}/{$return.adInfo.id}{else}javascript:;{/if}{else}javascript:;{/if}" {if !$smarty.session.login}data-toggle="modal" data-target="#loginModal"{/if}>
												<i class="material-icons">message</i> Soru Sor
											</a>
										</div>
									{/if}
								</div>
								<div class="mobile-location">
									<ul>
										<li class="city text-capitalize">{cityInfo($return.adInfo.city, 'CityName')|lower}, </li><li class="county text-capitalize">{countyInfo($return.adInfo.county, 'CountyName')|lower}</li>{if $return.adInfo.neighborhood > 0}<li class="neighborhood text-capitalize">, {neighborhoodInfo($return.adInfo.neighborhood, 'NeighborhoodName')|lower}</li>{/if}
									</ul>
									<div class="share-buttons" style="text-align: center;">
										<ul>
											<li>
												<a href="javascript:;" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u={siteUrl('view')}/{$return.adInfo.seflink}-{$return.adInfo.id}');return false;">
													<img src="{siteUrl('public/images/facebook.svg')}" width="32" height="32" alt="facebook">
												</a>
											</li>
											<li>
												<a href="javascript:;" onclick="window.open('https://twitter.com/share?url={siteUrl('view')}/{$return.adInfo.seflink}-{$return.adInfo.id}&text={$return.adInfo.title}');return false;">
													<img src="{siteUrl('public/images/twitter.svg')}" width="32" height="32" alt="twitter">
												</a>
											</li>
											<li>
												<a href="javascript:;" onclick="window.open('https://plus.google.com/share?url={siteUrl('view')}/{$return.adInfo.seflink}-{$return.adInfo.id}');return false;">
													<img src="{siteUrl('public/images/google-plus.svg')}" width="32" height="32" alt="google plus">
												</a>
											</li>
											<li>
												<a href="javascript:;" onclick="window.open('http://pinterest.com/pin/create/button/?url={siteUrl('view')}/{$return.adInfo.seflink}-{$return.adInfo.id}&media={siteUrl('files/ads/medium')}/{$return.adInfo.title_image}.jpg&description={$return.adInfo.title}');return false;">
													<img src="{siteUrl('public/images/pinterest.svg')}" width="32" height="32" alt="pinterest">
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="ad-thumb-images">
								{assign var=thumbI value=0}
								
								<div class="swiper-container">
							        <div class="swiper-wrapper">
							            <div class="swiper-slide">
							            	<a href="javascript:void(0);" onclick="$('.ad-images-title').trigger('to.owl.carousel', 0)">
							                    <img src="{siteUrl('files/ads/thumb')}/{$return.adInfo.title_image}.jpg" width="100%" alt="{$return.adInfo.title} küçük resim 1">
							                </a>
							            </div>
							            {foreach $return.adImages as $image}
											{if $image.image != $return.adInfo.title_image}
												<div class="swiper-slide">
													<a href="javascript:void(0);" {literal}onclick="$('.ad-images-title').trigger('to.owl.carousel', {/literal}{$thumbI}{literal})"{/literal}>
									                    <img src="{siteUrl('files/ads/thumb')}/{$image.image}.jpg" width="100%" alt="{$return.adInfo.title} küçük resim {$titleI}">
									                </a>
												</div>
							                {/if}

							                {$thumbI=$thumbI+1}
										{/foreach}
							        </div>
							        <!-- Add Pagination -->
							        <div class="swiper-pagination"></div>

							        <div class="swiper-button-prev"></div>
    								<div class="swiper-button-next"></div>
							    </div>
							</div>
							
							<link rel="stylesheet" href="{siteUrl('public/styles/swiper.min.css')}">
							<script type="text/javascript" src="{siteUrl('public/scripts/lightgallery-all.min.js')}"></script>
							<script type="text/javascript" src="{siteUrl('public/scripts/swiper.min.js')}"></script>
							{literal}
								<script type="text/javascript">
									$(function() {

										var owlEventTitle = $('.ad-images-title');
							            owlEventTitle.owlCarousel({
							                items: 1,
							                lazyLoad: true,
							                loop: false,
							                margin: 0,
							                dots: true,
							                nav: false,
							                autoHeight: false
							            });

							            var swiper = new Swiper('.swiper-container', {
									        pagination: '.swiper-pagination',
									        paginationType: 'fraction',
									        slidesPerView: 4,
									        slidesPerColumn: 2,
									        paginationClickable: true,
									        spaceBetween: 5,
									        keyboardControl: true
									    });

							            var slide = 0;

									    $('.swiper-button-next').click(function() {

									    	var countSlide = $('.swiper-slide').length;

									    	if(countSlide > 8 && countSlide > (slide + 8))
									    	{
									    		slide = slide + 9;
									    	}

									    	swiper.slideTo(slide, 300);
									    });

									    $('.swiper-button-prev').click(function() {

									    	var countSlide = $('.swiper-slide').length;

									    	if(slide > 0)
									    	{
									    		slide = slide - 9;
									    	}

									    	swiper.slideTo(slide, 300);
									    });

							            $('.ad-images-title').lightGallery({selector: '.item'}); 
								            
									});
								</script>
							{/literal}
						</div>
					</div>
					<div class="col-md-4">
						<div class="ad-detail-block">
							<font color="#ff0000">
								<h4 class="ad-price">
									{$return.adInfo.price|number_format:0:".":","}
									{if $return.adInfo.price_type == 0}
										<i class="icon icon-tl"></i>
									{elseif $return.adInfo.price_type == 1}
										<i class="icon icon-euro"></i>
									{elseif $return.adInfo.price_type == 2}
										<i class="icon icon-usd"></i>
									{/if}
								</h4>
							</font>
							<div class="ad-location hidden-sm hidden-xs">
								<ul>
									<li class="city text-capitalize">{cityInfo($return.adInfo.city, 'CityName')|lower}</li> / <li class="county text-capitalize">{countyInfo($return.adInfo.county, 'CountyName')|lower}</li>{if $return.adInfo.neighborhood > 0} / <li class="neighborhood text-capitalize">{neighborhoodInfo($return.adInfo.neighborhood, 'NeighborhoodName')|lower}</li>{/if}
								</ul>
							</div>
							<div class="ad-details">
								<ul>
									<li>
										<strong class="detail-list-title">İlan No: </strong>
										<span class="detail-list-value">{$return.adInfo.id}</span>
									</li>
									<li>
										<strong class="detail-list-title">İlan Tarihi: </strong>
										<span class="detail-list-value">{$return.adInfo.create_time|date_format:"%d"} {monthName($return.adInfo.create_time)} {$return.adInfo.create_time|date_format:"%Y"}</span>
									</li>
									{if $return.adInfo.category2 != 0}
										<li>
											<strong class="detail-list-title">Marka: </strong>
											<span class="detail-list-value">{categoryInfo($return.adInfo.category2, 'kategori_adi')}</span>
										</li>
									{/if}
									{if $return.adInfo.category3 != 0}
										<li>
											<strong class="detail-list-title">Seri: </strong>
											<span class="detail-list-value">{categoryInfo($return.adInfo.category3, 'kategori_adi')}</span>
										</li>
									{/if}
									{if $return.adInfo.category4 != 0}
										<li>
											<strong class="detail-list-title">Model: </strong>
											<span class="detail-list-value">{categoryInfo($return.adInfo.category4, 'kategori_adi')}</span>
										</li>
									{/if}
									{if $return.adItems}
										{foreach $return.adItems as $item}
											{assign var=itemInfo value=$return.Ads->itemInfo($item.itemId)}
											<li>
												<strong class="detail-list-title">{$itemInfo.name}: </strong>
												<span class="detail-list-value">
													{if $itemInfo.classx == 1 || $itemInfo.classx == 3}
														{$item.itemValue}
													{elseif $itemInfo.classx == 2}
														{assign var=itemSelectInfo value=$return.Ads->itemSelectInfo($item.itemSelect)}

														{$itemSelectInfo.name}
													{/if}
												</span>
											</li>
										{/foreach}
									{/if}
								</ul>
							</div>
						</div>
					</div>
					<div class="bannerViewMobile col-sm-12 col-xs-12 hidden-lg hidden-md" style="margin-top: 25px;">
						{if $return.bannerViewMobile.banner_type == 1}
							{if $return.bannerViewMobile.banner_img != '' || $return.bannerViewMobile.banner_img_link != ''}
								<a href="{$return.bannerViewMobile.banner_link}" target="_blank">
									<img src="{if $return.bannerViewMobile.banner_img_link == ''}{siteUrl('files/banner')}/{$return.bannerViewMobile.banner_img}{else}{$return.bannerViewMobile.banner_img_link}{/if}" width="100%" alt="banner mobile">
								</a>
							{/if}
						{elseif $return.bannerViewMobile.banner_type == 2}
							{if $return.bannerViewMobile.banner_html != ''}
								{$return.bannerViewMobile.banner_html}
							{/if}
						{/if}
					</div>
					{if $return.categoryFeatures}
						<div class="mobile-features col-sm-12 col-xs-12 hidden-lg hidden-md">
							<div class="ad-detail-block" style="margin-top: 25px;">
								<div id="ad-features2"><div class="col-md-12">{$return.categoryFeatures}</div></div>
							</div>
						</div>
					{/if}
					<div class="col-md-3 hidden-sm hidden-xs">
						<div class="share-buttons">
							<ul>
								<li>
									<a href="javascript:;" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u={siteUrl('view')}/{$return.adInfo.seflink}-{$return.adInfo.id}','','height=368,width=600,left=100,top=100,menubar=0');return false;">
										<img src="{siteUrl('public/images/facebook.svg')}" width="32" height="32" alt="facebook">
									</a>
								</li>
								<li>
									<a href="javascript:;" onclick="window.open('https://twitter.com/share?url={siteUrl('view')}/{$return.adInfo.seflink}-{$return.adInfo.id}&text={$return.adInfo.title}','','height=260,width=550,left=100,top=100,menubar=0');return false;">
										<img src="{siteUrl('public/images/twitter.svg')}" width="32" height="32" alt="twitter">
									</a>
								</li>
								<li>
									<a href="javascript:;" onclick="window.open('https://plus.google.com/share?url={siteUrl('view')}/{$return.adInfo.seflink}-{$return.adInfo.id}','','height=550,width=525,left=100,top=100,menubar=0');return false;">
										<img src="{siteUrl('public/images/google-plus.svg')}" width="32" height="32" alt="google plus">
									</a>
								</li>
								<li>
									<a href="javascript:;" onclick="window.open('http://pinterest.com/pin/create/button/?url={siteUrl('view')}/{$return.adInfo.seflink}-{$return.adInfo.id}&media={siteUrl('files/ads/medium')}/{$return.adInfo.title_image}.jpg&description={$return.adInfo.title}','','height=368,width=600,left=100,top=100,menubar=0');return false;">
										<img src="{siteUrl('public/images/pinterest.svg')}" width="32" height="32" alt="pinterest">
									</a>
								</li>
							</ul>
						</div>
						<div class="ad-detail-block" style="margin-top: 15px;">
							{if $return.getUserStore === false}
								<div class="ad-user text-capitalize">
									{userInfo($return.adInfo.user_id, 'name')} {userInfo($return.adInfo.user_id, 'surname')}
								</div>
							{else}
								<div class="ad-user" style="overflow: hidden;">
									<div class="storeDetail">
										<div class="certificate">
											<img src="{siteUrl('public/images/certificate.svg')}" width="35" alt="certificate">
											<span>{$return.getUserStore.end_time|date_format:"%Y" - $return.getUserStore.create_time|date_format:"%Y"}.YIL</span>
										</div>
										<img src="{siteUrl('files/store/thumb')}/{$return.getUserStore.store_logo}.jpg" width="110" class="storeLogo" alt="{$return.getUserStore.store_name}">
										<h3>
											<a href="http://{$return.getUserStore.store_domain}{$return.siteConfig.siteStoreDomain}">{$return.getUserStore.store_name|upper}</a>
										</h3>
									</div>
								</div>
							{/if}
							{if $return.adInfo.phone_status == 1}
								<div class="user-phones">
									<ul>
										<li>
											<a href="tel:{userInfo($return.adInfo.user_id, 'phone')}" title="Cep Telefonu">
												<i class="material-icons">phone</i> {userInfo($return.adInfo.user_id, 'phone')}
											</a>
										</li>
										{if userInfo($return.adInfo.user_id, 'phone_work') != ''}
											<li>
												<a href="tel:{userInfo($return.adInfo.user_id, 'phone_work')}" title="İş Telefonu">
													<i class="material-icons">phone</i> {userInfo($return.adInfo.user_id, 'phone_work')}
												</a>
											</li>
										{/if}
										{if userInfo($return.adInfo.user_id, 'phone_more') != ''}
											<li>
												<a href="tel:{userInfo($return.adInfo.user_id, 'phone_more')}" title="Sabit Telefon">
													<i class="material-icons">phone</i> {userInfo($return.adInfo.user_id, 'phone_more')}
												</a>
											</li>
										{/if}
									</ul>
								</div>
							{/if}

							<div class="detail-bottom">
								{if $return.adInfo.message_status == 1}
									<a href="{if $smarty.session.login}{if $smarty.session.userId != $return.adInfo.user_id}{siteUrl('send-message')}/{$return.adInfo.id}{else}javascript:;{/if}{else}javascript:;{/if}" {if !$smarty.session.login}data-toggle="modal" data-target="#loginModal"{/if} class="send-message">
										<i class="material-icons">message</i> İlan Sahibine Mesaj Gönder
									</a>
								{/if}

								{if $return.getUserStore === false}
									<a href="{siteUrl('user')}-{$return.adInfo.user_id}/{userInfo($return.adInfo.user_id, 'seflink')}"><i class="material-icons">directions_car</i> Tüm İlanları</a>
								{else}
									<a href="http://{$return.getUserStore.store_domain}{$return.siteConfig.siteStoreDomain}"><i class="material-icons">directions_car</i> Tüm İlanları</a>
								{/if}

								<a href="{if $smarty.session.login}{if $return.adInfo.user_id != $smarty.session.userId}{siteUrl('my-favorites/ads/add/')}{$return.adInfo.id}{else}javascript:;{/if}{else}javascript:;{/if}" {if !$smarty.session.login}data-toggle="modal" data-target="#loginModal"{/if}><i class="material-icons">star</i> İlanı Favorilerime Ekle</a>
							</div>
						</div>
						{if $return.bannerViewDesktop.banner_type == 1}
							{if $return.bannerViewDesktop.banner_img != '' || $return.bannerViewDesktop.banner_img_link != ''}
								<div class="banner250" style="margin-top: 15px;height: 300px;">
									<a href="{$return.bannerViewDesktop.banner_link}" target="_blank" style="padding: 0;">
										<img src="{if $return.bannerViewDesktop.banner_img_link == ''}{siteUrl('files/banner')}/{$return.bannerViewDesktop.banner_img}{else}{$return.bannerViewDesktop.banner_img_link}{/if}" width="100%" style="height: 300px;" alt="banner desktop">
									</a>
								</div>
							{/if}
						{elseif $return.bannerViewDesktop.banner_type == 2}
							{if $return.bannerViewDesktop.banner_html != ''}
								<div class="banner250" style="margin-top: 15px;height: 300px;">
									{$return.bannerViewDesktop.banner_html}
								</div>
							{/if}
						{/if}
						<!--<button type="button" class="btn btn-primary" style="width: 100%;padding: 10px;">Vasıta Alırken Bunlara Dikkat Edin</button>-->
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12 hidden-sm hidden-xs">
						<div id="tab" class="ad-tabs">
							<div class="ad-detail-block" style="margin-top: 25px;">
								<ul class="nav nav-tabs">
									{if $return.adInfo.text != ''}
										<li class="active"><a data-toggle="tab" href="#ad-texts">Açıklama</a></li>
									{/if}
									{if $return.categoryFeatures}
								  		<li {if $return.adInfo.text == ''}class="active"{/if}><a data-toggle="tab" href="#ad-features">Özellikler</a></li>
								  	{/if}
								  	<li {if $return.adInfo.text == '' AND $return.categoryFeatures == ''}class="active"{/if}><a id="ad-map" data-toggle="tab" href="#ad-location">Konum</a></li>
								  	<li><a data-toggle="tab" href="#kredi">Kredi / Finansman Teklifleri</a></li>
								</ul>

								<div class="tab-content">
									{if $return.adInfo.text != ''}
										<div id="ad-texts" class="tab-pane fade in active">{$return.adInfo.text}</div>
									{/if}
									{if $return.categoryFeatures}
									  	<div id="ad-features" class="tab-pane fade {if $return.adInfo.text == ''}in active{/if}">{$return.categoryFeatures}</div>
								  	{/if}
								  	<div id="ad-location" class="tab-pane fade {if $return.adInfo.text == '' AND $return.categoryFeatures == ''}in active{/if}">
								  		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZaVsbFgc-jiF8IKiLavvLc5DTbJeHDUk&language=tr&region=TR"></script>
								  		<div id="ad-detail-map"></div>
								  		{literal}
								  			<script type="text/javascript">
												var mapPreview;
												var markersArrayPreview = [];
												var bounds = new google.maps.LatLngBounds();

								  				function initMapPreview(id, lat, lng, zooms)
												{
												    var latlngPreview = new google.maps.LatLng(lat, lng);
												    var myOptionsPreview = {
												        zoom: zooms,
												        maxZoom: 19,
												        center: latlngPreview,
												        mapTypeId: google.maps.MapTypeId.ROADMAP,
												        streetViewControl: false,
												        panControl: true,
												        scrollwheel: true,
												        zoomControlOptions: {
												            style: google.maps.ZoomControlStyle.LARGE,
												            position: google.maps.ControlPosition.TOP_LEFT
												        },
												        mapTypeControl: true,
												        mapTypeControlOptions: {
												            position: google.maps.ControlPosition.TOP_RIGHT,
												            style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
												        }
												    };

												    mapPreview = new google.maps.Map(document.getElementById(id), myOptionsPreview);

												    placeMarkerPreview(latlngPreview);
												    bounds.extend(latlngPreview);
													mapPreview.panToBounds(bounds);  
												}

												function placeMarkerPreview(location) 
												{
												    // first remove all markers if there are any
												    deleteOverlaysPreview();

											        var markerPreview = new google.maps.Marker({
											            position: location, 
											            map: mapPreview,
											            icon: siteUrl + "/public/images/mapIcon.png"
											        });

											        // add marker in markers array
											        markersArrayPreview.push(markerPreview);
												    
												}

												function deleteOverlaysPreview() 
												{
												    if (markersArrayPreview) {
												        for (i in markersArrayPreview) {
												            markersArrayPreview[i].setMap(null);
												        }
												        markersArrayPreview.length = 0;
												    }
												}

												$('a#ad-map').click(function() {
												    initMapPreview('ad-detail-map', {/literal}{$return.adInfo.marker_lat}{literal}, {/literal}{$return.adInfo.marker_lng}{literal}, {/literal}{$return.adInfo.zoom}{literal});

												    $('.ad-detail #ad-detail-map').css({'pointer-events': 'all'});
												});

												$('.ad-detail .ad-tabs .nav li a:not(#ad-map)').click(function() {
													$('.ad-detail #ad-detail-map').css({'pointer-events': 'none'});
												});

												initMapPreview('ad-detail-map', {/literal}{$return.adInfo.marker_lat}{literal}, {/literal}{$return.adInfo.marker_lng}{literal}, {/literal}{$return.adInfo.zoom}{literal});
								  			</script>
								  		{/literal}
								  	</div>
								  	<div id="kredi" class="tab-pane fade"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="mobile-phones hidden-lg hidden-md">
	<div class="modal fade" id="phonesModal" role="dialog">
	    <div class="modal-dialog modal-sm">
	      	<div class="modal-content">
		        <div class="modal-header">
		          	<button type="button" class="close" data-dismiss="modal">&times;</button>
		          	<h4 class="modal-title">İletişim Bilgileri</h4>
		        </div>
		        <div class="modal-body">
		        	<div class="modal-top">
			          	<i class="material-icons">security</i>
			          	<p>Satıcıyla yüz yüze görüşmeden ve alacağınız ürünü görmeden kapora ödemeyin, para göndermeyin.</p>
			          	<p>
			          		<a href="#">Güvenli Alışverişin İpuçları için tıklayın.</a>
			          	</p>
		          	</div>
		          	<div class="modal-center">
		          		{if $return.getUserStore === false}
		          			<strong class="text-center" style="display: block;">{userInfo($return.adInfo.user_id, 'name')|capitalize} {userInfo($return.adInfo.user_id, 'surname')|capitalize}</strong>
		          		{else}
		          			<strong class="text-center" style="display: block;">{$return.getUserStore.store_name|upper}</strong>
		          		{/if}
		          	</div>
		          	<div class="modal-bottom">
		          		<ul>
		          			{if userInfo($return.adInfo.user_id, 'phone') != ''}
		          				<li>
			          				<a href="tel:{userInfo($return.adInfo.user_id, 'phone')}">
				          				<strong>Cep</strong>
				          				<strong>{userInfo($return.adInfo.user_id, 'phone')}</strong>
			          				</a>
			          			</li>
		          			{/if}
		          			{if userInfo($return.adInfo.user_id, 'phone_work') != ''}
			          			<li>
			          				<a href="tel:{userInfo($return.adInfo.user_id, 'phone_work')}">
				          				<strong>İş</strong>
				          				<strong>{userInfo($return.adInfo.user_id, 'phone_work')}</strong>
			          				</a>
			          			</li>
		          			{/if}
		          			{if userInfo($return.adInfo.user_id, 'phone_more') != ''}
			          			<li>
			          				<a href="tel:{userInfo($return.adInfo.user_id, 'phone_more')}">
				          				<strong>Sabit</strong>
				          				<strong>{userInfo($return.adInfo.user_id, 'phone_more')}</strong>
			          				</a>
			          			</li>
		          			{/if}
		          		</ul>
		          	</div>
		        </div>
	      	</div>
	    </div>
  	</div>
</div>
{if !$smarty.session.login}
	<div class="login-modal">
		<div class="modal fade" id="loginModal" role="dialog" style="z-index: 99999;">
		    <div class="modal-dialog modal-md" style="margin-top: 10%;">
		      	<div class="modal-content">
			        <div class="modal-header">
			          	<button type="button" class="close" data-dismiss="modal">&times;</button>
			          	<h4 class="modal-title">Giriş Yap / Üye Ol</h4>
			        </div>
			        <div class="modal-body">
			        	<p style="margin-top: 15px;margin-bottom: 15px;font-weight: 500;display: block;text-align: center;">Üye değilmisiniz ? O zaman hemen</p>
			        	<a href="{siteUrl('register')}">
			        		<button type="button" class="btn btn-primary" style="width: 100%;padding: 10px;">Üye Ol</button>
			        	</a>
			        	<p style="margin-top: 15px;margin-bottom: 15px;font-weight: 500;display: block;text-align: center;">Üyeliğiniz varmı ? O zaman hemen</p>
			        	<a href="{siteUrl('login')}">
			        		<button type="button" class="btn btn-primary" style="width: 100%;padding: 10px;">Giriş Yap</button>
			        	</a>
			        </div>
		        </div>
	        </div>
	    </div>
	</div>
{/if}