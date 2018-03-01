/*
    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
    # @Date:   2017-08-17 16:52:22
    # @Email:  abbasovenver1999@gmail.com
    # @Last Modified time: 2017-09-08 12:09:40
*/

function openNav() 
{
    var menuDisplay = $('#sidebar-menu').css('width');

    if(menuDisplay == '0px' || !menuDisplay)
    {
        $('#sidebar-menu').width(250);
    }
    else
    {
        $('#sidebar-menu').width(0);
    }
}

var digitsOnly = /[1234567890]/g;
var integerOnly = /[0-9\.]/g;
var alphaOnly = /[A-Za-z1234567890]/g;
function restrictCharacters(myfield, e, restrictionType) 
{
    if (!e)
        var e = window.event
    if (e.keyCode)
        code = e.keyCode;
    else if (e.which)
        code = e.which;
    var character = String.fromCharCode(code);
    if (code == 27) 
    {
        this.blur();
        return false;
    }
    if (!e.ctrlKey && code != 9 && code != 8 && code != 36 && code != 37 && code != 38 && (code != 39 || (code == 39 && character == "'")) && code != 40) 
    {
        
        if (character.match(restrictionType)) 
        {
            return true;
        } 
        else 
        {
            return false;
        }

    }
}

function progress(e, count)
{
    if(e.lengthComputable)
    {
        var max = e.total;
        var current = e.loaded;

        var Percentage = (current * 100) / max;
        Percentage     = parseInt(Percentage);

        if(count !== null)
        {
            $('.uploaded-images .col-md-2.col-sm-3.col-xs-6[data-id="' + count + '"] .load').show().text(Percentage + '%');
        }
        else
        {
            $('.uploaded-images .col-md-3.col-sm-3.col-xs-6 .load').show().text(Percentage + '%');
        }
    }
}

