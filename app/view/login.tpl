<div id="main" class="login">
	{include file="header.tpl"}
	<div class="page-content">
		<div class="container">
			<ul class="breadcrumb">
			    <li><a href="{SITE_URL}">Anasayfa</a></li>
			    <li class="active">Giriş Yap</li>
			</ul>
			<div class="row">
				<div class="col-md-6">
					<div class="block">
						<div class="block-title">
							<h5>Giriş Yap</h5>
						</div>
						<div class="block-content">
							<div class="col-md-12">
								{if isset($smarty.post.login)}
									{if $return.messageType == 'success'}
										<div class="alert alert-success">
											<strong>Başarılı!</strong> {$return.message}
										</div>
									{elseif $return.messageType == 'error'}
										<div class="alert alert-danger">
											<strong>Başarısız!</strong> {$return.message}
										</div>
									{/if}
								{/if}
								<form action="" method="POST">
									<div class="form-group">
										<label>Email: </label>
										<input type="email" name="email" placeholder="Email" class="form-control">
									</div>
									<div class="form-group">
										<label>Şifre: </label>
										<input type="password" name="pass" placeholder="Şifre" class="form-control">
									</div>
									<a href="{siteUrl('forgot')}" style="text-align: right;display: block;margin-bottom: 15px;">Şifremi unuttum</a>
									<button type="submit" name="login" class="btn btn-primary">Giriş Yap</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>