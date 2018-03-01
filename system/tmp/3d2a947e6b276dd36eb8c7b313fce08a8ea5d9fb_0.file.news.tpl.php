<?php /* Smarty version 3.1.27, created on 2017-10-12 16:25:08
         compiled from "C:\xampp\htdocs\galericilerden\app\view\news.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:893259df7b44983074_69221336%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3d2a947e6b276dd36eb8c7b313fce08a8ea5d9fb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\galericilerden\\app\\view\\news.tpl',
      1 => 1507818301,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '893259df7b44983074_69221336',
  'variables' => 
  array (
    'return' => 0,
    'news' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_59df7b449e8991_67014111',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_59df7b449e8991_67014111')) {
function content_59df7b449e8991_67014111 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '893259df7b44983074_69221336';
?>
<div id="main" class="newsPage">
	<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

	<div class="page-content">
		<div class="container">
			<?php if (!getUrl(1)) {?>
				<ul class="breadcrumb">
				    <li><a href="<?php echo SITE_URL;?>
">Anasayfa</a></li>
				    <li class="active">Haberler</li>
				</ul>
			<?php } else { ?>
				<ul class="breadcrumb">
				    <li><a href="<?php echo SITE_URL;?>
">Anasayfa</a></li>
				    <li><a href="<?php echo SITE_URL;?>
/news">Haberler</a></li>
				    <li class="active"><?php echo $_smarty_tpl->tpl_vars['return']->value['newsInfo']['news_title'];?>
</li>
				</ul>
			<?php }?>

			<?php if (!getUrl(1)) {?>
				<div class="block">
					<div class="block-title">
						<h5>Haberler</h5>
					</div>
					<div class="block-content">
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
								<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 news">
			                        <a class="pull-left news-link" href="<?php echo SITE_URL;?>
/news/<?php echo $_smarty_tpl->tpl_vars['news']->value['news_seflink'];?>
">
			                            <img class="news-object" width="100%" src="<?php echo siteUrl('files/news/thumb');?>
/<?php echo $_smarty_tpl->tpl_vars['news']->value['news_image'];?>
.jpg" alt="">
			                            <i class="material-icons">search</i>
			                        </a>
			                        <div class="news-body">
			                            <h4 class="news-heading">
			                            	<a href="<?php echo SITE_URL;?>
/news/<?php echo $_smarty_tpl->tpl_vars['news']->value['news_seflink'];?>
"><?php echo $_smarty_tpl->tpl_vars['news']->value['news_title'];?>
</a>
			                            </h4>
			                        </div>
			                    </div>
		                    <?php
$_smarty_tpl->tpl_vars['news'] = $foreach_news_Sav;
}
?>
	                    <?php } else { ?>
	                    	<p class="text-center" style="color: #ff263a;font-weight: 500;">Bir sonuç bulunamadı</p>
	                    <?php }?>
					</div>
				</div>
				<ul class="pagination pull-right" style="margin-top: 0;"><?php echo $_smarty_tpl->tpl_vars['return']->value['news']['pagination'];?>
</ul>
			<?php } else { ?>
				
					<style type="text/css">
						.block-content img {width: 100%;}
						.block-content {word-break: break-all;}

						@media only screen and (max-width: 991px)
						{
							.block-content .col-md-8 {padding-top: 25px;}
						}
					</style>
				
				<div class="block">
					<div class="block-title">
						<h5><?php echo $_smarty_tpl->tpl_vars['return']->value['newsInfo']['news_title'];?>
</h5>
					</div>
					<div class="block-content">
						<div class="col-md-4">
							<img src="<?php echo siteUrl('files/news/big');?>
/<?php echo $_smarty_tpl->tpl_vars['return']->value['newsInfo']['news_image'];?>
.jpg" width="100%" alt="">
						</div>
						<div class="col-md-8"><?php echo $_smarty_tpl->tpl_vars['return']->value['newsInfo']['news_content'];?>
</div>
					</div>
				</div>
			<?php }?>
		</div>
	</div>
</div><?php }
}
?>