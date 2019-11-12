<?php

/**
 * auaha functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package auaha
 */

define('WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST']);
define('WP_HOME', 'http://' . $_SERVER['HTTP_HOST']);

if (!function_exists('auaha_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function auaha_setup()
    {
        /*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on auaha, use a find and replace
	 * to change 'auaha' to the name of your theme in all the template files.
	 */
        load_theme_textdomain('auaha', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
        add_theme_support('title-tag');

        /*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'menu-1' => esc_html__('Primary', 'auaha'),
            'footer' => esc_html__('Footer Menu', 'auaha'),
        ));

        /*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));
        /** 
         * Custom Header Support 
         * Image Of C/ustom Header Sizes
         */

        $cHeader = array(
            'width'         => 1920,
            'height'        => 405,
            'flex-height'    => true,
            'default-image' => get_template_directory_uri() . '/images/header.jpg',
        );
        add_theme_support('custom-header', $cHeader);

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('auaha_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height'      => 40,
            'width'       => 200,
            'flex-width'  => true,
            'flex-height' => true,
            'header-text' => array('site-title', 'site-description')
        ));
        /**
         *	Custom images size
         *	Add Images sizes customizables in system
         */

        add_image_size('solutions_thumbnail', 376, 185, true);
        add_image_size('banner_extra', 1920, 550, true);
        add_image_size('case', 831, 398, false);
        add_image_size('perfil', 190, 190, false);
        add_image_size('sticky_blog', 675, 510, true);
        add_image_size('sticky_imprensa', 630, 365, true);
        add_image_size('logotipo', 230, 230, false);
        add_image_size('vitrine', 300, 370, true);
        add_image_size('showcase', 440, 485, true);
        add_image_size('showcase_large', 1070, 485, true);
        add_image_size('post_small', 200, 200, true);
        add_image_size('post_thumbnail', 410, 495, true);
        add_image_size('post_thumb', 410, 260, true);
        add_image_size('member', 410, 250, true);
        add_image_size('thumbnail_post', 410, 300, true);
        add_image_size('miniblog', 75, 50, true);
        add_image_size('iconcat', 40, 40, false);
        add_image_size('icon_large', 150, 150, false);
        add_image_size('galery_pages', 1290, 427, true);
        add_theme_support('post-thumbnails', array('marketplace', 'post', 'gallery-items', 'audio-items', 'video-items', 'page', 'event-items', 'staff'));
    }
endif;
add_action('after_setup_theme', 'auaha_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function auaha_content_width()
{
    $GLOBALS['content_width'] = apply_filters('auaha_content_width', 640);
}
add_action('after_setup_theme', 'auaha_content_width', 0);

/**
 * Enqueue scripts and styles.
 */
function auaha_scripts()
{
    wp_enqueue_script('jquery');
    wp_enqueue_style('auaha-style', get_stylesheet_uri());
    /**
     * Main Style
     */
    wp_enqueue_style('Main Style', get_template_directory_uri() . '/assets/css/app.css', false, '4.2.1');
    /**
     * Font - Roboto
     */
    wp_enqueue_style('Roboto Condensed', 'https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i|Roboto+Condensed:300,300i,400,400i,700,700i&display=swap', false, '1.0.0', 'all');
    //Get Popper JS
    wp_enqueue_script('Popper JS', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'), '4.3.1', true);
    //Get Bootstrap CSS
    wp_enqueue_style('Bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', false, '4.2.1');
    //Get Bootstrap JS
    wp_enqueue_script('Bootstrap JS', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '4.2.1', true);

    //Get Swiper CSS
    wp_enqueue_style('Swiper', get_template_directory_uri() . '/assets/css/swiper.min.css', false, '4.3.1');
    //Get Swiper JS
    wp_enqueue_script('Swiper JS', get_template_directory_uri() . '/assets/js/swiper.min.js', array('jquery'), '4.3.1', true);
    //Get Functions JS
    wp_enqueue_script('RMB Functions JS', get_template_directory_uri() . '/assets/js/functions.js', array('jquery'), '1.0.0', true);
    //Get Animate CSS
    wp_enqueue_style('Animate', get_template_directory_uri() . '/assets/css/animate.css', false, '4.3.1');
    //Get Animate CSS
    wp_enqueue_style('Animate', get_template_directory_uri() . '/assets/css/animate.css', false, '4.3.1');

    //Mask Input
    wp_enqueue_script('Mask Input', get_template_directory_uri() . '/assets/js/jquery.mask.min.js', array('jquery'), '0.0.1', true);

    wp_enqueue_script('Theme JS', get_template_directory_uri() . '/js/app.js', array('jquery'), '4.3.1', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'auaha_scripts');

/**
 * Style Login
 */
function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/assets/css/login.css' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );

/**
 * Styles Admin
 * Update CSS within in Admin
 */
function custom_styles_admin_area()
{
    /**
     * Icomoon Fonts
     */
    wp_enqueue_style('Icomoon Fonts', get_stylesheet_directory_uri() . '/assets/fonts/icomoon/style.css', false, '1.0.0', 'all');
    /**
     * Icomoon Fonts
     */
    wp_enqueue_script('Scripts Admin Area', get_stylesheet_directory_uri() . '/assets/js/adminarea.js', array('jquery'), '1.0.0', true);
}
add_action('admin_enqueue_scripts', 'custom_styles_admin_area');

/**
 * Widgets
 */
load_template(get_template_directory() . '/inc/widgets.php');

/**
 * Req Ajax
 */
load_template(get_template_directory() . '/inc/ajax.php');

/**
 * Metaboxes
 */
load_template(get_template_directory() . '/inc/metabox.php');

/**
 * Custom Controls
 */
require get_template_directory() . '/inc/settings.php';

/**
 * Dynamic Controls
 * get file dynamic controls
 */
load_template(get_template_directory() . '/inc/dynamic_controls.php');

function wordpress_pagination()
{
    global $wp_query;

    $big = 999999999;

    echo paginate_links(array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

/**
 * Custom Post Type
 * Custom Post Suport Guttengbert Blocks
 */

function book_setup_post_type()
{
    $args = array(
        'public'    => true,
        'labels'     => array(
            'name' => __('Marketplace', 'textdomain'),
            'add_new' => _x('Adicionar Marketplace', 'book'),
            'add_new_item' => __('Adicionar Marketplace'),
            'edit_item' => __('Edit Marketplaces'),
            'all_items' => __('Marketplaces'),
            'search_items' => __('Search Marketplace'),
            'not_found' =>  __('Não há nenhum Marketplace'),
            'parent_item_colon' => ''
        ),
        'menu_icon' => 'dashicons-store',
        'supports'  => array('title', 'editor', 'thumbnail', 'revisions', 'gallery-items')
    );

    $argscase = array(
        'public'    => true,
        'label'     => __('Cases', 'textdomain'),
        'menu_icon' => 'dashicons-hammer',
        'supports'  => array('title', 'editor', 'thumbnail')
    );

    $argsrep = array(
        'public'    => true,
        'label'     => __('Representantes', 'textdomain'),
        'menu_icon' => 'dashicons-admin-users',
        'supports'  => array('title', 'thumbnail', 'excerpt')
    );
    /**
     * Viagem
     */

    $viagens = array(
        'labels' => array(
            'name' => __('Viagem'),
            'singular_name' => __('Viagem')
        ),
        'has_archive' => true,
        'public' => true,
        'rewrite' => array('slug' => 'viagem'),
        'menu_icon' => 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz48c3ZnIHdpZHRoPSIxOHB4IiBoZWlnaHQ9IjE4cHgiIHZpZXdCb3g9IjAgMCAxOCAxOCIgdmVyc2lvbj0iMS4xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIj4gICAgICAgIDx0aXRsZT5QYXRoPC90aXRsZT4gICAgPGRlc2M+Q3JlYXRlZCB3aXRoIFNrZXRjaC48L2Rlc2M+ICAgIDxnIGlkPSJIb21lIiBzdHJva2U9Im5vbmUiIHN0cm9rZS13aWR0aD0iMSIgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj4gICAgICAgIDxnIGlkPSJsYXlvdXQtcHJvdGVnaXQiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC00MTUuMDAwMDAwLCAtODguMDAwMDAwKSIgZmlsbD0iI0ZGRTYwMCIgZmlsbC1ydWxlPSJub256ZXJvIj4gICAgICAgICAgICA8ZyBpZD0iaG92ZXItbWVudSIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMzE3LjAwMDAwMCwgNTIuMDAwMDAwKSI+ICAgICAgICAgICAgICAgIDxnIGlkPSIxIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSg5OC4wMDAwMDAsIDM2LjAwMDAwMCkiPiAgICAgICAgICAgICAgICAgICAgPGcgaWQ9Ikdyb3VwLTM3Ij4gICAgICAgICAgICAgICAgICAgICAgICA8cGF0aCBkPSJNMTcuMzM1ODU2NCwwLjA0MzkyMTIzOTQgTDE1LjQzMTAyODEsMC45MTA5NDY1NDEgQzE1LjMwOTA0NCwwLjk2NzI0Njg4NiAxNS4xOTY0NDMzLDEuMDQ0MTkwNjkgMTUuMTAwNzMyOCwxLjEzOTkwMTI3IEwxMS45OTY3MDcxLDQuMjQ1ODAzNiBMMS4zMDcxNDg0MSwyLjk2NDAzMjQzIEMxLjExMzg1MDU2LDIuOTQxNTEyMjkgMC45MTg2NzYwMzUsMy4wMDcxOTYwMyAwLjc4MTY3ODUzLDMuMTQ2MDcwMjEgTDAuMTg2NzcxNTU5LDMuNzQwOTc3MTggQy0wLjEyODUxMDM2OSw0LjA1NjI1OTExIC0wLjAzMDkyMzEwNTQsNC41ODkyMzU3IDAuMzc2MzE2MDUyLDQuNzcxMjczNDggTDguMDM2OTE2MjMsOC4yMDU1OTQ0OCBMNS44Mzc0NDk0NSwxMC40MDUwNjEzIEwxLjk5NTg4OTI5LDEwLjQwNTA2MTMgQzEuODI2OTg4MjYsMTAuNDA1MDYxMyAxLjY2NTU5Mzk0LDEwLjQ3MjYyMTcgMS41NDU0ODY1MywxMC41OTA4MzM2IEwxLjIyNDU3NDU3LDEwLjkxMzYyMjMgQzAuOTA1NTM5Mjg4LDExLjIzMjY1NzYgMS4wMTA2MzMyNiwxMS43NzEyNjQyIDEuNDIzNTAyNDYsMTEuOTQ3NjkwNyBMNC42NjQ1MjU2MSwxMy4zMzY0MzI1IEw2LjA1MzI2NzQzLDE2LjU3NzQzNjkgQzYuMjI5Njc1MTgsMTYuOTkwMzA2MSA2Ljc3MDE1ODQ4LDE3LjA5NTQxODggNy4wODczMzU4NiwxNi43NzYzODM2IEw3LjQxMDEwNTczLDE2LjQ1MzU5NDkgQzcuNTMwMjEzMTMsMTYuMzMzNDg3NSA3LjU5NTg5Njg3LDE2LjE3MjA5MzIgNy41OTU4OTY4NywxNi4wMDMxOTIyIEw3LjU5NTg5Njg3LDEyLjE2MTYzMiBMOS43OTUzNjM2NSw5Ljk2MjE2NTIyIEwxMy4yMjk2ODQ3LDE3LjYyNDY2MDggQzEzLjQxMTcyMjQsMTguMDMxODgxMiAxMy45NDQ2OTksMTguMTI5NDY4NSAxNC4yNTk5NjIyLDE3LjgxNDIwNTMgTDE0Ljg1NDg2OTIsMTcuMjE5Mjk4NCBDMTQuOTkzNzQzMywxNy4wODA0MjQyIDE1LjA1OTQyNzEsMTYuODg3MTI2MyAxNS4wMzY5MDY5LDE2LjY5MzgyODUgTDEzLjc1MzI1OTEsNi4wMDQyNjk3OSBMMTYuODU5MTYxNCwyLjg5ODM2NzQ2IEMxNi45NTQ4OTA4LDIuODAyNjU2ODggMTcuMDMxODE1OCwyLjY5MTkzMjg3IDE3LjA4ODExNjEsMi41NjgwNzIxMSBMMTcuOTU1MTQxNCwwLjY2MzI0Mzc5MyBDMTguMTM3MjE2OCwwLjI3MDk5OTI5NSAxNy43MzE4MzU1LC0wLjEzNjIzOTg2MiAxNy4zMzU4NTY0LDAuMDQzOTIxMjM5NCBaIiBpZD0iUGF0aCI+PC9wYXRoPiAgICAgICAgICAgICAgICAgICAgPC9nPiAgICAgICAgICAgICAgICA8L2c+ICAgICAgICAgICAgPC9nPiAgICAgICAgPC9nPiAgICA8L2c+PC9zdmc+',
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail')
    );

    /**
     * Saúde
     */
    $saude = array(
        'labels' => array(
            'name' => __('Saúde'),
            'singular_name' => __('Saúde')
        ),
        'has_archive' => true,
        'public' => true,
        'rewrite' => array('slug' => 'saude'),
        'menu_icon' => 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz48c3ZnIHdpZHRoPSIxOHB4IiBoZWlnaHQ9IjE1cHgiIHZpZXdCb3g9IjAgMCAxOCAxNSIgdmVyc2lvbj0iMS4xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIj4gICAgICAgIDx0aXRsZT5tZWRpY2FsLWtpdDwvdGl0bGU+ICAgIDxkZXNjPkNyZWF0ZWQgd2l0aCBTa2V0Y2guPC9kZXNjPiAgICA8ZyBpZD0iSG9tZSIgc3Ryb2tlPSJub25lIiBzdHJva2Utd2lkdGg9IjEiIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCI+ICAgICAgICA8ZyBpZD0ibGF5b3V0LXByb3RlZ2l0IiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgtNjMxLjAwMDAwMCwgLTkwLjAwMDAwMCkiIGZpbGw9IiNGRkRFMTQiPiAgICAgICAgICAgIDxnIGlkPSJob3Zlci1tZW51IiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgzMTcuMDAwMDAwLCA1Mi4wMDAwMDApIj4gICAgICAgICAgICAgICAgPGcgaWQ9IjIiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDMxNC4wMDAwMDAsIDM3LjAwMDAwMCkiPiAgICAgICAgICAgICAgICAgICAgPGcgaWQ9Ikdyb3VwLTM5Ij4gICAgICAgICAgICAgICAgICAgICAgICA8ZyBpZD0ibWVkaWNhbC1raXQiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDAuMDAwMDAwLCAxLjAwMDAwMCkiPiAgICAgICAgICAgICAgICAgICAgICAgICAgICA8Zz4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxwYXRoIGQ9Ik0wLjY2MjQxNDA2MiwzLjE1MjY1OTA5IEMwLjIyMDc4MTI1LDMuNTgwOTQzMTggMCw0LjA5MzU2ODE4IDAsNC42OTA0MzE4MiBMMCwxMi43ODgzODY0IEMwLDEzLjM4NTM4NjQgMC4yMjA3ODEyNSwxMy44OTgwMTE0IDAuNjYyNDE0MDYyLDE0LjMyNjI2MTQgQzEuMTA0MDgyMDMsMTQuNzU0NTExNCAxLjYzMjcyNjU2LDE0Ljk2ODYzNjQgMi4yNDgzNDc2NiwxNC45Njg2MzY0IEwyLjU2OTUzNTE2LDE0Ljk2ODYzNjQgTDIuNTY5NTM1MTYsMi41MTAxODE4MiBMMi4yNDgzNDc2NiwyLjUxMDE4MTgyIEMxLjYzMjU4NTk0LDIuNTEwMTgxODIgMS4xMDM5NzY1NiwyLjcyNDQwOTA5IDAuNjYyNDE0MDYyLDMuMTUyNjU5MDkgWiIgaWQ9IlBhdGgiIGZpbGwtcnVsZT0ibm9uemVybyI+PC9wYXRoPiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggZD0iTTEyLjg0NzcxMDksMC45NTI5NDMxODIgQzEyLjg0NzcxMDksMC42OTMzNzUgMTIuNzU0MDg5OCwwLjQ3MjgwNjgxOCAxMi41NjY2NzE5LDAuMjkxMTAyMjczIEMxMi4zNzk0NjQ4LDAuMTA5Mzk3NzI3IDEyLjE1MTgyODEsMC4wMTg2MTM2MzY0IDExLjg4NDI1MzksMC4wMTg2MTM2MzY0IEw2LjEwMjczODI4LDAuMDE4NjEzNjM2NCBDNS44MzUxMjg5MSwwLjAxODYxMzYzNjQgNS42MDc2MzI4MSwwLjEwOTM5NzcyNyA1LjQyMDIxNDg0LDAuMjkxMTAyMjczIEM1LjIzMjgzMjAzLDAuNDcyNzA0NTQ1IDUuMTM5MTc1NzgsMC42OTMzNDA5MDkgNS4xMzkxNzU3OCwwLjk1Mjk0MzE4MiBMNS4xMzkxNzU3OCwyLjUxMDE4MTgyIEwzLjUzMzIwMzEyLDIuNTEwMTgxODIgTDMuNTMzMjAzMTIsMTQuOTY4NjM2NCBMMTQuNDUzNjEzMywxNC45Njg2MzY0IEwxNC40NTM2MTMzLDIuNTEwMTgxODIgTDEyLjg0NzcxMDksMi41MTAxODE4MiBMMTIuODQ3NzEwOSwwLjk1Mjk0MzE4MiBaIE02LjQyMzkyNTc4LDEuMjY0Mzk3NzMgTDExLjU2MzAzMTIsMS4yNjQzOTc3MyBMMTEuNTYzMDMxMiwyLjUxMDE4MTgyIEw2LjQyMzkyNTc4LDIuNTEwMTgxODIgTDYuNDIzOTI1NzgsMS4yNjQzOTc3MyBaIE0xMi44NDc3MTA5LDkuNjczODA2ODIgQzEyLjg0NzcxMDksOS43NjQ4Mjk1NSAxMi44MTc2NTIzLDkuODM5MjUgMTIuNzU3NDY0OCw5Ljg5NzgxODE4IEMxMi42OTczMTI1LDkuOTU2MDExMzYgMTIuNjIwMzU1NSw5Ljk4NTI5NTQ1IDEyLjUyNjczNDQsOS45ODUyOTU0NSBMMTAuMjc4Mzg2Nyw5Ljk4NTI5NTQ1IEwxMC4yNzgzODY3LDEyLjE2NTUxMTQgQzEwLjI3ODM4NjcsMTIuMjU2MjYxNCAxMC4yNDgwODIsMTIuMzMwOTU0NSAxMC4xODc5Mjk3LDEyLjM4OTI1IEMxMC4xMjgwMjM0LDEyLjQ0NzU3OTUgMTAuMDUwOTk2MSwxMi40NzY3NjE0IDkuOTU3MjY5NTMsMTIuNDc2NzYxNCBMOC4wMzAwMzkwNiwxMi40NzY3NjE0IEM3LjkzNjI3NzM0LDEyLjQ3Njc2MTQgNy44NTkzOTA2MiwxMi40NDc1Nzk1IDcuNzk5MTY3OTcsMTIuMzg5MjUgQzcuNzM5MDE1NjIsMTIuMzMwOTIwNSA3LjcwODg4NjcyLDEyLjI1NjI2MTQgNy43MDg4ODY3MiwxMi4xNjU1MTE0IEw3LjcwODg4NjcyLDkuOTg1Mjk1NDUgTDUuNDYwNTM5MDYsOS45ODUyOTU0NSBDNS4zNjY3NDIxOSw5Ljk4NTI5NTQ1IDUuMjg5ODkwNjIsOS45NTYwMTEzNiA1LjIyOTY2Nzk3LDkuODk3ODE4MTggQzUuMTY5NDEwMTYsOS44MzkyMTU5MSA1LjEzOTMxNjQxLDkuNzY0ODI5NTUgNS4xMzkzMTY0MSw5LjY3MzgwNjgyIEw1LjEzOTMxNjQxLDcuODA1MTEzNjQgQzUuMTM5MzE2NDEsNy43MTQwOTA5MSA1LjE2OTQxMDE2LDcuNjM5NDY1OTEgNS4yMjk2Njc5Nyw3LjU4MTEwMjI3IEM1LjI4OTc1LDcuNTIyODQwOTEgNS4zNjY3NDIxOSw3LjQ5MzY5MzE4IDUuNDYwMzYzMjgsNy40OTM2OTMxOCBMNy43MDg3MTA5NCw3LjQ5MzY5MzE4IEw3LjcwODcxMDk0LDUuMzEzNDA5MDkgQzcuNzA4NzEwOTQsNS4yMjI1MjI3MyA3LjczODgwNDY5LDUuMTQ3OTY1OTEgNy43OTkwNjI1LDUuMDg5NTM0MDkgQzcuODU5Mjg1MTYsNS4wMzExMzYzNiA3LjkzNjEzNjcyLDUuMDAxOTg4NjQgOC4wMjk5MzM1OSw1LjAwMTk4ODY0IEw5Ljk1NzEyODkxLDUuMDAxOTg4NjQgQzEwLjA1MDgyMDMsNS4wMDE5ODg2NCAxMC4xMjc4MTI1LDUuMDMxMTM2MzYgMTAuMTg3ODU5NCw1LjA4OTUzNDA5IEMxMC4yNDgwMTE3LDUuMTQ3OTY1OTEgMTAuMjc4MzE2NCw1LjIyMjUyMjczIDEwLjI3ODMxNjQsNS4zMTM0MDkwOSBMMTAuMjc4MzE2NCw3LjQ5MzY1OTA5IEwxMi41MjY2NjQxLDcuNDkzNjU5MDkgQzEyLjYyMDI4NTIsNy40OTM2NTkwOSAxMi42OTcyNzczLDcuNTIyODA2ODIgMTIuNzU3Mzk0NSw3LjU4MTA2ODE4IEMxMi44MTc0NDE0LDcuNjM5NDMxODIgMTIuODQ3NSw3LjcxNDA1NjgyIDEyLjg0NzUsNy44MDUwNzk1NSBMMTIuODQ3NSw5LjY3Mzc3MjczIEwxMi44NDc3MTA5LDkuNjczNzcyNzMgTDEyLjg0NzcxMDksOS42NzM4MDY4MiBaIiBpZD0iU2hhcGUiIGZpbGwtcnVsZT0ibm9uemVybyI+PC9wYXRoPiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggZD0iTTE3LjMyNDQ3MjcsMy4xNTI2NTkwOSBDMTYuODgyODA0NywyLjcyNDQwOTA5IDE2LjM1NDEyNSwyLjUxMDE4MTgyIDE1LjczODUzOTEsMi41MTAxODE4MiBMMTUuNDE3MzE2NCwyLjUxMDE4MTgyIEwxNS40MTczMTY0LDE0Ljk2ODYzNjQgTDE1LjczODUzOTEsMTQuOTY4NjM2NCBDMTYuMzU0MTYwMiwxNC45Njg2MzY0IDE2Ljg4MjgwNDcsMTQuNzU0NTQ1NSAxNy4zMjQ0NzI3LDE0LjMyNjI2MTQgQzE3Ljc2NiwxMy44OTgwMTE0IDE3Ljk4Njg4NjcsMTMuMzg1MzUyMyAxNy45ODY4ODY3LDEyLjc4ODM4NjQgTDE3Ljk4Njg4NjcsNC42OTA0MzE4MiBDMTcuOTg2ODUxNiw0LjA5MzU2ODE4IDE3Ljc2NTk2NDgsMy41ODA5NDMxOCAxNy4zMjQ0NzI3LDMuMTUyNjU5MDkgWiIgaWQ9IlBhdGgiIGZpbGwtcnVsZT0ibm9uemVybyI+PC9wYXRoPiAgICAgICAgICAgICAgICAgICAgICAgICAgICA8L2c+ICAgICAgICAgICAgICAgICAgICAgICAgPC9nPiAgICAgICAgICAgICAgICAgICAgPC9nPiAgICAgICAgICAgICAgICA8L2c+ICAgICAgICAgICAgPC9nPiAgICAgICAgPC9nPiAgICA8L2c+PC9zdmc+',
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail')
    );
    /**
     * Compras Online
     */
    $compras = array(
        'labels' => array(
            'name' => __('Compras Online'),
            'singular_name' => __('Compras Online')
        ),
        'has_archive' => true,
        'public' => true,
        'rewrite' => array('slug' => 'compras'),
        'menu_icon' => 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz48c3ZnIHdpZHRoPSIxN3B4IiBoZWlnaHQ9IjE2cHgiIHZpZXdCb3g9IjAgMCAxNyAxNiIgdmVyc2lvbj0iMS4xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIj4gICAgICAgIDx0aXRsZT5TaGFwZTwvdGl0bGU+ICAgIDxkZXNjPkNyZWF0ZWQgd2l0aCBTa2V0Y2guPC9kZXNjPiAgICA8ZyBpZD0iSG9tZSIgc3Ryb2tlPSJub25lIiBzdHJva2Utd2lkdGg9IjEiIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCI+ICAgICAgICA8ZyBpZD0ibGF5b3V0LXByb3RlZ2l0IiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgtODAzLjAwMDAwMCwgLTkwLjAwMDAwMCkiIGZpbGw9IiNGRkU2MDAiIGZpbGwtcnVsZT0ibm9uemVybyI+ICAgICAgICAgICAgPGcgaWQ9ImhvdmVyLW1lbnUiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDMxNy4wMDAwMDAsIDUyLjAwMDAwMCkiPiAgICAgICAgICAgICAgICA8ZyBpZD0iMyIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNDg2LjAwMDAwMCwgMzcuMDAwMDAwKSI+ICAgICAgICAgICAgICAgICAgICA8ZyBpZD0iR3JvdXAtNDEiPiAgICAgICAgICAgICAgICAgICAgICAgIDxnIGlkPSIxMjYwODMiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDAuMDAwMDAwLCAxLjAwMDAwMCkiPiAgICAgICAgICAgICAgICAgICAgICAgICAgICA8cGF0aCBkPSJNMTYuNjM0NzEwNywyLjc1NDc3MjczIEMxNi4zMjkxMzIyLDIuMzgyNDU4NjggMTUuODY1NDk1OSwyLjE3NTIyNzI3IDE1LjM4NDI5NzUsMi4xNzUyMjcyNyBMNC45NDE5NDIxNSwyLjE3NTIyNzI3IEM0LjY0MzM4ODQzLDIuMTc1MjI3MjcgNC4zNTg4ODQzLDIuMjU5NTI0NzkgNC4xMTMwMTY1MywyLjQxMDU1Nzg1IEwzLjU3OTEzMjIzLDAuNTQ1NDc1MjA3IEMzLjQ5MTMyMjMxLDAuMjM5ODk2Njk0IDMuMjEzODQyOTgsMC4wMjkxNTI4OTI2IDIuODk3NzI3MjcsMC4wMjkxNTI4OTI2IEwyLjA4NjM2MzY0LDAuMDI5MTUyODkyNiBMMC41MzczOTY2OTQsMC4wMjkxNTI4OTI2IEMwLjI0MjM1NTM3MiwwLjAyOTE1Mjg5MjYgMCwwLjI2Nzk5NTg2OCAwLDAuNTY2NTQ5NTg3IEwwLDAuNjIyNzQ3OTM0IEMwLDAuOTE3Nzg5MjU2IDAuMjM4ODQyOTc1LDEuMTYwMTQ0NjMgMC41MzczOTY2OTQsMS4xNjAxNDQ2MyBMMi41Njc1NjE5OCwxLjE2MDE0NDYzIEwzLjYwMzcxOTAxLDQuODIzNTc0MzggTDUuMDI5NzUyMDcsOS44Nzc5MTMyMiBDNC4yMTgzODg0MywxMC4wODE2MzIyIDMuNjE3NzY4NiwxMC44MTU3MjMxIDMuNjE3NzY4NiwxMS42ODY3OTc1IEMzLjYxNzc2ODYsMTIuNjczNzgxIDQuMzg2OTgzNDcsMTMuNDg1MTQ0NiA1LjM1OTkxNzM2LDEzLjU0ODM2NzggQzUuMjc5MTMyMjMsMTMuNzgwMTg2IDUuMjQwNDk1ODcsMTQuMDM2NTkwOSA1LjI2MTU3MDI1LDE0LjMwMDAyMDcgQzUuMzMxODE4MTgsMTUuMTkyMTY5NCA2LjA1ODg4NDMsMTUuOTEyMjEwNyA2Ljk1MTAzMzA2LDE1Ljk3MTkyMTUgQzguMDE1Mjg5MjYsMTYuMDQ1NjgxOCA4LjkwMzkyNTYyLDE1LjE5OTE5NDIgOC45MDM5MjU2MiwxNC4xNTI1IEM4LjkwMzkyNTYyLDEzLjk0MTc1NjIgOC44Njg4MDE2NSwxMy43NDE1NDk2IDguODAyMDY2MTIsMTMuNTUxODgwMiBMMTAuOTM3NjAzMywxMy41NTE4ODAyIEMxMC44NDk3OTM0LDEzLjgwMTI2MDMgMTAuODE0NjY5NCwxNC4wNzg3Mzk3IDEwLjg0NjI4MSwxNC4zNjMyNDM4IEMxMC45NDQ2MjgxLDE1LjIyNzI5MzQgMTEuNjU3NjQ0NiwxNS45MDg2OTgzIDEyLjUyODcxOSwxNS45NzE5MjE1IEMxMy41OTI5NzUyLDE2LjA0NTY4MTggMTQuNDg1MTI0LDE1LjIwMjcwNjYgMTQuNDg1MTI0LDE0LjE1MjUgQzE0LjQ4NTEyNCwxMy4xMzc0MTc0IDEzLjY0MjE0ODgsMTIuMzI2MDUzNyAxMi42MzA1Nzg1LDEyLjMyNjA1MzcgTDUuNDk2OTAwODMsMTIuMzI2MDUzNyBDNS4xNDkxNzM1NSwxMi4zMjYwNTM3IDQuODU0MTMyMjMsMTIuMDU1NTk5MiA0Ljg0MDA4MjY0LDExLjcxMTM4NDMgQzQuODI2MDMzMDYsMTEuMzQ2MDk1IDUuMTE3NTYxOTgsMTEuMDQ3NTQxMyA1LjQ3OTMzODg0LDExLjA0NzU0MTMgTDYuNTUwNjE5ODMsMTEuMDQ3NTQxMyBMMTIuMzU2NjExNiwxMS4wNDc1NDEzIEwxMy45ODk4NzYsMTEuMDQ3NTQxMyBDMTQuNzEzNDI5OCwxMS4wNDc1NDEzIDE1LjM0NTY2MTIsMTAuNTUyMjkzNCAxNS41MjEyODEsOS44NDk4MTQwNSBMMTYuOTQwMjg5Myw0LjEzODY1NzAyIEMxNy4wNjMyMjMxLDMuNjQ2OTIxNDkgMTYuOTUwODI2NCwzLjE0NDY0ODc2IDE2LjYzNDcxMDcsMi43NTQ3NzI3MyBaIE0xMi42NjIxOTAxLDEzLjU0ODM2NzggQzEyLjk5MjM1NTQsMTMuNTQ4MzY3OCAxMy4yNjI4MDk5LDEzLjgxODgyMjMgMTMuMjYyODA5OSwxNC4xNDg5ODc2IEMxMy4yNjI4MDk5LDE0LjQ3OTE1MjkgMTIuOTkyMzU1NCwxNC43NDk2MDc0IDEyLjY2MjE5MDEsMTQuNzQ5NjA3NCBDMTIuMzMyMDI0OCwxNC43NDk2MDc0IDEyLjA2MTU3MDIsMTQuNDc5MTUyOSAxMi4wNjE1NzAyLDE0LjE0ODk4NzYgQzEyLjA2MTU3MDIsMTMuODE4ODIyMyAxMi4zMjg1MTI0LDEzLjU0ODM2NzggMTIuNjYyMTkwMSwxMy41NDgzNjc4IFogTTcuMDgwOTkxNzQsMTMuNTQ4MzY3OCBDNy40MTExNTcwMiwxMy41NDgzNjc4IDcuNjgxNjExNTcsMTMuODE4ODIyMyA3LjY4MTYxMTU3LDE0LjE0ODk4NzYgQzcuNjgxNjExNTcsMTQuNDc5MTUyOSA3LjQxMTE1NzAyLDE0Ljc0OTYwNzQgNy4wODA5OTE3NCwxNC43NDk2MDc0IEM2Ljc1MDgyNjQ1LDE0Ljc0OTYwNzQgNi40ODAzNzE5LDE0LjQ3OTE1MjkgNi40ODAzNzE5LDE0LjE0ODk4NzYgQzYuNDgwMzcxOSwxMy44MTg4MjIzIDYuNzQ3MzE0MDUsMTMuNTQ4MzY3OCA3LjA4MDk5MTc0LDEzLjU0ODM2NzggWiBNNC44NzUyMDY2MSw0LjgxNjU0OTU5IEw0LjYwMTIzOTY3LDMuODUwNjQwNSBDNC41NTkwOTA5MSwzLjcwMzExOTgzIDQuNjE4ODAxNjUsMy41OTQyMzU1NCA0LjY2MDk1MDQxLDMuNTQxNTQ5NTkgQzQuNjk5NTg2NzgsMy40ODg4NjM2NCA0Ljc5MDkwOTA5LDMuNDAxMDUzNzIgNC45NDE5NDIxNSwzLjQwMTA1MzcyIEw2LjA4Njk4MzQ3LDMuNDAxMDUzNzIgTDYuMzk5NTg2NzgsNC44MjAwNjE5OCBMNC44NzUyMDY2MSw0LjgyMDA2MTk4IEw0Ljg3NTIwNjYxLDQuODE2NTQ5NTkgTDQuODc1MjA2NjEsNC44MTY1NDk1OSBaIE01LjIxOTQyMTQ5LDYuMDM4ODYzNjQgTDYuNjY2NTI4OTMsNi4wMzg4NjM2NCBMNi45NTQ1NDU0NSw3LjM1MjUgTDUuNTg4MjIzMTQsNy4zNTI1IEw1LjIxOTQyMTQ5LDYuMDM4ODYzNjQgWiBNNi41NTA2MTk4Myw5LjgxODIwMjQ4IEM2LjM5MjU2MTk4LDkuODE4MjAyNDggNi4yNTIwNjYxMiw5LjcxMjgzMDU4IDYuMjA5OTE3MzYsOS41NTgyODUxMiBMNS45MzI0MzgwMiw4LjU3NDgxNDA1IEw3LjIyMTQ4NzYsOC41NzQ4MTQwNSBMNy40OTU0NTQ1NSw5LjgxNDY5MDA4IEw2LjU1MDYxOTgzLDkuODE0NjkwMDggTDYuNTUwNjE5ODMsOS44MTgyMDI0OCBMNi41NTA2MTk4Myw5LjgxODIwMjQ4IFogTTkuNjA5OTE3MzYsOS44MTgyMDI0OCBMOC43NDU4Njc3Nyw5LjgxODIwMjQ4IEw4LjQ3MTkwMDgzLDguNTc4MzI2NDUgTDkuNjA2NDA0OTYsOC41NzgzMjY0NSBMOS42MDY0MDQ5Niw5LjgxODIwMjQ4IEw5LjYwOTkxNzM2LDkuODE4MjAyNDggWiBNOS42MDk5MTczNiw3LjM1MjUgTDguMjA0OTU4NjgsNy4zNTI1IEw3LjkxNjk0MjE1LDYuMDM4ODYzNjQgTDkuNjA5OTE3MzYsNi4wMzg4NjM2NCBMOS42MDk5MTczNiw3LjM1MjUgWiBNOS42MDk5MTczNiw0LjgxNjU0OTU5IEw3LjY1LDQuODE2NTQ5NTkgTDcuMzM3Mzk2NjksMy4zOTc1NDEzMiBMOS42MDk5MTczNiwzLjM5NzU0MTMyIEw5LjYwOTkxNzM2LDQuODE2NTQ5NTkgWiBNMTEuODAxNjUyOSw5LjgxODIwMjQ4IEwxMC44MzU3NDM4LDkuODE4MjAyNDggTDEwLjgzNTc0MzgsOC41NzgzMjY0NSBMMTIuMDYxNTcwMiw4LjU3ODMyNjQ1IEwxMS44MDE2NTI5LDkuODE4MjAyNDggWiBNMTIuMzIxNDg3Niw3LjM1MjUgTDEwLjgzNTc0MzgsNy4zNTI1IEwxMC44MzU3NDM4LDYuMDM4ODYzNjQgTDEyLjU5ODk2NjksNi4wMzg4NjM2NCBMMTIuMzIxNDg3Niw3LjM1MjUgWiBNMTAuODM1NzQzOCw0LjgxNjU0OTU5IEwxMC44MzU3NDM4LDMuMzk3NTQxMzIgTDEzLjE1MzkyNTYsMy4zOTc1NDEzMiBMMTIuODU1MzcxOSw0LjgxNjU0OTU5IEwxMC44MzU3NDM4LDQuODE2NTQ5NTkgWiBNMTQuMzM3NjAzMyw5LjU1MTI2MDMzIEMxNC4yOTg5NjY5LDkuNzA5MzE4MTggMTQuMTU4NDcxMSw5LjgyMTcxNDg4IDEzLjk5MzM4ODQsOS44MjE3MTQ4OCBMMTMuMDUyMDY2MSw5LjgyMTcxNDg4IEwxMy4zMTU0OTU5LDguNTgxODM4ODQgTDE0LjU3OTk1ODcsOC41ODE4Mzg4NCBMMTQuMzM3NjAzMyw5LjU1MTI2MDMzIFogTTE0Ljg4MjAyNDgsNy4zNTI1IEwxMy41NzE5MDA4LDcuMzUyNSBMMTMuODQ5MzgwMiw2LjAzODg2MzY0IEwxNS4yMDg2Nzc3LDYuMDM4ODYzNjQgTDE0Ljg4MjAyNDgsNy4zNTI1IFogTTE1Ljc1MzA5OTIsMy44MzY1OTA5MSBMMTUuNTEwNzQzOCw0LjgxMzAzNzE5IEwxNC4xMDU3ODUxLDQuODEzMDM3MTkgTDE0LjQwNDMzODgsMy4zOTQwMjg5MyBMMTUuNDA4ODg0MywzLjM5NDAyODkzIEMxNS41NTk5MTc0LDMuMzk0MDI4OTMgMTUuNjQ3NzI3MywzLjQ3ODMyNjQ1IDE1LjY4NjM2MzYsMy41MzEwMTI0IEMxNS43Mjg1MTI0LDMuNTgzNjk4MzUgMTUuNzkxNzM1NSwzLjY5MjU4MjY0IDE1Ljc1MzA5OTIsMy44MzY1OTA5MSBaIiBpZD0iU2hhcGUiPjwvcGF0aD4gICAgICAgICAgICAgICAgICAgICAgICA8L2c+ICAgICAgICAgICAgICAgICAgICA8L2c+ICAgICAgICAgICAgICAgIDwvZz4gICAgICAgICAgICA8L2c+ICAgICAgICA8L2c+ICAgIDwvZz48L3N2Zz4=',
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail')
    );
    /**
     * Telefonia
     */
    $telefonia = array(
        'labels' => array(
            'name' => __('Telefonia'),
            'singular_name' => __('Telefonia')
        ),
        'has_archive' => true,
        'public' => true,
        'rewrite' => array('slug' => 'telefonia'),
        'menu_icon' => 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/PjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDI3LjQ0MiAyNy40NDIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDI3LjQ0MiAyNy40NDI7IiB4bWw6c3BhY2U9InByZXNlcnZlIj48Zz48cGF0aCBkPSJNMTkuNDk0LDBINy45NDhDNi44NDMsMCw1Ljk1MSwwLjg5Niw1Ljk1MSwxLjk5OXYyMy40NDZjMCwxLjEwMiwwLjg5MiwxLjk5NywxLjk5NywxLjk5N2gxMS41NDZjMS4xMDMsMCwxLjk5Ny0wLjg5NSwxLjk5Ny0xLjk5N1YxLjk5OUMyMS40OTEsMC44OTYsMjAuNTk3LDAsMTkuNDk0LDB6IE0xMC44NzIsMS4yMTRoNS43YzAuMTQ0LDAsMC4yNjEsMC4yMTUsMC4yNjEsMC40ODFzLTAuMTE3LDAuNDgyLTAuMjYxLDAuNDgyaC01LjdjLTAuMTQ1LDAtMC4yNi0wLjIxNi0wLjI2LTAuNDgyQzEwLjYxMiwxLjQyOSwxMC43MjcsMS4yMTQsMTAuODcyLDEuMjE0eiBNMTMuNzIyLDI1LjQ2OWMtMC43MDMsMC0xLjI3NS0wLjU3Mi0xLjI3NS0xLjI3NnMwLjU3Mi0xLjI3NCwxLjI3NS0xLjI3NGMwLjcwMSwwLDEuMjczLDAuNTcsMS4yNzMsMS4yNzRTMTQuNDIzLDI1LjQ2OSwxMy43MjIsMjUuNDY5eiBNMTkuOTk1LDIxLjFINy40NDhWMy4zNzNoMTIuNTQ3VjIxLjF6Ii8+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjxnPjwvZz48Zz48L2c+PGc+PC9nPjwvc3ZnPg==',
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail')
    );
    /**
     * Construção e Obras
     */
    $construct = array(
        'labels' => array(
            'name' => __('Construção e Obras'),
            'singular_name' => __('Construção e Obras')
        ),
        'has_archive' => true,
        'public' => true,
        'rewrite' => array('slug' => 'construct'),
        'menu_icon' => 'dashicons-building',
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail')
    );
    /**
     * Construção e Obras
     */
    $etc = array(
        'labels' => array(
            'name' => __('Etc'),
            'singular_name' => __('Etc')
        ),
        'has_archive' => true,
        'public' => true,
        'rewrite' => array('slug' => 'etc'),
        'menu_icon' => 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz48c3ZnIHdpZHRoPSIxNXB4IiBoZWlnaHQ9IjE1cHgiIHZpZXdCb3g9IjAgMCAxNSAxNSIgdmVyc2lvbj0iMS4xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIj4gICAgICAgIDx0aXRsZT5Db21iaW5lZCBTaGFwZTwvdGl0bGU+ICAgIDxkZXNjPkNyZWF0ZWQgd2l0aCBTa2V0Y2guPC9kZXNjPiAgICA8ZyBpZD0iSG9tZSIgc3Ryb2tlPSJub25lIiBzdHJva2Utd2lkdGg9IjEiIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCI+ICAgICAgICA8ZyBpZD0ibGF5b3V0LXByb3RlZ2l0IiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgtMTQ3MC4wMDAwMDAsIC05MS4wMDAwMDApIiBmaWxsPSIjRkZFNjAwIiBmaWxsLXJ1bGU9Im5vbnplcm8iPiAgICAgICAgICAgIDxnIGlkPSJob3Zlci1tZW51IiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgzMTcuMDAwMDAwLCA1Mi4wMDAwMDApIj4gICAgICAgICAgICAgICAgPGcgaWQ9IjYiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDExNTMuMDAwMDAwLCAzNy4wMDAwMDApIj4gICAgICAgICAgICAgICAgICAgIDxnIGlkPSIxMjY1MDEiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDAuMDAwMDAwLCAyLjAwMDAwMCkiPiAgICAgICAgICAgICAgICAgICAgICAgIDxwYXRoIGQ9Ik0xMi43Njg3ODM1LDIuMTkyNjY0NjggQzE0LjE4MzA5OTcsMy42MDY5ODA4NSAxNC45NjQ2MTIyLDUuNDgzMjQzNyAxNC45NjQ2MTIyLDcuNDgyOTAzMjYgQzE0Ljk2NDYxMjIsOS40ODI1NjI4MiAxNC4xODYyNjM3LDExLjM1ODgyNTcgMTIuNzcxOTQ3NSwxMi43NzMxNDE4IEMxMS4zMjkxNTUyLDE0LjIxNTkzNDIgOS40MTE3NjAwOSwxNC45NjU4MDY1IDcuNDc1MzgwODksMTQuOTY1ODA2NSBDNi4yNjk4ODk5MiwxNC45NjU4MDY1IDUuMDU0OTA2OSwxNC42NzQ3MTY4IDMuOTQ0MzM2NDgsMTQuMDc2NzE3NCBDMi45NDc2NzA3MiwxNC43OTQ5NDk1IDEuOTczMTUzMDksMTQuOTQ5OTg2NCAxLjMxMTg3MzI2LDE0Ljk0OTk4NjQgQzEuMDY1MDc5ODQsMTQuOTQ5OTg2NCAwLjg2MjU4MjY2NiwxNC45Mjc4MzgzIDAuNzIwMjAxODQzLDE0LjkwNTY5MDIgQzAuNDE2NDU2MDg3LDE0Ljg1ODIyOTkgMC4xODIzMTg3MzQsMTQuNjIwOTI4NSAwLjEzNDg1ODQ2LDE0LjMxNzE4MjggQzAuMDg3Mzk4MTg1MiwxNC4wMTM0MzcgMC4yNDI0MzUwODEsMTMuNzE5MTgzMyAwLjUxNzcwNDY3MywxMy41ODMxMzA1IEMxLjA5MDM5MTk4LDEzLjMwMTUzMjkgMS40NzY0MDIyMSwxMi43MzgzMzc2IDEuNzE2ODY3NiwxMi4yNTQyNDI4IEMtMC43MzUyNDY1Nyw5LjMwMjIxMzc3IC0wLjU0NTQwNTQ3Myw0LjkyNjM3NjQ4IDIuMTg4MzA2MzMsMi4xOTI2NjQ2OCBDMy42MDI2MjI1MSwwLjc3ODM0ODQ5OSA1LjQ3ODg4NTM1LDAgNy40Nzg1NDQ5MSwwIEM5LjQ3ODIwNDQ3LDAgMTEuMzU0NDY3MywwLjc3ODM0ODQ5OSAxMi43Njg3ODM1LDIuMTkyNjY0NjggWiBNNy43NzAyMzU3Niw4Ljk2MDQ5OTggQzguNDI3MjcyODQsOC45NjA0OTk4IDguOTU5OTA2NjQsOC40Mjc4NjYgOC45NTk5MDY2NCw3Ljc3MDgyODkyIEM4Ljk1OTkwNjY0LDcuMTEzNzkxODQgOC40MjcyNzI4NCw2LjU4MTE1ODA0IDcuNzcwMjM1NzYsNi41ODExNTgwNCBDNy4xMTMxOTg2OCw2LjU4MTE1ODA0IDYuNTgwNTY0ODgsNy4xMTM3OTE4NCA2LjU4MDU2NDg4LDcuNzcwODI4OTIgQzYuNTgwNTY0ODgsOC40Mjc4NjYgNy4xMTMxOTg2OCw4Ljk2MDQ5OTggNy43NzAyMzU3Niw4Ljk2MDQ5OTggWiBNMTEuMzc3MjE2Niw4Ljk2MDQ5OTggQzEyLjAzNDI1MzcsOC45NjA0OTk4IDEyLjU2Njg4NzUsOC40Mjc4NjYgMTIuNTY2ODg3NSw3Ljc3MDgyODkyIEMxMi41NjY4ODc1LDcuMTEzNzkxODQgMTIuMDM0MjUzNyw2LjU4MTE1ODA0IDExLjM3NzIxNjYsNi41ODExNTgwNCBDMTAuNzIwMTc5NSw2LjU4MTE1ODA0IDEwLjE4NzU0NTcsNy4xMTM3OTE4NCAxMC4xODc1NDU3LDcuNzcwODI4OTIgQzEwLjE4NzU0NTcsOC40Mjc4NjYgMTAuNzIwMTc5NSw4Ljk2MDQ5OTggMTEuMzc3MjE2Niw4Ljk2MDQ5OTggWiBNNC4xMzE2MTQ3Miw4Ljk2MDQ5OTggQzQuNzg4NjUxODEsOC45NjA0OTk4IDUuMzIxMjg1Niw4LjQyNzg2NiA1LjMyMTI4NTYsNy43NzA4Mjg5MiBDNS4zMjEyODU2LDcuMTEzNzkxODQgNC43ODg2NTE4MSw2LjU4MTE1ODA0IDQuMTMxNjE0NzIsNi41ODExNTgwNCBDMy40NzQ1Nzc2NCw2LjU4MTE1ODA0IDIuOTQxOTQzODUsNy4xMTM3OTE4NCAyLjk0MTk0Mzg1LDcuNzcwODI4OTIgQzIuOTQxOTQzODUsOC40Mjc4NjYgMy40NzQ1Nzc2NCw4Ljk2MDQ5OTggNC4xMzE2MTQ3Miw4Ljk2MDQ5OTggWiIgaWQ9IkNvbWJpbmVkLVNoYXBlIj48L3BhdGg+ICAgICAgICAgICAgICAgICAgICA8L2c+ICAgICAgICAgICAgICAgIDwvZz4gICAgICAgICAgICA8L2c+ICAgICAgICA8L2c+ICAgIDwvZz48L3N2Zz4=',
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail')
    );

     /**
     * Processos
     */
    $processos = array(
        'labels' => array(
            'name' => __('Processos'),
            'singular_name' => __('Processo')
        ),
        'has_archive' => true,
        'public' => true,
        'rewrite' => array('slug' => 'processos'),
        'menu_icon' => 'dashicons-welcome-learn-more',
        'show_in_rest' => true,
        'supports' => array('author', 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'comments', 'revisions', 'page-attributes')
    );

    /**
     * Processos
     */
    $member = array(
        'labels' => array(
            'name' => __('Membros'),
            'singular_name' => __('Membro')
        ),
        'has_archive' => true,
        'public' => true,
        'rewrite' => array('slug' => 'membros'),
        'menu_icon' => 'dashicons-groups',
        'show_in_rest' => true,
        'supports' => array('author', 'title', 'editor', 'excerpt', 'thumbnail')
    );

    $ajuda = array(
        'labels' => array(
            'name' => __('Ajuda'),
            'singular_name' => __('Ajuda')
        ),
        'has_archive' => true,
        'public' => true,
        'rewrite' => array('slug' => 'Ajuda'),
        'menu_icon' => 'dashicons-warning',
        'show_in_rest' => true,
        'supports' => array('author', 'title', 'editor', 'excerpt', 'thumbnail')
    );
    $compromisso = array(
        'labels' => array(
            'name' => __('Compromissos'),
            'singular_name' => __('Compromisso')
        ),
        'has_archive' => true,
        'public' => true,
        'rewrite' => array('slug' => 'Ajuda'),
        'menu_icon' => 'dashicons-clipboard',
        'show_in_rest' => true,
        'supports' => array('author', 'title', 'editor', 'excerpt', 'thumbnail')
    );
    $imprensa = array(
        'labels' => array(
            'name' => __('Imprensa'),
            'singular_name' => __('Imprensa')
        ),
        'has_archive' => true,
        'public' => true,
        'rewrite' => array('slug' => 'imprensa'),
        'menu_icon' => 'dashicons-welcome-widgets-menus',
        'show_in_rest' => true,
        'supports' => array('author', 'title', 'editor', 'excerpt', 'thumbnail')
    );
    $condicoes = array(
        'labels' => array(
            'name' => __('Comdições'),
            'singular_name' => __('Comdição')
        ),
        'has_archive' => true,
        'public' => true,
        'rewrite' => array('slug' => 'condicao'),
        'menu_icon' => 'dashicons-editor-paste-word',
        'show_in_rest' => true,
        'supports' => array('author', 'title', 'editor', 'excerpt', 'thumbnail')
    );
    $recommend = array(
        'labels' => array(
            'name' => __('Recomendações'),
            'singular_name' => __('Recomendação')
        ),
        'has_archive' => true,
        'public' => true,
        'rewrite' => array('slug' => 'recomendacao'),
        'menu_icon' => 'dashicons-thumbs-up',
        'show_in_rest' => true,
        'supports' => array('author', 'title', 'editor', 'excerpt', 'thumbnail')
    );
    register_post_type('recomendacao', $recommend);
    register_post_type('condicao', $condicoes);
    register_post_type('imprensa', $imprensa);
    register_post_type('compromisso', $compromisso);
    register_post_type('ajuda', $ajuda);
    register_post_type('membros', $member);
    register_post_type('processos', $processos);
    register_post_type('etc', $etc);
    register_post_type('construct', $construct);
    register_post_type('telefonia', $telefonia);
    register_post_type('compras', $compras);
    register_post_type('saude', $saude);
    register_post_type('viagem', $viagens);
}
add_action('init', 'book_setup_post_type');

/**
 * Category
 */
function reg_cat()
{
    $catscpost = array(
        'name' => _x('Categorias', 'taxonomy general name'),
        'singular_name' => _x('Categoria', 'taxonomy singular name'),
        'search_items' =>  __('Search Categoria'),
        'popular_items' => __('Popular Categoria'),
        'all_items' => __('Todas as Categoria'),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __('Editar Categoria'),
        'update_item' => __('Atualizar Categoria'),
        'add_new_item' => __('Adicionar Nova Categoria'),
        'new_item_name' => __('Nova Categoria'),
        'separate_items_with_commas' => __('Separate categorias with commas'),
        'add_or_remove_items' => __('Add or remove categorias'),
        'choose_from_most_used' => __('Choose from the most used categorias'),
        'menu_name' => __('Categorias'),
    );

    $catspartn = array(
        'name' => _x('Empresas', 'taxonomy general name'),
        'singular_name' => _x('Empresa', 'taxonomy singular name'),
        'search_items' =>  __('Search Empresa'),
        'popular_items' => __('Popular Empresa'),
        'all_items' => __('Todas as Empresa'),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __('Editar Empresa'),
        'update_item' => __('Atualizar Empresa'),
        'add_new_item' => __('Adicionar Nova Empresa'),
        'new_item_name' => __('Nova Empresa'),
        'separate_items_with_commas' => __('Separate empresas with commas'),
        'add_or_remove_items' => __('Add or remove empresas'),
        'choose_from_most_used' => __('Choose from the most used empresas'),
        'menu_name' => __('Empresas'),
    );

    $compromisses = array(
        'name' => _x('Tipos', 'taxonomy general name'),
        'singular_name' => _x('Tipo', 'taxonomy singular name'),
        'search_items' =>  __('Search Tipo'),
        'popular_items' => __('Popular Tipo'),
        'all_items' => __('Todos os Tipos'),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __('Editar Tipo'),
        'update_item' => __('Atualizar Tipo'),
        'add_new_item' => __('Adicionar Novo Tipo'),
        'new_item_name' => __('Novo Tipo'),
        'separate_items_with_commas' => __('Separate Tipos with commas'),
        'add_or_remove_items' => __('Add or remove Tipos'),
        'choose_from_most_used' => __('Choose from the most used Tipos'),
        'menu_name' => __('Tipos'),
    );
    $cargo = array(
        'name' => _x('Cargos', 'taxonomy general name'),
        'singular_name' => _x('Cargo', 'taxonomy singular name'),
        'search_items' =>  __('Search Cargo'),
        'popular_items' => __('Popular Cargo'),
        'all_items' => __('Todos os Cargo'),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __('Editar Cargo'),
        'update_item' => __('Atualizar Cargo'),
        'add_new_item' => __('Adicionar Novo Cargo'),
        'new_item_name' => __('Novo Cargo'),
        'separate_items_with_commas' => __('Separate Cargos with commas'),
        'add_or_remove_items' => __('Add or remove Cargos'),
        'choose_from_most_used' => __('Choose from the most used Cargos'),
        'menu_name' => __('Cargos'),
    );
    $process = array(
        'name' => _x('Categorias', 'taxonomy general name'),
        'singular_name' => _x('Categoria', 'taxonomy singular name'),
        'search_items' =>  __('Search Categoria'),
        'popular_items' => __('Popular Categoria'),
        'all_items' => __('Todos os Categoria'),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __('Editar Categoria'),
        'update_item' => __('Atualizar Categoria'),
        'add_new_item' => __('Adicionar Novo Categoria'),
        'new_item_name' => __('Novo Categoria'),
        'separate_items_with_commas' => __('Separate Categorias with commas'),
        'add_or_remove_items' => __('Add or remove Categorias'),
        'choose_from_most_used' => __('Choose from the most used Categorias'),
        'menu_name' => __('Categorias'),
    );
    $imprensa = array(
        'name' => _x('Categorias', 'taxonomy general name'),
        'singular_name' => _x('Categoria', 'taxonomy singular name'),
        'search_items' =>  __('Search Categoria'),
        'popular_items' => __('Popular Categoria'),
        'all_items' => __('Todos os Categoria'),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __('Editar Categoria'),
        'update_item' => __('Atualizar Categoria'),
        'add_new_item' => __('Adicionar Novo Categoria'),
        'new_item_name' => __('Novo Categoria'),
        'separate_items_with_commas' => __('Separate Categorias with commas'),
        'add_or_remove_items' => __('Add or remove Categorias'),
        'choose_from_most_used' => __('Choose from the most used Categorias'),
        'menu_name' => __('Categorias'),
    );
    $condition = array(
        'name' => _x('Categorias', 'taxonomy general name'),
        'singular_name' => _x('Categoria', 'taxonomy singular name'),
        'search_items' =>  __('Search Categorias'),
        'popular_items' => __('Popular Categorias'),
        'all_items' => __('Todos as Categorias'),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __('Editar Categoria'),
        'update_item' => __('Atualizar Categoria'),
        'add_new_item' => __('Adicionar Nova Categoria'),
        'new_item_name' => __('Nova Categoria'),
        'separate_items_with_commas' => __('Separate Categorias with commas'),
        'add_or_remove_items' => __('Add or remove Categorias'),
        'choose_from_most_used' => __('Choose from the most used Categorias'),
        'menu_name' => __('Categorias'),
    );
    register_taxonomy('cat_condicao', array('condicao'), array(
        'hierarchical' => true,
        'labels' => $condition,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'show_in_rest' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'rewrite' => array('slug' => 'tipos'),
    ));
    register_taxonomy('cat_imprensa', array('imprensa'), array(
        'hierarchical' => true,
        'labels' => $imprensa,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'show_in_rest' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'rewrite' => array('slug' => 'tipos'),
    ));
    //processos
    register_taxonomy('cat_processos', array('processos'), array(
        'hierarchical' => true,
        'labels' => $process,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'show_in_rest' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'rewrite' => array('slug' => 'tipos'),
    ));
    register_taxonomy('cargos', array('membros'), array(
        'hierarchical' => true,
        'labels' => $cargo,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'show_in_rest' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'rewrite' => array('slug' => 'tipos'),
    ));

    register_taxonomy('categoria', array('viagem', 'saude', 'compras', 'telefonia', 'construct', 'etc', 'ajuda'), array(
        'hierarchical' => true,
        'labels' => $catscpost,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'show_in_rest' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'rewrite' => array('slug' => 'categoria'),
    ));

    register_taxonomy('partner', array('viagem', 'saude', 'compras', 'telefonia', 'construct', 'etc'), array(
        'hierarchical' => true,
        'labels' => $catspartn,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'show_in_rest' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'rewrite' => array('slug' => 'categoria'),
    ));
}
add_action('init', 'reg_cat');

// Add term page
function pippin_taxonomy_add_new_meta_field() {
	// this will add the custom meta field to the add new term page
	?>
	<div class="form-field">
		<label for="term_meta[icon_category]"><?php _e( 'Icone da Categoria', 'protegit' ); ?></label>
        <textarea name="term_meta[icon_category]" id="term_meta[icon_category]" cols="30" rows="4" placeholder="Ensira o código do svg da categoria"></textarea>
		<p class="description"><?php _e( 'Código da imagem SVG do Ícone desta categoria','pippin' ); ?></p>
	</div>
<?php
}
add_action( 'partner_add_form_fields', 'pippin_taxonomy_add_new_meta_field', 10, 2 );

/**
 * Limit Words
 */

function limit_text($text, $limit) {
    if (str_word_count($text, 0) > $limit) {
        $words = str_word_count($text, 2);
        $pos = array_keys($words);
        $text = substr($text, 0, $pos[$limit]) . '...';
    }
    return $text;
  }

  add_filter('comment_post_redirect', 'redirect_after_comment');
  function redirect_after_comment($location)
  {
  return $_SERVER["HTTP_REFERER"];
  }
/**
 * Functions Custom controls
 */

require get_template_directory().'/inc/callbacks.php';

function fn_info_contact_blocktitle(){
    echo nl2br(get_theme_mod('info_contact_blocktitle'));
}

function fn_info_contact_1_title(){
    echo nl2br(get_theme_mod('info_contact_1_title'));
}

function fn_info_contact_1(){
    echo nl2br(get_theme_mod('info_contact_1'));
}

function fn_info_contact_info_title(){
    echo nl2br(get_theme_mod('info_contact_info_title'));
}


function fn_info_contact_info(){
    echo nl2br(get_theme_mod('info_contact_info'));
}



function fn_info_contact_info_mail(){
    echo nl2br(get_theme_mod('info_contact_info_mail'));
}

function fn_info_contact_kit_imprensa_title(){
    echo nl2br(get_theme_mod('info_contact_kit_imprensa_title'));
}


function fn_info_contact_kit_imprensa_link_text(){
    echo nl2br(get_theme_mod('info_contact_kit_imprensa_link_text'));
}

function fn_info_contact_kit_imprensa_link(){
    echo nl2br(get_theme_mod('info_contact_kit_imprensa_link'));
}

function fn_info_contact_kit_imprensa_content(){
    echo nl2br(get_theme_mod('info_contact_kit_imprensa_content'));
}

function fn_imprensa__pagetitle(){
    echo nl2br(get_theme_mod('imprensa__pagetitle'));
}
function fn_imprensa__pagesubtitle(){
    echo nl2br(get_theme_mod('imprensa__pagesubtitle'));
}
