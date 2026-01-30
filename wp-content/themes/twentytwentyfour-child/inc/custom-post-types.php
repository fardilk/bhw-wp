<?php
/**
 * Custom Post Types Registration Details
 *
 * @package BHW_Freight
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add meta boxes for quote submissions
 */
add_action('add_meta_boxes', 'bhw_quote_meta_boxes');

function bhw_quote_meta_boxes() {
    add_meta_box(
        'bhw_quote_details',
        esc_html__('Quote Details', 'bhw-freight'),
        'bhw_quote_meta_box_callback',
        'bhw_quote',
        'normal',
        'default'
    );
}

function bhw_quote_meta_box_callback($post) {
    $email = get_post_meta($post->ID, '_bhw_email', true);
    $phone = get_post_meta($post->ID, '_bhw_phone', true);
    $service = get_post_meta($post->ID, '_bhw_service', true);
    $pickup = get_post_meta($post->ID, '_bhw_pickup', true);
    $destination = get_post_meta($post->ID, '_bhw_destination', true);
    $submission_date = get_post_meta($post->ID, '_bhw_submission_date', true);
    ?>
    <table class="form-table">
        <tbody>
            <tr>
                <th scope="row"><label for="email"><?php esc_html_e('Email:', 'bhw-freight'); ?></label></th>
                <td><input type="email" id="email" name="bhw_email" value="<?php echo esc_attr($email); ?>" class="regular-text" readonly></td>
            </tr>
            <tr>
                <th scope="row"><label for="phone"><?php esc_html_e('Phone:', 'bhw-freight'); ?></label></th>
                <td><input type="text" id="phone" name="bhw_phone" value="<?php echo esc_attr($phone); ?>" class="regular-text" readonly></td>
            </tr>
            <tr>
                <th scope="row"><label for="service"><?php esc_html_e('Service Type:', 'bhw-freight'); ?></label></th>
                <td><input type="text" id="service" name="bhw_service" value="<?php echo esc_attr($service); ?>" class="regular-text" readonly></td>
            </tr>
            <tr>
                <th scope="row"><label for="pickup"><?php esc_html_e('Pickup Location:', 'bhw-freight'); ?></label></th>
                <td><input type="text" id="pickup" name="bhw_pickup" value="<?php echo esc_attr($pickup); ?>" class="regular-text" readonly></td>
            </tr>
            <tr>
                <th scope="row"><label for="destination"><?php esc_html_e('Destination:', 'bhw-freight'); ?></label></th>
                <td><input type="text" id="destination" name="bhw_destination" value="<?php echo esc_attr($destination); ?>" class="regular-text" readonly></td>
            </tr>
            <tr>
                <th scope="row"><label><?php esc_html_e('Submission Date:', 'bhw-freight'); ?></label></th>
                <td><?php echo esc_html($submission_date); ?></td>
            </tr>
        </tbody>
    </table>

    <div style="margin-top: 20px; padding: 15px; background: #f0f0f0; border-left: 4px solid #44B5A0;">
        <h4><?php esc_html_e('Quick Actions', 'bhw-freight'); ?></h4>
        <p>
            <a href="mailto:<?php echo esc_attr($email); ?>" class="button"><?php esc_html_e('Send Email', 'bhw-freight'); ?></a>
            <a href="https://wa.me/<?php echo esc_attr(preg_replace('/[^0-9]/', '', $phone)); ?>" target="_blank" class="button"><?php esc_html_e('Send WhatsApp', 'bhw-freight'); ?></a>
        </p>
    </div>
    <?php
}

/**
 * Admin columns for quotes
 */
add_filter('manage_bhw_quote_posts_columns', 'bhw_define_quote_columns');

function bhw_define_quote_columns($columns) {
    return array(
        'cb' => '<input type="checkbox" />',
        'title' => esc_html__('Name', 'bhw-freight'),
        'email' => esc_html__('Email', 'bhw-freight'),
        'phone' => esc_html__('Phone', 'bhw-freight'),
        'service' => esc_html__('Service', 'bhw-freight'),
        'pickup' => esc_html__('From', 'bhw-freight'),
        'destination' => esc_html__('To', 'bhw-freight'),
        'date' => esc_html__('Date', 'bhw-freight'),
    );
}

