<?php

/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Auaha
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>

    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php echo esc_url(get_bloginfo('pingback_url')); ?>">
    <?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. 
    ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); 
    if ( is_page_template( 'page-categories.php' ) ):
        if(has_post_thumbnail()):
            echo '<header id="header" class="custom-header max-height container-fluid" style="background: url(' . get_the_post_thumbnail_url() . ');">';
        else: 
            echo '<header id="header" class="custom-header container-fluid" style="background: url(' . get_header_image() . ');">';
        endif; 
    elseif (is_single()): 
        $catterms = get_the_terms( get_the_ID(), 'categoria' );
        if($catterms[0]->parent > 0){
            $term = get_term($catterms[0]->parent, $catterms[0]->taxonomy);
            $term_meta =  get_term_meta( $catterms[0]->parent, 'showcase-taxonomy-image-id', true );
            $imagetaxonomy = wp_get_attachment_url ( $term_meta, 'full' );
        }elseif(!$catterms[0]){
            if( has_post_thumbnail() ):
                $imagetaxonomy = get_the_post_thumbnail_url(get_queried_object()->ID);
            else:
                $imagetaxonomy = get_header_image();
            endif; 
        }else{
            $term = get_term($catterms[0]->term_id, $catterms[0]->taxonomy);
            $term_meta =  get_term_meta( $catterms[0]->term_id, 'showcase-taxonomy-image-id', true );
            $imagetaxonomy = wp_get_attachment_url ( $term_meta, 'full' );
        }
        
        
        echo '<header id="header" class="custom-header max-height container-fluid" style="background: url(' . $imagetaxonomy . ');">'; ?>
        <!--  AQUI --> 
    
    <?php elseif(is_archive()):
        if(get_post_type( get_the_ID() ) == 'membros'):
            $headerimage = wp_get_attachment_image_url(get_theme_mod('header__memebr'), 'full'); 
            echo '<header id="header" class="custom-header container-fluid" style="background: url(' . $headerimage . ');">';  
        elseif(get_queried_object()->labels):
            echo '<header id="header" class="custom-header container-fluid" style="background: url(' . get_header_image() . ');">';        
        else:
            if( get_post_type() == 'ajuda'  ):
                $thememod = get_theme_mod('rmb_bg_help');        
                $imageGB = wp_get_attachment_url($thememod);
                echo '<header id="header" class="custom-header container-fluid" style="background: url(' . $imageGB . ');">';  
            else: 
                $t_id = get_queried_object()->term_taxonomy_id;
                $term_meta =  get_term_meta ( get_queried_object()->term_id, 'showcase-taxonomy-image-id', true );
                $imagetaxonomy = wp_get_attachment_url ( $term_meta, 'full' );
                if($term_meta):
                    if(get_queried_object()->parent > 0){
                        $term_meta =  get_term_meta ( get_queried_object()->parent, 'showcase-taxonomy-image-id', true );
                        $imagetaxonomy = wp_get_attachment_url ( $term_meta, 'full' );
                        echo '<header id="header" class="custom-header max-height container-fluid" style="background: url(' . $imagetaxonomy . ');">';
                    }else{
                        echo '<header id="header" class="custom-header max-height container-fluid" style="background: url(' . $imagetaxonomy . ');">';
                    }
                else: 
                    echo '<header id="header" class="custom-header container-fluid" style="background: url(' . get_header_image() . ');">';
                endif;  
            endif;
        endif;
    elseif(is_home()): ?>
        <!-- IF is BLOG PAGE -->
        <?php
        if( has_post_thumbnail() ):
            echo '<header id="header" class="custom-header  blog__header container-fluid" style="background: url(' . get_the_post_thumbnail_url(get_queried_object()->ID) . ');">';
        else:
            echo '<header id="header" class="custom-header container-fluid" style="background: url(' . get_header_image() . ');">';
        endif; 
        ?>
        
    <?php elseif ( is_page_template( 'page-compromisso.php' ) ):
        if( has_post_thumbnail() ):
            echo '<header id="header" class="custom-header  page__header container-fluid" style="background: url(' . get_the_post_thumbnail_url(get_queried_object()->ID) . ');">';
        else:
            echo '<header id="header" class="custom-header page__header container-fluid" style="background: url(' . get_header_image() . ');">';
        endif; 
        ?>
        <div class="container page blog__header-container">
            <?php if(have_posts()): the_post() ?>
                <!-- Titulo -->
                <div class="row">
                    <div class="col-12 page__title">
                        <?php echo the_title('<h2>', '</h2>'); ?>
                    </div>
                </div>
                <!-- Form search -->
                <div class="row">
                    <div class="col-12 page__content">
                        <?php the_content(); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    <?php elseif( is_page_template( 'page-imprensa.php' ) ):
        if( has_post_thumbnail() ):
            echo '<header id="header" class="custom-header container-fluid" style="background: url(' . get_the_post_thumbnail_url() . ');">';
        else:
            echo '<header id="header" class="custom-header container-fluid" style="background: url(' . get_header_image() . ');">';
        endif;     
    else :
        if( has_post_thumbnail() ):
            echo '<header id="header" class="custom-header container-fluid" style="background: url(' . get_the_post_thumbnail_url() . ');">';
        else:
            echo '<header id="header" class="custom-header container-fluid" style="background: url(' . get_header_image() . ');">';
        endif;
    endif; ?>

    <!-- Nav Menu -->
    <div class="container_relative_menu">
        <div class="container__nav-menu">
            <div class="cont__navlogo">
                <article class="container-auaha nav_logo">
                    <figure class="nav_logo__customlogo">
                        <?php
    
                        /**
                         * Custom Logo
                         */
    
                        if (function_exists('the_custom_logo') && has_custom_logo()) {
                            printf('<div class="img_custom_logo">%s</div>', get_custom_logo());
                        } else {
                            printf('<div class="img_custom_logo">%s</div>', 'Nenhuma logo cadastrada no momento. Por favor cadastre uma Logo!');
                        }
                        ?>
                    </figure>
                    <?php
                    wp_nav_menu(array(
                        'theme_location'  => 'menu-1',
                        'sort_column'     => 'menu_order',
                        'container'       => 'nav',
                        'container_class' => 'nav_logo__menu-wraper',
                        'menu_class'       => 'nav_logo__nav',
                    ));
                    ?>
    
                    <nav class="nav_mobile-menu">
                        <span class="corners">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                        <?php
                        wp_nav_menu(array(
                            'theme_location'  => 'menu-1',
                            'sort_column'     => 'menu_order',
                            'container'       => false,
                            'menu_class'       => 'nav_logo__nav'
                        ));
                        ?>
                    </nav>
                </article>
            </div>
        </div>
    </div>
    <?php if(is_archive() && (get_post_type( get_the_ID() ) != 'membros')): 
        if(get_queried_object()->labels): ?>
            <div class="container archive__help">
                <div class="row">
                    <div class="col-12 archive__help-title">
                        <h1>Seus direitos</h1>
                        <small>Ajudamos você a conhecê-los ... e a exigi-los</small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-8 offset-md-2 archive__help-form">
                        <?php get_search_form(); ?>
                    </div>
                </div>
            </div> <?php
        else: 
            if( get_post_type() == 'ajuda'  ){ ?>
                <div class="container archive__help">
                    <div class="row">
                        <div class="col-12 archive__help-title"><h1>Como podemos ajudar você?</h1></div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-8 offset-md-2 archive__help-form">
                            <?php get_search_form(); ?>
                        </div>
                    </div>
                </div>
            <?php }else{ ?>
                
                <div class="container headercat__messagestitle">
                    <div class="row">
                        <h6><?php single_cat_title(); ?></h6>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <h4><?php echo get_the_archive_description(); ?></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p><?php echo nl2br(get_field('second_descript', get_queried_object()->taxonomy . '_' . get_queried_object()->term_id)); ?></p>
                        </div>
                    </div>
                </div>
                <div class="container d-flex mt-5 justify-content-center align-self-center">        
                    <div class="row archive__subcategorias">
                        <div class="col-12 archive__list d-flex flex-row justify-content-center">
                            <?php
                                $children = get_terms( get_queried_object()->taxonomy, array(
                                    'parent' => get_queried_object()->term_id,
                                    'hide_empty' => false
                                ) );
                                // Check if any term exists
                                if ( ! empty( $children ) && is_array( $children ) ) {
                                    // Run a loop and print them all
                                    foreach ( $children as $term ) { 
                                        $term_meta =  get_term_meta( $term->term_id, 'showcase-taxonomy-image-id', true );
                                        $imageparent = wp_get_attachment_url ( $term_meta, 'large' );?>
                                        <div class="archive__item">
                                            <figure><img src="<?php echo $imageparent; ?>" alt="Cat Icone"></figure>
                                            <?php echo $term->name; ?>
                                        </div>
                                    <?php }
                                } 
                            ?>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="container-fluid nav__text">
                        <div class="nav__text-container container">
                            <div class="row">
                                <div class="col-4 col-md-4 nav__text-title"><?php single_cat_title(); ?></div>
                                <div class="col-8 col-md-8">
                                    <ul>
                                        <?php
                                            $childrentxt = get_terms( get_queried_object()->taxonomy, array(
                                                'parent' => get_queried_object()->term_id,
                                                'hide_empty' => false
                                            ) );
                                            // Check if any term exists
                                            if ( ! empty( $childrentxt ) && is_array( $childrentxt ) ) {
                                                // Run a loop and print them all
                                                foreach ( $childrentxt as $termtx ) { ?>
                                                    <li>
                                                        <a href="#<?php echo $termtx->slug; ?>">
                                                            <?php echo $termtx->name; ?>  
                                                        </a>                                        
                                                    </li>
                                                <?php }
                                            } 
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <a href="#" class="linkyelow">ENVIE AGORA SUA DÚVIDA SOBRE VOOS</a>
                        </div>
                    </div>        
                </div>
                <?php

                    $argsvt2 = [
                        'post_type' => ['construct', 'telefonia', 'compras', 'saude', 'viagem',  'ajuda'],
                        'orderby'             => 'date',
                        'order'               => 'DESC',
                        'posts_per_page'      => 1,
                        'meta_query'          => [
                            'relation' => 'IN',
                            [
                                'key' => 'fixarprojeto_91114',
                                'value' => 1
                            ]
                        ],
                        'tax_query'           => [
                            'relation' => 'AND',
                            [
                                'taxonomy' => get_queried_object()->taxonomy,
                                'field' => 'slug',
                                'terms' => array( get_queried_object()->slug )
                            ]
                        ],
                        'ignore_sticky_posts' => 1
                    ];

                    $qryvt2 = new WP_Query($argsvt2);
                    if ( $qryvt2->have_posts() ) : 
                ?>

                <!-- the loop -->
                <?php while ( $qryvt2->have_posts() ) : $qryvt2->the_post(); ?>
                <div class="row">
                    <div class="container-fluid pagecat__block">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 pagecat__message-title">
                                    <h1><?php the_title(); ?></h1>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 pagecat__message">
                                    <?php the_excerpt(); ?> <a href="#">Conheça o compromisso do reclamante.</a>
                                </div>
                            </div>
                        </div>
                    </div>               
                </div>
                <?php endwhile; ?>
                <!-- end of the loop -->
                <?php wp_reset_postdata(); ?>
                <?php else : ?>
                    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                <?php endif; 
            }?>
        <?php endif; ?>
    <?php elseif ( is_page_template( 'page-imprensa.php' ) ): ?>
        <div class="container depoiments">
            <div class="row">
                <div class="col-12 imprensa__pagetitle">
                    <h2 class="imprensa__pagetitle_settings"><?php echo nl2br(get_theme_mod('imprensa__pagetitle')); ?></h2>
                    <h4><?php echo nl2br(get_theme_mod('imprensa__pagesubtitle')); ?></h4>
                    <a href="<?php echo get_theme_mod('imprensa__linkhead'); ?>" class="link-white imprens_link-header"><?php echo get_theme_mod('imprensa__linkheaddesk'); ?></a>
                </div>
            </div>
        </div>
    <?php elseif ( is_page_template( 'page-depoiments.php' ) ): ?>
        <div class="container depoiments">
            <div class="row">
                <div class="col-12 depoiments__pagetitle">
                    <h2><?php fn_imprensa__pagesubtitle(); ?></h2>
                </div>
            </div>
        </div>
    <?php elseif( is_archive() && get_post_type( get_the_ID() ) == 'membros' ): ?>
        <div class="container member__container-header">
            <div class="row">
                <div class="col-12 member__header">
                    <h2><?php echo nl2br(get_theme_mod('nosstim__title')); ?></h2>
                    <h4><?php echo nl2br(get_theme_mod('nosstim__desc')); ?></h4>
                </div>
            </div>
        </div>
    <?php elseif(is_front_page() ): ?>
        <div class="search-form container-auaha">
            <header class="title-form">
                <h1 class="title-search">
                    Reivindicações para clicar em hit
                </h1>
            </header>
            <article>
                <div class="search-form__nv-1 active">
                    <ul class="list__actions">
                        <li>O que quer?</li>
                        <?php 
                            $args = array(
                                'public'   => true,
                                '_builtin' => false,
                            );
                    
                            $output = 'objects'; // names or objects, note names is the default
                            $operator = 'and'; // 'and' or 'or'
                            $post_types = get_post_types($args, $output, $operator);
                    
                            $posttypes_array = [];
                            $excluded = ['imprensa', 'compromisso', 'ajuda', 'membros', 'processos'];
                            foreach ($post_types as $post_type) {              
                                if(!in_array($post_type->name, $excluded)){
                                    $posttypes_array[] = $post_type;
                                    echo '<li data-action-client="'.$post_type->name.'">'.$post_type->label.'</li>';
                                }
                            }
                        ?>
                    </ul>
                </div>
                <div class="search-form__nv-2">
                    <ul class="list-ptypes">

                        <li>De que tipo</li>

                    </ul>
                </div>
                <div class="search-form__nv-3">
                    <ul class="categories__list">
                        <?php $args = array(
                            'public'   => true,
                            '_builtin' => false,
                        );

                        $output = 'objects'; // names or objects, note names is the default
                        $operator = 'and'; // 'and' or 'or'

                        $post_types = get_post_types($args, $output, $operator);
                        foreach ($post_types as $key => $labels) {
                            printf('<li data-name="%s">%s</li>', $post_types[$key]->name, $post_types[$key]->label);
                        } ?>
                    </ul>
                </div>
                <button class="search-form__filter">
                    Consulte
                </button>
            </article>
        </div>
    <?php elseif(is_page_template( 'page-parceiros.php' )): ?>
        <div class="container page__container">
            <div class="row">
                <div class="col-12 companies__title">
                    <p class="paragraph"><?php complement_title_partner_companies(); ?></p>
                    <h2><?php title_partner_companies(); ?></h2>
                    <h4><?php partners_subtitle(); ?></h4>
                </div>
            </div>
        </div>
    <?php elseif(is_page_template( 'page-trabalhe.php' )): ?>
        <div class="container page__container">
            <div class="row">
                <div class="col-12 page__header">
                    <h6><?php echo nl2br(get_theme_mod('trabcom__saudation')); ?></h6>
                    <h2><?php echo nl2br(get_theme_mod('trabcom__title')); ?></h2>
                    <h4><?php echo nl2br(get_theme_mod('trabcom__tsubitle')); ?></h4>
                </div>
            </div>
        </div>
    <?php elseif(is_single()): 
        
        $catterms = get_the_terms( get_the_ID(), 'categoria' );
        if($catterms[0]->parent > 0){
            $term = get_term($catterms[0]->parent, $catterms[0]->taxonomy);
            $term_meta =  get_term_meta( $catterms[0]->parent, 'showcase-taxonomy-image-id', true );
        }else{
            $term = get_term($catterms[0]->term_id, $catterms[0]->taxonomy);
            $term_meta =  get_term_meta( $catterms[0]->term_id, 'showcase-taxonomy-image-id', true );
        }?>

        <?php
            $argsvt2 = [
                'post_type' => ['construct', 'telefonia', 'compras', 'saude', 'viagem', 'ajuda'],
                'orderby'             => 'date',
                'order'               => 'DESC',
                'posts_per_page'      => 1,
                'orderby'             => 'data',
                'order'               => 'DESC',  
                'meta_query'          => [
                    'relation' => 'IN',
                    [
                        'key' => 'fixarprojeto_91114',
                        'value' => 1
                    ]
                ],
                'tax_query'           => [
                    'taxonomy' => $term->taxonomy
                ],
                'ignore_sticky_posts' => 1
            ];

            $qryvt2 = new WP_Query($argsvt2);
            
            if ( $qryvt2->have_posts() ) : 
        ?>

        <!-- the loop -->
        <?php while ( $qryvt2->have_posts() ) : $qryvt2->the_post(); ?>
        <div class="row">
            <div class="container-fluid single__post-stick">
                <div class="container">
                    <div class="row">
                        <div class="col-12 single__post-title">
                            <h4 class="single__post-singlecat"><?php echo $term->name; ?></h4>
                            <h1><?php the_title(); ?></h1>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6 offset-md-3 single__post-content">
                            <?php the_excerpt(); ?>
                        </div>
                    </div>

                    <a href="#" class="link-white">BUSCAR INDENIZAÇÃO</a>
                </div>
            </div>               
        </div>
        <?php endwhile; ?>
        <!-- end of the loop -->
        <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>
        
        <div class="row">
            <div class="container-fluid single__navcat nav__text">
                <div class="nav__text-container container">
                    <div class="row">
                        <div class="col-4 col-md-4 nav__text-title"><?php echo $term->name; ?></div>
                        <div class="col-8 col-md-8">
                            <ul>
                                <?php
                                    
                                    $childrentxt = get_terms( get_queried_object()->taxonomy, array(
                                        'parent' => get_queried_object()->term_id,
                                        'hide_empty' => false
                                    ) );
                                    // Check if any term exists
                                    if ( ! empty( $catterms ) && is_array( $catterms ) ) {
                                        // Run a loop and print them all
                                        foreach ( $catterms as $termtx ) { ?>
                                            <li>
                                                <a href="<?php echo get_term_link($termtx->term_id); ?>">
                                                    <?php echo $termtx->name; ?>  
                                                </a>                                        
                                            </li>
                                        <?php }
                                    } 
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php elseif(is_page()): ?>
        <?php if(have_posts()): ?>
        <?php while(have_posts()): the_post(); ?>
            <div class="container member__container-header">
                <div class="row">
                    <div class="col-12 member__header">
                        <?php the_title('<h2>', '</h2>', true); ?>
                        <h4 class="conditions__subtitle"><?php the_content(); ?></h4>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
        <?php endif; ?>
    <?php elseif(is_home()): ?>
        <div class="container blog__header-container">
            <!-- Titulo -->
            <div class="row">
                <div class="col-12 blog__pagetitle">
                    <?php echo nl2br(get_theme_mod('rmb_title_blog')); ?>
                </div>
            </div>
            <!-- Form search -->
            <div class="row">
                <div class="col-12 blog__search">
                    <?php get_search_form(); ?>
                </div>
            </div>
        </div>v
    <?php endif; ?>
    </header>
