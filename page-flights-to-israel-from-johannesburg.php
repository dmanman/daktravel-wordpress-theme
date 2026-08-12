<?php
$route_slideshow_css_path = get_template_directory() . '/assets/css/route-slideshow.css';
wp_enqueue_style(
    'daktravel-route-slideshow',
    get_template_directory_uri() . '/assets/css/route-slideshow.css',
    array( 'daktravel-multilingual' ),
    file_exists( $route_slideshow_css_path ) ? (string) filemtime( $route_slideshow_css_path ) : wp_get_theme()->get( 'Version' )
);

/* Keep this Johannesburg-specific slideshow visually distinct from the main Israel Travel page. */
$israel_hero_images = array(
    array(
        'url'    => 'https://upload.wikimedia.org/wikipedia/commons/c/c6/Haifa%27s_Bahai_garden%2C_view_from_above.jpg',
        'alt'    => 'View over the Bahai Gardens and Haifa on Israel Mediterranean coast',
        'credit' => 'Haifa Bahá’í Gardens · Yuval Y / CC BY 2.5',
    ),
    array(
        'url'    => 'https://upload.wikimedia.org/wikipedia/commons/c/c0/Caesarea_Maritima_from_air.jpg',
        'alt'    => 'Aerial view of Caesarea Maritima and the Mediterranean coastline in Israel',
        'credit' => 'Caesarea Maritima aerial · Eldar Eldadi / CC BY-SA 4.0',
    ),
    array(
        'url'    => 'https://upload.wikimedia.org/wikipedia/commons/3/3e/The_Western_Wall%2C_Jerusalem.jpg',
        'alt'    => 'The Western Wall and prayer plaza in Jerusalem',
        'credit' => 'Western Wall, Jerusalem · Danielrosehill / CC BY 4.0',
    ),
    array(
        'url'    => 'https://upload.wikimedia.org/wikipedia/commons/c/c3/Israel-2013-Aerial_10-Negev.jpg',
        'alt'    => 'Aerial view of the Negev Desert in southern Israel',
        'credit' => 'Negev aerial · Andrew Shiva / CC BY-SA 4.0',
    ),
    array(
        'url'    => 'https://upload.wikimedia.org/wikipedia/commons/7/70/View_of_Acre_Harbor.jpg',
        'alt'    => 'View of Acre harbour and old city in northern Israel',
        'credit' => 'Acre Harbor · CallMeBarcode / CC BY-SA 4.0',
    ),
);

get_header();
?>
<main>
<section class="dak-page-hero">
    <div class="container dak-page-hero-grid">
        <div class="dak-page-hero-copy">
            <div class="eyebrow">Johannesburg to Israel</div>
            <h1>Flights to Israel from Johannesburg, planned around the whole journey.</h1>
            <p class="lead">D.A.K Travel helps travellers compare practical Johannesburg–Tel Aviv flight options, connection times, baggage, fare rules and return travel before they book.</p>
            <div class="dak-page-actions"><a class="btn btn--primary" href="<?php echo esc_url( home_url('/contact/?type=israel#enquiry') ); ?>">Start an Israel Enquiry</a></div>
        </div>
        <figure class="dak-media-slot has-image dak-route-slideshow-frame">
            <div class="dak-route-slideshow dak-route-slideshow--<?php echo esc_attr( count( $israel_hero_images ) ); ?>" aria-hidden="true">
                <?php foreach ( $israel_hero_images as $index => $image ) : ?>
                    <span class="dak-route-slide dak-route-slide--<?php echo esc_attr( $index + 1 ); ?>">
                        <img
                            class="dak-media-image"
                            src="<?php echo esc_url( $image['url'] ); ?>"
                            alt="<?php echo esc_attr( $image['alt'] ); ?>"
                            <?php echo 0 === $index ? 'loading="eager" fetchpriority="high"' : 'loading="lazy"'; ?>
                            decoding="async"
                        >
                        <?php if ( ! empty( $image['credit'] ) ) : ?>
                            <span class="dak-route-slide-credit"><?php echo esc_html( $image['credit'] ); ?></span>
                        <?php endif; ?>
                    </span>
                <?php endforeach; ?>
            </div>
        </figure>
    </div>
</section>

