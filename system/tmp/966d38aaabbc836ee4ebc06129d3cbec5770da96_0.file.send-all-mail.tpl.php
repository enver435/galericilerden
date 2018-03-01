<?php /* Smarty version 3.1.27, created on 2017-10-11 13:35:00
         compiled from "C:\xampp\htdocs\galericilerden\app\view\admin\send-all-mail.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:53959de01e4877a40_00023992%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '966d38aaabbc836ee4ebc06129d3cbec5770da96' => 
    array (
      0 => 'C:\\xampp\\htdocs\\galericilerden\\app\\view\\admin\\send-all-mail.tpl',
      1 => 1507631446,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '53959de01e4877a40_00023992',
  'variables' => 
  array (
    'return' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_59de01e4904467_11010602',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_59de01e4904467_11010602')) {
function content_59de01e4904467_11010602 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '53959de01e4877a40_00023992';
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
					<?php if (isset($_POST['sendMail'])) {?>
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
							<input type="text" name="title" class="form-control" placeholder="Mail Başlığı">
						</div>
						<div class="form-group">
							<textarea name="content" id="default-editor" class="form-control" cols="30" rows="10" placeholder="Mail İçeriği"></textarea>
						</div>
						<button type="submit" name="sendMail" class="btn btn-primary pull-right">Gönder</button>
					</form>
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