function getPreview()
{

    var adName         = $('input[name=ad_name]').val();
    var adPrice        = $('input[name=ad_price]').val();
    var adPriceType    = $('select[name=price_type]').val();
    var adCity         = $('select[name=city] option:selected').val();
    var adCounty       = $('select[name=county] option:selected').val();
    var adArea         = $('select[name=area] option:selected').val();
    var adNeighborhood = $('select[name=neighborhood] option:selected').val();
    var adImage        = $('.input-hidden-images input[name=ad-title-image]').val();
    var markerCheck    = $('#markerLatFld').val() + $('#markerLngFld').val();

    if(adName == '' || adPrice == '' || adCity == 0 || adCounty == 0 || adImage == '' || markerCheck == '')
    {
        $('.alertRow').html('\
            <div class="alert alert-danger" style="margin-top: 20px;">\
                <strong>Hata!</strong> Lütfen zorunlu alanları boş bırakmayınız\
            <div>\
        ');

        if(adName == '')
        {
            $('input[name=ad_name]').parent().addClass('has-error');
        }
        else
        {
            $('input[name=ad_name]').parent().removeClass('has-error');
        }

        if(adPrice == '')
        {
            $('input[name=ad_price]').parent().addClass('has-error');
        }
        else
        {
            $('input[name=ad_price]').parent().removeClass('has-error');
        }

        if(adCity == 0)
        {
            $('select[name=city]').parent().addClass('has-error');
        }
        else
        {
            $('select[name=city]').parent().removeClass('has-error');
        }

        if(adCounty == 0)
        {
            $('select[name=county]').parent().addClass('has-error');
        }
        else
        {
            $('select[name=county]').parent().removeClass('has-error');
        }

        if(adArea == 0)
        {
            $('select[name=area]').parent().addClass('has-error');
        }
        else
        {
            $('select[name=area]').parent().removeClass('has-error');
        }

        if(adNeighborhood == 0)
        {
            $('select[name=neighborhood]').parent().addClass('has-error');
        }
        else
        {
            $('select[name=neighborhood]').parent().removeClass('has-error');
        }

        if(adImage == '')
        {
            $('.upload-message').html('\
                <div class="alert alert-danger" style="margin-top: 20px;">\
                    <strong>Hata!</strong> En az 1 resim yüklemelisiniz\
                <div>\
            ');
        }
        else
        {
            $('.upload-message').html('');
        }

        if(markerCheck == '' && $('#map-canvas').css('display') == 'block')
        {
            $('.map-message').html('\
                <div class="alert alert-danger" style="margin-top: 20px;">\
                    <strong>Hata!</strong> Lütfen harita üzerinde konumu seçiniz\
                <div>\
            ');
        }
        else
        {
            $('.map-message').html('');
        }
    } 
    else
    {
        if(upInt == 0)
        {
            $('.alertRow').html('');
            $('.form-group').removeClass('has-error');
            $('.upload-message').html('');
            $('.map-message').html('');

            if(adPriceType == 0) { var adPriceType = '<i class="icon icon-tl"></i>'; } else if(adPriceType == 1) { var adPriceType = '<i class="icon icon-euro"></i>'; } else if(adPriceType == 2) { var adPriceType = '<i class="icon icon-usd"></i>'; }

            /* DETAILS */
            $('.ad-preview-step .ad-title').text($('input[name=ad_name]').val());
            $('.ad-preview-step .ad-price').html(addCommas($('input[name=ad_price]').val()) + adPriceType);
            $('.ad-preview-step .ad-location li.city').text($('select[name=city] option:selected').text().toLowerCase());
            $('.ad-preview-step .ad-location li.county').text($('select[name=county] option:selected').text().toLowerCase());
            $('.ad-preview-step .mobile-ad-view .col-xs-6:last small span:eq(0)').text($('select[name=city] option:selected').text().toLowerCase());
            $('.ad-preview-step .mobile-ad-view .col-xs-6:last small span:eq(1)').text($('select[name=county] option:selected').text().toLowerCase());

            $('.ad-preview-step .mobile-location li.city').text($('select[name=city] option:selected').text().toLowerCase() + ', ');
            $('.ad-preview-step .mobile-location li.county').text($('select[name=county] option:selected').text().toLowerCase());

            if($('select[name=neighborhood] option:selected').val() != 0)
            {
                $('.ad-preview-step .ad-location li.neighborhood').text(' / ' + $('select[name=neighborhood] option:selected').text().toLowerCase()).show();
                $('.ad-preview-step .mobile-location li.neighborhood').text(', ' + $('select[name=neighborhood] option:selected').text().toLowerCase()).show();
            }
            else
            {
                $('.ad-preview-step .ad-location li.neighborhood').hide();
                $('.ad-preview-step .mobile-location li.neighborhood').hide();
            }

            var appended = '';

            if($('.hidden-inputs input[name=category_2]').val() != '')
            {
                appended += '\
                    <li>\
                        <strong class="detail-list-title">Marka: </strong>\
                        <span class="detail-list-value">' + $('.hidden-inputs input[name=category_2]').attr('data-name') + '</span>\
                    </li>\
                ';
            }

            if($('.hidden-inputs input[name=category_3]').val() != '')
            {
                appended += '\
                    <li>\
                        <strong class="detail-list-title">Seri: </strong>\
                        <span class="detail-list-value">' + $('.hidden-inputs input[name=category_3]').attr('data-name') + '</span>\
                    </li>\
                ';
            }

            if($('.hidden-inputs input[name=category_4]').val() != '')
            {
                appended += '\
                    <li>\
                        <strong class="detail-list-title">Model: </strong>\
                        <span class="detail-list-value">' + $('.hidden-inputs input[name=category_4]').attr('data-name') + '</span>\
                    </li>\
                ';
            }

            $('.category-items .form-group.col-md-3.col-sm-4.col-xs-12').each(function(i, value) {
                
                var title     = $(this).find('label').text();
                var valueType = $(this).find('label').next().html();

                if(!valueType)
                {
                    var value = $(this).find('input').val();

                    if(value != '' && value > 0)
                    {
                        appended += '\
                            <li>\
                                <strong class="detail-list-title">' + title + ': </strong>\
                                <span class="detail-list-value">' + value + '</span>\
                            </li>\
                        ';
                    }
                }
                else
                {
                    var value = $(this).find('label').next().find('option:selected').text();

                    if(value != '' && value != 'Seçiniz')
                    {
                        appended += '\
                            <li>\
                                <strong class="detail-list-title">' + title + ': </strong>\
                                <span class="detail-list-value">' + value + '</span>\
                            </li>\
                        ';
                    }
                }

            });

            $('.ad-preview-step .ad-detail .ad-details .appended').html(appended);
            appended = '';

            /* FEATURES */
            var featuresLength = $('.category-features .row').length;

            if(featuresLength > 0)
            {
                $('.ad-detail .ad-tabs li:first').show();

                var groupLists = '';
                var lists      = '';
                $('.category-features .row').each(function() {
                        
                    var groupTitle = $('label.feature-title', this).text().replace('keyboard_arrow_up', '').replace('keyboard_arrow_down', '');
                    
                    lists += '\
                        <ul class="form-group col-md-12 col-sm-12 col-xs-12">\
                        <h4>' + groupTitle + '</h4>\
                        <div class="row">\
                    '; 

                    $('.features-lists .form-group.col-md-3.col-sm-3.col-xs-12', this).each(function() {

                        var listTitle = $(this).find('label').text();
                        var checked   = $(this).find('input').is(':checked');

                        if(checked != '')
                        {
                            lists += '\
                                <li class="form-group col-md-3 col-sm-3 col-xs-12 active">\
                                    <i class="material-icons">check</i> <span>' + listTitle + '</span>\
                                </li>\
                            ';
                        }
                    });

                    lists += '</div></ul>';

                    groupLists += lists;

                    lists = '';

                });

                $('.ad-detail .ad-tabs .tab-content #ad-features').html(groupLists);
                $('.ad-detail .mobile-features #ad-features2').html(groupLists);

                $('#ad-features .form-group.col-md-12.col-sm-12.col-xs-12').each(function() {
                    
                    if($('.row li', this).length <= 0)
                    {
                        $('.row', this).html('<div class="col-md-12">Belirtilmemiş</div>');
                    }

                });

                $('#ad-features2 .form-group.col-md-12.col-sm-12.col-xs-12').each(function() {
                    
                    if($('.row li', this).length <= 0)
                    {
                        $('.row', this).html('<div class="col-md-12">Belirtilmemiş</div>');
                    }

                });
            }
            else
            {
                $('.ad-detail .ad-tabs li:first').hide();
                $('.ad-detail .ad-tabs .tab-content #ad-features').removeClass('in');
                $('.ad-detail .ad-tabs .tab-content #ad-features').removeClass('active');
            }

            /* USER */
            var phoneStatus   = $('input[name=phone_status]:checked').val();
            var messageStatus = $('input[name=message_status]:checked').val();

            if(phoneStatus == 1)
            {
                $('.ad-preview-step .user-phones').show();
            } 
            else
            {
                $('.ad-preview-step .user-phones').hide();
            }

            if(!messageStatus)
            {
                $('.ad-preview-step .send-message').show();
            }
            else
            {
                $('.ad-preview-step .send-message').hide();
            }

            if(!messageStatus && phoneStatus == 1)
            {
                $('.mobile-ad-user .left').show();
                $('.mobile-ad-user .right').show();

                $('.mobile-ad-user .center').removeClass('col-xs-4 col-xs-8 col-xs-12').addClass('col-xs-4');
            }

            if(messageStatus && phoneStatus == 1)
            {
                $('.mobile-ad-user .left').show();
                $('.mobile-ad-user .right').hide();

                $('.mobile-ad-user .center').removeClass('col-xs-4 col-xs-8 col-xs-12').addClass('col-xs-8');
            }

            if(messageStatus && phoneStatus == 0)
            {
                $('.mobile-ad-user .left').hide();
                $('.mobile-ad-user .right').hide();

                $('.mobile-ad-user .center').removeClass('col-xs-4 col-xs-8 col-xs-12').addClass('col-xs-12');
            }

            if(!messageStatus && phoneStatus == 0)
            {
                $('.mobile-ad-user .left').hide();
                $('.mobile-ad-user .right').show();

                $('.mobile-ad-user .center').removeClass('col-xs-4 col-xs-8 col-xs-12').addClass('col-xs-8');
            }

            /* AD IMAGES */
            var owlEventTitle = $('.ad-images-title');
            owlEventTitle.owlCarousel({
                items: 1,
                lazyLoad: true,
                loop: false,
                margin: 0,
                dots: true,
                nav: false,
                URLhashListener: true,
                autoHeight: false
            });
                
            var swiper = new Swiper('.swiper-container', {
                pagination: '.swiper-pagination',
                paginationType: 'fraction',
                slidesPerView: 4,
                slidesPerColumn: 2,
                paginationClickable: true,
                spaceBetween: 5
            });

            for(var x = 0; x < (uploadImageLimit + 5); x++)
            {
                owlEventTitle.trigger('remove.owl.carousel', x).trigger('refresh.owl.carousel');
            }

            swiper.removeAllSlides();

            var listTitleImages = '';
            var listThumbImages = '';
            var titleImage      = $('input[name=ad-title-image]').val();

            listTitleImages = '\
                <a class="item" href="' + siteUrl + '/files/ads/big/' + titleImage + '.jpg">\
                    <img src="' + siteUrl + '/files/ads/medium/' + titleImage + '.jpg" data-hash="slide1" width="100%" alt="">\
                </a>\
            ';

            listThumbImages = '\
                <div class="swiper-slide">\
                    <a href="#slide1">\
                        <img src="' + siteUrl + '/files/ads/thumb/' + titleImage + '.jpg" width="100%" alt="">\
                    </a>\
                </div>\
            ';

            owlEventTitle.trigger('add.owl.carousel', listTitleImages, 0);
            swiper.appendSlide(listThumbImages);

            var slideI = 1;
            $('input#uploaded-image').each(function(i, value) {

                var valImage = $(this).val();
                slideI = slideI + 1;

                if(titleImage != valImage)
                {
                    listTitleImages = '\
                        <a class="item" href="' + siteUrl + '/files/ads/big/' + valImage + '.jpg">\
                            <img src="' + siteUrl + '/files/ads/medium/' + valImage + '.jpg" data-hash="slide' + slideI + '" width="100%" alt="">\
                        </a>\
                    ';

                    listThumbImages = '\
                        <div class="swiper-slide">\
                            <a href="#slide' + slideI + '">\
                                <img src="' + siteUrl + '/files/ads/thumb/' + valImage + '.jpg" width="100%" alt="">\
                            </a>\
                        </div>\
                    ';

                    owlEventTitle.trigger('add.owl.carousel', listTitleImages, 0);
                    swiper.appendSlide(listThumbImages);
                }

            });

            swiper = new Swiper('.swiper-container', {
                pagination: '.swiper-pagination',
                paginationType: 'fraction',
                slidesPerView: 4,
                slidesPerColumn: 2,
                paginationClickable: true,
                spaceBetween: 5
            });

            var slide = 0;

            $('.swiper-button-next').click(function() {

                var countSlide = $('.swiper-slide').length;

                if(countSlide > 8 && countSlide > (slide + 8))
                {
                    slide = slide + 9;
                }

                swiper.slideTo(slide, 300);
            });

            $('.swiper-button-prev').click(function() {

                var countSlide = $('.swiper-slide').length;

                if(slide > 0)
                {
                    slide = slide - 9;
                }

                swiper.slideTo(slide, 300);
            });

            /* DESTROY AND CREATE LIGHT GALLERY */
            if($('.ad-images-title').data('lightGallery'))
            {
                $('.ad-images-title').data('lightGallery').destroy(true);
            }
            createLightGallery();

            /* SHOW FIRST TAB */
            $('.ad-tabs .tab-content>div').removeClass('in').removeClass('active');
            $('.ad-detail #ad-detail-map').css({'pointer-events': 'none'});

            /* AD TEXT */
            if($('#default-editor').trumbowyg('html') != '')
            {
                $('.ad-tabs .tab-content #ad-texts').html($('#default-editor').trumbowyg('html'));
                $('.mobile-ad-view .texts').html($('#default-editor').trumbowyg('html'));
                $('.ad-tabs .nav li').show();
                $('.ad-tabs .tab-content #ad-texts').show();

                $('.ad-tabs .tab-content>div:first').addClass('in').addClass('active');
                $('.ad-tabs .nav li a:first').trigger('click');
            }
            else
            {
                $('.ad-tabs .nav li:first').hide();
                $('.ad-tabs .tab-content #ad-texts').hide();
                $('.mobile-ad-view .texts').text('Açıklama Yok');

                $('.ad-tabs .tab-content>div:eq(1)').addClass('in').addClass('active');
                $('.ad-tabs .nav li:eq(1) a').trigger('click');
            }

            /* STEP */
            $('.ad-info-step').hide();
            $('.ad-preview-step').show();
            
            $('.step-two').addClass('active');
            $('.step-two span').addClass('active');

            $(window).scrollTop(0);
        }
        else
        {
            $('.upload-message').html('\
                <div class="alert alert-danger" style="margin-top: 20px;">\
                    <strong>Hata!</strong> Lütfen resimler yüklenene kadar bekleyiniz\
                <div>\
            ');
        }
    }

}

