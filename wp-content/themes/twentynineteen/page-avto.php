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

    </div>
</div>

<?php
get_footer();
