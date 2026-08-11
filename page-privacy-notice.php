<?php
/**
 * Privacy & Confidentiality page template.
 * Uses the WordPress page content so the legal wording can be maintained in wp-admin.
 */
get_header();
?>
<main class="utility-page utility-page--privacy">
    <section class="utility-page-hero">
        <div class="container utility-page-shell">
            <div class="eyebrow">D.A.K Travel · Established 2006</div>
            <h1>Privacy &amp; Confidentiality</h1>
            <p>How D.A.K Travel handles personal information provided for travel enquiries and bookings.</p>
        </div>
    </section>

    <section class="utility-page-content">
        <div class="container utility-page-shell">
            <article class="legal-card">
                <?php
                while ( have_posts() ) :
                    the_post();
                    the_content();
                endwhile;
                ?>
            </article>
            <p class="utility-page-back"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">← Return to D.A.K Travel</a></p>
        </div>
    </section>
</main>
<?php get_footer(); ?>
