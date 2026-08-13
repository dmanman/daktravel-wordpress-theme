<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function daktravel_hebrew_path_key() {
    $uri  = isset( $_SERVER['REQUEST_URI'] ) ? wp_unslash( $_SERVER['REQUEST_URI'] ) : '';
    $path = $uri ? wp_parse_url( $uri, PHP_URL_PATH ) : '';

    if ( ! is_string( $path ) ) {
        return '';
    }

    $map = array(
        'he'                                      => 'home',
        'he/flights-to-israel-from-south-africa' => 'to-israel',
        'he/flights-to-south-africa'             => 'flights',
        'he/groups'                               => 'groups',
        'he/business-travel'                      => 'business',
        'he/complex-travel'                       => 'complex',
        'he/about'                                => 'about',
        'he/contact'                              => 'contact',
    );

    $path = trim( rawurldecode( $path ), '/' );
    return isset( $map[ $path ] ) ? $map[ $path ] : '';
}

function daktravel_hebrew_path_template( $template ) {
    if ( ! daktravel_hebrew_path_key() ) {
        return $template;
    }

    $hebrew_template = get_template_directory() . '/templates/hebrew-path.php';
    return file_exists( $hebrew_template ) ? $hebrew_template : $template;
}
add_filter( 'template_include', 'daktravel_hebrew_path_template', 10000 );

function daktravel_hebrew_path_status() {
    if ( ! daktravel_hebrew_path_key() ) {
        return;
    }

    global $wp_query;
    if ( $wp_query instanceof WP_Query ) {
        $wp_query->is_404 = false;
    }
    status_header( 200 );
}
add_action( 'template_redirect', 'daktravel_hebrew_path_status', 1 );
