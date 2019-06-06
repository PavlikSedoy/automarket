<div class="about-page__asside">
    <h4 class="aside-order__title"><?php _e('Подбор авто специалистом') ?></h4>

    <form action="" class="aside-order__form">
        <div class="aside-order__input-wr">
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

        <div class="aside-order__input-wr">
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

        <div class="aside-order__input-wr">
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
                </ul>
            </div>
        </div>

        <div class="aside-order__input-wr first">
            <input id="year-range" type="text" class="js-range-slider" name="my_range" value="" />
        </div>

        <div class="aside-order__input-wr">
            <input type="text" class="request-form__input" placeholder="<?php _e('Имя') ?>">
            <div class="request-form__img">
                <img src="<?= get_stylesheet_directory_uri() ?>/images/1home-page-icons/car-search-icons/name-icon.svg">
            </div>
        </div>

        <div class="aside-order__input-wr">
            <input type="text" class="request-form__input" placeholder="<?php _e('Телефон') ?>">
            <div class="request-form__img">
                <img src="<?= get_stylesheet_directory_uri() ?>/images/1home-page-icons/car-search-icons/phone-icon-icon.svg">
            </div>
        </div>

        <div class="aside-order__input-wr">
            <input type="text" class="request-form__input" placeholder="<?php _e('E-mail') ?>">
            <div class="request-form__img">
                <img src="<?= get_stylesheet_directory_uri() ?>/images/3auto-page-icons/email-icon.svg" alt="">
            </div>
        </div>

        <div class="aside-order__input-wr first">
            <input id="price-range-req" type="text" class="js-range-slider" name="my_range" value="" />
        </div>

        <button type="submit" class="aside-order__submit btn btn__color_blue btn__width_100 btn__height_50" id="submit-request-bottom-form"><?php _e('Подобрать авто') ?></button>
    </form>
</div>