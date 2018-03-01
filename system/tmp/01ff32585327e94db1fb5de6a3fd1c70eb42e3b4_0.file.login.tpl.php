<?php /* Smarty version 3.1.27, created on 2017-09-17 05:58:51
         compiled from "C:\xampp\htdocs\galericilerden\app\view\login.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2821859bdf2fbee2b32_03219766%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '01ff32585327e94db1fb5de6a3fd1c70eb42e3b4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\galericilerden\\app\\view\\login.tpl',
      1 => 1505619828,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2821859bdf2fbee2b32_03219766',
  'variables' => 
  array (
    'return' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_59bdf2fbf34bc2_44664644',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_59bdf2fbf34bc2_44664644')) {
function content_59bdf2fbf34bc2_44664644 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2821859bdf2fbee2b32_03219766';
?>
<div id="main" class="login">
	<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

	<div class="page-content">
		<div class="container">
			<ul class="breadcrumb">
			    <li><a href="<?php echo SITE_URL;?>
">Anasayfa</a></li>
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
								<?php if (isset($_POST['login'])) {?>
									<?php if ($_smarty_tpl->tpl_vars['return']->value['messageType'] == 'success') {?>
										<div class="alert alert-success">
											<strong>Başarılı!</strong> <?php echo $_smarty_tpl->tpl_vars['return']->value['message'];?>

										</div>
									<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['messageType'] == 'error') {?>
										<div class="alert alert-danger">
											<strong>Başarısız!</strong> <?php echo $_smarty_tpl->tpl_vars['return']->value['message'];?>

										</div>
									<?php }?>
								<?php }?>
								<form action="" method="POST">
									<div class="form-group">
										<label>Email: </label>
										<input type="email" name="email" placeholder="Email" class="form-control">
									</div>
									<div class="form-group">
										<label>Şifre: </label>
										<input type="password" name="pass" placeholder="Şifre" class="form-control">
									</div>
									<a href="<?php echo siteUrl('forgot');?>
" style="text-align: right;display: block;margin-bottom: 15px;">Şifremi unuttum</a>
									<button type="submit" name="login" class="btn btn-primary">Giriş Yap</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><?php }
}
?>