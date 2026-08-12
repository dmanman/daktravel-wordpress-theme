<?php
$home_css_path = get_template_directory() . '/assets/css/hero-consultation.css';
wp_enqueue_style(
    'daktravel-hero-consultation',
    get_template_directory_uri() . '/assets/css/hero-consultation.css',
    array( 'daktravel-multilingual' ),
    file_exists( $home_css_path ) ? (string) filemtime( $home_css_path ) : wp_get_theme()->get( 'Version' )
);

$hero_image = function_exists( 'daktravel_media_url' ) ? daktravel_media_url( 'daktravel_hero_image', 'full' ) : '';
if ( ! $hero_image ) {
    $hero_image = 'https://images.pexels.com/photos/8495975/pexels-photo-8495975.jpeg?auto=compress&cs=tinysrgb&w=2200';
}

get_header();
?>
<main>
    <section class="hero hero--consultation">
        <div class="container hero-grid">
            <div class="hero-copy">
                <div class="eyebrow">Johannesburg Travel Specialists</div>
                <h1>Complex travel, handled properly.</h1>
                <p class="hero-lead">D.A.K Travel manages international flights, groups, delegations, organisational travel and complicated journeys from South Africa. You receive experienced advice, clear options and a real person who remains accountable when plans change.</p>
                <div class="hero-actions">
                    <a class="btn btn--primary" href="<?php echo esc_url( home_url( '/contact/#enquiry' ) ); ?>">Request a Travel Quote</a>
                    <a class="btn btn--whatsapp" href="<?php echo esc_url( daktravel_whatsapp_url( 'Good day D.A.K Travel. I would like assistance with a new travel enquiry.' ) ); ?>" target="_blank" rel="noopener">WhatsApp a Travel Specialist</a>
                </div>
                <div class="hero-trust-line" aria-label="D.A.K Travel credentials">
                    <span>Johannesburg-based</span>
                    <span>IATA accredited</span>
                    <span>ASATA member</span>
                    <span>Club Travel affiliate</span>
                </div>
            </div>

            <div class="hero-media-wrap">
                <figure class="dak-media-slot has-image hero-home-media">
                    <div class="hero-home-slideshow" aria-hidden="true">
                        <img class="dak-media-image hero-terminal-photo hero-home-slide hero-home-slide--1" src="<?php echo esc_url( $hero_image ); ?>" alt="" fetchpriority="high" decoding="async">
                        <span class="hero-home-slide hero-home-slide--2"></span>
                        <span class="hero-home-slide hero-home-slide--3"></span>
                        <span class="hero-home-slide hero-home-slide--4"></span>
                    </div>
                    <figcaption class="hero-photo-meta" aria-hidden="true">
                        <span>The world, within reach.</span>
                        <span>Flights · Groups · Business · Complex journeys</span>
                    </figcaption>
                </figure>
            </div>
        </div>
    </section>

    <section class="confidence-bar" aria-label="D.A.K Travel strengths">
        <div class="container confidence-grid">
            <div class="confidence-item"><span class="proof-no">01 · ESTABLISHED</span><strong>Serving travellers since 2006</strong><span>An experienced Johannesburg travel agency.</span></div>
            <div class="confidence-item"><span class="proof-no">02 · SPECIALIST</span><strong>South Africa–Israel expertise</strong><span>Practical advice on routes, connections and fares.</span></div>
            <div class="confidence-item"><span class="proof-no">03 · EXPERIENCED</span><strong>Complex travel made simpler</strong><span>Groups, multi-city trips and complex itineraries coordinated in one place.</span></div>
        </div>
    </section>

    <section class="trust-section">
        <div class="container trust-grid">
            <div class="trust-copy">
                <div class="eyebrow">Why clients trust D.A.K</div>
                <h2>Established experience. Personal service.</h2>
                <p class="lead">Since 2006, D.A.K has helped clients plan and manage important journeys. You deal with a real consultant who knows your booking.</p>
                <p>That matters when there are multiple passengers, tight connections, strict fare rules or last-minute changes.</p>
                <a class="text-link" href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About D.A.K Travel</a>
            </div>
            <div class="trust-panel" aria-label="D.A.K Travel credentials">
                <div class="trust-panel-title">Professional credentials</div>
                <div class="credential-row"><?php echo wp_kses_post( daktravel_credential_mark( 'daktravel_iata_logo', 'IATA', 'IATA Accredited Agent' ) ); ?><div><strong>IATA accredited</strong><small>IATA No. 772 1572-5</small></div></div>
                <div class="credential-row"><?php echo wp_kses_post( daktravel_credential_mark( 'daktravel_asata_logo', 'ASATA', 'ASATA member' ) ); ?><div><strong>ASATA member</strong><small>South African travel industry membership</small></div></div>
                <div class="credential-row"><?php echo wp_kses_post( daktravel_credential_mark( 'daktravel_clubtravel_logo', 'CT', 'Club Travel affiliate' ) ); ?><div><strong>Club Travel affiliate</strong><small>Part of an established travel network</small></div></div>
                <div class="trust-signoff">Established · Accredited · Specialist · Personal</div>
            </div>
        </div>
    </section>

    <section class="confidentiality-section">
        <div class="container confidentiality-grid">
            <div class="confidentiality-copy">
                <div class="eyebrow">Privacy &amp; confidentiality</div>
                <h2>Your travel details are handled with discretion.</h2>
                <p class="lead">Travel is personal. We handle the information you share with care and use it to manage your enquiry and booking.</p>
                <a class="text-link" href="<?php echo esc_url( home_url( '/privacy-notice/' ) ); ?>">Privacy &amp; Confidentiality</a>
            </div>
            <div class="confidentiality-points">
                <div class="confidentiality-point"><strong>Handled discreetly</strong><span>Your passenger and booking information is treated with care.</span></div>
                <div class="confidentiality-point"><strong>Used for your travel</strong><span>The information you provide helps us arrange and service your booking.</span></div>
            </div>
        </div>
    </section>

    <section class="section section--ivory">
        <div class="container editorial-split">
            <div>
                <div class="eyebrow">South Africa–Israel Travel</div>
                <h2>Specialist help for travel between South Africa and Israel.</h2>
                <p class="lead">We arrange travel for individuals, families, students, groups, organisations and elderly passengers.</p>
                <p>We check current flight options for your dates and help you choose the route that best suits your needs.</p>
                <a class="text-link" href="<?php echo esc_url( home_url( '/israel-travel/' ) ); ?>">Visit the Israel Travel Desk</a>
            </div>
            <div class="editorial-panel">
                <div class="case-study-label">We can help with</div>
                <h3>From cities across South Africa to Israel — and back.</h3>
                <p>Johannesburg departures, domestic feeder flights, family travel, youth groups, elderly travellers, flexible fares, baggage and special assistance.</p>
                <div class="case-study">
                    <span class="case-study-label">What we compare</span>
                    <strong>We look beyond the fare.</strong>
                    <span>Route · connection time · baggage · fare rules · flexibility</span>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section-intro">
                <div class="eyebrow">How we can help</div>
                <h2>Some trips need more than a booking engine.</h2>
                <p class="lead">When a journey involves several travellers, cities or deadlines, we keep the details together and give you one point of contact.</p>
            </div>

            <div class="service-grid">
                <article class="service-card">
                    <div class="service-no">01 · ISRAEL</div>
                    <h3>South Africa–Israel Travel</h3>
                    <p>Routes, connections, fare options and practical support for individuals, families and groups travelling to Israel.</p>
                    <a class="text-link" href="<?php echo esc_url( home_url( '/israel-travel/' ) ); ?>">Explore Israel travel</a>
                </article>
                <article class="service-card">
                    <div class="service-no">02 · GROUPS</div>
                    <h3>Groups &amp; Delegations</h3>
                    <p>We coordinate flights, passenger details, deadlines and different departure cities for the whole group.</p>
                    <a class="text-link" href="<?php echo esc_url( home_url( '/groups-delegations/' ) ); ?>">Explore group travel</a>
                </article>
                <article class="service-card">
                    <div class="service-no">03 · ORGANISATIONS</div>
                    <h3>Business Travel</h3>
                    <p>A personal travel desk for businesses and organisations that need reliable bookings and clear support.</p>
                    <a class="text-link" href="<?php echo esc_url( home_url( '/business-travel/' ) ); ?>">Explore business travel</a>
                </article>
                <article class="service-card">
                    <div class="service-no">04 · PERSONAL</div>
                    <h3>Complex Personal Travel</h3>
                    <p>Multi-city trips, families, elderly travellers and premium travel where the details matter.</p>
                    <a class="text-link" href="<?php echo esc_url( home_url( '/complex-travel/' ) ); ?>">Explore complex travel</a>
                </article>
            </div>
        </div>
    </section>

    <section class="final-cta">
        <div class="container final-cta-inner">
            <div>
                <div class="eyebrow">Established 2006 · Personal service</div>
                <h2>Tell us where you need to go.</h2>
                <p>Send the basics and we’ll take it from there.</p>
            </div>
            <div class="final-cta-actions">
                <a class="btn btn--light" href="<?php echo esc_url( home_url( '/contact/#enquiry' ) ); ?>">Send Your Travel Details</a>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
