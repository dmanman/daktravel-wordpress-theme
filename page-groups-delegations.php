<?php get_header(); ?>
<main>
<section class="dak-page-hero">
    <div class="container dak-page-hero-grid">
        <div class="dak-page-hero-copy">
            <div class="eyebrow">Groups &amp; Delegations</div>
            <h1>One group. One clear travel plan.</h1>
            <p class="lead">D.A.K coordinates flights, passenger details, deadlines and different departure cities so the organiser has one point of contact.</p>
            <div class="dak-page-actions"><a class="btn btn--whatsapp" href="<?php echo esc_url( daktravel_whatsapp_url( 'Good day D.A.K Travel. I need help with group or delegation travel.' ) ); ?>">WhatsApp Group Travel</a><a class="btn btn--outline" href="<?php echo esc_url( home_url('/contact/?type=group#enquiry') ); ?>">Email / Enquire</a></div>
        </div>
        <?php echo wp_kses_post( daktravel_media_slot( 'daktravel_group_image', 'Group travellers in an airport terminal', 'Groups & delegations', 'https://images.unsplash.com/photo-1713561684894-25393bb9594b?auto=format&fit=crop&fm=jpg&q=82&w=1800' ) ); ?>
    </div>
</section>

<section class="dak-intro-section">
    <div class="container dak-narrow">
        <div class="eyebrow">What we manage</div>
        <h2>The difficult parts, kept together.</h2>
        <p class="lead">Groups often involve different cities, passenger lists, deadlines and changes. We keep the moving parts in one place.</p>
        <div class="dak-feature-list">
            <div class="dak-feature-row"><span class="num">01</span><strong>Flights &amp; connections</strong><p>International flights plus domestic feeder sectors where needed.</p></div>
            <div class="dak-feature-row"><span class="num">02</span><strong>Passenger coordination</strong><p>Names, requirements and booking information kept organised.</p></div>
            <div class="dak-feature-row"><span class="num">03</span><strong>Deadlines</strong><p>Deposits, payments and ticketing dates clearly tracked.</p></div>
            <div class="dak-feature-row"><span class="num">04</span><strong>Clear communication</strong><p>Simple, client-ready travel information for the organiser.</p></div>
        </div>
    </div>
</section>

<section class="dak-dark-band">
    <div class="container dak-narrow"><div class="eyebrow">Multi-origin travel</div><h2>Passengers do not all need to start in the same city.</h2><p>We can coordinate travellers joining the same international journey from Johannesburg, Cape Town, Durban and regional cities, with different return arrangements where required.</p></div>
</section>

<section class="dak-quiet-cta"><div class="container dak-quiet-cta-inner"><div><div class="eyebrow">Group enquiry</div><h2>Tell us how many people are travelling.</h2><p>Send the dates, origins and destination and we will take it from there.</p></div><div class="dak-page-actions"><a class="btn btn--whatsapp" href="<?php echo esc_url( daktravel_whatsapp_url( 'Good day D.A.K Travel. I would like a group travel quotation.' ) ); ?>">WhatsApp Us</a><a class="btn btn--outline" href="<?php echo esc_url( home_url('/contact/?type=group#enquiry') ); ?>">Send Enquiry</a></div></div></section>
</main>
<?php get_footer(); ?>
