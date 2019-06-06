<div class="aside-order">
    <h4 class="aside-order__title"><?php _e('Калькулятор доставки') ?></h4>

    <form action="" class="aside-order__form">
        <div class="aside-order__input-wr">
            <input type="text" name="auction" id="auction" class="aside-order__input" placeholder="<?php _e('Аукцион') ?>" readonly="readonly">
            <img src="<?php bloginfo('template_url') ?>/images/4shipping-page-icons/aukcion-icon.svg" class="aside-order__input_img">
            <div class="request-form__arrow-img">
                <svg width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.99999 5L-4.37114e-07 -7.94466e-08L10 -9.53674e-07L4.99999 5Z" fill="white"/>
                </svg>
            </div>
            <div class="aside-order__input-list" id="auction-list-block">
                <ul class="aside-order__input-list_ul" id="auction-list-ul">
                    <li class="aside-order__input-list_li auction">Manheim</li>
                    <li class="aside-order__input-list_li auction">Adesa</li>
                    <li class="aside-order__input-list_li auction">Copart</li>
                    <li class="aside-order__input-list_li auction">IAAI</li>
                </ul>
            </div>
        </div>

        <div class="aside-order__input-wr">
            <input type="text" name="city" id="logistic-city" class="aside-order__input" placeholder="<?php _e('Город') ?>" readonly="readonly">
            <img src="<?php bloginfo('template_url') ?>/images/4shipping-page-icons/city-icon.svg" class="aside-order__input_img">
            <div class="request-form__arrow-img">
                <svg width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.99999 5L-4.37114e-07 -7.94466e-08L10 -9.53674e-07L4.99999 5Z" fill="white"/>
                </svg>
            </div>
            <div class="aside-order__input-list" id="city-list-block">
                <ul class="aside-order__input-list_ul" id="city-list-ul">
                </ul>
            </div>
        </div>

        <div class="aside-order__input-wr">
            <input type="text" name="port-from" id="port-from" class="aside-order__input" placeholder="<?php _e('Порт погрузки') ?>" readonly="readonly">
            <img src="<?php bloginfo('template_url') ?>/images/4shipping-page-icons/port-pogruzki-icon.svg" class="aside-order__input_img">
            <div class="request-form__arrow-img">
                <svg width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.99999 5L-4.37114e-07 -7.94466e-08L10 -9.53674e-07L4.99999 5Z" fill="white"/>
                </svg>
            </div>
            <div class="aside-order__input-list" id="port-from-list-block">
                <ul class="aside-order__input-list_ul" id="port-from-list-ul">
                    <!--                                    <li class="aside-order__input-list_li port-from">CA-PANCKO</li>-->
                </ul>
            </div>
        </div>

        <div class="aside-order__input-wr">
            <input type="text" name="port-to" id="port-to" class="aside-order__input" placeholder="<?php _e('Порт назначения') ?>" readonly="readonly">
            <img src="<?php bloginfo('template_url') ?>/images/4shipping-page-icons/port-naznachenia-icon.svg" class="aside-order__input_img">
            <div class="request-form__arrow-img">
                <svg width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.99999 5L-4.37114e-07 -7.94466e-08L10 -9.53674e-07L4.99999 5Z" fill="white"/>
                </svg>
            </div>
            <div class="aside-order__input-list" id="port-to-list-block">
                <ul class="aside-order__input-list_ul" id="port-to-list-ul">
                    <!--                                    <li class="aside-order__input-list_li port-to">CA-PANCKO</li>-->
                </ul>
            </div>
        </div>

        <div class="logistic__btn_price">
            <div class="logistic__btn_wr">
                <button type="submit" class="aside-order__submit btn btn__color_blue btn__width_160" id="logistic-calculate"><?php _e('Рассчитать') ?></button>
            </div>
            <div class="logistic__price">
                $ <span id="logistic-finish-price">0</span>
            </div>
        </div>
    </form>
</div>