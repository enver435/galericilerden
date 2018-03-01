<?php /* Smarty version 3.1.27, created on 2018-01-19 12:06:03
         compiled from "C:\xampp\htdocs\galericilerden\app\view\register.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:55725a61d11b80cb33_44979110%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd7d53b4058c5e822f88c3940e6275e2ae1b6ae5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\galericilerden\\app\\view\\register.tpl',
      1 => 1516359954,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '55725a61d11b80cb33_44979110',
  'variables' => 
  array (
    'return' => 0,
    'cities' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5a61d11ba402d1_13146839',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5a61d11ba402d1_13146839')) {
function content_5a61d11ba402d1_13146839 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '55725a61d11b80cb33_44979110';
?>
<div id="main" class="login">
	<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

	<div class="page-content">
		<div class="container">
			<?php if (!getUrl(1)) {?>
				<ul class="breadcrumb">
				    <li><a href="<?php echo SITE_URL;?>
">Anasayfa</a></li>
				    <li class="active">Üyelik Oluştur</li>
				</ul>
			<?php } else { ?>
				<ul class="breadcrumb">
				    <li><a href="<?php echo SITE_URL;?>
">Anasayfa</a></li>
				    <li class="active">
				    	<?php if (getUrl(1) == 'individual') {?>
				    		Bireysel Üye Ol
				    	<?php } elseif (getUrl(1) == 'corporate') {?>
				    		Kurumsal Üye Ol
				    	<?php }?>
				    </li>
				</ul>
			<?php }?>
			<div class="row">
				<?php if (!getUrl(1)) {?>
					<div class="col-md-6">
						<div class="block">
							<div class="block-title">
								<h5>Bireysel Üyelik</h5>
							</div>
							<div class="block-content">
								<div class="col-md-12">
									<a href="<?php echo siteUrl('register/individual');?>
">
										<button type="button" class="btn btn-primary" style="margin-bottom: 25px;">Bireysel Üye Ol</button>
									</a>
									<div class="statements">
						                <p>
						                    <i class="icon icon-statement4"></i> Araç Sahibi Olarak Ücretsiz İlan Verme
						                </p>
						                <p>
						                    <i class="icon icon-statement5"></i> 7/24 Yayın Süresi
						                </p>
						                <p>
						                    <i class="icon icon-statement2"></i> İlan Başına 10 Adet Resim Ekleyebilme
						                </p>
						                <p>
						                    <i class="icon icon-statement3"></i> Sıfır Maliyetle İlanınızın Binlerce Kişiye Tanıtılması
						                </p>
						                <p>
						                    <i class="icon icon-statement1"></i> Araçlarınızın En İnce Detayına Kadar Tanıtılabilme Olanağı Sağlanması
						                </p>
						                <p>
						                    <i class="icon icon-statement6"></i> Ücretsiz Yıllık 5 Adet İlan Hakkı
						                </p>
						            </div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="block">
							<div class="block-title">
								<h5>Kurumsal Üyelik</h5>
							</div>
							<div class="block-content">
								<div class="col-md-12">
									<a href="<?php echo siteUrl('register/corporate');?>
">
										<button type="button" class="btn btn-primary" style="margin-bottom: 25px;">Kurumsal Üye Ol</button>
									</a>
									<div class="statements">
						                <p>
						                    <i class="icon icon-statement3"></i> Çok Cazip Fiyatlarla Kesintisiz Bir Şekilde Müşterilerinize Ulaşın
						                </p>
						                <p>
						                    <i class="icon icon-statement7"></i> Size Uygun Özellikler ile Magaza ve Domain Hizmeti
						                </p>
						                <p>
						                    <i class="icon icon-statement5"></i> 7 Gün 24 Saat Açık Mağaza Hizmeti
						                </p>
						                <p>
						                    <i class="icon icon-statement2"></i> İlan Başına 25 Adet Resim Ekleyebilme
						                </p>
						                <p>
						                    <i class="icon icon-statement1"></i> Araçlarınızı ve Firmanızı Detaylı Tanıtma
						                </p>
						                <p>
						                    <i class="icon icon-statement8"></i> Onay Beklemeden İlanlarınızın Yayında Olması
						                </p>
						            </div>
								</div>
							</div>
						</div>
					</div>
					<?php } else { ?>
					<div class="col-md-6">
						<div class="block">
							<div class="block-title">
								<h5>
									<?php if (getUrl(1) == 'individual') {?>
							    		Bireysel Üye Ol
							    	<?php } elseif (getUrl(1) == 'corporate') {?>
							    		Kurumsal Üye Ol
							    	<?php }?>
								</h5>
							</div>
							<div class="block-content">
								<div class="col-md-12">
									<?php if (isset($_POST['reg']) || isset($_POST['activate'])) {?>
										<?php if ($_smarty_tpl->tpl_vars['return']->value['messageType'] == 'success') {?>
											<div class="alert alert-success">
												<strong>Başarılı!</strong> <?php echo $_smarty_tpl->tpl_vars['return']->value['message'];?>

											</div>
										<?php } elseif ($_smarty_tpl->tpl_vars['return']->value['messageType'] == 'error') {?>
											<div class="alert alert-danger">
												<strong>Başarısız!</strong> <?php echo $_smarty_tpl->tpl_vars['return']->value['message'];?>

											</div>
										<?php }?>
									<?php }?>
									<form action="" method="POST">
										<?php if (!$_SESSION['phoneActivate']) {?>
											<div class="form-group">
												<div class="row">
													<div class="col-xs-6">
														<label>Adınız: </label>
														<input type="text" name="name" placeholder="Adınız" class="form-control">
													</div>
													<div class="col-xs-6">
														<label>Soyadınız: </label>
														<input type="text" name="surname" placeholder="Soyadınız" class="form-control" style="width: 100%;">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label>E-Posta Adresiniz: </label>
												<input type="email" name="email" placeholder="E-Posta" class="form-control">
											</div>
											<div class="form-group">
												<label>Şifre: </label>
												<input type="password" name="pass" placeholder="Şifre" class="form-control">
											</div>
											<div class="form-group">
												<label>Cep Telefonunuz: </label>
												<input id="phone" type="tel" name="phone" maxlength="13" class="form-control">
											</div>
											<?php if (getUrl(1) == 'corporate') {?>
												<div class="form-group">
													<label>Faaliyet Alanınız: </label>
													<select name="activity_area" class="form-control">
														<option value="1">Galeri</option>
														<option value="2">Yetkili Bayi</option>
														<option value="3">Üretici Firma</option>
													</select>
												</div>
												<div class="form-group radio-primary">
													<label>İşletme Türü: </label>
													<div class="radio">
					                                    <input type="radio" name="business_type" value="1" checked="" class="magic-radio">
					                                    <label>Şahıs Şirketi</label>
						                            </div>
						                            <div class="radio">
					                                    <input type="radio" name="business_type" value="2" class="magic-radio">
					                                    <label>Limited veya Anonim Şirketi</label>
						                            </div>
												</div>
												<div class="form-group business_type_1">
													<label>TC Kimlik No: </label>
													<input id="tc" type="text" name="tc" maxlength="11" placeholder="TC Kimlik No" class="form-control">
												</div>
												<div class="form-group business_type_2" style="display: none;">
													<label>Ticari Ünvan: </label>
													<input type="text" name="commercial_title" placeholder="Ticari Ünvan" class="form-control">
												</div>
												<div class="form-group">
													<label>İl: </label>
													<select name="city" class="form-control">
														<option value="0" disabled="disabled" selected="selected">İl Seçin</option>
														<?php
$_from = $_smarty_tpl->tpl_vars['return']->value['cities'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['cities'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['cities']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['cities']->value) {
$_smarty_tpl->tpl_vars['cities']->_loop = true;
$foreach_cities_Sav = $_smarty_tpl->tpl_vars['cities'];
?>
															<option value="<?php echo $_smarty_tpl->tpl_vars['cities']->value['CityID'];?>
" data-plate="<?php echo $_smarty_tpl->tpl_vars['cities']->value['PlateNo'];?>
"><?php echo $_smarty_tpl->tpl_vars['cities']->value['CityName'];?>
</option>
														<?php
$_smarty_tpl->tpl_vars['cities'] = $foreach_cities_Sav;
}
?>
													</select>
												</div>
												<div class="form-group">
													<label>İlçe: </label>
													<select name="counties" class="form-control" disabled="disabled">İlçe Seçin</select>
												</div>
												<div class="form-group">
													<label>Adres Detayı: </label>
													<textarea name="address" cols="30" rows="5" class="form-control"></textarea>
												</div>
												<div class="form-group">
													<label>Vergi Dairesi: </label>
													<select name="taxs" class="form-control" disabled="disabled"></select>
												</div>
												<div class="form-group">
													<label>Vergi Numarası: </label>
													<input type="text" id="taxno" name="tax_no" disabled="disabled" class="form-control">
												</div>
												<div class="form-group">
													<label>İş Telefonu:</label>
													<input id="phone_work" type="text" name="phone_work" class="form-control">
												</div>
												<div class="form-group">
													<label>Sabit Telefon:</label>
													<input id="phone_more" type="text" name="phone_more" class="form-control">
												</div>
											<?php }?>
											<div class="checkbox">
												<input type="checkbox" name="rule" value="1" class="magic-checkbox"> <label data-toggle="modal" data-target="#modalUyelik">Üyelik sözleşmesini okudum onaylıyorum</label>
											</div>
											<button type="submit" name="reg" class="btn btn-primary">Üye Ol</button>

											<div class="modal fade" id="modalUyelik" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 99999;">
											  	<div class="modal-dialog" role="document">
												    <div class="modal-content">
												      	<div class="modal-header">
												        	<button type="button" class="close" data-dismiss="modal" aria-label="Çıkış" style="width: auto;padding: 0;"><span aria-hidden="true">&times;</span></button>
												        	<h4 class="modal-title" id="myModalLabel">Üyelik sözleşmesi</h4>
												      	</div>
												      	<div class="modal-body">
												        	<strong>Taraflar:</strong> İşbu sözleşme ve sözleşmeyle atıfta bulunulan ve sözleşmenin ayrılmaz bir parçası olan belgelerden, eklerden ve açıklamalardan oluşan işbu Galericilerden.Com Üyelik Sözleşmesi (hepsi birlikte sözleşme olarak anılacaktır), İzmir Bursa Yolu 60 Km Kümeevler Mah Karacabey/BURSA adresinde mukim Galericilerden.com İnternet Teknolojiler Ltd. Şti (bundan böyle kısaca "Galericilerden.Com" olarak anılacaktır) ile www.galericilerden.com sitesine üye olurken "Üye"nin elektronik olarak onay vermesi ile karşılıklı olarak kabul edilerek yürürlüğe girmiştir.<br><br>

															<strong>Kapsam:</strong> Bu sözleşme Galericilerden.Com'un internet üzerinden firmaların, pazarlamasını yapmak istediği araçların www.galericilerden.com web sitesinde de yayınlanması ile ilgili hizmetleri kapsamaktadır.<br><br>

															<strong>Hizmet Koşulları:</strong> Galericilerden.Com'un sunacağı hizmetler yıllık veya farklı periyotlarda geçerli olacağından, müşterinin talep edeceği her hizmet için farklı bedel ve koşullar geçerli olacaktır. Galericilerden.Com bu hizmetlerinin bedellerinde ve içeriklerinde değişiklik yapma hakkını saklı tutar. Galericilerden.Com dan alınan herhangi bir hizmet, 1 yıllık süresini doldurana dek oluşabilecek fiyat ve içerik değişikliklerinden etkilenmez. Tahsil edilen üyelik ücreti hiçbir suretle iade veya iptal edilmez.<br><br>

															<strong>Üyelik Aktif Durumu:</strong> Sitemizde Üyelik Ücretsiz Olup Herhangi Bir Ücret Talep Edilmemektedir...<br><br>

															<strong>Müşteri Hizmetleri:</strong> Galericilerden.Com üye bireysel ve kurumsal kullanıcılara en iyi şekilde hizmet vermekle yükümlüdür. Şifre ve kullanıcı isimlerinin bildirimi veya şifre değişiklikleri yalnızca elektronik posta ve sms yoluyla iletilir. İrtibat için verilecek telefon veya faks numaraları yalnız acil durumlarda kullanılacak, bu durumlarda üye firmanın güvenlik şifresinin onayı sağlanmadıkça talepler işleme alınmayacaktır.<br><br>

															<strong>Ödemeler ve Tazminatlar:</strong> Üye Firmalar Galericilerden.com'un ilgili hizmetlerine istinaden ileteceği teklifte belirtilen bedeli Kredi Kartı veya Banka Havale/EFT kanalı ile ödemekle yükümlüdür. Tarafların site üyeliğinde belirtikleri ve iletişim bilgileri olarak kaydettiği bilgiler tebligat adresleri olup, bu adreslerde yapılacak her türlü değişiklik yazılı olarak diğer tarafa bildirilmediği taktirde, bu adreslere yapılacak tebligat kendilerine yapılmış sayılacaktır.<br><br>

															<strong>Fikri Mülkiyet Hakları:</strong> Galericilerden.Com internet sitesine girilmesi, sitenin ya da sitedeki bilgilerin ve diğer verilerin programların vs. kullanılması sebebiyle doğabilecek doğrudan ya da dolaylı hiçbir zarardan Galericilerden.com sorumlu değildir. Galericilerden.com işbu site ve site uzantısında mevcut her tür hizmet, ürün, siteyi kullanma koşulları ile sitede sunulan bilgileri önceden bir ihtara gerek olmaksızın değiştirme, siteyi yeniden organize etme, yayını durdurma hakkını saklı tutar. Değişiklikler sitede yayım anında yürürlüğe girer. Sitenin kullanımı ya da siteye giriş ile bu değişiklikler de kabul edilmiş sayılır. Bu internet sitesi Galericilerden.Com'un kontrolü altında olmayan başka internet sitelerine bağlantı veya referans içerebilir. Galericilerden.Com, bu sitelerin içerikleri veya içerdikleri diğer bağlantılardan sorumlu değildir.Galericilerden.Com bu internet sitesinin genel görünüm ve dizaynı ile internet sitesindeki tüm bilgi, resim ve alan adı, logo, ikon, yazılı, elektronik, grafik veya makinede okunabilir şekilde sunulan teknik veriler, bilgisayar yazılımları, uygulanan satış sistemi, iş metodu ve iş modeli de dahil tüm materyallerin ve bunlara ilişkin fikri ve sınai mülkiyet haklarının sahibi veya lisans sahibidir ve yasal koruma altındadır. İnternet sitesinde bulunan hiçbir materyal; önceden izin alınmadan ve kaynak gösterilmeden, kod ve yazılım da dahil olmak üzere, değiştirilemez, kopyalanamaz, çoğaltılamaz, başka bir lisana çevrilemez, yeniden yayımlanamaz, başka bir bilgisayara yüklenemez, postalanamaz, iletilemez, sunulamaz ya da dağıtılamaz. Internet sitesinin bütünü veya bir kısmı başka bir internet sitesinde izinsiz olarak kullanılamaz. Sitenin genel dizaynı tamamı veya bir kısmı aynı kalmak şartı ile birbaşka site ismi altında yayınlanamaz. Aksine hareketler hukuki ve cezai sorumluluğu gerektirir. Galericilerden.Com'un burada açıkça belirtilmeyen diğer tüm hakları saklıdır.<br><br>

															<strong>Güvenlik:</strong> Galericilerden.Com kredi kartı bilgilerinizi yalnızca magaza paketi ya da vitrin ödeme işlemi gerçekleştirilirken kullanır ve kesinlikle veri tabanında kayıtlı olarak tutmaz. Bilgilerinizin gerçekten Galericilerden.Com'a gönderilmesini güvence altına alarak, güvenliğinizi SSL Secure sistemi kullanarak sağlamaktayız. Tüm bilgileriniz 256 bit ile şifrelenmekte ve korunmaktadır..
												      	</div>
												      	<div class="modal-footer">
												        	<button type="button" class="btn btn-default" data-dismiss="modal" style="width: auto;">OK</button>
												      </div>
												    </div>
											  	</div>
											</div>
										<?php } else { ?>
											<div class="form-group">
												<label>Telefon Numaranız: </label>
												<input type="text" value="<?php echo $_SESSION['phoneNumber'];?>
" disabled="disabled" class="form-control">
											</div>
											<div class="form-group">
												<label>Doğrulama Kodu: </label>
												<input type="text" name="code" class="form-control">
											</div>
											<button type="submit" name="activate" class="btn btn-primary">Üyeliğinizi Doğrulayın</button>
										<?php }?>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6"></div>
				<?php }?>
			</div>
		</div>
	</div>
</div>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo siteUrl('public/scripts/jquery.maskedinput.min.js');?>
"><?php echo '</script'; ?>
>

	<?php echo '<script'; ?>
 type="text/javascript">
		$(function() {

			$('select[name=city]').change(function() {

				var cityId  = $(this).val();
				var plateNo = $('option:selected', this).attr('data-plate'); 

				$.ajax({
					type: 'POST',
					url: siteUrl + '/request',
					dataType: 'json',
					data: {'mode': 'getCounties', 'cityId': cityId},
					success: function(response)
					{

						var options = '<option value="0" disabled="disabled" selected="selected">İlçe Seçin</option>';

						$.each(response, function(i, value) {
							options += '\
								<option value="' + value.CountyID + '">' + value.CountyName + '</option>\
							';
						});

						$('select[name=counties]').html(options).removeAttr('disabled', true);
						
					}
				});

				$.ajax({
					type: 'POST',
					url: siteUrl + '/request',
					dataType: 'json',
					data: {'mode': 'getTaxs', 'plateNo': plateNo},
					success: function(response)
					{

						var options = '';

						$.each(response, function(i, value) {
							options += '\
								<option value="' + value.id + '">' + value.daire + '</option>\
							';
						});

						$('select[name=taxs]').html(options).removeAttr('disabled', true);
						$('input[name=tax_no]').html(options).removeAttr('disabled', true);
						
					}
				});
			});

			$('input[name=business_type]').change(function() {
				
				if($('input[name=business_type]:checked').val() == 2)
				{
					$('.form-group.business_type_2').show();
				}
				else
				{
					$('.form-group.business_type_2').hide();
				}

			});

			$("#phone, #phone_work").mask("0 (999) 999 99 99");
			$("#phone_more").mask("0(999) 999 99 99");
			$("#tc").mask("99999999999");
			$("#taxno").mask("9999999999");
		});
	<?php echo '</script'; ?>
>
<?php }
}
?>