<?php
/**
 * BHW Freight Services Theme Functions
 */

// Enqueue styles and scripts
add_action( 'wp_enqueue_scripts', 'bhw_enqueue_assets' );
function bhw_enqueue_assets() {
    // Main stylesheet
    wp_enqueue_style( 'bhw-style', get_stylesheet_uri() );

    // Custom CSS files
    wp_enqueue_style( 'bhw-reset', get_template_directory_uri() . '/assets/css/reset.css' );
    wp_enqueue_style( 'bhw-variables', get_template_directory_uri() . '/assets/css/variables.css' );
    wp_enqueue_style( 'bhw-layout', get_template_directory_uri() . '/assets/css/layout.css' );
    wp_enqueue_style( 'bhw-components', get_template_directory_uri() . '/assets/css/components.css' );
    wp_enqueue_style( 'bhw-responsive', get_template_directory_uri() . '/assets/css/responsive.css' );

    // Google Fonts
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap' );

    // Main JS
    wp_enqueue_script( 'bhw-main', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true );
    wp_enqueue_script( 'bhw-form', get_template_directory_uri() . '/assets/js/form-handler.js', array(), '1.0.0', true );

    // Add localization for form handlers
    wp_localize_script( 'bhw-form', 'bhwAjax', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
    ) );
}

// Add theme support
add_action( 'after_setup_theme', 'bhw_theme_setup' );
function bhw_theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'script', 'style' ) );
    add_theme_support( 'custom-logo' );

    // Register menu locations
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'bhw-freight' ),
    ) );
}

// Custom logo support
add_filter( 'get_custom_logo', 'bhw_custom_logo' );
function bhw_custom_logo() {
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    if ( $custom_logo_id ) {
        return wp_get_attachment_image( $custom_logo_id, 'full' );
    }
    // Fallback to default logo
    return '<img src="' . esc_url( get_template_directory_uri() . '/assets/images/logo.png' ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '" class="logo-image">';
}

// Handle form submissions (for future Contact Form 7 integration)
add_action( 'wp_footer', 'bhw_footer_scripts' );
function bhw_footer_scripts() {
    ?>
    <script>
    function scrollToQuote() {
        const quote = document.getElementById('quote');
        if (quote) {
            quote.scrollIntoView({ behavior: 'smooth' });
        }
    }
    </script>
    <?php
}

// Remove admin bar for non-admins on frontend
show_admin_bar( false );
