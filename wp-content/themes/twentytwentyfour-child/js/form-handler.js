// Form Handler - Quote Form and Newsletter Validation & Submission

document.addEventListener('DOMContentLoaded', function() {
    initQuoteForm();
    initNewsletterForm();
});

// ============================================
// QUOTE FORM
// ============================================

function initQuoteForm() {
    const quoteForm = document.getElementById('quote-form');
    if (!quoteForm) return;

    quoteForm.addEventListener('submit', handleQuoteFormSubmit);

    // Add real-time validation
    const inputs = quoteForm.querySelectorAll('input, select');
    inputs.forEach(input => {
        input.addEventListener('blur', () => validateField(input));
        input.addEventListener('change', () => validateField(input));
    });
}

function validateField(field) {
    const value = field.value.trim();
    const fieldType = field.type;
    const fieldName = field.name;
    const isRequired = field.hasAttribute('required');

    // Check if empty and required
    if (isRequired && !value) {
        setFieldError(field, 'This field is required');
        return false;
    }

    // Validate email
    if (fieldType === 'email' && value) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(value)) {
            setFieldError(field, 'Please enter a valid email address');
            return false;
        }
    }

    // Validate phone
    if (fieldName === 'phone' && value) {
        const phoneRegex = /^[\d\s\-\+\(\)]+$/;
        if (!phoneRegex.test(value) || value.replace(/\D/g, '').length < 10) {
            setFieldError(field, 'Please enter a valid phone number');
            return false;
        }
    }

    // If valid, clear error
    clearFieldError(field);
    return true;
}

function setFieldError(field, message) {
    field.classList.add('input-error');
    field.setAttribute('aria-invalid', 'true');

    // Remove existing error message
    const existingError = field.nextElementSibling;
    if (existingError && existingError.classList.contains('field-error')) {
        existingError.remove();
    }

    // Add error message
    const errorDiv = document.createElement('div');
    errorDiv.className = 'field-error';
    errorDiv.textContent = message;
    errorDiv.style.color = 'var(--color-error)';
    errorDiv.style.fontSize = 'var(--font-size-sm)';
    errorDiv.style.marginTop = 'var(--spacing-2)';
    field.parentNode.insertBefore(errorDiv, field.nextSibling);
}

function clearFieldError(field) {
    field.classList.remove('input-error');
    field.setAttribute('aria-invalid', 'false');

    // Remove error message
    const existingError = field.nextElementSibling;
    if (existingError && existingError.classList.contains('field-error')) {
        existingError.remove();
    }
}

function handleQuoteFormSubmit(e) {
    e.preventDefault();

    const form = e.target;
    const submitBtn = form.querySelector('button[type="submit"]');
    const inputs = form.querySelectorAll('input[required], select[required]');

    // Validate all required fields
    let isValid = true;
    inputs.forEach(input => {
        if (!validateField(input)) {
            isValid = false;
        }
    });

    if (!isValid) {
        showFormNotification(form, 'Please correct the errors above', 'error');
        return;
    }

    // Show loading state
    const originalText = submitBtn.textContent;
    submitBtn.disabled = true;
    submitBtn.textContent = 'Sending...';

    // Get form data
    const formData = new FormData(form);
    const data = {
        name: formData.get('name'),
        email: formData.get('email'),
        phone: formData.get('phone'),
        service: formData.get('service'),
        pickup: formData.get('pickup'),
        destination: formData.get('destination'),
        timestamp: new Date().toISOString(),
        source: 'landing-page'
    };

    // Attempt to submit via API (if backend is available)
    submitQuoteForm(data)
        .then(response => {
            // Show success message
            showFormNotification(form, '✓ Quote request received! We\'ll contact you within 1 hour.', 'success');

            // Clear form
            form.reset();

            // Reset button
            submitBtn.disabled = false;
            submitBtn.textContent = originalText;

            // Track in analytics
            if (typeof gtag === 'function') {
                gtag('event', 'quote_form_submit', {
                    'service_type': data.service,
                    'from_location': data.pickup,
                    'to_location': data.destination
                });
            }

            // Scroll to success message
            setTimeout(() => {
                const notification = form.querySelector('.form-notification');
                if (notification) {
                    notification.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                }
            }, 100);
        })
        .catch(error => {
            console.error('Form submission error:', error);

            // Show error message
            showFormNotification(form, 'Error sending quote request. Please try again or contact us directly.', 'error');

            // Reset button
            submitBtn.disabled = false;
            submitBtn.textContent = originalText;
        });
}

function submitQuoteForm(data) {
    // Option 1: Try to submit via API endpoint
    // Uncomment and adjust URL when backend is ready
    /*
    return fetch('/api/quote', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data)
    }).then(response => {
        if (!response.ok) throw new Error('API error');
        return response.json();
    });
    */

    // Option 2: Submit via FormSubmit.co (free service for static sites)
    // This is a fallback for when no backend is available
    return new Promise((resolve, reject) => {
        // For now, we'll simulate a successful submission
        // In production, replace with actual API call or form service
        setTimeout(() => {
            // Log data to console for testing
            console.log('Quote form data:', data);

            // Save to localStorage for testing (remove in production)
            const submissions = JSON.parse(localStorage.getItem('quoteSubmissions') || '[]');
            submissions.push(data);
            localStorage.setItem('quoteSubmissions', JSON.stringify(submissions));

            resolve({ success: true });
        }, 1500);
    });
}

