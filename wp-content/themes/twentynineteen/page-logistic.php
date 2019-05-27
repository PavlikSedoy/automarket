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
    <!--  Logistic Header  -->
    <div class="current-avto__header page-header">
        <div class="current-avto__bg">
            <img src="<?= get_the_post_thumbnail_url(257) ?>">
        </div>
        <div class="container current-avto__header-content-container page-header__content">
            <?php $head_info = get_post(257) ?>
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

    <div class="container logistic__container">
        <div class="current-avto__content-title page__title">
            <h2>Как мы работаем</h2>
        </div>

        <div class="logistic__content-wr">

            <div class="logistic__content page__content"><?php the_content() ?></div>

            <div class="logistic__asside">

                <div class="logistic__container-search-wr">
                    <h4 class="aside-order__title">Поиск контейнера</h4>

                    <div class="logistic__container-search__item">
                        <img src="<?= get_template_directory_uri() ?>/images/4shipping-page-icons/hapag-lloyd.png" class="logistic__container-search-logo">
                        <div class="logistic__container-input-wr">
                            <form action="https://www.hapag-lloyd.com/en/online-business/tracing/tracing-by-container.html" class="logistic__container-input-form" method="get" target="_blank">
                                <input type="text" name="container" class="logistic__container-input" placeholder="Контейнер №">
                                <button class="logistic__container-submit" type="submit"><img src="<?= get_template_directory_uri() ?>/images/4shipping-page-icons/container-search-icon.svg"></button>
                                <img src="<?= get_template_directory_uri() ?>/images/4shipping-page-icons/container-icon.svg" class="logistic__container-input-icon">
                            </form>
                        </div>
                    </div>
                    <!-- /.logistic__container-search__item -->

                    <div class="logistic__container-search__item">
                        <img src="<?= get_template_directory_uri() ?>/images/4shipping-page-icons/maersk.png" class="logistic__container-search-logo">
                        <div class="logistic__container-input-wr">
                            <form action="https://www.hapag-lloyd.com/en/online-business/tracing/tracing-by-container.html" class="logistic__container-input-form" method="get" target="_blank">
                                <input type="text" name="container" class="logistic__container-input" placeholder="Контейнер №" id="maersk-container">
                                <button class="logistic__container-submit" type="submit" id="maersk-container-btn"><img src="<?= get_template_directory_uri() ?>/images/4shipping-page-icons/container-search-icon.svg"></button>
                                <img src="<?= get_template_directory_uri() ?>/images/4shipping-page-icons/container-icon.svg" class="logistic__container-input-icon">
                            </form>
                        </div>
                    </div>
                    <!-- /.logistic__container-search__item -->

                    <div class="logistic__container-search__item">
                        <img src="<?= get_template_directory_uri() ?>/images/4shipping-page-icons/zim.png" class="logistic__container-search-logo">
                        <div class="logistic__container-input-wr">
                            <form action="https://www.zim.com/tools/track-a-shipment" class="logistic__container-input-form" class="logistic__container-input-form" method="get" target="_blank">
                                <input type="text" name="consnumber" class="logistic__container-input" placeholder="Контейнер №">
                                <button class="logistic__container-submit" type="submit"><img src="<?= get_template_directory_uri() ?>/images/4shipping-page-icons/container-search-icon.svg"></button>
                                <img src="<?= get_template_directory_uri() ?>/images/4shipping-page-icons/container-icon.svg" class="logistic__container-input-icon">
                            </form>
                        </div>
                    </div>
                    <!-- /.logistic__container-search__item -->

                    <div class="logistic__container-search__item">
                        <img src="<?= get_template_directory_uri() ?>/images/4shipping-page-icons/parteneri-dtsl-turkon.png" class="logistic__container-search-logo">
                        <div class="logistic__container-input-wr">
                            <form class="logistic__container-input-form" action="http://www.turkon.com/en/Container-Tracking.aspx/" class="logistic__container-input-form" method="get" target="_blank">
                                <input type="text" class="logistic__container-input" placeholder="Контейнер №" name="">
                                <button class="logistic__container-submit" type="submit"><img src="<?= get_template_directory_uri() ?>/images/4shipping-page-icons/container-search-icon.svg"></button>
                                <img src="<?= get_template_directory_uri() ?>/images/4shipping-page-icons/container-icon.svg" class="logistic__container-input-icon">
                            </form>
                        </div>
                    </div>
                    <!-- /.logistic__container-search__item -->

                    <div class="logistic__container-search__item">
                        <img src="<?= get_template_directory_uri() ?>/images/4shipping-page-icons/cosco.png" class="logistic__container-search-logo">
                        <div class="logistic__container-input-wr">
                            <form action="http://elines.coscoshipping.com/ebusiness/cargoTracking?trackingType=CONTAINER" method="get" class="logistic__container-input-form" target="_blank">
                                <input type="text" class="logistic__container-input" placeholder="Контейнер №" name="number">
                                <button class="logistic__container-submit" type="submit"><img src="<?= get_template_directory_uri() ?>/images/4shipping-page-icons/container-search-icon.svg"></button>
                                <img src="<?= get_template_directory_uri() ?>/images/4shipping-page-icons/container-icon.svg" class="logistic__container-input-icon">
                            </form>
                        </div>
                    </div>
                    <!-- /.logistic__container-search__item -->

                    <div class="logistic__container-search__item">
                        <img src="<?= get_template_directory_uri() ?>/images/4shipping-page-icons/msc.png" class="logistic__container-search-logo">
                        <div class="logistic__container-input-wr">
                            <form action="http://bsbg.com.ge/bsbg/msc.php" class="logistic__container-input-form" method="get" target="_blank">
                                <input type="text" class="logistic__container-input" placeholder="Контейнер №" name="number">
                                <button class="logistic__container-submit" type="submit"><img src="<?= get_template_directory_uri() ?>/images/4shipping-page-icons/container-search-icon.svg"></button>
                                <img src="<?= get_template_directory_uri() ?>/images/4shipping-page-icons/container-icon.svg" class="logistic__container-input-icon">
                            </form>
                        </div>
                    </div>
                    <!-- /.logistic__container-search__item -->
                </div>
                <!-- /.logistic__container-search-wr -->

                <div class="aside-order">
                    <h4 class="aside-order__title">Калькулятор доставки</h4>

                    <form action="" class="aside-order__form">
                        <div class="aside-order__input-wr">
                            <input type="text" name="auction" id="auction" class="aside-order__input" placeholder="Аукцион">
                            <img src="<?php bloginfo('template_url') ?>/images/4shipping-page-icons/aukcion-icon.svg" class="aside-order__input_img">
                        </div>

                        <div class="aside-order__input-wr">
                            <input type="text" name="city" id="city" class="aside-order__input" placeholder="Город">
                            <img src="<?php bloginfo('template_url') ?>/images/4shipping-page-icons/city-icon.svg" class="aside-order__input_img">
                        </div>

                        <div class="aside-order__input-wr">
                            <input type="text" name="port-from" id="port-from" class="aside-order__input" placeholder="Порт погрузки">
                            <img src="<?php bloginfo('template_url') ?>/images/4shipping-page-icons/port-pogruzki-icon.svg" class="aside-order__input_img">
                        </div>

                        <div class="aside-order__input-wr">
                            <input type="text" name="port-to" id="port-to" class="aside-order__input" placeholder="Порт назначения">
                            <img src="<?php bloginfo('template_url') ?>/images/4shipping-page-icons/port-naznachenia-icon.svg" class="aside-order__input_img">
                        </div>

                        <div class="logistic__btn_price">
                            <div class="logistic__btn_wr">
                                <button type="submit" class="aside-order__submit btn btn__color_blue btn__width_160">Рассчитать</button>
                            </div>
                            <div class="logistic__price">
                                $ 0
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>

    </div>


    <!-- Footer Request -->
    <div class="logistic__footer-request">
        <div class="logistic__footer-request_bg"></div>

        <div class="container">
            <div class="current-avto__content-title page__title">
                <h2>Остались вопросы?</h2>
            </div>

            <div class="logistic__footer-desc">Заполните форму и мы ответим на все Ваши вопросы!</div>

            <form action="" class="logistic__request-form">
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

                <button type="submit" class="aside-order__submit btn btn__color_blue btn__width_265 btn__height_50" id="submit-logistic-request">Отправить</button>
            </form>

        </div>

    </div>

</div>

<?php
get_footer();
