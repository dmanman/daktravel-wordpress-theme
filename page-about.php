<?php get_header(); ?>
<main>
<section class="dak-page-hero dak-about-hero">
    <div class="container dak-page-hero-grid dak-about-hero-grid">
        <div class="dak-page-hero-copy">
            <div class="eyebrow">About D.A.K Travel</div>
            <h1>Established in Johannesburg in 2006.</h1>
            <p class="lead">D.A.K is an experienced travel agency specialising in South Africa–Israel travel, groups, business travel and complex international journeys.</p>
            <p>We believe clients should know who is handling their booking and be able to reach someone who understands it.</p>
        </div>
        <aside class="dak-about-portrait" aria-label="D.A.K Travel personal service">
            <img class="dak-about-portrait-image" src="https://images.unsplash.com/photo-1706016136865-52d211b0335b?auto=format&fit=crop&fm=jpg&q=82&w=2200" alt="View from an airplane window across the aircraft wing and sky" loading="eager" decoding="async">
            <div class="dak-about-portrait-copy"><span>Personal service</span><strong>Johannesburg · Since 2006</strong></div>
        </aside>
    </div>
</section>

<section class="dak-intro-section">
    <div class="container dak-narrow">
        <div class="eyebrow">Our approach</div>
        <h2>Experienced, personal and discreet.</h2>
        <p class="lead">We keep the process simple, explain the important details clearly and stay accountable for the booking we manage.</p>
        <div class="dak-feature-list">
            <div class="dak-feature-row"><span class="num">01</span><strong>Established</strong><p>Serving travellers from Johannesburg since 2006.</p></div>
            <div class="dak-feature-row"><span class="num">02</span><strong>Specialist</strong><p>Deep experience in South Africa–Israel travel and complex journeys.</p></div>
            <div class="dak-feature-row"><span class="num">03</span><strong>Personal</strong><p>You deal with real people who know your booking.</p></div>
            <div class="dak-feature-row"><span class="num">04</span><strong>Confidential</strong><p>Passenger and travel details are handled with discretion.</p></div>
        </div>
    </div>
</section>

<section class="section section--ivory">
    <div class="container editorial-split">
        <div>
            <div class="eyebrow">Personal service</div>
            <h2>A real person behind the booking.</h2>
            <p class="lead">D.A.K has always been built around personal service. You deal with people who know your itinerary and remain available when plans change.</p>
        </div>
        <aside class="dak-about-portrait" aria-label="D.A.K Travel team">
            <img class="dak-about-portrait-image" src="<?php echo esc_url( daktravel_existing_upload_url( '/2022/08/photo.small_.yk_.jpg' ) ); ?>" alt="D.A.K Travel team" loading="lazy" decoding="async">
            <div class="dak-about-portrait-copy"><span>Personal service</span><strong>D.A.K Travel · Johannesburg</strong></div>
        </aside>
    </div>
</section>

<section class="section section--ink">
    <div class="container trust-grid">
        <div class="trust-copy"><div class="eyebrow">Professional standing</div><h2>Trust should be easy to verify.</h2><p class="lead" style="color:#c4ced6;">D.A.K operates as an established South African travel business with recognised industry credentials.</p></div>
        <div class="trust-panel" aria-label="D.A.K Travel credentials">
            <div class="trust-panel-title">Professional credentials</div>
            <div class="credential-row"><?php echo wp_kses_post( daktravel_credential_mark( 'daktravel_iata_logo', 'IATA', 'IATA Accredited Agent' ) ); ?><div><strong>IATA accredited</strong><small>IATA No. 772 1572-5</small></div></div>
            <div class="credential-row"><?php echo wp_kses_post( daktravel_credential_mark( 'daktravel_asata_logo', 'ASATA', 'ASATA member' ) ); ?><div><strong>ASATA member</strong><small>South African travel-industry membership</small></div></div>
            <div class="credential-row"><?php echo wp_kses_post( daktravel_credential_mark( 'daktravel_clubtravel_logo', 'CT', 'Club Travel affiliate' ) ); ?><div><strong>Club Travel affiliate</strong><small>Part of an established travel network</small></div></div>
        </div>
    </div>
</section>

<section class="dak-quiet-cta"><div class="container dak-quiet-cta-inner"><div><div class="eyebrow">D.A.K Travel</div><h2>Tell us where you need to go.</h2><p>WhatsApp or email us and we will help from there.</p></div><div class="dak-page-actions"><a class="btn btn--whatsapp" target="_blank" rel="noopener noreferrer" href="<?php echo esc_url( daktravel_whatsapp_url( 'Good day D.A.K Travel. I would like assistance with a travel enquiry.' ) ); ?>">WhatsApp Us</a><a class="btn btn--outline" href="<?php echo esc_url( home_url('/contact/#enquiry') ); ?>">Email Us</a></div></div></section>
</main>
<?php get_footer(); ?>