<?php /* Smarty version 3.1.27, created on 2017-10-12 18:38:15
         compiled from "C:\xampp\htdocs\galericilerden\app\view\mobile\search-ad.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1749059df9a7732b3c3_21275065%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'da9bb95717012f49a00d97ec80df460db5f428df' => 
    array (
      0 => 'C:\\xampp\\htdocs\\galericilerden\\app\\view\\mobile\\search-ad.tpl',
      1 => 1507826289,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1749059df9a7732b3c3_21275065',
  'variables' => 
  array (
    'Category' => 0,
    'category' => 0,
    'i' => 0,
    'return' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_59df9a77388fe2_53877568',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_59df9a77388fe2_53877568')) {
function content_59df9a77388fe2_53877568 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1749059df9a7732b3c3_21275065';
?>
<div id="main" class="select-ads">
	<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

	<div class="page-content">
		<div class="container">
			
				<style type="text/css">
					.list-group-item {font-weight: 500;}
				</style>
			
			<div class="categories selected-category">
				<div class="category-type-link">
					<div class="list-group">
						<a href="<?php echo siteUrl('category-special/ilk-sahibinden');?>
" class="list-group-item">
							<span style="display: inline-block;margin-top: 3px;margin-left: 5px;">İlk Sahibinden</span> 
							<i class="material-icons">directions_car</i>
							<i class="material-icons arrow-right">keyboard_arrow_right</i>
						</a>
						<a href="<?php echo siteUrl('category-special/yeni-gibi');?>
" class="list-group-item">
							<span style="display: inline-block;margin-top: 3px;margin-left: 5px;">Yeni Gibi</span> 
							<i class="material-icons">fiber_new</i>
							<i class="material-icons arrow-right">keyboard_arrow_right</i>
						</a>
						<a href="<?php echo siteUrl('category-special/ekspertizli');?>
" class="list-group-item">
							<span style="display: inline-block;margin-top: 3px;margin-left: 5px;">Ekspertizli</span> 
							<i class="material-icons">check_circle</i>
							<i class="material-icons arrow-right">keyboard_arrow_right</i>
						</a>
						<a href="<?php echo siteUrl('category-special/acil');?>
" class="list-group-item">
							<span style="display: inline-block;margin-top: 3px;margin-left: 5px;">Acil İlanlar</span> 
							<i class="material-icons">notifications</i>
							<i class="material-icons arrow-right">keyboard_arrow_right</i>
						</a>
						<a href="<?php echo siteUrl('category-special/fiyati-dusenler');?>
" class="list-group-item">
							<span style="display: inline-block;margin-top: 3px;margin-left: 5px;">Fiyatı Düşenler</span>
							<i class="material-icons">arrow_downward</i> 
							<i class="material-icons arrow-right">keyboard_arrow_right</i>
						</a>
					</div>
				</div>
				<div class="category-type-click">
					<div class="info" style="display: none;">
						<button type="button" class="btn btn-primary" style="width: 100px;padding-left: 0;margin-bottom: 20px;"><i class="material-icons" style="display: inline-block !important;float: none !important;vertical-align: middle;">keyboard_arrow_left</i> Geri</button>
    					<div class="alert alert-info"><strong>Kategori seçiniz</strong> <a href="" class="get-link" style="float: right;color: #337ab7;text-decoration: none;font-weight: 500;">Seç <i class="material-icons" style="float: right !important;vertical-align: middle;display: inline-block !important;margin-top: -3px;margin-left: 3px;">check</i></a></div>
					</div>
					<div class="category category_1">
						<div class="list-group">
							<?php if (isset($_smarty_tpl->tpl_vars['i'])) {$_smarty_tpl->tpl_vars['i'] = clone $_smarty_tpl->tpl_vars['i'];
$_smarty_tpl->tpl_vars['i']->value = 1; $_smarty_tpl->tpl_vars['i']->nocache = null; $_smarty_tpl->tpl_vars['i']->scope = 0;
} else $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(1, null, 0);?>

		            		<?php
$_from = $_smarty_tpl->tpl_vars['Category']->value->categoryFirst();
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['category'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['category']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
$foreach_category_Sav = $_smarty_tpl->tpl_vars['category'];
?>
								<a href="javascript:void(0);" data-link="<?php echo SITE_URL;?>
/cat-<?php echo $_smarty_tpl->tpl_vars['category']->value['Id'];?>
/<?php echo $_smarty_tpl->tpl_vars['category']->value['seflink'];?>
" class="list-group-item" category-id="<?php echo $_smarty_tpl->tpl_vars['category']->value['Id'];?>
" category-level="1"><i class="icon icon-category<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"></i> <span style="display: inline-block;margin-top: 3px;margin-left: 5px;"><?php echo $_smarty_tpl->tpl_vars['category']->value['kategori_adi'];?>
</span> (<?php echo $_smarty_tpl->tpl_vars['return']->value['Ads']->categoryAdsCount($_smarty_tpl->tpl_vars['category']->value['Id']);?>
) <i class="material-icons arrow-right">keyboard_arrow_right</i></a>

								<?php if (isset($_smarty_tpl->tpl_vars['i'])) {$_smarty_tpl->tpl_vars['i'] = clone $_smarty_tpl->tpl_vars['i'];
$_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['i']->value+1; $_smarty_tpl->tpl_vars['i']->nocache = null; $_smarty_tpl->tpl_vars['i']->scope = 0;
} else $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
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
            	</div>
			</div>
			
				<?php echo '<script'; ?>
 type="text/javascript">
					$(function() {

						var windowWidth = $(window).width();

						if(windowWidth > 991)
						{
							window.location.href = '<?php echo SITE_URL;?>
';
						}

						$(window).resize(function() {
							var windowWidth = $(window).width();

							if(windowWidth > 991)
							{
								window.location.href = '<?php echo SITE_URL;?>
';
							}
						});

						var categoryStep = 0;

            			$(document).on('click', '.list-group .list-group-item', function() {
            				
            				$(this).parent().find('.list-group-item').removeClass('active');
            				$(this).addClass('active');

            				var categoryId = $(this).attr('category-id');
            				var link       = $(this).attr('data-link');
            				categoryStep   = $(this).parent().parent().attr('class').split(' ')[1].split('category_')[1];
            				
            				$('.category-type-click .info').show();
            				$('.category-type-link').hide();
            				$('.category-type-click .alert.alert-info strong').text($('span', this).text());
            				$('.category-type-click .alert.alert-info .get-link').attr('href', link);

            				$('.categories .category_' + categoryStep).attr('style', 'display:none !important');

            				for(var i = categoryStep; i < 10; i++)
            				{
            					$('.categories .category_' + i).attr('style', 'display: none !important');
            				} 

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
            								list += '<div class="list-group">';
	            								$.each(response.categorys, function(i, value) {
	            									var countAd = response.counts[i];

	            									list += '\
	            										<a href="javascript:void(0);" data-link="' + siteUrl + '/cat-' + value.Id + '/' + value.seflink + '" class="list-group-item" category-id="' + value.Id + '" category-level="' + (parseInt(categoryStep) + 1) + '"><span>' + value.kategori_adi + '</span style="display: inline-block;margin-top: 3px;margin-left: 5px;"> (' + countAd + ') <i class="material-icons arrow-right">keyboard_arrow_right</i></a>\
	            									';
	            								});
            								list += '</div>';

            								$('.categories .category_' + (parseInt(categoryStep) + 1)).html(list).attr('style', 'display: block !important');
            							}
            							else
            							{
            								window.location.href = link;
            							}
            						}
            					});
            				}

            				$(window).scrollTop(0);

            			});

            			$('.category-type-click button').click(function() {
		            				
            				if(categoryStep > 0)
            				{
            					for(var i = categoryStep; i < 10; i++)
	            				{
	            					$('.categories .category_' + i).attr('style', 'display: none !important');
	            				} 

            					$('.categories .category_' + categoryStep).attr('style', 'display: block !important');

								categoryStep -= 1;

								$('.category-type-click .alert.alert-info strong').text($('.categories .category_' + (categoryStep + 1) + ' .list-group-item.active span').text());
								$('.category-type-click .info .get-link').attr('href', $('.categories .category_' + (categoryStep + 1) + ' .list-group-item.active').attr('data-link'));
            				}
            				else
            				{
            					$('.category-type-click .info').hide();
            					$('.category-type-link').show();
            					$('.list-group-item').removeClass('active');
            				}

            				$(window).scrollTop(0);

            			});

					});
				<?php echo '</script'; ?>
>
			
		</div>
	</div>
</div>
<?php }
}
?>