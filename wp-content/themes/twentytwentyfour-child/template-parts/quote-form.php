<?php
/**
 * Quote Form Section Template Part
 *
 * @package BHW_Freight
 * @since 1.0.0
 */

$phone = bhw_get_option('phone', '');
$email = bhw_get_option('email', '');
$whatsapp = bhw_get_option('whatsapp', '');
$quote_form_id = intval(get_option('bhw_quote_form_id', 0));
?>

<section class="cta-section" id="quote">
    <div class="container">
        <div class="cta-header">
            <h2 class="section-title"><?php esc_html_e('Ready to Ship Your Freight?', 'bhw-freight'); ?></h2>
            <p class="section-subtitle"><?php esc_html_e('Get a quote in 3 minutes. No hidden fees.', 'bhw-freight'); ?></p>
        </div>

        <div class="cta-form-wrapper">
            <!-- Contact Form 7 Form -->
            <div class="quote-form">
                <?php
                if ($quote_form_id > 0) {
                    echo do_shortcode('[contact-form-7 id="' . intval($quote_form_id) . '"]');
                } else {
                    echo '<div class="notice notice-warning">';
                    esc_html_e('Quote form not configured. Please set it up in BHW Settings > Forms Setup', 'bhw-freight');
                    echo '</div>';
                }
                ?>
            </div>

            <!-- Alternative Contact Methods -->
            <div class="alternative-contact">
                <p><strong><?php esc_html_e('Or contact us directly:', 'bhw-freight'); ?></strong></p>
                <div class="contact-methods">
                    <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>" class="contact-method">
                        <span class="contact-icon">📞</span>
                        <div>
                            <span class="contact-label"><?php esc_html_e('Phone', 'bhw-freight'); ?></span>
                            <span class="contact-value"><?php echo esc_html($phone); ?></span>
                        </div>
                    </a>
                    <a href="mailto:<?php echo esc_attr($email); ?>" class="contact-method">
                        <span class="contact-icon">📧</span>
                        <div>
                            <span class="contact-label"><?php esc_html_e('Email', 'bhw-freight'); ?></span>
                            <span class="contact-value"><?php echo esc_html($email); ?></span>
                        </div>
                    </a>
                    <a href="<?php echo esc_url('https://wa.me/' . preg_replace('/[^0-9+]/', '', $whatsapp)); ?>" class="contact-method" target="_blank" rel="noopener noreferrer">
                        <span class="contact-icon">💬</span>
                        <div>
                            <span class="contact-label"><?php esc_html_e('WhatsApp', 'bhw-freight'); ?></span>
                            <span class="contact-value"><?php echo esc_html($whatsapp); ?></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
