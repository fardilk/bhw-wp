<?php
/**
 * Services Section Template Part
 *
 * @package BHW_Freight
 * @since 1.0.0
 */

$services = bhw_get_services();
?>

<section class="services" id="services">
    <div class="container">
        <h2 class="section-title"><?php esc_html_e('Our Services', 'bhw-freight'); ?></h2>
        <p class="section-subtitle"><?php esc_html_e('Comprehensive freight solutions for every need', 'bhw-freight'); ?></p>

        <div class="service-grid">
            <?php foreach ($services as $service) : ?>
                <div class="service-card">
                    <div class="service-icon">
                        <?php
                        // Simple SVG icons for each service type
                        switch ($service['id']) {
                            case 'ftl':
                                echo '<svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="64" height="64" rx="12" fill="#E8F5F3"/>
                                    <path d="M20 32H44M28 24V40M36 24V40M44 24V40" stroke="#44B5A0" stroke-width="2" stroke-linecap="round"/>
                                </svg>';
                                break;
                            case 'ltl':
                                echo '<svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="64" height="64" rx="12" fill="#E8F5F3"/>
                                    <path d="M20 40H44L40 20H24L20 40Z" stroke="#44B5A0" stroke-width="2" stroke-linejoin="round"/>
                                    <circle cx="28" cy="44" r="2.5" fill="#44B5A0"/>
                                    <circle cx="36" cy="44" r="2.5" fill="#44B5A0"/>
                                </svg>';
                                break;
                            case 'specialized':
                                echo '<svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="64" height="64" rx="12" fill="#E8F5F3"/>
                                    <path d="M24 20V32H40V20M24 32H40L44 44H20L24 32Z" stroke="#44B5A0" stroke-width="2" stroke-linejoin="round"/>
                                    <circle cx="28" cy="48" r="2" fill="#44B5A0"/>
                                    <circle cx="36" cy="48" r="2" fill="#44B5A0"/>
                                </svg>';
                                break;
                            case 'express':
                                echo '<svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="64" height="64" rx="12" fill="#E8F5F3"/>
                                    <path d="M20 28L32 20L44 28V44H20V28Z" stroke="#44B5A0" stroke-width="2" stroke-linejoin="round"/>
                                    <path d="M32 20V32" stroke="#44B5A0" stroke-width="2" stroke-linecap="round"/>
                                    <path d="M44 28L44 44" stroke="#44B5A0" stroke-width="2" stroke-linecap="round"/>
                                </svg>';
                                break;
                        }
                        ?>
                    </div>
                    <h3><?php echo esc_html($service['name']); ?></h3>
                    <p><?php echo esc_html($service['description']); ?></p>
                    <a href="#quote" class="learn-more"><?php esc_html_e('Request Quote →', 'bhw-freight'); ?></a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
