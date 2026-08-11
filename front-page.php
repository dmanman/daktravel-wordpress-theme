<?php get_header(); ?>
<main>
    <section class="hero">
        <div class="container hero-grid">
            <div class="hero-copy">
                <div class="eyebrow">Established 2006 · Johannesburg · South Africa–Israel specialists</div>
                <h1>Travel, expertly managed.</h1>
                <p>D.A.K Travel specialises in South Africa–Israel travel, groups, business travel and complex international journeys.</p>
                <p class="hero-subline">We compare routes, fares and connections, then stay with you if plans change.</p>
                <div class="hero-actions">
                    <a class="btn btn--whatsapp" href="<?php echo esc_url( daktravel_whatsapp_url( 'Good day D.A.K Travel. I would like assistance with travel between South Africa and Israel.' ) ); ?>">WhatsApp an Israel Travel Specialist</a>
                    <a class="btn btn--outline" href="<?php echo esc_url( home_url( '/contact/#enquiry' ) ); ?>">Send an Enquiry</a>
                </div>
                <div class="hero-tags">
                    <span class="hero-tag">South Africa–Israel</span>
                    <span class="hero-tag">Groups &amp; Delegations</span>
                    <span class="hero-tag">Business Travel</span>
                    <span class="hero-tag">Complex Journeys</span>
                </div>
            </div>

            <div class="hero-media-wrap">
                <div class="hero-media">
                    <div class="hero-media-kicker">South Africa–Israel Travel</div>
                    <div class="hero-media-accent"></div>
                    <div class="advisory-card">
                        <div class="advisory-label">Specialist support</div>
                        <h3>Practical flight options, clear advice and help when plans change.</h3>
                        <div class="advisory-list">
                            <span>Current flight options</span>
                            <span>Domestic connections</span>
                            <span>Families &amp; elderly travellers</span>
                            <span>Groups &amp; youth programmes</span>
                            <span>Flexible fare options</span>
                            <span>Help with changes</span>
                        </div>
                    </div>
                </div>
                <div class="contact-note">
                    <strong>Start with a message.</strong>
                    <span>Send us your dates and route by WhatsApp or email. We’ll check the options and reply.</span>
                    <a class="btn btn--outline btn--compact" style="margin-top:14px;" href="<?php echo esc_url( home_url( '/contact/#enquiry' ) ); ?>">Email / Enquire</a>
                </div>
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
                <div class="hero-actions">
                    <a class="btn btn--whatsapp" href="<?php echo esc_url( daktravel_whatsapp_url( 'Good day D.A.K Travel. Please assist me with a South Africa–Israel travel quotation.' ) ); ?>">WhatsApp for Israel Travel</a>
                    <a class="text-link" href="<?php echo esc_url( home_url( '/israel-travel/' ) ); ?>">Visit the Israel Travel Desk</a>
                </div>
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

            <div class="written-contact-panel">
                <div>
                    <strong>Tell us what you need.</strong>
                    <span>WhatsApp works well for quick enquiries and screenshots. Use the email form for longer requests or group lists.</span>
                </div>
                <div class="written-actions">
                    <a class="btn btn--whatsapp" href="<?php echo esc_url( daktravel_whatsapp_url( 'Good day D.A.K Travel. I would like assistance with a travel enquiry.' ) ); ?>">WhatsApp D.A.K</a>
                    <a class="btn btn--outline" href="<?php echo esc_url( home_url( '/contact/#enquiry' ) ); ?>">Email / Enquire</a>
                </div>
            </div>
        </div>
    </section>

    <section class="section section--ink">
        <div class="container dark-feature">
            <div>
                <div class="eyebrow">Why D.A.K</div>
                <h2>Experience matters when travel gets complicated.</h2>
                <p>We handle changing routes, connections, groups, fare rules and last-minute changes.</p>
                <a class="btn btn--light" href="<?php echo esc_url( home_url( '/about/' ) ); ?>">Meet D.A.K Travel</a>
            </div>
            <div class="feature-points">
                <div class="feature-point"><strong>Experienced advice</strong><span>We look at the whole trip, not just the cheapest fare.</span></div>
                <div class="feature-point"><strong>Trusted credentials</strong><span>IATA accredited, ASATA member and established since 2006.</span></div>
                <div class="feature-point"><strong>One point of contact</strong><span>A real consultant who understands your booking.</span></div>
                <div class="feature-point"><strong>Confidential handling</strong><span>Your travel details are treated with discretion.</span></div>
            </div>
        </div>
    </section>

    <section class="section section--ivory">
        <div class="container">
            <div class="section-intro">
                <div class="eyebrow">How it works</div>
                <h2>Simple from the start.</h2>
                <p class="lead">Tell us where you need to go. We check the options, explain them clearly and manage the booking once you are ready.</p>
            </div>
            <div class="process-grid">
                <div class="process-step"><div class="step-no">01 · TELL US</div><h3>Send us your trip</h3><p>Dates, travellers, cities and any special requirements.</p></div>
                <div class="process-step"><div class="step-no">02 · WE CHECK</div><h3>We compare the options</h3><p>We look at price, route, connections and flexibility.</p></div>
                <div class="process-step"><div class="step-no">03 · WE MANAGE</div><h3>We take care of the booking</h3><p>Once you approve it, we manage the booking and stay available if things change.</p></div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container editorial-split">
            <div>
                <div class="eyebrow">Groups &amp; Delegations</div>
                <h2>One group. One travel plan.</h2>
                <p class="lead">If travellers leave from different cities or return on different dates, D.A.K brings the trip together for the organiser.</p>
                <a class="btn btn--primary" href="<?php echo esc_url( home_url( '/groups-delegations/' ) ); ?>">Plan a Group Journey</a>
            </div>
            <div class="editorial-panel">
                <div class="case-study-label">Example of our work</div>
                <h3>Multi-origin international delegation</h3>
                <p>We coordinated passengers from Johannesburg, Durban, George, East London and Mthatha, including domestic flights, international connections and different return arrangements.</p>
                <div class="case-study">
                    <span class="case-study-label">What D.A.K managed</span>
                    <strong>One clear plan for the whole group.</strong>
                    <span>Flights · passenger lists · deadlines · route checks · itineraries</span>
                </div>
            </div>
        </div>
    </section>

    <section class="final-cta">
        <div class="container final-cta-inner">
            <div>
                <div class="eyebrow">Established 2006 · Personal service</div>
                <h2>Tell us where you need to go.</h2>
                <p>Send us your dates and route by WhatsApp or email. We’ll take it from there.</p>
            </div>
            <div class="final-cta-actions">
                <a class="btn btn--whatsapp" href="<?php echo esc_url( daktravel_whatsapp_url( 'Good day D.A.K Travel. I would like assistance with a travel enquiry.' ) ); ?>">WhatsApp Us</a>
                <a class="btn btn--light" href="<?php echo esc_url( home_url( '/contact/#enquiry' ) ); ?>">Send an Enquiry</a>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