function prevPreview()
{

    $('.step-two').removeClass('active');
    $('.step-two span').removeClass('active');

    $('.ad-preview-step').hide();
    $('.ad-info-step').show();

    $('.map-content, .ad-text').hide();
    $('.mobile-ad-user, .mobile-location').show();
    $('.ad-images-title, .ad-title, .ad-preview-step .col-md-4:eq(1), .col-md-4:eq(1), .col-md-12.col-sm-12.col-xs-12:eq(0), .mobile-features').show();

    google.maps.event.trigger(map, "resize");
    initMap(parseFloat($('#latFld').val()), parseFloat($('#lngFld').val()), parseInt($('#zoomFld').val()));
    placeMarker(null, parseFloat($('#markerLatFld').val()), parseFloat($('#markerLngFld').val()));

    $(window).scrollTop(0);

}

var totalPrice = 0;

function getDoping(step)
{
    $('.ad-preview-step').hide();
    $('.ad-doping-step').show();

    if(step == 1)
    {
        $('.ad-doping-step .doping-step-1').show();
        $('.steps .step-three').addClass('active');
        $('.steps .step-three').find('span').addClass('active');
    }
    else if(step == 2)
    {
        var tableList  = '';
        $('.doping-lists .doping.active').each(function() {
            var dopingId    = $(this).attr('data-doping');
            var dopingName  = $(this).attr('data-name');
            var dopingPrice = $(this).attr('data-price');
            var dopingTime  = $(this).attr('data-time');

            tableList += '\
                <tr data-doping-id="' + dopingId + '">\
                    <td>' + dopingName + ' <i class="material-icons" onclick="deleteDoping(' + dopingId + ');" style="color: #ff263a;cursor: pointer;">close</i></td>\
                    <td>' + dopingTime + ' Gün</td>\
                    <td data-table-price="' + dopingPrice + '">' + dopingPrice + ' TL</td>\
                </tr>\
            ';

            totalPrice += parseFloat(dopingPrice);
        });

        $('.ad-doping-step .doping-step-2 .doping-step-2-header table tbody').html(tableList);
        $('.ad-doping-step .total-doping-price span').text(totalPrice);
        tableList = '';

        $('.ad-doping-step .doping-step-1').hide();
        $('.ad-doping-step .doping-step-2').show();
    }
}

