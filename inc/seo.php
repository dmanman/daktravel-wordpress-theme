<?php
/**
 * Lightweight SEO layer for D.A.K Travel.
 *
 * Provides sensible defaults, editable per-page overrides, social metadata,
 * and TravelAgency structured data when a dedicated SEO plugin is not active.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Avoid duplicate titles/meta/schema when a dedicated SEO plugin is active.
 */
function daktravel_has_seo_plugin() {
    return defined( 'WPSEO_VERSION' )
        || defined( 'RANK_MATH_VERSION' )
        || defined( 'AIOSEO_VERSION' )
        || class_exists( 'All_in_One_SEO_Pack' );
}

/**
 * Page-level SEO defaults. Keep these specific, natural and useful.
 */
function daktravel_seo_defaults() {
    $defaults = array(
        'home' => array(
            'title'       => 'South Africa to Israel Travel Specialists | D.A.K Travel',
            'description' => 'D.A.K Travel specialises in flights and complex travel between South Africa and Israel, plus groups, delegations and business travel. WhatsApp our Johannesburg team.',
        ),
        'israel-travel' => array(
            'title'       => 'South Africa to Israel Flights & Travel | D.A.K Travel',
            'description' => 'Specialist South Africa–Israel travel planning from D.A.K Travel. We compare current routings, connections, baggage and fare flexibility for individuals, families, groups and organisations.',
        ),
        'groups-delegations' => array(
            'title'       => 'Group & Delegation Travel South Africa | D.A.K Travel',
            'description' => 'D.A.K Travel coordinates group and delegation journeys from South Africa, including multi-origin flights, passenger lists, deadlines, feeder sectors and international connections.',
        ),
        'business-travel' => array(
            'title'       => 'Business & Organisational Travel Johannesburg | D.A.K Travel',
            'description' => 'Responsive business travel management for South African organisations that need clear approvals, reliable itineraries, reporting and experienced human support.',
        ),
        'complex-travel' => array(
            'title'       => 'Complex International Travel Planning | D.A.K Travel',
            'description' => 'Multi-city, family, premium and complicated international travel planned by experienced D.A.K Travel consultants in Johannesburg.',
        ),
        'about' => array(
            'title'       => 'About D.A.K Travel | Johannesburg Travel Specialists',
            'description' => 'Meet D.A.K Travel, a Johannesburg travel agency specialising in South Africa–Israel travel, complex international journeys, groups and organisational travel.',
        ),
        'contact' => array(
            'title'       => 'Contact D.A.K Travel | WhatsApp or Email Our Team',
            'description' => 'Contact D.A.K Travel by WhatsApp or email for South Africa–Israel travel, international flights, groups, delegations, business travel and existing booking assistance.',
        ),
        'request-a-quote' => array(
            'title'       => 'Send a Travel Enquiry | D.A.K Travel Johannesburg',
            'description' => 'Send D.A.K Travel your dates, route and traveller requirements. Our Johannesburg team will review the journey and respond with suitable travel options.',
        ),
    );

    return apply_filters( 'daktravel_seo_defaults', $defaults );
}

/**
 * Resolve current page metadata, with editor overrides taking priority.
 */
function daktravel_get_seo_meta() {
    $defaults = daktravel_seo_defaults();
    $meta     = array(
        'title'       => '',
        'description' => '',
    );

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

        if ( $custom_title ) {
            $meta['title'] = $custom_title;
        }
        if ( $custom_desc ) {
            $meta['description'] = $custom_desc;
        }
    }

    return $meta;
}

/**
 * Use the SEO title as the WordPress document title.
 */
function daktravel_seo_document_title( $title ) {
    if ( daktravel_has_seo_plugin() || is_admin() ) {
        return $title;
    }

    $meta = daktravel_get_seo_meta();
    return ! empty( $meta['title'] ) ? $meta['title'] : $title;
}
add_filter( 'pre_get_document_title', 'daktravel_seo_document_title', 20 );

/**
 * Meta description + Open Graph/Twitter fallback metadata.
 */
