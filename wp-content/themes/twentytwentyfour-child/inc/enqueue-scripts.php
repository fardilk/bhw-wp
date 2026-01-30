<?php
/**
 * Enqueue Scripts and Styles
 *
 * @package BHW_Freight
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action('wp_enqueue_scripts', 'bhw_freight_enqueue_styles');

function bhw_freight_enqueue_styles() {
    // Parent theme stylesheet
    wp_enqueue_style(
        'bhw-freight-parent',
        get_template_directory_uri() . '/style.css',
        array(),
        wp_get_theme()->get('Version')
    );

    // Custom CSS files
    wp_enqueue_style(
        'bhw-freight-reset',
        BHW_FREIGHT_URL . '/css/reset.css',
        array('bhw-freight-parent'),
        BHW_FREIGHT_VERSION
    );

    wp_enqueue_style(
        'bhw-freight-variables',
        BHW_FREIGHT_URL . '/css/variables.css',
        array('bhw-freight-reset'),
        BHW_FREIGHT_VERSION
    );

    wp_enqueue_style(
        'bhw-freight-layout',
        BHW_FREIGHT_URL . '/css/layout.css',
        array('bhw-freight-variables'),
        BHW_FREIGHT_VERSION
    );

    wp_enqueue_style(
        'bhw-freight-components',
        BHW_FREIGHT_URL . '/css/components.css',
        array('bhw-freight-layout'),
        BHW_FREIGHT_VERSION
    );

    wp_enqueue_style(
        'bhw-freight-responsive',
        BHW_FREIGHT_URL . '/css/responsive.css',
        array('bhw-freight-components'),
        BHW_FREIGHT_VERSION
    );

    // Google Fonts
    wp_enqueue_style(
        'bhw-freight-google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap',
        array(),
        BHW_FREIGHT_VERSION
    );

    // Child theme stylesheet
    wp_enqueue_style(
        'bhw-freight-style',
        get_stylesheet_uri(),
        array('bhw-freight-responsive'),
        BHW_FREIGHT_VERSION
    );
}

add_action('wp_enqueue_scripts', 'bhw_freight_enqueue_scripts');

function bhw_freight_enqueue_scripts() {
    // Main JavaScript
    wp_enqueue_script(
        'bhw-freight-main',
        BHW_FREIGHT_URL . '/js/main.js',
        array(),
        BHW_FREIGHT_VERSION,
        true // Load in footer
    );

    // Form Handler
    wp_enqueue_script(
        'bhw-freight-forms',
        BHW_FREIGHT_URL . '/js/form-handler.js',
        array('bhw-freight-main'),
        BHW_FREIGHT_VERSION,
        true
    );

    // Localize script for AJAX and nonces
    wp_localize_script('bhw-freight-forms', 'bhwFreight', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('bhw_freight_nonce'),
        'rest_url' => rest_url('bhw/v1/'),
    ));
}

/**
 * Enqueue admin styles and scripts
 */
add_action('admin_enqueue_scripts', 'bhw_freight_admin_scripts');

function bhw_freight_admin_scripts($hook) {
    // Only load on BHW admin pages
    if (strpos($hook, 'bhw') === false) {
        return;
    }

    wp_enqueue_style(
        'bhw-freight-admin',
        BHW_FREIGHT_URL . '/css/admin.css',
        array(),
        BHW_FREIGHT_VERSION
    );

    wp_enqueue_script(
        'bhw-freight-admin',
        BHW_FREIGHT_URL . '/js/admin.js',
        array('jquery'),
        BHW_FREIGHT_VERSION,
        true
    );
}
