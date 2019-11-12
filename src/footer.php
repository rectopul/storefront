<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package auaha
 */

?>

</div>
<footer class="container-fluid bg-black-pure footer">
    <div class="container">
        <div class="row">
            <!-- Menus -->
            <div class="col-12 col-md-7 footer__menu">
                <?php
                wp_nav_menu(array(
                    'theme_location'  => 'footer',
                    'sort_column'     => 'menu_order',
                    'container'       => false,
                    'menu_class'       => 'foot__menu'
                ));
                ?>
            </div>
            <!-- Blog -->
            <div class="col-12 col-md-4 offset-md-1">
                <div class="row">
                    <div class="col-12">
                        <h4><a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">Blog</a></h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <ul class="list-unstyled footer__postlist">
                            <?php
                                $argminiblog = [
                                    'post_type' => 'post',
                                    'posts_per_page' => '3',
                                    'ignore_sticky_posts' => true
                                ];
                                $mini_query = new WP_Query($argminiblog);
                                
                                if ( $mini_query->have_posts() ) : 
                            ?>

                            <!-- the loop -->
                            <?php while ( $mini_query->have_posts() ) : $mini_query->the_post(); ?>
                            <li class="media">
                                <?php 
                                if ( has_post_thumbnail() ) {
                                    the_post_thumbnail('miniblog', ['class' => 'mr-3', 'alt' => 'Generic placeholder image']); 
                                }else{
                                    echo '<img class="mr-3" src="https://via.placeholder.com/75x50.png?text=Not+found" alt="Generic placeholder image">';
                                }?>
                                <div class="media-body">
                                    <h5 class="mt-0 mb-1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                    <?php the_time('j \d\e F \d\e Y'); ?>
                                </div>
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
        <div class="row">
            <div class="col-12">
                <div class="row footer__rodape">
                    <div class="col-12 col-md-3 footer__socials-container">
                        Ajude-nos
                        <ul class="footer__socials">
                            <li><a href="twitter.com"><span class="dashicons dashicons-facebook-alt"></span></a></li>
                            <li><a href="twitter.com"><span class="dashicons dashicons-instagram"></span></a></li>
                            <li><a href="twitter.com"><span class="dashicons dashicons-twitter"></span></a></li>
                            <li><a href="twitter.com"><span class="dashicons dashicons-video-alt3"></span></a></li>
                            <li><a href="twitter.com"><span class="dashicons dashicons-twitter"></span></a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-6 d-flex justify-content-center align-items-center footer__contactlinks-container">
                        <ul class="footer__contactlinks">
                            <li><a href="twitter.com">Politica de privacidade</a></li>
                            <li>contato@protegit.com.br</li>
                            <li><i class="whatsgreen-ico">(11)1111-1111</i></li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-3 justify-content-end text-right align-items-center footer__copytext">PROTEGIT® - Todos os direitos reservados</div>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
<?php wp_footer(); ?>
</body>

</html>