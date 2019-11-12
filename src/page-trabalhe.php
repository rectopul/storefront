<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package auaha
 * Template Name: Trabalhe Conosco
 */

get_header(); ?>
<div class="container-fluid">
    <div class="container">
        <!-- Cont Title And Subtitle -->
        <div class="row">
            <div class="col-12 page__content-title text-center">
                <h3><?php echo nl2br(get_theme_mod('trabcom__contenttitle')); ?></h3>
                <h4><?php echo nl2br(get_theme_mod('trabcom__desccontent')); ?></h4>
                <a href="#modal" class="link-archive mt-5 trabbuttom"><?php echo nl2br(get_theme_mod('trabcom__text_button')); ?></a>
            </div>
        </div>
        <!-- Carroussel -->
        <div class="row">
            <div class="col-12">
                <div class="page__content-galery">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <?php $galery = json_decode(get_theme_mod('trabcom__galery')); ?>
                        <?php foreach ($galery as $key => $image): ?>
                            <div class="swiper-slide page__content-galery-item">
                                <figure><img src="<?php echo $image->galery_pages->url; ?>" alt="Galery"></figure>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pagination -->
        <div class="row">
            <div class="col-12 page__content-galery-pagination d-flex flex-row justify-content-center align-items-center">
            </div>
        </div>

        <!-- Blocks Title -->
        <div class="row">
            <div class="col-12 page__info_title">
                <h3><?php echo nl2br(get_theme_mod('trabcom__titleinfo')); ?></h3>
            </div>
        </div>

        <!-- Blocks -->
        <div class="row">
            <?php $blocks = json_decode(get_theme_mod('trabcom__titleinfo-blocks')); ?>
            <?php foreach ($blocks as $key => $block): //iconcat ?>
                <div class="col-6 col-md-4 page__info_block text-center">
                    <figure><img src="<?php echo $block->iconcat->url; ?>" alt=""></figure>
                    <article><?php echo urldecode($block->content); ?></article>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Banner Extra -->
<?php $bg_banner1 = wp_get_attachment_image_url(get_theme_mod('background_bannerextra1'), 'banner_extra'); ?>
<div class="container-fluid page__bannerextra" style="<?php echo $bg_banner1  ? 'background-image: url(\''.$bg_banner1.'\');' : ''; ?> ">
    <div class="container page__bannerextra-container">
        <div class="row">
            <div class="col-12 page__bannerextra-title text-center">
                <h3><?php echo nl2br(get_theme_mod('trabcom__bannex-title')); ?></h3>
                <h6><?php echo nl2br(get_theme_mod('trabcom__bannex-desc')); ?></h6>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2">
                <div class="row">
                    <?php if(get_theme_mod('trabcom__bannex-info1')): ?>
                        <div class="col-6 col-md-4 text-center page__bannerextra-info inf-1"><?php echo nl2br(get_theme_mod('trabcom__bannex-info1')); ?></div>
                    <?php endif; ?>
                    <?php if(get_theme_mod('trabcom__bannex-info2')): ?>
                        <div class="col-6 col-md-4 text-center page__bannerextra-info inf-2"><?php echo nl2br(get_theme_mod('trabcom__bannex-info2')); ?></div>
                    <?php endif; ?>
                    <?php if(get_theme_mod('trabcom__bannex-info3')): ?>
                        <div class="col-6 col-md-4 text-center page__bannerextra-info inf-3"><?php echo nl2br(get_theme_mod('trabcom__bannex-info3')); ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cargos -->
<div class="container-fluid page__positions">
    <div class="container">
        <div class="row">
            <div class="col-12 page__positions-title">
                <h1>Posições disponíveis agora</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-6 col-md-3 page__positions-item">
                Advogado
            </div>
            <div class="col-6 col-md-3 page__positions-item">
                Secretária
            </div>
            <div class="col-6 col-md-3 page__positions-item">
                Analista
            </div>
            <div class="col-6 col-md-3 page__positions-item">
                Diretor
            </div>
        </div>
    </div>
</div>

<div class="container-fluid page__services">
    <div class="container">
        <div class="row">
            <div class="col-12 page__services-title">
                <h1>E é isso que oferecemos.</h1>
            </div>
        </div>
        <div class="row">
            <?php $services = json_decode(get_theme_mod('trabcom__services')); ?>
            <?php foreach ($services as $key => $service): //iconcat ?>
                <div class="col-6 text-center col-md-3 page__services-item">
                    <div>
                        <figure>
                            <img src="<?php echo $service->iconcat->url; ?>" alt="Icone">
                        </figure>
                        <?php echo urldecode($service->content); ?>
                    </div>
                </div>
            <? endforeach; ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>