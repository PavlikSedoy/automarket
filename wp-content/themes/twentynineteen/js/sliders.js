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