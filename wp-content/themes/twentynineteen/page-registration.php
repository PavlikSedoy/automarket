<?php
/**
 * Template Name: Registration Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */

get_header();
?>

    <div class="reg">
        <div class="container container__reg">
            <div class="current-avto__content-title page__title">
                <h2><?php _e( 'Регистрация' ) ?></h2>
            </div>

            <?php
                while ( have_posts() ) : the_post();
            ?>
                <div class="reg__form-wr">
                    <div class="reg__title-wr">
                        <h4 class="reg__title"><?php _e('Заполните форму') ?></h4>
                    </div>
                    <div class="reg__desc">
                        <p>
                            <?php _e('Регистрация на сайте производится только для юридически зарегистрированных компаний.') ?>
                        </p>
                    </div>
                    <div class="reg__form">
                        <?php the_content() ?>
                        <div class="reg__login">
                            <span><?php _e('Уже имеете аккаунт?') ?> <a href="<?= get_page_link(1039) ?>" class="reg__login_link"><?php _e('Войти') ?></a></span>
                        </div>
                    </div>
                </div>
            <?php
                endwhile;
            ?>
        </div>


    </div>

<?php
get_footer();