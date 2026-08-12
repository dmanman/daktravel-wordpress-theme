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

/**
 * Refinement styles are authored as separate files for maintainability but are
 * served to visitors as one hashed static file. The bundle automatically gets a
 * new filename whenever any source file changes, so long-lived browser caching
 * remains safe.
 */
function daktravel_refinement_css_files() {
    return array(
        'assets/css/premium-refine.css',
        'assets/css/trust-refine.css',
        'assets/css/luxury-simple.css',
        'assets/css/silver-refine.css',
        'assets/css/atelier-premium.css',
        'assets/css/typography-premium.css',
        'assets/css/mobile-clarity.css',
        'assets/css/multilingual.css',
    );
}

function daktravel_refinement_css_bundle() {
    static $bundle = null;

    if ( null !== $bundle ) {
        return $bundle;
    }

    $theme_dir = trailingslashit( get_template_directory() );
    $files     = daktravel_refinement_css_files();
    $signature = array();

    foreach ( $files as $relative_path ) {
        $path = $theme_dir . $relative_path;
        if ( ! is_readable( $path ) ) {
            $bundle = false;
            return $bundle;
        }
        $signature[] = $relative_path . ':' . filemtime( $path ) . ':' . filesize( $path );
    }

    $hash       = substr( md5( implode( '|', $signature ) ), 0, 14 );
    $uploads    = wp_upload_dir();
    $cache_dir  = trailingslashit( $uploads['basedir'] ) . 'daktravel-cache';
    $cache_url  = trailingslashit( $uploads['baseurl'] ) . 'daktravel-cache';
    $filename   = 'site-refinements-' . $hash . '.css';
    $bundle_path = trailingslashit( $cache_dir ) . $filename;
    $bundle_url  = trailingslashit( $cache_url ) . $filename;

    if ( ! empty( $uploads['error'] ) ) {
        $bundle = false;
        return $bundle;
    }

    if ( ! file_exists( $bundle_path ) ) {
        if ( ! wp_mkdir_p( $cache_dir ) ) {
            $bundle = false;
            return $bundle;
        }

        $contents = "/* D.A.K Travel generated refinement bundle. Do not edit directly. */\n";
        foreach ( $files as $relative_path ) {
            $css = file_get_contents( $theme_dir . $relative_path );
            if ( false === $css ) {
                $bundle = false;
                return $bundle;
            }
            $contents .= "\n/* Source: " . $relative_path . " */\n" . $css . "\n";
        }

        if ( false === file_put_contents( $bundle_path, $contents, LOCK_EX ) ) {
            $bundle = false;
            return $bundle;
        }

        foreach ( glob( trailingslashit( $cache_dir ) . 'site-refinements-*.css' ) as $old_bundle ) {
            if ( $old_bundle !== $bundle_path && is_file( $old_bundle ) ) {
                @unlink( $old_bundle );
            }
        }
    }

    $bundle = array(
        'url'     => $bundle_url,
        'version' => $hash,
    );

    return $bundle;
}

function daktravel_enqueue_refinement_fallback( $theme_version ) {
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
}

