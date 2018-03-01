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
						<div class="col-sm-6"></div>
						<div class="col-sm-6" style="text-align: right;margin-top: 15px;margin-bottom: 15px;">
							<form action="" method="GET">
								<label><input type="text" name="s" id="s" class="form-control input-sm" placeholder="" aria-controls="example1" required=""></label> <input type="submit" class="btn btn-primary btn-sm" value="ara">
							</form>
						</div>
						{if getUrl(2) != 'edit'}
							<div>
								<table id="dynamic-table" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>Kategori Adı</th>
											<th>Üst Kategori</th>
											<th>Modül</th>
											<th></th>
										</tr>
									</thead>

									<tbody>
										{if $return.categoryList.categoryList}
											{foreach $return.categoryList.categoryList as $list}
												<tr>
													<td>{$list.kategori_adi}</td>
													<td>{if !categoryInfo($list.ustkategoriId, 'kategori_adi')}Yok{else}{categoryInfo($list.ustkategoriId, 'kategori_adi')}{/if}</td>
													<td>{if !modulInfo($list.modul, 'name')}Yok{else}{modulInfo($list.modul, 'name')}{/if}</td>
													<td>
														<div class="hidden-sm hidden-xs action-buttons">
															<a class="green" href="{SITE_URL}/{SITE_ADMIN}/category/edit/{$list.Id}">
																<i class="ace-icon fa fa-pencil bigger-130" title="Düzenle"></i>
															</a>
														</div>

														<div class="hidden-md hidden-lg">
															<div class="inline pos-rel">
																<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
																	<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
																</button>

																<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
																	<li>
																		<a href="{SITE_URL}/{SITE_ADMIN}/category/edit/{$list.Id}" class="tooltip-success" data-rel="tooltip" title="Düzenle">
																			<span class="green">
																				<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																			</span>
																		</a>
																	</li>
																</ul>
															</div>
														</div>
													</td>
												</tr>
											{/foreach}
										{else}
											<td>Bir kayıt bulunamadı</td>
											<td></td>
											<td></td>
											<td></td>
										{/if}
									</tbody>
								</table>
								<ul class="pagination pull-right">{$return.categoryList.pagination}</ul>
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
										<label>Kategori Adı: </label>
										<input type="text" name="category_name" value="{$return.categoryInfo.kategori_adi}" class="form-control">
									</div>
									<div class="form-group">
										<label>Modül: </label>
										<select name="category_modul" class="form-control">
											<option value="0">Modülsüz</option>
											{foreach $return.modulList as $modul}
												<option value="{$modul.Id}" {if $return.categoryInfo.modul == $modul.Id}selected="selected"{/if}>{$modul.name}</option>
											{/foreach}
										</select>
									</div>
									<button type="submit" name="save" class="btn btn-primary pull-right">Kaydet</button>
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