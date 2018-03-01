<?php /* Smarty version 3.1.27, created on 2017-09-23 14:30:32
         compiled from "C:\xampp\htdocs\galericilerden\app\view\admin\category.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:3150459c653e882b448_53646622%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '783feab2a1f6f390c34bce3fac5b0d2e0fa88fe5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\galericilerden\\app\\view\\admin\\category.tpl',
      1 => 1503591167,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3150459c653e882b448_53646622',
  'variables' => 
  array (
    'return' => 0,
    'list' => 0,
    'modul' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_59c653e8909ef6_66521767',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_59c653e8909ef6_66521767')) {
function content_59c653e8909ef6_66521767 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '3150459c653e882b448_53646622';
?>
<body class="no-skin">
<div class="main-container ace-save-state" id="main-container">
	
		<?php echo '<script'; ?>
 type="text/javascript">
			try{ace.settings.loadState('main-container')}catch(e){}
		<?php echo '</script'; ?>
>
	

	<?php echo $_smarty_tpl->getSubTemplate ("admin/static/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

	
	<div class="main-content">
		<div class="main-content-inner">
			<div class="breadcrumbs ace-save-state" id="breadcrumbs">
				<ul class="breadcrumb" style="margin-top: 10px;">
					<li>
						<i class="ace-icon fa fa-home home-icon"></i>
						<a href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
">Ana Sayfa</a>
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
						<?php if (getUrl(2) != 'edit') {?>
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
										<?php if ($_smarty_tpl->tpl_vars['return']->value['categoryList']['categoryList']) {?>
											<?php
$_from = $_smarty_tpl->tpl_vars['return']->value['categoryList']['categoryList'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['list'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['list']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['list']->value) {
$_smarty_tpl->tpl_vars['list']->_loop = true;
$foreach_list_Sav = $_smarty_tpl->tpl_vars['list'];
?>
												<tr>
													<td><?php echo $_smarty_tpl->tpl_vars['list']->value['kategori_adi'];?>
</td>
													<td><?php if (!categoryInfo($_smarty_tpl->tpl_vars['list']->value['ustkategoriId'],'kategori_adi')) {?>Yok<?php } else {
echo categoryInfo($_smarty_tpl->tpl_vars['list']->value['ustkategoriId'],'kategori_adi');
}?></td>
													<td><?php if (!modulInfo($_smarty_tpl->tpl_vars['list']->value['modul'],'name')) {?>Yok<?php } else {
echo modulInfo($_smarty_tpl->tpl_vars['list']->value['modul'],'name');
}?></td>
													<td>
														<div class="hidden-sm hidden-xs action-buttons">
															<a class="green" href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/category/edit/<?php echo $_smarty_tpl->tpl_vars['list']->value['Id'];?>
">
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
																		<a href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/category/edit/<?php echo $_smarty_tpl->tpl_vars['list']->value['Id'];?>
" class="tooltip-success" data-rel="tooltip" title="Düzenle">
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
											<?php
$_smarty_tpl->tpl_vars['list'] = $foreach_list_Sav;
}
?>
										<?php } else { ?>
											<td>Bir kayıt bulunamadı</td>
											<td></td>
											<td></td>
											<td></td>
										<?php }?>
									</tbody>
								</table>
								<ul class="pagination pull-right"><?php echo $_smarty_tpl->tpl_vars['return']->value['categoryList']['pagination'];?>
</ul>
							</div>
						<?php } else { ?>
							<?php if (getUrl(2) == 'edit') {?>
								<?php if (isset($_POST['save'])) {?>
									<?php if ($_smarty_tpl->tpl_vars['return']->value['messageType'] == 'success') {?>
										<div class="alert alert-success">
											<strong>Başarılı!</strong> <?php echo $_smarty_tpl->tpl_vars['return']->value['message'];?>

										</div>
									<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['messageType'] == 'error') {?>
										<div class="alert alert-danger">
											<strong>Hata!</strong> <?php echo $_smarty_tpl->tpl_vars['return']->value['message'];?>

										</div>
									<?php }?>
								<?php }?>
								<form action="" method="POST">
									<div class="form-group">
										<label>Kategori Adı: </label>
										<input type="text" name="category_name" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['categoryInfo']['kategori_adi'];?>
" class="form-control">
									</div>
									<div class="form-group">
										<label>Modül: </label>
										<select name="category_modul" class="form-control">
											<option value="0">Modülsüz</option>
											<?php
$_from = $_smarty_tpl->tpl_vars['return']->value['modulList'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['modul'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['modul']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['modul']->value) {
$_smarty_tpl->tpl_vars['modul']->_loop = true;
$foreach_modul_Sav = $_smarty_tpl->tpl_vars['modul'];
?>
												<option value="<?php echo $_smarty_tpl->tpl_vars['modul']->value['Id'];?>
" <?php if ($_smarty_tpl->tpl_vars['return']->value['categoryInfo']['modul'] == $_smarty_tpl->tpl_vars['modul']->value['Id']) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['modul']->value['name'];?>
</option>
											<?php
$_smarty_tpl->tpl_vars['modul'] = $foreach_modul_Sav;
}
?>
										</select>
									</div>
									<button type="submit" name="save" class="btn btn-primary pull-right">Kaydet</button>
								</form>
							<?php }?>
						<?php }?>
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
</div><?php }
}
?>