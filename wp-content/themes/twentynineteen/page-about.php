<?php
/**
 * Template Name: About Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */

get_header();
?>

<div class="about-page">
    <?php
        $c_lang = get_locale();
        if ($c_lang == 'ru_RU') $head_info_id = 260;
        elseif ($c_lang == 'en_US') $head_info_id = 1885;
        elseif ($c_lang == 'ka_GE') $head_info_id = 1886;
    ?>
    <!--  Reviews Header  -->
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

    <div class="container about-page__container">

        <?php
            $n = 0;
            $args = array(
                'post_type' => 'about_us_page',
                'order' => 'ASC',
            );
            $loop = new WP_Query($args);
            while ($loop->have_posts()) : $loop->the_post();
            $n++;
        ?>
        <div class="current-avto__content-title page__title">
            <h2><?= the_title() ?></h2>
        </div>

        <div class="page__content-wr">

            <div class="about-page__content page__content">

                <?= the_content(); ?>

            </div>

            <?php if ($n == 1) : ?>
                <?php get_template_part('template-parts/content/about-aside-request') ?>
            <?php elseif ($n == 2) : ?>
                    <?php get_template_part('template-parts/content/logistic-calculate') ?>
            <?php endif; ?>

        </div>
        <?php
            endwhile;
            wp_reset_query();
        ?>

    </div>

</div>

<?php
get_footer();
