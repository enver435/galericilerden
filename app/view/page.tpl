<div id="main">
	{include file="header.tpl"}
	<div class="page-content">
		{literal}
			<style type="text/css">
				.col-md-9 .block-content {padding-top: 10px;padding-bottom: 10px;}
				.col-md-9 .block-content li:hover {background-color: inherit;color: #333;border-bottom: none;}
				.col-md-9 .block-content li {border-bottom: none;cursor: default;}
				.col-md-9 .block-content a {padding: 0;width: auto;height: auto;display: inline-block;}
				p:first-child {margin-top: 10px;}
				.form {margin-top: 25px;}
				.col-md-9 .block-content .material-icons {font-size: 100px;}
				.col-md-9 .block-content .col-md-3 {text-align: center;}
				.cont-header {overflow: hidden;}

				@media only screen and (max-width: 991px) {
					.col-md-9 .block-content {padding-left: 10px;padding-right: 10px;}
					.col-md-9 .block-content .form {padding-left: 15px;padding-right: 15px;}
				}
			</style>
		{/literal}
		<div class="container">
			{if getUrl(1) == 'about'}
				<ul class="breadcrumb">
				    <li><a href="{SITE_URL}">Anasayfa</a></li>
				    <li class="active">Kurumsal</li>
				    <li class="active">Hakkımızda</li>
				</ul>
				<div class="row">
					<div class="col-md-3">
						<div class="block hidden-sm hidden-xs">
							<div class="block-content">
								<ul>
									<li>
				                		<a href="{siteUrl('page/about')}">Hakkımızda</a>
				                	</li>
				                	<li>
				                		<a href="{siteUrl('page/media-images')}">Medya ve Görseller</a>
				                	</li>
				                	<li>
				                		<a href="{siteUrl('page/human-resources')}">İnsan Kaynakları</a>
				                	</li>
				                	<li>
				                		<a href="{siteUrl('page/contact')}">İletişim</a>
				                	</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-9">
						<div class="block">
							<div class="block-title">
								<h5>Hakkımızda</h5>
							</div>
							<div class="block-content">
								<div class="col-md-3 hidden-sm hidden-xs">
									<i class="material-icons">group</i>
								</div>
								<div class="col-md-9">
									<p>2016 Yılında Uğur Koçak Otomotiv ve Treyler Bünyesinde Yayın Hayatına Başlayan Galericilerden.com İşine tutkuyla bağlı profesyonel insan kaynağı, güçlü teknolojik altyapısı ve müşteri odaklı hizmet anlayışı ile  kullanıcılarının hayatlarına dokunarak değer yaratmak, hayallerine ulaşmalarına aracılık etmek ve en iyi deneyimleri yaşatmak için tüm gücüyle çalışmaya devam ediyor</p>
								</div>
							</div>
						</div>	
					</div>
				</div>
			{elseif getUrl(1) == 'media-images'}
				<ul class="breadcrumb">
				    <li><a href="{SITE_URL}">Anasayfa</a></li>
				    <li class="active">Kurumsal</li>
				    <li class="active">Medya ve Görseller</li>
				</ul>
				<div class="row">
					<div class="col-md-3">
						<div class="block hidden-sm hidden-xs">
							<div class="block-content">
								<ul>
									<li>
				                		<a href="{siteUrl('page/about')}">Hakkımızda</a>
				                	</li>
				                	<li>
				                		<a href="{siteUrl('page/media-images')}">Medya ve Görseller</a>
				                	</li>
				                	<li>
				                		<a href="{siteUrl('page/human-resources')}">İnsan Kaynakları</a>
				                	</li>
				                	<li>
				                		<a href="{siteUrl('page/contact')}">İletişim</a>
				                	</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-9">
						<div class="block">
							<div class="block-title">
								<h5>Medya ve Görseller</h5>
							</div>
							<div class="block-content">
								<div class="col-md-3 hidden-sm hidden-xs">
									<i class="material-icons">perm_media</i>
								</div>
								<div class="col-md-9">
									<p>Her türlü bilgi ve görsel talebinizle ilgili bize <a href="mailto:pr@galericilerden.com">pr@galericilerden.com</a> mail adresinden ulaşabilirsiniz.</p>
									<p>
										<img src="{siteUrl('public/images/logo.png')}" width="150" alt="logo">
									</p>
								</div>
							</div>
						</div>	
					</div>
				</div>
			{elseif getUrl(1) == 'human-resources'}
				<ul class="breadcrumb">
				    <li><a href="{SITE_URL}">Anasayfa</a></li>
				    <li class="active">Kurumsal</li>
				    <li class="active">İnsan Kaynakları</li>
				</ul>
				<div class="row">
					<div class="col-md-3">
						<div class="block hidden-sm hidden-xs">
							<div class="block-content">
								<ul>
									<li>
				                		<a href="{siteUrl('page/about')}">Hakkımızda</a>
				                	</li>
				                	<li>
				                		<a href="{siteUrl('page/media-images')}">Medya ve Görseller</a>
				                	</li>
				                	<li>
				                		<a href="{siteUrl('page/human-resources')}">İnsan Kaynakları</a>
				                	</li>
				                	<li>
				                		<a href="{siteUrl('page/contact')}">İletişim</a>
				                	</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-9">
						{if issetPost('send')}
							{if $return.messageType == 'error'}
								<div class="alert alert-danger">{$return.message}</div>
							{elseif $return.messageType == 'success'}
								<div class="alert alert-success">{$return.message}</div>
							{/if}
						{/if}
						<div class="block">
							<div class="block-title">
								<h5>İnsan Kaynakları</h5>
							</div>
							<div class="block-content">
								<div class="col-md-10 col-md-offset-1">
									<div class="row">
										<div class="cont-header">
											<div class="col-md-3 hidden-sm hidden-xs" style="padding-top: 45px;">
												<i class="material-icons">work</i>
											</div>
											<div class="col-md-9">
												<p>
							                        <b>Yeni başlağımız yolculuğa bizimle beraber çıkmak ister misin?</b>
							                    </p>
							                    <p>
							                        Aşağıdaki pozisyonlardan biri senin için uygun ise, bize cv’ni dahil etmeden kendini anlatan bir e-posta yollamanı bekliyoruz.
							                    </p>
						                    	<ul style="padding: inherit;margin-bottom: 10px;">
							                        <li style="display: list-item;list-style: disc;">Pazarlama Uzmanı</li>
							                        <li style="display: list-item;list-style: disc;">JR. Yazılım Geliştirme Uzmanı</li>
							                        <li style="display: list-item;list-style: disc;">Muhasebe Uzmanı</li>
							                        <li style="display: list-item;list-style: disc;">Stajer</li>
						                   		</ul>
											</div>
										</div>
										<div class="form">
				                   			<form action="" method="POST">
				                   				<div class="form-group">
				                   					<label>Ad Soyad: </label>
				                   					<input type="text" name="name_surname" required="required" class="form-control">
				                   				</div>
				                   				<div class="form-group">
				                   					<label>Eposta: </label>
				                   					<input type="email" name="email" required="required" class="form-control">
				                   				</div>
				                   				<div class="form-group">
				                   					<label>Telefon: </label>
				                   					<input type="text" id="phone" name="phone" required="required" class="form-control">
				                   				</div>
				                   				<div class="form-group">
				                   					<label>Lütfen Kendinizi Tanıtın: </label>
				                   					<textarea name="message" cols="30" rows="10" required="required" class="form-control"></textarea>
				                   				</div>
				                   				<button type="submit" name="send" class="btn btn-primary pull-right" style="padding: 10px 25px;margin-bottom: 10px;">Gönder</button>
				                   			</form>
				                   			<script type="text/javascript" src="{siteUrl('public/scripts/jquery.maskedinput.min.js')}"></script>
				                   			<script type="text/javascript">
				                   				$(function() {
				                   					$("#phone").mask("0 (999) 999 99 99");
				                   				});
				                   			</script>
				                   		</div>
									</div>
		                   		</div>
							</div>
						</div>	
					</div>
				</div>
			{elseif getUrl(1) == 'contact'}
				<ul class="breadcrumb">
				    <li><a href="{SITE_URL}">Anasayfa</a></li>
				    <li class="active">Kurumsal</li>
				    <li class="active">İletişim</li>
				</ul>
				<div class="row">
					<div class="col-md-3">
						<div class="block hidden-sm hidden-xs">
							<div class="block-content">
								<ul>
									<li>
				                		<a href="{siteUrl('page/about')}">Hakkımızda</a>
				                	</li>
				                	<li>
				                		<a href="{siteUrl('page/media-images')}">Medya ve Görseller</a>
				                	</li>
				                	<li>
				                		<a href="{siteUrl('page/human-resources')}">İnsan Kaynakları</a>
				                	</li>
				                	<li>
				                		<a href="{siteUrl('page/contact')}">İletişim</a>
				                	</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-9">
						{if issetPost('send')}
							{if $return.messageType == 'error'}
								<div class="alert alert-danger">{$return.message}</div>
							{elseif $return.messageType == 'success'}
								<div class="alert alert-success">{$return.message}</div>
							{/if}
						{/if}
						<div class="block">
							<div class="block-title">
								<h5>İletişim</h5>
							</div>
							<div class="block-content">
								<div class="col-md-10 col-md-offset-1">
									<div class="row">
										<div class="cont-header">
											<div class="col-md-3 hidden-sm hidden-xs">
												<i class="material-icons">mail</i>
											</div>
											<div class="col-md-9">
												<p>Aşağıdaki formu doldurarak istediğiniz konuda öneri, şikayet yada taleplerinizi bize iletebilirsiniz.</p>
											</div>
										</div>
										<div class="form">
				                   			<form action="" method="POST">
				                   				<div class="form-group">
				                   					<label>Ad Soyad: </label>
				                   					<input type="text" name="name_surname" required="required" class="form-control">
				                   				</div>
				                   				<div class="form-group">
				                   					<label>Eposta: </label>
				                   					<input type="email" name="email" required="required" class="form-control">
				                   				</div>
				                   				<div class="form-group">
				                   					<label>Telefon: </label>
				                   					<input type="text" id="phone" name="phone" required="required" class="form-control">
				                   				</div>
				                   				<div class="form-group">
				                   					<label>Konu: </label>
				                   					<input type="text" name="title" required="required" class="form-control">
				                   				</div>
				                   				<div class="form-group">
				                   					<label>Mesajınız: </label>
				                   					<textarea name="message" cols="30" rows="10" required="required" class="form-control"></textarea>
				                   				</div>
				                   				<button type="submit" name="send" class="btn btn-primary pull-right" style="padding: 10px 25px;margin-bottom: 10px;">Gönder</button>
				                   			</form>
				                   			<script type="text/javascript" src="{siteUrl('public/scripts/jquery.maskedinput.min.js')}"></script>
				                   			<script type="text/javascript">
				                   				$(function() {
				                   					$("#phone").mask("0 (999) 999 99 99");
				                   				});
				                   			</script>
				                   		</div>
									</div>
		                   		</div>
							</div>
						</div>	
					</div>
				</div>
			{elseif getUrl(1) == 'privacy-policy'}
				<ul class="breadcrumb">
				    <li><a href="{SITE_URL}">Anasayfa</a></li>
				    <li class="active">Gizlilik ve Kullanım</li>
				    <li class="active">Gizlilik Politikası</li>
				</ul>
				<div class="row">
					<div class="col-md-3">
						<div class="block hidden-sm hidden-xs">
							<div class="block-content">
								<ul>
									<li>
				                		<a href="{siteUrl('page/safe-shopping-tips')}">Güvenli Alışverişin İpuçları</a>
				                	</li>
				                	<li>
				                		<a href="{siteUrl('page/terms-of-use')}">Kullanım Koşulları</a>
				                	</li>
				                	<li>
				                		<a href="{siteUrl('page/membership-agreement')}">Üyelik Sözleşmesi</a>
				                	</li>
				                	<li>
				                		<a href="{siteUrl('page/privacy-policy')}">Gizlilik Politikası</a>
				                	</li>
				                	<li>
				                		<a href="{siteUrl('page/help-and-processing-guide')}">Yardım ve İşlem Rehberi</a>
				                	</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-9">
						<div class="block">
							<div class="block-title">
								<h5>Gizlilik Politikası</h5>
							</div>
							<div class="block-content">
								<div class="col-lg-12 col-md-12 col-xs-12">
									<p>GALERICILERDEN.COM, "Portal"ından Kullanıcılar tarafından kendisine elektronik ortamdan iletilen kişisel bilgileri, Üyeleri ile yaptığı "GALERICILERDEN.COM Üyelik Sözleşmesi" ile belirlenen amaçlar ve kapsam dışında üçüncü kişilere açıklamayacaktır.</p>

									<p>Sistemle ilgili sorunların tanımlanması ve "Portal"da çıkabilecek sorunların ivedilikle giderilebilmesi için, GALERICILERDEN.COM, gerektiğinde kullanıcıların IP adresini tespit etmekte ve bunu kullanmaktadır. IP adresleri, kullanıcıları genel bir şekilde tanımlamak ve kapsamlı demografik bilgi toplamak amacıyla da kullanılabilir.</p>

									<p>Üyelik veya "Portal" üzerindeki çeşitli form ve oylamaların doldurulması suretiyle kullanıcıların kendileriyle ilgili bir takım kişisel bilgileri (isim-soyisim, firma bilgileri, telefon, adres veya e-posta adresleri gibi) GALERICILERDEN.COM'e vermeleri gerekmektedir. GALERICILERDEN.COM, GALERICILERDEN.COM Üyelik Sözleşmesi ile belirlenen amaçlar ve kapsam dışında da, talep edilen bilgileri GALERICILERDEN.COM veya işbirliği içinde olduğu kişiler tarafından doğrudan pazarlama yapmak amacıyla kullanabilir. Kişisel bilgiler, gerektiğinde kullanıcıyla temas kurmak için de kullanılabilir. GALERICILERDEN.COM tarafından talep edilen bilgiler veya kullanıcı tarafından sağlanan bilgiler veya GALERICILERDEN.COM "portal"ı üzerinden yapılan işlemlerle ilgili bilgiler; GALERICILERDEN.COM ve işbirliği içinde olduğu kişiler tarafından, "GALERICILERDEN.COM Üyelik Sözleşmesi" ile belirlenen amaçlar ve kapsam dışında da, kullanıcının kimliği ifşa edilmeden çeşitli istatistiksel değerlendirmeler, veri tabanı oluşturma ve pazar araştırmalarında kullanılabilir.</p>

									<p>GALERICILERDEN.COM "Portal"ı dâhilinde başka sitelere link verebilir. GALERICILERDEN.COM, link vasıtasıyla erişilen sitelerin gizlilik uygulamaları ve içeriklerine yönelik herhangi bir sorumluluk taşımamaktadır. Kişisel bilgileriniz; kişi isim-soyisim, firma bilgileri, adresi, telefon numarası, e-posta adresi ve kullanıcıyı tanımlamaya yönelik her türlü bilgiyi içermektedir. GALERICILERDEN.COM, işbu gizlilik politikasında aksi belirtilmedikçe kişisel bilgilerinizden herhangi birini GALERICILERDEN.COM'in işbirliği içinde olmadığı şirketlere ve üçüncü kişilere açıklamayacaktır. Aşağıda belirtilen sınırlı durumlarda GALERICILERDEN.COM, işbu "Gizlilik Politikası" hükümleri dışında kullanıcılara ait bilgileri üçüncü kişilere açıklayabilir. Bu durumlar sınırlı sayıda olmak üzere;</p>

									<p>1. Kanun, Kanun Hükmünde Kararname, Yönetmelik v.b. yetkili hukuki otorite tarafından çıkarılan ve yürürlülükte olan hukuk kurallarının getirdiği zorunluluklara uymak;</p>

									<p>2. GALERICILERDEN.COM'in kullanıcılarla akdettiği "GALERICILERDEN.COM Üyelik Sözleşmesi"'nin ve diğer sözleşmelerin gereklerini yerine getirmek ve bunları uygulamaya koymak amacıyla;</p>

									<p>3. Yetkili idari ve adli otorite tarafından usulüne göre yürütülen bir araştırma veya soruşturmanın yürütümü amacıyla kullanıcılarla ilgili bilgi talep edilmesi;</p>

									<p>4. Kullanıcıların hakları veya güvenliklerini korumak için bilgi vermenin gerekli olduğu hallerdir.</p>

									<p>GALERICILERDEN.COM, gizli bilgileri kesinlikle özel ve gizli tutmayı, bunu bir sır saklama yükümü olarak addetmeyi ve gizliliğin sağlanması ve sürdürülmesi, gizli bilginin tamamının veya herhangi bir kısmının kamu alanına girmesini veya yetkisiz kullanımını veya üçüncü bir kişiye ifşasını önlemek için gerekli tüm tedbirleri almayı ve gerekli özeni göstermeyi taahhüt etmektedir.</p>

									<p>GALERICILERDEN.COM, kullanıcılar ve kullanıcıların "Portal"ı kullanımı hakkındaki bilgileri teknik bir iletişim dosyasını (Çerez-Cookie) kullanarak elde edebilir. Bahsi geçen teknik iletişim dosyaları, ana bellekte saklanmak üzere bir internet sitesinin kullanıcının tarayıcısına (browser) gönderdiği küçük metin dosyalarıdır. Teknik iletişim dosyası bir internet sitesi hakkında durum ve tercihleri saklayarak İnternet'in kullanımını kolaylaştırır. Teknik iletişim dosyası, "Portal"ı kaç kişinin kullandığını, bir kişinin "Portal"ı hangi amaçla, kaç kez ziyaret ettiğini ve ne kadar kaldıkları hakkında istatistiksel bilgileri elde etmeye ve kullanıcılar için özel tasarlanmış kullanıcı sayfalarından dinamik olarak reklam ve içerik üretilmesine yardımcı olur. Teknik iletişim dosyası, ana bellekte veya e-postanızdan veri veya başkaca herhangi bir kişisel bilgi almak için tasarlanmamıştır. Tarayıcıların pek çoğu başta teknik iletişim dosyasını kabul eder biçimde tasarlanmıştır ancak kullanıcılar dilerse teknik iletişim dosyasının gelmemesi veya teknik iletişim dosyasının gönderildiğinde ikaz verilmesini sağlayacak biçimde ayarları değiştirebilirler.</p>

									<p>Google AFS reklamlarının GALERICILERDEN.COM’e yönlendirilmesi esnasında Google KULLANICILARIN tarayıcısına çerez yerleştirebilir veya bunlarda yer alan çerezleri okuyabilir veya bilgi toplamak amacı ile web işaretleri kullanabilir.</p>

									<p>GALERICILERDEN.COM, tarafından "Portal" dâhilinde düzenlenen periyodik anketlere cevap veren kullanıcılardan talep edilen bilgiler, GALERICILERDEN.COM ve işbirliği içindeki kişiler tarafından bu kullanıcılara doğrudan pazarlama yapmak, istatistikî analiz yapmak ve veri tabanı oluşturmak amacıyla kullanılmaktadır. GALERICILERDEN.COM, işbu "Gizlilik Politikası" hükümlerini dilediği zaman "Portal"da yayınlamak suretiyle değiştirebilir. GALERICILERDEN.COM'in değişiklik yaptığı Gizlilik Politikası hükümleri "portal"da yayınlandığı tarihte yürürlülük kazanır.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			{elseif getUrl(1) == 'safe-shopping-tips'}
				<ul class="breadcrumb">
				    <li><a href="{SITE_URL}">Anasayfa</a></li>
				    <li class="active">Gizlilik ve Kullanım</li>
				    <li class="active">Güvenli Alışverişin İpuçları</li>
				</ul>
				<div class="row">
					<div class="col-md-3">
						<div class="block hidden-sm hidden-xs">
							<div class="block-content">
								<ul>
									<li>
				                		<a href="{siteUrl('page/safe-shopping-tips')}">Güvenli Alışverişin İpuçları</a>
				                	</li>
				                	<li>
				                		<a href="{siteUrl('page/terms-of-use')}">Kullanım Koşulları</a>
				                	</li>
				                	<li>
				                		<a href="{siteUrl('page/membership-agreement')}">Üyelik Sözleşmesi</a>
				                	</li>
				                	<li>
				                		<a href="{siteUrl('page/privacy-policy')}">Gizlilik Politikası</a>
				                	</li>
				                	<li>
				                		<a href="{siteUrl('page/help-and-processing-guide')}">Yardım ve İşlem Rehberi</a>
				                	</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-9">
						<div class="block">
							<div class="block-title">
								<h5>Güvenli Alışverişin İpuçları</h5>
							</div>
							<div class="block-content">
								<div class="col-lg-12 col-md-12 col-xs-12">
									<p>Değerli ziyaretçimiz,</p><br>

									<p>Sitemizde ilan veren ve arayan kullanıcılarımız arasında iyi niyet ve güven ilişkisi esastır.</p><br>

									<p>Ancak araç satın alırken veya kiralarken olumsuz durumlarla karşılaşmamanız için aşağıdaki konularda dikkatli olmalısınız:</p><br>
									
									<ul style="padding: inherit;margin-bottom: 10px;">
										<li style="color: #ff263a;display: list-item;list-style: disc;margin-bottom: 10px;">Satıcıyla yüz yüze görüşmeden kesinlikle para göndermeyin. Aracı görmeden kapora için para gönderilmesi taleplerini kabul etmeyin.</li>
										<li style="color: #ff263a;display: list-item;list-style: disc;margin-bottom: 10px;">Alacağınız veya kiralayacağınız aracı görmeden, hiçbir sebeple kapora ve benzeri bir ödeme gerçekleştirmeyin ve/veya aracı satın almayın.</li>
										<li style="display: list-item;list-style: disc;margin-bottom: 10px;">Tanımadığınız kişilere TC kimlik numarası ve cep telefonu numaraları kullanılarak yapılabilen para transferlerini gerçekleştirmeyin.</li>
										<li style="display: list-item;list-style: disc;margin-bottom: 10px;">Para ödemesi ile ürün teslimini (araç devir işlemini) aynı anda yapın</li>
										<li style="display: list-item;list-style: disc;margin-bottom: 10px;">İlgilendiğiniz araçla ilgili satıcıdan detaylı bilgi alınız. Araç plaka numarası ile araç üzerinde herhangi bir hak mahrumiyeti (hacizli, rehinli vb.) olup olmadığını araştırın.</li>
										<li style="display: list-item;list-style: disc;margin-bottom: 10px;">Alacağınız aracın tescil belgesinde bulunan motor ve şasi numarası ile araç üzerindeki motor ve şasi numarasının aynı olmasına dikkat ediniz. Aracın servis kayıtlarını kontrol edin.</li>
										<li style="display: list-item;list-style: disc;margin-bottom: 10px;">Kişisel verilerinizi ve üyelik bilgilerinizi (TC kimlik numarası, kredi kartı verileri, vb.) kimse ile paylaşmayın.</li>
										<li style="display: list-item;list-style: disc;margin-bottom: 10px;">Herhangi bir ön ödeme veya kapora ödemesi yapmanız sonucunda mal/ürün teslim alamamanız halinde, www.galericilerden.com internet sitesinin hiçbir hukuki sorumluluğu bulunmamaktadır.</li>
									</ul><br>
									
									<p class="text-center">Olumsuz bir durumla karşılaştığınızda en yakın Emniyet birimine giderek ilgili kişiler hakkında şikayetçi olabilirsiniz.</p>

									<p class="text-center">"Bu uyarı mesajı Emniyet Genel Müdürlüğü'nün koordinasyonuyla hazırlanmıştır."</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			{elseif getUrl(1) == 'advertisement'}
				<ul class="breadcrumb">
				    <li><a href="{SITE_URL}">Anasayfa</a></li>
				    <li class="active">Hizmetlerimiz</li>
				    <li class="active">Reklam</li>
				</ul>
				<div class="row">
					<div class="col-md-3">
						<div class="block hidden-sm hidden-xs">
							<div class="block-content">
								<ul>
									<li>
				                		<a href="{siteUrl('page/doping')}">Doping</a>
				                	</li>
				                	<li>
				                		<a href="{siteUrl('page/advertisement')}">Reklam</a>
				                	</li>
				                	<li>
				                		<a href="{siteUrl('page/mobile')}">Mobil</a>
				                	</li>
				                	<li>
				                		<a href="{siteUrl('page/safe-shopping-system')}">Güvenli Alışveriş Sistemi</a>
				                	</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-9">
						{if issetPost('send')}
							{if $return.messageType == 'error'}
								<div class="alert alert-danger">{$return.message}</div>
							{elseif $return.messageType == 'success'}
								<div class="alert alert-success">{$return.message}</div>
							{/if}
						{/if}
						<div class="block">
							<div class="block-title">
								<h5>Reklam</h5>
							</div>
							<div class="block-content">
								<div class="col-md-10 col-md-offset-1">
									<div class="row">
										<div class="cont-header">
											<div class="col-md-3 hidden-sm hidden-xs" style="margin-top: 20px;">
												<i class="material-icons">business</i>
											</div>
											<div class="col-md-9">
												<p>Galericilerden.com, Türkiye ve dünyadaki galeri ilanlarını hedef kitlesi ile buluşturan bir platformu sunmaktadır. Sürekli gelişen içeriği ile sürekli büyüyen Galericilerden.com, ülkemizdeki galeri piyasasının nabzını tutan en etkili platformdur.</p>

												<p>Galericilerden.com’a sponsor olmak veya reklam konusunda size en uygun seçenekleri önerebilmemiz için lütfen aşağıdaki formu doldurunuz.</p>
											</div>
										</div>
										<div class="form">
				                   			<form action="" method="POST">
				                   				<div class="form-group">
				                   					<label>Ad Soyad: </label>
				                   					<input type="text" name="name_surname" required="required" class="form-control">
				                   				</div>
				                   				<div class="form-group">
				                   					<label>Eposta: </label>
				                   					<input type="email" name="email" required="required" class="form-control">
				                   				</div>
				                   				<div class="form-group">
				                   					<label>Telefon: </label>
				                   					<input type="text" id="phone" name="phone" required="required" class="form-control">
				                   				</div>
				                   				<div class="form-group">
				                   					<label>Mesajınız: </label>
				                   					<textarea name="message" cols="30" rows="10" required="required" class="form-control"></textarea>
				                   				</div>
				                   				<button type="submit" name="send" class="btn btn-primary pull-right" style="padding: 10px 25px;margin-bottom: 10px;">Gönder</button>
				                   			</form>
				                   			<script type="text/javascript" src="{siteUrl('public/scripts/jquery.maskedinput.min.js')}"></script>
				                   			<script type="text/javascript">
				                   				$(function() {
				                   					$("#phone").mask("0 (999) 999 99 99");
				                   				});
				                   			</script>
				                   		</div>
									</div>
		                   		</div>
							</div>
						</div>	
					</div>
				</div>
			{elseif getUrl(1) == 'membership-agreement'}
				<ul class="breadcrumb">
				    <li><a href="{SITE_URL}">Anasayfa</a></li>
				    <li class="active">Gizlilik ve Kullanım</li>
				    <li class="active">Gizlilik Politikası</li>
				</ul>
				<div class="row">
					<div class="col-md-3">
						<div class="block hidden-sm hidden-xs">
							<div class="block-content">
								<ul>
									<li>
				                		<a href="{siteUrl('page/safe-shopping-tips')}">Güvenli Alışverişin İpuçları</a>
				                	</li>
				                	<li>
				                		<a href="{siteUrl('page/terms-of-use')}">Kullanım Koşulları</a>
				                	</li>
				                	<li>
				                		<a href="{siteUrl('page/membership-agreement')}">Üyelik Sözleşmesi</a>
				                	</li>
				                	<li>
				                		<a href="{siteUrl('page/privacy-policy')}">Gizlilik Politikası</a>
				                	</li>
				                	<li>
				                		<a href="{siteUrl('page/help-and-processing-guide')}">Yardım ve İşlem Rehberi</a>
				                	</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-9">
						<div class="block">
							<div class="block-title">
								<h5>Gizlilik Politikası</h5>
							</div>
							<div class="block-content">
								<div class="col-lg-12 col-md-12 col-xs-12">
									<strong>Taraflar:</strong> İşbu sözleşme ve sözleşmeyle atıfta bulunulan ve sözleşmenin ayrılmaz bir parçası olan belgelerden, eklerden ve açıklamalardan oluşan işbu Galericilerden.Com Üyelik Sözleşmesi (hepsi birlikte sözleşme olarak anılacaktır), İzmir Bursa Yolu 60 Km Kümeevler Mah Karacabey/BURSA adresinde mukim Galericilerden.com İnternet Teknolojiler Ltd. Şti (bundan böyle kısaca "Galericilerden.Com" olarak anılacaktır) ile www.galericilerden.com sitesine üye olurken "Üye"nin elektronik olarak onay vermesi ile karşılıklı olarak kabul edilerek yürürlüğe girmiştir.<br><br>

									<strong>Kapsam:</strong> Bu sözleşme Galericilerden.Com'un internet üzerinden firmaların, pazarlamasını yapmak istediği araçların www.galericilerden.com web sitesinde de yayınlanması ile ilgili hizmetleri kapsamaktadır.<br><br>

									<strong>Hizmet Koşulları:</strong> Galericilerden.Com'un sunacağı hizmetler yıllık veya farklı periyotlarda geçerli olacağından, müşterinin talep edeceği her hizmet için farklı bedel ve koşullar geçerli olacaktır. Galericilerden.Com bu hizmetlerinin bedellerinde ve içeriklerinde değişiklik yapma hakkını saklı tutar. Galericilerden.Com dan alınan herhangi bir hizmet, 1 yıllık süresini doldurana dek oluşabilecek fiyat ve içerik değişikliklerinden etkilenmez. Tahsil edilen üyelik ücreti hiçbir suretle iade veya iptal edilmez.<br><br>

									<strong>Üyelik Aktif Durumu:</strong> Sitemizde Üyelik Ücretsiz Olup Herhangi Bir Ücret Talep Edilmemektedir...<br><br>

									<strong>Müşteri Hizmetleri:</strong> Galericilerden.Com üye bireysel ve kurumsal kullanıcılara en iyi şekilde hizmet vermekle yükümlüdür. Şifre ve kullanıcı isimlerinin bildirimi veya şifre değişiklikleri yalnızca elektronik posta ve sms yoluyla iletilir. İrtibat için verilecek telefon veya faks numaraları yalnız acil durumlarda kullanılacak, bu durumlarda üye firmanın güvenlik şifresinin onayı sağlanmadıkça talepler işleme alınmayacaktır.<br><br>

									<strong>Ödemeler ve Tazminatlar:</strong> Üye Firmalar Galericilerden.com'un ilgili hizmetlerine istinaden ileteceği teklifte belirtilen bedeli Kredi Kartı veya Banka Havale/EFT kanalı ile ödemekle yükümlüdür. Tarafların site üyeliğinde belirtikleri ve iletişim bilgileri olarak kaydettiği bilgiler tebligat adresleri olup, bu adreslerde yapılacak her türlü değişiklik yazılı olarak diğer tarafa bildirilmediği taktirde, bu adreslere yapılacak tebligat kendilerine yapılmış sayılacaktır.<br><br>

									<strong>Fikri Mülkiyet Hakları:</strong> Galericilerden.Com internet sitesine girilmesi, sitenin ya da sitedeki bilgilerin ve diğer verilerin programların vs. kullanılması sebebiyle doğabilecek doğrudan ya da dolaylı hiçbir zarardan Galericilerden.com sorumlu değildir. Galericilerden.com işbu site ve site uzantısında mevcut her tür hizmet, ürün, siteyi kullanma koşulları ile sitede sunulan bilgileri önceden bir ihtara gerek olmaksızın değiştirme, siteyi yeniden organize etme, yayını durdurma hakkını saklı tutar. Değişiklikler sitede yayım anında yürürlüğe girer. Sitenin kullanımı ya da siteye giriş ile bu değişiklikler de kabul edilmiş sayılır. Bu internet sitesi Galericilerden.Com'un kontrolü altında olmayan başka internet sitelerine bağlantı veya referans içerebilir. Galericilerden.Com, bu sitelerin içerikleri veya içerdikleri diğer bağlantılardan sorumlu değildir.Galericilerden.Com bu internet sitesinin genel görünüm ve dizaynı ile internet sitesindeki tüm bilgi, resim ve alan adı, logo, ikon, yazılı, elektronik, grafik veya makinede okunabilir şekilde sunulan teknik veriler, bilgisayar yazılımları, uygulanan satış sistemi, iş metodu ve iş modeli de dahil tüm materyallerin ve bunlara ilişkin fikri ve sınai mülkiyet haklarının sahibi veya lisans sahibidir ve yasal koruma altındadır. İnternet sitesinde bulunan hiçbir materyal; önceden izin alınmadan ve kaynak gösterilmeden, kod ve yazılım da dahil olmak üzere, değiştirilemez, kopyalanamaz, çoğaltılamaz, başka bir lisana çevrilemez, yeniden yayımlanamaz, başka bir bilgisayara yüklenemez, postalanamaz, iletilemez, sunulamaz ya da dağıtılamaz. Internet sitesinin bütünü veya bir kısmı başka bir internet sitesinde izinsiz olarak kullanılamaz. Sitenin genel dizaynı tamamı veya bir kısmı aynı kalmak şartı ile birbaşka site ismi altında yayınlanamaz. Aksine hareketler hukuki ve cezai sorumluluğu gerektirir. Galericilerden.Com'un burada açıkça belirtilmeyen diğer tüm hakları saklıdır.<br><br>

									<strong>Güvenlik:</strong> Galericilerden.Com kredi kartı bilgilerinizi yalnızca magaza paketi ya da vitrin ödeme işlemi gerçekleştirilirken kullanır ve kesinlikle veri tabanında kayıtlı olarak tutmaz. Bilgilerinizin gerçekten Galericilerden.Com'a gönderilmesini güvence altına alarak, güvenliğinizi SSL Secure sistemi kullanarak sağlamaktayız. Tüm bilgileriniz 256 bit ile şifrelenmekte ve korunmaktadır..
								</div>
							</div>
						</div>
					</div>
				</div>
			{/if}
		</div>
		{if getUrl(1) == 'doping'}
			{literal}
				<style type="text/css">
					.doping-icon {text-align: center;}
					.doping-icon i {font-size: 100px;}
					.dopings {background-color: #eff3f4;overflow: hidden;margin-top: -25px;padding-top: 25px;padding-bottom: 25px;}
					.dopingsTwo {background-color: #fff;padding: 100px 0;overflow: hidden;}
					.doping {padding: 100px 0;overflow: hidden;background-color: #fff;}
					.doping:nth-child(even) {background-color: #eff3f4;}
					.doping:last-child {padding-bottom: 160px;}

					@media only screen and (max-width: 991px)
					{
						.dopingsTwo {text-align: center;padding: 50px 0;}
						.dopings h1 {font-size: 30px !important;}
						.doping {text-align: center;padding: 50px 0;}
						.doping .col-md-6 {padding-top: 50px;}
					}
				</style>
			{/literal}

			<section class="dopings">
				<div class="container">
					<h1 style="margin: 0;font-size: 46px;color: #27313c;text-align: center;">galericilerden.com doping</h1>
					<h2 style="margin: 10px 0 30px;font-size: 15px;font-weight: 400;color: #27313c;line-height: 30px;text-align: center;">Doping, ilanınızı <a href="{SITE_URL}" title="galericilerden.com">galericilerden.com</a>’da ve içerik ortaklarında ön plana çıkartarak çok daha fazla kişi tarafından<br>
		                görüntülenmesini ve hızlıca satılmasını sağlar.
		            </h2>
					
	            	<div class="col-md-10 col-md-offset-1">
	            		<div class="row">
		                	{foreach $return.dopingList as $doping}
		                		<div class="col-md-3">
		                			<div class="doping-icon">
										{if $doping.id == 1}
											<i class="material-icons">store</i>
										{elseif $doping.id == 2}
											<i class="material-icons">alarm</i>
										{elseif $doping.id == 3}
											<i class="material-icons">trending_up</i>
										{elseif $doping.id == 4}
											<i class="material-icons">view_day</i>
										{/if}
									</div>
									<h5 class="text-center">{$doping.doping_name}</h5>
									<p class="text-center">{$doping.doping_text}</p>
		                		</div>
		                	{/foreach}
	                	</div>
	                </div>
				</div>
            </section>

            <section class="dopingsTwo">
            	<div class="container">
            		<div class="col-md-4">
	            		<i class="material-icons" style="font-size: 250px;">flash_on</i>
	            	</div>
	            	<div class="col-md-8">
	            		<h3>DOPİNG AVANTAJLARI</h3>

	            		<p>Doping, Galericilerden.com’da ve içerik ortaklarında ilanınızı ön plana çıkartarak çok daha fazla kişi tarafından görüntülenmesini sağlar.</p>

	            		<p>Doping hizmeti alarak, ilanınızın daha kısa sürede daha fazla görüntülenmesini sağlayabilir ve ilanınızın satılmasınız kolaylaştırabilirsiniz.</p>

	            		<p>Tercihinize uygun doping ile ilanınızı güçlendirerek, daha fazla alıcının size ulaşmasını sağlayabilir ve ilanınızı istediğiniz fiyata daha kısa zamanda satabilirsiniz.</p>
	            	</div>

            	</div>
            </section>
			
            {foreach $return.dopingList as $doping}
            	<section class="doping dopings-{$doping.id}">
            		<div class="container">
            			<div class="col-md-6">
	            			{if $doping.id == 1}
								<img src="{siteUrl('public/images/doping/home.webp')}" width="100%" alt="doping home">
							{elseif $doping.id == 2}
								<img src="{siteUrl('public/images/doping/acil.webp')}" width="100%" alt="doping acil">
							{elseif $doping.id == 3}
								<img src="{siteUrl('public/images/doping/up.webp')}" width="100%" alt="doping up">
							{elseif $doping.id == 4}
								<img src="{siteUrl('public/images/doping/differently.webp')}" width="100%" alt="doping differently">
							{/if}
	            		</div>
	            		<div class="col-md-6">
	            			<div class="doping-icon">
								{if $doping.id == 1}
									<i class="material-icons">store</i>
								{elseif $doping.id == 2}
									<i class="material-icons">alarm</i>
								{elseif $doping.id == 3}
									<i class="material-icons">trending_up</i>
								{elseif $doping.id == 4}
									<i class="material-icons">view_day</i>
								{/if}
							</div>
							<h5 class="text-center">{$doping.doping_name}</h5>
							<p class="text-center">{$doping.doping_text}</p>
							<h5 class="text-center">Doping kullanım süresi: {$doping.doping_time} gün</h5><br>
							<h5 class="text-center">Bireysel Üyeler İçin: 
								{if $doping.doping_individual_price > 0}
									{$doping.doping_individual_price} TL
								{else}
									Ücretsiz
								{/if}
							</h5>
							<h5 class="text-center">Kurumsal Üyeler İçin: 
								{if $doping.doping_corporate_price > 0}
									{$doping.doping_individual_price} TL
								{else}
									Ücretsiz
								{/if}
							</h5>
	            		</div>
            		</div>
            	</section>
            {/foreach}
        {elseif getUrl(1) == 'mobile'}
        	<link rel="stylesheet" href="{siteUrl('public/styles/devices.min.css')}">
        	{literal}
        		<style type="text/css">
        			#main {background: #ECE9E6;background: #ffd6d8;background: -webkit-linear-gradient(to right, #eef2f3, #ffd6d8);background: linear-gradient(to right, #eef2f3, #ffd6d8);}
        			.page-content {margin-top: 0;}
        			section.mobile {padding-top: 100px;}
        			section.mobile .col-md-7 {margin-top: -170px;}
        			section.mobile .market {margin-left: 20px;}
        			section.mobile .market li {display: inline-block;margin-right: 20px;}
        			section.mobile .market li:last-child {margin-right: 0;}
        			section.mobile .col-md-5 {margin-top: 10%;}


        			@media only screen and (max-width: 1200px)
        			{
        				.market li img {width: 155px;}
        				.marvel-device.iphone-x {width: 75% !important;margin-right: -35% !important;}
						.marvel-device.iphone4s {width: 65% !important;margin-top: 19% !important;}
        			}

        			@media only screen and (max-width: 991px)
        			{
        				section.mobile {padding-top: 170px;}
        				section.mobile .col-md-5 {margin-top: -50px;padding-bottom: 150px;}

        				h3 {text-align: center !important;font-size: 18px;}
						
						section.mobile .market {margin-top: 35px;}
        				section.mobile .market li {display: block;text-align: center;margin: auto;margin-bottom: 20px;}
						
						section.mobile .col-md-7 {padding: 0;}
        				section.mobile .col-md-7 .marvel-device {width: 100% !important;height: 100% !important;margin-top: 0 !important;margin-right: 0 !important;margin-left: 0 !important;}
        				section.mobile .iphone-x {display: none;}
        			}
        		</style>
        	{/literal}
        	<section class="mobile">
	        	<div class="container">
		        	<div class="col-md-7">
						<div class="col-md-6 marvel-device iphone-x">
						    <div class="notch">
						        <div class="camera"></div>
						        <div class="speaker"></div>
						    </div>
						    <div class="top-bar"></div>
						    <div class="sleep"></div>
						    <div class="bottom-bar"></div>
						    <div class="volume"></div>
						    <div class="overflow">
						        <div class="shadow shadow--tr"></div>
						        <div class="shadow shadow--tl"></div>
						        <div class="shadow shadow--br"></div>
						        <div class="shadow shadow--bl"></div>
						    </div>
						    <div class="inner-shadow"></div>
						    <div class="screen">
						        <img src="{siteUrl('public/images/pageMobile.png')}" width="100%" height="100%" alt="mobile page">
						    </div>
						</div>
						<div class="col-md-6 marvel-device iphone4s silver">
						    <div class="top-bar"></div>
						    <div class="sleep"></div>
						    <div class="volume"></div>
						    <div class="camera"></div>
						    <div class="sensor"></div>
						    <div class="speaker"></div>
						    <div class="screen">
						        <img src="{siteUrl('public/images/pageMobile.png')}" width="100%" alt="mobile page">
						    </div>
						    <div class="home"></div>
						    <div class="bottom-bar"></div>
						</div>
		        	</div>
		        	<div class="col-md-5">
		        		<h3 style="font-weight: 300;line-height: 34px;text-align: right;">Sizde hayallerinizdeki araca Galericilerden.com farkı ile uygun ödeme koşulları ile sahip olmak, ilan vermek istiyorsanız aramıza katılın...</h3>

		        		<div class="market">
		        			<ul>
		        				<li>
		        					<a href="#">
		        						<img src="{siteUrl('public/images/app_store.webp')}" width="200" alt="app store">
		        					</a>
		        				</li>
		        				<li>
		        					<a href="#">
		        						<img src="{siteUrl('public/images/google_play.webp')}" width="200" alt="google play">
		        					</a>
		        				</li>
		        			</ul>
		        		</div>
		        	</div>
	        	</div>
        	</section>
		{/if}
	</div>
</div>
