<?php
 /**
 * Section Page  - Trabalhe conosco
 * Panel: rmb_panel_pages
 */
$wp_customize->add_section('rmb_home_page_recomend', array(
    'title'    => __('Recomende', 'themename'),
    'description' => 'Edite as informações da página Recomende',
    'priority' => 7,
    'panel'            => 'rmb_panel_pages'
));

/**
*Info
**/
$wp_customize->add_setting('block_comofunc_info', array(
	'default'           => '',
	'sanitize_callback' => 'mytheme_text_sanitization',

));
$wp_customize->add_control(new Info_Custom_control($wp_customize, 'block_comofunc_info', array(
	'label'    		=> esc_html__('Instruções de como funciona', 'mytheme'),
	'description' 	=> esc_html__('A seguir voce vrá todas as opçoes disponíveis para a alteração do bloco Como Funciona', 'mytheme'),
	'settings'		=> 'block_comofunc_info',
	'section'  		=> 'rmb_home_page_recomend',
)));

/**
 * Titulo Bloco Como Funciona
 */

Rmb_control([
    'section'     => 'rmb_home_page_recomend',
    'settings'    =>  'block_comofunc_info_title',
    'classe'      => 'control',
    'description' => 'Informe um titulo para ser exibido no bloco Como funciona',
    'label'       => 'Titulo',
    'type'        => 'textarea',
    'selector'    =>  '.recommend__blocs-title h2',
    'callbackecho' => function () {
        echo nl2br(get_theme_mod('block_comofunc_info_title'));
    },
    'transport'   => 'postMessage'
], $wp_customize);

Rmb_control([
    'section'     => 'rmb_home_page_recomend',
    'settings'    =>  'block_comofunc_info_subtitle',
    'classe'      => 'control',
    'description' => 'Informe um sub titulo para ser exibido no bloco Como funciona',
    'label'       => 'Sub Titulo',
    'type'        => 'textarea',
    'selector'    =>  '.recommend__blocs-title h6',
    'callbackecho' => function () {
        echo nl2br(get_theme_mod('block_comofunc_info_subtitle'));
    },
    'transport'   => 'postMessage'
], $wp_customize);

/**
 * Page Como Funciona
 * Section: rmb_home_page_recomend
 * Blocos Como funciona
 */

Rmb_control([
    'section'     => 'rmb_home_page_recomend',
    'settings'    =>  'recomende_comofunc_bloc',
    'classe'      => 'imagetext',
    'description' => 'Selecione as imagens e informe a descrição das mesmas',
    'label'       => 'Blocos',
    'type'        => 'multiple',
    'transport'   => 'refresh'
], $wp_customize);

/**
 * Bloco Planos
 */

 /**
  * Sep plans
  */

$wp_customize->add_setting('plans__separator', array(
	'default'           => '',
	'sanitize_callback' => 'esc_html',
));
$wp_customize->add_control(new Separator_Custom_control($wp_customize, 'plans__separator', array(
	'settings'		=> 'plans__separator',
	'section'  		=> 'rmb_home_page_recomend',
)));


$wp_customize->add_setting('block_plans', array(
	'default'           => '',
	'sanitize_callback' => 'mytheme_text_sanitization',

));
$wp_customize->add_control(new Info_Custom_control($wp_customize, 'block_plans', array(
	'label'    		=> esc_html__('Planos', 'mytheme'),
	'description' 	=> esc_html__('Veja e edite algumas informações do bloco que apresenta os planos', 'mytheme'),
	'settings'		=> 'block_plans',
	'section'  		=> 'rmb_home_page_recomend',
)));

/**
 * Titulo e Subtitulo
 */

Rmb_control([
    'section'     => 'rmb_home_page_recomend',
    'settings'    =>  'block_plan_info_title',
    'classe'      => 'control',
    'description' => 'Informe um titulo para ser exibido no bloco Planos',
    'label'       => 'Titulo',
    'type'        => 'textarea',
    'selector'    =>  '.recommend__plans-title h2',
    'callbackecho' => function () {
        echo nl2br(get_theme_mod('block_plan_info_title'));
    },
    'transport'   => 'postMessage'
], $wp_customize);

Rmb_control([
    'section'     => 'rmb_home_page_recomend',
    'settings'    =>  'block_plan_info_subtitle',
    'classe'      => 'control',
    'description' => 'Informe um sub titulo para ser exibido no bloco planos',
    'label'       => 'Sub Titulo',
    'type'        => 'textarea',
    'selector'    =>  '.recommend__plans-title h6',
    'callbackecho' => function () {
        echo nl2br(get_theme_mod('block_plan_info_subtitle'));
    },
    'transport'   => 'postMessage'
], $wp_customize);

