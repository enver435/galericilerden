<body class="no-skin">
<div class="main-container ace-save-state" id="main-container">
	{literal}
		<script type="text/javascript">
			try{ace.settings.loadState('main-container')}catch(e){}
		</script>
	{/literal}

	{include file="admin/static/sidebar.tpl"}
	
	<div class="main-content">
		<div class="main-content-inner">
			<div class="breadcrumbs ace-save-state" id="breadcrumbs">
				<ul class="breadcrumb" style="margin-top: 10px;">
					<li>
						<i class="ace-icon fa fa-home home-icon"></i>
						<a href="{SITE_URL}/{SITE_ADMIN}">Ana Sayfa</a>
					</li>

					<!--<li>
						<a href="#">Other Pages</a>
					</li>
					<li class="active">Blank Page</li>-->
				</ul>
			</div>

			<div class="page-content">
				<div class="row">
					<div class="col-xs-12">
						{if isset($smarty.post.add)}
							{if $return.messageType == 'success'}
								<div class="alert alert-success">
									<strong>Başarılı!</strong> {$return.message}
								</div>
							{elseif $return.messageType == 'error'}
								<div class="alert alert-danger">
									<strong>Hata!</strong> {$return.message}
								</div>
							{/if}
						{/if}
						<form action="" method="POST">
							{if getUrl(2) == 'main-category'}
								<div class="form-group">
									<label>Kategori Adı: </label>
									<input type="text" name="category_name" value="{$return.categoryInfo.kategori_adi}" class="form-control">
								</div>
								<div class="form-group">
									<label>Modül: </label>
									<select name="category_modul" class="form-control">
										<option value="0">Modülsüz</option>
										{foreach $return.modulList as $modul}
											<option value="{$modul.Id}" {if $return.categoryInfo.modul == $modul.Id}selected="selected"{/if}>{$modul.name}</option>
										{/foreach}
									</select>
								</div>
								<button type="submit" name="add" class="btn btn-primary pull-right">Ekle</button>
							{elseif getUrl(2) == 'sub-category'}
								{if !isset($smarty.post.getStep)}
									<div class="categories">
										<input type="hidden" name="category" value="">
										<div class="category category_1 col-md-2 col-xs-12">
						            		<div class="list-group scrollable-menu">
							            		{foreach $return.mainCategory as $category}
													<a href="javascript:void(0)" class="list-group-item" category-id="{$category.Id}" category-level="1"><span>{$category.kategori_adi}</span> <i class="fa fa-arrow-right"></i></a>
							            		{/foreach}
						            		</div>
						            	</div>
						            	<div class="category category_2"></div>
						            	<div class="category category_3"></div>
						            	<div class="category category_4"></div>
						            	<div class="category category_5"></div>
						            	<div class="category category_6"></div>
						            	<div class="category category_7"></div>
						            	<div class="category category_8"></div>
						            	<div class="category category_9"></div>
						            	<div class="category category_10"></div>
						            	<div class="category">
						            		<div class="category-bottom-success" style="display: none;">
            									<div class="category-success" style="padding: 35px;">
            										<i class="fa fa-check"></i>
            										<button type="submit" name="getStep" class="btn btn-primary">Devam Et</button>
            									</div>
        									</div>
						            	</div>
						            	{literal}
							            	<script type="text/javascript">
							            		$(function() {

							            			var categoryStep = 0;

							            			$(document).on('click', '.list-group .list-group-item', function() {
							            				
							            				$(this).parent().find('.list-group-item').removeClass('active');
							            				$(this).addClass('active');

							            				var categoryId   = $(this).attr('category-id');
							            				categoryStep = $(this).parent().parent().attr('class').split(' ')[1].split('category_')[1];
							            				$('.categories input[name=category]').val(categoryId);
							            				$('.mobile-categories .alert.alert-info strong').text($('span', this).text());

							            				categoryStep = parseInt(categoryStep) + 1;

							            				for(var i = categoryStep; i < 10; i++)
							            				{
							            					$('.categories .category_' + i).html('');
							            					$('.categories .category_' + i).removeClass('col-md-2').removeClass('col-xs-12');
							            				}

							            				$('.category-bottom-success').show();

							            				if(categoryId != '')
							            				{
							            					$.ajax({
							            						type: 'POST',
							            						url: siteUrl + '/request',
							            						dataType: 'json',
							            						data: {'mode': 'getCategory', 'categoryId': categoryId},
							            						success: function(response)
							            						{
							            							var list = '';

							            							if(response != null)
							            							{
							            								list += '<div class="list-group scrollable-menu">';
								            								$.each(response.categorys, function(i, value) {
								            									list += '\
								            										<a href="javascript:void(0)" class="list-group-item" category-id="' + value.Id + '" category-level="' + categoryStep + '"><span>' + value.kategori_adi + '</span> <i class="fa fa-arrow-right"></i></a>\
								            									';
								            								});
							            								list += '</div>';

							            								$('.categories .category_' + categoryStep).html(list);
							            							}
							            							else
							            							{
							            								$('.category-bottom-success').remove();
							            								$('.categories .category_' + categoryStep).html('\
							            									<div class="category-bottom-success">\
								            									<div class="category-success">\
								            										<i class="fa fa-check"></i>\
								            										<button type="submit" name="getStep" class="btn btn-primary">Devam Et</button>\
								            									</div>\
							            									</div>\
						            									');
							            							}

							            							$('.categories .category_' + categoryStep).addClass('col-md-2').addClass('col-xs-12');

							            							var leftPos = $('.categories').scrollLeft();
							            							var blockWidth = $('.categories .category').width() + 33;
						            								$(".categories").animate({scrollLeft: leftPos + blockWidth}, 500);
							            						}
							            					});
							            				}

							            			});
						            			});
							            	</script>
							            	<style type="text/css">
							            		.categories {overflow-x: scroll;white-space: nowrap;}
												.categories .category {float: none;display: inline-block;vertical-align: top;}
												.categories .category .list-group.scrollable-menu {height: auto;max-height: 345px;overflow-x: hidden;}
												.categories .category .list-group .list-group-item.active {background-color: #438EB9;border-color: #438EB9;}
												.categories .category .list-group-item i {display: none;float: right;}
												.categories .category .category-success {background-color: #fff;border: 1px solid #ddd;text-align: center;font-size: 15px;font-weight: 500;color: #438EB9;padding-top: 25px;padding-bottom: 35px;}
												.categories .category .category-success i {font-size: 80px;display: block;margin-bottom: 25px;}
							            	</style>
					            		{/literal}
				            		</div>
			            		{else}
			            			<div class="alert alert-info">Eklenecek üst kategori: {categoryInfo($smarty.post.category, 'kategori_adi')}</div>
			            			<div class="form-group">
										<label>Kategori Adı: </label>
										<input type="text" name="category_name" value="{$return.categoryInfo.kategori_adi}" class="form-control">
									</div>
									<div class="form-group">
										<label>Modül: </label>
										<select name="category_modul" class="form-control">
											<option value="0">Modülsüz</option>
											{foreach $return.modulList as $modul}
												<option value="{$modul.Id}" {if $return.categoryInfo.modul == $modul.Id}selected="selected"{/if}>{$modul.name}</option>
											{/foreach}
										</select>
									</div>
									<input type="hidden" name="getStep">
									<input type="hidden" name="category" value="{$smarty.post.category}">
									<button type="submit" name="add" class="btn btn-primary pull-right">Ekle</button>
			            		{/if}
							{/if}
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="footer">
		<div class="footer-inner">
			<div class="footer-content">
				<span class="bigger-120">
					<span class="blue bolder">Galericilerden</span>
					&copy; 2016-2017
				</span>
			</div>
		</div>
	</div>

	<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
		<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
	</a>
</div>