<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

function daktravel_hebrew_to_israel_template_override( $template ) {
    if ( ! function_exists( 'daktravel_hebrew_path_key' ) || 'to-israel' !== daktravel_hebrew_path_key() ) {
        return $template;
    }

    $native = get_template_directory() . '/templates/hebrew-to-israel.php';
    return file_exists( $native ) ? $native : $template;
}
add_filter( 'template_include', 'daktravel_hebrew_to_israel_template_override', 20000 );

require_once get_template_directory() . '/inc/hebrew-existing-booking-template.php';
require_once get_template_directory() . '/inc/home-lcp.php';
