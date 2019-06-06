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
                <span><?php _e( 'Имя компании: ' ) ?>&nbsp;<?php
                    $user_id = get_current_user_id();
                    echo get_userdata($user_id)->user_login;
                    ?></span>
                <span><?php _e( 'Номер кабинета: ' ) ?>&nbsp;<?= $user_id ?></span>
            </div>

            <div class="cabinet__table-wr">
                <div class="cabinet__table-title_wr">
                    <h4 class="cabinet__table-title"><?php _e( 'Ваши заказы', 'automarket' ) ?></h4>
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
                            <?php
                                $n = 0;
                                $args = array(
                                    'post_type' => 'requests',
                                    'order' => 'DESC',
                                    'meta_key' => 'cab_number',
                                    'meta_value' => $user_id,
                                );
                                $loop = new WP_Query($args);
                                while ($loop->have_posts()) : $loop->the_post();
                                $n++;
                            ?>
                            <tr>
                                <td><?= $n ?></td>
                                <td><?= get_field('cabinet_brand', $post->ID) ?></td>
                                <td><?= get_field('cabinet_model', $post->ID) ?></td>
                                <td><?= get_field('vin_code', $post->ID) ?></td>
                                <td>
                                    <?php
                                        $cab_title = get_field('cabinet_title', $post->ID);
                                        if ($cab_title) :
                                    ?>
                                        <img src="<?= get_template_directory_uri()?>/images/3auto-page-icons/check-icon.svg" class="check">
                                    <?php else : ?>
                                        <img src="<?= get_template_directory_uri()?>/images/no-icon.svg" class="check">
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php
                                    $cab_title = get_field('cabinet_terminal', $post->ID);
                                    if ($cab_title) :
                                        ?>
                                        <img src="<?= get_template_directory_uri()?>/images/3auto-page-icons/check-icon.svg" class="check">
                                    <?php else : ?>
                                        <img src="<?= get_template_directory_uri()?>/images/no-icon.svg" class="check">
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="table__imgs">
                                    <?php
                                        $y = 0;
                                        foreach ( get_post_meta($post->ID, 'terminal') as $img ) : $y++;?>
                                        <div class="table__img">
                                            <a href="<?= $img['guid'] ?>" class="table__img-link" target="_blank">
                                                <img src="<?= get_template_directory_uri()?>/images/img-icon.svg" class="table-img">
                                                <span>img-<?= $y ?>.jpg</span>
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                    </div>
                                </td>
                                <td><?= get_field('cabinet_current_location', $post->ID) ?></td>
                                <td><?= get_field('cabinet_location_to', $post->ID) ?></td>
                                <td><?= get_field('cabinet_container_number', $post->ID) ?></td>
                                <td><?= get_field('cabinet_date_buy', $post->ID) ?></td>
                                <td><?= get_field('cabinet_container_in', $post->ID) ?></td>
                                <td><?= get_field('cabinet_date_to', $post->ID) ?></td>
                                <td><?= get_field('cabinet_clien_name', $post->ID) ?></td>
                                <td><?= get_field('cabinet_passport', $post->ID) ?></td>
                                <td><?= get_field('cabinet_ind_number', $post->ID) ?></td>
                                <td><?= get_field('cabinet_car_price', $post->ID) ?> $</td>
                                <td><?= get_field('cabinet_susha_price', $post->ID) ?> $</td>
                                <td><?= get_field('cabinet_ostatok', $post->ID) ?> $</td>
                                <td>
                                    <a href="<?= get_field('cabinet_invoice', $post->ID) ?>" class="table__download-invoice">
                                        <?php _e( 'Скачать' ) ?>
                                    </a>
                                </td>
                            </tr>
                            <?php
                                endwhile;
                                wp_reset_query();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php endif ?>

<?php
get_footer();