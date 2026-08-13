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

function daktravel_is_hebrew_request_path() {
    $uri  = isset( $_SERVER['REQUEST_URI'] ) ? wp_unslash( $_SERVER['REQUEST_URI'] ) : '';
    $path = is_string( $uri ) ? wp_parse_url( $uri, PHP_URL_PATH ) : '';
    return is_string( $path ) && 1 === preg_match( '#^/he(?:/|$)#', $path );
}

function daktravel_trim_global_font_request( $src, $handle ) {
    if ( 'daktravel-fonts' !== $handle || false === strpos( $src, 'fonts.googleapis.com/css2' ) || daktravel_is_hebrew_request_path() ) {
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

function daktravel_delay_direct_mailmunch_html( $html ) {
    if ( ! is_front_page() || false === stripos( $html, 'a.mailmunch.co/app/v1/site.js' ) ) {
        return $html;
    }

    $pattern = '#<script\b[^>]*\bsrc=(["\'])(https?:)?//a\.mailmunch\.co/app/v1/site\.js([^"\']*)\1[^>]*>\s*</script>#i';

    return preg_replace_callback(
        $pattern,
        static function ( $matches ) {
            $src = 'https://a.mailmunch.co/app/v1/site.js' . ( isset( $matches[3] ) ? html_entity_decode( $matches[3], ENT_QUOTES, 'UTF-8' ) : '' );
            return '<script id="dak-mailmunch-delayed">window.addEventListener("load",function(){window.setTimeout(function(){var s=document.createElement("script");s.src=' . wp_json_encode( $src ) . ';s.async=true;document.body.appendChild(s);},1200);},{once:true});</script>';
        },
        $html,
        1
    );
}

function daktravel_start_homepage_output_buffer() {
    if ( is_front_page() && ! is_admin() ) {
        ob_start( 'daktravel_delay_direct_mailmunch_html' );
    }
}
add_action( 'template_redirect', 'daktravel_start_homepage_output_buffer', 0 );

require_once get_template_directory() . '/inc/hebrew-to-israel-template.php';
