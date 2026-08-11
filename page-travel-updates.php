<?php get_header(); ?>
<main>
<section class="dak-page-hero">
    <div class="container dak-page-hero-grid">
        <div class="dak-page-hero-copy">
            <div class="eyebrow">Travel Updates</div>
            <h1>Current travel guidance from D.A.K Travel.</h1>
            <p class="lead">Airline schedules, entry rules and operating conditions can change. Our dated travel updates explain important developments and practical points for South African travellers.</p>
            <div class="dak-page-actions"><a class="btn btn--whatsapp" target="_blank" rel="noopener noreferrer" href="<?php echo esc_url( daktravel_whatsapp_url( 'Good day D.A.K Travel. Please check the latest travel information for my trip.' ) ); ?>">WhatsApp Us</a><a class="btn btn--outline" href="<?php echo esc_url( home_url('/contact/#enquiry') ); ?>">Email / Enquire</a></div>
        </div>
        <div class="dak-media-slot dak-media-placeholder" aria-hidden="true"><span>Current travel guidance</span></div>
    </div>
</section>

<section class="dak-intro-section">
    <div class="container dak-narrow">
        <div class="eyebrow">Before you travel</div>
        <h2>Check the details that matter for your journey.</h2>
        <div class="dak-feature-list">
            <div class="dak-feature-row"><span class="num">01</span><strong>Flight schedules</strong><p>We can check current operating schedules and connection options for your actual travel dates.</p></div>
            <div class="dak-feature-row"><span class="num">02</span><strong>Entry requirements</strong><p>Requirements depend on nationality, destination and purpose of travel. Always confirm what applies to your trip.</p></div>
            <div class="dak-feature-row"><span class="num">03</span><strong>Changes after booking</strong><p>If an airline changes your itinerary, contact us and we will review the available options and applicable fare rules.</p></div>
        </div>
    </div>
</section>

<section class="section section--ivory" aria-labelledby="latest-travel-updates">
    <div class="container">
        <div class="section-intro">
            <div class="eyebrow">Latest guidance</div>
            <h2 id="latest-travel-updates">Latest travel updates</h2>
            <p class="lead">Each article is dated so you can see when it was published. For a current answer relating to a specific booking, contact D.A.K directly.</p>
        </div>

        <?php
        $updates = new WP_Query(
            array(
                'post_type'           => 'post',
                'post_status'         => 'publish',
                'posts_per_page'      => 9,
                'ignore_sticky_posts' => true,
            )
        );
        ?>

        <?php if ( $updates->have_posts() ) : ?>
            <div class="service-grid travel-update-grid">
                <?php while ( $updates->have_posts() ) : $updates->the_post(); ?>
                    <article class="service-card travel-update-card">
                        <div class="service-no"><?php echo esc_html( get_the_date( 'j F Y' ) ); ?></div>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 28, '…' ) ); ?></p>
                        <a class="text-link" href="<?php the_permalink(); ?>">Read update</a>
                    </article>
                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <div class="editorial-panel">
                <h3>Travel updates are being prepared.</h3>
                <p>For the latest information on your route, send D.A.K your travel dates and itinerary.</p>
            </div>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    </div>
</section>

<section class="dak-quiet-cta">
    <div class="container dak-quiet-cta-inner">
        <div><div class="eyebrow">Need a current answer?</div><h2>Send us your dates and route.</h2><p>We will check what applies to your journey.</p></div>
        <div class="dak-page-actions"><a class="btn btn--whatsapp" target="_blank" rel="noopener noreferrer" href="<?php echo esc_url( daktravel_whatsapp_url( 'Good day D.A.K Travel. Please check the latest travel information for my trip.' ) ); ?>">WhatsApp Us</a><a class="btn btn--outline" href="<?php echo esc_url( home_url('/contact/#enquiry') ); ?>">Send Enquiry</a></div>
    </div>
</section>
</main>
<?php get_footer(); ?>
