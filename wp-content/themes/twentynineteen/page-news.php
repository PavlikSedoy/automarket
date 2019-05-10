<?php
/**
 * Template Name: News Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */

get_header();
?>

<div class="news">

    <!--  News Header  -->
    <div class="current-avto__header page-header">
        <div class="current-avto__bg">
            <img src="<?= get_stylesheet_directory_uri() ?>/images/headimg.jpg">
        </div>
        <div class="container current-avto__header-content-container page-header__content">
            <h1 class="current-avto__title"><?= the_title() ?></h1>

            <div class="page-header__text">
                <p>
                    Узнайте больше о нашей компании
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

    <div class="container about-page__container">

        <div class="current-avto__content-title page__title">
            <h2>Компания  Auto Market</h2>
        </div>

        <div class="page__content-wr">

            <div class="news__content page__content">

                ss

            </div>

            <div class="news__asside">
                ss
            </div>

        </div>

    </div>

</div>

<?php
get_footer();
