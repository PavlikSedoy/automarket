<?php
/**
 * Template Name: Reviews Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */

get_header();
?>

<div class="reviews">
    <?php
        $c_lang = get_locale();
        if ($c_lang == 'ru_RU') $head_info_id = 258;
        elseif ($c_lang == 'en_US') $head_info_id = 1847;
        elseif ($c_lang == 'ka_GE') $head_info_id = 1848;
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

    <div class="container container__reviews">
        <div class="current-avto__content-title page__title">
            <h2><?php _e('Наши Довольные клиенты') ?></h2>
        </div>


        <!-- Tabs -->
        <div class="reviews__tabs tabs">
            <div class="tabs__header left-active">
                <div class="tabs__header_item" data-tab="desc"><?php _e('Отзывы') ?></div>
                <div class="tabs__header_item" data-tab="equipment"><?php _e('Видео отзывы') ?></div>
            </div>

            <!-- Tabs Wrapper -->
            <div class="tabs__tabs-wr">
                <!-- Standart Review Tab -->
                <div class="tabs__tab active" id="desc-tab">

                    <!-- Slider -->
                    <div class="swiper-container reviews__current-comment">
                        <div class="swiper-wrapper">
                            <?php
                                $args = array(
                                    'post_type' => 'reviews',
                                    'order' => 'DESC',
                                );
                                $loop = new WP_Query($args);
                                while ($loop->have_posts()) : $loop->the_post();
                            ?>
                            <div class="swiper-slide">
                                <div class="reviews__current-comment_text">
                                    <?= the_content() ?>
                                </div>
                            </div>
                            <?php
                                endwhile;
                                wp_reset_query();
                            ?>
                        </div>
                        <!-- Add Arrows -->
                    </div>

                    <div class="reviews__author-comment_wr">
                        <div class="swiper-container reviews__author-comment">
                            <div class="swiper-wrapper">
                                <?php
                                    $args = array(
                                        'post_type' => 'reviews',
                                        'order' => 'DESC',
                                    );
                                    $loop = new WP_Query($args);
                                    while ($loop->have_posts()) : $loop->the_post();
                                ?>
                                <div class="swiper-slide reviews__author">
                                    <div class="reviews__author_avatar-wr">
                                        <div class="reviews__author_avatar" style="background-image: url(<?= the_post_thumbnail_url() ?>);"></div>
                                    </div>
                                    <div class="reviews__author_name_wr">
                                        <div class="reviews__author_name"><?= the_title() ?></div>
                                    </div>
                                    <div class="reviews__author_auto_wr">
                                        <div class="reviews__author_auto"><?= get_field('review_auto', $post->ID) ?></div>
                                    </div>
                                </div>
                                <?php
                                    endwhile;
                                    wp_reset_query();
                                ?>
                            </div>
                        </div>

                        <div class="swiper-button_wr">
                            <div class="current-avto__button-next swiper-button-white"></div>
                            <div class="current-avto__button-prev swiper-button-white"></div>
                        </div>
                    </div>

                </div>

                <!-- Video Review Tab -->
                <div class="tabs__tab" id="equipment-tab">

                    <!-- Videos Wrapper -->
                    <div class="reviews__video-wr">

                        <!-- Video Item -->
                        <?php
                            $args = array(
                                'post_type' => 'video-reviews',
                                'order' => 'DESC',
                            );
                            $loop = new WP_Query($args);
                            while ($loop->have_posts()) : $loop->the_post();
                        ?>
                            <div class="reviews__video-item">
                                <iframe width="100%" height="315" src="<?= get_field('video-review-link', $post->ID) ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                <span class="reviews__video-item_name"><?= the_title() ?></span>

                                <span class="reviews__video-item_car-name"><?= get_field('review_avto_brand_model', $post->ID) ?></span>

                                <div class="reviews__video-item_desc">
                                    <?= the_content() ?>
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


</div>

<?php
get_footer();
