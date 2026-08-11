<?php
/**
 * Hidden utility page for email signature disclaimer links.
 * Accessible at /email-disclaimer/ but intentionally excluded from the main navigation.
 */
get_header();
?>
<main class="utility-page utility-page--email-disclaimer">
    <section class="utility-page-hero">
        <div class="container utility-page-shell">
            <div class="eyebrow">D.A.K Travel</div>
            <h1>Email Disclaimer</h1>
            <p>This page contains the legal and confidentiality notice linked from D.A.K Travel email signatures.</p>
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
