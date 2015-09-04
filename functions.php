<?php

// Remove WP version meta
remove_action('wp_head', 'wp_generator');

// Load custom scripts 
function custom_scripts() { 
    // Remove parent jQuery
    //  wp_deregister_script( 'upbootwp-jQuery' );
    //  wp_dequeue_script( 'upbootwp-basefile' );
    // Register css
    // Register js
    wp_register_script( 'cycle2', get_stylesheet_directory_uri().'/js/jquery.cycle2.min.js', array(), '2.1.5', true );
    wp_register_script( 'cycle-swipe', get_stylesheet_directory_uri().'/js/jquery.cycle2.swipe.min.js', array(), '2.1.5', true );
    wp_register_script( 'homepage', get_stylesheet_directory_uri().'/js/homepage.js', array(), '1.0', true );
    // Enqueue global css
    wp_enqueue_style( 'font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css' );
    wp_enqueue_style( 'tgm', get_stylesheet_directory_uri().'/css/tgm.css', array( 'upbootwp-css' ), '1.0' );
    // Enqueue global js
    //  wp_enqueue_script( 'jquery-2-1-1', '//code.jquery.com/jquery-2.1.1.min.js', array(), '2.1.1', true );
    //  wp_enqueue_script( 'upbootwp-basefile' );
    wp_enqueue_script( 'js', get_stylesheet_directory_uri().'/js/js.js', array(), '1.0', true );
    // Enqueue home page js
    if ( is_front_page() ) {
        wp_enqueue_script( 'cycle2' );
        wp_enqueue_script( 'cycle-swipe' );
        wp_enqueue_script( 'homepage' );
    }
}
add_action( 'wp_enqueue_scripts', 'custom_scripts', 100 );

add_filter( 'wp_feed_cache_transient_lifetime', 
   create_function('$a', 'return 600;') );

// Add ACF Options Page
if(function_exists('acf_add_options_page')) { 
    acf_add_options_page();
}

// Move Options menu link
function custom_menu_order( $menu_ord ) {  
    if (!$menu_ord) return true;  
    $menu = 'acf-options';    
    $menu_ord = array_diff($menu_ord, array( $menu ));
    array_splice( $menu_ord, 1, 0, array( $menu ) );
    return $menu_ord;
}  
add_filter('custom_menu_order', 'custom_menu_order'); 
add_filter('menu_order', 'custom_menu_order');


/**
*   Enable shortcodes
*/
add_filter('widget_text', 'do_shortcode');
add_filter('the_content', 'do_shortcode');
?>
