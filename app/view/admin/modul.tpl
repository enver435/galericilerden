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
						{if getUrl(2) != 'add'}
							<a href="{SITE_URL}/{SITE_ADMIN}/modul/add">
								<button type="button" class="btn btn-primary" style="margin-bottom: 15px;margin-top: 10px;">Modül Ekle</button>
							</a>
							<div>
								<table id="dynamic-table" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>Modül No</th>
											<th>Modül Adı</th>
											<th></th>
										</tr>
									</thead>

									<tbody>
										{if $return.modulList}
											{foreach $return.modulList as $list}
												<tr>
													<td>{$list.Id}</td>
													<td>{$list.name}</td>
													<td>
														<div class="hidden-sm hidden-xs action-buttons">
															<a class="green" href="{SITE_URL}/{SITE_ADMIN}/modul-options/{$list.Id}">
																<i class="ace-icon fa fa-check-square bigger-130" title="Seçenekler"></i>
															</a>

															<a class="green" href="{SITE_URL}/{SITE_ADMIN}/modul-features/{$list.Id}">
																<i class="ace-icon fa fa-clone bigger-130" title="Özellikler"></i>
															</a>

															<a class="red" href="{SITE_URL}/{SITE_ADMIN}/modul/delete/{$list.Id}">
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
																		<a href="{SITE_URL}/{SITE_ADMIN}/modul-options/{$list.Id}" class="tooltip-success" data-rel="tooltip" title="Seçenekler">
																			<span class="green">
																				<i class="ace-icon fa fa-check-square bigger-120"></i>
																			</span>
																		</a>
																	</li>

																	<li>
																		<a href="{SITE_URL}/{SITE_ADMIN}/modul-features/{$list.Id}" class="tooltip-success" data-rel="tooltip" title="Özellikler">
																			<span class="green">
																				<i class="ace-icon fa fa-clone bigger-120"></i>
																			</span>
																		</a>
																	</li>

																	<li>
																		<a href="{SITE_URL}/{SITE_ADMIN}/modul/delete/{$list.Id}" class="tooltip-success" data-rel="tooltip" title="Sil">
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
										<label>Modül Adı: </label>
										<input type="text" name="name" class="form-control">
									</div>
									<button type="submit" name="add" class="btn btn-primary pull-right">Ekle</button>
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