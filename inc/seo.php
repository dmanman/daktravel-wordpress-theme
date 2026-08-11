<?php
/**
 * Lightweight SEO layer for D.A.K Travel.
 *
 * Provides page-specific titles/descriptions, canonical URLs, social metadata,
 * image metadata and TravelAgency/WebPage structured data when a dedicated SEO
 * plugin is not active.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function daktravel_has_seo_plugin() {
    return defined( 'WPSEO_VERSION' )
        || defined( 'RANK_MATH_VERSION' )
        || defined( 'AIOSEO_VERSION' )
        || class_exists( 'All_in_One_SEO_Pack' );
}

function daktravel_seo_defaults() {
    $defaults = array(
        'home' => array(
            'title'       => 'South Africa–Israel Flights & Travel | D.A.K Travel',
            'description' => 'D.A.K Travel is a Johannesburg travel agency specialising in flights and travel between South Africa and Israel, return travel, groups and complex international journeys.',
        ),
        'israel-travel' => array(
            'title'       => 'Flights Between South Africa & Israel | D.A.K Travel',
            'description' => 'Compare flights from South Africa to Israel and return travel from Tel Aviv to South Africa, including Johannesburg connections, baggage and flexible fare options.',
        ),
        'flights-to-israel-from-johannesburg' => array(
            'title'       => 'Flights to Israel from Johannesburg | D.A.K Travel',
            'description' => 'Compare Johannesburg to Israel flight options, connections, baggage and fare flexibility with D.A.K Travel, including Tel Aviv–Johannesburg return travel.',
        ),
        'flights-from-israel-to-south-africa' => array(
            'title'       => 'Flights from Israel to South Africa | D.A.K Travel',
            'description' => 'Compare flights from Tel Aviv to Johannesburg and onward South African connections, with practical advice on baggage, connections and flexible fare options.',
        ),
        'south-africa-israel-flight-routes' => array(
            'title'       => 'South Africa–Israel Flight Routes | D.A.K Travel',
            'description' => 'A practical guide to South Africa–Israel flight routes from Johannesburg, Cape Town, Durban and regional cities, including return travel from Tel Aviv.',
        ),
        'groups-delegations' => array(
            'title'       => 'Group & Delegation Travel South Africa | D.A.K Travel',
            'description' => 'D.A.K Travel coordinates group and delegation travel from South Africa, including multi-origin flights, passenger details, deadlines, feeder flights and international connections.',
        ),
        'business-travel' => array(
            'title'       => 'Business Travel Management Johannesburg | D.A.K Travel',
            'description' => 'Personal business travel support for South African companies and organisations, with clear approvals, reliable bookings and experienced help when plans change.',
        ),
        'complex-travel' => array(
            'title'       => 'Complex International Travel Planning | D.A.K Travel',
            'description' => 'Multi-city, family, premium and complex international travel planned by experienced D.A.K Travel consultants in Johannesburg.',
        ),
        'about' => array(
            'title'       => 'About D.A.K Travel | Johannesburg Travel Agency Since 2006',
            'description' => 'D.A.K Travel is an established Johannesburg travel agency serving travellers since 2006, with specialist experience in South Africa–Israel and complex international travel.',
        ),
        'contact' => array(
            'title'       => 'Contact D.A.K Travel | South Africa–Israel Travel',
            'description' => 'Contact D.A.K Travel for flights and travel between South Africa and Israel, return journeys, groups, delegations, business travel and existing bookings.',
        ),
        'travel-updates' => array(
            'title'       => 'South Africa–Israel Travel Updates | D.A.K Travel',
            'description' => 'Practical travel updates from D.A.K Travel for clients travelling between South Africa and Israel and on other international journeys.',
        ),
        'privacy-notice' => array(
            'title'       => 'Privacy & Confidentiality | D.A.K Travel',
            'description' => 'How D.A.K Travel handles personal and booking information supplied for travel enquiries and travel arrangements.',
        ),
        'booking-terms' => array(
            'title'       => 'Booking Terms | D.A.K Travel',
            'description' => 'Important D.A.K Travel booking terms and information about supplier conditions, availability, prices and schedules.',
        ),
        'email-disclaimer' => array(
            'title'       => 'Email Disclaimer | D.A.K Travel',
            'description' => 'D.A.K Travel email confidentiality and legal disclaimer.',
        ),
    );

    return apply_filters( 'daktravel_seo_defaults', $defaults );
}

function daktravel_get_seo_meta() {
    $defaults = daktravel_seo_defaults();
    $meta     = array( 'title' => '', 'description' => '' );

    if ( is_front_page() ) {
        $meta = $defaults['home'];
    } elseif ( is_singular() ) {
        $post_id = get_queried_object_id();
        $slug    = get_post_field( 'post_name', $post_id );

        if ( isset( $defaults[ $slug ] ) ) {
            $meta = $defaults[ $slug ];
        } else {
            $meta['title'] = get_the_title( $post_id ) . ' | D.A.K Travel';
            if ( has_excerpt( $post_id ) ) {
                $meta['description'] = wp_strip_all_tags( get_the_excerpt( $post_id ) );
            }
        }

        $custom_title = get_post_meta( $post_id, '_dak_seo_title', true );
        $custom_desc  = get_post_meta( $post_id, '_dak_seo_description', true );
        if ( $custom_title ) { $meta['title'] = $custom_title; }
        if ( $custom_desc ) { $meta['description'] = $custom_desc; }
    }

    return $meta;
}

function daktravel_seo_primary_image() {
    $setting = '';

    if ( is_front_page() ) {
        $setting = 'daktravel_hero_image';
    } elseif ( is_page( array( 'israel-travel', 'flights-to-israel-from-johannesburg', 'south-africa-israel-flight-routes' ) ) ) {
        $setting = 'daktravel_israel_image';
    } elseif ( is_page( 'flights-from-israel-to-south-africa' ) ) {
        $setting = 'daktravel_telaviv_image';
    } elseif ( is_page( 'groups-delegations' ) ) {
        $setting = 'daktravel_group_image';
    } elseif ( is_page( 'business-travel' ) ) {
        $setting = 'daktravel_business_image';
    } elseif ( is_page( 'complex-travel' ) ) {
        $setting = 'daktravel_complex_image';
    } elseif ( is_page( 'about' ) ) {
        $setting = 'daktravel_team_image';
    } elseif ( is_page( 'contact' ) ) {
        $setting = 'daktravel_contact_image';
    }

    if ( $setting ) {
        $custom = daktravel_media_url( $setting, 'full' );
        if ( $custom ) {
            return $custom;
        }
    }

    if ( is_page( array( 'israel-travel', 'flights-to-israel-from-johannesburg', 'flights-from-israel-to-south-africa', 'south-africa-israel-flight-routes' ) ) ) {
        return 'https://upload.wikimedia.org/wikipedia/commons/2/2b/Azriely_Center.jpg';
    }

    if ( is_singular() && has_post_thumbnail() ) {
        $image = wp_get_attachment_image_url( get_post_thumbnail_id(), 'full' );
        if ( $image ) {
            return $image;
        }
    }

    return '';
}

function daktravel_seo_document_title( $title ) {
    if ( daktravel_has_seo_plugin() || is_admin() ) {
        return $title;
    }
    $meta = daktravel_get_seo_meta();
    return ! empty( $meta['title'] ) ? $meta['title'] : $title;
}
add_filter( 'pre_get_document_title', 'daktravel_seo_document_title', 20 );

function daktravel_output_seo_meta() {
    if ( daktravel_has_seo_plugin() || is_admin() || is_404() || is_search() ) {
        return;
    }

    $meta = daktravel_get_seo_meta();
    if ( empty( $meta['description'] ) && empty( $meta['title'] ) ) {
        return;
    }

    $url   = is_singular() ? get_permalink() : home_url( '/' );
    $image = daktravel_seo_primary_image();

    printf( "\n<link rel=\"canonical\" href=\"%s\">\n", esc_url( $url ) );

    if ( ! empty( $meta['description'] ) ) {
        printf( "<meta name=\"description\" content=\"%s\">\n", esc_attr( $meta['description'] ) );
    }
    if ( ! empty( $meta['title'] ) ) {
        printf( "<meta property=\"og:title\" content=\"%s\">\n", esc_attr( $meta['title'] ) );
        printf( "<meta name=\"twitter:title\" content=\"%s\">\n", esc_attr( $meta['title'] ) );
    }
    if ( ! empty( $meta['description'] ) ) {
        printf( "<meta property=\"og:description\" content=\"%s\">\n", esc_attr( $meta['description'] ) );
        printf( "<meta name=\"twitter:description\" content=\"%s\">\n", esc_attr( $meta['description'] ) );
    }
    printf( "<meta property=\"og:url\" content=\"%s\">\n", esc_url( $url ) );
    echo "<meta property=\"og:type\" content=\"website\">\n";
    echo "<meta property=\"og:site_name\" content=\"D.A.K Travel\">\n";
    echo "<meta name=\"twitter:card\" content=\"summary_large_image\">\n";

    if ( $image ) {
        printf( "<meta property=\"og:image\" content=\"%s\">\n", esc_url( $image ) );
        printf( "<meta name=\"twitter:image\" content=\"%s\">\n", esc_url( $image ) );
    }
}
add_action( 'wp_head', 'daktravel_output_seo_meta', 2 );

function daktravel_output_schema() {
    if ( daktravel_has_seo_plugin() || is_admin() || is_404() || is_search() ) {
        return;
    }

    $business = array(
        '@type'         => 'TravelAgency',
        '@id'           => home_url( '/#travelagency' ),
        'name'          => 'D.A.K Travel',
        'alternateName' => 'DAK Travel',
        'url'           => home_url( '/' ),
        'telephone'     => '+27 11 440 5980',
        'email'         => 'info@daktravel.co.za',
        'foundingDate'  => '2006',
        'description'   => 'Established in Johannesburg in 2006, D.A.K Travel specialises in flights and travel between South Africa and Israel, return journeys, complex international travel, groups, delegations and organisational travel.',
        'address'       => array(
            '@type'           => 'PostalAddress',
            'addressLocality' => 'Johannesburg',
            'addressCountry'  => 'ZA',
        ),
        'areaServed'    => array(
            array( '@type' => 'Country', 'name' => 'South Africa' ),
            array( '@type' => 'Country', 'name' => 'Israel' ),
        ),
        'identifier'    => array( '@type' => 'PropertyValue', 'name' => 'IATA Number', 'value' => '772 1572-5' ),
        'knowsAbout'    => array(
            'Flights from South Africa to Israel',
            'Flights from Israel to South Africa',
            'South Africa–Israel return travel',
            'Johannesburg to Tel Aviv flights',
            'Tel Aviv to Johannesburg flights',
            'Connections from Cape Town and Durban to Israel',
            'Group travel',
            'Delegation travel',
            'Business travel',
            'Complex international travel',
        ),
    );

    $custom_logo_id = get_theme_mod( 'custom_logo' );
    if ( $custom_logo_id ) {
        $logo = wp_get_attachment_image_url( $custom_logo_id, 'full' );
        if ( $logo ) {
            $business['logo'] = $logo;
        }
    }

    $graph = array( $business );

    $graph[] = array(
        '@type'      => 'WebSite',
        '@id'        => home_url( '/#website' ),
        'url'        => home_url( '/' ),
        'name'       => 'D.A.K Travel',
        'inLanguage' => 'en-ZA',
        'publisher'  => array( '@id' => home_url( '/#travelagency' ) ),
    );

    if ( is_front_page() || is_page() ) {
        $meta       = daktravel_get_seo_meta();
        $page_url   = is_front_page() ? home_url( '/' ) : get_permalink();
        $page_image = daktravel_seo_primary_image();
        $webpage    = array(
            '@type'      => 'WebPage',
            '@id'        => trailingslashit( $page_url ) . '#webpage',
            'url'        => $page_url,
            'name'       => $meta['title'],
            'inLanguage' => 'en-ZA',
            'isPartOf'   => array( '@id' => home_url( '/#website' ) ),
            'about'      => array( '@id' => home_url( '/#travelagency' ) ),
            'publisher'  => array( '@id' => home_url( '/#travelagency' ) ),
        );
        if ( ! empty( $meta['description'] ) ) {
            $webpage['description'] = $meta['description'];
        }
        if ( $page_image ) {
            $webpage['primaryImageOfPage'] = array(
                '@type' => 'ImageObject',
                'url'   => $page_image,
            );
        }
        $graph[] = $webpage;
    }

    $schema = array(
        '@context' => 'https://schema.org',
        '@graph'   => $graph,
    );

    echo "\n<script type=\"application/ld+json\">" . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . "</script>\n";
}
add_action( 'wp_head', 'daktravel_output_schema', 30 );

function daktravel_robots_for_pages( $robots ) {
    $robots['max-image-preview'] = 'large';

    // Linked from existing email signatures, but not intended as a search landing page.
    if ( is_page( 'email-disclaimer' ) ) {
        $robots['noindex'] = true;
        $robots['follow']  = true;
    }
    return $robots;
}
add_filter( 'wp_robots', 'daktravel_robots_for_pages' );

function daktravel_add_seo_meta_box() {
    if ( daktravel_has_seo_plugin() ) { return; }
    foreach ( array( 'page', 'post', 'dak_case_study' ) as $screen ) {
        add_meta_box( 'daktravel-seo', __( 'D.A.K SEO', 'daktravel' ), 'daktravel_render_seo_meta_box', $screen, 'normal', 'default' );
    }
}
add_action( 'add_meta_boxes', 'daktravel_add_seo_meta_box' );

function daktravel_render_seo_meta_box( $post ) {
    wp_nonce_field( 'daktravel_save_seo', 'daktravel_seo_nonce' );
    $title = get_post_meta( $post->ID, '_dak_seo_title', true );
    $desc  = get_post_meta( $post->ID, '_dak_seo_description', true );
    ?>
    <p><strong><?php esc_html_e( 'Search title', 'daktravel' ); ?></strong></p>
    <input type="text" name="dak_seo_title" value="<?php echo esc_attr( $title ); ?>" class="widefat" placeholder="e.g. Flights Between South Africa & Israel | D.A.K Travel">
    <p><strong><?php esc_html_e( 'Meta description', 'daktravel' ); ?></strong></p>
    <textarea name="dak_seo_description" rows="3" class="widefat" placeholder="A clear, useful summary of this page for search users."><?php echo esc_textarea( $desc ); ?></textarea>
    <p class="description"><?php esc_html_e( 'Leave blank to use the D.A.K theme default. These fields are ignored automatically if Yoast, Rank Math or AIOSEO is active.', 'daktravel' ); ?></p>
    <?php
}

function daktravel_save_seo_meta( $post_id ) {
    if ( ! isset( $_POST['daktravel_seo_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['daktravel_seo_nonce'] ) ), 'daktravel_save_seo' ) ) { return; }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) { return; }
    if ( ! current_user_can( 'edit_post', $post_id ) ) { return; }

    if ( isset( $_POST['dak_seo_title'] ) ) {
        update_post_meta( $post_id, '_dak_seo_title', sanitize_text_field( wp_unslash( $_POST['dak_seo_title'] ) ) );
    }
    if ( isset( $_POST['dak_seo_description'] ) ) {
        update_post_meta( $post_id, '_dak_seo_description', sanitize_textarea_field( wp_unslash( $_POST['dak_seo_description'] ) ) );
    }
}
add_action( 'save_post', 'daktravel_save_seo_meta' );
