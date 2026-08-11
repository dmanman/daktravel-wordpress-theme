<?php
$form_status = '';
if ( isset( $_SERVER['REQUEST_METHOD'] ) && 'POST' === strtoupper( sanitize_text_field( wp_unslash( $_SERVER['REQUEST_METHOD'] ) ) ) && isset( $_POST['daktravel_enquiry_submit'] ) ) {
    $form_status = daktravel_process_enquiry_submission();
}

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
$prefill_type = isset( $type_map[ $requested_type ] ) ? $type_map[ $requested_type ] : 'General travel enquiry';

if ( 'Group or delegation' === $prefill_type ) {
    $prefill_mode = 'group';
} elseif ( 'Business travel' === $prefill_type ) {
    $prefill_mode = 'business';
} elseif ( 'Existing booking' === $prefill_type ) {
    $prefill_mode = 'existing';
} elseif ( 'General travel enquiry' === $prefill_type ) {
    $prefill_mode = 'general';
} else {
    $prefill_mode = 'travel';
}

if ( ! $form_status && isset( $_GET['sent'] ) ) {
    $sent = sanitize_text_field( wp_unslash( $_GET['sent'] ) );
    if ( '1' === $sent ) {
        $form_status = 'success';
    } elseif ( 'invalid' === $sent ) {
        $form_status = 'invalid';
    } elseif ( '0' === $sent || 'error' === $sent ) {
        $form_status = 'error';
    }
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
                <a class="btn btn--whatsapp" target="_blank" rel="noopener noreferrer" href="<?php echo esc_url( daktravel_whatsapp_url( 'Good day D.A.K Travel. I would like assistance with a travel enquiry.' ) ); ?>">WhatsApp Us</a>
                <a class="btn btn--outline" href="#enquiry">Email Enquiry</a>
            </div>
            <p class="contact-phone"><strong>Telephone:</strong> <a href="tel:+27114405980">+27 11 440 5980</a> <span>if you prefer to call</span></p>
        </div>
        <?php echo wp_kses_post( daktravel_media_slot( 'daktravel_contact_image', 'Aircraft wing above the clouds', 'Personal travel service', 'https://images.unsplash.com/photo-1436491865332-7a61a109cc05?auto=format&fit=crop&fm=jpg&q=82&w=1800' ) ); ?>
    </div>
</section>

<section class="dak-intro-section" id="enquiry">
    <div class="container utility-page-shell">
        <div class="eyebrow">Email enquiry</div>

        <?php if ( 'success' === $form_status ) : ?>
            <div class="form-message form-message--success">Thank you. Your enquiry has been sent to D.A.K Travel.</div>
        <?php elseif ( 'invalid' === $form_status ) : ?>
            <div class="form-message form-message--error">Please complete your name, a valid email address and your message.</div>
        <?php elseif ( 'error' === $form_status ) : ?>
            <div class="form-message form-message--error">We could not send your enquiry. Please try again or use WhatsApp Us.</div>
        <?php endif; ?>

        <form class="dak-enquiry-form" method="post" action="">
            <input type="hidden" name="daktravel_enquiry_submit" value="1">
            <input type="hidden" name="return_type" value="<?php echo esc_attr( $requested_type ); ?>">
            <?php wp_nonce_field( 'daktravel_enquiry', 'daktravel_enquiry_nonce' ); ?>
            <div class="dak-honeypot" aria-hidden="true"><label>Website<input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>

            <div class="form-grid form-grid--core">
                <label>Full name<span>*</span><input type="text" name="name" required autocomplete="name"></label>
                <label>Email<span>*</span><input type="email" name="email" required autocomplete="email"></label>
                <label>Mobile / WhatsApp<input type="tel" name="mobile" autocomplete="tel"></label>
                <label>Enquiry type
                    <select name="enquiry_type">
                        <option value="General travel enquiry" <?php selected( $prefill_type, 'General travel enquiry' ); ?>>General travel enquiry</option>
                        <option value="Israel travel" <?php selected( $prefill_type, 'Israel travel' ); ?>>Israel travel</option>
                        <option value="Group or delegation" <?php selected( $prefill_type, 'Group or delegation' ); ?>>Group or delegation</option>
                        <option value="Business travel" <?php selected( $prefill_type, 'Business travel' ); ?>>Business travel</option>
                        <option value="Complex personal travel" <?php selected( $prefill_type, 'Complex personal travel' ); ?>>Complex personal travel</option>
                        <option value="Existing booking" <?php selected( $prefill_type, 'Existing booking' ); ?>>Existing booking</option>
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
                    <label>Approx. group size<input type="text" name="group_travellers"></label>
                    <label>Departure city or cities<input type="text" name="origins"></label>
                    <label>Destination<input type="text" name="group_destination"></label>
                    <label>Travel dates<input type="text" name="group_dates" placeholder="If known"></label>
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
            <div class="form-submit">
                <button class="btn btn--primary" type="submit">Send Enquiry</button>
                <span>Sent directly to D.A.K Travel.</span>
            </div>
        </form>
    </div>
</section>
</main>
<?php get_footer(); ?>
