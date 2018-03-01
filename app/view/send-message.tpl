<div id="main">
	{include file="header.tpl"}
	<div class="page-content">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="{SITE_URL}">Anasayfa</a></li>
				<li class="active">Mesaj Gönder</li>
			</ul>

			<div class="send-message">
				<div class="ad-info">
					<div class="block">
						<div class="ad-left">
							<img src="{siteUrl('files/ads/thumb')}/{$return.adInfo.title_image}.jpg" alt="{$return.adInfo.title}">
						</div>
						<div class="ad-right">
							<a href="{siteUrl('view')}/{$return.adInfo.seflink}-{$return.adInfo.id}">{$return.adInfo.title}</a>
							<small>
								{if $return.adInfo.category1 != 0}
									{categoryInfo($return.adInfo.category1, 'kategori_adi')}
								{/if}

								{if $return.adInfo.category2 != 0}
									-> {categoryInfo($return.adInfo.category2, 'kategori_adi')}
								{/if}

								{if $return.adInfo.category3 != 0}
									-> {categoryInfo($return.adInfo.category3, 'kategori_adi')}
								{/if}

								{if $return.adInfo.category4 != 0}
									-> {categoryInfo($return.adInfo.category4, 'kategori_adi')}
								{/if}

								{if $return.adInfo.category5 != 0}
									-> {categoryInfo($return.adInfo.category5, 'kategori_adi')}
								{/if}

								{if $return.adInfo.category6 != 0}
									-> {categoryInfo($return.adInfo.category6, 'kategori_adi')}
								{/if}

								{if $return.adInfo.category7 != 0}
									-> {categoryInfo($return.adInfo.category7, 'kategori_adi')}
								{/if}

								{if $return.adInfo.category8 != 0}
									-> {categoryInfo($return.adInfo.category8, 'kategori_adi')}
								{/if}

								{if $return.adInfo.category9 != 0}
									-> {categoryInfo($return.adInfo.category9, 'kategori_adi')}
								{/if}

								{if $return.adInfo.category10 != 0}
									-> {categoryInfo($return.adInfo.category10, 'kategori_adi')}
								{/if}
							</small>
							<strong>
								{$return.adInfo.price|number_format:0:".":","}
								{if $return.adInfo.price_type == 0}
									<i class="icon icon-tl"></i>
								{elseif $return.adInfo.price_type == 1}
									<i class="icon icon-euro"></i>
								{elseif $return.adInfo.price_type == 2}
									<i class="icon icon-usd"></i>
								{/if}
							</strong>
						</div>
					</div>
				</div>
				<div class="block" style="overflow: hidden;padding: 15px;">
					<span>Kime: </span> <b>{userInfo($return.adInfo.user_id, 'name')|capitalize} {userInfo($return.adInfo.user_id, 'surname')|capitalize}</b>
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
				          	{literal}
				          		<script type="text/javascript">
				          			$(function() {
				          				$('textarea').keyup(function() {
				          					
				          					var length = $(this).val().length;

				          					if(length > 0)
				          					{
				          						$('.send-message button').removeAttr('disabled', true).attr('type', 'submit').attr('name', 'send_message');
				          					}
				          					else
				          					{
				          						$('.send-message button').attr('disabled', true).attr('type', 'button').removeAttr('name', true);
				          					}

				          				});
				          			});
				          		</script>
				          	{/literal}
			          	</div>
		          	</div>
				</div>
			</div>
		</div>
	</div>
</div>