<div class="steps hidden-xs">
	<ul>
        <li class="step-one active"><i class="step">1</i>
            <h6>İLAN BİLGİLERİ</h6>
            <span id="spGeneral" class="active">
                <img src="{siteUrl('public/images/spacer.png')}" width="7" height="14" alt="Arrow" class="arrow">
                <a id="hlGeneral">Kategori Seçimi</a>
            </span>
            <span id="spAddress" {if $smarty.post.step == 2 || $smarty.post.step == 'completed'}class="active"{/if}>
                <img src="{siteUrl('public/images/spacer.png')}" width="7" height="14" alt="Arrow" class="arrow">
                <a id="hlAddress">İlan Bilgileri</a>
            </span>
        </li>
        <li id="liDoping" class="step-two {if $smarty.post.step == 'completed'}active{/if}"><i class="step">2</i>
            <h6>ÖNİZLEME</h6> 
            <span {if $smarty.post.step == 'completed'}class="active"{/if}><img src="{siteUrl('public/images/spacer.png')}" width="7" height="14" alt="Arrow" class="arrow">
            	<a>İlanını Önizle</a>
            </span>
        </li>
        <li id="liDoping" class="step-three {if $smarty.post.step == 'completed'}active{/if}"><i class="step">3</i>
            <h6>ÖNE ÇIKARMA SEÇENEKLERİ</h6> 
            <span {if $smarty.post.step == 'completed'}class="active"{/if}><img src="{siteUrl('public/images/spacer.png')}" width="7" height="14" alt="Arrow" class="arrow">
            	<a>Öne Çıkarma Seçeneği Satın Al (Opsiyonel)</a>
            </span>
        </li>
        <li id="liConfirm" class="step-four {if $smarty.post.step == 'completed'}active{/if}"><i class="step">4</i>
            <h6>İLAN ONAYI</h6>
            <span {if $smarty.post.step == 'completed'}class="active"{/if}>
            	<img src="{siteUrl('public/images/spacer.png')}" width="7" height="14" alt="Arrow" class="arrow">
            	<a>Kaydet ve Yayınla</a>
            </span>
        </li>
    </ul>
</div>
<div class="alert alert-info">
	<strong>Bilgi: </strong> Verdiğiniz ilan {$return.month} tarihinde yani 1 ay sonra bitecektir.
