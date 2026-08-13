<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

function daktravel_hebrew_existing_booking_template( $template ) {
    if ( ! function_exists( 'daktravel_hebrew_path_key' ) || 'contact' !== daktravel_hebrew_path_key() ) {
        return $template;
    }
    $type = isset( $_GET['type'] ) ? sanitize_key( wp_unslash( $_GET['type'] ) ) : '';
    if ( 'existing' !== $type ) { return $template; }
    $native = get_template_directory() . '/templates/hebrew-existing-booking.php';
    return file_exists( $native ) ? $native : $template;
}
add_filter( 'template_include', 'daktravel_hebrew_existing_booking_template', 21000 );
