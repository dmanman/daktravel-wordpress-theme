<?php
/**
 * Simple form-to-email enquiry handler for D.A.K Travel.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function daktravel_enquiry_recipient() {
    $recipient = sanitize_email( get_option( 'admin_email' ) );
    return apply_filters( 'daktravel_enquiry_recipient', $recipient );
}

function daktravel_post_text( $key ) {
    return isset( $_POST[ $key ] ) ? sanitize_text_field( wp_unslash( $_POST[ $key ] ) ) : '';
}

/**
 * Process an enquiry and return one of: success, error, invalid.
 * This is intentionally callable from the Contact page itself so the form works
 * inside WordPress Live Preview as well as after the theme is activated.
 */
function daktravel_process_enquiry_submission() {
    if ( ! isset( $_POST['daktravel_enquiry_submit'] ) ) {
        return '';
    }

    if ( ! isset( $_POST['daktravel_enquiry_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['daktravel_enquiry_nonce'] ) ), 'daktravel_enquiry' ) ) {
        return 'invalid';
    }

    // Honeypot: genuine visitors should leave this field blank.
    if ( ! empty( $_POST['website'] ) ) {
        return 'success';
    }

    $name              = daktravel_post_text( 'name' );
    $email             = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
    $mobile            = daktravel_post_text( 'mobile' );
    $type              = daktravel_post_text( 'enquiry_type' );
    $from              = daktravel_post_text( 'departure' );
    $to                = daktravel_post_text( 'destination' );
    $dates             = daktravel_post_text( 'dates' );
    $travellers        = daktravel_post_text( 'travellers' );
    $organisation      = daktravel_post_text( 'organisation' );
    $origins           = daktravel_post_text( 'origins' );
    $trip_detail       = daktravel_post_text( 'trip_detail' );
    $booking_ref       = daktravel_post_text( 'booking_ref' );
    $passenger_surname = daktravel_post_text( 'passenger_surname' );
    $message           = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';

    if ( '' === $name || ! is_email( $email ) || '' === $message ) {
        return 'invalid';
    }

    $subject = sprintf( 'D.A.K Website Enquiry: %s — %s', $type ? $type : 'Travel enquiry', $name );
    $lines   = array(
        'New enquiry from daktravel.co.za',
        '',
        'Name: ' . $name,
        'Email: ' . $email,
        'Mobile / WhatsApp: ' . $mobile,
        'Enquiry type: ' . $type,
    );

    $optional = array(
        'Organisation / company / group' => $organisation,
        'Booking reference / PNR'        => $booking_ref,
        'Passenger surname'              => $passenger_surname,
        'Departure city'                 => $from,
        'Departure city or cities'       => $origins,
        'Destination'                    => $to,
        'Travel dates'                   => $dates,
        'Number of travellers'           => $travellers,
        'Typical trip / destination'     => $trip_detail,
    );

    foreach ( $optional as $label => $value ) {
        if ( '' !== $value ) {
            $lines[] = $label . ': ' . $value;
        }
    }

    $lines[] = '';
    $lines[] = 'Message:';
    $lines[] = $message;

    $recipient = daktravel_enquiry_recipient();
    if ( ! is_email( $recipient ) ) {
        return 'error';
    }

    $headers   = array( 'Content-Type: text/plain; charset=UTF-8' );
    $headers[] = 'Reply-To: ' . $name . ' <' . $email . '>';

    return wp_mail( $recipient, $subject, implode( "\n", $lines ), $headers ) ? 'success' : 'error';
}

/**
 * Keep the admin-post endpoint as a fallback for integrations/bookmarks, even
 * though the visible form submits to the Contact page itself.
 */
function daktravel_handle_enquiry() {
    $status = daktravel_process_enquiry_submission();
    $sent   = 'success' === $status ? '1' : ( 'invalid' === $status ? 'error' : '0' );
    wp_safe_redirect( add_query_arg( 'sent', $sent, home_url( '/contact/' ) ) . '#enquiry' );
    exit;
}
add_action( 'admin_post_nopriv_daktravel_enquiry', 'daktravel_handle_enquiry' );
add_action( 'admin_post_daktravel_enquiry', 'daktravel_handle_enquiry' );
