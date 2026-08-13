<?php
$island = function_exists( 'daktravel_hebrew_island_key' ) ? daktravel_hebrew_island_key() : '';
if ( ! in_array( $island, array( 'mauritius', 'zanzibar' ), true ) ) { return; }

$route_css = get_template_directory() . '/assets/css/route-slideshow.css';
wp_enqueue_style( 'daktravel-route-slideshow-he-islands', get_template_directory_uri() . '/assets/css/route-slideshow.css', array( 'daktravel-multilingual' ), file_exists( $route_css ) ? (string) filemtime( $route_css ) : wp_get_theme()->get( 'Version' ) );
wp_enqueue_style( 'daktravel-native-hebrew-islands', get_template_directory_uri() . '/assets/css/native-hebrew.css', array( 'daktravel-multilingual' ), wp_get_theme()->get( 'Version' ) );

if ( 'mauritius' === $island ) {
    $title = 'חופשות במאוריציוס מדרום אפריקה | D.A.K Travel';
    $desc  = 'תכנון חופשות במאוריציוס עם D.A.K Travel, כולל טיסות, ריזורטים, העברות וביטוח נסיעות עם שירות אישי מיוהנסבורג.';
    $heading = 'חופשה במאוריציוס, מתוכננת כנסיעה אחת שלמה.';
    $lead = 'D.A.K Travel יכולה לשלב טיסות, ריזורט, העברות וביטוח נסיעות לחופשה מסודרת במאוריציוס.';
    $english = home_url( '/mauritius-holidays-from-south-africa/' );
    $hebrew = home_url( '/he/mauritius-holidays/' );
    $images = array(
        'https://images.pexels.com/photos/3703465/pexels-photo-3703465.jpeg?auto=compress&cs=tinysrgb&w=1600',
        'https://images.pexels.com/photos/34870507/pexels-photo-34870507.jpeg?auto=compress&cs=tinysrgb&w=1600',
        'https://images.pexels.com/photos/34732320/pexels-photo-34732320.jpeg?auto=compress&cs=tinysrgb&w=1600',
        'https://images.pexels.com/photos/33791769/pexels-photo-33791769.jpeg?auto=compress&cs=tinysrgb&w=1600',
        'https://images.pexels.com/photos/6331869/pexels-photo-6331869.jpeg?auto=compress&cs=tinysrgb&w=1600',
        'https://images.pexels.com/photos/36731926/pexels-photo-36731926.jpeg?auto=compress&cs=tinysrgb&w=1600'
    );
} else {
    $title = 'חופשות בזנזיבר מדרום אפריקה | D.A.K Travel';
    $desc  = 'תכנון חופשות בזנזיבר עם D.A.K Travel, כולל טיסות, ריזורטים, העברות וביטוח נסיעות עם שירות אישי מיוהנסבורג.';
    $heading = 'חופשה בזנזיבר, מתוכננת כנסיעה אחת שלמה.';
    $lead = 'D.A.K Travel יכולה לשלב טיסות, ריזורט, העברות וביטוח נסיעות לחופשה מסודרת בזנזיבר.';
    $english = home_url( '/zanzibar-holidays-from-south-africa/' );
    $hebrew = home_url( '/he/zanzibar-holidays/' );
    $images = array(
        'https://images.pexels.com/photos/14667393/pexels-photo-14667393.jpeg?auto=compress&cs=tinysrgb&w=1600',
        'https://images.pexels.com/photos/11061326/pexels-photo-11061326.jpeg?auto=compress&cs=tinysrgb&w=1600',
        'https://images.pexels.com/photos/11061325/pexels-photo-11061325.jpeg?auto=compress&cs=tinysrgb&w=1600',
        'https://images.pexels.com/photos/5859220/pexels-photo-5859220.jpeg?auto=compress&cs=tinysrgb&w=1600',
        'https://images.pexels.com/photos/17732689/pexels-photo-17732689.jpeg?auto=compress&cs=tinysrgb&w=1600',
        'https://images.pexels.com/photos/30125143/pexels-photo-30125143.jpeg?auto=compress&cs=tinysrgb&w=1600'
    );
}

