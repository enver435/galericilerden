<?php /* Smarty version 3.1.27, created on 2017-12-11 14:27:56
         compiled from "C:\xampp\htdocs\galericilerden\app\view\static\sidebar.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:165735a2e87dcd8ba56_48286234%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '61e612d07c4ce01f92f35eb6a867f87dde53608b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\galericilerden\\app\\view\\static\\sidebar.tpl',
      1 => 1509031659,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '165735a2e87dcd8ba56_48286234',
  'variables' => 
  array (
    'Ads' => 0,
    'cities' => 0,
    'city' => 0,
    'Category' => 0,
    'category' => 0,
    'categoryModulItems' => 0,
    'actualLinkOrderBy' => 0,
    'i' => 0,
    'News' => 0,
    'newsAll' => 0,
    'news' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5a2e87dce1d007_97494680',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5a2e87dce1d007_97494680')) {
function content_5a2e87dce1d007_97494680 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '165735a2e87dcd8ba56_48286234';
?>
<div class="sidebar">
	<div class="col-lg-3 col-md-3 hidden-sm hidden-xs" <?php if (getUrl(0) == 'category' || getUrl(0) == 'category-special' || getUrl(0) == 'user' || getUrl(0) == 'search') {?>style="width: 20%;"<?php }?>>
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<?php if (getUrl(0) != 'category') {?>
					<div class="block sidebar-top">
						<div class="block-title">
							<h5>Özel İlanlar</h5>
						</div>
						<div class="block-content">
							<ul>
								<li>
									<a href="<?php echo siteUrl('category-special/ilk-sahibinden');?>
">
										<i class="material-icons icon-sidebar">directions_car</i> İlk Sahibinden (<?php echo $_smarty_tpl->tpl_vars['Ads']->value->specialCategoryAdsCount('doping_sahibinden');?>
) <i class="material-icons arrow-right">keyboard_arrow_right</i>
									</a>
								</li>
								<li>
									<a href="<?php echo siteUrl('category-special/yeni-gibi');?>
">
										<i class="material-icons icon-sidebar">fiber_new</i> Yeni Gibi (<?php echo $_smarty_tpl->tpl_vars['Ads']->value->specialCategoryAdsCount('doping_yenigibi');?>
) <i class="material-icons arrow-right">keyboard_arrow_right</i>
									</a>
								</li>
								<li>
									<a href="<?php echo siteUrl('category-special/ekspertizli');?>
">
										<i class="material-icons icon-sidebar">check_circle</i> Ekspertizli (<?php echo $_smarty_tpl->tpl_vars['Ads']->value->specialCategoryAdsCount('doping_ekspertizli');?>
) <i class="material-icons arrow-right">keyboard_arrow_right</i>
									</a>
								</li>
								<li>
									<a href="<?php echo siteUrl('category-special/acil');?>
">
										<i class="material-icons icon-sidebar">notifications</i> Acil (<?php echo $_smarty_tpl->tpl_vars['Ads']->value->specialCategoryAdsCount('doping_acil');?>
) <i class="material-icons arrow-right">keyboard_arrow_right</i>
									</a>
								</li>
								<li>
									<a href="<?php echo siteUrl('category-special/fiyati-dusenler');?>
">
										<i class="material-icons icon-sidebar">arrow_downward</i> Fiyatı düşenler (<?php echo $_smarty_tpl->tpl_vars['Ads']->value->specialCategoryAdsCount('doping_fiyatidusenler');?>
) <i class="material-icons arrow-right">keyboard_arrow_right</i>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<?php if (getUrl(0) == 'category-special' || getUrl(0) == 'user' || getUrl(0) == 'search') {?>
						<div class="block sidebar-search">
							<div class="block-title">
								<h5>Arama Daraltma</h5>
							</div>
							<div class="block-content">
								<div class="form-search col-md-12" style="margin-top: 15px;">
									<div class="form-group">
										<label>İl: </label>
										<select name="city" class="form-control">
											<option value="0" selected="selected">Tümü</option>
											<?php
$_from = $_smarty_tpl->tpl_vars['cities']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['city'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['city']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['city']->value) {
$_smarty_tpl->tpl_vars['city']->_loop = true;
$foreach_city_Sav = $_smarty_tpl->tpl_vars['city'];
?>
												<option value="<?php echo $_smarty_tpl->tpl_vars['city']->value['CityID'];?>
" <?php if ($_GET['city'] == $_smarty_tpl->tpl_vars['city']->value['CityID']) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['city']->value['CityName'];?>
</option>
											<?php
$_smarty_tpl->tpl_vars['city'] = $foreach_city_Sav;
}
?>
										</select>
									</div>
									<div class="form-group">
										<label>İlçe: </label>
										<select name="county" class="form-control">
											<option value="0" selected="selected">Tümü</option>
										</select>
									</div>
									<div class="form-group">
										<label>Fiyat: </label>
										<div class="row input-inline" style="margin-top: 0;">
											<div class="col-md-6 col-xs-12" style="padding-left: 0;">
												<input type="number" name="priceMin" value="<?php echo $_GET['priceMin'];?>
" placeholder="min" class="form-control">
											</div>
											<div class="col-md-6 col-xs-12" style="padding-right: 0;">
												<input type="number" name="priceMax" value="<?php echo $_GET['priceMax'];?>
" placeholder="max" class="form-control">
											</div>
										</div>
									</div>
									<button type="button" name="searchAds" class="btn btn-primary" style="width: 100%;margin-top: -15px;margin-bottom: 15px;margin-top: 0;">Aramayı Daralt</button>
								</div>
							</div>
						</div>
					<?php }?>
				<?php } else { ?>
					<div class="block">
						<div class="block-title">
							<h5>Kategoriler</h5>
						</div>
						<div class="block-content" style="height: 300px;overflow-y: auto;">
							<ul>
								<ul class="topCategoryAll"><?php echo $_smarty_tpl->tpl_vars['Category']->value->getAllTopCategory($_GET['catId'],false,true);?>
</ul>
								<ul class="subCategoryAll">
									<?php
$_from = $_smarty_tpl->tpl_vars['Category']->value->getSubCategory($_GET['catId']);
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['category'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['category']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
$foreach_category_Sav = $_smarty_tpl->tpl_vars['category'];
?>
										<?php if (!empty($_smarty_tpl->tpl_vars['category']->value)) {?>
											<li>
												<a href="<?php echo SITE_URL;?>
/cat-<?php echo $_smarty_tpl->tpl_vars['category']->value['Id'];?>
/<?php echo $_smarty_tpl->tpl_vars['category']->value['seflink'];?>
">
													<?php echo $_smarty_tpl->tpl_vars['category']->value['kategori_adi'];?>
 (<?php echo $_smarty_tpl->tpl_vars['Ads']->value->categoryAdsCount($_smarty_tpl->tpl_vars['category']->value['Id']);?>
)
												</a>
											</li>
										<?php }?>
									<?php
$_smarty_tpl->tpl_vars['category'] = $foreach_category_Sav;
}
?>
								</ul>
							</ul>
						</div>
					</div>
					<div class="block sidebar-search">
						<div class="block-title">
							<h5>Arama Daraltma</h5>
						</div>
						<div class="block-content">
							<div class="form-search col-md-12" style="margin-top: 15px;">
								<div class="form-group">
									<label>İl: </label>
									<select name="city" class="form-control">
										<option value="0" selected="selected">Tümü</option>
										<?php
$_from = $_smarty_tpl->tpl_vars['cities']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['city'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['city']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['city']->value) {
$_smarty_tpl->tpl_vars['city']->_loop = true;
$foreach_city_Sav = $_smarty_tpl->tpl_vars['city'];
?>
											<option value="<?php echo $_smarty_tpl->tpl_vars['city']->value['CityID'];?>
" <?php if ($_GET['city'] == $_smarty_tpl->tpl_vars['city']->value['CityID']) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['city']->value['CityName'];?>
</option>
										<?php
$_smarty_tpl->tpl_vars['city'] = $foreach_city_Sav;
}
?>
									</select>
								</div>
								<div class="form-group">
									<label>İlçe: </label>
									<select name="county" class="form-control">
										<option value="0" selected="selected">Tümü</option>
									</select>
								</div>
								<div class="form-group">
									<label>Fiyat: </label>
									<div class="row input-inline" style="margin-top: 0;">
										<div class="col-md-6 col-xs-12" style="padding-left: 0;">
											<input type="number" name="priceMin" value="<?php echo $_GET['priceMin'];?>
" placeholder="min" class="form-control">
										</div>
										<div class="col-md-6 col-xs-12" style="padding-right: 0;">
											<input type="number" name="priceMax" value="<?php echo $_GET['priceMax'];?>
" placeholder="max" class="form-control">
										</div>
									</div>
								</div>
								<?php echo $_smarty_tpl->tpl_vars['categoryModulItems']->value['template'];?>

								<button type="button" name="searchAds" class="btn btn-primary" style="width: 100%;margin-top: -15px;margin-bottom: 15px;margin-top: 0;">Aramayı Daralt</button>
							</div>
						</div>
					</div>
				<?php }?>
				
					<?php echo '<script'; ?>
 type="text/javascript">
						$(function() {
							$('select[name=city]').change(function() {

								var cityId  = $(this).val();

								$.ajax({
									type: 'POST',
									url: siteUrl + '/request',
									dataType: 'json',
									data: {'mode': 'getCounties', 'cityId': cityId},
									success: function(response)
									{

										var options = '<option value="0" selected="selected">Tümü</option>';

										$.each(response, function(i, value) {
											options += '\
												<option value="' + value.CountyID + '">' + value.CountyName + '</option>\
											';
										});

										$('select[name=county]').html(options).removeAttr('disabled', true);
										
									}
								});
							});

							var cityId   = <?php if ($_GET['city']) {
echo $_GET['city'];
} else { ?>0<?php }?>;
							var countyId = <?php if ($_GET['county']) {
echo $_GET['county'];
} else { ?>0<?php }?>;

							if(cityId > 0)
							{
								$.ajax({
									type: 'POST',
									url: siteUrl + '/request',
									dataType: 'json',
									data: {'mode': 'getCounties', 'cityId': cityId},
									success: function(response)
									{

										var options = '<option value="0" selected="selected">Tümü</option>';

										$.each(response, function(i, value) {
											if(countyId == value.CountyID)
											{
												options += '\
													<option value="' + value.CountyID + '" selected="selected">' + value.CountyName + '</option>\
												';
											}
											else
											{
												options += '\
													<option value="' + value.CountyID + '">' + value.CountyName + '</option>\
												';
											}
										});

										$('select[name=county]').html(options).removeAttr('disabled', true);
										
									}
								});
							}

							var fields = '';

							$('.form-search button').click(function() {
								
								$('.form-search input, .form-search select').each(function() {
									var name = $(this).attr('name');
									var type = $(this).attr('type');
									var val  = $(this).val();

									if(type == 'number')
									{
										if(val != '')
										{
											fields += name + '=' + val + '&';
										}
									}
									else
									{
										if(val != '' && val > 0)
										{
											fields += name + '=' + val + '&';
										}
									}
									
								});

								fields = fields.slice(0, -1);

								if($.urlParam('type') !== null)
								{
									if(fields != '')
									{
										fields += '&type=' + $.urlParam('type');
									}
									else
									{
										fields += 'type=' + $.urlParam('type');
									}
								}

								if(fields != '')
								{
									var locationUrl = '<?php if ($_GET['catType']) {
echo $_GET['catType'];
} elseif ($_GET['catSeflink']) {
echo $_GET['catSeflink'];
} elseif ($_GET['userId'] && $_GET['userSeflink']) {
echo $_GET['userSeflink'];
} elseif ($_GET['query']) {?>search?query=<?php echo $_GET['query'];
}?>&' + fields;
								}
								else
								{
									var locationUrl = '<?php if ($_GET['catType']) {
echo $_GET['catType'];
} elseif ($_GET['catSeflink']) {
echo $_GET['catSeflink'];
} elseif ($_GET['userId'] && $_GET['userSeflink']) {
echo $_GET['userSeflink'];
} elseif ($_GET['query']) {?>search?query=<?php echo $_GET['query'];
}?>';
								}
								window.location.href = locationUrl;

							});

							$('.mobile-filters .list-bottom .result').click(function() {

								$('.mobile-filters input, .mobile-filters select').each(function() {
									var name = $(this).attr('name');
									var type = $(this).attr('type');
									var val  = $(this).val();

									if(type == 'number')
									{
										if(val != '')
										{
											fields += name + '=' + val + '&';
										}
									}
									else if(name == 'type' && val != 'all')
									{
										fields += name + '=' + val + '&';
									}
									else
									{
										if(val != '' && val > 0 && name != 'type')
										{
											fields += name + '=' + val + '&';
										}
									}
									
								});

								fields = fields.slice(0, -1);

								if(fields != '')
								{
									var locationUrl = '<?php if ($_GET['catType']) {
echo $_GET['catType'];
} elseif ($_GET['catSeflink']) {
echo $_GET['catSeflink'];
} elseif ($_GET['userId'] && $_GET['userSeflink']) {
echo $_GET['userSeflink'];
} elseif ($_GET['query']) {?>search?query=<?php echo $_GET['query'];
}?>&' + fields;
								}
								else
								{
									var locationUrl = '<?php if ($_GET['catType']) {
echo $_GET['catType'];
} elseif ($_GET['catSeflink']) {
echo $_GET['catSeflink'];
} elseif ($_GET['userId'] && $_GET['userSeflink']) {
echo $_GET['userSeflink'];
} elseif ($_GET['query']) {?>search?query=<?php echo $_GET['query'];
}?>';
								}
								window.location.href = locationUrl;

							});

							$('select[name=orderby]').change(function() {

								var val        = $(this).val();
								var actualLink = '<?php echo $_smarty_tpl->tpl_vars['actualLinkOrderBy']->value;?>
';

								if(val != 0)
								{
									actualLink += '&orderby=' + val;
								}

								window.location.href = actualLink;
							});

							$('.mobile-sort li').click(function() {
								var sort = $(this).attr('data-sort');

								var actualLink = '<?php echo $_smarty_tpl->tpl_vars['actualLinkOrderBy']->value;?>
';

								if(sort != 0)
								{
									actualLink += '&orderby=' + sort;
								}

								window.location.href = actualLink;
							});

							$.urlParam = function(name)
							{
							    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
							    
							    if (results == null)
							    {
							       return null;
							    }
							    else
							    {
							       return decodeURI(results[1]) || 0;
							    }

							}

						});
					<?php echo '</script'; ?>
>
				
			</div>
			<?php if (getUrl(0) != 'category' && getUrl(0) != 'search') {?>
				<div class="col-lg-12 col-md-12">
					<div class="block sidebar-bottom">
						<div class="block-title">
							<h5>Kategoriler</h5>
						</div>
						<div class="block-content">
							<ul>
								<?php if (isset($_smarty_tpl->tpl_vars['i'])) {$_smarty_tpl->tpl_vars['i'] = clone $_smarty_tpl->tpl_vars['i'];
$_smarty_tpl->tpl_vars['i']->value = 1; $_smarty_tpl->tpl_vars['i']->nocache = null; $_smarty_tpl->tpl_vars['i']->scope = 0;
} else $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(1, null, 0);?>

								<?php
$_from = $_smarty_tpl->tpl_vars['Category']->value->categoryFirst();
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['category'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['category']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
$foreach_category_Sav = $_smarty_tpl->tpl_vars['category'];
?>
									<li>
										<a href="<?php echo SITE_URL;?>
/cat-<?php echo $_smarty_tpl->tpl_vars['category']->value['Id'];?>
/<?php echo $_smarty_tpl->tpl_vars['category']->value['seflink'];?>
">
											<i class="icon icon-category<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"></i>
											<?php echo $_smarty_tpl->tpl_vars['category']->value['kategori_adi'];?>
 (<?php echo $_smarty_tpl->tpl_vars['Ads']->value->categoryAdsCount($_smarty_tpl->tpl_vars['category']->value['Id']);?>
) <i class="material-icons arrow-right">keyboard_arrow_right</i>
										</a>
									</li>

									<?php if (isset($_smarty_tpl->tpl_vars['i'])) {$_smarty_tpl->tpl_vars['i'] = clone $_smarty_tpl->tpl_vars['i'];
$_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['i']->value+1; $_smarty_tpl->tpl_vars['i']->nocache = null; $_smarty_tpl->tpl_vars['i']->scope = 0;
} else $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
								<?php
$_smarty_tpl->tpl_vars['category'] = $foreach_category_Sav;
}
?>
							</ul>
						</div>
					</div>
				</div>
				<?php if (isset($_smarty_tpl->tpl_vars['newsAll'])) {$_smarty_tpl->tpl_vars['newsAll'] = clone $_smarty_tpl->tpl_vars['newsAll'];
$_smarty_tpl->tpl_vars['newsAll']->value = $_smarty_tpl->tpl_vars['News']->value->news(); $_smarty_tpl->tpl_vars['newsAll']->nocache = null; $_smarty_tpl->tpl_vars['newsAll']->scope = 0;
} else $_smarty_tpl->tpl_vars['newsAll'] = new Smarty_Variable($_smarty_tpl->tpl_vars['News']->value->news(), null, 0);?>

				<?php if ($_smarty_tpl->tpl_vars['newsAll']->value) {?>
					<div class="col-lg-12 col-md-12">
						<div class="block">
							<div class="block-title">
								<h5>Haberler</h5>
							</div>
							<div class="block-content" style="padding-top: 20px;">
								<?php
$_from = $_smarty_tpl->tpl_vars['newsAll']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['news'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['news']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['news']->value) {
$_smarty_tpl->tpl_vars['news']->_loop = true;
$foreach_news_Sav = $_smarty_tpl->tpl_vars['news'];
?>
									<div class="col-md-12 news">
				                        <a class="pull-left news-link" href="<?php echo SITE_URL;?>
/news/<?php echo $_smarty_tpl->tpl_vars['news']->value['news_seflink'];?>
">
				                            <img class="news-object" width="100%" height="100%" src="<?php echo siteUrl('files/news/thumb');?>
/<?php echo $_smarty_tpl->tpl_vars['news']->value['news_image'];?>
.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['news']->value['news_title'];?>
">
				                            <i class="material-icons">search</i>
				                        </a>
				                        <div class="news-body">
				                            <h4 class="news-heading">
				                            	<a href="<?php echo SITE_URL;?>
/news/<?php echo $_smarty_tpl->tpl_vars['news']->value['news_seflink'];?>
"><?php echo $_smarty_tpl->tpl_vars['news']->value['news_title'];?>
</a>
				                            </h4>
				                        </div>
				                    </div>
			                    <?php
$_smarty_tpl->tpl_vars['news'] = $foreach_news_Sav;
}
?>

			                    <a href="<?php echo siteUrl('news');?>
">
			                    	<button type="button" class="btn btn-primary" style="width: 100%;">Tüm Haberler</button>
			                    </a>
		                	</div>
	               		</div>
					</div>
				<?php }?>
			<?php }?>
		</div>
	</div>
</div><?php }
}
?>