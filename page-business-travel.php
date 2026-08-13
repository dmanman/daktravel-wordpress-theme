<?php
$dak_path = isset( $_SERVER['REQUEST_URI'] ) ? wp_parse_url( wp_unslash( $_SERVER['REQUEST_URI'] ), PHP_URL_PATH ) : '';
$dak_path = is_string( $dak_path ) ? trim( rawurldecode( $dak_path ), '/' ) : '';
if ( 'he/business-travel' === $dak_path ) {
    include get_template_directory() . '/templates/hebrew-entry.php';
    return;
}
get_header();
?>
<main>
<section class="dak-page-hero">
    <div class="container dak-page-hero-grid">
        <div class="dak-page-hero-copy">
            <div class="eyebrow">Business Travel</div>
            <h1>Personal travel support for businesses and organisations.</h1>
            <p class="lead">Reliable bookings, clear communication and a real person to contact when plans change.</p>
            <div class="dak-page-actions"><a class="btn btn--whatsapp" target="_blank" rel="noopener noreferrer" href="<?php echo esc_url( daktravel_whatsapp_url( 'Good day D.A.K Travel. I would like to discuss business or organisational travel.' ) ); ?>">WhatsApp Us</a><a class="btn btn--outline" href="<?php echo esc_url( home_url('/contact/?type=business#enquiry') ); ?>">Email / Enquire</a></div>
        </div>
        <?php echo wp_kses_post( daktravel_media_slot( 'daktravel_business_image', 'Premium international travel cabin', 'Business travel', 'https://images.unsplash.com/photo-1706921255467-4236b197b530?auto=format&fit=crop&fm=jpg&q=82&w=1800' ) ); ?>
    </div>
</section>

<section class="dak-intro-section">
    <div class="container dak-narrow">
        <div class="eyebrow">A simpler travel desk</div>
        <h2>Less time booking. More control.</h2>
        <p class="lead">D.A.K can support regular business travel, project travel and organisational journeys without adding unnecessary process.</p>
        <div class="dak-feature-list">
            <div class="dak-feature-row"><span class="num">01</span><strong>Named consultant</strong><p>A real person who gets to know your travellers and requirements.</p></div>
            <div class="dak-feature-row"><span class="num">02</span><strong>Clear approvals</strong><p>Simple options before ticketing and organised booking records.</p></div>
            <div class="dak-feature-row"><span class="num">03</span><strong>Domestic &amp; international</strong><p>Flights, hotels, transfers and related travel arrangements where needed.</p></div>
            <div class="dak-feature-row"><span class="num">04</span><strong>Changes handled</strong><p>Support when schedules move or travellers need to rebook.</p></div>
        </div>
    </div>
</section>

<section class="dak-dark-band">
    <div class="container dak-narrow"><div class="eyebrow">For organisations</div><h2>A travel partner that knows the booking.</h2><p>When several people are travelling, consistency matters. D.A.K keeps the arrangements clear and gives your team a direct point of contact.</p></div>
</section>

<section class="dak-quiet-cta"><div class="container dak-quiet-cta-inner"><div><div class="eyebrow">Business enquiry</div><h2>Tell us how your team travels.</h2><p>We will suggest a straightforward way for D.A.K to manage it.</p></div><div class="dak-page-actions"><a class="btn btn--whatsapp" target="_blank" rel="noopener noreferrer" href="<?php echo esc_url( daktravel_whatsapp_url( 'Good day D.A.K Travel. I would like to discuss a business travel account.' ) ); ?>">WhatsApp Us</a><a class="btn btn--outline" href="<?php echo esc_url( home_url('/contact/?type=business#enquiry') ); ?>">Send Enquiry</a></div></div></section>
</main>
<?php get_footer(); ?>
