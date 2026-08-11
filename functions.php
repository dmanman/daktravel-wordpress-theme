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
        'daktravel-fonts',
        'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;1,400;1,500&family=Manrope:wght@400;500;600;700&display=swap',
        array(),
        null
    );

    wp_enqueue_style( 'daktravel-style', get_stylesheet_uri(), array( 'daktravel-fonts' ), $theme_version );

    $premium_css_path = get_template_directory() . '/assets/css/premium-refine.css';
    wp_enqueue_style( 'daktravel-premium-refine', get_template_directory_uri() . '/assets/css/premium-refine.css', array( 'daktravel-style' ), file_exists( $premium_css_path ) ? (string) filemtime( $premium_css_path ) : $theme_version );

    $trust_css_path = get_template_directory() . '/assets/css/trust-refine.css';
    wp_enqueue_style( 'daktravel-trust-refine', get_template_directory_uri() . '/assets/css/trust-refine.css', array( 'daktravel-premium-refine' ), file_exists( $trust_css_path ) ? (string) filemtime( $trust_css_path ) : $theme_version );

    $luxury_css_path = get_template_directory() . '/assets/css/luxury-simple.css';
    wp_enqueue_style( 'daktravel-luxury-simple', get_template_directory_uri() . '/assets/css/luxury-simple.css', array( 'daktravel-trust-refine' ), file_exists( $luxury_css_path ) ? (string) filemtime( $luxury_css_path ) : $theme_version );

    $silver_css_path = get_template_directory() . '/assets/css/silver-refine.css';
    wp_enqueue_style( 'daktravel-silver-refine', get_template_directory_uri() . '/assets/css/silver-refine.css', array( 'daktravel-luxury-simple' ), file_exists( $silver_css_path ) ? (string) filemtime( $silver_css_path ) : $theme_version );

    $atelier_css_path = get_template_directory() . '/assets/css/atelier-premium.css';
    wp_enqueue_style( 'daktravel-atelier-premium', get_template_directory_uri() . '/assets/css/atelier-premium.css', array( 'daktravel-silver-refine' ), file_exists( $atelier_css_path ) ? (string) filemtime( $atelier_css_path ) : $theme_version );

    $typography_css_path = get_template_directory() . '/assets/css/typography-premium.css';
    wp_enqueue_style( 'daktravel-typography-premium', get_template_directory_uri() . '/assets/css/typography-premium.css', array( 'daktravel-atelier-premium', 'daktravel-fonts' ), file_exists( $typography_css_path ) ? (string) filemtime( $typography_css_path ) : $theme_version );

    $mobile_css_path = get_template_directory() . '/assets/css/mobile-clarity.css';
    wp_enqueue_style( 'daktravel-mobile-clarity', get_template_directory_uri() . '/assets/css/mobile-clarity.css', array( 'daktravel-typography-premium' ), file_exists( $mobile_css_path ) ? (string) filemtime( $mobile_css_path ) : $theme_version );

    $interactions_path = get_template_directory() . '/assets/js/site-interactions.js';
    wp_enqueue_script( 'daktravel-site-interactions', get_template_directory_uri() . '/assets/js/site-interactions.js', array(), file_exists( $interactions_path ) ? (string) filemtime( $interactions_path ) : $theme_version, true );

    /*
     * Homepage specialist panel image.
     * Deliberately does NOT use daktravel_hero_image, because that older setting
     * may contain the About portrait. The woman must remain on About only.
     * Use a Tel Aviv image from the media library when available, otherwise a
     * restrained Tel Aviv skyline fallback under a strong navy overlay.
     */
    $specialist_image = daktravel_media_url( 'daktravel_telaviv_image', 'full' );
    if ( ! $specialist_image ) {
        $specialist_image = 'https://images.unsplash.com/photo-1646226303063-1e5334284894?auto=format&fit=crop&fm=jpg&q=82&w=1800';
    }

    $inline_css = '.hero-media{background-image:linear-gradient(145deg,rgba(6,17,27,.91),rgba(16,38,61,.74)),url("' . esc_url_raw( $specialist_image ) . '")!important;background-size:cover!important;background-position:center!important;}';
    wp_add_inline_style( 'daktravel-mobile-clarity', $inline_css );
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

require_once get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/inc/site-pages.php';
require_once get_template_directory() . '/inc/enquiry-form.php';
require_once get_template_directory() . '/inc/seo.php';
