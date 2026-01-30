<?php
/**
 * Front Page / Homepage Template
 *
 * @package BHW_Freight
 * @since 1.0.0
 */

get_header();
?>

<!-- Hero Banner Section -->
<?php get_template_part('template-parts/hero-banner'); ?>

<!-- Our Services Section -->
<?php get_template_part('template-parts/services'); ?>

<!-- Why Choose Us Section -->
<?php get_template_part('template-parts/why-choose-us'); ?>

<!-- Quote Form Section -->
<?php get_template_part('template-parts/quote-form'); ?>

<!-- Newsletter Section -->
<?php get_template_part('template-parts/newsletter'); ?>

<?php
get_footer();
