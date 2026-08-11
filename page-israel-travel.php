<?php get_header(); ?>
<main>
<section class="dak-page-hero">
    <div class="container dak-page-hero-grid">
        <div class="dak-page-hero-copy">
            <div class="eyebrow">South Africa–Israel Travel · Established 2006</div>
            <h1>Travel from South Africa to Israel, expertly managed.</h1>
            <p class="lead">We help individuals, families, students, groups and organisations choose the right flights, connections and fare options for Israel.</p>
            <div class="dak-page-actions">
                <a class="btn btn--whatsapp" href="<?php echo esc_url( daktravel_whatsapp_url( 'Good day D.A.K Travel. Please assist me with travel between South Africa and Israel.' ) ); ?>">WhatsApp D.A.K</a>
                <a class="btn btn--outline" href="<?php echo esc_url( home_url('/contact/?type=israel#enquiry') ); ?>">Email / Enquire</a>
            </div>
        </div>
        <?php
        $israel_image = daktravel_media_image( 'daktravel_israel_image', 'large', 'dak-media-image', 'Modern architecture in Tel Aviv, Israel' );
        if ( $israel_image ) :
            echo '<div class="dak-media-slot has-image">' . wp_kses_post( $israel_image ) . '</div>';
        else :
            ?>
            <figure class="dak-media-slot has-image dak-israel-architecture">
                <img class="dak-media-image" src="https://images.unsplash.com/photo-1703460755794-13248f18ccca?auto=format&amp;fit=crop&amp;fm=jpg&amp;q=82&amp;w=1800" alt="Modern luxury hotel architecture and palm trees in Tel Aviv, Israel" width="1800" height="1200" loading="eager" fetchpriority="high">
            </figure>
        <?php endif; ?>
    </div>
</section>

<section class="dak-intro-section">
    <div class="container dak-narrow">
        <div class="eyebrow">Flights to Israel from South Africa</div>
        <h2>We compare the whole journey.</h2>
        <p class="lead">The best option is not always the cheapest fare. We look at the route, connection time, baggage, flexibility and what happens if plans change.</p>
        <div class="dak-feature-list">
            <div class="dak-feature-row"><span class="num">01</span><strong>Current flight options</strong><p>We check the sensible routings available for your actual travel dates.</p></div>
            <div class="dak-feature-row"><span class="num">02</span><strong>Connections across South Africa</strong><p>We can coordinate feeder flights from Johannesburg, Cape Town, Durban and regional cities where required.</p></div>
            <div class="dak-feature-row"><span class="num">03</span><strong>Families &amp; groups</strong><p>Passenger details, dates and special requirements are kept together.</p></div>
            <div class="dak-feature-row"><span class="num">04</span><strong>Help when plans change</strong><p>You have a real consultant who already understands the booking.</p></div>
        </div>
    </div>
</section>

<section class="dak-dark-band">
    <div class="container dak-narrow">
        <div class="eyebrow">South Africa–Israel specialists</div>
        <h2>Israel travel is a market we know well.</h2>
        <p>D.A.K has years of experience arranging Israel travel for individuals, families, youth and community groups, organisations and travellers who need extra assistance.</p>
    </div>
</section>

<section class="dak-quiet-cta">
    <div class="container dak-quiet-cta-inner">
        <div><div class="eyebrow">Start here</div><h2>Send us your Israel travel dates.</h2><p>WhatsApp or email the basics and we will check the sensible options.</p></div>
        <div class="dak-page-actions"><a class="btn btn--whatsapp" href="<?php echo esc_url( daktravel_whatsapp_url( 'Good day D.A.K Travel. Please assist me with Israel travel.' ) ); ?>">WhatsApp D.A.K</a><a class="btn btn--outline" href="<?php echo esc_url( home_url('/contact/?type=israel#enquiry') ); ?>">Send Enquiry</a></div>
    </div>
</section>
</main>
<?php get_footer(); ?>
