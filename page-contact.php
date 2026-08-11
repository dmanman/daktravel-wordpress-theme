<?php
get_header();
$requested_type = isset( $_GET['type'] ) ? sanitize_key( wp_unslash( $_GET['type'] ) ) : '';
$type_map = array(
    'israel'   => 'Israel travel',
    'group'    => 'Group or delegation',
    'business' => 'Business travel',
    'complex'  => 'Complex personal travel',
    'existing' => 'Existing booking',
    'general'  => 'General travel enquiry',
);
$prefill_type = isset( $type_map[ $requested_type ] ) ? $type_map[ $requested_type ] : 'Israel travel';

if ( 'Group or delegation' === $prefill_type ) {
    $prefill_mode = 'group';
} elseif ( 'Business travel' === $prefill_type ) {
    $prefill_mode = 'business';
} elseif ( 'Existing booking' === $prefill_type ) {
    $prefill_mode = 'existing';
} else {
    $prefill_mode = 'travel';
}
?>
<main>
<section class="dak-page-hero contact-page-hero">
    <div class="container dak-page-hero-grid">
        <div class="dak-page-hero-copy">
            <div class="eyebrow">Contact D.A.K Travel</div>
            <?php if ( 'Existing booking' === $prefill_type ) : ?>
                <h1>Need help with an existing booking?</h1>
                <p class="lead">Tell us what needs to be changed or checked and we will take it from there.</p>
            <?php else : ?>
                <h1>Tell us about your trip.</h1>
                <p class="lead">For something quick, use WhatsApp. For a quotation or a longer request, send the short form below.</p>
            <?php endif; ?>
            <div class="dak-page-actions">
                <a class="btn btn--whatsapp" href="<?php echo esc_url( daktravel_whatsapp_url( 'Good day D.A.K Travel. I would like assistance with a travel enquiry.' ) ); ?>">WhatsApp D.A.K</a>
                <a class="btn btn--outline" href="#enquiry">Email Enquiry</a>
            </div>
            <p class="contact-phone"><strong>Telephone:</strong> <a href="tel:+27114405980">+27 11 440 5980</a> <span>if you prefer to call</span></p>
        </div>
        <?php echo wp_kses_post( daktravel_media_slot( 'daktravel_contact_image', 'D.A.K Travel', 'Personal travel service' ) ); ?>
    </div>
</section>

<section class="dak-intro-section" id="enquiry">
    <div class="container utility-page-shell">
        <div class="section-intro">
            <div class="eyebrow">Email enquiry</div>
            <h2>Keep it simple.</h2>
            <p class="lead">Start with the basics. Extra fields only appear when they are useful for that type of enquiry.</p>
        </div>

        <?php if ( isset( $_GET['sent'] ) && '1' === sanitize_text_field( wp_unslash( $_GET['sent'] ) ) ) : ?>
            <div class="form-message form-message--success">Thank you. Your enquiry has been sent to D.A.K Travel.</div>
        <?php elseif ( isset( $_GET['sent'] ) && in_array( sanitize_text_field( wp_unslash( $_GET['sent'] ) ), array( '0', 'error' ), true ) ) : ?>
            <div class="form-message form-message--error">We could not send your enquiry. Please try again or use WhatsApp D.A.K.</div>
        <?php endif; ?>

        <form class="dak-enquiry-form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
            <input type="hidden" name="action" value="daktravel_enquiry">
            <?php wp_nonce_field( 'daktravel_enquiry', 'daktravel_enquiry_nonce' ); ?>
            <div class="dak-honeypot" aria-hidden="true"><label>Website<input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>

            <div class="form-grid form-grid--core">
                <label>Full name<span>*</span><input type="text" name="name" required autocomplete="name"></label>
                <label>Email<span>*</span><input type="email" name="email" required autocomplete="email"></label>
                <label>Mobile / WhatsApp<input type="tel" name="mobile" autocomplete="tel"></label>
                <label>Enquiry type
                    <select name="enquiry_type">
                        <option value="Israel travel" <?php selected( $prefill_type, 'Israel travel' ); ?>>Israel travel</option>
                        <option value="Group or delegation" <?php selected( $prefill_type, 'Group or delegation' ); ?>>Group or delegation</option>
                        <option value="Business travel" <?php selected( $prefill_type, 'Business travel' ); ?>>Business travel</option>
                        <option value="Complex personal travel" <?php selected( $prefill_type, 'Complex personal travel' ); ?>>Complex personal travel</option>
                        <option value="Existing booking" <?php selected( $prefill_type, 'Existing booking' ); ?>>Existing booking</option>
                        <option value="General travel enquiry" <?php selected( $prefill_type, 'General travel enquiry' ); ?>>General travel enquiry</option>
                    </select>
                </label>
            </div>

            <div class="form-conditional" data-enquiry-fields="travel" <?php echo 'travel' === $prefill_mode ? '' : 'hidden'; ?>>
                <div class="form-grid">
                    <label>Departure city<input type="text" name="departure"></label>
                    <label>Destination<input type="text" name="destination"></label>
                    <label>Travel dates<input type="text" name="dates" placeholder="If known"></label>
                    <label>Number of travellers<input type="text" name="travellers"></label>
                </div>
            </div>

            <div class="form-conditional" data-enquiry-fields="group" <?php echo 'group' === $prefill_mode ? '' : 'hidden'; ?>>
                <div class="form-grid">
                    <label>Organisation / group name<input type="text" name="organisation"></label>
                    <label>Approx. group size<input type="text" name="travellers"></label>
                    <label>Departure city or cities<input type="text" name="origins"></label>
                    <label>Destination<input type="text" name="destination"></label>
                    <label>Travel dates<input type="text" name="dates" placeholder="If known"></label>
                </div>
            </div>

            <div class="form-conditional" data-enquiry-fields="business" <?php echo 'business' === $prefill_mode ? '' : 'hidden'; ?>>
                <div class="form-grid">
                    <label>Organisation / company<input type="text" name="organisation"></label>
                    <label>Typical trip or destination<input type="text" name="trip_detail"></label>
                </div>
            </div>

            <div class="form-conditional" data-enquiry-fields="existing" <?php echo 'existing' === $prefill_mode ? '' : 'hidden'; ?>>
                <div class="form-grid">
                    <label>Booking reference / PNR<input type="text" name="booking_ref"></label>
                    <label>Passenger surname<input type="text" name="passenger_surname"></label>
                </div>
            </div>

            <label class="form-full">Tell us what you need<span>*</span><textarea name="message" rows="5" required></textarea></label>
            <div class="form-live-status" role="status" aria-live="polite" hidden></div>
            <div class="form-submit">
                <button class="btn btn--primary" type="submit">Send Enquiry</button>
                <span>Sent directly to D.A.K Travel.</span>
            </div>
        </form>
    </div>
</section>
</main>
<?php get_footer(); ?>
