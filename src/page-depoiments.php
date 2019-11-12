<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package auaha
 * Template Name: Depoimentos
 */

get_header(); ?>
<div class="container fluid member">
    <div class="container">
        <div class="row">
            <?php 
                $depoiments = get_comments();
                $categoriescoment = [];
                $category_detail=get_the_category('4');//$post->ID
                foreach($depoiments as $coment){
                    $categoriescoment[] = get_post($coment->comment_post_ID);
                }
                $catsmembers = get_categories([
                    'hide_empty' => false,
                    'parent' => 0,
                    'taxonomy' => 'cat_processos',
                    'orderby' => 'date',
                    'order' => 'ASC',
                ]);  
            ?>
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
                            <?php
                                $args = [
                                    'post_type' => 'processos',
                                    'posts_per_page' => 9,
                                    'ignore_sticky_posts' => 1,
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => $catcont->taxonomy,
                                            'field'    => 'slug',
                                            'terms'    => $catcont->slug,
                                        )
                                    )
                                ]; $coments_query = new WP_Query($args); 
                            ?>

                            <?php if( $coments_query->have_posts() ): ?>
                                <?php while( $coments_query->have_posts() ): $coments_query->the_post();
                                $comments = get_comments(['post_id' => get_the_ID(), 'status' => 'approve']); ?>
                                    <?php foreach ($comments as $t => $comment): ?>
                                        <div class="col-12 member__item">
                                            <div class="depoiment__item-container">
                                                <div class="depoiment__profile">
                                                    <figure><img src="<?php echo get_gravatar($comment->comment_author_email, 95, 'mp', 'g', false); ?>" alt="Profile"></figure>
                                                    <div class="depoiment__profile-title">
                                                        <h4><?php echo $comment->comment_author; ?></h4>
                                                        <h6><?php the_title(); ?></h6>
                                                        <aside class="categori__validate">
                                                            <?php
                                                                $stars   = '';
                                                                $average = ci_comment_rating_get_average_ratings( $comment->comment_post_ID ); 
                                                                for ( $i = 1; $i <= $average + 1; $i++ ) {
                        
                                                                    $width = intval( $i - $average > 0 ? 20 - ( ( $i - $average ) * 20 ) : 20 );
                                                            
                                                                    if ( 0 === $width ) {
                                                                        continue;
                                                                    }
                                                            
                                                                    $stars .= '<span style="overflow:hidden; width:' . $width . 'px" class="dashicons dashicons-star-filled"></span>';
                                                            
                                                                    if ( $i - $average > 0 ) {
                                                                        $stars .= '<span style="overflow:hidden; position:relative; left:-' . $width .'px;" class="dashicons dashicons-star-empty"></span>';
                                                                    }
                                                                }
                                                                echo $stars;
                                                            ?>
                                                        </aside>
                                                    </div>                                                    
                                                </div>             
                                                <p><?php echo $comment->comment_content; ?></p>
                                                <footer>
                                                Ele iniciou o processo em <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date('j \d\e F \d\e Y \á\s g\hi'); ?></time>
                                                <h6><?php the_title(); ?></h6>
                                                </footer>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>
                            <?php else: ?>
                                <?php echo __('Não há depoimentos para este tipo de processo!'); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
                
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>