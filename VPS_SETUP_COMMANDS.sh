#!/bin/bash
# BHW WordPress Setup Commands
# Run these on your VPS after git pull

echo "=========================================="
echo "BHW WordPress Theme Setup"
echo "=========================================="
echo ""

cd /home/bhw/public_html

echo "✅ Step 1: Verify theme files are in place"
if [ -f wp-content/themes/twentytwentyfour-child/functions.php ]; then
    echo "✓ Theme functions.php found"
else
    echo "✗ Theme functions.php NOT found - deployment may have failed"
    exit 1
fi

echo ""
echo "✅ Step 2: Activate the child theme"
wp theme activate twentytwentyfour-child

echo ""
echo "✅ Step 3: Verify theme is active"
wp theme status

echo ""
echo "✅ Step 4: Install essential plugins"
wp plugin install contact-form-7 --activate
wp plugin install wp-super-cache --activate
wp plugin install yoast-seo --activate
wp plugin install wordfence --activate
wp plugin install google-site-kit --activate

echo ""
echo "✅ Step 5: Verify plugins are installed"
wp plugin list | grep -E "(contact-form-7|wp-super-cache|yoast-seo|wordfence|google-site-kit)"

echo ""
echo "=========================================="
echo "WordPress Setup Complete!"
echo "=========================================="
echo ""
echo "Next Steps:"
echo "1. Go to: https://bhwlogistics.id/wp-admin/"
echo "2. Create Quote Form in Contact > Contact Forms"
echo "3. Create Newsletter Form in Contact > Contact Forms"
echo "4. Go to BHW Settings > Forms Setup"
echo "5. Select the forms you created"
echo ""
