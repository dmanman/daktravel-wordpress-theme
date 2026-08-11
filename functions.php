<?php
/**
 * D.A.K Travel theme functions.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function daktravel_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );

    register_nav_menus(
        array(
            'primary' => __( 'Primary Menu', 'daktravel' ),
            'footer'  => __( 'Footer Menu', 'daktravel' ),
        )
    );
}
add_action( 'after_setup_theme', 'daktravel_setup' );

function daktravel_enqueue_assets() {
    $theme_version = wp_get_theme()->get( 'Version' );

    wp_enqueue_style(
        'daktravel-style',
        get_stylesheet_uri(),
        array(),
        $theme_version
    );

    wp_enqueue_style(
        'daktravel-premium-refine',
        get_template_directory_uri() . '/assets/css/premium-refine.css',
        array( 'daktravel-style' ),
        $theme_version . '-premium-1'
    );
}
add_action( 'wp_enqueue_scripts', 'daktravel_enqueue_assets' );

function daktravel_register_post_types() {
    register_post_type(
        'dak_case_study',
        array(
            'labels' => array(
                'name'          => __( 'Case Studies', 'daktravel' ),
                'singular_name' => __( 'Case Study', 'daktravel' ),
            ),
            'public'       => true,
            'show_in_rest' => true,
            'menu_icon'    => 'dashicons-clipboard',
            'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
            'rewrite'      => array( 'slug' => 'case-studies' ),
        )
    );
}
add_action( 'init', 'daktravel_register_post_types' );

function daktravel_whatsapp_url( $message = '' ) {
    $base = 'https://wa.me/27824406144';
    return $message ? $base . '?text=' . rawurlencode( $message ) : $base;
}

// Lightweight SEO defaults, social metadata and TravelAgency structured data.
require_once get_template_directory() . '/inc/seo.php';
