<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package JustBrow
 */

get_header();
?>

<?php if (function_exists('kama_breadcrumbs')) {
    kama_breadcrumbs('');
} ?>

    <section class="service">
        <div class="row">
            <div class="col-12 col-xl-4 js-service-descr">
                <div class="col-12 col-sm-6 col-lg-4 col-xl-12" data-da=".js-service-img,1199,first">
                    <div class="service__img">
                        <?php the_post_thumbnail('service'); ?>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-8">
                <div class="service-block-top" data-da=".js-service-descr,1199,1">
                    <h1 class="title service__title"><?php the_title(); ?></h1>
                    <div class="service__descr"><?php the_field('uslugi_-_kratkoe_opisanie'); ?></div>
                </div>

                <div class="service-block-bot">
                    <div class="row js-service-img">
                        <div class="col-12 col-sm-6 col-lg-8 col-xl-12">
                            <p class="service__price">от <?php the_field('usluga_-_czena'); ?> ₽</p>

                            <div class="service-form">

                                <?php echo do_shortcode('[contact-form-7 id="5" title="Записаться на приём"]') ?>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="prices">
                    <?php the_field('usluga_-_tablicza_czen'); ?>


                    <div class="prices__header">
                        <div class="prices__name">Услуги</div>
                        <div class="prices__descr">Описание</div>
                        <div class="prices__price">Цена</div>
                    </div>
                    <div class="prices-item">
                        <div class="prices-item__name">Перманентный макияж</div>
                        <div class="prices-item__descr">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </div>
                        <div class="prices-item__price">от 2000 ₽</div>
                    </div>
                    <div class="prices-item">
                        <div class="prices-item__name">Перманентный макияж</div>
                        <div class="prices-item__descr">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </div>
                        <div class="prices-item__price">от 2000 ₽</div>
                    </div>
                    <div class="prices-item">
                        <div class="prices-item__name">Перманентный макияж</div>
                        <div class="prices-item__descr">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </div>
                        <div class="prices-item__price">от 2000 ₽</div>
                    </div>
                    <div class="prices-item">
                        <div class="prices-item__name">Перманентный макияж</div>
                        <div class="prices-item__descr">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </div>
                        <div class="prices-item__price">от 2000 ₽</div>
                    </div>
                </div>
            </div>

            <div class="col-12">


                <div class="service__info"><?php the_field('usluga_-_opisanie'); ?></div>
            </div>
        </div>
    </section>


<?php get_template_part('template-parts/sections/request'); ?>


<?php $usluga_moi_raboty = get_field('usluga_-_moi_raboty'); ?>
<?php if ($usluga_moi_raboty) : ?>
    <?php foreach ($usluga_moi_raboty as $post) : ?>
        <?php setup_postdata($post); ?>
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    <?php endforeach; ?>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>


<?php if (have_rows('usluga_-_moi_raboty')) : ?>
    <section class="works js-work-parent">
        <h2 class="title works__title">
            Мои работы
        </h2>

        <aside class="tags">
            <div class="swiper-container-tags">

                <div class="swiper-wrapper">
                    <?php while (have_rows('usluga_-_moi_raboty')) : the_row(); ?>

                        <div class="swiper-slide tags-slide">
                            <a href="#" class="btn btn-border tags__btn js-work-link">
                                <?php the_sub_field('nazvanie_taba'); ?>
                            </a>
                        </div>

                    <?php endwhile; ?>

                </div>

            </div>

            <div class="tags__prev">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/arrleft.svg" alt="">
            </div>
            <div class="tags__next">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/arrleft.svg" alt="">
            </div>

        </aside>

        <?php while (have_rows('usluga_-_moi_raboty')) : the_row(); ?>

            <div class="js-work-tab">
                <div class="swiper-works">
                    <div class="swiper-wrapper">

                        <?php $soderzhimoe_taba = get_sub_field('soderzhimoe_taba'); ?>
                        <?php if ($soderzhimoe_taba) : ?>
                            <?php foreach ($soderzhimoe_taba as $post) : ?>

                                <div class="swiper-slide">
                                    <?php setup_postdata($post); ?>
                                    <a href="<?php the_permalink(); ?>" class="works__img"
                                       style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
                                        <div class="works__info">
                                            <p class="works__name"><?php the_title(); ?></p>
                                            <p class="works__price">4000 ₽</p>
                                        </div>
                                    </a>

                                </div>

                            <?php endforeach; ?>
                            <?php wp_reset_postdata(); ?>
                        <?php endif; ?>

                    </div>

                </div>
            </div>

        <?php endwhile; ?>

    </section>
<?php else : ?>
    <?php // no rows found ?>
<?php endif; ?>


<?php $usluga_otzyvy = get_field('usluga_-_otzyvy'); ?>
<?php if ($usluga_otzyvy) : ?>

    <section class="reviews-block">
        <h2 class="title reviews__title"><?php the_field('usluga_-_otzyvy_-_zagolovok'); ?></h2>
        <div class="reviews-block__slider">
            <div class="swiper-reviews">
                <div class="swiper-wrapper">

                    <?php foreach ($usluga_otzyvy as $post) : ?>
                        <?php setup_postdata($post); ?>

                        <div class="swiper-slide">
                            <div class="reviews-item">
                                <div class="reviews-item__left">
                                    <?php $levoe_izobrazhenie = get_field('levoe_izobrazhenie', $post); ?>
                                    <?php if ($levoe_izobrazhenie) : ?>
                                        <img src="<?php echo esc_url($levoe_izobrazhenie['url']); ?>"
                                             alt="<?php echo esc_attr($levoe_izobrazhenie['alt']); ?>"/>
                                    <?php endif; ?>
                                </div>
                                <div class="reviews-item__right">
                                    <?php $pravok_izobrazhenie = get_field('pravok_izobrazhenie', $post); ?>
                                    <?php if ($pravok_izobrazhenie) : ?>
                                        <img src="<?php echo esc_url($pravok_izobrazhenie['url']); ?>"
                                             alt="<?php echo esc_attr($pravok_izobrazhenie['alt']); ?>"/>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>

                </div>
            </div>
            <div class="reviews__prev"><img
                        src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/arrleft.svg" alt=""></div>
            <div class="reviews__next"><img
                        src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/arrleft.svg" alt=""></div>
        </div>
        <div class="inst-link d-flex align-items-center flex-column">
            <a href="https://www.instagram.com/<?php the_field('instagram', 'option'); ?>" target="_blank"
               class="inst-link__link">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/ins.svg"
                     alt="">@<?php the_field('instagram', 'option'); ?> </a>
            <a href="https://www.instagram.com/<?php the_field('instagram', 'option'); ?>" target="_blank"
               class="btn btn-border inst-link__btn">подписаться</a></div>
    </section>

    <?php wp_reset_postdata(); ?>
<?php endif; ?>

<?php get_template_part('template-parts/sections/about-block'); ?>


<?php
get_footer();
