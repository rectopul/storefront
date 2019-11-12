<?php
/**
 * Page Trabalhe Conosco
 * Section: rmb_home_page_trabcom
 * Saudation
 */

 /**
 * Section Page  - Trabalhe conosco
 * Panel: rmb_panel_pages
 */
$wp_customize->add_section('rmb_home_page_trabcom', array(
    'title'    => __('Trabalhe Conosco', 'themename'),
    'description' => 'Edite as informações da página Trabalhe Conosco!',
    'priority' => 4,
    'panel'            => 'rmb_panel_pages'
));

$argsmembertitle = [
    'section'     => 'rmb_home_page_trabcom',
    'settings'    =>  'trabcom__saudation',
    'classe'      => 'control',
    'description' => 'Informe uma saudação para ser exibida na página Trabalhe Conosco!',
    'label'       => 'Saudação',
    'type'        => 'textarea',
    'selector'    =>  '.page__header h6',
    'callbackecho' => function () {
        echo nl2br(get_theme_mod('trabcom__saudation'));
    },
    'transport'   => 'postMessage'
];

Rmb_control($argsmembertitle, $wp_customize);

/**
 * Page Trabalhe Conosco
 * Section: rmb_home_page_trabcom
 * Title
 */

$argsmembertitle = [
    'section'     => 'rmb_home_page_trabcom',
    'settings'    =>  'trabcom__title',
    'classe'      => 'control',
    'description' => 'Informe um Texto para ser exibido na página Trabalhe Conosco',
    'label'       => 'Titulo',
    'type'        => 'textarea',
    'selector'    =>  '.page__header h2',
    'callbackecho' => function () {
        echo nl2br(get_theme_mod('trabcom__title'));
    },
    'transport'   => 'postMessage'
];

Rmb_control($argsmembertitle, $wp_customize);

/**
 * Page Trabalhe Conosco
 * Section: rmb_home_page_trabcom
 * Subtitulo
 */

$argsmembertitle = [
    'section'     => 'rmb_home_page_trabcom',
    'settings'    =>  'trabcom__tsubitle',
    'classe'      => 'control',
    'description' => 'Informe um Subtitulo para ser exibido na página Trabalhe Conosco',
    'label'       => 'Subtitulo',
    'type'        => 'textarea',
    'selector'    =>  '.page__header h4',
    'callbackecho' => function () {
        echo nl2br(get_theme_mod('trabcom__tsubitle'));
    },
    'transport'   => 'postMessage'
];

Rmb_control($argsmembertitle, $wp_customize);

/**
 * Page Trabalhe Conosco
 * Section: rmb_home_page_trabcom
 * Tituli Conteúdo
 */

$argsmembertitle = [
    'section'     => 'rmb_home_page_trabcom',
    'settings'    =>  'trabcom__contenttitle',
    'classe'      => 'control',
    'description' => 'Informe um Titulo  para ser exibido na página Trabalhe Conosco na parte de conteúdo',
    'label'       => 'Titulo do Conteúdo',
    'type'        => 'textarea',
    'selector'    =>  '.page__content-title > h3',
    'callbackecho' => function () {
        echo nl2br(get_theme_mod('trabcom__contenttitle'));
    },
    'transport'   => 'postMessage'
];

Rmb_control($argsmembertitle, $wp_customize);

/**
 * Page Trabalhe Conosco
 * Section: rmb_home_page_trabcom
 * Descrição do Conteúdo
 */

$argsmembertitle = [
    'section'     => 'rmb_home_page_trabcom',
    'settings'    =>  'trabcom__desccontent',
    'classe'      => 'control',
    'description' => 'Informe um descrição  para ser exibido na página Trabalhe Conosco na parte de conteúdo',
    'label'       => 'Descrição do Conteúdo',
    'type'        => 'textarea',
    'selector'    =>  '.page__content-title > h4',
    'callbackecho' => function () {
        echo nl2br(get_theme_mod('trabcom__desccontent'));
    },
    'transport'   => 'postMessage'
];

Rmb_control($argsmembertitle, $wp_customize);

/**
 * Page Trabalhe Conosco
 * Section: rmb_home_page_trabcom
 * Texto do Botão
 */

$argsmembertitle = [
    'section'     => 'rmb_home_page_trabcom',
    'settings'    =>  'trabcom__text_button',
    'classe'      => 'control',
    'description' => 'Informe o texto do botão para o formulário',
    'label'       => 'Texto do Botão',
    'type'        => 'text',
    'selector'    =>  '.trabbuttom',
    'callbackecho' => function () {
        echo nl2br(get_theme_mod('trabcom__text_button'));
    },
    'transport'   => 'postMessage'
];

Rmb_control($argsmembertitle, $wp_customize);

//partner

/**
 * Page Trabalhe Conosco
 * Section: rmb_home_page_trabcom
 * Galeria
 */

$argsmembertitle = [
    'section'     => 'rmb_home_page_trabcom',
    'settings'    =>  'trabcom__galery',
    'classe'      => 'partner',
    'description' => 'Selecione as imagens da galeria da página. Recomendamos que use imagens nos tamanhos 1290X427',
    'label'       => 'Galeria',
    'type'        => 'multiple',
    'selector'    =>  '.galery__trabcom',
    'callbackecho' => function () {
        echo nl2br(get_theme_mod('trabcom__galery'));
    },
    'transport'   => 'postMessage'
];

Rmb_control($argsmembertitle, $wp_customize);

/**
 * Page Trabalhe Conosco
 * Section: rmb_home_page_trabcom
 * Titulo Informações da página
 */

