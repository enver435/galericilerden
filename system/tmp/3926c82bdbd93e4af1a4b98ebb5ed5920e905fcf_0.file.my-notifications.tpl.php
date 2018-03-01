<?php /* Smarty version 3.1.27, created on 2017-10-26 16:13:39
         compiled from "C:\xampp\htdocs\galericilerden\app\view\my-notifications.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:489459f1ed93b65363_07406414%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3926c82bdbd93e4af1a4b98ebb5ed5920e905fcf' => 
    array (
      0 => 'C:\\xampp\\htdocs\\galericilerden\\app\\view\\my-notifications.tpl',
      1 => 1508478387,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '489459f1ed93b65363_07406414',
  'variables' => 
  array (
    'return' => 0,
    'notification' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_59f1ed93c47ca5_77700871',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_59f1ed93c47ca5_77700871')) {
function content_59f1ed93c47ca5_77700871 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\xampp\\htdocs\\galericilerden\\system\\plugin\\smarty\\plugins\\modifier.date_format.php';

$_smarty_tpl->properties['nocache_hash'] = '489459f1ed93b65363_07406414';
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
					<li>
						<a href="<?php echo siteUrl('my-messages');?>
">
							<i class="material-icons">message</i> Mesajlarım
						</a>
					</li>
					<li class="active">
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
			
			<h4 class="hidden-lg hidden-md" style="margin-bottom: 25px;">Bildirimlerim</h4>
			<?php if (!getUrl(1)) {?>
				<div class="my-notifications">
					<?php if ($_smarty_tpl->tpl_vars['return']->value['notifications'] !== false) {?>
						<div class="block-title hidden-sm hidden-xs">
							<h5>Bildirimlerim</h5>
						</div>
						<div class="row" style="margin-top: 25px;">
							<div class="col-md-10">
								<div class="checkbox">
									<input type="checkbox" name="checkedAll" value="1" class="magic-checkbox">
									<label><b>Hepsini Seç</b></label>
								</div>
							</div>
							<div class="col-md-2">
								<form action="" method="POST">
									<select name="operation" class="form-control" style="padding: 7px;">
										<option value="0">Seçiniz</option>
										<option value="delete">Sil</option>
									</select>

									<div class="deleted"></div>
								</form>
							</div>
						</div>
						<ul>
							<?php
$_from = $_smarty_tpl->tpl_vars['return']->value['notifications'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['notification'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['notification']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['notification']->value) {
$_smarty_tpl->tpl_vars['notification']->_loop = true;
$foreach_notification_Sav = $_smarty_tpl->tpl_vars['notification'];
?>
								<a href="<?php echo siteUrl('my-notifications/view');?>
/<?php echo $_smarty_tpl->tpl_vars['notification']->value['id'];?>
" style="display: block;">
									<li class="block notification <?php if ($_smarty_tpl->tpl_vars['notification']->value['view'] == 1) {?>read<?php }?>" data-id="<?php echo $_smarty_tpl->tpl_vars['notification']->value['id'];?>
">
										<div class="pull-left">
											<div class="checkbox" style="display: inline-block;margin: 0;top: 20px;">
												<input type="checkbox" id="notCheck" name="notification" value="<?php echo $_smarty_tpl->tpl_vars['notification']->value['id'];?>
" class="magic-checkbox">
												<label></label>
											</div>
											<i class="material-icons">notifications</i>
											<strong style="display: inline-block;position: relative;top: 17px;">
												<?php if ($_smarty_tpl->tpl_vars['notification']->value['type'] == 1) {?>İlanınız Onaylandı<?php } elseif ($_smarty_tpl->tpl_vars['notification']->value['type'] == 2) {?>İlanınız Onaylanamadı<?php } elseif ($_smarty_tpl->tpl_vars['notification']->value['type'] == 3) {?>İlanınızın Yayın Süresi Bitmiştir<?php } elseif ($_smarty_tpl->tpl_vars['notification']->value['type'] == 4) {?>Mağazanız Onaylandı<?php } elseif ($_smarty_tpl->tpl_vars['notification']->value['type'] == 5) {?>Mağazanız Onaylanamadı<?php } elseif ($_smarty_tpl->tpl_vars['notification']->value['type'] == 6) {?>Mağazanızın Yıllık Süresi Bitmiştir<?php } elseif ($_smarty_tpl->tpl_vars['notification']->value['type'] == 7) {?>Mağazanızın Yıllık İlan Limiti Bitmiştir<?php } elseif ($_smarty_tpl->tpl_vars['notification']->value['type'] == 8) {?>İlanınız Silinmiştir<?php }?>
											</strong>
										</div>
										<div class="pull-right">
											<strong style="font-size: 13px;color: #333;position: relative;top: 15px;"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['notification']->value['create_time'],"%d.%m.%Y");?>
</strong>
										</div>
									</li>
								</a>
							<?php
$_smarty_tpl->tpl_vars['notification'] = $foreach_notification_Sav;
}
?>
						</ul>
						<ul class="pagination pull-right hidden-sm hidden-xs" style="margin-top: 0;"><?php echo $_smarty_tpl->tpl_vars['return']->value['pagination']['desktopPagination'];?>
</ul>
						<div class="mobilePagination hidden-lg hidden-md" style="margin-top: 0;"><?php echo $_smarty_tpl->tpl_vars['return']->value['pagination']['mobilePagination'];?>
</div>
						
							<?php echo '<script'; ?>
 type="text/javascript">
								$(function() {
									$('input[name=checkedAll]').change(function() {
										
										if($('input[name=checkedAll]').is(':checked'))
										{
											var htmlInput = '';

											for(var i = 0; i < $('input#notCheck').length; i++)
											{
												$('input#notCheck').attr('checked', true);
												$('input#notCheck')[i].checked = true;

												htmlInput += '<input type="hidden" name="deleted[]" value="' + $('input#notCheck:eq(' + i + ')').val() + '" />';
											}

											$('.deleted').html(htmlInput);
										}
										else
										{
											for(var i = 0; i < $('input#notCheck').length; i++)
											{
												$('input#notCheck').removeAttr('checked', true);
												$('input#notCheck')[i].checked = false;
											}

											$('.deleted').html('');
										}

									});

									$('input[name=notification]').change(function() {

										var val = $(this).val();

										if($(this).is(':checked'))
										{
											$('.deleted').append('<input type="hidden" name="deleted[]" value="' + val + '" />');
										}
										else
										{
											$('.deleted input[value=' + val + ']').remove();
										}

									});

									$('select[name=operation]').change(function() {
										$('form').submit();
									});
								});
							<?php echo '</script'; ?>
>
						
					<?php } else { ?>
						<div class="block" style="margin-bottom: 0;">
							<div class="block-title hidden-sm hidden-xs">
								<h5>Bildirimlerim</h5>
							</div>
							<div class="block-content">
								<p class="text-danger text-center" style="margin-top: 15px;margin-bottom: 15px;"><b>Bir sonuç bulunamadı</b></p>
							</div>
						</div>
					<?php }?>
				</div>
			<?php } else { ?>
				<div class="block default-block my-notifications">
					<div class="block-title hidden-sm hidden-xs">
						<h5>Bildirimlerim</h5>
					</div>
					<div class="block-content">
						<div class="col-md-12">
							<h4><?php if ($_smarty_tpl->tpl_vars['return']->value['notificationInfo']['type'] == 1) {?>İlanınız Onaylandı<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['notificationInfo']['type'] == 2) {?>İlanınız Onaylanamadı<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['notificationInfo']['type'] == 3) {?>İlanınızın Yayın Süresi Bitmiştir<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['notificationInfo']['type'] == 4) {?>Mağazanız Onaylandı<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['notificationInfo']['type'] == 5) {?>Mağazanız Onaylanamadı<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['notificationInfo']['type'] == 6) {?>Mağazanızın Yıllık Süresi Bitmiştir<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['notificationInfo']['type'] == 7) {?>Mağazanızın Yıllık İlan Limiti Bitmiştir<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['notificationInfo']['type'] == 8) {?>İlanınız Uygun Görülmediğinden Silinmiştir<?php }?></h4>

							<?php if ($_smarty_tpl->tpl_vars['return']->value['notificationInfo']['type'] == 1) {?>
								<strong>
									<p><?php echo $_smarty_tpl->tpl_vars['return']->value['notificationInfo']['adId'];?>
 no lu ilanınız onaylanarak yayına alınmıştır. İlanınızı görüntülemek için <a href="<?php echo siteUrl('view');?>
/<?php echo $_smarty_tpl->tpl_vars['return']->value['Ads']->adInfo($_smarty_tpl->tpl_vars['return']->value['notificationInfo']['adId'],'seflink');?>
-<?php echo $_smarty_tpl->tpl_vars['return']->value['notificationInfo']['adId'];?>
">tıklayın</a></p>
								</strong>
							<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['notificationInfo']['type'] == 2 || $_smarty_tpl->tpl_vars['return']->value['notificationInfo']['type'] == 8) {?>
								<strong>
									<?php if ($_smarty_tpl->tpl_vars['return']->value['notificationInfo']['type'] == 2) {?>
										<p><?php echo $_smarty_tpl->tpl_vars['return']->value['notificationInfo']['adId'];?>
 no lu ilanınız onaylanamadı.</p>
									<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['notificationInfo']['type'] == 8) {?>
										<p><?php echo $_smarty_tpl->tpl_vars['return']->value['notificationInfo']['adId'];?>
 no lu ilanınız silinmiştir.</p>
									<?php }?>
									<p>Lütfen aşağıda belirttiğimiz uygunsuz görülen alanları <a href="<?php echo siteUrl('my-ads/ad-edit');?>
/<?php echo $_smarty_tpl->tpl_vars['return']->value['notificationInfo']['adId'];?>
">İlanlarım</a> sayfasından düzeltiniz.</p>

									<p class="error">
										<?php if ($_smarty_tpl->tpl_vars['return']->value['notificationInfo']['adType'] == 1) {?>
											İlan başlığı veya ilan açıklaması kurallara uymadığı için ilanınız onaylanmamıştır
										<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['notificationInfo']['adType'] == 2) {?>
											İlan resimleri orjinal olmadığı için ilanınız onaylanmamıştır
										<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['notificationInfo']['adType'] == 3) {?>
											Reklam ve spam nedeniyle ilanınız onaylanmamıştır
										<?php }?>
									</p>
								</strong>
							<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['notificationInfo']['type'] == 3) {?>
								<strong>
									<p><?php echo $_smarty_tpl->tpl_vars['return']->value['notificationInfo']['adId'];?>
 no lu ilanınızın yayın süresi doldu. <a href="<?php echo siteUrl('my-ads/finished');?>
">İlanlarım</a> sayfasından ilanınızın süresini uzatabilirsiniz.</p>
								</strong>
							<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['notificationInfo']['type'] == 4) {?>
								<strong>
									<p><?php echo $_smarty_tpl->tpl_vars['return']->value['notificationInfo']['storeId'];?>
 no lu mağazanız onaylandı. <a href="<?php echo siteUrl('my-store');?>
">Mağazam</a> sayfasından mağazanızı yönetebilirsiniz.</p>
								</strong>
							<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['notificationInfo']['type'] == 5) {?>
								<strong>
									<p><?php echo $_smarty_tpl->tpl_vars['return']->value['notificationInfo']['storeId'];?>
 no lu mağazanız onaylanamadı.</p>
									<p>Lütfen aşağıda belirttiğimiz uygunsuz görülen alanları <a href="<?php echo siteUrl('my-store/edit-store');?>
">Mağazam</a> sayfasından düzeltiniz.</p>

									<p class="error">Mağaza bilgileri yanlış olduğu için aktif edilmemiştir</p>
								</strong>
							<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['notificationInfo']['type'] == 6) {?>
								<strong>
									<p><?php echo $_smarty_tpl->tpl_vars['return']->value['notificationInfo']['storeId'];?>
 no lu mağazanızın yıllık süresi bitmiştir. Mağaza süresini uzatmak için lütfen <a href="<?php echo siteUrl('update-store-year');?>
">tıklayın</a>.</p>
								</strong>
							<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['notificationInfo']['type'] == 7) {?>
								<strong>
									<p><?php echo $_smarty_tpl->tpl_vars['return']->value['notificationInfo']['storeId'];?>
 no lu mağazanızın yıllık ilan limiti bitmiştir. Mağaza limitini yükseltmek için lütfen <a href="<?php echo siteUrl('update-store-limit');?>
">tıklayın</a>.</p>
								</strong>
							<?php }?>
						</div>
					</div>
				</div>
			<?php }?>
		</div>
	</div>
</div><?php }
}
?>