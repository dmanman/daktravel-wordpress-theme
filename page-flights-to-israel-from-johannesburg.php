<?php get_header(); ?>
<main>
<section class="dak-page-hero">
    <div class="container dak-page-hero-grid">
        <div class="dak-page-hero-copy">
            <div class="eyebrow">Johannesburg to Israel</div>
            <h1>Flights to Israel from Johannesburg, planned around the whole journey.</h1>
            <p class="lead">D.A.K Travel helps travellers compare sensible Johannesburg–Tel Aviv options, connection times, baggage, fare rules and return travel before they book.</p>
            <div class="dak-page-actions"><a class="btn btn--primary" href="<?php echo esc_url( home_url('/contact/?type=israel#enquiry') ); ?>">Start an Israel Enquiry</a></div>
        </div>
        <?php echo wp_kses_post( daktravel_media_slot( 'daktravel_israel_image', 'Tel Aviv, Israel', 'Johannesburg to Israel travel', 'https://images.unsplash.com/photo-1646226303063-1e5334284894?auto=format&fit=crop&fm=jpg&q=82&w=1800' ) ); ?>
    </div>
</section>

<section class="dak-intro-section">
    <div class="container dak-narrow">
        <div class="eyebrow">Johannesburg–Tel Aviv travel</div>
        <h2>The lowest fare is only one part of the decision.</h2>
        <p class="lead">A good itinerary also needs sensible connection times, baggage that works for the trip, usable fare conditions and a return journey that fits your plans.</p>
        <div class="dak-feature-list">
            <div class="dak-feature-row"><span class="num">01</span><strong>Current routing options</strong><p>We compare the practical flight combinations available for your actual dates rather than relying on a fixed schedule.</p></div>
            <div class="dak-feature-row"><span class="num">02</span><strong>Connection quality</strong><p>We look at total journey time, airport changes, overnight connections and the amount of time you actually have between sectors.</p></div>
            <div class="dak-feature-row"><span class="num">03</span><strong>Fare flexibility</strong><p>Where flexibility matters, we compare change and cancellation conditions before you commit.</p></div>
            <div class="dak-feature-row"><span class="num">04</span><strong>Return to South Africa</strong><p>Your Tel Aviv–Johannesburg return is considered as part of the same journey, including onward South African connections where required.</p></div>
        </div>
    </div>
</section>

<section class="dak-dark-band"><div class="container dak-narrow"><div class="eyebrow">D.A.K Travel</div><h2>South Africa–Israel travel is specialist work for us.</h2><p>We assist individuals, families, students, elderly travellers, groups and organisations travelling between Johannesburg and Israel, with a real consultant available when the itinerary changes.</p></div></section>

<section class="dak-quiet-cta"><div class="container dak-quiet-cta-inner"><div><div class="eyebrow">Related Israel travel</div><h2>Also returning from Israel?</h2><p>See our guide to <a href="<?php echo esc_url( home_url('/flights-from-israel-to-south-africa/') ); ?>">flights from Israel to South Africa</a> or review our main <a href="<?php echo esc_url( home_url('/israel-travel/') ); ?>">South Africa–Israel travel service</a>.</p></div><div class="dak-page-actions"><a class="btn btn--outline" href="<?php echo esc_url( home_url('/contact/?type=israel#enquiry') ); ?>">Send Your Dates</a></div></div></section>
</main>
<?php get_footer(); ?>
