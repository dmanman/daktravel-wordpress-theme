<?php
$uri  = isset( $_SERVER['REQUEST_URI'] ) ? wp_unslash( $_SERVER['REQUEST_URI'] ) : '';
$path = $uri ? wp_parse_url( $uri, PHP_URL_PATH ) : '';
$path = is_string( $path ) ? trim( rawurldecode( $path ), '/' ) : '';
$map  = array(
    'he'                          => 'home',
    'he/flights-to-south-africa' => 'flights',
    'he/groups'                   => 'groups',
    'he/business-travel'          => 'business',
    'he/about'                    => 'about',
    'he/contact'                  => 'contact',
);
$key   = isset( $map[ $path ] ) ? $map[ $path ] : '';
$pages = function_exists( 'daktravel_native_hebrew_pages' ) ? daktravel_native_hebrew_pages() : array();

if ( ! $key || ! isset( $pages[ $key ] ) ) {
    return;
}

status_header( 200 );
add_filter( 'locale', static function () { return 'he_IL'; }, 9999 );
add_filter( 'pre_get_document_title', static function () use ( $pages, $key ) { return $pages[ $key ]['seo_title']; }, 9999 );
add_filter( 'rank_math/frontend/title', static function () use ( $pages, $key ) { return $pages[ $key ]['seo_title']; }, 9999 );
add_filter( 'rank_math/frontend/description', static function () use ( $pages, $key ) { return $pages[ $key ]['description']; }, 9999 );
add_filter( 'rank_math/frontend/canonical', static function () use ( $key ) { return daktravel_native_hebrew_url( $key ); }, 9999 );
add_filter( 'wp_robots', static function ( $robots ) { unset( $robots['noindex'] ); $robots['index'] = true; $robots['follow'] = true; return $robots; }, 9999 );

remove_action( 'wp_head', 'daktravel_output_seo_meta', 2 );
remove_action( 'wp_head', 'daktravel_output_schema', 30 );
remove_action( 'wp_head', 'daktravel_output_additional_schema', 31 );

$theme_version = wp_get_theme()->get( 'Version' );
$css_path      = get_template_directory() . '/assets/css/native-hebrew.css';
wp_enqueue_style( 'daktravel-native-hebrew-fonts', 'https://fonts.googleapis.com/css2?family=Noto+Sans+Hebrew:wght@400..800&family=Noto+Serif+Hebrew:wght@400..700&display=swap', array(), null );
wp_enqueue_style( 'daktravel-native-hebrew', get_template_directory_uri() . '/assets/css/native-hebrew.css', array( 'daktravel-multilingual', 'daktravel-native-hebrew-fonts' ), file_exists( $css_path ) ? (string) filemtime( $css_path ) : $theme_version );

$english_url = daktravel_native_english_url_for_hebrew_key( $key );
$hebrew_url  = daktravel_native_hebrew_url( $key );
add_action( 'wp_head', static function () use ( $pages, $key, $english_url, $hebrew_url ) {
    if ( ! daktravel_has_seo_plugin() ) {
        printf( "\n<link rel=\"canonical\" href=\"%s\">\n", esc_url( $hebrew_url ) );
        printf( "<meta name=\"description\" content=\"%s\">\n", esc_attr( $pages[ $key ]['description'] ) );
        printf( "<meta property=\"og:title\" content=\"%s\">\n", esc_attr( $pages[ $key ]['seo_title'] ) );
        printf( "<meta property=\"og:description\" content=\"%s\">\n", esc_attr( $pages[ $key ]['description'] ) );
        echo "<meta property=\"og:locale\" content=\"he_IL\">\n";
    }
    printf( "<link rel=\"alternate\" hreflang=\"en-ZA\" href=\"%s\">\n", esc_url( $english_url ) );
    printf( "<link rel=\"alternate\" hreflang=\"he-IL\" href=\"%s\">\n", esc_url( $hebrew_url ) );
    printf( "<link rel=\"alternate\" hreflang=\"x-default\" href=\"%s\">\n", esc_url( $english_url ) );

    $schema = array(
        '@context' => 'https://schema.org',
        '@graph' => array(
            array(
                '@type' => 'TravelAgency',
                '@id' => home_url( '/#travelagency' ),
                'name' => 'D.A.K Travel',
                'url' => home_url( '/' ),
                'telephone' => '+27 11 440 5980',
                'address' => array( '@type' => 'PostalAddress', 'addressLocality' => 'Johannesburg', 'addressCountry' => 'ZA' ),
                'areaServed' => array( array( '@type' => 'Country', 'name' => 'Israel' ), array( '@type' => 'Country', 'name' => 'South Africa' ) ),
            ),
            array(
                '@type' => 'WebPage',
                '@id' => trailingslashit( $hebrew_url ) . '#webpage',
                'url' => $hebrew_url,
                'name' => $pages[ $key ]['seo_title'],
                'description' => $pages[ $key ]['description'],
                'inLanguage' => 'he-IL',
                'about' => array( '@id' => home_url( '/#travelagency' ) ),
            ),
        ),
    );
    echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>';
}, 1 );

