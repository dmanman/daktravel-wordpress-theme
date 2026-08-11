<?php
/**
 * Simple form-to-email enquiry handler for D.A.K Travel.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function daktravel_enquiry_recipient() {
    return apply_filters( 'daktravel_enquiry_recipient', 'info@daktravel.co.za' );
}

function daktravel_post_text( $key ) {
    return isset( $_POST[ $key ] ) ? sanitize_text_field( wp_unslash( $_POST[ $key ] ) ) : '';
}

function daktravel_handle_enquiry() {
    if ( ! isset( $_POST['daktravel_enquiry_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['daktravel_enquiry_nonce'] ) ), 'daktravel_enquiry' ) ) {
        wp_die( esc_html__( 'We could not verify this enquiry. Please go back and try again.', 'daktravel' ) );
    }

    if ( ! empty( $_POST['website'] ) ) {
        wp_safe_redirect( add_query_arg( 'sent', '1', home_url( '/contact/' ) ) . '#enquiry' );
        exit;
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
        wp_safe_redirect( add_query_arg( 'sent', 'error', home_url( '/contact/' ) ) . '#enquiry' );
        exit;
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

    $headers   = array( 'Content-Type: text/plain; charset=UTF-8' );
    $headers[] = 'Reply-To: ' . $name . ' <' . $email . '>';

    $sent = wp_mail( daktravel_enquiry_recipient(), $subject, implode( "\n", $lines ), $headers );

    wp_safe_redirect( add_query_arg( 'sent', $sent ? '1' : '0', home_url( '/contact/' ) ) . '#enquiry' );
    exit;
}
add_action( 'admin_post_nopriv_daktravel_enquiry', 'daktravel_handle_enquiry' );
add_action( 'admin_post_daktravel_enquiry', 'daktravel_handle_enquiry' );
