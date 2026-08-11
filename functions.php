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

    wp_enqueue_style(
        'daktravel-style',
        get_stylesheet_uri(),
        array( 'daktravel-fonts' ),
        $theme_version
    );

    $premium_css_path = get_template_directory() . '/assets/css/premium-refine.css';
    $premium_css_ver  = file_exists( $premium_css_path ) ? (string) filemtime( $premium_css_path ) : $theme_version;
    wp_enqueue_style(
        'daktravel-premium-refine',
        get_template_directory_uri() . '/assets/css/premium-refine.css',
        array( 'daktravel-style' ),
        $premium_css_ver
    );

    $trust_css_path = get_template_directory() . '/assets/css/trust-refine.css';
    $trust_css_ver  = file_exists( $trust_css_path ) ? (string) filemtime( $trust_css_path ) : $theme_version;
    wp_enqueue_style(
        'daktravel-trust-refine',
        get_template_directory_uri() . '/assets/css/trust-refine.css',
        array( 'daktravel-premium-refine' ),
        $trust_css_ver
    );

    $luxury_css_path = get_template_directory() . '/assets/css/luxury-simple.css';
    $luxury_css_ver  = file_exists( $luxury_css_path ) ? (string) filemtime( $luxury_css_path ) : $theme_version;
    wp_enqueue_style(
        'daktravel-luxury-simple',
        get_template_directory_uri() . '/assets/css/luxury-simple.css',
        array( 'daktravel-trust-refine' ),
        $luxury_css_ver
    );

    $silver_css_path = get_template_directory() . '/assets/css/silver-refine.css';
    $silver_css_ver  = file_exists( $silver_css_path ) ? (string) filemtime( $silver_css_path ) : $theme_version;
    wp_enqueue_style(
        'daktravel-silver-refine',
        get_template_directory_uri() . '/assets/css/silver-refine.css',
        array( 'daktravel-luxury-simple' ),
        $silver_css_ver
    );

    $atelier_css_path = get_template_directory() . '/assets/css/atelier-premium.css';
    $atelier_css_ver  = file_exists( $atelier_css_path ) ? (string) filemtime( $atelier_css_path ) : $theme_version;
    wp_enqueue_style(
        'daktravel-atelier-premium',
        get_template_directory_uri() . '/assets/css/atelier-premium.css',
        array( 'daktravel-silver-refine' ),
        $atelier_css_ver
    );

    $typography_css_path = get_template_directory() . '/assets/css/typography-premium.css';
    $typography_css_ver  = file_exists( $typography_css_path ) ? (string) filemtime( $typography_css_path ) : $theme_version;
    wp_enqueue_style(
        'daktravel-typography-premium',
        get_template_directory_uri() . '/assets/css/typography-premium.css',
        array( 'daktravel-atelier-premium', 'daktravel-fonts' ),
        $typography_css_ver
    );

    $mobile_css_path = get_template_directory() . '/assets/css/mobile-clarity.css';
    $mobile_css_ver  = file_exists( $mobile_css_path ) ? (string) filemtime( $mobile_css_path ) : $theme_version;
    wp_enqueue_style(
        'daktravel-mobile-clarity',
        get_template_directory_uri() . '/assets/css/mobile-clarity.css',
        array( 'daktravel-typography-premium' ),
        $mobile_css_ver
    );

    $interactions_path = get_template_directory() . '/assets/js/site-interactions.js';
    $interactions_ver  = file_exists( $interactions_path ) ? (string) filemtime( $interactions_path ) : $theme_version;
    wp_enqueue_script(
        'daktravel-site-interactions',
        get_template_directory_uri() . '/assets/js/site-interactions.js',
        array(),
        $interactions_ver,
        true
    );

    /* Apply the selected real homepage photography. Credential logos are rendered
       as real <img> elements in the templates for better clarity and accessibility. */
    $inline_css = '';
    $hero_image = daktravel_media_url( 'daktravel_hero_image', 'full' );
    if ( $hero_image ) {
        $inline_css .= '.hero-media{background-image:linear-gradient(145deg,rgba(8,20,31,.72),rgba(16,38,61,.46)),url("' . esc_url_raw( $hero_image ) . '")!important;background-size:cover!important;background-position:center!important;}';
    }

    if ( $inline_css ) {
        wp_add_inline_style( 'daktravel-mobile-clarity', $inline_css );
    }
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
    $base = 'https://api.whatsapp.com/send?phone=27824406144';
    return $message ? $base . '&text=' . rawurlencode( $message ) : $base;
}

// Editable real photography and approved organisation logos.
require_once get_template_directory() . '/inc/customizer.php';

// Ensure all theme-linked WordPress pages actually exist so their page templates render.
require_once get_template_directory() . '/inc/site-pages.php';

// Simple form-to-email enquiry component.
require_once get_template_directory() . '/inc/enquiry-form.php';

// Lightweight SEO defaults, social metadata and TravelAgency structured data.
require_once get_template_directory() . '/inc/seo.php';
