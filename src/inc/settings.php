<?php
/**
 * Function Custom Controls Automatic
 */
function Rmb_control($arguments, $wp_customize)
{   
    if($arguments['classe'] === 'cat'):
        /**
         * Category control
         */
    
        $wp_customize->add_setting($arguments['settings'], array(
            'default'        => ''
        ));
        $wp_customize->add_control( $arguments['settings'] . 'control', array(
            'settings' => $arguments['settings'],
            'label'   => __($arguments['label'], 'auaha'),
            'section'  => $arguments['section'],
            'type'    => $arguments['type'] ?: '',
            'choices' => $arguments['choices'],
        ));
    else :
        
        $setings = [];
        if($arguments['default']) $setings['default'] = $arguments['default'];
        if($arguments['set_type']) $setings['set_type'] = $arguments['set_type'];
        if($arguments['capability']) $setings['capability'] = $arguments['capability'];
        if($arguments['theme_supports']) $setings['theme_supports'] = $arguments['theme_supports'];
        if($arguments['transport']) $setings['transport'] = $arguments['transport'];
        if($arguments['sanitize_callback']) $setings['sanitize_callback'] = $arguments['sanitize_callback'];
        if($arguments['settingtype']) $setings['type'] = $arguments['settingtype'];
        $wp_customize->add_setting($arguments['settings'],$setings);

        $classe = '';
        if($arguments['classe']){
            if ($arguments['classe'] == 'control') {
                $classe = 'WP_Customize_Control';
            } elseif($arguments['classe'] == 'multimages'){
                $classe = 'WP_Dynamic_Image';
            } elseif ($arguments['classe'] == 'image') {
                $classe = 'WP_Customize_Image_Control';
            } elseif ($arguments['classe'] == 'partner') {
                $classe = 'WP_Dynamic_Partners';
            }elseif($arguments['classe'] == 'upload'){
                $classe = 'WP_Customize_Upload_Control';
            }elseif( $arguments['classe'] = 'imagetext'){
                $classe = 'WP_Dynamic_Image_Text';
            } elseif ($arguments['classe'] == 'media') {
                $classe = 'WP_Customize_Media_Control';
            } elseif ($arguments['classe'] == 'tiny') {
                $classe = 'Skyrocket_TinyMCE_Custom_control';
            }

            $customcontrol = [];
            if($arguments['choices']) $customcontrol['choices'] = $arguments['choices'];
            if($arguments['label']) $customcontrol['label'] = $arguments['label'];
            if($arguments['description']) $customcontrol['description'] = $arguments['description'];
            if($arguments['section']) $customcontrol['section'] = $arguments['section'];
            if($arguments['settings']) $customcontrol['settings'] = $arguments['settings'];
            if($arguments['type']) $customcontrol['type'] = $arguments['type'];
            if($arguments['input_attrs']) $customcontrol['attinput_attrsr'] = $arguments['input_attrs'];
            if($arguments['mime_type']) $customcontrol['mime_type'] = $arguments['mime_type'];

            $wp_customize->add_control(new $classe(
                $wp_customize,
                $arguments['settings'],$customcontrol
            ));
        }else{
            $customcontrol = [];
            //choices
            if($arguments['choices']) $customcontrol['choices'] = $arguments['choices'];
            if($arguments['label']) $customcontrol['label'] = $arguments['label'];
            if($arguments['description']) $customcontrol['description'] = $arguments['description'];
            if($arguments['section']) $customcontrol['section'] = $arguments['section'];
            if($arguments['settings']) $customcontrol['settings'] = $arguments['settings'];
            if($arguments['type']) $customcontrol['type'] = $arguments['type'];
            if($arguments['attr']) $customcontrol['attr'] = $arguments['attr'];
            if($arguments['mime_type']) $customcontrol['mime_type'] = $arguments['mime_type'];
            $wp_customize->add_control($arguments['settings'] . 'control', $customcontrol);
        }

        $wp_customize->get_setting($arguments['settings'])->transport = $arguments['transport'];
        $partial = [
            'fallback_refresh' => false
        ];
        if($arguments['selector']) $partial['selector'] = $arguments['selector'];
        if($arguments['callbackecho']) $partial['render_callback'] = $arguments['callbackecho'];
        if($arguments['settings']) $partial['settings'] = $arguments['settings'];
        if($arguments['container_inclusive']) $partial['container_inclusive'] = $arguments['container_inclusive'];
    
        if ($arguments['selector']) :
            $wp_customize->selective_refresh->add_partial(
                $arguments['settings'].'_partial',$partial);
        endif;
    endif;
    
}
/**
 * Used by hook: 'customize_preview_init'
 * 
 * @see add_action('customize_preview_init',$func)
 */
