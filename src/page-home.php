<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package auaha
 * Template Name: Homepage Protegit
 */

get_header(); ?>

<?php get_template_part('template-parts/content', 'dicas'); ?>
<?php get_template_part('template-parts/content', 'vitrine1'); ?>
<?php get_template_part('template-parts/content', 'depoimentos'); ?>
<?php get_template_part('template-parts/content', 'homeajuda'); ?>
<?php get_template_part('template-parts/content', 'vitrine2'); ?>
<div class="container-fluid banner1" style="background-image: url('<?php echo wp_get_attachment_image_src(get_theme_mod('background_banner1'), 'bannerextra')[0]; ?>');">
    <div class="container">
        <div class="row">
            <div class="col-12 banner1__title d-flex flex-column justify-content-start align-items-center pt-5 pb-5">
                <h1><?php echo nl2br(get_theme_mod('title_banner_1')); ?></h1>
                <article><?php echo nl2br(get_theme_mod('content_banner_1')); ?></article>
                <a href="#" class="link-white">CONHEÇA O COMPROMISSO PROTEGIT</a>
            </div>
        </div>
    </div>
</div>
<?php get_template_part('template-parts/content', 'equipe'); ?>
<?php get_footer(); ?>