<?php
/**
 * Section Page  - Depoimentos
 * Panel: rmb_panel_pages
 */
$wp_customize->add_section('rmb_home_page_imprensa', array(
    'title'       => __('Imprensa', 'themename'),
    'description' => 'Edite as informações da página Depoimentos',
    'priority'    => 7,
    'panel'       => 'rmb_panel_pages'
));

$imprensatitle = [
    'section'     => 'rmb_home_page_imprensa',
    'settings'    =>  'imprensa__pagetitle',
    'default'     =>  get_theme_mod('imprensa__pagetitle'),
    'classe'      => 'control',
    'capability'  => 'edit_theme_options',
    'description' => 'Informe uma titulo para a página Imprensa',
    'label'       => 'Titulo',
    'type'        => 'textarea',
    'container_inclusive' => true,
    'selector'    =>  '.imprensa__pagetitle h2',
    'callbackecho' => 'fn_imprensa__pagetitle',
    'transport'   => 'postMessage'
];

Rmb_control($imprensatitle, $wp_customize);

$imprensasubtitle = [
    'section'     => 'rmb_home_page_imprensa',
    'settings'    =>  'imprensa__pagesubtitle',
    'classe'      => 'control',
    'capability'  => 'edit_theme_options',
    'description' => 'Informe um subtitulo para a página Imprensa',
    'label'       => 'Subtitulo',
    'type'        => 'textarea',
    'selector'    =>  '.imprensa__pagetitle h4',
    'callbackecho' => 'fn_imprensa__pagesubtitle',
    'transport'   => 'postMessage'
];

Rmb_control($imprensasubtitle, $wp_customize);
 /**
*Separator
**/
$wp_customize->add_setting('separator_imprensa2', array(
	'default'           => '',
	'sanitize_callback' => 'esc_html',
));
$wp_customize->add_control(new Separator_Custom_control($wp_customize, 'separator_imprensa2', array(
	'settings'		=> 'separator_imprensa2',
	'section'  		=> 'rmb_home_page_imprensa',
)));

/**
*Info
**/
$wp_customize->add_setting('imprensa_info', array(
	'default'           => '',
	'sanitize_callback' => 'rmb_home_page_imprensa',

));
$wp_customize->add_control(new Info_Custom_control($wp_customize, 'imprensa_info', array(
	'label'    		=> esc_html__('Opçoes do Botão', 'mytheme'),
	'description' 	=> esc_html__('A seguir voce vrá todas as opçoes disponíveis para a alteração do Botão do Cabeçalho.', 'mytheme'),
	'settings'		=> 'imprensa_info',
	'section'  		=> 'rmb_home_page_imprensa',
)));


/**
 * Links
 */

$imprensalinkhead = [
    'section'     => 'rmb_home_page_imprensa',
    'settings'    =>  'imprensa__linkheaddesk',
    'classe'      => 'control',
    'description' => 'Informe um texto para o botão no cabeçalho',
    'label'       => 'Texto Botão',
    'type'        => 'text',
    'selector'    =>  '.imprens_link-header',
    'callbackecho' => function () {
        echo nl2br(get_theme_mod('imprensa__linkheaddesk'));
    },
    'transport'   => 'postMessage'
];

Rmb_control($imprensalinkhead, $wp_customize);

$imprensalinkhead = [
    'section'     => 'rmb_home_page_imprensa',
    'settings'    =>  'imprensa__linkhead',
    'classe'      => 'control',
    'description' => 'Informe um link para o botão no cabeçalho',
    'label'       => 'Link Botão',
    'type'        => 'text',
    'selector'    =>  '.imprens_link-header',
    'callbackecho' => function () {
        echo nl2br(get_theme_mod('imprensa__linkhead'));
    },
    'transport'   => 'postMessage'
];

Rmb_control($imprensalinkhead, $wp_customize);

