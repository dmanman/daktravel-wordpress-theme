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

    /* Homepage specialist panel: Israel imagery only. */
    $specialist_image = 'https://images.unsplash.com/photo-1646226303063-1e5334284894?auto=format&fit=crop&fm=jpg&q=82&w=1800';

    $inline_css  = '.hero-media{background-image:linear-gradient(145deg,rgba(6,17,27,.91),rgba(16,38,61,.74)),url("' . esc_url_raw( $specialist_image ) . '")!important;background-size:cover!important;background-position:center!important;}';
    $inline_css .= '.home img[src*="photo.small_.yk_"],.home img[src*="photo.small.yk"],.home img[src*="yochee" i],.home img[srcset*="photo.small"],.home img[srcset*="yochee" i],.home img[data-src*="photo.small"],.home img[data-src*="yochee" i],.home img[alt*="Yochee" i],.home img[title*="Yochee" i]{display:none!important;}';
    /* No photography is permitted beside the homepage trust copy. */
    $inline_css .= '.home .trust-section img{display:none!important;}';
    $inline_css .= '.home .trust-section .credential-mark--logo{font-size:0!important;}';
    $inline_css .= '.home .trust-section .credential-row:nth-of-type(2) .credential-mark--logo::after{content:"IATA";font-size:.72rem;}';
    $inline_css .= '.home .trust-section .credential-row:nth-of-type(3) .credential-mark--logo::after{content:"ASATA";font-size:.72rem;}';
    $inline_css .= '.home .trust-section .credential-row:nth-of-type(4) .credential-mark--logo::after{content:"CT";font-size:.72rem;}';

    wp_add_inline_style( 'daktravel-mobile-clarity', $inline_css );

    if ( is_front_page() ) {
        $remove_home_portrait = <<<'JS'
document.addEventListener('DOMContentLoaded', function () {
    var terms = ['yochee', 'mrs yochee katz', 'photo.small_.yk_', 'photo.small.yk', 'photo-small-yk'];

    document.querySelectorAll('img').forEach(function (img) {
        var haystack = [
            img.getAttribute('src') || '',
            img.getAttribute('srcset') || '',
            img.getAttribute('data-src') || '',
            img.getAttribute('data-lazy-src') || '',
            img.getAttribute('alt') || '',
            img.getAttribute('title') || ''
        ].join(' ').toLowerCase();

        if (terms.some(function (term) { return haystack.indexOf(term) !== -1; })) {
            img.remove();
        }
    });

    document.querySelectorAll('[style]').forEach(function (el) {
        var styleText = (el.getAttribute('style') || '').toLowerCase();
        if (terms.some(function (term) { return styleText.indexOf(term) !== -1; })) {
            el.style.backgroundImage = 'none';
        }
    });
});
JS;
        wp_add_inline_script( 'daktravel-site-interactions', $remove_home_portrait, 'after' );
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

require_once get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/inc/site-pages.php';
require_once get_template_directory() . '/inc/enquiry-form.php';
require_once get_template_directory() . '/inc/seo.php';
