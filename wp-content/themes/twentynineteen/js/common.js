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
    min: 4000,
    max: 100000,
    from: 10000,
    to: 80000,
    hide_min_max: true,
    postfix: ' $',
    step: 500
});

$("#price-range-req").ionRangeSlider({
    type: "double",
    grid: false,
    min: 4000,
    max: 100000,
    from: 10000,
    to: 80000,
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
                    $('#car-brand-list-ul-request').append('<li class="request-form__li-for-all request-form__brand-item">' + this.brand + '</li>');
                });
            });
        });
});

$('#car-brand-request').focus( function () {
    $('#car-brand-list-request').slideDown();
});

$('#car-brand').focus( function () {
    $('#car-brand-list').slideDown();
});

$('#car-model').focus( function () {
    $('#car-models-list').slideDown();
});

$('#car-model-req').focus( function () {
    $('#car-model-list-request').slideDown();
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
$('#car-brand-request').keyup( function () {
    $('#car-brand-list-ul-request').empty();

    $(gCars).each( function () {
        var brand = this.brand;
        if ( ~brand.toLowerCase().indexOf( $('#car-brand-request').val().toLowerCase() ) ) {
            $('#car-brand-list-ul-request').append('<li class="request-form__li-for-all request-form__brand-item">' + this.brand + '</li>');
        }
    });
});

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
    if (carBrandClass == 'request-form__li-for-all request-form__brand-item') {
        var brandMaker = $(e.target).text();

        $('#car-model-list-ul-request').empty();

        $('#car-model').val('');

        $('#car-brand-request').val(brandMaker);

        var selectedBrand = $('#car-brand-request').val();

        var modelsList;

        // Add Models
        $(gCars).each( function () {

            this.brand == selectedBrand ? gModels = this.models : null;

        });

        $(gModels).each( function () {
            $('#car-model-list-ul-request').append('<li class="request-form__li-for-all request-form__model-item">' + this + '</li>');
        });

        $('#car-brand-list-request').slideUp();
    }

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
    if (carBrandClass == 'request-form__li-for-all request-form__model-item') {
        var modelMaker = $(e.target).text();

        $('#car-model-req').val(modelMaker);

        $('#car-model-list-request').slideUp();
    }

    if (carBrandClass == 'request-form__input-model-list_li') {
        var modelMaker = $(e.target).text();

        $('#car-model').val(modelMaker);

        $('#car-models-list').slideUp();
    }

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

        $('#fuel-type').val(fuelMaker.replace(/\s/g, ''));

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
    $('#car-brand-list-request').slideUp();
    $('#car-model-list-request').slideUp();
    $('#car-location-list').slideUp();
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
$('#car-brand-request').click(function(event){
    event.stopPropagation();
});
$('#car-model-req').click(function(event){
    event.stopPropagation();
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
        type: 'GET',
        url: '/index.php?rest_route=/get_cars/models/',
        dataType: 'json',
        data: {
            brand: selectedBrand,
        },
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
    $('#transmission-type').val(selectedTransmissionType.replace(/\s/g, ''));
});

var round = function(number){
    return +number.toFixed(1);
}

// Apply filters
$('#apply-filters').click( function (e) {
    e.preventDefault();

    // Get params
    var carBrandApply = $('#car-brand-filters').val().toLowerCase();
    var currentLink = $(this).attr('href');

    carBrandApply ? $(this).attr('href', currentLink + '&brand=' + carBrandApply) : null;
});

// Auto Page Tabs
var postsPerPage = 4;
var tab = 'all';
var isLoadMore = false;
var paged = 1;
var carBrand = null;
var carModelField = null;
var carModel = null;
var priceFrom = 10;
var priceTo = 200000;
var yearFrom = 0;
var yearToAuto = 0;
var engineCapacity;
var fuelType = null;
var transmissionType = null;


// User Language
var userLanguage = $('#language').val();

$('.auto-tabs__link').click( function (e) {
    e.preventDefault();

    // Remove active class from tabs
    removeActiveTabs();

    // Reset page count
    paged = 1;

    // Add active class to clicked tab
    $(this).addClass('active');

    tab = $(this).data('tab');

    carBrand = null;
    carModelField = null;
    carModel = null;
    priceFrom = 0;
    priceTo = 200000;
    yearFrom = 0;
    yearToAuto = 0;
    engineCapacity = 0;
    fuelType = null;
    transmissionType = null;

    // AJAX request who get auto items
    ajaxGetAutoItems(userLanguage, tab, postsPerPage, null, null, null, null, null, priceFrom, priceTo, yearFrom, yearToAuto, engineCapacity, null, null);

    // Fade In More Button
    $('#load-more-auto').fadeIn();

    // Clear filter inputs
    $('.auto-page__input').each( function () {
        $(this).val('');
    });
});

// Filters
$('#apply-filters').click( function () {
    // Reset page count
    paged = 1;

    carBrand = $('#car-brand-filters').val();
    carModelField = 'car-' + carBrand.toLowerCase();
    carModel = $('#car-model-filters').val();
    priceFrom = $('#price-range-wr .irs-from').text();
    priceFrom = parseInt(priceFrom.replace(/[^0-9.]/g, ""));
    priceTo = $('#price-range-wr .irs-to').text();
    priceTo = parseInt(priceTo.replace(/[^0-9.]/g, ""));
    yearFrom = $('#year-from').val();
    yearFrom = parseInt(yearFrom);
    yearToAuto = $('#year-to').val();
    yearToAuto = parseInt(yearToAuto);
    engineCapacity = $('#engine-capacity').val();
    fuelType = $('#fuel-type').val();
    transmissionType = $('#transmission-type').val();

    fuelType = fuelType == 'Diesel' ? 'Дизель' : fuelType;
    fuelType = fuelType == 'Gasolene' ? 'Бензин' : fuelType;
    fuelType = fuelType == 'დიზელისძრავა' ? 'Бензин' : fuelType;
    fuelType = fuelType == 'ბენზინი' ? 'Бензин' : fuelType;

    transmissionType = transmissionType == 'Automatic' ? 'Автомат' : transmissionType;
    transmissionType = transmissionType == 'Manual' ? 'Механика' : transmissionType;
    transmissionType = transmissionType == 'Automatic' ? 'ავტომატური' : transmissionType;
    transmissionType = transmissionType == 'Manual' ? 'მექანიკური' : transmissionType;

    // Fade In More Button
    $('#load-more-auto').fadeIn();

    ajaxGetAutoItems(userLanguage, tab, postsPerPage, paged, null, carBrand, carModelField, carModel, priceFrom, priceTo, yearFrom, yearToAuto, engineCapacity, fuelType, transmissionType);
});

// More Auto Button
$('#load-more-auto').click( function () {
    paged++;
    ajaxGetAutoItems(userLanguage, tab, postsPerPage, paged, true, carBrand, carModelField, carModel, priceFrom, priceTo, yearFrom, yearToAuto, engineCapacity, fuelType, transmissionType);
});

// AJAX request who get auto items
function ajaxGetAutoItems(userLanguage, tab, postsPerPage, paged, isLoadMore, carBrand, carModelField, carModel, priceFrom, priceTo, yearFrom, yearToAuto, engineCapacity, fuelType, transmissionType) {
    $.ajax({
        type: 'GET',
        url: '/index.php?rest_route=/get_cars/catalog/',
        data: {
            lang: userLanguage,
            tab: tab,
            posts_per_page: postsPerPage,
            paged: paged,
            car_brand: carBrand,
            car_model_field: carModelField,
            car_model: carModel,
            price_from: priceFrom,
            price_to: priceTo,
            year_from: yearFrom,
            year_to: yearToAuto,
            engine_capacity: engineCapacity,
            fuel_type: fuelType,
            transmission_type: transmissionType
        },
        dataType: 'json',
        // beforeSend: function() {
        //     $('#model-modal-preloader').fadeIn();
        // },
        success: function(data) {

            var carGallery = '';

            // Clear catalog
            if (!isLoadMore) $('#auto-page-catalog').html('');

            // Each Car
            eachAuto(carGallery, data);

            // Init slider after generate items in DOM
            initAutoSlider();

            // Hide Loade More Button when count of post < post per page
            data.length < postsPerPage ? $('#load-more-auto').fadeOut() : null;
        }
    });
}

// Each auto function
function eachAuto(carGallery, data, paged) {
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

function getAutoModel(item) {
    var carBrand = item.acf["car-brand"].value.toLowerCase();
    var carModelFieldName = 'car-' + carBrand;
    var carModel = item.acf[carModelFieldName];

    return carModel;
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
    var location = item.acf["auto-location"].label,
        fuelType = item.acf["current-auto-fuel-type"],
        litersLabel = 'л',
        moreBtnText = 'Подробнее',
        coastInUrkaine = 'Стоимость аналога в Украине';

    if (userLanguage == 'en_US') {
        location = location == 'В Америке' ? 'In USA' : location;
        location = location == 'В Грузии' ? 'In Georgia' : location;
        location = location == 'В Украине' ? 'In Ukraine' : location;
        location = location == 'В пути' ? 'In road' : location;
        litersLabel = 'L';
        fuelType = fuelType == 'Бензин' ? 'Gasolene' : fuelType;
        fuelType = fuelType == 'Дизель' ? 'Diesel' : fuelType;
        fuelType = fuelType == 'Электро' ? 'Electro' : fuelType;
        fuelType = fuelType == 'Гибрид' ? 'Hybrid' : fuelType;
        moreBtnText = 'More info';
        coastInUrkaine = 'Analogue price in Ukraine';
    } else if (userLanguage == 'ka_GE') {
        location = location == 'В Америке' ? 'ამერიკაში' : location;
        location = location == 'В Грузии' ? 'საქართველოში' : location;
        location = location == 'В Украине' ? 'უკრაინაში' : location;
        location = location == 'В пути' ? 'გზად' : location;
        litersLabel = 'ლ';
        fuelType = fuelType == 'Бензин' ? 'ბენზინი' : fuelType;
        fuelType = fuelType == 'Дизель' ? 'დიზელის ძრავა' : fuelType;
        fuelType = fuelType == 'Электро' ? 'ელექტრო' : fuelType;
        fuelType = fuelType == 'Гибрид' ? 'ჰიბრიდი' : fuelType;
        moreBtnText = 'დეტალურად';
        coastInUrkaine = 'ანალოგის ღირებულება უკრაინაში';
    }

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
                '<div class="avto__location">' + location + '</div>' +
            '</div>' +
            '<div class="avto__props">' +
                '<div class="avto__props_year">' +
                    '<img src="/wp-content/themes/twentynineteen/images/1home-page-icons/auto-card-icons/calendar-icon.svg" class="avto__props_img">' +
                    '<span class="avto__props_text">' + item.acf["current-auto-year"] + '</span>' +
                '</div>' +
                '<div class="avto__props_engine-capacity">' +
                    '<img src="/wp-content/themes/twentynineteen/images/1home-page-icons/auto-card-icons/engine-icon.svg" class="avto__props_img">' +
                    '<span class="avto__props_text">' + round(item.acf["current-auto-engine-capacity"]/1000) + ' ' + litersLabel + '</span>' +
                '</div>' +
                '<div class="avto__props_fuel-type">' +
                    '<img src="/wp-content/themes/twentynineteen/images/1home-page-icons/auto-card-icons/fuel-icon.svg" class="avto__props_img">' +
                    '<span class="avto__props_text">' + fuelType + '</span>' +
                '</div>' +
            '</div>' +
            '<div class="avto__title-wr">' +
                '<h4 class="avto__title">' + item.acf["car-brand"].value + ' ' + getAutoModel(item) + '</h4>' +
            '</div>' +
            '<div class="avto__price-details">' +
                '<a href="' + item.link + '" class="btn btn__width_180 btn__color_transparent btn__fz_15">' + moreBtnText + '</a>' +
                '<div class="avto__price">' + '$ ' + item.acf["current-auto-price"] + '</div>' +
            '</div>' +
            '<div class="avto__footer">' +
                '<span class="avto__footer_price">' + '$ ' + item.acf["current-auto-price-in-ukraine"] + '</span>' +
                '<span class="avto__footer_text">' + coastInUrkaine + '</span>' +
            '</div>' +
        '</article>');
}

// Remove active class from tabs
function removeActiveTabs() {
    $('.auto-tabs__link').each( function () {
        $(this).removeClass('active');
    });
}

// Hamburger menu
var hamburger = $(".hamburger");

$(hamburger).click(function() {
    $(this).toggleClass("is-active");
    $('body').toggleClass('noScroll');
    $('#mobile-nav').add('.menu__wr').fadeToggle(300);
});

// Home page request
$('#request-mobile-button').click( function () {
    $('#home-request-form').slideDown();
});

$('#request-form-mobile-close').click( function () {
    $('#home-request-form').slideUp();
});

// Home Page Calculator
$('#calculator-get-price').click( function (e) {
    e.preventDefault();

    var calculatorUserAutoPrice = $('#calculator-price').val(),
        calculatorUserAutoCapacity = $('#calculator-capacity').val(),
        calculatorFuelType = $('#fuel-type').val(),
        calculatorOld = $('#car-old').val();

    calculatorUserAutoCapacity = round(calculatorUserAutoCapacity/1000);
    calculatorOld = parseInt(calculatorOld);
    calculatorUserAutoPrice = parseInt(calculatorUserAutoPrice);

    if ( calculatorFuelType == 'Gasoline(GAS)' || calculatorFuelType == 'ბენზინი' ) calculatorFuelType = 'Бензин';
    if ( calculatorFuelType == 'Diesel' || calculatorFuelType == 'დიზელი' ) calculatorFuelType = 'Дизель';

    // Capacity Kof
    var capacityKof;

    if ( calculatorUserAutoCapacity < 3 && calculatorFuelType == 'Бензин' ) capacityKof = 50;
    else if ( calculatorUserAutoCapacity >= 3 && calculatorFuelType == 'Бензин' ) capacityKof = 100;
    else if ( calculatorUserAutoCapacity < 3 && calculatorFuelType == 'Дизель' ) capacityKof = 75;
    else if ( calculatorUserAutoCapacity >= 3 && calculatorFuelType == 'Дизель' ) capacityKof = 150;

    // Axcise
    var axcise = calculatorUserAutoCapacity * calculatorOld * capacityKof;

    // NDS
    var nds = ( calculatorUserAutoPrice + axcise ) / 3;
    nds = round(nds);

    // Price
    var calculatorFullPrice = axcise + nds;

    $('#calculator-full-price').text(calculatorFullPrice);
});

// Show/Hide Auto Filters
$('#auto-page-filters').click(function () {
    if ($(window).width() < 1199) {
        $('.auto-page__filters-form').slideToggle();
        $('#open-auto-filters-arrow').toggleClass('active');
    }
});

// Send Request Mail
$('#send-request-mail').add('#footer-request').add('#submit-request-bottom-form').add('#submit-logistic-request').add('#contact-request-form').click( function (e) {
    e.preventDefault();

    $('#home-request-form').fadeOut();
    $('#request-is-send').fadeIn();
    setTimeout( function () {
        $('#request-is-send').fadeOut();
    }, 3000);
});

// Maersk container search
$('#maersk-container-btn').click( function (e) {
    e.preventDefault();

    window.open("https://www.maersk.com/tracking/#tracking/"+$('#maersk-container').val())
});

// LOGISTIC CALCULATOR
// On input focus
$('#auction').focus( function () {
    $('#auction-list-block').slideDown();
});
$('#logistic-city').focus( function () {
    $('#city-list-block').slideDown();
});
$('#port-from').focus( function () {
    $('#port-from-list-block').slideDown();
});
$('#port-to').focus( function () {
    $('#port-to-list-block').slideDown();
});

// On input focusout
$('#auction').focusout( function () {
    $('#auction-list-block').slideUp();
});
$('#logistic-city').focusout( function () {
    $('#city-list-block').slideUp();
});
$('#port-from').focusout( function () {
    $('#port-from-list-block').slideUp();
});
$('#port-to').focusout( function () {
    $('#port-to-list-block').slideUp();
});

// On item click
$(document).click( function (e) {
    var clickedItemClass = $(e.target).attr('class'),
        clickedItemText;

    // Auction
    if (clickedItemClass == 'aside-order__input-list_li auction') {
        clickedItemText = $(e.target).text();

        $('#auction').val(clickedItemText);

        var auction = $('#auction').val();

        // Clear lists
        $('#city-list-ul').empty();
        $('#port-from-list-ul').empty();
        $('#port-to-list-ul').empty();

        // Clear inputs
        $('#logistic-city').val('');
        $('#port-from').val('');
        $('#port-to').val('');

        logisticClearPricing();

        getLogisticCity(auction);

        $('#logistic-city').parent().addClass('active');
        $('#port-from').parent().removeClass('active');
        $('#port-to').parent().removeClass('active');
    }

    // City
    else if (clickedItemClass == 'aside-order__input-list_li city') {
        clickedItemText = $(e.target).text();

        $('#logistic-city').val(clickedItemText);

        // Clear lists
        $('#port-from-list-ul').empty();
        $('#port-to-list-ul').empty();

        // Clear inputs
        $('#port-from').val('');
        $('#port-to').val('');

        var auction = $('#auction').val(),
            city = $('#logistic-city').val();

        city = city.replace(' ', '_');

        logisticClearPricing();

        getPortFrom(auction, city);

        $('#port-from').parent().addClass('active');
        $('#port-to').parent().removeClass('active');
    }

    // Port From
    else if (clickedItemClass == 'aside-order__input-list_li port-from') {
        clickedItemText = $(e.target).text();

        $('#port-from').val(clickedItemText);

        // Clear lists
        $('#port-to-list-ul').empty();

        // Clear inputs
        $('#port-to').val('');

        var auction = $('#auction').val(),
            city = $('#logistic-city').val(),
            portFrom = $('#port-from').val();

        city = city.replace(' ', '_');

        logisticClearPricing();

        getPortTo(auction, city, portFrom);

        $('#port-to').parent().addClass('active');
    }

    // Port To
    else if (clickedItemClass == 'aside-order__input-list_li port-to') {
        clickedItemText = $(e.target).text();

        $('#port-to').val(clickedItemText);

        var auction = $('#auction').val(),
            city = $('#logistic-city').val(),
            portFrom = $('#port-from').val(),
            portTo = $('#port-to').val();

        city = city.replace(' ', '_');

        getPrice(auction, city, portFrom, portTo);
    }
});

// Clear pricing
function logisticClearPricing() {
    $('.logistic__price-wr').each( function () {
        $(this).removeClass('active');
    });

    $('#price-fort-from').text('0$');
    $('#price-ocean').text('0$');
    $('#price-fort-to').text('0$');
}

// Calculate Price
$('#logistic-calculate').click( function (e) {
    e.preventDefault();

    var auction = $('#auction').val(),
        city = $('#logistic-city').val(),
        portFrom = $('#port-from').val(),
        portTo = $('#port-to').val();

    city = city.replace(' ', '_');

    getPrice(auction, city, portFrom, portTo);
});

// Get Price
function getPrice(auction, city, portFrom, portTo) {
    $.ajax({
        type: 'GET',
        url: '/index.php?rest_route=/logistic/price/',
        data: {
            auction: auction,
            city: city,
            port_from: portFrom,
            port_to: portTo
        },
        dataType: 'json',
        success: function(data) {
            var firstPrice = parseInt(data[0].first_price),
                secondPrice = parseInt(data[0].second_price),
                finalPrice = firstPrice + secondPrice;

            $('#price-fort-from').text(firstPrice + '$');
            $('#price-ocean').text(secondPrice + '$');
            $('#price-fort-to').text(finalPrice + '$');

            $('#price-fort-from').parent().addClass('active');
            $('#price-ocean').parent().addClass('active');
            $('#price-fort-to').parent().addClass('active');
        }
    });
}

// Get Port To
function getPortTo(auction, city, portFrom) {
    $.ajax({
        type: 'GET',
        url: '/index.php?rest_route=/logistic/port-to/',
        data: {
            auction: auction,
            city: city,
            port_from: portFrom
        },
        dataType: 'json',
        success: function(data) {
            $(data).each( function (key, val) {
                $('#port-to-list-ul').append('<li class="aside-order__input-list_li port-to">' + val.port_to + '</li>');
            });
            if (data.length < 4) {
                $('#port-to-list-ul').append('<li class="aside-order__input-list_li empty">Empty</li>');
                $('#port-to-list-ul').append('<li class="aside-order__input-list_li empty">Empty</li>');
                $('#port-to-list-ul').append('<li class="aside-order__input-list_li empty">Empty</li>');
            }
        }
    });
}

// Get Ports From
function getPortFrom(auction, city) {
    $.ajax({
        type: 'GET',
        url: '/index.php?rest_route=/logistic/port-from/',
        data: {
            auction: auction,
            city: city
        },
        dataType: 'json',
        success: function(data) {
            // console.log(data);
            $(data).each( function (key, val) {
                $('#port-from-list-ul').append('<li class="aside-order__input-list_li port-from">' + val.port_from + '</li>');
            });
            if (data.length < 4) {
                $('#port-from-list-ul').append('<li class="aside-order__input-list_li empty">Empty</li>');
                $('#port-from-list-ul').append('<li class="aside-order__input-list_li empty">Empty</li>');
                $('#port-from-list-ul').append('<li class="aside-order__input-list_li empty">Empty</li>');
            }
        }
    });
}

// Get City List
function getLogisticCity(clickedItemText) {
    $.ajax({
        type: 'GET',
        url: '/index.php?rest_route=/logistic/city/',
        data: {
            auction: clickedItemText
        },
        dataType: 'json',
        success: function(data) {
            $(data).each( function (key, val) {
                $('#city-list-ul').append('<li class="aside-order__input-list_li city">' + val.replace('_', ' ') + '</li>');
            });
            if (data.length < 4) {
                $('#city-list-ul').append('<li class="aside-order__input-list_li empty">Empty</li>');
                $('#city-list-ul').append('<li class="aside-order__input-list_li empty">Empty</li>');
                $('#city-list-ul').append('<li class="aside-order__input-list_li empty">Empty</li>');
            }
        }
    });
}

// Logistic Map
function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 3,
        center: {lat: 0, lng: -180},
        mapTypeId: 'terrain'
    });

    var flightPlanCoordinates = [
        {lat: 37.772, lng: -122.214},
        {lat: 21.291, lng: -157.821},
        {lat: -18.142, lng: 178.431},
        {lat: -27.467, lng: 153.027}
    ];
    var flightPath = new google.maps.Polyline({
        path: flightPlanCoordinates,
        geodesic: true,
        strokeColor: '#FF0000',
        strokeOpacity: 1.0,
        strokeWeight: 2
    });

    flightPath.setMap(map);
}

initMap();