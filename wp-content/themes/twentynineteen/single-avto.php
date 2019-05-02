<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>
<div class="current-avto">
    <!--  Current Avto Header  -->
    <div class="current-avto__header">
        <div class="current-avto__bg">
            <img src="<?= get_the_post_thumbnail_url() ?>">
        </div>
        <div class="container current-avto__header-content-container">
            <h1 class="current-avto__title"><?= the_title() ?></h1>
        </div>
        <div class="current-avto__path">
            <div class="container current-avto__header-path-container">
                <ul class="current-avto__path_ul">
                    <li class="current-avto__path_li">
                        <a href="/" class="current-avto__path_link">Главная</a>
                    </li>
                    <li class="current-avto__path_li">
                        /&nbsp;<a href="/index.php/avto/" class="current-avto__path_link">Авто</a>
                    </li>
                    <li class="current-avto__path_li">&nbsp;/&nbsp;<?= the_title() ?></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container current-avto__content-container">
        <?php while (have_posts()) : the_post(); ?>

            <div class="current-avto__content">
                <div class="current-avto__content-title">
                    <h2><?php
                            // Car Brand
                            $car_brand = get_field('car-brand', $post->ID);
                            echo $car_brand['value'];
                        ?>

                        <?php
                            // Car Model
                            $car_model_name = 'car-' . strtolower($car_brand['label']);
                            echo get_field($car_model_name, $post->ID);
                        ?>
                    </h2>
                </div>

                <div class="current-avto__info">
                    <div class="current-avto__left">

                        <!-- Swiper -->
                        <div class="swiper-container current-avto__gallery-top">
                            <div class="swiper-wrapper">
                                <?php foreach ( get_post_meta($post->ID, 'avto-photos') as $img ) : ?>
                                    <div class="swiper-slide" style="background-image:url(<?= $img['guid'] ?>)"></div>
                                <?php endforeach ?>
                            </div>
                            <!-- Add Arrows -->
                            <div class="current-avto__button-next swiper-button-white"></div>
                            <div class="current-avto__button-prev swiper-button-white"></div>

                            <!-- Auto Location on active photo -->
                            <div class="current-avto__location-wr">
                                <div class="current-avto__location"><?= get_field('auto-location', $post->ID) ?></div>
                            </div>
                        </div>

                        <div class="swiper-container current-avto__gallery-thumbs">
                            <div class="swiper-wrapper">
                                <?php foreach ( get_post_meta($post->ID, 'avto-photos') as $img ) : ?>
                                    <div class="swiper-slide" style="background-image:url(<?= $img['guid'] ?>)"></div>
                                <?php endforeach ?>
                            </div>
                        </div>

                    </div>

                    <div class="current-avto__right">
                        <!-- Price in Ukraine -->
                        <div class="current-avto__price-in-ukr">
                            $ 15 700 <span>Стоимость аналога в Украине</span>
                        </div>

                        <!-- Price -->
                        <div class="current-avto__price">
                            $ 10 200
                        </div>

                        <!-- Order Button -->
                        <button class="current-avto__order-btn">Заказать это авто</button>

                        <!-- Specifications this auto -->
                        <div class="current-avto__specifications">
                            <h4 class="current-avto__specifications_title">
                                Характеристики автомобиля:</h4>

                            <ul class="current-avto__specifications_list">
                                <li class="current-avto__specifications_item">
                                    <div class="current-avto__specifications_item_left-side">Марка:</div>
                                    <div class="current-avto__specifications_item_right-side">Mazda</div>
                                </li>
                                <li class="current-avto__specifications_item">
                                    <div class="current-avto__specifications_item_left-side">Модель:</div>
                                    <div class="current-avto__specifications_item_right-side">6</div>
                                </li>
                                <li class="current-avto__specifications_item">
                                    <div class="current-avto__specifications_item_left-side">Год выпуска:</div>
                                    <div class="current-avto__specifications_item_right-side">2016</div>
                                </li>
                                <li class="current-avto__specifications_item">
                                    <div class="current-avto__specifications_item_left-side">Кузов:</div>
                                    <div class="current-avto__specifications_item_right-side">Седан</div>
                                </li>
                                <li class="current-avto__specifications_item">
                                    <div class="current-avto__specifications_item_left-side">Тип топлива:</div>
                                    <div class="current-avto__specifications_item_right-side">Бензин</div>
                                </li>
                                <li class="current-avto__specifications_item">
                                    <div class="current-avto__specifications_item_left-side">Объем двигателя:</div>
                                    <div class="current-avto__specifications_item_right-side">2.2</div>
                                </li>
                                <li class="current-avto__specifications_item">
                                    <div class="current-avto__specifications_item_left-side">Мощность Л. с:</div>
                                    <div class="current-avto__specifications_item_right-side">165</div>
                                </li>
                                <li class="current-avto__specifications_item">
                                    <div class="current-avto__specifications_item_left-side">Пробег:</div>
                                    <div class="current-avto__specifications_item_right-side">265</div>
                                </li>
                                <li class="current-avto__specifications_item">
                                    <div class="current-avto__specifications_item_left-side">Трансмиссия:</div>
                                    <div class="current-avto__specifications_item_right-side">Автоматическая</div>
                                </li>
                                <li class="current-avto__specifications_item">
                                    <div class="current-avto__specifications_item_left-side">Привод:</div>
                                    <div class="current-avto__specifications_item_right-side">Передний</div>
                                </li>
                                <li class="current-avto__specifications_item">
                                    <div class="current-avto__specifications_item_left-side">Цвет:</div>
                                    <div class="current-avto__specifications_item_right-side">Синий</div>
                                </li>
                                <li class="current-avto__specifications_item">
                                    <div class="current-avto__specifications_item_left-side">Статус:</div>
                                    <div class="current-avto__specifications_item_right-side">В америке</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        <?php endwhile; ?>
    </div>
</div>

<?php
get_footer();
