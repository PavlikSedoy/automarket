<?php
/**
 * Template Name: Avto Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */

get_header();
?>

<div class="auto-page">
    <!--  Header  -->
    <?php
        $c_lang = get_locale();
        if ($c_lang == 'ru_RU') $head_info_id = 256;
        elseif ($c_lang == 'en_US') $head_info_id = 1813;
        elseif ($c_lang == 'ka_GE') $head_info_id = 1832;
    ?>
    <input type="hidden" value="<?= $c_lang ?>" id="language">
    <div class="current-avto__header page-header">
        <div class="current-avto__bg">
            <img src="<?= get_the_post_thumbnail_url($head_info_id) ?>">
        </div>
        <div class="container current-avto__header-content-container page-header__content">
            <?php $head_info = get_post($head_info_id) ?>
            <h1 class="current-avto__title"><?= $head_info->post_title ?></h1>

            <div class="page-header__text">
                <p>
                    <?= $head_info->post_content ?>
                </p>
            </div>
        </div>
        <div class="current-avto__path">
            <div class="container current-avto__header-path-container">
                <ul class="current-avto__path_ul">
                    <li class="current-avto__path_li">
                        <a href="/" class="current-avto__path_link"><?php _e('Главная') ?></a>
                    </li>
                    <li class="current-avto__path_li">&nbsp;/&nbsp;<?= the_title() ?></li>
                </ul>
            </div>
        </div>
    </div>
    <!--  Header End  -->

    <div class="container auto-page__container">

        <div class="auto-page__tabs auto-tabs">
            <div class="auto-tabs__item">
                <a href="/" class="auto-tabs__link active" data-tab="all"><?php _e('Все авто') ?></a>
            </div>
            <!-- /.auto-tabs__item -->

            <div class="auto-tabs__item">
                <a href="/" class="auto-tabs__link" data-tab="usa"><span class="md-none"><?php _e('Авто</span> в Америке') ?></a>
            </div>
            <!-- /.auto-tabs__item -->

            <div class="auto-tabs__item">
                <a href="/" class="auto-tabs__link" data-tab="georgia"><span class="md-none"><?php _e('Авто</span> в Грузии') ?></a>
            </div>
            <!-- /.auto-tabs__item -->

            <div class="auto-tabs__item">
                <a href="/" class="auto-tabs__link" data-tab="ukraine"><span class="md-none"><?php _e('Авто</span> в Украине') ?></a>
            </div>
            <!-- /.auto-tabs__item -->

            <div class="auto-tabs__item">
                <a href="/" class="auto-tabs__link" data-tab="in-road"><span class="md-none"><?php _e('Авто</span> в пути') ?></a>
            </div>
            <!-- /.auto-tabs__item -->
        </div>
        <!-- /.auto-page__tabs -->

        <div class="auto-page__page-content_wr">

            <div class="current-avto__content-title page__title auto-page__catalog-title none-xl-only">
                <h2><?php _e('Каталог') ?></h2>
            </div>

            <div class="auto-page__filters">

                <div class="current-avto__content-title page__title auto-page__filters-title" id="auto-page-filters">
                    <h2><?php _e('Фильтры') ?></h2>
                    <div class="request-form__arrow-img none-xl-only" id="open-auto-filters-arrow">
                        <svg width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.99999 5L-4.37114e-07 -7.94466e-08L10 -9.53674e-07L4.99999 5Z" fill="white"/>
                        </svg>
                    </div>
                </div>

                <form action="" class="auto-page__filters-form">
                    <!-- Price -->
                    <div class="request-form__range-wr auto-page__range-wr" id="price-range-wr">
                        <input id="price-range" type="text" class="js-range-slider" name="my_range" value="" />
                    </div>

                    <!-- Brand -->
                    <div class="request-form__input-wr">
                        <input type="text" class="auto-page__input" placeholder="<?php _e('Марка') ?>" id="car-brand-filters">
                        <div class="request-form__img">
                            <img src="<?= get_stylesheet_directory_uri() ?>/images/1home-page-icons/car-search-icons/car-name-icon.svg">
                        </div>
                        <div class="request-form__arrow-img">
                            <svg width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.99999 5L-4.37114e-07 -7.94466e-08L10 -9.53674e-07L4.99999 5Z" fill="white"/>
                            </svg>
                        </div>

                        <div class="auto-page__input-list" id="car-brand-list-filters">
                            <ul class="auto-page__input-list_ul" id="car-brand-list-ul-filters">
                                <?php
                                    $brand_list = array_unique(get_meta_values('car-brand', 'avto'));
                                    foreach ($brand_list as $brand):
                                ?>
                                    <li class="auto-page__input-list_li brand-item-li"><?= $brand ?></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>

                    <!-- Model -->
                    <div class="request-form__input-wr">
                        <input type="text" class="auto-page__input" placeholder="<?php _e('Модель') ?>" id="car-model-filters">
                        <div class="request-form__img">
                            <img src="<?= get_stylesheet_directory_uri() ?>/images/1home-page-icons/car-search-icons/model-icon.svg">
                        </div>
                        <div class="request-form__arrow-img">
                            <svg width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.99999 5L-4.37114e-07 -7.94466e-08L10 -9.53674e-07L4.99999 5Z" fill="white"/>
                            </svg>
                        </div>

                        <div class="auto-page__input-list" id="car-list-filters">
                            <ul class="auto-page__input-list_ul" id="car-models-list-ul-filters">
                            </ul>
                        </div>
                    </div>

                    <!-- Year From -->
                    <div class="request-form__input-wr">
                        <input type="text" class="auto-page__input" placeholder="<?php _e('Год от') ?>" id="year-from">
                        <div class="request-form__img">
                            <img src="<?= get_stylesheet_directory_uri() ?>/images/1home-page-icons/car-search-icons/calendar-icon.svg">
                        </div>
                        <div class="request-form__arrow-img">
                            <svg width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.99999 5L-4.37114e-07 -7.94466e-08L10 -9.53674e-07L4.99999 5Z" fill="white"/>
                            </svg>
                        </div>

                        <div class="auto-page__input-list" id="year-from-list-filters">
                            <ul class="auto-page__input-list_ul">
                                <li class="auto-page__input-list_li year-from-li">2000</li>
                                <li class="auto-page__input-list_li year-from-li">2001</li>
                                <li class="auto-page__input-list_li year-from-li">2002</li>
                                <li class="auto-page__input-list_li year-from-li">2003</li>
                                <li class="auto-page__input-list_li year-from-li">2004</li>
                                <li class="auto-page__input-list_li year-from-li">2005</li>
                                <li class="auto-page__input-list_li year-from-li">2006</li>
                                <li class="auto-page__input-list_li year-from-li">2007</li>
                                <li class="auto-page__input-list_li year-from-li">2008</li>
                                <li class="auto-page__input-list_li year-from-li">2009</li>
                                <li class="auto-page__input-list_li year-from-li">2010</li>
                                <li class="auto-page__input-list_li year-from-li">2011</li>
                                <li class="auto-page__input-list_li year-from-li">2012</li>
                                <li class="auto-page__input-list_li year-from-li">2013</li>
                                <li class="auto-page__input-list_li year-from-li">2014</li>
                                <li class="auto-page__input-list_li year-from-li">2015</li>
                                <li class="auto-page__input-list_li year-from-li">2016</li>
                                <li class="auto-page__input-list_li year-from-li">2017</li>
                                <li class="auto-page__input-list_li year-from-li">2018</li>
                                <li class="auto-page__input-list_li year-from-li">2019</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Year To -->
                    <div class="request-form__input-wr">
                        <input type="text" class="auto-page__input" placeholder="<?php _e('Год до') ?>" id="year-to">
                        <div class="request-form__img">
                            <img src="<?= get_stylesheet_directory_uri() ?>/images/1home-page-icons/car-search-icons/calendar-icon.svg">
                        </div>
                        <div class="request-form__arrow-img">
                            <svg width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.99999 5L-4.37114e-07 -7.94466e-08L10 -9.53674e-07L4.99999 5Z" fill="white"/>
                            </svg>
                        </div>

                        <div class="auto-page__input-list" id="year-to-list-filters">
                            <ul class="auto-page__input-list_ul">
                                <li class="auto-page__input-list_li year-to-li">2000</li>
                                <li class="auto-page__input-list_li year-to-li">2001</li>
                                <li class="auto-page__input-list_li year-to-li">2002</li>
                                <li class="auto-page__input-list_li year-to-li">2003</li>
                                <li class="auto-page__input-list_li year-to-li">2004</li>
                                <li class="auto-page__input-list_li year-to-li">2005</li>
                                <li class="auto-page__input-list_li year-to-li">2006</li>
                                <li class="auto-page__input-list_li year-to-li">2007</li>
                                <li class="auto-page__input-list_li year-to-li">2008</li>
                                <li class="auto-page__input-list_li year-to-li">2009</li>
                                <li class="auto-page__input-list_li year-to-li">2010</li>
                                <li class="auto-page__input-list_li year-to-li">2011</li>
                                <li class="auto-page__input-list_li year-to-li">2012</li>
                                <li class="auto-page__input-list_li year-to-li">2013</li>
                                <li class="auto-page__input-list_li year-to-li">2014</li>
                                <li class="auto-page__input-list_li year-to-li">2015</li>
                                <li class="auto-page__input-list_li year-to-li">2016</li>
                                <li class="auto-page__input-list_li year-to-li">2017</li>
                                <li class="auto-page__input-list_li year-to-li">2018</li>
                                <li class="auto-page__input-list_li year-to-li">2019</li>
                            </ul>
                        </div>
                    </div>

                    <div class="request-form__input-wr">
                        <input type="text" class="request-form__input" placeholder="<?php _e('Объем (1600)') ?>" id="engine-capacity">
                        <div class="request-form__img">
                            <img src="<?= get_stylesheet_directory_uri() ?>/images/1home-page-icons/calculator-block/engine-icon.svg">
                        </div>

                        <div class="request-form__usd-mark">
                            см.куб.
                        </div>
                    </div>

                    <div class="request-form__input-wr">
                        <input type="text" class="request-form__input" placeholder="<?php _e('Тип топлива') ?>" id="fuel-type">
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
                                <?php
                                $fuel_type_list = array_unique(get_meta_values('current-auto-fuel-type', 'avto'));
                                foreach ($fuel_type_list as $fuel_type_f):
                                    ?>
                                    <li class="request-form__input-fuel-list_li">
                                        <?php
                                            if ($c_lang == 'en_US') {
                                                $fuel_type_f = $fuel_type_f == 'Бензин' ? 'Gasolene' : $fuel_type_f;
                                                $fuel_type_f = $fuel_type_f == 'Дизель' ? 'Diesel' : $fuel_type_f;
                                                $fuel_type_f = $fuel_type_f == 'Электро' ? 'Electro' : $fuel_type_f;
                                                $fuel_type_f = $fuel_type_f == 'Гибрид' ? 'Hybrid' : $fuel_type_f;
                                            } elseif ($c_lang == 'ka_GE') {
                                                $fuel_type_f = $fuel_type_f == 'Бензин' ? 'ბენზინი' : $fuel_type_f;
                                                $fuel_type_f = $fuel_type_f == 'Дизель' ? 'დიზელის ძრავა' : $fuel_type_f;
                                                $fuel_type_f = $fuel_type_f == 'Электро' ? 'ელექტრო' : $fuel_type_f;
                                                $fuel_type_f = $fuel_type_f == 'Гибрид' ? 'ჰიბრიდი' : $fuel_type_f;
                                            }
                                        ?>
                                        <?= $fuel_type_f ?>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>

                    <div class="request-form__input-wr">
                        <input type="text" class="request-form__input" placeholder="<?php _e('Коробка передач') ?>" id="transmission-type">
                        <div class="request-form__img">
                            <img src="<?= get_stylesheet_directory_uri() ?>/images/2catalog-page-icons/transmission-icon.svg" alt="">
                        </div>

                        <div class="request-form__arrow-img">
                            <svg width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.99999 5L-4.37114e-07 -7.94466e-08L10 -9.53674e-07L4.99999 5Z" fill="white"/>
                            </svg>
                        </div>

                        <div class="request-form__input-fuel-list" id="car-transmission-list">
                            <ul class="request-form__input-fuel-list_ul" id="car-transmission-list-ul">
                                <?php
                                $transmission_type_list = array_unique(get_meta_values('current-auto-transmission', 'avto'));
                                foreach ($transmission_type_list as $transmission_type):
                                    ?>
                                    <li class="request-form__input-fuel-list_li transmission-type-li">
                                        <?php

                                            if ($c_lang == 'en_US') {
                                                $transmission_type = $transmission_type == 'Автомат' ? 'Automatic' : $transmission_type;
                                                $transmission_type = $transmission_type == 'Механика' ? 'Manual' : $transmission_type;
                                            } elseif ($c_lang == 'ka_GE') {
                                                $transmission_type = $transmission_type == 'Автомат' ? 'ავტომატური' : $transmission_type;
                                                $transmission_type = $transmission_type == 'Механика' ? 'მექანიკური' : $transmission_type;
                                            }
                                        ?>
                                        <?= $transmission_type ?>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>

                    <a href="<?= get_page_link() ?>" class="btn btn__width_100 btn__color_blue btn__height_50 auto-page__btn-ok" id="apply-filters"><?php _e('Применить') ?></a>

                    <a href="" class="btn btn__width_100 btn__color_transparent btn__height_50 auto-page__btn-clear"><?php _e('Очистить') ?></a>
                </form>
            </div>
            <!-- /.auto-page__filters -->

            <div class="auto-page__content">

                <div class="current-avto__content-title page__title auto-page__catalog-title md-none">
                    <h2><?php _e('Каталог') ?></h2>
                </div>

                <div class="auto-page__catalog" id="auto-page-catalog">

                    <?php
                    $args = array(
                        'post_type' => 'avto',
                        'order' => 'DESC',
                        'posts_per_page' => 4,
                    );

                    $loop = new WP_Query($args);
                    while ($loop->have_posts()) : $loop->the_post();
                        ?>

                        <!-- Items -->
                        <article class="popular__avto avto auto-page__auto-item">

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
                                <?php
                                    $auto_location = get_field('auto-location', $post->ID)['label'];

                                    if ($c_lang == 'en_US') {
                                        $auto_location = $auto_location == 'В Америке' ? 'In USA' : $auto_location;
                                        $auto_location = $auto_location == 'В Грузии' ? 'In Georgia' : $auto_location;
                                        $auto_location = $auto_location == 'В Украине' ? 'In Ukraine' : $auto_location;
                                        $auto_location = $auto_location == 'В пути' ? 'In road' : $auto_location;
                                    } elseif ($c_lang == 'ka_GE') {
                                        $auto_location = $auto_location == 'В Америке' ? 'ამერიკაში' : $auto_location;
                                        $auto_location = $auto_location == 'В Грузии' ? 'საქართველოში' : $auto_location;
                                        $auto_location = $auto_location == 'В Украине' ? 'უკრაინაში' : $auto_location;
                                        $auto_location = $auto_location == 'В пути' ? 'გზად' : $auto_location;
                                    }
                                ?>
                                <div class="avto__location"><?= $auto_location ?></div>
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
                                        <?= number_format(get_field('current-auto-engine-capacity', $post->ID)/1000, 1, '.', ''); ?> <?php _e('л') ?>
                                    </span>
                                </div>

                                <div class="avto__props_fuel-type">
                                    <img src="<?= get_stylesheet_directory_uri() ?>/images/1home-page-icons/auto-card-icons/fuel-icon.svg" class="avto__props_img">
                                    <span class="avto__props_text">
                                        <?php
                                            $fuel_type = get_field('current-auto-fuel-type', $post->ID);

                                            if ($c_lang == 'en_US') {
                                                $fuel_type = $fuel_type == 'Бензин' ? 'Gasolene' : $fuel_type;
                                                $fuel_type = $fuel_type == 'Дизель' ? 'Diesel' : $fuel_type;
                                                $fuel_type = $fuel_type == 'Электро' ? 'Electro' : $fuel_type;
                                                $fuel_type = $fuel_type == 'Гибрид' ? 'Hybrid' : $fuel_type;
                                            } elseif ($c_lang == 'ka_GE') {
                                                $fuel_type = $fuel_type == 'Бензин' ? 'ბენზინი' : $fuel_type;
                                                $fuel_type = $fuel_type == 'Дизель' ? 'დიზელის ძრავა' : $fuel_type;
                                                $fuel_type = $fuel_type == 'Электро' ? 'ელექტრო' : $fuel_type;
                                                $fuel_type = $fuel_type == 'Гибрид' ? 'ჰიბრიდი' : $fuel_type;
                                            }
                                        ?>
                                        <?= $fuel_type ?>
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
                                <a href="<?= get_page_link() ?>" class="btn btn__width_180 btn__color_transparent btn__fz_15"><?php _e('Подробнее') ?></a>

                                <div class="avto__price">
                                    $ <?= get_field('current-auto-price', $post->ID) ?>
                                </div>
                            </div>

                            <div class="avto__footer">
                    <span class="avto__footer_price">
                        $ <?= get_field('current-auto-price-in-ukraine', $post->ID) ?>
                    </span>
                                <span class="avto__footer_text"><?php _e('Стоимость аналога в Украине') ?></span>
                            </div>
                        </article>
                    <?php
                    endwhile;
                    wp_reset_query();
                    ?>

                </div>
                <!-- /.auto-page__catalog -->

                <div class="auto-page__pagination pagination">
                    <div class="pagination__btn btn btn__color_transparent btn__height_50 btn__width_265" id="load-more-auto""><?php _e('Показать ещё') ?></div>
                </div>

            </div>
            <!-- /.auto-page__content -->

        </div>
        <!-- /.auto-page__page-content_wr -->

    </div>

<?php get_template_part('template-parts/content/content-request') ?>
</div>

<?php
get_footer();
