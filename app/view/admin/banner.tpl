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
			
			{literal}
				<style>
					.image-and-link {display: none;}
					.html-code {display: none;}
				</style>
			{/literal}
			<div class="page-content">
				<div class="row">
					<form action="" method="POST" enctype="multipart/form-data">
						<div class="col-md-8 col-md-offset-2">
							<div class="250x250banner" style="border: 1px solid #ddd;overflow: hidden;padding: 25px;margin-top: 25px;margin-bottom: 25px;">
								<h4>Anasayfa Banneri (250x250)</h4>
								<div class="form-group">
									<label>Seçenek: </label><br>
									<input type="radio" name="250x250banner" value="1" {if $return.bannerInfo250x250.banner_type == 1}checked="checked"{/if}> Resim ve Link<br>
									<input type="radio" name="250x250banner" value="2" {if $return.bannerInfo250x250.banner_type == 2}checked="checked"{/if}> Html Kod
								</div>
								<div class="image-and-link" {if $return.bannerInfo250x250.banner_type == 1}style="display: block;"{/if}>
									<div class="col-md-8 col-md-offset-2">
										<div class="image">
											<h5 class="text-center">Resim Yükle</h5> 
											<input type="file" name="250x250banner" class="form-control">
											{if $return.bannerInfo250x250.banner_img != ''}
												<img src="{siteUrl('files/banner')}/{$return.bannerInfo250x250.banner_img}" style="margin-top: 15px;display: block;margin-left: auto;margin-right: auto;" alt="">
											{/if}
											<h5 class="text-center">veya<br><br> Resim Linki Yaz</h5> 
											<input type="url" class="form-control" value="{$return.bannerInfo250x250.banner_img_link}" name="250x250bannerImageLink">
										</div>

										<div class="bannerLink" style="margin-top: 25px;border-top: 1px solid #ddd;padding-top: 15px;">
											<h5 class="text-center">Banner Linki: </h5>
											<input type="url" class="form-control" value="{$return.bannerInfo250x250.banner_link}" name="250x250BannerLink">
										</div>
									</div>
								</div>
								<div class="html-code" {if $return.bannerInfo250x250.banner_type == 2}style="display: block;"{/if}>
									<textarea name="htmlCode250x250" cols="30" rows="10" class="form-control">{$return.bannerInfo250x250.banner_html}</textarea>
								</div>
							</div>

							<div class="ilanDetayWebBanner" style="border: 1px solid #ddd;overflow: hidden;padding: 25px;margin-top: 25px;margin-bottom: 25px;">
								<h4>İlan Detay (Web) Banneri (250x300)</h4>
								<div class="form-group">
									<label>Seçenek: </label><br>
									<input type="radio" name="ilanDetayWebBanner" value="1" {if $return.bannerInfoIlanDetayWeb.banner_type == 1}checked="checked"{/if}> Resim ve Link<br>
									<input type="radio" name="ilanDetayWebBanner" value="2" {if $return.bannerInfoIlanDetayWeb.banner_type == 2}checked="checked"{/if}> Html Kod
								</div>
								<div class="image-and-link" {if $return.bannerInfoIlanDetayWeb.banner_type == 1}style="display: block;"{/if}>
									<div class="col-md-8 col-md-offset-2">
										<div class="image">
											<h5 class="text-center">Resim Yükle</h5> 
											<input type="file" name="ilanDetayWebBanner" class="form-control">
											{if $return.bannerInfoIlanDetayWeb.banner_img != ''}
												<img src="{siteUrl('files/banner')}/{$return.bannerInfoIlanDetayWeb.banner_img}" style="margin-top: 15px;display: block;margin-left: auto;margin-right: auto;" alt="">
											{/if}
											<h5 class="text-center">veya<br><br> Resim Linki Yaz</h5> 
											<input type="url" class="form-control" value="{$return.bannerInfoIlanDetayWeb.banner_img_link}" name="ilanDetayWebBannerImageLink">
										</div>

										<div class="bannerLink" style="margin-top: 25px;border-top: 1px solid #ddd;padding-top: 15px;">
											<h5 class="text-center">Banner Linki: </h5>
											<input type="url" class="form-control" value="{$return.bannerInfoIlanDetayWeb.banner_link}" name="ilanDetayWebBannerLink">
										</div>
									</div>
								</div>
								<div class="html-code" {if $return.bannerInfoIlanDetayWeb.banner_type == 2}style="display: block;"{/if}>
									<textarea name="ilanDetayWebHtmlCode" cols="30" rows="10" class="form-control">{$return.bannerInfoIlanDetayWeb.banner_html}</textarea>
								</div>
							</div>

							<div class="ilanDetayMobilBanner" style="border: 1px solid #ddd;overflow: hidden;padding: 25px;margin-top: 25px;margin-bottom: 25px;">
								<h4>İlan Detay (Mobil) Banneri (Responsive)</h4>
								<div class="form-group">
									<label>Seçenek: </label><br>
									<input type="radio" name="ilanDetayMobilBanner" value="1" {if $return.bannerInfoIlanDetayMobil.banner_type == 1}checked="checked"{/if}> Resim ve Link<br>
									<input type="radio" name="ilanDetayMobilBanner" value="2" {if $return.bannerInfoIlanDetayMobil.banner_type == 2}checked="checked"{/if}> Html Kod
								</div>
								<div class="image-and-link" {if $return.bannerInfoIlanDetayMobil.banner_type == 1}style="display: block;"{/if}>
									<div class="col-md-8 col-md-offset-2">
										<div class="image">
											<h5 class="text-center">Resim Yükle</h5> 
											<input type="file" name="ilanDetayMobilBanner" class="form-control">
											{if $return.bannerInfoIlanDetayMobil.banner_img != ''}
												<img src="{siteUrl('files/banner')}/{$return.bannerInfoIlanDetayMobil.banner_img}" width="100%" style="margin-top: 15px;display: block;margin-left: auto;margin-right: auto;" alt="">
											{/if}
											<h5 class="text-center">veya<br><br> Resim Linki Yaz</h5> 
											<input type="url" class="form-control" value="{$return.bannerInfoIlanDetayMobil.banner_img_link}" name="ilanDetayMobilBannerImageLink">
										</div>

										<div class="bannerLink" style="margin-top: 25px;border-top: 1px solid #ddd;padding-top: 15px;">
											<h5 class="text-center">Banner Linki: </h5>
											<input type="url" class="form-control" value="{$return.bannerInfoIlanDetayMobil.banner_link}" name="ilanDetayMobilBannerLink">
										</div>
									</div>
								</div>
								<div class="html-code" {if $return.bannerInfoIlanDetayMobil.banner_type == 2}style="display: block;"{/if}>
									<textarea name="ilanDetayMobilHtmlCode" cols="30" rows="10" class="form-control">{$return.bannerInfoIlanDetayMobil.banner_html}</textarea>
								</div>
							</div>

							<div class="magazaBanner" style="border: 1px solid #ddd;overflow: hidden;padding: 25px;margin-top: 25px;margin-bottom: 25px;">
								<h4>Anasayfa Mağaza Altı (Mobil) Banneri (Responsive)</h4>
								<div class="form-group">
									<label>Seçenek: </label><br>
									<input type="radio" name="magazaBanner" value="1" {if $return.bannerInfoMagazaMobil.banner_type == 1}checked="checked"{/if}> Resim ve Link<br>
									<input type="radio" name="magazaBanner" value="2" {if $return.bannerInfoMagazaMobil.banner_type == 2}checked="checked"{/if}> Html Kod
								</div>
								<div class="image-and-link" {if $return.bannerInfoMagazaMobil.banner_type == 1}style="display: block;"{/if}>
									<div class="col-md-8 col-md-offset-2">
										<div class="image">
											<h5 class="text-center">Resim Yükle</h5> 
											<input type="file" name="magazaBanner" class="form-control">
											{if $return.bannerInfoMagazaMobil.banner_img != ''}
												<img src="{siteUrl('files/banner')}/{$return.bannerInfoMagazaMobil.banner_img}" width="100%" style="margin-top: 15px;display: block;margin-left: auto;margin-right: auto;" alt="">
											{/if}
											<h5 class="text-center">veya<br><br> Resim Linki Yaz</h5> 
											<input type="url" class="form-control" value="{$return.bannerInfoMagazaMobil.banner_img_link}" name="magazaBannerImageLink">
										</div>

										<div class="bannerLink" style="margin-top: 25px;border-top: 1px solid #ddd;padding-top: 15px;">
											<h5 class="text-center">Banner Linki: </h5>
											<input type="url" class="form-control" value="{$return.bannerInfoMagazaMobil.banner_link}" name="magazaBannerLink">
										</div>
									</div>
								</div>
								<div class="html-code" {if $return.bannerInfoMagazaMobil.banner_type == 2}style="display: block;"{/if}>
									<textarea name="magazaBannerHtmlCode" cols="30" rows="10" class="form-control">{$return.bannerInfoMagazaMobil.banner_html}</textarea>
								</div>
							</div>
							
							<button type="submit" name="save" class="btn btn-primary" style="width: 100%;">Kaydet</button>

							{literal}
								<script type="text/javascript">
									$(function() {
										$('input[type=radio]').change(function() {
											var value = $(this).val();

											if(value == 1)
											{
												$(this).parent().parent().find('.html-code').hide();
												$(this).parent().parent().find('.image-and-link').show();
											}
											else if(value == 2)
											{
												$(this).parent().parent().find('.html-code').show();
												$(this).parent().parent().find('.image-and-link').hide();
											}
										});
									});
								</script>
							{/literal}
						</div>
					</form>
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