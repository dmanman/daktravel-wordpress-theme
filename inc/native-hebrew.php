<?php
/**
 * Native Hebrew mini-site for D.A.K Travel.
 *
 * Creates a small, indexable Hebrew section under /he/ without depending on a
 * translation plugin. The English site remains the source site; Hebrew pages
 * target travellers in Israel searching for travel to South Africa.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function daktravel_native_hebrew_pages() {
    return array(
        'home' => array(
            'path'        => 'he',
            'slug'        => 'he',
            'title'       => 'D.A.K Travel בעברית',
            'seo_title'   => 'טיסות לדרום אפריקה מישראל | D.A.K Travel Johannesburg',
            'description' => 'טיסות מישראל לדרום אפריקה, יוהנסבורג וקייפטאון עם D.A.K Travel. השוואת מסלולים, קונקשנים, כבודה, תנאי כרטיס ושירות אישי מסוכנות נסיעות ביוהנסבורג.',
            'english'     => '/',
        ),
        'flights' => array(
            'path'        => 'he/flights-to-south-africa',
            'slug'        => 'flights-to-south-africa',
            'title'       => 'טיסות מישראל לדרום אפריקה',
            'seo_title'   => 'טיסות מישראל לדרום אפריקה | יוהנסבורג וקייפטאון | D.A.K Travel',
            'description' => 'טיסות מישראל לדרום אפריקה, יוהנסבורג וקייפטאון. מידע על מסלולים, קונקשנים, כבודה, טיסות המשך ותנאי כרטיס עם D.A.K Travel ביוהנסבורג.',
            'english'     => '/flights-from-israel-to-south-africa/',
        ),
        'groups' => array(
            'path'        => 'he/groups',
            'slug'        => 'groups',
            'title'       => 'קבוצות ומשלחות',
            'seo_title'   => 'נסיעות קבוצתיות ומשלחות לדרום אפריקה | D.A.K Travel',
            'description' => 'תכנון נסיעות לקבוצות ומשלחות מישראל לדרום אפריקה עם תיאום טיסות, שמות נוסעים, מועדי כרטוס, חיבורים ושירות אישי.',
            'english'     => '/groups-delegations/',
        ),
        'business' => array(
            'path'        => 'he/business-travel',
            'slug'        => 'business-travel',
            'title'       => 'נסיעות עסקים',
            'seo_title'   => 'נסיעות עסקים לדרום אפריקה | D.A.K Travel Johannesburg',
            'description' => 'שירות אישי לנסיעות עסקים מישראל לדרום אפריקה, כולל טיסות, מסלולים מורכבים, שינויים ותמיכה מחברת נסיעות ביוהנסבורג.',
            'english'     => '/business-travel/',
        ),
        'about' => array(
            'path'        => 'he/about',
            'slug'        => 'about',
            'title'       => 'אודות D.A.K Travel',
            'seo_title'   => 'אודות D.A.K Travel | סוכנות נסיעות ביוהנסבורג מאז 2006',
            'description' => 'D.A.K Travel היא סוכנות נסיעות ותיקה ביוהנסבורג משנת 2006, עם ניסיון בנסיעות בין ישראל לדרום אפריקה, קבוצות ונסיעות מורכבות.',
            'english'     => '/about/',
        ),
        'contact' => array(
            'path'        => 'he/contact',
            'slug'        => 'contact',
            'title'       => 'צרו קשר',
            'seo_title'   => 'צרו קשר עם D.A.K Travel | טיסות מישראל לדרום אפריקה',
            'description' => 'צרו קשר עם D.A.K Travel ביוהנסבורג לקבלת עזרה בטיסות מישראל לדרום אפריקה, קבוצות, נסיעות עסקים והזמנות קיימות.',
            'english'     => '/contact/',
        ),
    );
}

function daktravel_ensure_native_hebrew_pages() {
    $pages = daktravel_native_hebrew_pages();

    $parent = get_page_by_path( 'he', OBJECT, 'page' );
    if ( ! ( $parent instanceof WP_Post ) ) {
        $parent_id = wp_insert_post(
            array(
                'post_type'      => 'page',
                'post_status'    => 'publish',
                'post_title'     => $pages['home']['title'],
                'post_name'      => 'he',
                'post_content'   => '',
                'comment_status' => 'closed',
                'ping_status'    => 'closed',
            )
        );
        $parent = $parent_id && ! is_wp_error( $parent_id ) ? get_post( $parent_id ) : null;
    }

    if ( ! ( $parent instanceof WP_Post ) ) {
        return;
    }

    update_post_meta( $parent->ID, '_dak_native_hebrew', 'home' );
    update_post_meta( $parent->ID, '_dak_seo_title', $pages['home']['seo_title'] );
    update_post_meta( $parent->ID, '_dak_seo_description', $pages['home']['description'] );

    foreach ( $pages as $key => $page ) {
        if ( 'home' === $key ) {
            continue;
        }

        $existing = get_page_by_path( $page['path'], OBJECT, 'page' );
        if ( ! ( $existing instanceof WP_Post ) ) {
            $post_id = wp_insert_post(
                array(
                    'post_type'      => 'page',
                    'post_status'    => 'publish',
                    'post_title'     => $page['title'],
                    'post_name'      => $page['slug'],
                    'post_parent'    => $parent->ID,
                    'post_content'   => '',
                    'comment_status' => 'closed',
                    'ping_status'    => 'closed',
                )
            );
            $existing = $post_id && ! is_wp_error( $post_id ) ? get_post( $post_id ) : null;
        }

        if ( $existing instanceof WP_Post ) {
            update_post_meta( $existing->ID, '_dak_native_hebrew', $key );
            update_post_meta( $existing->ID, '_dak_seo_title', $page['seo_title'] );
            update_post_meta( $existing->ID, '_dak_seo_description', $page['description'] );
        }
    }
}
add_action( 'init', 'daktravel_ensure_native_hebrew_pages', 25 );

function daktravel_native_hebrew_page_key() {
    if ( ! is_page() ) {
        return '';
    }

    $post_id = get_queried_object_id();
    if ( ! $post_id ) {
        return '';
    }

    $key = get_post_meta( $post_id, '_dak_native_hebrew', true );
    return is_string( $key ) ? $key : '';
}

function daktravel_is_native_hebrew_page() {
    return '' !== daktravel_native_hebrew_page_key();
}

function daktravel_native_hebrew_url( $key = 'home' ) {
    $pages = daktravel_native_hebrew_pages();
    if ( ! isset( $pages[ $key ] ) ) {
        $key = 'home';
    }
    return home_url( '/' . trim( $pages[ $key ]['path'], '/' ) . '/' );
}

function daktravel_native_english_url_for_hebrew_key( $key ) {
    $pages = daktravel_native_hebrew_pages();
    $path  = isset( $pages[ $key ]['english'] ) ? $pages[ $key ]['english'] : '/';
    return home_url( $path );
}

function daktravel_native_hebrew_key_for_english_page() {
    if ( is_front_page() ) {
        return 'home';
    }
    if ( is_page( 'flights-from-israel-to-south-africa' ) ) {
        return 'flights';
    }
    if ( is_page( 'groups-delegations' ) ) {
        return 'groups';
    }
    if ( is_page( 'business-travel' ) ) {
        return 'business';
    }
    if ( is_page( 'about' ) ) {
        return 'about';
    }
    if ( is_page( 'contact' ) ) {
        return 'contact';
    }
    return 'home';
}

function daktravel_native_language_switcher() {
    if ( daktravel_is_native_hebrew_page() ) {
        $key = daktravel_native_hebrew_page_key();
        return '<nav class="dak-language-switcher" aria-label="Language"><a href="' . esc_url( daktravel_native_english_url_for_hebrew_key( $key ) ) . '" hreflang="en-ZA" lang="en">EN</a><span aria-hidden="true">·</span><strong lang="he">עברית</strong></nav>';
    }

    $key = daktravel_native_hebrew_key_for_english_page();
    return '<nav class="dak-language-switcher" aria-label="Language"><strong lang="en">EN</strong><span aria-hidden="true">·</span><a href="' . esc_url( daktravel_native_hebrew_url( $key ) ) . '" hreflang="he-IL" lang="he">עברית</a></nav>';
}

function daktravel_native_hebrew_body_class( $classes ) {
    if ( daktravel_is_native_hebrew_page() ) {
        $classes[] = 'dak-native-hebrew';
    }
    return $classes;
}
add_filter( 'body_class', 'daktravel_native_hebrew_body_class' );

function daktravel_native_hebrew_template( $template ) {
    if ( ! daktravel_is_native_hebrew_page() ) {
        return $template;
    }

    $native = get_template_directory() . '/templates/native-hebrew.php';
    return file_exists( $native ) ? $native : $template;
}
add_filter( 'template_include', 'daktravel_native_hebrew_template', 99 );

function daktravel_native_hebrew_assets() {
    if ( ! daktravel_is_native_hebrew_page() ) {
        return;
    }

    $theme_version = wp_get_theme()->get( 'Version' );
    $css_path      = get_template_directory() . '/assets/css/native-hebrew.css';

    wp_enqueue_style(
        'daktravel-native-hebrew-fonts',
        'https://fonts.googleapis.com/css2?family=Noto+Sans+Hebrew:wght@400..800&family=Noto+Serif+Hebrew:wght@400..700&display=swap',
        array(),
        null
    );
    wp_enqueue_style(
        'daktravel-native-hebrew',
        get_template_directory_uri() . '/assets/css/native-hebrew.css',
        array( 'daktravel-multilingual', 'daktravel-native-hebrew-fonts' ),
        file_exists( $css_path ) ? (string) filemtime( $css_path ) : $theme_version
    );

    if ( 'home' === daktravel_native_hebrew_page_key() || 'flights' === daktravel_native_hebrew_page_key() ) {
        $route_css = get_template_directory() . '/assets/css/route-slideshow.css';
        wp_enqueue_style(
            'daktravel-route-slideshow-he',
            get_template_directory_uri() . '/assets/css/route-slideshow.css',
            array( 'daktravel-native-hebrew' ),
            file_exists( $route_css ) ? (string) filemtime( $route_css ) : $theme_version
        );
    }
}
add_action( 'wp_enqueue_scripts', 'daktravel_native_hebrew_assets', 40 );

function daktravel_native_hebrew_rankmath_title( $title ) {
    if ( ! daktravel_is_native_hebrew_page() ) {
        return $title;
    }
    $key   = daktravel_native_hebrew_page_key();
    $pages = daktravel_native_hebrew_pages();
    return isset( $pages[ $key ]['seo_title'] ) ? $pages[ $key ]['seo_title'] : $title;
}
add_filter( 'rank_math/frontend/title', 'daktravel_native_hebrew_rankmath_title', 99 );

function daktravel_native_hebrew_rankmath_description( $description ) {
    if ( ! daktravel_is_native_hebrew_page() ) {
        return $description;
    }
    $key   = daktravel_native_hebrew_page_key();
    $pages = daktravel_native_hebrew_pages();
    return isset( $pages[ $key ]['description'] ) ? $pages[ $key ]['description'] : $description;
}
add_filter( 'rank_math/frontend/description', 'daktravel_native_hebrew_rankmath_description', 99 );

function daktravel_native_hebrew_hreflang() {
    $hebrew_key = '';
    $english    = '';
    $hebrew     = '';

    if ( daktravel_is_native_hebrew_page() ) {
        $hebrew_key = daktravel_native_hebrew_page_key();
        $english    = daktravel_native_english_url_for_hebrew_key( $hebrew_key );
        $hebrew     = get_permalink();
    } elseif ( is_front_page() || is_page( array( 'flights-from-israel-to-south-africa', 'groups-delegations', 'business-travel', 'about', 'contact' ) ) ) {
        $hebrew_key = daktravel_native_hebrew_key_for_english_page();
        $english    = is_front_page() ? home_url( '/' ) : get_permalink();
        $hebrew     = daktravel_native_hebrew_url( $hebrew_key );
    }

    if ( ! $english || ! $hebrew ) {
        return;
    }

    printf( "\n<link rel=\"alternate\" hreflang=\"en-ZA\" href=\"%s\">\n", esc_url( $english ) );
    printf( "<link rel=\"alternate\" hreflang=\"he-IL\" href=\"%s\">\n", esc_url( $hebrew ) );
    printf( "<link rel=\"alternate\" hreflang=\"x-default\" href=\"%s\">\n", esc_url( $english ) );
}
add_action( 'wp_head', 'daktravel_native_hebrew_hreflang', 3 );

function daktravel_native_hebrew_robots( $robots ) {
    if ( daktravel_is_native_hebrew_page() ) {
        $robots['index']  = true;
        $robots['follow'] = true;
    }
    return $robots;
}
add_filter( 'wp_robots', 'daktravel_native_hebrew_robots', 25 );
