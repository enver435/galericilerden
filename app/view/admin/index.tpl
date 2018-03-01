{if !$smarty.session.adminLogin}
	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<span class="white" id="id-text2">Galericilerden</span>
								</h1>
								<h4 class="blue" id="id-company-text">Admin Panel</h4>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												Kullanıcı Adı ve Şifrenizi Giriniz
											</h4>

											<div class="space-6"></div>

											<form action="" method="POST">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" name="user" class="form-control" placeholder="Kullanıcı Adı" />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" name="pass" class="form-control" placeholder="Şifre" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">
														<button type="submit" name="login" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">Giriş Yap</span>
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
{else}
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

				<div class="page-content" style="min-height: 100%;">
					{literal}
						<style type="text/css">
							.page-content {background-color: #ecf0f5;min-height: 850px;}
							.info-box {
							    display: block;
							    min-height: 90px;
							    background: #fff;
							    width: 100%;
							    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
							    border-radius: 2px;
							    margin-bottom: 15px;
							}

							.info-box-icon {
							    border-top-left-radius: 2px;
							    border-top-right-radius: 0;
							    border-bottom-right-radius: 0;
							    border-bottom-left-radius: 2px;
							    display: block;
							    float: left;
							    height: 90px;
							    width: 90px;
							    text-align: center;
							    font-size: 45px;
							    line-height: 90px;
							    background: rgba(0,0,0,0.2);
						        color: #fff !important;
					            background-color: #00c0ef !important;
							}

							.info-box-icon i {
								line-height: 90px;
							}

							.info-box-content {
								padding: 5px 10px;
    							margin-left: 90px;
							}

							.progress-description, .info-box-text {
								display: block;
							    font-size: 14px;
							    white-space: nowrap;
							    overflow: hidden;
							    text-overflow: ellipsis;
							}

							.info-box-number {
							    display: block;
							    font-weight: bold;
							    font-size: 18px;
							}

							.info-box small {
							    font-size: 14px;
							}
						</style>
					{/literal}
					<div class="row" style="margin-top: 25px;">
						<div class="col-xs-12">
					        <div class="col-md-4 col-sm-7 col-xs-12">
					          	<div class="info-box">
					            	<span class="info-box-icon bg-aqua"><i class="fa fa-shopping-bag"></i></span>

					            	<div class="info-box-content">
					              		<span class="info-box-text">Onay Bekleyen Mağaza Sayısı</span>
					              		<span class="info-box-number">{if $return.pendingStoreCount !== false}{$return.pendingStoreCount|count}{else}0{/if}</span>
					           		</div>
					          	</div>
					        </div>
					        <div class="col-md-4 col-sm-7 col-xs-12">
					          	<div class="info-box">
					            	<span class="info-box-icon bg-aqua"><i class="fa fa-shopping-bag"></i></span>

					            	<div class="info-box-content">
					              		<span class="info-box-text">Toplam Aktif Mağaza Sayısı</span>
					              		<span class="info-box-number">{if $return.allActiveStoreCount !== false}{$return.allActiveStoreCount|count}{else}0{/if}</span>
					           		</div>
					          	</div>
					        </div>
					        <div class="col-md-4 col-sm-7 col-xs-12">
					          	<div class="info-box">
					            	<span class="info-box-icon bg-aqua"><i class="fa fa-picture-o"></i></span>

					            	<div class="info-box-content">
					              		<span class="info-box-text">Toplam İlan Sayısı</span>
					              		<span class="info-box-number">{if $return.allAdsCount !== false}{$return.allAdsCount|count}{else}0{/if}</span>
					           		</div>
					          	</div>
					        </div>
					        <div class="col-md-4 col-sm-7 col-xs-12">
					          	<div class="info-box">
					            	<span class="info-box-icon bg-aqua"><i class="fa fa-picture-o"></i></span>

					            	<div class="info-box-content">
					              		<span class="info-box-text">Onay Bekleyen İlan Sayısı</span>
					              		<span class="info-box-number">{if $return.pendingAdsCount !== false}{$return.pendingAdsCount|count}{else}0{/if}</span>
					           		</div>
					          	</div>
					        </div>
					        <div class="col-md-4 col-sm-7 col-xs-12">
					          	<div class="info-box">
					            	<span class="info-box-icon bg-aqua"><i class="fa fa-picture-o"></i></span>

					            	<div class="info-box-content">
					              		<span class="info-box-text">Toplam Aktif İlan Sayısı</span>
					              		<span class="info-box-number">{if $return.allActiveAdsCount !== false}{$return.allActiveAdsCount|count}{else}0{/if}</span>
					           		</div>
					          	</div>
					        </div>
					        <div class="col-md-4 col-sm-7 col-xs-12">
					          	<div class="info-box">
					            	<span class="info-box-icon bg-aqua"><i class="fa fa-picture-o"></i></span>

					            	<div class="info-box-content">
					              		<span class="info-box-text">Toplam Pasif İlan Sayısı</span>
					              		<span class="info-box-number">{if $return.allPassiveAdsCount !== false}{$return.allPassiveAdsCount|count}{else}0{/if}</span>
					           		</div>
					          	</div>
					        </div>
					        <div class="col-md-4 col-sm-7 col-xs-12">
					          	<div class="info-box">
					            	<span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>

					            	<div class="info-box-content">
					              		<span class="info-box-text">Toplam Üye Sayısı</span>
					              		<span class="info-box-number">{if $return.usersCount !== false}{$return.usersCount|count}{else}0{/if}</span>
					           		</div>
					          	</div>
					        </div>
					        <div class="col-md-4 col-sm-7 col-xs-12">
					          	<div class="info-box">
					            	<span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>

					            	<div class="info-box-content">
					              		<span class="info-box-text">Toplam Günlük Ziyaretçi Sayısı</span>
					              		<span class="info-box-number">{if $return.dailyVisitors !== false}{$return.dailyVisitors|count}{else}0{/if}</span>
					           		</div>
					          	</div>
					        </div>
						</div>
					</div>
				</div>

				<div class="page-content" style="background-color: #fff;">
					<div class="corporate-request-list">
						<h3>Kurumsal üye istekleri</h3>
						<table id="dynamic-table" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Kullanıcı</th>
									<th>Numarası</th>
									<th>Email</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								{if $return.corporateRequestUsers}
									{assign var=i value=1}

									{foreach $return.corporateRequestUsers as $user}
										<tr>
											<td>{$i}</td>
											<td>{$user.name|capitalize} {$user.surname|capitalize}</td>
											<td>{$user.phone}</td>
											<td>{$user.email}</td>
											<td>
												<div class="hidden-sm hidden-xs action-buttons">
													<form action="" method="POST">
														<div class="col-lg-8 col-lg-offset-2 col-md-12 col-md-offset-0">
															<div class="row" style="padding: 0;background-color: transparent;border: none;">
																<div class="col-xs-8">
																	<select name="activity_area" style="width: 100%;" class="form-control">
																		<option value="empty">Seç</option>
																		<option value="0">Kurumsal Yapma</option>
																		<option value="1">Galeri</option>
																		<option value="2">Yetkili Bayi</option>
																		<option value="3">Üretici Firma</option>
																	</select>
																</div>
																<div class="col-xs-4">
																	<button type="submit" name="corporateUpdate" class="btn btn-primary" style="padding: 0px 10px;">Git</button>
																</div>
															</div>
														</div>
													</form>
												</div>

												<div class="hidden-md hidden-lg">
													<form action="" method="POST">
														<div class="row" style="padding: 0;background-color: transparent;border: none;">
															<div class="col-xs-12" style="padding: 0;margin-bottom: 5px;">
																<select name="activity_area" style="width: 100%;margin: 0;" class="form-control">
																	<option value="empty">Seç</option>
																	<option value="0">Kurumsal Yapma</option>
																	<option value="1">Galeri</option>
																	<option value="2">Yetkili Bayi</option>
																	<option value="3">Üretici Firma</option>
																</select>
															</div>
															<div class="col-xs-12" style="padding: 0;">
																<button type="submit" name="corporateUpdate" class="btn btn-primary" style="width: 100%;padding: 0px 10px;">Git</button>
															</div>
														</div>
													</form>
												</div>
											</td>
										</tr>

										{$i=$i+1}
									{/foreach}
								{/if}
							</tbody>
						</table>
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
{/if}