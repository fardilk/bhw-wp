<?php
/**
 * Hero Banner Template Part
 *
 * @package BHW_Freight
 * @since 1.0.0
 */

$hero = bhw_get_hero_content();
$company_phone = bhw_get_option('phone', '');
$company_whatsapp = bhw_get_option('whatsapp', '');
?>

<section class="hero-banner">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1 class="hero-title"><?php echo esc_html($hero['title']); ?></h1>
        <p class="hero-subtitle"><?php echo esc_html($hero['subtitle']); ?></p>

        <div class="hero-cta-group">
            <button class="btn-primary" onclick="document.getElementById('quote').scrollIntoView({behavior: 'smooth'});">
                <?php esc_html_e('Get Quote Now', 'bhw-freight'); ?>
            </button>
            <a href="<?php echo esc_url('https://wa.me/' . preg_replace('/[^0-9+]/', '', $company_whatsapp)); ?>" class="btn-secondary" target="_blank" rel="noopener noreferrer">
                <?php esc_html_e('Track Shipment', 'bhw-freight'); ?>
            </a>
        </div>

        <p class="trust-indicator">
            ✓ <?php esc_html_e('Trusted by 500+ Indonesian businesses', 'bhw-freight'); ?>
        </p>
    </div>
    <div class="hero-image" style="background-image: url('https://images.unsplash.com/photo-1493514789560-586822b216c1?w=1920&h=1080&fit=crop');"></div>
</section>
