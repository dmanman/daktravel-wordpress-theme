<?php
$title = 'טיסות מדרום אפריקה לישראל | D.A.K Travel';
$description = 'טיסות מדרום אפריקה לישראל עם D.A.K Travel, כולל יוהנסבורג, קייפטאון ודרבן, קונקשנים, כבודה, תנאי כרטיס ודרישות כניסה לישראל.';
$canonical = home_url( '/he/flights-to-israel-from-south-africa/' );
$english = home_url( '/flights-to-israel-from-johannesburg/' );
add_filter( 'pre_get_document_title', static function () use ( $title ) { return $title; }, 9999 );
add_filter( 'rank_math/frontend/title', static function () use ( $title ) { return $title; }, 9999 );
add_filter( 'rank_math/frontend/description', static function () use ( $description ) { return $description; }, 9999 );
add_filter( 'rank_math/frontend/canonical', static function () use ( $canonical ) { return $canonical; }, 9999 );
add_action( 'wp_head', static function () use ( $canonical, $english, $description ) {
    if ( ! daktravel_has_seo_plugin() ) {
        printf( "<link rel=\"canonical\" href=\"%s\">\n", esc_url( $canonical ) );
        printf( "<meta name=\"description\" content=\"%s\">\n", esc_attr( $description ) );
    }
    printf( "<link rel=\"alternate\" hreflang=\"en-ZA\" href=\"%s\">\n", esc_url( $english ) );
    printf( "<link rel=\"alternate\" hreflang=\"he-IL\" href=\"%s\">\n", esc_url( $canonical ) );
    printf( "<link rel=\"alternate\" hreflang=\"x-default\" href=\"%s\">\n", esc_url( $english ) );
}, 1 );
get_header( 'hebrew-path' );
?>
<main>
<section class="dak-page-hero"><div class="container dak-page-hero-grid"><div class="dak-page-hero-copy"><div class="eyebrow">דרום אפריקה → ישראל</div><h1>טיסות מדרום אפריקה לישראל, עם תכנון אישי של כל המסלול.</h1><p class="lead">D.A.K Travel מסייעת עם טיסות מיוהנסבורג, קייפטאון, דרבן וערים אזוריות לישראל, כולל קונקשנים, כבודה, תנאי כרטיס והחזרה לדרום אפריקה.</p><div class="dak-page-actions"><a class="btn btn--whatsapp" target="_blank" rel="noopener noreferrer" href="<?php echo esc_url( daktravel_whatsapp_url( 'שלום D.A.K Travel. אשמח לעזרה עם טיסה מדרום אפריקה לישראל.' ) ); ?>">WhatsApp</a><a class="btn btn--outline" href="<?php echo esc_url( home_url( '/he/contact/#enquiry' ) ); ?>">שליחת פנייה</a></div></div><?php echo wp_kses_post( daktravel_media_slot( 'daktravel_israel_image', 'תל אביב, ישראל', 'טיסות לישראל', 'https://upload.wikimedia.org/wikipedia/commons/2/2b/Azriely_Center.jpg' ) ); ?></div></section>
<section class="dak-intro-section"><div class="container dak-narrow"><div class="eyebrow">מה אנחנו בודקים</div><h2>המסלול הנכון תלוי ביותר מהמחיר.</h2><div class="dak-feature-list"><div class="dak-feature-row"><span class="num">01</span><strong>עיר היציאה</strong><p>יוהנסבורג, קייפטאון, דרבן או חיבור מעיר אזורית.</p></div><div class="dak-feature-row"><span class="num">02</span><strong>קונקשנים</strong><p>זמן חיבור, מבנה הכרטיס והאם המסלול עובד בצורה מעשית.</p></div><div class="dak-feature-row"><span class="num">03</span><strong>כבודה ותנאי כרטיס</strong><p>אנחנו מסבירים את כללי הכבודה, השינויים והביטולים החשובים לפני הכרטוס.</p></div><div class="dak-feature-row"><span class="num">04</span><strong>דרישות כניסה לישראל</strong><p>נוסעים עם דרכון זר צריכים לבדוק את דרישות הכניסה החלות עליהם, כולל ETA-IL כאשר רלוונטי.</p></div></div></div></section>
<section class="section section--ivory"><div class="container editorial-split"><div><div class="eyebrow">נסיעה בשני הכיוונים</div><h2>אנחנו מתכננים גם את הדרך חזרה.</h2><p class="lead">אם אתם חוזרים לדרום אפריקה, נבדוק גם את הטיסה חזרה ואת החיבור לעיר הסופית שלכם.</p><a class="text-link" href="<?php echo esc_url( home_url( '/he/flights-to-south-africa/' ) ); ?>">ישראל → דרום אפריקה</a></div><div class="editorial-panel"><div class="case-study-label">חשוב לפני הטיסה</div><h3>בדקו דרישות כניסה רשמיות לפני הנסיעה.</h3><p>דרישות כניסה עשויות להשתנות ותלויות באזרחות ובדרכון שבו נוסעים.</p></div></div></section>
<section class="dak-quiet-cta"><div class="container dak-quiet-cta-inner"><div><div class="eyebrow">D.A.K Travel · Johannesburg</div><h2>שלחו לנו את התאריכים שלכם.</h2><p>נבדוק את אפשרויות הטיסה המתאימות לישראל.</p></div><div class="dak-page-actions"><a class="btn btn--whatsapp" target="_blank" rel="noopener noreferrer" href="<?php echo esc_url( daktravel_whatsapp_url( 'שלום D.A.K Travel. אשמח להצעת מחיר לטיסה מדרום אפריקה לישראל.' ) ); ?>">WhatsApp</a><a class="btn btn--outline" href="<?php echo esc_url( home_url( '/he/contact/#enquiry' ) ); ?>">שליחת פנייה</a></div></div></section>
</main>
<?php get_footer( 'hebrew-path' ); ?>