<section class="dak-intro-section">
    <div class="container dak-narrow">
        <div class="eyebrow">Johannesburg–Tel Aviv travel</div>
        <h2>The lowest fare is only one part of the decision.</h2>
        <p class="lead">A good itinerary also needs sensible connection times, baggage that works for the trip, usable fare conditions and a return journey that fits your plans.</p>
        <div class="dak-feature-list">
            <div class="dak-feature-row"><span class="num">01</span><strong>Current routing options</strong><p>We compare the practical flight combinations available for your actual dates rather than relying on a fixed airline schedule.</p></div>
            <div class="dak-feature-row"><span class="num">02</span><strong>Connection quality</strong><p>We look at total journey time, connection windows, overnight stops and the amount of time you actually have between sectors.</p></div>
            <div class="dak-feature-row"><span class="num">03</span><strong>Fare flexibility &amp; baggage</strong><p>Where flexibility matters, we compare change and cancellation conditions together with the baggage allowance that applies to the fare.</p></div>
            <div class="dak-feature-row"><span class="num">04</span><strong>Return to South Africa</strong><p>Your Tel Aviv–Johannesburg return is considered as part of the same journey, including onward South African connections where required.</p></div>
        </div>
    </div>
</section>

<section class="section section--ivory">
    <div class="container">
        <div class="section-intro"><div class="eyebrow">Other departure cities</div><h2>Not starting in Johannesburg?</h2><p class="lead">D.A.K also coordinates South Africa–Israel travel from Cape Town, Durban and regional cities.</p></div>
        <div class="service-grid">
            <article class="service-card"><div class="service-no">CAPE TOWN</div><h3>Cape Town to Israel</h3><p>Compare international connections, feeder options and return travel from Cape Town.</p><a class="text-link" href="<?php echo esc_url( home_url('/flights-to-israel-from-cape-town/') ); ?>">Cape Town flight guide</a></article>
            <article class="service-card"><div class="service-no">DURBAN</div><h3>Durban to Israel</h3><p>Coordinate domestic and international sectors from Durban as one complete journey.</p><a class="text-link" href="<?php echo esc_url( home_url('/flights-to-israel-from-durban/') ); ?>">Durban flight guide</a></article>
        </div>
    </div>
</section>

<section class="dak-dark-band"><div class="container dak-narrow"><div class="eyebrow">D.A.K Travel</div><h2>South Africa–Israel travel is specialist work for us.</h2><p>We assist individuals, families, students, elderly travellers, groups and organisations travelling between Johannesburg and Israel, with a real consultant available when the itinerary changes.</p></div></section>

<section class="section" aria-labelledby="johannesburg-israel-faq">
    <div class="container dak-narrow">
        <div class="eyebrow">Common questions</div>
        <h2 id="johannesburg-israel-faq">Johannesburg to Israel flight questions</h2>
        <div class="dak-feature-list">
            <div class="dak-feature-row"><strong>Which airline is best from Johannesburg to Israel?</strong><p>The answer can change by date and traveller. We compare the routing, connection, fare conditions, baggage and total journey rather than recommending one airline in every situation.</p></div>
            <div class="dak-feature-row"><strong>Are there always the same flight options?</strong><p>No. Airline operations and schedules can change, so D.A.K checks current availability for your requested dates.</p></div>
            <div class="dak-feature-row"><strong>Can you arrange onward travel after I return to Johannesburg?</strong><p>Yes. We can consider onward South African flights as part of the return journey where required.</p></div>
            <div class="dak-feature-row"><strong>Can you help with flexible or refundable fares?</strong><p>Yes. Where available, we can compare fare options and explain the key change and cancellation conditions before you choose.</p></div>
        </div>
    </div>
</section>

<section class="dak-quiet-cta"><div class="container dak-quiet-cta-inner"><div><div class="eyebrow">Related Israel travel</div><h2>Also returning from Israel?</h2><p>See our guide to <a href="<?php echo esc_url( home_url('/flights-from-israel-to-south-africa/') ); ?>">flights from Israel to South Africa</a>, compare <a href="<?php echo esc_url( home_url('/south-africa-israel-flight-routes/') ); ?>">South Africa–Israel flight routes</a>, or review our main <a href="<?php echo esc_url( home_url('/israel-travel/') ); ?>">South Africa–Israel travel service</a>.</p></div><div class="dak-page-actions"><a class="btn btn--outline" href="<?php echo esc_url( home_url('/contact/?type=israel#enquiry') ); ?>">Send Your Dates</a></div></div></section>
</main>
<?php get_footer(); ?>