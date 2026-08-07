<?php
/**
 * MCM Wealth Theme — functions.php
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function mcm_theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo', [
        'height'      => 60,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ] );
    add_theme_support( 'html5', [ 'search-form', 'comment-form', 'gallery', 'caption', 'style', 'script' ] );
    add_theme_support( 'automatic-feed-links' );

    register_nav_menus( [
        'primary' => __( 'Primary Navigation', 'mcm-wealth-theme' ),
    ] );
}
add_action( 'after_setup_theme', 'mcm_theme_setup' );

function mcm_asset_version( $relative_path ) {
    $path = get_template_directory() . '/' . ltrim( $relative_path, '/' );
    return file_exists( $path ) ? (string) filemtime( $path ) : '2.0.0';
}

function mcm_enqueue_assets() {
    wp_enqueue_style(
        'mcm-google-fonts',
        'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,500;1,600&family=Inter:wght@400;500;600;700&display=swap',
        [],
        null
    );

    wp_enqueue_style(
        'mcm-main',
        get_template_directory_uri() . '/assets/css/main.css',
        [ 'mcm-google-fonts' ],
        mcm_asset_version( 'assets/css/main.css' )
    );

    wp_enqueue_script(
        'mcm-i18n',
        get_template_directory_uri() . '/assets/js/i18n.js',
        [],
        mcm_asset_version( 'assets/js/i18n.js' ),
        true
    );

    wp_enqueue_script(
        'mcm-main',
        get_template_directory_uri() . '/assets/js/main.js',
        [ 'mcm-i18n' ],
        mcm_asset_version( 'assets/js/main.js' ),
        true
    );

    wp_script_add_data( 'mcm-i18n', 'defer', true );
    wp_script_add_data( 'mcm-main', 'defer', true );
}
add_action( 'wp_enqueue_scripts', 'mcm_enqueue_assets' );

function mcm_preconnect_fonts() {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
}
add_action( 'wp_head', 'mcm_preconnect_fonts', 1 );

function mcm_register_widgets() {
    register_sidebar( [
        'name'          => __( 'Sidebar', 'mcm-wealth-theme' ),
        'id'            => 'sidebar',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ] );

    for ( $i = 1; $i <= 4; $i++ ) {
        register_sidebar( [
            'name'          => sprintf( __( 'Footer %d', 'mcm-wealth-theme' ), $i ),
            'id'            => 'footer-' . $i,
            'before_widget' => '<div class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="footer-widget-title">',
            'after_title'   => '</h4>',
        ] );
    }
}
add_action( 'widgets_init', 'mcm_register_widgets' );

/**
 * Map legacy WordPress menu labels to the corrected public information
 * architecture without requiring an immediate database migration.
 */
function mcm_nav_key( $title ) {
    $normalized = strtolower( trim( wp_strip_all_tags( (string) $title ) ) );
    $map = [
        'home'                    => 'home',
        'about'                   => 'about',
        'about us'                => 'about',
        'services'                => 'approach',
        'investment focus'        => 'approach',
        'investment approach'     => 'approach',
        'promotions'              => 'partnerships',
        'partnerships'            => 'partnerships',
        'partnerships & opportunities' => 'partnerships',
        'contact'                 => 'contact',
        'contact us'              => 'contact',
    ];

    return $map[ $normalized ] ?? '';
}

function mcm_public_nav_label( $key ) {
    $labels = [
        'home'         => 'Home',
        'about'        => 'About',
        'approach'     => 'Investment Approach',
        'partnerships' => 'Partnerships',
        'contact'      => 'Contact',
    ];

    return $labels[ $key ] ?? '';
}

function mcm_filter_nav_title( $title, $item, $args, $depth ) {
    if ( empty( $args->theme_location ) || 'primary' !== $args->theme_location ) {
        return $title;
    }

    $key = mcm_nav_key( $title );
    return $key ? mcm_public_nav_label( $key ) : $title;
}
add_filter( 'nav_menu_item_title', 'mcm_filter_nav_title', 10, 4 );

function mcm_filter_nav_attributes( $atts, $item, $args, $depth ) {
    if ( empty( $args->theme_location ) || 'primary' !== $args->theme_location ) {
        return $atts;
    }

    $key = mcm_nav_key( $item->title );
    if ( $key ) {
        $atts['data-i18n'] = 'nav.' . $key;
    }
    if ( 'contact' === $key ) {
        $atts['class'] = trim( ( $atts['class'] ?? '' ) . ' btn-nav' );
    }

    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'mcm_filter_nav_attributes', 10, 4 );

function mcm_language_switch_markup() {
    return '<li><div class="lang-switch" role="group" aria-label="切換語言 / Switch language">'
        . '<button type="button" class="lang-option is-active" onclick="switchLang(\'en\')" aria-label="English">EN</button>'
        . '<button type="button" class="lang-option" onclick="switchLang(\'zh\')" aria-label="繁體中文">中</button>'
        . '</div></li>';
}

function mcm_append_lang_switch( $items, $args ) {
    if ( empty( $args->theme_location ) || 'primary' !== $args->theme_location ) {
        return $items;
    }
    return $items . mcm_language_switch_markup();
}
add_filter( 'wp_nav_menu_items', 'mcm_append_lang_switch', 10, 2 );

function mcm_fallback_nav( $args ) {
    $pages = [
        [ 'key' => 'home',         'url' => home_url( '/' ),            'current' => is_front_page() ],
        [ 'key' => 'about',        'url' => home_url( '/about-us/' ),   'current' => is_page( 'about-us' ) ],
        [ 'key' => 'approach',     'url' => home_url( '/services/' ),   'current' => is_page( 'services' ) ],
        [ 'key' => 'partnerships', 'url' => home_url( '/promotions/' ), 'current' => is_page( 'promotions' ) ],
        [ 'key' => 'contact',      'url' => home_url( '/contact/' ),    'current' => is_page( 'contact' ) ],
    ];

    echo '<ul id="primary-menu" class="nav-menu">';
    foreach ( $pages as $page ) {
        $class = $page['current'] ? ' class="current-menu-item"' : '';
        $attrs = $page['current'] ? ' aria-current="page"' : '';
        $link_class = 'contact' === $page['key'] ? ' class="btn-nav"' : '';
        echo '<li' . $class . '><a href="' . esc_url( $page['url'] ) . '"' . $link_class . $attrs . ' data-i18n="nav.' . esc_attr( $page['key'] ) . '">' . esc_html( mcm_public_nav_label( $page['key'] ) ) . '</a></li>';
    }
    echo mcm_language_switch_markup(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    echo '</ul>';
}

define( 'MCM_CONTACT_NONCE', 'mcm_contact_form' );
