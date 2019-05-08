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
                        <input type="text" class="aside-order__input" placeholder="Марка">
                        <img src="<?php bloginfo('template_url') ?>/images/car-search-icons/car-name-icon.svg" class="aside-order__input_img">
                    </div>

                    <div class="aside-order__input-wr">
                        <input type="text" class="aside-order__input" placeholder="Модель">
                        <img src="<?php bloginfo('template_url') ?>/images/car-search-icons/model-icon.svg" class="aside-order__input_img">
                    </div>

                    <div class="aside-order__input-wr">
                        <input type="text" class="aside-order__input" placeholder="Год от">
                        <img src="<?php bloginfo('template_url') ?>/images/car-search-icons/calendar-icon.svg" class="aside-order__input_img">
                    </div>

                    <div class="aside-order__input-wr">
                        <input type="text" class="aside-order__input" placeholder="Год до">
                        <img src="<?php bloginfo('template_url') ?>/images/car-search-icons/calendar-icon.svg" class="aside-order__input_img">
                    </div>

                    <div class="aside-order__input-wr">
                        <input type="text" class="aside-order__input" placeholder="Местоположение">
                        <img src="<?php bloginfo('template_url') ?>/images/car-search-icons/location-icon.svg" class="aside-order__input_img">
                    </div>

                    <div class="aside-order__input-wr">
                        <input type="text" class="aside-order__input" placeholder="Имя">
                        <img src="<?php bloginfo('template_url') ?>/images/car-search-icons/name-icon.svg" class="aside-order__input_img">
                    </div>

                    <div class="aside-order__input-wr">
                        <input type="text" class="aside-order__input" placeholder="Телефон">
                        <img src="<?php bloginfo('template_url') ?>/images/car-search-icons/phone-icon-icon.svg" class="aside-order__input_img">
                    </div>

                    <div class="aside-order__input-wr">
                        <input type="text" class="aside-order__input" placeholder="E-mail">
                        <img src="<?php bloginfo('template_url') ?>/images/3auto-page-icons/email-icon.svg" class="aside-order__input_img">
                    </div>

                    <button type="submit" class="aside-order__submit btn btn__color_blue btn__width_100 btn__height_50">Подобрать авто</button>
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
