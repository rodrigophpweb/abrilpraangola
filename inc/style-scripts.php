<?php

// WP enqueue scripts and styles
//Insert style bootstrap 5.1 url and script bootstrap 5.1 url
function files_scripts(){
    wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css', array(), '5.1.0', 'all' );
    wp_enqueue_script( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', array('jquery'), '5.1.0', true );
}
add_action('wp_enqueue_scripts', 'files_scripts');

//Put CSS in Footer
function prefix_add_footer_styles() {
    wp_enqueue_style( 'style', get_stylesheet_uri());  
  };
  add_action( 'get_footer', 'prefix_add_footer_styles' );
  
//Removendo CSS do Guttenberg
function remove_wp_block_library_css(){
wp_dequeue_style( 'wp-block-library' );
wp_dequeue_style( 'wp-block-library-theme' );
wp_dequeue_style( 'wc-block-style' ); // Remove WooCommerce block CSS
} 
add_action( 'wp_enqueue_scripts', 'remove_wp_block_library_css', 100 );

//Remove version of WordPress on Files CSS and JS
function sdt_remove_ver_css_js( $src, $handle ) {
$handles_with_version = [ 'style' ]; // <-- Adjust to your needs!
if ( strpos( $src, 'ver=' ) && ! in_array( $handle, $handles_with_version, true ) )
    $src = remove_query_arg( 'ver', $src );
return $src;
}
add_filter( 'style_loader_src',  'sdt_remove_ver_css_js', 9999, 2 );