/**
 * Banner Extra
 */

 /**
*Separator
**/
$wp_customize->add_setting('separator_imprensa', array(
	'default'           => '',
	'sanitize_callback' => 'esc_html',
));
$wp_customize->add_control(new Separator_Custom_control($wp_customize, 'separator_imprensa', array(
	'settings'		=> 'separator_imprensa',
	'section'  		=> 'rmb_home_page_imprensa',
)));

 /**
*Info
**/
$wp_customize->add_setting('imprensa_info2', array(
	'default'           => '',
	'sanitize_callback' => 'rmb_home_page_imprensa',

));
$wp_customize->add_control(new Info_Custom_control($wp_customize, 'imprensa_info2', array(
	'label'    		=> esc_html__('Banner Extra', 'mytheme'),
	'description' 	=> esc_html__('A seguir voce verá todas as opçoes disponíveis para a alteração do Banner Extra da página.', 'mytheme'),
	'settings'		=> 'imprensa_info2',
	'section'  		=> 'rmb_home_page_imprensa',
)));

  /**
*Custom Checkbox
**/
$wp_customize->add_setting('imprensa_checkbox', array(
	'default'           => false,
));
$wp_customize->add_control(new Toggle_Checkbox_Custom_control($wp_customize, 'imprensa_checkbox', array(
	'label'    		=> esc_html__('Mostrar Banner Extra', 'mytheme'),
	'type'     		=> 'checkbox',
	'settings'		=> 'imprensa_checkbox',
    'section'  		=> 'rmb_home_page_imprensa',
)));

/**
 * BG
 */

$wp_customize->add_setting('banner__extra__BG', array(
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'absint'
));
    
$wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize,
    'banner__extra__BG', array(
    'section' => 'rmb_home_page_imprensa',
    'settings' => 'banner__extra__BG',
    'label' => __( 'Background - Banner Extra' ),
    'width' => 1920,
    'height' => 813,
    'flex_width' => false,
    'flex_height' => false,
    )
));

/**
 * Titulo Banner Extra
 */

$imprensalinkhead = [
    'section'     => 'rmb_home_page_imprensa',
    'settings'    =>  'imprensa__bannerextra__title',
    'classe'      => 'control',
    'description' => 'Informe um Titulo para o Banner Extra',
    'label'       => 'Titulo - Banner Extra',
    'type'        => 'text',
    'selector'    =>  '.imprensa__bannerextra-title h1',
    'callbackecho' => function () {
        echo nl2br(get_theme_mod('imprensa__bannerextra__title'));
    },
    'transport'   => 'postMessage'
];

Rmb_control($imprensalinkhead, $wp_customize);

/**
 * Blocos Banner Extra
 */


 for ($i=0; $i < 4; $i++) { 
    /**
    *Separator
    **/
    $wp_customize->add_setting('separator_imprensa_'.$i, array(
        'default'           => '',
        'sanitize_callback' => 'esc_html',
    ));
    $wp_customize->add_control(new Separator_Custom_control($wp_customize, 'separator_imprensa_'.$i, array(
        'settings'		=> 'separator_imprensa',
        'section'  		=> 'rmb_home_page_imprensa',
    )));

    

    $bnexblocktitle = [
        'section'     => 'rmb_home_page_imprensa',
        'settings'    =>  'imprensa__bannerextra__bloco_'.$i,
        'classe'      => 'control',
        'description' => 'Informe um Titulo para o Bloco de número '.($i + 1).' Banner Extra',
        'label'       => 'Titulo Bloco '.($i + 1).' - Banner Extra',
        'type'        => 'text',
        'selector'    =>  '.block__bnex_'.$i.' > h3',
        'callbackecho' => function () use ($i){
            echo nl2br(get_theme_mod('imprensa__bannerextra__bloco_'.$i));
        },
        'transport'   => 'postMessage'
    ];
    
    Rmb_control($bnexblocktitle, $wp_customize);

    $imprensalinkhead = [
        'section'     => 'rmb_home_page_imprensa',
        'settings'    =>  'imprensa__bannerextra__contenbloco_'.$i,
        'classe'      => 'control',
        'description' => 'Informe o conteúdo para o Bloco de número '.($i + 1).' Banner Extra',
        'label'       => 'Texto Bloco '.($i + 1).' - Banner Extra',
        'type'        => 'textarea',
        'selector'    =>  '.block__bnex_'.$i.' > article',
        'callbackecho' => function () use ($i){
            echo nl2br(get_theme_mod('imprensa__bannerextra__contenbloco_'.$i));
        },
        'transport'   => 'postMessage'
    ];
    
    Rmb_control($imprensalinkhead, $wp_customize);
 }

 /**
  * Marcas
  */

   /**
*Separator
**/
$wp_customize->add_setting('separator_imprensa-marcas', array(
	'default'           => '',
	'sanitize_callback' => 'esc_html',
));
$wp_customize->add_control(new Separator_Custom_control($wp_customize, 'separator_imprensa-marcas', array(
	'settings'		=> 'separator_imprensa-marcas',
	'section'  		=> 'rmb_home_page_imprensa',
)));

 /**
*Info
**/
$wp_customize->add_setting('imprensa_info_marcs', array(
	'default'           => '',
	'sanitize_callback' => 'rmb_home_page_imprensa',

));
$wp_customize->add_control(new Info_Custom_control($wp_customize, 'imprensa_info_marcs', array(
	'label'    		=> esc_html__('Parceiros', 'mytheme'),
	'description' 	=> esc_html__('A seguir voce verá todas as opçoes disponíveis para a exibição de seus parceiros.', 'mytheme'),
	'settings'		=> 'imprensa_info_marcs',
	'section'  		=> 'rmb_home_page_imprensa',
)));

  $imprensalinkhead = [
    'section'     => 'rmb_home_page_imprensa',
    'settings'    =>  'imprensa__marcs_title',
    'classe'      => 'control',
    'description' => 'Informe um Titulo para o campo de parcerias',
    'label'       => 'Titulo - Parceiros',
    'type'        => 'text',
    'selector'    =>  '.imprensa__marcas-title h2',
    'callbackecho' => function () {
        echo nl2br(get_theme_mod('imprensa__marcs_title'));
    },
    'transport'   => 'postMessage'
];

