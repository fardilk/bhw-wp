<?php
/**
 * BHW Freight Services Theme Functions
 *
 * @package BHW_Freight
 * @since 1.0.0
 */

// ============================================
// SECURITY & SETUP
// ============================================

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

define('BHW_FREIGHT_VERSION', '1.0.0');
define('BHW_FREIGHT_DIR', get_stylesheet_directory());
define('BHW_FREIGHT_URL', get_stylesheet_directory_uri());

// ============================================
// LOAD INCLUDES
// ============================================

require_once BHW_FREIGHT_DIR . '/inc/enqueue-scripts.php';
require_once BHW_FREIGHT_DIR . '/inc/custom-post-types.php';
require_once BHW_FREIGHT_DIR . '/inc/theme-options.php';

// ============================================
// THEME SUPPORT & SETUP
// ============================================

add_action('after_setup_theme', 'bhw_freight_setup');

function bhw_freight_setup() {
    // Add title tag support
    add_theme_support('title-tag');

    // Add featured images support
    add_theme_support('post-thumbnails');
    add_image_size('bhw-hero', 1920, 1080, true);
    add_image_size('bhw-service', 400, 400, true);

    // Add excerpt support
    add_post_type_support('page', 'excerpt');

    // Add menu support
    register_nav_menu('primary', esc_html__('Primary Menu', 'bhw-freight'));
    register_nav_menu('footer', esc_html__('Footer Menu', 'bhw-freight'));
}

// ============================================
// REGISTER CUSTOM POST TYPES
// ============================================

add_action('init', 'bhw_freight_register_post_types');

function bhw_freight_register_post_types() {
    // Quote Inquiry Post Type
    $quote_args = array(
        'label' => esc_html__('Quote Inquiries', 'bhw-freight'),
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'supports' => array('title', 'editor'),
        'taxonomies' => array(),
        'menu_icon' => 'dashicons-email-alt',
    );
    register_post_type('bhw_quote', $quote_args);

    // Newsletter Subscribers Post Type
    $subscriber_args = array(
        'label' => esc_html__('Newsletter Subscribers', 'bhw-freight'),
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'supports' => array('title'),
        'menu_icon' => 'dashicons-newsletter',
    );
    register_post_type('bhw_subscriber', $subscriber_args);
}

// ============================================
// WORDPRESS SETTINGS INTEGRATION
// ============================================

/**
 * Get BHW Theme Option
 */
function bhw_get_option($option, $default = '') {
    return get_option('bhw_' . $option, $default);
}

/**
 * Update BHW Theme Option
 */
function bhw_update_option($option, $value) {
    return update_option('bhw_' . $option, $value);
}

// ============================================
// DEFAULT OPTIONS (First-time Setup)
// ============================================

add_action('after_setup_theme', 'bhw_freight_set_default_options');

function bhw_freight_set_default_options() {
    $defaults = array(
        'company_name' => 'BHW Freight Services',
        'phone' => '+62 21 1234 5678',
        'email' => 'quotes@bhw.co.id',
        'whatsapp' => '+62 812 3456 789',
        'hero_title' => 'Fast Freight Delivery Across Indonesia',
        'hero_subtitle' => 'Reliable service from Sumatra to Papua. We handle FTL, LTL, specialized, and express shipments.',
        'years' => '10+',
        'customers' => '500+',
        'on_time_percent' => '99.2%',
        'shipments' => '50K+',
    );

    foreach ($defaults as $key => $value) {
        if (!get_option('bhw_' . $key)) {
            add_option('bhw_' . $key, $value);
        }
    }
}

// ============================================
// REMOVE UNWANTED FEATURES
// ============================================

// Remove admin bar for better mobile view
add_action('after_setup_theme', function() {
    show_admin_bar(false);
});

// ============================================
// SECURITY FUNCTIONS
// ============================================

/**
 * Sanitize text input
 */
function bhw_sanitize_text($text) {
    return sanitize_text_field($text);
}

/**
 * Sanitize email
 */
function bhw_sanitize_email($email) {
    return sanitize_email($email);
}

/**
 * Escape output
 */
function bhw_esc_html($text) {
    return esc_html($text);
}

/**
 * Escape URL
 */
function bhw_esc_url($url) {
    return esc_url($url);
}

// ============================================
// HELPER FUNCTIONS
// ============================================

/**
 * Get hero section content
 */
function bhw_get_hero_content() {
    return array(
        'title' => bhw_get_option('hero_title', 'Fast Freight Delivery Across Indonesia'),
        'subtitle' => bhw_get_option('hero_subtitle', 'Reliable service from Sumatra to Papua'),
        'image' => bhw_get_option('hero_image', ''),
    );
}

