<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package auaha
 * Template Name: produto
 */
get_header(); $typeblock = 'white';
$even = true;
$terms = get_term('categorias', array('parent' => get_queried_object()->term_id ));
var_dump($terms);
for ($i=0; $i < 2; $i++):
    if ($i&1){$typeblock = 'black'; }else{$typeblock = 'white';}
?>
<div class="container-fluid cat__item bg_<?php echo $typeblock; ?>">
    <div class="cat__item-container container">
        <div class="row">
            <!-- Figure -->
            <div class="col-md-5 offset-md-1 cat__item-figure">
                <figure>
                    <img src="https://picsum.photos/440/485" alt="Lorem picsum">
                </figure>
            </div>
            <!-- Link and content -->
            <div class="col-md-5 cat__item-content">
                <h5>Atraso</h5>
                <h2>Titulo da postagem na categoria Viagem e na subcategoria Atraso</h2>
                <p>Você recebe de 250 € a 600 € de compensação para voos com atrasos superiores a 3 horas.</p>
                <a href="#" class="link-search">BUSCAR INDENIZAÇÃO</a>
                <a href="#" class="simplelink">Mais informações</a>
            </div>
        </div>
    </div>
</div>
<?php endfor; ?>

<div class="container-fluid cat__itemsolo bg_<?php echo $typeblock; ?>">
    <div class="cat__item-container container">
        <div class="row">
            <!-- Link and content -->
            <div class="col-md-12 cat__itemsolo-content">
                <h5>Atraso</h5>
                <h2>Titulo da postagem na categoria Viagem e na subcategoria Atraso</h2>
                <p>Você recebe de 250 € a 600 € de compensação para voos com atrasos superiores a 3 horas.</p>
                <a href="#" class="link-search">BUSCAR INDENIZAÇÃO</a>
                <a href="#" class="simplelink">Mais informações</a>
            </div>
        </div>
        <div class="row">
            <!-- Figure -->
            <div class="col-md-12 cat__itemsolo-figure">
                <figure>
                    <img src="https://picsum.photos/1070/370" alt="Lorem picsum">
                </figure>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid cat__item bg_black">
    <div class="cat__item-container container">
        <div class="row">
            <!-- Figure -->
            <div class="col-md-5 offset-md-1 cat__item-figure">
                <figure>
                    <img src="https://picsum.photos/seed/picsum/440/485" alt="Lorem picsum">
                </figure>
            </div>
            <!-- Link and content -->
            <div class="col-md-5 cat__item-content">
                <h5>Atraso</h5>
                <h2>Titulo da postagem na categoria Viagem e na subcategoria Atraso</h2>
                <p>Você recebe de 250 € a 600 € de compensação para voos com atrasos superiores a 3 horas.</p>
                <a href="#" class="link-search">BUSCAR INDENIZAÇÃO</a>
                <a href="#" class="simplelink">Mais informações</a>
            </div>
        </div>
    </div>
</div>

<!-- Depoimentos -->
<div class="container-fluid cat__depoiments" style="background-image: url('https://picsum.photos/1920/410?random=5');">
    <div class="container">
        <div class="row">
            <div class="col-12 cat__depoiments-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="cat__depoiments-item">
                            <figure><img src="https://picsum.photos/95/95?random=1" alt="lorem pcsum"></figure>
                            <h6>Luís Campos Vicens</h6>
                            <span class="cat__depoiments-process">
                            Reivindicação de cancelamento Vueling
                            </span>
                            <span class="cat__depoiments-ranking">
                            </span>
                            <span class="cat__depoiments-content">
                            Bom negócio e mais rápido que o esperado. <br>
                            Eu cancelei um vôo Nantes - Barcelona em setembro e em meados de fevereiro (um total de 5 meses) eu já tenho minha compensação perto ....
                            </span>
                        </div>
                    </div>
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
                    <h5 class="vitrin2__item-title"><?php the_title(); ?></h5>             
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


<?php get_footer(); ?>