Rmb_control($imprensalinkhead, $wp_customize);

$imprensalinkhead = [
    'section'     => 'rmb_home_page_imprensa',
    'settings'    =>  'imprensa__marcs_desc',
    'classe'      => 'control',
    'description' => 'Informe uma Descrição para o campo de parcerias',
    'label'       => 'Descrição - Parceiros',
    'type'        => 'textarea',
    'selector'    =>  '.imprensa__marcas-title small',
    'callbackecho' => function () {
        echo nl2br(get_theme_mod('imprensa__marcs_desc'));
    },
    'transport'   => 'postMessage'
];

Rmb_control($imprensalinkhead, $wp_customize);

/**
 * Page Imprensa
 * Section: rmb_home_page_imprensa
 * Galeria Parceiros
 */

$argsmembertitle = [
    'section'     => 'rmb_home_page_imprensa',
    'settings'    =>  'imprensa_galery',
    'classe'      => 'partner',
    'description' => 'Selecione as logo de Seus parceiros',
    'label'       => 'Parceiros',
    'type'        => 'multiple',
    'transport'   => 'refresh'
];

Rmb_control($argsmembertitle, $wp_customize);

/**
 * Infos Contato
 */

/**
*Separator
**/
$wp_customize->add_setting('separator_imprensa_contact', array(
	'default'           => '',
	'sanitize_callback' => 'esc_html',
));
$wp_customize->add_control(new Separator_Custom_control($wp_customize, 'separator_imprensa_contact', array(
	'settings'		=> 'separator_imprensa_contact',
	'section'  		=> 'rmb_home_page_imprensa',
)));

 /**
*Info
**/
$wp_customize->add_setting('imprensa_contact', array(
	'default'           => '',
	'sanitize_callback' => 'rmb_home_page_imprensa',

));
$wp_customize->add_control(new Info_Custom_control($wp_customize, 'imprensa_contact', array(
	'label'    		=> esc_html__('Contato', 'mytheme'),
	'description' 	=> esc_html__('A seguir voce verá todas as opçoes disponíveis para as informações de contato.', 'mytheme'),
	'settings'		=> 'imprensa_contact',
	'section'  		=> 'rmb_home_page_imprensa',
)));

 /**
  * Titulo Informação de Contato
  */

Rmb_control([
    'section'     => 'rmb_home_page_imprensa',
    'settings'    =>  'info_contact_blocktitle',
    'classe'      => 'control',
    'description' => 'Informe um para o conjunto de blocos',
    'label'       => 'Titulo',
    'type'        => 'text',
    'container_inclusive' => true,
    'selector'    => '.imprensa__blocks-title h1',
    'transport'   => 'postMessage',
    'callbackecho' => 'fn_info_contact_blocktitle'
], $wp_customize);



 /**
* Endereço
**/
$wp_customize->add_setting('imprensa_contact_end', array(
	'default'           => '',
	'sanitize_callback' => 'rmb_home_page_imprensa',

));
$wp_customize->add_control(new Info_Custom_control($wp_customize, 'imprensa_contact_end', array(
	'label'    		=> esc_html__('Endereço', 'mytheme'),
	'description' 	=> esc_html__('Informações do bloco de Endereço.', 'mytheme'),
	'settings'		=> 'imprensa_contact_end',
	'section'  		=> 'rmb_home_page_imprensa',
)));

