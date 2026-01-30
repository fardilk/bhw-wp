<?php
/**
 * Why Choose Us Section Template Part
 *
 * @package BHW_Freight
 * @since 1.0.0
 */

$stats = bhw_get_statistics();
$differentiators = bhw_get_differentiators();
$coverage = bhw_get_coverage_regions();
?>

<section class="why-choose-us" id="why-choose-us">
    <div class="container">
        <h2 class="section-title"><?php esc_html_e('Why Choose BHW?', 'bhw-freight'); ?></h2>

        <!-- Statistics Box -->
        <div class="stats-box">
            <?php foreach ($stats as $stat) : ?>
                <div class="stat">
                    <span class="stat-number"><?php echo esc_html($stat['number']); ?></span>
                    <span class="stat-label"><?php echo esc_html($stat['label']); ?></span>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Differentiators -->
        <div class="differentiators-grid">
            <?php foreach ($differentiators as $diff) : ?>
                <div class="differentiator">
                    <div class="differentiator-icon"><?php echo $diff['icon']; // Icons are emojis, safe ?></div>
                    <h3><?php echo esc_html($diff['title']); ?></h3>
                    <p><?php echo esc_html($diff['description']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Coverage Map Section -->
        <div class="coverage-section">
            <h3><?php esc_html_e('We Deliver Across Indonesia', 'bhw-freight'); ?></h3>
            <div class="coverage-list">
                <?php foreach ($coverage as $region) : ?>
                    <div class="coverage-item">
                        <span class="checkmark">✓</span>
                        <div>
                            <strong><?php echo esc_html($region['region']); ?></strong>
                            <p><?php echo esc_html($region['cities'] . ' • ' . $region['delivery']); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
