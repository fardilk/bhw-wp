<?php
/**
 * BHW Freight Services - Footer Template
 */
?>

    <!-- Floating CTA Button (Mobile) -->
    <button class="floating-cta" id="floating-quote-btn" onclick="scrollToQuote()" aria-label="Get Quote">
        Get Quote
    </button>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <!-- Company Info -->
                <div class="footer-column">
                    <div class="footer-logo">
                        <?php
                        if ( has_custom_logo() ) {
                            the_custom_logo();
                        } else {
                            echo '<img src="' . esc_url( get_template_directory_uri() . '/assets/images/logo.png' ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '" class="footer-logo-image">';
                        }
                        ?>
                        <span><?php bloginfo( 'name' ); ?></span>
                    </div>
                    <p class="footer-tagline">Fast Freight Delivery Across Indonesia</p>
                    <div class="social-links">
                        <a href="#" aria-label="Facebook" class="social-link">f</a>
                        <a href="#" aria-label="Instagram" class="social-link">📷</a>
                        <a href="#" aria-label="LinkedIn" class="social-link">in</a>
                    </div>
                </div>

                <!-- Services -->
                <div class="footer-column">
                    <h3>Services</h3>
                    <ul>
                        <li><a href="#services">Full Truck Load</a></li>
                        <li><a href="#services">Less Than Truck Load</a></li>
                        <li><a href="#services">Specialized Freight</a></li>
                        <li><a href="#services">Express Service</a></li>
                    </ul>
                </div>

                <!-- Company -->
                <div class="footer-column">
                    <h3>Company</h3>
                    <ul>
                        <li><a href="#why-choose-us">About Us</a></li>
                        <li><a href="#why-choose-us">Coverage Areas</a></li>
                        <li><a href="#quote">Contact</a></li>
                        <li><a href="#">Careers</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div class="footer-column">
                    <h3>Contact Us</h3>
                    <ul class="contact-list">
                        <li>
                            <strong>Phone:</strong><br>
                            <a href="tel:+62211234567">+62 21 1234 5678</a>
                        </li>
                        <li>
                            <strong>Email:</strong><br>
                            <a href="mailto:info@bhw.co.id">info@bhw.co.id</a>
                        </li>
                        <li>
                            <strong>WhatsApp:</strong><br>
                            <a href="https://wa.me/628123456789">+62 812 3456 789</a>
                        </li>
                        <li>
                            <strong>Hours:</strong><br>
                            Mon-Fri: 8 AM - 6 PM WIB
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <p>&copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.</p>
                <div class="footer-legal">
                    <a href="#">Privacy Policy</a>
                    <span>|</span>
                    <a href="#">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>
