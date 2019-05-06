<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>

</main>

<footer class="footer">
    <div class="container footer__container">
        <div class="footer__info-wr">
            <img src="<?php bloginfo('template_url') ?>/images/auto-logo.png" alt="AutoMarket logo" class="footer__info-wr_logo">

            <div class="footer__info-wr_content">
                <p>
                    Компания “Auto Market” с 2012 го года
                    предлагает полный пакет услуг по
                    транспортировке автомобиля из США
                    в Грузию, и в Украину. Мы поможем
                    Вам, как в выборе так и покупке и
                    транспортировке автомобиля до
                    Украины, с минимальными затратами.
                    Мы можем купить для Вас машину на
                    любом большом аукционе или
                    дилерной компании в США и доставим
                    в порт Одессы.
                </p>
            </div>

            <div class="footer__info-wr_social social">
                <!-- Print Social Icons & Links -->
                <?php
                    $args = array(
                        'post_type' => 'header-social',
                        'order' => 'ASC',
                    );
                    $loop = new WP_Query($args);
                    while ($loop->have_posts()) : $loop->the_post();
                        ?>
                        <div class="social__item">
                            <a href="<?= get_field('social-link', $post->ID) ?>" class="social__link" target="_blank"></a>
                            <div class="social__img_wr">
                                <?= get_the_content() ?>
                            </div>
                        </div>
                    <?php
                    endwhile;
                    wp_reset_query();
                ?>
            </div>
        </div>

        <div class="footer__contacts">
            <h4 class="footer__contacts_title">Контакты</h4>

            <ul class="footer__contacts_ul">
                <?php
                    $args = array(
                        'post_type' => 'header-contacts',
                        'order' => 'ASC',
                    );
                    $loop = new WP_Query($args);
                    while ($loop->have_posts()) : $loop->the_post();
                ?>
                    <li class="footer__contacts_item">
                        <address class="footer__contacts_item-row">
                            <img src="<?php bloginfo('template_url') ?>/images/top-header-icons/location.svg" class="footer__contacts_item-row_icon" />
                            <a href="https://www.google.com/maps/search/?api=1&query=<?= get_field( "location_coordinates", $post->ID ); ?>" class="footer__contacts_item-row_link" target="_blank"><?= get_field( "address", $post->ID ); ?></a>
                        </address>

                        <span class="footer__contacts_item-row">
                            <img src="<?php bloginfo('template_url') ?>/images/top-header-icons/phone.svg" class="footer__contacts_item-row_icon" />
                            <a href="https://www.google.com/maps/search/?api=1&query=<?= get_field( "phone", $post->ID ); ?>" class="footer__contacts_item-row_link" target="_blank"><?= get_field( "phone", $post->ID ); ?></a>
                        </span>
                    </li>
                <?php
                    endwhile;
                    wp_reset_query();
                ?>
                <li class="footer__contacts_item">
                    <span class="footer__contacts_item-row">
                        <img src="<?php bloginfo('template_url') ?>/images/icons-footer/mail.svg" class="footer__contacts_item-row_icon" />
                        <a href="mailto:automarkua@gmail.com" class="footer__contacts_item-row_link" target="_blank">automarkua@gmail.com</a>
                    </span>

                    <span class="footer__contacts_item-row">
                            <img src="<?php bloginfo('template_url') ?>/images/icons-footer/time-icon.svg" class="footer__contacts_item-row_icon" />
                            <span class="footer__contacts_item-row_link" target="_blank">
                                ПН-ПТ: с 10:00 до 18:00<br>
                                СБ: с 10:00 до 14:00<br>
                                ВС: выходной
                            </span>
                    </span>
                </li>
            </ul>

        </div>

        <div class="footer__menu">
            <h4 class="footer__contacts_title">Меню</h4>

            <?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
        </div>

        <div class="footer__call-back">
            <h4 class="footer__contacts_title">Обратная связь</h4>

            <form action="" class="aside-order__form">
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

                <button type="submit" class="aside-order__submit btn btn__color_blue btn__width_100">Перезвоните мне</button>
            </form>
        </div>
    </div>
    <div class="footer__copyright">
        © 2019 Auto Market | All rights reserved
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
