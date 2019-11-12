<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package auaha
 * Template Name: Layout Nosso Compromisso
 */

get_header(); ?>
<!-- Nav blog -->
<div class="container-fuid blog__nav">
    <div class="container">
        <div class="row">
            <div class="col-2"><h6>Compromisso Protegit</h6></div>
            <div class="col-10">
                <ul class="page__catslist">
                    <?php
                        $catspost = get_categories(['taxonomy' => 'tipos', 'parent'  => 0, 'hide_empty' => false]);
                        foreach ($catspost as $key => $value) { 
                            printf(
                                '<li><a href="#%s">%s</a></li>',
                                $value->slug,
                                $value->name
                            );
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12 page__saudation">
            <?php echo '<i class="lamp-idea"></i> <h2>'.nl2br(get_theme_mod('compromisso__saudation')).'</h2>'; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-12 page__submessage">
            <?php echo nl2br(get_theme_mod('compromisso__submessage')); ?>
        </div>
    </div>
</div>

<?php 
/**
 * Query posts in taxonomy
 */

$taxonomies = get_categories(['taxonomy' => 'tipos', 'parent'  => 0, 'hide_empty' => false]);
$excluded = [];
$cont = 0;
 foreach ($taxonomies as $i => $value) {
     $args = [
        'post_type' => ['compromisso'],
        'orderby'             => 'date',
        'order'               => 'DESC',
        'post__not_in'        => $excluded,
        'posts_per_page'      => 1,
        'tax_query'           => [
            'relation' => 'IN',
            [
                'taxonomy'  => $value->taxonomy,
                'terms'     => array( $value->slug ),
                'field'     => 'slug'
            ]
        ],
        'ignore_sticky_posts' => 1
     ];

     $the_query = new WP_Query($args);
     
     if($the_query->have_posts()):
        while ($the_query->have_posts()): $cont++; $the_query->the_post(); $excluded[] = get_the_ID();  
            $direction = ($cont % 2 == 0) ? 'left' : 'right'; ?>
           <div class="container-fluid page__direction-<?php echo $direction; ?>">
                <div class="container">
                    <div class="row page__direction-container" id="<?php echo $value->slug; ?>">
                        <div class="col-12 col-md-6">
                            <?php if(has_post_thumbnail()): ?>
                                <figure><?php the_post_thumbnail('post_small'); ?></figure>
                            <?php else: ?>
                                <figure><img src="https://via.placeholder.com/200x200" alt="Thumb Post"></figure>
                            <?php endif; ?>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="row">
                                <div class="col-12"><?php the_title('<h5>', '</h5>'); ?></div>
                            </div>
                            <div class="row">
                                <div class="col-12"><?php the_content(); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
        <?php endwhile;

        wp_reset_postdata();
     endif;
 }
?>
<?php get_footer(); ?>