<?php
/**
 * Newsletter Section Template Part
 *
 * @package BHW_Freight
 * @since 1.0.0
 */

$newsletter_form_id = intval(get_option('bhw_newsletter_form_id', 0));
?>

<section class="newsletter-section">
    <div class="container">
        <div class="newsletter-content">
            <div class="newsletter-text">
                <h2><?php esc_html_e('Stay Connected', 'bhw-freight'); ?></h2>
                <p><?php esc_html_e('Subscribe to our newsletter for logistics insights, industry updates, and exclusive offers for your business.', 'bhw-freight'); ?></p>
            </div>

            <div class="newsletter-form">
                <?php
                if ($newsletter_form_id > 0) {
                    echo do_shortcode('[contact-form-7 id="' . intval($newsletter_form_id) . '"]');
                } else {
                    echo '<p>' . esc_html__('Newsletter form not configured', 'bhw-freight') . '</p>';
                }
                ?>
            </div>
        </div>
    </div>
</section>
