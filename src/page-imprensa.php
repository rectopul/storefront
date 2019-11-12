<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package auaha
 * Template Name: Imprensa
 */

get_header(); ?>
<div class="row">
    <div class="container-fluid single__navcat-tobottom nav__text">
        <div class="nav__text-container container">
            <div class="row">
                <div class="col-12 col-md-6 offset-md-3">
                    <div class="nav nav-tabs member__tabs-links" id="nav-tab" role="tablist">
                        <?php
                            
                            $cats_imprens = get_categories(['taxonomy' => 'cat_imprensa', 'parent' => 0, 'hide_empty' => false]);
                            // Check if any term exists
                            if ( ! empty( $cats_imprens ) && is_array( $cats_imprens ) ) {
                                // Run a loop and print them all
                                foreach ( $cats_imprens as $i => $termtx ) { ?>
                                    <a class="nav-item nav-link <?php echo $i == 0 ?  'active' : ''; ?>" id="<?php echo $termtx->slug; ?>-tab" data-toggle="tab" href="#<?php echo $termtx->slug; ?>" role="tab" aria-controls="<?php echo $termtx->slug; ?>" aria-selected="<?php echo $i == 0 ?  'true' : 'false'; ?>"><?php echo $termtx->name; ?></a>
                                <?php }
                            } 
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid bg-black">
    <div class="container">
        <div class="tab-content" id="pills-tabContent">
            <?php if ( ! empty( $cats_imprens ) && is_array( $cats_imprens ) ) {
                foreach ( $cats_imprens as $i => $termtx ) { 
                    $args = [
                        'post_type'           => 'imprensa',
                        'posts_per_page'      => 1,
                        'ignore_sticky_posts' => 1,
                        'orderby'             => 'date',
                        'order'               => 'ASC',
                        'meta_query'          => [
                            'relation' => 'IN',
                            [
                                'key'   => 'fixarprojeto_91114',
                                'value' => 1
                            ]
                        ],
                        'tax_query'           => [
                            [
                                'taxonomy' => $termtx->taxonomy,
                                'field'    => 'slug',
                                'terms'    => $termtx->slug,
                            ]
                        ]
                    ]; $the_query = new WP_Query($args); ?>
                    <div class="tab-pane imprensa__post-sticky-container fade <?php echo $i == 0 ?  'show active' : ''; ?>" id="<?php echo $termtx->slug; ?>" role="tabpanel" aria-labelledby="<?php echo $termtx->slug; ?>-tab">
                        <?php if( $the_query->have_posts() ): ?>
                                <?php while( $the_query->have_posts() ): $the_query->the_post(); ?>
                                    <div class="row">
                                        <div class="col-12 col-md-6 d-flex flex-column justify-content-center align-items-start imprensa__post-sticky">
                                            <?php the_title('<h1>', '</h1>', true); ?>
                                            <article><?php the_content(); ?></article>
                                            <a href="<?php the_permalink(); ?>" class="link-white">Fale coma  gente</a>
                                        </div>
                                        <div class="col-12 col-md-6 imprensa__post-stickythumb"><?php the_post_thumbnail('sticky_imprensa'); ?></div>
                                    </div>
                                <?php endwhile;
                            wp_reset_postdata();
                        endif; ?>
                    </div><?php 
                }
            }
            ?>
        </div>
    </div>
</div>

<!-- Ultimas novidades -->

<div class="container-fluid imprensa__novidades">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Nossas última novidades</h2>
            </div>
        </div>
        <!-- Loop -->
        <div class="row">
            <?php 
            $args = [
                'post_type'           => 'imprensa',
                'posts_per_page'      => 12,
                'ignore_sticky_posts' => 1,
                'orderby'             => 'date',
                'order'               => 'DESC',
                'meta_query'          => [
                    'relation' => 'IN',
                    [
                        'key'   => 'fixarprojeto_91114',
                        'value' => 1,
                        'compare' => 'NOT IN'
                    ]
                ]
            ]; $the_query = new WP_Query($args); ?>
            <?php if($the_query->have_posts()): ?>
                <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="imprensa__novidades-post" style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'showcase'); ?>');">
                            <a href="<?php the_permalink(); ?>"><?php the_title('<p>', '</p>', TRUE); ?></a>
                        </div>                        
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Banner Extra -->
<?php if(get_theme_mod('imprensa_checkbox')): ?>
    <div class="container-fluid imprensa__bannerextra" style="background-image: url('<?php echo wp_get_attachment_image_url(get_theme_mod('banner__extra__BG'), 'full'); ?>');">
        <div class="container">
            <div class="row">
                <div class="col-12 imprensa__bannerextra-title">
                    <h1><?php echo get_theme_mod('imprensa__bannerextra__title'); ?></h1>
                </div>
            </div>

            <div class="row">
                <?php 
                    for ($i=0; $i < 4; $i++) { ?>      
                        <div class="col-12 col-md-6 block__bnex_<?php echo $i; ?> imprensa__bannerextra-text">
                            <h3><?php echo nl2br(get_theme_mod('imprensa__bannerextra__bloco_'.$i)); ?></h3>
                            <article><?php echo nl2br(get_theme_mod('imprensa__bannerextra__contenbloco_'.$i)); ?></article>
                        </div>           
                    <?php }
                ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<!-- Marcas -->
<div class="container-fluid imprensa__marcas">
    <div class="container">
        <div class="row">
            <div class="col-12 imprensa__marcas-title">
                <h2><?php echo get_theme_mod('imprensa__marcs_title'); ?></h2>
                <small><?php echo get_theme_mod('imprensa__marcs_desc'); ?></small>
            </div>
        </div>

        <div class="row d-flex justify-content-center">
            <?php $partners = json_decode(get_theme_mod('imprensa_galery')); ?>
            <?php foreach ($partners as $key => $value): ?>
                <div class="col-4 col-md-2">
                    <figure><img src="<?php echo $value->full->url; ?>" alt="Logo parceiro"></figure>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- Blocos Contato -->

<div class="container">
    <div class="row">
        <div class="col-12 imprensa__blocks-title">
            <h1><?php fn_info_contact_blocktitle(); ?></h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-4">
            <div class="imprensa__blocks-item imprensa__contact_block_1">
                <figure><?php echo wp_get_attachment_image(get_theme_mod('imprensa__end_ico'), 'iconcat'); ?></figure>
                <header><?php fn_info_contact_1_title(); ?></header>
                <article><?php fn_info_contact_1(); ?></article>
                <footer></footer>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="imprensa__blocks-item imprensa__contact_block_2">
                <figure><?php echo wp_get_attachment_image(get_theme_mod('imprensa__info_ico'), 'iconcat'); ?></figure>
                <header><?php fn_info_contact_info_title(); ?></header>
                <article><?php fn_info_contact_info(); ?></article>
                <footer><?php fn_info_contact_info_mail(); ?></footer>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="imprensa__blocks-item imprensa__contact_block_3">
                <figure><?php echo wp_get_attachment_image(get_theme_mod('imprensa__info_ico_kit'), 'iconcat'); ?></figure>
                <header><?php fn_info_contact_kit_imprensa_title(); ?></header>
                <a href="<?php fn_info_contact_kit_imprensa_link(); ?>"><?php fn_info_contact_kit_imprensa_link_text(); ?></a>
                <article><?php fn_info_contact_kit_imprensa_content(); ?></article>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>