/**
 * Icone de endereço
 */

$wp_customize->add_setting('imprensa__end_ico', array(
	'default'           => '',

));

$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'imprensa__end_ico', array(
    'label' => __( 'Ícone (Image PNG)' ),
    'section' => 'rmb_home_page_imprensa',
    'mime_type' => 'image',
    'settings' => 'imprensa__end_ico'
) ) );


 /**
  * Titulo Informação de Contato
  */



Rmb_control([
    'section'     => 'rmb_home_page_imprensa',
    'settings'    =>  'info_contact_1_title',
    'classe'      => 'control',
    'description' => 'Informe um titulo para o bloco de contato de Endereço',
    'label'       => 'Titulo - Endereço',
    'type'        => 'text',
    'selector'    => '.imprensa__contact_block_1 header',
    'transport'   => 'postMessage',
    'callbackecho' => 'fn_info_contact_1_title'
], $wp_customize);

 /**
 * Page Imprensa
 * Section: rmb_home_page_imprensa
 * Endereço Contato
 */



Rmb_control([
    'section'     => 'rmb_home_page_imprensa',
    'settings'    =>  'info_contact_1',
    'classe'      => 'control',
    'description' => 'Informe o endereço de sua empresa',
    'label'       => 'Endereço',
    'type'        => 'textarea',
    'selector'    => '.imprensa__contact_block_1 article',
    'transport'   => 'postMessage',
    'callbackecho' => 'fn_info_contact_1_title'
], $wp_customize);


/**
 * Informaçoes como
 * E-mail
 * Telefone
 */

/**
 *Separator
 **/
$wp_customize->add_setting('separator_imprensa_contact_info', array(
	'default'           => '',
	'sanitize_callback' => 'esc_html',
));
$wp_customize->add_control(new Separator_Custom_control($wp_customize, 'separator_imprensa_contact_info', array(
	'settings'		=> 'separator_imprensa_contact_info',
	'section'  		=> 'rmb_home_page_imprensa',
)));

/**
 *Info
 **/
$wp_customize->add_setting('imprensa_contact_info', array(
	'default'           => '',
	'sanitize_callback' => 'rmb_home_page_imprensa',

));
$wp_customize->add_control(new Info_Custom_control($wp_customize, 'imprensa_contact_info', array(
	'label'    		=> esc_html__('Informações', 'mytheme'),
	'description' 	=> esc_html__('Ensira informações para contato com sua empresa nos campos á seguir.', 'mytheme'),
	'settings'		=> 'imprensa_contact_info',
	'section'  		=> 'rmb_home_page_imprensa',
)));

 /**
 * Icone de endereço
 */

$wp_customize->add_setting('imprensa__info_ico', array(
	'default'           => '',

));

$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'imprensa__info_ico', array(
    'label' => __( 'Ícone (Image PNG)' ),
    'section' => 'rmb_home_page_imprensa',
    'mime_type' => 'image',
    'settings' => 'imprensa__info_ico'
) ) );


 /**
  * Titulo Informação de Contato
  */

Rmb_control([
    'section'     => 'rmb_home_page_imprensa',
    'settings'    =>  'info_contact_info_title',
    'classe'      => 'control',
    'description' => 'Informe um titulo para o bloco de contato de Informações',
    'label'       => 'Titulo - Informações',
    'type'        => 'text',
    'selector'    => '.imprensa__contact_block_2 header',
    'transport'   => 'postMessage',
    'callbackecho' => 'fn_info_contact_info_title'
], $wp_customize);

 /**
 * Page Imprensa
 * Section: rmb_home_page_imprensa
 * Fone e mensagem
 */


Rmb_control([
    'section'     => 'rmb_home_page_imprensa',
    'settings'    =>  'info_contact_info',
    'classe'      => 'control',
    'description' => 'Informe o número de contato e uma mensagem a ser exibida',
    'label'       => 'Telefone e mensagem',
    'type'        => 'textarea',
    'selector'    => '.imprensa__contact_block_2 article',
    'transport'   => 'postMessage',
    'callbackecho' => 'fn_info_contact_info'
], $wp_customize);

 /**
  * E-mail
  */

