<?php

//Adiciona um script para o WordPress
add_action('wp_enqueue_scripts', 'secure_enqueue_script');
add_action('admin_enqueue_scripts', 'secure_enqueue_script');
function secure_enqueue_script()
{
    wp_register_script('secure-ajax-access', esc_url(add_query_arg(array('js_global' => 1), site_url())));
    wp_enqueue_script('secure-ajax-access');
}

//Joga o nonce e a url para as requisições para dentro do Javascript criado acima
add_action('template_redirect', 'javascript_variaveis');
function javascript_variaveis()
{
    if (!isset($_GET['js_global'])) return;

    $nonce = wp_create_nonce('filter__nonce');

    $variaveis_javascript = array(
        'filter__nonce' => $nonce, //Esta função cria um nonce para nossa requisição para buscar mais notícias, por exemplo.
        'xhr_url'             => admin_url('admin-ajax.php') // Forma para pegar a url para as consultas dinamicamente.
    );

    $new_array = array();
    foreach ($variaveis_javascript as $var => $value) $new_array[] = esc_js($var) . " : '" . esc_js($value) . "'";

    header("Content-type: application/x-javascript");
    printf('var %s = {%s};', 'js_global', implode(',', $new_array));
    exit;
}


add_action('wp_ajax_nopriv_filter-home', 'filter_home');
add_action('wp_ajax_filter-home', 'filter_home');

function filter_home()
{
    if (!wp_verify_nonce($_POST['filter__nonce'], 'filter__nonce')) {
        echo '401'; // Caso não seja verificado o nonce enviado, a requisição vai retornar 401
        die();
    }
    if(isset($_POST['why'])){
        $searchquery = new WP_Query([
            'post_type' => $_POST['action-client'],
            'tax_query' => [
                'relation' => 'IN',
                [
                    'taxonomy' => 'partner',
                    'field'    => 'slug',
                    'terms'    => $_POST['why']
                ]
            ],
        ]); 

        $suggestions = [];
        
        if($searchquery->have_posts()){
            while ( $searchquery->have_posts() ) {
                $searchquery->the_post();
                    $suggestions[] = [
                        'link' => get_permalink()
                    ];
            }            
            wp_reset_postdata();
        }else{
            $noth = get_term_by('id', $_POST['type'], 'partner' );
            $suggestions[] = [
                'link' => get_term_link( $noth->slug, 'partner' )
            ];
        }
    	
    	$response = json_encode( $suggestions );
    	echo $response;
    	exit();
    }elseif (isset($_POST['action-client']) && !$_POST['type']) {
        $terms = get_terms([
            'taxonomy' => 'partner',
            'hide_empty' => false,
            'parent' => 0
        ]);
        echo json_encode($terms);
    }elseif(isset($_POST['type'])){
        $terms2 = get_terms([
            'taxonomy' => 'partner',
            'hide_empty' => false,
            'parent' => $_POST['type']
        ]);

        echo json_encode($terms2);
    }
    exit;
}

add_action('wp_ajax_nopriv_search-client', 'search__client');
add_action('wp_ajax_search-client', 'search__client');

function search__client(){
    if (!wp_verify_nonce($_POST['client__nonce'], 'filter__nonce')) {
        echo '401'; // Caso não seja verificado o nonce enviado, a requisição vai retornar 401
        die();
    }

    if($_POST['client__cpf']){
        $responseclient = [
            'status' => 'pendente',
            'resposta' => 'Procurando Cliente'
        ];
        $sistemusers = get_users ('orderby = nicename & role = subscriber'); 
        foreach ($sistemusers as $user) { 
            $depoiment = get_user_meta( $user->ID, 'document_cpf' , true );
            if($depoiment == $_POST['client__cpf']){
                $responseclient['status'] = 'encontrado';
                $responseclient['resposta'] = 'Cliente Encontrado';
                $responseclient['cliente'] = $user;
            }
        }
        echo json_encode($responseclient);
    }

    exit;
}
add_action( 'wp_ajax_ajaxcomments', 'misha_submit_ajax_comment' ); // wp_ajax_{action} for registered user
add_action( 'wp_ajax_nopriv_ajaxcomments', 'misha_submit_ajax_comment' ); // wp_ajax_nopriv_{action} for not registered users
 
function misha_submit_ajax_comment(){
	/*
	 * Wow, this cool function appeared in WordPress 4.4.0, before that my code was muuuuch mooore longer
	 *
	 * @since 4.4.0
	 */
	$comment = wp_handle_comment_submission( wp_unslash( $_POST ) );
	if ( is_wp_error( $comment ) ) {
		$error_data = intval( $comment->get_error_data() );
		if ( ! empty( $error_data ) ) {
			wp_die( '<p>' . $comment->get_error_message() . '</p>', __( 'Comment Submission Failure' ), array( 'response' => $error_data, 'back_link' => true ) );
		} else {
			wp_die( 'Unknown error' );
		}
	}
 
	/*
	 * Set Cookies
	 */
	$user = wp_get_current_user();
	do_action('set_comment_cookies', $comment, $user);
 
	/*
	 * If you do not like this loop, pass the comment depth from JavaScript code
	 */
	$comment_depth = 1;
	$comment_parent = $comment->comment_parent;
	while( $comment_parent ){
		$comment_depth++;
		$parent_comment = get_comment( $comment_parent );
		$comment_parent = $parent_comment->comment_parent;
	}
 
 	/*
 	 * Set the globals, so our comment functions below will work correctly
 	 */
	$GLOBALS['comment'] = $comment;
	$GLOBALS['comment_depth'] = $comment_depth;
 
	/*
	 * Here is the comment template, you can configure it for your website
	 * or you can try to find a ready function in your theme files
	 */
	$comment_html = '<li ' . comment_class('', null, null, false ) . ' id="comment-' . get_comment_ID() . '">
		<article class="comment-body" id="div-comment-' . get_comment_ID() . '">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					' . get_avatar( $comment, 100 ) . '
					<b class="fn">' . get_comment_author_link() . '</b> <span class="says">says:</span>
				</div>
				<div class="comment-metadata">
					<a href="' . esc_url( get_comment_link( $comment->comment_ID ) ) . '">' . sprintf('%1$s at %2$s', get_comment_date(),  get_comment_time() ) . '</a>';
 
					if( $edit_link = get_edit_comment_link() )
						$comment_html .= '<span class="edit-link"><a class="comment-edit-link" href="' . $edit_link . '">Edit</a></span>';
 
				$comment_html .= '</div>';
				if ( $comment->comment_approved == '0' )
					$comment_html .= '<p class="comment-awaiting-moderation">Your comment is awaiting moderation.</p>';
 
			$comment_html .= '</footer>
			<div class="comment-content">' . apply_filters( 'comment_text', get_comment_text( $comment ), $comment ) . '</div>
		</article>
	</li>';
	echo $comment_html;
 
	die();
 
}