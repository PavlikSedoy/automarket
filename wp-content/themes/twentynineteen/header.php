<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.min.js"></script>
	<?php wp_head(); ?>
</head>

<body>
<header class="header">
    <div class="container header__container">
        <div class="header__logo">
            <a href="/" class="header__logo_link"></a>
            <img src="<?php bloginfo('template_url') ?>/images/logo.jpg" alt="AutoMarket logo" class="header__logo_img">
        </div>
        <div class="header__contacts">
            <!-- Contact Slider -->
            <div class="contacts__slider">
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <?php
                        $args = array(
                            'post_type' => 'header-contacts',
                            'order' => 'ASC',
                        );
                        $loop = new WP_Query($args);
                        while ($loop->have_posts()) : $loop->the_post();
                    ?>
                    <div class="swiper-slide header__contacts_slide">
                        <!-- Location -->
                        <div class="header__contacts_location_wr">
                            <img src="<?php bloginfo('template_url') ?>/images/top-header-icons/location.svg" class="header__contacts_location_icon" />
                            <a href="https://www.google.com/maps/search/?api=1&query=<?= get_field( "location_coordinates", $post->ID ); ?>" class="header__contacts_location_link" target="_blank"><?= get_field( "address", $post->ID ); ?></a>
                        </div>
                        <!-- Phone -->
                        <div class="header__contacts_location_wr">
                            <img src="<?php bloginfo('template_url') ?>/images/top-header-icons/phone.svg" class="header__contacts_location_icon">
                            <a href="tel:<?= get_field( "phone", $post->ID ); ?>" class="header__contacts_location_link"><?= get_field( "phone", $post->ID ); ?></a>
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
</header>
