<?php get_header(); ?>
<main>
<section class="dak-page-hero">
    <div class="container dak-page-hero-grid">
        <div class="dak-page-hero-copy">
            <div class="eyebrow">South Africa–Israel Travel · Established 2006</div>
            <h1>Flights and travel between South Africa and Israel, expertly managed.</h1>
            <p class="lead">We help individuals, families, students, groups and organisations travel from South Africa to Israel — and return from Israel to South Africa — with the right flights, connections and fare options.</p>
            <div class="dak-page-actions">
                <a class="btn btn--whatsapp" target="_blank" rel="noopener noreferrer" href="<?php echo esc_url( daktravel_whatsapp_url( 'Good day D.A.K Travel. Please assist me with travel between South Africa and Israel.' ) ); ?>">WhatsApp Us</a>
                <a class="btn btn--outline" href="<?php echo esc_url( home_url('/contact/?type=israel#enquiry') ); ?>">Email / Enquire</a>
            </div>
        </div>
        <?php
        $israel_image = daktravel_media_image( 'daktravel_israel_image', 'large', 'dak-media-image', 'Azrieli Center towers in Tel Aviv, Israel' );
        if ( $israel_image ) :
            echo '<div class="dak-media-slot has-image">' . wp_kses_post( $israel_image ) . '</div>';
        else :
            ?>
            <figure class="dak-media-slot has-image dak-israel-architecture">
                <img class="dak-media-image" src="https://upload.wikimedia.org/wikipedia/commons/2/2b/Azriely_Center.jpg" alt="Azrieli Center towers in Tel Aviv, Israel" width="1600" height="1200" loading="eager" fetchpriority="high">
                <figcaption class="image-credit">Azrieli Center, Tel Aviv · Photo: Rastaman3000 / CC BY-SA 3.0</figcaption>
            </figure>
        <?php endif; ?>
    </div>
</section>

<section class="dak-intro-section">
    <div class="container dak-narrow">
        <div class="eyebrow">Flights to Israel from South Africa — and return</div>
        <h2>We compare the whole journey in both directions.</h2>
        <p class="lead">Whether you are flying from Johannesburg, Cape Town or another South African city to Israel, or returning from Tel Aviv to South Africa, we look at the route, connection time, baggage, flexibility and what happens if plans change.</p>
        <div class="dak-feature-list">
            <div class="dak-feature-row"><span class="num">01</span><strong>South Africa to Israel</strong><p>We check sensible flight options from Johannesburg, Cape Town, Durban and regional cities for your actual travel dates.</p></div>
            <div class="dak-feature-row"><span class="num">02</span><strong>Israel to South Africa</strong><p>We compare return and one-way options from Tel Aviv to Johannesburg and onward connections across South Africa where required.</p></div>
            <div class="dak-feature-row"><span class="num">03</span><strong>Return &amp; flexible journeys</strong><p>Round trips, different departure and return cities, family travel and flexible fare options can be considered as one complete itinerary.</p></div>
            <div class="dak-feature-row"><span class="num">04</span><strong>Help when plans change</strong><p>You have a real consultant who already understands the booking and can help when schedules or travel plans move.</p></div>
        </div>
        <p style="margin-top:30px;"><strong>Route guides:</strong> <a href="<?php echo esc_url( home_url('/flights-to-israel-from-johannesburg/') ); ?>">Johannesburg to Israel flights</a> · <a href="<?php echo esc_url( home_url('/flights-from-israel-to-south-africa/') ); ?>">Israel to South Africa flights</a> · <a href="<?php echo esc_url( home_url('/south-africa-israel-flight-routes/') ); ?>">South Africa–Israel flight routes</a></p>
    </div>
</section>

<?php
$tel_aviv = daktravel_media_image( 'daktravel_telaviv_image', 'large', 'dak-israel-strip-image', 'Tel Aviv, Israel' );
if ( ! $tel_aviv ) {
    $tel_aviv = '<img class="dak-israel-strip-image" src="https://images.unsplash.com/photo-1646226303063-1e5334284894?auto=format&amp;fit=crop&amp;fm=jpg&amp;q=80&amp;w=1400" alt="Tel Aviv coastline and city, Israel" loading="lazy" width="1400" height="1050">';
}

$jerusalem = daktravel_media_image( 'daktravel_jerusalem_image', 'large', 'dak-israel-strip-image', 'Jerusalem, Israel' );
if ( ! $jerusalem ) {
    $jerusalem = '<img class="dak-israel-strip-image" src="https://images.unsplash.com/photo-1575667456742-4269014e68aa?auto=format&amp;fit=crop&amp;fm=jpg&amp;q=80&amp;w=1400" alt="Old City of Jerusalem, Israel" loading="lazy" width="1400" height="1050">';
}

$dead_sea = daktravel_media_image( 'daktravel_deadsea_image', 'large', 'dak-israel-strip-image', 'The Dead Sea, Israel' );
if ( ! $dead_sea ) {
    $dead_sea = '<img class="dak-israel-strip-image" src="https://images.unsplash.com/photo-1683968851645-46f11ec9cec5?auto=format&amp;fit=crop&amp;fm=jpg&amp;q=80&amp;w=1400" alt="Dead Sea, Israel" loading="lazy" width="1400" height="1050">';
}
?>
<section class="dak-israel-strip" aria-label="Israel destination imagery">
    <div class="container dak-israel-strip-grid">
        <figure><div class="dak-israel-strip-media"><?php echo wp_kses_post( $tel_aviv ); ?></div><figcaption>Tel Aviv</figcaption></figure>
        <figure><div class="dak-israel-strip-media"><?php echo wp_kses_post( $jerusalem ); ?></div><figcaption>Jerusalem</figcaption></figure>
        <figure><div class="dak-israel-strip-media"><?php echo wp_kses_post( $dead_sea ); ?></div><figcaption>Dead Sea</figcaption></figure>
    </div>
</section>

<section class="dak-dark-band">
    <div class="container dak-narrow">
        <div class="eyebrow">South Africa–Israel specialists</div>
        <h2>Travel between South Africa and Israel is a market we know well.</h2>
        <p>D.A.K has years of experience arranging Johannesburg–Tel Aviv and Tel Aviv–Johannesburg travel, domestic connections across South Africa, family trips, youth and community groups, organisations and travellers who need extra assistance.</p>
    </div>
</section>

<section class="dak-quiet-cta">
    <div class="container dak-quiet-cta-inner">
        <div><div class="eyebrow">Start here</div><h2>Send us your South Africa–Israel travel dates.</h2><p>Tell us where you are starting, where you need to return to and your dates. We will check the sensible options.</p></div>
        <div class="dak-page-actions"><a class="btn btn--whatsapp" target="_blank" rel="noopener noreferrer" href="<?php echo esc_url( daktravel_whatsapp_url( 'Good day D.A.K Travel. Please assist me with travel between South Africa and Israel.' ) ); ?>">WhatsApp Us</a><a class="btn btn--outline" href="<?php echo esc_url( home_url('/contact/?type=israel#enquiry') ); ?>">Send Enquiry</a></div>
    </div>
</section>
</main>
<?php get_footer(); ?>