function selectDoping(selectedDoping)
{
    $('.doping[data-doping=' + selectedDoping + ']').toggleClass('active');

    var dopings      = '';
    var dopingsPrice = '';
    var dopingId     = 0;
    var dopingPrice  = 0;
    $('.doping-lists .doping.active').each(function() {
        dopingId     = $(this).attr('data-doping');
        dopingPrice  = $(this).attr('data-price');
        dopings      += dopingId + '|';
        dopingsPrice += dopingPrice + '|';
    });

    $('input[name=dopings]').val(dopings.slice(0, -1));
    $('input[name=dopingsPrice]').val(dopingsPrice.slice(0, -1));

    dopings      = dopings.split('|');
    dopingsPrice = dopingsPrice.split('|');

    var lock        = false;
    var dopingStep2 = false;

    $.each(dopingsPrice, function(i, value) {
        
        if(lock === false)
        {
            if(value > 0)
            {
                lock        = true;
                dopingStep2 = true;
            }
        }

    });

    if(dopingStep2 === true)
    {
        $('.ad-doping-step .doping-step-1 button').attr('onclick', 'getDoping(2);').attr('name', 'getDoping');
    }
    else
    {
        $('.ad-doping-step .doping-step-1 button').attr('onclick', '$("form[name=ad-add], form[name=ad-update]").submit();').attr('name', 'complete');
    }

    dopings      = '';
    dopingsPrice = '';
}

