<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

function daktravel_hebrew_requirement_key() {
    $uri  = isset( $_SERVER['REQUEST_URI'] ) ? wp_unslash( $_SERVER['REQUEST_URI'] ) : '';
    $path = $uri ? wp_parse_url( $uri, PHP_URL_PATH ) : '';
    if ( ! is_string( $path ) ) { return ''; }
    $path = trim( rawurldecode( $path ), '/' );
    if ( 'he/israel-eta-il-entry-requirements' === $path ) { return 'eta'; }
    if ( 'he/south-africa-traveller-declaration' === $path ) { return 'sars'; }
    return '';
}

function daktravel_hebrew_requirement_template( $template ) {
    if ( ! daktravel_hebrew_requirement_key() ) { return $template; }
    $file = get_template_directory() . '/templates/hebrew-requirement.php';
    return file_exists( $file ) ? $file : $template;
}
add_filter( 'template_include', 'daktravel_hebrew_requirement_template', 12000 );

function daktravel_hebrew_requirement_status() {
    if ( ! daktravel_hebrew_requirement_key() ) { return; }
    global $wp_query;
    if ( $wp_query instanceof WP_Query ) { $wp_query->is_404 = false; }
    status_header( 200 );
}
add_action( 'template_redirect', 'daktravel_hebrew_requirement_status', 1 );
