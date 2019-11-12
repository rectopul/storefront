<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package auaha
 * Template Name: produto
 */
get_header(); 
if( get_post_type() == 'ajuda'  ){
    $qrobject = get_queried_object(); ?>  
    <div class="container-fluid archive__help-catmenu nav__text">
        <div class="nav__text-container container">
            <div class="row">
                <div class="col-4 col-md-4 nav__text-title" style="text-transform: capitalize;"><?php echo get_post_type_object(get_post_type())->name; ?></div>
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
    <div class="container-fluid archive__help-posts bg-black-pure">
        <div class="container">
            <div class="row">
                <div class="col-12 archive__help-posts-container">
                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-next helppost-next"></div>
                    <div class="swiper-button-prev helppost-prev"></div>
                    <div class="archive__help-separator"><i></i></div>
                    <div class="swiper-wrapper">
                        <?php if(have_posts()): ?> 
                            <?php while (have_posts()): the_post(); ?>
                                <div class="swiper-slide">
                                    <div class="archive__help-posts-item mt-3 mb-3 text-center <?php echo $wp_query->current_post % 2 == 0 ? 'line' : ''; ?>">
                                        <?php if(has_post_thumbnail()): ?>
                                            <div class="row">
                                                <div class="col-12 archive__help-posts-thumb">
                                                    <figure><?php the_post_thumbnail(); ?></figure>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <div class="row">
                                            <div class="col-12 archive__help-posts-title">
                                                <h1><?php the_title(); ?></h1>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 archive__help-posts-link">
                                                <a href="<?php echo the_permalink(); ?>" class="link-white">Leia Mais</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <p>Não há posts dispiníveis no momento!</p>
                        <?php endif; wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-12 help__min-title"><h3>Artigos em destaque</h3></div>
            </div>
            <div class="row">
                <div class="col-12 help__min-container">
                    <ul class="help__min-list">
                        <?php $argsdestq = [
                            'post_status'         => 'publish',
                            'post_type'           => 'ajuda',
                            'orderby'             => 'date',
                            'order'               => 'DESC',
                            'posts_per_page'      => 12,
                            'ignore_sticky_posts' => 1
                        ]; 
                        
                        $the_querydst = new WP_Query($argsdestq); ?>
                        <?php if ( $the_querydst->have_posts() ) : ?>
                            <?php while ( $the_querydst->have_posts() ) : $the_querydst->the_post(); ?>
                                <?php if ($the_querydst->current_post % 4 == 0 AND $the_querydst->current_post > 0): ?>
                                    </ul><ul class="help__min-list"><li><a href="<?php the_permalink(); ?>"><?php echo limit_text(get_the_title(), 6); ?></a></li>
                                <?php else: ?>
                                    <li><a href="<?php the_permalink(); ?>"><?php echo limit_text(get_the_title(), 6); ?></a></li>
                                <?php endif; ?>
                            <?php endwhile; ?>
                            <!-- end of the loop -->                        
                        <?php wp_reset_postdata(); ?>
                        <?php else : ?>
                            <?php _e( '<div class="col-12">Sorry, no posts matched your criteria.</div>' ); ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-12 help__min-sticktitle"><i class="lamp-idea"></i><h3 class="the-title">Dicas</h3></div>
            </div>
            <div class="row">                
                <?php $args = [
                    'post_status'         => 'publish',
                    'post_type'          => 'ajuda',
                    'orderby'             => 'date',
                    'order'               => 'DESC',
                    'meta_query'          => [
                        'relation' => 'IN',
                        [
                            'key' => 'fixarprojeto_91114',
                            'value' => 1
                        ]
                    ],
                    'posts_per_page'      => 3,
                    'ignore_sticky_posts' => 1,
                ]; 
                
                $query = new WP_Query($args)?>

                <?php if ( $query->have_posts() ) : ?>
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                        <div class="col-12 col-md-4"><div class="help__min-stick"><a href="<?php the_permalink(); ?>"><?php echo limit_text(get_the_title(), 6); ?></a></div></div>
                    <?php endwhile; ?>
                    <!-- end of the loop -->                        
                <?php wp_reset_postdata(); ?>
                <?php else : ?>
                    <?php _e( '<div class="col-12">Sorry, no posts matched your criteria.</div>' ); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-grey button-ger-help-container">
        <div class="container">
            <div class="row">
                <div class="col-12 button-ger-help">
                    <span><?php echo get_theme_mod('title_botton_get_help'); ?></span> <a href="<?php echo get_theme_mod('link_botton_get_help'); ?>" class="link-archive">FALE COM A GENTE</a>
                </div>                
            </div>
        </div>
    </div>
    <?php
}elseif(get_post_type( get_the_ID() ) == 'membros' ){ ?>

    <div class="container fluid member">
        <div class="container">
            <div class="row">
                <?php $catsmembers = get_categories([
                    'hide_empty' => false,
                    'parent' => 0,
                    'taxonomy' => 'cargos',
                    'orderby' => 'date',
                    'order' => 'ASC',
                ]);  ?>
                <nav class="col-12">
                    <div class="nav nav-tabs member__tabs-links" id="nav-tab" role="tablist">
                        <?php foreach ($catsmembers as $c => $catmember): ?>
                            <a class="nav-item nav-link <?php echo $c == 0 ?  'active' : ''; ?>" id="<?php echo $catmember->slug; ?>-tab" data-toggle="tab" href="#<?php echo $catmember->slug; ?>" role="tab" aria-controls="<?php echo $catmember->slug; ?>" aria-selected="<?php echo $c == 0 ?  'true' : 'false'; ?>"><?php echo $catmember->name; ?></a>
                        <?php endforeach; ?>
                    </div>
                </nav>
                <div class="tab-content member__tabs-content col-12" id="nav-tabContent">                    
                    <?php foreach ($catsmembers as $c => $catcont): ?>
                        <div class="tab-pane fade <?php echo $c == 0 ? 'show active' : ''; ?>" id="<?php echo $catcont->slug; ?>" role="tabpanel" aria-labelledby="<?php echo $catcont->slug; ?>-tab">
                            <div class="row">
                                <?php $args = [
                                    'post_type' => 'membros',
                                    'posts_per_page' => 9,
                                    'ignore_sticky_posts' => 1,
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => $catcont->taxonomy,
                                            'field'    => 'slug',
                                            'terms'    => $catcont->slug,
                                        )
                                    )
                                ]; $the_query = new WP_Query($args); ?>

                                <?php if( $the_query->have_posts() ): ?>
                                    <?php while( $the_query->have_posts() ): $the_query->the_post() ?>
                                        <div class="col-12 col-sm-4 member__item">
                                            <div class="member__item-container">
                                                <figure><?php the_post_thumbnail( ); ?></figure>
                                                <h4><?php the_title(); ?></h4>
                                                <h6><?php echo $catcont->description; ?></h6>
                                                <?php the_content(); ?>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                    <?php wp_reset_postdata(); ?>
                                <?php else: ?>
                                    <?php echo __('Não há membros neste cargo no momento!'); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Banner Extra -->
    <?php $bg_bextra = wp_get_attachment_image_url(get_theme_mod('full_banner'), 'full'); ?>
    <div class="container-fluid member__bannerextra" style="<?php echo $bg_bextra ? 'background-image: url(\''.$bg_bextra.'\');'  : ''; ?>">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 offset-md-6 member__bannerextra-text">
                    <h6><?php echo nl2br(get_theme_mod('bannerex__saudat')); ?></h6>
                    <h2><?php echo nl2br(get_theme_mod('bannerex__title')); ?></h2>
                    <h5><?php echo nl2br(get_theme_mod('bannerex__text')); ?></h5>
                </div>
            </div>
        </div>
    </div>

    <!-- Links Uteis -->

    <div class="container-fluid member__links">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4">
                    <?php $imglink1 = wp_get_attachment_image_url(get_theme_mod('member__link1'), 'iconcat'); ?>
                    <figure><img src="<?php echo $imglink1; ?>" alt="Icon Member"></figure>
                    <?php echo nl2br(get_theme_mod('member__link1_content')); ?>
                    <a href="<?php echo nl2br(get_theme_mod('member__link1_link')); ?>" class="link-archive"><?php echo nl2br(get_theme_mod('member__link1_textlink')); ?></a>
                </div>

                <div class="col-12 col-md-4">
                    <?php $imglink1 = wp_get_attachment_image_url(get_theme_mod('member__link2'), 'iconcat'); ?>
                    <figure><img src="<?php echo $imglink1; ?>" alt="Icon Member"></figure>
                    <?php echo nl2br(get_theme_mod('member__link2_content')); ?>
                    <a href="<?php echo nl2br(get_theme_mod('member__link2_link')); ?>" class="link-archive"><?php echo nl2br(get_theme_mod('member__link2_textlink')); ?></a>
                </div>

                <div class="col-12 col-md-4">
                    <?php $imglink1 = wp_get_attachment_image_url(get_theme_mod('member__link3'), 'iconcat'); ?>
                    <figure><img src="<?php echo $imglink1; ?>" alt="Icon Member"></figure>
                    <?php echo nl2br(get_theme_mod('member__link3_content')); ?>
                    <a href="<?php echo nl2br(get_theme_mod('member__link3_link')); ?>" class="link-archive"><?php echo nl2br(get_theme_mod('member__link3_textlink')); ?></a>
                </div>
            </div>
        </div>
    </div>

