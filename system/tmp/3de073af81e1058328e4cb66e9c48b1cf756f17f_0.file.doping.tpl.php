<?php /* Smarty version 3.1.27, created on 2017-09-15 19:28:10
         compiled from "C:\xampp\htdocs\galericilerden\app\view\admin\doping.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2190859bc0daa6fec68_01512903%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3de073af81e1058328e4cb66e9c48b1cf756f17f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\galericilerden\\app\\view\\admin\\doping.tpl',
      1 => 1503574349,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2190859bc0daa6fec68_01512903',
  'variables' => 
  array (
    'return' => 0,
    'list' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_59bc0daa7683f9_08558479',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_59bc0daa7683f9_08558479')) {
function content_59bc0daa7683f9_08558479 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2190859bc0daa6fec68_01512903';
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
						<?php if (getUrl(2) != 'edit') {?>
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
										<?php if ($_smarty_tpl->tpl_vars['return']->value['dopingList']) {?>
											<?php
$_from = $_smarty_tpl->tpl_vars['return']->value['dopingList'];
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
													<td><?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
</td>
													<td><?php echo $_smarty_tpl->tpl_vars['list']->value['doping_name'];?>
</td>
													<td>
														<div class="hidden-sm hidden-xs action-buttons">
															<a class="green" href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/doping/edit/<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
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
/doping/edit/<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
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
										<?php }?>
									</tbody>
								</table>
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
										<label>Doping Adı: </label>
										<input type="text" name="doping_name" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['dopingInfo']['doping_name'];?>
" class="form-control">
									</div>
									<div class="form-group">
										<label>Doping Açıklaması: </label>
										<textarea name="doping_text" cols="30" rows="10" class="form-control"><?php echo $_smarty_tpl->tpl_vars['return']->value['dopingInfo']['doping_text'];?>
</textarea>
									</div>
									<div class="alert alert-info"><strong>Bilgi!</strong> Doping fiyatına 0 yazarsanız ücretsiz olur</div>
									<div class="form-group">
										<label>Doping Fiyatı (Bireysel kullanıcılar için): </label>
										<div class="input-group">
											<input type="number" step="any" name="doping_individual_price" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['dopingInfo']['doping_individual_price'];?>
" class="form-control">
											<span class="input-group-addon">TL</span>
										</div>
									</div>
									<div class="form-group">
										<label>Doping Fiyatı (Kurumsal kullanıcılar için): </label>
										<div class="input-group">
											<input type="number" step="any" name="doping_corporate_price" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['dopingInfo']['doping_corporate_price'];?>
" class="form-control">
											<span class="input-group-addon">TL</span>
										</div>
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