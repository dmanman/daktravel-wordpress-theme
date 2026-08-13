<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

function daktravel_hebrew_info_template_override( $template ) {
    if ( ! function_exists( 'daktravel_hebrew_path_key' ) ) { return $template; }
    $key = daktravel_hebrew_path_key();
    if ( ! in_array( $key, array( 'eta-il', 'sars' ), true ) ) { return $template; }
    $native = get_template_directory() . '/templates/hebrew-info.php';
    return file_exists( $native ) ? $native : $template;
}
add_filter( 'template_include', 'daktravel_hebrew_info_template_override', 22000 );