<?php }elseif(get_queried_object()->labels){ ?>
    <div class="container-fluid ptypes">
        <div class="container">
            <div class="row">
                <?php $ctypes = get_categories(['taxonomy' => 'categoria', 'parent' => 0, 'hide_empty' => 0]); 

                    foreach ($ctypes as $key => $value) { 
                        $term_meta =  get_term_meta( $value->term_id, 'showcase-taxonomy-image-id', true );
                        $term_icon =  get_term_meta( $value->term_id, 'icone_de_categoria', true ); //iconcat
                        $iconcat = wp_get_attachment_url( $term_icon, 'iconcat' );
                        $imageparent = wp_get_attachment_url ( $term_meta, 'large' );?>
                        <div class="col-6 col-md-4 ptypes__item">
                            <?php if(!$term_icon): ?>
                                <img src="https://via.placeholder.com/40x40?" alt="">
                            <?php else: ?>
                                <figure><img src="<?php echo $iconcat; ?>" alt="Imagem de categoria"></figure>
                            <?php endif; ?>
                            <header><?php echo $value->name; ?></header>
                            <article><?php echo $value->description; ?></article>
                            <a href="<?php echo get_term_link( $value->term_id ); ?>" class="link-archive">Mais informações</a>
                        </div> 
                    <?php }
                
                ?>
                
            </div>
        </div>
    </div>
<?php }else{
    $typeblock = 'white';
    $even = true;
    $terms = get_terms( get_queried_object()->taxonomy, array(
        'parent' => get_queried_object()->term_id,
        'hide_empty' => false
    ) );
    $postaexclude = [];
    if(get_queried_object()->parent == 0):
        for ($i=0; $i < count($terms); $i++):
            # code...
            $argsvt2 = [
                'post_type' => ['construct', 'telefonia', 'compras', 'saude', 'viagem', 'ajuda'],
                'orderby'             => 'date',
                'order'               => 'DESC',
                'post__not_in'        => $postaexclude,
                'posts_per_page'      => 1,
                'tax_query'           => [
                    'relation' => 'IN',
                    [
                        'taxonomy'  => $terms[$i]->taxonomy,
                        'terms'     => array( $terms[$i]->slug ),
                        'field'     => 'slug'
                    ],
                    [
                        'taxonomy'  => $terms[$i]->taxonomy,
                        'terms'     => $terms[$i]->parent,
                        'field'     => 'term_id'
                    ]
                ],
                'ignore_sticky_posts' => 1
            ];
            $qryvt2 = new WP_Query($argsvt2);
            
            if ( $qryvt2->have_posts() ) : 

        ?>

        <!-- the loop -->
        <?php while ( $qryvt2->have_posts() ) : $qryvt2->the_post(); 
        $postaexclude[] = get_the_ID();
        if($i % 2 == 0){$typeblock = 'white'; }else{$typeblock = 'black';}
            if($i % 2 == 0 && $i != 0 ):?>
                <div class="container-fluid cat__itemsolo bg_<?php echo $typeblock; ?>" id="<?php echo $terms[$i]->slug; ?>">
                    <div class="cat__item-container container">
                        <div class="row">
                            <!-- Link and content -->
                            <div class="col-md-12 cat__itemsolo-content">
                                <h5><?php echo $terms[$i]->name; ?></h5>
                                <h2><?php the_title(); ?></h2>
                                <p><?php the_excerpt(); ?></p>
                                <a href="#" class="link-search">BUSCAR INDENIZAÇÃO</a>
                                <a href="<?php the_permalink(); ?>" class="simplelink">Mais informações</a>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Figure -->
                            <div class="col-md-12 cat__itemsolo-figure">
                                <figure>
                                    <?php if(has_post_thumbnail()){
                                        the_post_thumbnail('showcase_large');
                                    }else{
                                        echo '<img src="https://via.placeholder.com/1070x485?text=Not+Image+Found!" alt="Lorem picsum">';
                                    }?>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="container-fluid cat__item bg_<?php echo $typeblock; ?>" id="<?php echo $terms[$i]->slug; ?>">
                    <div class="cat__item-container container">
                        <div class="row">
                            <!-- Figure -->
                            <div class="col-md-5 offset-md-1 cat__item-figure">
                                <figure>
                                    <?php if(has_post_thumbnail()){
                                        the_post_thumbnail('showcase');
                                    }else{
                                        echo '<img src="https://via.placeholder.com/440x485?text=Not+Image+Found!" alt="Lorem picsum">';
                                    }?>                            
                                </figure>
                            </div>
                            <!-- Link and content -->
                            <div class="col-md-5 cat__item-content">
                                <h5><?php echo $terms[$i]->name; ?></h5>
                                <h2><?php the_title(); ?></h2>
                                <p><?php the_excerpt(); ?></p>
                                <a href="#" class="link-search">BUSCAR INDENIZAÇÃO</a>
                                <a href="<?php the_permalink(); ?>" class="simplelink">Mais informações</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endwhile; ?>
        <!-- end of the loop -->
        <?php wp_reset_postdata(); ?>
        <?php else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>
        <?php endfor; ?>
    <?php else:
        $argsvt2 = [
            'post_type' => ['construct', 'telefonia', 'compras', 'saude', 'viagem', 'ajuda'],
            'orderby'             => 'date',
            'order'               => 'DESC',
            'post__not_in'        => $postaexclude,
            'posts_per_page'      => 1,
            'tax_query'           => [
                'relation' => 'IN',
                [
                    'taxonomy'  => $terms[$i]->taxonomy,
                    'terms'     => array( $terms[$i]->slug ),
                    'field'     => 'slug'
                ],
                [
                    'taxonomy'  => $terms[$i]->taxonomy,
                    'terms'     => $terms[$i]->parent,
                    'field'     => 'term_id'
                ]
            ],
            'ignore_sticky_posts' => 1
        ];
        $qryvt2 = new WP_Query($argsvt2);

        if ( have_posts() ) : 

        ?>

        <!-- the loop -->
        <?php while ( have_posts() ) : the_post(); 
        $postaexclude[] = get_the_ID();
        if($wp_query->current_post % 2 == 0){$typeblock = 'white'; }else{$typeblock = 'black';}
        if($wp_query->current_post % 2 == 0 && $i != 0):?>
            <div class="container-fluid cat__itemsolo bg_<?php echo $typeblock; ?>" id="<?php echo $terms[$i]->slug; ?>">
                <div class="cat__item-container container">
                    <div class="row">
                        <!-- Link and content -->
                        <div class="col-md-12 cat__itemsolo-content">
                            <h5><?php echo $terms[$i]->name; ?></h5>
                            <h2><?php the_title(); ?></h2>
                            <p><?php the_excerpt(); ?></p>
                            <a href="#" class="link-search">BUSCAR INDENIZAÇÃO</a>
                            <a href="<?php the_permalink(); ?>" class="simplelink">Mais informações</a>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Figure -->
                        <div class="col-md-12 cat__itemsolo-figure">
                            <figure>
                                <?php if(has_post_thumbnail()){
                                    the_post_thumbnail('showcase_large');
                                }else{
                                    echo '<img src="https://via.placeholder.com/1070x485?text=Not+Image+Found!" alt="Lorem picsum">';
                                }?>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="container-fluid cat__item bg_<?php echo $typeblock; ?>" id="<?php echo $terms[$i]->slug; ?>">
                <div class="cat__item-container container">
                    <div class="row">
                        <!-- Figure -->
                        <div class="col-md-5 offset-md-1 cat__item-figure">
                            <figure>
                                <?php if(has_post_thumbnail()){
                                    the_post_thumbnail('showcase');
                                }else{
                                    echo '<img src="https://via.placeholder.com/440x485?text=Not+Image+Found!" alt="Lorem picsum">';
                                }?>                            
                            </figure>
                        </div>
                        <!-- Link and content -->
                        <div class="col-md-5 cat__item-content">
                            <h5><?php echo $terms[$i]->name; ?></h5>
                            <h2><?php the_title(); ?></h2>
                            <p><?php the_excerpt(); ?></p>
                            <a href="#" class="link-search">BUSCAR INDENIZAÇÃO</a>
                            <a href="<?php the_permalink(); ?>" class="simplelink">Mais informações</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php endwhile; ?>
        <!-- end of the loop -->
        <?php wp_reset_postdata(); ?>
        <?php else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Depoimentos -->
    <div class="container-fluid cat__depoiments" style="background-image: url('https://picsum.photos/1920/410?random=5');">
        <div class="container">
            <div class="row">
                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev dep-prev"></div>
                <div class="swiper-button-next dep-next"></div>
                <div class="col-12 cat__depoiments-container">
                    <div class="swiper-wrapper">
                        <?php
                            $argsdep = [
                                'status' => 'approve'
                            ];
                            $comments = get_comments($argsdep);
                        ?>
                        <?php foreach ($comments as $key => $comentario):?>
                        <div class="swiper-slide">
                            <div class="cat__depoiments-item">
                                <figure><img src="<?php echo get_gravatar($comentario->comment_author_email, 95, 'mp', 'g', false); ?>" alt="Perfil de depoimento"></figure>
                                <h6><?php echo $comentario->comment_author; ?></h6>
                                <span class="cat__depoiments-process"><?php echo get_the_title( $comentario->comment_post_ID ); ?></span>
                                <span class="cat__depoiments-ranking">
                                <aside class="categori__validate"><?php
                                    $stars   = '';
                                    $average = ci_comment_rating_get_average_ratings( $comentario->comment_post_ID ); 
                                    for ( $i = 1; $i <= $average + 1; $i++ ) {

                                        $width = intval( $i - $average > 0 ? 20 - ( ( $i - $average ) * 20 ) : 20 );
                                
                                        if ( 0 === $width ) {
                                            continue;
                                        }
                                
                                        $stars .= '<span style="" class="dashicons dashicons-star-filled"></span>';
                                
                                        if ( $i - $average > 0 ) {
                                            $stars .= '<span style="" class="dashicons dashicons-star-empty"></span>';
                                        }
                                    }
                                    echo $stars;
                                ?></aside>
                                </span>
                                <span class="cat__depoiments-content">
                                <?php echo $comentario->comment_content; ?>
                                </span>
                            </div>
                        </div>
                        <? endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Topicos de ajuda -->

    <div class="container-fluid cat__help">
        <div class="container">
            <div class="row">
                <!-- Text -->
                <div class="col-12 col-md-6 cat__help-text">
                    <div>
                        <h3>Ajuda</h3>
                        <h1><?php echo nl2br(get_theme_mod('hel_title')); ?></h1>
                        <article><?php echo nl2br(get_theme_mod('hel_text')); ?></article>
                    </div>
                </div>
                <!-- Posts -->
                <div class="col-12 col-md-6 cat__help-posts">
                <?php 
                    $args = [
                        'post_type' => 'ajuda',
                        'posts_per_page' => 3,
                        'orderby' => 'date',
                        'ignore_sticky_posts' => 1
                    ];
                    $the_query = new WP_Query($args);
                    if ( $the_query->have_posts() ) : ?>
    
                    <!-- pagination here -->

                    <!-- the loop -->
                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <div class="cat__help-posts-item">
                            <figure>
                            </figure>
                            <article>
                            
                                <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                                <a href="<?php the_permalink(); ?>"><p><?php the_excerpt(); ?></p></a>
                                
                            </article>
                        </div>
                    <?php endwhile; ?>
                    <!-- end of the loop -->

                    <!-- pagination here -->

                    <?php wp_reset_postdata(); ?>

                    <?php else : ?>
                    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Miniblog -->
    <div class="container-fluid vitrin2 minblog">
        <div class="container">
            <div class="row">
                <div class="col-12 minblog__title">
                    <small>Blog</small>
                    <h1><?php echo nl2br(get_theme_mod('rmb_min_blog_text')); ?></h1>
                </div>
            </div>
            <div class="row minblog__container vitrin2__container">
                
                <?php
                    $argsvt2 = [
                        'post_status'         => 'publish',
                        'post_type'           => 'post',
                        'category__in'        => intval(get_theme_mod('rmb_vitr2__cat')),
                        'orderby'             => 'date',
                        'order'               => 'DESC',
                        'posts_per_page'      => 3,
                        'post__in' => get_option('sticky_posts'),
                        'ignore_sticky_posts' => 1
                    ];

                    $qryvt2 = new WP_Query($argsvt2);
                    
                    if ( $qryvt2->have_posts() ) : 
                ?>

                <!-- the loop -->
                <?php while ( $qryvt2->have_posts() ) : $qryvt2->the_post(); ?>
                    <div class="vitrin2__item">
                        <figure class="vitrin2__thumb">
                            <?php the_post_thumbnail('showcase'); ?>
                        </figure>
                        <h5 class="vitrin2__item-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>             
                    </div>
                <?php endwhile; ?>
                <!-- end of the loop -->
                <?php wp_reset_postdata(); ?>

                <?php else : ?>
                <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                <?php endif; ?>
                
            </div>

            <div class="row">
                <div class="col-12 d-flex flex-row justify-content-center align-items-start">
                    <a href="#" class="link-archive minblog__link pmore vitrin2__link">INFORME-SE</a>
                </div>
            </div>
        </div>
    </div>
<?php } get_footer(); ?>