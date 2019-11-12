<?php

/**
 * Registers the Theme Customizer Preview JavaScript with WordPress.
 *
 * @package    tmx
 */
function tmx_customizer_live_preview() {
	wp_enqueue_script(
		'tmx-theme-customizer',
		get_template_directory_uri() . '/assets/js/customcontrols.js',
		array( 'jquery', 'customize-preview' ),
		'',
		true
	);
} // end tcx_customizer_live_preview
add_action( 'customize_preview_init', 'tmx_customizer_live_preview' );

/**
 * Function Ger Images Control Ico
 */
function get_rmb_attrachment($settings, $args)
{
    $archives = json_decode(get_theme_mod($settings));
    $output = '';
    $classe = 'class ="' . $args['class'] . '"';
    $alt = 'alt="' . $args['alt'] . '"';
    $containerClass = 'class ="' . $args['container_class'] . '"';
    foreach ($archives as $key => $value) {
        if ($args['container']) {
            $output .= '<' . $args['container'] . ' ' . $containerClass . '><img src="' . $value->full->url . '" ' . $alt . $classe . ' /></' . $args['container'] . '>';
        } else {
            $output .= '<img src="' . $value->full->url . '" ' . $alt . $classe . ' />';
        }
    }
    return $output;
}

function get_theme_rmb_array($setings){
    $blocks = json_decode(get_theme_mod($setings));
    $output = [];
    foreach ($blocks as $key => $value) {
        $output[] = [
            'full' => $value->full,
            'thumbnail' => $value->thumbnail,
            'content' => urldecode($value->content)
        ];
        
    }
    return $output;
}