function mytheme_customizer_live_preview()
{
    wp_enqueue_script(
        'customizer_theme',            //Give the script an ID
        get_template_directory_uri() . '/assets/js/theme-customizer.js', //Point to file
        array('jquery', 'customize-preview'),    //Define dependencies
        '',                        //Define a version (optional) 
        true                        //Put script in footer?
    );
}
add_action('customize_preview_init', 'mytheme_customizer_live_preview');

/**
 * Enqueue the stylesheet.
 */
function my_enqueue_customizer_stylesheet()
{

    wp_register_style('customizer-controllers', get_template_directory_uri() . '/assets/css/customizer.css', NULL, NULL, 'all');
    wp_enqueue_style('customizer-controllers');
}
add_action('customize_controls_print_styles', 'my_enqueue_customizer_stylesheet');

/**
 * Check has function rmb_customize_register
 */
if (!function_exists('rmb_customize_register')) {
    function rmb_customize_register($wp_customize)
    {
        $categories = get_categories();
        $cats = [];
        $i = 0;
        foreach($categories as $category){
            if($i==0){
                $default = $category->slug;
                $i++;
            }
            $cats[$category->slug] = $category->name;
        }
        /**
         * Custom Controls function
         * Register your custom control in this function
         */

        /**
         * Pannel
         * add this panel ih here
         */
        $wp_customize->add_panel('rmb_panel_theme', array(
            'priority'       => 2,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => 'Opçoes do tema',
            'description'    => 'Este e o painel para as alteraços de campos customizaveis do tema',
        ));

        $wp_customize->add_panel('rmb_panel_banners', array(
            'priority'       => 3,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => 'Banners',
            'description'    => 'Edite os banners extras da página inicial de seu tema',
        ));


        $wp_customize->add_panel('rmb_panel_vitrines', array(
            'priority'       => 3,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => 'Gerenciamento das Vitrines',
            'description'    => 'Este painel tem como objetivo ajuda-lo a configurar a exibição de suas vitrines Oberve as opções e configure de acordo com o que deseja',
        ));

        $wp_customize->add_panel('rmb_panel_pages', array(
            'priority'       => 4,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => 'Informações das Páginas',
            'description'    => 'Este painel tem como objetivo editar algumas informações de algumas páginas. Confira os campos e as orientações contidas para uma boa utilização',
        ));

        /**
         * Section Page  - Compromisso
         * Panel: rmb_panel_pages
         */
        $wp_customize->add_section('rmb_home_page_comprom', array(
            'title'    => __('Compromisso', 'themename'),
            'description' => 'Edite as informações da página de compromisso!',
            'priority' => 4,
            'panel'            => 'rmb_panel_pages'
        ));

        /**
         * Controls Page - Trabalhe Conosco
         *
         * Section Page  - Trabalhe conosco
         * Panel: rmb_panel_pages
         */
        $wp_customize->add_section('rmb_home_page_trabcom', array(
            'title'    => __('Trabalhe Conosco', 'themename'),
            'description' => 'Edite as informações da página Trabalhe Conosco!',
            'priority' => 4,
            'panel'            => 'rmb_panel_pages'
        ));
        require get_template_directory() . '/inc/settings-recomende.php';
        require get_template_directory() . '/inc/settings-trabalheconosco.php';
        require get_template_directory() . '/inc/settings-membros.php';
        require get_template_directory() . '/settings-depoiments.php';
        require get_template_directory() . '/inc/settings-imprensa.php';
        require get_template_directory() . '/inc/settings-parceiros.php';
        


        /**
         * Section ajuda Homepage
         * panel: rmb_panel_theme
         */
        $wp_customize->add_section('rmb_home_help', array(
            'title'    => __('Central de Ajuda', 'themename'),
            'description' => 'Edite as informações da central de ajuda exibida na homepage',
            'priority' => 4,
            'panel'            => 'rmb_panel_theme'
        ));


        /**
         * Section Vitrine - 1
         * Panel: rmb_panel_vitrines
         */
        $wp_customize->add_section('rmb_vitrine_1', array(
            'title'    => __('Primeira Vitrine', 'themename'),
            'description' => 'Edite as informações da primera vitrine aparente',
            'priority' => 1,
            'panel'            => 'rmb_panel_vitrines'
        ));

        /**
         * Section Vitrine - 2
         * Panel: rmb_panel_vitrines
         */
        $wp_customize->add_section('rmb_vitrine_2', array(
            'title'    => __('Segunda Vitrine', 'themename'),
            'description' => 'Edite as informações da Segunda vitrine aparente',
            'priority' => 1,
            'panel'            => 'rmb_panel_vitrines'
        ));

        /**
         * Section Homepage
         * Sections in homepage
         */
        $wp_customize->add_section('rmb_sobre', array(
            'title'    => __('Dicas', 'themename'),
            'description' => 'Edição com informaçoes sobre a empresa',
            'priority' => 1,
            'panel'            => 'rmb_panel_theme'
        ));

        /**
         * Section Como é o processo
         * Sections in Como é o processo
         */
        $wp_customize->add_section('rmb_whyprocess', array(
            'title'    => __('Processo', 'themename'),
            'description' => 'Edição com informaçoes sobre como é o processo de trabalho da empresa',
            'priority' => 1,
            'panel'            => 'rmb_panel_theme'
        ));

        /**
         * Section Números da empresa
         * Sections in Números da empresa
         */
        $wp_customize->add_section('rmb_numparter', array(
            'title'    => __('Números da empresa', 'themename'),
            'description' => 'Apresente números que representem resultados em sua empresa',
            'priority' => 2,
            'panel'            => 'rmb_panel_theme'
        ));

        /**
         * Section Postagens 2
         * panel: rmb_panel_theme
         */
        $wp_customize->add_section('rmb_vitrpost2', array(
            'title'    => __('Vitrine de post', 'themename'),
            'description' => 'Selecione a categoria de posts que será exibina na segunda vitrine de postagens',
            'priority' => 5,
            'panel'            => 'rmb_panel_theme'
        ));

        /**
         * Section Números da empresa
         * Sections in Números da empresa
         */
        $wp_customize->add_section('rmb_sec_indic', array(
            'title'    => __('Indicaçoes', 'themename'),
            'description' => 'Edite as informações dos posts do tipo Indicações',
            'priority' => 1,
            'panel'            => 'rmb_panel_cposts'
        ));

        /**
         * Section de Banners
         * panel: rmb_panel_banners
         */
        $wp_customize->add_section('rmb_banner1', array(
            'title'    => __('Banner 1', 'themename'),
            'description' => 'Mostrado apenas na área de trabalho este é o primeiro banner apresentado',
            'priority' => 1,
            'panel'            => 'rmb_panel_banners'
        ));

        /**
         * Section de Membros
         * panel: rmb_panel_banners
         */
        $wp_customize->add_section('rmb_members', array(
            'title'    => __('Membros', 'themename'),
            'description' => 'Painel para edição da apresentação de membros na home page',
            'priority' => 6,
            'panel'            => 'rmb_panel_theme'
        ));

        //cat__help-text
        $wp_customize->add_section('rmb_help_cat', array(
            'title'    => __('Ajuda', 'themename'),
            'description' => 'Painel para edição das informaçoes apresentadas nos blocos de ajuda',
            'priority' => 7,
            'panel'            => 'rmb_panel_theme'
        ));

        //Blog
        $wp_customize->add_section('rmb_mini_blog', array(
            'title'    => __('Ajuda', 'themename'),
            'description' => 'Painel para edição das informaçoes apresentadas nos blocos de ajuda',
            'priority' => 7,
            'panel'            => 'rmb_panel_theme'
        ));
        /**
         * Controls
         * Insert your controls in here
         * :set_type
         */

          /**
          * Cabeçado Ajuda
          * rmb_min_blog_text
          * section: rmb_mini_blog
          */
        // Andys Video Section
    $wp_customize->add_setting( 'rmb_bg_help',
    array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'absint',
                'type' => 'theme_mod',
    )
    );
    /**
     * Page compromisso
     * section: rmb_home_page_comprom
     */

    /**
     * Title Campo Ajuda
     */
    $argsmembertitle = [
        'section'     => 'rmb_home_page_comprom',
        'settings'    =>  'compromisso__saudation',
        'classe'      => 'control',
        'description' => 'Informe uma saudação para ser exibida na página de compromisso!',
        'label'       => 'Saudação',
        'type'        => 'textarea',
        'selector'    =>  '.page__saudation',
        'callbackecho' => function () {
            echo '<i class="lamp-idea"></i> <h2>'.nl2br(get_theme_mod('compromisso__saudation')).'</h2>';
        },
        'transport'   => 'postMessage'
    ];

    Rmb_control($argsmembertitle, $wp_customize);

    $argsmembertitle = [
        'section'     => 'rmb_home_page_comprom',
        'settings'    =>  'compromisso__submessage',
        'classe'      => 'control',
        'description' => 'Informe uma submensagem para a página de compromisso da empresa!',
        'label'       => 'Submensagem',
        'type'        => 'textarea',
        'selector'    =>  '.page__submessage',
        'callbackecho' => function () {
            echo nl2br(get_theme_mod('compromisso__submessage'));
        },
        'transport'   => 'postMessage'
    ];

    Rmb_control($argsmembertitle, $wp_customize);

    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'rmb_bg_help',
    array(
        'label' => __( 'Ajuda' ),
        'description' => esc_html__( 'Selecione a imagem de funco que será apresentada nas páginas de ajuda' ),
        'section' => 'header_image',
        'mime_type' => 'image',  // Required. Can be image, audio, video, application, text
        'button_labels' => array( // Optional
            'select' => __( 'Selecione a imagem' ),
            'change' => __( 'Trocar imagem' ),
            'default' => __( 'Default' ),
            'remove' => __( 'Remove' ),
            'placeholder' => __( 'Nenhum arquivo selecionado' ),
            'frame_title' => __( 'Selecione o arquivo' ),
            'frame_button' => __( 'Escolher arquivo' ),

        )
    )
    ) );
        /**
         * Titulo do Blog
         * section: rmb_home_help
        */
        Rmb_control(array(
            'section'     => 'static_front_page',
            'settings'    =>  'rmb_title_blog',
            'classe'      => 'control',
            'description' => 'Informe um titulo o Blog que será apresentado na parte superior',
            'label'       => 'Titulo do Blog',
            'type'        => 'textarea',
            'selector'    =>  '.blog__pagetitle',
            'callbackecho' => function () {
                echo nl2br(get_theme_mod('rmb_title_blog'));
            },
            'transport'   => 'postMessage'
        ), $wp_customize);

         

         //rmb_help_cat

         /**
          * Title Campo Ajuda
          */
          $argsmembertitle = [
            'section'     => 'rmb_help_cat',
            'settings'    =>  'hel_title',
            'classe'      => 'control',
            'description' => 'Informe um titulo do campo de ajuda apresentado em seu tema',
            'label'       => 'Titulo do Bloco de ajuda',
            'type'        => 'textarea',
            'selector'    =>  '.cat__help-text > h1',
            'callbackecho' => function () {
                echo nl2br(get_theme_mod('hel_title'));
            },
            'transport'   => 'postMessage'
        ];

        Rmb_control($argsmembertitle, $wp_customize);

        /**
          * Mini Blog
          * rmb_min_blog_text
          * section: rmb_mini_blog
          */
          $argsmembertitle = [
            'section'     => 'rmb_help_cat',
            'settings'    =>  'rmb_min_blog_text',
            'classe'      => 'control',
            'description' => 'Texto de apresentaçao do mini blog nas vitrines',
            'label'       => 'Texto de apresentação',
            'type'        => 'textarea',
            'selector'    =>  '.minblog__title > h1',
            'callbackecho' => function () {
                echo nl2br(get_theme_mod('rmb_min_blog_text'));
            },
            'transport'   => 'postMessage'
        ];

        Rmb_control($argsmembertitle, $wp_customize);

        /**
         * Text Campo de Ajuda
         */
        $argsmembertitle = [
            'section'     => 'rmb_help_cat',
            'settings'    =>  'hel_text',
            'classe'      => 'control',
            'description' => 'Informe um texto do campo de ajuda apresentado em seu tema',
            'label'       => 'Texto do Bloco de ajuda',
            'type'        => 'textarea',
            'selector'    =>  '.cat__help-text > article',
            'callbackecho' => function () {
                echo nl2br(get_theme_mod('hel_text'));
            },
            'transport'   => 'postMessage'
        ];

        Rmb_control($argsmembertitle, $wp_customize);

         /**
          * Titulo membros
          * section: rmb_members
          */

          $argsmembertitle = [
            'section'     => 'rmb_members',
            'settings'    =>  'rmb_member__desc',
            'classe'      => 'control',
            'description' => 'Informe um texto alternativo para a parte que exibe os membros de sua empresa',
            'label'       => 'Descrição bloco Membros',
            'type'        => 'textarea',
            'selector'    =>  '.equipehome__head small',
            'callbackecho' => function () {
                echo nl2br(get_theme_mod('rmb_member__desc'));
            },
            'transport'   => 'postMessage'
        ];

        Rmb_control($argsmembertitle, $wp_customize);

         /**
          * Titulo membros
          * section: rmb_members
          */

          $argsmembertitle = [
            'section'     => 'rmb_members',
            'settings'    =>  'rmb_member__title',
            'classe'      => 'control',
            'description' => 'Informe um titulo para a parte que exibe os membros de sua empresa',
            'label'       => 'Titulo Membros',
            'type'        => 'textarea',
            'selector'    =>  '.equipehome__head h1',
            'callbackecho' => function () {
                echo nl2br(get_theme_mod('rmb_member__title'));
            },
            'transport'   => 'postMessage'
        ];

        Rmb_control($argsmembertitle, $wp_customize);

         /**
          * Controles Vitrone posts 2
          * section: rmb_vitrpost2
          */

        $argsvitrp2 = [
            'section'     => 'rmb_vitrpost2',
            'settings'    =>  'rmb_vitr2__titulo',
            'classe'      => 'control',
            'description' => 'Informe um titulo para a segunda vitrine de postagens',
            'label'       => 'Titulo Vitrine de Posts - 2',
            'type'        => 'textarea',
            'selector'    =>  '.vitrin2__title > h1',
            'callbackecho' => function () {
                echo nl2br(get_theme_mod('rmb_vitr2__titulo'));
            },
            'transport'   => 'postMessage'
        ];

        Rmb_control($argsvitrp2, $wp_customize);

        /**
        * Descrição Vitrone posts 2
        * section: rmb_vitrpost2
        */

        $argsvitrp2 = [
            'section'     => 'rmb_vitrpost2',
            'settings'    =>  'rmb_vitr2__desc',
            'classe'      => 'control',
            'description' => 'Informe uma descrição para a segunda vitrine de postagens',
            'label'       => 'Descrição Vitrine de Posts - 2',
            'type'        => 'textarea',
            'selector'    =>  '.vitrin2__title > small',
            'callbackecho' => function () {
                echo nl2br(get_theme_mod('rmb_vitr2__desc'));
            },
            'transport'   => 'postMessage'
        ];

        Rmb_control($argsvitrp2, $wp_customize);

        /**
        * Categoria exibida Vitrone posts 2
        * section: rmb_vitrpost2
        */

        $vt2cat = [
            'section'     => 'rmb_vitrpost2',
            'classe'      => 'cat',
            'settings'    =>  'rmb_vitr2__cat',
            'label'       => 'Categoria Vitrine de posts  - 2',
            'type'        => 'select',
            'choices'     => $cats,
            'transport'   => 'postMessage'
        ];

        Rmb_control($vt2cat, $wp_customize);

         /**
          * Titulo Banner -1
          * section:  rmb_banner1
          */

          Rmb_control(array(
            'section'     => 'rmb_banner1',
            'settings'    =>  'title_banner_1',
            'classe'      => 'control',
            'description' => 'Informe um titulo para o primeiro banner da página home',
            'label'       => 'Titulo Banner  - 1',
            'type'        => 'textarea',
            'selector'    =>  '.banner1__title > h1',
            'callbackecho' => function () {
                echo nl2br(get_theme_mod('title_banner_1'));
            },
            'transport'   => 'postMessage'
        ), $wp_customize);
        //cat__help-text
        /**
          * Conteúdo Banner -1
          * section:  rmb_banner1
          */

          Rmb_control(array(
            'section'     => 'rmb_banner1',
            'settings'    =>  'content_banner_1',
            'classe'      => 'control',
            'description' => 'Informe o conteúdo do primeiro banner',
            'label'       => 'Conteúdo Banner  - 1',
            'type'        => 'textarea',
            'selector'    =>  '.banner1__title > article',
            'callbackecho' => function () {
                echo nl2br(get_theme_mod('content_banner_1'));
            },
            'transport'   => 'postMessage'
        ), $wp_customize);

        /**
          * Background Banner -1
          * section:  rmb_banner1
          *:set_type
          */
          $bgbanner1 = [
              'label'       => __( 'Background Banner  - 1' ),
              'section'     => 'rmb_banner1',
              'classe'      => 'media',
              'mime_type'   => 'image',
              'settings'    => 'background_banner1',
          ];

          $wp_customize->add_setting('background_banner1', []);

          $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'audio_control', $bgbanner1) );
        
        //Rmb_control($bgbanner1, $wp_customize);

        /**
          * Paginas Banner -1
          * section:  rmb_banner1
          *:set_type
          */

          Rmb_control(array(
            'section'     => 'rmb_banner1',
            'settings'    =>  'pages_banner_1',
            'set_type'    => 'option',
            'label'       => 'Link Banner  - 1',
            'type'        => 'dropdown-pages',
        ), $wp_customize);

         /**
          * Titulo Central de ajuda Homepage
          * section: rmb_home_help
          */
          Rmb_control(array(
            'section'     => 'rmb_home_help',
            'settings'    =>  'title_help_home',
            'classe'      => 'control',
            'description' => 'Informe um titulo para a central de ajuda Exibida na Home Page',
            'label'       => 'Titulo central de ajuda',
            'type'        => 'textarea',
            'selector'    =>  '.ajudahome__title > h1',
            'callbackecho' => function () {
                echo nl2br(get_theme_mod('title_help_home'));
            },
            'transport'   => 'postMessage'
        ), $wp_customize);

        

        /**
          * Texto complementar
          * section: rmb_home_help
          */
          Rmb_control(array(
            'section'     => 'rmb_home_help',
            'settings'    =>  'desc_help_home',
            'classe'      => 'control',
            'description' => 'Informe um texto complementar para a central de ajuda Exibida na Home Page',
            'label'       => 'Descrição central de ajuda',
            'type'        => 'textarea',
            'selector'    =>  '.ajudahome__title > small',
            'callbackecho' => function () {
                echo nl2br(get_theme_mod('desc_help_home'));
            },
            'transport'   => 'postMessage'
        ), $wp_customize);

        /**
          * Link Central de ajuda
          * section: rmb_home_help
          */
        
    
          Rmb_control(array(
            'section'     => 'rmb_home_help',
            'settings'    =>  'link_help_home',
            'classe'      => 'cat',
            'label'       => 'Categoria da central de ajuda',
            'type'        => 'select',
            'choices'     => $cats,
            'transport'   => 'postMessage'
        ), $wp_customize);

        /**
          * Texto Butao inferior help title
          * section: rmb_home_help
          */
          Rmb_control(array(
            'section'     => 'rmb_home_help',
            'settings'    =>  'title_botton_get_help',
            'classe'      => 'control',
            'description' => 'Informe um titulo para o botao encontrado na pagina de ajuda na parte inferior',
            'label'       => 'Titulo botão inferior de ajuda',
            'type'        => 'text',
            'selector'    =>  '.button-ger-help > span',
            'callbackecho' => function () {
                echo nl2br(get_theme_mod('title_botton_get_help'));
            },
            'transport'   => 'postMessage'
        ), $wp_customize);

        /**
          * Texto Butao inferior help link
          * section: rmb_home_help
          */
          Rmb_control(array(
            'section'     => 'rmb_home_help',
            'settings'    =>  'link_botton_get_help',
            'classe'      => 'control',
            'description' => 'Informe um link para o botao encontrado na pagina de ajuda na parte inferior',
            'label'       => 'Link botão inferior de ajuda',
            'type'        => 'text',
            'exclusive'   => false,
            'selector'    =>  '.button-ger-help > a',
            'callbackecho' => function () {
                echo '<a href="'.get_theme_mod('link_botton_get_help').'" class="link-archive">FALE COM A GENTE</a>';
            },
            'transport'   => 'postMessage'
        ), $wp_customize);

         /**
          * Titulo Primeira vitrine
          * section: rmb_vitrine_1
          */
          Rmb_control(array(
            'section'     => 'rmb_vitrine_1',
            'settings'    =>  'vitrine_1_title',
            'classe'      => 'control',
            'description' => 'Informe um titulo para a primeira vitrine. ou uma fraze de impacto',
            'label'       => 'Titulo da vitrine',
            'type'        => 'textarea',
            'selector'    =>  '.vitrine_title > h1',
            'callbackecho' => function () {
                echo nl2br(get_theme_mod('vitrine_1_title'));
            },
            'transport'   => 'postMessage'
        ), $wp_customize);

        /**
          * Texto complementar Primeira vitrine
          * section: rmb_vitrine_1
          */
          Rmb_control(array(
            'section'     => 'rmb_vitrine_1',
            'settings'    =>  'vitrine_1_subtitle',
            'classe'      => 'control',
            'description' => 'Informe uma frase complementar para ser exibida na primeira vitrine',
            'label'       => 'Texto complementar da vitrine',
            'type'        => 'textarea',
            'selector'    =>  '.vitrine_title > small',
            'callbackecho' => function () {
                echo nl2br(get_theme_mod('vitrine_1_subtitle'));
            },
            'transport'   => 'postMessage'
        ), $wp_customize);

         /**
          * Dicas
          */
        Rmb_control(array(
            'section'     => 'rmb_sobre',
            'settings'    =>  'dicastext',
            'classe'      => 'control',
            'description' => 'Informe um titulo para a parte de dicas do seu tema',
            'label'       => 'Titulo',
            'type'        => 'textarea',
            'selector'    =>  '.dicas__title',
            'callbackecho' => function () {
                echo get_theme_mod('dicastext');
            },
            'transport'   => 'postMessage'
        ), $wp_customize);

        Rmb_control(array(
            'section'     => 'rmb_sobre',
            'settings'    => 'dicassubtext',
            'classe'      => 'control',
            'description' => 'Informe um subtitulo para a parte de dicas do seu tema',
            'label'       => 'SubTitulo',
            'type'        => 'textarea',
            'selector'    =>  '.dicas__title > small',
            'callbackecho' => function () {
                echo get_theme_mod('dicassubtext');
            },
            'transport'   => 'postMessage'
        ), $wp_customize);
        /**
         * Images and text
         * setings: sobretext
         * Section: rmb_sobre
         */
        Rmb_control(array(
            'section'     => 'rmb_sobre',
            'settings'    =>  'sobretext',
            'classe'      => 'imagetext',
            'description' => 'Informe as dicas sobre o trabalho de sua empresa!',
            'label'       => 'Dicas',
            'type'        => 'multi_inputs',
            'selector'    =>  '.dicas__content',
            'callbackecho' => function () {
                $dicas = get_theme_rmb_array('sobretext');
                //var_dump($dicas);
                foreach ($dicas as $valdicas) { ?>
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="dicas__item">
                            <figure><?php echo '<img src="'.$valdicas[full]->url.'"/>'; ?></figure>
                            <article>
                            <?php echo $valdicas[content]; ?>
                            </article>
                        </div>
                    </div><?php
                }
            },
            'transport'   => 'postMessage'
        ), $wp_customize);
        /**
         * Titulo e Subtitulo
         * Section: rmb_whyprocess
         */
        Rmb_control(array(
            'section'     => 'rmb_whyprocess',
            'settings'    =>  'process__title',
            'classe'      => 'control',
            'description' => 'Informe um titulo para a parte de dicas do seu tema',
            'label'       => 'Titulo',
            'type'        => 'textarea',
            'selector'    =>  '.processo__title > h1',
            'callbackecho' => function () {
                echo get_theme_mod('process__title');
            },
            'transport'   => 'postMessage'
        ), $wp_customize);

        /**
         * Processo
         * Section: rmb_whyprocess
         */

        Rmb_control(array(
            'section'     => 'rmb_whyprocess',
            'settings'    =>  'process_images',
            'classe'      => 'imagetext',
            'description' => 'Informe as imagens e textos de como é o processo de trabalho da empresa',
            'label'       => 'Processos',
            'type'        => 'multi_inputs',
            'selector'    =>  '.processo__container',
            'callbackecho' => function () {
                $dicas = get_theme_rmb_array('process_images');
                $count = 0;
                //var_dump($dicas);
                foreach ($dicas as $valdicas) { $count++;?>
                    <div class="processo__col">
                        <div class="processo__item">
                            <figure><?php echo '<img src="'.$valdicas['full']->url.'"/>'; ?></figure>
                            <div class="count"><span><i><?php echo $count == 5 ? $count.'($)' : $count;?></i></span></div>
                            <article>
                            <?php echo $valdicas['content']; ?>
                            </article>
                        </div>
                    </div><?php
                }
            },
            'transport'   => 'postMessage'
        ), $wp_customize);
        
        /**
         * Números da empresa
         */
        Rmb_control(array(
            'section'     => 'rmb_numparter',
            'settings'    =>  'numberone',
            'classe'      => 'control',
            'description' => 'Informe o primeiro campo de números da empresa',
            'label'       => 'Números - 1',
            'type'        => 'number',
            'selector'    =>  '.nmone',
            'callbackecho' => function () {
                echo get_theme_mod('numberone');
            },
            'transport'   => 'postMessage'
        ), $wp_customize);

        Rmb_control(array(
            'section'     => 'rmb_numparter',
            'settings'    =>  'numberone__text',
            'classe'      => 'control',
            'description' => 'Informe um texto para o primeiro campo de números da empresa',
            'label'       => 'Texto de informação sobre o número acima',
            'type'        => 'textarea',
            'selector'    =>  '.nmonetxt',
            'attr'        => array(
                'style' => 'margin-bottom: 30px; outline-offset: 22px; outline: 1px solid #ddd;'
            ),
            'callbackecho' => function () {
                echo get_theme_mod('numberone__text');
            },
            'transport'   => 'postMessage'
        ), $wp_customize);

        Rmb_control(array(
            'section'     => 'rmb_numparter',
            'settings'    =>  'numbertwo',
            'classe'      => 'control',
            'description' => 'Informe o segundo campo de numeros da empresa',
            'label'       => 'Números - 2',
            'type'        => 'number',
            'selector'    =>  '.nmtwo',
            'callbackecho' => function () {
                echo get_theme_mod('numbertwo');
            },
            'transport'   => 'postMessage'
        ), $wp_customize);

        Rmb_control(array(
            'section'     => 'rmb_numparter',
            'settings'    =>  'numbertwo__text',
            'classe'      => 'control',
            'description' => 'Informe um texto para o segundo campo de números da empresa',
            'label'       => 'Texto de informação sobre o número acima',
            'type'        => 'textarea',
            'selector'    =>  '.nmtwotxt',
            'attr'        => array(
                'style' => 'margin-bottom: 30px; outline-offset: 22px; outline: 1px solid #ddd;'
            ),
            'callbackecho' => function () {
                echo get_theme_mod('numbertwo__text');
            },
            'transport'   => 'postMessage'
        ), $wp_customize);

        Rmb_control(array(
            'section'     => 'rmb_numparter',
            'settings'    =>  'numberthree',
            'classe'      => 'control',
            'description' => 'Informe o terceiro campo de numeros da empresa',
            'label'       => 'Números - 3',
            'type'        => 'text',
            'selector'    =>  '.nmthree',
            'callbackecho' => function () {
                echo get_theme_mod('numberthree');
            },
            'transport'   => 'postMessage'
        ), $wp_customize);

        Rmb_control(array(
            'section'     => 'rmb_numparter',
            'settings'    =>  'numberthree__text',
            'classe'      => 'control',
            'description' => 'Informe um texto para o terceiro campo de números da empresa',
            'label'       => 'Texto de informação sobre o número acima',
            'type'        => 'textarea',
            'selector'    =>  '.nmthreetxt',
            'attr'        => array(
                'style' => 'margin-bottom: 30px; outline-offset: 22px; outline: 1px solid #ddd;'
            ),
            'callbackecho' => function () {
                echo get_theme_mod('numberthree__text');
            },
            'transport'   => 'postMessage'
        ), $wp_customize);

        /**
         * Post indicação
         */

        Rmb_control(array(
            'section'     => 'rmb_sec_indic',
            'settings'    =>  'title_cpost_etc',
            'classe'      => 'control',
            'description' => 'Informe um titulo em texto para os post do tipo "Indicão"',
            'label'       => 'Titulo Posts de Indicação',
            'type'        => 'textarea',
            'selector'    =>  '.nmthreetxt',
            'attr'        => array(
                'style' => 'margin-bottom: 30px;'
            ),
            'callbackecho' => function () {
                echo get_theme_mod('numberthree__text');
            },
            'transport'   => 'postMessage'
        ), $wp_customize);

        Rmb_control(array(
            'section'     => 'rmb_sec_indic',
            'settings'    =>  'excerpt_cpost_etc',
            'classe'      => 'control',
            'description' => 'Informe um texto explicativo sobre este tipo de postagem',
            'label'       => 'Resumo',
            'type'        => 'textarea',
            'selector'    =>  '.nmthreetxt',
            'attr'        => array(
                'style' => 'margin-bottom: 30px;'
            ),
            'callbackecho' => function () {
                echo get_theme_mod('numberthree__text');
            },
            'transport'   => 'postMessage'
        ), $wp_customize);

        Rmb_control(array(
            'section'     => 'rmb_sec_indic',
            'settings'    =>  'icon_cpost_etc',
            'classe'      => 'media',
            'description' => 'Selecione um ícone que represente as postagens de "Indicação"',
            'label'       => 'Ícone',
            'type'        => 'media',
            'selector'    =>  '.nmthreetxt',
            'attr'        => array(
                'style' => 'margin-bottom: 30px;'
            ),
            'callbackecho' => function () {
                echo get_theme_mod('numberthree__text');
            },
            'transport'   => 'postMessage'
        ), $wp_customize);

        Rmb_control(array(
            'section'     =>  'rmb_sec_indic',
            'settings'    =>  'bg_cpost_etc',
            'classe'      =>  'image',
            'description' =>  'Selecione o Background Apresentado á cima de Serviços',
            'label'       =>  'Banner Home - 1',
            'type'        =>  'image',
            'selector'    =>  '.banner_home1',
            'callbackecho' => function () {
                echo '<div class="row">'
                    . wp_get_attachment_image(get_theme_mod('kirar_image_home_1'), 'banner_home', "", array("class" => "img-fluid", 'alt' => 'Responsive image')) .
                    '</div>';
            },
            'transport'   => 'refresh'
        ), $wp_customize);
    }

    add_action('customize_register', 'rmb_customize_register');
}
