<?php

/**
 * Role:
 * Subscribers
 */

 /**
  * Rating coments
  */

  //Get the average rating of a post.
function ci_comment_rating_get_average_ratings( $id ) {
	$comments = get_approved_comments( $id );

	if ( $comments ) {
		$i = 0;
		$total = 0;
		foreach( $comments as $comment ){
			$rate = get_comment_meta( $comment->comment_ID, 'rating', true );
			if( isset( $rate ) && '' !== $rate ) {
				$i++;
				$total += $rate;
			}
		}

		if ( 0 === $i ) {
			return false;
		} else {
			return round( $total / $i, 1 );
		}
	} else {
		return false;
	}
}

  //Create the rating interface.
add_action( 'comment_form_logged_in_after', 'ci_comment_rating_rating_field' );
add_action( 'comment_form_after_fields', 'ci_comment_rating_rating_field' );
function ci_comment_rating_rating_field () {
	?>
	<label for="rating">Avaliação<span class="required">*</span></label>
	<fieldset class="comments-rating">
		<span class="rating-container">
			<?php for ( $i = 5; $i >= 1; $i-- ) : ?>
				<input type="radio" id="rating-<?php echo esc_attr( $i ); ?>" name="rating" value="<?php echo esc_attr( $i ); ?>" /><label for="rating-<?php echo esc_attr( $i ); ?>"><?php echo esc_html( $i ); ?></label>
			<?php endfor; ?>
			<input type="radio" id="rating-0" class="star-cb-clear" name="rating" value="0" /><label for="rating-0">0</label>
		</span>
	</fieldset>
	<?php
}

//Save the rating submitted by the user.
add_action( 'comment_post', 'ci_comment_rating_save_comment_rating' );
function ci_comment_rating_save_comment_rating( $comment_id ) {
	if ( ( isset( $_POST['rating'] ) ) && ( '' !== $_POST['rating'] ) )
	$rating = intval( $_POST['rating'] );
	add_comment_meta( $comment_id, 'rating', $rating );
}

//Make the rating required.
add_filter( 'preprocess_comment', 'ci_comment_rating_require_rating' );
function ci_comment_rating_require_rating( $commentdata ) {
	if ( ! is_admin() && ( ! isset( $_POST['rating'] ) || 0 === intval( $_POST['rating'] ) ) )
	wp_die( __( 'Error: You did not add a rating. Hit the Back button on your Web browser and resubmit your comment with a rating.' ) );
	return $commentdata;
}

//Display the rating on a submitted comment.
add_filter( 'comment_text', 'ci_comment_rating_display_rating');
function ci_comment_rating_display_rating( $comment_text ){

	if ( $rating = get_comment_meta( get_comment_ID(), 'rating', true ) ) {
		$stars = '<p class="stars">';
		for ( $i = 1; $i <= $rating; $i++ ) {
			$stars .= '<span class="dashicons dashicons-star-filled"></span>';
		}
		$stars .= '</p>';
		$comment_text = $comment_text . $stars;
		return $comment_text;
	} else {
		return $comment_text;
	}
}

if(current_user_can('subscriber')){
    add_action('wp_dashboard_setup', 'widget_process');
}
  
function widget_process() {
global $wp_meta_boxes;
 
wp_add_dashboard_widget('process_list_widget', 'Meus Processos', 'process_list_widget', 'process_list_widget_handle');
}
 
function process_list_widget() { 
    ?>
    <div class="process__container">
        <div class="process__list">
            <!-- Select all process -->
            <?php
                $argsprocess = [
                    'post_type' => 'processos',
                    'posts_per_page' => -1, 
                    'orderby' => 'title', 
                    'order' => 'ASC',
                ];

                $field = get_user_meta(get_current_user_id(), 'document_cpf', false);

                $loop = new WP_Query( $argsprocess );
                if ( $loop->have_posts() ) :
                    while ( $loop->have_posts() ) : $loop->the_post(); 
                        $meta = explode(',',get_post_meta(get_the_ID(), 'cliente_do_processo__cliente', true));
                        if(in_array(get_current_user_id(), $meta)):
                    ?>
                        <div class="process__item">
                            <header class="head">
                            <svg class="bd-placeholder-img rounded mr-2" width="30" height="30" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
                                <rect fill="#33f180" width="100%" height="100%"></rect>
                            </svg>
                            </header>
                            <article>
                                <div class="process__name"><h3><?php the_title(); ?></h3></div>
                                <div class="process__description"><?php the_excerpt(); ?></div>
                            </article>
                            <footer class="process__description"><strong>Concluido!</strong></footer>
                            <div class="process__coment">
                                <button class="process__coment-button"><span class="dashicons dashicons-testimonial"></span></button>
                            </div>
                            <div class="process__form">
                            <?php comment_form(); ?>
                            </div>
                        </div>
                        <?php endif;
                    endwhile;
                endif;

                wp_reset_postdata();
            ?>
            <!-- Iten processo -->

            <!-- #ffa500 -->
            <div class="process__item">
                <header class="head">
                <svg class="bd-placeholder-img rounded mr-2" width="30" height="30" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
                    <rect fill="#ffa500" width="100%" height="100%"></rect>
                </svg>
                </header>
                <article>
                    <div class="process__name"><h3>Reivindicação de cancelamento Vueling</h3></div>
                    <div class="process__description">Eu cancelei um vôo Nantes - Barcelona em setembro e em meados de fevereiro</div>
                </article>
                <footer class="process__description"><strong>Pendente!</strong></footer>
            </div>

            <!-- #ff0000 -->
            <div class="process__item">
                <header class="head">
                <svg class="bd-placeholder-img rounded mr-2" width="30" height="30" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
                    <rect fill="#ff0000" width="100%" height="100%"></rect>
                </svg>
                </header>
                <article>
                    <div class="process__name"><h3>Reivindicação de cancelamento Vueling</h3></div>
                    <div class="process__description">Eu cancelei um vôo Nantes - Barcelona em setembro e em meados de fevereiro</div>
                </article>
                <footer class="process__description"><strong>Cancelado!</strong></footer>
            </div>
        </div>
    </div>
<?php
}

function rmb_dashboard_widget_process_config_defaults() {
	return array(
        'stars' => 0,
        'depoiment' => [
            'title' => '',
            'content' => ''
        ]
	);
}

function process_list_widget_handle(){
    $options = wp_parse_args( get_option( 'process_list_widget' ), rmb_dashboard_widget_process_config_defaults() );

	if ( isset( $_POST['submit'] ) ) {
		if ( isset( $_POST['rss_items'] ) && intval( $_POST['rss_items'] ) > 0 ) {
			$options['items'] = intval( $_POST['rss_items'] );
		}

		update_option( 'process_list_widget', $options );
    }
    ?>
	<p>
		<label><?php _e( 'Number of RSS articles:', 'dw' ); ?>
			<input type="text" name="rss_items" value="<?php echo esc_attr( $options['items'] ); ?>" />
		</label>
	</p>
	<?php
}

/**
 * Role:
 * Admin
 */

 // Update CSS within in Admin
function admin_style() {
    wp_enqueue_style('dashboard-styles', get_template_directory_uri().'/assets/css/dashboard.css');
  }
add_action('admin_enqueue_scripts', 'admin_style');