</div>
<div class="step-content">
	{if !isset($smarty.post.completed)}
    	{if !$smarty.post.step AND $smarty.session.step == 1}
    		<div class="mobile-categories" style="margin-bottom: 20px;">
    			<button type="button" class="btn btn-primary" style="width: 100px;padding-left: 0;margin-bottom: 20px;"><i class="material-icons">keyboard_arrow_left</i> Geri</button>
    			<div class="alert alert-info"><strong>Kategori seçiniz</strong></div>
    		</div>
    		<form action="" method="POST">
            	<div class="categories">
	            	<div class="row">
	            		<input type="hidden" name="step" value="2">
	            		<input type="hidden" name="category_1" value="">
	            		<input type="hidden" name="category_2" value="">
	            		<input type="hidden" name="category_3" value="">
	            		<input type="hidden" name="category_4" value="">
	            		<input type="hidden" name="category_5" value="">
	            		<input type="hidden" name="category_6" value="">
	            		<input type="hidden" name="category_7" value="">
	            		<input type="hidden" name="category_8" value="">
	            		<input type="hidden" name="category_9" value="">
	            		<input type="hidden" name="category_10" value="">
		            	<div class="category category_1 col-md-3 col-xs-12">
		            		<div class="list-group scrollable-menu">
			            		{foreach $return.categories as $category}
									<a href="javascript:void(0)" class="list-group-item" category-id="{$category.Id}" category-level="1"><span>{$category.kategori_adi}</span> <i class="material-icons">keyboard_arrow_right</i></a>
			            		{/foreach}
		            		</div>
		            	</div>
		            	<div class="category category_2"></div>
		            	<div class="category category_3"></div>
		            	<div class="category category_4"></div>
		            	<div class="category category_5"></div>
		            	<div class="category category_6"></div>
		            	<div class="category category_7"></div>
		            	<div class="category category_8"></div>
		            	<div class="category category_9"></div>
		            	<div class="category category_10"></div>
	            	</div>
	            	{literal}
		            	<script type="text/javascript">
		            		$(function() {

		            			var categoryStep = 0;

		            			$(document).on('click', '.list-group .list-group-item', function() {
		            				
		            				$(this).parent().find('.list-group-item').removeClass('active');
		            				$(this).addClass('active');

		            				var categoryId   = $(this).attr('category-id');
		            				categoryStep = $(this).parent().parent().attr('class').split(' ')[1].split('category_')[1];
		            				$('.categories input[name=category_' + categoryStep + ']').val(categoryId);
		            				$('.mobile-categories .alert.alert-info strong').text($('span', this).text());

		            				categoryStep = parseInt(categoryStep) + 1;

		            				for(var i = categoryStep; i < 10; i++)
		            				{
		            					$('.categories .category_' + i).html('');
		            					$('.categories .category_' + i).removeClass('col-md-3').removeClass('col-xs-12');
		            					$('.categories input[name=category_' + i + ']').val('');
		            				} 

		            				if(categoryId != '')
		            				{
		            					$.ajax({
		            						type: 'POST',
		            						url: siteUrl + '/request',
		            						dataType: 'json',
		            						data: {'mode': 'getCategory', 'categoryId': categoryId},
		            						success: function(response)
		            						{
		            							var list = '';

		            							if(response != null)
		            							{
		            								list += '<div class="list-group scrollable-menu">';
			            								$.each(response.categorys, function(i, value) {
			            									list += '\
			            										<a href="javascript:void(0)" class="list-group-item" category-id="' + value.Id + '" category-level="' + categoryStep + '"><span>' + value.kategori_adi + '</span> <i class="material-icons">keyboard_arrow_right</i></a>\
			            									';
			            								});
		            								list += '</div>';

		            								$('.categories .category_' + categoryStep).html(list);
		            							}
		            							else
		            							{
		            								$('.categories .category_' + categoryStep).html('\
		            									<div class="category-success">\
		            										<i class="material-icons">done</i>\
		            										<p>Kategori seçimi tamamlandı</p>\
		            										<button type="submit" name="getStep" class="btn btn-primary" style="width: 50%;">Devam Et</button>\
		            									</div>\
	            									');
		            							}

		            							$('.categories .category_' + categoryStep).addClass('col-md-3').addClass('col-xs-12');

		            							var leftPos = $('.categories').scrollLeft();
		            							var blockWidth = $('.categories .category').width() + 33;
	            								$(".categories").animate({scrollLeft: leftPos + blockWidth}, 500);
		            						}
		            					});
		            				}

		            			});

		            			$('.mobile-categories button').click(function() {
		            				
		            				if(categoryStep > 1)
		            				{
		            					$('.categories .category_' + categoryStep).html('');
		            					$('.categories .category_' + categoryStep).removeClass('col-md-3').removeClass('col-xs-12');
		            					$('.categories input[name=category_' + categoryStep + ']').val('');

		            					var leftPos = $('.categories').scrollLeft();
            							var blockWidth = $('.categories .category_' + categoryStep).width() + 42;
        								$(".categories").animate({scrollLeft: leftPos - blockWidth}, 500);

        								categoryStep -= 1;

        								$('.mobile-categories .alert.alert-info strong').text($('.categories .category_' + categoryStep + ' .list-group-item.active span').text());
		            				}

		            			});

		            		});
		            	</script>
	            	{/literal}
            	</div>
        	</form>
    	{elseif $smarty.post.step == 2 AND !$smarty.session.step}
			<div class="ad-info-step">
				<form name="ad-add" action="" method="POST">
					<div class="hidden-inputs">
						<input type="hidden" name="dopings" value="">
						<input type="hidden" name="dopingsPrice" value="">
						<input type="hidden" name="getStep" value="completed">
						<input type="hidden" name="step" value="completed">
						<input type="hidden" name="postToken" value="{$smarty.session.postToken}">
						<input type="hidden" name="category_1" data-name="{categoryInfo($smarty.post.category_1, 'kategori_adi')}" value="{$smarty.post.category_1}">
	            		<input type="hidden" name="category_2" data-name="{categoryInfo($smarty.post.category_2, 'kategori_adi')}" value="{$smarty.post.category_2}">
	            		<input type="hidden" name="category_3" data-name="{categoryInfo($smarty.post.category_3, 'kategori_adi')}" value="{$smarty.post.category_3}">
	            		<input type="hidden" name="category_4" data-name="{categoryInfo($smarty.post.category_4, 'kategori_adi')}" value="{$smarty.post.category_4}">
	            		<input type="hidden" name="category_5" data-name="{categoryInfo($smarty.post.category_5, 'kategori_adi')}" value="{$smarty.post.category_5}">
	            		<input type="hidden" name="category_6" data-name="{categoryInfo($smarty.post.category_6, 'kategori_adi')}" value="{$smarty.post.category_6}">
	            		<input type="hidden" name="category_7" data-name="{categoryInfo($smarty.post.category_7, 'kategori_adi')}" value="{$smarty.post.category_7}">
	            		<input type="hidden" name="category_8" data-name="{categoryInfo($smarty.post.category_8, 'kategori_adi')}" value="{$smarty.post.category_8}">
	            		<input type="hidden" name="category_9" data-name="{categoryInfo($smarty.post.category_9, 'kategori_adi')}" value="{$smarty.post.category_9}">
	            		<input type="hidden" name="category_10" data-name="{categoryInfo($smarty.post.category_10, 'kategori_adi')}" value="{$smarty.post.category_10}">
					</div>
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
												<input type="radio" name="phone_status" value="1" checked="checked" class="magic-radio">
												<label>İlanda telefon numaram yayınlansın</label>
											</div>
											<div class="radio" style="margin-bottom: 25px;">
												<input type="radio" name="phone_status" value="0" class="magic-radio">
												<label>İlanda telefon numaram yayınlanmasın</label>
											</div>
											<div class="radio">
												<input type="checkbox" name="message_status" value="0" class="magic-checkbox">
												<label>Diğer kullanıcılardan mesaj almak istemiyorum</label>
											</div>
										</div>
										<div class="contact-information col-md-6">
											<div class="row">
												<div class="inf">
													<div class="col-xs-6">
														<strong>Ad Soyad</strong>
													</div>
													<div class="col-xs-6"><span class="text-capitalize">{userInfo($smarty.session.userId, 'name')}</span> <span class="text-uppercase">{userInfo($smarty.session.userId, 'surname')}</span></div>
												</div>
												<div class="inf">
													<div class="col-xs-6">
														<strong>Cep Telefonu</strong>
													</div>
													<div class="col-xs-6">{userInfo($smarty.session.userId, 'phone')}</div>
												</div>
												{if userInfo($smarty.session.userId, 'phone_work')}
													<div class="inf">
														<div class="col-xs-6">
															<strong>İş Telefonu</strong>
														</div>
														<div class="col-xs-6">{userInfo($smarty.session.userId, 'phone_work')}</div>
													</div>
												{/if}
												{if userInfo($smarty.session.userId, 'phone_more')}
													<div class="inf">
														<div class="col-xs-6">
															<strong>Sabit Telefon</strong>
														</div>
														<div class="col-xs-6">{userInfo($smarty.session.userId, 'phone_more')}</div>
													</div>
												{/if}
												<div class="inf" style="padding-left: 15px;">
													<a href="{siteUrl('my-info')}" style="padding: 0;">İletişim bilgilerini değiştir</a>
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
												<div class="form-group">
													<label>İlan Başlığı*: </label>
													<input type="text" name="ad_name" class="form-control">
												</div>
											</div>
											<div class="col-md-4 col-sm-5 col-xs-12">
												<div class="row">
													<div class="col-xs-6">
														<div class="form-group">
															<label>İlan Fiyatı*: </label>
															<input type="number" name="ad_price" class="form-control">
														</div>
													</div>
													<div class="col-xs-6">
														<div class="form-group">
															<label>Fiyat türü*: </label>
															<select name="price_type" class="form-control">
																<option value="0">TL</option>
																<option value="1">EUR</option>
																<option value="2">USD</option>
															</select>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label>İlan Açıklaması: </label>
										<textarea name="ad_text" id="default-editor" cols="30" rows="10"></textarea>
									</div>
									<div class="category-items">{$return.categoryModulItems}</div>
									<div class="category-features">{$return.categoryFeatures}</div>
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
																<option value="{$city.CityID}">{$city.CityName}</option>
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
											<div id="map-canvas" style="width: 100%;height: 100%;display: none;"></div>
											<div class="map-message"></div>
											<input id="zoomFld" type="hidden" name="zoom" value="5">
											<input id="latFld" type="hidden" name="lat" value="">
											<input id="lngFld" type="hidden" name="lng" value="">
											<input id="markerLatFld" type="hidden" name="markerlat" value="">
											<input id="markerLngFld" type="hidden" name="markerlng" value="">
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

											        $(function() {

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
						<input type="hidden" name="ad-title-image" value="">
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
									<div class="uploaded-images"></div>
									
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
				<div class="alertRow"></div>
				<button type="button" name="getPreview" class="btn btn-primary pull-right" style="padding: 10px 50px;" onclick="getPreview();">Devam Et</button>
			</div>
			<div class="ad-preview-step">
				<div class="message-panel">
					<p>
						İlanınızla ilgili aşağıdaki bilgiler doğruysa "Devam Et" butonunu tıklayıp bir sonraki aşamaya geçin.
						<br>
						Değilse “Düzenle” butonunu tıklayın.
					</p>
					<div class="buttons" style="margin-bottom: 25px;text-align: center;">
						<button type="button" onclick="prevPreview();" class="btn btn-primary">Düzenle</button>
						<button type="button" onclick="getDoping(1);" class="btn btn-primary">Devam Et</button>
					</div>
				</div>

				<div class="ad-detail">
					<div class="block-title" style="margin-bottom: 25px;">
						<h5>İlan Önizlemesi</h5>
					</div>
					<div class="row">
						<div class="col-md-5">
							<h4 class="ad-title" style="margin-bottom: 25px;"></h4>
							<div class="ad-detail-block">
								<div class="ad-images-title"></div>
								<div class="mobile-ad-view hidden-lg hidden-md">
									<div class="list-bottom">
										<div class="row">
											<div class="col-xs-6" style="padding: 10px;line-height: 35px;" onclick="showText();">
												<span>Açıklama</span>
											</div>
											<div class="col-xs-6" style="padding: 10px;line-height: 17px;" onclick="{literal}showLocation(parseFloat($('#markerLatFld').val()), parseFloat($('#markerLngFld').val()), parseInt($('#zoomFld').val()));{/literal}">
												<span>Konum</span><br>
												<small style="font-size: 10px;"><span class="text-capitalize"></span>, <span class="text-capitalize"></span></small>
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
											<div class="texts" style="padding-bottom: 15px;"></div>
										</div>
									</div>
									<div class="mobile-ad-user">
										<div class="left col-xs-4">
											<a href="javascript:;" data-toggle="modal" data-target="#phonesModal" style="padding: 0;">
												<i class="material-icons">phone</i> Ara
											</a>
										</div>
										<div class="center col-xs-4 text-capitalize">
											{if $return.userStore === false}
												<a href="#" style="padding: 0;">
													{userInfo($smarty.session.userId, 'name')} {userInfo($smarty.session.userId, 'surname')}
												</a>
											{else}
												<a href="http://{$return.userStore.store_domain}{$return.siteConfig.siteStoreDomain}" style="padding: 0;" target="_blank">
													{$return.userStore.store_name|upper}
												</a>
											{/if}
										</div>
										<div class="right col-xs-4">
											<i class="material-icons">message</i> Soru Sor
										</div>
									</div>
									<div class="mobile-location">
										<ul>
											<li class="city text-capitalize"></li><li class="county text-capitalize"></li><li class="neighborhood text-capitalize"></li>
										</ul>
										<div class="share-buttons" style="text-align: center;">
											<ul>
												<li>
													<a href="javascript:;">
														<img src="{siteUrl('public/images/facebook.svg')}" width="32" height="32" alt="facebook">
													</a>
												</li>
												<li>
													<a href="javascript:;">
														<img src="{siteUrl('public/images/twitter.svg')}" width="32" height="32" alt="twitter">
													</a>
												</li>
												<li>
													<a href="javascript:;">
														<img src="{siteUrl('public/images/google-plus.svg')}" width="32" height="32" alt="google plus">
													</a>
												</li>
												<li>
													<a href="javascript:;">
														<img src="{siteUrl('public/images/pinterest.svg')}" width="32" height="32" alt="pinterest">
													</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="ad-thumb-images">
									<div class="swiper-container">
								        <div class="swiper-wrapper"></div>
									    <!-- Add Pagination -->
								        <div class="swiper-pagination"></div>

								        <div class="swiper-button-prev"></div>
	    								<div class="swiper-button-next"></div>
							    	</div>
								</div>
								
								<link rel="stylesheet" href="{siteUrl('public/styles/swiper.min.css')}">
								<script type="text/javascript" src="{siteUrl('public/scripts/lightgallery-all.min.js')}"></script>
								<script type="text/javascript" src="{siteUrl('public/scripts/swiper.min.js')}"></script>

							</div>
						</div>
						<div class="col-md-4">
							<div class="ad-detail-block">
								<font color="#ff0000">
									<h4 class="ad-price"></h4>
								</font>
								<div class="ad-location">
									<ul>
										<li class="city text-capitalize"></li> / <li class="county text-capitalize"></li><li class="neighborhood text-capitalize"></li>
									</ul>
								</div>
								<div class="ad-details">
									<ul>
										<li>
											<strong class="detail-list-title">İlan No: </strong>
											<span class="detail-list-value">1000</span>
										</li>
										<li>
											<strong class="detail-list-title">İlan Tarihi: </strong>
											<span class="detail-list-value">{$smarty.now|date_format:"%d"} {monthName()} {$smarty.now|date_format:"%Y"}</span>
										</li>
										<div class="appended"></div>
									</ul>
								</div>
							</div>
						</div>
						{if $return.categoryFeatures}
							<div class="mobile-features col-sm-12 col-xs-12 hidden-lg hidden-md">
								<div class="ad-detail-block" style="margin-top: 25px;">
									<div id="ad-features2"></div>
								</div>
							</div>
						{/if}
						<div class="col-md-3 hidden-sm hidden-xs">
							<div class="share-buttons">
								<ul>
									<li>
										<a href="javascript:;">
											<img src="{siteUrl('public/images/facebook.svg')}" width="32" height="32" alt="facebook">
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<img src="{siteUrl('public/images/twitter.svg')}" width="32" height="32" alt="twitter">
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<img src="{siteUrl('public/images/google-plus.svg')}" width="32" height="32" alt="google plus">
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<img src="{siteUrl('public/images/pinterest.svg')}" width="32" height="32" alt="pinterest">
										</a>
									</li>
								</ul>
							</div>
							<div class="ad-detail-block" style="margin-top: 15px;">
								{if $return.userStore === false}
									<div class="ad-user text-capitalize">
										{userInfo($return.adInfo.user_id, 'name')} {userInfo($return.adInfo.user_id, 'surname')}
									</div>
								{else}
									<div class="ad-user" style="overflow: hidden;">
										<div class="storeDetail">
											<div class="certificate">
												<img src="{siteUrl('public/images/certificate.svg')}" width="35" alt="certificate">
												<span>{$return.userStore.end_time|date_format:"%Y" - $return.userStore.create_time|date_format:"%Y"}.YIL</span>
											</div>
											<img src="{siteUrl('files/store/thumb')}/{$return.userStore.store_logo}.jpg" width="110" class="storeLogo" alt="{$return.userStore.store_name}">
											<h3>
												<a href="http://{$return.userStore.store_domain}{$return.siteConfig.siteStoreDomain}">{$return.userStore.store_name|upper}</a>
											</h3>
										</div>
									</div>
								{/if}

								<div class="user-phones">
									<ul>
										<li>
											<a href="tel:{userInfo($smarty.session.userId, 'phone')}" title="Cep Telefonu">
												<i class="material-icons">phone</i> {userInfo($smarty.session.userId, 'phone')}
											</a>
										</li>
										{if userInfo($smarty.session.userId, 'phone_work') != ''}
											<li>
												<a href="tel:{userInfo($smarty.session.userId, 'phone_work')}" title="İş Telefonu">
													<i class="material-icons">phone</i> {userInfo($smarty.session.userId, 'phone_work')}
												</a>
											</li>
										{/if}
										{if userInfo($smarty.session.userId, 'phone_more') != ''}
											<li>
												<a href="tel:{userInfo($smarty.session.userId, 'phone_more')}" title="Sabit Telefon">
													<i class="material-icons">phone</i> {userInfo($smarty.session.userId, 'phone_more')}
												</a>
											</li>
										{/if}
									</ul>
								</div>
								<div class="detail-bottom">
									<a href="#" class="send-message"><i class="material-icons">message</i> İlan Sahibine Mesaj Gönder</a>
									<a href="#"><i class="material-icons">directions_car</i> Tüm İlanları</a>
									<a href="#"><i class="material-icons">star</i> İlanı Favorilerime Ekle</a>
								</div>
							</div>
							<!--<button type="button" class="btn btn-primary" style="width: 100%;padding: 10px;">Vasıta Alırken Bunlara Dikkat Edin</button>-->
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 hidden-sm hidden-xs">
							<div class="ad-tabs">
								<div class="ad-detail-block" style="margin-top: 25px;">
									<ul class="nav nav-tabs">
										<li class="active"><a data-toggle="tab" href="#ad-texts">Açıklama</a></li>
										{if $return.categoryFeatures}
									  		<li><a data-toggle="tab" href="#ad-features">Özellikler</a></li>
									  	{/if}
									  	<li><a id="ad-map" data-toggle="tab" href="#ad-location">Konum</a></li>
									  	<li><a data-toggle="tab" href="#kredi">Kredi / Finansman Teklifleri</a></li>
									</ul>

									<div class="tab-content">
										<div id="ad-texts" class="tab-pane fade in active"></div>
										{if $return.categoryFeatures}
										  	<div id="ad-features" class="tab-pane fade"></div>
									  	{/if}
									  	<div id="ad-location" class="tab-pane fade">
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

													    if($('#markerLatFld').val() != '' && $('#markerLngFld').val() != '')
													    {
													        var markerPreview = new google.maps.Marker({
													            position: location, 
													            map: mapPreview,
													            icon: siteUrl + "/public/images/mapIcon.png"
													        });

													        // add marker in markers array
													        markersArrayPreview.push(markerPreview);
													    }

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
													    initMapPreview('ad-detail-map', parseFloat($('#markerLatFld').val()), parseFloat($('#markerLngFld').val()), parseInt($('#zoomFld').val()));

													    $('.ad-detail #ad-detail-map').css({'pointer-events': 'all'});
													});

													$('.ad-detail .ad-tabs .nav li a:not(#ad-map)').click(function() {
														$('.ad-detail #ad-detail-map').css({'pointer-events': 'none'});
													});
									  			</script>
									  		{/literal}
									  	</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="message-panel" style="margin-top: 25px;">
					<p>
						İlanınızla ilgili aşağıdaki bilgiler doğruysa "Devam Et" butonunu tıklayıp bir sonraki aşamaya geçin.
						<br>
						Değilse “Düzenle” butonunu tıklayın.
					</p>
					<div class="buttons" style="margin-bottom: 25px;text-align: center;">
						<button type="button" onclick="prevPreview();" class="btn btn-primary">Düzenle</button>
						<button type="button" onclick="getDoping(1);" class="btn btn-primary">Devam Et</button>
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
						          			<strong class="text-center" style="display: block;">{userInfo($smarty.session.userId, 'name')|capitalize} {userInfo($smarty.session.userId, 'surname')|capitalize}</strong>
						          		{else}
						          			<strong class="text-center" style="display: block;">{$return.userStore.store_name|upper}</strong>
						          		{/if}
						          	</div>
						          	<div class="modal-bottom">
						          		<ul>
						          			{if userInfo($smarty.session.userId, 'phone') != ''}
							          			<li>
							          				<a href="tel:{userInfo($smarty.session.userId, 'phone')}">
							          					<strong>Cep</strong>
							          					<strong>{userInfo($smarty.session.userId, 'phone')}</strong>
							          				</a>
							          			</li>
						          			{/if}
						          			{if userInfo($smarty.session.userId, 'phone_work') != ''}
							          			<li>
							          				<a href="tel:{userInfo($smarty.session.userId, 'phone_work')}">
								          				<strong>İş</strong>
								          				<strong>{userInfo($smarty.session.userId, 'phone_work')}</strong>
							          				</a>
							          			</li>
						          			{/if}
						          			{if userInfo($smarty.session.userId, 'phone_more') != ''}
							          			<li>
							          				<a href="tel:{userInfo($smarty.session.userId, 'phone_more')}">
								          				<strong>Sabit</strong>
								          				<strong>{userInfo($smarty.session.userId, 'phone_more')}</strong>
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
			</div>
			<div class="ad-doping-step">
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
					<button type="button" name="complete" onclick="{literal}$('form[name=ad-add]').submit();{/literal}" class="btn btn-primary pull-right" style="padding: 10px 50px;">Devam Et</button>
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
		{else}
			<div class="step-content">
				<div class="block">
					<div class="block-title">
						<h5>İlan Onayı</h5>
					</div>
					<div class="block-content text-center">
						{if $return.messageType == 'success'}
							<i class="material-icons" style="margin-bottom: 25px;font-size: 100px;color: #3c763d;">check</i>
							<p style="font-weight: 500;">{$return.message}</p>
						{elseif $return.messageType == 'error'}
							<i class="material-icons" style="margin-bottom: 25px;font-size: 100px;color: #ff263a;">close</i>
							<p style="font-weight: 500;">{$return.message}</p>
						{/if}
					</div>
				</div>
			</div>
		{/if}
	{/if}
</div>