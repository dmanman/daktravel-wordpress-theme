<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="site-header">
    <div class="container header-inner">
        <div class="site-branding">
            <?php if ( has_custom_logo() ) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">D.A.K Travel</a>
            <?php endif; ?>
        </div>
        <nav class="site-nav" aria-label="Primary navigation">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'fallback_cb'    => false,
                )
            );
            ?>
        </nav>
        <div class="header-cta">
            <a class="btn btn--secondary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Existing Booking Help</a>
            <a class="btn btn--primary" href="<?php echo esc_url( home_url( '/request-a-quote/' ) ); ?>">Request a Quote</a>
        </div>
    </div>
</header>
