<div id="main">
	{include file="header.tpl"}
	<div class="page-content">
		<div class="container">
			{if $return.userInfo.user_status == 1}
				{if $return.adsLimit < $return.userTypeAdsLimit || $return.userInfo.adAddShow == 1}
					{include file="ad-add-content.tpl"}
		        {else}
		        	<div class="block">
			        	<div class="block-title">
			        		<h5>Yıllık ilan verme limitiniz dolmuş</h5>
			        	</div>
		        		<div class="block-content">
			        		<div class="text-center">
								<i class="material-icons" style="margin-bottom: 25px;font-size: 100px;color: #ff263a;">close</i>
								<p style="font-weight: 500;">Yıllık ilan limitiniz dolmuş.</p>
								<p style="font-weight: 500;">Yinede ilan vermek istermisiniz ? O zaman ödeme yapıp yeniden ilan vere bilirsiniz!</p>
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
		        {/if}
			{elseif $return.userInfo.user_status == 2}
				{if $return.adAdd === true AND $return.endTimeStore === false AND $return.endLimitStore === false AND $return.endTimeStoreAdmin === false AND $return.endStoreLimitAdmin === false AND $return.createNewStore === false}
					{include file="ad-add-content.tpl"}
				{/if}
	
				<div class="step-content">
					{if $return.adAdd === false AND $return.storeCloseAdmin === true}
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
					{elseif $return.adAdd === false AND $return.createNewStore === true}
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
					{elseif $return.adAdd === false AND $return.endTimeStore === true}
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
					{elseif $return.adAdd === false AND $return.endTimeStoreAdmin === true}
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
					{elseif $return.adAdd === false AND $return.endStoreLimitAdmin === true}
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
					{elseif $return.adAdd === false AND $return.endLimitStore === true}
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
					{elseif $return.adAdd === false AND $return.userStore === false}
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
		</div>
	</div>
</div>
