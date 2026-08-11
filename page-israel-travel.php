<?php get_header(); ?>
<main>
<section class="dak-page-hero">
    <div class="container dak-page-hero-grid">
        <div class="dak-page-hero-copy">
            <div class="eyebrow">South Africa–Israel Travel · Established 2006</div>
            <h1>Flights and travel between South Africa and Israel, expertly managed.</h1>
            <p class="lead">D.A.K Travel helps individuals, families, students, groups and organisations travel from South Africa to Israel — and return from Israel to South Africa — with practical route comparisons, clear fare advice and personal support.</p>
            <div class="dak-page-actions">
                <a class="btn btn--whatsapp" target="_blank" rel="noopener noreferrer" href="<?php echo esc_url( daktravel_whatsapp_url( 'Good day D.A.K Travel. Please assist me with travel between South Africa and Israel.' ) ); ?>">WhatsApp Us</a>
                <a class="btn btn--outline" href="<?php echo esc_url( home_url('/contact/?type=israel#enquiry') ); ?>">Email / Enquire</a>
            </div>
        </div>
        <?php
        $israel_image = daktravel_media_image( 'daktravel_israel_image', 'large', 'dak-media-image', 'Tel Aviv, Israel for South Africa to Israel travel' );
        if ( $israel_image ) :
            echo '<div class="dak-media-slot has-image">' . wp_kses_post( $israel_image ) . '</div>';
        else :
            ?>
            <figure class="dak-media-slot has-image dak-israel-architecture">
                <img class="dak-media-image" src="https://upload.wikimedia.org/wikipedia/commons/2/2b/Azriely_Center.jpg" alt="Tel Aviv, Israel for South Africa to Israel travel" width="1600" height="1200" loading="eager" fetchpriority="high">
                <figcaption class="image-credit">Azrieli Center, Tel Aviv · Photo: Rastaman3000 / CC BY-SA 3.0</figcaption>
            </figure>
        <?php endif; ?>
    </div>
</section>

<section class="dak-intro-section">
    <div class="container dak-narrow">
        <div class="eyebrow">Flights to Israel from South Africa — and return</div>
        <h2>We compare the whole journey in both directions.</h2>
        <p class="lead">Whether you are flying from Johannesburg, Cape Town, Durban or a regional South African city to Israel, the best itinerary depends on more than the headline fare. We compare route, connection time, baggage, ticket structure, flexibility and how the return journey fits your plans.</p>
        <div class="dak-feature-list">
            <div class="dak-feature-row"><span class="num">01</span><strong>South Africa to Israel</strong><p>We check sensible current flight options for your actual dates instead of relying on a permanent published schedule.</p></div>
            <div class="dak-feature-row"><span class="num">02</span><strong>Israel to South Africa</strong><p>We compare return and one-way options from Tel Aviv and coordinate onward South African connections where required.</p></div>
            <div class="dak-feature-row"><span class="num">03</span><strong>Fare conditions &amp; baggage</strong><p>We explain the important change, cancellation and baggage conditions before you commit to an itinerary.</p></div>
            <div class="dak-feature-row"><span class="num">04</span><strong>Help when plans change</strong><p>You have a real consultant who already understands how the booking fits together and can help when schedules or travel plans move.</p></div>
        </div>
    </div>
</section>

