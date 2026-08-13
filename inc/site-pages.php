<?php
/**
 * Ensure the theme's required WordPress pages exist.
 *
 * The theme contains page-{slug}.php templates, but WordPress still needs an
 * actual Page record for each slug before those templates can be reached.
 * Existing pages are never overwritten.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function daktravel_required_pages() {
    return array(
        'israel-travel' => array(
            'title'   => 'Israel Travel',
            'content' => '',
        ),
        'flights-to-israel-from-johannesburg' => array(
            'title'   => 'Flights to Israel from Johannesburg',
            'content' => '',
        ),
        'flights-to-israel-from-cape-town' => array(
            'title'   => 'Flights to Israel from Cape Town',
            'content' => '',
        ),
        'flights-to-israel-from-durban' => array(
            'title'   => 'Flights to Israel from Durban',
            'content' => '',
        ),
        'flights-from-israel-to-south-africa' => array(
            'title'   => 'Flights from Israel to South Africa',
            'content' => '',
        ),
        'south-africa-israel-flight-routes' => array(
            'title'   => 'South Africa–Israel Flight Routes',
            'content' => '',
        ),
        'groups-delegations' => array(
            'title'   => 'Groups & Delegations',
            'content' => '',
        ),
        'business-travel' => array(
            'title'   => 'Business Travel',
            'content' => '',
        ),
        'complex-travel' => array(
            'title'   => 'Complex Travel',
            'content' => '',
        ),
        'mauritius-holidays-from-south-africa' => array(
            'title'   => 'Mauritius Holidays from South Africa',
            'content' => 'Mauritius holidays from South Africa arranged by D.A.K Travel, including flights, resorts, transfers and travel insurance.',
        ),
        'zanzibar-holidays-from-south-africa' => array(
            'title'   => 'Zanzibar Holidays from South Africa',
            'content' => 'Zanzibar holidays from South Africa arranged by D.A.K Travel, including flights, accommodation, transfers and travel insurance.',
        ),
        'israel-eta-il-entry-requirements' => array(
            'title'   => 'Israel ETA-IL Entry Requirements',
            'content' => 'Official ETA-IL and Israel entry requirement information for travellers using foreign passports.',
        ),
        'south-africa-traveller-declaration' => array(
            'title'   => 'South Africa Traveller Declaration',
            'content' => 'SARS online Traveller Declaration information for travellers entering or leaving South Africa.',
        ),
        'about' => array(
            'title'   => 'About D.A.K Travel',
            'content' => '',
        ),
        'contact' => array(
            'title'   => 'Contact D.A.K Travel',
            'content' => '',
        ),
        'privacy-notice' => array(
            'title'   => 'Privacy & Confidentiality',
            'content' => '<h2>Privacy & Confidentiality</h2><p>D.A.K Travel respects the privacy of clients and travellers. Personal information supplied to us is used to respond to enquiries, arrange travel and service bookings.</p><p>We take reasonable steps to keep personal and booking information confidential and only share information where it is needed to provide the requested travel service, meet legal obligations or work with the relevant travel supplier.</p><p>If you have a privacy question relating to information held by D.A.K Travel, please contact us directly.</p>',
        ),
        'booking-terms' => array(
            'title'   => 'Booking Terms',
            'content' => '',
        ),
        'travel-updates' => array(
            'title'   => 'Travel Updates',
            'content' => '',
        ),
        'email-disclaimer' => array(
            'title'   => 'Email Disclaimer',
            'content' => '<h2>Email confidentiality notice</h2><p>This email and any attachments are intended only for the person or organisation to whom they are addressed and may contain confidential information.</p><p>If you received a D.A.K Travel email in error, please notify the sender and delete it. Any unauthorised use, copying or distribution is prohibited.</p><p>D.A.K Travel does not guarantee that email transmission is secure or error-free. Travel quotations, schedules and availability remain subject to confirmation and the applicable supplier terms.</p>',
        ),
    );
}

function daktravel_ensure_required_pages() {
    $required = daktravel_required_pages();

    foreach ( $required as $slug => $page ) {
        $existing = get_page_by_path( $slug, OBJECT, 'page' );
        if ( $existing instanceof WP_Post ) {
            continue;
        }

        wp_insert_post(
            array(
                'post_type'      => 'page',
                'post_status'    => 'publish',
                'post_title'     => $page['title'],
                'post_name'      => $slug,
                'post_content'   => $page['content'],
                'comment_status' => 'closed',
                'ping_status'    => 'closed',
            )
        );
    }
}
add_action( 'init', 'daktravel_ensure_required_pages', 20 );

require_once get_template_directory() . '/inc/native-hebrew.php';
