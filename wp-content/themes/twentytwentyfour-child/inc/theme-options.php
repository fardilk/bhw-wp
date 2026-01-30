<?php
/**
 * Theme Options Admin Page
 *
 * @package BHW_Freight
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add theme options menu
 */
add_action('admin_menu', 'bhw_add_theme_menu');

function bhw_add_theme_menu() {
    add_menu_page(
        esc_html__('BHW Settings', 'bhw-freight'),
        esc_html__('BHW Settings', 'bhw-freight'),
        'manage_options',
        'bhw-settings',
        'bhw_settings_page',
        'dashicons-cog',
        100
    );

    add_submenu_page(
        'bhw-settings',
        esc_html__('Company Info', 'bhw-freight'),
        esc_html__('Company Info', 'bhw-freight'),
        'manage_options',
        'bhw-settings'
    );

    add_submenu_page(
        'bhw-settings',
        esc_html__('Homepage Content', 'bhw-freight'),
        esc_html__('Homepage Content', 'bhw-freight'),
        'manage_options',
        'bhw-homepage',
        'bhw_homepage_settings_page'
    );

    add_submenu_page(
        'bhw-settings',
        esc_html__('Forms Setup', 'bhw-freight'),
        esc_html__('Forms Setup', 'bhw-freight'),
        'manage_options',
        'bhw-forms',
        'bhw_forms_settings_page'
    );
}

/**
 * Company Info Settings Page
 */
function bhw_settings_page() {
    if (!current_user_can('manage_options')) {
        return;
    }

    // Save settings
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bhw_save_settings'])) {
        check_admin_referer('bhw_settings_nonce');

        bhw_update_option('company_name', sanitize_text_field($_POST['bhw_company_name'] ?? ''));
        bhw_update_option('phone', sanitize_text_field($_POST['bhw_phone'] ?? ''));
        bhw_update_option('email', sanitize_email($_POST['bhw_email'] ?? ''));
        bhw_update_option('whatsapp', sanitize_text_field($_POST['bhw_whatsapp'] ?? ''));

        echo '<div class="notice notice-success"><p>' . esc_html__('Settings saved successfully!', 'bhw-freight') . '</p></div>';
    }

    $company_name = bhw_get_option('company_name');
    $phone = bhw_get_option('phone');
    $email = bhw_get_option('email');
    $whatsapp = bhw_get_option('whatsapp');
    ?>
    <div class="wrap">
        <h1><?php esc_html_e('BHW Settings - Company Information', 'bhw-freight'); ?></h1>
        <form method="post">
            <?php wp_nonce_field('bhw_settings_nonce'); ?>
            <table class="form-table">
                <tbody>
                    <tr>
                        <th scope="row"><label for="company_name"><?php esc_html_e('Company Name:', 'bhw-freight'); ?></label></th>
                        <td>
                            <input type="text" id="company_name" name="bhw_company_name" value="<?php echo esc_attr($company_name); ?>" class="regular-text" required>
                            <p class="description"><?php esc_html_e('Your company name', 'bhw-freight'); ?></p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="phone"><?php esc_html_e('Phone Number:', 'bhw-freight'); ?></label></th>
                        <td>
                            <input type="tel" id="phone" name="bhw_phone" value="<?php echo esc_attr($phone); ?>" class="regular-text" required>
                            <p class="description"><?php esc_html_e('Primary contact number', 'bhw-freight'); ?></p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="email"><?php esc_html_e('Email Address:', 'bhw-freight'); ?></label></th>
                        <td>
                            <input type="email" id="email" name="bhw_email" value="<?php echo esc_attr($email); ?>" class="regular-text" required>
                            <p class="description"><?php esc_html_e('Contact email address', 'bhw-freight'); ?></p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="whatsapp"><?php esc_html_e('WhatsApp Number:', 'bhw-freight'); ?></label></th>
                        <td>
                            <input type="tel" id="whatsapp" name="bhw_whatsapp" value="<?php echo esc_attr($whatsapp); ?>" class="regular-text">
                            <p class="description"><?php esc_html_e('WhatsApp contact number (include country code)', 'bhw-freight'); ?></p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p class="submit">
                <button type="submit" name="bhw_save_settings" class="button button-primary">
                    <?php esc_html_e('Save Settings', 'bhw-freight'); ?>
                </button>
            </p>
        </form>
    </div>
    <?php
}

