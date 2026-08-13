<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

function daktravel_hebrew_island_key() {
    $uri  = isset( $_SERVER['REQUEST_URI'] ) ? wp_unslash( $_SERVER['REQUEST_URI'] ) : '';
    $path = $uri ? wp_parse_url( $uri, PHP_URL_PATH ) : '';
    if ( ! is_string( $path ) ) { return ''; }
    $path = trim( rawurldecode( $path ), '/' );
    if ( 'he/mauritius-holidays' === $path ) { return 'mauritius'; }
    if ( 'he/zanzibar-holidays' === $path ) { return 'zanzibar'; }
    return '';
}

function daktravel_hebrew_island_template( $template ) {
    if ( ! daktravel_hebrew_island_key() ) { return $template; }
    $island_template = get_template_directory() . '/templates/hebrew-island.php';
    return file_exists( $island_template ) ? $island_template : $template;
}
add_filter( 'template_include', 'daktravel_hebrew_island_template', 11000 );

function daktravel_hebrew_island_status() {
    if ( ! daktravel_hebrew_island_key() ) { return; }
    global $wp_query;
    if ( $wp_query instanceof WP_Query ) { $wp_query->is_404 = false; }
    status_header( 200 );
}
add_action( 'template_redirect', 'daktravel_hebrew_island_status', 1 );

if ( class_exists( 'WP_Sitemaps_Provider' ) && ! class_exists( 'DAK_Hebrew_Sitemap_Provider' ) ) {
    class DAK_Hebrew_Sitemap_Provider extends WP_Sitemaps_Provider {
        public function __construct() {
            $this->name        = 'dak-hebrew';
            $this->object_type = 'dak-hebrew';
        }
        public function get_url_list( $page_num, $object_subtype = '' ) {
            if ( 1 !== (int) $page_num ) { return array(); }
            $paths = array(
                '/he/',
                '/he/flights-to-israel-from-south-africa/',
                '/he/flights-to-south-africa/',
                '/he/groups/',
                '/he/business-travel/',
                '/he/complex-travel/',
                '/he/mauritius-holidays/',
                '/he/zanzibar-holidays/',
                '/he/israel-eta-il-entry-requirements/',
                '/he/south-africa-traveller-declaration/',
                '/he/about/',
                '/he/contact/'
            );
            $urls = array();
            foreach ( $paths as $path ) { $urls[] = array( 'loc' => home_url( $path ) ); }
            return $urls;
        }
        public function get_max_num_pages( $object_subtype = '' ) { return 1; }
    }
}

function daktravel_register_hebrew_sitemap() {
    if ( class_exists( 'DAK_Hebrew_Sitemap_Provider' ) ) {
        wp_register_sitemap_provider( 'dak-hebrew', new DAK_Hebrew_Sitemap_Provider() );
    }
}
add_action( 'wp_sitemaps_init', 'daktravel_register_hebrew_sitemap' );
