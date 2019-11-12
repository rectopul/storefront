<?php
/**
 * Section Page  - Empreas Parceiras
 * Panel: rmb_panel_pages
 */
$wp_customize->add_section('partner_companies', array(
    'title'       => __('Empreas Parceiras', 'themename'),
    'description' => 'Edite as informações da página Empresas Parceiras',
    'priority'    => 8,
    'panel'       => 'rmb_panel_pages'
));

Rmb_control([
    'section'	 => 'partner_companies',
    'settings'	=>  'partners_titlecomplementar',
    'classe'	  => 'control',
    'description' => 'Edite o titulo complementar apresentado no topo da página',
    'label'	   => 'Titulo Complementar',
    'type'		=> 'textarea',
    'selector' => '.companies__title p.paragraph',
    'callbackecho' => 'complement_title_partner_companies',
    'transport'   => 'postMessage',
], $wp_customize);

Rmb_control([
    'section'	 => 'partner_companies',
    'settings'	=>  'partners_title',
    'classe'	  => 'control',
    'description' => 'Edite o titulo apresentado no topo da página',
    'label'	   => 'Titulo',
    'type'		=> 'textarea',
    'selector' => '.companies__title h2',
    'callbackecho' => 'title_partner_companies',
    'transport'   => 'postMessage',
], $wp_customize);

Rmb_control([
    'section'	 => 'partner_companies',
    'settings'	=>  'partners_subtitle',
    'classe'	  => 'control',
    'description' => 'Edite o sub titulo apresentado no topo da página',
    'label'	   => 'Sub Titulo',
    'type'		=> 'textarea',
    'selector' => '.companies__title h4',
    'callbackecho' => 'partners_subtitle',
    'transport'   => 'postMessage',
], $wp_customize);

 /**
  * Sep plans
  */

  $wp_customize->add_setting('companies__separator', array(
	'default'           => '',
	'sanitize_callback' => 'esc_html',
));
$wp_customize->add_control(new Separator_Custom_control($wp_customize, 'companies__separator', array(
	'settings'		=> 'companies__separator',
	'section'  		=> 'partner_companies',
)));


$wp_customize->add_setting('companies__info_images', array(
	'default'           => '',
	'sanitize_callback' => 'mytheme_text_sanitization',

));
$wp_customize->add_control(new Info_Custom_control($wp_customize, 'companies__info_images', array(
	'label'    		=> esc_html__('Carrosel de Parceiros', 'mytheme'),
	'description' 	=> esc_html__('Edite informações e as logos de seus parceiros', 'mytheme'),
	'settings'		=> 'companies__info_images',
	'section'  		=> 'partner_companies',
)));

/**
 * Subtitle
 */
Rmb_control([
    'section'	 => 'partner_companies',
    'settings'	=>  'partners_logossubtitle',
    'classe'	  => 'control',
    'description' => 'Edite o titulo complementar apresentado no carrossel da página',
    'label'	   => 'Titulo Complementar',
    'type'		=> 'textarea',
    'selector' => '.companies__carrossel-title h4',
    'callbackecho' => 'partners_logossubtitle',
    'transport'   => 'postMessage',
], $wp_customize);

/**
 * Titulo
 */
Rmb_control([
    'section'	 => 'partner_companies',
    'settings'	=>  'partners_logostitle',
    'classe'	  => 'control',
    'description' => 'Edite o titulo apresentado no carrossel da página',
    'label'	   => 'Titulo',
    'type'		=> 'textarea',
    'selector' => '.companies__carrossel-title h2',
    'callbackecho' => 'partners_logostitle',
    'transport'   => 'postMessage',
], $wp_customize);

Rmb_control([
    'section'     => 'partner_companies',
    'settings'    =>  'empresas__logos',
    'default'     =>  get_theme_mod('empresas__logos'),
    'classe'      => 'multimages',
    'capability'  => 'edit_theme_options',
    'description' => 'Selecione as logos das empresas',
    'label'       => 'Logos',
    'type'        => 'multiple',
    'container_inclusive' => true,
    'selector'    =>  '.imprensa__pagetitle h2',
    'transport'   => 'postMessage'
], $wp_customize);

 /**
  * Sep plans
  */

  $wp_customize->add_setting('companies__separator2', array(
	'default'           => '',
	'sanitize_callback' => 'esc_html',
));
$wp_customize->add_control(new Separator_Custom_control($wp_customize, 'companies__separator2', array(
	'settings'		=> 'companies__separator2',
	'section'  		=> 'partner_companies',
)));


