var userNav = document.getElementById('user-nav'),
    userName = document.getElementById('user-name');

//  Click Name
if (userName) {
    userName.addEventListener('click', function () {
        event.stopPropagation();
        !hasClass(userNav, 'active') ? addClass(userNav) : removeClass(userNav);
        !hasClass(userName, 'active') ? addClass(userName) : removeClass(userName);
    });
}

//  Close Nav Menu on Click outside Name
document.addEventListener('click', function () {
    hasClass(userNav, 'active') ? removeClass(userNav) : null;
    hasClass(userName, 'active') ? removeClass(userName) : null;
});

// HasClass function
function hasClass(element, cls) {
    return (' ' + element.className + ' ').indexOf(' ' + cls + ' ') > -1;
}

// Add Class Function
function addClass(element) {
    element.classList.add('active');
    setTimeout( function () {
        element.classList.add('active-animation');
    }, 10);
}

// Remove Class Function
function removeClass(element) {
    element.classList.remove('active-animation');
    setTimeout( function () {
        element.classList.remove('active');
    }, 500);
}

// CURRENT AUTO PAGE TABS
$('.tabs__header_item').click( function () {
    $(this).data('tab') == 'desc' ? activateDescTab() : false;
    $(this).data('tab') == 'equipment' ? activateEquipmentTab() : false;
});

// Activate Equipment Tab
function activateEquipmentTab() {
    $('.tabs__header').hasClass('left-active') ? $('.tabs__header').removeClass('left-active') : false;
    $('.tabs__header').addClass('right-active');

    // Content tab
    $('#desc-tab').hasClass('active') ? $('#desc-tab').removeClass('active') : false;
    $('#equipment-tab').addClass('active');
}

// Activate Description Tab
function activateDescTab() {
    $('.tabs__header').hasClass('right-active') ? $('.tabs__header').removeClass('right-active') : false;
    $('.tabs__header').addClass('left-active');

    // Content tab
    $('#equipment-tab').hasClass('active') ? $('#equipment-tab').removeClass('active') : false;
    $('#desc-tab').addClass('active');
}

// Activate first spoiler
$('.faq__spoiler:first-child .faq__content').slideDown();

$('.faq__spoiler').click( function () {

    $('.faq__spoiler').each( function () {
        $(this).find('.faq__content').slideUp();
        $(this).removeClass('active');
    });

    $(this).find('.faq__content').slideDown();
    $(this).addClass('active');
});

// Year Range
$("#year-range").ionRangeSlider({
    type: "double",
    grid: false,
    min: 2000,
    max: 2019,
    from: 2003,
    to: 2015,
    hide_min_max: true,
    postfix: ' г.'
});

// Price Range
$("#price-range").ionRangeSlider({
    type: "double",
    grid: false,
    min: 3500,
    max: 40000,
    from: 10000,
    to: 30000,
    hide_min_max: true,
    postfix: ' $',
    step: 500
});

// Car Brand Live Search
// Global var to Car
var gCars = [];
var gModels = [];

// Fetch JSON API
$(document).ready( function () {
    fetch('/index.php?rest_route=/my_endpoint/v1/car-models/')
        .then( function (response) {
            response.json().then( function (data) {
                var cars = data;
                gCars = cars;

                $(gCars).each( function () {
                    $('#car-brand-list-ul').append('<li class="request-form__input-list_li">' + this.brand + '</li>');
                });
            });
        });
});

$('#car-brand').focus( function () {
    $('#car-brand-list').slideDown();
});

$('#car-model').focus( function () {
    $('#car-models-list').slideDown();
});

$('#car-location').focus( function () {
    $('#car-location-list').slideDown();
});
$('#fuel-type').focus( function () {
    $('#car-fuel-list').slideDown();
});
$('#car-old').focus( function () {
    $('#car-old-list').slideDown();
});

// Live Search
$('#car-brand').keyup( function () {
    $('#car-brand-list-ul').empty();

    $(gCars).each( function () {
            var brand = this.brand;
            if ( ~brand.toLowerCase().indexOf( $('#car-brand').val().toLowerCase() ) ) {
                $('#car-brand-list-ul').append('<li class="request-form__input-list_li">' + this.brand + '</li>');
            }
    });
});

$('#car-model').keyup( function () {
    $('#car-models-list-ul').empty();

    $(gModels).each( function () {
        if ( ~this.toLowerCase().indexOf( $('#car-model').val().toLowerCase() ) ) {
            $('#car-models-list-ul').append('<li class="request-form__input-model-list_li">' + this + '</li>');
        }
    });
});


