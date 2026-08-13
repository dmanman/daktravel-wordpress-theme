<?php
/**
 * Zanzibar holidays landing page.
 * Kept intentionally secondary to D.A.K's primary South Africa–Israel positioning.
 */

$route_slideshow_css_path = get_template_directory() . '/assets/css/route-slideshow.css';
wp_enqueue_style(
    'daktravel-route-slideshow',
    get_template_directory_uri() . '/assets/css/route-slideshow.css',
    array( 'daktravel-multilingual' ),
    file_exists( $route_slideshow_css_path ) ? (string) filemtime( $route_slideshow_css_path ) : wp_get_theme()->get( 'Version' )
);

$zanzibar_title = 'Zanzibar Holidays from South Africa | D.A.K Travel';
$zanzibar_desc  = 'Plan Zanzibar holidays from South Africa with D.A.K Travel, including flights, resorts, transfers and travel insurance with personal Johannesburg-based support.';

add_filter(
    'daktravel_seo_defaults',
    static function ( $defaults ) use ( $zanzibar_title, $zanzibar_desc ) {
        $defaults['zanzibar-holidays-from-south-africa'] = array(
            'title'       => $zanzibar_title,
            'description' => $zanzibar_desc,
        );
        return $defaults;
    }
);

if ( defined( 'RANK_MATH_VERSION' ) ) {
    add_filter( 'rank_math/frontend/title', static function () use ( $zanzibar_title ) { return $zanzibar_title; } );
    add_filter( 'rank_math/frontend/description', static function () use ( $zanzibar_desc ) { return $zanzibar_desc; } );
}

$zanzibar_hero_images = array(
    array(
        'url'    => 'https://images.pexels.com/photos/14667393/pexels-photo-14667393.jpeg?auto=compress&cs=tinysrgb&w=1600',
        'alt'    => 'Aerial view of a tropical beach resort in Zanzibar with turquoise water and palm trees',
        'credit' => '',
    ),
    array(
        'url'    => 'https://images.pexels.com/photos/11061326/pexels-photo-11061326.jpeg?auto=compress&cs=tinysrgb&w=1600',
        'alt'    => 'Aerial view of a white sand beach and pier in Zanzibar',
        'credit' => '',
    ),
    array(
        'url'    => 'https://images.pexels.com/photos/11061325/pexels-photo-11061325.jpeg?auto=compress&cs=tinysrgb&w=1600',
        'alt'    => 'Aerial view of a tropical Zanzibar resort and turquoise Indian Ocean',
        'credit' => '',
    ),
    array(
        'url'    => 'https://images.pexels.com/photos/5859220/pexels-photo-5859220.jpeg?auto=compress&cs=tinysrgb&w=1600',
        'alt'    => 'Aerial view of a Zanzibar sandbar surrounded by turquoise water',
        'credit' => '',
    ),
    array(
        'url'    => 'https://images.pexels.com/photos/17732689/pexels-photo-17732689.jpeg?auto=compress&cs=tinysrgb&w=1600',
        'alt'    => 'Aerial coastal view of Stone Town in Zanzibar',
        'credit' => '',
    ),
    array(
        'url'    => 'https://images.pexels.com/photos/30125143/pexels-photo-30125143.jpeg?auto=compress&cs=tinysrgb&w=1600',
        'alt'    => 'Aerial view of Zanzibar white sand beaches, palms and clear blue water',
        'credit' => '',
    ),
);

get_header();
?>
<main>
<section class="dak-page-hero">
    <div class="container dak-page-hero-grid">
        <div class="dak-page-hero-copy">
            <div class="eyebrow">Zanzibar Holidays from South Africa</div>
            <h1>Zanzibar holidays, planned as one complete trip.</h1>
            <p class="lead">D.A.K Travel can combine flights, resort accommodation, transfers and travel insurance into a practical Zanzibar holiday built around your dates and the kind of island break you want.</p>
            <p>Zanzibar is a selected leisure service alongside our specialist South Africa–Israel, group, business and complex-travel work.</p>
            <div class="dak-page-actions"><a class="btn btn--primary" href="<?php echo esc_url( home_url('/contact/?type=zanzibar#enquiry') ); ?>">Plan a Zanzibar Holiday</a></div>
        </div>
        <figure class="dak-media-slot has-image dak-route-slideshow-frame">
            <div class="dak-route-slideshow dak-route-slideshow--<?php echo esc_attr( count( $zanzibar_hero_images ) ); ?>" aria-hidden="true">
                <?php foreach ( $zanzibar_hero_images as $index => $image ) : ?>
                    <span class="dak-route-slide dak-route-slide--<?php echo esc_attr( $index + 1 ); ?>">
                        <img
                            class="dak-media-image"
                            src="<?php echo esc_url( $image['url'] ); ?>"
                            alt="<?php echo esc_attr( $image['alt'] ); ?>"
                            <?php echo 0 === $index ? 'loading="eager" fetchpriority="high"' : 'loading="lazy"'; ?>
                            decoding="async"
                        >
                    </span>
                <?php endforeach; ?>
            </div>
        </figure>
    </div>
