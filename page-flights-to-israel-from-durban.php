<?php get_header(); ?>
<main>
<section class="dak-page-hero">
    <div class="container dak-page-hero-grid">
        <div class="dak-page-hero-copy">
            <div class="eyebrow">Durban to Israel</div>
            <h1>Flights to Israel from Durban, with the connections properly coordinated.</h1>
            <p class="lead">D.A.K Travel helps Durban travellers compare practical routes to Israel, including domestic and international connections, baggage, fare flexibility and the journey back to South Africa.</p>
            <div class="dak-page-actions">
                <a class="btn btn--whatsapp" target="_blank" rel="noopener noreferrer" href="<?php echo esc_url( daktravel_whatsapp_url( 'Good day D.A.K Travel. Please assist me with flights from Durban to Israel.' ) ); ?>">WhatsApp Us</a>
                <a class="btn btn--outline" href="<?php echo esc_url( home_url('/contact/?type=israel#enquiry') ); ?>">Send Your Dates</a>
            </div>
        </div>
        <?php echo wp_kses_post( daktravel_media_slot( 'daktravel_israel_image', 'Tel Aviv, Israel for Durban to Israel travel', 'Durban to Israel travel', 'https://images.unsplash.com/photo-1646226303063-1e5334284894?auto=format&fit=crop&fm=jpg&q=82&w=1800' ) ); ?>
    </div>
</section>

<section class="dak-intro-section">
    <div class="container dak-narrow">
        <div class="eyebrow">Durban–Israel flight planning</div>
        <h2>Connection timing can matter as much as the fare.</h2>
        <p class="lead">A Durban to Israel journey may involve more than one sector. We compare the complete chain so that domestic and international flights make practical sense together rather than being chosen independently.</p>
        <div class="dak-feature-list">
            <div class="dak-feature-row"><span class="num">01</span><strong>Domestic feeder connections</strong><p>Where a South African feeder flight is needed, we consider the time between sectors and how the domestic leg fits with the international itinerary.</p></div>
            <div class="dak-feature-row"><span class="num">02</span><strong>International route choices</strong><p>We compare the routings available for your actual dates, looking at total journey time and the quality of the connection rather than price alone.</p></div>
            <div class="dak-feature-row"><span class="num">03</span><strong>Baggage &amp; ticket structure</strong><p>We check baggage and whether the journey is held on one ticket or split across separate bookings, because that can affect how disruptions are handled.</p></div>
            <div class="dak-feature-row"><span class="num">04</span><strong>Return to Durban</strong><p>The return from Israel is coordinated through to Durban, or to a different South African destination if your plans require it.</p></div>
        </div>
    </div>
</section>

<section class="section section--ivory">
    <div class="container">
        <div class="section-intro">
            <div class="eyebrow">Plan the whole route</div>
            <h2>Durban is part of a wider South Africa–Israel itinerary.</h2>
            <p class="lead">We connect the regional and international pieces of the journey and help you understand where the trade-offs are.</p>
        </div>
        <div class="service-grid">
            <article class="service-card"><div class="service-no">ROUTES</div><h3>South Africa–Israel flight routes</h3><p>Compare route-planning considerations from Johannesburg, Cape Town, Durban and regional cities.</p><a class="text-link" href="<?php echo esc_url( home_url('/south-africa-israel-flight-routes/') ); ?>">See route planning</a></article>
            <article class="service-card"><div class="service-no">RETURN</div><h3>Israel to South Africa</h3><p>See how we plan Tel Aviv departures and onward travel to your final South African city.</p><a class="text-link" href="<?php echo esc_url( home_url('/flights-from-israel-to-south-africa/') ); ?>">Plan the return journey</a></article>
        </div>
    </div>
</section>

<section class="dak-dark-band">
    <div class="container dak-narrow">
        <div class="eyebrow">South Africa–Israel specialists</div>
        <h2>One consultant can keep the sectors together.</h2>
        <p>D.A.K can help when your trip includes domestic flights, international connections, family members on different routes or a return to a different city. We consider how the pieces work together before ticketing.</p>
    </div>
</section>

<section class="section" aria-labelledby="durban-israel-faq">
    <div class="container dak-narrow">
        <div class="eyebrow">Common questions</div>
        <h2 id="durban-israel-faq">Durban to Israel flight questions</h2>
        <div class="dak-feature-list">
            <div class="dak-feature-row"><strong>Can you arrange Durban through to Israel as one journey?</strong><p>We can compare the available ticketing and routing options and explain how the sectors connect, including any domestic feeder flight that may be required.</p></div>
            <div class="dak-feature-row"><strong>What if I need to overnight before the international flight?</strong><p>We take practical connection timing into account and can identify when a same-day connection or an overnight arrangement makes more sense.</p></div>
            <div class="dak-feature-row"><strong>Can my return finish in Johannesburg or Cape Town instead?</strong><p>Yes. Different return destinations and open-jaw arrangements can be considered where the itinerary and fare allow it.</p></div>
            <div class="dak-feature-row"><strong>Why not just book the cheapest combination online?</strong><p>The cheapest combination may involve separate tickets, difficult connection times or restrictive fare conditions. We compare the full journey so you can see those trade-offs before paying.</p></div>
        </div>
    </div>
</section>

<section class="dak-quiet-cta">
    <div class="container dak-quiet-cta-inner">
        <div><div class="eyebrow">Durban to Israel</div><h2>Send us your dates and final destination.</h2><p>We will compare the practical options and explain the differences clearly.</p></div>
        <div class="dak-page-actions"><a class="btn btn--whatsapp" target="_blank" rel="noopener noreferrer" href="<?php echo esc_url( daktravel_whatsapp_url( 'Good day D.A.K Travel. Please assist me with flights from Durban to Israel.' ) ); ?>">WhatsApp Us</a><a class="btn btn--outline" href="<?php echo esc_url( home_url('/contact/?type=israel#enquiry') ); ?>">Email / Enquire</a></div>
    </div>
</section>
</main>
<?php get_footer(); ?>
