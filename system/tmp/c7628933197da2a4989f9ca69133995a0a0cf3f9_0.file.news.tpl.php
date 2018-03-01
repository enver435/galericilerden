<?php /* Smarty version 3.1.27, created on 2017-10-12 15:21:29
         compiled from "C:\xampp\htdocs\galericilerden\app\view\admin\news.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2642159df6c59819305_56001540%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c7628933197da2a4989f9ca69133995a0a0cf3f9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\galericilerden\\app\\view\\admin\\news.tpl',
      1 => 1507797746,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2642159df6c59819305_56001540',
  'variables' => 
  array (
    'return' => 0,
    'news' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_59df6c59aa9798_89511598',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_59df6c59aa9798_89511598')) {
function content_59df6c59aa9798_89511598 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2642159df6c59819305_56001540';
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
				<div class="col-xs-12">

					<?php if (!getUrl(2)) {?>
						<a href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/news/add">
							<button type="button" class="btn btn-primary" style="margin-bottom: 15px;margin-top: 10px;">Haber Ekle</button>
						</a>
						<div>
							<table class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th>Haber Adı</th>
										<th></th>
									</tr>
								</thead>

								<tbody>
									<?php if ($_smarty_tpl->tpl_vars['return']->value['news']['news']) {?>
										<?php
$_from = $_smarty_tpl->tpl_vars['return']->value['news']['news'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['news'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['news']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['news']->value) {
$_smarty_tpl->tpl_vars['news']->_loop = true;
$foreach_news_Sav = $_smarty_tpl->tpl_vars['news'];
?>
											<tr>
												<td><?php echo $_smarty_tpl->tpl_vars['news']->value['news_title'];?>
</td>
												<td>
													<div class="hidden-sm hidden-xs action-buttons">
														<a class="green" href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/news/edit/<?php echo $_smarty_tpl->tpl_vars['news']->value['id'];?>
">
															<i class="ace-icon fa fa-pencil bigger-130" title="Düzenle"></i>
														</a>

														<a class="red" href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/news/delete/<?php echo $_smarty_tpl->tpl_vars['news']->value['id'];?>
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
/news/edit/<?php echo $_smarty_tpl->tpl_vars['news']->value['id'];?>
" class="tooltip-success" data-rel="tooltip" title="Düzenle">
																		<span class="green">
																			<i class="ace-icon fa fa-pencil bigger-120"></i>
																		</span>
																	</a>
																</li>

																<li>
																	<a href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/news/delete/<?php echo $_smarty_tpl->tpl_vars['news']->value['id'];?>
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
$_smarty_tpl->tpl_vars['news'] = $foreach_news_Sav;
}
?>
									<?php }?>
								</tbody>
							</table>
							<ul class="pagination pull-right"><?php echo $_smarty_tpl->tpl_vars['return']->value['news']['pagination'];?>
</ul>
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
							<form action="" method="POST" enctype="multipart/form-data">
								<div class="form-group">
									<label>Haber Başlığı: </label>
									<input type="text" name="title" class="form-control" placeholder="Haber Başlığı">
								</div>
								<div class="form-group">
									<label>Haber Resmi: </label>
									<input type="file" name="image" class="form-control">
								</div>
								<div class="form-group">
									<label style="margin-bottom: -10px;">Haber İçeriği: </label>
									<textarea name="content" id="default-editor" class="form-control" cols="30" rows="10" placeholder="Haber İçeriği"></textarea>
								</div>
								<button type="submit" name="add" class="btn btn-primary pull-right">Ekle</button>
							</form>
						<?php } elseif (getUrl(2) == 'edit') {?>
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
							<form action="" method="POST" enctype="multipart/form-data">
								<div class="form-group">
									<label>Haber Başlığı: </label>
									<input type="text" name="title" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['return']->value['newsInfo']['news_title'];?>
" placeholder="Haber Başlığı">
								</div>
								<div class="form-group">
									<label>Haber Resmi: </label>
									<input type="file" name="image" class="form-control">
									<img src="<?php echo siteUrl('files/news/thumb');?>
/<?php echo $_smarty_tpl->tpl_vars['return']->value['newsInfo']['news_image'];?>
.jpg" alt="" style="margin-top: 15px;">
								</div>
								<div class="form-group">
									<label style="margin-bottom: -10px;">Haber İçeriği: </label>
									<textarea name="content" id="default-editor" class="form-control" cols="30" rows="10" placeholder="Haber İçeriği"><?php echo $_smarty_tpl->tpl_vars['return']->value['newsInfo']['news_content'];?>
</textarea>
								</div>
								<button type="submit" name="save" class="btn btn-primary pull-right">Kaydet</button>
							</form>
						<?php }?>
						<link rel="stylesheet" href="<?php echo siteUrl('public/scripts/editor/ui/trumbowyg.css');?>
">
	                    <link rel="stylesheet" href="<?php echo siteUrl('public/scripts/editor/plugins/colors/ui/trumbowyg.colors.css');?>
">
	                    <?php echo '<script'; ?>
 src="<?php echo siteUrl('public/scripts/editor/trumbowyg.js');?>
"><?php echo '</script'; ?>
>
	                    <?php echo '<script'; ?>
 src="<?php echo siteUrl('public/scripts/editor/plugins/base64/trumbowyg.base64.js');?>
"><?php echo '</script'; ?>
>
	                    <?php echo '<script'; ?>
 src="<?php echo siteUrl('public/scripts/editor/plugins/colors/trumbowyg.colors.js');?>
"><?php echo '</script'; ?>
>
	                    <?php echo '<script'; ?>
 src="<?php echo siteUrl('public/scripts/editor/plugins/noembed/trumbowyg.noembed.js');?>
"><?php echo '</script'; ?>
>
	                    <?php echo '<script'; ?>
 src="<?php echo siteUrl('public/scripts/editor/plugins/pasteimage/trumbowyg.pasteimage.js');?>
"><?php echo '</script'; ?>
>
	                    <?php echo '<script'; ?>
 src="<?php echo siteUrl('public/scripts/editor/plugins/preformatted/trumbowyg.preformatted.js');?>
"><?php echo '</script'; ?>
>
	                    <?php echo '<script'; ?>
 src="<?php echo siteUrl('public/scripts/editor/plugins/upload/trumbowyg.upload.js');?>
"><?php echo '</script'; ?>
> 
	                    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo siteUrl('public/scripts/editor/langs/tr.min.js');?>
"><?php echo '</script'; ?>
>
	                     
	                        <?php echo '<script'; ?>
 type="text/javascript">
	                            $(function() {
	                                var uploadOptions = {
	                                    serverPath: 'https://api.imgur.com/3/image',
	                                    fileFieldName: 'image',
	                                    headers: {'Authorization': 'Client-ID 9e57cb1c4791cea'},
	                                    urlPropertyName: 'data.link'
	                                };
	                                $('#default-editor').trumbowyg({
	                                	lang: 'tr',
	                                    resetCss: true,
	                                    autogrow: true,
	                                    btnsDef: {
	                                        image: {
	                                            dropdown: ['insertImage', 'upload', 'base64'],
	                                            ico: 'insertImage'
	                                        }
	                                    },
	                                    btns: ['viewHTML',
	                                        '|', 'formatting',
	                                        '|', 'btnGrp-design',
	                                        '|', 'link',
	                                        '|', 'image',
	                                        '|', 'btnGrp-justify',
	                                        '|', 'btnGrp-lists',
	                                        '|', 'foreColor', 'backColor',
	                                        '|', 'horizontalRule'],
	                                    plugins: {
	                                        upload: uploadOptions
	                                    }    
	                                });
	                            });    
	                        <?php echo '</script'; ?>
>
	                    
					<?php }?>
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