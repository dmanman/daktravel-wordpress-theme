<!doctype html>
<?php add_filter( 'locale', static function ( $locale ) { return 'he_IL'; }, 50 ); ?>
<html lang="he-IL" dir="rtl">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://images.pexels.com" crossorigin>
    <?php wp_head(); ?>
    <style id="dak-logo-size-adjustment-hebrew">
        @media (min-width: 981px) {
            .header-inner { grid-template-columns:295px minmax(0,1fr) auto; min-height:102px; }
            .dak-logo-link { display:block; line-height:0; }
            .dak-site-logo { display:block; width:275px; max-width:275px; height:auto; }
        }
    </style>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="utility-bar"><div class="container utility-inner"><div class="utility-proof"><strong>מאז 2006</strong><span>יוהנסבורג</span><span>סוכן IATA מוסמך</span><span>חבר ASATA</span></div><div class="utility-links"><a class="utility-specialist" href="<?php echo esc_url( daktravel_native_hebrew_url( 'flights' ) ); ?>">ישראל ← דרום אפריקה</a><a href="<?php echo esc_url( daktravel_native_hebrew_url( 'contact' ) ); ?>">הזמנה קיימת</a><span class="utility-language-slot"><?php echo wp_kses_post( daktravel_native_language_switcher() ); ?></span></div></div></div>
<header class="site-header"><div class="container header-inner"><div class="site-branding"><a class="legacy-logo-link dak-logo-link" href="<?php echo esc_url( daktravel_native_hebrew_url( 'home' ) ); ?>" aria-label="D.A.K Travel בעברית"><img class="legacy-site-logo dak-site-logo" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/dak-logo-2026.svg' ); ?>" alt="D.A.K Travel" width="600" height="202" decoding="async"></a></div><nav class="site-nav" aria-label="ניווט ראשי"><ul><li><a class="nav-israel" href="<?php echo esc_url( daktravel_native_hebrew_url( 'flights' ) ); ?>">טיסות לדרום אפריקה</a></li><li><a href="<?php echo esc_url( daktravel_native_hebrew_url( 'groups' ) ); ?>">קבוצות ומשלחות</a></li><li><a href="<?php echo esc_url( daktravel_native_hebrew_url( 'business' ) ); ?>">נסיעות עסקים</a></li><li><a href="<?php echo esc_url( daktravel_native_hebrew_url( 'about' ) ); ?>">אודות</a></li><li><a href="<?php echo esc_url( daktravel_native_hebrew_url( 'contact' ) ); ?>">צור קשר</a></li></ul></nav><div class="header-cta"><a class="btn btn--whatsapp btn--compact" target="_blank" rel="noopener noreferrer" href="<?php echo esc_url( daktravel_whatsapp_url( 'שלום D.A.K Travel. אשמח לעזרה עם נסיעה מישראל לדרום אפריקה.' ) ); ?>">WhatsApp</a></div><details class="mobile-menu"><summary aria-label="פתח תפריט">תפריט</summary><div class="mobile-menu-panel"><a class="mobile-menu-primary" href="<?php echo esc_url( daktravel_native_hebrew_url( 'flights' ) ); ?>">טיסות לדרום אפריקה</a><a href="<?php echo esc_url( daktravel_native_hebrew_url( 'groups' ) ); ?>">קבוצות ומשלחות</a><a href="<?php echo esc_url( daktravel_native_hebrew_url( 'business' ) ); ?>">נסיעות עסקים</a><a href="<?php echo esc_url( daktravel_native_hebrew_url( 'about' ) ); ?>">אודות D.A.K</a><a href="<?php echo esc_url( daktravel_native_hebrew_url( 'contact' ) ); ?>">צור קשר</a><div class="mobile-menu-divider"></div><a class="mobile-menu-whatsapp" target="_blank" rel="noopener noreferrer" href="<?php echo esc_url( daktravel_whatsapp_url( 'שלום D.A.K Travel. אשמח לעזרה עם נסיעה מישראל לדרום אפריקה.' ) ); ?>">WhatsApp</a></div></details></div></header>
