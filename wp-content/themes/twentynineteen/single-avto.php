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
            </div>

            <?php
                foreach ( get_post_meta($post->ID, 'avto-photos') as $img ) :
            ?>
                    <img src="<?= $img['guid'] ?>">
            <?php
                endforeach;
            ?>

        <?php endwhile; ?>
    </div>
</div>

<?php
get_footer();
