<?php
$title = 'ETA-IL ודרישות כניסה לישראל | D.A.K Travel';
$desc = 'מידע בעברית על ETA-IL ודרישות כניסה לישראל, כולל מי נדרש בדרך כלל לאישור וקישור רשמי של רשות האוכלוסין וההגירה.';
$he = home_url( '/he/israel-eta-il-entry-requirements/' );
$en = home_url( '/israel-eta-il-entry-requirements/' );
wp_enqueue_style( 'daktravel-native-hebrew-fonts', 'https://fonts.googleapis.com/css2?family=Noto+Sans+Hebrew:wght@400..800&family=Noto+Serif+Hebrew:wght@400..700&display=swap', array(), null );
wp_enqueue_style( 'daktravel-native-hebrew', get_template_directory_uri() . '/assets/css/native-hebrew.css', array( 'daktravel-multilingual', 'daktravel-native-hebrew-fonts' ), null );
add_filter( 'pre_get_document_title', static function () use ( $title ) { return $title; }, 9999 );
add_filter( 'rank_math/frontend/title', static function () use ( $title ) { return $title; }, 9999 );
add_filter( 'rank_math/frontend/description', static function () use ( $desc ) { return $desc; }, 9999 );
add_filter( 'rank_math/frontend/canonical', static function () use ( $he ) { return $he; }, 9999 );
add_filter( 'wp_robots', static function ( $robots ) { unset( $robots['noindex'] ); $robots['index']=true; $robots['follow']=true; return $robots; }, 9999 );
add_action( 'wp_head', static function () use ( $he, $en ) {
    printf( "<link rel=\"alternate\" hreflang=\"en-ZA\" href=\"%s\">\n", esc_url( $en ) );
    printf( "<link rel=\"alternate\" hreflang=\"he-IL\" href=\"%s\">\n", esc_url( $he ) );
    printf( "<link rel=\"alternate\" hreflang=\"x-default\" href=\"%s\">\n", esc_url( $en ) );
}, 1 );
get_header( 'hebrew-path' ); ?>
<main><?php include get_template_directory() . '/templates/hebrew/eta-il.php'; ?><section class="dak-quiet-cta"><div class="container dak-quiet-cta-inner"><div><div class="eyebrow">D.A.K Travel · Johannesburg</div><h2>צריכים עזרה עם הנסיעה?</h2><p>שלחו לנו את התאריכים והפרטים הבסיסיים ונעזור לכם עם סידורי הנסיעה.</p></div><div class="dak-page-actions"><a class="btn btn--whatsapp" target="_blank" rel="noopener noreferrer" href="<?php echo esc_url( daktravel_whatsapp_url( 'שלום D.A.K Travel. אשמח לעזרה עם נסיעה לישראל.' ) ); ?>">WhatsApp</a><a class="btn btn--outline" href="<?php echo esc_url( home_url( '/he/contact/' ) ); ?>">צור קשר</a></div></div></section></main>
<?php get_footer( 'hebrew-path' ); ?>