<?php
/**
 * Header Template
 *
 * @package BHW_Freight
 * @since 1.0.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <!-- Header Navigation -->
    <header class="header">
        <div class="container">
            <div class="header-content">
                <!-- Logo -->
                <div class="logo">
                    <img src="<?php echo esc_url(BHW_FREIGHT_URL . '/images/logo.svg'); ?>" alt="<?php bloginfo('name'); ?>" class="logo-image">
                    <span class="logo-text"><?php bloginfo('name'); ?></span>
                </div>

                <!-- Desktop Navigation -->
                <nav class="nav-desktop">
                    <a href="#services" class="nav-link"><?php esc_html_e('Services', 'bhw-freight'); ?></a>
                    <a href="#why-choose-us" class="nav-link"><?php esc_html_e('Why Us', 'bhw-freight'); ?></a>
                    <a href="#quote" class="nav-link"><?php esc_html_e('Get Quote', 'bhw-freight'); ?></a>
                    <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', bhw_get_option('phone', ''))); ?>" class="nav-link nav-phone">
                        📞 <?php echo esc_html(bhw_get_option('phone', '')); ?>
                    </a>
                </nav>

                <!-- Hamburger Menu -->
                <button class="hamburger" id="hamburger" aria-label="<?php esc_attr_e('Menu', 'bhw-freight'); ?>">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <nav class="mobile-menu" id="mobile-menu">
            <a href="#services" class="mobile-menu-link"><?php esc_html_e('Services', 'bhw-freight'); ?></a>
            <a href="#why-choose-us" class="mobile-menu-link"><?php esc_html_e('Why Us', 'bhw-freight'); ?></a>
            <a href="#quote" class="mobile-menu-link"><?php esc_html_e('Get Quote', 'bhw-freight'); ?></a>
            <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', bhw_get_option('phone', ''))); ?>" class="mobile-menu-link">
                📞 <?php esc_html_e('Call Us', 'bhw-freight'); ?>
            </a>
            <a href="<?php echo esc_url('https://wa.me/' . preg_replace('/[^0-9+]/', '', bhw_get_option('whatsapp', ''))); ?>" class="mobile-menu-link" target="_blank" rel="noopener noreferrer">
                💬 <?php esc_html_e('WhatsApp', 'bhw-freight'); ?>
            </a>
        </nav>
    </header>

    <!-- Floating CTA Button (Mobile) -->
    <button class="floating-cta" id="floating-quote-btn" aria-label="<?php esc_attr_e('Get Quote', 'bhw-freight'); ?>">
        <?php esc_html_e('Get Quote', 'bhw-freight'); ?>
    </button>
