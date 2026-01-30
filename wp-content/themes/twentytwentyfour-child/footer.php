<?php
/**
 * Footer Template
 *
 * @package BHW_Freight
 * @since 1.0.0
 */

$company_name = bhw_get_option('company_name', 'BHW Freight Services');
$company_phone = bhw_get_option('phone', '');
$company_email = bhw_get_option('email', '');
$company_whatsapp = bhw_get_option('whatsapp', '');
?>

<footer class="footer">
    <div class="container">
        <div class="footer-grid">
            <!-- Company Info -->
            <div class="footer-column">
                <div class="footer-logo">
                    <img src="<?php echo esc_url(BHW_FREIGHT_URL . '/images/logo.svg'); ?>" alt="<?php echo esc_attr($company_name); ?>" class="footer-logo-image">
                    <span><?php echo esc_html($company_name); ?></span>
                </div>
                <p class="footer-tagline"><?php esc_html_e('Fast Freight Delivery Across Indonesia', 'bhw-freight'); ?></p>
                <div class="social-links">
                    <a href="#" aria-label="<?php esc_attr_e('Facebook', 'bhw-freight'); ?>" class="social-link">f</a>
                    <a href="#" aria-label="<?php esc_attr_e('Instagram', 'bhw-freight'); ?>" class="social-link">📷</a>
                    <a href="#" aria-label="<?php esc_attr_e('LinkedIn', 'bhw-freight'); ?>" class="social-link">in</a>
                </div>
            </div>

            <!-- Services Links -->
            <div class="footer-column">
                <h3><?php esc_html_e('Services', 'bhw-freight'); ?></h3>
                <ul>
                    <li><a href="#services"><?php esc_html_e('Full Truck Load', 'bhw-freight'); ?></a></li>
                    <li><a href="#services"><?php esc_html_e('Less Than Truck Load', 'bhw-freight'); ?></a></li>
                    <li><a href="#services"><?php esc_html_e('Specialized Freight', 'bhw-freight'); ?></a></li>
                    <li><a href="#services"><?php esc_html_e('Express Service', 'bhw-freight'); ?></a></li>
                </ul>
            </div>

            <!-- Company Links -->
            <div class="footer-column">
                <h3><?php esc_html_e('Company', 'bhw-freight'); ?></h3>
                <ul>
                    <li><a href="#why-choose-us"><?php esc_html_e('About Us', 'bhw-freight'); ?></a></li>
                    <li><a href="#why-choose-us"><?php esc_html_e('Coverage Areas', 'bhw-freight'); ?></a></li>
                    <li><a href="#quote"><?php esc_html_e('Contact', 'bhw-freight'); ?></a></li>
                    <li><a href="#"><?php esc_html_e('Careers', 'bhw-freight'); ?></a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="footer-column">
                <h3><?php esc_html_e('Contact Us', 'bhw-freight'); ?></h3>
                <ul class="contact-list">
                    <li>
                        <strong><?php esc_html_e('Phone:', 'bhw-freight'); ?></strong><br>
                        <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $company_phone)); ?>"><?php echo esc_html($company_phone); ?></a>
                    </li>
                    <li>
                        <strong><?php esc_html_e('Email:', 'bhw-freight'); ?></strong><br>
                        <a href="mailto:<?php echo esc_attr($company_email); ?>"><?php echo esc_html($company_email); ?></a>
                    </li>
                    <li>
                        <strong><?php esc_html_e('WhatsApp:', 'bhw-freight'); ?></strong><br>
                        <a href="<?php echo esc_url('https://wa.me/' . preg_replace('/[^0-9+]/', '', $company_whatsapp)); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html($company_whatsapp); ?></a>
                    </li>
                    <li>
                        <strong><?php esc_html_e('Hours:', 'bhw-freight'); ?></strong><br>
                        <?php esc_html_e('Mon-Fri: 8 AM - 6 PM WIB', 'bhw-freight'); ?>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <p>&copy; <?php echo date_i18n('Y'); ?> <?php echo esc_html($company_name); ?>. <?php esc_html_e('All rights reserved.', 'bhw-freight'); ?></p>
            <div class="footer-legal">
                <a href="#"><?php esc_html_e('Privacy Policy', 'bhw-freight'); ?></a>
                <span>|</span>
                <a href="#"><?php esc_html_e('Terms of Service', 'bhw-freight'); ?></a>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