add_filter( 'pre_get_document_title', static function () use ( $title ) { return $title; }, 9999 );
add_filter( 'rank_math/frontend/title', static function () use ( $title ) { return $title; }, 9999 );
add_filter( 'rank_math/frontend/description', static function () use ( $desc ) { return $desc; }, 9999 );
add_filter( 'rank_math/frontend/canonical', static function () use ( $hebrew ) { return $hebrew; }, 9999 );
add_action( 'wp_head', static function () use ( $english, $hebrew, $desc ) {
    printf( '<link rel="alternate" hreflang="en-ZA" href="%s">\n', esc_url( $english ) );
    printf( '<link rel="alternate" hreflang="he-IL" href="%s">\n', esc_url( $hebrew ) );
    printf( '<link rel="alternate" hreflang="x-default" href="%s">\n', esc_url( $english ) );
    if ( ! daktravel_has_seo_plugin() ) { printf( '<link rel="canonical" href="%s">\n<meta name="description" content="%s">\n', esc_url( $hebrew ), esc_attr( $desc ) ); }
}, 1 );

get_header( 'hebrew-path' );
?>
<main>
<section class="dak-page-hero"><div class="container dak-page-hero-grid"><div class="dak-page-hero-copy"><div class="eyebrow">נופש נבחר · האוקיינוס ההודי</div><h1><?php echo esc_html( $heading ); ?></h1><p class="lead"><?php echo esc_html( $lead ); ?></p><div class="dak-page-actions"><a class="btn btn--whatsapp" target="_blank" rel="noopener noreferrer" href="<?php echo esc_url( daktravel_whatsapp_url( 'שלום D.A.K Travel. אשמח לעזרה עם חופשת אי.' ) ); ?>">WhatsApp</a><a class="btn btn--outline" href="<?php echo esc_url( home_url( '/he/contact/' ) ); ?>#enquiry">שליחת פנייה</a></div></div><figure class="dak-media-slot has-image dak-route-slideshow-frame"><div class="dak-route-slideshow dak-route-slideshow--6" aria-hidden="true"><?php foreach ( $images as $i => $url ) : ?><span class="dak-route-slide dak-route-slide--<?php echo esc_attr( $i + 1 ); ?>"><img class="dak-media-image" src="<?php echo esc_url( $url ); ?>" alt="" <?php echo 0 === $i ? 'loading="eager" fetchpriority="high"' : 'loading="lazy"'; ?> decoding="async"></span><?php endforeach; ?></div></figure></div></section>
<section class="dak-intro-section"><div class="container dak-narrow"><div class="eyebrow">חופשה מלאה</div><h2>טיסות, לינה, העברות וביטוח — במקום אחד.</h2><p class="lead">ספרו לנו את התאריכים, מספר הנוסעים וסגנון החופשה שאתם מחפשים. אנחנו נעזור לצמצם את האפשרויות ולבנות חבילה שמתאימה לכם.</p><div class="dak-feature-list"><div class="dak-feature-row"><span class="num">01</span><strong>טיסות</strong><p>בחירת מסלול בהתאם לתאריכים, כבודה וזמני קונקשן.</p></div><div class="dak-feature-row"><span class="num">02</span><strong>ריזורטים</strong><p>בחירה לפי אזור, רמת מלון, סוג חדר וסגנון החופשה.</p></div><div class="dak-feature-row"><span class="num">03</span><strong>העברות</strong><p>העברות משדה התעופה ואפשרויות נוספות לפי הצורך.</p></div><div class="dak-feature-row"><span class="num">04</span><strong>ביטוח נסיעות</strong><p>אפשרויות ביטוח מתאימות כחלק מהתכנון הכולל.</p></div></div></div></section>
<section class="section section--ivory"><div class="container dak-narrow"><div class="eyebrow">חשוב לנוסעים מדרום אפריקה</div><h2>הצהרת נוסע מקוונת של SARS.</h2><p class="lead">מ-1 ביולי 2026 קיימת חובת Traveller Declaration מקוונת לנוסעים הנכנסים לדרום אפריקה או יוצאים ממנה, בכפוף לכללים ולחריגים של SARS.</p><a class="text-link" href="<?php echo esc_url( home_url( '/he/south-africa-traveller-declaration/' ) ); ?>">מידע על Traveller Declaration</a></div></section>
</main>
<?php get_footer( 'hebrew-path' ); ?>