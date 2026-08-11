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

function daktravel_process_enquiry_submission() {
    if ( ! isset( $_POST['daktravel_enquiry_submit'] ) ) {
        return '';
    }

    if ( ! isset( $_POST['daktravel_enquiry_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['daktravel_enquiry_nonce'] ) ), 'daktravel_enquiry' ) ) {
        return 'invalid';
    }

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
    $group_travellers  = daktravel_post_text( 'group_travellers' );
    $group_destination = daktravel_post_text( 'group_destination' );
    $group_dates       = daktravel_post_text( 'group_dates' );
    $organisation      = daktravel_post_text( 'organisation' );
    $origins           = daktravel_post_text( 'origins' );
    $trip_detail       = daktravel_post_text( 'trip_detail' );
    $booking_ref       = daktravel_post_text( 'booking_ref' );
    $passenger_surname = daktravel_post_text( 'passenger_surname' );
    $message           = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';

    $allowed_types = array(
        'General travel enquiry',
        'Israel travel',
        'Group or delegation',
        'Business travel',
        'Complex personal travel',
        'Existing booking',
    );
    if ( ! in_array( $type, $allowed_types, true ) ) {
        $type = 'General travel enquiry';
    }

    if ( '' === $name || ! is_email( $email ) || '' === $message ) {
        return 'invalid';
    }

    $subject = sprintf( 'D.A.K Website Enquiry: %s — %s', $type, $name );
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
        'Destination'                    => $group_destination ? $group_destination : $to,
        'Travel dates'                   => $group_dates ? $group_dates : $dates,
        'Number of travellers'           => $group_travellers ? $group_travellers : $travellers,
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

    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'From: D.A.K Travel Website <info@daktravel.co.za>',
        'Reply-To: ' . $name . ' <' . $email . '>',
    );

    return wp_mail( $recipient, $subject, implode( "\n", $lines ), $headers ) ? 'success' : 'error';
}

function daktravel_handle_enquiry() {
    $status = daktravel_process_enquiry_submission();
    if ( 'success' === $status ) {
        $sent = '1';
    } elseif ( 'invalid' === $status ) {
        $sent = 'invalid';
    } else {
        $sent = '0';
    }

    $args = array( 'sent' => $sent );
    $return_type = daktravel_post_text( 'return_type' );
    if ( in_array( $return_type, array( 'israel', 'group', 'business', 'complex', 'existing', 'general' ), true ) ) {
        $args['type'] = $return_type;
    }

    wp_safe_redirect( add_query_arg( $args, home_url( '/contact/' ) ) . '#enquiry' );
    exit;
}
add_action( 'admin_post_nopriv_daktravel_enquiry', 'daktravel_handle_enquiry' );
add_action( 'admin_post_daktravel_enquiry', 'daktravel_handle_enquiry' );
