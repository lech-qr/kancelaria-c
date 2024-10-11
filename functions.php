<?php
// Style
function add_CSS() {
   wp_enqueue_style( 'bootstrap', get_template_directory_uri() . "/style/css/bootstrap.min.css");
   wp_enqueue_style( 'custom', get_template_directory_uri() . "/style/css/custom.css");
   wp_enqueue_style( 'responsive', get_template_directory_uri() . "/style/css/media.css");
}
add_action('wp_enqueue_scripts', 'add_CSS');

// Scripts
function add_JS() {
   wp_enqueue_script( 'jquery_', get_template_directory_uri() . "/js/jquery-3.7.1.min.js");
   wp_enqueue_script( 'bootstrap', get_template_directory_uri() . "/js/bootstrap.min.js");
   wp_enqueue_script( 'custom', get_template_directory_uri() . "/js/custom.js");
}
add_action('wp_enqueue_scripts', 'add_JS');

// Register a new sidebar simply named 'sidebar'
function add_widget_support() {
    register_sidebar( array(
                    'name'          => 'Sidebar',
                    'id'            => 'sidebar',
                    'before_widget' => '<div>',
                    'after_widget'  => '</div>',
                    'before_title'  => '<h2>',
                    'after_title'   => '</h2>',
    ) );
}
// Hook the widget initiation and run our function
add_action( 'widgets_init', 'add_widget_support' );


// Register a new navigation menu
function add_Main_Nav() {
    register_nav_menu('header-menu',__( 'Header Menu' ));
  }
  // Hook to the init action hook, run our navigation menu function
  add_action( 'init', 'add_Main_Nav' );

// Włączenie obsługi zdjęć wprowadzających (featured images)
add_theme_support('post-thumbnails');