<footer class="site-footer">
    <div class="container footer-grid">
        <div>
            <h2 style="color:#fff;">D.A.K Travel</h2>
            <p>Established in Johannesburg in 2006. Specialist South Africa–Israel travel, groups, business travel and complex international journeys.</p>
            <p><a target="_blank" rel="noopener noreferrer" href="<?php echo esc_url( daktravel_whatsapp_url( 'Good day D.A.K Travel. I would like assistance with a travel enquiry.' ) ); ?>">WhatsApp Us</a><br>
            <a href="<?php echo esc_url( home_url( '/contact/#enquiry' ) ); ?>">Email / Send an enquiry</a><br>
            <span>Telephone: +27 11 440 5980</span></p>
        </div>
        <div>
            <h3 style="color:#fff;">Services</h3>
            <p><a href="<?php echo esc_url( home_url( '/israel-travel/' ) ); ?>">South Africa–Israel Travel</a><br>
            <a href="<?php echo esc_url( home_url( '/groups-delegations/' ) ); ?>">Groups &amp; Delegations</a><br>
            <a href="<?php echo esc_url( home_url( '/business-travel/' ) ); ?>">Business Travel</a><br>
            <a href="<?php echo esc_url( home_url( '/complex-travel/' ) ); ?>">Complex Travel</a><br>
            <a href="<?php echo esc_url( home_url( '/mauritius-holidays-from-south-africa/' ) ); ?>">Mauritius Holidays</a><br>
            <a href="<?php echo esc_url( home_url( '/zanzibar-holidays-from-south-africa/' ) ); ?>">Zanzibar Holidays</a></p>
            <h3 style="color:#fff;margin-top:26px;">Israel Flight Guides</h3>
            <p><a href="<?php echo esc_url( home_url( '/flights-to-israel-from-johannesburg/' ) ); ?>">Johannesburg to Israel</a><br>
            <a href="<?php echo esc_url( home_url( '/flights-to-israel-from-cape-town/' ) ); ?>">Cape Town to Israel</a><br>
            <a href="<?php echo esc_url( home_url( '/flights-to-israel-from-durban/' ) ); ?>">Durban to Israel</a><br>
            <a href="<?php echo esc_url( home_url( '/flights-from-israel-to-south-africa/' ) ); ?>">Israel to South Africa</a></p>
        </div>
        <div>
            <h3 style="color:#fff;">Information</h3>
            <p><a href="<?php echo esc_url( home_url( '/south-africa-israel-flight-routes/' ) ); ?>">South Africa–Israel Flight Routes</a><br>
            <a href="<?php echo esc_url( home_url( '/travel-updates/' ) ); ?>">Travel Updates</a><br>
            <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About</a><br>
            <a href="<?php echo esc_url( home_url( '/contact/#enquiry' ) ); ?>">Contact</a><br>
            <a href="<?php echo esc_url( home_url( '/privacy-notice/' ) ); ?>">Privacy &amp; Confidentiality</a><br>
            <a href="<?php echo esc_url( home_url( '/booking-terms/' ) ); ?>">Booking Terms</a></p>
        </div>
    </div>
    <div class="container" style="margin-top:32px;border-top:1px solid rgba(255,255,255,.15);padding-top:20px;font-size:.9rem;">
        <p>IATA No. 772 1572-5 • ASATA member • Club Travel affiliate</p>
        <p>We treat passenger and booking information with discretion and use it to arrange and service your travel. Please see our Privacy &amp; Confidentiality notice.</p>
        <p>Travel products are supplied subject to availability and the applicable airline, hotel, insurer and other supplier terms. Prices and schedules may change until confirmed and paid.</p>
        <p>© <?php echo esc_html( wp_date( 'Y' ) ); ?> D.A.K Travel. All rights reserved.</p>
    </div>
</footer>
<div class="mobile-actions">
    <a target="_blank" rel="noopener noreferrer" href="<?php echo esc_url( daktravel_whatsapp_url( 'Good day D.A.K Travel. I would like assistance with a new travel enquiry.' ) ); ?>">WhatsApp Us</a>
    <a href="<?php echo esc_url( home_url( '/contact/#enquiry' ) ); ?>">Email</a>
    <a href="<?php echo esc_url( home_url( '/contact/?type=existing#enquiry' ) ); ?>">Existing booking</a>
</div>
<?php
if ( function_exists( 'daktravel_native_language_switcher' ) ) {
    require_once get_template_directory() . '/inc/native-hebrew-runtime.php';
}
wp_footer();
?>
</body>
</html>