/**
 * Homepage Content Settings Page
 */
function bhw_homepage_settings_page() {
    if (!current_user_can('manage_options')) {
        return;
    }

    // Save settings
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bhw_save_homepage'])) {
        check_admin_referer('bhw_homepage_nonce');

        // Hero section
        bhw_update_option('hero_title', sanitize_text_field($_POST['bhw_hero_title'] ?? ''));
        bhw_update_option('hero_subtitle', sanitize_textarea_field($_POST['bhw_hero_subtitle'] ?? ''));

        // Statistics
        bhw_update_option('years', sanitize_text_field($_POST['bhw_years'] ?? ''));
        bhw_update_option('customers', sanitize_text_field($_POST['bhw_customers'] ?? ''));
        bhw_update_option('on_time_percent', sanitize_text_field($_POST['bhw_on_time'] ?? ''));
        bhw_update_option('shipments', sanitize_text_field($_POST['bhw_shipments'] ?? ''));

        echo '<div class="notice notice-success"><p>' . esc_html__('Homepage content updated!', 'bhw-freight') . '</p></div>';
    }

    $hero_title = bhw_get_option('hero_title');
    $hero_subtitle = bhw_get_option('hero_subtitle');
    $years = bhw_get_option('years');
    $customers = bhw_get_option('customers');
    $on_time = bhw_get_option('on_time_percent');
    $shipments = bhw_get_option('shipments');
    ?>
    <div class="wrap">
        <h1><?php esc_html_e('BHW Settings - Homepage Content', 'bhw-freight'); ?></h1>
        <form method="post">
            <?php wp_nonce_field('bhw_homepage_nonce'); ?>

            <h2><?php esc_html_e('Hero Section', 'bhw-freight'); ?></h2>
            <table class="form-table">
                <tbody>
                    <tr>
                        <th scope="row"><label for="hero_title"><?php esc_html_e('Hero Title:', 'bhw-freight'); ?></label></th>
                        <td>
                            <input type="text" id="hero_title" name="bhw_hero_title" value="<?php echo esc_attr($hero_title); ?>" class="large-text" required>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="hero_subtitle"><?php esc_html_e('Hero Subtitle:', 'bhw-freight'); ?></label></th>
                        <td>
                            <textarea id="hero_subtitle" name="bhw_hero_subtitle" rows="3" class="large-text"><?php echo esc_textarea($hero_subtitle); ?></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>

            <h2><?php esc_html_e('Statistics', 'bhw-freight'); ?></h2>
            <table class="form-table">
                <tbody>
                    <tr>
                        <th scope="row"><label for="years"><?php esc_html_e('Years Serving:', 'bhw-freight'); ?></label></th>
                        <td><input type="text" id="years" name="bhw_years" value="<?php echo esc_attr($years); ?>" class="small-text" placeholder="10+"></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="customers"><?php esc_html_e('Trusted Businesses:', 'bhw-freight'); ?></label></th>
                        <td><input type="text" id="customers" name="bhw_customers" value="<?php echo esc_attr($customers); ?>" class="small-text" placeholder="500+"></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="on_time"><?php esc_html_e('On-Time Delivery %:', 'bhw-freight'); ?></label></th>
                        <td><input type="text" id="on_time" name="bhw_on_time" value="<?php echo esc_attr($on_time); ?>" class="small-text" placeholder="99.2%"></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="shipments"><?php esc_html_e('Shipments Completed:', 'bhw-freight'); ?></label></th>
                        <td><input type="text" id="shipments" name="bhw_shipments" value="<?php echo esc_attr($shipments); ?>" class="small-text" placeholder="50K+"></td>
                    </tr>
                </tbody>
            </table>

            <p class="submit">
                <button type="submit" name="bhw_save_homepage" class="button button-primary">
                    <?php esc_html_e('Save Content', 'bhw-freight'); ?>
                </button>
            </p>
        </form>
    </div>
    <?php
}

/**
 * Forms Setup Page
 */
