<!doctype html>
<?php $dak_html_dir = 0 === stripos( (string) get_locale(), 'he' ) || 0 === stripos( (string) get_locale(), 'ar' ) ? 'rtl' : 'ltr'; ?>
<html <?php language_attributes(); ?> dir="<?php echo esc_attr( $dak_html_dir ); ?>">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if ( is_front_page() ) : ?>
        <link rel="preconnect" href="https://images.pexels.com" crossorigin>
    <?php endif; ?>
    <?php wp_head(); ?>
    <style id="dak-logo-size-adjustment">
        @media (min-width: 981px) {
            .header-inner {
                grid-template-columns: 295px minmax(0,1fr) auto;
                min-height: 102px;
            }
            .dak-logo-link {
                display: block;
                line-height: 0;
            }
            .dak-site-logo {
                display: block;
                width: 275px;
                max-width: 275px;
                height: auto;
            }
        }
    </style>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="utility-bar">
    <div class="container utility-inner">
        <div class="utility-proof"><strong>Established 2006</strong><span>Johannesburg</span><span>IATA accredited</span><span>ASATA member</span></div>
        <div class="utility-links">
            <a class="utility-specialist" href="<?php echo esc_url( home_url( '/flights-to-israel-from-johannesburg/' ) ); ?>">South Africa - Israel</a>
            <a class="utility-specialist" href="<?php echo esc_url( home_url( '/flights-from-israel-to-south-africa/' ) ); ?>">Israel - South Africa</a>
            <a href="<?php echo esc_url( home_url( '/contact/?type=existing#enquiry' ) ); ?>">Existing booking</a>
            <span class="utility-language-slot"><?php echo wp_kses_post( daktravel_language_switcher() ); ?></span>
        </div>
    </div>
</div>

<header class="site-header">
    <div class="container header-inner">
        <div class="site-branding">
            <a class="legacy-logo-link dak-logo-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="D.A.K Travel home">
                <img class="legacy-site-logo dak-site-logo" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/dak-logo-2026.svg' ); ?>" alt="D.A.K Travel" width="600" height="202" decoding="async">
            </a>
        </div>

        <nav class="site-nav" aria-label="Primary navigation">
            <ul>
                <li><a class="nav-israel" href="<?php echo esc_url( home_url( '/israel-travel/' ) ); ?>">Israel Travel</a></li>
                <li><a href="<?php echo esc_url( home_url( '/groups-delegations/' ) ); ?>">Groups &amp; Delegations</a></li>
                <li><a href="<?php echo esc_url( home_url( '/business-travel/' ) ); ?>">Business Travel</a></li>
                <li><a href="<?php echo esc_url( home_url( '/complex-travel/' ) ); ?>">Complex Travel</a></li>
                <li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About</a></li>
            </ul>
        </nav>

        <div class="header-cta">
            <a class="btn btn--whatsapp btn--compact" target="_blank" rel="noopener noreferrer" href="<?php echo esc_url( daktravel_whatsapp_url( 'Good day D.A.K Travel. I would like assistance with a travel enquiry.' ) ); ?>">WhatsApp Us</a>
        </div>

        <details class="mobile-menu">
            <summary aria-label="Open menu">Menu</summary>
            <div class="mobile-menu-panel">
                <a class="mobile-menu-primary" href="<?php echo esc_url( home_url( '/israel-travel/' ) ); ?>">Israel Travel</a>
                <a href="<?php echo esc_url( home_url( '/groups-delegations/' ) ); ?>">Groups &amp; Delegations</a>
                <a href="<?php echo esc_url( home_url( '/business-travel/' ) ); ?>">Business Travel</a>
                <a href="<?php echo esc_url( home_url( '/complex-travel/' ) ); ?>">Complex Travel</a>
                <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About D.A.K</a>
                <div class="mobile-menu-divider"></div>
                <a href="<?php echo esc_url( home_url( '/contact/?type=existing#enquiry' ) ); ?>">Existing booking</a>
                <a href="<?php echo esc_url( home_url( '/contact/#enquiry' ) ); ?>">Email / Enquire</a>
                <a class="mobile-menu-whatsapp" target="_blank" rel="noopener noreferrer" href="<?php echo esc_url( daktravel_whatsapp_url( 'Good day D.A.K Travel. I would like assistance with a travel enquiry.' ) ); ?>">WhatsApp Us</a>
            </div>
        </details>
    </div>
</header>
