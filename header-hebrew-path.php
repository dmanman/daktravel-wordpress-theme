<!doctype html>
<html lang="he-IL" dir="rtl">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class( 'dak-native-hebrew' ); ?>>
<?php wp_body_open(); ?>
<?php $dak_he_key = function_exists( 'daktravel_hebrew_path_key' ) ? daktravel_hebrew_path_key() : 'home'; ?>
<div class="utility-bar">
    <div class="container utility-inner">
        <div class="utility-proof"><strong>מאז 2006</strong><span>יוהנסבורג</span><span>IATA</span><span>ASATA</span></div>
        <div class="utility-links"><a href="<?php echo esc_url( 'complex' === $dak_he_key ? home_url( '/complex-travel/' ) : daktravel_native_english_url_for_hebrew_key( $dak_he_key ) ); ?>" hreflang="en-ZA" lang="en">EN</a><span class="utility-language-slot"><strong lang="he">עברית</strong></span></div>
    </div>
</div>
<header class="site-header">
    <div class="container header-inner">
        <div class="site-branding"><a class="dak-logo-link" href="<?php echo esc_url( daktravel_native_hebrew_url( 'home' ) ); ?>" aria-label="D.A.K Travel בעברית"><img class="dak-site-logo" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/dak-logo-2026.svg' ); ?>" alt="D.A.K Travel" width="600" height="202" decoding="async"></a></div>
        <nav class="site-nav" aria-label="ניווט ראשי"><ul>
            <li><a class="nav-israel" href="<?php echo esc_url( daktravel_native_hebrew_url( 'flights' ) ); ?>">טיסות לדרום אפריקה</a></li>
            <li><a href="<?php echo esc_url( daktravel_native_hebrew_url( 'groups' ) ); ?>">קבוצות ומשלחות</a></li>
            <li><a href="<?php echo esc_url( daktravel_native_hebrew_url( 'business' ) ); ?>">נסיעות עסקים</a></li>
            <li><a href="<?php echo esc_url( home_url( '/he/complex-travel/' ) ); ?>">נסיעות מורכבות</a></li>
            <li><a href="<?php echo esc_url( daktravel_native_hebrew_url( 'about' ) ); ?>">אודות</a></li>
        </ul></nav>
        <div class="header-cta"><a class="btn btn--whatsapp btn--compact" target="_blank" rel="noopener noreferrer" href="<?php echo esc_url( daktravel_whatsapp_url( 'שלום D.A.K Travel. אשמח לעזרה עם נסיעה מישראל לדרום אפריקה.' ) ); ?>">WhatsApp</a></div>
        <details class="mobile-menu"><summary aria-label="פתח תפריט">תפריט</summary><div class="mobile-menu-panel">
            <a class="mobile-menu-primary" href="<?php echo esc_url( daktravel_native_hebrew_url( 'flights' ) ); ?>">טיסות לדרום אפריקה</a>
            <a href="<?php echo esc_url( daktravel_native_hebrew_url( 'groups' ) ); ?>">קבוצות ומשלחות</a>
            <a href="<?php echo esc_url( daktravel_native_hebrew_url( 'business' ) ); ?>">נסיעות עסקים</a>
            <a href="<?php echo esc_url( home_url( '/he/complex-travel/' ) ); ?>">נסיעות מורכבות</a>
            <a href="<?php echo esc_url( daktravel_native_hebrew_url( 'about' ) ); ?>">אודות</a>
            <a href="<?php echo esc_url( daktravel_native_hebrew_url( 'contact' ) ); ?>">צור קשר</a>
            <a href="<?php echo esc_url( 'complex' === $dak_he_key ? home_url( '/complex-travel/' ) : daktravel_native_english_url_for_hebrew_key( $dak_he_key ) ); ?>">English</a>
        </div></details>
    </div>
</header>
