<?php
/**
 * Template Name: Login Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */

get_header();
?>

    <?php if (!is_user_logged_in()) : ?>
    <div class="reg">
        <div class="container container__reg">
            <div class="current-avto__content-title page__title">
                <h2><?php _e( 'Вход' ) ?></h2>
            </div>

            <?php
            while ( have_posts() ) : the_post();
                ?>
                <div class="reg__form-wr">
                    <div class="reg__title-wr">
                        <h4 class="reg__title"><?php _e('Введите ваши данные') ?></h4>
                    </div>
                    <div class="reg__desc">
                        <p>
                        </p>
                    </div>
                    <div class="reg__form">
                        <?php the_content() ?>
                        <div class="reg__login">
                            <span><?php _e('Нет аккаунта?') ?> <a href="<?= get_page_link(1040) ?>" class="reg__login_link"><?php _e('Зарегистрироваться') ?></a></span>
                        </div>
                    </div>
                </div>
            <?php
            endwhile;
            ?>
        </div>
    </div>
    <?php else: ?>
    <div class="cabinet">
        <div class="container container__cabinet">
            <div class="current-avto__content-title page__title">
                <h2><?php _e( 'Личный кабинет' ) ?></h2>
            </div>

            <div class="cabinet__user-info">
                <span><?php _e( 'Имя компании: ' ) ?><?php
                    $user_id = get_current_user_id();
                    echo get_userdata($user_id)->user_login;
                    ?></span>
                <span><?php _e( 'Номер кабинета: ' ) ?><?= $user_id ?></span>
            </div>

            <div class="cabinet__table-wr">
                <div class="cabinet__table-title_wr">
                    <h4 class="cabinet__table-title"><?php _e( 'Ваши заказы' ) ?></h4>
                </div>

                <div class="table cabinet__table">
                    <table>
                        <thead>
                            <tr>
                                <th><?php _e( '№' ) ?></th>
                                <th><?php _e( 'Марка' ) ?></th>
                                <th><?php _e( 'Модель' ) ?></th>
                                <th><?php _e( 'Vin-код' ) ?></th>
                                <th><?php _e( 'Title' ) ?></th>
                                <th><?php _e( 'В терминале' ) ?></th>
                                <th><?php _e( 'Фото с терминала' ) ?></th>
                                <th><?php _e( 'Местонахождение (порт)' ) ?></th>
                                <th><?php _e( 'Место назначения (порт)' ) ?></th>
                                <th><?php _e( '№ Контейнера' ) ?></th>
                                <th><?php _e( 'Дата покупки' ) ?></th>
                                <th><?php _e( 'Дата погрузки в контейнер' ) ?></th>
                                <th><?php _e( 'Ожидаемая дата прибытия' ) ?></th>
                                <th><?php _e( 'Имя получателя' ) ?></th>
                                <th><?php _e( 'Загран пасспорт' ) ?></th>
                                <th><?php _e( 'ИНН' ) ?></th>
                                <th><?php _e( 'Цена авто' ) ?></th>
                                <th><?php _e( 'Цена доставки по суше' ) ?></th>
                                <th><?php _e( 'Осталось заплатить' ) ?></th>
                                <th><?php _e( 'Инвойс' ) ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Mercedes-Benz</td>
                                <td>Grand Santa Fe</td>
                                <td>JN1WNYD21U0000001</td>
                                <td>
                                    <img src="<?= get_template_directory_uri()?>/images/3auto-page-icons/check-icon.svg" class="check">
                                </td>
                                <td>
                                    <img src="<?= get_template_directory_uri()?>/images/no-icon.svg" class="check">
                                </td>
                                <td>
                                    <div class="table__imgs">
                                        <div class="table__img">
                                            <a href="" class="table__img-link">
                                                <img src="<?= get_template_directory_uri()?>/images/img-icon.svg" class="table-img">
                                                <span>img-1.jpg</span>
                                            </a>
                                        </div>
                                        <div class="table__img">
                                            <a href="" class="table__img-link">
                                                <img src="<?= get_template_directory_uri()?>/images/img-icon.svg" class="table-img">
                                                <span>img-1.jpg</span>
                                            </a>
                                        </div>
                                        <div class="table__img">
                                            <a href="" class="table__img-link">
                                                <img src="<?= get_template_directory_uri()?>/images/img-icon.svg" class="table-img">
                                                <span>img-1.jpg</span>
                                            </a>
                                        </div>
                                        <div class="table__img">
                                            <a href="" class="table__img-link">
                                                <img src="<?= get_template_directory_uri()?>/images/img-icon.svg" class="table-img">
                                                <span>img-1.jpg</span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td>NJ New Jersy</td>
                                <td>Poti</td>
                                <td>AMTU4003372</td>
                                <td>03.05.2019</td>
                                <td>03.06.2019</td>
                                <td>03.07.2019</td>
                                <td>Артурчик Артурчикович</td>
                                <td>ТИУГШ2315128512</td>
                                <td>6679056678</td>
                                <td>23 700 $</td>
                                <td>10 700 $</td>
                                <td>10 100 $</td>
                                <td>
                                    <a href="" class="table__download-invoice">
                                        <?php _e( 'Скачать' ) ?>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php endif ?>

<?php
get_footer();