<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>document.documentElement.classList.add('js');</script>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#main-content"><?php esc_html_e( 'Skip to content', 'mcm-wealth-theme' ); ?></a>

<header class="site-header">
    <div class="container header-inner">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?> — Home">
            <img class="logo-mark" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo_icon.jpg' ); ?>" alt="" width="45" height="45" aria-hidden="true">
            <span class="logo-text">
                <span class="logo-name">MCM Wealth</span>
                <span class="logo-sub">Management Limited</span>
            </span>
        </a>

        <nav class="header-nav" id="primary-navigation" aria-label="<?php esc_attr_e( 'Primary navigation', 'mcm-wealth-theme' ); ?>">
            <?php
            wp_nav_menu( [
                'theme_location' => 'primary',
                'menu_id'        => 'primary-menu',
                'menu_class'     => 'nav-menu',
                'container'      => false,
                'fallback_cb'    => 'mcm_fallback_nav',
                'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            ] );
            ?>
        </nav>

        <button class="nav-toggle" type="button" aria-controls="primary-navigation" aria-expanded="false" aria-label="<?php esc_attr_e( 'Open navigation', 'mcm-wealth-theme' ); ?>">
            <span></span><span></span><span></span>
        </button>
    </div>
</header>

<main id="main-content">
