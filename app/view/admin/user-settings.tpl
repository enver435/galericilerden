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
								<label>Bireysel Kullanıcı Yıllık İlan Limiti: </label>
								<input type="number" name="individual_ad_limit" value="{getSetting('individual_ad_limit')}" class="form-control">
							</div>
							<div class="form-group">
								<label>Kurumsal Kullanıcı Yıllık İlan Limiti: </label>
								<input type="number" name="corporate_ad_limit" value="{getSetting('corporate_ad_limit')}" class="form-control">
							</div>
							<div class="form-group">
								<label>Bireysel Kullanıcı İlan Resim Limiti: </label>
								<input type="number" name="individual_upload" value="{getSetting('individual_upload')}" class="form-control">
							</div>
							<div class="form-group">
								<label>Kurumsal Kullanıcı İlan Resim Limiti: </label>
								<input type="number" name="corporate_upload" value="{getSetting('corporate_upload')}" class="form-control">
							</div>
							<div class="form-group">
								<label>Bireysel Kullanıcı İlan Fıyatı (Eğer yıllık ilan limiti dolmuşsa ödenecek tutar): </label>
								<div class="input-group">
									<input type="number" step="any" name="individual_ad_limit_price" value="{getSetting('individual_ad_limit_price')}" class="form-control">
									<span class="input-group-addon">TL</span>
								</div>
							</div>
							<button type="submit" name="save" class="btn btn-primary pull-right">Kaydet</button>
						</form>
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