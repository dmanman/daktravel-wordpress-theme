<?php
/**
 * Mauritius holidays landing page.
 * Kept intentionally separate from D.A.K's primary South Africa–Israel positioning.
 */

$mauritius_title = 'Mauritius Holidays from South Africa | D.A.K Travel';
$mauritius_desc  = 'Plan Mauritius holidays from South Africa with D.A.K Travel, including flights, resorts, transfers and travel insurance with personal Johannesburg-based support.';

add_filter(
    'daktravel_seo_defaults',
    static function ( $defaults ) use ( $mauritius_title, $mauritius_desc ) {
        $defaults['mauritius-holidays-from-south-africa'] = array(
            'title'       => $mauritius_title,
            'description' => $mauritius_desc,
        );
        return $defaults;
    }
);

if ( defined( 'RANK_MATH_VERSION' ) ) {
    add_filter( 'rank_math/frontend/title', static function () use ( $mauritius_title ) { return $mauritius_title; } );
    add_filter( 'rank_math/frontend/description', static function () use ( $mauritius_desc ) { return $mauritius_desc; } );
}

$mauritius_image = 'https://images.pexels.com/photos/3703465/pexels-photo-3703465.jpeg?auto=compress&cs=tinysrgb&w=1800';
$mauritius_sizes = '(max-width: 680px) calc(100vw - 28px), (max-width: 900px) calc(100vw - 36px), 52vw';

get_header();
?>
<main>
<section class="dak-page-hero">
    <div class="container dak-page-hero-grid">
        <div class="dak-page-hero-copy">
            <div class="eyebrow">Mauritius Holidays from South Africa</div>
            <h1>Mauritius holidays, planned as one complete trip.</h1>
            <p class="lead">D.A.K Travel can combine flights, resort accommodation, transfers and travel insurance into a practical Mauritius holiday built around your dates and the way you want to travel.</p>
            <p>This is a selected leisure service alongside our specialist South Africa–Israel, group, business and complex-travel work.</p>
            <div class="dak-page-actions"><a class="btn btn--primary" href="<?php echo esc_url( home_url('/contact/?type=mauritius#enquiry') ); ?>">Plan a Mauritius Holiday</a></div>
        </div>
        <figure class="dak-media-slot has-image">
            <img
                class="dak-media-image"
                src="<?php echo esc_url( $mauritius_image ); ?>"
                srcset="https://images.pexels.com/photos/3703465/pexels-photo-3703465.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=720 720w, https://images.pexels.com/photos/3703465/pexels-photo-3703465.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=1100 1100w, https://images.pexels.com/photos/3703465/pexels-photo-3703465.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=1800 1800w"
                sizes="<?php echo esc_attr( $mauritius_sizes ); ?>"
                alt="Aerial view of the Le Morne coastline and lagoon in Mauritius"
                fetchpriority="high"
                loading="eager"
                decoding="async"
            >
        </figure>
    </div>
</section>

<section class="dak-intro-section">
    <div class="container dak-narrow">
        <div class="eyebrow">A complete holiday</div>
        <h2>The package should fit the traveller.</h2>
        <p class="lead">Mauritius can work very differently for a family, a couple, a honeymoon, a milestone birthday or a relaxed resort break. We help put the components together rather than treating the hotel as the whole holiday.</p>
        <div class="dak-feature-list">
            <div class="dak-feature-row"><span class="num">01</span><strong>Flights from South Africa</strong><p>We compare practical flight options for your dates and consider the total journey, baggage and fare conditions.</p></div>
            <div class="dak-feature-row"><span class="num">02</span><strong>Resort options</strong><p>We help narrow the choice by location, board basis, room type, family requirements and the style of holiday you want.</p></div>
            <div class="dak-feature-row"><span class="num">03</span><strong>Transfers &amp; extras</strong><p>Airport transfers and other travel components can be coordinated with the main booking where appropriate.</p></div>
            <div class="dak-feature-row"><span class="num">04</span><strong>Travel insurance</strong><p>Suitable travel-insurance options can be included so the holiday is considered as a complete journey.</p></div>
        </div>
    </div>
</section>

