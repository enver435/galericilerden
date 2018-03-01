<div id="main">
	{include file="header.tpl"}
	<div class="page-content">
		<div class="container">
			<div class="profile-header-menu block hidden-sm hidden-xs">
				<ul>
					<li class="active">
						<a href="{siteUrl('my')}">
							<i class="material-icons">home</i> Özet
						</a>
					</li>
					<li>
						<a href="{siteUrl('my-ads/active')}">
							<i class="material-icons">view_stream</i> İlanlarım
						</a>
					</li>
					<li>
						<a href="{siteUrl('my-favorites/ads')}">
							<i class="material-icons">star</i> Favorilerim
						</a>
					</li>
					<li>
						<a href="{siteUrl('my-messages')}">
							<i class="material-icons">message</i> Mesajlarım
						</a>
					</li>
					<li>
						<a href="{siteUrl('my-notifications')}">
							<i class="material-icons">notifications</i> Bildirimlerim
						</a>
					</li>
					<li>
						<a href="{siteUrl('my-info')}">
							<i class="material-icons">person</i> Üyeliğim
						</a>
					</li>
					{if userInfo($smarty.session.userId, 'user_status') == 2}
						<li>
							<a href="{siteUrl('my-store')}">
								<i class="material-icons">store</i> Mağazam
							</a>
						</li>
					{/if}
				</ul>
			</div>

			<h4 class="hidden-lg hidden-md" style="margin-bottom: 25px;">Özet</h4>
			<div class="my">
				<div class="row">
					<div class="col-md-3">
						<div class="block" style="padding-bottom: 28px;">
							<a href="{siteUrl('my-ads/active')}" style="text-decoration: none;">
								<p>
									<i class="material-icons">view_stream</i>
									<span>Yayında olan<br>ilan adedi</span>
								</p>
								<strong class="block-count">{$return.userAdsCount}</strong>
							</a>
						</div>
					</div>
					<div class="col-md-3">
						<div class="block">
							<p>
								<i class="material-icons">search</i>
								<span>İlanlarınızın aylık<br>gösterim adedi</span>
							</p>
							<strong class="block-count">{$return.countViewMonthly}</strong>
							<span class="day30">(son 30 gün)</span>
						</div>
					</div>
					<div class="col-md-3">
						<div class="block">
							<p>
								<i class="material-icons">star</i>
								<span>İlanlarınızın favorilere<br>eklenme adedi</span>
							</p>
							<strong class="block-count">{$return.countFavoriteMonthly}</strong>
							<span class="day30">(son 30 gün)</span>
						</div>
					</div>
					<div class="col-md-3">
						<div class="block">
							<p>
								<i class="material-icons">messages</i>
								<span>İlanlarınıza gelen<br>mesaj adedi</span>
							</p>
							<strong class="block-count">{$return.countMessageMonthly}</strong>
							<span class="day30">(son 30 gün)</span>
						</div>
					</div>
				</div>
				{if userInfo($smarty.session.userId, 'corporateMessage') == 1 AND userInfo($smarty.session.userId, 'corporateRequest') == 0 AND userInfo($smarty.session.userId, 'user_status') == 1}
					<link rel="stylesheet" href="{siteUrl('public/styles/sweetalert.css')}" />
					<script type="text/javascript" src="{siteUrl('public/scripts/sweetalert.min.js')}"></script>
					<div class="corporate-message alert alert-info alert-dismissable">
						<a href="javascript:void(0);" class="close" aria-label="close">&times;</a>
						<strong>OTO GALERİ, YETKİLİ BAYİ VE ÜRETİM YAPAN FİRMA İSENİZ KURUMSAL ÜYE OL</strong> <button class="btn btn-primary">Kurumsal üye olmak istiyorum</button>
					</div>
				{/if}
				<div class="block" style="padding: 0;">
					<div class="block-title">
						<h5>Görüntüleme Raporu (Son 30 gün)</h5>
					</div>
					<div class="block-content">
						{if !empty($return.dataCountAd) AND !empty($return.dataCountAdView)}
							<div id="chart-container"></div>
						{else}
							<p class="text-center" style="color: #ff263a;font-weight: 500;margin-top: 15px;">Bir sonuç bulunamadı</p>
						{/if}
					</div>
				</div>
				{if !empty($return.dataCountAd) AND !empty($return.dataCountAdView)}
					<script type="text/javascript" src="{siteUrl('public/scripts/highcharts.js')}"></script>
					{literal}
						<script type="text/javascript">
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
							        data: [{/literal}{","|join:$return.dataCountAd}{literal}],
							        color: '#FAC069',
							    }, {
							        name: 'İlan Görüntüleme Adedi',
							        data: [{/literal}{","|join:$return.dataCountAdView}{literal}],
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
						</script>
					{/literal}
				{/if}
			</div>
		</div>
	</div>
</div>