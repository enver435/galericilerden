<div id="main" class="newsPage">
	{include file="header.tpl"}
	<div class="page-content">
		<div class="container">
			{if !getUrl(1)}
				<ul class="breadcrumb">
				    <li><a href="{SITE_URL}">Anasayfa</a></li>
				    <li class="active">Haberler</li>
				</ul>
			{else}
				<ul class="breadcrumb">
				    <li><a href="{SITE_URL}">Anasayfa</a></li>
				    <li><a href="{SITE_URL}/news">Haberler</a></li>
				    <li class="active">{$return.newsInfo.news_title}</li>
				</ul>
			{/if}

			{if !getUrl(1)}
				<div class="block">
					<div class="block-title">
						<h5>Haberler</h5>
					</div>
					<div class="block-content">
						{if $return.news.news}
							{foreach $return.news.news as $news}
								<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 news">
			                        <a class="pull-left news-link" href="{SITE_URL}/news/{$news.news_seflink}">
			                            <img class="news-object" width="100%" src="{siteUrl('files/news/thumb')}/{$news.news_image}.jpg" alt="{$news.news_title}">
			                            <i class="material-icons">search</i>
			                        </a>
			                        <div class="news-body">
			                            <h4 class="news-heading">
			                            	<a href="{SITE_URL}/news/{$news.news_seflink}">{$news.news_title}</a>
			                            </h4>
			                        </div>
			                    </div>
		                    {/foreach}
	                    {else}
	                    	<p class="text-center" style="color: #ff263a;font-weight: 500;">Bir sonuç bulunamadı</p>
	                    {/if}
					</div>
				</div>
				<ul class="pagination pull-right" style="margin-top: 0;">{$return.news.pagination}</ul>
			{else}
				{literal}
					<style type="text/css">
						.block-content img {width: 100%;}
						.block-content {word-break: break-all;}

						@media only screen and (max-width: 991px)
						{
							.block-content .col-md-8 {padding-top: 25px;}
						}
					</style>
				{/literal}
				<div class="block">
					<div class="block-title">
						<h5>{$return.newsInfo.news_title}</h5>
					</div>
					<div class="block-content">
						<div class="col-md-4">
							<img src="{siteUrl('files/news/big')}/{$return.newsInfo.news_image}.jpg" width="100%" alt="{$return.newsInfo.news_title}">
						</div>
						<div class="col-md-8">{$return.newsInfo.news_content}</div>
					</div>
				</div>
			{/if}
		</div>
	</div>
</div>