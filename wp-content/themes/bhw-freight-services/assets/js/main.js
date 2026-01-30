// Main JavaScript - Core Functionality

document.addEventListener('DOMContentLoaded', function() {
    initMobileMenu();
    initFloatingCTA();
    initSmoothScroll();
});

// ============================================
// MOBILE MENU
// ============================================

function initMobileMenu() {
    const hamburger = document.getElementById('hamburger');
    const mobileMenu = document.getElementById('mobile-menu');

    if (!hamburger || !mobileMenu) return;

    // Toggle menu
    hamburger.addEventListener('click', function() {
        const isActive = mobileMenu.classList.contains('active');
        if (isActive) {
            closeMobileMenu();
        } else {
            openMobileMenu();
        }
    });

    // Close menu when link is clicked
    const mobileMenuLinks = mobileMenu.querySelectorAll('.mobile-menu-link');
    mobileMenuLinks.forEach(link => {
        link.addEventListener('click', closeMobileMenu);
    });

    // Close menu when clicking outside
    document.addEventListener('click', function(event) {
        const isClickInsideMenu = mobileMenu.contains(event.target);
        const isClickOnHamburger = hamburger.contains(event.target);

        if (!isClickInsideMenu && !isClickOnHamburger && mobileMenu.classList.contains('active')) {
            closeMobileMenu();
        }
    });
}

function openMobileMenu() {
    const hamburger = document.getElementById('hamburger');
    const mobileMenu = document.getElementById('mobile-menu');

    if (hamburger && mobileMenu) {
        mobileMenu.classList.add('active');
        hamburger.classList.add('active');
        document.body.style.overflow = 'hidden';
    }
}

function closeMobileMenu() {
    const hamburger = document.getElementById('hamburger');
    const mobileMenu = document.getElementById('mobile-menu');

    if (hamburger && mobileMenu) {
        mobileMenu.classList.remove('active');
        hamburger.classList.remove('active');
        document.body.style.overflow = '';
    }
}

// ============================================
// FLOATING CTA BUTTON
// ============================================

function initFloatingCTA() {
    const floatingBtn = document.getElementById('floating-quote-btn');
    if (!floatingBtn) return;

    // Show/hide floating button based on scroll position
    window.addEventListener('scroll', () => {
        const quoteSection = document.getElementById('quote');
        if (!quoteSection) return;

        const quoteRect = quoteSection.getBoundingClientRect();
        const isQuoteInViewport = quoteRect.top < window.innerHeight && quoteRect.bottom > 0;

        if (isQuoteInViewport) {
            floatingBtn.classList.remove('active');
        } else {
            floatingBtn.classList.add('active');
        }
    });

    // Add click handler
    floatingBtn.addEventListener('click', scrollToQuote);
}

function scrollToQuote() {
    const quoteSection = document.getElementById('quote');
    if (quoteSection) {
        quoteSection.scrollIntoView({ behavior: 'smooth' });
    }
}

// ============================================
// SMOOTH SCROLL
// ============================================

function initSmoothScroll() {
    // Get all anchor links
    const links = document.querySelectorAll('a[href^="#"]');

    links.forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');

            // Skip if it's just a hash or empty
            if (href === '#') return;

            const targetElement = document.querySelector(href);

            if (targetElement) {
                e.preventDefault();

                // Close mobile menu if open
                closeMobileMenu();

                // Scroll to element
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });

                // Update URL without page jump
                window.history.pushState(null, null, href);
            }
        });
    });

    // Handle initial hash on page load
    const hash = window.location.hash;
    if (hash) {
        setTimeout(() => {
            const targetElement = document.querySelector(hash);
            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        }, 100);
    }
}

// ============================================
// ACTIVE NAV LINK HIGHLIGHTING
// ============================================

function updateActiveNavLink() {
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-link, .mobile-menu-link');

    window.addEventListener('scroll', () => {
        let current = '';

        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;

            if (pageYOffset >= sectionTop - 200) {
                current = section.getAttribute('id');
            }
        });

        navLinks.forEach(link => {
            link.classList.remove('active');
            const href = link.getAttribute('href');
            if (href === `#${current}`) {
                link.classList.add('active');
            }
        });
    });
}

// Initialize on page load
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', updateActiveNavLink);
} else {
    updateActiveNavLink();
}

// ============================================
// UTILITY FUNCTIONS
// ============================================

/**
 * Check if element is in viewport
 */
function isInViewport(element) {
    const rect = element.getBoundingClientRect();
    return (
        rect.top <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.left <= (window.innerWidth || document.documentElement.clientWidth)
    );
}

/**
 * Debounce function for performance
 */
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

/**
 * Get URL parameters
 */
function getUrlParameter(name) {
    name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
    const regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
    const results = regex.exec(location.search);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
}

/**
 * Scroll to top
 */
function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

// ============================================
// INTERSECTION OBSERVER FOR ANIMATIONS
// ============================================

function initIntersectionObserver() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observe all cards and elements with animate class
    const elementsToObserve = document.querySelectorAll('.service-card, .differentiator, .stat, .coverage-item');
    elementsToObserve.forEach(element => {
        observer.observe(element);
    });
}

// Initialize intersection observer when DOM is ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initIntersectionObserver);
} else {
    initIntersectionObserver();
}

// ============================================
// PAGE PERFORMANCE
// ============================================

// Log page load time
window.addEventListener('load', function() {
    if (window.performance && window.performance.timing) {
        const perfData = window.performance.timing;
        const pageLoadTime = perfData.loadEventEnd - perfData.navigationStart;
        console.log('Page load time: ' + pageLoadTime + 'ms');
    }
});

// ============================================
// ANALYTICS TRACKING (Optional)
// ============================================

/**
 * Track button clicks
 */
function trackButtonClick(buttonElement, eventName) {
    if (!buttonElement) return;

    buttonElement.addEventListener('click', function() {
        if (typeof gtag === 'function') {
            gtag('event', eventName || 'button_click', {
                'button_text': this.textContent,
                'button_class': this.className
            });
        }
    });
}

/**
 * Track form submission
 */
function trackFormSubmission(formElement, formName) {
    if (!formElement) return;

    formElement.addEventListener('submit', function(e) {
        if (typeof gtag === 'function') {
            gtag('event', 'form_submit', {
                'form_name': formName || this.id,
                'form_fields': this.querySelectorAll('input, select').length
            });
        }
    });
}
