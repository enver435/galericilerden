<body class="no-skin">
<div class="main-container ace-save-state" id="main-container">
	{literal}
		<script type="text/javascript">
			try{ace.settings.loadState('main-container')}catch(e){}
		</script>
	{/literal}

	{include file="admin/static/sidebar.tpl"}
	
	<div class="main-content">
		<div class="main-content-inner">
			<div class="breadcrumbs ace-save-state" id="breadcrumbs">
				<ul class="breadcrumb" style="margin-top: 10px;">
					<li>
						<i class="ace-icon fa fa-home home-icon"></i>
						<a href="{SITE_URL}/{SITE_ADMIN}">Ana Sayfa</a>
					</li>

					<!--<li>
						<a href="#">Other Pages</a>
					</li>
					<li class="active">Blank Page</li>-->
				</ul>
			</div>

			<div class="page-content">
				<div class="row">
					<div class="col-xs-12">
						{if getUrl(2) != 'edit'}
							<div>
								<table id="dynamic-table" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>Üye No</th>
											<th>Üye Adı Soyadı</th>
											<th>Üye Email</th>
											<th>Üye Tipi</th>
											<th></th>
										</tr>
									</thead>

									<tbody>
										{if $return.users}
											{foreach $return.users as $user}
												<tr>
													<td>{$user.id}</td>
													<td>{$user.name|capitalize} {$user.surname|capitalize}</td>
													<td>{$user.email}</td>
													<td>{if $user.user_status == 1}Bireysel{elseif $user.user_status == 2}Kurumsal{/if}</td>
													<td>
														<div class="hidden-sm hidden-xs action-buttons">
															<a class="green" href="{SITE_URL}/{SITE_ADMIN}/users/edit/{$user.id}">
																<i class="ace-icon fa fa-pencil bigger-130" title="Düzenle"></i>
															</a>

															<a class="green" href="{SITE_URL}/{SITE_ADMIN}/users/login/{$user.id}" target="_blank">
																<i class="ace-icon fa fa-sign-in bigger-130" title="Üye ile sisteme giriş yap"></i>
															</a>

															<a class="red" href="{SITE_URL}/{SITE_ADMIN}/users/delete/{$user.id}">
																<i class="ace-icon fa fa-trash-o bigger-130" title="Sil"></i>
															</a>
														</div>

														<div class="hidden-md hidden-lg">
															<div class="inline pos-rel">
																<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
																	<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
																</button>

																<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
																	<li>
																		<a href="{SITE_URL}/{SITE_ADMIN}/users/edit/{$user.id}" class="tooltip-success" data-rel="tooltip" title="Düzenle">
																			<span class="green">
																				<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																			</span>
																		</a>
																	</li>
																	<li>
																		<a href="{SITE_URL}/{SITE_ADMIN}/users/login/{$user.id}" class="tooltip-success" data-rel="tooltip" title="Düzenle" target="_blank">
																			<span class="green">
																				<i class="ace-icon fa fa-sign-in bigger-120"></i>
																			</span>
																		</a>
																	</li>
																	<li>
																		<a href="{SITE_URL}/{SITE_ADMIN}/users/delete/{$user.id}" class="tooltip-success" data-rel="tooltip" title="Düzenle">
																			<span class="red">
																				<i class="ace-icon fa fa-trash-o bigger-120"></i>
																			</span>
																		</a>
																	</li>
																</ul>
															</div>
														</div>
													</td>
												</tr>
											{/foreach}
										{/if}
									</tbody>
								</table>
							</div>
						{else}
							{if getUrl(2) == 'edit'}
								{if isset($smarty.post.save)}
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
								<form action="" method="POST">
									<div class="form-group">
										<div class="row">
											<div class="col-md-6">
												<label>Adı: </label>
												<input type="text" name="name" value="{$return.userInfo.name}" class="form-control">
											</div>
											<div class="col-md-6">
												<label>Soyadı: </label>
												<input type="text" name="surname" value="{$return.userInfo.surname}" class="form-control">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label>E-Posta: </label>
										<input type="email" name="email" value="{$return.userInfo.email}" class="form-control">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-md-4">
												<label>Cep Telefonu: </label>
												<input type="tel" id="phone" name="phone" value="{$return.userInfo.phone}" class="form-control">
											</div>
											<div class="col-md-4">
												<label>İş Telefonu: </label>
												<input type="tel" id="phone_work" name="phone_work" value="{$return.userInfo.phone_work}" class="form-control">
											</div>
											<div class="col-md-4">
												<label>Sabit Telefonu: </label>
												<input type="tel" name="phone_more" value="{$return.userInfo.phone_more}" class="form-control">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-md-6">
												<label>İl: </label>
												<select name="city" class="form-control">
													<option value="0" disabled="disabled">İl Seçin</option>
													{foreach $return.cities as $city}
														<option value="{$city.CityID}" {if $return.userInfo.city == $city.CityID}selected="selected"{/if} data-plate="{$city.PlateNo}">{$city.CityName}</option>
													{/foreach}
												</select>
											</div>
											<div class="col-md-6">
												<label>İlçe: </label>
												<select name="county" class="form-control">
													<option value="0" disabled="disabled">İlçe Seçin</option>
												</select>
											</div>
										</div>
									</div>
									{if $return.userInfo.user_status == 2}
										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>Vergi Dairesi: </label>
													<select name="taxs" class="form-control" disabled="disabled"></select>
												</div>
												<div class="col-md-6">
													<label>Vergi Numarası: </label>
													<input type="number" id="taxno" name="tax_no" value="{$return.userInfo.tax_no}" class="form-control">
												</div>
											</div>
										</div>
									{/if}
									<div class="form-group">
										<label>Adres Detayı: </label>
										<textarea name="address" cols="30" rows="5" class="form-control">{$return.userInfo.address}</textarea>
									</div>
									{if $return.userInfo.user_status == 2}
										<div class="form-group">
											<label>Faaliyet Alanı: </label>
											<select name="activity_area" class="form-control">
												<option value="1" {if $return.userInfo.activity_area == 1}selected="selected"{/if}>Galeri</option>
												<option value="2" {if $return.userInfo.activity_area == 2}selected="selected"{/if}>Yetkili Bayi</option>
												<option value="3" {if $return.userInfo.activity_area == 3}selected="selected"{/if}>Üretici Firma</option>
											</select>
										</div>
										<div class="form-group radio-primary">
											<label>İşletme Türü: </label>
											<div class="radio">
			                                    <label>
			                                    	<input type="radio" name="business_type" value="1" {if $return.userInfo.business_type == 1}checked="checked"{/if} class="ace">
			                                    	<span class="lbl">Şahıs Şirketi</span>
			                                    </label>
				                            </div>
				                            <div class="radio">
			                                    <label>
			                                    	<input type="radio" name="business_type" value="2" {if $return.userInfo.business_type == 2}checked="checked"{/if} class="ace">
			                                   		<span class="lbl">Limited veya Anonim Şirketi</span>
			                                    </label>
				                            </div>
										</div>
										<div class="form-group business_type_2" {if $return.userInfo.business_type == 2}style="display: block;"{else}style="display: none;"{/if}>
											<label>Ticari Ünvan: </label>
											<input type="text" name="commercial_title" value="{$return.userInfo.commercial_title}" placeholder="Ticari Ünvan" class="form-control">
										</div>
									{/if}
									<div class="form-group business_type_1">
										<label>TC Kimlik No: </label>
										<input id="tc" type="text" name="tc" maxlength="11" placeholder="{$return.userInfo.tc}" class="form-control" value="{$return.userInfo.tc}">
									</div>
									<div class="form-group">
										<label>Şifre (Boş bırakırsanız aynı şifrede kalır): </label>
										<input type="pass" name="pass" class="form-control">
									</div>
									<button type="submit" name="save" class="btn btn-primary pull-right">Kaydet</button>
								</form>
								{literal}
									<script type="text/javascript">
										$(function() {

											var countyID = {/literal}{$return.userInfo.county}{literal};

											$.ajax({
												type: 'POST',
												url: siteUrl + '/request',
												dataType: 'json',
												data: {'mode': 'getCounties', 'cityId': {/literal}{$return.userInfo.city}{literal}},
												success: function(response)
												{

													var options = '<option value="0" disabled="disabled">İlçe Seçin</option>';

													$.each(response, function(i, value) {
														
														if(countyID == value.CountyID)
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

											var plateNo = $('option:selected', this).attr('data-plate');
											var tax     = {/literal}{$return.userInfo.tax}{literal};

											$.ajax({
												type: 'POST',
												url: siteUrl + '/request',
												dataType: 'json',
												data: {'mode': 'getTaxs', 'plateNo': plateNo},
												success: function(response)
												{

													var options = '';

													$.each(response, function(i, value) {
														if(value.id == tax)
														{
															options += '\
																<option value="' + value.id + '" selected="selected">' + value.daire + '</option>\
															';
														}
														else
														{
															options += '\
																<option value="' + value.id + '">' + value.daire + '</option>\
															';
														}
													});

													$('select[name=taxs]').html(options).removeAttr('disabled', true);
													
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
																<option value="' + value.CountryID + '">' + value.CountyName + '</option>\
															';
														});

														$('select[name=county]').html(options).removeAttr('disabled', true);
														
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
										});
									</script>
								{/literal}
							{/if}
						{/if}
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="footer">
		<div class="footer-inner">
			<div class="footer-content">
				<span class="bigger-120">
					<span class="blue bolder">Galericilerden</span>
					&copy; 2016-2017
				</span>
			</div>
		</div>
	</div>

	<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
		<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
	</a>
</div>