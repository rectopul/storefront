<div class="container-fluid equipehome">
    <div class="container">
        <div class="row equipehome__head">
            <div class="col-12 d-flex flex-column justify-content-start align-items-center">
                <h1><?php echo nl2br(get_theme_mod('rmb_member__title')); ?></h1>
                <small><?php echo nl2br(get_theme_mod('rmb_member__desc')); ?></small>
            </div>
        </div>

        <div class="row">
            <div class="col-12 equipehome__carroussel">
                <!-- Pagination and arrow -->
                <!-- If we need navigation buttons -->
                <div class="showcase__arrow-yellow showcase__arrow-next">
                    <span class="members_next"></span>
                </div>
                <div class="showcase__arrow-yellow showcase__arrow-prev">
                    <span class="members_prev"></span>
                </div>
                <div class="equipehome__carroussel-container">
                    <div class="swiper-wrapper">
                    <?php
                        $argsvt2 = [
                            'post_status'         => 'publish',
                            'post_type'           => 'membros',
                            'orderby'             => 'date',
                            'order'               => 'DESC',
                            'posts_per_page'      => 12
                        ];

                        $qryvt2 = new WP_Query($argsvt2);
                        
                        if ( $qryvt2->have_posts() ) : 
                    ?>

                    <!-- the loop -->
                    <?php while ( $qryvt2->have_posts() ) : $qryvt2->the_post(); ?>
                        <div class="swiper-slide">
                            <div class="equipehome__item">
                                <figure><?php the_post_thumbnail('member', ['class'=> 'member_thumb']); ?></figure>
                                <header><?php the_title(); ?></header>
                                <article>
                                    <div class="equipehome__item-content">
                                        <?php the_content();?>
                                    </div>
                                </article>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <!-- end of the loop -->
                    <?php wp_reset_postdata(); ?>

                    <?php else : ?>
                    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                    <?php endif; ?>                        
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 d-flex flex-column justify-content-start align-items-center">
                <a href="<?php echo get_post_type_archive_link( 'membros' ); ?>" class="link-archive">Quem é a protegit</a>
            </div>
        </div>
    </div>
</div>