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
					<li class="active">
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
			
			<h4 class="hidden-lg hidden-md" style="margin-bottom: 25px;">Üyeliğim</h4>
			{if isset($smarty.post.save)}
				{if $return.messageType == 'success'}
					<div class="alert alert-success">
						<strong>Başarılı!</strong> {$return.message}
					</div>
				{elseif $return.messageType == 'error'}
					<div class="alert alert-danger">
						<strong>Başarısız!</strong> {$return.message}
					</div>
				{/if}
			{/if}
			<div class="block default-block my-info">
				<div class="block-title hidden-sm hidden-xs">
					<h5>Üyeliğim</h5>
				</div>
				<div class="block-content">
					<form action="" method="POST">
						<input type="hidden" name="save" value="save">
						<div class="col-md-6 col-md-offset-3">
							<div class="row">
								<div class="col-md-6 col-xs-12">
									<div class="form-group">
										<label>Ad: </label>
										<input type="text" name="name" value="{$return.userInfo.name}" required="required" class="form-control">
									</div>
								</div>
								<div class="col-md-6 col-xs-12">
									<div class="form-group">
										<label>Soyad: </label>
										<input type="text" name="surname" value="{$return.userInfo.surname}" required="required" class="form-control">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>E-Posta: </label>
								<input type="email" name="email" value="{$return.userInfo.email}" required="required" class="form-control">
							</div>
							<div class="form-group">
								<label>Cep Telefonu: </label>
								<input id="phone" type="text" name="phone" value="{$return.userInfo.phone}" required="required" class="form-control">
							</div>
							<div class="form-group">
								<label>İş Telefonu:</label>
								<input id="phone_work" type="text" name="phone_work" value="{$return.userInfo.phone_work}" placeholder="İş Telefonu" class="form-control">
							</div>
							<div class="form-group">
								<label>Sabit Telefon:</label>
								<input id="phone_more" type="text" name="phone_more" value="{$return.userInfo.phone_more}" placeholder="Sabit Telefon" class="form-control">
							</div>
							<div class="form-group">
								<label>İl: </label>
								<select name="city" class="form-control">
									<option value="0" disabled="disabled" selected="selected">İl Seçin</option>
									{foreach $return.cities as $cities}
										<option value="{$cities.CityID}" {if $return.userInfo.city == $cities.CityID}selected="selected"{/if} data-plate="{$cities.PlateNo}">{$cities.CityName}</option>
									{/foreach}
								</select>
							</div>
							<div class="form-group">
								<label>İlçe: </label>
								<select name="counties" class="form-control" disabled="disabled">İlçe Seçin</select>
							</div>
							<div class="form-group">
								<label>Adres Detayı: </label>
								<textarea name="address" cols="30" rows="5" class="form-control">{$return.userInfo.address}</textarea>
							</div>

							{if $return.userInfo.user_status == 2}
								<div class="form-group">
									<label>Faaliyet Alanınız: </label>
									<select name="activity_area" disabled="disabled" class="form-control">
										<option value="1" {if $return.userInfo.activity_area == 1}selected="selected"{/if}>Galeri</option>
										<option value="2" {if $return.userInfo.activity_area == 2}selected="selected"{/if}>Yetkili Bayi</option>
										<option value="3" {if $return.userInfo.activity_area == 3}selected="selected"{/if}>Üretici Firma</option>
									</select>
								</div>
								<div class="form-group radio-primary">
									<label>İşletme Türü: </label>
									<div class="radio">
		                                <input type="radio" name="business_type" value="1" {if $return.userInfo.business_type == 1}checked="checked"{/if} class="magic-radio">
		                                <label>Şahıs Şirketi</label>
		                            </div>
		                            <div class="radio">
		                                <input type="radio" name="business_type" value="2" {if $return.userInfo.business_type == 2}checked="checked"{/if} class="magic-radio">
		                                <label>Limited veya Anonim Şirketi</label>
		                            </div>
								</div>
								<div class="form-group business_type_1" {if $return.userInfo.business_type == 1}style="display: block;"{else}style="display: none;"{/if}>
									<label>TC Kimlik No: </label>
									<input id="tc" type="text" name="tc" maxlength="11" value="{$return.userInfo.tc}" placeholder="TC Kimlik No" class="form-control">
								</div>
								<div class="form-group business_type_2" {if $return.userInfo.business_type == 2}style="display: block;"{else}style="display: none;"{/if}>
									<label>Ticari Ünvan: </label>
									<input type="text" name="commercial_title" value="{$return.userInfo.commercial_title}" placeholder="Ticari Ünvan" class="form-control">
								</div>
								<div class="form-group">
									<label>Vergi Dairesi: </label>
									<select name="taxs" class="form-control" disabled="disabled"></select>
								</div>
								<div class="form-group">
									<label>Vergi Numarası: </label>
									<input type="text" id="taxno" name="tax_no" value="{$return.userInfo.tax_no}" class="form-control">
								</div>
							{/if}

							<div class="form-group">
								<div class="alert alert-info">Şifre alanını boş bırakırsanız şifreniz değişmez</div>
								<label>Şifre: </label>
								<input type="password" name="pass" placeholder="******" class="form-control">
							</div>
						</div>
					</form>
					<script type="text/javascript" src="{siteUrl('public/scripts/jquery.maskedinput.min.js')}"></script>
					{literal}
						<script type="text/javascript">
							$(function() {

								var cityId   = {/literal}{$return.userInfo.city}{literal};
								var countyId = {/literal}{$return.userInfo.county}{literal};
								var taxId    = {/literal}{$return.userInfo.tax}{literal};
								var plateNo  = $('select[name=city] option:selected').attr('data-plate');

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
												<option value="' + value.CountyID + '" ' + ((value.CountyID == countyId) ? 'selected="selected"' : null) + '>' + value.CountyName + '</option>\
											';
										});

										$('select[name=counties]').html(options).removeAttr('disabled', true);
										
									}
								});

								$.ajax({
									type: 'POST',
									url: siteUrl + '/request',
									dataType: 'json',
									data: {'mode': 'getTaxs', 'plateNo': plateNo},
									success: function(response)
									{

										var options = '';

										$.each(response, function(i, value) {
											options += '\
												<option value="' + value.id + '" ' + ((value.id == taxId) ? 'selected="selected"' : null) + '>' + value.daire + '</option>\
											';
										});

										$('select[name=taxs]').html(options).removeAttr('disabled', true);
										$('input[name=tax_no]').html(options).removeAttr('disabled', true);
										
									}
								});

								$('select[name=city]').change(function() {

									var cityId  = $(this).val();
									var plateNo = $('option:selected', this).attr('data-plate'); 

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

											$('select[name=counties]').html(options).removeAttr('disabled', true);
											
										}
									});

									$.ajax({
										type: 'POST',
										url: siteUrl + '/request',
										dataType: 'json',
										data: {'mode': 'getTaxs', 'plateNo': plateNo},
										success: function(response)
										{

											var options = '';

											$.each(response, function(i, value) {
												options += '\
													<option value="' + value.id + '">' + value.daire + '</option>\
												';
											});

											$('select[name=taxs]').html(options).removeAttr('disabled', true);
											$('input[name=tax_no]').html(options).removeAttr('disabled', true);
											
										}
									});
								});

								$('input[name=business_type]').change(function() {
									
									if($('input[name=business_type]:checked').val() == 2)
									{
										$('.form-group.business_type_2').show();
									}
									else
									{
										$('.form-group.business_type_2').hide();
									}

								});

								$("#phone, #phone_work").mask("0 (999) 999 99 99");
								$("#phone_more").mask("0(999) 999 99 99");
								$("#tc").mask("99999999999");
								$("#taxno").mask("9999999999");
							});
						</script>
					{/literal}
				</div>
			</div>
			<button type="button" onclick="{literal}$('form').submit();{/literal}" class="btn btn-primary pull-right" style="padding: 10px 50px;">Kaydet</button>
		</div>
	</div>
</div>