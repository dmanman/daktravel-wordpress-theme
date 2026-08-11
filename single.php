<?php get_header(); ?>
<main>
<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
        <?php
        $is_case_study = 'dak_case_study' === get_post_type();
        $content_label = $is_case_study ? 'Case Study' : 'Travel Update';
        ?>
        <article <?php post_class( 'dak-single-article' ); ?>>
            <header class="dak-page-hero">
                <div class="container dak-narrow">
                    <div class="eyebrow">
                        <?php echo esc_html( $content_label ); ?>
                        <?php if ( ! $is_case_study ) : ?> · <?php echo esc_html( get_the_date( 'j F Y' ) ); ?><?php endif; ?>
                    </div>
                    <h1><?php the_title(); ?></h1>
                    <?php if ( has_excerpt() ) : ?><p class="lead"><?php echo esc_html( get_the_excerpt() ); ?></p><?php endif; ?>
                </div>
            </header>

            <section class="section">
                <div class="container dak-narrow">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <figure class="dak-article-featured-image">
                            <?php the_post_thumbnail( 'large', array( 'loading' => 'eager', 'fetchpriority' => 'high' ) ); ?>
                        </figure>
                    <?php endif; ?>

                    <div class="dak-article-content">
                        <?php the_content(); ?>
                    </div>

                    <?php if ( ! $is_case_study ) : ?>
                        <aside class="editorial-panel" style="margin-top:48px;">
                            <div class="case-study-label">Important</div>
                            <h3>Travel information can change.</h3>
                            <p>This article was published on <?php echo esc_html( get_the_date( 'j F Y' ) ); ?> and last updated on <?php echo esc_html( get_the_modified_date( 'j F Y' ) ); ?>. Airline schedules, entry requirements and supplier conditions can change. Contact D.A.K Travel to confirm what applies to your specific journey.</p>
                        </aside>
                    <?php endif; ?>
                </div>
            </section>

            <section class="dak-quiet-cta">
                <div class="container dak-quiet-cta-inner">
                    <?php if ( $is_case_study ) : ?>
                        <div><div class="eyebrow">Need help with a similar journey?</div><h2>Ask D.A.K Travel.</h2><p>Send us the travel requirements and we will help you plan the practical options.</p></div>
                        <div class="dak-page-actions"><a class="btn btn--whatsapp" target="_blank" rel="noopener noreferrer" href="<?php echo esc_url( daktravel_whatsapp_url( 'Good day D.A.K Travel. I would like help with a journey similar to a case study on your website.' ) ); ?>">WhatsApp Us</a><a class="btn btn--outline" href="<?php echo esc_url( home_url( '/contact/#enquiry' ) ); ?>">Send Enquiry</a></div>
                    <?php else : ?>
                        <div><div class="eyebrow">Need help with your trip?</div><h2>Ask D.A.K Travel.</h2><p>Send us your route and dates and we will check the current options.</p></div>
                        <div class="dak-page-actions"><a class="btn btn--whatsapp" target="_blank" rel="noopener noreferrer" href="<?php echo esc_url( daktravel_whatsapp_url( 'Good day D.A.K Travel. I have a question about a travel update on your website.' ) ); ?>">WhatsApp Us</a><a class="btn btn--outline" href="<?php echo esc_url( home_url( '/travel-updates/' ) ); ?>">More Travel Updates</a></div>
                    <?php endif; ?>
                </div>
            </section>
        </article>
    <?php endwhile; ?>
<?php endif; ?>
</main>
<?php get_footer(); ?>