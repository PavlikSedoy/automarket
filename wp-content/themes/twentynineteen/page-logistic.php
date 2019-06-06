<?php
/**
 * Template Name: Logistic Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */

get_header();
?>

<div class="logistic">
    <?php
        $c_lang = get_locale();
        if ($c_lang == 'ru_RU') $head_info_id = 257;
        elseif ($c_lang == 'en_US') $head_info_id = 1840;
        elseif ($c_lang == 'ka_GE') $head_info_id = 1841;
    ?>
    <!--  Logistic Header  -->
    <div class="current-avto__header page-header">
        <div class="current-avto__bg">
            <img src="<?= get_the_post_thumbnail_url($head_info_id) ?>">
        </div>
        <div class="container current-avto__header-content-container page-header__content">
            <?php $head_info = get_post($head_info_id) ?>
            <h1 class="current-avto__title"><?= $head_info->post_title ?></h1>

            <div class="page-header__text">
                <p>
                    <?= $head_info->post_content ?>
                </p>
            </div>
        </div>
        <div class="current-avto__path">
            <div class="container current-avto__header-path-container">
                <ul class="current-avto__path_ul">
                    <li class="current-avto__path_li">
                        <a href="/" class="current-avto__path_link"><?php _e('Главная') ?></a>
                    </li>
                    <li class="current-avto__path_li">&nbsp;/&nbsp;<?= the_title() ?></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container logistic__container">
        <div class="current-avto__content-title page__title">
            <h2><?php _e('Как мы работаем') ?></h2>
        </div>

        <div class="logistic__content-wr">

            <div class="logistic__asside">

                <div class="logistic__container-calc-new">
                    <?php get_template_part('template-parts/content/logistic-calculate') ?>
                </div>

                <?php get_template_part('template-parts/content/logistic-container-search') ?>

            </div>

            <div class="logistic__content page__content"><?php the_content() ?></div>

        </div>

    </div>


    <!-- Footer Request -->
    <?php get_template_part('template-parts/content/logistic-footer-request') ?>

</div>

<?php
get_footer();