function deleteDoping(dopingId)
{
    var getPrice = $('.ad-doping-step .doping-step-2 .doping-step-2-header table tr[data-doping-id=' + dopingId + ']').find('td:last').attr('data-table-price');
    totalPrice -= parseFloat(getPrice);
    $('.ad-doping-step .total-doping-price span').text(totalPrice);

    $('.ad-doping-step .doping-step-2 .doping-step-2-header table tr[data-doping-id=' + dopingId + ']').remove();
    $('.ad-doping-step .doping-step-1 .doping[data-doping=' + dopingId + ']').removeClass('active');

    var dopings = '';
    $('.ad-doping-step .doping-step-2 .doping-step-2-header tr').each(function() {
        var dopingIdTr = $(this).attr('data-doping-id');

        if(dopingIdTr != undefined)
        {
            dopings += dopingIdTr + '|'; 
        }
    });

    $('input[name=dopings]').val(dopings.slice(0, -1));

    if($('input[name=dopings]').val() == '')
    {
        $('.ad-doping-step .doping-step-2').hide();
        $('.ad-doping-step .doping-step-1').show();
    }

    dopings = '';
}

function selectStoreTheme(storeTheme)
{
    $('.select-store-theme .selected').removeClass('active');
    $('.select-store-theme .col-md-6.col-sm-3.col-xs-12[data-theme=' + storeTheme + ']').find('.selected').addClass('active');

    $('input[name=store-theme]').val(storeTheme);
}

