<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function daktravel_home_lcp_style() {
    if ( is_front_page() ) {
        echo '<style>.home .hero h1{font-family:Georgia,"Times New Roman",serif!important;}@media(max-width:680px){.home .utility-links{min-width:170px;justify-content:flex-end;}}</style>';
    }
}
add_action( 'wp_head', 'daktravel_home_lcp_style', 1 );

function daktravel_regulatory_english_hreflang() {
    if ( is_page( 'israel-eta-il-entry-requirements' ) ) {
        $en = home_url( '/israel-eta-il-entry-requirements/' );
        $he = home_url( '/he/israel-eta-il-entry-requirements/' );
    } elseif ( is_page( 'south-africa-traveller-declaration' ) ) {
        $en = home_url( '/south-africa-traveller-declaration/' );
        $he = home_url( '/he/south-africa-traveller-declaration/' );
    } else {
        return;
    }
    printf( "<link rel=\"alternate\" hreflang=\"en-ZA\" href=\"%s\">\n", esc_url( $en ) );
    printf( "<link rel=\"alternate\" hreflang=\"he-IL\" href=\"%s\">\n", esc_url( $he ) );
    printf( "<link rel=\"alternate\" hreflang=\"x-default\" href=\"%s\">\n", esc_url( $en ) );
}
add_action( 'wp_head', 'daktravel_regulatory_english_hreflang', 3 );

function daktravel_regulatory_seo_defaults( $defaults ) {
    $defaults['south-africa-traveller-declaration'] = array(
        'title' => 'South Africa Traveller Declaration | SARS | D.A.K Travel',
        'description' => 'SARS Traveller Declaration guidance for people entering or leaving South Africa from 1 July 2026, including timing, transit exceptions and official links.',
    );
    return $defaults;
}
add_filter( 'daktravel_seo_defaults', 'daktravel_regulatory_seo_defaults', 30 );
