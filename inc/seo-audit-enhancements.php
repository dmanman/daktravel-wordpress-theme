<?php
/**
 * SEO audit refinements for D.A.K Travel.
 *
 * Keeps page titles/descriptions concise and distinct, adds breadcrumb and
 * article structured data, provides sensible post-description fallbacks and
 * advertises the WordPress sitemap in the virtual robots.txt output.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Refine the theme's default SEO titles and descriptions.
 */
function daktravel_refine_seo_defaults( $defaults ) {
    $refined = array(
        'home' => array(
            'title'       => 'D.A.K Travel | Israel, Group & Complex Travel South Africa',
            'description' => 'Johannesburg travel specialists for South Africa–Israel flights, groups, delegations, business travel and complex international journeys. Personal expert support.',
        ),
        'israel-travel' => array(
            'title'       => 'South Africa–Israel Travel & Flights | D.A.K Travel',
            'description' => 'Specialist help with flights between South Africa and Israel, including connections, baggage, fare flexibility, groups, families and return travel.',
        ),
        'flights-to-israel-from-johannesburg' => array(
            'title'       => 'Flights to Israel from Johannesburg | D.A.K Travel',
            'description' => 'Compare Johannesburg to Israel flight options, connections, baggage and fare flexibility with D.A.K Travel, including Tel Aviv–Johannesburg return travel.',
        ),
        'flights-to-israel-from-cape-town' => array(
            'title'       => 'Flights to Israel from Cape Town | D.A.K Travel',
            'description' => 'Compare Cape Town to Israel flight routes, connections, baggage, ticket structure and fare flexibility with specialist help from D.A.K Travel.',
        ),
        'flights-to-israel-from-durban' => array(
            'title'       => 'Flights to Israel from Durban | D.A.K Travel',
            'description' => 'Compare Durban to Israel flights, domestic and international connections, baggage and fare flexibility with specialist help from D.A.K Travel.',
        ),
        'flights-from-israel-to-south-africa' => array(
            'title'       => 'Flights from Israel to South Africa | D.A.K Travel',
            'description' => 'Compare Tel Aviv to South Africa flights, Johannesburg connections and onward domestic travel, with practical advice on baggage and fare flexibility.',
        ),
        'south-africa-israel-flight-routes' => array(
            'title'       => 'South Africa–Israel Flight Routes | D.A.K Travel',
            'description' => 'Compare practical South Africa–Israel flight routes from Johannesburg, Cape Town, Durban and regional cities, including return travel from Tel Aviv.',
        ),
        'groups-delegations' => array(
            'title'       => 'Group & Delegation Travel South Africa | D.A.K Travel',
            'description' => 'Group and delegation travel coordinated across South Africa, including multi-origin flights, passenger details, deadlines and international connections.',
        ),
        'business-travel' => array(
            'title'       => 'Business Travel Management Johannesburg | D.A.K Travel',
            'description' => 'Personal business travel support for South African companies and organisations, with clear approvals, reliable bookings and help when plans change.',
        ),
        'complex-travel' => array(
            'title'       => 'Complex & Multi-City Travel South Africa | D.A.K Travel',
            'description' => 'Multi-city, family, premium and complex international travel planned by experienced D.A.K Travel consultants in Johannesburg.',
        ),
        'about' => array(
            'title'       => 'D.A.K Travel Johannesburg | Travel Agency Since 2006',
            'description' => 'Meet D.A.K Travel, an established Johannesburg travel agency specialising in South Africa–Israel travel, groups and complex international journeys.',
        ),
        'contact' => array(
            'title'       => 'Contact D.A.K Travel Johannesburg | Travel Specialists',
            'description' => 'Contact D.A.K Travel for Israel flights, groups, delegations, business travel, complex international journeys and help with existing bookings.',
        ),
        'travel-updates' => array(
            'title'       => 'Travel Updates South Africa & Israel | D.A.K Travel',
            'description' => 'Practical, dated travel guidance from D.A.K Travel covering South Africa–Israel journeys, airline changes, entry requirements and passenger advice.',
        ),
        'privacy-notice' => array(
            'title'       => 'Privacy & Confidentiality | D.A.K Travel',
            'description' => 'Read how D.A.K Travel handles personal information and booking details supplied for travel enquiries and travel arrangements.',
        ),
        'booking-terms' => array(
            'title'       => 'Booking Terms | D.A.K Travel',
            'description' => 'Read D.A.K Travel booking terms covering availability, supplier conditions, schedules, payments, changes and travel service arrangements.',
        ),
        'email-disclaimer' => array(
            'title'       => 'Email Disclaimer | D.A.K Travel',
            'description' => 'D.A.K Travel email confidentiality and legal disclaimer.',
        ),
    );

    foreach ( $refined as $key => $meta ) {
        $defaults[ $key ] = $meta;
    }

    return $defaults;
}
add_filter( 'daktravel_seo_defaults', 'daktravel_refine_seo_defaults', 20 );

/**
 * Use a generated description for posts/case studies when no manual excerpt or
 * custom D.A.K SEO description exists.
 */
