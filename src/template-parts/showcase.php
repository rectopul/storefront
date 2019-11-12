<div class="container">
    <div class="row">
        <div class="col-12 vitrine_title">
            <h1><?php echo nl2br(get_theme_mod('vitrine_1_title')); ?></h1>
            <small><?php echo get_theme_mod('vitrine_1_subtitle'); ?></small>         
        </div>            
    </div>
    <div class="row">
        <div class="col-12 showcase__carroussel vitrine-1">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <?php
                    $argsshocs = [
                        'post_type' => 'viagem',
                        'post_status' => 'publish',
                        'posts_per_page' => 10,
                        'orderby' => 'title',
                        'order' => 'ASC',
                    ];
                    // Get the taxonomy's terms
                    $terms = get_terms(
                        array(
                            'taxonomy'   => 'categoria',
                            'parent' => 0,
                            'hide_empty' => true,
                        )
                    );

                    
                    $args = [
                        'public'   => true,
                        '_builtin' => false,
                    ];

                    // Check if any term exists
                    if ( ! empty( $terms ) && is_array( $terms ) ) {
                        // Run a loop and print them all
                        foreach ( $terms as $term ) { 
                            $term_parent = get_terms(['taxonomy'=> 'categoria', 'parent' => $term->term_id, 'hide_empty' => false]);
                            smk_get_template_part('/components/products.php', array(
                                'term' => $term_parent[0],
                                'parent_slug' => $term->term_id
                            ));
                        }
                    } 
            
                    $output = 'objects'; // names or objects, note names is the default
                    $operator = 'and'; // 'and' or 'or'
                    $post_types = get_post_types($args, $output, $operator);
            
                    $posttypes_array = [];                 
                ?>  
            </div>              
        </div>
    </div>
    <div class="row">
        <div class="col-12 showcase__navegation">
            <!-- If we need pagination -->
            <div class="showcase__pagination pagination-vitr-1"></div>

            <!-- If we need navigation buttons -->
            <div class="showcase__arrow-yellow showcase__arrow-next">
                <span class="vitrine_1_next"></span>
            </div>
            <div class="showcase__arrow-yellow showcase__arrow-prev">
                <span class="vitrine_1_prev"></span>
            </div>
        </div>
    </div>
</div>