$wp_customize->add_setting('companies__blocs', array(
	'default'           => '',
	'sanitize_callback' => 'mytheme_text_sanitization',

));
$wp_customize->add_control(new Info_Custom_control($wp_customize, 'companies__blocs', array(
	'label'    		=> esc_html__('Blocos de informações', 'mytheme'),
	'description' 	=> esc_html__('Edite alguns blocos extra com informações', 'mytheme'),
	'settings'		=> 'companies__blocs',
	'section'  		=> 'partner_companies',
)));

/**
 * Subtitle
 */
Rmb_control([
    'section'	 => 'partner_companies',
    'settings'	=>  'partners_blocs_subtitle',
    'classe'	  => 'control',
    'description' => 'Edite o titulo complementar apresentado nos Blocos da página',
    'label'	   => 'Titulo Complementar',
    'type'		=> 'textarea',
    'selector' => '.companies__bloc-title h4',
    'callbackecho' => 'partners_blocs_subtitle',
    'transport'   => 'postMessage',
], $wp_customize);

/**
 * Titulo
 */
Rmb_control([
    'section'	 => 'partner_companies',
    'settings'	=>  'partners_blocs_title',
    'classe'	  => 'control',
    'description' => 'Edite o titulo apresentado nos Blocos da página',
    'label'	   => 'Titulo',
    'type'		=> 'textarea',
    'selector' => '.companies__bloc-title h2',
    'callbackecho' => 'partners_blocs_title',
    'transport'   => 'postMessage',
], $wp_customize);

for ($i=0; $i < 3; $i++) { 
    /**
     * Sep plans
    */

    $wp_customize->add_setting('companies__blocsep'.$i, array(
        'default'           => '',
        'sanitize_callback' => 'esc_html',
    ));
    $wp_customize->add_control(new Separator_Custom_control($wp_customize, 'companies__blocsep'.$i, array(
        'settings'		=> 'companies__blocsep'.$i,
        'section'  		=> 'partner_companies',
    )));


    $wp_customize->add_setting('companies__bloc_info_'.$i, array(
        'default'           => '',
        'sanitize_callback' => 'mytheme_text_sanitization',

    ));
    $wp_customize->add_control(new Info_Custom_control($wp_customize, 'companies__bloc_info_'.$i, array(
        'label'    		=> esc_html__('Bloco - '.($i+1), 'mytheme'),
        'description' 	=> esc_html__('Edite as informações do bloco '.($i+1), 'mytheme'),
        'settings'		=> 'companies__bloc_info_'.$i,
        'section'  		=> 'partner_companies',
    )));
    /**
     * Header
     */
    Rmb_control([
        'section'	 => 'partner_companies',
        'settings'	=>  'partners_blocstitle'.$i,
        'classe'	  => 'control',
        'description' => 'Edite o texto no Topo do bloco',
        'label'	   => 'Topo',
        'type'		=> 'text',
        'selector' => '.companies__blocs-title'.$i,
        'callbackecho' => 'partners_blocstitle'.$i,
        'transport'   => 'postMessage',
    ], $wp_customize);

    /**
     * Content
     */
    Rmb_control([
        'section'	 => 'partner_companies',
        'settings'	=>  'partners_bloc_content'.$i,
        'classe'	  => 'control',
        'description' => 'Edite o conteúdo do bloco '.($i+1),
        'label'	   => 'Conteúdo',
        'type'		=> 'textarea',
        'selector' => '.companies__bloc-content'.$i,
        'callbackecho' => 'partners_bloc_content'.$i,
        'transport'   => 'postMessage',
    ], $wp_customize);

    /**
     * Footer
     */
    Rmb_control([
        'section'	 => 'partner_companies',
        'settings'	=>  'partners_bloc_footer'.$i,
        'classe'	  => 'control',
        'description' => 'Edite o texto do Rodapé do bloco',
        'label'	   => 'Rodapé',
        'type'		=> 'text',
        'selector' => '.companies__bloc-footer'.$i,
        'callbackecho' => 'partners_bloc_footer'.$i,
        'transport'   => 'postMessage',
    ], $wp_customize);
}
