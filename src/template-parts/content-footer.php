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