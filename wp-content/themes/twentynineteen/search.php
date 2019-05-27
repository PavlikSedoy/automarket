<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>

    <div class="reviews">

        <div class="container container__reviews">
            <div class="current-avto__content-title page__title">
                <h2>Результаты поиска:</h2>
            </div>


            <div class="popular__avto_wr">

                <?php
                while ( have_posts() ) :
                    the_post();
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
                            <span class="avto__footer_text">Стоимость аналого в Украине</span>
                        </div>
                    </article>
            <?php
                endwhile;
                wp_reset_query();
            ?>
        </div>


    </div>

<?php
get_footer();
