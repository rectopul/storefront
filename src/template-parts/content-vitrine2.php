<div class="container-fluid vitrin2">
    <div class="container">
        <div class="row">
            <div class="col-12 vitrin2__title">
                <h1><?php echo nl2br(get_theme_mod('rmb_vitr2__titulo')); ?></h1>
                <small><?php echo nl2br(get_theme_mod('rmb_vitr2__desc')); ?></small>
            </div>
        </div>
        <div class="row vitrin2__container">
            
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
                <a href="#" class="link-archive pmore vitrin2__link">Saiba Mais</a>
            </div>
        </div>
    </div>
</div>