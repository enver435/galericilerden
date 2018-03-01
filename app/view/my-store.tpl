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
						<li class="active">
							<a href="{siteUrl('my-store')}">
								<i class="material-icons">store</i> Mağazam
							</a>
						</li>
					{/if}
				</ul>
			</div>
	
			<h4 class="hidden-lg hidden-md" style="margin-bottom: 25px;">Mağazam</h4>
			{if $return.userStore === false}
				<div class="default-block">
		        	<div class="block">
			        	<div class="block-title">
			        		<h5>Mağazanız bulunmuyor</h5>
			        	</div>
		        		<div class="block-content">
			        		<div class="text-center">
								<i class="material-icons" style="margin-bottom: 25px;font-size: 100px;color: #ff263a;">close</i>
								<p style="font-weight: 500;">Üzgünüz mağazanız yok.</p>
								<a href="{siteUrl('create-store')}">
									<button type="button" class="btn btn-primary" style="margin-top: 25px;">Şimdi mağaza açın</button>
								</a>
							</div>
						</div>
					</div>
				</div>
			{else}
				{if !getUrl(1)}
					<div class="block my-store desktop hidden-sm hidden-xs">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th></th>
										<th>Mağaza İsmi</th>
										<th>Oluşturulma Tarihi</th>
										<th>Bitiş Tarihi</th>
										<th>Kalan İlan Adedi</th>
										<th>Durum</th>
										<th>İşlemler</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td width="130">
											<img src="{siteUrl('files/store/thumb')}/{$return.userStore.store_logo}.jpg" width="130" alt="{$return.userStore.store_name}">
										</td>
										<td>{$return.userStore.store_name|capitalize}</td>
										<td>{$return.userStore.create_time|date_format:"%d.%m.%Y"}</td>
										<td>{if $return.userStore.end_time != 0}{$return.userStore.end_time|date_format:"%d.%m.%Y"}{else}-{/if}</td>
										<td>
											{if $return.Store->storeInfo($return.userStore.store_type, 'ad_limit') > 0}
												{$return.Store->storeInfo($return.userStore.store_type, 'ad_limit') - $return.Ads->checkLimit($return.userStore.user_id)}
											{else}
												Limitsiz
											{/if}
										</td>
										<td>
											{if $return.userStore.end_time != 0}
												{if $return.userStore.status == 1}
													
													{assign var=onayYillik value=false}
													{assign var=onayLimit value=false}

													{if $return.Store->storeInfo($return.userStore.store_type, 'ad_limit') > 0}
														{if $return.Ads->checkLimit($return.userStore.user_id) >= $return.Store->storeInfo($return.userStore.store_type, 'ad_limit')}
															Mağaza Yıllık Limiti Bitmiş
														{else}
															{$onayYillik=true}
														{/if}
													{else}
														{$onayYillik=true}
													{/if}

													{if $smarty.now > $return.userStore.end_time}
														Mağaza Yıllık Süresi Bitmiş
													{else}
														{$onayLimit=true}
													{/if}

													{if $onayYillik === true AND $onayLimit === true}
														Onaylandı
													{/if}

												{elseif $return.userStore.status == 0}
													Admin Kontrolünde
												{elseif $return.userStore.status == 2}
													Onaylanmadı
												{/if}
											{else}
												<!-- Yeni mağaza açma -->

												{if $return.userStore.status == 0}
													Admin Kontrolünde
												{elseif $return.userStore.status == 1}
													Onaylandı
												{elseif $return.userStore.status == 2}
													Onaylanmadı
												{/if}
											{/if}
										</td>
										<td width="25%">
											{if $return.userStore.end_time != 0 AND $smarty.now > $return.userStore.end_time}
												{if $return.userStore.status == 1}
													<a href="{siteUrl('update-store-year')}">
														<button type="button" class="btn btn-primary" style="font-size: 13px;">Mağazayı Güncelle</button>
													</a>
												{elseif $return.userStore.status == 2}
													<a href="{siteUrl('my-store/edit-store')}">
														<button type="button" class="btn btn-primary" style="font-size: 13px;">Mağazamı Düzenle</button>
													</a>
												{else}
													-
												{/if}
											{elseif $return.userStore.end_time != 0 AND $return.Store->storeInfo($return.userStore.store_type, 'ad_limit') != 0 AND $return.Ads->checkLimit($return.userStore.user_id) >= $return.Store->storeInfo($return.userStore.store_type, 'ad_limit')}
												{if $return.userStore.status == 1}
													<a href="{siteUrl('update-store-limit')}">
														<button type="button" class="btn btn-primary" style="font-size: 13px;">Mağazayı Güncelle</button>
													</a>
												{elseif $return.userStore.status == 2}
													<a href="{siteUrl('my-store/edit-store')}">
														<button type="button" class="btn btn-primary" style="font-size: 13px;">Mağazamı Düzenle</button>
													</a>
												{else}
													-
												{/if}
											{else}
												<!-- Yeni mağaza aç -->
												{if $return.userStore.status == 2}
													<a href="{siteUrl('my-store/edit-store')}">
														<button type="button" class="btn btn-primary" style="font-size: 13px;">Mağazamı Düzenle</button>
													</a>
												{else}
													{if $return.userStore.status != 0}
														<a href="http://{$return.userStore.store_domain}{$return.siteConfig.siteStoreDomain}" target="_blank">
															<button type="button" class="btn btn-primary" style="font-size: 13px;">Mağazama Git</button>
														</a>
														<a href="{siteUrl('my-store/edit-store')}">
															<button type="button" class="btn btn-primary" style="font-size: 13px;">Mağazamı Düzenle</button>
														</a>
													{else}
														-
													{/if}
												{/if}
											{/if}
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="block my-store list-mobile hidden-lg hidden-md">
						<ul>
							<li>
								<img src="{siteUrl('files/store/thumb')}/{$return.userStore.store_logo}.jpg" width="130" alt="{$return.userStore.store_name}">
								<div class="title">
									{$return.userStore.store_name|capitalize}
								</div>
								<div class="list-mobile-bottom">
									<div class="list-mobile-bottom-info">
										<span>
											<b>Oluşturulma Tarihi: </b>
											{$return.userStore.create_time|date_format:"%d.%m.%Y"}
										</span>
										<span>
											<b>Bitiş Tarihi: </b>
											{if $return.userStore.end_time != 0}{$return.userStore.end_time|date_format:"%d.%m.%Y"}{else}-{/if}
										</span>
										<span>
											<b>Kalan İlan Adedi: </b>
											{if $return.Store->storeInfo($return.userStore.store_type, 'ad_limit') > 0}
												{$return.Store->storeInfo($return.userStore.store_type, 'ad_limit') - $return.Ads->checkLimit($return.userStore.user_id)}
											{else}
												Limitsiz
											{/if}
										</span>
										<span>
											<b>Durum: </b>
											{if $return.userStore.end_time != 0 AND $smarty.now > $return.userStore.end_time}
												Mağaza Yıllık Süresi Bitmiş
											{elseif $return.userStore.end_time != 0 AND $return.Ads->checkLimit($return.userStore.user_id) >= $return.Store->storeInfo($return.userStore.store_type, 'ad_limit')}
												Mağaza Yıllık Limiti Bitmiş
											{else}
												{if $return.userStore.status == 0}
													Admin Kontrolünde
												{elseif $return.userStore.status == 1}
													Onaylandı
												{elseif $return.userStore.status == 2}
													Onaylanmadı
												{/if}
											{/if}
										</span>
										<span style="display: block;margin-top: 10px;padding: 0;">
											{if $return.userStore.end_time != 0 AND $smarty.now > $return.userStore.end_time}
												{if $return.userStore.status == 1}
													<a href="{siteUrl('update-store-year')}">
														<button type="button" class="btn btn-primary" style="width: 100%;font-size: 13px;margin-bottom: 10px;">Mağazayı Güncelle</button>
													</a>
												{elseif $return.userStore.status == 2}
													<a href="{siteUrl('my-store/edit-store')}">
														<button type="button" class="btn btn-primary" style="width: 100%;font-size: 13px;">Mağazamı Düzenle</button>
													</a>
												{else}
													-
												{/if}
											{elseif $return.userStore.end_time != 0 AND $return.Store->storeInfo($return.userStore.store_type, 'ad_limit') != 0 AND $return.Ads->checkLimit($return.userStore.user_id) >= $return.Store->storeInfo($return.userStore.store_type, 'ad_limit')}
												{if $return.userStore.status == 1}
													<a href="{siteUrl('update-store-limit')}">
														<button type="button" class="btn btn-primary" style="width: 100%;font-size: 13px;margin-bottom: 10px;">Mağazayı Güncelle</button>
													</a>
												{elseif $return.userStore.status == 2}
													<a href="{siteUrl('my-store/edit-store')}">
														<button type="button" class="btn btn-primary" style="width: 100%;font-size: 13px;">Mağazamı Düzenle</button>
													</a>
												{else}
													-
												{/if}
											{else}
												<!-- Yeni mağaza aç -->
												{if $return.userStore.status == 2}
													<a href="{siteUrl('my-store/edit-store')}">
														<button type="button" class="btn btn-primary" style="width: 100%;font-size: 13px;">Mağazamı Düzenle</button>
													</a>
												{else}
													{if $return.userStore.status != 0}
														<a href="http://{$return.userStore.store_domain}{$return.siteConfig.siteStoreDomain}" target="_blank">
															<button type="button" class="btn btn-primary" style="width: 100%;font-size: 13px;margin-bottom: 10px;">Mağazama Git</button>
														</a>
														<a href="{siteUrl('my-store/edit-store')}">
															<button type="button" class="btn btn-primary" style="width: 100%;font-size: 13px;">Mağazamı Düzenle</button>
														</a>
													{else}
														-
													{/if}
												{/if}
											{/if}
										</span>
									</div>
								</div>
							</li>
						</ul>
					</div>
				{else}
					{if getUrl(1) == 'edit-store'}
						{if isset($smarty.post.completed)}
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
							<div class="add-store-info">
								<div class="block">
									<div class="block-title">
										<h5>Mağaza Bilgileri</h5>
									</div>
									<div class="block-content">
										<form name="edit-store" action="" method="POST">
											<div class="hidden-inputs">
												<input type="hidden" name="store-image" value="{$return.userStore.store_logo}">
												<input type="hidden" name="store-theme" value="{$return.userStore.store_theme}">
												<input type="hidden" name="firm_name" value="{$return.userStore.store_name}">
												<input type="hidden" name="sales_name" value="{$return.userStore.sales_name}">
												<input type="hidden" name="sales_surname" value="{$return.userStore.sales_surname}">
												<input type="hidden" name="sales_phone" value="{$return.userStore.sales_phone}">
												<input type="hidden" name="completed" value="completed">
											</div>
											<div class="col-md-11" style="margin-left: 35px;">
												<div class="form-group">
													<div class="row">
														<div class="col-md-6 col-sm-6 col-xs-12">
															<label>Mağaza Adı:</label>
															<input type="text" name="store_name" class="form-control" placeholder="Mağaza Adı" onkeypress="return restrictCharacters(this, event, alphaOnly);" onpaste="return false;" autocomplete="off" onkeyup="showDomainName(); checkDomain();" value="{$return.userStore.store_domain}">
														</div>
														<div class="col-md-6 col-sm-6 col-xs-12">
															<label>Mağaza Domain:</label>
															<input type="text" disabled="disabled" name="domainname" class="form-control" value="{$return.userStore.store_domain}{$return.siteConfig.siteStoreDomain}">
														</div>
													</div>
													<div class="domain-name-message" style="margin-top: 15px;"></div>
												</div>
												<div class="form-group">
													<label>Mağaza Açıklaması: </label>
													<textarea name="store_text" class="form-control" cols="30" rows="10">{$return.userStore.store_text}</textarea>
												</div>
											</div>
										</form>
										<div class="col-md-11" style="margin-left: 35px;">
											<div class="row">
												<div class="col-md-6">
													<label>Mağaza Logosu (Max Genişlik: 220px, Max Yükseklik: 165px): </label>
													<div class="progress">
													  	<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
													</div>
													
													<div class="row">
														<div class="uploaded-images">
															<div class="col-md-4 col-sm-3 col-xs-6">
																<div class="image">
																	<img src="{siteUrl('files/store/thumb')}/{$return.userStore.store_logo}.jpg" alt="{$return.userStore.store_name}" style="width: 100%;height: 90px;" />
																</div>
															</div>
														</div>
														
														<div class="col-md-3 col-sm-3 col-xs-6">
												    		<div class="upload-button">
													    		<input type="file" name="upload-image" accept="image/*" id="upload-input">
													    		<i class="material-icons">file_upload</i>
													    		<span style="display: block;text-align: center;margin-top: -22px;margin-bottom: 5px;font-weight: 500;font-size: 13px;color: #777;">Fotograf Yükle</span>
												    		</div>
												    	</div>
														<form id="uploadForm" action="{siteUrl('request')}" method="POST" enctype="multipart/form-data"></form>
													</div>
													<div class="upload-message"></div>
												</div>
												<div class="col-md-6 select-store-theme">
													<label>Mağaza Teması: </label>
													<div class="row">
														<div class="col-md-6 col-sm-3 col-xs-12" data-theme="1" style="margin-bottom: 15px;">
															<img src="{siteUrl('public/images/store/header1.jpg')}" width="100%" alt="store theme 1" onclick="selectStoreTheme(1);">
															<div class="selected {if $return.userStore.store_theme == 1}active{/if}">
																<i class="material-icons">check</i>
															</div>
														</div>
														<div class="col-md-6 col-sm-3 col-xs-12" data-theme="2" style="margin-bottom: 15px;">
															<img src="{siteUrl('public/images/store/header2.jpg')}" width="100%" alt="store theme 2" onclick="selectStoreTheme(2);">
															<div class="selected {if $return.userStore.store_theme == 2}active{/if}">
																<i class="material-icons">check</i>
															</div>
														</div>
														<div class="col-md-6 col-sm-3 col-xs-12" data-theme="3" style="margin-bottom: 15px;">
															<img src="{siteUrl('public/images/store/header3.jpg')}" width="100%" alt="store theme 3" onclick="selectStoreTheme(3);">
															<div class="selected {if $return.userStore.store_theme == 3}active{/if}">
																<i class="material-icons">check</i>
															</div>
														</div>
														<div class="col-md-6 col-sm-3 col-xs-12" data-theme="4" style="margin-bottom: 15px;">
															<img src="{siteUrl('public/images/store/header4.jpg')}" width="100%" alt="store theme 4" onclick="selectStoreTheme(4);">
															<div class="selected {if $return.userStore.store_theme == 4}active{/if}">
																<i class="material-icons">check</i>
															</div>
														</div>
													</div>
													<div class="theme-message"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="block">
									<div class="block-title">
										<h5>Firma Bilgileri</h5>
									</div>
									<div class="block-content">
										<div class="col-md-11" style="margin-left: 35px;">
											<div class="form-group">
												<label>Firma Adı: </label>
												<input type="text" name="firm_name" onkeyup="{literal}$('form[name=edit-store] input[name=firm_name]').val($(this).val());{/literal}" class="form-control" placeholder="Firma Adı" value="{$return.userStore.store_name}">
											</div>
											<div class="form-group">
												<label>Satış Temsilci İsim: </label>
												<input type="text" name="sales_name" onkeyup="{literal}$('form[name=edit-store] input[name=sales_name]').val($(this).val());{/literal}" class="form-control" placeholder="Satış Temsilci Adı" value="{$return.userStore.sales_name}">
											</div>
											<div class="form-group">
												<label>Satış Temsilci Soyisim: </label>
												<input type="text" name="sales_surname" onkeyup="{literal}$('form[name=edit-store] input[name=sales_surname]').val($(this).val());{/literal}" class="form-control" placeholder="Satış Temsilci Soyisim" value="{$return.userStore.sales_surname}">
											</div>
											<div class="form-group">
												<label>Satış Temsilci Numarası: </label>
												<input id="phone" type="tel" name="sales_phone" onkeyup="{literal}$('form[name=edit-store] input[name=sales_phone]').val($(this).val());{/literal}" class="form-control" value="{$return.userStore.sales_phone}">
											</div>
											<div class="form-group">
												{assign var=activity_area value=userInfo($return.userStore.user_id, 'activity_area')}
												<label>Faaliyet Alanı: </label>
												<input type="text" disabled="disabled" value="{if $activity_area == 1}Galeri{elseif $activity_area == 2}Yetkili Bayi{elseif $activity_area == 3}Üretici Firma{/if}" class="form-control">
											</div>
											<div class="form-group">
												{assign var=business_type value=userInfo($return.userStore.user_id, 'business_type')}
												<label>İşletme Türü: </label>
												<input type="text" disabled="disabled" value="{if $business_type == 1}Şahıs Şirketi{elseif $business_type == 2}Limited veya Anonim Şirketi{/if}" class="form-control">
											</div>
											<div class="form-group">
												<label>TC Kimlik No: </label>
												<input type="text" disabled="disabled" value="{userInfo($return.userStore.user_id, 'tc')}" class="form-control">
											</div>
											{if $business_type == 2}
												<div class="form-group">
													<label>Ticari Ünvan: </label>
													<input type="text" disabled="disabled" value="{userInfo($return.userStore.user_id, 'commercial_title')}" class="form-control">
												</div>
											{/if}
											<div class="form-group">
												<label>İl: </label>
												<input type="text" disabled="disabled" value="{cityInfo(userInfo($return.userStore.user_id, 'city'), 'CityName')}" class="form-control">
											</div>
											<div class="form-group">
												<label>İlçe: </label>
												<input type="text" disabled="disabled" value="{countyInfo(userInfo($return.userStore.user_id, 'county'), 'CountyName')}" class="form-control">
											</div>
											<div class="form-group">
												<label>Vergi Dairesi: </label>
												<input type="text" disabled="disabled" value="{taxInfo(userInfo($return.userStore.user_id, 'tax'), 'daire')}" class="form-control">
											</div>
											<div class="form-group">
												<label>Vergi Numarası: </label>
												<input type="text" disabled="disabled" value="{userInfo($return.userStore.user_id, 'tax_no')}" class="form-control">
											</div>
											<div class="form-group">
												<label>Adres Detayı: </label>
												<textarea disabled="disabled" cols="20" rows="5" class="form-control">{userInfo($return.userStore.user_id, 'address')}</textarea>
											</div>
										</div>
									</div>
								</div>
								<script type="text/javascript" src="{siteUrl('public/scripts/jquery.maskedinput.min.js')}"></script>
								{literal}
									<script type="text/javascript">
										$(function() {
											$("#phone").mask("0 (999) 999 99 99");
										});
									</script>
								{/literal}
								<button type="button" class="btn btn-primary pull-right" onclick="{literal}$('form[name=edit-store]').submit();{/literal}" style="padding: 10px 50px;">Kaydet</button>
							</div>
						</div>
					{/if}
				{/if}
			{/if}
		</div>
	</div>
</div>