function showFormNotification(form, message, type) {
    // Remove existing notification
    const existingNotification = form.querySelector('.form-notification');
    if (existingNotification) {
        existingNotification.remove();
    }

    // Create notification
    const notification = document.createElement('div');
    notification.className = 'form-notification';
    notification.setAttribute('role', 'alert');

    // Style based on type
    const bgColor = type === 'success' ? 'rgba(76, 175, 80, 0.1)' : 'rgba(244, 67, 54, 0.1)';
    const borderColor = type === 'success' ? 'var(--color-success)' : 'var(--color-error)';
    const textColor = type === 'success' ? 'var(--color-success)' : 'var(--color-error)';

    notification.style.cssText = `
        padding: var(--spacing-4);
        margin-bottom: var(--spacing-6);
        background-color: ${bgColor};
        border-left: 4px solid ${borderColor};
        border-radius: var(--radius-md);
        color: ${textColor};
        font-weight: 500;
        animation: slideDown 0.3s ease-out;
    `;

    notification.textContent = message;

    // Insert at top of form
    form.insertBefore(notification, form.firstChild);

    // Auto-remove after 5 seconds (success only)
    if (type === 'success') {
        setTimeout(() => {
            notification.style.animation = 'slideUp 0.3s ease-out';
            setTimeout(() => notification.remove(), 300);
        }, 5000);
    }
}

// ============================================
// NEWSLETTER FORM
// ============================================

function initNewsletterForm() {
    const newsletterForm = document.getElementById('newsletter-form');
    if (!newsletterForm) return;

    newsletterForm.addEventListener('submit', handleNewsletterSubmit);
}

function handleNewsletterSubmit(e) {
    e.preventDefault();

    const form = e.target;
    const emailInput = form.querySelector('input[type="email"]');
    const submitBtn = form.querySelector('button[type="submit"]');
    const email = emailInput.value.trim();

    // Validate email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        showNewsletterNotification(form, 'Please enter a valid email address', 'error');
        return;
    }

    // Show loading state
    const originalText = submitBtn.textContent;
    submitBtn.disabled = true;
    submitBtn.textContent = 'Subscribing...';

    // Submit newsletter signup
    submitNewsletter(email)
        .then(response => {
            showNewsletterNotification(form, '✓ Successfully subscribed! Check your email.', 'success');
            emailInput.value = '';
            submitBtn.disabled = false;
            submitBtn.textContent = originalText;

            // Track in analytics
            if (typeof gtag === 'function') {
                gtag('event', 'newsletter_signup', {
                    'email_domain': email.split('@')[1]
                });
            }
        })
        .catch(error => {
            console.error('Newsletter submission error:', error);
            showNewsletterNotification(form, 'Error subscribing. Please try again.', 'error');
            submitBtn.disabled = false;
            submitBtn.textContent = originalText;
        });
}

function submitNewsletter(email) {
    return new Promise((resolve, reject) => {
        // For now, simulate submission
        // In production, connect to email service (Mailchimp, ConvertKit, etc.)
        setTimeout(() => {
            console.log('Newsletter signup:', email);

            // Save to localStorage for testing
            const subscribers = JSON.parse(localStorage.getItem('subscribers') || '[]');
            if (!subscribers.includes(email)) {
                subscribers.push(email);
                localStorage.setItem('subscribers', JSON.stringify(subscribers));
            }

            resolve({ success: true });
        }, 1000);
    });
}

function showNewsletterNotification(form, message, type) {
    // Remove existing notification
    const existingNotification = form.querySelector('.newsletter-notification');
    if (existingNotification) {
        existingNotification.remove();
    }

    // Create notification
    const notification = document.createElement('div');
    notification.className = 'newsletter-notification';
    notification.setAttribute('role', 'alert');

    // Style based on type
    const bgColor = type === 'success' ? 'rgba(255, 255, 255, 0.2)' : 'rgba(255, 255, 255, 0.2)';
    const textColor = type === 'success' ? 'rgba(255, 255, 255, 1)' : 'rgba(255, 255, 255, 0.9)';

    notification.style.cssText = `
        padding: var(--spacing-3);
        margin-top: var(--spacing-3);
        background-color: ${bgColor};
        border-radius: var(--radius-md);
        color: ${textColor};
        font-size: var(--font-size-sm);
        text-align: center;
        animation: slideDown 0.3s ease-out;
    `;

    notification.textContent = message;

    // Insert after form
    form.appendChild(notification);

    // Auto-remove after 5 seconds
    setTimeout(() => {
        notification.style.animation = 'slideUp 0.3s ease-out';
        setTimeout(() => notification.remove(), 300);
    }, 5000);
}

// ============================================
// ANIMATIONS
// ============================================

// Add CSS animations for notifications
const style = document.createElement('style');
style.textContent = `
    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideUp {
        from {
            opacity: 1;
            transform: translateY(0);
        }
        to {
            opacity: 0;
            transform: translateY(-10px);
        }
    }

    .input-error {
        border-color: var(--color-error) !important;
        background-color: rgba(244, 67, 54, 0.05) !important;
    }

    .field-error {
        display: block;
    }
`;
document.head.appendChild(style);

// ============================================
// EXPORT FUNCTIONS (for external use)
// ============================================

window.validateQuoteForm = function() {
    const form = document.getElementById('quote-form');
    if (!form) return false;
    const inputs = form.querySelectorAll('input[required], select[required]');
    let isValid = true;
    inputs.forEach(input => {
        if (!validateField(input)) {
            isValid = false;
        }
    });
    return isValid;
};

window.submitQuote = function() {
    const form = document.getElementById('quote-form');
    if (form) {
        form.dispatchEvent(new Event('submit'));
    }
};
