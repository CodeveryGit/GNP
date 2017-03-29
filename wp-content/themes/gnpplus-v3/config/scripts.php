<?php

/*
  | ----------------------------------------------------------------------------------------------------------------------
  | Styles and Scripts
  | ----------------------------------------------------------------------------------------------------------------------
  | Add here all your functions that include styles / Scripts into your theme
  |
 */

/**
 * Load Scripts for this theme in front end
 */
function themeScripts() {

    wp_enqueue_script('bootstrap-js', '' . get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), NULL, TRUE);
    wp_enqueue_script('masonry-js', '' . get_template_directory_uri() . '/assets/js/masonry.pkgd.min.js', array('jquery'), NULL, FALSE);

    wp_enqueue_script('docs-js', '' . get_template_directory_uri() . '/assets/js/docs.min.js', array(
        'jquery',
        'bootstrap-js'
            ), NULL, TRUE);

    wp_enqueue_script('modernizr', '' . get_template_directory_uri() . '/assets/js/modernizr.js', array('jquery'), NULL, FALSE);

    wp_enqueue_script('frontend_main', '' . get_template_directory_uri() . '/assets/js/frontend_main.js', array('jquery'), NULL, FALSE);
    
    wp_enqueue_script('filters', '' . get_template_directory_uri() . '/assets/js/filters.js', array('jquery'), NULL, FALSE);
    
    wp_enqueue_script('gnpplus', '' . get_template_directory_uri() . '/assets/js/gnpplus.js', array('jquery'), NULL, FALSE);
    
}

add_action('wp_enqueue_scripts', 'themeScripts');

function admin_scripts() {
    wp_enqueue_script('main_admin', '' . get_template_directory_uri() . '/assets/js/main_admin.js', array('jquery'), NULL, FALSE);
    wp_localize_script('main_admin', 'MyAjax', array(
                          'ajaxurl' => admin_url('admin-ajax.php')
                        , 'home'    => home_url()
                        )
    );
}

add_action('admin_enqueue_scripts', 'admin_scripts');


//----------------------------------------------------------------------------------------------------------------------

/**
 * Load Styles for this theme here
 */
function themeStyles() {

    wp_enqueue_style('bootstrap-css', '' . get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '3.1.1', 'all');
    wp_enqueue_style('font-awesome-css', '' . get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '3.1.1', 'all');
    wp_enqueue_style('ionicons-css', '' . get_template_directory_uri() . '/assets/css/ionicons.min.css', array(), '1.0.0', 'all');
    wp_enqueue_style('general-css', '' . get_template_directory_uri() . '/assets/css/general.css', array(), '1.0.0', 'all');
    wp_enqueue_style('site-css', '' . get_template_directory_uri() . '/assets/css/gnpplus.css', array(), '1.0.0', 'all');
    wp_enqueue_style('filters-css', '' . get_template_directory_uri() . '/assets/css/filters.css', array(), '1.0.0', 'all');
}

add_action('wp_enqueue_scripts', 'themeStyles');

function admin_styles() {
    wp_enqueue_style('admin-css', '' . get_template_directory_uri() . '/assets/css/admin.css', array(), '1.0.0', 'all');
    
}

add_action('admin_enqueue_scripts', 'admin_styles');
