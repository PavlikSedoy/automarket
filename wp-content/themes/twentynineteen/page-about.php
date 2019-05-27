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
    <!--  Reviews Header  -->
    <div class="current-avto__header page-header">
        <div class="current-avto__bg">
            <img src="<?= get_the_post_thumbnail_url(260) ?>">
        </div>
        <div class="container current-avto__header-content-container page-header__content">
            <?php $head_info = get_post(260) ?>
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

    <div class="container about-page__container">

        <div class="current-avto__content-title page__title">
            <h2>Компания  Auto Market</h2>
        </div>

        <div class="page__content-wr">

            <div class="about-page__content page__content">

                <p>
                    Компания “Auto Market” с 2012 го года предлагает полный пакет услуг по транспортировке автомобиля из США в Грузию, и в Украину. Мы поможем Вам, как в выборе так и покупке и транспортировке автомобиля до Украины, с минимальными затратами. Мы можем купить для Вас машину на любом большом аукционе или дилерной компании в США и доставим в порт Одессы.
                </p>

                <p>
                    Auto Market всегда пытается грамотно организовать процесс транспортировки груза. И стоит выше обычных грузоперевозчиков, так как выдаёт им задания и контролирует выполнение работы.
                </p>

                <h4>Транспортная логистика обычно состоит из следующих звеньев:</h4>

                <ul>
                    <li>Грузоперевозки из одной точки в другую;</li>
                    <li>Экспедирование в портах;</li>
                    <li>Ответственное хранение товаров на складах;</li>
                    <li>Таможенное оформление, очистка;</li>
                    <li>Оформление других разрешительных документов;</li>
                    <li>Решение вопроса страховки товаров;</li>
                    <li>Консультирование по мере необходимости.</li>
                </ul>

                <p>
                    Многие производственные и торговые предприятия работают на экспорт, а также осуществляют закупку импортных товаров. Им не следует беспокоиться о доставке продукции в другие страны или наоборот. Этот процесс требует специальных навыков, налаженных контактов и знания готовых логистических решений. Поэтому лучше поручить это дело профессионалам.
                </p>

            </div>

            <div class="about-page__asside">
                <h4 class="aside-order__title">Подбор авто специалистом</h4>

                <form action="" class="aside-order__form">
                    <div class="aside-order__input-wr">
                        <input type="text" class="request-form__input" placeholder="Марка" id="car-brand-request">
                        <div class="request-form__img">
                            <img src="<?= get_stylesheet_directory_uri() ?>/images/1home-page-icons/car-search-icons/car-name-icon.svg">
                        </div>
                        <div class="request-form__arrow-img">
                            <svg width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.99999 5L-4.37114e-07 -7.94466e-08L10 -9.53674e-07L4.99999 5Z" fill="white"/>
                            </svg>
                        </div>
                        <div class="auto-page__input-list" id="car-brand-list-request">
                            <ul class="auto-page__input-list_ul" id="car-brand-list-ul-request">
                            </ul>
                        </div>
                    </div>

                    <div class="aside-order__input-wr">
                        <input type="text" class="request-form__input" placeholder="Модель" id="car-model-req">
                        <div class="request-form__img">
                            <img src="<?= get_stylesheet_directory_uri() ?>/images/1home-page-icons/car-search-icons/model-icon.svg">
                        </div>
                        <div class="request-form__arrow-img">
                            <svg width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.99999 5L-4.37114e-07 -7.94466e-08L10 -9.53674e-07L4.99999 5Z" fill="white"/>
                            </svg>
                        </div>
                        <div class="auto-page__input-list" id="car-model-list-request">
                            <ul class="auto-page__input-list_ul" id="car-model-list-ul-request">
                            </ul>
                        </div>
                    </div>

                    <div class="aside-order__input-wr">
                        <input type="text" class="request-form__input" placeholder="Местоположение" id="car-location">
                        <div class="request-form__img">
                            <img src="<?= get_stylesheet_directory_uri() ?>/images/1home-page-icons/car-search-icons/location-icon.svg">
                        </div>
                        <div class="request-form__arrow-img">
                            <svg width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.99999 5L-4.37114e-07 -7.94466e-08L10 -9.53674e-07L4.99999 5Z" fill="white"/>
                            </svg>
                        </div>

                        <div class="request-form__input-location-list" id="car-location-list">
                            <ul class="request-form__input-location-list_ul" id="car-models-list-ul">
                                <li class="request-form__input-location-list_li">В Украине</li>
                                <li class="request-form__input-location-list_li">В Америке</li>
                                <li class="request-form__input-location-list_li">В Грузии</li>
                            </ul>
                        </div>
                    </div>

                    <div class="aside-order__input-wr first">
                        <input id="year-range" type="text" class="js-range-slider" name="my_range" value="" />
                    </div>

                    <div class="aside-order__input-wr">
                        <input type="text" class="request-form__input" placeholder="Имя">
                        <div class="request-form__img">
                            <img src="<?= get_stylesheet_directory_uri() ?>/images/1home-page-icons/car-search-icons/name-icon.svg">
                        </div>
                    </div>

                    <div class="aside-order__input-wr">
                        <input type="text" class="request-form__input" placeholder="Телефон">
                        <div class="request-form__img">
                            <img src="<?= get_stylesheet_directory_uri() ?>/images/1home-page-icons/car-search-icons/phone-icon-icon.svg">
                        </div>
                    </div>

                    <div class="aside-order__input-wr">
                        <input type="text" class="request-form__input" placeholder="E-mail">
                        <div class="request-form__img">
                            <img src="<?= get_stylesheet_directory_uri() ?>/images/3auto-page-icons/email-icon.svg" alt="">
                        </div>
                    </div>

                    <div class="aside-order__input-wr first">
                        <input id="price-range-req" type="text" class="js-range-slider" name="my_range" value="" />
                    </div>

                    <button type="submit" class="aside-order__submit btn btn__color_blue btn__width_100 btn__height_50" id="submit-request-bottom-form">Подобрать авто</button>
                </form>
            </div>

        </div>


        <div class="current-avto__content-title page__title">
            <h2>Логистика от  Auto Market</h2>
        </div>

        <div class="page__content-wr">

            <div class="about-page__content page__content">

                <p>
                    Компания “Auto Market” с 2012 го года предлагает полный пакет услуг по транспортировке автомобиля из США в Грузию, и в Украину. Мы поможем Вам, как в выборе так и покупке и транспортировке автомобиля до Украины, с минимальными затратами. Мы можем купить для Вас машину на любом большом аукционе или дилерной компании в США и доставим в порт Одессы.
                </p>

                <p>
                    Auto Market всегда пытается грамотно организовать процесс транспортировки груза. И стоит выше обычных грузоперевозчиков, так как выдаёт им задания и контролирует выполнение работы.
                </p>

                <h4>Транспортная логистика обычно состоит из следующих звеньев:</h4>

                <ul>
                    <li>Грузоперевозки из одной точки в другую;</li>
                    <li>Экспедирование в портах;</li>
                    <li>Ответственное хранение товаров на складах;</li>
                    <li>Таможенное оформление, очистка;</li>
                    <li>Оформление других разрешительных документов;</li>
                    <li>Решение вопроса страховки товаров;</li>
                    <li>Консультирование по мере необходимости.</li>
                </ul>

                <p>
                    Многие производственные и торговые предприятия работают на экспорт, а также осуществляют закупку импортных товаров. Им не следует беспокоиться о доставке продукции в другие страны или наоборот. Этот процесс требует специальных навыков, налаженных контактов и знания готовых логистических решений. Поэтому лучше поручить это дело профессионалам.
                </p>

            </div>

            <div class="about-page__asside">
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

</div>

<?php
get_footer();
