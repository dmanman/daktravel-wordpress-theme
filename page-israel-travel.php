<?php get_header(); ?>
<main>
<section class="dak-page-hero">
    <div class="container dak-page-hero-grid">
        <div class="dak-page-hero-copy">
            <div class="eyebrow">South Africa–Israel Travel · Established 2006</div>
            <h1>Specialist help for travel between South Africa and Israel.</h1>
            <p class="lead">We help individuals, families, students, groups and organisations choose practical routes, fares and connections.</p>
            <div class="dak-page-actions">
                <a class="btn btn--whatsapp" href="<?php echo esc_url( daktravel_whatsapp_url( 'Good day D.A.K Travel. Please assist me with travel between South Africa and Israel.' ) ); ?>">WhatsApp Us</a>
                <a class="btn btn--outline" href="<?php echo esc_url( home_url('/contact/#enquiry') ); ?>">Email / Enquire</a>
            </div>
        </div>
        <?php echo wp_kses_post( daktravel_media_slot( 'daktravel_israel_image', 'Israel travel', 'South Africa–Israel travel' ) ); ?>
    </div>
</section>

<section class="dak-intro-section">
    <div class="container dak-narrow">
        <div class="eyebrow">Why D.A.K</div>
        <h2>We compare the whole journey.</h2>
        <p class="lead">Price matters, but so do the route, connection time, baggage and fare rules. We explain the differences clearly so you can choose with confidence.</p>
        <div class="dak-feature-list">
            <div class="dak-feature-row"><span class="num">01</span><strong>Current flight options</strong><p>We check the routes available for your actual travel dates.</p></div>
            <div class="dak-feature-row"><span class="num">02</span><strong>South African connections</strong><p>We can coordinate feeder flights from other South African cities.</p></div>
            <div class="dak-feature-row"><span class="num">03</span><strong>Families &amp; groups</strong><p>We help keep travellers, dates and special requirements organised.</p></div>
            <div class="dak-feature-row"><span class="num">04</span><strong>Help when plans change</strong><p>You have a real consultant who already understands the booking.</p></div>
        </div>
    </div>
</section>

<section class="dak-dark-band">
    <div class="container dak-narrow">
        <div class="eyebrow">Experienced advice</div>
        <h2>South Africa to Israel is a market we know well.</h2>
        <p>D.A.K has years of experience arranging Israel travel, including complex connections, family journeys, youth and community groups, and travellers who need extra assistance.</p>
    </div>
</section>

<section class="dak-quiet-cta">
    <div class="container dak-quiet-cta-inner">
        <div><div class="eyebrow">Start here</div><h2>Send us your Israel travel dates.</h2><p>WhatsApp or email the details and we will check the sensible options.</p></div>
        <div class="dak-page-actions"><a class="btn btn--whatsapp" href="<?php echo esc_url( daktravel_whatsapp_url( 'Good day D.A.K Travel. Please assist me with Israel travel.' ) ); ?>">WhatsApp Us</a><a class="btn btn--outline" href="<?php echo esc_url( home_url('/contact/#enquiry') ); ?>">Send Enquiry</a></div>
    </div>
</section>
</main>
<?php get_footer(); ?>
