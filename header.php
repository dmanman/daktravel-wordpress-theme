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
        <div class="utility-proof">Johannesburg · IATA accredited · ASATA member</div>
        <div class="utility-links">
            <a href="tel:+27114405980">+27 11 440 5980</a>
            <span aria-hidden="true">•</span>
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Existing booking</a>
        </div>
    </div>
</div>

<header class="site-header">
    <div class="container header-inner">
        <div class="site-branding">
            <?php if ( has_custom_logo() ) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <a class="brand-wordmark" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <strong>D.A.K TRAVEL</strong><span>TRAVEL ADVISORY</span>
                </a>
            <?php endif; ?>
        </div>

        <nav class="site-nav" aria-label="Primary navigation">
            <ul>
                <li><a href="<?php echo esc_url( home_url( '/groups-delegations/' ) ); ?>">Groups &amp; Delegations</a></li>
                <li><a href="<?php echo esc_url( home_url( '/business-travel/' ) ); ?>">Business Travel</a></li>
                <li><a href="<?php echo esc_url( home_url( '/israel-travel/' ) ); ?>">Israel Travel</a></li>
                <li><a href="<?php echo esc_url( home_url( '/complex-travel/' ) ); ?>">Complex Travel</a></li>
                <li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About</a></li>
            </ul>
        </nav>

        <div class="header-cta">
            <a class="header-phone" href="tel:+27114405980" aria-label="Call D.A.K Travel">Call us</a>
            <a class="btn btn--primary btn--compact" href="<?php echo esc_url( home_url( '/request-a-quote/' ) ); ?>">Start Planning</a>
        </div>
    </div>
</header>
