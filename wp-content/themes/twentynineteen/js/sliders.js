// //  Contacts Slider
// var mySwiper = new Swiper ('.contacts__slider', {
//     direction: 'horizontal',
//     loop: true,
//     slidesPerView: 2,
//     autoplay: {
//         delay: 2000
//     }
// });
//  Stop autoplay on Hover
$(".contacts__slider").hover(function(){
    mySwiper.autoplay.stop();
}, function(){
    mySwiper.autoplay.start();
});

//  Home Page Header Slider
var mySwiperHome = new Swiper ('.home-slider__slider', {
    direction: 'horizontal',
    loop: true,
    slidesPerView: 1,
    // autoplay: {
    //     delay: 5000,
    // },

    // Navigation arrows
    navigation: {
        nextEl: '.home-slider__next-btn',
        prevEl: '.home-slider__prev-btn'
    },
    effect: "slide",
    speed: 800,
    pagination: {
        el: '.header-slider-pagination',
        type: 'bullets',
        bulletClass: 'home-slider-pagination-bulet',
        bulletActiveClass: 'home-slider-pagination-bulet__active',
        formatFractionCurrent: function(number) { return number},
        renderBullet: function (index, className) {
            return '<span class="' + className + '">' + '0' + (index + 1) + '</span>';
        },
        clickable: true
    }
});

// Current auto photo slider
var galleryThumbs = new Swiper('.current-avto__gallery-thumbs', {
    spaceBetween: 12,
    slidesPerView: 5,
    freeMode: true,
    watchSlidesVisibility: true,
    watchSlidesProgress: true,
    keyboard: {
        enabled: true,
    }
});
var galleryTop = new Swiper('.current-avto__gallery-top', {
    // effect: 'fade',
    spaceBetween: 0,
    // width: 750,
    navigation: {
        nextEl: '.current-avto__button-next',
        prevEl: '.current-avto__button-prev',
    },
    thumbs: {
        el: '.current-avto__gallery-thumbs',
        swiper: galleryThumbs,
    },
    keyboard: {
        enabled: true,
    }
});

//  Popular Car on HOME PAGE
$(".avto-swiper-container").each(function(index, element){
    var $this = $(this);
    $this.addClass("instance-" + index);
    $this.find(".avto-swiper-button-prev").addClass("btn-prev-" + index);
    $this.find(".avto-swiper-button-next").addClass("btn-next-" + index);
    var swiperHomeAvto = new Swiper (".instance-" + index, {
        direction: 'horizontal',
        loop: true,
        slidesPerView: 1,
        // autoplay: {
        //     delay: 5000,
        // },

        // Navigation arrows
        navigation: {
            nextEl: ".btn-next-" + index,
            prevEl: ".btn-prev-" + index
        },
        effect: "slide",
        // speed: 800,
        pagination: {
            el: '.avto-swiper-pagination',
            // type: 'bullets',
            // bulletClass: 'home-slider-pagination-bulet',
            // bulletActiveClass: 'home-slider-pagination-bulet__active',
            // formatFractionCurrent: function(number) { return number},
            // renderBullet: function (index, className) {
            //     return '<span class="' + className + '">' + '0' + (index + 1) + '</span>';
            // },
            clickable: true
        }
    });
});

// Reviews Sliders
var reviewsThumbs = new Swiper('.reviews__author-comment', {
    spaceBetween: 12,
    slidesPerView: 3,
    // freeMode: true,
    // watchSlidesVisibility: true,
    watchSlidesProgress: true,
    centeredSlides: true,
    allowTouchMove: false,
    keyboard: {
        enabled: true,
    }
});
var reviewsTop = new Swiper('.reviews__current-comment', {
    // effect: 'fade',
    spaceBetween: 0,
    slidesPerView: 1,
    // width: 750,
    navigation: {
        nextEl: '.current-avto__button-next',
        prevEl: '.current-avto__button-prev',
    },
    thumbs: {
        el: '.current-avto__gallery-thumbs',
        swiper: reviewsThumbs,
    },
    keyboard: {
        enabled: true,
    }
});