if (class_exists('WP_Customize_Control')) {

    class WP_Dynamic_Image extends WP_Customize_Control
    {
        public $type = 'multiple';

        /**
         * Enqueue our scripts and styles
         */
        public function enqueue()
        {
            /* Icons PayPleace  */
            // enqueue the script we would like to pass our PHP variables to
            wp_enqueue_script('uncoverwp', get_template_directory_uri() . '/assets/js/wp_script.js', array('jquery'), '1.0.0', true);

            // pass our PHP variables to the script we enqueued above using wp_localize_script()
            wp_localize_script(
                'uncoverwp', // the handle of the script we enqueued above
                'uncoverwp_script_vars', // object name to access our PHP variables from in our script
                // register an array of variables we would like to use in our script
                array(
                    'template_directory' => get_template_directory_uri() // template_directory now contains the path to our template directory
                )
            );
            wp_enqueue_editor();
            wp_enqueue_media();
            wp_enqueue_script('dyn_images_js', get_template_directory_uri() . '/assets/js/controllers/dynamic_images.js', array('jquery'), '1.0', true);
            wp_enqueue_style('dyn_images_style', get_template_directory_uri() . '/assets/css/dashboard.css', false, '0.0.1');
        }

        public function render_content()
        {
            ?>
            <div class="rmb_custom_control control__container-fluid">
                <span class="title_rmb_custom_control"><b><?php echo esc_html($this->label); ?></b></span><br>
                <span class="descript"><?php echo esc_html($this->description); ?></span>
                <div class="image__container">
                    <?php $value = explode(',', $this->value()); 
                    if($value[0]): ?>
                        <div class="line list">
                            <?php foreach($value as $i => $val): ?>
                                <div class="image__item" id="image__action-<?php echo $i; ?>">                            
                                    <div class="line">
                                        <figure><img src="<?php echo wp_get_attachment_image_url($val, 'thumbnail', false); ?>" alt="Image Control"></figure>
                                    </div>
                                    <div class="line j-content-center">
                                        <button class="image__del" data-del="<?php echo $i; ?>"><span class="dashicons dashicons-trash"></span></button>
                                        <button class="image__change" data-replace="<?php echo $val; ?>" data-change="<?php echo $i; ?>"><span class="dashicons dashicons-edit"></span></button>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <div class="line list">
                            <div class="image__item" id="image__action-0">  
                                <div class="line">
                                    <figure><img src="https://via.placeholder.com/115?text=Default" alt=""></figure>
                                </div>  
                                <div class="line j-content-center">
                                    <button class="image__del" data-del="0"><span class="dashicons dashicons-trash"></span></button>
                                    <button class="image__change" data-change="0"><span class="dashicons dashicons-edit"></span></button>
                                </div> 
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="line">
                        <button class="add__item">
                            Adicionar Marca
                        </button>
                    </div>
                    <input type="hidden" class="items_fields" name="imgs" id="images__value-0" value="<?php echo esc_attr($this->value()); ?>" <?php $this->link(); ?>>
                </div>
            </div><?php
        }
    }


    class WP_Dynamic_Partners extends WP_Customize_Control
    {
        public $type = 'multi_inputs';

        /**
         * Enqueue our scripts and styles
         */
        public function enqueue()
        {
            /* Icons PayPleace  */
            // enqueue the script we would like to pass our PHP variables to
            wp_enqueue_script('uncoverwp', get_template_directory_uri() . '/assets/js/wp_script.js', array('jquery'), '1.0.0', true);

            // pass our PHP variables to the script we enqueued above using wp_localize_script()
            wp_localize_script(
                'uncoverwp', // the handle of the script we enqueued above
                'uncoverwp_script_vars', // object name to access our PHP variables from in our script
                // register an array of variables we would like to use in our script
                array(
                    'template_directory' => get_template_directory_uri() // template_directory now contains the path to our template directory
                )
            );
            wp_enqueue_editor();
            wp_enqueue_media();
            wp_enqueue_script('dyn_images_js', get_template_directory_uri() . '/assets/js/controllers/dynamic_images.js', array('jquery'), '1.0', true);
            wp_enqueue_style('dyn_images_style', get_template_directory_uri() . '/assets/css/controlls/dynamic_images.css', false, '0.0.1');
        }

        public function render_content()
        {
            ?>
            <div class="rmb_custom_control">
                <span class="title_rmb_custom_control"><b><?php echo esc_html($this->label); ?></b></span><br>
                <span class="descript"><?php echo esc_html($this->description); ?></span>
                <div class="marcs__container">

                    <?php
                        if ($this->value()) :
                            $valueschange = json_decode($this->value());
                            foreach ($valueschange as $key => $values) {
                                //var_dump($values->thumbnail);
                                if ($values->thumbnail) { ?>
                                    <label class="img_item" data-element="<?php echo $key; ?>">
                                        <figure class="img_sel">
                                            <img src="<?php echo $values->thumbnail->url; ?>" alt="%s">
                                        </figure>
                                        <button class="select_img_control" data-element="<?php echo $key; ?>">
                                            <svg id="icon-plus" viewBox="0 0 32 32">
                                                <title>plus</title>
                                                <path d="M31 12h-11v-11c0-0.552-0.448-1-1-1h-6c-0.552 0-1 0.448-1 1v11h-11c-0.552 0-1 0.448-1 1v6c0 0.552 0.448 1 1 1h11v11c0 0.552 0.448 1 1 1h6c0.552 0 1-0.448 1-1v-11h11c0.552 0 1-0.448 1-1v-6c0-0.552-0.448-1-1-1z"></path>
                                            </svg>
                                        </button>
                                        <button class="remove_img_control" data-element="<?php echo $key; ?>">
                                            <svg id="icon-minus" viewBox="0 0 32 32">
                                                <title>minus</title>
                                                <path d="M0 13v6c0 0.552 0.448 1 1 1h30c0.552 0 1-0.448 1-1v-6c0-0.552-0.448-1-1-1h-30c-0.552 0-1 0.448-1 1z"></path>
                                            </svg>
                                        </button>
                                        <footer>
                                            <button class="trash" data-element="<?php echo $key; ?>">
                                                <svg id="icon-delete-button" viewBox="0 0 32 32">
                                                    <title>delete-button</title>
                                                    <path d="M25.283 3.834h-4.981c-0.248-2.155-2.082-3.834-4.302-3.834s-4.053 1.679-4.302 3.834h-4.981c-2.016 0-3.656 1.64-3.656 3.656v0.188c0 1.54 0.959 2.859 2.31 3.396v17.271c0 2.016 1.64 3.656 3.656 3.656h13.945c2.016 0 3.656-1.64 3.656-3.656v-17.27c1.351-0.537 2.31-1.856 2.31-3.396v-0.188c0-2.016-1.64-3.656-3.656-3.656zM16 1.734c1.263 0 2.317 0.905 2.55 2.1h-5.099c0.233-1.195 1.287-2.1 2.55-2.1zM24.894 28.344c0 1.060-0.862 1.922-1.922 1.922h-13.945c-1.059 0-1.922-0.862-1.922-1.922v-17.011h17.789v17.011zM27.205 7.677c0 1.060-0.862 1.922-1.922 1.922h-18.566c-1.059 0-1.922-0.862-1.922-1.922v-0.188c0-1.060 0.862-1.922 1.922-1.922h18.566c1.059 0 1.922 0.862 1.922 1.922v0.188z"></path>
                                                    <path d="M11.352 28.049c0.479 0 0.867-0.388 0.867-0.867v-9.761c0-0.479-0.388-0.867-0.867-0.867s-0.867 0.388-0.867 0.867v9.761c-0 0.479 0.388 0.867 0.867 0.867z"></path>
                                                    <path d="M16 28.049c0.479 0 0.867-0.388 0.867-0.867v-9.761c0-0.479-0.388-0.867-0.867-0.867s-0.867 0.388-0.867 0.867v9.761c0 0.479 0.388 0.867 0.867 0.867z"></path>
                                                    <path d="M20.648 28.049c0.479 0 0.867-0.388 0.867-0.867v-9.761c0-0.479-0.388-0.867-0.867-0.867s-0.867 0.388-0.867 0.867v9.761c-0 0.479 0.388 0.867 0.867 0.867z"></path>
                                                </svg>
                                            </button>
                                        </footer>
                                        <input type="text" name="teste" id="">
                                        <input type="hidden" class="nm_fields" name="num_fields">
                                    </label>
                                <?php } elseif($values->full){ ?>
                                    <label class="img_item" data-element="<?php echo $key; ?>">
                                        <figure class="img_sel">
                                            <img src="<?php echo $values->full->url; ?>" alt="%s">
                                        </figure>
                                        <button class="select_img_control" data-element="<?php echo $key; ?>">
                                            <svg id="icon-plus" viewBox="0 0 32 32">
                                                <title>plus</title>
                                                <path d="M31 12h-11v-11c0-0.552-0.448-1-1-1h-6c-0.552 0-1 0.448-1 1v11h-11c-0.552 0-1 0.448-1 1v6c0 0.552 0.448 1 1 1h11v11c0 0.552 0.448 1 1 1h6c0.552 0 1-0.448 1-1v-11h11c0.552 0 1-0.448 1-1v-6c0-0.552-0.448-1-1-1z"></path>
                                            </svg>
                                        </button>
                                        <button class="remove_img_control" data-element="<?php echo $key; ?>">
                                            <svg id="icon-minus" viewBox="0 0 32 32">
                                                <title>minus</title>
                                                <path d="M0 13v6c0 0.552 0.448 1 1 1h30c0.552 0 1-0.448 1-1v-6c0-0.552-0.448-1-1-1h-30c-0.552 0-1 0.448-1 1z"></path>
                                            </svg>
                                        </button>
                                        <footer>
                                            <button class="trash" data-element="<?php echo $key; ?>">
                                                <svg id="icon-delete-button" viewBox="0 0 32 32">
                                                    <title>delete-button</title>
                                                    <path d="M25.283 3.834h-4.981c-0.248-2.155-2.082-3.834-4.302-3.834s-4.053 1.679-4.302 3.834h-4.981c-2.016 0-3.656 1.64-3.656 3.656v0.188c0 1.54 0.959 2.859 2.31 3.396v17.271c0 2.016 1.64 3.656 3.656 3.656h13.945c2.016 0 3.656-1.64 3.656-3.656v-17.27c1.351-0.537 2.31-1.856 2.31-3.396v-0.188c0-2.016-1.64-3.656-3.656-3.656zM16 1.734c1.263 0 2.317 0.905 2.55 2.1h-5.099c0.233-1.195 1.287-2.1 2.55-2.1zM24.894 28.344c0 1.060-0.862 1.922-1.922 1.922h-13.945c-1.059 0-1.922-0.862-1.922-1.922v-17.011h17.789v17.011zM27.205 7.677c0 1.060-0.862 1.922-1.922 1.922h-18.566c-1.059 0-1.922-0.862-1.922-1.922v-0.188c0-1.060 0.862-1.922 1.922-1.922h18.566c1.059 0 1.922 0.862 1.922 1.922v0.188z"></path>
                                                    <path d="M11.352 28.049c0.479 0 0.867-0.388 0.867-0.867v-9.761c0-0.479-0.388-0.867-0.867-0.867s-0.867 0.388-0.867 0.867v9.761c-0 0.479 0.388 0.867 0.867 0.867z"></path>
                                                    <path d="M16 28.049c0.479 0 0.867-0.388 0.867-0.867v-9.761c0-0.479-0.388-0.867-0.867-0.867s-0.867 0.388-0.867 0.867v9.761c0 0.479 0.388 0.867 0.867 0.867z"></path>
                                                    <path d="M20.648 28.049c0.479 0 0.867-0.388 0.867-0.867v-9.761c0-0.479-0.388-0.867-0.867-0.867s-0.867 0.388-0.867 0.867v9.761c-0 0.479 0.388 0.867 0.867 0.867z"></path>
                                                </svg>
                                            </button>
                                        </footer>
                                        <input type="text" name="teste" id="">
                                        <input type="hidden" class="nm_fields" name="num_fields">
                                    </label><?php

                                }
                            } 
                        else : ?>
                            <label class="img_item" data-element="0">
                                <figure class="img_sel">
                                    <img src="" alt="">
                                </figure>
                                <button class="select_img_control" data-element="0">
                                    <svg id="icon-plus" viewBox="0 0 32 32">
                                        <title>plus</title>
                                        <path d="M31 12h-11v-11c0-0.552-0.448-1-1-1h-6c-0.552 0-1 0.448-1 1v11h-11c-0.552 0-1 0.448-1 1v6c0 0.552 0.448 1 1 1h11v11c0 0.552 0.448 1 1 1h6c0.552 0 1-0.448 1-1v-11h11c0.552 0 1-0.448 1-1v-6c0-0.552-0.448-1-1-1z"></path>
                                    </svg>
                                </button>
                                <button class="remove_img_control" data-element="0">
                                    <svg id="icon-minus" viewBox="0 0 32 32">
                                        <title>minus</title>
                                        <path d="M0 13v6c0 0.552 0.448 1 1 1h30c0.552 0 1-0.448 1-1v-6c0-0.552-0.448-1-1-1h-30c-0.552 0-1 0.448-1 1z"></path>
                                    </svg>
                                </button>
                                <footer>
                                    <button class="trash" data-element="0">
                                        <svg id="icon-delete-button" viewBox="0 0 32 32">
                                            <title>delete-button</title>
                                            <path d="M25.283 3.834h-4.981c-0.248-2.155-2.082-3.834-4.302-3.834s-4.053 1.679-4.302 3.834h-4.981c-2.016 0-3.656 1.64-3.656 3.656v0.188c0 1.54 0.959 2.859 2.31 3.396v17.271c0 2.016 1.64 3.656 3.656 3.656h13.945c2.016 0 3.656-1.64 3.656-3.656v-17.27c1.351-0.537 2.31-1.856 2.31-3.396v-0.188c0-2.016-1.64-3.656-3.656-3.656zM16 1.734c1.263 0 2.317 0.905 2.55 2.1h-5.099c0.233-1.195 1.287-2.1 2.55-2.1zM24.894 28.344c0 1.060-0.862 1.922-1.922 1.922h-13.945c-1.059 0-1.922-0.862-1.922-1.922v-17.011h17.789v17.011zM27.205 7.677c0 1.060-0.862 1.922-1.922 1.922h-18.566c-1.059 0-1.922-0.862-1.922-1.922v-0.188c0-1.060 0.862-1.922 1.922-1.922h18.566c1.059 0 1.922 0.862 1.922 1.922v0.188z"></path>
                                            <path d="M11.352 28.049c0.479 0 0.867-0.388 0.867-0.867v-9.761c0-0.479-0.388-0.867-0.867-0.867s-0.867 0.388-0.867 0.867v9.761c-0 0.479 0.388 0.867 0.867 0.867z"></path>
                                            <path d="M16 28.049c0.479 0 0.867-0.388 0.867-0.867v-9.761c0-0.479-0.388-0.867-0.867-0.867s-0.867 0.388-0.867 0.867v9.761c0 0.479 0.388 0.867 0.867 0.867z"></path>
                                            <path d="M20.648 28.049c0.479 0 0.867-0.388 0.867-0.867v-9.761c0-0.479-0.388-0.867-0.867-0.867s-0.867 0.388-0.867 0.867v9.761c-0 0.479 0.388 0.867 0.867 0.867z"></path>
                                        </svg>
                                    </button>
                                </footer>
                                <input type="text" name="teste" id="">
                                <input type="hidden" class="nm_fields" name="num_fields">
                            </label>
                    <?php endif; ?>

                </div>
                <button class="add_log">
                    <svg id="icon-plus" viewBox="0 0 32 32">
                        <title>plus</title>
                        <path d="M31 12h-11v-11c0-0.552-0.448-1-1-1h-6c-0.552 0-1 0.448-1 1v11h-11c-0.552 0-1 0.448-1 1v6c0 0.552 0.448 1 1 1h11v11c0 0.552 0.448 1 1 1h6c0.552 0 1-0.448 1-1v-11h11c0.552 0 1-0.448 1-1v-6c0-0.552-0.448-1-1-1z"></path>
                    </svg>
                    Adicionar Marca
                </button>
                <input type="hidden" class="items_fields" name="imgs" value="<?php echo esc_attr($this->value()); ?>" <?php $this->link(); ?>>
            </div>
<?php
        }
    }

    /**
     * Class WP_Dynamic_Image_Text
     */

    class WP_Dynamic_Image_Text extends WP_Customize_Control
    {
        public $type = 'multi_inputs';

        /**
         * Enqueue our scripts and styles
         */
        public function enqueue()
        {
            /* Icons PayPleace  */
            // enqueue the script we would like to pass our PHP variables to
            wp_enqueue_script('uncoverwp', get_template_directory_uri() . '/assets/js/wp_script.js', array('jquery'), '1.0.0', true);

            // pass our PHP variables to the script we enqueued above using wp_localize_script()
            wp_localize_script(
                'uncoverwp', // the handle of the script we enqueued above
                'uncoverwp_script_vars', // object name to access our PHP variables from in our script
                // register an array of variables we would like to use in our script
                array(
                    'template_directory' => get_template_directory_uri() // template_directory now contains the path to our template directory
                )
            );
            wp_enqueue_editor();
            wp_enqueue_media();
            wp_enqueue_script('dyn_images_js', get_template_directory_uri() . '/assets/js/controllers/dynamic_images.js', array('jquery'), '1.0', true);
            wp_enqueue_style('dyn_images_style', get_template_directory_uri() . '/assets/css/controlls/dynamic_images.css', false, '0.0.1');
        }

        public function render_content()
        {
            ?>
            <div class="rmb_custom_control">
                <span class="title_rmb_custom_control"><b><?php echo esc_html($this->label); ?></b></span><br>
                <span class="descript"><?php echo esc_html($this->description); ?></span>
                <div class="marcs__container">

                    <?php
                        if ($this->value()) :
                            $valueschange = json_decode($this->value());
                            foreach ($valueschange as $key => $values) {
                                //var_dump($values->thumbnail);
                                if ($values->thumbnail) { ?>
                                    <label class="img_item blockimage" data-element="<?php echo $key; ?>">
                                        <figure class="img_sel">
                                            <img src="<?php echo $values->thumbnail->url; ?>" alt="%s">
                                        </figure>
                                        <button class="select_img_control" data-element="<?php echo $key; ?>">
                                            <svg id="icon-plus" viewBox="0 0 32 32">
                                                <title>plus</title>
                                                <path d="M31 12h-11v-11c0-0.552-0.448-1-1-1h-6c-0.552 0-1 0.448-1 1v11h-11c-0.552 0-1 0.448-1 1v6c0 0.552 0.448 1 1 1h11v11c0 0.552 0.448 1 1 1h6c0.552 0 1-0.448 1-1v-11h11c0.552 0 1-0.448 1-1v-6c0-0.552-0.448-1-1-1z"></path>
                                            </svg>
                                        </button>
                                        <button class="remove_img_control" data-element="<?php echo $key; ?>">
                                            <svg id="icon-minus" viewBox="0 0 32 32">
                                                <title>minus</title>
                                                <path d="M0 13v6c0 0.552 0.448 1 1 1h30c0.552 0 1-0.448 1-1v-6c0-0.552-0.448-1-1-1h-30c-0.552 0-1 0.448-1 1z"></path>
                                            </svg>
                                        </button>
                                        <footer>
                                            <button class="trash" data-element="<?php echo $key; ?>">
                                                <svg id="icon-delete-button" viewBox="0 0 32 32">
                                                    <title>delete-button</title>
                                                    <path d="M25.283 3.834h-4.981c-0.248-2.155-2.082-3.834-4.302-3.834s-4.053 1.679-4.302 3.834h-4.981c-2.016 0-3.656 1.64-3.656 3.656v0.188c0 1.54 0.959 2.859 2.31 3.396v17.271c0 2.016 1.64 3.656 3.656 3.656h13.945c2.016 0 3.656-1.64 3.656-3.656v-17.27c1.351-0.537 2.31-1.856 2.31-3.396v-0.188c0-2.016-1.64-3.656-3.656-3.656zM16 1.734c1.263 0 2.317 0.905 2.55 2.1h-5.099c0.233-1.195 1.287-2.1 2.55-2.1zM24.894 28.344c0 1.060-0.862 1.922-1.922 1.922h-13.945c-1.059 0-1.922-0.862-1.922-1.922v-17.011h17.789v17.011zM27.205 7.677c0 1.060-0.862 1.922-1.922 1.922h-18.566c-1.059 0-1.922-0.862-1.922-1.922v-0.188c0-1.060 0.862-1.922 1.922-1.922h18.566c1.059 0 1.922 0.862 1.922 1.922v0.188z"></path>
                                                    <path d="M11.352 28.049c0.479 0 0.867-0.388 0.867-0.867v-9.761c0-0.479-0.388-0.867-0.867-0.867s-0.867 0.388-0.867 0.867v9.761c-0 0.479 0.388 0.867 0.867 0.867z"></path>
                                                    <path d="M16 28.049c0.479 0 0.867-0.388 0.867-0.867v-9.761c0-0.479-0.388-0.867-0.867-0.867s-0.867 0.388-0.867 0.867v9.761c0 0.479 0.388 0.867 0.867 0.867z"></path>
                                                    <path d="M20.648 28.049c0.479 0 0.867-0.388 0.867-0.867v-9.761c0-0.479-0.388-0.867-0.867-0.867s-0.867 0.388-0.867 0.867v9.761c-0 0.479 0.388 0.867 0.867 0.867z"></path>
                                                </svg>
                                            </button>
                                        </footer>
                                        <textarea name="txt_block" id="ctrl_text" rows="3" placeholder="Digite seu texto"><?php echo $values->content ? urldecode($values->content) : '';?></textarea>
                                        <input type="hidden" class="nm_fields" name="num_fields">
                                    </label>
                                <?php } elseif($values->full){ ?>
                                    <label class="img_item blockimage" data-element="<?php echo $key; ?>">
                                        <figure class="img_sel">
                                            <img src="<?php echo $values->full->url; ?>" alt="%s">
                                        </figure>
                                        <button class="select_img_control" data-element="<?php echo $key; ?>">
                                            <svg id="icon-plus" viewBox="0 0 32 32">
                                                <title>plus</title>
                                                <path d="M31 12h-11v-11c0-0.552-0.448-1-1-1h-6c-0.552 0-1 0.448-1 1v11h-11c-0.552 0-1 0.448-1 1v6c0 0.552 0.448 1 1 1h11v11c0 0.552 0.448 1 1 1h6c0.552 0 1-0.448 1-1v-11h11c0.552 0 1-0.448 1-1v-6c0-0.552-0.448-1-1-1z"></path>
                                            </svg>
                                        </button>
                                        <button class="remove_img_control" data-element="<?php echo $key; ?>">
                                            <svg id="icon-minus" viewBox="0 0 32 32">
                                                <title>minus</title>
                                                <path d="M0 13v6c0 0.552 0.448 1 1 1h30c0.552 0 1-0.448 1-1v-6c0-0.552-0.448-1-1-1h-30c-0.552 0-1 0.448-1 1z"></path>
                                            </svg>
                                        </button>
                                        <footer>
                                            <button class="trash" data-element="<?php echo $key; ?>">
                                                <svg id="icon-delete-button" viewBox="0 0 32 32">
                                                    <title>delete-button</title>
                                                    <path d="M25.283 3.834h-4.981c-0.248-2.155-2.082-3.834-4.302-3.834s-4.053 1.679-4.302 3.834h-4.981c-2.016 0-3.656 1.64-3.656 3.656v0.188c0 1.54 0.959 2.859 2.31 3.396v17.271c0 2.016 1.64 3.656 3.656 3.656h13.945c2.016 0 3.656-1.64 3.656-3.656v-17.27c1.351-0.537 2.31-1.856 2.31-3.396v-0.188c0-2.016-1.64-3.656-3.656-3.656zM16 1.734c1.263 0 2.317 0.905 2.55 2.1h-5.099c0.233-1.195 1.287-2.1 2.55-2.1zM24.894 28.344c0 1.060-0.862 1.922-1.922 1.922h-13.945c-1.059 0-1.922-0.862-1.922-1.922v-17.011h17.789v17.011zM27.205 7.677c0 1.060-0.862 1.922-1.922 1.922h-18.566c-1.059 0-1.922-0.862-1.922-1.922v-0.188c0-1.060 0.862-1.922 1.922-1.922h18.566c1.059 0 1.922 0.862 1.922 1.922v0.188z"></path>
                                                    <path d="M11.352 28.049c0.479 0 0.867-0.388 0.867-0.867v-9.761c0-0.479-0.388-0.867-0.867-0.867s-0.867 0.388-0.867 0.867v9.761c-0 0.479 0.388 0.867 0.867 0.867z"></path>
                                                    <path d="M16 28.049c0.479 0 0.867-0.388 0.867-0.867v-9.761c0-0.479-0.388-0.867-0.867-0.867s-0.867 0.388-0.867 0.867v9.761c0 0.479 0.388 0.867 0.867 0.867z"></path>
                                                    <path d="M20.648 28.049c0.479 0 0.867-0.388 0.867-0.867v-9.761c0-0.479-0.388-0.867-0.867-0.867s-0.867 0.388-0.867 0.867v9.761c-0 0.479 0.388 0.867 0.867 0.867z"></path>
                                                </svg>
                                            </button>
                                        </footer>
                                        <textarea name="txt_block" id="ctrl_text" rows="3" placeholder="Digite seu texto"><?php echo $values->content ? urldecode($values->content) : '';?></textarea>
                                        <input type="hidden" class="nm_fields" name="num_fields">
                                    </label><?php

                                }
                            } 
                        else : ?>
                            <label class="img_item blockimage" data-element="0">
                                <figure class="img_sel">
                                    <img src="" alt="">
                                </figure>
                                <button class="select_img_control" data-element="0">
                                    <svg id="icon-plus" viewBox="0 0 32 32">
                                        <title>plus</title>
                                        <path d="M31 12h-11v-11c0-0.552-0.448-1-1-1h-6c-0.552 0-1 0.448-1 1v11h-11c-0.552 0-1 0.448-1 1v6c0 0.552 0.448 1 1 1h11v11c0 0.552 0.448 1 1 1h6c0.552 0 1-0.448 1-1v-11h11c0.552 0 1-0.448 1-1v-6c0-0.552-0.448-1-1-1z"></path>
                                    </svg>
                                </button>
                                <button class="remove_img_control" data-element="0">
                                    <svg id="icon-minus" viewBox="0 0 32 32">
                                        <title>minus</title>
                                        <path d="M0 13v6c0 0.552 0.448 1 1 1h30c0.552 0 1-0.448 1-1v-6c0-0.552-0.448-1-1-1h-30c-0.552 0-1 0.448-1 1z"></path>
                                    </svg>
                                </button>
                                <footer>
                                    <button class="trash" data-element="0">
                                        <svg id="icon-delete-button" viewBox="0 0 32 32">
                                            <title>delete-button</title>
                                            <path d="M25.283 3.834h-4.981c-0.248-2.155-2.082-3.834-4.302-3.834s-4.053 1.679-4.302 3.834h-4.981c-2.016 0-3.656 1.64-3.656 3.656v0.188c0 1.54 0.959 2.859 2.31 3.396v17.271c0 2.016 1.64 3.656 3.656 3.656h13.945c2.016 0 3.656-1.64 3.656-3.656v-17.27c1.351-0.537 2.31-1.856 2.31-3.396v-0.188c0-2.016-1.64-3.656-3.656-3.656zM16 1.734c1.263 0 2.317 0.905 2.55 2.1h-5.099c0.233-1.195 1.287-2.1 2.55-2.1zM24.894 28.344c0 1.060-0.862 1.922-1.922 1.922h-13.945c-1.059 0-1.922-0.862-1.922-1.922v-17.011h17.789v17.011zM27.205 7.677c0 1.060-0.862 1.922-1.922 1.922h-18.566c-1.059 0-1.922-0.862-1.922-1.922v-0.188c0-1.060 0.862-1.922 1.922-1.922h18.566c1.059 0 1.922 0.862 1.922 1.922v0.188z"></path>
                                            <path d="M11.352 28.049c0.479 0 0.867-0.388 0.867-0.867v-9.761c0-0.479-0.388-0.867-0.867-0.867s-0.867 0.388-0.867 0.867v9.761c-0 0.479 0.388 0.867 0.867 0.867z"></path>
                                            <path d="M16 28.049c0.479 0 0.867-0.388 0.867-0.867v-9.761c0-0.479-0.388-0.867-0.867-0.867s-0.867 0.388-0.867 0.867v9.761c0 0.479 0.388 0.867 0.867 0.867z"></path>
                                            <path d="M20.648 28.049c0.479 0 0.867-0.388 0.867-0.867v-9.761c0-0.479-0.388-0.867-0.867-0.867s-0.867 0.388-0.867 0.867v9.761c-0 0.479 0.388 0.867 0.867 0.867z"></path>
                                        </svg>
                                    </button>
                                </footer>
                                <textarea name="txt_block" id="ctrl_text" rows="3" placeholder="Digite seu texto"></textarea>
                                <input type="hidden" class="nm_fields" name="num_fields">
                            </label>
                    <?php endif; ?>

                </div>
                <button class="add_log block">
                    <svg id="icon-plus" viewBox="0 0 32 32">
                        <title>plus</title>
                        <path d="M31 12h-11v-11c0-0.552-0.448-1-1-1h-6c-0.552 0-1 0.448-1 1v11h-11c-0.552 0-1 0.448-1 1v6c0 0.552 0.448 1 1 1h11v11c0 0.552 0.448 1 1 1h6c0.552 0 1-0.448 1-1v-11h11c0.552 0 1-0.448 1-1v-6c0-0.552-0.448-1-1-1z"></path>
                    </svg>
                    Adicionar Marca
                </button>
                <input type="hidden" class="items_fields" name="imgs" value="<?php echo esc_attr($this->value()); ?>" <?php $this->link(); ?>>
            </div>
<?php
        }
    }
    /**
     * Info Control
     */
    class Info_Custom_control extends WP_Customize_Control{
        public $type = 'info';
        public function render_content(){
            ?>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <p><?php echo wp_kses_post($this->description); ?></p>
            <?php
        }
    }

    /**
     * Toggle control
     */

    class Toggle_Checkbox_Custom_control extends WP_Customize_Control{
        public $type = 'toogle_checkbox';
        public function enqueue(){
            wp_enqueue_style( 'custom_controls_css', get_template_directory_uri().'/assets/css/controlls/dynamic_images.css');
        }
        public function render_content(){
            ?>
            <div class="checkbox_switch">
                <div class="onoffswitch">
                    <input type="checkbox" id="<?php echo esc_attr($this->id); ?>" name="<?php echo esc_attr($this->id); ?>" class="onoffswitch-checkbox" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); checked( $this->value() ); ?>>
                    <label class="onoffswitch-label" for="<?php echo esc_attr($this->id); ?>"></label>
                </div>
                <span class="customize-control-title onoffswitch_label"><?php echo esc_html( $this->label ); ?></span>
                <p><?php echo wp_kses_post($this->description); ?></p>
            </div>
            <?php
        }
    }

    /* Custom Separator */

    class Separator_Custom_control extends WP_Customize_Control{
        public $type = 'separator';
        public function render_content(){
            ?>
            <p><hr></p>
            <?php
        }
    }
} //End Class

