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
            'label'       => __( 'Israel luxury architecture image', 'daktravel' ),
            'description' => __( 'Use a strong licensed or original Israeli architecture / Tel Aviv image for the Israel page.', 'daktravel' ),
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
            'description' => __( 'Prefer a real photograph of the D.A.K team or consultants. This is displayed as a small portrait, not a large hero image.', 'daktravel' ),
        ),
        'daktravel_contact_image' => array(
            'label'       => __( 'Contact page image', 'daktravel' ),
            'description' => __( 'A calm, professional D.A.K or travel image for the contact page.', 'daktravel' ),
        ),
        'daktravel_iata_logo' => array(
            'label'       => __( 'IATA Accredited Agent logo', 'daktravel' ),
            'description' => __( 'Upload the approved IATA Accredited Agent logo used by D.A.K.', 'daktravel' ),
        ),
        'daktravel_asata_logo' => array(
            'label'       => __( 'ASATA logo', 'daktravel' ),
            'description' => __( 'Upload the approved ASATA member logo used by D.A.K.', 'daktravel' ),
        ),
        'daktravel_clubtravel_logo' => array(
            'label'       => __( 'Club Travel logo', 'daktravel' ),
            'description' => __( 'Upload the approved Club Travel affiliate logo used by D.A.K.', 'daktravel' ),
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

/**
 * Match the new theme slots to assets already stored in the existing WordPress
 * media library. A manually selected Customizer image always takes priority.
 */
function daktravel_media_search_terms() {
    return array(
        'daktravel_iata_logo'       => array( 'iata' ),
        'daktravel_asata_logo'      => array( 'asata' ),
        'daktravel_clubtravel_logo' => array( 'club travel', 'clubtravel', 'club-travel' ),
        'daktravel_team_image'      => array( 'yochee', 'photo.small.yk', 'photo-small-yk' ),
    );
}

function daktravel_find_existing_attachment( $terms ) {
    global $wpdb;

    if ( empty( $terms ) || ! is_array( $terms ) ) {
        return 0;
    }

    foreach ( $terms as $term ) {
        $like = '%' . $wpdb->esc_like( $term ) . '%';
        $attachment_id = (int) $wpdb->get_var(
            $wpdb->prepare(
                "SELECT ID
                 FROM {$wpdb->posts}
                 WHERE post_type = 'attachment'
                   AND post_status = 'inherit'
                   AND (LOWER(post_title) LIKE LOWER(%s) OR LOWER(guid) LIKE LOWER(%s))
                 ORDER BY ID DESC
                 LIMIT 1",
                $like,
                $like
            )
        );

        if ( $attachment_id ) {
            return $attachment_id;
        }
    }

    return 0;
}

function daktravel_media_attachment_id( $setting_id ) {
    $selected = absint( get_theme_mod( $setting_id ) );
    if ( $selected ) {
        return $selected;
    }

    static $cache = array();
    if ( array_key_exists( $setting_id, $cache ) ) {
        return $cache[ $setting_id ];
    }

    $map = daktravel_media_search_terms();
    $cache[ $setting_id ] = isset( $map[ $setting_id ] )
        ? daktravel_find_existing_attachment( $map[ $setting_id ] )
        : 0;

    return $cache[ $setting_id ];
}

function daktravel_media_url( $setting_id, $size = 'full' ) {
    $attachment_id = daktravel_media_attachment_id( $setting_id );
    if ( ! $attachment_id ) {
        return '';
    }

    $url = wp_get_attachment_image_url( $attachment_id, $size );
    return $url ? $url : '';
}

function daktravel_media_image( $setting_id, $size = 'full', $class = '', $alt = '' ) {
    $attachment_id = daktravel_media_attachment_id( $setting_id );
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
 * Reusable premium image slot. A selected or auto-discovered media-library image
 * always wins. Where a verified existing-site path is supplied, it is used as a
 * final fallback instead of an empty placeholder.
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

/**
 * Credential mark used in the homepage and About page. When an approved logo is
 * selected or already exists in the old site's media library, render that image;
 * otherwise retain a clean text fallback.
 */
function daktravel_credential_mark( $setting_id, $fallback_label, $alt ) {
    $image = daktravel_media_image( $setting_id, 'medium', 'credential-logo-image', $alt );

    if ( $image ) {
        return '<span class="credential-mark credential-mark--logo">' . $image . '</span>';
    }

    return '<span class="credential-mark">' . esc_html( $fallback_label ) . '</span>';
}
