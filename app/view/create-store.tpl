<body onload="setStore();">
<div id="main">
	{include file="header.tpl"}
	<div class="page-content">
		<div class="container">
			<div class="row">
				<ul class="breadcrumb">
				    <li><a href="{SITE_URL}">Anasayfa</a></li>
				    <li class="active">Mağaza Aç</li>
				</ul>
				<div class="steps hidden-xs">
					<ul>
				        <li class="step-one active"><i class="step">1</i>
				            <h6>MAĞAZA BİLGİLERİ</h6>
				            <span id="spGeneral" class="active" style="width: 165px;">
				                <img src="{siteUrl('public/images/spacer.png')}" width="7" height="14" alt="Arrow" class="arrow">
				                <a id="hlGeneral">Mağaza Bilgilerini Gir</a>
				            </span>
				        </li>
				        <li id="liFirm" class="step-two {if $smarty.post.completed == 'completed'}active{/if}"><i class="step">2</i>
				            <h6>FİRMA BİLGİLERİ</h6> 
				            <span {if $smarty.post.completed == 'completed'}class="active"{/if}><img src="{siteUrl('public/images/spacer.png')}" width="7" height="14" alt="Arrow" class="arrow">
				            	<a>Firma Bilgileri</a>
				            </span>
				        </li>
				        <li id="liPayment" class="step-three {if $smarty.post.completed == 'completed'}active{/if}"><i class="step">3</i>
				            <h6>ÖDEME</h6> 
				            <span {if $smarty.post.completed == 'completed'}class="active"{/if}><img src="{siteUrl('public/images/spacer.png')}" width="7" height="14" alt="Arrow" class="arrow">
				            	<a>Ödeme Bilgileriniz</a>
				            </span>
				        </li>
				        <li id="liConfirm" class="step-four {if $smarty.post.completed == 'completed'}active{/if}"><i class="step">4</i>
				            <h6>TEBRİKLER</h6>
				            <span {if $smarty.post.completed == 'completed'}class="active"{/if}>
				            	<img src="{siteUrl('public/images/spacer.png')}" width="7" height="14" alt="Arrow" class="arrow">
				            	<a>Onayla</a>
				            </span>
				        </li>
				    </ul>
				</div>
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
					{if !isset($smarty.post.completed) AND $smarty.post.completed != 'completed'}
						<div class="add-store-info">
							<div class="block">
								<div class="block-title">
									<h5>Mağaza Bilgileri</h5>
								</div>
								<div class="block-content">
									<form name="create-store" action="" method="POST">
										<div class="hidden-inputs">
											<input type="hidden" name="store-image" value="">
											<input type="hidden" name="store-theme" value="">
											<input type="hidden" name="firm_name" value="">
											<input type="hidden" name="sales_name" value="">
											<input type="hidden" name="sales_surname" value="">
											<input type="hidden" name="sales_phone" value="">
											<input type="hidden" name="completed" value="completed">
										</div>
										<div class="col-md-11" style="margin-left: 35px;">
											<div class="form-group">
												<div class="row">
													<div class="col-md-6 col-sm-6 col-xs-12">
														<label>Mağaza Adı:</label>
														<input type="text" name="store_name" class="form-control" placeholder="Mağaza Adı" onkeypress="return restrictCharacters(this, event, alphaOnly);" onpaste="return false;" autocomplete="off" onkeyup="showDomainName(); checkDomain();">
													</div>
													<div class="col-md-6 col-sm-6 col-xs-12">
														<label>Mağaza Domain:</label>
														<input type="text" disabled="disabled" name="domainname" class="form-control" value="domainadi{$return.siteConfig.siteStoreDomain}">
													</div>
												</div>
												<div class="domain-name-message" style="margin-top: 15px;"></div>
											</div>
											<div class="form-group">
												<label>Mağaza Tipi: </label>
												<select name="store_type" onchange="setStore();" class="form-control">
													{foreach $return.storeList as $store}
														<option value="{$store.id}" data-price="{$store.store_price}">{$store.store_type_name} ({if $store.ad_limit == 0}Limitsiz İlan Limiti{else}{$store.ad_limit} İlan Limiti{/if})</option>
													{/foreach}
												</select>
												{if $return.siteConfig.iyzicoPayment === true}
													<div class="paymentPrice" style="margin-top: 15px;">
														<div class="alert alert-info">Ödeyeceğiniz Tutar: <span></span></div>
													</div>
												{else}
													<div class="alert alert-danger" style="margin-top: 15px;">1 Ocak 2018 tarihine kadar ücretsizdir</div>
												{/if}
											</div>
											<div class="form-group">
												<label>Mağaza Açıklaması: </label>
												<textarea name="store_text" class="form-control" cols="30" rows="10"></textarea>
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
													<div class="uploaded-images"></div>
													
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
														<div class="selected">
															<i class="material-icons">check</i>
														</div>
													</div>
													<div class="col-md-6 col-sm-3 col-xs-12" data-theme="2" style="margin-bottom: 15px;">
														<img src="{siteUrl('public/images/store/header2.jpg')}" width="100%" alt="store theme 2" onclick="selectStoreTheme(2);">
														<div class="selected">
															<i class="material-icons">check</i>
														</div>
													</div>
													<div class="col-md-6 col-sm-3 col-xs-12" data-theme="3" style="margin-bottom: 15px;">
														<img src="{siteUrl('public/images/store/header3.jpg')}" width="100%" alt="store theme 3" onclick="selectStoreTheme(3);">
														<div class="selected">
															<i class="material-icons">check</i>
														</div>
													</div>
													<div class="col-md-6 col-sm-3 col-xs-12" data-theme="4" style="margin-bottom: 15px;">
														<img src="{siteUrl('public/images/store/header4.jpg')}" width="100%" alt="store theme 4" onclick="selectStoreTheme(4);">
														<div class="selected">
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
							<button type="button" class="btn btn-primary pull-right" onclick="getStoreFirm();" style="padding: 10px 50px;">Devam Et</button>
						</div>
						<div class="add-store-firms" style="display: none;">
							<div class="block">
								<div class="block-title">
									<h5>Firma Bilgileri</h5>
								</div>
								<div class="block-content">
									<div class="col-md-11" style="margin-left: 35px;">
										<div class="form-group">
											<label>Firma Adı: </label>
											<input type="text" name="firm_name" onkeyup="{literal}$('form[name=create-store] input[name=firm_name]').val($(this).val());{/literal}" class="form-control" placeholder="Firma Adı">
										</div>
										<div class="form-group">
											<label>Satış Temsilci İsim: </label>
											<input type="text" name="sales_name" onkeyup="{literal}$('form[name=create-store] input[name=sales_name]').val($(this).val());{/literal}" class="form-control" placeholder="Satış Temsilci Adı">
										</div>
										<div class="form-group">
											<label>Satış Temsilci Soyisim: </label>
											<input type="text" name="sales_surname" onkeyup="{literal}$('form[name=create-store] input[name=sales_surname]').val($(this).val());{/literal}" class="form-control" placeholder="Satış Temsilci Soyisim">
										</div>
										<div class="form-group">
											<label>Satış Temsilci Numarası: </label>
											<input id="phone" type="tel" name="sales_phone" onkeyup="{literal}$('form[name=create-store] input[name=sales_phone]').val($(this).val());{/literal}" class="form-control">
										</div>
										<div class="form-group">
											{assign var=activity_area value=userInfo($smarty.session.userId, 'activity_area')}
											<label>Faaliyet Alanı: </label>
											<input type="text" disabled="disabled" value="{if $activity_area == 1}Galeri{elseif $activity_area == 2}Yetkili Bayi{elseif $activity_area == 3}Üretici Firma{/if}" class="form-control">
										</div>
										<div class="form-group">
											{assign var=business_type value=userInfo($smarty.session.userId, 'business_type')}
											<label>İşletme Türü: </label>
											<input type="text" disabled="disabled" value="{if $business_type == 1}Şahıs Şirketi{elseif $business_type == 2}Limited veya Anonim Şirketi{/if}" class="form-control">
										</div>
										<div class="form-group">
											<label>TC Kimlik No: </label>
											<input type="text" disabled="disabled" value="{userInfo($smarty.session.userId, 'tc')}" class="form-control">
										</div>
										{if $business_type == 2}
											<div class="form-group">
												<label>Ticari Ünvan: </label>
												<input type="text" disabled="disabled" value="{userInfo($smarty.session.userId, 'commercial_title')}" class="form-control">
											</div>
										{/if}
										<div class="form-group">
											<label>İl: </label>
											<input type="text" disabled="disabled" value="{cityInfo(userInfo($smarty.session.userId, 'city'), 'CityName')}" class="form-control">
										</div>
										<div class="form-group">
											<label>İlçe: </label>
											<input type="text" disabled="disabled" value="{countyInfo(userInfo($smarty.session.userId, 'county'), 'CountyName')}" class="form-control">
										</div>
										<div class="form-group">
											<label>Vergi Dairesi: </label>
											<input type="text" disabled="disabled" value="{taxInfo(userInfo($smarty.session.userId, 'tax'), 'daire')}" class="form-control">
										</div>
										<div class="form-group">
											<label>Vergi Numarası: </label>
											<input type="text" disabled="disabled" value="{userInfo($smarty.session.userId, 'tax_no')}" class="form-control">
										</div>
										<div class="form-group">
											<label>Adres Detayı: </label>
											<textarea disabled="disabled" cols="20" rows="5" class="form-control">{userInfo($smarty.session.userId, 'address')}</textarea>
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
							{if $return.siteConfig.iyzicoPayment === true}
								<button type="button" class="btn btn-primary pull-right" onclick="getStorePayment();" style="padding: 10px 50px;">Devam Et</button>
							{else}
								<button type="button" class="btn btn-primary pull-right" onclick="{literal}$('form[name=create-store]').submit();{/literal}" style="padding: 10px 50px;">Devam Et</button>
							{/if}
						</div>
						{if $return.siteConfig.iyzicoPayment === true}
							<div class="add-store-payment" style="display: none;">
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
												<div class="paymentPrice">
													<div class="alert alert-info">Ödeyeceğiniz Tutar: <span></span></div>
												</div>
												<div class="payment-message"></div>
												<div class="payment-loader">
													<div class="loader"></div>
												</div>
												<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
													<div class='card-wrapper'></div>
													<link rel="stylesheet" href="{siteUrl('public/styles/card.css')}">
													<script type="text/javascript" src="{siteUrl('public/scripts/jquery.card.js')}"></script>
													<form name="storeCreate-card">
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
															    		<button type="button" class="btn btn-primary" onclick="storeCreatePayment();" style="line-height: 30px;width: 100%;">Ödeme Yap</button>
															    	</div>
														    	</div>
														    </div>
													    </div>
													</form>
													<script type="text/javascript">
														$('form[name=storeCreate-card]').card({
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
						{/if}
					{else}
						<div class="add-store-message">
							<div class="step-content">
								<div class="block">
									{if $return.messageType == 'success'}
										<div class="block-title">
											<h5>Başarılı</h5>
										</div>
										<div class="block-content">
											<div class="text-center">
												<i class="material-icons" style="margin-bottom: 25px;font-size: 100px;color: #3c763d;">check</i>
												<p style="font-weight: 500;">{$return.message}</p>
											</div>
										</div>
									{elseif $return.messageType == 'error'}
										<div class="block-title">
											<h5>Hata</h5>
										</div>
										<div class="block-content">
											<div class="text-center">
												<i class="material-icons" style="margin-bottom: 25px;font-size: 100px;color: #ff263a;">close</i>
												<p style="font-weight: 500;">{$return.message}</p>
											</div>
										</div>
									{/if}
								</div>
							</div>
						</div>
					{/if}
				</div>
			</div>
		</div>
	</div>
</div>