/**
 * Get company statistics
 */
function bhw_get_statistics() {
    return array(
        array(
            'number' => bhw_get_option('years', '10+'),
            'label' => esc_html__('Years Serving Indonesia', 'bhw-freight'),
        ),
        array(
            'number' => bhw_get_option('customers', '500+'),
            'label' => esc_html__('Trusted Businesses', 'bhw-freight'),
        ),
        array(
            'number' => bhw_get_option('on_time_percent', '99.2%'),
            'label' => esc_html__('On-Time Delivery', 'bhw-freight'),
        ),
        array(
            'number' => bhw_get_option('shipments', '50K+'),
            'label' => esc_html__('Shipments Completed', 'bhw-freight'),
        ),
    );
}

/**
 * Get service types
 */
function bhw_get_services() {
    return array(
        array(
            'id' => 'ftl',
            'name' => esc_html__('Full Truck Load (FTL)', 'bhw-freight'),
            'description' => esc_html__('Complete vehicles for larger shipments. Most economical for bulk freight across Indonesia.', 'bhw-freight'),
        ),
        array(
            'id' => 'ltl',
            'name' => esc_html__('Less Than Truck Load (LTL)', 'bhw-freight'),
            'description' => esc_html__('Flexible solutions for smaller shipments. Cost-effective for partial loads and time-sensitive deliveries.', 'bhw-freight'),
        ),
        array(
            'id' => 'specialized',
            'name' => esc_html__('Specialized Freight', 'bhw-freight'),
            'description' => esc_html__('Hazmat, refrigerated, oversized cargo. Expert handling of sensitive and complex shipments.', 'bhw-freight'),
        ),
        array(
            'id' => 'express',
            'name' => esc_html__('Express Service', 'bhw-freight'),
            'description' => esc_html__('Urgent shipments with priority handling. Faster delivery times for time-critical cargo.', 'bhw-freight'),
        ),
    );
}

/**
 * Get coverage regions
 */
function bhw_get_coverage_regions() {
    return array(
        array(
            'region' => esc_html__('Java', 'bhw-freight'),
            'cities' => esc_html__('Jakarta, Bandung, Surabaya, Yogyakarta', 'bhw-freight'),
            'delivery' => esc_html__('Next-day delivery', 'bhw-freight'),
        ),
        array(
            'region' => esc_html__('Sumatra', 'bhw-freight'),
            'cities' => esc_html__('Medan, Palembang, Bandar Lampung', 'bhw-freight'),
            'delivery' => esc_html__('2-3 day delivery', 'bhw-freight'),
        ),
        array(
            'region' => esc_html__('Kalimantan & Sulawesi', 'bhw-freight'),
            'cities' => esc_html__('Banjarmasin, Samarinda, Makassar', 'bhw-freight'),
            'delivery' => esc_html__('2-4 day delivery', 'bhw-freight'),
        ),
        array(
            'region' => esc_html__('Eastern Indonesia', 'bhw-freight'),
            'cities' => esc_html__('Bali, Lombok, Papua', 'bhw-freight'),
            'delivery' => esc_html__('3-5 day delivery', 'bhw-freight'),
        ),
    );
}

/**
 * Get differentiators
 */
function bhw_get_differentiators() {
    return array(
        array(
            'icon' => '🗺️',
            'title' => esc_html__('Nationwide Coverage', 'bhw-freight'),
            'description' => esc_html__('Deliver anywhere in Indonesia—from major cities to remote areas with reliable service.', 'bhw-freight'),
        ),
        array(
            'icon' => '⏱️',
            'title' => esc_html__('On-Time Reliability', 'bhw-freight'),
            'description' => esc_html__('99.2% on-time delivery rate. We track every shipment in real-time for peace of mind.', 'bhw-freight'),
        ),
        array(
            'icon' => '💰',
            'title' => esc_html__('Competitive Pricing', 'bhw-freight'),
            'description' => esc_html__('Best rates without compromising quality. Transparent pricing with no hidden fees.', 'bhw-freight'),
        ),
        array(
            'icon' => '🎧',
            'title' => esc_html__('24/7 Customer Service', 'bhw-freight'),
            'description' => esc_html__('Responsive support via phone, WhatsApp, and email. We\'re here when you need us.', 'bhw-freight'),
        ),
    );
}

// ============================================
// CONTACT FORM 7 INTEGRATION
// ============================================

/**
 * Save CF7 submissions to custom post type
 */
