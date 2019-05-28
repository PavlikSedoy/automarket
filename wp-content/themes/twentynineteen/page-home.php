<?php
/**
 * Template Name: Home Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */

get_header();
?>

<section class="home-slider">
    <div class="home-slider__slider">
        <div class="swiper-wrapper">

            <!--  Slides  -->
            <?php
                $args = array(
                    'post_type' => 'home-slider',
                    'order' => 'ASC',
                );
                $loop = new WP_Query($args);
                while ($loop->have_posts()) : $loop->the_post();
                $btn_link = get_field('home-slider-btn-link', $post->ID);
            ?>
            <div class="swiper-slide home-slider__slide" data-background="<?= get_the_post_thumbnail_url() ?>">
                <div class="home-slider__slide-bg">
                    <img src="<?= get_the_post_thumbnail_url() ?>" class="home-slider__slide-bg_img">
                </div>
                <div class="home-slider__content_wr">
                    <div class="home-slider__content container">
                        <div class="home-slider__title">
                            <h1><?= the_title() ?></h1>
                        </div>
                        <div class="home-slider__btn_wr">
                            <a href="<?= $btn_link['url'] ?>" class="home-slider__btn"><?= get_field('home-slider-btn-text', $post->ID) ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                endwhile;
                wp_reset_query();
            ?>

        </div>

        <div class="home-slider__nav">
            <div class="swiper-button-prev home-slider__prev-btn"></div>
            <div class="swiper-button-next home-slider__next-btn"></div>
        </div>

        <div class="home-slider__pagination">
            <div class="header-slider-pagination"></div>
        </div>
    </div>

    <!--  Home Slider Request || Request form -->
    <div class="home-slider__request request-form" id="home-request-form">
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
        
        <div class="container request-form__container">
            <form action="" class="request-form__form">

                <div class="request-form__header">
                    <div class="request-form__mobile-title">Подбор авто</div>
                    <div class="request-form__mobile-close close" id="request-form-mobile-close"></div>
                </div>
                <!-- /.request-form__header -->

                <div class="request-form__items-wr">

                    <!-- Row -->
<!--                    <div class="request-form__items-row">-->
                        <div class="request-form__input-wr request-form__brand">
                            <input type="text" class="request-form__input" placeholder="Марка" id="car-brand">
                            <div class="request-form__img">
                                <img src="<?= get_stylesheet_directory_uri() ?>/images/1home-page-icons/car-search-icons/car-name-icon.svg">
                            </div>
                            <div class="request-form__arrow-img">
                                <svg width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.99999 5L-4.37114e-07 -7.94466e-08L10 -9.53674e-07L4.99999 5Z" fill="white"/>
                                </svg>
                            </div>

                            <div class="request-form__input-list" id="car-brand-list">
                                <ul class="request-form__input-list_ul" id="car-brand-list-ul">
                                </ul>
                            </div>
                        </div>

                        <div class="request-form__input-wr request-form__model">
                            <input type="text" class="request-form__input" placeholder="Модель" id="car-model">
                            <div class="request-form__img">
                                <img src="<?= get_stylesheet_directory_uri() ?>/images/1home-page-icons/car-search-icons/model-icon.svg">
                            </div>
                            <div class="request-form__arrow-img">
                                <svg width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.99999 5L-4.37114e-07 -7.94466e-08L10 -9.53674e-07L4.99999 5Z" fill="white"/>
                                </svg>
                            </div>

                            <div class="request-form__input-model-list" id="car-models-list">
                                <ul class="request-form__input-model-list_ul" id="car-models-list-ul">
                                </ul>
                            </div>
                        </div>

                        <div class="request-form__input-wr request-form__location">
                            <input type="text" class="request-form__input" placeholder="Местоположение" id="car-location">
                            <div class="request-form__img">
                                <img src="<?= get_stylesheet_directory_uri() ?>/images/1home-page-icons/car-search-icons/location-icon.svg">
                            </div>
                            <div class="request-form__arrow-img">
                                <svg width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.99999 5L-4.37114e-07 -7.94466e-08L10 -9.53674e-07L4.99999 5Z" fill="white"/>
                                </svg>
                            </div>

                            <div class="request-form__input-location-list" id="car-location-list">
                                <ul class="request-form__input-location-list_ul" id="car-models-list-ul">
                                    <li class="request-form__input-location-list_li">В Украине</li>
                                    <li class="request-form__input-location-list_li">В Америке</li>
                                    <li class="request-form__input-location-list_li">В Грузии</li>
                                </ul>
                            </div>
                        </div>

                        <div class="request-form__range-wr request-form__old">
                            <input id="year-range" type="text" class="js-range-slider" name="my_range" value="" />
                        </div>