<section class="section section--ivory" aria-labelledby="south-africa-israel-city-guides">
    <div class="container">
        <div class="section-intro">
            <div class="eyebrow">Start from your city</div>
            <h2 id="south-africa-israel-city-guides">South Africa to Israel flight guides</h2>
            <p class="lead">The right route can differ depending on where in South Africa you begin. These guides explain the practical issues we consider for each starting point.</p>
        </div>
        <div class="service-grid">
            <article class="service-card"><div class="service-no">JOHANNESBURG</div><h3>Flights to Israel from Johannesburg</h3><p>Compare routing, connection time, baggage and fare flexibility from South Africa’s main international gateway.</p><a class="text-link" href="<?php echo esc_url( home_url('/flights-to-israel-from-johannesburg/') ); ?>">Johannesburg to Israel</a></article>
            <article class="service-card"><div class="service-no">CAPE TOWN</div><h3>Flights to Israel from Cape Town</h3><p>Understand international connections, possible feeder sectors and the return journey to Cape Town.</p><a class="text-link" href="<?php echo esc_url( home_url('/flights-to-israel-from-cape-town/') ); ?>">Cape Town to Israel</a></article>
            <article class="service-card"><div class="service-no">DURBAN</div><h3>Flights to Israel from Durban</h3><p>See how domestic and international connections can be coordinated as one complete journey.</p><a class="text-link" href="<?php echo esc_url( home_url('/flights-to-israel-from-durban/') ); ?>">Durban to Israel</a></article>
            <article class="service-card"><div class="service-no">ALL ROUTES</div><h3>South Africa–Israel flight routes</h3><p>Compare route-planning considerations for Johannesburg, Cape Town, Durban and regional cities.</p><a class="text-link" href="<?php echo esc_url( home_url('/south-africa-israel-flight-routes/') ); ?>">Compare South Africa–Israel routes</a></article>
        </div>
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
        <h2>Travel between South Africa and Israel is specialist work for us.</h2>
        <p>D.A.K has years of experience arranging South Africa–Israel travel, domestic connections across South Africa, family trips, youth and community groups, organisations and travellers who need extra assistance. We focus on building an itinerary that works in practice, not simply displaying the lowest fare.</p>
    </div>
</section>

<section class="section" aria-labelledby="south-africa-israel-faq">
    <div class="container dak-narrow">
        <div class="eyebrow">Common questions</div>
        <h2 id="south-africa-israel-faq">South Africa to Israel travel questions</h2>
        <div class="dak-feature-list">
            <div class="dak-feature-row"><strong>What is the best way to fly from South Africa to Israel?</strong><p>There is no single best routing for every traveller. The answer depends on your departure city, dates, connection quality, baggage needs, fare conditions and how much flexibility you need.</p></div>
            <div class="dak-feature-row"><strong>Do you publish a fixed airline schedule?</strong><p>No. Airline operations can change, so we check the current options for your travel dates rather than leaving a permanent schedule on the website that may become outdated.</p></div>
            <div class="dak-feature-row"><strong>Can you arrange flights from Cape Town or Durban as well as Johannesburg?</strong><p>Yes. We plan journeys from Johannesburg, Cape Town, Durban and regional South African cities, including domestic feeder sectors where appropriate.</p></div>
            <div class="dak-feature-row"><strong>Can D.A.K help with groups travelling to Israel?</strong><p>Yes. Our <a href="<?php echo esc_url( home_url('/groups-delegations/') ); ?>">group and delegation travel service</a> can coordinate multiple passengers, different origin cities, deadlines and international connections.</p></div>
            <div class="dak-feature-row"><strong>Can you help if the airline changes my flight?</strong><p>Yes. We can review the changed itinerary and available alternatives subject to the airline’s rules, availability and the conditions of your ticket.</p></div>
        </div>
    </div>
</section>

<section class="dak-quiet-cta">
    <div class="container dak-quiet-cta-inner">
        <div><div class="eyebrow">Start here</div><h2>Send us your South Africa–Israel travel dates.</h2><p>Tell us where you are starting, where you need to return to and whether price, journey time or flexibility matters most.</p></div>
        <div class="dak-page-actions"><a class="btn btn--whatsapp" target="_blank" rel="noopener noreferrer" href="<?php echo esc_url( daktravel_whatsapp_url( 'Good day D.A.K Travel. Please assist me with travel between South Africa and Israel.' ) ); ?>">WhatsApp Us</a><a class="btn btn--outline" href="<?php echo esc_url( home_url('/contact/?type=israel#enquiry') ); ?>">Send Enquiry</a></div>
    </div>
</section>
</main>
<?php get_footer(); ?>