$argsmembertitle = [
    'section'     => 'rmb_home_page_trabcom',
    'settings'    =>  'trabcom__titleinfo',
    'classe'      => 'control',
    'description' => 'Informe um titulo para a parte de informações da página',
    'label'       => 'Titulo - Informações',
    'type'        => 'textarea',
    'selector'    =>  '.page__info_title h3',
    'callbackecho' => function () {
        echo nl2br(get_theme_mod('trabcom__titleinfo'));
    },
    'transport'   => 'postMessage'
];

Rmb_control($argsmembertitle, $wp_customize);

/**
 * Page Trabalhe Conosco
 * Section: rmb_home_page_trabcom
 * Itens de informação da página
 */

$argsmembertitle = [
    'section'     => 'rmb_home_page_trabcom',
    'settings'    =>  'trabcom__titleinfo-blocks',
    'classe'      => 'imagetext',
    'description' => 'Acrescente blocos com pequenas informações á página',
    'label'       => 'Bloco - Informações',
    'type'        => 'multiple',
    'selector'    =>  '.info_title',
    'callbackecho' => function () {
        echo nl2br(get_theme_mod('trabcom__titleinfo'));
    },
    'transport'   => 'postMessage'
];

Rmb_control($argsmembertitle, $wp_customize);

/**
 * Page Trabalhe Conosco
 * Section: rmb_home_page_trabcom
 * Banner Extra Titulo
 */

$argsmembertitle = [
    'section'     => 'rmb_home_page_trabcom',
    'settings'    =>  'trabcom__bannex-title',
    'classe'      => 'control',
    'description' => 'Informe um titulo para o Banner Extra',
    'label'       => 'Banner Extra - Titulo',
    'type'        => 'textarea',
    'selector'    =>  '.page__bannerextra-title h3',
    'callbackecho' => function () {
        echo nl2br(get_theme_mod('trabcom__bannex-title'));
    },
    'transport'   => 'postMessage'
];

Rmb_control($argsmembertitle, $wp_customize);

/**
 * Page Trabalhe Conosco
 * Section: rmb_home_page_trabcom
 * Banner Extra Descrição
 */

$argsmembertitle = [
    'section'     => 'rmb_home_page_trabcom',
    'settings'    =>  'trabcom__bannex-desc',
    'classe'      => 'control',
    'description' => 'Informe uma descrição para o Banner Extra',
    'label'       => 'Banner Extra - Descrição',
    'type'        => 'textarea',
    'selector'    =>  '.page__bannerextra-title h6',
    'callbackecho' => function () {
        echo nl2br(get_theme_mod('trabcom__bannex-desc'));
    },
    'transport'   => 'postMessage'
];

Rmb_control($argsmembertitle, $wp_customize);

/**
 * Page Trabalhe Conosco
 * Section: rmb_home_page_trabcom
 * Banner Extra informação - 1
 */

$argsmembertitle = [
    'section'     => 'rmb_home_page_trabcom',
    'settings'    =>  'trabcom__bannex-info1',
    'classe'      => 'control',
    'description' => 'Ensira informações extras no Banner Extra',
    'label'       => 'Banner Extra - Informação 1',
    'type'        => 'textarea',
    'selector'    =>  '.inf-1',
    'callbackecho' => function () {
        echo nl2br(get_theme_mod('trabcom__bannex-info1'));
    },
    'transport'   => 'postMessage'
];

Rmb_control($argsmembertitle, $wp_customize);

/**
 * Page Trabalhe Conosco
 * Section: rmb_home_page_trabcom
 * Banner Extra informação - 2
 */

$argsmembertitle = [
    'section'     => 'rmb_home_page_trabcom',
    'settings'    =>  'trabcom__bannex-info2',
    'classe'      => 'control',
    'description' => 'Ensira informações extras no Banner Extra',
    'label'       => 'Banner Extra - Informação 2',
    'type'        => 'textarea',
    'selector'    =>  '.inf-2',
    'callbackecho' => function () {
        echo nl2br(get_theme_mod('trabcom__bannex-info2'));
    },
    'transport'   => 'postMessage'
];

Rmb_control($argsmembertitle, $wp_customize);

/**
 * Page Trabalhe Conosco
 * Section: rmb_home_page_trabcom
 * Banner Extra informação - 3
 */

$argsmembertitle = [
    'section'     => 'rmb_home_page_trabcom',
    'settings'    =>  'trabcom__bannex-info3',
    'classe'      => 'control',
    'description' => 'Ensira informações extras no Banner Extra',
    'label'       => 'Banner Extra - Informação 3',
    'type'        => 'textarea',
    'selector'    =>  '.inf-3',
    'callbackecho' => function () {
        echo nl2br(get_theme_mod('trabcom__bannex-info3'));
    },
    'transport'   => 'postMessage'
];

Rmb_control($argsmembertitle, $wp_customize);

/**
 * Page Trabalhe Conosco
 * Section: rmb_home_page_trabcom
 * Banner Extra Imagem
 */
$bannextraimage = [
    'label'       => __( 'Background Banner Extra - 1' ),
    'section'     => 'rmb_home_page_trabcom',
    'classe'      => 'media',
    'mime_type'   => 'image',
    'settings'    => 'background_bannerextra1',
];

$wp_customize->add_setting('background_bannerextra1', []);

$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'banerextra_control', $bannextraimage) );

/**
 * Servicços oferecidos
 */

$argsmembertitle = [
    'section'     => 'rmb_home_page_trabcom',
    'settings'    =>  'trabcom__services',
    'classe'      => 'imagetext',
    'description' => 'Informe alguns dos serviços oferecidos pela empresa',
    'label'       => 'Bloco - Servicos Oferecidos',
    'type'        => 'multiple',
    'selector'    =>  '.info_title',
    'callbackecho' => function () {
        echo nl2br(get_theme_mod('trabcom__services'));
    },
    'transport'   => 'postMessage'
];

Rmb_control($argsmembertitle, $wp_customize);