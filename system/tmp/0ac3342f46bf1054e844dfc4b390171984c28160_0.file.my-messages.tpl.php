<?php /* Smarty version 3.1.27, created on 2018-01-18 22:03:19
         compiled from "C:\xampp\htdocs\galericilerden\app\view\my-messages.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:107215a610b97c198f0_75609307%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0ac3342f46bf1054e844dfc4b390171984c28160' => 
    array (
      0 => 'C:\\xampp\\htdocs\\galericilerden\\app\\view\\my-messages.tpl',
      1 => 1516278553,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '107215a610b97c198f0_75609307',
  'variables' => 
  array (
    'return' => 0,
    'message' => 0,
    'adInfo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5a610b97d41a83_99072004',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5a610b97d41a83_99072004')) {
function content_5a610b97d41a83_99072004 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_capitalize')) require_once 'C:\\xampp\\htdocs\\galericilerden\\system\\plugin\\smarty\\plugins\\modifier.capitalize.php';
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\xampp\\htdocs\\galericilerden\\system\\plugin\\smarty\\plugins\\modifier.date_format.php';

$_smarty_tpl->properties['nocache_hash'] = '107215a610b97c198f0_75609307';
?>
<div id="main">
	<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

	<div class="page-content">
		<div class="container">
			<div class="profile-header-menu block hidden-sm hidden-xs">
				<ul>
					<li>
						<a href="<?php echo siteUrl('my');?>
">
							<i class="material-icons">home</i> Özet
						</a>
					</li>
					<li>
						<a href="<?php echo siteUrl('my-ads/active');?>
">
							<i class="material-icons">view_stream</i> İlanlarım
						</a>
					</li>
					<li>
						<a href="<?php echo siteUrl('my-favorites/ads');?>
">
							<i class="material-icons">star</i> Favorilerim
						</a>
					</li>
					<li class="active">
						<a href="<?php echo siteUrl('my-messages');?>
">
							<i class="material-icons">message</i> Mesajlarım
						</a>
					</li>
					<li>
						<a href="<?php echo siteUrl('my-notifications');?>
">
							<i class="material-icons">notifications</i> Bildirimlerim
						</a>
					</li>
					<li>
						<a href="<?php echo siteUrl('my-info');?>
">
							<i class="material-icons">person</i> Üyeliğim
						</a>
					</li>
					<?php if (userInfo($_SESSION['userId'],'user_status') == 2) {?>
						<li>
							<a href="<?php echo siteUrl('my-store');?>
">
								<i class="material-icons">store</i> Mağazam
							</a>
						</li>
					<?php }?>
				</ul>
			</div>

			<h4 class="hidden-lg hidden-md" style="margin-bottom: 25px;">Mesajlarım</h4>
			<div class="my-messages">
				<?php if (!getUrl(1)) {?>
					<?php if ($_smarty_tpl->tpl_vars['return']->value['messages']) {?>
						<?php
$_from = $_smarty_tpl->tpl_vars['return']->value['messages'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['message'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['message']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['message']->value) {
$_smarty_tpl->tpl_vars['message']->_loop = true;
$foreach_message_Sav = $_smarty_tpl->tpl_vars['message'];
?>
							<?php if (isset($_smarty_tpl->tpl_vars['adInfo'])) {$_smarty_tpl->tpl_vars['adInfo'] = clone $_smarty_tpl->tpl_vars['adInfo'];
$_smarty_tpl->tpl_vars['adInfo']->value = $_smarty_tpl->tpl_vars['return']->value['Ads']->adInfo($_smarty_tpl->tpl_vars['message']->value['adsId']); $_smarty_tpl->tpl_vars['adInfo']->nocache = null; $_smarty_tpl->tpl_vars['adInfo']->scope = 0;
} else $_smarty_tpl->tpl_vars['adInfo'] = new Smarty_Variable($_smarty_tpl->tpl_vars['return']->value['Ads']->adInfo($_smarty_tpl->tpl_vars['message']->value['adsId']), null, 0);?>
							
							<a href="<?php echo siteUrl('my-messages/view');?>
/<?php echo $_smarty_tpl->tpl_vars['message']->value['id'];?>
">
								<div class="message block <?php if ($_smarty_tpl->tpl_vars['message']->value['view'] == 1) {?>read<?php }?>" style="padding: 10px;">
									<img src="<?php echo siteUrl('files/ads/thumb');?>
/<?php echo $_smarty_tpl->tpl_vars['adInfo']->value['title_image'];?>
.jpg" width="80" alt="<?php echo $_smarty_tpl->tpl_vars['adInfo']->value['title'];?>
">
									<div class="message-left">
										<h5><i class="icon icon-message"></i> <?php echo $_smarty_tpl->tpl_vars['adInfo']->value['title'];?>
</h5>
										<small><?php echo smarty_modifier_capitalize(userInfo($_smarty_tpl->tpl_vars['message']->value['sendUser'],'name'));?>
 <?php echo smarty_modifier_capitalize(userInfo($_smarty_tpl->tpl_vars['message']->value['sendUser'],'surname'));?>
</small>
									</div>
									<div class="message-right">
										<span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['message']->value['time'],"%d");?>
 <?php echo monthName($_smarty_tpl->tpl_vars['message']->value['time']);?>
 <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['message']->value['time'],"%Y");?>
</span><br>
										<span class="pull-right"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['message']->value['time'],"%H:%M");?>
</span>
									</div>
								</div>
							</a>
						<?php
$_smarty_tpl->tpl_vars['message'] = $foreach_message_Sav;
}
?>

						<ul class="pagination pull-right hidden-sm hidden-xs" style="margin-top: 0;"><?php echo $_smarty_tpl->tpl_vars['return']->value['pagination']['desktopPagination'];?>
</ul>
						<div class="mobilePagination hidden-lg hidden-md" style="margin-top: 0;"><?php echo $_smarty_tpl->tpl_vars['return']->value['pagination']['mobilePagination'];?>
</div>
					<?php } else { ?>
						<div class="block">
							<div class="block-content">
								<p class="text-danger text-center" style="margin-top: 15px;margin-bottom: 15px;"><b>Bir sonuç bulunamadı</b></p>
							</div>
						</div>
					<?php }?>
				<?php } else { ?>
					<?php if (getUrl(1) == 'view') {?>
						<div class="ad-info">
							<div class="block">
								<div class="ad-left">
									<img src="<?php echo siteUrl('files/ads/thumb');?>
/<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['title_image'];?>
.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['title'];?>
">
								</div>
								<div class="ad-right">
									<a href="<?php echo siteUrl('view');?>
/<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['seflink'];?>
-<?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['return']->value['adInfo']['title'];?>
</a>
									<small>
										<?php if ($_smarty_tpl->tpl_vars['return']->value['adInfo']['category1'] != 0) {?>
											<?php echo categoryInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['category1'],'kategori_adi');?>

										<?php }?>

										<?php if ($_smarty_tpl->tpl_vars['return']->value['adInfo']['category2'] != 0) {?>
											-> <?php echo categoryInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['category2'],'kategori_adi');?>

										<?php }?>

										<?php if ($_smarty_tpl->tpl_vars['return']->value['adInfo']['category3'] != 0) {?>
											-> <?php echo categoryInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['category3'],'kategori_adi');?>

										<?php }?>

										<?php if ($_smarty_tpl->tpl_vars['return']->value['adInfo']['category4'] != 0) {?>
											-> <?php echo categoryInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['category4'],'kategori_adi');?>

										<?php }?>

										<?php if ($_smarty_tpl->tpl_vars['return']->value['adInfo']['category5'] != 0) {?>
											-> <?php echo categoryInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['category5'],'kategori_adi');?>

										<?php }?>

										<?php if ($_smarty_tpl->tpl_vars['return']->value['adInfo']['category6'] != 0) {?>
											-> <?php echo categoryInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['category6'],'kategori_adi');?>

										<?php }?>

										<?php if ($_smarty_tpl->tpl_vars['return']->value['adInfo']['category7'] != 0) {?>
											-> <?php echo categoryInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['category7'],'kategori_adi');?>

										<?php }?>

										<?php if ($_smarty_tpl->tpl_vars['return']->value['adInfo']['category8'] != 0) {?>
											-> <?php echo categoryInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['category8'],'kategori_adi');?>

										<?php }?>

										<?php if ($_smarty_tpl->tpl_vars['return']->value['adInfo']['category9'] != 0) {?>
											-> <?php echo categoryInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['category9'],'kategori_adi');?>

										<?php }?>

										<?php if ($_smarty_tpl->tpl_vars['return']->value['adInfo']['category10'] != 0) {?>
											-> <?php echo categoryInfo($_smarty_tpl->tpl_vars['return']->value['adInfo']['category10'],'kategori_adi');?>

										<?php }?>
									</small>
									<strong>
										<?php echo number_format($_smarty_tpl->tpl_vars['return']->value['adInfo']['price'],0,".",",");?>

										<?php if ($_smarty_tpl->tpl_vars['return']->value['adInfo']['price_type'] == 0) {?>
											<i class="icon icon-tl"></i>
										<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['adInfo']['price_type'] == 1) {?>
											<i class="icon icon-euro"></i>
										<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['adInfo']['price_type'] == 2) {?>
											<i class="icon icon-usd"></i>
										<?php }?>
									</strong>
								</div>
							</div>
						</div>
						<div class="block" style="overflow: hidden;padding: 15px;">
							<?php if ($_SESSION['userId'] != $_smarty_tpl->tpl_vars['return']->value['messageInfo']['sendUser']) {?>
								<b class="name-surname"><?php echo smarty_modifier_capitalize(userInfo($_smarty_tpl->tpl_vars['return']->value['messageInfo']['sendUser'],'name'));?>
 <?php echo smarty_modifier_capitalize(userInfo($_smarty_tpl->tpl_vars['return']->value['messageInfo']['sendUser'],'surname'));?>
</b>
								<span class="phone-no"><?php echo userInfo($_smarty_tpl->tpl_vars['return']->value['messageInfo']['sendUser'],'phone');?>
</span>
							<?php }?>

							<?php if ($_SESSION['userId'] != $_smarty_tpl->tpl_vars['return']->value['messageInfo']['toUser']) {?>
								<b class="name-surname"><?php echo smarty_modifier_capitalize(userInfo($_smarty_tpl->tpl_vars['return']->value['messageInfo']['toUser'],'name'));?>
 <?php echo smarty_modifier_capitalize(userInfo($_smarty_tpl->tpl_vars['return']->value['messageInfo']['toUser'],'surname'));?>
</b>
								<span class="phone-no"><?php echo userInfo($_smarty_tpl->tpl_vars['return']->value['messageInfo']['toUser'],'phone');?>
</span>
							<?php }?>

							<a href="<?php echo siteUrl('my-messages/delete');?>
/<?php echo $_smarty_tpl->tpl_vars['return']->value['messageInfo']['id'];?>
" title="Sil" style="display: block;float: right;color: #333;">
								<i class="material-icons">delete</i>
							</a>
						</div>
						<div class="messages">
							<?php
$_from = $_smarty_tpl->tpl_vars['return']->value['messagesContent'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['message'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['message']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['message']->value) {
$_smarty_tpl->tpl_vars['message']->_loop = true;
$foreach_message_Sav = $_smarty_tpl->tpl_vars['message'];
?>
								<?php if ($_SESSION['userId'] != $_smarty_tpl->tpl_vars['message']->value['sendUser']) {?>
									<div class="sendUser">
										<div class="message-left">
											<b><?php echo smarty_modifier_capitalize(userInfo($_smarty_tpl->tpl_vars['return']->value['messageInfo']['sendUser'],'name'));?>
 <?php echo smarty_modifier_capitalize(userInfo($_smarty_tpl->tpl_vars['return']->value['messageInfo']['sendUser'],'surname'));?>
</b>
											<span><?php echo $_smarty_tpl->tpl_vars['message']->value['message'];?>
</span>
										</div>
										<div class="message-right">
											<span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['message']->value['time'],"%d");?>
 <?php echo monthName($_smarty_tpl->tpl_vars['message']->value['time']);?>
 <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['message']->value['time'],"%Y");?>
</span><br>
											<span class="pull-right"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['message']->value['time'],"%H:%M");?>
</span>
										</div>
									</div>
								<?php }?>

								<?php if ($_SESSION['userId'] != $_smarty_tpl->tpl_vars['message']->value['toUser']) {?>
									<div class="myUser">
										<div class="message-left">
											<b>Ben</b>
											<span><?php echo $_smarty_tpl->tpl_vars['message']->value['message'];?>
</span>
										</div>
										<div class="message-right">
											<span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['message']->value['time'],"%d");?>
 <?php echo monthName($_smarty_tpl->tpl_vars['message']->value['time']);?>
 <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['message']->value['time'],"%Y");?>
</span><br>
											<span class="pull-right"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['message']->value['time'],"%H:%M");?>
</span>
										</div>
									</div>
								<?php }?>
							<?php
$_smarty_tpl->tpl_vars['message'] = $foreach_message_Sav;
}
?>
						</div>
						<div class="block">
							<div class="default-block">
								<div class="block-content">
									<i class="material-icons" style="float: left;">security</i>
						          	<p>Satıcıyla yüz yüze görüşmeden ve alacağınız ürünü görmeden kapora ödemeyin, para göndermeyin.</p>
						          	<p>
						          		<a href="#">Güvenli Alışverişin İpuçları için tıklayın.</a>
						          	</p>
						          	<form action="" method="POST">
						          		<textarea name="message" class="form-control" cols="30" rows="10" placeholder="Mesajınız"></textarea>
						          		<button type="button" class="btn btn-primary" disabled="disabled">Gönder</button>
						          	</form>
						          	
						          		<?php echo '<script'; ?>
 type="text/javascript">
						          			$(function() {
						          				$('textarea').keyup(function() {
						          					
						          					var length = $(this).val().length;

						          					if(length > 0)
						          					{
						          						$('.my-messages button').removeAttr('disabled', true).attr('type', 'submit').attr('name', 'send_message');
						          					}
						          					else
						          					{
						          						$('.my-messages button').attr('disabled', true).attr('type', 'button').removeAttr('name', true);
						          					}

						          				});
						          			});
						          		<?php echo '</script'; ?>
>
						          	
					          	</div>
				          	</div>
						</div>
					<?php }?>
				<?php }?>
			</div>
		</div>
	</div>
</div><?php }
}
?>