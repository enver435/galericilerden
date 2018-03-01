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

					{if !getUrl(2)}
						<a href="{SITE_URL}/{SITE_ADMIN}/news/add">
							<button type="button" class="btn btn-primary" style="margin-bottom: 15px;margin-top: 10px;">Haber Ekle</button>
						</a>
						<div>
							<table class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th>Haber Adı</th>
										<th></th>
									</tr>
								</thead>

								<tbody>
									{if $return.news.news}
										{foreach $return.news.news as $news}
											<tr>
												<td>{$news.news_title}</td>
												<td>
													<div class="hidden-sm hidden-xs action-buttons">
														<a class="green" href="{SITE_URL}/{SITE_ADMIN}/news/edit/{$news.id}">
															<i class="ace-icon fa fa-pencil bigger-130" title="Düzenle"></i>
														</a>

														<a class="red" href="{SITE_URL}/{SITE_ADMIN}/news/delete/{$news.id}">
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
																	<a href="{SITE_URL}/{SITE_ADMIN}/news/edit/{$news.id}" class="tooltip-success" data-rel="tooltip" title="Düzenle">
																		<span class="green">
																			<i class="ace-icon fa fa-pencil bigger-120"></i>
																		</span>
																	</a>
																</li>

																<li>
																	<a href="{SITE_URL}/{SITE_ADMIN}/news/delete/{$news.id}" class="tooltip-success" data-rel="tooltip" title="Sil">
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
							<ul class="pagination pull-right">{$return.news.pagination}</ul>
						</div>
					{else}
						{if getUrl(2) == 'add'}
							{if isset($smarty.post.add)}
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
							<form action="" method="POST" enctype="multipart/form-data">
								<div class="form-group">
									<label>Haber Başlığı: </label>
									<input type="text" name="title" class="form-control" placeholder="Haber Başlığı">
								</div>
								<div class="form-group">
									<label>Haber Resmi: </label>
									<input type="file" name="image" class="form-control">
								</div>
								<div class="form-group">
									<label style="margin-bottom: -10px;">Haber İçeriği: </label>
									<textarea name="content" id="default-editor" class="form-control" cols="30" rows="10" placeholder="Haber İçeriği"></textarea>
								</div>
								<button type="submit" name="add" class="btn btn-primary pull-right">Ekle</button>
							</form>
						{elseif getUrl(2) == 'edit'}
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
							<form action="" method="POST" enctype="multipart/form-data">
								<div class="form-group">
									<label>Haber Başlığı: </label>
									<input type="text" name="title" class="form-control" value="{$return.newsInfo.news_title}" placeholder="Haber Başlığı">
								</div>
								<div class="form-group">
									<label>Haber Resmi: </label>
									<input type="file" name="image" class="form-control">
									<img src="{siteUrl('files/news/thumb')}/{$return.newsInfo.news_image}.jpg" alt="" style="margin-top: 15px;">
								</div>
								<div class="form-group">
									<label style="margin-bottom: -10px;">Haber İçeriği: </label>
									<textarea name="content" id="default-editor" class="form-control" cols="30" rows="10" placeholder="Haber İçeriği">{$return.newsInfo.news_content}</textarea>
								</div>
								<button type="submit" name="save" class="btn btn-primary pull-right">Kaydet</button>
							</form>
						{/if}
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
					{/if}
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