<!--                    </div>-->

                    <!-- Row -->
<!--                    <div class="request-form__items-row">-->
                        <div class="request-form__input-wr request-form__name">
                            <input type="text" class="request-form__input" placeholder="Имя">
                            <div class="request-form__img">
                                <img src="<?= get_stylesheet_directory_uri() ?>/images/1home-page-icons/car-search-icons/name-icon.svg">
                            </div>
                        </div>

                        <div class="request-form__input-wr request-form__phone">
                            <input type="text" class="request-form__input" placeholder="Телефон">
                            <div class="request-form__img">
                                <img src="<?= get_stylesheet_directory_uri() ?>/images/1home-page-icons/car-search-icons/phone-icon-icon.svg">
                            </div>
                        </div>

                        <div class="request-form__input-wr request-form__email">
                            <input type="text" class="request-form__input" placeholder="E-mail">
                            <div class="request-form__img">
                                <img src="<?= get_stylesheet_directory_uri() ?>/images/3auto-page-icons/email-icon.svg" alt="">
                            </div>
                        </div>

                        <div class="request-form__range-wr request-form__price">
                            <input id="price-range" type="text" class="js-range-slider" name="my_range" value="" />
                        </div>
<!--                    </div>-->
                    
                </div>

                <div class="request-form__btn-wr">
                    <button class="btn btn__width_265 btn__height_50 btn__color_blue" id="send-request-mail">Подобрать авто</button>
                </div>
                
            </form>
        </div>
    </div>
</section>

<!-- Request button tablet -->
<div class="request-mobile-button" id="request-mobile-button">
    Подобрать авто
</div>

