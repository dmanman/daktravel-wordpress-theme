<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

function daktravel_late_prune_homepage_google_jquery() {
    if ( ! is_front_page() ) { return; }

    global $wp_scripts;
    if ( ! ( $wp_scripts instanceof WP_Scripts ) ) { return; }

    foreach ( (array) $wp_scripts->queue as $handle ) {
        if ( empty( $wp_scripts->registered[ $handle ] ) ) { continue; }
        $src = (string) $wp_scripts->registered[ $handle ]->src;
        if ( false !== stripos( $src, 'ajax.googleapis.com/ajax/libs/jquery/1.11.3/' ) || false !== stripos( $src, 'ajax.googleapis.com/ajax/libs/webfont/' ) ) {
            wp_dequeue_script( $handle );
        }
    }
}
add_action( 'wp_head', 'daktravel_late_prune_homepage_google_jquery', 8 );
add_action( 'wp_footer', 'daktravel_late_prune_homepage_google_jquery', 18 );

function daktravel_homepage_contrast_patch() {
    if ( ! is_front_page() ) { return; }
    echo '<style id="dak-homepage-contrast-patch">.home .confidentiality-section .eyebrow{color:#73532d!important;opacity:1!important;}</style>';
}
add_action( 'wp_head', 'daktravel_homepage_contrast_patch', 99 );

function daktravel_trim_global_font_request( $src, $handle ) {
    if ( 'daktravel-fonts' !== $handle || false === strpos( $src, 'fonts.googleapis.com/css2' ) ) {
        return $src;
    }
    $src = str_replace( '&family=Noto+Sans+Hebrew:wght@400..800', '', $src );
    $src = str_replace( '&family=Noto+Serif+Hebrew:wght@400..700', '', $src );
    return $src;
}
add_filter( 'style_loader_src', 'daktravel_trim_global_font_request', 50, 2 );

function daktravel_preload_homepage_hero() {
    if ( ! is_front_page() ) { return; }
    echo '<link rel="preload" as="image" href="https://images.pexels.com/photos/8495975/pexels-photo-8495975.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=720" fetchpriority="high">' . "\n";
    echo '<link rel="preconnect" href="https://a.mailmunch.co" crossorigin>' . "\n";
}
add_action( 'wp_head', 'daktravel_preload_homepage_hero', 2 );

function daktravel_defer_mailmunch_script_tag( $tag, $handle, $src ) {
    if ( ! is_front_page() || false === stripos( (string) $src, 'mailmunch.co/app/v1/site.js' ) ) {
        return $tag;
    }
    if ( false === stripos( $tag, ' defer' ) && false === stripos( $tag, ' async' ) ) {
        $tag = str_replace( '<script ', '<script defer ', $tag );
    }
    return $tag;
}
add_filter( 'script_loader_tag', 'daktravel_defer_mailmunch_script_tag', 50, 3 );

require_once get_template_directory() . '/inc/hebrew-to-israel-template.php';
