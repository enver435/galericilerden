<div id="main">
	{include file="header.tpl"}
	<div class="page-content">
		<div class="container">
			<ul class="breadcrumb">
			    <li><a href="{SITE_URL}">Anasayfa</a></li>
			    <li class="active">Şifremi Unuttum</li>
			</ul>
			<div class="row">
				<div class="col-md-6">
					<div class="block">
						<div class="block-title">
							<h5>Şifremi Unuttum</h5>
						</div>
						<div class="block-content" style="padding-top: 25px;padding-bottom: 25px;">
							<div class="col-md-12">
								{if isset($smarty.post.check) OR isset($smarty.post.change)}
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
									{if $smarty.session.token AND $smarty.get.token != ''}
										<div class="form-group">
											<label>Şifre: </label>
											<input type="password" name="pass" class="form-control">
										</div>
										<div class="form-group">
											<label>Şifre Tekrar: </label>
											<input type="password" name="pass_re" class="form-control">
										</div>
										<button type="submit" name="change" class="btn btn-primary" style="width: 100%;    padding: 10px 15px;">Şifremi Değiş</button>
									{else}
										<div class="form-group">
											<label>Email: </label>
											<input type="email" name="email" class="form-control">
										</div>
										<button type="submit" name="check" class="btn btn-primary" style="width: 100%;    padding: 10px 15px;">Gönder</button>
									{/if}
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>