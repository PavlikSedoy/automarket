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

    <!--  Reviews Header  -->
    <div class="current-avto__header page-header">
        <div class="current-avto__bg">
            <img src="<?= get_the_post_thumbnail_url(259) ?>">
        </div>
        <div class="container current-avto__header-content-container page-header__content">
            <?php $head_info = get_post(259) ?>
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
                        <a href="/" class="current-avto__path_link">Главная</a>
                    </li>
                    <li class="current-avto__path_li">&nbsp;/&nbsp;<?= the_title() ?></li>
                </ul>
            </div>
        </div>
    </div>


    <div class="container page-contacts__container">

        <div class="current-avto__content-title page__title">
            <h2>Наши контакты</h2>
        </div>

        <div class="page__content-wr page-contacts__content-wr">
            <!-- Content -->
            <div class="page__left-side page-contacts__left-side">

                <!-- Location Card -->
                <article class="page-contacts__location-card location-card">
                    <!-- Location Card Content -->
                    <div class="location-card__content">

                        <div class="location-card__country-wr">
                            <h4 class="location-card__country">Украина</h4>
                        </div>

                        <div class="location-card__location-options">
                            <!-- Location -->
                            <address class="header__contacts_location_wr">
                                <img src="<?php bloginfo('template_url') ?>/images/top-header-icons/location.svg" class="header__contacts_location_icon" />
                                <a href="https://www.google.com/maps/search/?api=1&query=50.454791,%2030.522635" class="header__contacts_location_link" target="_blank">Киев, Трехсвятительская 11</a>
                            </address>
                            <!-- Phone -->
                            <div class="header__contacts_location_wr">
                                <img src="<?php bloginfo('template_url') ?>/images/top-header-icons/phone.svg" class="header__contacts_location_icon">
                                <a href="tel:+380507770034" class="header__contacts_location_link">+ 38 (050) 777 00 34</a>
                            </div>
                        </div>

                        <div class="location-card__social social">
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

                    <!-- Location Card Map -->
                    <div class="location-card__map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2540.6360531401506!2d30.47633531590839!3d50.44787939543101!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNTDCsDI2JzUyLjQiTiAzMMKwMjgnNDIuNyJF!5e0!3m2!1suk!2sua!4v1557243687103!5m2!1suk!2sua" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </article>


                <!-- Location Card -->
                <article class="page-contacts__location-card location-card">
                    <!-- Location Card Content -->
                    <div class="location-card__content">

                        <div class="location-card__country-wr">
                            <h4 class="location-card__country">Украина</h4>
                        </div>

                        <div class="location-card__location-options">
                            <!-- Location -->
                            <address class="header__contacts_location_wr">
                                <img src="<?php bloginfo('template_url') ?>/images/top-header-icons/location.svg" class="header__contacts_location_icon" />
                                <a href="https://www.google.com/maps/search/?api=1&query=50.454791,%2030.522635" class="header__contacts_location_link" target="_blank">Киев, Трехсвятительская 11</a>
                            </address>
                            <!-- Phone -->
                            <div class="header__contacts_location_wr">
                                <img src="<?php bloginfo('template_url') ?>/images/top-header-icons/phone.svg" class="header__contacts_location_icon">
                                <a href="tel:+380507770034" class="header__contacts_location_link">+ 38 (050) 777 00 34</a>
                            </div>
                        </div>

                        <div class="location-card__social social">
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

                    <!-- Location Card Map -->
                    <div class="location-card__map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2540.6360531401506!2d30.47633531590839!3d50.44787939543101!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNTDCsDI2JzUyLjQiTiAzMMKwMjgnNDIuNyJF!5e0!3m2!1suk!2sua!4v1557243687103!5m2!1suk!2sua" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </article>



                <!-- Location Card -->
                <article class="page-contacts__location-card location-card">
                    <!-- Location Card Content -->
                    <div class="location-card__content">

                        <div class="location-card__country-wr">
                            <h4 class="location-card__country">Украина</h4>
                        </div>

                        <div class="location-card__location-options">
                            <!-- Location -->
                            <address class="header__contacts_location_wr">
                                <img src="<?php bloginfo('template_url') ?>/images/top-header-icons/location.svg" class="header__contacts_location_icon" />
                                <a href="https://www.google.com/maps/search/?api=1&query=50.454791,%2030.522635" class="header__contacts_location_link" target="_blank">Киев, Трехсвятительская 11</a>
                            </address>
                            <!-- Phone -->
                            <div class="header__contacts_location_wr">
                                <img src="<?php bloginfo('template_url') ?>/images/top-header-icons/phone.svg" class="header__contacts_location_icon">
                                <a href="tel:+380507770034" class="header__contacts_location_link">+ 38 (050) 777 00 34</a>
                            </div>
                        </div>

                        <div class="location-card__social social">
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

                    <!-- Location Card Map -->
                    <div class="location-card__map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2540.6360531401506!2d30.47633531590839!3d50.44787939543101!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNTDCsDI2JzUyLjQiTiAzMMKwMjgnNDIuNyJF!5e0!3m2!1suk!2sua!4v1557243687103!5m2!1suk!2sua" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </article>

            </div>

            <div class="page__right-side page-contacts__right-side">

                <h4 class="aside-order__title page-contacts__aside-title">Задайте нам вопрос</h4>

                <form action="" class="aside-order__form">
                    <div class="aside-order__input-wr">
                        <input type="text" name="name" id="name" class="aside-order__input" placeholder="Имя">
                        <img src="<?php bloginfo('template_url') ?>/images/car-search-icons/name-icon.svg" class="aside-order__input_img">
                    </div>

                    <div class="aside-order__input-wr">
                        <input type="text" name="phone" id="phone" class="aside-order__input" placeholder="Телефон">
                        <img src="<?php bloginfo('template_url') ?>/images/car-search-icons/phone-icon-icon.svg" class="aside-order__input_img">
                    </div>

                    <div class="aside-order__input-wr">
                        <input type="email" name="email" id="email" class="aside-order__input" placeholder="E-mail">
                        <img src="<?php bloginfo('template_url') ?>/images/3auto-page-icons/email-icon.svg" class="aside-order__input_img">
                    </div>

                    <div class="aside-order__textarea-wr">
                        <textarea name="contacts-msg" id="contacts-msg" class="aside-order__textarea" placeholder="Ваше сообщение"></textarea>
                        <img src="<?php bloginfo('template_url') ?>/images/6contacts-page-icons/message-icon.svg" class="aside-order__textarea_img">
                    </div>

                    <button type="submit" class="aside-order__submit btn btn__color_blue btn__width_100 btn__height_50">Отправить вопрос</button>
                </form>

            </div>
        </div>

    </div>

</div>


<?php
get_footer();
