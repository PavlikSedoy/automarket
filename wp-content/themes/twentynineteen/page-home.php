<?php
/**
 * Template Name: Home Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */

get_header();
?>

<div class="home-slider">
    <div class="home-slider__slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide home-slider__slide">
                <div class="home-slider__slide-bg">
                    <img src="<?= get_stylesheet_directory_uri() ?>/images/header.jpg" class="home-slider__slide-bg_img">
                </div>
                <div class="home-slider__content_wr">
                    <div class="home-slider__content container">
                        <div class="home-slider__title">
                            <h1>Пригон авто из США под ключ</h1>
                        </div>
                        <div class="home-slider__btn_wr">
                            <a href="/index.php/avto/" class="home-slider__btn">Смотреть Все авто</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide home-slider__slide">
                <div class="home-slider__slide-bg">
                    <img src="<?= get_stylesheet_directory_uri() ?>/images/header2.jpg" class="home-slider__slide-bg_img">
                </div>
            </div>
        </div>

        <div class="home-slider__nav">
            <div class="swiper-button-prev home-slider__prev-btn"></div>
            <div class="swiper-button-next home-slider__next-btn"></div>
        </div>

        <div class="header-slider-pagination"></div>
    </div>

    //  Home Slider Request || Request form
    <div class="home-slider__request request-form">
        <div class="requst__home-title-block request-title">
            <div class="container">
                <div class="request-title__wr">
                    <div class="request-title__logo">
                        <div class="request-title__logo_bg"></div>
                        <img src="<?= get_stylesheet_directory_uri() ?>/images/auto-search-icon.svg">
                    </div>

                    <div class="request-title__content">
                        <h3 class="request-title__title">Найдите <span>Автомобиль мечты</span></h3>
                        <p>Заполните форму и мы подберем для Вас оптимальный вариант</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
