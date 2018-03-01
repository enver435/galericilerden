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
						{if getUrl(2) != 'edit' AND getUrl(3) != 'not-confirm' AND getUrl(2) != 'delete'}
							<div>
								<table id="dynamic-table" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>İlan No</th>
											<th>Başlık</th>
											<th>Fiyat</th>
											<th>İlan Sahibi</th>
											<th></th>
										</tr>
									</thead>

									<tbody>
										{if $return.ads}
											{foreach $return.ads as $ads}
												<tr>
													<td>{$ads.id}</td>
													<td>{$ads.title}</td>
													<td>
														{$ads.price|number_format:0:".":","}
														{if $ads.price_type == 0}
															TL
														{elseif $ads.price_type == 1}
															EUR
														{elseif $ads.price_type == 2}
															USD
														{/if}
													</td>
													<td><a href="#">{userInfo($ads.user_id, 'name')|capitalize} {userInfo($ads.user_id, 'surname')|capitalize}</a></td>
													<td>
														<div class="hidden-sm hidden-xs action-buttons">
															<a class="blue" target="_blank" href="{siteUrl('view')}/{$ads.seflink}-{$ads.id}">
																<i class="ace-icon fa fa-search-plus bigger-130" title="Görüntüle"></i>
															</a>

															<a class="green" href="{SITE_URL}/{SITE_ADMIN}/ads/edit/{$ads.id}">
																<i class="ace-icon fa fa-pencil bigger-130" title="Düzenle"></i>
															</a>

															{if getUrl(2) == 'pending'}
																<a class="green" href="{SITE_URL}/{SITE_ADMIN}/ads/pending/confirm/{$ads.id}">
																	<i class="ace-icon fa fa-check bigger-130" title="İlanı Onayla"></i>
																</a>
																<a class="red" href="{SITE_URL}/{SITE_ADMIN}/ads/pending/not-confirm/{$ads.id}">
																	<i class="ace-icon fa fa-close bigger-130" title="İlanı Onaylama"></i>
																</a>
															{/if}
															
															{if getUrl(2) == 'approved'}
																<a class="green" href="{SITE_URL}/{SITE_ADMIN}/ads/approved/doping/{$ads.id}">
																	<i class="ace-icon fa fa-arrow-up bigger-130" title="Ana Sayfa Vitrin Doping Uygula"></i>
																</a>
																<!--<a class="red" href="{SITE_URL}/{SITE_ADMIN}/ads/hanger/{$ads.id}">
																	<i class="ace-icon fa fa-close bigger-130" title="Askıya Al"></i>
																</a>-->
															{/if}

															{if getUrl(2) == 'expired'}
																<a class="green" href="{SITE_URL}/{SITE_ADMIN}/ads/expired/active/{$ads.id}">
																	<i class="ace-icon fa fa-check bigger-130" title="İlanı yeniden aktifleştir"></i>
																</a>
															{/if}
															<a class="red" href="{SITE_URL}/{SITE_ADMIN}/ads/delete/{$ads.id}">
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
																		<a target="_blank" href="{siteUrl('view')}/{$ads.seflink}-{$ads.id}" class="tooltip-info" data-rel="tooltip" title="Görüntüle">
																			<span class="blue">
																				<i class="ace-icon fa fa-search-plus bigger-120"></i>
																			</span>
																		</a>
																	</li>

																	<li>
																		<a href="{SITE_URL}/{SITE_ADMIN}/ads/edit/{$ads.id}" class="tooltip-success" data-rel="tooltip" title="Düzenle">
																			<span class="green">
																				<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																			</span>
																		</a>
																	</li>

																	{if getUrl(2) == 'pending'}
																		<li>
																			<a href="{SITE_URL}/{SITE_ADMIN}/ads/pending/confirm/{$ads.id}" class="tooltip-success" data-rel="tooltip" title="İlanı Onayla">
																				<span class="green">
																					<i class="ace-icon fa fa-check bigger-120"></i>
																				</span>
																			</a>
																		</li>

																		<li>
																			<a href="{SITE_URL}/{SITE_ADMIN}/ads/pending/not-confirm/{$ads.id}" class="tooltip-success" data-rel="tooltip" title="İlanı Onaylama">
																				<span class="red">
																					<i class="ace-icon fa fa-close bigger-120"></i>
																				</span>
																			</a>
																		</li>
																	{/if}
																	
																	{if getUrl(2) == 'approved'}
																		<li>
																			<a href="{SITE_URL}/{SITE_ADMIN}/ads/approved/doping/{$ads.id}" class="tooltip-success" data-rel="tooltip" title="Ana Sayfa Vitrin Doping Uygula">
																				<span class="green">
																					<i class="ace-icon fa fa-arrow-up bigger-120"></i>
																				</span>
																			</a>
																		</li>
																		<!--<li>
																			<a href="{SITE_URL}/{SITE_ADMIN}/ads/hanger/{$ads.id}" class="tooltip-error" data-rel="tooltip" title="Askıya Al">
																				<span class="red">
																					<i class="ace-icon fa fa-close bigger-120"></i>
																				</span>
																			</a>
																		</li>-->
																	{/if}

																	{if getUrl(2) == 'expired'}
																		<li>
																			<a href="{SITE_URL}/{SITE_ADMIN}/ads/expired/active/{$ads.id}" class="tooltip-success" data-rel="tooltip" title="İlanı yeniden aktifleştir">
																				<span class="green">
																					<i class="ace-icon fa fa-check bigger-120"></i>
																				</span>
																			</a>
																		</li>
																	{/if}
																	<li>
																		<a href="{SITE_URL}/{SITE_ADMIN}/ads/delete/{$ads.id}" class="tooltip-error" data-rel="tooltip" title="Sil">
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
									<div class="form-group" style="overflow: hidden;">
										<div class="col-md-6 col-xs-12">
											<label>İlan Başlığı: </label>
											<input type="text" name="ad_name" value="{$return.adInfo.title}" class="form-control">
										</div>
										<div class="col-md-6 col-xs-12">
											<div class="row">
												<div class="col-xs-6">
													<div class="form-group">
														<label>İlan Fiyatı: </label>
														<input type="text" name="ad_price" value="{$return.adInfo.price}" class="form-control">
													</div>
												</div>
												<div class="col-xs-6">
													<div class="form-group">
														<label>Fiyat türü: </label>
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
									<div class="form-group" style="overflow: hidden;">
										<div class="col-md-12">
											<label>İlan Açıklaması: </label>
											<textarea name="ad_text" id="default-editor" cols="30" rows="10">{$return.adInfo.text}</textarea>
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
					                    {literal} 
					                        <script type="text/javascript">
					                            jQuery(function($) {
					                                var uploadOptions = {
					                                    serverPath: 'https://api.imgur.com/3/image',
					                                    fileFieldName: 'image',
					                                    headers: {'Authorization': 'Client-ID 9e57cb1c4791cea'},
					                                    urlPropertyName: 'data.link'
					                                };
					                                jQuery('#default-editor').trumbowyg({
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
									<div class="col-md-12">
										{literal}
											<style type="text/css">
												.uploaded-images .image .load {display: none;position: absolute;bottom: 0;left: 0;right: 0;overflow: hidden;font-size: 14px;background-color: #ff263a;color: #fff;text-align: center;line-height: 1.77;}
												.uploaded-images .image {margin-bottom: 15px;position: relative;}
												.uploaded-images .image .image-bottom {position: absolute;bottom: 0;left: 0;right: 0;overflow: hidden;font-size: 13px;}
												.uploaded-images .image .image-bottom .title-image {text-align: center;background-color: #8e8e8e;color: #fff;line-height: 1.9;padding: 0px 5px;cursor: pointer;}
												.uploaded-images .image .image-bottom .title-image.active {background-color: #ff263a;}
												.uploaded-images .image .image-bottom .delete-image {text-align: center;background-color: #fd0017;cursor: pointer;}
												.uploaded-images .image .image-bottom .delete-image i {font-size: 21px;line-height: 1.15;color: #fff;}
												.uploaded-images .image {height: 120px;}
											</style>
											<script type="text/javascript">
												jQuery(function($) {
													/* SET TITLE IMAGE UPLOADED IMAGES */
													$('.uploaded-images').on('click', '.title-image:not(.active)', function() {

														$('.uploaded-images .title-image').removeClass('active');
														$(this).addClass('active');

														var image = $(this).parent().parent().attr('data-image');
														
														$('.input-hidden-images input[name=ad-title-image]').val(image);

													});

													/* REMOVE UPLOADED IMAGE */
													$('.uploaded-images').on('click', '.delete-image', function() {

														var _this = $(this);
														var adId  = {/literal}{getUrl(3)}{literal};

														var image = $(this).parent().parent().attr('data-image');

														if(image == $('input[name=ad-title-image]').val())
														{
															$('.upload-message').html('\
																<div class="alert alert-danger" style="margin-top: 20px;">\
																	<strong>Hata!</strong> Vitrin resmini silemezsiniz\
																<div>\
															');
														}
														else
														{
															$.ajax({
																type: 'POST',
																url: siteUrl + '/request',
																dataType: 'json',
																data: {'mode': 'delete-ad-image', 'image': image, 'adId': adId, 'db': 'true'},
																success: function(response)
																{
																	if(response.success)
																	{
																		_this.parent().parent().parent().remove();
																	}
																	else
																	{
																		$('.upload-message').html('\
																			<div class="alert alert-danger" style="margin-top: 20px;">\
																				<strong>Hata!</strong> ' + response.error + '\
																			<div>\
																		');
																	}
																}
															});
														}

													});
												})
											</script>
										{/literal}
										<div class="row">
											<div class="input-hidden-images">
												<input type="hidden" name="ad-title-image" value="{$return.adInfo.title_image}">
											</div>
											<div class="uploaded-images" style="overflow: hidden;">
												{foreach $return.adImages as $image}
													<div class="col-md-2 col-sm-3 col-xs-6">
														<div class="image" data-image="{$image.image}">
															<img src="{siteUrl('files/ads/thumb')}/{$image.image}.jpg" alt="" style="width: 100%;height: 100%;" />
															<div class="image-bottom">
																<div class="col-xs-6 title-image {if $image.image == $return.adInfo.title_image}active{/if}">Vitrin</div>
																<div class="col-xs-6 delete-image">
																	<i class="fa fa-close"></i>
																</div>
															</div>
														</div>
													</div>
												{/foreach}
											</div>
											<div class="upload-message"></div>
										</div>
									</div>
									<button type="submit" name="save" class="btn btn-primary pull-right">Kaydet</button>
								</form>
							{elseif getUrl(3) == 'not-confirm'}
								<form action="" method="POST">
									<div class="form-group">
										<label>İlanın neden onaylanmadığını seçiniz: </label>
										<select name="sebep" class="form-control">
											<option value="1">İlan Başlığı veya İlan Açıklaması Kurallara Uymadığı İçin İlanınız Onaylanmamıştır</option>
											<option value="2">İlan Resimleri Orjinal Olmadığı için İlanınız Onaylanmamıştır</option>
											<option value="3">Reklam ve Spam Nedeniyle İlanınız Onaylanmamıştır</option>
										</select>
									</div>
									<button type="submit" name="save" class="btn btn-primary pull-right">İlanı Onaylama</button>
								</form>
							{elseif getUrl(2) == 'delete'}
								<form action="" method="POST">
									<div class="form-group">
										<label>İlanın neden silindiğini seçiniz: </label>
										<select name="sebep" class="form-control">
											<option value="1">İlan Başlığı veya İlan Açıklaması Kurallara Uymadığı İçin İlanınız Onaylanmamıştır</option>
											<option value="2">İlan Resimleri Orjinal Olmadığı için İlanınız Onaylanmamıştır</option>
											<option value="3">Reklam ve Spam Nedeniyle İlanınız Onaylanmamıştır</option>
										</select>
									</div>
									<button type="submit" name="save" class="btn btn-primary pull-right">İlanı Sil</button>
								</form>
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