/* 
 * Smk Theme View
 *
 * Do not replace your theme functions.php file! Copy the code from this file in your 
 * theme functions.php on top of other files that are included.
 *
 * -------------------------------------------------------------------------------------
 * @Author: Smartik
 * @Author URI: http://smartik.ws/
 * @Copyright: (c) 2014 Smartik. All rights reserved
 * -------------------------------------------------------------------------------------
 *
 * @Date:   2014-06-20 03:40:47
 * @Last Modified by:   Smartik
 * @Last Modified time: 2014-06-23 22:46:40
 *
 */
################################################################################
/**
 * Theme View
 *
 * Include a file and(optionally) pass arguments to it.
 *
 * @param string $file The file path, relative to theme root
 * @param array $args The arguments to pass to this file. Optional.
 * Default empty array.
 *
 * @return object Use render() method to display the content.
 */
if ( ! class_exists('Smk_ThemeView') ) {
	class Smk_ThemeView{
		private $args;
		private $file;
 
		public function __get($name) {
			return $this->args[$name];
		}
 
		public function __construct($file, $args = array()) {
			$this->file = $file;
			$this->args = $args;
		}
 
		public function __isset($name){
			return isset( $this->args[$name] );
		}
 
		public function render() {
			if( locate_template($this->file) ){
				include( locate_template($this->file) );//Theme Check free. Child themes support.
			}
		}
	}
}
################################################################################
/**
 * Smk Get Template Part
 *
 * An alternative to the native WP function `get_template_part`
 *
 * @see PHP class Smk_ThemeView
 * @param string $file The file path, relative to theme root
 * @param array $args The arguments to pass to this file. Optional.
 * Default empty array.
 * 
 * @return string The HTML from $file
 */
if( ! function_exists('smk_get_template_part') ){
	function smk_get_template_part($file, $args = array()){
		$template = new Smk_ThemeView($file, $args);
		$template->render();
	}
}


