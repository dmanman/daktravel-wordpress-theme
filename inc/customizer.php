<?php
/**
 * D.A.K Travel media controls.
 * Lets the team upload real photography and approved affiliation logos without editing code.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function daktravel_customize_register( $wp_customize ) {
    $wp_customize->add_section(
        'daktravel_media',
        array(
            'title'       => __( 'D.A.K Site Images & Logos', 'daktravel' ),
            'description' => __( 'Upload real D.A.K photography, licensed destination photography and approved organisation logos used across the site.', 'daktravel' ),
            'priority'    => 35,
        )
    );

    $images = array(
        'daktravel_hero_image' => array(
            'label'       => __( 'Homepage hero image', 'daktravel' ),
            'description' => __( 'Use a strong, premium real photograph relevant to D.A.K or international travel.', 'daktravel' ),
        ),
        'daktravel_israel_image' => array(
            'label'       => __( 'Israel travel image', 'daktravel' ),
            'description' => __( 'A strong licensed or original image for South Africa–Israel travel.', 'daktravel' ),
        ),
        'daktravel_group_image' => array(
            'label'       => __( 'Groups & delegations image', 'daktravel' ),
            'description' => __( 'Use a genuine group/delegation or relevant professional travel image.', 'daktravel' ),
        ),
        'daktravel_business_image' => array(
            'label'       => __( 'Business travel image', 'daktravel' ),
            'description' => __( 'A refined business or airport travel image.', 'daktravel' ),
        ),
        'daktravel_complex_image' => array(
            'label'       => __( 'Complex personal travel image', 'daktravel' ),
            'description' => __( 'A refined international travel image suited to multi-city or premium personal travel.', 'daktravel' ),
        ),
        'daktravel_team_image' => array(
            'label'       => __( 'D.A.K team / About image', 'daktravel' ),
            'description' => __( 'Prefer a real photograph of the D.A.K team or consultants.', 'daktravel' ),
        ),
        'daktravel_contact_image' => array(
            'label'       => __( 'Contact page image', 'daktravel' ),
            'description' => __( 'A calm, professional D.A.K or travel image for the contact page.', 'daktravel' ),
        ),
        'daktravel_iata_logo' => array(
            'label'       => __( 'IATA logo', 'daktravel' ),
            'description' => __( 'Upload only an approved logo that D.A.K is permitted to display.', 'daktravel' ),
        ),
        'daktravel_asata_logo' => array(
            'label'       => __( 'ASATA logo', 'daktravel' ),
            'description' => __( 'Upload only an approved logo that D.A.K is permitted to display.', 'daktravel' ),
        ),
        'daktravel_clubtravel_logo' => array(
            'label'       => __( 'Club Travel logo', 'daktravel' ),
            'description' => __( 'Upload only an approved affiliate logo that D.A.K is permitted to display.', 'daktravel' ),
        ),
    );

    foreach ( $images as $setting_id => $args ) {
        $wp_customize->add_setting(
            $setting_id,
            array(
                'default'           => 0,
                'sanitize_callback' => 'absint',
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Media_Control(
                $wp_customize,
                $setting_id,
                array(
                    'label'       => $args['label'],
                    'description' => $args['description'],
                    'section'     => 'daktravel_media',
                    'mime_type'   => 'image',
                )
            )
        );
    }
}
add_action( 'customize_register', 'daktravel_customize_register' );

function daktravel_media_url( $setting_id, $size = 'full' ) {
    $attachment_id = absint( get_theme_mod( $setting_id ) );
    if ( ! $attachment_id ) {
        return '';
    }

    $url = wp_get_attachment_image_url( $attachment_id, $size );
    return $url ? $url : '';
}

function daktravel_media_image( $setting_id, $size = 'full', $class = '', $alt = '' ) {
    $attachment_id = absint( get_theme_mod( $setting_id ) );
    if ( ! $attachment_id ) {
        return '';
    }

    $attrs = array();
    if ( $class ) {
        $attrs['class'] = $class;
    }
    if ( $alt ) {
        $attrs['alt'] = $alt;
    }

    return wp_get_attachment_image( $attachment_id, $size, false, $attrs );
}

/**
 * Existing media-library asset from the current D.A.K website. Theme activation
 * does not remove wp-content/uploads, so these are safe fallbacks while higher-
 * resolution or newer photography is selected in the Customizer.
 */
function daktravel_existing_upload_url( $relative_path ) {
    $relative_path = '/' . ltrim( (string) $relative_path, '/' );
    return content_url( '/uploads' . $relative_path );
}

/**
 * Reusable premium image slot. A selected Customizer image always wins. Where a
 * verified existing-site image is supplied, it is used as a fallback instead of
 * an empty placeholder.
 */
function daktravel_media_slot( $setting_id, $alt = '', $label = '', $fallback_relative = '' ) {
    $image = daktravel_media_image( $setting_id, 'large', 'dak-media-image', $alt );

    if ( $image ) {
        return '<div class="dak-media-slot has-image">' . $image . '</div>';
    }

    if ( $fallback_relative ) {
        $fallback_url = daktravel_existing_upload_url( $fallback_relative );
        return '<div class="dak-media-slot has-image"><img class="dak-media-image" src="' . esc_url( $fallback_url ) . '" alt="' . esc_attr( $alt ) . '" loading="lazy"></div>';
    }

    $label_html = $label ? '<span>' . esc_html( $label ) . '</span>' : '';
    return '<div class="dak-media-slot dak-media-placeholder" aria-hidden="true">' . $label_html . '</div>';
}
