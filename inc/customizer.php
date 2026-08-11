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
            'description' => __( 'Upload real D.A.K photography and approved organisation logos used across the site.', 'daktravel' ),
            'priority'    => 35,
        )
    );

    $images = array(
        'daktravel_hero_image' => array(
            'label'       => __( 'Homepage hero image', 'daktravel' ),
            'description' => __( 'Use a premium real photograph relevant to D.A.K or South Africa–Israel travel.', 'daktravel' ),
        ),
        'daktravel_israel_image' => array(
            'label'       => __( 'Israel travel image', 'daktravel' ),
            'description' => __( 'A strong Israel image for the specialist travel section.', 'daktravel' ),
        ),
        'daktravel_group_image' => array(
            'label'       => __( 'Groups & delegations image', 'daktravel' ),
            'description' => __( 'Use a genuine group/delegation or relevant professional travel image.', 'daktravel' ),
        ),
        'daktravel_team_image' => array(
            'label'       => __( 'D.A.K team image', 'daktravel' ),
            'description' => __( 'Prefer a real photograph of the D.A.K team or consultants.', 'daktravel' ),
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
