<div class="auto-page__request request-bottom">
    <div class="container request-bottom__container">
        <div class="current-avto__content-title page__title auto-page__catalog-title request-bottom__title">
            <h2><?php _e('Подбор авто специалистом') ?></h2>
        </div>
        <div class="request-bottom__desc"><?php _e('Заполните форму и мы подберем Вам идеальный автомобиль!') ?></div>

        <form action="" class="request-bottom__form">
            <div class="request-form__items-wr">

                <!-- Row -->
                <!--                    <div class="request-form__items-row">-->
                <div class="request-form__input-wr request-form__brand">
                    <input type="text" class="request-form__input" placeholder="<?php _e('Марка') ?>" id="car-brand-request">
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

                <div class="request-form__input-wr request-form__model">
                    <input type="text" class="request-form__input" placeholder="<?php _e('Модель') ?>" id="car-model-req">
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

                <div class="request-form__input-wr request-form__location">
                    <input type="text" class="request-form__input" placeholder="<?php _e('Местоположение') ?>" id="car-location">
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
                            <li class="request-form__input-location-list_li"><?php _e('В Украине') ?></li>
                            <li class="request-form__input-location-list_li"><?php _e('В Америке') ?></li>
                            <li class="request-form__input-location-list_li"><?php _e('В Грузии') ?></li>
                            <li class="request-form__input-location-list_li"><?php _e('В пути') ?></li>
                        </ul>
                    </div>
                </div>

                <div class="request-form__range-wr request-form__old">
                    <input id="year-range" type="text" class="js-range-slider" name="my_range" value="" />
                </div>
                <!--                    </div>-->

                <!-- Row -->
                <!--                    <div class="request-form__items-row">-->
                <div class="request-form__input-wr request-form__name">
                    <input type="text" class="request-form__input" placeholder="<?php _e('Имя') ?>">
                    <div class="request-form__img">
                        <img src="<?= get_stylesheet_directory_uri() ?>/images/1home-page-icons/car-search-icons/name-icon.svg">
                    </div>
                </div>

                <div class="request-form__input-wr request-form__phone">
                    <input type="text" class="request-form__input" placeholder="<?php _e('Телефон') ?>">
                    <div class="request-form__img">
                        <img src="<?= get_stylesheet_directory_uri() ?>/images/1home-page-icons/car-search-icons/phone-icon-icon.svg">
                    </div>
                </div>

                <div class="request-form__input-wr request-form__email">
                    <input type="text" class="request-form__input" placeholder="E-mail">
                    <div class="request-form__img">
                        <img src="<?= get_stylesheet_directory_uri() ?>/images/3auto-page-icons/email-icon.svg" alt="">
                    </div>
                </div>

                <div class="request-form__range-wr request-form__price">
                    <input id="price-range-req" type="text" class="js-range-slider" name="my_range" value="" />
                </div>
                <!--                    </div>-->

            </div>

            <div class="request-form__btn-wr">
                <button class="btn btn__width_265 btn__height_50 btn__color_blue" id="submit-request-bottom-form"><?php _e('Подобрать авто') ?></button>
            </div>
        </form>
    </div>
</div>
<!-- /.auto-page__request request-bottom -->