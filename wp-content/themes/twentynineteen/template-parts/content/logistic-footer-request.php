<div class="logistic__footer-request">
    <div class="logistic__footer-request_bg"></div>

    <div class="container">
        <div class="current-avto__content-title page__title">
            <h2><?php _e('Остались вопросы?') ?></h2>
        </div>

        <div class="logistic__footer-desc"><?php _e('Заполните форму и мы ответим на все Ваши вопросы!') ?></div>

        <form action="" class="logistic__request-form">
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

            <button type="submit" class="aside-order__submit btn btn__color_blue btn__width_265 btn__height_50" id="submit-logistic-request"><?php _e('Отправить') ?></button>
        </form>

    </div>

</div>