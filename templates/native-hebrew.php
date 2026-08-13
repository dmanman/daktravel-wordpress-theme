<?php
$key = daktravel_native_hebrew_page_key();
$south_africa_images = array(
    array( 'url' => 'https://upload.wikimedia.org/wikipedia/commons/9/9f/Cape_Town_Table_Mountain.jpg', 'alt' => 'קייפטאון והר השולחן בדרום אפריקה' ),
    array( 'url' => 'https://images.pexels.com/photos/6624568/pexels-photo-6624568.jpeg?auto=compress&cs=tinysrgb&w=1600', 'alt' => 'קו החוף של קייפטאון בדרום אפריקה' ),
    array( 'url' => 'https://upload.wikimedia.org/wikipedia/commons/2/22/South_Africa_-_Drakensberg_%2816261357780%29.jpg', 'alt' => 'הרי דרקנסברג בדרום אפריקה' ),
    array( 'url' => 'https://upload.wikimedia.org/wikipedia/commons/a/a2/View_over_Vaal_Dam.jpg', 'alt' => 'סכר ואל בדרום אפריקה' ),
    array( 'url' => 'https://images.pexels.com/photos/34166928/pexels-photo-34166928.jpeg?auto=compress&cs=tinysrgb&w=1600', 'alt' => 'קניון בלייד ריבר בדרום אפריקה' ),
    array( 'url' => 'https://images.pexels.com/photos/33621915/pexels-photo-33621915.jpeg?auto=compress&cs=tinysrgb&w=1600', 'alt' => 'פיל בשמורת טבע בדרום אפריקה' ),
);

get_header( 'hebrew' );
$partial = get_template_directory() . '/templates/hebrew/' . sanitize_file_name( $key ) . '.php';
?>
<main>
<?php if ( file_exists( $partial ) ) { include $partial; } ?>
<section class="dak-quiet-cta"><div class="container dak-quiet-cta-inner"><div><div class="eyebrow">D.A.K Travel · Johannesburg</div><h2>צריכים עזרה עם נסיעה לדרום אפריקה?</h2><p>שלחו לנו את התאריכים והפרטים הבסיסיים ונבדוק את האפשרויות המתאימות.</p></div><div class="dak-page-actions"><a class="btn btn--whatsapp" target="_blank" rel="noopener noreferrer" href="<?php echo esc_url( daktravel_whatsapp_url( 'שלום D.A.K Travel. אשמח לעזרה עם נסיעה מישראל לדרום אפריקה.' ) ); ?>">WhatsApp</a><a class="btn btn--outline" href="<?php echo esc_url( daktravel_native_hebrew_url( 'contact' ) ); ?>">צור קשר</a></div></div></section>
</main>
<?php get_footer( 'hebrew' ); ?>