add_action('manage_bhw_quote_posts_custom_column', 'bhw_quote_column_content', 10, 2);

function bhw_quote_column_content($column, $post_id) {
    switch ($column) {
        case 'email':
            $email = get_post_meta($post_id, '_bhw_email', true);
            echo '<a href="mailto:' . esc_attr($email) . '">' . esc_html($email) . '</a>';
            break;
        case 'phone':
            $phone = get_post_meta($post_id, '_bhw_phone', true);
            echo esc_html($phone);
            break;
        case 'service':
            $service = get_post_meta($post_id, '_bhw_service', true);
            echo esc_html($service);
            break;
        case 'pickup':
            $pickup = get_post_meta($post_id, '_bhw_pickup', true);
            echo esc_html($pickup);
            break;
        case 'destination':
            $destination = get_post_meta($post_id, '_bhw_destination', true);
            echo esc_html($destination);
            break;
    }
}

/**
 * Make quote columns sortable
 */
add_filter('manage_edit-bhw_quote_sortable_columns', 'bhw_quote_sortable_columns');

function bhw_quote_sortable_columns($columns) {
    $columns['email'] = '_bhw_email';
    $columns['service'] = '_bhw_service';
    return $columns;
}

/**
 * Add export functionality
 */
add_action('admin_menu', 'bhw_add_export_menu');

function bhw_add_export_menu() {
    add_submenu_page(
        'edit.php?post_type=bhw_quote',
        esc_html__('Export Quotes', 'bhw-freight'),
        esc_html__('Export', 'bhw-freight'),
        'manage_posts',
        'bhw_export_quotes',
        'bhw_export_quotes_page'
    );
}

function bhw_export_quotes_page() {
    ?>
    <div class="wrap">
        <h1><?php esc_html_e('Export Quote Inquiries', 'bhw-freight'); ?></h1>
        <p><?php esc_html_e('Click the button below to download all quote inquiries as CSV', 'bhw-freight'); ?></p>
        <form method="post">
            <?php wp_nonce_field('bhw_export_nonce'); ?>
            <button type="submit" name="bhw_export_csv" class="button button-primary">
                <?php esc_html_e('Download CSV', 'bhw-freight'); ?>
            </button>
        </form>
    </div>
    <?php

    if (isset($_POST['bhw_export_csv']) && wp_verify_nonce($_POST['_wpnonce'], 'bhw_export_nonce')) {
        bhw_export_quotes_csv();
    }
}

function bhw_export_quotes_csv() {
    // Get all quote posts
    $quotes = new WP_Query(array(
        'post_type' => 'bhw_quote',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC',
    ));

    // Create CSV content
    $csv_content = "Date,Name,Email,Phone,Service,Pickup,Destination,Message\n";

    foreach ($quotes->posts as $quote) {
        $csv_content .= sprintf(
            '"%s","%s","%s","%s","%s","%s","%s","%s"' . "\n",
            esc_csv(get_post_meta($quote->ID, '_bhw_submission_date', true)),
            esc_csv($quote->post_title),
            esc_csv(get_post_meta($quote->ID, '_bhw_email', true)),
            esc_csv(get_post_meta($quote->ID, '_bhw_phone', true)),
            esc_csv(get_post_meta($quote->ID, '_bhw_service', true)),
            esc_csv(get_post_meta($quote->ID, '_bhw_pickup', true)),
            esc_csv(get_post_meta($quote->ID, '_bhw_destination', true)),
            esc_csv($quote->post_content)
        );
    }

    // Download file
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="bhw-quotes-' . date('Y-m-d') . '.csv"');
    echo $csv_content;
    exit;
}

/**
 * CSV escaping function
 */
function esc_csv($value) {
    if (strpos($value, ',') !== false || strpos($value, '"') !== false) {
        return '"' . str_replace('"', '""', $value) . '"';
    }
    return $value;
}
