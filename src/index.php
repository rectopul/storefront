<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package auaha
 */
get_header(); ?>
<!-- Nav blog -->
<div class="container-fuid blog__nav">
    <div class="container">
        <div class="row">
            <div class="col-3"><h6>Blog</h6></div>
            <div class="col-9">
                <ul class="blog__catslist">
                    <?php
                        $catspost = get_categories(['taxonomy' => 'category', 'parent'  => 0]);
                        foreach ($catspost as $key => $value) { 
                            printf(
                                '<li><a href="%s">%s</a></li>',
                                get_category_link( $value->term_id ),
                                $value->name
                            );
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Sticky Posts -->
<div class="container-fluid blog__sticky">
    <div class="container">
        <div class="row">
            <?php $args = [
                'post_type' => 'post',
                'post__in'=> get_option( 'sticky_posts' ),
                'posts_per_page' => 1,
                'ignore_sticky_posts' => 1,
                'orderby'   => 'date',
                'order' => 'ASC'
            ];
            $the_query = new WP_Query($args); ?>

            <?php if( $the_query->have_posts() ): ?>
                <?php while( $the_query->have_posts() ): $the_query->the_post(); ?>
                    <div class="col-12 blog__sticky-post">
                        <div class="blog__sticky-post-container">
                            <div class="row">
                                <figure class="blog__sticky-thumbnail">
                                    <?php the_post_thumbnail('sticky_blog') ;?>
                                </figure>
                                <div class="col-12 col-md-6 blog__sticky-postcontent">
                                    <h6 class="blog__sticky-cat"><?php the_category(', ', 'single', get_the_ID()); ?></h6>
                                    <a href="<?php the_permalink(); ?>"><?php the_title('<h2>', '</h2>'); ?></a>
                                    <?php the_excerpt(); ?>
                                    <footer>
                                        <img src="<?php echo get_gravatar(get_the_author_email(), 95, 'mp', 'g', false); ?>" alt="Perfil do author">
                                        <?php echo get_author_name(); ?>
                                    </footer>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <!-- pagination here --> 
                <?php wp_reset_postdata(); ?>
            <?php endif; ?> 
        </div>
    </div>
</div>
<div class="container-fluid blog">
    <div class="container">
        <div class="row">
            <?php if (have_posts()) : ?>
                <?php  while( have_posts() ): the_post(); ?>
                    <?php if ( $wp_query->current_post % 3 == 0 AND $wp_query->current_post > 0 ) : ?>
                        </div><div class="row"><div class="col-12 col-sm-6 col-md-4 blog__post">
                            <div class="blog__post-container">
                                <div class="row">
                                    <div class="blog__post-thumb">
                                        <?php if( has_post_thumbnail() ): ?>
                                            <?php the_post_thumbnail('post_thumb', ['class' => 'blog__post-thumb-img']); ?>
                                        <?php else: ?>
                                            <img src="https://via.placeholder.com/410x260?text=Not+Post+Thumbnail" alt="blog__post-thumb-img">
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 blog__post-content">
                                        <h6 class="blog__post-cat"><?php the_category(', ', 'single', get_the_ID()); ?></h6>
                                        <a href="<?php the_permalink(); ?>"><?php the_title('<h2>', '</h2>'); ?></a>
                                        <p><?php the_excerpt(); ?></p>
                                        <footer>
                                            <img src="<?php echo get_gravatar(get_the_author_email(), 95, 'mp', 'g', false); ?>" alt="Perfil do author">
                                            <?php echo get_author_name(); ?>
                                        </footer>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="col-12 col-sm-6 col-md-4 blog__post">
                            <div class="blog__post-container">
                                <div class="row">
                                    <div class="blog__post-thumb">
                                        <?php if( has_post_thumbnail() ): ?>
                                            <?php the_post_thumbnail('post_thumb', ['class' => 'blog__post-thumb-img']); ?>
                                        <?php else: ?>
                                            <img src="https://via.placeholder.com/410x260?text=Not+Post+Thumbnail" alt="blog__post-thumb-img">
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 blog__post-content">
                                        <h6 class="blog__post-cat"><?php the_category(', ', 'single', get_the_ID()); ?></h6>
                                        <a href="<?php the_permalink(); ?>"><?php the_title('<h2>', '</h2>'); ?></a>
                                        <p><?php the_excerpt(); ?></p>
                                        <footer>
                                            <img src="<?php echo get_gravatar(get_the_author_email(), 95, 'mp', 'g', false); ?>" alt="Perfil do author">
                                            <?php echo get_author_name(); ?>
                                        </footer>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="col-12">Não há postagens no blog no momento. Tente novamente mais tarde!</div>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="container-fluid bg-grey blog__news-form">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php echo do_shortcode('[mc4wp_form id="349"]'); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>