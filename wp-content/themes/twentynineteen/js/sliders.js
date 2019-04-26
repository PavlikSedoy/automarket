//  Contacts Slider
var mySwiper = new Swiper ('.contacts__slider', {
    direction: 'horizontal',
    loop: true,
    slidesPerView: 2,
    autoplay: {
        delay: 2000,
    }
});
//  Stop autoplay on Hover
$(".contacts__slider").hover(function(){
    mySwiper.autoplay.stop();
}, function(){
    mySwiper.autoplay.start();
});

//  Home Page Header Slider
var mySwiper = new Swiper ('.home-slider__slider', {
    direction: 'horizontal',
    loop: true,
    slidesPerView: 1,
    // autoplay: {
    //     delay: 5000,
    // },

    // Navigation arrows
    navigation: {
        nextEl: '.home-slider__next-btn',
        prevEl: '.home-slider__prev-btn',
    },
    effect: "slide",
    speed: 800,
    pagination: {
        el: '.header-slider-pagination',
        type: 'bullets',
        formatFractionCurrent: function(number) { return number},
        renderBullet: function (index, className) {
            return '<span class="' + className + '">' + (index + 1) + '</span>';
        }
    }
});