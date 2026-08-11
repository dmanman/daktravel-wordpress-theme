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

function daktravel_handle_enquiry() {
    if ( ! isset( $_POST['daktravel_enquiry_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['daktravel_enquiry_nonce'] ) ), 'daktravel_enquiry' ) ) {
        wp_die( esc_html__( 'We could not verify this enquiry. Please go back and try again.', 'daktravel' ) );
    }

    // Honeypot: genuine visitors should leave this field blank.
    if ( ! empty( $_POST['website'] ) ) {
        wp_safe_redirect( add_query_arg( 'sent', '1', home_url( '/contact/' ) ) . '#enquiry' );
        exit;
    }

    $name        = isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
    $email       = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
    $mobile      = isset( $_POST['mobile'] ) ? sanitize_text_field( wp_unslash( $_POST['mobile'] ) ) : '';
    $type        = isset( $_POST['enquiry_type'] ) ? sanitize_text_field( wp_unslash( $_POST['enquiry_type'] ) ) : '';
    $from        = isset( $_POST['departure'] ) ? sanitize_text_field( wp_unslash( $_POST['departure'] ) ) : '';
    $to          = isset( $_POST['destination'] ) ? sanitize_text_field( wp_unslash( $_POST['destination'] ) ) : '';
    $dates       = isset( $_POST['dates'] ) ? sanitize_text_field( wp_unslash( $_POST['dates'] ) ) : '';
    $travellers  = isset( $_POST['travellers'] ) ? sanitize_text_field( wp_unslash( $_POST['travellers'] ) ) : '';
    $message     = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';

    if ( '' === $name || ! is_email( $email ) || '' === $message ) {
        wp_safe_redirect( add_query_arg( 'sent', 'error', home_url( '/contact/' ) ) . '#enquiry' );
        exit;
    }

    $subject = sprintf( 'D.A.K Website Enquiry: %s — %s', $type ? $type : 'Travel enquiry', $name );
    $body    = "New enquiry from daktravel.co.za\n\n";
    $body   .= "Name: {$name}\n";
    $body   .= "Email: {$email}\n";
    $body   .= "Mobile / WhatsApp: {$mobile}\n";
    $body   .= "Enquiry type: {$type}\n";
    $body   .= "Departure: {$from}\n";
    $body   .= "Destination: {$to}\n";
    $body   .= "Travel dates: {$dates}\n";
    $body   .= "Travellers: {$travellers}\n\n";
    $body   .= "Message:\n{$message}\n";

    $headers   = array( 'Content-Type: text/plain; charset=UTF-8' );
    $headers[] = 'Reply-To: ' . $name . ' <' . $email . '>';

    $sent = wp_mail( daktravel_enquiry_recipient(), $subject, $body, $headers );

    wp_safe_redirect( add_query_arg( 'sent', $sent ? '1' : '0', home_url( '/contact/' ) ) . '#enquiry' );
    exit;
}
add_action( 'admin_post_nopriv_daktravel_enquiry', 'daktravel_handle_enquiry' );
add_action( 'admin_post_daktravel_enquiry', 'daktravel_handle_enquiry' );
