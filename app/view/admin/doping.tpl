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
						{if getUrl(2) != 'edit'}
							<div>
								<table id="dynamic-table" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>Doping No</th>
											<th>Doping Adı</th>
											<th></th>
										</tr>
									</thead>

									<tbody>
										{if $return.dopingList}
											{foreach $return.dopingList as $list}
												<tr>
													<td>{$list.id}</td>
													<td>{$list.doping_name}</td>
													<td>
														<div class="hidden-sm hidden-xs action-buttons">
															<a class="green" href="{SITE_URL}/{SITE_ADMIN}/doping/edit/{$list.id}">
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
																		<a href="{SITE_URL}/{SITE_ADMIN}/doping/edit/{$list.id}" class="tooltip-success" data-rel="tooltip" title="Düzenle">
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
									<div class="form-group">
										<label>Doping Adı: </label>
										<input type="text" name="doping_name" value="{$return.dopingInfo.doping_name}" class="form-control">
									</div>
									<div class="form-group">
										<label>Doping Açıklaması: </label>
										<textarea name="doping_text" cols="30" rows="10" class="form-control">{$return.dopingInfo.doping_text}</textarea>
									</div>
									<div class="alert alert-info"><strong>Bilgi!</strong> Doping fiyatına 0 yazarsanız ücretsiz olur</div>
									<div class="form-group">
										<label>Doping Fiyatı (Bireysel kullanıcılar için): </label>
										<div class="input-group">
											<input type="number" step="any" name="doping_individual_price" value="{$return.dopingInfo.doping_individual_price}" class="form-control">
											<span class="input-group-addon">TL</span>
										</div>
									</div>
									<div class="form-group">
										<label>Doping Fiyatı (Kurumsal kullanıcılar için): </label>
										<div class="input-group">
											<input type="number" step="any" name="doping_corporate_price" value="{$return.dopingInfo.doping_corporate_price}" class="form-control">
											<span class="input-group-addon">TL</span>
										</div>
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