</section>

<section class="dak-intro-section">
    <div class="container dak-narrow">
        <div class="eyebrow">A complete island holiday</div>
        <h2>Choose the right Zanzibar experience, not just a room rate.</h2>
        <p class="lead">The right choice depends on whether you want a relaxed beach break, a family holiday, a romantic escape, a resort stay with activities or time to include Stone Town and other island experiences.</p>
        <div class="dak-feature-list">
            <div class="dak-feature-row"><span class="num">01</span><strong>Flights from South Africa</strong><p>We compare practical flight options for your dates, including connection quality, baggage and fare conditions.</p></div>
            <div class="dak-feature-row"><span class="num">02</span><strong>Resorts &amp; areas</strong><p>We help narrow the choice by beach area, board basis, room type, family requirements and the style of holiday you want.</p></div>
            <div class="dak-feature-row"><span class="num">03</span><strong>Transfers &amp; experiences</strong><p>Airport transfers and selected island experiences can be considered with the main booking where appropriate.</p></div>
            <div class="dak-feature-row"><span class="num">04</span><strong>Travel insurance</strong><p>Suitable travel-insurance options can be included so the holiday is considered as a complete journey.</p></div>
        </div>
    </div>
</section>

<section class="section section--ivory">
    <div class="container editorial-split">
        <div>
            <div class="eyebrow">From South Africa to Zanzibar</div>
            <h2>One enquiry, with the important pieces kept together.</h2>
            <p class="lead">Tell us your preferred dates, departure city, number of travellers and what matters most to you. We can then compare suitable flight-and-resort combinations rather than simply sending a long list of hotels.</p>
            <p>We can assist travellers departing from Johannesburg and consider other South African departure cities where practical options are available.</p>
        </div>
        <div class="editorial-panel">
            <div class="case-study-label">What we can arrange</div>
            <h3>Flights · Resorts · Transfers · Insurance</h3>
            <p>D.A.K works with established travel suppliers to put together the components that suit the booking, subject to availability and the applicable supplier terms.</p>
            <div class="case-study">
                <span class="case-study-label">Island choice</span>
                <strong>Zanzibar or Mauritius?</strong>
                <span>They offer different styles of holiday. Tell us what you want from the trip and we can help narrow the choice.</span>
            </div>
        </div>
    </div>
</section>

<section class="dak-dark-band">
    <div class="container dak-narrow">
        <div class="eyebrow">Personal support</div>
        <h2>Your island holiday should work from departure to return.</h2>
        <p>Flights, connections, room categories, transfers, insurance and supplier conditions all matter. D.A.K gives you a real point of contact who understands how the booking fits together.</p>
    </div>
</section>

<section class="section" aria-labelledby="zanzibar-holiday-faq">
    <div class="container dak-narrow">
        <div class="eyebrow">Common questions</div>
        <h2 id="zanzibar-holiday-faq">Zanzibar holiday questions</h2>
        <div class="dak-feature-list">
            <div class="dak-feature-row"><strong>Can D.A.K arrange a Zanzibar holiday package from South Africa?</strong><p>Yes. We can coordinate the main travel components around your dates and requirements, including flights, resort accommodation, transfers and travel insurance where suitable.</p></div>
            <div class="dak-feature-row"><strong>Can you help me choose which part of Zanzibar to stay in?</strong><p>Yes. Tell us the atmosphere, beach style, facilities and budget you prefer and we can narrow the resort and area options accordingly.</p></div>
            <div class="dak-feature-row"><strong>Can Stone Town or excursions be included?</strong><p>Selected transfers and experiences can be considered depending on the holiday package and supplier options available for your dates.</p></div>
            <div class="dak-feature-row"><strong>Do you also arrange Mauritius?</strong><p>Yes. D.A.K has a dedicated Mauritius holiday page as another selected island-holiday service.</p></div>
        </div>
    </div>
</section>

<section class="dak-quiet-cta">
    <div class="container dak-quiet-cta-inner">
        <div>
            <div class="eyebrow">Zanzibar enquiry</div>
            <h2>Tell us the dates and the kind of island holiday you want.</h2>
            <p>We will help narrow the options and build the trip around you.</p>
        </div>
        <div class="dak-page-actions">
            <a class="btn btn--whatsapp" target="_blank" rel="noopener noreferrer" href="<?php echo esc_url( daktravel_whatsapp_url( 'Good day D.A.K Travel. I would like help planning a Zanzibar holiday from South Africa.' ) ); ?>">WhatsApp Us</a>
            <a class="btn btn--outline" href="<?php echo esc_url( home_url('/contact/?type=zanzibar#enquiry') ); ?>">Send Enquiry</a>
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
