<?php
/**
 * BHW Freight Services - Main Template
 */

get_header(); ?>

    <!-- Component 1: Hero Banner -->
    <section class="hero-banner">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title">Fast Freight Delivery Across Indonesia</h1>
            <p class="hero-subtitle">Reliable service from Sumatra to Papua. We handle FTL, LTL, specialized, and express shipments.</p>
            <div class="hero-cta-group">
                <button class="btn-primary" onclick="scrollToQuote()">Get Quote Now</button>
                <a href="https://wa.me/628123456789" class="btn-secondary" target="_blank">Track Shipment</a>
            </div>
            <p class="trust-indicator">✓ Trusted by 500+ Indonesian businesses</p>
        </div>
        <div class="hero-image" style="background-image: url('https://images.unsplash.com/photo-1493514789560-586822b216c1?w=1920&h=1080&fit=crop');"></div>
    </section>

    <!-- Component 2: Our Services -->
    <section class="services" id="services">
        <div class="container">
            <h2 class="section-title">Our Services</h2>
            <p class="section-subtitle">Comprehensive freight solutions for every need</p>

            <div class="service-grid">
                <div class="service-card">
                    <div class="service-icon">
                        <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="64" height="64" rx="12" fill="#E8F5F3"/>
                            <path d="M20 32H44M28 24V40M36 24V40M44 24V40" stroke="#44B5A0" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <h3>Full Truck Load (FTL)</h3>
                    <p>Complete vehicles for larger shipments. Most economical for bulk freight across Indonesia.</p>
                    <a href="#quote" class="learn-more">Request Quote →</a>
                </div>

                <div class="service-card">
                    <div class="service-icon">
                        <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="64" height="64" rx="12" fill="#E8F5F3"/>
                            <path d="M20 40H44L40 20H24L20 40Z" stroke="#44B5A0" stroke-width="2" stroke-linejoin="round"/>
                            <circle cx="28" cy="44" r="2" fill="#44B5A0"/>
                            <circle cx="36" cy="44" r="2" fill="#44B5A0"/>
                        </svg>
                    </div>
                    <h3>Less Than Truck Load (LTL)</h3>
                    <p>Flexible solutions for smaller shipments. Cost-effective for partial loads and time-sensitive deliveries.</p>
                    <a href="#quote" class="learn-more">Request Quote →</a>
                </div>

                <div class="service-card">
                    <div class="service-icon">
                        <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="64" height="64" rx="12" fill="#E8F5F3"/>
                            <path d="M24 20V32H40V20M24 32H40L44 44H20L24 32Z" stroke="#44B5A0" stroke-width="2" stroke-linejoin="round"/>
                            <circle cx="28" cy="48" r="2" fill="#44B5A0"/>
                            <circle cx="36" cy="48" r="2" fill="#44B5A0"/>
                        </svg>
                    </div>
                    <h3>Specialized Freight</h3>
                    <p>Hazmat, refrigerated, oversized cargo. Expert handling of sensitive and complex shipments.</p>
                    <a href="#quote" class="learn-more">Request Quote →</a>
                </div>

                <div class="service-card">
                    <div class="service-icon">
                        <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="64" height="64" rx="12" fill="#E8F5F3"/>
                            <path d="M20 28L32 20L44 28V44H20V28Z" stroke="#44B5A0" stroke-width="2" stroke-linejoin="round"/>
                            <path d="M32 20V32" stroke="#44B5A0" stroke-width="2" stroke-linecap="round"/>
                            <path d="M44 28L44 44" stroke="#44B5A0" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <h3>Express Service</h3>
                    <p>Urgent shipments with priority handling. Faster delivery times for time-critical cargo.</p>
                    <a href="#quote" class="learn-more">Request Quote →</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Component 3: Why Choose Us -->
    <section class="why-choose-us" id="why-choose-us">
        <div class="container">
            <h2 class="section-title">Why Choose BHW?</h2>

            <!-- Stats Box -->
            <div class="stats-box">
                <div class="stat">
                    <span class="stat-number">10+</span>
                    <span class="stat-label">Years Serving Indonesia</span>
                </div>
                <div class="stat">
                    <span class="stat-number">500+</span>
                    <span class="stat-label">Trusted Businesses</span>
                </div>
                <div class="stat">
                    <span class="stat-number">99.2%</span>
                    <span class="stat-label">On-Time Delivery</span>
                </div>
                <div class="stat">
                    <span class="stat-number">50K+</span>
                    <span class="stat-label">Shipments Completed</span>
                </div>
            </div>

            <!-- Differentiators -->
            <div class="differentiators-grid">
                <div class="differentiator">
                    <div class="differentiator-icon">🗺️</div>
                    <h3>Nationwide Coverage</h3>
                    <p>Deliver anywhere in Indonesia—from major cities to remote areas with reliable service.</p>
                </div>

                <div class="differentiator">
                    <div class="differentiator-icon">⏱️</div>
                    <h3>On-Time Reliability</h3>
                    <p>99.2% on-time delivery rate. We track every shipment in real-time for peace of mind.</p>
                </div>

                <div class="differentiator">
                    <div class="differentiator-icon">💰</div>
                    <h3>Competitive Pricing</h3>
                    <p>Best rates without compromising quality. Transparent pricing with no hidden fees.</p>
                </div>

                <div class="differentiator">
                    <div class="differentiator-icon">🎧</div>
                    <h3>24/7 Customer Service</h3>
                    <p>Responsive support via phone, WhatsApp, and email. We're here when you need us.</p>
                </div>
            </div>

            <!-- Coverage Map Section -->
            <div class="coverage-section">
                <h3>We Deliver Across Indonesia</h3>
                <div class="coverage-list">
                    <div class="coverage-item">
                        <span class="checkmark">✓</span>
                        <div>
                            <strong>Java</strong>
                            <p>Jakarta, Bandung, Surabaya, Yogyakarta • Next-day delivery</p>
                        </div>
                    </div>
                    <div class="coverage-item">
                        <span class="checkmark">✓</span>
                        <div>
                            <strong>Sumatra</strong>
                            <p>Medan, Palembang, Bandar Lampung • 2-3 day delivery</p>
                        </div>
                    </div>
                    <div class="coverage-item">
                        <span class="checkmark">✓</span>
                        <div>
                            <strong>Kalimantan & Sulawesi</strong>
                            <p>Banjarmasin, Samarinda, Makassar • 2-4 day delivery</p>
                        </div>
                    </div>
                    <div class="coverage-item">
                        <span class="checkmark">✓</span>
                        <div>
                            <strong>Eastern Indonesia</strong>
                            <p>Bali, Lombok, Papua • 3-5 day delivery</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Component 4: Call to Action / Get Quote -->
    <section class="cta-section" id="quote">
        <div class="container">
            <div class="cta-header">
                <h2 class="section-title">Ready to Ship Your Freight?</h2>
                <p class="section-subtitle">Get a quote in 3 minutes. No hidden fees.</p>
            </div>

            <div class="cta-form-wrapper">
                <!-- Contact Form 7 Shortcode will be inserted here -->
                <?php
                if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
                    wpcf7_enqueue_scripts();
                    wpcf7_print_form( get_option( 'bhw_quote_form_id', '' ) );
                } else {
                    echo do_shortcode( '[contact-form-7 id="' . get_option( 'bhw_quote_form_id', '' ) . '"]' );
                }
                ?>

                <!-- Fallback form if CF7 not available -->
                <?php if ( ! function_exists( 'wpcf7_enqueue_scripts' ) ) { ?>
                    <form id="quote-form" class="quote-form">
                        <div class="form-group">
                            <label for="name">Full Name *</label>
                            <input type="text" id="name" name="name" required placeholder="Your name">
                        </div>

                        <div class="form-group">
                            <label for="email">Email Address *</label>
                            <input type="email" id="email" name="email" required placeholder="your@email.com">
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone Number *</label>
                            <input type="tel" id="phone" name="phone" required placeholder="+62 812 3456 789">
                        </div>

                        <div class="form-group">
                            <label for="service">Service Type *</label>
                            <select id="service" name="service" required>
                                <option value="">Select Service</option>
                                <option value="ftl">Full Truck Load (FTL)</option>
                                <option value="ltl">Less Than Truck Load (LTL)</option>
                                <option value="specialized">Specialized Freight</option>
                                <option value="express">Express Service</option>
                            </select>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="pickup">Pickup Location *</label>
                                <input type="text" id="pickup" name="pickup" placeholder="e.g., Jakarta" required>
                            </div>

                            <div class="form-group">
                                <label for="destination">Destination *</label>
                                <input type="text" id="destination" name="destination" placeholder="e.g., Surabaya" required>
                            </div>
                        </div>

                        <button type="submit" class="btn-primary btn-large">Get Quote Now</button>

                        <p class="form-notice">We respond within 1 hour during business hours (Mon-Fri, 8 AM - 6 PM WIB)</p>
                    </form>
                <?php } ?>

                <!-- Alternative Contact Methods -->
                <div class="alternative-contact">
                    <p><strong>Or contact us directly:</strong></p>
                    <div class="contact-methods">
                        <a href="tel:+62211234567" class="contact-method">
                            <span class="contact-icon">📞</span>
                            <div>
                                <span class="contact-label">Phone</span>
                                <span class="contact-value">+62 21 1234 5678</span>
                            </div>
                        </a>
                        <a href="mailto:quotes@bhw.co.id" class="contact-method">
                            <span class="contact-icon">📧</span>
                            <div>
                                <span class="contact-label">Email</span>
                                <span class="contact-value">quotes@bhw.co.id</span>
                            </div>
                        </a>
                        <a href="https://wa.me/628123456789" class="contact-method" target="_blank">
                            <span class="contact-icon">💬</span>
                            <div>
                                <span class="contact-label">WhatsApp</span>
                                <span class="contact-value">+62 812 3456 789</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Component 5: Newsletter / Stay Connected -->
    <section class="newsletter-section">
        <div class="container">
            <div class="newsletter-content">
                <div class="newsletter-text">
                    <h2>Stay Connected</h2>
                    <p>Subscribe to our newsletter for logistics insights, industry updates, and exclusive offers for your business.</p>
                </div>

                <!-- Contact Form 7 Newsletter Form -->
                <?php
                if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
                    wpcf7_enqueue_scripts();
                    wpcf7_print_form( get_option( 'bhw_newsletter_form_id', '' ) );
                } else {
                    echo do_shortcode( '[contact-form-7 id="' . get_option( 'bhw_newsletter_form_id', '' ) . '"]' );
                }
                ?>

                <!-- Fallback form if CF7 not available -->
                <?php if ( ! function_exists( 'wpcf7_enqueue_scripts' ) ) { ?>
                    <form id="newsletter-form" class="newsletter-form">
                        <div class="newsletter-input-group">
                            <input
                                type="email"
                                id="newsletter-email"
                                name="email"
                                placeholder="Enter your email address"
                                required
                            >
                            <button type="submit" class="btn-secondary">Subscribe</button>
                        </div>
                        <p class="newsletter-privacy">
                            We respect your privacy. Unsubscribe anytime.
                        </p>
                    </form>
                <?php } ?>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
