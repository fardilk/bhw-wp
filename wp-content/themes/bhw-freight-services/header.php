<?php
/**
 * BHW Freight Services - Header Template
 */
?>
<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo( 'description' ); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <!-- Header / Navigation -->
    <header class="header">
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <?php
                    if ( has_custom_logo() ) {
                        the_custom_logo();
                    } else {
                        echo '<img src="' . esc_url( get_template_directory_uri() . '/assets/images/logo.png' ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '" class="logo-image">';
                    }
                    ?>
                    <span class="logo-text"><?php bloginfo( 'name' ); ?></span>
                </div>

                <nav class="nav-desktop">
                    <a href="#services" class="nav-link">Services</a>
                    <a href="#why-choose-us" class="nav-link">Why Us</a>
                    <a href="#quote" class="nav-link">Get Quote</a>
                    <a href="tel:+62211234567" class="nav-link nav-phone">📞 +62 21 1234 5678</a>
                </nav>

                <button class="hamburger" id="hamburger" aria-label="Menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <nav class="mobile-menu" id="mobile-menu">
            <a href="#services" class="mobile-menu-link">Services</a>
            <a href="#why-choose-us" class="mobile-menu-link">Why Us</a>
            <a href="#quote" class="mobile-menu-link">Get Quote</a>
            <a href="tel:+62211234567" class="mobile-menu-link">📞 Call Us</a>
            <a href="https://wa.me/628123456789" class="mobile-menu-link" target="_blank">💬 WhatsApp</a>
        </nav>
    </header>
