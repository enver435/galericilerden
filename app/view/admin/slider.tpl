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
						<div class="col-md-10 col-md-offset-1 sliders" style="padding-top: 20px;">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="row" style="padding-bottom: 20px;">
                                    {if $return.sliders}
                                        {foreach $return.sliders as $slider}
                                            <div class="col-md-4" style="margin-bottom: 20px;">
                                                <img src="{siteUrl('files/slider')}/{$slider.image}" width="100%" height="150" alt="">
                                                <a href="{SITE_URL}/{SITE_ADMIN}/slider/delete/{$slider.id}">
                                                    <button type="button" class="btn btn-danger text-center" style="width: 100%;">
                                                        <i class="fa fa-trash"></i> Sil
                                                    </button>
                                                </a>
                                            </div>
                                        {/foreach}
                                    {else}
                                        <h4 class="text-danger text-center">Slider resmi yok</h4>
                                    {/if}
                                </div>

                                <button type="submit" name="update_slider" class="btn btn-primary pull-right">Kaydet</button>
                                <button type="button" class="btn btn-primary pull-right add-slider" style="margin-right: 15px;">Slider ekle</button>
                            </form>
                            
                            {literal}
                                <script type="text/javascript">
                                    $(function() {
                                        $('button.add-slider').click(function() {
                                            $('.sliders .row').append('\
                                                <div class="col-md-4" style="margin-bottom: 20px;">\
                                                    <div class="img-view" style="height: 150px;background-color: #ddd;position: relative;cursor: pointer;display: flex;justify-content: center;align-items: center;">\
                                                        <img src="" alt="" style="display: none;height: 150px;width: 100%;" />\
                                                        <i class="fa fa-plus" style="font-size: 45px;"></i>\
                                                        <input type="file" name="slider_img[]" accept="image/*" style="height: 150px;width: 100%;display: block;opacity: 0;position: absolute;top: 0;cursor: pointer;z-index: 9999;" />\
                                                    </div>\
                                                    <a href="javascript:void(0);" onclick="$(this).parent().remove();">\
                                                        <button type="button" class="btn btn-danger text-center" style="width: 100%;">\
                                                            <i class="fa fa-trash"></i> Sil\
                                                        </button>\
                                                    </a>\
                                                </div>\
                                            ');

                                            $('.sliders h4').remove();
                                        });

                                        $(document).on('change', '.sliders input[type=file]', function () {
                                            var _this = $(this);

                                            var reader = new FileReader();

                                            reader.onload = (function(theFile) { 
                                                var image = new Image();
                                                image.src = theFile.target.result;

                                                image.onload = function() {
  
                                                    $(_this).parent().find('i').hide();
                                                    $(_this).parent().css({'background-color': 'none'});
                                                    $(_this).parent().find('img').attr('src', this.src).show();
                                                    
                                                };
                                            });

                                            reader.readAsDataURL(this.files[0]);

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