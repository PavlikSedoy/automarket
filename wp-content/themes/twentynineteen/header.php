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
                    <form action="" class="search__form" id="header-search-form">
                        <input type="text" class="search__input" id="header-search-input" placeholder="Поиск авто...">
                        <button type="submit" class="search__btn" id="search-btn">
                            <svg version="1.1" class="search__icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 13 13" style="enable-background:new 0 0 13 13;" xml:space="preserve">
                                <path d="M12.8,11.2c0.1,0.1,0.2,0.3,0.2,0.4c0,0.2-0.1,0.3-0.2,0.4l-0.7,0.7C12,12.9,11.8,13,11.7,13c-0.2,0-0.3-0.1-0.4-0.2
	l-2.5-2.5C8.6,10.2,8.5,10,8.5,9.9V9.4c-1,0.8-2,1.1-3.3,1.1c-1,0-1.9-0.2-2.7-0.7C1.8,9.4,1.2,8.8,0.7,7.9C0.2,7.1,0,6.2,0,5.3
	s0.2-1.8,0.7-2.6c0.5-0.8,1.1-1.4,1.9-1.9C3.4,0.3,4.3,0,5.3,0s1.8,0.3,2.6,0.7c0.8,0.5,1.4,1.1,1.9,1.9c0.5,0.8,0.7,1.7,0.7,2.6
	c0,1.2-0.4,2.3-1.1,3.3h0.4c0.2,0,0.3,0.1,0.4,0.2L12.8,11.2z M5.3,8.5c0.6,0,1.1-0.1,1.6-0.4c0.5-0.3,0.9-0.7,1.2-1.2
	c0.3-0.5,0.4-1,0.4-1.7c0-0.6-0.2-1.1-0.4-1.6C7.8,3.1,7.4,2.8,6.9,2.5C6.4,2.2,5.9,2,5.3,2C4.7,2,4.1,2.2,3.6,2.5
	C3.1,2.8,2.7,3.1,2.5,3.7C2.2,4.2,2,4.7,2,5.3c0,0.6,0.1,1.1,0.4,1.7c0.3,0.5,0.7,0.9,1.2,1.2C4.1,8.4,4.7,8.5,5.3,8.5z"/>
                            </svg>
                        </button>
                    </form>
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
    </div>
</header>
<nav class="menu__wr">
    <div class="menu__container container">
        <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
    </div>
</nav>

<main>