<?php
// Theme setup
function qatar_tender_theme_setup() {
    // Add support for title tag
    add_theme_support( 'title-tag' );

    // Add support for post thumbnails
    add_theme_support( 'post-thumbnails' );

    // Add support for RTL
    load_theme_textdomain( 'qatar-tender', get_template_directory() . '/languages' );
    add_theme_support( 'rtl' );

    // Register navigation menu
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'qatar-tender' ),
    ) );
}
add_action( 'after_setup_theme', 'qatar_tender_theme_setup' );

// Enqueue styles and scripts
function qatar_tender_enqueue_scripts() {
    wp_enqueue_style( 'qatar-tender-style', get_stylesheet_uri() );
    // Add Google Fonts - example with Cairo font for Arabic
    wp_enqueue_style( 'qatar-tender-google-fonts', 'https://fonts.googleapis.com/css2?family=Cairo&display=swap', false );
}
add_action( 'wp_enqueue_scripts', 'qatar_tender_enqueue_scripts' );
?>
