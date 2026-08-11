<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
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
            <?php if ( has_custom_logo() ) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <a class="legacy-logo-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="D.A.K Travel home">
                    <img class="legacy-site-logo" src="<?php echo esc_url( daktravel_existing_upload_url( '/2015/08/cropped-logo.daktravel.jpg' ) ); ?>" alt="D.A.K Travel">
                </a>
            <?php endif; ?>
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
