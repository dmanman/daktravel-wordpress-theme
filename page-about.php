<?php get_header(); ?>
<main>
<style>
.dak-about-person{width:100%;max-width:380px;justify-self:end;margin:0;}
.dak-about-person-image{display:block;width:100%;height:auto;max-height:420px;object-fit:cover;}
.dak-about-person-copy{padding-top:12px;color:#68737d;font-size:.78rem;line-height:1.45;}
.dak-about-person-copy span,.dak-about-person-copy strong{display:block;}
.dak-about-person-copy strong{color:#0a1723;margin-top:3px;}
@media(max-width:980px){.dak-about-person{justify-self:start;max-width:340px;}}
@media(max-width:680px){.dak-about-person{max-width:280px;}.dak-about-person-image{max-height:340px;}}
</style>

<section class="dak-page-hero">
    <div class="container dak-page-hero-grid">
        <div class="dak-page-hero-copy">
            <div class="eyebrow">About D.A.K Travel</div>
            <h1>Established in Johannesburg in 2006.</h1>
            <p class="lead">D.A.K is an experienced travel agency specialising in South Africa–Israel travel, groups, business travel and complex international journeys.</p>
            <p>We believe clients should know who is handling their booking and be able to reach someone who understands it.</p>
        </div>
        <?php echo wp_kses_post( daktravel_media_slot( 'daktravel_about_city_image', 'Johannesburg skyline with the Hillbrow Tower above the city', 'Johannesburg', 'https://images.unsplash.com/photo-1654575998971-4f467c8a89c1?auto=format&fit=crop&fm=jpg&q=82&w=1800' ) ); ?>
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
        <aside class="dak-about-person" aria-label="D.A.K Travel personal service">
            <?php
            $team_image = daktravel_media_image( 'daktravel_team_image', 'medium', 'dak-about-person-image', 'D.A.K Travel team' );
            if ( $team_image ) {
                echo wp_kses_post( $team_image );
            } else {
                ?>
                <img class="dak-about-person-image" src="<?php echo esc_url( daktravel_existing_upload_url( '/2022/08/photo.small_.yk_.jpg' ) ); ?>" alt="D.A.K Travel team" loading="lazy" decoding="async">
            <?php } ?>
            <div class="dak-about-person-copy"><span>Personal service</span><strong>D.A.K Travel · Johannesburg</strong></div>
        </aside>
    </div>
</section>

<section class="section">
    <div class="container editorial-split">
        <div>
            <div class="eyebrow">Airlines &amp; travel suppliers we work with</div>
            <h2>Established suppliers across the journey.</h2>
            <p class="lead">Depending on the itinerary and product, D.A.K works with a range of established airlines, holiday wholesalers, car-rental companies and travel insurers.</p>
            <p>Supplier choice depends on the route, dates, availability and traveller requirements. These are suppliers we work with rather than exclusive partnerships.</p>
        </div>
        <div class="editorial-panel">
            <div class="case-study-label">Airlines</div>
            <h3>Ethiopian Airlines · Emirates</h3>
            <p>International flight options where suitable for the itinerary.</p>
            <div class="case-study">
                <span class="case-study-label">Holiday suppliers</span>
                <strong>World Leisure Holidays · The Holiday Factory · Thompsons Tours</strong>
                <span>Selected holiday packages and resort options, subject to availability.</span>
            </div>
            <div class="case-study">
                <span class="case-study-label">Travel components</span>
                <strong>First Car Rental · Hollard Travel Insurance · TIC</strong>
                <span>Car hire and travel-insurance options where appropriate to the booking.</span>
            </div>
        </div>
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