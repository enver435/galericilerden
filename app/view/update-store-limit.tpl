<body onload="setStore();">
<div id="main">
	{include file="header.tpl"}
	<div class="page-content">
		<div class="container">
			<ul class="breadcrumb">
			    <li><a href="{SITE_URL}">Anasayfa</a></li>
			    <li class="active">Mağaza Limitini Güncelle</li>
			</ul>
			<div class="step-content">
				<div class="block">
					<div class="block-title">
						<h5>Mağaza Tipi Seçin</h5>
					</div>
					<div class="block-content">
						<form name="store-limit-update" action="" method="POST">
							<div class="hidden-inputs">
								<input type="hidden" name="completed" value="completed">
							</div>
							<div class="col-md-11" style="margin-left: 35px;">
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
									{/if}
								</div>
							</div>
						</form>
					</div>
				</div>
				{if $return.siteConfig.iyzicoPayment === false}
					<button type="submit" name="complete" onclick="{literal}$('form[name=store-limit-update]').submit();{/literal}" class="btn btn-primary pull-right" style="padding: 10px 20px;">Mağazanızı Güncelleyin</button>
				{/if}
				{if $return.siteConfig.iyzicoPayment === true}
					<div class="storeLimitPayment">
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
											<form name="storelimitupdate-card">
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
													    		<button type="button" class="btn btn-primary" onclick="storeUpdateLimitPayment();" style="line-height: 30px;width: 100%;">Ödeme Yap</button>
													    	</div>
												    	</div>
												    </div>
											    </div>
											</form>
											<script type="text/javascript">
												$('form[name=storelimitupdate-card]').card({
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
			</div>
		</div>
	</div>
</div>