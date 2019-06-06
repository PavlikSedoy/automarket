<?php
/**
 * Template Name: Single News Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */

get_header();
?>

    <div class="news current-news">
        <?php
            $c_lang = get_locale();
            if ($c_lang == 'ru_RU') $head_info_id = 43;
            elseif ($c_lang == 'en_US') $head_info_id = 1792;
            elseif ($c_lang == 'ka_GE') $head_info_id = 1827;
        ?>
        <!--  News Header  -->
        <div class="current-avto__header page-header current-news__header">
            <div class="current-avto__path">
                <div class="container current-avto__header-path-container">
                    <ul class="current-avto__path_ul">
                        <li class="current-avto__path_li">
                            <a href="/" class="current-avto__path_link"><?php _e('Главная') ?></a>
                        </li>
                        <li class="current-avto__path_li">&nbsp;/&nbsp;<a href="<?= get_page_link( $head_info_id ) ?>"><?php _e('Новости') ?></a></li>
                        <li class="current-avto__path_li">&nbsp;/&nbsp;<?= the_title() ?></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container about-page__container">

            <h1 class="current-news__title"><?= the_title() ?></h1>

            <div class="page__content-wr">

                <div class="news__content page__content">

                    <img src="<?= get_the_post_thumbnail_url() ?>" class="current-news__thumb">

                    <?= the_content() ?>

<!--                    <div class="current-news__share">-->
<!--                        <div class="current-news__share_title">Поделиться статьей</div>-->
<!--                        <div class="current-new__share_social">-->
<!--                            -->
<!--                        </div>-->
<!--                    </div>-->

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