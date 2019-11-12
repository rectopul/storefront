<div class="container-fluid depoiments">
    <div class="container">
        <!-- Title -->
        <div class="row">
            <div class="col-12 depoiments__title">
                <h1>Depoimentos</h1>
                <small>Texto complementar</small>
            </div>
        </div>

        <!-- Conteúdo -->
        <div class="row">
            <div class="col-12 depoiments__items__container">
                <div class="depoiments__items">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <?php
                            $sistemusers = get_users ('orderby = nicename & role = subscriber'); 
                            foreach (get_comments(array('status'=> 'approve')) as $comment): 
                            //comment_post_ID
                            ?>
                                <div class="swiper-slide">
                                    <div class="depoiments__item">
                                        <header class="depoiments__head">
                                            <figure class="depoiment__imageprofile">
                                                <img src="<?php echo get_gravatar($comment->comment_author_email, 95, 'mp', 'g', false); ?>" alt="Profile">
                                            </figure>
                                            <div class="depoiments__head-txt">
                                                <div class="profile"><?php echo '<span>'. esc_html ($comment->comment_author). '</span>';  ?></div>
                                                <div class="depoiments__the__title">
                                                <?php echo get_the_title( $comment->comment_post_ID ); ?>
                                                </div>
                                                <aside class="categori__validate"><?php
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
                                                ?></aside>
                                            </div>
                                        </header>
                                        <article class="depoiments__item-content">
                                        <?php echo '<span>'. limit_text(esc_html ($comment->comment_content), 40). '</span>';  ?>
                                        </article>
                                    </div>
                                </div>
                            <?php endforeach;
                            ?>
                    </div>
                </div>
                <!-- If we need navigation buttons -->
                <div class="showcase__arrow depoiments__arrow-next">
                    <span class="dpm_next"></span>
                </div>
                <div class="showcase__arrow depoiments__arrow-prev">
                    <span class="dpm_prev"></span>
                </div>
            </div>
        </div>

        <!-- Ver mais -->
        <div class="row">
            <div class="col-12 text-center mt-5">
                <a href="" class="link-archive">O QUE DIZEM SOBRE A GENTE</a>
            </div>
        </div>
    </div>
</div>