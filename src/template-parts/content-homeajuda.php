<div class="container-fluid bg-black-pure ajudahome">
    <div class="container">
        <div class="row ajudahome__container">
            <div class="col-12 col-sm-12 col-md-5 ajudahome__title">
                <h1><?php echo nl2br(get_theme_mod('title_help_home')); ?></h1>
                <small><?php echo nl2br(get_theme_mod('desc_help_home')); ?></small>
                <?php 
                $catid = get_category_by_slug(get_theme_mod('link_help_home'));
                $catlink = get_category_link( $catid->cat_ID );
                ?>
                <a href="<?php echo $catlink; ?>" class="link-white mt-4">ENTENDA SEUS DIREITOS</a>
            </div>
            <div class="col-12 col-sm-12 col-md-5 offset-md-1 ajudahome__container_list">
                <ul class="ajudahome__list">
                    <?php 
                        $argshelp = [
                            'post__not_in'  => get_option( 'sticky_posts' ),
                            'post_status'    => 'publish',
                            'post_type'      => 'post',
                            'category_name'  => 'ajuda',
                            'posts_per_page' => 3                        
                        ];

                        $the_query = new WP_Query($argshelp);
                    ?>
                    <?php if ( $the_query->have_posts() ) : ?>
 
                    <!-- pagination here -->

                    <!-- the loop -->
                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <li class="ajudahome__item">
                            <figure class="ajudahome__icon">
                                
                            </figure>
                            <a href="<?php the_permalink();?>">
                            <article>
                                <h6><?php the_title(); ?></h6>
                                <small><?php the_excerpt(); ?></small>
                            </article>
                            </a>
                        </li>
                    <?php endwhile; ?>
                    <!-- end of the loop -->

                    <?php wp_reset_postdata(); ?>

                    <?php else : ?>
                    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                    <?php endif; ?>                    
                </ul>
            </div>
        </div>
    </div>
</div>