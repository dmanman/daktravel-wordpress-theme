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
        'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400..600;1,400..500&family=Manrope:wght@400..800&display=swap',
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

    $multilingual_css_path = get_template_directory() . '/assets/css/multilingual.css';
    wp_enqueue_style( 'daktravel-multilingual', get_template_directory_uri() . '/assets/css/multilingual.css', array( 'daktravel-mobile-clarity' ), file_exists( $multilingual_css_path ) ? (string) filemtime( $multilingual_css_path ) : $theme_version );

    /* The interaction script is only used by the conditional enquiry form. */
    if ( is_page( 'contact' ) ) {
        $interactions_path = get_template_directory() . '/assets/js/site-interactions.js';
        wp_enqueue_script( 'daktravel-site-interactions', get_template_directory_uri() . '/assets/js/site-interactions.js', array(), file_exists( $interactions_path ) ? (string) filemtime( $interactions_path ) : $theme_version, true );
    }

    /* Homepage specialist panel: Israel imagery only. */
    $specialist_image = 'https://images.unsplash.com/photo-1646226303063-1e5334284894?auto=format&fit=crop&fm=jpg&q=82&w=1800';

    $inline_css  = '.hero-media{background-image:linear-gradient(145deg,rgba(6,17,27,.91),rgba(16,38,61,.74)),url("' . esc_url_raw( $specialist_image ) . '")!important;background-size:cover!important;background-position:center!important;}';

    /* The About portrait must never appear on the homepage. */
    $inline_css .= '.home img[src*="photo.small_.yk_"],.home img[src*="photo.small.yk"],.home img[src*="yochee" i],.home img[srcset*="photo.small"],.home img[srcset*="yochee" i],.home img[data-src*="photo.small"],.home img[data-src*="yochee" i],.home img[alt*="Yochee" i],.home img[title*="Yochee" i]{display:none!important;}';

    /* Trust copy is text-only; preserve only the real credential-logo images in the panel. */
    $inline_css .= '.home .trust-copy{min-height:0!important;padding-right:0!important;}';
    $inline_css .= '.home .trust-copy::before,.home .trust-copy::after{content:none!important;display:none!important;background:none!important;}';
    $inline_css .= '.home .trust-section img:not(.credential-logo-image){display:none!important;}';

    wp_add_inline_style( 'daktravel-multilingual', $inline_css );
}
add_action( 'wp_enqueue_scripts', 'daktravel_enqueue_assets' );

/**
 * Compact TranslatePress language switcher for the top utility bar.
 * The site intentionally supports English, Hebrew and Arabic only.
 */
function daktravel_language_switcher() {
    if ( ! function_exists( 'trp_custom_language_switcher' ) ) {
        return '';
    }

    $languages = trp_custom_language_switcher();
    if ( ! is_array( $languages ) || empty( $languages ) ) {
        return '';
    }

    $labels = array(
        'en' => 'EN',
        'he' => 'עברית',
        'ar' => 'العربية',
    );

    $links = array();
    foreach ( $languages as $language ) {
        $slug = isset( $language['short_language_name'] ) ? strtolower( (string) $language['short_language_name'] ) : '';
        $base = preg_replace( '/[^a-z].*$/', '', $slug );
        if ( ! $base || ! isset( $labels[ $base ] ) || empty( $language['current_page_url'] ) ) {
            continue;
        }

        $links[] = sprintf(
            '<a href="%1$s" hreflang="%2$s" lang="%2$s">%3$s</a>',
            esc_url( $language['current_page_url'] ),
            esc_attr( $base ),
            esc_html( $labels[ $base ] )
        );
    }

    if ( empty( $links ) ) {
        return '';
    }

    return '<nav class="dak-language-switcher" aria-label="Language" data-no-translation>' . implode( '<span aria-hidden="true">·</span>', $links ) . '</nav>';
}

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

require_once get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/inc/site-pages.php';
require_once get_template_directory() . '/inc/enquiry-form.php';
require_once get_template_directory() . '/inc/seo.php';
require_once get_template_directory() . '/inc/seo-audit-enhancements.php';
