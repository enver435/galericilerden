<?php /* Smarty version 3.1.27, created on 2017-10-11 13:59:47
         compiled from "C:\xampp\htdocs\galericilerden\app\view\admin\modul.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1268959de07b35b5258_94514972%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '52ca9ba302782df21d09aba2687b9e145153d6de' => 
    array (
      0 => 'C:\\xampp\\htdocs\\galericilerden\\app\\view\\admin\\modul.tpl',
      1 => 1504699739,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1268959de07b35b5258_94514972',
  'variables' => 
  array (
    'return' => 0,
    'list' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_59de07b36266f9_65373744',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_59de07b36266f9_65373744')) {
function content_59de07b36266f9_65373744 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1268959de07b35b5258_94514972';
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
						<?php if (getUrl(2) != 'add') {?>
							<a href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/modul/add">
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
										<?php if ($_smarty_tpl->tpl_vars['return']->value['modulList']) {?>
											<?php
$_from = $_smarty_tpl->tpl_vars['return']->value['modulList'];
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
													<td><?php echo $_smarty_tpl->tpl_vars['list']->value['Id'];?>
</td>
													<td><?php echo $_smarty_tpl->tpl_vars['list']->value['name'];?>
</td>
													<td>
														<div class="hidden-sm hidden-xs action-buttons">
															<a class="green" href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/modul-options/<?php echo $_smarty_tpl->tpl_vars['list']->value['Id'];?>
">
																<i class="ace-icon fa fa-check-square bigger-130" title="Seçenekler"></i>
															</a>

															<a class="green" href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/modul-features/<?php echo $_smarty_tpl->tpl_vars['list']->value['Id'];?>
">
																<i class="ace-icon fa fa-clone bigger-130" title="Özellikler"></i>
															</a>

															<a class="red" href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/modul/delete/<?php echo $_smarty_tpl->tpl_vars['list']->value['Id'];?>
">
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
																		<a href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/modul-options/<?php echo $_smarty_tpl->tpl_vars['list']->value['Id'];?>
" class="tooltip-success" data-rel="tooltip" title="Seçenekler">
																			<span class="green">
																				<i class="ace-icon fa fa-check-square bigger-120"></i>
																			</span>
																		</a>
																	</li>

																	<li>
																		<a href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/modul-features/<?php echo $_smarty_tpl->tpl_vars['list']->value['Id'];?>
" class="tooltip-success" data-rel="tooltip" title="Özellikler">
																			<span class="green">
																				<i class="ace-icon fa fa-clone bigger-120"></i>
																			</span>
																		</a>
																	</li>

																	<li>
																		<a href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/modul/delete/<?php echo $_smarty_tpl->tpl_vars['list']->value['Id'];?>
" class="tooltip-success" data-rel="tooltip" title="Sil">
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
											<?php
$_smarty_tpl->tpl_vars['list'] = $foreach_list_Sav;
}
?>
										<?php }?>
									</tbody>
								</table>
							</div>
						<?php } else { ?>
							<?php if (getUrl(2) == 'add') {?>
								<?php if (isset($_POST['add'])) {?>
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
										<label>Modül Adı: </label>
										<input type="text" name="name" class="form-control">
									</div>
									<button type="submit" name="add" class="btn btn-primary pull-right">Ekle</button>
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