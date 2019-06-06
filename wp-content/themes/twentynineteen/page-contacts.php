<?php
/**
 * Template Name: Contacts Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */

get_header();
?>

<div class="page-contacts">
    <?php
        $c_lang = get_locale();
        if ($c_lang == 'ru_RU') $head_info_id = 259;
        elseif ($c_lang == 'en_US') $head_info_id = 1877;
        elseif ($c_lang == 'ka_GE') $head_info_id = 1878;
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


    <div class="container page-contacts__container">

        <div class="current-avto__content-title page__title">
            <h2><?php _e('Наши контакты') ?></h2>
        </div>

        <div class="page__content-wr page-contacts__content-wr">
            <!-- Content -->
            <div class="page__left-side page-contacts__left-side">

                <?php
                    $args = array(
                        'post_type' => 'contact_page',
                        'order' => 'ASC',
                    );
                    $loop = new WP_Query($args);
                    while ($loop->have_posts()) : $loop->the_post();
                ?>
                <!-- Location Card -->
                <article class="page-contacts__location-card location-card">
                    <!-- Location Card Content -->
                    <div class="location-card__content">

                        <div class="location-card__country-wr">
                            <h4 class="location-card__country"><?= the_title() ?></h4>
                        </div>

                        <div class="location-card__location-options">
                            <!-- Location -->
                            <address class="header__contacts_location_wr">
                                <img src="<?php bloginfo('template_url') ?>/images/top-header-icons/location.svg" class="header__contacts_location_icon" />
                                <a href="https://www.google.com/maps/search/?api=1&query=<?= get_field('contact_page_coordinates', $post->ID) ?>" class="header__contacts_location_link" target="_blank"><?= get_field('contact_page_address', $post->ID) ?></a>
                            </address>
                            <!-- Phone -->
                            <div class="header__contacts_location_wr">
                                <img src="<?php bloginfo('template_url') ?>/images/top-header-icons/phone.svg" class="header__contacts_location_icon">
                                <a href="tel:<?= get_field('contact_page_phone', $post->ID) ?>" class="header__contacts_location_link"><?= get_field('contact_page_phone', $post->ID) ?></a>
                            </div>
                        </div>

                        <div class="location-card__social social">
                            <!-- Print Social Icons & Links -->
                            <div class="social__item">
                                <a href="<?= get_field('contact_page_facebook', $post->ID) ?>" class="social__link" target="_blank"></a>
                                <div class="social__img_wr">
                                    <svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 6.7 13" style="enable-background:new 0 0 6.7 13;" xml:space="preserve">
