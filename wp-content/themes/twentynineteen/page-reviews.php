<?php
/**
 * Template Name: Reviews Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */

get_header();
?>

<div class="reviews">
    <!--  Reviews Header  -->
    <div class="current-avto__header page-header">
        <div class="current-avto__bg">
            <img src="<?= get_the_post_thumbnail_url(258) ?>">
        </div>
        <div class="container current-avto__header-content-container page-header__content">
            <?php $head_info = get_post(258) ?>
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

    <div class="container container__reviews">
        <div class="current-avto__content-title page__title">
            <h2>Наши Довольные клиенты</h2>
        </div>


        <!-- Tabs -->
        <div class="reviews__tabs tabs">
            <div class="tabs__header left-active">
                <div class="tabs__header_item" data-tab="desc">Отзывы</div>
                <div class="tabs__header_item" data-tab="equipment">Видео отзывы</div>
            </div>

            <!-- Tabs Wrapper -->
            <div class="tabs__tabs-wr">
                <!-- Standart Review Tab -->
                <div class="tabs__tab active" id="desc-tab">

                    <!-- Slider -->
                    <div class="swiper-container reviews__current-comment">
                        <div class="swiper-wrapper">
                            <?php
                                $args = array(
                                    'post_type' => 'reviews',
                                    'order' => 'DESC',
                                );
                                $loop = new WP_Query($args);
                                while ($loop->have_posts()) : $loop->the_post();
                            ?>
                            <div class="swiper-slide">
                                <div class="reviews__current-comment_text">
                                    <?= the_content() ?>
                                </div>
                            </div>
                            <?php
                                endwhile;
                                wp_reset_query();
                            ?>
                        </div>
                        <!-- Add Arrows -->
                    </div>

                    <div class="reviews__author-comment_wr">
                        <div class="swiper-container reviews__author-comment">
                            <div class="swiper-wrapper">
                                <?php
                                    $args = array(
                                        'post_type' => 'reviews',
                                        'order' => 'DESC',
                                    );
                                    $loop = new WP_Query($args);
                                    while ($loop->have_posts()) : $loop->the_post();
                                ?>
                                <div class="swiper-slide reviews__author">
                                    <div class="reviews__author_avatar-wr">
                                        <div class="reviews__author_avatar" style="background-image: url(<?= the_post_thumbnail_url() ?>);"></div>
                                    </div>
                                    <div class="reviews__author_name_wr">
                                        <div class="reviews__author_name"><?= the_title() ?></div>
                                    </div>
                                    <div class="reviews__author_auto_wr">
                                        <div class="reviews__author_auto"><?= get_field('review_auto', $post->ID) ?></div>
                                    </div>
                                </div>
                                <?php
                                    endwhile;
                                    wp_reset_query();
                                ?>
                            </div>
                        </div>

                        <div class="swiper-button_wr">
                            <div class="current-avto__button-next swiper-button-white"></div>
                            <div class="current-avto__button-prev swiper-button-white"></div>
                        </div>
                    </div>

                </div>

                <!-- Video Review Tab -->
                <div class="tabs__tab" id="equipment-tab">

                    <!-- Videos Wrapper -->
                    <div class="reviews__video-wr">

                        <!-- Video Item -->
                        <div class="reviews__video-item">
                            <iframe width="100%" height="315" src="https://www.youtube.com/embed/Pl8c6QU6hH0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                            <span class="reviews__video-item_name">Артур Пархомов</span>

                            <span class="reviews__video-item_car-name">Audi A7</span>

                            <div class="reviews__video-item_desc">
                                <p>
                                    Дата покупки авто в США: 24 ноября 2018<br>
                                    Дата здачи автомобля клиенту: 29 января 2019<br>
                                    Исполнитель: Авто Маркет Украина<br>
                                    Заказчик: Андрей Арбузов<br>
                                    Объем двигателя: 1.6 л<br>
                                    Пробег автомобиля: 110 тыс м
                                </p>
                            </div>
                        </div>

                        <!-- Video Item -->
                        <div class="reviews__video-item">
                            <iframe width="100%" height="315" src="https://www.youtube.com/embed/Pl8c6QU6hH0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                            <span class="reviews__video-item_name">Артур Пархомов</span>

                            <span class="reviews__video-item_car-name">Audi A7</span>

                            <div class="reviews__video-item_desc">
                                <p>
                                    Дата покупки авто в США: 24 ноября 2018<br>
                                    Дата здачи автомобля клиенту: 29 января 2019<br>
                                    Исполнитель: Авто Маркет Украина<br>
                                    Заказчик: Андрей Арбузов<br>
                                    Объем двигателя: 1.6 л<br>
                                    Пробег автомобиля: 110 тыс м
                                </p>
                            </div>
                        </div>

                        <!-- Video Item -->
                        <div class="reviews__video-item">
                            <iframe width="100%" height="315" src="https://www.youtube.com/embed/Pl8c6QU6hH0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                            <span class="reviews__video-item_name">Артур Пархомов</span>

                            <span class="reviews__video-item_car-name">Audi A7</span>

                            <div class="reviews__video-item_desc">
                                <p>
                                    Дата покупки авто в США: 24 ноября 2018<br>
                                    Дата здачи автомобля клиенту: 29 января 2019<br>
                                    Исполнитель: Авто Маркет Украина<br>
                                    Заказчик: Андрей Арбузов<br>
                                    Объем двигателя: 1.6 л<br>
                                    Пробег автомобиля: 110 тыс м
                                </p>
                            </div>
                        </div>

                        <!-- Video Item -->
                        <div class="reviews__video-item">
                            <iframe width="100%" height="315" src="https://www.youtube.com/embed/Pl8c6QU6hH0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                            <span class="reviews__video-item_name">Артур Пархомов</span>

                            <span class="reviews__video-item_car-name">Audi A7</span>

                            <div class="reviews__video-item_desc">
                                <p>
                                    Дата покупки авто в США: 24 ноября 2018<br>
                                    Дата здачи автомобля клиенту: 29 января 2019<br>
                                    Исполнитель: Авто Маркет Украина<br>
                                    Заказчик: Андрей Арбузов<br>
                                    Объем двигателя: 1.6 л<br>
                                    Пробег автомобиля: 110 тыс м
                                </p>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>


</div>

<?php
get_footer();