function getStoreFirm()
{
    var storeName   = $('input[name=store_name]').val();
    var storeImage  = $('input[name=store-image]').val();
    var storeTheme  = $('input[name=store-theme]').val();

    if(storeName == '')
    {
        $('input[name=store_name]').parent().addClass('has-error');
    }
    else
    {
        $('input[name=store_name]').parent().removeClass('has-error');
    }

    if(storeTheme == '')
    {
        $('.theme-message').html('\
            <div class="alert alert-danger">\
                <strong>Hata!</strong> Mağaza temasını seçmelisiniz\
            </div>\
        ');
    }
    else
    {
        $('.theme-message').html('');
    }

    if(storeImage == '')
    {
        $('.upload-message').html('\
            <div class="alert alert-danger" style="margin-top: 17px;">\
                <strong>Hata!</strong> Mağaza logosunu yüklemelisiniz\
            </div>\
        ');
    }
    else
    {
        $('.upload-message').html('');
    }

    if(storeName != '' && storeImage != '' && storeTheme != '')
    {
        if(storeTheme == 1 || storeTheme == 2 || storeTheme == 3 || storeTheme == 4)
        {
            $('.add-store-info').hide();
            $('.add-store-firms').show();

            $('.step-two').addClass('active');
            $('.step-two').find('span').addClass('active');
        }
        else
        {
            $('.theme-message').html('\
                <div class="alert alert-danger">\
                    <strong>Hata!</strong> Mağaza temasını seçmelisiniz\
                </div>\
            ');
        }
    }
}

