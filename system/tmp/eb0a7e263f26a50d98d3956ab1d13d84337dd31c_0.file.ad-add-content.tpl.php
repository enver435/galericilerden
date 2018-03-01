<?php /* Smarty version 3.1.27, created on 2018-01-18 19:46:58
         compiled from "C:\xampp\htdocs\galericilerden\app\view\ad-add-content.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:322515a60eba2f048a4_88783317%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eb0a7e263f26a50d98d3956ab1d13d84337dd31c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\galericilerden\\app\\view\\ad-add-content.tpl',
      1 => 1516284203,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '322515a60eba2f048a4_88783317',
  'variables' => 
  array (
    'return' => 0,
    'category' => 0,
    'city' => 0,
    'doping' => 0,
    'doping_user_price' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5a60eba30d1784_87689970',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5a60eba30d1784_87689970')) {
function content_5a60eba30d1784_87689970 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\xampp\\htdocs\\galericilerden\\system\\plugin\\smarty\\plugins\\modifier.date_format.php';
if (!is_callable('smarty_modifier_capitalize')) require_once 'C:\\xampp\\htdocs\\galericilerden\\system\\plugin\\smarty\\plugins\\modifier.capitalize.php';

$_smarty_tpl->properties['nocache_hash'] = '322515a60eba2f048a4_88783317';
?>
<div class="steps hidden-xs">
	<ul>
        <li class="step-one active"><i class="step">1</i>
            <h6>İLAN BİLGİLERİ</h6>
            <span id="spGeneral" class="active">
                <img src="<?php echo siteUrl('public/images/spacer.png');?>
" width="7" height="14" alt="Arrow" class="arrow">
                <a id="hlGeneral">Kategori Seçimi</a>
            </span>
            <span id="spAddress" <?php if ($_POST['step'] == 2 || $_POST['step'] == 'completed') {?>class="active"<?php }?>>
                <img src="<?php echo siteUrl('public/images/spacer.png');?>
" width="7" height="14" alt="Arrow" class="arrow">
                <a id="hlAddress">İlan Bilgileri</a>
            </span>
        </li>
        <li id="liDoping" class="step-two <?php if ($_POST['step'] == 'completed') {?>active<?php }?>"><i class="step">2</i>
            <h6>ÖNİZLEME</h6> 
            <span <?php if ($_POST['step'] == 'completed') {?>class="active"<?php }?>><img src="<?php echo siteUrl('public/images/spacer.png');?>
" width="7" height="14" alt="Arrow" class="arrow">
            	<a>İlanını Önizle</a>
            </span>
        </li>
        <li id="liDoping" class="step-three <?php if ($_POST['step'] == 'completed') {?>active<?php }?>"><i class="step">3</i>
            <h6>ÖNE ÇIKARMA SEÇENEKLERİ</h6> 
            <span <?php if ($_POST['step'] == 'completed') {?>class="active"<?php }?>><img src="<?php echo siteUrl('public/images/spacer.png');?>
" width="7" height="14" alt="Arrow" class="arrow">
            	<a>Öne Çıkarma Seçeneği Satın Al (Opsiyonel)</a>
            </span>
        </li>
        <li id="liConfirm" class="step-four <?php if ($_POST['step'] == 'completed') {?>active<?php }?>"><i class="step">4</i>
            <h6>İLAN ONAYI</h6>
            <span <?php if ($_POST['step'] == 'completed') {?>class="active"<?php }?>>
            	<img src="<?php echo siteUrl('public/images/spacer.png');?>
" width="7" height="14" alt="Arrow" class="arrow">
            	<a>Kaydet ve Yayınla</a>
            </span>
        </li>
    </ul>
</div>
<div class="alert alert-info">
	<strong>Bilgi: </strong> Verdiğiniz ilan <?php echo $_smarty_tpl->tpl_vars['return']->value['month'];?>
 tarihinde yani 1 ay sonra bitecektir.
</div>
<div class="step-content">
	<?php if (!isset($_POST['completed'])) {?>
    	<?php if (!$_POST['step'] && $_SESSION['step'] == 1) {?>
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
			            		<?php
$_from = $_smarty_tpl->tpl_vars['return']->value['categories'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['category'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['category']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
$foreach_category_Sav = $_smarty_tpl->tpl_vars['category'];
?>
									<a href="javascript:void(0)" class="list-group-item" category-id="<?php echo $_smarty_tpl->tpl_vars['category']->value['Id'];?>
" category-level="1"><span><?php echo $_smarty_tpl->tpl_vars['category']->value['kategori_adi'];?>
</span> <i class="material-icons">keyboard_arrow_right</i></a>
			            		<?php
$_smarty_tpl->tpl_vars['category'] = $foreach_category_Sav;
}
?>
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
	            	
		            	<?php echo '<script'; ?>
 type="text/javascript">
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
		            	<?php echo '</script'; ?>
>
	            	
            	</div>
        	</form>
    	<?php } elseif ($_POST['step'] == 2 && !$_SESSION['step']) {?>
			<div class="ad-info-step">
				<form name="ad-add" action="" method="POST">
					<div class="hidden-inputs">
						<input type="hidden" name="dopings" value="">
						<input type="hidden" name="dopingsPrice" value="">
						<input type="hidden" name="getStep" value="completed">
						<input type="hidden" name="step" value="completed">
						<input type="hidden" name="postToken" value="<?php echo $_SESSION['postToken'];?>
">
						<input type="hidden" name="category_1" data-name="<?php echo categoryInfo($_POST['category_1'],'kategori_adi');?>
" value="<?php echo $_POST['category_1'];?>
">
	            		<input type="hidden" name="category_2" data-name="<?php echo categoryInfo($_POST['category_2'],'kategori_adi');?>
" value="<?php echo $_POST['category_2'];?>
">
	            		<input type="hidden" name="category_3" data-name="<?php echo categoryInfo($_POST['category_3'],'kategori_adi');?>
" value="<?php echo $_POST['category_3'];?>
">
	            		<input type="hidden" name="category_4" data-name="<?php echo categoryInfo($_POST['category_4'],'kategori_adi');?>
" value="<?php echo $_POST['category_4'];?>
">
	            		<input type="hidden" name="category_5" data-name="<?php echo categoryInfo($_POST['category_5'],'kategori_adi');?>
" value="<?php echo $_POST['category_5'];?>
">
	            		<input type="hidden" name="category_6" data-name="<?php echo categoryInfo($_POST['category_6'],'kategori_adi');?>
" value="<?php echo $_POST['category_6'];?>
">
	            		<input type="hidden" name="category_7" data-name="<?php echo categoryInfo($_POST['category_7'],'kategori_adi');?>
" value="<?php echo $_POST['category_7'];?>
">
	            		<input type="hidden" name="category_8" data-name="<?php echo categoryInfo($_POST['category_8'],'kategori_adi');?>
" value="<?php echo $_POST['category_8'];?>
">
	            		<input type="hidden" name="category_9" data-name="<?php echo categoryInfo($_POST['category_9'],'kategori_adi');?>
" value="<?php echo $_POST['category_9'];?>
">
	            		<input type="hidden" name="category_10" data-name="<?php echo categoryInfo($_POST['category_10'],'kategori_adi');?>
" value="<?php echo $_POST['category_10'];?>
">
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
													<div class="col-xs-6"><span class="text-capitalize"><?php echo userInfo($_SESSION['userId'],'name');?>
</span> <span class="text-uppercase"><?php echo userInfo($_SESSION['userId'],'surname');?>
</span></div>
												</div>
												<div class="inf">
													<div class="col-xs-6">
														<strong>Cep Telefonu</strong>
													</div>
													<div class="col-xs-6"><?php echo userInfo($_SESSION['userId'],'phone');?>
</div>
												</div>
												<?php if (userInfo($_SESSION['userId'],'phone_work')) {?>
													<div class="inf">
														<div class="col-xs-6">
															<strong>İş Telefonu</strong>
														</div>
														<div class="col-xs-6"><?php echo userInfo($_SESSION['userId'],'phone_work');?>
</div>
													</div>
												<?php }?>
												<?php if (userInfo($_SESSION['userId'],'phone_more')) {?>
													<div class="inf">
														<div class="col-xs-6">
															<strong>Sabit Telefon</strong>
														</div>
														<div class="col-xs-6"><?php echo userInfo($_SESSION['userId'],'phone_more');?>
</div>
													</div>
												<?php }?>
												<div class="inf" style="padding-left: 15px;">
													<a href="<?php echo siteUrl('my-info');?>
" style="padding: 0;">İletişim bilgilerini değiştir</a>
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
									<div class="category-items"><?php echo $_smarty_tpl->tpl_vars['return']->value['categoryModulItems'];?>
</div>
									<div class="category-features"><?php echo $_smarty_tpl->tpl_vars['return']->value['categoryFeatures'];?>
</div>
								</div>
							</div>
							<link rel="stylesheet" href="<?php echo siteUrl('public/scripts/editor/ui/trumbowyg.css');?>
">
		                    <link rel="stylesheet" href="<?php echo siteUrl('public/scripts/editor/plugins/colors/ui/trumbowyg.colors.css');?>
">
		                    <?php echo '<script'; ?>
 src="<?php echo siteUrl('public/scripts/editor/trumbowyg.js');?>
"><?php echo '</script'; ?>
>
		                    <?php echo '<script'; ?>
 src="<?php echo siteUrl('public/scripts/editor/plugins/base64/trumbowyg.base64.js');?>
"><?php echo '</script'; ?>
>
		                    <?php echo '<script'; ?>
 src="<?php echo siteUrl('public/scripts/editor/plugins/colors/trumbowyg.colors.js');?>
"><?php echo '</script'; ?>
>
		                    <?php echo '<script'; ?>
 src="<?php echo siteUrl('public/scripts/editor/plugins/noembed/trumbowyg.noembed.js');?>
"><?php echo '</script'; ?>
>
		                    <?php echo '<script'; ?>
 src="<?php echo siteUrl('public/scripts/editor/plugins/pasteimage/trumbowyg.pasteimage.js');?>
"><?php echo '</script'; ?>
>
		                    <?php echo '<script'; ?>
 src="<?php echo siteUrl('public/scripts/editor/plugins/preformatted/trumbowyg.preformatted.js');?>
"><?php echo '</script'; ?>
>
		                    <?php echo '<script'; ?>
 src="<?php echo siteUrl('public/scripts/editor/plugins/upload/trumbowyg.upload.js');?>
"><?php echo '</script'; ?>
> 
		                    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo siteUrl('public/scripts/editor/langs/tr.min.js');?>
"><?php echo '</script'; ?>
>
		                     
		                        <?php echo '<script'; ?>
 type="text/javascript">
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
		                        <?php echo '</script'; ?>
>
		                    
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
															<?php
$_from = $_smarty_tpl->tpl_vars['return']->value['cities'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['city'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['city']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['city']->value) {
$_smarty_tpl->tpl_vars['city']->_loop = true;
$foreach_city_Sav = $_smarty_tpl->tpl_vars['city'];
?>
																<option value="<?php echo $_smarty_tpl->tpl_vars['city']->value['CityID'];?>
"><?php echo $_smarty_tpl->tpl_vars['city']->value['CityName'];?>
</option>
															<?php
$_smarty_tpl->tpl_vars['city'] = $foreach_city_Sav;
}
?>
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
											<?php echo '<script'; ?>
 type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZaVsbFgc-jiF8IKiLavvLc5DTbJeHDUk&language=tr&region=TR"><?php echo '</script'; ?>
>
												
												<?php echo '<script'; ?>
 type="text/javascript">
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
												                icon: "<?php echo siteUrl('public/images/mapIcon.png');?>
"
												            });
											            }
											            else
											            {
											            	var marker = new google.maps.Marker({
												                position: {lat: lat, lng: lng}, 
												                map: map,
												                icon: "<?php echo siteUrl('public/images/mapIcon.png');?>
"
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
											    <?php echo '</script'; ?>
>
											
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
							<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo siteUrl('public/scripts/image-compressor.js');?>
"><?php echo '</script'; ?>
>
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
											<div class="col-xs-6" style="padding: 10px;line-height: 17px;" onclick="showLocation(parseFloat($('#markerLatFld').val()), parseFloat($('#markerLngFld').val()), parseInt($('#zoomFld').val()));">
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
											<?php if ($_smarty_tpl->tpl_vars['return']->value['userStore'] === false) {?>
												<a href="#" style="padding: 0;">
													<?php echo userInfo($_SESSION['userId'],'name');?>
 <?php echo userInfo($_SESSION['userId'],'surname');?>

												</a>
											<?php } else { ?>
												<a href="http://<?php echo $_smarty_tpl->tpl_vars['return']->value['userStore']['store_domain'];
echo $_smarty_tpl->tpl_vars['return']->value['siteConfig']['siteStoreDomain'];?>
" style="padding: 0;" target="_blank">
													<?php echo mb_strtoupper($_smarty_tpl->tpl_vars['return']->value['userStore']['store_name'], 'UTF-8');?>

												</a>
											<?php }?>
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
														<img src="<?php echo siteUrl('public/images/facebook.svg');?>
" width="32" height="32" alt="facebook">
													</a>
												</li>
												<li>
													<a href="javascript:;">
														<img src="<?php echo siteUrl('public/images/twitter.svg');?>
" width="32" height="32" alt="twitter">
													</a>
												</li>
												<li>
													<a href="javascript:;">
														<img src="<?php echo siteUrl('public/images/google-plus.svg');?>
" width="32" height="32" alt="google plus">
													</a>
												</li>
												<li>
													<a href="javascript:;">
														<img src="<?php echo siteUrl('public/images/pinterest.svg');?>
" width="32" height="32" alt="pinterest">
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
								
								<link rel="stylesheet" href="<?php echo siteUrl('public/styles/swiper.min.css');?>
">
								<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo siteUrl('public/scripts/lightgallery-all.min.js');?>
"><?php echo '</script'; ?>
>
								<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo siteUrl('public/scripts/swiper.min.js');?>
"><?php echo '</script'; ?>
>

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
											<span class="detail-list-value"><?php echo smarty_modifier_date_format(time(),"%d");?>
 <?php echo monthName();?>
 <?php echo smarty_modifier_date_format(time(),"%Y");?>
</span>
										</li>
										<div class="appended"></div>
									</ul>
								</div>
							</div>
						</div>
						<?php if ($_smarty_tpl->tpl_vars['return']->value['categoryFeatures']) {?>
							<div class="mobile-features col-sm-12 col-xs-12 hidden-lg hidden-md">
								<div class="ad-detail-block" style="margin-top: 25px;">
									<div id="ad-features2"></div>
								</div>
							</div>
						<?php }?>
						<div class="col-md-3 hidden-sm hidden-xs">
							<div class="share-buttons">
								<ul>
									<li>
										<a href="javascript:;">
											<img src="<?php echo siteUrl('public/images/facebook.svg');?>
" width="32" height="32" alt="facebook">
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<img src="<?php echo siteUrl('public/images/twitter.svg');?>
" width="32" height="32" alt="twitter">
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<img src="<?php echo siteUrl('public/images/google-plus.svg');?>
" width="32" height="32" alt="google plus">
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<img src="<?php echo siteUrl('public/images/pinterest.svg');?>
" width="32" height="32" alt="pinterest">
										</a>
									</li>
								</ul>
							</div>
							<div class="ad-detail-block" style="margin-top: 15px;">
								<?php if ($_smarty_tpl->tpl_vars['return']->value['userStore'] === false) {?>
									<div class="ad-user text-capitalize">
										<?php echo userInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['user_id'],'name');?>
 <?php echo userInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['user_id'],'surname');?>

									</div>
								<?php } else { ?>
									<div class="ad-user" style="overflow: hidden;">
										<div class="storeDetail">
											<div class="certificate">
												<img src="<?php echo siteUrl('public/images/certificate.svg');?>
" width="35" alt="certificate">
												<span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['return']->value['userStore']['end_time'],"%Y")-smarty_modifier_date_format($_smarty_tpl->tpl_vars['return']->value['userStore']['create_time'],"%Y");?>
.YIL</span>
											</div>
											<img src="<?php echo siteUrl('files/store/thumb');?>
/<?php echo $_smarty_tpl->tpl_vars['return']->value['userStore']['store_logo'];?>
.jpg" width="110" class="storeLogo" alt="<?php echo $_smarty_tpl->tpl_vars['return']->value['userStore']['store_name'];?>
">
											<h3>
												<a href="http://<?php echo $_smarty_tpl->tpl_vars['return']->value['userStore']['store_domain'];
echo $_smarty_tpl->tpl_vars['return']->value['siteConfig']['siteStoreDomain'];?>
"><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['return']->value['userStore']['store_name'], 'UTF-8');?>
</a>
											</h3>
										</div>
									</div>
								<?php }?>

								<div class="user-phones">
									<ul>
										<li>
											<a href="tel:<?php echo userInfo($_SESSION['userId'],'phone');?>
" title="Cep Telefonu">
												<i class="material-icons">phone</i> <?php echo userInfo($_SESSION['userId'],'phone');?>

											</a>
										</li>
										<?php if (userInfo($_SESSION['userId'],'phone_work') != '') {?>
											<li>
												<a href="tel:<?php echo userInfo($_SESSION['userId'],'phone_work');?>
" title="İş Telefonu">
													<i class="material-icons">phone</i> <?php echo userInfo($_SESSION['userId'],'phone_work');?>

												</a>
											</li>
										<?php }?>
										<?php if (userInfo($_SESSION['userId'],'phone_more') != '') {?>
											<li>
												<a href="tel:<?php echo userInfo($_SESSION['userId'],'phone_more');?>
" title="Sabit Telefon">
													<i class="material-icons">phone</i> <?php echo userInfo($_SESSION['userId'],'phone_more');?>

												</a>
											</li>
										<?php }?>
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
										<?php if ($_smarty_tpl->tpl_vars['return']->value['categoryFeatures']) {?>
									  		<li><a data-toggle="tab" href="#ad-features">Özellikler</a></li>
									  	<?php }?>
									  	<li><a id="ad-map" data-toggle="tab" href="#ad-location">Konum</a></li>
									  	<li><a data-toggle="tab" href="#kredi">Kredi / Finansman Teklifleri</a></li>
									</ul>

									<div class="tab-content">
										<div id="ad-texts" class="tab-pane fade in active"></div>
										<?php if ($_smarty_tpl->tpl_vars['return']->value['categoryFeatures']) {?>
										  	<div id="ad-features" class="tab-pane fade"></div>
									  	<?php }?>
									  	<div id="ad-location" class="tab-pane fade">
									  		<div id="ad-detail-map"></div>
									  		
									  			<?php echo '<script'; ?>
 type="text/javascript">
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
									  			<?php echo '</script'; ?>
>
									  		
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
						          		<?php if ($_smarty_tpl->tpl_vars['return']->value['getUserStore'] === false) {?>
						          			<strong class="text-center" style="display: block;"><?php echo smarty_modifier_capitalize(userInfo($_SESSION['userId'],'name'));?>
 <?php echo smarty_modifier_capitalize(userInfo($_SESSION['userId'],'surname'));?>
</strong>
						          		<?php } else { ?>
						          			<strong class="text-center" style="display: block;"><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['return']->value['userStore']['store_name'], 'UTF-8');?>
</strong>
						          		<?php }?>
						          	</div>
						          	<div class="modal-bottom">
						          		<ul>
						          			<?php if (userInfo($_SESSION['userId'],'phone') != '') {?>
							          			<li>
							          				<a href="tel:<?php echo userInfo($_SESSION['userId'],'phone');?>
">
							          					<strong>Cep</strong>
							          					<strong><?php echo userInfo($_SESSION['userId'],'phone');?>
</strong>
							          				</a>
							          			</li>
						          			<?php }?>
						          			<?php if (userInfo($_SESSION['userId'],'phone_work') != '') {?>
							          			<li>
							          				<a href="tel:<?php echo userInfo($_SESSION['userId'],'phone_work');?>
">
								          				<strong>İş</strong>
								          				<strong><?php echo userInfo($_SESSION['userId'],'phone_work');?>
</strong>
							          				</a>
							          			</li>
						          			<?php }?>
						          			<?php if (userInfo($_SESSION['userId'],'phone_more') != '') {?>
							          			<li>
							          				<a href="tel:<?php echo userInfo($_SESSION['userId'],'phone_more');?>
">
								          				<strong>Sabit</strong>
								          				<strong><?php echo userInfo($_SESSION['userId'],'phone_more');?>
</strong>
							          				</a>
							          			</li>
						          			<?php }?>
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
							<?php if ($_smarty_tpl->tpl_vars['return']->value['siteConfig']['iyzicoPayment'] === false) {?>
								<div class="alert alert-danger" style="margin-right: 15px;margin-left: 15px;">1 Ocak 2018 tarihine kadar ücretsizdir</div>
							<?php }?>
							<div class="doping-lists">
								<?php
$_from = $_smarty_tpl->tpl_vars['return']->value['dopingList'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['doping'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['doping']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['doping']->value) {
$_smarty_tpl->tpl_vars['doping']->_loop = true;
$foreach_doping_Sav = $_smarty_tpl->tpl_vars['doping'];
?>
									<div class="col-md-6">
										<?php if ($_smarty_tpl->tpl_vars['return']->value['limitType'] == 'individual_ad_limit') {?>
											<?php if (isset($_smarty_tpl->tpl_vars['doping_user_price'])) {$_smarty_tpl->tpl_vars['doping_user_price'] = clone $_smarty_tpl->tpl_vars['doping_user_price'];
$_smarty_tpl->tpl_vars['doping_user_price']->value = $_smarty_tpl->tpl_vars['doping']->value['doping_individual_price']; $_smarty_tpl->tpl_vars['doping_user_price']->nocache = null; $_smarty_tpl->tpl_vars['doping_user_price']->scope = 0;
} else $_smarty_tpl->tpl_vars['doping_user_price'] = new Smarty_Variable($_smarty_tpl->tpl_vars['doping']->value['doping_individual_price'], null, 0);?>
										<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['limitType'] == 'corporate_ad_limit') {?>
											<?php if (isset($_smarty_tpl->tpl_vars['doping_user_price'])) {$_smarty_tpl->tpl_vars['doping_user_price'] = clone $_smarty_tpl->tpl_vars['doping_user_price'];
$_smarty_tpl->tpl_vars['doping_user_price']->value = $_smarty_tpl->tpl_vars['doping']->value['doping_corporate_price']; $_smarty_tpl->tpl_vars['doping_user_price']->nocache = null; $_smarty_tpl->tpl_vars['doping_user_price']->scope = 0;
} else $_smarty_tpl->tpl_vars['doping_user_price'] = new Smarty_Variable($_smarty_tpl->tpl_vars['doping']->value['doping_corporate_price'], null, 0);?>
										<?php }?>

										<div class="doping" data-doping="<?php echo $_smarty_tpl->tpl_vars['doping']->value['id'];?>
" data-price="<?php echo $_smarty_tpl->tpl_vars['doping_user_price']->value;?>
" data-time="<?php echo $_smarty_tpl->tpl_vars['doping']->value['doping_time'];?>
" data-name="<?php echo $_smarty_tpl->tpl_vars['doping']->value['doping_name'];?>
" onclick="selectDoping(<?php echo $_smarty_tpl->tpl_vars['doping']->value['id'];?>
);">
											<div class="doping-header">
												<div class="col-md-3 col-xs-12">
													<div class="doping-icon">
														<?php if ($_smarty_tpl->tpl_vars['doping']->value['id'] == 1) {?>
															<i class="material-icons">store</i>
														<?php } elseif ($_smarty_tpl->tpl_vars['doping']->value['id'] == 2) {?>
															<i class="material-icons">alarm</i>
														<?php } elseif ($_smarty_tpl->tpl_vars['doping']->value['id'] == 3) {?>
															<i class="material-icons">trending_up</i>
														<?php } elseif ($_smarty_tpl->tpl_vars['doping']->value['id'] == 4) {?>
															<i class="material-icons">view_day</i>
														<?php }?>
													</div>
												</div>
												<div class="col-md-9 col-xs-12">
													<h4 class="doping-name"><?php echo $_smarty_tpl->tpl_vars['doping']->value['doping_name'];?>
</h4>
													<a class="preview-doping" href="#">Nasıl Görünür?</a>
													<div class="doping-bottom">
														<p><?php echo $_smarty_tpl->tpl_vars['doping']->value['doping_text'];?>
</p>
														<div class="doping-price">
															<label><?php echo $_smarty_tpl->tpl_vars['doping']->value['doping_time'];?>
 Gün</label>
															<span>
																<?php if ($_smarty_tpl->tpl_vars['doping_user_price']->value > 0) {?>
																	<?php echo $_smarty_tpl->tpl_vars['doping_user_price']->value;?>
 TL
																<?php } else { ?>
																	Ücretsiz
																<?php }?>
															</span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								<?php
$_smarty_tpl->tpl_vars['doping'] = $foreach_doping_Sav;
}
?>
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
					<button type="button" name="complete" onclick="$('form[name=ad-add]').submit();" class="btn btn-primary pull-right" style="padding: 10px 50px;">Devam Et</button>
				</div>
				<?php if ($_smarty_tpl->tpl_vars['return']->value['siteConfig']['iyzicoPayment'] === true) {?>
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
														<td style="width: 60%;" class="text-capitalize"><b><?php echo userInfo($_SESSION['userId'],'name');?>
 <?php echo userInfo($_SESSION['userId'],'surname');?>
</b></td>
													</tr>
													<tr>
														<td style="width: 40%;">İl</td>
														<td style="width: 60%;" class="text-capitalize"><b><?php echo cityInfo(userInfo($_SESSION['userId'],'city'),'CityName');?>
</b></td>
													</tr>
													<tr>
														<td style="width: 40%;">İlçe</td>
														<td style="width: 60%;" class="text-capitalize"><b><?php echo countyInfo(userInfo($_SESSION['userId'],'county'),'CountyName');?>
</b></td>
													</tr>
													<tr>
														<td style="width: 40%;">Cep Telefonu</td>
														<td style="width: 60%;" class="text-capitalize"><b><?php echo userInfo($_SESSION['userId'],'phone');?>
</b></td>
													</tr>
													<tr>
														<td style="width: 40%;">Açık Adres</td>
														<td style="width: 60%;" class="text-capitalize"><b><?php echo userInfo($_SESSION['userId'],'address');?>
</b></td>
													</tr>
													<tr>
														<td style="width: 40%;">Tc No</td>
														<td style="width: 60%;" class="text-capitalize"><b><?php echo userInfo($_SESSION['userId'],'tc');?>
</b></td>
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
												<link rel="stylesheet" href="<?php echo siteUrl('public/styles/card.css');?>
">
												<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo siteUrl('public/scripts/jquery.card.js');?>
"><?php echo '</script'; ?>
>
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
												<?php echo '<script'; ?>
 type="text/javascript">
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
												<?php echo '</script'; ?>
>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php }?>
			</div>
		<?php } else { ?>
			<div class="step-content">
				<div class="block">
					<div class="block-title">
						<h5>İlan Onayı</h5>
					</div>
					<div class="block-content text-center">
						<?php if ($_smarty_tpl->tpl_vars['return']->value['messageType'] == 'success') {?>
							<i class="material-icons" style="margin-bottom: 25px;font-size: 100px;color: #3c763d;">check</i>
							<p style="font-weight: 500;"><?php echo $_smarty_tpl->tpl_vars['return']->value['message'];?>
</p>
						<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['messageType'] == 'error') {?>
							<i class="material-icons" style="margin-bottom: 25px;font-size: 100px;color: #ff263a;">close</i>
							<p style="font-weight: 500;"><?php echo $_smarty_tpl->tpl_vars['return']->value['message'];?>
</p>
						<?php }?>
					</div>
				</div>
			</div>
		<?php }?>
	<?php }?>
</div><?php }
}
?>