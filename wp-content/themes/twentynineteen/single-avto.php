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

                        <!-- Tabs -->
                        <div class="current-avto__tabs tabs">
                            <div class="tabs__header left-active">
                                <div class="tabs__header_item" data-tab="desc">Описание</div>
                                <div class="tabs__header_item" data-tab="equipment">Комплектация</div>
                            </div>

                            <!-- Tabs Wrapper -->
                            <div class="tabs__tabs-wr">
                                <!-- Description Tab -->
                                <div class="tabs__tab active" id="desc-tab">
                                    <div class="tabs__description">
                                        <?php the_content() ?>
                                    </div>

                                    <div class="tabs__in-out-price">
                                        <div class="tabs__in-price">
                                            <h4 class="tabs__in-price_title">В цену включено:</h4>
                                            <ul class="tabs__in-price_ul">
                                                <?php $in_price_list = get_field('current-auto-in-price', $post->ID) ?>
                                                <?php foreach ( $in_price_list as $in_price ): ?>
                                                    <li class="tabs__in-price_li"><?= $in_price ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>

                                        <div class="tabs__out-price">
                                            <h4 class="tabs__out-price_title">В цену не включено:</h4>
                                            <ul class="tabs__out-price_ul">
                                                <?php $out_price_list = get_field('current-auto-out-price', $post->ID) ?>
                                                <?php foreach ( $out_price_list as $out_price ): ?>
                                                    <li class="tabs__out-price_li">
                                                        <?= $out_price ?>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- Equipments Tab -->
                                <div class="tabs__tab" id="equipment-tab">
                                    <ul class="tabs__equipment-list">
                                        <?php $equipments = get_field('current-auto-equipment', $post->ID) ?>
                                        <?php foreach ( $equipments as $equipment ): ?>
                                            <li class="tabs__equipment-list_item">
                                                <img src="<?php bloginfo('template_url') ?>/images/3auto-page-icons/check-icon.svg" class="tabs__equipment-list_item_img">
                                                <?= $equipment ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.current-avto__tabs tabs -->

                    </div>

                    <div class="current-avto__right">
                        <!-- Price in Ukraine -->
                        <div class="current-avto__price-in-ukr">
                            $ <?= get_field('current-auto-price-in-ukraine', $post->ID) ?> <span>Стоимость аналога в Украине</span>
                        </div>

                        <!-- Price -->
                        <div class="current-avto__price">
                            $ <?= get_field('current-auto-price', $post->ID) ?>
                        </div>

                        <!-- Order Button -->
                        <button class="current-avto__order-btn btn btn__color_blue btn__width_100">Заказать это авто</button>

                        <!-- Specifications this auto -->
                        <div class="current-avto__specifications">
                            <h4 class="current-avto__specifications_title">
                                Характеристики автомобиля:</h4>

                            <ul class="current-avto__specifications_list">
                                <li class="current-avto__specifications_item">
                                    <div class="current-avto__specifications_item_left-side">Марка:</div>
                                    <div class="current-avto__specifications_item_right-side">
                                        <?php
                                            // Car Brand
                                            $car_brand = get_field('car-brand', $post->ID);
                                            echo $car_brand['value'];
                                        ?>
                                    </div>
                                </li>
                                <li class="current-avto__specifications_item">
                                    <div class="current-avto__specifications_item_left-side">Модель:</div>
                                    <div class="current-avto__specifications_item_right-side">
                                        <?php
                                            // Car Model
                                            $car_model_name = 'car-' . strtolower($car_brand['label']);
                                            echo get_field($car_model_name, $post->ID);
                                        ?>
                                    </div>
                                </li>
                                <li class="current-avto__specifications_item">
                                    <div class="current-avto__specifications_item_left-side">Год выпуска:</div>
                                    <div class="current-avto__specifications_item_right-side"><?= get_field('current-auto-year', $post->ID) ?></div>
                                </li>
                                <li class="current-avto__specifications_item">
                                    <div class="current-avto__specifications_item_left-side">Кузов:</div>
                                    <div class="current-avto__specifications_item_right-side"><?= get_field('current-auto-body-type', $post->ID) ?></div>
                                </li>
                                <li class="current-avto__specifications_item">
                                    <div class="current-avto__specifications_item_left-side">Тип топлива:</div>
                                    <div class="current-avto__specifications_item_right-side"><?= get_field('current-auto-fuel-type', $post->ID) ?></div>
                                </li>
                                <li class="current-avto__specifications_item">
                                    <div class="current-avto__specifications_item_left-side">Объем двигателя:</div>
                                    <div class="current-avto__specifications_item_right-side"><?= get_field('current-auto-engine-capacity', $post->ID) ?></div>
                                </li>
                                <li class="current-avto__specifications_item">
                                    <div class="current-avto__specifications_item_left-side">Мощность Л. с:</div>
                                    <div class="current-avto__specifications_item_right-side"><?= get_field('current-auto-engine-power', $post->ID) ?></div>
                                </li>
                                <li class="current-avto__specifications_item">
                                    <div class="current-avto__specifications_item_left-side">Пробег тыс. км.:</div>
                                    <div class="current-avto__specifications_item_right-side"><?= get_field('current-auto-mileage', $post->ID) ?></div>
                                </li>
                                <li class="current-avto__specifications_item">
                                    <div class="current-avto__specifications_item_left-side">Трансмиссия:</div>
                                    <div class="current-avto__specifications_item_right-side"><?= get_field('current-auto-transmission', $post->ID) ?></div>
                                </li>
                                <li class="current-avto__specifications_item">
                                    <div class="current-avto__specifications_item_left-side">Привод:</div>
                                    <div class="current-avto__specifications_item_right-side"><?= get_field('current-auto-drive-type', $post->ID) ?></div>
                                </li>
                                <li class="current-avto__specifications_item">
                                    <div class="current-avto__specifications_item_left-side">Цвет:</div>
                                    <div class="current-avto__specifications_item_right-side"><?= get_field('current-auto-color', $post->ID) ?></div>
                                </li>
                                <li class="current-avto__specifications_item">
                                    <div class="current-avto__specifications_item_left-side">Статус:</div>
                                    <div class="current-avto__specifications_item_right-side"><?= get_field('auto-location', $post->ID) ?></div>
                                </li>
                            </ul>
                        </div>

                        <div class="current-avto__aside-order aside-order">
                            <h4 class="aside-order__title">Понравилось авто?</h4>

                            <p class="aside-order__desc">
                                Заполните форму ниже.<br>
                                Мы Вам перезвоним и ответим на все вопросы об этом авто.
                            </p>

                            <form action="" class="aside-order__form">
                                <div class="aside-order__input-wr">
                                    <input type="text" name="name" id="name" class="aside-order__input" placeholder="Имя">
                                    <img src="<?php bloginfo('template_url') ?>/images/car-search-icons/name-icon.svg" class="aside-order__input_img">
                                </div>

                                <div class="aside-order__input-wr">
                                    <input type="text" name="phone" id="phone" class="aside-order__input" placeholder="Телефон">
                                    <img src="<?php bloginfo('template_url') ?>/images/car-search-icons/phone-icon-icon.svg" class="aside-order__input_img">
                                </div>

                                <div class="aside-order__input-wr">
                                    <input type="email" name="email" id="email" class="aside-order__input" placeholder="E-mail">
                                    <img src="<?php bloginfo('template_url') ?>/images/3auto-page-icons/email-icon.svg" class="aside-order__input_img">
                                </div>

                                <button type="submit" class="aside-order__submit btn btn__color_blue btn__width_100">Узнать про авто</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        <?php endwhile; ?>
    </div>
</div>

<?php
get_footer();
