<?php /* Smarty version 3.1.27, created on 2017-09-15 13:06:57
         compiled from "C:\xampp\htdocs\galericilerden\app\view\admin\slider.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:269059bbb451080438_44566350%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8f43a6a60267b903ffc7ab98d9cd99abdaabf4c8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\galericilerden\\app\\view\\admin\\slider.tpl',
      1 => 1505472985,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '269059bbb451080438_44566350',
  'variables' => 
  array (
    'return' => 0,
    'slider' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_59bbb4510d24c5_91027720',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_59bbb4510d24c5_91027720')) {
function content_59bbb4510d24c5_91027720 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '269059bbb451080438_44566350';
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
						<div class="col-md-10 col-md-offset-1 sliders" style="padding-top: 20px;">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="row" style="padding-bottom: 20px;">
                                    <?php if ($_smarty_tpl->tpl_vars['return']->value['sliders']) {?>
                                        <?php
$_from = $_smarty_tpl->tpl_vars['return']->value['sliders'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['slider'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['slider']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['slider']->value) {
$_smarty_tpl->tpl_vars['slider']->_loop = true;
$foreach_slider_Sav = $_smarty_tpl->tpl_vars['slider'];
?>
                                            <div class="col-md-4" style="margin-bottom: 20px;">
                                                <img src="<?php echo siteUrl('uploads/slider');?>
/<?php echo $_smarty_tpl->tpl_vars['slider']->value['image'];?>
" width="100%" height="150" alt="">
                                                <a href="<?php echo SITE_URL;?>
/<?php echo SITE_ADMIN;?>
/slider/delete/<?php echo $_smarty_tpl->tpl_vars['slider']->value['id'];?>
">
                                                    <button type="button" class="btn btn-danger text-center" style="width: 100%;">
                                                        <i class="fa fa-trash"></i> Sil
                                                    </button>
                                                </a>
                                            </div>
                                        <?php
$_smarty_tpl->tpl_vars['slider'] = $foreach_slider_Sav;
}
?>
                                    <?php } else { ?>
                                        <h4 class="text-danger text-center">Slider resmi yok</h4>
                                    <?php }?>
                                </div>

                                <button type="submit" name="update_slider" class="btn btn-primary pull-right">Kaydet</button>
                                <button type="button" class="btn btn-primary pull-right add-slider" style="margin-right: 15px;">Slider ekle</button>
                            </form>
                            
                            
                                <?php echo '<script'; ?>
 type="text/javascript">
                                    $(function() {
                                        $('button.add-slider').click(function() {
                                            $('.sliders .row').append('\
                                                <div class="col-md-4" style="margin-bottom: 20px;">\
                                                    <div class="img-view" style="height: 150px;background-color: #ddd;position: relative;cursor: pointer;display: flex;justify-content: center;align-items: center;">\
                                                        <img src="" alt="" style="display: none;height: 150px;width: 100%;" />\
                                                        <i class="fa fa-plus" style="font-size: 45px;"></i>\
                                                        <input type="file" name="slider_img[]" accept="image/*" style="height: 150px;width: 100%;display: block;opacity: 0;position: absolute;top: 0;cursor: pointer;z-index: 9999;" />\
                                                    </div>\
                                                    <a href="javascript:void(0);" onclick="$(this).parent().remove();">\
                                                        <button type="button" class="btn btn-danger text-center" style="width: 100%;">\
                                                            <i class="fa fa-trash"></i> Sil\
                                                        </button>\
                                                    </a>\
                                                </div>\
                                            ');

                                            $('.sliders h4').remove();
                                        });

                                        $(document).on('change', '.sliders input[type=file]', function () {
                                            var _this = $(this);

                                            var reader = new FileReader();

                                            reader.onload = (function(theFile) { 
                                                var image = new Image();
                                                image.src = theFile.target.result;

                                                image.onload = function() {
  
                                                    $(_this).parent().find('i').hide();
                                                    $(_this).parent().css({'background-color': 'none'});
                                                    $(_this).parent().find('img').attr('src', this.src).show();
                                                    
                                                };
                                            });

                                            reader.readAsDataURL(this.files[0]);

                                        });
                                    });
                                <?php echo '</script'; ?>
>
                            
                        </div>
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