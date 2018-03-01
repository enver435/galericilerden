<?php /* Smarty version 3.1.27, created on 2018-01-19 12:44:05
         compiled from "C:\xampp\htdocs\galericilerden\app\view\my.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:191465a61da05c6f329_44710246%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0c0b65200a0250126c386d828809d805280dc282' => 
    array (
      0 => 'C:\\xampp\\htdocs\\galericilerden\\app\\view\\my.tpl',
      1 => 1516359795,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '191465a61da05c6f329_44710246',
  'variables' => 
  array (
    'return' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5a61da05cfa649_38597480',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5a61da05cfa649_38597480')) {
function content_5a61da05cfa649_38597480 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '191465a61da05c6f329_44710246';
?>
<div id="main">
	<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

	<div class="page-content">
		<div class="container">
			<div class="profile-header-menu block hidden-sm hidden-xs">
				<ul>
					<li class="active">
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

			<h4 class="hidden-lg hidden-md" style="margin-bottom: 25px;">Özet</h4>
			<div class="my">
				<div class="row">
					<div class="col-md-3">
						<div class="block" style="padding-bottom: 28px;">
							<a href="<?php echo siteUrl('my-ads/active');?>
" style="text-decoration: none;">
								<p>
									<i class="material-icons">view_stream</i>
									<span>Yayında olan<br>ilan adedi</span>
								</p>
								<strong class="block-count"><?php echo $_smarty_tpl->tpl_vars['return']->value['userAdsCount'];?>
</strong>
							</a>
						</div>
					</div>
					<div class="col-md-3">
						<div class="block">
							<p>
								<i class="material-icons">search</i>
								<span>İlanlarınızın aylık<br>gösterim adedi</span>
							</p>
							<strong class="block-count"><?php echo $_smarty_tpl->tpl_vars['return']->value['countViewMonthly'];?>
</strong>
							<span class="day30">(son 30 gün)</span>
						</div>
					</div>
					<div class="col-md-3">
						<div class="block">
							<p>
								<i class="material-icons">star</i>
								<span>İlanlarınızın favorilere<br>eklenme adedi</span>
							</p>
							<strong class="block-count"><?php echo $_smarty_tpl->tpl_vars['return']->value['countFavoriteMonthly'];?>
</strong>
							<span class="day30">(son 30 gün)</span>
						</div>
					</div>
					<div class="col-md-3">
						<div class="block">
							<p>
								<i class="material-icons">messages</i>
								<span>İlanlarınıza gelen<br>mesaj adedi</span>
							</p>
							<strong class="block-count"><?php echo $_smarty_tpl->tpl_vars['return']->value['countMessageMonthly'];?>
</strong>
							<span class="day30">(son 30 gün)</span>
						</div>
					</div>
				</div>
				<?php if (userInfo($_SESSION['userId'],'corporateMessage') == 1 && userInfo($_SESSION['userId'],'corporateRequest') == 0 && userInfo($_SESSION['userId'],'user_status') == 1) {?>
					<link rel="stylesheet" href="<?php echo siteUrl('public/styles/sweetalert.css');?>
" />
					<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo siteUrl('public/scripts/sweetalert.min.js');?>
"><?php echo '</script'; ?>
>
					<div class="corporate-message alert alert-info alert-dismissable">
						<a href="javascript:void(0);" class="close" aria-label="close">&times;</a>
						<strong>OTO GALERİ, YETKİLİ BAYİ VE ÜRETİM YAPAN FİRMA İSENİZ KURUMSAL ÜYE OL</strong> <button class="btn btn-primary">Kurumsal üye olmak istiyorum</button>
					</div>
				<?php }?>
				<div class="block" style="padding: 0;">
					<div class="block-title">
						<h5>Görüntüleme Raporu (Son 30 gün)</h5>
					</div>
					<div class="block-content">
						<?php if (!empty($_smarty_tpl->tpl_vars['return']->value['dataCountAd']) && !empty($_smarty_tpl->tpl_vars['return']->value['dataCountAdView'])) {?>
							<div id="chart-container"></div>
						<?php } else { ?>
							<p class="text-center" style="color: #ff263a;font-weight: 500;margin-top: 15px;">Bir sonuç bulunamadı</p>
						<?php }?>
					</div>
				</div>
				<?php if (!empty($_smarty_tpl->tpl_vars['return']->value['dataCountAd']) && !empty($_smarty_tpl->tpl_vars['return']->value['dataCountAdView'])) {?>
					<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo siteUrl('public/scripts/highcharts.js');?>
"><?php echo '</script'; ?>
>
					
						<?php echo '<script'; ?>
 type="text/javascript">
							Highcharts.setOptions({
								lang: {
							        loading: 'Yükleniyor...',
							        months: ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran',  'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'],
							        weekdays: ['Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi'],
							        shortMonths: ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran',  'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'],
							        exportButtonTitle: "Dışarı Aktar",
							        printButtonTitle: "Yazdır",
							        rangeSelectorFrom: "Başlangış",
							        rangeSelectorTo: "Bitiş",
							        rangeSelectorZoom: "Periyot",
							        downloadPNG: 'PNG Olarak indir',
							        downloadJPEG: 'JPEG olarak indir',
							        downloadPDF: 'PDF olarak indir',
							        downloadSVG: 'SVG olarak indir',
							        resetZoom: ['Yakınlaşmayı Sıfırla'],
							        resetZoomTitle:['Yakınlaşmayı Sıfırla'],
							        printChart:['Yazdır']
							        // thousandsSep: ".",
							        // decimalPoint: ','
						        }
							});

							Highcharts.chart('chart-container', {

								chart: {
							        style: {
							            fontFamily: 'Roboto'
							        }
							    },

							    title: {
							        text: ''
							    },

							    yAxis: {
							        title: {
							            text: ''
							        },
							        min: 0
							    },

							    xAxis: {
						            type: 'datetime',
						            dateTimeLabelFormats: {
						            	day: '%e %B %Y'
						            }
						        },

							    series: [{
							        name: 'Yayında Olan İlanlar',
							        data: [<?php echo join(",",$_smarty_tpl->tpl_vars['return']->value['dataCountAd']);?>
],
							        color: '#FAC069',
							    }, {
							        name: 'İlan Görüntüleme Adedi',
							        data: [<?php echo join(",",$_smarty_tpl->tpl_vars['return']->value['dataCountAdView']);?>
],
							        color: '#6990AD',
							    }],

							    tooltip: {
					                shared: true,
					                useHTML: true,
					                padding: 10,
					                formatter: function() {
					                    var tooltip = '<small style="font-size: 12px;text-align: left;display: block;margin-bottom: 5px;">' + Highcharts.dateFormat('%e %b %Y', new Date(this.x)) + '</small>';

					                    $.each(this.points, function(i,e) {
						                    tooltip += '<span style="display: block;float: none;padding: 0;margin:0;text-align: left;font-size: 13px;margin-bottom: 5px;color:'+this.series.color+'">'+this.series.name+':  <b style="color: #000;">'+this.point.y+'</b></span>';
						                });

						                return tooltip;
					                }
					            }

							});
						<?php echo '</script'; ?>
>
					
				<?php }?>
			</div>
		</div>
	</div>
</div><?php }
}
?>