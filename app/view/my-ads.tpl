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
					<li class="active">
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
			
			<h4 class="hidden-lg hidden-md" style="margin-bottom: 25px;">İlanlarım</h4>
			{if $return.userInfo.user_status == 1}
		        {if $return.adsLimit >= $return.userTypeAdsLimit AND $return.userInfo.adAddShow == 0}
		        	<div class="step-content">
			        	<div class="block">
				        	<div class="block-title">
				        		<h5>Yıllık ilan limitiniz dolmuş</h5>
				        	</div>
			        		<div class="block-content">
				        		<div class="text-center">
									<i class="material-icons" style="margin-bottom: 25px;font-size: 100px;color: #ff263a;">close</i>
									<p style="font-weight: 500;">Yıllık ilan limitiniz dolmuş.</p>
									<p style="font-weight: 500;">Yinede ilanınızı yayına almak istermisiniz ? O zaman ödeme yapıp yeniden ilanınızı yayına bilirsiniz!</p>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-5">
								<div class="block">
									<div class="block-title">
										<h5>Fatura Bilgileri</h5>
									</div>
									<div class="block-content">
										<table class="table">
											<tbody>
												<tr>
													<td style="width: 40%;">Adı Soyadı</td>
													<td style="width: 60%;" class="text-capitalize"><b>{userInfo($smarty.session.userId, 'name')} {userInfo($smarty.session.userId, 'surname')}</b></td>
												</tr>
												<tr>
													<td style="width: 40%;">İl</td>
													<td style="width: 60%;" class="text-capitalize"><b>{cityInfo(userInfo($smarty.session.userId, 'city'), 'CityName')}</b></td>
												</tr>
												<tr>
													<td style="width: 40%;">İlçe</td>
													<td style="width: 60%;" class="text-capitalize"><b>{countyInfo(userInfo($smarty.session.userId, 'county'), 'CountyName')}</b></td>
												</tr>
												<tr>
													<td style="width: 40%;">Cep Telefonu</td>
													<td style="width: 60%;" class="text-capitalize"><b>{userInfo($smarty.session.userId, 'phone')}</b></td>
												</tr>
												<tr>
													<td style="width: 40%;">Açık Adres</td>
													<td style="width: 60%;" class="text-capitalize"><b>{userInfo($smarty.session.userId, 'address')}</b></td>
												</tr>
												<tr>
													<td style="width: 40%;">Tc No</td>
													<td style="width: 60%;" class="text-capitalize"><b>{userInfo($smarty.session.userId, 'tc')}</b></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="col-md-7">
								<div class="block">
									<div class="block-title">
										<h5>Ödeme Bilgileriniz</h5>
									</div>
									<div class="block-content">
										<div class="payment-message"></div>
										<div class="payment-loader">
											<div class="loader"></div>
										</div>
										<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
											<div class='card-wrapper'></div>
											<link rel="stylesheet" href="{siteUrl('public/styles/card.css')}">
											<script type="text/javascript" src="{siteUrl('public/scripts/jquery.card.js')}"></script>
											<form name="limit-card">
												<div class="row">
													<div class="col-md-12">
														<div class="row">
														    <div class="form-group col-md-6 col-xs-6">
														    	<input type="text" id="number" name="number" placeholder="Kart Numarası" class="form-control" />
														    </div>
														    <div class="form-group col-md-6 col-xs-6">
														    	<input type="text" id="name" name="name" placeholder="Ad Soyad" class="form-control" />
														    </div>
													    </div>
												    </div>
												    <div class="col-md-12">
												    	<div class="row">
													    	<div class="form-group col-md-3 col-xs-6">
													    		<input type="text" id="expiry" name="expiry" placeholder="MM/YYYY" class="form-control" />
													    	</div>
													    	<div class="form-group col-md-3 col-xs-6">
													    		<input type="text" id="cvc" name="cvc" placeholder="CVC" class="form-control" />
													    	</div>
													    	<div class="form-group col-md-6 col-xs-12">
													    		<button type="button" class="btn btn-primary" onclick="limitPayment();" style="line-height: 30px;width: 100%;">Ödeme Yap</button>
													    	</div>
												    	</div>
												    </div>
											    </div>
											</form>
											{literal}
												<script type="text/javascript">
													var limitPrice = {/literal}{getSetting('individual_ad_limit_price')}{literal};

													$('form[name=limit-card]').card({
													    container: '.card-wrapper',
													    //width: 200,
													    formatting: true,
													    messages: {
													        validDate: 'valid\ndate',
													        monthYear: 'mm/yyyy',
													    },
													    placeholders: {
													        number: '•••• •••• •••• ••••',
													        name: 'Ad Soyad',
													        expiry: '••/••',
													        cvc: '•••'
													    }
													});
												</script>
											{/literal}
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
		        {/if}
			{elseif $return.userInfo.user_status == 2}
				<div class="step-content">
					{if $return.updateAd === false AND $return.storeCloseAdmin === true}
						<div class="block">
							<div class="block-title">
				        		<h5>Mağazanız onaylanmamıştır</h5>
				        	</div>
							<div class="block-content">
					        	<div class="text-center">
									<i class="material-icons" style="margin-bottom: 25px;font-size: 100px;color: #ff263a;">close</i>
									<p style="font-weight: 500;">
										Mağazanız onaylanmamıştır
										<a href="{siteUrl('my-store/edit-store')}">
											<button type="button" class="btn btn-primary" style="margin-top: 25px;">Mağazanızı güncelleyin</button>
										</a>
									</p>
								</div>
							</div>
						</div>
					{elseif $return.updateAd === false AND $return.createNewStore === true}
						<div class="block">
							<div class="block-title">
				        		<h5>Mağazanız oluşturulmuştur</h5>
				        	</div>
							<div class="block-content">
					        	<div class="text-center">
									<i class="material-icons" style="margin-bottom: 25px;font-size: 100px;color: #ff263a;">close</i>
									<p style="font-weight: 500;">
										Mağazanız oluşturulmuş{if $return.siteConfig.iyzicoPayment === true}, ödeme yapılmış{/if} ve admin kontrolüne gönderilmiştir. Onaylandıkdan sonra tekrar bu sayfayı ziyaret ediniz
									</p>
								</div>
							</div>
						</div>
					{elseif $return.updateAd === false AND $return.endTimeStore === true}
						<div class="block">
							<div class="block-title">
				        		<h5>Mağazanızın yıllık süresi dolmuş</h5>
				        	</div>
							<div class="block-content">
					        	<div class="text-center">
									<i class="material-icons" style="margin-bottom: 25px;font-size: 100px;color: #ff263a;">close</i>
									<p style="font-weight: 500;">
										Mağazanızın yıllık süresi dolmuş
										<a href="{siteUrl('update-store-year')}">
											<button type="button" class="btn btn-primary" style="margin-top: 25px;">Mağazanızı güncelleyin</button>
										</a>
									</p>
								</div>
							</div>
						</div>
					{elseif $return.updateAd === false AND $return.endTimeStoreAdmin === true}
						<div class="block">
							<div class="block-title">
				        		<h5>Mağazanızın yıllık süresi dolmuş</h5>
				        	</div>
							<div class="block-content">
					        	<div class="text-center">
									<i class="material-icons" style="margin-bottom: 25px;font-size: 100px;color: #ff263a;">close</i>
									<p style="font-weight: 500;">
										Mağazanızın yıllık süresi dolmuş{if $return.siteConfig.iyzicoPayment === true}, ödeme yapılmış{/if} ve admin kontrolüne gönderilmiştir. Onaylandıkdan sonra tekrar bu sayfayı ziyaret ediniz
									</p>
								</div>
							</div>
						</div>
					{elseif $return.updateAd === false AND $return.endStoreLimitAdmin === true}
						<div class="block">
							<div class="block-title">
				        		<h5>Mağazanızın yıllık ilan limiti dolmuş</h5>
				        	</div>
							<div class="block-content">
					        	<div class="text-center">
									<i class="material-icons" style="margin-bottom: 25px;font-size: 100px;color: #ff263a;">close</i>
									<p style="font-weight: 500;">
										Mağazanızın yıllık ilan limiti dolmuş{if $return.siteConfig.iyzicoPayment === true}, ödeme yapılmış{/if} ve admin kontrolüne gönderilmiştir. Onaylandıkdan sonra tekrar bu sayfayı ziyaret ediniz
									</p>
								</div>
							</div>
						</div>
					{elseif $return.updateAd === false AND $return.endLimitStore === true}
						<div class="block">
							<div class="block-title">
				        		<h5>Mağazanızın yıllık ilan limiti dolmuş</h5>
				        	</div>
							<div class="block-content">
					        	<div class="text-center">
									<i class="material-icons" style="margin-bottom: 25px;font-size: 100px;color: #ff263a;">close</i>
									<p style="font-weight: 500;">
										Mağazanızın yıllık ilan limiti dolmuş
										<a href="{siteUrl('update-store-limit')}">
											<button type="button" class="btn btn-primary" style="margin-top: 25px;">Mağazanızı güncelleyin</button>
										</a>
									</p>
								</div>
							</div>
						</div>
					{elseif $return.updateAd === false AND $return.userStore === false}
						<div class="block">
							<div class="block-title">
				        		<h5>Yıllık ilan limitiniz dolmuş</h5>
				        	</div>
							<div class="block-content">
					        	<div class="text-center">
									<i class="material-icons" style="margin-bottom: 25px;font-size: 100px;color: #ff263a;">close</i>
									<p style="font-weight: 500;">
										Yıllık ilan limitiniz dolmuş. 
										<a href="{siteUrl('create-store')}">
											<button type="button" class="btn btn-primary" style="margin-top: 25px;">Mağaza açın</button>
										</a>
									</p>
								</div>
							</div>
						</div>
					{/if}
				</div>
			{/if}

			{if $return.updateAd === true AND getUrl(1) != 'ad-edit' AND getUrl(1) != 'add-doping' AND getUrl(1) != 'public-end' AND getUrl(1) != 'update-public'}
				<ul class="profile-tab">
					<li {if getUrl(1) == 'active'}class="active"{/if}>
						<a href="{siteUrl('my-ads/active')}">Aktif</a>
					</li>
					<li {if getUrl(1) == 'passive'}class="active"{/if}>
						<a href="{siteUrl('my-ads/passive')}">Pasif</a>
					</li>
					<li {if getUrl(1) == 'finished'}class="active"{/if}>
						<a href="{siteUrl('my-ads/finished')}">Süresi Biten</a>
					</li>
					<li {if getUrl(1) == 'pending'}class="active"{/if}>
						<a href="{siteUrl('my-ads/pending')}">Onay Bekleyen</a>
					</li>
					<li {if getUrl(1) == 'unconfirmed'}class="active"{/if}>
						<a href="{siteUrl('my-ads/unconfirmed')}">Onaylanmayan</a>
					</li>
				</ul>
				
				<div class="block my-ads desktop hidden-sm hidden-xs">
					{if $return.ads}
						<table class="table">
							<thead>
								<tr>
									<th></th>
									<th>İlan Başlığı</th>
									<th>Bitiş Tarihi</th>
									<th>Hit</th>
									<th>Favori</th>
									<th>Fiyat</th>
									<th>Dopingler</th>
									<th>İşlemler</th>
								</tr>
							</thead>
							<tbody>
								{foreach $return.ads as $ads}
									<tr data-id="{$ads.id}">
										<td width="80">
											<img src="{siteUrl('files/ads/thumb')}/{$ads.title_image}.jpg" width="80" alt="{$ads.title}">
										</td>
										<td>{strShorten($ads.title, 35, '...')}</td>
										<td>{if $ads.public_end_date != 0}{$ads.public_end_date|date_format:"%d"} {monthName($ads.public_end_date)} {$ads.public_end_date|date_format:"%Y"}{else}-{/if}</td>
										<td>{$ads.hit}</td>
										<td>
											{assign var=favoriteCount value=$return.Favorites->adsFavorites($ads.id)}

											{if $favoriteCount !== false}{$favoriteCount|count}{else}0{/if}
										</td>
										<td style="color: #ff0000;font-weight: bold;">
											{$ads.price|number_format:0:".":","}
											{if $ads.price_type == 0}
												<i class="icon icon-tl"></i>
											{elseif $ads.price_type == 1}
												<i class="icon icon-euro"></i>
											{elseif $ads.price_type == 2}
												<i class="icon icon-usd"></i>
											{/if}
										</td>
										<td>
											{if $ads.doping_home == 1}<p style="margin-bottom: 0;">Ana Sayfa Vitrini</p>{/if}
											{if $ads.doping_acil == 1}<p style="margin-bottom: 0;">Acil Vitrin</p>{/if}
											{if $ads.doping_up == 1}<p style="margin-bottom: 0;">Üst Sıradayım</p>{/if}
											{if $ads.doping_differently == 1}<p style="margin-bottom: 0;">Kalın Yazı Renkli Çerçeve</p>{/if}{if $ads.doping_sahibinden == 1}<p style="margin-bottom: 0;">İlk Sahibinden</p>{/if}{if $ads.doping_yenigibi == 1}<p style="margin-bottom: 0;">Yeni Gibi</p>{/if}{if $ads.doping_ekspertizli == 1}<p style="margin-bottom: 0;">Ekspertizli</p>{/if}
											{if $ads.doping_home == 0 AND $ads.doping_acil == 0 AND $ads.doping_up == 0 AND $ads.doping_differently == 0 AND $ads.doping_sahibinden == 0 AND $ads.doping_yenigibi == 0 AND $ads.doping_ekspertizli == 0}Doping Yüklü Değil{/if}
										</td>
										<td>
											{if getUrl(1) == 'active'}
												<select name="operation" class="form-control" style="padding: 5px;">
													<option value="0">Seçiniz</option>
													<option value="get-ad">İlana Git</option>
													<option value="ad-edit">İlanı Düzenle</option>
													<option value="add-doping">Doping Ver</option>
													<option value="public-end">Yayından Kaldır</option>
												</select>
											{elseif getUrl(1) == 'passive'}
												<select name="operation" class="form-control" style="padding: 5px;">
													<option value="0">Seçiniz</option>
													{if $ads.public_end_date > $smarty.now}
														<option value="get-ad">İlana Git</option>
													{/if}
													<option value="ad-edit">İlanı Düzenle</option>
													<option value="public-start">Yayına Al</option>
													<option value="delete-ad">İlanı Sil</option>
												</select>
											{elseif getUrl(1) == 'finished'}
												<select name="operation" class="form-control" style="padding: 5px;">
													<option value="0">Seçiniz</option>
													<option value="update-public">İlan Tarihini Güncelle</option>
													<option value="delete-ad">İlanı Sil</option>
												</select>
											{elseif getUrl(1) == 'unconfirmed'}
												<select name="operation" class="form-control" style="padding: 5px;">
													<option value="0">Seçiniz</option>
													<option value="ad-edit">İlanı Düzenle</option>
													<option value="delete-ad">İlanı Sil</option>
												</select>
											{elseif getUrl(1) == 'pending'}
												<select name="operation" class="form-control" style="padding: 5px;">
													<option value="0">Seçiniz</option>
													<option value="get-ad">İlana Git</option>
												</select>
											{/if}
										</td>
									</tr>
								{/foreach}
							</tbody>
						</table>
						<link rel="stylesheet" href="{siteUrl('public/styles/sweetalert.css')}" />
						<script type="text/javascript" src="{siteUrl('public/scripts/sweetalert.min.js')}"></script>
						{literal}
							<script type="text/javascript">
								$(function() {

									$('select[name=operation]').change(function() {
										var operation = $(this).val();
										var adId      = $(this).parent().parent().attr('data-id');

										$(this).val(0);

										if(operation == 'get-ad')
										{
											window.open('{/literal}{SITE_URL}{literal}/my-ads/' + operation + '/' + adId);
										}
										else if(operation == 'delete-ad')
										{
											swal({
											    title: 'Eminmisiniz ?',
											    text: 'İlanınızı sitemizden tamamen silmek istediğinize eminmisiniz ?',
											    type: 'warning',
											    showCancelButton: true,
											    confirmButtonColor: '#ff263a',
											    confirmButtonText: 'Evet',
											    cancelButtonText: 'Hayır',
											    closeOnConfirm: false
											},
											function() {
											    window.location.href = '{/literal}{SITE_URL}{literal}/my-ads/' + operation + '/' + adId;
											});
										}
										else
										{
											window.location.href = '{/literal}{SITE_URL}{literal}/my-ads/' + operation + '/' + adId;
										}
									});

								});
							</script>
						{/literal}
					{else}
						<div class="block" style="margin-bottom: 0;">
							<p class="text-danger text-center" style="margin-top: 15px;"><b>Bir sonuç bulunamadı</b></p>
						</div>
					{/if}
				</div>
				<div class="block my-ads list-mobile hidden-lg hidden-md">
					{if $return.ads}
						<ul>
							{foreach $return.ads as $ads}
								<li>
									<img src="{siteUrl('files/ads/thumb')}/{$ads.title_image}.jpg" width="80" alt="{$ads.title}">
									<div class="title">
										<a href="{siteUrl('view')}/{$ads.seflink}-{$ads.id}">{strShorten($ads.title, 50, '...')}</a>
									</div>
									<span class="address">
										<i class="material-icons">list</i>
										{if $ads.category1 != 0}
											{categoryInfo($ads.category1, 'kategori_adi')}
										{/if}

										{if $ads.category2 != 0}
											-> {categoryInfo($ads.category2, 'kategori_adi')}
										{/if}

										{if $ads.category3 != 0}
											-> {categoryInfo($ads.category3, 'kategori_adi')}
										{/if}

										{if $ads.category4 != 0}
											-> {categoryInfo($ads.category4, 'kategori_adi')}
										{/if}

										{if $ads.category5 != 0}
											-> {categoryInfo($ads.category5, 'kategori_adi')}
										{/if}

										{if $ads.category6 != 0}
											-> {categoryInfo($ads.category6, 'kategori_adi')}
										{/if}

										{if $ads.category7 != 0}
											-> {categoryInfo($ads.category7, 'kategori_adi')}
										{/if}

										{if $ads.category8 != 0}
											-> {categoryInfo($ads.category8, 'kategori_adi')}
										{/if}

										{if $ads.category9 != 0}
											-> {categoryInfo($ads.category9, 'kategori_adi')}
										{/if}

										{if $ads.category10 != 0}
											-> {categoryInfo($ads.category10, 'kategori_adi')}
										{/if}
									</span>
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
									<div class="list-mobile-bottom" data-id="{$ads.id}">
										<div class="list-mobile-bottom-info">
											<span>
												<b>Bitiş Tarihi: </b>
												{$ads.public_end_date|date_format:"%d"} {monthName($ads.public_end_date)} {$ads.public_end_date|date_format:"%Y"}
											</span>
											<span>
												<b>Hit:</b> 
												{$ads.hit}
											</span>
											<span>
												<b>Favori: </b>
												{assign var=favoriteCount value=$return.Favorites->adsFavorites($ads.id)}
												{if $favoriteCount !== false}{$favoriteCount|count}{else}0{/if}
											</span>
										</div>
										<div class="list-mobile-dopings">
											<span><b>Dopingler:</b>
											{if $ads.doping_home == 1}<p style="margin-bottom: 0;">Ana Sayfa Vitrini</p>{/if}
											{if $ads.doping_acil == 1}<p style="margin-bottom: 0;">Acil Vitrin</p>{/if}
											{if $ads.doping_up == 1}<p style="margin-bottom: 0;">Üst Sıradayım</p>{/if}
											{if $ads.doping_differently == 1}<p style="margin-bottom: 0;">Kalın Yazı Renkli Çerçeve</p>{/if}{if $ads.doping_sahibinden == 1}<p style="margin-bottom: 0;">İlk Sahibinden</p>{/if}{if $ads.doping_yenigibi == 1}<p style="margin-bottom: 0;">Yeni Gibi</p>{/if}{if $ads.doping_ekspertizli == 1}<p style="margin-bottom: 0;">Ekspertizli</p>{/if}
											{if $ads.doping_home == 0 AND $ads.doping_acil == 0 AND $ads.doping_up == 0 AND $ads.doping_differently == 0 AND $ads.doping_sahibinden == 0 AND $ads.doping_yenigibi == 0 AND $ads.doping_ekspertizli == 0}<p>Doping Yüklü Değil</p>{/if}</span>
										</div>
										<div class="list-mobile-operation">
											{if getUrl(1) == 'active'}
												<select name="operation" class="form-control" style="padding: 5px;">
													<option value="0">Seçiniz</option>
													<option value="get-ad">İlana Git</option>
													<option value="ad-edit">İlanı Düzenle</option>
													<option value="add-doping">Doping Ver</option>
													<option value="public-end">Yayından Kaldır</option>
												</select>
											{elseif getUrl(1) == 'passive'}
												<select name="operation" class="form-control" style="padding: 5px;">
													<option value="0">Seçiniz</option>
													{if $ads.public_end_date > $smarty.now}
														<option value="get-ad">İlana Git</option>
													{/if}
													<option value="ad-edit">İlanı Düzenle</option>
													<option value="public-start">Yayına Al</option>
												</select>
											{elseif getUrl(1) == 'finished'}
												<select name="operation" class="form-control" style="padding: 5px;">
													<option value="0">Seçiniz</option>
													<option value="update-public">İlan Tarihini Güncelle</option>
												</select>
											{elseif getUrl(1) == 'unconfirmed'}
												<select name="operation" class="form-control" style="padding: 5px;">
													<option value="0">Seçiniz</option>
													<option value="ad-edit">İlanı Düzenle</option>
												</select>
											{elseif getUrl(1) == 'pending'}
												<select name="operation" class="form-control" style="padding: 5px;">
													<option value="0">Seçiniz</option>
													<option value="get-ad">İlana Git</option>
												</select>
											{/if}
										</div>
									</div>
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
						
						{assign "find" array('&pageSize=15', '&pageSize=50', '?pageSize=15', '?pageSize=50')}
						{assign "repl" array('', '', '', '')}
						<div class="pageSize">
							<span>Her sayfada</span>
							<ul class="pagination">
								<li {if $smarty.get.pageSize == 15}class="active"{/if}>
									<a href="{$return.actualLink|replace:$find:$repl}{if $smarty.get.page}&{else}?{/if}pageSize=50">15</a>
								</li>
								<li {if $smarty.get.pageSize == 50}class="active"{/if}>
									<a href="{$return.actualLink|replace:$find:$repl}{if $smarty.get.page}&{else}?{/if}pageSize=50">50</a>
								</li>
							</ul>
							<span>sonuç göster</span>
						</div>
					</div>
					<div class="mobilePagination hidden-lg hidden-md" style="margin-top: 0;">{$return.pagination.mobilePagination}</div>
				{/if}
			{elseif $return.updateAd === true AND getUrl(1) == 'ad-edit'}
				<script type="text/javascript">var adEdit = true;</script>
				<div class="step-content">
					{if isset($smarty.post.ad_update)}
						{if $return.messageType == 'error'}
							<div class="alert alert-danger">
								<strong>Hata!</strong> {$return.message}
							</div>
						{elseif $return.messageType == 'success'}
							<div class="alert alert-success">
								<strong>Başarılı!</strong> {$return.message}
							</div>
						{/if}
					{/if}
					<form name="update-ad" action="" method="POST">
						<input type="hidden" name="ad_update" value="ad-update">
						<div class="contact-info">
							<div class="block">
								<div class="block-title">
									<h5>İletişim Bilgileri</h5>
								</div>
								<div class="block-content">
									<div class="col-md-11" style="margin-left: 35px;">
										<div class="row" style="margin-right: 0;">
											<div class="col-md-6">
												<div class="radio" style="margin-bottom: 25px;">
													<input type="radio" name="phone_status" value="1" {if $return.adInfo.phone_status == 1}checked="checked"{/if} class="magic-radio">
													<label>İlanda telefon numaram yayınlansın</label>
												</div>
												<div class="radio" style="margin-bottom: 25px;">
													<input type="radio" name="phone_status" {if $return.adInfo.phone_status == 0}checked="checked"{/if} value="0" class="magic-radio">
													<label>İlanda telefon numaram yayınlanmasın</label>
												</div>
												<div class="radio">
													<input type="checkbox" name="message_status" {if $return.adInfo.message_status == 0}checked="checked"{/if} value="0" class="magic-checkbox">
													<label>Diğer kullanıcılardan mesaj almak istemiyorum</label>
												</div>
											</div>
											<div class="contact-information col-md-6">
												<div class="row">
													<div class="inf">
														<div class="col-xs-6">
															<strong>Ad Soyad</strong>
														</div>
														<div class="col-xs-6"><span class="text-capitalize">{userInfo($return.adInfo.user_id, 'name')}</span> <span class="text-uppercase">{userInfo($return.adInfo.user_id, 'surname')}</span></div>
													</div>
													<div class="inf">
														<div class="col-xs-6">
															<strong>Cep Telefonu</strong>
														</div>
														<div class="col-xs-6">{userInfo($return.adInfo.user_id, 'phone')}</div>
													</div>
													{if userInfo($return.adInfo.user_id, 'phone_work')}
														<div class="inf">
															<div class="col-xs-6">
																<strong>İş Telefonu</strong>
															</div>
															<div class="col-xs-6">{userInfo($return.adInfo.user_id, 'phone_work')}</div>
														</div>
													{/if}
													{if userInfo($return.adInfo.user_id, 'phone_more')}
														<div class="inf">
															<div class="col-xs-6">
																<strong>Sabit Telefon</strong>
															</div>
															<div class="col-xs-6">{userInfo($return.adInfo.user_id, 'phone_more')}</div>
														</div>
													{/if}
													<div class="inf" style="padding-left: 15px;">
														<a href="javascript:void(0);" style="padding: 0;">İletişim bilgilerini değiştir</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="ad-info">
							<div class="block">
								<div class="block-title">
									<h5>İlan Detayları (Zorunlu Alan)</h5>
								</div>
								<div class="block-content">
									<div class="col-md-11" style="margin-left: 35px;">
										<div class="form-group">
											<div class="row">
												<div class="col-md-8 col-sm-7 col-xs-12">
													<label>İlan Başlığı*: </label>
													<input type="text" name="ad_name" value="{$return.adInfo.title}" class="form-control">
												</div>
												<div class="col-md-4 col-sm-5 col-xs-12">
													<div class="row">
														<div class="col-xs-6">
															<div class="form-group">
																<label>İlan Fiyatı*: </label>
																<input type="number" name="ad_price" value="{$return.adInfo.price}" class="form-control">
															</div>
														</div>
														<div class="col-xs-6">
															<div class="form-group">
																<label>Fiyat türü*: </label>
																<select name="price_type" class="form-control">
																	<option value="0" {if $return.adInfo.price_type == 0}selected="selected"{/if}>TL</option>
																	<option value="1" {if $return.adInfo.price_type == 1}selected="selected"{/if}>EUR</option>
																	<option value="2" {if $return.adInfo.price_type == 2}selected="selected"{/if}>USD</option>
																</select>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label>İlan Açıklaması: </label>
											<textarea name="ad_text" id="default-editor" cols="30" rows="10">{$return.adInfo.text}</textarea>
										</div>
										<div class="category-items">{$return.categoryItems}</div>
										<div class="category-features">{$return.categoryFeatures}</div>
										<div class="category-features-hidden"></div>
										{literal}
											<script type="text/javascript">
												$(function() {

													$('.category-features input').change(function() {
														
														var value = $(this).val();

														$('.category-features-hidden input[value=' + value + ']').remove();

														if($('.category-features').find('input[value=' + value + ']').attr('checked') && !$('.category-features').find('input[value=' + value + ']').is(':checked'))
														{
															$('.category-features-hidden').append('<input type="hidden" name="deleted-features[]" value="' + value + '" />');
														}

													});

												});
											</script>
										{/literal}
									</div>
								</div>
								<link rel="stylesheet" href="{siteUrl('public/scripts/editor/ui/trumbowyg.css')}">
			                    <link rel="stylesheet" href="{siteUrl('public/scripts/editor/plugins/colors/ui/trumbowyg.colors.css')}">
			                    <script src="{siteUrl('public/scripts/editor/trumbowyg.js')}"></script>
			                    <script src="{siteUrl('public/scripts/editor/plugins/base64/trumbowyg.base64.js')}"></script>
			                    <script src="{siteUrl('public/scripts/editor/plugins/colors/trumbowyg.colors.js')}"></script>
			                    <script src="{siteUrl('public/scripts/editor/plugins/noembed/trumbowyg.noembed.js')}"></script>
			                    <script src="{siteUrl('public/scripts/editor/plugins/pasteimage/trumbowyg.pasteimage.js')}"></script>
			                    <script src="{siteUrl('public/scripts/editor/plugins/preformatted/trumbowyg.preformatted.js')}"></script>
			                    <script src="{siteUrl('public/scripts/editor/plugins/upload/trumbowyg.upload.js')}"></script> 
			                    <script type="text/javascript" src="{siteUrl('public/scripts/editor/langs/tr.min.js')}"></script>
			                    {literal} 
			                        <script type="text/javascript">
			                            $(function() {
			                                var uploadOptions = {
			                                    serverPath: 'https://api.imgur.com/3/image',
			                                    fileFieldName: 'image',
			                                    headers: {'Authorization': 'Client-ID 9e57cb1c4791cea'},
			                                    urlPropertyName: 'data.link'
			                                };
			                                $('#default-editor').trumbowyg({
			                                	lang: 'tr',
			                                    resetCss: true,
			                                    autogrow: true,
			                                    btnsDef: {
			                                        image: {
			                                            dropdown: ['insertImage', 'upload', 'base64'],
			                                            ico: 'insertImage'
			                                        }
			                                    },
			                                    btns: ['viewHTML',
			                                        '|', 'formatting',
			                                        '|', 'btnGrp-design',
			                                        '|', 'link',
			                                        '|', 'image',
			                                        '|', 'btnGrp-justify',
			                                        '|', 'btnGrp-lists',
			                                        '|', 'foreColor', 'backColor',
			                                        '|', 'horizontalRule'],
			                                    plugins: {
			                                        upload: uploadOptions
			                                    }    
			                                });
			                            });    
			                        </script>
			                    {/literal}
		                    </div>
						</div>
						<div class="ad-location">
							<div class="block">
								<div class="block-title">
									<h5>İlan Konumu (Zorunlu Alan)</h5>
								</div>
								<div class="block-content">
									<div class="col-md-11" style="margin-left: 35px;">
										<div class="row">
											<div class="col-md-12">
												<div class="row">
													<div class="col-md-3">
														<div class="form-group">
															<label>İl*: </label>
															<select name="city" class="form-control">
																<option value="0" disabled="disabled" selected="selected">İl Seçin</option>
																{foreach $return.cities as $city}
																	<option value="{$city.CityID}" {if $return.adInfo.city == $city.CityID}selected="selected"{/if}>{$city.CityName}</option>
																{/foreach}
															</select>
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<label>İlçe*: </label>
															<select name="county" class="form-control">
																<option value="0" disabled="disabled" selected="selected">İlçe Seçin</option>
															</select>
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<label>Semt*: </label>
															<select name="area" class="form-control">
																<option value="0" disabled="disabled" selected="selected">Semt Seçin</option>
															</select>
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<label>Mahalle*: </label>
															<select name="neighborhood" class="form-control">
																<option value="0" disabled="disabled" selected="selected">Mahalle Seçin</option>
															</select>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-12">
												<div id="map-canvas" style="width: 100%;height: 100%;"></div>
												<div class="map-message"></div>
												<input id="zoomFld" type="hidden" name="zoom" value="{$return.adInfo.zoom}">
												<input id="latFld" type="hidden" name="lat" value="{$return.adInfo.lat}">
												<input id="lngFld" type="hidden" name="lng" value="{$return.adInfo.lng}">
												<input id="markerLatFld" type="hidden" name="markerlat" value="{$return.adInfo.marker_lat}">
												<input id="markerLngFld" type="hidden" name="markerlng" value="{$return.adInfo.marker_lng}">
												<input id="address" type="hidden" name="address" value="">
												<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZaVsbFgc-jiF8IKiLavvLc5DTbJeHDUk&language=tr&region=TR"></script>
												{literal}	
													<script type="text/javascript">
												        var map;
												        var markersArray = [];

												        function initMap(lat = null, lng = null, zoomField = null)
												        {
												            if(lat == null && lng == null && zoomField == null)
												            {
												            	var latlng = new google.maps.LatLng(39.1988, 34.0723);
												            	var myOptions = {
													                zoom: 5,
													                maxZoom: 19,
													                center: latlng,
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
												            }
												            else
												            {
												            	var latlng = new google.maps.LatLng(lat, lng);
												            	var myOptions = {
													                zoom: zoomField,
													                maxZoom: 19,
													                center: latlng,
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
												            }

												            geocoder = new google.maps.Geocoder();
												            map      = new google.maps.Map(document.getElementById("map-canvas"), myOptions);

												            // add a click event handler to the map object
												            google.maps.event.addListener(map, "click", function(event)
												            {
												                // place a marker
												                placeMarker(event.latLng);

												                document.getElementById("markerLatFld").value = event.latLng.lat();
												                document.getElementById("markerLngFld").value = event.latLng.lng();
												            });

												            google.maps.event.addListener(map, 'zoom_changed', function() {
															    zoomLevel = map.getZoom();
															    document.getElementById("zoomFld").value = zoomLevel;
															});
												        }

												        var geocoder;	
												        function codeAddress() {
													    	var address = document.getElementById('address').value;
													    	geocoder.geocode( { 'address': address}, function(results, status) {
														      	if (status == 'OK') {
														        	map.setCenter(results[0].geometry.location);
														        	var geometry = results[0].geometry.location.toString();
														        	var latFld = geometry.split('(')[1].split(', ')[0];
														        	var lngFld = geometry.split(')')[0].split(', ')[1];

														        	document.getElementById("latFld").value = latFld;
												                	document.getElementById("lngFld").value = lngFld;
														      	} else {
														        	alert('Geocode was not successful for the following reason: ' + status);
														      	}
													    	});
														}

												        function placeMarker(location, lat = null, lng = null) {
												            // first remove all markers if there are any
												            deleteOverlays();

												            if(location != null)
												            {
												            	var marker = new google.maps.Marker({
													                position: location, 
													                map: map,
													                icon: "{/literal}{siteUrl('public/images/mapIcon.png')}{literal}"
													            });
												            }
												            else
												            {
												            	var marker = new google.maps.Marker({
													                position: {lat: lat, lng: lng}, 
													                map: map,
													                icon: "{/literal}{siteUrl('public/images/mapIcon.png')}{literal}"
													            });
												            }

												            // add marker in markers array
												            markersArray.push(marker);
												        }

												        function deleteOverlays() 
												        {
												            if (markersArray) 
												            {
												                
												                for (i in markersArray) 
												                {
												                    markersArray[i].setMap(null);
												                }
												            	markersArray.length = 0;

												            }
												        }

												        initMap({/literal}{$return.adInfo.lat}, {$return.adInfo.lng}, {$return.adInfo.zoom}{literal});
												        placeMarker(null, {/literal}{$return.adInfo.marker_lat}, {$return.adInfo.marker_lng}{literal});

												        $(function() {

												        	var city         = {/literal}{$return.adInfo.city}{literal};
												        	var county       = {/literal}{$return.adInfo.county}{literal};
												        	var area         = {/literal}{$return.adInfo.area}{literal};
												        	var neighborhood = {/literal}{$return.adInfo.neighborhood}{literal};

												        	if(city != 0)
												        	{
												        		$.ajax({
																	type: 'POST',
																	url: siteUrl + '/request',
																	dataType: 'json',
																	data: {'mode': 'getCounties', 'cityId': city},
																	success: function(response)
																	{

																		var options = '<option value="0" disabled="disabled" selected="selected">İlçe Seçin</option>';

																		$.each(response, function(i, value) {
																			
																			if(county == value.CountyID)
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

																		$('select[name=county]').html(options);
																		
																	}
																});
												        	}

												        	if(county != 0)
												        	{
												        		$.ajax({
																	type: 'POST',
																	url: siteUrl + '/request',
																	dataType: 'json',
																	data: {'mode': 'getArea', 'countyId': county},
																	success: function(response)
																	{

																		var options = '<option value="0" disabled="disabled" selected="selected">Semt Seçin</option>';

																		$.each(response, function(i, value) {
																			
																			if(value.AreaID == area)
																			{
																				options += '\
																					<option value="' + value.AreaID + '" selected="selected">' + value.AreaName + '</option>\
																				';
																			}
																			else
																			{
																				options += '\
																					<option value="' + value.AreaID + '">' + value.AreaName + '</option>\
																				';
																			}

																		});

																		$('select[name=area]').html(options);
																		
																	}
																});
												        	}

												        	if(area != 0)
												        	{
												        		$.ajax({
																	type: 'POST',
																	url: siteUrl + '/request',
																	dataType: 'json',
																	data: {'mode': 'getNeighborhood', 'areaId': area},
																	success: function(response)
																	{

																		var options = '<option value="0" disabled="disabled" selected="selected">Mahalle Seçin</option>';

																		$.each(response, function(i, value) {
																			
																			if(neighborhood == value.NeighborhoodID)
																			{
																				options += '\
																					<option value="' + value.NeighborhoodID + '" selected="selected">' + value.NeighborhoodName + '</option>\
																				';
																			}
																			else
																			{
																				options += '\
																					<option value="' + value.NeighborhoodID + '">' + value.NeighborhoodName + '</option>\
																				';
																			}

																		});

																		$('select[name=neighborhood]').html(options);
																		
																	}
																});
												        	}

												        	$('select[name=city]').change(function() {

																var cityId = $(this).val();

																$.ajax({
																	type: 'POST',
																	url: siteUrl + '/request',
																	dataType: 'json',
																	data: {'mode': 'getCounties', 'cityId': cityId},
																	success: function(response)
																	{

																		var options = '<option value="0" disabled="disabled" selected="selected">İlçe Seçin</option>';

																		$.each(response, function(i, value) {
																			
																			options += '\
																				<option value="' + value.CountyID + '">' + value.CountyName + '</option>\
																			';

																		});

																		$('select[name=county]').html(options);
																		
																	}
																});
															});

															$('select[name=county]').change(function() {

																var countyId = $(this).val();

																$.ajax({
																	type: 'POST',
																	url: siteUrl + '/request',
																	dataType: 'json',
																	data: {'mode': 'getArea', 'countyId': countyId},
																	success: function(response)
																	{

																		var options = '<option value="0" disabled="disabled" selected="selected">Semt Seçin</option>';

																		$.each(response, function(i, value) {
																			
																			options += '\
																				<option value="' + value.AreaID + '">' + value.AreaName + '</option>\
																			';

																		});

																		$('select[name=area]').html(options);
																		
																	}
																});
															});

															$('select[name=area]').change(function() {

																var areaId = $(this).val();

																$.ajax({
																	type: 'POST',
																	url: siteUrl + '/request',
																	dataType: 'json',
																	data: {'mode': 'getNeighborhood', 'areaId': areaId},
																	success: function(response)
																	{

																		var options = '<option value="0" disabled="disabled" selected="selected">Mahalle Seçin</option>';

																		$.each(response, function(i, value) {
																			options += '\
																				<option value="' + value.NeighborhoodID + '">' + value.NeighborhoodName + '</option>\
																			';
																		});

																		$('select[name=neighborhood]').html(options);
																		
																	}
																});
															});

												        	var value = '';
												        	$('.ad-location select').change(function() {
												        		
												        		var name = $(this).attr('name');

												        		if(name == 'city')
												        		{
												        			$('#map-canvas').hide();

																	document.getElementById("zoomFld").value = 10;

																	$('input[name=address]').val($('.ad-location select:first option:selected').text());

																	$('.ad-location select:eq(1), .ad-location select:eq(2), .ad-location select:eq(3)').val(0);
																	$('#markerLatFld, #markerLngFld, #latFld, #lngFld, #zoomFld').val('');
												        		}
												        		else if(name == 'county')
												        		{
												        			$('#map-canvas').hide();

																	document.getElementById("zoomFld").value = 12;

																	$('input[name=address]').val($('.ad-location select:first option:selected').text() + ', ' + $('.ad-location select:eq(1) option:selected').text());

																	$('.ad-location select:eq(2), .ad-location select:eq(3)').val(0);
																	$('#markerLatFld, #markerLngFld, #latFld, #lngFld, #zoomFld').val('');
												        		}
												        		else if(name == 'area')
												        		{
												        			$('#map-canvas').hide();

																	document.getElementById("zoomFld").value = 15;

																	$('input[name=address]').val($('.ad-location select:eq(2) option:selected').text() + ', ' + $('.ad-location select:eq(1) option:selected').text() + ', ' + $('.ad-location select:first option:selected').text());

																	$('.ad-location select:eq(3)').val(0);
																	$('#markerLatFld, #markerLngFld, #latFld, #lngFld, #zoomFld').val('');
												        		}
												        		else if(name == 'neighborhood')
												        		{
																	document.getElementById("zoomFld").value = 15;

																	$('input[name=address]').val($('.ad-location select:eq(3) option:selected').text().replace('MAH.', 'mahallesi') + ', ' + $('.ad-location select:eq(2) option:selected').text() + ', ' + $('.ad-location select:eq(1) option:selected').text() + ', ' + $('.ad-location select:first option:selected').text());

																	$('#map-canvas').show();
																	initMap();
																	codeAddress();

																	map.setZoom(15);
												        		}

												        	});
												        });
												    </script>
												{/literal}
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="input-hidden-images">
							<input type="hidden" name="ad-title-image" value="{$return.adInfo.title_image}">

							{foreach $return.adImages as $image}
								<input id="uploaded-image" type="hidden" name="ad-images[]" value="{$image.image}" data-image="{$image.image}">
							{/foreach}
						</div>
					</form>
					<div class="ad-images">
						<div class="block">
							<div class="block-title">
								<h5>İlan Resimleri (Zorunlu Alan)</h5>
							</div>
							<div class="block-content">
								<div class="col-md-11" style="margin-left: 35px;">
									<div class="progress">
									  	<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
									</div>
									
									<div class="row">
										<div class="uploaded-images">
											{foreach $return.adImages as $image}
												<div class="col-md-2 col-sm-3 col-xs-6" data-image="{$image.image}">
													<div class="image">
														<img src="{siteUrl('files/ads/thumb')}/{$image.image}.jpg" alt="{$return.adInfo.title} - {$image.image}" style="width: 100%;height: 100%;" />
														<div class="image-bottom">
															<div class="col-xs-6 title-image {if $image.image == $return.adInfo.title_image}active{/if}">Vitrin</div>
															<div class="col-xs-6 delete-image">
																<i class="material-icons">close</i>
															</div>
														</div>
													</div>
												</div>
											{/foreach}
										</div>
										
										<div class="col-md-2 col-sm-3 col-xs-6">
								    		<div class="upload-button">
									    		<input type="file" name="upload-images[]" multiple="multiple" accept="image/*" id="upload-input">
									    		<i class="material-icons">file_upload</i>
									    		<span style="display: block;text-align: center;margin-top: -22px;margin-bottom: 5px;font-weight: 500;font-size: 13px;color: #777;">Fotograf Yükle</span>
								    		</div>
								    	</div>
									</div>
									<div class="upload-message"></div>
								</div>
								<script type="text/javascript" src="{siteUrl('public/scripts/image-compressor.js')}"></script>
							</div>
						</div>
					</div>
				</div>
				<button type="button" class="btn btn-primary pull-right" onclick="{literal}$('form[name=update-ad]').submit();{/literal}" style="padding: 10px 50px;">Kaydet</button>
			{elseif $return.updateAd === true AND getUrl(1) == 'add-doping'}
				{if issetPost('dopings') AND issetPost('dopingsPrice')}
					{if $return.messageType == 'success'}
						<div class="alert alert-success">
							<strong>Başarılı!</strong> {$return.message}
						</div>
					{elseif $return.messageType == 'error'}
						<div class="alert alert-danger">
							<strong>Hata!</strong> {$return.message}
						</div>
					{/if}
				{/if}
				<div class="step-content">
					<div class="ad-doping-step" style="display: block;">
						<form name="ad-update" action="" method="POST">
							<input type="hidden" name="dopings" value="">
							<input type="hidden" name="dopingsPrice" value="">
						</form>
						<div class="doping-step-1">
							<div class="block">
								<div class="block-title">
									<h5>Daha Fazla Kullanıcıya Ulaşması İçin Doping Yükleyin</h5>
								</div>
								<div class="block-content">
									{if $return.siteConfig.iyzicoPayment === false}
										<div class="alert alert-danger" style="margin-right: 15px;margin-left: 15px;">1 Ocak 2018 tarihine kadar ücretsizdir</div>
									{/if}
									<div class="doping-lists">
										{foreach $return.dopingList as $doping}
											<div class="col-md-6">
												{if $return.limitType == 'individual_ad_limit'}
													{assign var=doping_user_price value=$doping.doping_individual_price}
												{elseif $return.limitType == 'corporate_ad_limit'}
													{assign var=doping_user_price value=$doping.doping_corporate_price}
												{/if}

												<div class="doping" data-doping="{$doping.id}" data-price="{$doping_user_price}" data-time="{$doping.doping_time}" data-name="{$doping.doping_name}" onclick="selectDoping({$doping.id});">
													<div class="doping-header">
														<div class="col-md-3 col-xs-12">
															<div class="doping-icon">
																{if $doping.id == 1}
																	<i class="material-icons">store</i>
																{elseif $doping.id == 2}
																	<i class="material-icons">alarm</i>
																{elseif $doping.id == 3}
																	<i class="material-icons">trending_up</i>
																{elseif $doping.id == 4}
																	<i class="material-icons">view_day</i>
																{/if}
															</div>
														</div>
														<div class="col-md-9 col-xs-12">
															<h4 class="doping-name">{$doping.doping_name}</h4>
															<a class="preview-doping" href="#">Nasıl Görünür?</a>
															<div class="doping-bottom">
																<p>{$doping.doping_text}</p>
																<div class="doping-price">
																	<label>{$doping.doping_time} Gün</label>
																	<span>
																		{if $doping_user_price > 0}
																			{$doping_user_price} TL
																		{else}
																			Ücretsiz
																		{/if}
																	</span>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										{/foreach}
										<div class="col-md-6">
											<div class="doping" data-doping="-1" data-price="0" data-time="30" data-name="İlk Sahibinden" onclick="selectDoping(-1);">
												<div class="doping-header">
													<div class="col-md-3 col-xs-12">
														<div class="doping-icon">
															<i class="material-icons">directions_car</i>
														</div>
													</div>
													<div class="col-md-9 col-xs-12">
														<h4 class="doping-name">İlk Sahibinden</h4>
														<a class="preview-doping" href="#">Nasıl Görünür?</a>
														<div class="doping-bottom">
															<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vel pharetra nunc, vulputate luctus risus. Nullam non justo at risus vehicula feugiat in ut purus.</p>
															<div class="doping-price">
																<label>30 Gün</label>
																<span>Ücretsiz</span>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="doping" data-doping="-2" data-price="0" data-time="30" data-name="Yeni Gibi" onclick="selectDoping(-2);">
												<div class="doping-header">
													<div class="col-md-3 col-xs-12">
														<div class="doping-icon">
															<i class="material-icons">fiber_new</i>
														</div>
													</div>
													<div class="col-md-9 col-xs-12">
														<h4 class="doping-name">Yeni Gibi</h4>
														<a class="preview-doping" href="#">Nasıl Görünür?</a>
														<div class="doping-bottom">
															<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vel pharetra nunc, vulputate luctus risus. Nullam non justo at risus vehicula feugiat in ut purus.</p>
															<div class="doping-price">
																<label>30 Gün</label>
																<span>Ücretsiz</span>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="doping" data-doping="-3" data-price="0" data-time="30" data-name="Ekspertizli" onclick="selectDoping(-3);">
												<div class="doping-header">
													<div class="col-md-3 col-xs-12">
														<div class="doping-icon">
															<i class="material-icons">check_circle</i>
														</div>
													</div>
													<div class="col-md-9 col-xs-12">
														<h4 class="doping-name">Ekspertizli</h4>
														<a class="preview-doping" href="#">Nasıl Görünür?</a>
														<div class="doping-bottom">
															<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vel pharetra nunc, vulputate luctus risus. Nullam non justo at risus vehicula feugiat in ut purus.</p>
															<div class="doping-price">
																<label>30 Gün</label>
																<span>Ücretsiz</span>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<button type="button" name="complete" onclick="{literal}$('form[name=ad-add], form[name=ad-update]').submit();{/literal}" class="btn btn-primary pull-right" style="padding: 10px 50px;">Devam Et</button>
						</div>
						{if $return.siteConfig.iyzicoPayment === true}
							<div class="doping-step-2">
								<div class="doping-step-2-header">
									<div class="block">
										<div class="block-title">
											<h5>Sepetiniz</h5>
										</div>
										<div class="block-content">
											<table class="table" style="border: 1px solid #ddd;">
												<thead>
													<tr>
														<th>Açıklama</th>
														<th>Süre</th>
														<th>Fiyat</th>
													</tr>
												</thead>
												<tbody></tbody>
											</table>
											<div class="total-doping-price">Genel Toplam: <span>0</span> TL</div>
										</div>
									</div>
								</div>
								<div class="doping-step-2-bottom">
									<div class="row">
										<div class="col-md-5">
											<div class="block">
												<div class="block-title">
													<h5>Fatura Bilgileri</h5>
												</div>
												<div class="block-content">
													<table class="table">
														<tbody>
															<tr>
																<td style="width: 40%;">Adı Soyadı</td>
																<td style="width: 60%;" class="text-capitalize"><b>{userInfo($smarty.session.userId, 'name')} {userInfo($smarty.session.userId, 'surname')}</b></td>
															</tr>
															<tr>
																<td style="width: 40%;">İl</td>
																<td style="width: 60%;" class="text-capitalize"><b>{cityInfo(userInfo($smarty.session.userId, 'city'), 'CityName')}</b></td>
															</tr>
															<tr>
																<td style="width: 40%;">İlçe</td>
																<td style="width: 60%;" class="text-capitalize"><b>{countyInfo(userInfo($smarty.session.userId, 'county'), 'CountyName')}</b></td>
															</tr>
															<tr>
																<td style="width: 40%;">Cep Telefonu</td>
																<td style="width: 60%;" class="text-capitalize"><b>{userInfo($smarty.session.userId, 'phone')}</b></td>
															</tr>
															<tr>
																<td style="width: 40%;">Açık Adres</td>
																<td style="width: 60%;" class="text-capitalize"><b>{userInfo($smarty.session.userId, 'address')}</b></td>
															</tr>
															<tr>
																<td style="width: 40%;">Tc No</td>
																<td style="width: 60%;" class="text-capitalize"><b>{userInfo($smarty.session.userId, 'tc')}</b></td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
										<div class="col-md-7">
											<div class="block">
												<div class="block-title">
													<h5>Ödeme Bilgileriniz</h5>
												</div>
												<div class="block-content">
													<div class="payment-message"></div>
													<div class="payment-loader">
														<div class="loader"></div>
													</div>
													<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
														<div class='card-wrapper'></div>
														<link rel="stylesheet" href="{siteUrl('public/styles/card.css')}">
														<script type="text/javascript" src="{siteUrl('public/scripts/jquery.card.js')}"></script>
														<form name="doping-card">
															<div class="row">
																<div class="col-md-12">
																	<div class="row">
																	    <div class="form-group col-md-6 col-xs-6">
																	    	<input type="text" id="number" name="number" placeholder="Kart Numarası" class="form-control" />
																	    </div>
																	    <div class="form-group col-md-6 col-xs-6">
																	    	<input type="text" id="name" name="name" placeholder="Ad Soyad" class="form-control" />
																	    </div>
																    </div>
															    </div>
															    <div class="col-md-12">
															    	<div class="row">
																    	<div class="form-group col-md-3 col-xs-6">
																    		<input type="text" id="expiry" name="expiry" placeholder="MM/YYYY" class="form-control" />
																    	</div>
																    	<div class="form-group col-md-3 col-xs-6">
																    		<input type="text" id="cvc" name="cvc" placeholder="CVC" class="form-control" />
																    	</div>
																    	<div class="form-group col-md-6 col-xs-12">
																    		<button type="button" class="btn btn-primary" onclick="dopingPayment();" style="line-height: 30px;width: 100%;">Ödeme Yap</button>
																    	</div>
															    	</div>
															    </div>
														    </div>
														</form>
														<script type="text/javascript">
															$('form[name=doping-card]').card({
															    container: '.card-wrapper',
															    //width: 200,
															    formatting: true,
															    messages: {
															        validDate: 'valid\ndate',
															        monthYear: 'mm/yyyy',
															    },
															    placeholders: {
															        number: '•••• •••• •••• ••••',
															        name: 'Ad Soyad',
															        expiry: '••/••',
															        cvc: '•••'
															    }
															});
														</script>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						{/if}
					</div>
				</div>
			{/if}	
		</div>
	</div>
</div>