$(document).click( function (e) {
    var carBrandClass = $(e.target).attr('class');

    // Click on Brand Item
    if (carBrandClass == 'request-form__input-list_li') {
        var brandMaker = $(e.target).text();

        $('#car-models-list-ul').empty();

        $('#car-model').val('');

        $('#car-brand').val(brandMaker);

        var selectedBrand = $('#car-brand').val();

        var modelsList;

        // Add Models
        $(gCars).each( function () {

            this.brand == selectedBrand ? gModels = this.models : null;

        });

        $(gModels).each( function () {
            $('#car-models-list-ul').append('<li class="request-form__input-model-list_li">' + this + '</li>');
        });

        $('#car-brand-list').slideUp();
    }

    // CLick on Model Item
    if (carBrandClass == 'request-form__input-model-list_li') {
        var modelMaker = $(e.target).text();

        $('#car-model').val(modelMaker);

        $('#car-models-list').slideUp();
    }

    // console.log($(e.target).attr('class'));

    // Select model on click here
    if (carBrandClass == 'auto-page__input-list_li model-item-li') {
        var modelFilterMaker = $(e.target).text();

        $('#car-model-filters').val(modelFilterMaker);

        $('#car-models-list').slideUp();
    }

    // CLick on Location Item
    if (carBrandClass == 'request-form__input-location-list_li') {
        var locationMaker = $(e.target).text();

        $('#car-location').val(locationMaker);

        $('#car-location-list').slideUp();
    }

    // Click on Fuel Type Item
    if (carBrandClass == 'request-form__input-fuel-list_li') {
        var fuelMaker = $(e.target).text();

        $('#fuel-type').val(fuelMaker);

        $('#car-fuel-list').slideUp();
    }

    // Click on Old Type Item
    if (carBrandClass == 'request-form__input-old-list_li') {
        var oldMaker = $(e.target).text();

        $('#car-old').val(oldMaker);

        $('#car-old-list').slideUp();
    }
});

// Close Brands and Models list when click outside elements
$(window).click(function() {
    $('#car-brand-list').slideUp();
    $('#car-models-list').slideUp();
    $('#car-location-list').slideUp();
    $('#car-old-list').slideUp();
    $('#car-fuel-list').slideUp();
});

$('#car-brand').click(function(event){
    event.stopPropagation();
    $('#car-models-list').slideUp();
    $('#car-location-list').slideUp();
});
$('#car-model').click(function(event){
    event.stopPropagation();
    $('#car-brand-list').slideUp();
    $('#car-location-list').slideUp();
});
$('#car-location').click(function(event){
    event.stopPropagation();
    $('#car-models-list').slideUp();
    $('#car-brand-list').slideUp();
});
$('#fuel-type').click(function(event){
    event.stopPropagation();
    $('#car-old-list').slideUp();
});
$('#car-old').click(function(event){
    event.stopPropagation();
    $('#car-fuel-list').slideUp();
});

// Auto Page

// FadeIn and FadeOut brand list
$('#car-brand-filters').focus( function () {
    $('#car-brand-list-filters').fadeIn();
});
$('#car-brand-filters').focusout( function () {
    $('#car-brand-list-filters').fadeOut();
});


// FadeIn and FadeOut model list
$('#car-model-filters').focus( function () {
    $('#car-list-filters').fadeIn();
});
$('#car-model-filters').focusout( function () {
    $('#car-list-filters').fadeOut();
});

// FadeIn and FadeOut year list
$('#year-from').focus( function () {
    $('#year-from-list-filters').fadeIn();
});
$('#year-from').focusout( function () {
    $('#year-from-list-filters').fadeOut();
});
$('#year-to').focus( function () {
    $('#year-to-list-filters').fadeIn();
});
$('#year-to').focusout( function () {
    $('#year-to-list-filters').fadeOut();
});

// FadeIn and FadeOut transsmision list
$('#transmission-type').focus( function () {
    $('#car-transmission-list').fadeIn();
});
$('#transmission-type').focusout( function () {
    $('#car-transmission-list').fadeOut();
});

// Select Brand on click here
$('.brand-item-li').click( function () {
    var selectedBrand = $(this).text();

    $('#car-brand-filters').val(selectedBrand);

    // And get models list
    $.ajax({
        type: 'POST',
        url: '/wp-admin/admin-ajax.php',
        dataType: 'json',
        data: 'action=get-models&brand=' + selectedBrand,
        success: function(data) {
            modelList(data);
        }
    });
});

