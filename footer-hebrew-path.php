<?php $dak_he_key = function_exists( 'daktravel_hebrew_path_key' ) ? daktravel_hebrew_path_key() : 'home'; ?>
<footer class="site-footer">
    <div class="container footer-grid">
        <div><h2 style="color:#fff;">D.A.K Travel</h2><p>סוכנות נסיעות ותיקה ביוהנסבורג מאז 2006. מומחים לנסיעות בין ישראל לדרום אפריקה, קבוצות, נסיעות עסקים ומסלולים מורכבים.</p><p><a target="_blank" rel="noopener noreferrer" href="<?php echo esc_url( daktravel_whatsapp_url( 'שלום D.A.K Travel. אשמח לעזרה עם נסיעה מישראל לדרום אפריקה.' ) ); ?>">WhatsApp</a><br><a href="<?php echo esc_url( daktravel_native_hebrew_url( 'contact' ) ); ?>">שלחו פנייה</a><br><span class="dak-hebrew-ltr">+27 11 440 5980</span></p></div>
        <div><h3 style="color:#fff;">שירותים</h3><p><a href="<?php echo esc_url( daktravel_native_hebrew_url( 'flights' ) ); ?>">טיסות מישראל לדרום אפריקה</a><br><a href="<?php echo esc_url( daktravel_native_hebrew_url( 'groups' ) ); ?>">קבוצות ומשלחות</a><br><a href="<?php echo esc_url( daktravel_native_hebrew_url( 'business' ) ); ?>">נסיעות עסקים</a><br><a href="<?php echo esc_url( home_url( '/he/complex-travel/' ) ); ?>">נסיעות מורכבות</a><br><a href="<?php echo esc_url( daktravel_native_hebrew_url( 'about' ) ); ?>">אודות</a><br><a href="<?php echo esc_url( daktravel_native_hebrew_url( 'contact' ) ); ?>">צור קשר</a></p></div>
        <div><h3 style="color:#fff;">D.A.K Travel</h3><p>שירות אישי מיוהנסבורג<br>סוכן IATA מוסמך<br>חבר ASATA<br>מומחיות בנסיעות ישראל–דרום אפריקה</p></div>
    </div>
    <div class="container" style="margin-top:32px;border-top:1px solid rgba(255,255,255,.15);padding-top:20px;font-size:.9rem;"><p><span class="dak-hebrew-ltr">IATA No. 772 1572-5</span> • חבר ASATA • Club Travel affiliate</p><p>© <?php echo esc_html( wp_date( 'Y' ) ); ?> D.A.K Travel. כל הזכויות שמורות.</p></div>
</footer>
<div class="mobile-actions"><a target="_blank" rel="noopener noreferrer" href="<?php echo esc_url( daktravel_whatsapp_url( 'שלום D.A.K Travel. אשמח לעזרה עם נסיעה מישראל לדרום אפריקה.' ) ); ?>">WhatsApp</a><a href="<?php echo esc_url( daktravel_native_hebrew_url( 'contact' ) ); ?>">צור קשר</a><a href="<?php echo esc_url( 'complex' === $dak_he_key ? home_url( '/complex-travel/' ) : daktravel_native_english_url_for_hebrew_key( $dak_he_key ) ); ?>">English</a></div>
<?php wp_footer(); ?>
</body>
</html>
