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
            <div class="swiper-slide home-slider__slide">
                <div class="home-slider__slide-bg">
                    <img src="<?= get_stylesheet_directory_uri() ?>/images/header3.jpg" class="home-slider__slide-bg_img">
                </div>
            </div>
        </div>

        <div class="home-slider__nav">
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>

        <div class="header-slider-pagination"></div>
    </div>
</div>

<?php
get_footer();
