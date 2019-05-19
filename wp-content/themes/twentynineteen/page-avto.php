<?php
/**
 * Template Name: Avto Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */

get_header();
?>

<div class="auto-page">
    <!--  Header  -->
    <div class="current-avto__header page-header">
        <div class="current-avto__bg">
            <img src="<?= get_stylesheet_directory_uri() ?>/images/headimg.jpg">
        </div>
        <div class="container current-avto__header-content-container page-header__content">
            <h1 class="current-avto__title">Каталог автомобилей</h1>

            <div class="page-header__text">
                <p>
                    В нашем каталоге Вы можете выбрать для себя автомобиль
                    под пригон из Америки или Грузии или уже пригнанный в Украину
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
    <!--  Header End  -->

    <div class="container auto-page__container">

        <div class="auto-page__tabs auto-tabs">
            <div class="auto-tabs__item">
                <a href="/" class="auto-tabs__link active">Все авто</a>
            </div>
            <!-- /.auto-tabs__item -->

            <div class="auto-tabs__item">
                <a href="/" class="auto-tabs__link">Авто в Америке</a>
            </div>
            <!-- /.auto-tabs__item -->

            <div class="auto-tabs__item">
                <a href="/" class="auto-tabs__link">Авто в Грузии</a>
            </div>
            <!-- /.auto-tabs__item -->

            <div class="auto-tabs__item">
                <a href="/" class="auto-tabs__link">Авто в Украине</a>
            </div>
            <!-- /.auto-tabs__item -->

            <div class="auto-tabs__item">
                <a href="/" class="auto-tabs__link">Авто в пути</a>
            </div>
            <!-- /.auto-tabs__item -->
        </div>
        <!-- /.auto-page__tabs -->

        <div class="auto-page__page-content_wr">

            <div class="auto-page__filters">
                <form action="" class="auto-page__filters-form">
                    <!-- Price -->
                    <div class="request-form__range-wr">
                        <input id="price-range" type="text" class="js-range-slider" name="my_range" value="" />
                    </div>

                    <!-- Brand -->
                    <div class="request-form__input-wr">
                        <input type="text" class="auto-page__input" placeholder="Марка" id="car-brand-filters">
                        <div class="request-form__img">
                            <img src="<?= get_stylesheet_directory_uri() ?>/images/1home-page-icons/car-search-icons/car-name-icon.svg">
                        </div>
                        <div class="request-form__arrow-img">
                            <svg width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.99999 5L-4.37114e-07 -7.94466e-08L10 -9.53674e-07L4.99999 5Z" fill="white"/>
                            </svg>
                        </div>

                        <div class="auto-page__input-list" id="car-brand-list-filters">
                            <ul class="auto-page__input-list_ul" id="car-brand-list-ul-filters">
                                <?php
                                    $brand_list = array_unique(get_meta_values('car-brand', 'avto'));
                                    foreach ($brand_list as $brand):
                                ?>
                                    <li class="auto-page__input-list_li brand-item-li"><?= $brand ?></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>

                    <!-- Model -->
                    <div class="request-form__input-wr">
                        <input type="text" class="auto-page__input" placeholder="Модель" id="car-model-filters">
                        <div class="request-form__img">
                            <img src="<?= get_stylesheet_directory_uri() ?>/images/1home-page-icons/car-search-icons/model-icon.svg">
                        </div>
                        <div class="request-form__arrow-img">
                            <svg width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.99999 5L-4.37114e-07 -7.94466e-08L10 -9.53674e-07L4.99999 5Z" fill="white"/>
                            </svg>
                        </div>

                        <div class="auto-page__input-list" id="car-list-filters">
                            <ul class="auto-page__input-list_ul" id="car-models-list-ul-filters">
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.auto-page__filters -->

            <div class="auto-page__content">
                Content
            </div>
            <!-- /.auto-page__content -->

        </div>
        <!-- /.auto-page__page-content_wr -->

    </div>
</div>

<?php
get_footer();
