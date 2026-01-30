#!/bin/bash
# Create Contact Form 7 Forms for BHW
# Run this on VPS after plugins are installed

cd /home/bhw/public_html

echo "Creating Contact Form 7 Forms..."
echo ""

# Create Quote Request Form
echo "📝 Creating Quote Request Form..."

wp post create --post_type=wpcf7_contact_form --post_title="Quote Request" --post_name="quote-request" --post_content='<div class="form-group">
  <label>Your Name (required)
    [text* your-name]</label>
</div>

<div class="form-group">
  <label>Email (required)
    [email* your-email]</label>
</div>

<div class="form-group">
  <label>Phone (required)
    [text* your-phone]</label>
</div>

<div class="form-group">
  <label>Service Type (required)
    [select* your-service "Full Truck Load (FTL)" "Less Than Truck Load (LTL)" "Specialized Freight" "Express Service"]</label>
</div>

<div class="form-group">
  <label>Pickup Location (required)
    [text* your-pickup]</label>
</div>

<div class="form-group">
  <label>Destination (required)
    [text* your-destination]</label>
</div>

[submit class:btn-primary "Get Quote Now"]' --porcelain

# Get the form ID
QUOTE_FORM_ID=$(wp post list --post_type=wpcf7_contact_form --name=quote-request --format=ids)
echo "✓ Quote Form created with ID: $QUOTE_FORM_ID"

# Save form ID to options
wp option add bhw_quote_form_id "$QUOTE_FORM_ID"

echo ""
echo "📝 Creating Newsletter Form..."

# Create Newsletter Form
wp post create --post_type=wpcf7_contact_form --post_title="Newsletter Signup" --post_name="newsletter-signup" --post_content='<div class="newsletter-input-group">
  <input type="email" name="newsletter-email" required placeholder="Enter your email">
  [submit class:btn-secondary "Subscribe"]
</div>' --porcelain

# Get the form ID
NEWSLETTER_FORM_ID=$(wp post list --post_type=wpcf7_contact_form --name=newsletter-signup --format=ids)
echo "✓ Newsletter Form created with ID: $NEWSLETTER_FORM_ID"

# Save form ID to options
wp option add bhw_newsletter_form_id "$NEWSLETTER_FORM_ID"

echo ""
echo "=========================================="
echo "✅ Contact Form 7 Forms Created!"
echo "=========================================="
echo ""
echo "Form IDs saved to WordPress options"
echo "Quote Form ID: $QUOTE_FORM_ID"
echo "Newsletter Form ID: $NEWSLETTER_FORM_ID"
echo ""
echo "Note: Mail settings may need to be configured manually:"
echo "Go to WordPress Admin > Contact > Contact Forms"
echo "Edit each form > Mail tab > Configure email settings"
echo ""
