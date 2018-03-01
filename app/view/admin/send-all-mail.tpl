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
				<div class="col-xs-12">
					{if isset($smarty.post.sendMail)}
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
							<input type="text" name="title" class="form-control" placeholder="Mail Başlığı">
						</div>
						<div class="form-group">
							<textarea name="content" id="default-editor" class="form-control" cols="30" rows="10" placeholder="Mail İçeriği"></textarea>
						</div>
						<button type="submit" name="sendMail" class="btn btn-primary pull-right">Gönder</button>
					</form>
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