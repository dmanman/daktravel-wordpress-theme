<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function daktravel_home_lcp_style() {
    if ( is_front_page() ) {
        echo '<style>.home .hero h1{font-family:Georgia,"Times New Roman",serif!important;}@media(max-width:680px){.home .utility-links{min-width:170px;justify-content:flex-end;}}</style>';
    }
}
add_action( 'wp_head', 'daktravel_home_lcp_style', 1 );
