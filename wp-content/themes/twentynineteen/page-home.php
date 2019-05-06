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
</section>

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
                    <div class="avto__location"><?= get_field('auto-location', $post->ID) ?></div>
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
                            <?= get_field('current-auto-engine-capacity', $post->ID) ?>
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
                    <span class="avto__footer_text">Стоимость аналого в Украине</span>
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

<!-- How It Work Section -->
<section class="how-work">
    <div class="container how-work__container">
        <!-- Title -->
        <div class="how-work__title_wr">
            <img src="<?= get_stylesheet_directory_uri() ?>/images/h2-icons/how-work-icon.svg" class="how-word__h2-img">
            <h2 class="how-work__title section-title">Как мы <span>работаем</span></h2>
        </div>

        <!-- Items -->
        <div class="how-work__items">

            <!-- Item -->
            <article class="how-work__item">
                <img src="<?= get_stylesheet_directory_uri() ?>/images/1home-page-icons/how-work/podbor-icon.svg" class="how-work__img">
                <div class="how-work__item-title">
                    <h4 class="how-work__item-title_text">Подбор авто</h4>
                    <div class="how-work__item-title_number">01</div>
                </div>
                <div class="how-work__content">
                    <p>
                        После заказа автомобиля, наши менеджеры
                        подбирают несколько вариантов авто
                        по Вашим запросам.
                    </p>
                </div>
            </article>

            <!-- Item -->
            <article class="how-work__item">
                <img src="<?= get_stylesheet_directory_uri() ?>/images/1home-page-icons/how-work/proverka-icon.svg" class="how-work__img">
                <div class="how-work__item-title">
                    <h4 class="how-work__item-title_text">Проверка авто по CarFax
                        и AutoCheck</h4>
                    <div class="how-work__item-title_number">02</div>
                </div>
                <div class="how-work__content">
                    <p>
                        После заказа автомобиля, наши менеджеры
                        подбирают несколько вариантов авто
                        по Вашим запросам.
                    </p>
                </div>
            </article>

            <!-- Item -->
            <article class="how-work__item">
                <img src="<?= get_stylesheet_directory_uri() ?>/images/1home-page-icons/how-work/vykup-icon.svg" class="how-work__img">
                <div class="how-work__item-title">
                    <h4 class="how-work__item-title_text">Выкуп авто на аукционе</h4>
                    <div class="how-work__item-title_number">03</div>
                </div>
                <div class="how-work__content">
                    <p>
                        После заказа автомобиля, наши менеджеры
                        подбирают несколько вариантов авто
                        по Вашим запросам.
                    </p>
                </div>
            </article>

            <!-- Item -->
            <article class="how-work__item">
                <img src="<?= get_stylesheet_directory_uri() ?>/images/1home-page-icons/how-work/transportirovka-icon.svg" class="how-work__img">
                <div class="how-work__item-title">
                    <h4 class="how-work__item-title_text">Транспортировка</h4>
                    <div class="how-work__item-title_number">04</div>
                </div>
                <div class="how-work__content">
                    <p>
                        После заказа автомобиля, наши менеджеры
                        подбирают несколько вариантов авто
                        по Вашим запросам.
                    </p>
                </div>
            </article>

            <!-- Item -->
            <article class="how-work__item">
                <img src="<?= get_stylesheet_directory_uri() ?>/images/1home-page-icons/how-work/rastamozhka-icon.svg" class="how-work__img">
                <div class="how-work__item-title">
                    <h4 class="how-work__item-title_text">Растаможка и сертификация</h4>
                    <div class="how-work__item-title_number">05</div>
                </div>
                <div class="how-work__content">
                    <p>
                        После заказа автомобиля, наши менеджеры
                        подбирают несколько вариантов авто
                        по Вашим запросам.
                    </p>
                </div>
            </article>

            <!-- Item -->
            <article class="how-work__item">
                <img src="<?= get_stylesheet_directory_uri() ?>/images/1home-page-icons/how-work/dostavka-icon.svg" class="how-work__img">
                <div class="how-work__item-title">
                    <h4 class="how-work__item-title_text">Доставка клиенту по Украине</h4>
                    <div class="how-work__item-title_number">06</div>
                </div>
                <div class="how-work__content">
                    <p>
                        После заказа автомобиля, наши менеджеры
                        подбирают несколько вариантов авто
                        по Вашим запросам.
                    </p>
                </div>
            </article>

        </div>

        <div class="how-work__request">
            <div class="btn btn__width_265 btn__color_blue" id="how-work-request">Подобрать авто</div>
        </div>


    </div>
</section>


<section class="faq">
    <div class="container faq__container">
        <div class="faq__left-side"></div>

        <div class="faq__right-side">
            <!-- Title -->
            <div class="faq__title_wr">
                <img src="<?= get_stylesheet_directory_uri() ?>/images/h2-icons/question-icon.svg" class="faq__h2-img">
                <h2 class="faq__title section-title">Популярные <span>вопросы</span></h2>
            </div>




        </div>
    </div>
</section>


<?php
get_footer();