function bhw_forms_settings_page() {
    if (!current_user_can('manage_options')) {
        return;
    }

    // Check if Contact Form 7 is installed
    if (!function_exists('wpcf7')) {
        echo '<div class="notice notice-error"><p>';
        esc_html_e('Contact Form 7 plugin is required. Please install and activate it.', 'bhw-freight');
        echo '</p></div>';
        return;
    }

    // Save form IDs
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bhw_save_forms'])) {
        check_admin_referer('bhw_forms_nonce');

        update_option('bhw_quote_form_id', intval($_POST['bhw_quote_form_id'] ?? 0));
        update_option('bhw_newsletter_form_id', intval($_POST['bhw_newsletter_form_id'] ?? 0));

        echo '<div class="notice notice-success"><p>' . esc_html__('Forms configured successfully!', 'bhw-freight') . '</p></div>';
    }

    // Get all Contact Form 7 forms
    $args = array(
        'post_type' => 'wpcf7_contact_form',
        'posts_per_page' => -1,
    );
    $forms = new WP_Query($args);

    $quote_form_id = intval(get_option('bhw_quote_form_id', 0));
    $newsletter_form_id = intval(get_option('bhw_newsletter_form_id', 0));
    ?>
    <div class="wrap">
        <h1><?php esc_html_e('BHW Settings - Forms Configuration', 'bhw-freight'); ?></h1>
        <p><?php esc_html_e('Select which Contact Form 7 forms to use for quotes and newsletter:', 'bhw-freight'); ?></p>

        <form method="post">
            <?php wp_nonce_field('bhw_forms_nonce'); ?>
            <table class="form-table">
                <tbody>
                    <tr>
                        <th scope="row"><label for="quote_form"><?php esc_html_e('Quote Form:', 'bhw-freight'); ?></label></th>
                        <td>
                            <select id="quote_form" name="bhw_quote_form_id">
                                <option value="0"><?php esc_html_e('- Select Form -', 'bhw-freight'); ?></option>
                                <?php
                                if ($forms->have_posts()) {
                                    while ($forms->have_posts()) {
                                        $forms->the_post();
                                        $form_id = get_the_ID();
                                        echo '<option value="' . esc_attr($form_id) . '" ' . selected($quote_form_id, $form_id) . '>';
                                        echo esc_html(get_the_title());
                                        echo ' (ID: ' . esc_html($form_id) . ')</option>';
                                    }
                                    wp_reset_postdata();
                                }
                                ?>
                            </select>
                            <p class="description">
                                <?php esc_html_e('Select the Contact Form 7 form to use for quote requests. It should have these fields: your-name, your-email, your-phone, your-service, your-pickup, your-destination', 'bhw-freight'); ?>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="newsletter_form"><?php esc_html_e('Newsletter Form:', 'bhw-freight'); ?></label></th>
                        <td>
                            <select id="newsletter_form" name="bhw_newsletter_form_id">
                                <option value="0"><?php esc_html_e('- Select Form -', 'bhw-freight'); ?></option>
                                <?php
                                $forms = new WP_Query($args); // Re-query for second select
                                if ($forms->have_posts()) {
                                    while ($forms->have_posts()) {
                                        $forms->the_post();
                                        $form_id = get_the_ID();
                                        echo '<option value="' . esc_attr($form_id) . '" ' . selected($newsletter_form_id, $form_id) . '>';
                                        echo esc_html(get_the_title());
                                        echo ' (ID: ' . esc_html($form_id) . ')</option>';
                                    }
                                    wp_reset_postdata();
                                }
                                ?>
                            </select>
                            <p class="description">
                                <?php esc_html_e('Select the Contact Form 7 form to use for newsletter signup. It should have a newsletter-email field.', 'bhw-freight'); ?>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p class="submit">
                <button type="submit" name="bhw_save_forms" class="button button-primary">
                    <?php esc_html_e('Save Form Configuration', 'bhw-freight'); ?>
                </button>
            </p>
        </form>

        <div style="margin-top: 30px; padding: 20px; background: #f0f0f0; border-left: 4px solid #44B5A0;">
            <h3><?php esc_html_e('Need help?', 'bhw-freight'); ?></h3>
            <p><?php esc_html_e('If you don\'t see your forms, you need to create them first:', 'bhw-freight'); ?></p>
            <ol>
                <li><?php esc_html_e('Go to Contact Form 7 > Add New', 'bhw-freight'); ?></li>
                <li><?php esc_html_e('Create the quote form with the required fields', 'bhw-freight'); ?></li>
                <li><?php esc_html_e('Come back here and select it from the dropdown', 'bhw-freight'); ?></li>
            </ol>
        </div>
    </div>
    <?php
}
