<?php
 /**
 * Section Page  - Trabalhe conosco
 * Panel: rmb_panel_pages
 */
$wp_customize->add_section('rmb_home_page_member', array(
    'title'    => __('Nosso Time', 'themename'),
    'description' => 'Edite as informações da página Nosso Time',
    'priority' => 5,
    'panel'            => 'rmb_panel_pages'
));

$argsmembertitle = [
    'section'     => 'rmb_home_page_member',
    'settings'    =>  'nosstim__title',
    'classe'      => 'control',
    'description' => 'Informe um titulo para ser exibido na página Nosso Time',
    'label'       => 'Titulo',
    'type'        => 'textarea',
    'selector'    =>  '.member__header h2',
    'callbackecho' => function () {
        echo nl2br(get_theme_mod('nosstim__title'));
    },
    'transport'   => 'postMessage'
];

Rmb_control($argsmembertitle, $wp_customize);

$argsmembertitle = [
    'section'     => 'rmb_home_page_member',
    'settings'    =>  'nosstim__desc',
    'classe'      => 'control',
    'description' => 'Informe uma descrição para ser exibido na página Nosso Time',
    'label'       => 'Descrição',
    'type'        => 'textarea',
    'selector'    =>  '.member__header h4',
    'callbackecho' => function () {
        echo nl2br(get_theme_mod('nosstim__desc'));
    },
    'transport'   => 'postMessage'
];

Rmb_control($argsmembertitle, $wp_customize);

/**
 * Page Membros
 * Section: rmb_home_page_trabcom
 * Header
 */
$wp_customize->add_setting('header__memebr', array(
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'absint'
));
    
$wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize,
    'header__member', array(
    'section' => 'rmb_home_page_member',
    'settings' => 'header__memebr',
    'label' => __( 'Cabeçalho Membros' ),
    'width' => 1920,
    'height' => 405,
    'flex_width' => false,
    'flex_height' => false,
    )
));

/**
*Separator
**/
$wp_customize->add_setting('separator_1', array(
	'default'           => '',
	'sanitize_callback' => 'esc_html',
));
$wp_customize->add_control(new Separator_Custom_control($wp_customize, 'separator_1', array(
	'settings'		=> 'separator_1',
	'section'  		=> 'rmb_home_page_member',
)));

/**
*Info
**/
$wp_customize->add_setting('custom_info', array(
	'default'           => '',
	'sanitize_callback' => 'mytheme_text_sanitization',

));
$wp_customize->add_control(new Info_Custom_control($wp_customize, 'custom_info', array(
	'label'    		=> esc_html__('Opçoes do Banner Extra', 'mytheme'),
	'description' 	=> esc_html__('A seguir voce vrá todas as opçoes disponíveis para a alteração do Banner Extra.', 'mytheme'),
	'settings'		=> 'custom_info',
	'section'  		=> 'rmb_home_page_member',
)));

/**
 * Check Full Banner
 */

 /**
*Custom Checkbox
**/
$wp_customize->add_setting('custom_checkbox', array(
	'default'           => false,
));
$wp_customize->add_control(new Toggle_Checkbox_Custom_control($wp_customize, 'custom_checkbox', array(
	'label'    		=> esc_html__('Mostrar Banner Extra', 'mytheme'),
	'type'     		=> 'checkbox',
	'settings'		=> 'custom_checkbox',
    'section'  		=> 'rmb_home_page_member',
)));

/**
 * Full Banner Saudação
 */

$bannexsaud = [
    'section'     => 'rmb_home_page_member',
    'settings'    =>  'bannerex__saudat',
    'classe'      => 'control',
    'description' => 'Informe uma saudação para o Banner Extra da página',
    'label'       => 'Saudação',
    'type'        => 'textarea',
    'selector'    =>  '.member__bannerextra-text h6',
    'input_attrs'        => ['style' => 'margin-top: 30px'],
    'callbackecho' => function () {
        echo nl2br(get_theme_mod('bannerex__saudat'));
    },
    'transport'   => 'postMessage'
];

Rmb_control($bannexsaud, $wp_customize);

/**
 * Full Banner Titulo
 */

