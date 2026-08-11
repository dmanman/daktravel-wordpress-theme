<?php get_header(); ?>
<main>
<section class="dak-page-hero">
    <div class="container dak-page-hero-grid">
        <div class="dak-page-hero-copy">
            <div class="eyebrow">Contact D.A.K Travel</div>
            <h1>Send us your travel details.</h1>
            <p class="lead">WhatsApp is best for quick enquiries and screenshots. Use the form for longer requests, group lists and formal quotations.</p>
            <div class="dak-page-actions"><a class="btn btn--whatsapp" href="<?php echo esc_url( daktravel_whatsapp_url( 'Good day D.A.K Travel. I would like assistance with a travel enquiry.' ) ); ?>">WhatsApp +27 82 440 6144</a><a class="btn btn--outline" href="#enquiry">Email Enquiry</a></div>
            <p style="margin-top:24px;"><strong>Telephone:</strong> <a href="tel:+27114405980">+27 11 440 5980</a> <span style="color:#7a838c;">for clients who prefer to call</span></p>
        </div>
        <?php echo wp_kses_post( daktravel_media_slot( 'daktravel_contact_image', 'D.A.K Travel', 'Personal travel service' ) ); ?>
    </div>
</section>

<section class="dak-intro-section" id="enquiry">
    <div class="container utility-page-shell">
        <div class="section-intro"><div class="eyebrow">Email enquiry</div><h2>Tell us what you need.</h2><p class="lead">Complete the form and it will be emailed directly to D.A.K Travel.</p></div>
        <?php if ( isset( $_GET['sent'] ) && '1' === sanitize_text_field( wp_unslash( $_GET['sent'] ) ) ) : ?><div class="form-message form-message--success">Thank you. Your enquiry has been sent to D.A.K Travel.</div><?php elseif ( isset( $_GET['sent'] ) && in_array( sanitize_text_field( wp_unslash( $_GET['sent'] ) ), array( '0', 'error' ), true ) ) : ?><div class="form-message form-message--error">We could not send your enquiry. Please check the required fields or WhatsApp us instead.</div><?php endif; ?>
        <form class="dak-enquiry-form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
            <input type="hidden" name="action" value="daktravel_enquiry">
            <?php wp_nonce_field( 'daktravel_enquiry', 'daktravel_enquiry_nonce' ); ?>
            <div class="dak-honeypot" aria-hidden="true"><label>Website<input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>
            <div class="form-grid">
                <label>Full name<span>*</span><input type="text" name="name" required autocomplete="name"></label>
                <label>Email<span>*</span><input type="email" name="email" required autocomplete="email"></label>
                <label>Mobile / WhatsApp<input type="tel" name="mobile" autocomplete="tel"></label>
                <label>Enquiry type<select name="enquiry_type"><option value="Israel travel">Israel travel</option><option value="Group or delegation">Group or delegation</option><option value="Business travel">Business travel</option><option value="Complex personal travel">Complex personal travel</option><option value="Existing booking">Existing booking</option><option value="General travel enquiry">General travel enquiry</option></select></label>
                <label>Departure city<input type="text" name="departure"></label>
                <label>Destination<input type="text" name="destination"></label>
                <label>Travel dates<input type="text" name="dates" placeholder="e.g. 12–20 October 2026"></label>
                <label>Number of travellers<input type="text" name="travellers"></label>
            </div>
            <label class="form-full">Tell us what you need<span>*</span><textarea name="message" rows="6" required></textarea></label>
            <div class="form-submit"><button class="btn btn--primary" type="submit">Send Enquiry</button><span>Your message is sent directly to D.A.K Travel.</span></div>
        </form>
    </div>
</section>

<section class="dak-quiet-cta"><div class="container dak-quiet-cta-inner"><div><div class="eyebrow">What to include</div><h2>The basics are enough to start.</h2><p>Departure city, destination, dates, number of travellers and anything important we should know.</p></div></div></section>
</main>
<?php get_footer(); ?>
