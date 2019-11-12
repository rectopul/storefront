<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package auaha
 * Template Name: Empresas Parceiras
 */

get_header(); ?>
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-12 companies__content">
                <?php
                    /* Start the Loop */
                    if ( have_posts() ) : while ( have_posts() ) : the_post();
                        
                        // Include the page content template.
				        the_content();
                    
                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) {
                            comments_template();
                        }
                    
                    endwhile; endif; // End of the loop.
                ?>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid companies__carrossel">
    <div class="container">
        <div class="row">
            <div class="col-12 companies__carrossel-title">
                <h4><?php partners_logossubtitle(); ?></h4>
                <h2><?php partners_logostitle(); ?></h2>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="companies__carrossel-slide">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <?php $logos = explode(',', get_theme_mod('empresas__logos')); ?>
                        <?php foreach ($logos as $logo): ?>
                            <div class="swiper-slide"><figure class="companies__carrossel-slide-item"><?php echo wp_get_attachment_image($logo, 'logotipo'); ?></figure></div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid companies__bloc">
    <div class="container">
        <div class="row">
            <div class="col-12 companies__bloc-title">
                <h4><?php partners_blocs_subtitle(); ?></h4>
                <h2><?php partners_blocs_title(); ?></h2>
            </div>
        </div>
        <div class="row">
            <?php
                for ($i=0; $i < 3; $i++) { ?>
                    <div class="col-12 col-md-4 companies__bloc-container">
                        <div class="companies__bloc-container-item">
                            <header class="companies__blocs-title<?php echo $i; ?>">
                                <?php 
                                    if($i == 0) partners_blocstitle0();
                                    if($i == 1) partners_blocstitle1();
                                    if($i == 2) partners_blocstitle2();
                                ?>
                            </header>

                            <article class="companies__bloc-content<?php echo $i; ?>">
                                <?php 
                                    if($i == 0) partners_bloc_content0();
                                    if($i == 1) partners_bloc_content1();
                                    if($i == 2) partners_bloc_content2();
                                ?>
                            </article>

                            <footer class="companies__bloc-footer<?php echo $i; ?>">
                                <?php 
                                    if($i == 0) partners_bloc_footer0();
                                    if($i == 1) partners_bloc_footer1();
                                    if($i == 2) partners_bloc_footer2();
                                ?>
                            </footer>
                        </div>
                    </div>
                <?php }
            ?>
        </div>

        <div class="row mt-5">
            <a href="#" class="link-archive p-lg">SAIBA MAIS</a>
        </div>
    </div>
</div>
<?php get_footer(); ?>