function daktravel_output_generated_singular_description() {
    if ( daktravel_has_seo_plugin() || ! is_singular( array( 'post', 'dak_case_study' ) ) ) {
        return;
    }

    $post_id = get_queried_object_id();
    if ( ! $post_id || has_excerpt( $post_id ) || get_post_meta( $post_id, '_dak_seo_description', true ) ) {
        return;
    }

    $content = wp_strip_all_tags( strip_shortcodes( get_post_field( 'post_content', $post_id ) ) );
    $content = preg_replace( '/\s+/', ' ', $content );
    $desc    = wp_trim_words( trim( $content ), 26, '…' );

    if ( $desc ) {
        printf( "\n<meta name=\"description\" content=\"%s\">\n", esc_attr( $desc ) );
        printf( "<meta property=\"og:description\" content=\"%s\">\n", esc_attr( $desc ) );
        printf( "<meta name=\"twitter:description\" content=\"%s\">\n", esc_attr( $desc ) );
    }
}
add_action( 'wp_head', 'daktravel_output_generated_singular_description', 4 );

/**
 * Return a simple, user-oriented hierarchy for BreadcrumbList markup.
 */
function daktravel_breadcrumb_items() {
    if ( is_front_page() ) {
        return array();
    }

    $items = array(
        array( 'name' => 'D.A.K Travel', 'url' => home_url( '/' ) ),
    );

    $israel_pages = array(
        'israel-travel',
        'flights-to-israel-from-johannesburg',
        'flights-to-israel-from-cape-town',
        'flights-to-israel-from-durban',
        'flights-from-israel-to-south-africa',
        'south-africa-israel-flight-routes',
    );

    if ( is_page( $israel_pages ) ) {
        if ( ! is_page( 'israel-travel' ) ) {
            $items[] = array( 'name' => 'Israel Travel', 'url' => home_url( '/israel-travel/' ) );
        }
    } elseif ( is_singular( 'post' ) ) {
        $items[] = array( 'name' => 'Travel Updates', 'url' => home_url( '/travel-updates/' ) );
    } elseif ( is_singular( 'dak_case_study' ) ) {
        $items[] = array( 'name' => 'Case Studies', 'url' => home_url( '/case-studies/' ) );
    }

    if ( is_singular() || is_page() ) {
        $items[] = array(
            'name' => wp_strip_all_tags( get_the_title( get_queried_object_id() ) ),
            'url'  => get_permalink( get_queried_object_id() ),
        );
    }

    return $items;
}

/**
 * Add BreadcrumbList and Article schema where they genuinely match the page.
 */
function daktravel_output_additional_schema() {
    if ( daktravel_has_seo_plugin() || is_admin() || is_404() || is_search() ) {
        return;
    }

    $graph = array();
    $items = daktravel_breadcrumb_items();

    if ( count( $items ) >= 2 ) {
        $list = array();
        foreach ( $items as $index => $item ) {
            $list[] = array(
                '@type'    => 'ListItem',
                'position' => $index + 1,
                'name'     => $item['name'],
                'item'     => $item['url'],
            );
        }

        $graph[] = array(
            '@type'           => 'BreadcrumbList',
            'itemListElement' => $list,
        );
    }

    if ( is_singular( 'post' ) ) {
        $post_id = get_queried_object_id();
        $meta    = daktravel_get_seo_meta();
        $article = array(
            '@type'            => 'Article',
            'headline'         => wp_strip_all_tags( get_the_title( $post_id ) ),
            'mainEntityOfPage' => get_permalink( $post_id ),
            'datePublished'    => get_the_date( DATE_W3C, $post_id ),
            'dateModified'     => get_the_modified_date( DATE_W3C, $post_id ),
            'author'           => array( '@type' => 'Organization', 'name' => 'D.A.K Travel' ),
            'publisher'        => array( '@id' => home_url( '/#travelagency' ) ),
        );

        if ( ! empty( $meta['description'] ) ) {
            $article['description'] = $meta['description'];
        }

        $image = daktravel_seo_primary_image();
        if ( $image ) {
            $article['image'] = array( $image );
        }

        $graph[] = $article;
    }

    if ( ! $graph ) {
        return;
    }

    echo "\n<script type=\"application/ld+json\">" . wp_json_encode(
        array( '@context' => 'https://schema.org', '@graph' => $graph ),
        JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
    ) . "</script>\n";
}
add_action( 'wp_head', 'daktravel_output_additional_schema', 31 );

/**
 * Advertise WordPress core's XML sitemap in the virtual robots.txt file.
 */
function daktravel_robots_txt_sitemap( $output, $public ) {
    if ( $public ) {
        $sitemap = home_url( '/wp-sitemap.xml' );
        if ( false === strpos( $output, $sitemap ) ) {
            $output .= "\nSitemap: " . esc_url_raw( $sitemap ) . "\n";
        }
    }
    return $output;
}
add_filter( 'robots_txt', 'daktravel_robots_txt_sitemap', 20, 2 );
