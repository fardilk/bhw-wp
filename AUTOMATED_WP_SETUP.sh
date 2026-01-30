#!/bin/bash
# Automated WordPress Setup for BHW Theme
# This script will:
# 1. Activate theme
# 2. Install plugins
# 3. Create Contact Forms
# 4. Set WordPress options

set -e

cd /home/bhw/public_html

echo "╔════════════════════════════════════════════╗"
echo "  BHW WordPress Automated Setup"
echo "╚════════════════════════════════════════════╝"
echo ""

# ============================================
# STEP 1: Verify files
# ============================================

echo "📍 Step 1: Verifying theme files..."

if [ ! -f wp-content/themes/twentytwentyfour-child/functions.php ]; then
    echo "❌ Error: Theme files not found!"
    echo "   Run: ssh bhw-vps 'cd /home/bhw/public_html && git pull origin main'"
    exit 1
fi

echo "✓ Theme files verified"
echo ""

# ============================================
# STEP 2: Activate theme
# ============================================

echo "📍 Step 2: Activating BHW theme..."
wp theme activate twentytwentyfour-child --allow-root

echo "✓ Theme activated"
echo ""

# ============================================
# STEP 3: Install plugins
# ============================================

echo "📍 Step 3: Installing and activating plugins..."
echo "   (This may take 1-2 minutes)"
echo ""

wp plugin install contact-form-7 --activate --allow-root
echo "   ✓ Contact Form 7 installed"

wp plugin install wp-super-cache --activate --allow-root
echo "   ✓ WP Super Cache installed"

wp plugin install wordpress-seo --activate --allow-root
echo "   ✓ Yoast SEO installed"

wp plugin install wordfence --activate --allow-root
echo "   ✓ Wordfence installed"

wp plugin install google-site-kit --activate --allow-root
echo "   ✓ Google Site Kit installed"

echo ""

# ============================================
# STEP 4: Set default WordPress options
# ============================================

echo "📍 Step 4: Setting default options..."

# Company information
wp option update bhw_company_name "BHW Freight Services" --allow-root
wp option update bhw_phone "+62 21 1234 5678" --allow-root
wp option update bhw_email "quotes@bhw.co.id" --allow-root
wp option update bhw_whatsapp "+62 812 3456 789" --allow-root

# Hero section
wp option update bhw_hero_title "Fast Freight Delivery Across Indonesia" --allow-root
wp option update bhw_hero_subtitle "Reliable service from Sumatra to Papua. We handle FTL, LTL, specialized, and express shipments." --allow-root

# Statistics
wp option update bhw_years "10+" --allow-root
wp option update bhw_customers "500+" --allow-root
wp option update bhw_on_time_percent "99.2%" --allow-root
wp option update bhw_shipments "50K+" --allow-root

echo "✓ Default options set"
echo ""

# ============================================
# STEP 5: Create Contact Forms
# ============================================

echo "📍 Step 5: Creating Contact Form 7 forms..."
echo ""

# Check if Contact Form 7 is active
if ! wp plugin is-active contact-form-7 --allow-root; then
    echo "⚠️  Contact Form 7 is not active. Activating now..."
    wp plugin activate contact-form-7 --allow-root
fi

echo "   Creating Quote Request form..."

# Create quote form
QUOTE_POST=$(wp post create \
    --post_type=wpcf7_contact_form \
    --post_title="Quote Request" \
    --post_name="quote-request" \
    --post_content='<div class="form-group">
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

[submit class:btn-primary "Get Quote Now"]' \
    --porcelain --allow-root)

QUOTE_FORM_ID=$(echo $QUOTE_POST | awk '{print $NF}')

# Save form ID
wp option update bhw_quote_form_id "$QUOTE_FORM_ID" --allow-root

# Configure mail
wp post meta update "$QUOTE_FORM_ID" "_mail" "{\"subject\":\"New Quote Request from [your-name]\",\"sender\":\"[your-email]\",\"body\":\"New quote inquiry received:\\n\\nName: [your-name]\\nEmail: [your-email]\\nPhone: [your-phone]\\nService: [your-service]\\nPickup: [your-pickup]\\nDestination: [your-destination]\\n\\n---\\nSubmitted via BHW Website\"}" --allow-root

echo "   ✓ Quote Request form created (ID: $QUOTE_FORM_ID)"
echo ""

echo "   Creating Newsletter form..."

# Create newsletter form
NEWSLETTER_POST=$(wp post create \
    --post_type=wpcf7_contact_form \
    --post_title="Newsletter Signup" \
    --post_name="newsletter-signup" \
    --post_content='<div class="newsletter-input-group">
  <input type="email" name="newsletter-email" required placeholder="Enter your email">
  [submit class:btn-secondary "Subscribe"]
</div>' \
    --porcelain --allow-root)

NEWSLETTER_FORM_ID=$(echo $NEWSLETTER_POST | awk '{print $NF}')

# Save form ID
wp option update bhw_newsletter_form_id "$NEWSLETTER_FORM_ID" --allow-root

# Configure mail
wp post meta update "$NEWSLETTER_FORM_ID" "_mail" "{\"subject\":\"New Newsletter Subscriber\",\"sender\":\"[newsletter-email]\",\"body\":\"New subscriber: [newsletter-email]\"}" --allow-root

echo "   ✓ Newsletter form created (ID: $NEWSLETTER_FORM_ID)"
echo ""

# ============================================
# STEP 6: Verify setup
# ============================================

echo "📍 Step 6: Verifying setup..."
echo ""

echo "   Theme status:"
wp theme status --allow-root | grep -A 1 "twentytwentyfour-child" || echo "   Theme status check (may show in active)"

echo ""
echo "   Installed plugins:"
wp plugin list --allow-root | grep -E "(contact-form-7|wp-super-cache|wordpress-seo|wordfence|google-site-kit)" | grep "active" | wc -l
echo "   plugins activated"

echo ""
echo "   Contact Forms:"
echo "   - Quote Form ID: $QUOTE_FORM_ID"
echo "   - Newsletter Form ID: $NEWSLETTER_FORM_ID"

echo ""

# ============================================
# COMPLETION
# ============================================

echo "╔════════════════════════════════════════════╗"
echo "  ✅ SETUP COMPLETE!"
echo "╚════════════════════════════════════════════╝"
echo ""
echo "Your WordPress site is ready! 🎉"
echo ""
echo "Next steps:"
echo ""
echo "1. Visit WordPress admin:"
echo "   https://bhwlogistics.id/wp-admin/"
echo ""
echo "2. Configure email notifications:"
echo "   Contact > Contact Forms > Quote Request > Mail tab"
echo "   Update the email address to your own"
echo ""
echo "3. Update your company information:"
echo "   BHW Settings > Company Info"
echo "   (Default values have been set, but you should update them)"
echo ""
echo "4. Test the forms:"
echo "   https://bhwlogistics.id/"
echo "   Try filling out the quote form"
echo ""
echo "5. Check submissions:"
echo "   WordPress Admin > Quote Inquiries (should see test quote)"
echo ""
echo "Questions? Check the documentation:"
echo "   /home/bhw/public_html/WORDPRESS_ADMIN_SETUP.md"
echo ""
