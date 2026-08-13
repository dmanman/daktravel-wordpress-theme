<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

function daktravel_hebrew_info_data() {
    return array(
        'eta-il' => array(
            'template' => 'hebrew-eta-il.php',
            'title' => 'ETA-IL ודרישות כניסה לישראל | D.A.K Travel',
            'description' => 'מידע בעברית על ETA-IL ודרישות כניסה לישראל, כולל מי נדרש בדרך כלל לאישור וקישור רשמי של רשות האוכלוסין וההגירה.',
            'hebrew' => home_url( '/he/israel-eta-il-entry-requirements/' ),
            'english' => home_url( '/israel-eta-il-entry-requirements/' ),
        ),
        'sars' => array(
            'template' => 'hebrew-sars.php',
            'title' => 'הצהרת נוסע לדרום אפריקה | SARS | D.A.K Travel',
            'description' => 'מידע בעברית על הצהרת הנוסע המקוונת של SARS הנדרשת בדרך כלל לנוסעים הנכנסים לדרום אפריקה או יוצאים ממנה החל מ-1 ביולי 2026.',
            'hebrew' => home_url( '/he/south-africa-traveller-declaration/' ),
            'english' => home_url( '/south-africa-traveller-declaration/' ),
        ),
    );
}

function daktravel_hebrew_info_template_override( $template ) {
    if ( ! function_exists( 'daktravel_hebrew_path_key' ) ) { return $template; }
    $key = daktravel_hebrew_path_key();
    $data = daktravel_hebrew_info_data();
    if ( ! isset( $data[ $key ] ) ) { return $template; }
    $native = get_template_directory() . '/templates/' . $data[ $key ]['template'];
    return file_exists( $native ) ? $native : $template;
}
add_filter( 'template_include', 'daktravel_hebrew_info_template_override', 22000 );

function daktravel_hebrew_info_current() {
    if ( ! function_exists( 'daktravel_hebrew_path_key' ) ) { return array(); }
    $data = daktravel_hebrew_info_data();
    $key = daktravel_hebrew_path_key();
    return isset( $data[ $key ] ) ? $data[ $key ] : array();
}

add_filter( 'rank_math/frontend/title', static function ( $title ) { $p = daktravel_hebrew_info_current(); return $p ? $p['title'] : $title; }, 9999 );
add_filter( 'rank_math/frontend/description', static function ( $desc ) { $p = daktravel_hebrew_info_current(); return $p ? $p['description'] : $desc; }, 9999 );
add_filter( 'rank_math/frontend/canonical', static function ( $url ) { $p = daktravel_hebrew_info_current(); return $p ? $p['hebrew'] : $url; }, 9999 );
add_filter( 'wp_robots', static function ( $robots ) { if ( daktravel_hebrew_info_current() ) { unset( $robots['noindex'] ); $robots['index']=true; $robots['follow']=true; } return $robots; }, 9999 );
add_action( 'wp_head', static function () {
    $p = daktravel_hebrew_info_current();
    if ( ! $p ) { return; }
    printf( "<link rel=\"alternate\" hreflang=\"en-ZA\" href=\"%s\">\n", esc_url( $p['english'] ) );
    printf( "<link rel=\"alternate\" hreflang=\"he-IL\" href=\"%s\">\n", esc_url( $p['hebrew'] ) );
    printf( "<link rel=\"alternate\" hreflang=\"x-default\" href=\"%s\">\n", esc_url( $p['english'] ) );
}, 1 );
