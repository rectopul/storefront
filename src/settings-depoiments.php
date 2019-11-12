<?php
/**
 * Section Page  - Depoimentos
 * Panel: rmb_panel_pages
 */
$wp_customize->add_section('rmb_home_page_depoiments', array(
    'title'    => __('Depoimentos', 'themename'),
    'description' => 'Edite as informações da página Depoimentos',
    'priority' => 6,
    'panel'            => 'rmb_panel_pages'
));

$argsmembertitle = [
    'section'     => 'rmb_home_page_depoiments',
    'settings'    =>  'depoiments__pagetitle',
    'classe'      => 'control',
    'description' => 'Informe uma titulo para a página Depoimentos',
    'label'       => 'Titulo',
    'type'        => 'textarea',
    'selector'    =>  '.depoiments__pagetitle h2',
    'callbackecho' => function () {
        echo nl2br(get_theme_mod('depoiments__pagetitle'));
    },
    'transport'   => 'postMessage'
];

Rmb_control($argsmembertitle, $wp_customize);