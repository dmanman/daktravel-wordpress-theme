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

require_once get_template_directory() . '/inc/hebrew-to-israel-template.php';