var storePaymentPrice = 0;

function setStore()
{
    var storePrice = $('select[name=store_type] option:selected').attr('data-price');

    storePaymentPrice = storePrice;

    $('.paymentPrice span').text(storePaymentPrice + ' TL');
}

function showDomainName()
{
    var storeName = $('input[name=store_name]').val();

    if(storeName != '')
    {
        storeName = storeName.toLowerCase().replace(/ /g, '').replace(/ə/g, 'e').replace(/ü/g, 'u').replace(/ö/g, 'o').replace(/ğ/g, 'g').replace(/ç/g, 'c').replace(/ş/g, 's').replace(/ı/g, 'i');
    }
    else
    {
        storeName = 'domainadi';
    }

    $('input[name=domainname]').val(storeName + subdomainName);
}

function checkDomain()
{
    var domainName = $('input[name=store_name]').val();

    if(domainName != '' && domainName != $('input[name=store_name]').attr('value'))
    {
        $.ajax({
            type: 'POST',
            url: siteUrl + '/request',
            dataType: 'json',
            data: {'mode': 'checkDomainName', 'domainName': domainName},
            success: function(response)
            {
                if(response.error)
                {
                    $('.domain-name-message').html('\
                        <div class="alert alert-danger">\
                            <strong>Hata!</strong> ' + response.error + '\
                        </div>\
                    ');
                }
                else
                {
                    $('.domain-name-message').html('');
                }
            }
        })
    }
    else
    {
        $('.domain-name-message').html('');
    }
}

function adsFilter()
{
    $('.ad-list').hide();
    $('.mobile-filters').show();
    $('.mobile-filters .list-bottom').show();
    $('#main').css({'min-height': 'auto'});
    $(window).scrollTop(0);
}

function showLocation(lat, lng, zoom)
{
    $('.map-content').show();

    initMapPreview('ad-detail-map2', lat, lng, zoom);

    $('.ad-images-title, .ad-title, .ad-preview-step .col-md-4, .col-md-4, .col-md-12.col-sm-12.col-xs-12:eq(0), .mobile-features, .ad-text, .mobile-ad-user, .mobile-location').hide();
    $('.mobile-ad-view #ad-detail-map').css({'pointer-events': 'all'});

    $(window).scrollTop(0);
}

function closeLocation()
{
    $('.map-content').hide();

    $('.ad-images-title, .ad-title, .ad-preview-step .col-md-4, .col-md-4, .col-md-12.col-sm-12.col-xs-12:eq(0), .mobile-features, .mobile-ad-user, .mobile-location').show();
    $('.mobile-ad-view #ad-detail-map').css({'pointer-events': 'none'});
}

function showText()
{
    $('.ad-text').show();

    $('.ad-images-title, .ad-title, .ad-preview-step .col-md-4, .col-md-4, .col-md-12.col-sm-12.col-xs-12:eq(0), .mobile-features, .map-content, .mobile-ad-user, .mobile-location').hide();

    $(window).scrollTop(0);
}

function closeText()
{
    $('.ad-text').hide();

    $('.ad-images-title, .ad-title, .ad-preview-step .col-md-4, .col-md-4, .col-md-12.col-sm-12.col-xs-12:eq(0), .mobile-features, .mobile-ad-user, .mobile-location').show();
}