$banextit = [
    'section'     => 'rmb_home_page_member',
    'settings'    =>  'bannerex__title',
    'classe'      => 'control',
    'description' => 'Informe um titulo para o Banner Extra da página',
    'label'       => 'Titulo',
    'type'        => 'textarea',
    'selector'    =>  '.member__bannerextra-text h2',
    'callbackecho' => function () {
        echo nl2br(get_theme_mod('bannerex__title'));
    },
    'transport'   => 'postMessage'
];

Rmb_control($banextit, $wp_customize);


/**
 * Full Banner Texto
 */

$bannexcontent = [
    'section'     => 'rmb_home_page_member',
    'settings'    =>  'bannerex__text',
    'classe'      => 'control',
    'description' => 'Ensira o Conteúdo do Banner Extra',
    'label'       => 'Conteúdo',
    'type'        => 'textarea',
    'selector'    =>  '.member__bannerextra-text h5',
    'callbackecho' => function () {
        echo nl2br(get_theme_mod('bannerex__text'));
    },
    'transport'   => 'postMessage'
];

Rmb_control($bannexcontent, $wp_customize);

/**
 * Full Banner BG
 */

$wp_customize->add_setting('full_banner', array(
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'absint'
));
    
$wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize,
    'bull_bannerbg', array(
    'section' => 'rmb_home_page_member',
    'settings' => 'full_banner',
    'label' => __( 'Background - Banner Extra' ),
    'width' => 1920,
    'height' => 670,
    'flex_width' => false,
    'flex_height' => false,
    )
));

/**
 * Links
 */

 /**
*Separator
**/
$wp_customize->add_setting('separator_2', array(
	'default'           => '',
	'sanitize_callback' => 'esc_html',
));
$wp_customize->add_control(new Separator_Custom_control($wp_customize, 'separator_2', array(
	'settings'		=> 'separator_2',
	'section'  		=> 'rmb_home_page_member',
)));

/**
*Info
**/
$wp_customize->add_setting('custom_info_links', array(
	'default'           => '',
	'sanitize_callback' => 'mytheme_text_sanitization',

));
$wp_customize->add_control(new Info_Custom_control($wp_customize, 'custom_info_links', array(
	'label'    		=> esc_html__('Opçoes dos Links na página', 'mytheme'),
	'description' 	=> esc_html__('A seguir voce vrá todas as opçoes disponíveis para a alteração dos links na página.', 'mytheme'),
	'settings'		=> 'custom_info_links',
	'section'  		=> 'rmb_home_page_member',
)));

 /**
  * Link 1
  */

$bannextraimage = [
    'label'       => __( 'Link - 1' ),
    'section'     => 'rmb_home_page_member',
    'classe'      => 'media',
    'mime_type'   => 'image',
    'settings'    => 'member__link1',
];

$wp_customize->add_setting('member__link1', []);

$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'link1__member_image', $bannextraimage) );

/**
 * Link 1 Content
 */

$bannexcontent = [
    'section'     => 'rmb_home_page_member',
    'settings'    =>  'member__link1_content',
    'classe'      => 'control',
    'description' => 'Ensira o Conteúdo dos links na página de Membros',
    'label'       => 'Conteúdo - Link 1',
    'type'        => 'textarea',
    'selector'    =>  '.member__bannerextra-text h5',
    'callbackecho' => function () {
        echo nl2br(get_theme_mod('member__link1_content'));
    },
    'transport'   => 'postMessage'
];

Rmb_control($bannexcontent, $wp_customize);

$bannexcontent = [
    'section'     => 'rmb_home_page_member',
    'settings'    =>  'member__link1_textlink',
    'classe'      => 'control',
    'description' => 'Ensira o texto para o link na de Membros',
    'label'       => 'Texto Link - Link 1',
    'type'        => 'text',
    'selector'    =>  '.member__bannerextra-text h5',
    'callbackecho' => function () {
        echo nl2br(get_theme_mod('member__link1_textlink'));
    },
    'transport'   => 'postMessage'
];

Rmb_control($bannexcontent, $wp_customize);

$bannexcontent = [
    'section'     => 'rmb_home_page_member',
    'settings'    =>  'member__link1_link',
    'classe'      => 'control',
    'description' => 'Ensira o link na de Membros',
    'label'       => 'Link - Link 1',
    'type'        => 'text',
    'selector'    =>  '.member__bannerextra-text h5',
    'callbackecho' => function () {
        echo nl2br(get_theme_mod('member__link1_link'));
    },
    'transport'   => 'postMessage'
];

