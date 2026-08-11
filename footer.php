<footer class="site-footer">
    <div class="container footer-grid">
        <div>
            <h2 style="color:#fff;">D.A.K Travel</h2>
            <p>Complex travel, groups and organisational journeys handled by experienced travel professionals.</p>
            <p>Johannesburg, South Africa<br>
            <a href="tel:+27114405980">+27 11 440 5980</a><br>
            <a href="<?php echo esc_url( daktravel_whatsapp_url( 'Good day D.A.K Travel. I would like assistance with a travel enquiry.' ) ); ?>">WhatsApp: +27 82 440 6144</a></p>
        </div>
        <div>
            <h3 style="color:#fff;">Services</h3>
            <p><a href="<?php echo esc_url( home_url( '/groups-delegations/' ) ); ?>">Groups & Delegations</a><br>
            <a href="<?php echo esc_url( home_url( '/business-travel/' ) ); ?>">Business Travel</a><br>
            <a href="<?php echo esc_url( home_url( '/israel-travel/' ) ); ?>">Israel Travel</a><br>
            <a href="<?php echo esc_url( home_url( '/complex-travel/' ) ); ?>">Complex Travel</a></p>
        </div>
        <div>
            <h3 style="color:#fff;">Information</h3>
            <p><a href="<?php echo esc_url( home_url( '/travel-updates/' ) ); ?>">Travel Updates</a><br>
            <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About</a><br>
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact</a><br>
            <a href="<?php echo esc_url( home_url( '/privacy-notice/' ) ); ?>">Privacy</a><br>
            <a href="<?php echo esc_url( home_url( '/booking-terms/' ) ); ?>">Booking Terms</a></p>
        </div>
    </div>
    <div class="container" style="margin-top:32px;border-top:1px solid rgba(255,255,255,.15);padding-top:20px;font-size:.9rem;">
        <p>IATA No. 772 1572-5 • ASATA member • Club Travel affiliate</p>
        <p>Travel products are supplied subject to availability and the applicable airline, hotel, insurer and other supplier terms. Prices and schedules may change until confirmed and paid.</p>
        <p>© <?php echo esc_html( wp_date( 'Y' ) ); ?> D.A.K Travel. All rights reserved.</p>
    </div>
</footer>
<div class="mobile-actions">
    <a href="tel:+27114405980">Call</a>
    <a href="<?php echo esc_url( daktravel_whatsapp_url( 'Good day D.A.K Travel. I would like assistance with a new travel enquiry.' ) ); ?>">WhatsApp</a>
    <a href="<?php echo esc_url( home_url( '/request-a-quote/' ) ); ?>">Quote</a>
</div>
<?php wp_footer(); ?>
</body>
</html>
