<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package auaha
 */

get_header(); ?>

<?php if (have_posts()) : the_post(); ?>
    <div class="container">
        <div class="row single__thepost-container">
            <div class="col-12">
                <div class="single__thepost-content"><?php the_content(); ?></div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php get_template_part('template-parts/content', 'footer'); ?>


<?php get_footer(); ?>