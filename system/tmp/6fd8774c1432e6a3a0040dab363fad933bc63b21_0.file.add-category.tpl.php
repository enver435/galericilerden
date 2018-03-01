<?php /* Smarty version 3.1.27, created on 2017-09-23 14:37:29
         compiled from "C:\xampp\htdocs\galericilerden\app\view\admin\add-category.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:921759c655899b0ed6_75264592%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6fd8774c1432e6a3a0040dab363fad933bc63b21' => 
    array (
      0 => 'C:\\xampp\\htdocs\\galericilerden\\app\\view\\admin\\add-category.tpl',
      1 => 1506170248,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '921759c655899b0ed6_75264592',
  'variables' => 
  array (
    'return' => 0,
    'modul' => 0,
    'category' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_59c65589a3d8f6_09922370',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_59c65589a3d8f6_09922370')) {
function content_59c65589a3d8f6_09922370 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '921759c655899b0ed6_75264592';
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
							<?php if (getUrl(2) == 'main-category') {?>
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
								<button type="submit" name="add" class="btn btn-primary pull-right">Ekle</button>
							<?php } elseif (getUrl(2) == 'sub-category') {?>
								<?php if (!isset($_POST['getStep'])) {?>
									<div class="categories">
										<input type="hidden" name="category" value="">
										<div class="category category_1 col-md-2 col-xs-12">
						            		<div class="list-group scrollable-menu">
							            		<?php
$_from = $_smarty_tpl->tpl_vars['return']->value['mainCategory'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['category'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['category']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
$foreach_category_Sav = $_smarty_tpl->tpl_vars['category'];
?>
													<a href="javascript:void(0)" class="list-group-item" category-id="<?php echo $_smarty_tpl->tpl_vars['category']->value['Id'];?>
" category-level="1"><span><?php echo $_smarty_tpl->tpl_vars['category']->value['kategori_adi'];?>
</span> <i class="fa fa-arrow-right"></i></a>
							            		<?php
$_smarty_tpl->tpl_vars['category'] = $foreach_category_Sav;
}
?>
						            		</div>
						            	</div>
						            	<div class="category category_2"></div>
						            	<div class="category category_3"></div>
						            	<div class="category category_4"></div>
						            	<div class="category category_5"></div>
						            	<div class="category category_6"></div>
						            	<div class="category category_7"></div>
						            	<div class="category category_8"></div>
						            	<div class="category category_9"></div>
						            	<div class="category category_10"></div>
						            	<div class="category">
						            		<div class="category-bottom-success" style="display: none;">
            									<div class="category-success" style="padding: 35px;">
            										<i class="fa fa-check"></i>
            										<button type="submit" name="getStep" class="btn btn-primary">Devam Et</button>
            									</div>
        									</div>
						            	</div>
						            	
							            	<?php echo '<script'; ?>
 type="text/javascript">
							            		$(function() {

							            			var categoryStep = 0;

							            			$(document).on('click', '.list-group .list-group-item', function() {
							            				
							            				$(this).parent().find('.list-group-item').removeClass('active');
							            				$(this).addClass('active');

							            				var categoryId   = $(this).attr('category-id');
							            				categoryStep = $(this).parent().parent().attr('class').split(' ')[1].split('category_')[1];
							            				$('.categories input[name=category]').val(categoryId);
							            				$('.mobile-categories .alert.alert-info strong').text($('span', this).text());

							            				categoryStep = parseInt(categoryStep) + 1;

							            				for(var i = categoryStep; i < 10; i++)
							            				{
							            					$('.categories .category_' + i).html('');
							            					$('.categories .category_' + i).removeClass('col-md-2').removeClass('col-xs-12');
							            				}

							            				$('.category-bottom-success').show();

							            				if(categoryId != '')
							            				{
							            					$.ajax({
							            						type: 'POST',
							            						url: siteUrl + '/request',
							            						dataType: 'json',
							            						data: {'mode': 'getCategory', 'categoryId': categoryId},
							            						success: function(response)
							            						{
							            							var list = '';

							            							if(response != null)
							            							{
							            								list += '<div class="list-group scrollable-menu">';
								            								$.each(response.categorys, function(i, value) {
								            									list += '\
								            										<a href="javascript:void(0)" class="list-group-item" category-id="' + value.Id + '" category-level="' + categoryStep + '"><span>' + value.kategori_adi + '</span> <i class="fa fa-arrow-right"></i></a>\
								            									';
								            								});
							            								list += '</div>';

							            								$('.categories .category_' + categoryStep).html(list);
							            							}
							            							else
							            							{
							            								$('.category-bottom-success').remove();
							            								$('.categories .category_' + categoryStep).html('\
							            									<div class="category-bottom-success">\
								            									<div class="category-success">\
								            										<i class="fa fa-check"></i>\
								            										<button type="submit" name="getStep" class="btn btn-primary">Devam Et</button>\
								            									</div>\
							            									</div>\
						            									');
							            							}

							            							$('.categories .category_' + categoryStep).addClass('col-md-2').addClass('col-xs-12');

							            							var leftPos = $('.categories').scrollLeft();
							            							var blockWidth = $('.categories .category').width() + 33;
						            								$(".categories").animate({scrollLeft: leftPos + blockWidth}, 500);
							            						}
							            					});
							            				}

							            			});
						            			});
							            	<?php echo '</script'; ?>
>
							            	<style type="text/css">
							            		.categories {overflow-x: scroll;white-space: nowrap;}
												.categories .category {float: none;display: inline-block;vertical-align: top;}
												.categories .category .list-group.scrollable-menu {height: auto;max-height: 345px;overflow-x: hidden;}
												.categories .category .list-group .list-group-item.active {background-color: #438EB9;border-color: #438EB9;}
												.categories .category .list-group-item i {display: none;float: right;}
												.categories .category .category-success {background-color: #fff;border: 1px solid #ddd;text-align: center;font-size: 15px;font-weight: 500;color: #438EB9;padding-top: 25px;padding-bottom: 35px;}
												.categories .category .category-success i {font-size: 80px;display: block;margin-bottom: 25px;}
							            	</style>
					            		
				            		</div>
			            		<?php } else { ?>
			            			<div class="alert alert-info">Eklenecek üst kategori: <?php echo categoryInfo($_POST['category'],'kategori_adi');?>
</div>
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
									<input type="hidden" name="getStep">
									<input type="hidden" name="category" value="<?php echo $_POST['category'];?>
">
									<button type="submit" name="add" class="btn btn-primary pull-right">Ekle</button>
			            		<?php }?>
							<?php }?>
						</form>
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