<section class="section section--ivory">
    <div class="container editorial-split">
        <div>
            <div class="eyebrow">From South Africa to Mauritius</div>
            <h2>One enquiry, with the important pieces kept together.</h2>
            <p class="lead">Tell us your preferred dates, departure city, number of travellers and the type of holiday you have in mind. We can then compare suitable combinations rather than sending an undifferentiated list of resorts.</p>
            <p>We can assist travellers departing from Johannesburg and consider other South African departure cities where suitable options are available.</p>
        </div>
        <div class="editorial-panel">
            <div class="case-study-label">What we can package</div>
            <h3>Flights · Resorts · Transfers · Insurance</h3>
            <p>Depending on the trip and availability, D.A.K works with established holiday and travel suppliers including World Leisure Holidays, The Holiday Factory, First Car Rental, Hollard Travel Insurance and TIC.</p>
            <div class="case-study">
                <span class="case-study-label">Supplier choice</span>
                <strong>We are not tied to one package.</strong>
                <span>The most suitable supplier and product can vary by dates, resort, availability and traveller requirements.</span>
            </div>
        </div>
    </div>
</section>

<section class="dak-dark-band">
    <div class="container dak-narrow">
        <div class="eyebrow">Personal support</div>
        <h2>A holiday is still travel that needs to work properly.</h2>
        <p>Flights, room categories, transfers, insurance and supplier conditions all matter. D.A.K gives you a real point of contact who understands how the booking fits together.</p>
    </div>
</section>

<section class="section" aria-labelledby="mauritius-holiday-faq">
    <div class="container dak-narrow">
        <div class="eyebrow">Common questions</div>
        <h2 id="mauritius-holiday-faq">Mauritius holiday questions</h2>
        <div class="dak-feature-list">
            <div class="dak-feature-row"><strong>Can D.A.K arrange a Mauritius holiday package from South Africa?</strong><p>Yes. We can combine the main travel components around your dates and requirements, including flights, resort accommodation, transfers and travel insurance where suitable.</p></div>
            <div class="dak-feature-row"><strong>Can you help me compare resorts rather than just send package prices?</strong><p>Yes. Tell us what matters to you—family facilities, all-inclusive options, location, room type, budget or a quieter couples-style break—and we can narrow the options accordingly.</p></div>
            <div class="dak-feature-row"><strong>Can travel insurance be arranged with the holiday?</strong><p>Yes. D.A.K can assist with travel-insurance options through established suppliers, subject to the applicable policy terms and eligibility.</p></div>
            <div class="dak-feature-row"><strong>Do you only arrange Mauritius holidays?</strong><p>No. Mauritius is a selected leisure offering. D.A.K's wider work includes South Africa–Israel travel, groups and delegations, business travel and complex international journeys.</p></div>
        </div>
    </div>
</section>

<section class="dak-quiet-cta">
    <div class="container dak-quiet-cta-inner">
        <div>
            <div class="eyebrow">Mauritius enquiry</div>
            <h2>Tell us the dates and the kind of holiday you want.</h2>
            <p>We will help narrow the options and build the trip around you.</p>
        </div>
        <div class="dak-page-actions">
            <a class="btn btn--whatsapp" target="_blank" rel="noopener noreferrer" href="<?php echo esc_url( daktravel_whatsapp_url( 'Good day D.A.K Travel. I would like help planning a Mauritius holiday from South Africa.' ) ); ?>">WhatsApp Us</a>
            <a class="btn btn--outline" href="<?php echo esc_url( home_url('/contact/?type=mauritius#enquiry') ); ?>">Send Enquiry</a>
        </div>
    </div>
</section>

<section class="section section--ivory">
    <div class="container dak-narrow">
        <div class="eyebrow">D.A.K specialist travel</div>
        <h2>Travelling to Israel instead?</h2>
        <p class="lead">South Africa–Israel travel remains a core specialist service at D.A.K, with dedicated route guidance and personal support.</p>
        <a class="text-link" href="<?php echo esc_url( home_url('/israel-travel/') ); ?>">Visit the Israel Travel Desk</a>
    </div>
</section>
</main>
<?php get_footer(); ?>