<!-- Popular Auto Section -->
<section class="popular">
    <div class="container popular__container">
        <div class="popular__title_wr">
            <img src="<?= get_stylesheet_directory_uri() ?>/images/h2-icons/popular-icon.svg" class="popular__h2-img">
            <h2 class="popular__title section-title">Популярные <span>авто</span></h2>
        </div>

        <!-- Avto Block -->
        <div class="popular__avto_wr">

            <?php
                $args = array(
                    'post_type' => 'avto',
                    'order' => 'DESC',
                    'meta_key' => 'current-auto-popular',
                    'meta_value' => true,
                    'posts_per_page' => 6
                );
                $loop = new WP_Query($args);
                while ($loop->have_posts()) : $loop->the_post();
            ?>
            <!-- Items -->
            <article class="popular__avto avto">

                <!-- Slider Wrap & slider -->
                <div class="avto__slider">
                    <!-- Slider main container -->
                    <div class="avto-swiper-container">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper avto__swiper-wrapper">

                            <?php foreach ( get_post_meta($post->ID, 'avto-photos') as $img ) : ?>
                                <!-- Slides -->
                                <div class="swiper-slide avto__slide">
                                    <div class="avto__slide_img" style="background-image: url(<?= $img['guid'] ?>);">
                                    </div>
                                </div>
                            <?php endforeach ?>

                        </div>
                        <div class="avto__slider_buttom">
                            <!-- If we need pagination -->
                            <div class="avto-swiper-pagination"></div>

                            <!-- If we need navigation buttons -->
                            <div class="avto-swiper-button-prev"></div>
                            <div class="avto-swiper-button-next"></div>
                        </div>
                    </div>
                </div>

                <div class="avto__location_wr">
                    <div class="avto__location"><?= get_field('auto-location', $post->ID)['label'] ?></div>
                </div>

                <div class="avto__props">
                    <div class="avto__props_year">
                        <img src="<?= get_stylesheet_directory_uri() ?>/images/1home-page-icons/auto-card-icons/calendar-icon.svg" class="avto__props_img">
                        <span class="avto__props_text">
                            <?= get_field('current-auto-year', $post->ID) ?>
                        </span>
                    </div>

                    <div class="avto__props_engine-capacity">
                        <img src="<?= get_stylesheet_directory_uri() ?>/images/1home-page-icons/auto-card-icons/engine-icon.svg" class="avto__props_img">
                        <span class="avto__props_text">
                            <?= number_format(get_field('current-auto-engine-capacity', $post->ID)/1000, 1, '.', ''); ?> л
                        </span>
                    </div>

                    <div class="avto__props_fuel-type">
                        <img src="<?= get_stylesheet_directory_uri() ?>/images/1home-page-icons/auto-card-icons/fuel-icon.svg" class="avto__props_img">
                        <span class="avto__props_text">
                            <?= get_field('current-auto-fuel-type', $post->ID) ?>
                        </span>
                    </div>
                </div>

                <div class="avto__title-wr">
                    <h4 class="avto__title">
                        <?php
                            // Car Brand
                            $car_brand = get_field('car-brand', $post->ID);
                            echo $car_brand['value'];
                        ?> <?php
                            // Car Model
                            $car_model_name = 'car-' . strtolower($car_brand['label']);
                            echo get_field($car_model_name, $post->ID);
                        ?>
                    </h4>
                </div>

                <div class="avto__price-details">
                    <a href="<?= get_page_link() ?>" class="btn btn__width_180 btn__color_transparent btn__fz_15">Подробнее</a>

                    <div class="avto__price">
                        $ <?= get_field('current-auto-price', $post->ID) ?>
                    </div>
                </div>

                <div class="avto__footer">
                    <span class="avto__footer_price">
                        $ <?= get_field('current-auto-price-in-ukraine', $post->ID) ?>
                    </span>
                    <span class="avto__footer_text">Стоимость аналога в Украине</span>
                </div>
            </article>
            <?php
                endwhile;
                wp_reset_query();
            ?>

        </div>

        <div class="popular__all-auto">
            <a href="/index.php/avto/" class="btn btn__width_265 btn__color_blue">Смотреть Все авто</a>
        </div>

    </div>
</section>
<!-- /.popular -->

