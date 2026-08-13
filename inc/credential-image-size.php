<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

function daktravel_small_credential_image( $attachment_id ) {
    static $cache = array();
    $attachment_id = absint( $attachment_id );
    if ( ! $attachment_id ) { return array(); }
    if ( isset( $cache[ $attachment_id ] ) ) { return $cache[ $attachment_id ]; }

    $file = get_attached_file( $attachment_id );
    if ( ! $file || ! file_exists( $file ) ) { return array(); }

    $file = wp_normalize_path( $file );
    $info = pathinfo( $file );
    if ( empty( $info['dirname'] ) || empty( $info['filename'] ) || empty( $info['extension'] ) ) { return array(); }

    $dest = $info['dirname'] . '/' . $info['filename'] . '-dakcred-64.' . strtolower( $info['extension'] );
    if ( ! file_exists( $dest ) ) {
        $editor = wp_get_image_editor( $file );
        if ( is_wp_error( $editor ) ) { return array(); }
        $editor->resize( 64, 64, false );
        $saved = $editor->save( $dest );
        if ( is_wp_error( $saved ) ) { return array(); }
    }

    $uploads = wp_get_upload_dir();
    $basedir = wp_normalize_path( $uploads['basedir'] );
    if ( 0 !== strpos( wp_normalize_path( $dest ), $basedir ) ) { return array(); }

    $dims = wp_getimagesize( $dest );
    if ( ! is_array( $dims ) ) { return array(); }

    $relative = ltrim( str_replace( $basedir, '', wp_normalize_path( $dest ) ), '/' );
    $cache[ $attachment_id ] = array(
        'url'    => trailingslashit( $uploads['baseurl'] ) . $relative,
        'width'  => (int) $dims[0],
        'height' => (int) $dims[1],
    );
    return $cache[ $attachment_id ];
}

function daktravel_swap_credential_image_src( $html, $attachment_id, $size, $icon, $attr ) {
    $class = isset( $attr['class'] ) ? (string) $attr['class'] : '';
    if ( false === strpos( $class, 'credential-logo-image' ) ) { return $html; }

    $small = daktravel_small_credential_image( $attachment_id );
    if ( empty( $small['url'] ) ) { return $html; }

    $html = preg_replace( '/\s+src="[^"]*"/', ' src="' . esc_url( $small['url'] ) . '"', $html, 1 );
    $html = preg_replace( '/\s+srcset="[^"]*"/', '', $html );
    $html = preg_replace( '/\s+sizes="[^"]*"/', '', $html );
    $html = preg_replace( '/\s+width="[^"]*"/', ' width="' . (int) $small['width'] . '"', $html, 1 );
    $html = preg_replace( '/\s+height="[^"]*"/', ' height="' . (int) $small['height'] . '"', $html, 1 );
    return $html;
}
add_filter( 'wp_get_attachment_image', 'daktravel_swap_credential_image_src', 40, 5 );