/**
 * BG
 */

$wp_customize->add_setting('plans__BG', array(
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'absint'
));
    
$wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize,
    'plans__BG', array(
    'section' => 'rmb_home_page_recomend',
    'settings' => 'plans__BG',
    'label' => __( 'Background - Planos' ),
    'width' => 1920,
    'height' => 680,
    'flex_width' => false,
    'flex_height' => false,
    )
)); 

/**
 * Formulário
 */


 /**
  * Sep plans
  */

$wp_customize->add_setting('form__separator', array(
	'default'           => '',
	'sanitize_callback' => 'esc_html',
));
$wp_customize->add_control(new Separator_Custom_control($wp_customize, 'form__separator', array(
	'settings'		=> 'form__separator',
	'section'  		=> 'rmb_home_page_recomend',
)));


$wp_customize->add_setting('block_form', array(
	'default'           => '',
	'sanitize_callback' => 'mytheme_text_sanitization',

));
$wp_customize->add_control(new Info_Custom_control($wp_customize, 'block_form', array(
	'label'    		=> esc_html__('Formulário', 'mytheme'),
	'description' 	=> esc_html__('Edite informações sobre o formulário da página', 'mytheme'),
	'settings'		=> 'block_form',
	'section'  		=> 'rmb_home_page_recomend',
)));

/**
 * Titulo e Subtitulo
 */

Rmb_control([
    'section'     => 'rmb_home_page_recomend',
    'settings'    =>  'block_form_info_title',
    'classe'      => 'control',
    'description' => 'Informe um titulo para ser exibido no bloco Formulário',
    'label'       => 'Titulo',
    'type'        => 'textarea',
    'selector'    =>  '.recommends__form-title h2',
    'callbackecho' => function () {
        echo nl2br(get_theme_mod('block_plan_info_title'));
    },
    'transport'   => 'postMessage'
], $wp_customize);

Rmb_control([
    'section'     => 'rmb_home_page_recomend',
    'settings'    =>  'block_form_info_subtitle',
    'classe'      => 'control',
    'description' => 'Informe um sub titulo para ser exibido no bloco Formulário',
    'label'       => 'Sub Titulo',
    'type'        => 'textarea',
    'selector'    =>  '.recommends__form-title h6',
    'callbackecho' => function () {
        echo nl2br(get_theme_mod('block_plan_info_subtitle'));
    },
    'transport'   => 'postMessage'
], $wp_customize);

Rmb_control([
    'section'     => 'rmb_home_page_recomend',
    'settings'    =>  'block_form_info_shortcode',
    'classe'      => 'control',
    'description' => 'Informe o shortcode do formulário gerado no contact form 7',
    'label'       => 'Shortcode - Formulário',
    'type'        => 'text',
    'selector'    =>  '.recomend__comofunc-block h2',
    'callbackecho' => function () {
        echo nl2br(get_theme_mod('block_form_info_shortcode'));
    },
    'transport'   => 'postMessage'
], $wp_customize);

Rmb_control([
    'section'     => 'rmb_home_page_recomend',
    'settings'    =>  'block_form_info_contact2',
    'classe'      => 'control',
    'description' => 'Informe uma informação para contato alternativa',
    'label'       => 'Informação de contat - Formulário',
    'type'        => 'text',
    'selector'    =>  '.recomend__comofunc-block h2',
    'callbackecho' => function () {
        echo nl2br(get_theme_mod('block_form_info_contact2'));
    },
    'transport'   => 'postMessage'
], $wp_customize);

/**
 * Mais informações
 */
Rmb_control([
    'section'     => 'rmb_home_page_recomend',
    'settings'    =>  'block_form_more_info_title',
    'classe'      => 'control',
    'description' => 'Informe um titulo para o bloco de mais informações',
    'label'       => 'Titulo - Mais informações',
    'type'        => 'text',
    'selector'    =>  '.recommend__moreinfo h2',
    'callbackecho' => function () {
        echo nl2br(get_theme_mod('block_form_more_info'));
    },
    'transport'   => 'postMessage'
], $wp_customize);

Rmb_control([
    'section'     => 'rmb_home_page_recomend',
    'settings'    =>  'block_form_more_info',
    'classe'      => 'control',
    'description' => 'Informe mais algumas informações para seus clientes',
    'label'       => 'Mais informações',
    'type'        => 'textarea',
    'selector'    =>  '.recommend__moreinfo article',
    'callbackecho' => function () {
        echo nl2br(get_theme_mod('block_form_more_info'));
    },
    'transport'   => 'postMessage'
], $wp_customize);