Rmb_control([
    'section'     => 'rmb_home_page_imprensa',
    'settings'    =>  'info_contact_info_mail',
    'classe'      => 'control',
    'description' => 'Informe um e-mail para contato com sua empresa',
    'label'       => 'E-mail - Informações',
    'type'        => 'text',
    'selector'    => '.imprensa__contact_block_2 footer',
    'transport'   => 'postMessage',
    'callbackecho' => 'fn_info_contact_info_mail'
], $wp_customize);


/**
 * Kit de imprensa
 * Opções para baixar o kit de imprensa
 */

 /**
 *Separator
 **/
$wp_customize->add_setting('separator_imprensa_contact_info_imprens', array(
	'default'           => '',
	'sanitize_callback' => 'esc_html',
));
$wp_customize->add_control(new Separator_Custom_control($wp_customize, 'separator_imprensa_contact_info_imprens', array(
	'settings'		=> 'separator_imprensa_contact_info_imprens',
	'section'  		=> 'rmb_home_page_imprensa',
)));

/**
 *Info
 **/
$wp_customize->add_setting('imprensa_contact_imprensinfo', array(
	'default'           => '',
	'sanitize_callback' => 'rmb_home_page_imprensa',

));
$wp_customize->add_control(new Info_Custom_control($wp_customize, 'imprensa_contact_imprensinfo', array(
	'label'    		=> esc_html__('Kit de Imprensa', 'mytheme'),
	'description' 	=> esc_html__('Ensira informações para acesso ao Kit de Imprensa.', 'mytheme'),
	'settings'		=> 'imprensa_contact_imprensinfo',
	'section'  		=> 'rmb_home_page_imprensa',
)));

 /**
 * Icone de endereço
 */

$wp_customize->add_setting('imprensa__info_ico_kit', array(
	'default'           => '',

));

$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'imprensa__info_ico_kit', array(
    'label' => __( 'Ícone (Image PNG)' ),
    'section' => 'rmb_home_page_imprensa',
    'mime_type' => 'image',
    'settings' => 'imprensa__info_ico_kit'
) ) );


 /**
  * Titulo Informação de Contato
  */

Rmb_control([
    'section'     => 'rmb_home_page_imprensa',
    'settings'    =>  'info_contact_kit_imprensa_title',
    'classe'      => 'control',
    'description' => 'Informe um titulo para o bloco de kit de emprensa',
    'label'       => 'Titulo - Imprensa',
    'type'        => 'text',
    'selector'    => '.imprensa__contact_block_3 header',
    'transport'   => 'postMessage',
    'callbackecho' => 'fn_info_contact_kit_imprensa_title'
], $wp_customize);

 /**
 * Page Imprensa
 * Section: rmb_home_page_imprensa
 * Fone e mensagem
 */

Rmb_control([
    'section'     => 'rmb_home_page_imprensa',
    'settings'    =>  'info_contact_kit_imprensa_link_text',
    'classe'      => 'control',
    'description' => 'Informe o texto do link para o kit de imprensa',
    'label'       => 'Texto do link',
    'type'        => 'text',
    'selector'    => '.imprensa__contact_block_3 a',
    'transport'   => 'postMessage',
    'callbackecho' => 'fn_info_contact_kit_imprensa_link_text'
], $wp_customize);

Rmb_control([
    'section'     => 'rmb_home_page_imprensa',
    'settings'    =>  'info_contact_kit_imprensa_link',
    'classe'      => 'control',
    'description' => 'Informe o link para o kit de imprensa',
    'label'       => 'Link',
    'type'        => 'text',
    'transport'   => 'refresh',
], $wp_customize);

Rmb_control([
    'section'     => 'rmb_home_page_imprensa',
    'settings'    =>  'info_contact_kit_imprensa_content',
    'classe'      => 'control',
    'description' => 'Informe o conteúdo do bloco de kit de imprensa',
    'label'       => 'Conteúdo',
    'type'        => 'textarea',
    'selector'    => '.imprensa__contact_block_3 article',
    'transport'   => 'postMessage',
    'callbackecho' => 'fn_info_contact_kit_imprensa_content'
], $wp_customize);