<!-- Calculator Section -->
<section class="calculator">
    <div class="container calculator__container">
        <!-- Title -->
        <div class="how-work__title_wr">
            <img src="<?= get_stylesheet_directory_uri() ?>/images/h2-icons/calculate-icon.svg" class="how-work__h2-img">
            <h2 class="how-work__title section-title calculator__title">Калькулятор <span>растаможки</span></h2>
        </div>

        <!-- Tabs -->
        <div class="calculator__tabs tabs">
            <div class="tabs__header left-active">
                <div class="tabs__header_item" data-tab="desc"><span class="xs-none">Растаможка</span> в украине</div>
                <div class="tabs__header_item" data-tab="equipment"><span class="xs-none">Растаможка</span> в грузии</div>
            </div>

            <!-- Tabs Wrapper -->
            <div class="tabs__tabs-wr">
                <!-- Ukraine Tab -->
                <div class="tabs__tab active" id="desc-tab">

                    <form action="" class="calculator__inputs-form">

                        <div class="calculator__inputs-wr">

                            <div class="request-form__input-wr">
                                <input type="number" class="request-form__input" placeholder="Стоимость" id="calculator-price">
                                <div class="request-form__img">
                                    <img src="<?= get_stylesheet_directory_uri() ?>/images/1home-page-icons/car-search-icons/car-name-icon.svg">
                                </div>

                                <div class="request-form__usd-mark">
                                    USD
                                </div>
                            </div>

                            <div class="request-form__input-wr">
                                <input type="number" class="request-form__input" placeholder="Объем" id="calculator-capacity">
                                <div class="request-form__img">
                                    <img src="<?= get_stylesheet_directory_uri() ?>/images/1home-page-icons/calculator-block/engine-icon.svg">
                                </div>

                                <div class="request-form__usd-mark">
                                     см.куб.
                                </div>
                            </div>

                            <div class="request-form__input-wr">
                                <input type="text" class="request-form__input" placeholder="Тип топлива" id="fuel-type">
                                <div class="request-form__img">
                                    <img src="<?= get_stylesheet_directory_uri() ?>/images/1home-page-icons/calculator-block/fuel-icon.svg" alt="">
                                </div>

                                <div class="request-form__arrow-img">
                                    <svg width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.99999 5L-4.37114e-07 -7.94466e-08L10 -9.53674e-07L4.99999 5Z" fill="white"/>
                                    </svg>
                                </div>

                                <div class="request-form__input-fuel-list" id="car-fuel-list">
                                    <ul class="request-form__input-fuel-list_ul" id="car-fuel-list-ul">
                                        <li class="request-form__input-fuel-list_li">Бензин</li>
                                        <li class="request-form__input-fuel-list_li">Дизель</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="request-form__input-wr">
                                <input type="text" class="request-form__input" placeholder="Возраст" id="car-old">
                                <div class="request-form__img">
                                    <img src="<?= get_stylesheet_directory_uri() ?>/images/1home-page-icons/calculator-block/calendar-icon.svg" alt="">
                                </div>

                                <div class="request-form__arrow-img">
                                    <svg width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.99999 5L-4.37114e-07 -7.94466e-08L10 -9.53674e-07L4.99999 5Z" fill="white"/>
                                    </svg>
                                </div>

                                <div class="request-form__input-old-list" id="car-old-list">
                                    <ul class="request-form__input-old-list_ul" id="car-old-list-ul">
                                        <li class="request-form__input-old-list_li">1</li>
                                        <li class="request-form__input-old-list_li">2</li>
                                        <li class="request-form__input-old-list_li">3</li>
                                        <li class="request-form__input-old-list_li">4</li>
                                        <li class="request-form__input-old-list_li">5</li>
                                        <li class="request-form__input-old-list_li">6</li>
                                        <li class="request-form__input-old-list_li">7</li>
                                        <li class="request-form__input-old-list_li">8</li>
                                        <li class="request-form__input-old-list_li">9</li>
                                        <li class="request-form__input-old-list_li">10</li>
                                        <li class="request-form__input-old-list_li">11</li>
                                        <li class="request-form__input-old-list_li">12</li>
                                        <li class="request-form__input-old-list_li">13</li>
                                        <li class="request-form__input-old-list_li">14</li>
                                        <li class="request-form__input-old-list_li">15</li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                        <div class="calculator__calculate-btn_wr">
                            <button class="calculator__btn btn btn__fz_15 btn__color_blue btn__width_265 btn__height_50" id="calculator-get-price">Рассчитать</button>
                        </div>

                        <span class="calculator__price">$ <span id="calculator-full-price">0</span></span>

                    </form>

                </div>

                <!-- Georgia Tab -->
                <div class="tabs__tab" id="equipment-tab">

                    <form action="" class="calculator__inputs-form">

                        <div class="calculator__inputs-wr calculator__inputs-wr_georgia">


                            <div class="request-form__input-wr">
                                <input type="text" class="request-form__input" placeholder="Объем">
                                <div class="request-form__img">
                                    <img src="<?= get_stylesheet_directory_uri() ?>/images/1home-page-icons/calculator-block/engine-icon.svg">
                                </div>

                                <div class="request-form__usd-mark">
                                    см.куб.
                                </div>
                            </div>

                            <div class="request-form__input-wr">
                                <input type="text" class="request-form__input" placeholder="Возраст" id="car-old">
                                <div class="request-form__img">
                                    <img src="<?= get_stylesheet_directory_uri() ?>/images/1home-page-icons/calculator-block/calendar-icon.svg" alt="">
                                </div>

                                <div class="request-form__arrow-img">
                                    <svg width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.99999 5L-4.37114e-07 -7.94466e-08L10 -9.53674e-07L4.99999 5Z" fill="white"/>
                                    </svg>
                                </div>

                                <div class="request-form__input-old-list" id="car-old-list">
                                    <ul class="request-form__input-old-list_ul" id="car-old-list-ul">
                                        <li class="request-form__input-old-list_li">1</li>
                                        <li class="request-form__input-old-list_li">2</li>
                                        <li class="request-form__input-old-list_li">3</li>
                                        <li class="request-form__input-old-list_li">4</li>
                                        <li class="request-form__input-old-list_li">5</li>
                                        <li class="request-form__input-old-list_li">6</li>
                                        <li class="request-form__input-old-list_li">7</li>
                                        <li class="request-form__input-old-list_li">8</li>
                                        <li class="request-form__input-old-list_li">9</li>
                                        <li class="request-form__input-old-list_li">10</li>
                                        <li class="request-form__input-old-list_li">11</li>
                                        <li class="request-form__input-old-list_li">12</li>
                                        <li class="request-form__input-old-list_li">13</li>
                                        <li class="request-form__input-old-list_li">14</li>
                                        <li class="request-form__input-old-list_li">15 и больше</li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                        <div class="calculator__calculate-btn_wr">
                            <button class="calculator__btn btn btn__fz_15 btn__color_blue btn__width_265 btn__height_50">Рассчитать</button>
                        </div>

                        <span class="calculator__price">$ 0</span>

                    </form>

                </div>
            </div>
        </div>

    </div>
