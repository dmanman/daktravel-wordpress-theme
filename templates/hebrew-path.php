<?php
$key   = function_exists( 'daktravel_hebrew_path_key' ) ? daktravel_hebrew_path_key() : '';
$pages = function_exists( 'daktravel_native_hebrew_pages' ) ? daktravel_native_hebrew_pages() : array();

if ( ! $key || ! isset( $pages[ $key ] ) ) {
    get_header();
    get_footer();
    return;
}

$theme_version = wp_get_theme()->get( 'Version' );
$css_path      = get_template_directory() . '/assets/css/native-hebrew.css';
wp_enqueue_style( 'daktravel-native-hebrew-fonts', 'https://fonts.googleapis.com/css2?family=Noto+Sans+Hebrew:wght@400..800&family=Noto+Serif+Hebrew:wght@400..700&display=swap', array(), null );
wp_enqueue_style( 'daktravel-native-hebrew', get_template_directory_uri() . '/assets/css/native-hebrew.css', array( 'daktravel-multilingual', 'daktravel-native-hebrew-fonts' ), file_exists( $css_path ) ? (string) filemtime( $css_path ) : $theme_version );

add_filter( 'pre_get_document_title', static function () use ( $pages, $key ) { return $pages[ $key ]['seo_title']; }, 9999 );
add_filter( 'rank_math/frontend/title', static function () use ( $pages, $key ) { return $pages[ $key ]['seo_title']; }, 9999 );
add_filter( 'rank_math/frontend/description', static function () use ( $pages, $key ) { return $pages[ $key ]['description']; }, 9999 );
add_filter( 'rank_math/frontend/canonical', static function () use ( $key ) { return daktravel_native_hebrew_url( $key ); }, 9999 );
add_filter( 'wp_robots', static function ( $robots ) { unset( $robots['noindex'] ); $robots['index'] = true; $robots['follow'] = true; return $robots; }, 9999 );

add_action( 'wp_head', static function () use ( $pages, $key ) {
    $english = daktravel_native_english_url_for_hebrew_key( $key );
    $hebrew  = daktravel_native_hebrew_url( $key );

    if ( ! daktravel_has_seo_plugin() ) {
        printf( "\n<link rel=\"canonical\" href=\"%s\">\n", esc_url( $hebrew ) );
        printf( "<meta name=\"description\" content=\"%s\">\n", esc_attr( $pages[ $key ]['description'] ) );
        printf( "<meta property=\"og:title\" content=\"%s\">\n", esc_attr( $pages[ $key ]['seo_title'] ) );
        printf( "<meta property=\"og:description\" content=\"%s\">\n", esc_attr( $pages[ $key ]['description'] ) );
        echo "<meta property=\"og:locale\" content=\"he_IL\">\n";
    }

    printf( "<link rel=\"alternate\" hreflang=\"en-ZA\" href=\"%s\">\n", esc_url( $english ) );
    printf( "<link rel=\"alternate\" hreflang=\"he-IL\" href=\"%s\">\n", esc_url( $hebrew ) );
    printf( "<link rel=\"alternate\" hreflang=\"x-default\" href=\"%s\">\n", esc_url( $english ) );
}, 1 );

get_header( 'hebrew-path' );
$partial = get_template_directory() . '/templates/hebrew/' . sanitize_file_name( $key ) . '.php';
?>
<main>
<?php if ( file_exists( $partial ) ) { include $partial; } ?>
<section class="dak-quiet-cta"><div class="container dak-quiet-cta-inner"><div><div class="eyebrow">D.A.K Travel · Johannesburg</div><h2>צריכים עזרה עם נסיעה לדרום אפריקה?</h2><p>שלחו לנו את התאריכים והפרטים הבסיסיים ונבדוק את האפשרויות המתאימות.</p></div><div class="dak-page-actions"><a class="btn btn--whatsapp" target="_blank" rel="noopener noreferrer" href="<?php echo esc_url( daktravel_whatsapp_url( 'שלום D.A.K Travel. אשמח לעזרה עם נסיעה מישראל לדרום אפריקה.' ) ); ?>">WhatsApp</a><a class="btn btn--outline" href="<?php echo esc_url( daktravel_native_hebrew_url( 'contact' ) ); ?>">צור קשר</a></div></div></section>
</main>
<?php get_footer( 'hebrew-path' ); ?>