function addCommas(nStr)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

function isPositiveInteger(n) 
{
    return 0 === n % (!isNaN(parseFloat(n)) && 0 <= ~~n);
}

function createLightGallery()
{
    $('.ad-images-title').lightGallery({selector: '.item'}); 
}

function addFavoriteSearch(categoryID, userType, orderBy, categorySpecial = false)
{
    var serializeForm = '';
    $.each($('.form-search').find("select"), function(i, value) {
        var elementValue = $(this).find('option[selected]:last').attr('value');
        var elementName  = $(this).attr('name');
        
        serializeForm += '&' + elementName + '=' + elementValue;
    });

    $.each($('.form-search').find("input"), function(i, value) {
        var elementValue = $(this).attr('value');
        var elementName  = $(this).attr('name');
        
        serializeForm += '&' + elementName + '=' + elementValue;
    });

    swal({
        title: "Aramayı Favorilere Kaydet",
        type: "input",
        showCancelButton: true,
        closeOnConfirm: false,
        confirmButtonText: 'Kaydet',
        cancelButtonText: 'Vazgeç',
        animation: "slide-from-top",
        inputPlaceholder: "Favori Arama Adı"
    },
    function(inputValue){
        if (inputValue === false) return false;

        if (inputValue === "") {
            swal.showInputError("Tüm alanlar doldurulmalıdır");
            return false
        }

        if(ajaxLock === false)
        {
            ajaxLock = true;

            $.ajax({
                type: 'POST',
                url: siteUrl + '/request',
                dataType: 'json',
                data: 'mode=addFavoriteSearch&categoryID=' + categoryID  + '&userType=' + userType + '&orderby=' + orderBy + '&name=' + inputValue + '&' + serializeForm + '&categorySpecial=' + categorySpecial,
                success: function(response)
                {
                    if(response.success)
                    {
                        swal({
                            title: "Başarılı!",
                            text: 'Favori aramalarına eklendi',
                            type: "success",
                            animation: "slide-from-top",
                            confirmButtonText: 'Tamam'
                        });
                    }
                    else
                    {
                        swal({
                            title: "Hata!",
                            text: 'Favori aramalarıma eklenemedi',
                            type: "error",
                            animation: "slide-from-top",
                            confirmButtonText: 'Tamam'
                        });
                    }

                    ajaxLock = false;
                }
            })
        }
    });
}

function editFavoriteSearch(favoriteId, name)
{
    swal({
        title: "Aramayı Düzenle",
        type: "input",
        inputValue: name,
        showCancelButton: true,
        closeOnConfirm: false,
        confirmButtonText: 'Kaydet',
        cancelButtonText: 'Vazgeç',
        animation: "slide-from-top",
        inputPlaceholder: "Favori Arama Adı"
    },
    function(inputValue){
        if (inputValue === false) return false;

        if (inputValue === "") {
            swal.showInputError("Tüm alanlar doldurulmalıdır");
            return false
        }

        if(ajaxLock === false)
        {
            ajaxLock = true;

            $.ajax({
                type: 'POST',
                url: siteUrl + '/request',
                dataType: 'json',
                data: 'mode=editFavoriteSearch&favoriteId=' + favoriteId + '&name=' + inputValue,
                success: function(response)
                {
                    if(response.success)
                    {
                        swal({
                            title: "Başarılı!",
                            text: 'Arama güncellendi',
                            type: "success",
                            animation: "slide-from-top",
                            confirmButtonText: 'Tamam'
                        },
                        function(){
                            window.location.href = siteUrl + '/my-favorites/search';
                        });
                    }
                    else
                    {
                        swal({
                            title: "Hata!",
                            text: 'Arama güncellenemedi',
                            type: "error",
                            animation: "slide-from-top",
                            confirmButtonText: 'Tamam'
                        });
                    }

                    ajaxLock = false;
                }
            })
        }
    });
}