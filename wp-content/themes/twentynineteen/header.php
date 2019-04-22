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
            <img src="<?php bloginfo('template_url') ?>/images/auto-logo.png" alt="AutoMarket logo" class="header__logo_img">
        </div>

        <!-- Contact Slider -->
        <div class="header__contacts">
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
                            <address class="header__contacts_location_wr">
                                <img src="<?php bloginfo('template_url') ?>/images/top-header-icons/location.svg" class="header__contacts_location_icon" />
                                <a href="https://www.google.com/maps/search/?api=1&query=<?= get_field( "location_coordinates", $post->ID ); ?>" class="header__contacts_location_link" target="_blank"><?= get_field( "address", $post->ID ); ?></a>
                            </address>
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

        <div class="header__controls">
            <div class="header__lang-and-auth">

                <div class="header__lang lang">
                    <ul class="lang__ul">
                        <li class="lang__item">
                            <a href="/" class="lang__link">RU</a>
                        </li>
                        <li class="lang__item">
                            <a href="/" class="lang__link">ENG</a>
                        </li>
                        <li class="lang__item">
                            <a href="/" class="lang__link">GEO</a>
                        </li>
                    </ul>
                </div>

                <div class="header__auth auth">
                    <?php if ( is_user_logged_in() ) : ?>
                        <?= wp_get_current_user()->user_login ?>
                    <?php else : ?>
                        Bxod/Reg
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
</header>
