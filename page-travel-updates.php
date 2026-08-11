<?php get_header(); ?>
<main>
<section class="dak-page-hero">
    <div class="container dak-page-hero-grid">
        <div class="dak-page-hero-copy">
            <div class="eyebrow">Travel Updates</div>
            <h1>Important travel information, kept simple.</h1>
            <p class="lead">Airline schedules, entry rules and operating conditions can change. For a current answer, send us your route and travel dates.</p>
            <div class="dak-page-actions"><a class="btn btn--whatsapp" href="<?php echo esc_url( daktravel_whatsapp_url( 'Good day D.A.K Travel. Please check the latest travel information for my trip.' ) ); ?>">WhatsApp Us</a><a class="btn btn--outline" href="<?php echo esc_url( home_url('/contact/#enquiry') ); ?>">Email / Enquire</a></div>
        </div>
        <div class="dak-media-slot dak-media-placeholder" aria-hidden="true"><span>Current travel guidance</span></div>
    </div>
</section>
<section class="dak-intro-section"><div class="container dak-narrow"><div class="eyebrow">Before you travel</div><h2>Check the details that matter for your journey.</h2><div class="dak-feature-list"><div class="dak-feature-row"><span class="num">01</span><strong>Flight schedules</strong><p>We can check current operating schedules and connection options.</p></div><div class="dak-feature-row"><span class="num">02</span><strong>Entry requirements</strong><p>Requirements depend on nationality, destination and purpose of travel. Always confirm what applies to your trip.</p></div><div class="dak-feature-row"><span class="num">03</span><strong>Changes after booking</strong><p>If an airline changes your itinerary, contact us and we will review the available options.</p></div></div></div></section>
<section class="dak-quiet-cta"><div class="container dak-quiet-cta-inner"><div><div class="eyebrow">Need a current answer?</div><h2>Send us your dates and route.</h2><p>We will check what applies to your journey.</p></div></div></section>
</main>
<?php get_footer(); ?>
