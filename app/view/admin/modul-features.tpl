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
						{if getUrl(2) != 'add' AND getUrl(2) != 'edit'}
							<a href="{SITE_URL}/{SITE_ADMIN}/modul-features/add/{getUrl(2)}">
								<button type="button" class="btn btn-primary" style="margin-bottom: 15px;margin-top: 10px;">Grup Ekle</button>
							</a>
							<div>
								<table id="dynamic-table" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>Grup Adı</th>
											<th></th>
										</tr>
									</thead>

									<tbody>
										{if $return.modulFeatures}
											{foreach $return.modulFeatures as $list}
												<tr>
													<td>{$list.name}</td>
													<td>
														<div class="hidden-sm hidden-xs action-buttons">
															<a class="green" href="{SITE_URL}/{SITE_ADMIN}/modul-features/edit/{$list.Id}">
																<i class="ace-icon fa fa-pencil bigger-130" title="Düzenle"></i>
															</a>

															<a class="red" href="{SITE_URL}/{SITE_ADMIN}/modul-features/delete/{$list.Id}">
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
																		<a href="{SITE_URL}/{SITE_ADMIN}/modul-features/edit/{$list.Id}" class="tooltip-success" data-rel="tooltip" title="Düzenle">
																			<span class="green">
																				<i class="ace-icon fa fa-pencil bigger-120"></i>
																			</span>
																		</a>
																	</li>

																	<li>
																		<a href="{SITE_URL}/{SITE_ADMIN}/modul-features/delete/{$list.Id}" class="tooltip-success" data-rel="tooltip" title="Sil">
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
								<form action="" method="POST">
									<div class="form-group">
										<label>Grup Adı: </label>
										<input type="text" name="name" class="form-control">
									</div>
									<div class="options">
										<h4>Özellikler: </h4>
										<button type="button" name="add-select" class="btn btn-primary btn-xs" style="margin-bottom: 15px;">Özellik Ekle</button>
										<h5 class="text-danger" style="margin-top: 0;">Özellik Yok</h5>
									</div>
									<button type="submit" name="add" class="btn btn-primary pull-right">Ekle</button>
								</form>
								{literal}
									<script type="text/javascript">
										$(function() {
											$('button[name=add-select]').click(function() {
												$('.options').append('\
													<div class="form-group">\
														<div class="input-group">\
															<input type="text" name="item[0][]" class="form-control">\
															<span class="input-group-addon" style="cursor: pointer;"><i class="fa fa-trash-o"></i></span>\
														</div>\
													</div>\
												');

												$('.options h5').remove();
											});

											$('.options').on('click', '.input-group-addon', function() {
												$(this).parent().parent().remove();
											});
										});
									</script>
								{/literal}
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
								<form action="" method="POST">
									<div class="form-group">
										<label>Seçenek Adı: </label>
										<input type="text" name="name" value="{$return.modulFeatureGroupInfo.name}" class="form-control">
									</div>
									<div class="options">
										<h4>Seçenekler: </h4>
										<button type="button" name="add-select" class="btn btn-primary btn-xs" style="margin-bottom: 15px;">Seçenek Ekle</button>
										{if $return.modulFeaturesList}
											{foreach $return.modulFeaturesList as $list}
												<div class="form-group">
													<div class="input-group">
														<input type="text" name="item[{$list.Id}][]" value="{$list.name}" class="form-control">
														<span class="input-group-addon" style="cursor: pointer;"><i class="fa fa-trash-o"></i></span>
													</div>
												</div>
											{/foreach}
										{else}
											<h5 class="text-danger" style="margin-top: 0;">Seçenek Yok</h5>
										{/if}
									</div>
									<button type="submit" name="save" class="btn btn-primary pull-right">Kaydet</button>
								</form>
								{literal}
									<script type="text/javascript">
										$(function() {
											$('button[name=add-select]').click(function() {
												$('.options').append('\
													<div class="form-group">\
														<div class="input-group">\
															<input type="text" name="item[0][]" class="form-control">\
															<span class="input-group-addon" style="cursor: pointer;"><i class="fa fa-trash-o"></i></span>\
														</div>\
													</div>\
												');
											});

											$('.options').on('click', '.input-group-addon', function() {
												var val = $(this).parent().find('input').attr('value');

												if(val == '')
												{
													$(this).parent().parent().remove();
												}
												else
												{
													var name = $(this).parent().find('input').attr('name');
													name = 'delete-item[' + name.split('item[')[1].split(']')[0] + '][]';

													$(this).parent().hide().find('input').attr('name', name);
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