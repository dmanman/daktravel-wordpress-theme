<?php get_header(); ?>
<main>
<section class="dak-page-hero">
    <div class="container dak-page-hero-grid">
        <div class="dak-page-hero-copy">
            <div class="eyebrow">Complex Personal Travel</div>
            <h1>For trips that are not a simple return ticket.</h1>
            <p class="lead">Multi-city journeys, families, elderly travellers and premium travel where the details really matter.</p>
            <div class="dak-page-actions"><a class="btn btn--whatsapp" target="_blank" rel="noopener noreferrer" href="<?php echo esc_url( daktravel_whatsapp_url( 'Good day D.A.K Travel. I need help with a complex international trip.' ) ); ?>">WhatsApp Us</a><a class="btn btn--outline" href="<?php echo esc_url( home_url('/contact/?type=complex#enquiry') ); ?>">Email / Enquire</a></div>
        </div>
        <?php echo wp_kses_post( daktravel_media_slot( 'daktravel_complex_image', 'Bright modern airport terminal with large glass windows and an aircraft outside', 'Complex journeys', 'https://images.pexels.com/photos/13315324/pexels-photo-13315324.jpeg?auto=compress&cs=tinysrgb&w=2000' ) ); ?>
    </div>
</section>

<section class="dak-intro-section">
    <div class="container dak-narrow">
        <div class="eyebrow">How we help</div>
        <h2>We make complicated trips easier to understand.</h2>
        <p class="lead">We join the different parts of the journey into one clear plan and explain the choices that matter.</p>
        <div class="dak-feature-list">
            <div class="dak-feature-row"><span class="num">01</span><strong>Multi-city travel</strong><p>Several destinations and different return points brought into one itinerary.</p></div>
            <div class="dak-feature-row"><span class="num">02</span><strong>Families &amp; elderly travellers</strong><p>Connection times, assistance and practical comfort considered from the start.</p></div>
            <div class="dak-feature-row"><span class="num">03</span><strong>Premium cabins</strong><p>Business and premium options compared across the complete journey.</p></div>
            <div class="dak-feature-row"><span class="num">04</span><strong>Flexible fares</strong><p>Important change and cancellation conditions explained before you commit.</p></div>
        </div>
    </div>
</section>

<section class="dak-dark-band">
    <div class="container dak-narrow"><div class="eyebrow">Personal service</div><h2>Some journeys need judgement, not just a search result.</h2><p>We look at the practical journey as a whole — not only the lowest price on the screen.</p></div>
</section>

<section class="dak-quiet-cta"><div class="container dak-quiet-cta-inner"><div><div class="eyebrow">Start planning</div><h2>Send us the itinerary you have in mind.</h2><p>We will help you make sense of it.</p></div><div class="dak-page-actions"><a class="btn btn--whatsapp" target="_blank" rel="noopener noreferrer" href="<?php echo esc_url( daktravel_whatsapp_url( 'Good day D.A.K Travel. I would like help planning a complex trip.' ) ); ?>">WhatsApp Us</a><a class="btn btn--outline" href="<?php echo esc_url( home_url('/contact/?type=complex#enquiry') ); ?>">Send Enquiry</a></div></div></section>
</main>
<?php get_footer(); ?>