Rmb_control($bannexcontent, $wp_customize);

/**
 * Link 2
 */

$bannextraimage = [
    'label'       => __( 'Link - 2' ),
    'section'     => 'rmb_home_page_member',
    'classe'      => 'media',
    'mime_type'   => 'image',
    'settings'    => 'member__link2',
];

$wp_customize->add_setting('member__link2', []);

$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'link2__member_image', $bannextraimage) );


/**
 * Link 2 Content
 */

$bannexcontent = [
    'section'     => 'rmb_home_page_member',
    'settings'    =>  'member__link2_content',
    'classe'      => 'control',
    'description' => 'Ensira o Conteúdo dos links na página de Membros',
    'label'       => 'Conteúdo - Link 2',
    'type'        => 'textarea',
    'selector'    =>  '.member__bannerextra-text h5',
    'callbackecho' => function () {
        echo nl2br(get_theme_mod('member__link2_content'));
    },
    'transport'   => 'postMessage'
];

Rmb_control($bannexcontent, $wp_customize);

$bannexcontent = [
    'section'     => 'rmb_home_page_member',
    'settings'    =>  'member__link2_textlink',
    'classe'      => 'control',
    'description' => 'Ensira o texto para o link na de Membros',
    'label'       => 'Texto Link - Link 2',
    'type'        => 'text',
    'selector'    =>  '.member__bannerextra-text h5',
    'callbackecho' => function () {
        echo nl2br(get_theme_mod('member__link2_textlink'));
    },
    'transport'   => 'postMessage'
];

Rmb_control($bannexcontent, $wp_customize);

$bannexcontent = [
    'section'     => 'rmb_home_page_member',
    'settings'    =>  'member__link2_link',
    'classe'      => 'control',
    'description' => 'Ensira o link na de Membros',
    'label'       => 'Link - Link 2',
    'type'        => 'text',
    'selector'    =>  '.member__bannerextra-text h5',
    'callbackecho' => function () {
        echo nl2br(get_theme_mod('member__link2_link'));
    },
    'transport'   => 'postMessage'
];

Rmb_control($bannexcontent, $wp_customize);

/**
 * Link 3
 */

$bannextraimage = [
    'label'       => __( 'Link - 3' ),
    'section'     => 'rmb_home_page_member',
    'classe'      => 'media',
    'mime_type'   => 'image',
    'settings'    => 'member__link3',
];

$wp_customize->add_setting('member__link3', []);

$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'link3__member_image', $bannextraimage) );


/**
 * Link 3 Content
 */

$bannexcontent = [
    'section'     => 'rmb_home_page_member',
    'settings'    =>  'member__link3_content',
    'classe'      => 'control',
    'description' => 'Ensira o Conteúdo dos links na página de Membros',
    'label'       => 'Conteúdo - Link 3',
    'type'        => 'textarea',
    'selector'    =>  '.member__bannerextra-text h5',
    'callbackecho' => function () {
        echo nl2br(get_theme_mod('member__link3_content'));
    },
    'transport'   => 'postMessage'
];

Rmb_control($bannexcontent, $wp_customize);

$bannexcontent = [
    'section'     => 'rmb_home_page_member',
    'settings'    =>  'member__link3_textlink',
    'classe'      => 'control',
    'description' => 'Ensira o texto para o link na de Membros',
    'label'       => 'Texto Link - Link 3',
    'type'        => 'text',
    'selector'    =>  '.member__bannerextra-text h5',
    'callbackecho' => function () {
        echo nl2br(get_theme_mod('member__link3_textlink'));
    },
    'transport'   => 'postMessage'
];

Rmb_control($bannexcontent, $wp_customize);

$bannexcontent = [
    'section'     => 'rmb_home_page_member',
    'settings'    =>  'member__link3_link',
    'classe'      => 'control',
    'description' => 'Ensira o link na de Membros',
    'label'       => 'Link - Link 3',
    'type'        => 'text',
    'selector'    =>  '.member__bannerextra-text h5',
    'callbackecho' => function () {
        echo nl2br(get_theme_mod('member__link3_link'));
    },
    'transport'   => 'postMessage'
];

Rmb_control($bannexcontent, $wp_customize);