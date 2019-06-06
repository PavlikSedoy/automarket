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
    <?php
        $c_lang = get_locale();
        if ($c_lang == 'ru_RU') $head_info_id = 261;
        elseif ($c_lang == 'en_US') $head_info_id = 1894;
        elseif ($c_lang == 'ka_GE') $head_info_id = 1895;
    ?>
    <!--  News Header  -->
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

        <div class="current-avto__content-title page__title">
            <h2><?php _e('Новости компании') ?></h2>
        </div>

        <div class="page__content-wr">

            <div class="news__content page__content">

                <?php
                  $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

                    $args = array(
                        'post_type' => 'news',
                        'order' => 'DESC',
//                        'posts_per_page' => 10,
                        'paged' => $paged,
                        'page' => $paged
                    );
                    $loop = new WP_Query($args);
                    while ($loop->have_posts()) : $loop->the_post();
                ?>
                    <!-- News Item -->
                    <article class="news-item news__item">
                        <div class="news-item__img" style="background-image: url('<?php the_post_thumbnail_url() ?>');"></div>
                        <div class="news-item__content">
                            <div class="news-item__date">
                                <?= get_the_date('d.m.Y') ?>
                            </div>
                            <div class="news-item__top-part">
                                <div class="news-item__title-wr">
                                    <h3 class="news-item__title"><?php the_title() ?></h3>
                                </div>
                                <div class="news-item__text">
                                    <?php the_excerpt() ?>
                                </div>
                            </div>
                            <div class="news-item__bottom-part">
                                <a href="<?= get_page_link() ?>" class="btn btn__width_265 btn__fz_15 btn__color_blue"><?php _e('Читать полностью') ?></a>
                            </div>
                        </div>
                    </article>
                <?php
                    endwhile;
                    wp_reset_query();
                ?>

            </div>

            <div class="news__asside">
                <div class="popular-news">
                    <h2 class="popular-news__title"><?php _e('Популярные новости') ?></h2>

                    <div class="popular-news__wr">
                        <?php
                        $args = array(
                            'post_type' => 'news',
                            'order' => 'DESC',
                            'meta_key' => 'popular-news',
                            'meta_value' => true,
                            'posts_per_page' => 5
                        );
                        $loop = new WP_Query($args);
                        while ($loop->have_posts()) : $loop->the_post();
                            ?>
                            <div class="popular-news__item">
                                <a href="<?= get_page_link() ?>" class="popular-news__item-link"></a>
                                <div class="popular-news__img" style="background-image: url('<?php the_post_thumbnail_url() ?>');"></div>
                                <div class="popular-news__item-title-wr">
                                    <h3 class="popular-news__item-title">
                                        <?php the_title() ?>
                                    </h3>
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

    </div>

    <?php get_template_part('template-parts/content/content-request') ?>
    <!-- /.auto-page__request request-bottom -->

</div>

<?php
get_footer();
