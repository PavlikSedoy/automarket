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

// $('.request-form__input-list_li').click( function (e) {
//     var carBrand = this.text();
//     console.log(e.target);
// });

$(document).click( function (e) {
    var carBrandClass = $(e.target).attr('class');
    // console.log(carBrandClass);

    if (carBrandClass == 'request-form__input-list_li') {

        var brandMaker = $(e.target).text();

        $('#car-brand').val(brandMaker);
        // console.log(brandMaker);
    }
})