<style type="text/css">
.st0{fill:#FFFFFF;}
</style>
                                        <path class="st0" d="M2,13h2.4V7.2h1.9l0.3-2.3H4.3V3.3c0-0.4,0.1-0.6,0.2-0.8C4.7,2.3,5,2.2,5.5,2.2h1.2V0.1C6.2,0.1,5.6,0,4.9,0
C4,0,3.3,0.3,2.8,0.8C2.2,1.3,2,2.1,2,3v1.8H0v2.3h2V13z"></path>
</svg>
                                </div>
                            </div>

                            <div class="social__item">
                                <a href="<?= get_field('contact_page_instagram', $post->ID) ?>" class="social__link" target="_blank"></a>
                                <div class="social__img_wr">
                                    <svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 11.4 11.4" style="enable-background:new 0 0 11.4 11.4;" xml:space="preserve">
<style type="text/css">
    .st0{fill:#FFFFFF;}
</style>
                                        <path class="st0" d="M5.7,2.8c0.5,0,1,0.2,1.4,0.4c0.5,0.3,0.8,0.6,1.1,1.1c0.3,0.5,0.4,0.9,0.4,1.4c0,0.5-0.2,1-0.4,1.5
	C7.9,7.6,7.6,8,7.1,8.2C6.7,8.5,6.2,8.6,5.7,8.6c-0.5,0-1-0.1-1.5-0.4C3.8,8,3.4,7.6,3.1,7.2C2.9,6.7,2.8,6.2,2.8,5.7
	c0-0.5,0.1-1,0.4-1.4c0.3-0.5,0.6-0.8,1.1-1.1C4.7,2.9,5.2,2.8,5.7,2.8z M5.7,7.6c0.5,0,1-0.2,1.3-0.6c0.4-0.4,0.6-0.8,0.6-1.3
	c0-0.5-0.2-1-0.6-1.3C6.7,4,6.2,3.8,5.7,3.8c-0.5,0-1,0.2-1.3,0.6C4,4.7,3.8,5.2,3.8,5.7c0,0.5,0.2,1,0.6,1.3
	C4.7,7.4,5.2,7.6,5.7,7.6z M9.4,2.6c0-0.2-0.1-0.3-0.2-0.5C9.1,2,8.9,2,8.7,2C8.5,2,8.4,2,8.3,2.2C8.1,2.3,8,2.5,8,2.6
	C8,2.8,8.1,3,8.3,3.1c0.1,0.2,0.3,0.2,0.5,0.2c0.2,0,0.3-0.1,0.5-0.2C9.3,3,9.4,2.8,9.4,2.6z M11.3,3.3c0,0.5,0,1.3,0,2.4
	c0,1.1,0,1.9-0.1,2.4c0,0.5-0.1,0.9-0.2,1.2c-0.2,0.4-0.4,0.8-0.7,1.1c-0.3,0.3-0.7,0.5-1.1,0.7C9,11.2,8.5,11.3,8,11.3
	s-1.3,0-2.4,0c-1.1,0-1.9,0-2.4,0s-0.9-0.1-1.2-0.3c-0.4-0.1-0.8-0.4-1.1-0.7c-0.3-0.3-0.5-0.7-0.7-1.1C0.1,9,0.1,8.6,0,8.1
	c0-0.5,0-1.3,0-2.4c0-1.1,0-1.9,0-2.4c0-0.5,0.1-0.9,0.2-1.3C0.4,1.7,0.6,1.3,0.9,1c0.3-0.3,0.7-0.6,1.1-0.7
	c0.4-0.1,0.8-0.2,1.2-0.2C3.8,0,4.6,0,5.7,0C6.8,0,7.6,0,8,0.1c0.5,0,0.9,0.1,1.3,0.2c0.4,0.2,0.8,0.4,1.1,0.7
	c0.3,0.3,0.6,0.7,0.7,1.1C11.2,2.4,11.3,2.8,11.3,3.3z M10.1,9c0.1-0.3,0.2-0.7,0.2-1.4c0-0.4,0-0.9,0-1.6V5.3c0-0.7,0-1.2,0-1.6
	c-0.1-0.6-0.1-1.1-0.2-1.4C9.9,1.8,9.5,1.4,9,1.2C8.8,1.1,8.3,1.1,7.7,1C7.3,1,6.8,1,6.1,1H5.3C4.6,1,4.1,1,3.7,1
	C3.1,1.1,2.6,1.1,2.3,1.2C1.8,1.4,1.4,1.8,1.2,2.3C1.1,2.6,1.1,3.1,1,3.7c0,0.4,0,0.9,0,1.6v0.8c0,0.7,0,1.2,0,1.6
	c0,0.6,0.1,1.1,0.2,1.4c0.2,0.5,0.6,0.9,1.1,1.1c0.3,0.1,0.7,0.2,1.4,0.2c0.4,0,0.9,0,1.6,0h0.8c0.7,0,1.2,0,1.6,0
	c0.6,0,1.1-0.1,1.4-0.2C9.5,9.9,9.9,9.5,10.1,9z"></path>
</svg>
                                </div>
                            </div>

                            <div class="social__item">
                                <a href="<?= get_field('contact_page_youtube', $post->ID) ?>" class="social__link" target="_blank"></a>
                                <div class="social__img_wr">
                                    <svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 13.9 9.8" style="enable-background:new 0 0 13.9 9.8;" xml:space="preserve">
<style type="text/css">
    .st0{fill:#FFFFFF;}
</style>
                                        <path class="st0" d="M13.6,1.5c0.1,0.5,0.2,1.2,0.3,2.1l0,1.3l0,1.3c-0.1,1-0.2,1.7-0.3,2.1c-0.1,0.3-0.3,0.6-0.5,0.8
	c-0.2,0.2-0.5,0.4-0.8,0.5c-0.5,0.1-1.5,0.2-3.1,0.3l-2.3,0l-2.3,0C3,9.7,2,9.6,1.5,9.5C1.2,9.4,0.9,9.2,0.7,9
	C0.5,8.8,0.4,8.6,0.3,8.3C0.2,7.8,0.1,7.1,0,6.1l0-1.3c0-0.4,0-0.8,0-1.3C0.1,2.7,0.2,2,0.3,1.5C0.4,1.2,0.5,1,0.7,0.7
	c0.2-0.2,0.5-0.4,0.8-0.5C2,0.2,3,0.1,4.6,0l2.3,0l2.3,0c1.6,0.1,2.6,0.2,3.1,0.3c0.3,0.1,0.6,0.3,0.8,0.5C13.3,1,13.5,1.2,13.6,1.5
	z M5.5,7l3.6-2.1L5.5,2.8V7z"></path>
</svg>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Location Card Map -->
                    <div class="location-card__map">
                        <iframe src="<?= get_field('contact_page_iframe_link', $post->ID) ?>" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </article>
                <?php
                    endwhile;
                    wp_reset_query();
                ?>

            </div>

            <div class="page__right-side page-contacts__right-side">

                <h4 class="aside-order__title page-contacts__aside-title"><?php _e('Задайте нам вопрос') ?></h4>

                <form action="" class="aside-order__form">
                    <div class="aside-order__input-wr">
                        <input type="text" name="name" id="name" class="aside-order__input" placeholder="<?php _e('Имя') ?>">
                        <img src="<?php bloginfo('template_url') ?>/images/car-search-icons/name-icon.svg" class="aside-order__input_img">
                    </div>

                    <div class="aside-order__input-wr">
                        <input type="text" name="phone" id="phone" class="aside-order__input" placeholder="<?php _e('Телефон') ?>">
                        <img src="<?php bloginfo('template_url') ?>/images/car-search-icons/phone-icon-icon.svg" class="aside-order__input_img">
                    </div>

                    <div class="aside-order__input-wr">
                        <input type="email" name="email" id="email" class="aside-order__input" placeholder="<?php _e('E-mail') ?>">
                        <img src="<?php bloginfo('template_url') ?>/images/3auto-page-icons/email-icon.svg" class="aside-order__input_img">
                    </div>

                    <div class="aside-order__textarea-wr">
                        <textarea name="contacts-msg" id="contacts-msg" class="aside-order__textarea" placeholder="<?php _e('Ваше сообщение') ?>"></textarea>
                        <img src="<?php bloginfo('template_url') ?>/images/6contacts-page-icons/message-icon.svg" class="aside-order__textarea_img">
                    </div>

                    <button type="submit" class="aside-order__submit btn btn__color_blue btn__width_100 btn__height_50" id="contact-request-form"><?php _e('Отправить вопрос') ?></button>
                </form>

            </div>
        </div>

    </div>

</div>


<?php
get_footer();