$partial = get_template_directory() . '/templates/hebrew/' . sanitize_file_name( $key ) . '.php';
?>
<!doctype html>
<html lang="he-IL" dir="rtl">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class( 'dak-native-hebrew' ); ?>>
<?php wp_body_open(); ?>
<div class="utility-bar"><div class="container utility-inner"><div class="utility-proof"><strong>מאז 2006</strong><span>יוהנסבורג</span><span>IATA</span><span>ASATA</span></div><div class="utility-links"><a href="<?php echo esc_url( $english_url ); ?>" hreflang="en-ZA" lang="en">EN</a><span class="utility-language-slot"><strong lang="he">עברית</strong></span></div></div></div>
<header class="site-header"><div class="container header-inner"><div class="site-branding"><a class="dak-logo-link" href="<?php echo esc_url( daktravel_native_hebrew_url( 'home' ) ); ?>" aria-label="D.A.K Travel בעברית"><img class="dak-site-logo" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/dak-logo-2026.svg' ); ?>" alt="D.A.K Travel" width="600" height="202" decoding="async"></a></div><nav class="site-nav" aria-label="ניווט ראשי"><ul><li><a class="nav-israel" href="<?php echo esc_url( daktravel_native_hebrew_url( 'flights' ) ); ?>">טיסות לדרום אפריקה</a></li><li><a href="<?php echo esc_url( daktravel_native_hebrew_url( 'groups' ) ); ?>">קבוצות ומשלחות</a></li><li><a href="<?php echo esc_url( daktravel_native_hebrew_url( 'business' ) ); ?>">נסיעות עסקים</a></li><li><a href="<?php echo esc_url( daktravel_native_hebrew_url( 'about' ) ); ?>">אודות</a></li><li><a href="<?php echo esc_url( daktravel_native_hebrew_url( 'contact' ) ); ?>">צור קשר</a></li></ul></nav><div class="header-cta"><a class="btn btn--whatsapp btn--compact" target="_blank" rel="noopener noreferrer" href="<?php echo esc_url( daktravel_whatsapp_url( 'שלום D.A.K Travel. אשמח לעזרה עם נסיעה מישראל לדרום אפריקה.' ) ); ?>">WhatsApp</a></div><details class="mobile-menu"><summary>תפריט</summary><div class="mobile-menu-panel"><a href="<?php echo esc_url( daktravel_native_hebrew_url( 'flights' ) ); ?>">טיסות לדרום אפריקה</a><a href="<?php echo esc_url( daktravel_native_hebrew_url( 'groups' ) ); ?>">קבוצות ומשלחות</a><a href="<?php echo esc_url( daktravel_native_hebrew_url( 'business' ) ); ?>">נסיעות עסקים</a><a href="<?php echo esc_url( daktravel_native_hebrew_url( 'about' ) ); ?>">אודות</a><a href="<?php echo esc_url( daktravel_native_hebrew_url( 'contact' ) ); ?>">צור קשר</a><a href="<?php echo esc_url( $english_url ); ?>">English</a></div></details></div></header>
<main>
<?php if ( file_exists( $partial ) ) { include $partial; } ?>
<section class="dak-quiet-cta"><div class="container dak-quiet-cta-inner"><div><div class="eyebrow">D.A.K Travel · Johannesburg</div><h2>צריכים עזרה עם נסיעה לדרום אפריקה?</h2><p>שלחו לנו את התאריכים והפרטים הבסיסיים ונבדוק את האפשרויות המתאימות.</p></div><div class="dak-page-actions"><a class="btn btn--whatsapp" target="_blank" rel="noopener noreferrer" href="<?php echo esc_url( daktravel_whatsapp_url( 'שלום D.A.K Travel. אשמח לעזרה עם נסיעה מישראל לדרום אפריקה.' ) ); ?>">WhatsApp</a><a class="btn btn--outline" href="<?php echo esc_url( daktravel_native_hebrew_url( 'contact' ) ); ?>">צור קשר</a></div></div></section>
</main>
<footer class="site-footer"><div class="container footer-grid"><div><h2 style="color:#fff;">D.A.K Travel</h2><p>סוכנות נסיעות ותיקה ביוהנסבורג מאז 2006. מומחים לנסיעות בין ישראל לדרום אפריקה.</p><p><span class="dak-hebrew-ltr">+27 11 440 5980</span></p></div><div><h3 style="color:#fff;">שירותים</h3><p><a href="<?php echo esc_url( daktravel_native_hebrew_url( 'flights' ) ); ?>">טיסות מישראל לדרום אפריקה</a><br><a href="<?php echo esc_url( daktravel_native_hebrew_url( 'groups' ) ); ?>">קבוצות ומשלחות</a><br><a href="<?php echo esc_url( daktravel_native_hebrew_url( 'business' ) ); ?>">נסיעות עסקים</a></p></div><div><h3 style="color:#fff;">D.A.K Travel</h3><p>שירות אישי מיוהנסבורג<br>סוכן IATA מוסמך<br>חבר ASATA</p></div></div><div class="container" style="margin-top:32px;border-top:1px solid rgba(255,255,255,.15);padding-top:20px;"><p>© <?php echo esc_html( wp_date( 'Y' ) ); ?> D.A.K Travel. כל הזכויות שמורות.</p></div></footer>
<div class="mobile-actions"><a target="_blank" rel="noopener noreferrer" href="<?php echo esc_url( daktravel_whatsapp_url( 'שלום D.A.K Travel. אשמח לעזרה עם נסיעה מישראל לדרום אפריקה.' ) ); ?>">WhatsApp</a><a href="<?php echo esc_url( daktravel_native_hebrew_url( 'contact' ) ); ?>">צור קשר</a><a href="<?php echo esc_url( $english_url ); ?>">English</a></div>
<?php wp_footer(); ?>
</body>
</html>