// Add Model List to front-end
function modelList(data) {
    // Clear prev model list
    $('#car-models-list-ul-filters').empty();

    $(data).each( function (key, item) {
        $('#car-models-list-ul-filters').append('<li class="auto-page__input-list_li model-item-li">' + item + '</li>');
    });
}

// Prevent key down in brand, model input
$('#car-brand-filters').add('#car-model-filters').add('#year-from').add('#year-to').add('#fuel-type').add('#transmission-type').keydown(function (e) {
    e.preventDefault();
    return false;
});

// Select Year from
$('.year-from-li').click( function () {
    var selectedYearFrom = $(this).text();
    $('#year-from').val(selectedYearFrom);
});

// Select Year to
$('.year-to-li').click( function () {
    var selectedYearTo = $(this).text();
    $('#year-to').val(selectedYearTo);
});

// Select transmission type
$('.transmission-type-li').click( function () {
    var selectedTransmissionType = $(this).text();
    $('#transmission-type').val(selectedTransmissionType);
});

// Apply filters
$('#apply-filters').click( function (e) {
    e.preventDefault();

    // Get params
    var carBrandApply = $('#car-brand-filters').val().toLowerCase();
    var currentLink = $(this).attr('href');

    carBrandApply ? $(this).attr('href', currentLink + '&brand=' + carBrandApply) : null;
});

// Auto Page Tabs
$('.auto-tabs__link').click( function (e) {
    e.preventDefault();

    // Remove active class from tabs
    removeActiveTabs();

    // Add active class to clicked tab
    $(this).addClass('active');


    $.ajax({
        type: 'GET',
        url: 'http://localhost:8000/index.php?rest_route=/get_cars/catalog/',
        data: {
            tab: $(this).data('tab')
        },
        dataType: 'json',
        // beforeSend: function() {
        //     $('#model-modal-preloader').fadeIn();
        // },
        success: function(data) {

            var carGallery = '';

            // Clear catalog
            $('#auto-page-catalog').html('');

            // Each Car
            eachAuto(carGallery, data);

            // Init slider after generate items in DOM
            initAutoSlider();
        }
    });

});

// Each auto function
function eachAuto(carGallery, data) {
    $(data).each( function (key,item) {
        carGallery = '';

        // Get gallery items
        function getGallery(gItem) {
            $(item.gallery).each( function (gKey, gItem) {
                carGallery += '<div class="swiper-slide avto__slide">' +
                    '<div class="avto__slide_img" style="background-image: url(' + gItem.guid + ');">' + '</div>' +
                    '</div>';
            });

            return carGallery;
        }

        // Get gallery items
        getGallery(item.gallery);

        // Generate items in DOM
        printAutoItem(item, carGallery);
    });
}

// Init slider after generate items in DOM
function initAutoSlider() {
    $(".avto-swiper-container").each(function(index, element){
        var $this = $(this);
        $this.addClass("instance-" + index);
        $this.find(".avto-swiper-button-prev").addClass("btn-prev-" + index);
        $this.find(".avto-swiper-button-next").addClass("btn-next-" + index);
        var swiperHomeAvto = new Swiper (".instance-" + index, {
            direction: 'horizontal',
            loop: true,
            slidesPerView: 1,

            // Navigation arrows
            navigation: {
                nextEl: ".btn-next-" + index,
                prevEl: ".btn-prev-" + index
            },
            effect: "slide",
            pagination: {
                el: '.avto-swiper-pagination',
                clickable: true
            }
        });
    });
}

// Generate items in DOM
function printAutoItem(item, carGallery) {
    $('#auto-page-catalog').append('' +
        '<article class="popular__avto avto auto-page__auto-item">' +
            '<div class="avto__slider">' +
                '<div class="avto-swiper-container">' +
                    '<div class="swiper-wrapper avto__swiper-wrapper">' +
                    carGallery +
                    '</div>' +
                    '<div class="avto__slider_buttom">' +
                        '<div class="avto-swiper-pagination"></div>' +
                        '<div class="avto-swiper-button-prev"></div>' +
                        '<div class="avto-swiper-button-next"></div>' +
                    '</div>' +
                '</div>' +
            '</div>' +
            '<div class="avto__location_wr">' +
                '<div class="avto__location">' + item.acf["auto-location"].label + '</div>' +
            '</div>' +
        '</article>');
}

// Remove active class from tabs
function removeActiveTabs() {
    $('.auto-tabs__link').each( function () {
        $(this).removeClass('active');
    });
}