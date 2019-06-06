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
    <?php
        $c_lang = get_locale();
        if ($c_lang == 'ru_RU') $news_page_id = 28;
        elseif ($c_lang == 'en_US') $news_page_id = 1782;
        elseif ($c_lang == 'ka_GE') $news_page_id = 1817;
    ?>
    <!--  Current Avto Header  -->
    <div class="current-avto__header">
        <div class="current-avto__bg">
            <img src="<?= get_template_directory_uri() ?>/images/auto-bg.png">
        </div>
        <div class="container current-avto__header-content-container">
            <h1 class="current-avto__title"><?= the_title() ?></h1>
        </div>
        <div class="current-avto__path">
            <div class="container current-avto__header-path-container">
                <ul class="current-avto__path_ul">
                    <li class="current-avto__path_li">
                        <a href="/" class="current-avto__path_link"><?php _e('Главная') ?></a>
                    </li>
                    <li class="current-avto__path_li">
                        /&nbsp;<a href="<?= get_page_link($news_page_id) ?>" class="current-avto__path_link"><?php _e('Авто') ?></a>
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
                                <div class="current-avto__location">
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
                                    <?= $auto_location ?>
                                </div>
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
                                <div class="tabs__header_item" data-tab="desc"><?php _e('Описание') ?></div>
                                <div class="tabs__header_item" data-tab="equipment"><?php _e('Комплектация') ?></div>
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
                                            <h4 class="tabs__in-price_title"><?php _e('В цену включено:') ?></h4>
                                            <ul class="tabs__in-price_ul">
                                                <?php $in_price_list = get_field('current-auto-in-price', $post->ID) ?>
                                                <?php foreach ( $in_price_list as $in_price ): ?>
                                                    <li class="tabs__in-price_li"><?= $in_price ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>

                                        <div class="tabs__out-price">
                                            <h4 class="tabs__out-price_title"><?php _e('В цену не включено:') ?></h4>
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
                            $ <?= get_field('current-auto-price-in-ukraine', $post->ID) ?> <span><?php _e('Стоимость аналога в Украине') ?></span>
                        </div>

                        <!-- Price -->
                        <div class="current-avto__price">
                            $ <?= get_field('current-auto-price', $post->ID) ?>
                        </div>

                        <!-- Order Button -->
                        <button class="current-avto__order-btn btn btn__color_blue btn__width_100"><?php _e('Заказать это авто') ?></button>

                        <!-- Specifications this auto -->
                        <div class="current-avto__specifications">
                            <h4 class="current-avto__specifications_title"><?php _e('Характеристики автомобиля:') ?></h4>

                            <ul class="current-avto__specifications_list">
                                <li class="current-avto__specifications_item">
                                    <div class="current-avto__specifications_item_left-side"><?php _e('Марка:') ?></div>
                                    <div class="current-avto__specifications_item_right-side">
                                        <?php
                                            // Car Brand
                                            $car_brand = get_field('car-brand', $post->ID);
                                            echo $car_brand['value'];
                                        ?>
                                    </div>
                                </li>
                                <li class="current-avto__specifications_item">
                                    <div class="current-avto__specifications_item_left-side"><?php _e('Модель:') ?></div>
                                    <div class="current-avto__specifications_item_right-side">
                                        <?php
                                            // Car Model
                                            $car_model_name = 'car-' . strtolower($car_brand['label']);
                                            echo get_field($car_model_name, $post->ID);
                                        ?>
                                    </div>
                                </li>
                                <li class="current-avto__specifications_item">
                                    <div class="current-avto__specifications_item_left-side"><?php _e('Год выпуска:') ?></div>
                                    <div class="current-avto__specifications_item_right-side"><?= get_field('current-auto-year', $post->ID) ?></div>
                                </li>
                                <li class="current-avto__specifications_item">
                                    <div class="current-avto__specifications_item_left-side"><?php _e('Кузов:') ?></div>
                                    <div class="current-avto__specifications_item_right-side"><?= get_field('current-auto-body-type', $post->ID) ?></div>
                                </li>
                                <li class="current-avto__specifications_item">
                                    <div class="current-avto__specifications_item_left-side"><?php _e('Тип топлива:') ?></div>
                                    <div class="current-avto__specifications_item_right-side">
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
                                    </div>
                                </li>
                                <li class="current-avto__specifications_item">
                                    <div class="current-avto__specifications_item_left-side"><?php _e('Объем двигателя:') ?></div>
                                    <div class="current-avto__specifications_item_right-side"><?= get_field('current-auto-engine-capacity', $post->ID) ?></div>
                                </li>
                                <li class="current-avto__specifications_item">
                                    <div class="current-avto__specifications_item_left-side"><?php _e('Мощность Л. с:') ?></div>
                                    <div class="current-avto__specifications_item_right-side"><?= get_field('current-auto-engine-power', $post->ID) ?></div>
                                </li>
                                <li class="current-avto__specifications_item">
                                    <div class="current-avto__specifications_item_left-side"><?php _e('Пробег тыс. км.:') ?></div>
                                    <div class="current-avto__specifications_item_right-side"><?= get_field('current-auto-mileage', $post->ID) ?></div>
                                </li>
                                <li class="current-avto__specifications_item">
                                    <div class="current-avto__specifications_item_left-side"><?php _e('Трансмиссия:') ?></div>
                                    <div class="current-avto__specifications_item_right-side">
                                        <?php
                                            $transmission_type = get_field('current-auto-transmission', $post->ID);

                                            if ($c_lang == 'en_US') {
                                                $transmission_type = $transmission_type == 'Автомат' ? 'Automatic' : $transmission_type;
                                                $transmission_type = $transmission_type == 'Механика' ? 'Manual' : $transmission_type;
                                            } elseif ($c_lang == 'ka_GE') {
                                                $transmission_type = $transmission_type == 'Автомат' ? 'ავტომატური' : $transmission_type;
                                                $transmission_type = $transmission_type == 'Механика' ? 'მექანიკური' : $transmission_type;
                                            }
                                        ?>
                                        <?= $transmission_type ?>
                                    </div>
                                </li>
                                <li class="current-avto__specifications_item">
                                    <div class="current-avto__specifications_item_left-side"><?php _e('Привод:') ?></div>
                                    <div class="current-avto__specifications_item_right-side">
                                        <?php
                                            $drive_type = get_field('current-auto-drive-type', $post->ID);

                                            if ($c_lang == 'en_US') {
                                                $drive_type = $drive_type == 'Передний' ? 'Front-wheel' : $drive_type;
                                                $drive_type = $drive_type == 'Задний' ? 'Rear-wheel' : $drive_type;
                                                $drive_type = $drive_type == 'Полный' ? 'Four-wheel' : $drive_type;
                                            } elseif ($c_lang == 'ka_GE') {
                                                $drive_type = $drive_type == 'Передний' ? 'წინა' : $drive_type;
                                                $drive_type = $drive_type == 'Задний' ? 'უკანა' : $drive_type;
                                                $drive_type = $drive_type == 'Полный' ? 'სრული' : $drive_type;
                                            }
                                        ?>
                                        <?= $drive_type ?>
                                    </div>
                                </li>
                                <li class="current-avto__specifications_item">
                                    <div class="current-avto__specifications_item_left-side"><?php _e('Цвет:') ?></div>
                                    <div class="current-avto__specifications_item_right-side"><?= get_field('current-auto-color', $post->ID) ?></div>
                                </li>
                                <li class="current-avto__specifications_item">
                                    <div class="current-avto__specifications_item_left-side"><?php _e('Статус:') ?></div>
                                    <div class="current-avto__specifications_item_right-side"><?= $auto_location ?></div>
                                </li>
                            </ul>
                        </div>

                        <div class="current-avto__aside-order aside-order">
                            <h4 class="aside-order__title"><?php _e('Понравилось авто?') ?></h4>

                            <p class="aside-order__desc">
                                <?php _e('Заполните форму ниже.<br>Мы Вам перезвоним и ответим на все вопросы об этом авто.') ?>
                            </p>

                            <form action="" class="aside-order__form">
                                <div class="aside-order__input-wr">
                                    <input type="text" name="name" id="name" class="aside-order__input" placeholder="<?php _e('Имя') ?>">
                                    <img src="<?php bloginfo('template_url') ?>/images/car-search-icons/name-icon.svg" class="aside-order__input_img">
                                </div>

                                <div class="aside-order__input-wr">
                                    <input type="text" name="phone" id="phone" class="aside-order__input" placeholder="<?php _e('Телефон') ?>">
                                    <img src="<?php bloginfo('template_url') ?>/images/car-search-icons/phone-icon-icon.svg" class="aside-order__input_img">
                                </div>

                                <div class="aside-order__input-wr">
                                    <input type="email" name="email" id="email" class="aside-order__input" placeholder="<?php _e('E-mail') ?>">
                                    <img src="<?php bloginfo('template_url') ?>/images/3auto-page-icons/email-icon.svg" class="aside-order__input_img">
                                </div>

                                <button type="submit" class="aside-order__submit btn btn__color_blue btn__width_100"><?php _e('Узнать про авто') ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        <?php endwhile; ?>
    </div>

    <?php get_template_part('template-parts/content/content-request') ?>
    <!-- /.auto-page__request request-bottom -->
</div>

<?php
get_footer();