</section>

<!-- How It Work Section -->
<section class="how-work">
    <div class="container how-work__container">
        <!-- Title -->
        <div class="how-work__title_wr">
            <img src="<?= get_stylesheet_directory_uri() ?>/images/h2-icons/how-work-icon.svg" class="how-work__h2-img">
            <h2 class="how-work__title section-title">Как мы <span>работаем</span></h2>
        </div>

        <!-- Items -->
        <div class="how-work__items">

            <?php
                $n = 0;
                $args = array(
                    'post_type' => 'how-we-working',
                    'order' => 'ASC',
                    'posts_per_page' => 9
                );
                $loop = new WP_Query($args);
                while ($loop->have_posts()) : $loop->the_post();
                $n++
            ?>
                <!-- Item -->
                <article class="how-work__item">
                    <img src="<?= the_post_thumbnail_url() ?>" class="how-work__img">
                    <div class="how-work__item-title">
                        <h4 class="how-work__item-title_text"><?= the_title() ?></h4>
                        <div class="how-work__item-title_number">0<?= $n ?></div>
                    </div>
                    <div class="how-work__content">
                        <?= the_content() ?>
                    </div>
                </article>
            <?php
                endwhile;
                wp_reset_query();
            ?>
        </div>

<!--        <div class="how-work__request">-->
<!--            <div class="btn btn__width_265 btn__color_blue" id="how-work-request">Подобрать авто</div>-->
<!--        </div>-->


    </div>
</section>


<section class="faq">

    <div class="faq__scale-bg"></div>
    <div class="faq__mazda">
        <img src="<?= get_stylesheet_directory_uri() ?>/images/mazda.png">
    </div>

    <div class="container faq__container">
        <div class="faq__left-side"></div>

        <div class="faq__right-side">
            <!-- Title -->
            <div class="faq__title_wr">
                <img src="<?= get_stylesheet_directory_uri() ?>/images/h2-icons/question-icon.svg" class="faq__h2-img">
                <h2 class="faq__title section-title">Популярные <span>вопросы</span></h2>
            </div>

            <!-- Spoilers -->
            <div class="faq__spoilers">
                <?php
                    $n = 0;
                    $args = array(
                        'post_type' => 'faq',
                        'order' => 'ASC',
                        'posts_per_page' => 10
                    );
                    $loop = new WP_Query($args);
                    while ($loop->have_posts()) : $loop->the_post();
                    $n++;
                ?>
                    <!-- Spoiler Item -->
                    <article class="faq__spoiler <?php if ($n == 1) echo 'active'; ?>">
                        <div class="faq__item-title_block">
                            <h4 class="faq__item-title"><?= the_title() ?></h4>
                            <div class="faq__item-title_icon"></div>
                        </div>

                        <div class="faq__content">
                            <?= the_content() ?>
                        </div>
                    </article>
                <?php
                    endwhile;
                    wp_reset_query();
                ?>
            </div>


        </div>
    </div>
</section>


<?php
get_footer();