add_action('wpcf7_mail_sent', 'bhw_save_quote_submission');

function bhw_save_quote_submission($contact_form) {
    // Only for quote form
    if ($contact_form->id() !== intval(get_option('bhw_quote_form_id', 0))) {
        return;
    }

    // Get submission data from CF7
    $submission = WPCF7_Submission::get_instance();

    if (!$submission) {
        return;
    }

    $posted_data = $submission->get_posted_data();

    // Create post data
    $post_data = array(
        'post_type' => 'bhw_quote',
        'post_status' => 'publish',
        'post_title' => isset($posted_data['your-name']) ? sanitize_text_field($posted_data['your-name']) : 'Quote Inquiry',
        'post_content' => wp_kses_post(
            'Name: ' . (isset($posted_data['your-name']) ? sanitize_text_field($posted_data['your-name']) : '') . "\n" .
            'Email: ' . (isset($posted_data['your-email']) ? sanitize_email($posted_data['your-email']) : '') . "\n" .
            'Phone: ' . (isset($posted_data['your-phone']) ? sanitize_text_field($posted_data['your-phone']) : '') . "\n" .
            'Service: ' . (isset($posted_data['your-service']) ? sanitize_text_field($posted_data['your-service']) : '') . "\n" .
            'Pickup: ' . (isset($posted_data['your-pickup']) ? sanitize_text_field($posted_data['your-pickup']) : '') . "\n" .
            'Destination: ' . (isset($posted_data['your-destination']) ? sanitize_text_field($posted_data['your-destination']) : '') . "\n"
        ),
    );

    // Insert post
    wp_insert_post($post_data);

    // Save meta data
    $post_id = wp_insert_post($post_data);

    if ($post_id) {
        update_post_meta($post_id, '_bhw_email', sanitize_email($posted_data['your-email'] ?? ''));
        update_post_meta($post_id, '_bhw_phone', sanitize_text_field($posted_data['your-phone'] ?? ''));
        update_post_meta($post_id, '_bhw_service', sanitize_text_field($posted_data['your-service'] ?? ''));
        update_post_meta($post_id, '_bhw_pickup', sanitize_text_field($posted_data['your-pickup'] ?? ''));
        update_post_meta($post_id, '_bhw_destination', sanitize_text_field($posted_data['your-destination'] ?? ''));
        update_post_meta($post_id, '_bhw_submission_date', current_time('mysql'));
    }
}

/**
 * Save newsletter subscriptions
 */
add_action('wpcf7_mail_sent', 'bhw_save_newsletter_subscription');

function bhw_save_newsletter_subscription($contact_form) {
    // Only for newsletter form
    if ($contact_form->id() !== intval(get_option('bhw_newsletter_form_id', 0))) {
        return;
    }

    $submission = WPCF7_Submission::get_instance();

    if (!$submission) {
        return;
    }

    $posted_data = $submission->get_posted_data();
    $email = isset($posted_data['newsletter-email']) ? sanitize_email($posted_data['newsletter-email']) : '';

    if (!is_email($email)) {
        return;
    }

    // Check if already subscribed
    $existing = new WP_Query(array(
        'post_type' => 'bhw_subscriber',
        'posts_per_page' => 1,
        's' => $email,
    ));

    if ($existing->found_posts > 0) {
        return; // Already subscribed
    }

    // Create subscriber post
    wp_insert_post(array(
        'post_type' => 'bhw_subscriber',
        'post_status' => 'publish',
        'post_title' => $email,
        'post_content' => 'Newsletter subscriber: ' . $email,
    ));
}

// ============================================
// CUSTOM COLUMNS FOR ADMIN
// ============================================

/**
 * Quote column
 */
add_filter('manage_bhw_quote_posts_columns', 'bhw_quote_columns');

function bhw_quote_columns($columns) {
    $columns = array(
        'cb' => $columns['cb'],
        'title' => esc_html__('Name', 'bhw-freight'),
        'email' => esc_html__('Email', 'bhw-freight'),
        'service' => esc_html__('Service', 'bhw-freight'),
        'date' => $columns['date'],
    );
    return $columns;
}

// ============================================
// DISABLE COMMENTS (Not needed for this site)
// ============================================

add_action('admin_menu', 'bhw_remove_comments');

function bhw_remove_comments() {
    remove_menu_page('edit-comments.php');
}

add_filter('theme_supports', 'bhw_disable_comment_support', 9, 3);

function bhw_disable_comment_support($supports, $feature, $args) {
    if ($feature === 'comments') {
        return false;
    }
    return $supports;
}
