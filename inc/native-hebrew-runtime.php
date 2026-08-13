<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

function daktravel_request_is_hebrew_path() {
    $path = isset( $_SERVER['REQUEST_URI'] ) ? wp_parse_url( wp_unslash( $_SERVER['REQUEST_URI'] ), PHP_URL_PATH ) : '';
    return is_string( $path ) && ( '/he' === untrailingslashit( $path ) || 0 === strpos( $path, '/he/' ) );
}

function daktravel_native_hebrew_locale( $locale ) {
    return daktravel_request_is_hebrew_path() ? 'he_IL' : $locale;
}
add_filter( 'locale', 'daktravel_native_hebrew_locale', 50 );

function daktravel_native_switcher_fallback_script() {
    if ( is_admin() || daktravel_is_native_hebrew_page() ) { return; }
    $target = daktravel_native_hebrew_url( daktravel_native_hebrew_key_for_english_page() );
    ?>
    <script id="dak-native-language-switcher-fallback">
    document.addEventListener('DOMContentLoaded',function(){
      var slot=document.querySelector('.utility-language-slot');
      if(slot&&!slot.querySelector('a,strong')){
        slot.innerHTML='<nav class="dak-language-switcher" aria-label="Language"><strong lang="en">EN</strong><span aria-hidden="true">·</span><a lang="he" hreflang="he-IL" href="<?php echo esc_url( $target ); ?>">עברית</a></nav>';
      }
      var mobile=document.querySelector('.mobile-menu-panel');
      if(mobile&&!mobile.querySelector('[data-dak-hebrew-link]')){
        var link=document.createElement('a');
        link.href='<?php echo esc_url( $target ); ?>';
        link.lang='he';
        link.hreflang='he-IL';
        link.setAttribute('data-dak-hebrew-link','1');
        link.textContent='עברית';
        mobile.appendChild(link);
      }
    });
    </script>
    <?php
}
add_action( 'wp_footer', 'daktravel_native_switcher_fallback_script', 50 );