function daktravel_enqueue_assets() {
    $theme_version = wp_get_theme()->get( 'Version' );

    /*
     * Use variable font ranges rather than requesting a separate file for every
     * individual weight. This preserves the current typography while reducing
     * the number of font resources required by modern browsers.
     */
    wp_enqueue_style(
        'daktravel-fonts',
        'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400..600;1,400..500&family=Manrope:wght@400..800&display=swap',
        array(),
        null
    );

    wp_enqueue_style( 'daktravel-style', get_stylesheet_uri(), array( 'daktravel-fonts' ), $theme_version );

    $refinement_bundle = daktravel_refinement_css_bundle();
    if ( $refinement_bundle ) {
        wp_enqueue_style(
            'daktravel-multilingual',
            $refinement_bundle['url'],
            array( 'daktravel-style', 'daktravel-fonts' ),
            $refinement_bundle['version']
        );
    } else {
        daktravel_enqueue_refinement_fallback( $theme_version );
    }

    /* The interaction script is only used by the conditional enquiry form. */
    if ( is_page( 'contact' ) ) {
        $interactions_path = get_template_directory() . '/assets/js/site-interactions.js';
        wp_enqueue_script( 'daktravel-site-interactions', get_template_directory_uri() . '/assets/js/site-interactions.js', array(), file_exists( $interactions_path ) ? (string) filemtime( $interactions_path ) : $theme_version, true );
        wp_script_add_data( 'daktravel-site-interactions', 'strategy', 'defer' );
    }

    /* The About portrait must never appear on the homepage. */
    $inline_css  = '.home img[src*="photo.small_.yk_"],.home img[src*="photo.small.yk"],.home img[src*="yochee" i],.home img[srcset*="photo.small"],.home img[srcset*="yochee" i],.home img[data-src*="photo.small"],.home img[data-src*="yochee" i],.home img[alt*="Yochee" i],.home img[title*="Yochee" i]{display:none!important;}';

    /* Trust copy is text-only; preserve only the real credential-logo images in the panel. */
    $inline_css .= '.home .trust-copy{min-height:0!important;padding-right:0!important;}';
    $inline_css .= '.home .trust-copy::before,.home .trust-copy::after{content:none!important;display:none!important;background:none!important;}';
    $inline_css .= '.home .trust-section img:not(.credential-logo-image){display:none!important;}';

    wp_add_inline_style( 'daktravel-multilingual', $inline_css );
}
add_action( 'wp_enqueue_scripts', 'daktravel_enqueue_assets' );

/**
 * Establish the third-party connections that are required above the fold before
 * their resources are discovered later in the document.
 */
function daktravel_output_performance_hints() {
    echo "\n<link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">\n";
    echo "<link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin>\n";

    if ( is_front_page() ) {
        echo "<link rel=\"preconnect\" href=\"https://images.pexels.com\">\n";
    }
}
add_action( 'wp_head', 'daktravel_output_performance_hints', 0 );

/**
 * Preload the homepage LCP image with the same responsive candidates used by
 * the actual hero image so a phone does not preload the desktop-sized asset.
 */
function daktravel_preload_home_hero() {
    if ( ! is_front_page() ) {
        return;
    }

    $sizes         = '(max-width: 680px) calc(100vw - 28px), (max-width: 900px) calc(100vw - 36px), 52vw';
    $attachment_id = function_exists( 'daktravel_media_attachment_id' ) ? daktravel_media_attachment_id( 'daktravel_hero_image' ) : 0;

    if ( $attachment_id ) {
        $src    = wp_get_attachment_image_url( $attachment_id, 'large' );
        $srcset = wp_get_attachment_image_srcset( $attachment_id, 'large' );

        if ( $src ) {
            printf(
                "\n<link rel=\"preload\" as=\"image\" href=\"%1$s\"%2$s imagesizes=\"%3$s\" fetchpriority=\"high\">\n",
                esc_url( $src ),
                $srcset ? ' imagesrcset="' . esc_attr( $srcset ) . '"' : '',
                esc_attr( $sizes )
            );
        }
        return;
    }

    $src = 'https://images.pexels.com/photos/8495975/pexels-photo-8495975.jpeg?auto=compress&cs=tinysrgb&w=1600';
    $srcset = implode(
        ', ',
        array(
            'https://images.pexels.com/photos/8495975/pexels-photo-8495975.jpeg?auto=compress&cs=tinysrgb&w=720 720w',
            'https://images.pexels.com/photos/8495975/pexels-photo-8495975.jpeg?auto=compress&cs=tinysrgb&w=1100 1100w',
            'https://images.pexels.com/photos/8495975/pexels-photo-8495975.jpeg?auto=compress&cs=tinysrgb&w=1600 1600w',
        )
    );

    printf(
        "\n<link rel=\"preload\" as=\"image\" href=\"%1$s\" imagesrcset=\"%2$s\" imagesizes=\"%3$s\" fetchpriority=\"high\">\n",
        esc_url( $src ),
        esc_attr( $srcset ),
        esc_attr( $sizes )
    );
}
add_action( 'wp_head', 'daktravel_preload_home_hero', 1 );

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
