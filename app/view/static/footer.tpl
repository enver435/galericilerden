{if $header.siteConfig.iyzicoPayment === true}
	<script type="text/javascript" src="{if $header.siteConfig.minify === false}{siteUrl('public/scripts/functions.js')}{else}{siteUrl('public/scripts/minify/functions.min.js')}{/if}"></script>
{else}
	<script type="text/javascript" src="{if $header.siteConfig.minify === false}{siteUrl('public/scripts/functionsV2.js')}{else}{siteUrl('public/scripts/minify/functionsV2.min.js')}{/if}"></script>
{/if}
<script type="text/javascript" src="{if $header.siteConfig.minify === false}{siteUrl('public/scripts/main.js')}{else}{siteUrl('public/scripts/minify/main.min.js')}{/if}"></script>


<div id="footer" {if getUrl(0) == 'category' || getUrl(0) == 'category-special' || getUrl(0) == 'view' || getUrl(0) == 'user' || $return.realDomain != ''}class="hidden-sm hidden-xs"{/if} {if getUrl(0) == 'page' AND getUrl(1) == 'doping' || getUrl(0) == 'page' AND getUrl(1) == 'mobile'}style="margin-top: -50px;"{/if}>
	<div class="sprite sprite-1">
		<img src="{siteUrl('public/images/footer/sprite_01.webp')}" alt="sprite 1">
	</div>
	<div class="sprite sprite-2">
		<img src="{siteUrl('public/images/footer/sprite_02.webp')}" alt="sprite 2">
	</div>
	<div class="sprite sprite-3">
		<img src="{siteUrl('public/images/footer/sprite_03.webp')}" alt="sprite 3">
	</div>
	<div class="sprite sprite-4">
		<img src="{siteUrl('public/images/footer/sprite_04.webp')}" alt="sprite 4">
	</div>
	<div class="footer-main">
		<div class="container">
            <div class="row">
            	<div class="col-md-offset-0 col-sm-offset-1">
	            	<div class="col-md-2 col-md-offset-1 col-xs-6">
		                <h5>Kurumsal</h5>
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
		            <div class="col-md-2 col-xs-6 hmobile">
		                <h5>Hizmetlerimiz</h5>
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
		                </ul>
		            </div>
		            <div class="col-md-2 col-xs-6 hidden-xs">
		               	<h5>Gizlilik ve Kullanım</h5>
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
		            <div class="col-md-2 col-xs-6">
		               	<h5>İletişim</h5>
		                <ul>
		                	<li>
		                		<i class="material-icons">phone</i> 0532 295 25 51
		                	</li>
		                	<li>
		                		<svg viewBox="0 0 24 24">
		    						<path id="whatsapp" fill="#888" d="M16.75,13.96C17,14.09 17.16,14.16 17.21,14.26C17.27,14.37 17.25,14.87 17,15.44C16.8,16 15.76,16.54 15.3,16.56C14.84,16.58 14.83,16.92 12.34,15.83C9.85,14.74 8.35,12.08 8.23,11.91C8.11,11.74 7.27,10.53 7.31,9.3C7.36,8.08 8,7.5 8.26,7.26C8.5,7 8.77,6.97 8.94,7H9.41C9.56,7 9.77,6.94 9.96,7.45L10.65,9.32C10.71,9.45 10.75,9.6 10.66,9.76L10.39,10.17L10,10.59C9.88,10.71 9.74,10.84 9.88,11.09C10,11.35 10.5,12.18 11.2,12.87C12.11,13.75 12.91,14.04 13.15,14.17C13.39,14.31 13.54,14.29 13.69,14.13L14.5,13.19C14.69,12.94 14.85,13 15.08,13.08L16.75,13.96M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22C10.03,22 8.2,21.43 6.65,20.45L2,22L3.55,17.35C2.57,15.8 2,13.97 2,12A10,10 0 0,1 12,2M12,4A8,8 0 0,0 4,12C4,13.72 4.54,15.31 5.46,16.61L4.5,19.5L7.39,18.54C8.69,19.46 10.28,20 12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4Z" />
								</svg> 
								0545 267 24 10
		                	</li>
		                	<li class="hidden-lg hidden-md" style="width: 250px;"><i class="material-icons">mail</i> destek@galericilerden.com</li>
		                </ul>
		                <h5 class="hidden-sm hidden-xs">Destek Merkezi</h5>
		                <ul class="hidden-sm hidden-xs">
		                	<li>destek@galericilerden.com</li>
		                </ul>
		            </div>
		            <div class="col-md-2 col-xs-6">
		                <h5>Bizi Takip Edin</h5>
		                <ul>
		                	<li>
		                		<a href="https://facebook.com/galericilerden" target="_blank">
		                			<svg viewBox="0 0 24 24">
		  								<path id="facebook" fill="#888" d="M17,2V2H17V6H15C14.31,6 14,6.81 14,7.5V10H14L17,10V14H14V22H10V14H7V10H10V6A4,4 0 0,1 14,2H17Z" />
		  							</svg>
		  							Facebook
		                		</a>
		                	</li>
		                	<li>
		                		<a href="https://twitter.com/galericilerden" target="_blank">
		                			<svg viewBox="0 0 24 24">
		    							<path id="twitter" fill="#888" d="M22.46,6C21.69,6.35 20.86,6.58 20,6.69C20.88,6.16 21.56,5.32 21.88,4.31C21.05,4.81 20.13,5.16 19.16,5.36C18.37,4.5 17.26,4 16,4C13.65,4 11.73,5.92 11.73,8.29C11.73,8.63 11.77,8.96 11.84,9.27C8.28,9.09 5.11,7.38 3,4.79C2.63,5.42 2.42,6.16 2.42,6.94C2.42,8.43 3.17,9.75 4.33,10.5C3.62,10.5 2.96,10.3 2.38,10C2.38,10 2.38,10 2.38,10.03C2.38,12.11 3.86,13.85 5.82,14.24C5.46,14.34 5.08,14.39 4.69,14.39C4.42,14.39 4.15,14.36 3.89,14.31C4.43,16 6,17.26 7.89,17.29C6.43,18.45 4.58,19.13 2.56,19.13C2.22,19.13 1.88,19.11 1.54,19.07C3.44,20.29 5.7,21 8.12,21C16,21 20.33,14.46 20.33,8.79C20.33,8.6 20.33,8.42 20.32,8.23C21.16,7.63 21.88,6.87 22.46,6Z" />
									</svg> 
									Twitter
		                		</a>
		                	</li>
		                	<li>
		                		<a href="https://instagram.com/galericilerden" target="_blank">
		                			<svg viewBox="0 0 24 24">
		    							<path id="instagram" fill="#888" d="M7.8,2H16.2C19.4,2 22,4.6 22,7.8V16.2A5.8,5.8 0 0,1 16.2,22H7.8C4.6,22 2,19.4 2,16.2V7.8A5.8,5.8 0 0,1 7.8,2M7.6,4A3.6,3.6 0 0,0 4,7.6V16.4C4,18.39 5.61,20 7.6,20H16.4A3.6,3.6 0 0,0 20,16.4V7.6C20,5.61 18.39,4 16.4,4H7.6M17.25,5.5A1.25,1.25 0 0,1 18.5,6.75A1.25,1.25 0 0,1 17.25,8A1.25,1.25 0 0,1 16,6.75A1.25,1.25 0 0,1 17.25,5.5M12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9Z" />
									</svg>
		  							Instagram
		                		</a>
		                	</li>
		                </ul>
		            </div>
	            </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
    	<div class="container">
    		<div class="footer-bottom-top">
    			<div class="logo pull-left"></div>
    			<ul class="market pull-right">
    				<li>
    					<a href="#">
    						<img src="{siteUrl('public/images/app_store.webp')}" width="100" alt="app store">
    					</a>
    				</li>
    				<li>
    					<a href="https://play.google.com/store/apps/details?id=com.galericilerden" target="_blank">
    						<img src="{siteUrl('public/images/google_play.webp')}" width="100" alt="google play">
    					</a>
    				</li>
    			</ul>
    		</div>
    		<div class="text-center">
	    		<p>Galericilerden.com - 2 El Oto Alım Satımın Adresi Yer Alan Kullanıcıların Oluşturduğu Tüm İçerik, Görüş Ve Bilgilerin Doğruluğu, Eksiksiz Ve Değişmez Olduğu, Yayınlanması İle İlgili Yasal Yükümlülükler İçeriği Oluşturan Kullanıcıya Aittir.Bu İçeriğin, Görüş Ve Bilgilerin Yanlışlık, Eksiklik Veya Yasalarla Düzenlenmiş Kurallara Aykırılığından Hiçbir Şekilde Sitemiz Sorumlu Değildir. </p>
	    		<p>2016 - 2017 @ Tüm Hakları Saklıdır</p>
	    	</div>
    	</div>
    </div>
</div>