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
                <!-- Slides -->
                <?php
                    $args = array(
                        'post_type' => 'header-contacts',
                        'order' => 'ASC',
                    );
                    $loop = new WP_Query($args);
                    while ($loop->have_posts()) : $loop->the_post();
                ?>
                    <div class="header__contacts_slide">
                        <!-- Location -->
                        <address class="header__contacts_location_wr">
                            <img src="<?php bloginfo('template_url') ?>/images/top-header-icons/marker.svg" class="header__contacts_location_icon" />
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
                    <?php get_template_part('template-parts/header/auth' ) ?>
                </div>

            </div>

            <div class="header__search-and-social">
                <div class="header__search search">
                    <?php get_search_form() ?>
                </div>

                <div class="header__social social">
                    <!-- Print Social Icons & Links -->
                    <?php
                        $args = array(
                            'post_type' => 'header-social',
                            'order' => 'ASC',
                        );
                        $loop = new WP_Query($args);
                        while ($loop->have_posts()) : $loop->the_post();
                    ?>
                        <div class="social__item">
                            <a href="<?= get_field('social-link', $post->ID) ?>" class="social__link" target="_blank"></a>
                            <div class="social__img_wr">
                                <?= get_the_content() ?>
                            </div>
                        </div>
                    <?php
                        endwhile;
                        wp_reset_query();
                    ?>
                </div>
            </div>
        </div>

        <div class="header__hamburger">
            <div class="hamburger hamburger--slider
">
                <div class="hamburger-box">
                    <div class="hamburger-inner"></div>
                </div>
            </div>
        </div>

        <div class="mobile-nav" id="mobile-nav">
            <div class="mobile-nav__container container">
                <div class="mobile-nav__header">
                    <h4 class="mobile-nav__title">Меню</h4>
                </div>

                <div class="mobile-nav__footer">
                    <div class="mobile-nav__lang lang">
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
                    <div class="mobile-nav__auth auth">
                        <?php get_template_part('template-parts/header/auth' ) ?>
                    </div>
                </div>
            </div>
            <!-- /#mobile-nav.mobile-nav -->
            </div>
    </div>
</header>
<nav class="menu__wr">
    <div class="menu__container container">
        <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
    </div>
</nav>

<main>