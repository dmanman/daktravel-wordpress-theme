<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

function daktravel_homepage_credential_text_mark( $html, $attachment_id, $size, $icon, $attr ) {
    if ( ! is_front_page() || empty( $attr['class'] ) || false === strpos( (string) $attr['class'], 'credential-logo-image' ) ) {
        return $html;
    }

    $alt = isset( $attr['alt'] ) ? (string) $attr['alt'] : '';
    if ( false !== stripos( $alt, 'IATA' ) ) {
        $label = 'IATA';
    } elseif ( false !== stripos( $alt, 'ASATA' ) ) {
        $label = 'ASATA';
    } else {
        $label = 'CT';
    }

    return '<span class="credential-mark credential-mark--text">' . esc_html( $label ) . '</span>';
}
add_filter( 'wp_get_attachment_image', 'daktravel_homepage_credential_text_mark', 50, 5 );

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
