<?php
    $c_lang = get_locale();
    if ($c_lang == 'ru_RU') {
        $accaunt_page = 1039;
        $reg_page = 1040;
    }
    elseif ($c_lang == 'en_US') {
        $accaunt_page = 1969;
        $reg_page = 1984;
    }
    elseif ($c_lang == 'ka_GE') {
        $accaunt_page = 1977;
        $reg_page = 1986;
    }
?>
<?php if ( is_user_logged_in() ) : ?>
    <!-- Login User -->
    <div class="auth__user" id="auth-user">
        <!--    Showing User Name && Arrow    -->
        <div class="auth__user_name_wr" id="user-name">
            <div class="auth__user_name">
                <?= wp_get_current_user()->user_login ?>
            </div>
            <div class="auth__user_arrow" id="user-name-arrow">
                <svg width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.99999 5L-3.53451e-07 -5.38948e-08L10 -9.28123e-07L4.99999 5Z" fill="black"/>
                </svg>
            </div>
        </div>

        <!--    User Profile Navigation    -->
        <ul class="user-nav" id="user-nav">
            <li class="user-nav__item">
                <a href="<?= get_page_link( $accaunt_page ) ?>" class="user-nav__link"></a>
                <div class="user-nav__item_title">
                    <?php _e('Личный кабинет') ?>
                </div>
            </li>
            <li class="user-nav__item">
                <a href="<?php echo wp_logout_url( get_permalink() ); ?>" class="user-nav__link"></a>
                <div class="user-nav__item_title">
                    <?php _e('Выйти') ?>
                </div>
            </li>
        </ul>
    </div>
<?php else : ?>
    <!-- Logout User -->
    <div class="auth__no-user">
        <div class="auth__no-user_item">
            <a href="<?= get_page_link( $reg_page ) ?>" class="auth_no-user_link"><?php _e('Регистрация') ?></a>
        </div>
        <div class="auth__no-user_item">
            <a href="<?= get_page_link( $accaunt_page ) ?>" class="auth_no-user_link"><?php _e('Вход') ?></a>
        </div>
    </div>
<?php endif; ?>