function daktravel_output_seo_meta() {
    if ( daktravel_has_seo_plugin() || is_admin() || is_404() || is_search() ) {
        return;
    }

    $meta = daktravel_get_seo_meta();

    if ( empty( $meta['description'] ) && empty( $meta['title'] ) ) {
        return;
    }

    $url = is_singular() ? get_permalink() : home_url( '/' );

    if ( ! empty( $meta['description'] ) ) {
        printf( "\n<meta name=\"description\" content=\"%s\">\n", esc_attr( $meta['description'] ) );
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

    if ( is_singular() && has_post_thumbnail() ) {
        $image = wp_get_attachment_image_url( get_post_thumbnail_id(), 'full' );
        if ( $image ) {
            printf( "<meta property=\"og:image\" content=\"%s\">\n", esc_url( $image ) );
            printf( "<meta name=\"twitter:image\" content=\"%s\">\n", esc_url( $image ) );
        }
    }
}
add_action( 'wp_head', 'daktravel_output_seo_meta', 2 );

/**
 * TravelAgency / WebSite structured data. Keep factual fields conservative.
 */
function daktravel_output_schema() {
    if ( daktravel_has_seo_plugin() || ! is_front_page() ) {
        return;
    }

    $business = array(
        '@type'       => 'TravelAgency',
        '@id'         => home_url( '/#travelagency' ),
        'name'        => 'D.A.K Travel',
        'url'         => home_url( '/' ),
        'telephone'   => '+27 11 440 5980',
        'description' => 'Johannesburg travel agency specialising in travel between South Africa and Israel, complex international journeys, groups, delegations and organisational travel.',
        'areaServed'  => array(
            array(
                '@type' => 'Country',
                'name'  => 'South Africa',
            ),
            array(
                '@type' => 'Country',
                'name'  => 'Israel',
            ),
        ),
        'identifier'  => array(
            '@type' => 'PropertyValue',
            'name'  => 'IATA Number',
            'value' => '772 1572-5',
        ),
    );

    $custom_logo_id = get_theme_mod( 'custom_logo' );
    if ( $custom_logo_id ) {
        $logo = wp_get_attachment_image_url( $custom_logo_id, 'full' );
        if ( $logo ) {
            $business['logo'] = $logo;
            $business['image'] = $logo;
        }
    }

    $schema = array(
        '@context' => 'https://schema.org',
        '@graph'   => array(
            $business,
            array(
                '@type'     => 'WebSite',
                '@id'       => home_url( '/#website' ),
                'url'       => home_url( '/' ),
                'name'      => 'D.A.K Travel',
                'publisher' => array( '@id' => home_url( '/#travelagency' ) ),
            ),
        ),
    );

    echo "\n<script type=\"application/ld+json\">" . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . "</script>\n";
}
add_action( 'wp_head', 'daktravel_output_schema', 30 );

/**
 * SEO editor box for pages/posts when no dedicated SEO plugin is installed.
 */
function daktravel_add_seo_meta_box() {
    if ( daktravel_has_seo_plugin() ) {
        return;
    }

    foreach ( array( 'page', 'post', 'dak_case_study' ) as $screen ) {
        add_meta_box(
            'daktravel-seo',
            __( 'D.A.K SEO', 'daktravel' ),
            'daktravel_render_seo_meta_box',
            $screen,
            'normal',
            'default'
        );
    }
}
add_action( 'add_meta_boxes', 'daktravel_add_seo_meta_box' );

function daktravel_render_seo_meta_box( $post ) {
    wp_nonce_field( 'daktravel_save_seo', 'daktravel_seo_nonce' );

    $title = get_post_meta( $post->ID, '_dak_seo_title', true );
    $desc  = get_post_meta( $post->ID, '_dak_seo_description', true );
    ?>
    <p><strong><?php esc_html_e( 'Search title', 'daktravel' ); ?></strong></p>
    <input type="text" name="dak_seo_title" value="<?php echo esc_attr( $title ); ?>" class="widefat" placeholder="e.g. South Africa to Israel Flights & Travel | D.A.K Travel">
    <p><strong><?php esc_html_e( 'Meta description', 'daktravel' ); ?></strong></p>
    <textarea name="dak_seo_description" rows="3" class="widefat" placeholder="A clear, useful summary of this page for search users."><?php echo esc_textarea( $desc ); ?></textarea>
    <p class="description"><?php esc_html_e( 'Leave blank to use the D.A.K theme default. These fields are ignored automatically if Yoast, Rank Math or AIOSEO is active.', 'daktravel' ); ?></p>
    <?php
}

function daktravel_save_seo_meta( $post_id ) {
    if ( ! isset( $_POST['daktravel_seo_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['daktravel_seo_nonce'] ) ), 'daktravel_save_seo' ) ) {
        return;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    if ( isset( $_POST['dak_seo_title'] ) ) {
        update_post_meta( $post_id, '_dak_seo_title', sanitize_text_field( wp_unslash( $_POST['dak_seo_title'] ) ) );
    }

    if ( isset( $_POST['dak_seo_description'] ) ) {
        update_post_meta( $post_id, '_dak_seo_description', sanitize_textarea_field( wp_unslash( $_POST['dak_seo_description'] ) ) );
    }
}
add_action( 'save_post', 'daktravel_save_seo_meta' );
