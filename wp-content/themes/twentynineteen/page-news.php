<?php
/**
 * Template Name: News Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */

get_header();
?>

<div class="news">

    <!--  News Header  -->
    <div class="current-avto__header page-header">
        <div class="current-avto__bg">
            <img src="<?= get_the_post_thumbnail_url(261) ?>">
        </div>
        <div class="container current-avto__header-content-container page-header__content">
            <?php $head_info = get_post(261) ?>
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
                        <a href="/" class="current-avto__path_link">Главная</a>
                    </li>
                    <li class="current-avto__path_li">&nbsp;/&nbsp;<?= the_title() ?></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container about-page__container">

        <div class="current-avto__content-title page__title">
            <h2>Компания  Auto Market</h2>
        </div>

        <div class="page__content-wr">

            <div class="news__content page__content">

                <?php
                  $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

                    $args = array(
                        'post_type' => 'news',
                        'order' => 'DESC',
                        'posts_per_page' => 10,
                        'paged' => $paged,
                        'page' => $paged
                    );
                    $loop = new WP_Query($args);
                    while ($loop->have_posts()) : $loop->the_post();
                ?>
                    <!-- News Item -->
                    <article class="news-item news__item">
                        <div class="news-item__img" style="background-image: url('<?php the_post_thumbnail_url() ?>');"></div>
                        <div class="news-item__content">
                            <div class="news-item__date">
                                <?= get_the_date('d.m.Y') ?>
                            </div>
                            <div class="news-item__top-part">
                                <div class="news-item__title-wr">
                                    <h3 class="news-item__title"><?php the_title() ?></h3>
                                </div>
                                <div class="news-item__text">
                                    <?php the_excerpt() ?>
                                </div>
                            </div>
                            <div class="news-item__bottom-part">
                                <a href="<?= get_page_link() ?>" class="btn btn__width_265 btn__fz_15 btn__color_blue">Читать полностью</a>
                            </div>
                        </div>
                    </article>
                <?php
                    endwhile;
                    wp_reset_query();
                ?>

            </div>

            <div class="news__asside">
                <div class="popular-news">
                    <h2 class="popular-news__title">Популярные новости</h2>

                    <div class="popular-news__wr">
                        <?php
                        $args = array(
                            'post_type' => 'news',
                            'order' => 'DESC',
                            'meta_key' => 'popular-news',
                            'meta_value' => true,
                            'posts_per_page' => 5
                        );
                        $loop = new WP_Query($args);
                        while ($loop->have_posts()) : $loop->the_post();
                            ?>
                            <div class="popular-news__item">
                                <a href="<?= get_page_link() ?>" class="popular-news__item-link"></a>
                                <div class="popular-news__img" style="background-image: url('<?php the_post_thumbnail_url() ?>');"></div>
                                <div class="popular-news__item-title-wr">
                                    <h3 class="popular-news__item-title">
                                        <?php the_title() ?>
                                    </h3>
                                </div>
                            </div>
                        <?php
                            endwhile;
                            wp_reset_query();
                        ?>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div class="auto-page__request request-bottom">
        <div class="container request-bottom__container">
            <div class="current-avto__content-title page__title auto-page__catalog-title request-bottom__title">
                <h2>Подбор авто специалистом</h2>
            </div>
            <div class="request-bottom__desc">Заполните форму и мы подберем Вам идеальный автомобиль!</div>

            <form action="" class="request-bottom__form">
                <div class="request-form__items-wr">

                    <!-- Row -->
                    <!--                    <div class="request-form__items-row">-->
                    <div class="request-form__input-wr request-form__brand">
                        <input type="text" class="request-form__input" placeholder="Марка" id="car-brand-request">
                        <div class="request-form__img">
                            <img src="<?= get_stylesheet_directory_uri() ?>/images/1home-page-icons/car-search-icons/car-name-icon.svg">
                        </div>
                        <div class="request-form__arrow-img">
                            <svg width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.99999 5L-4.37114e-07 -7.94466e-08L10 -9.53674e-07L4.99999 5Z" fill="white"/>
                            </svg>
                        </div>
                    </div>

                    <div class="request-form__input-wr request-form__model">
                        <input type="text" class="request-form__input" placeholder="Модель" id="car-model-req">
                        <div class="request-form__img">
                            <img src="<?= get_stylesheet_directory_uri() ?>/images/1home-page-icons/car-search-icons/model-icon.svg">
                        </div>
                        <div class="request-form__arrow-img">
                            <svg width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.99999 5L-4.37114e-07 -7.94466e-08L10 -9.53674e-07L4.99999 5Z" fill="white"/>
                            </svg>
                        </div>
                    </div>

                    <div class="request-form__input-wr request-form__location">
                        <input type="text" class="request-form__input" placeholder="Местоположение" id="car-location-req">
                        <div class="request-form__img">
                            <img src="<?= get_stylesheet_directory_uri() ?>/images/1home-page-icons/car-search-icons/location-icon.svg">
                        </div>
                        <div class="request-form__arrow-img">
                            <svg width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.99999 5L-4.37114e-07 -7.94466e-08L10 -9.53674e-07L4.99999 5Z" fill="white"/>
                            </svg>
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
                        <input id="price-range-req" type="text" class="js-range-slider" name="my_range" value="" />
                    </div>
                    <!--                    </div>-->

                </div>

                <div class="request-form__btn-wr">
                    <button class="btn btn__width_265 btn__height_50 btn__color_blue">Подобрать авто</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /.auto-page__request request-bottom -->

</div>

<?php
get_footer();
