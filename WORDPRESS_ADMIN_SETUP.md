# WordPress Admin Setup Guide

After deployment, follow these steps to configure your WordPress admin panel:

## 🔑 Login to WordPress Admin

1. Visit: `https://bhwlogistics.id/wp-admin/`
2. Login with your WordPress credentials

---

## ✅ Step 1: Activate the BHW Theme

1. Go to: **Appearance > Themes**
2. Find: **BHW Freight Services** (the child theme)
3. Click: **Activate**

**Expected Result:** Theme is now active, site should display new design

---

## ✅ Step 2: Install Required Plugins

These commands should already be run on VPS, but verify they're installed:

1. Go to: **Plugins > Installed Plugins**
2. Look for these plugins (should all be installed):
   - Contact Form 7
   - WP Super Cache
   - Yoast SEO
   - Wordfence
   - Google Site Kit

**If any are missing:** Go to **Plugins > Add New**, search, install, and activate.

---

## ✅ Step 3: Create Contact Form 7 Forms

### Form 1: Quote Request Form

1. Go to: **Contact > Contact Forms**
2. Click: **Add New**
3. **Form Title:** `Quote Request`
4. **Form Code:** Copy and paste this:

```html
<div class="form-group">
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

[submit class:btn-primary "Get Quote Now"]
```

5. Click: **Save**
6. You'll see **Form ID: [number]** - **COPY THIS NUMBER**

### Form 1 Email Configuration

1. Click on the form again to edit
2. Go to: **Mail** tab
3. **To:** Your email address (e.g., quotes@bhw.co.id)
4. **Subject:** `New Quote Request from [your-name]`
5. **Message:** Copy and paste:

```
New quote inquiry received:

Name: [your-name]
Email: [your-email]
Phone: [your-phone]
Service: [your-service]
Pickup Location: [your-pickup]
Destination: [your-destination]

---
Submitted via BHW Freight Website
```

6. Click: **Save**

---

### Form 2: Newsletter Form

1. Go to: **Contact > Contact Forms**
2. Click: **Add New**
3. **Form Title:** `Newsletter Signup`
4. **Form Code:** Copy and paste:

```html
<div class="newsletter-input-group">
  <input type="email" name="newsletter-email" required placeholder="Enter your email">
  [submit class:btn-secondary "Subscribe"]
</div>
```

5. Click: **Save**
6. **COPY THE FORM ID**

### Form 2 Email Configuration

1. Click on the form to edit
2. Go to: **Mail** tab
3. **To:** Your email address
4. **Subject:** `New Newsletter Subscriber`
5. **Message:**

```
New newsletter subscriber

Email: [newsletter-email]

---
Subscribed from BHW Freight Website
```

6. Click: **Save**

---

## ✅ Step 4: Configure BHW Settings

Now that forms are created, configure them in the BHW Settings:

### BHW Settings > Company Info

1. Go to: **WordPress Admin > BHW Settings > Company Info**
2. Update the following:
   - **Company Name:** BHW Freight Services
   - **Phone Number:** Your phone (e.g., +62 21 1234 5678)
   - **Email Address:** Your email (e.g., quotes@bhw.co.id)
   - **WhatsApp Number:** Your WhatsApp (e.g., +62 812 3456 789)
3. Click: **Save Settings**

### BHW Settings > Homepage Content

1. Go to: **BHW Settings > Homepage Content**
2. Update the following:

**Hero Section:**
- **Hero Title:** (Update if needed) "Fast Freight Delivery Across Indonesia"
- **Hero Subtitle:** (Update if needed) "Reliable service from Sumatra to Papua..."

**Statistics:**
- **Years Serving:** 10+
- **Trusted Businesses:** 500+
- **On-Time Delivery %:** 99.2%
- **Shipments Completed:** 50K+

3. Click: **Save Content**

### BHW Settings > Forms Setup

**This is the most important step!**

1. Go to: **BHW Settings > Forms Setup**
2. **Quote Form:** Select the "Quote Request" form from the dropdown
3. **Newsletter Form:** Select the "Newsletter Signup" form from the dropdown
4. Click: **Save Form Configuration**

**Expected Result:** Both forms should now work on the website

---

## 🧪 Step 5: Test Everything

### Test the Quote Form

1. Visit: `https://bhwlogistics.id/`
2. Scroll to the quote section
3. Fill out and submit the quote form
4. **Check:**
   - Does the form validate?
   - Do you get a success message?
   - Do you receive an email?
   - Does the submission appear in WordPress Admin > Quote Inquiries?

### Test the Newsletter

1. Go back to website
2. Scroll to newsletter section
3. Submit an email
4. **Check:**
   - Do you receive an email confirmation?
   - Does the subscriber appear in WordPress Admin > Newsletter Subscribers?

### Test Mobile Menu

1. Open website on mobile (or use DevTools to simulate)
2. Check hamburger menu works
3. Check floating CTA button appears

### Test Admin Panel

1. Go to: **WordPress Admin > Quote Inquiries**
   - You should see your test quote submission
   - Click it to see all details

2. Go to: **WordPress Admin > Newsletter Subscribers**
   - You should see your test email

---

## 📊 Verify Installation Checklist

- [ ] Theme is activated (BHW Freight Services)
- [ ] All plugins installed and activated
- [ ] Quote Form created in Contact Form 7
- [ ] Newsletter Form created in Contact Form 7
- [ ] Quote Form ID selected in BHW Settings > Forms Setup
- [ ] Newsletter Form ID selected in BHW Settings > Forms Setup
- [ ] Company info updated in BHW Settings > Company Info
- [ ] Homepage content updated in BHW Settings > Homepage Content
- [ ] Test quote form works and email received
- [ ] Test quote appears in admin dashboard
- [ ] Test newsletter form works and email received
- [ ] Test newsletter subscriber appears in admin
- [ ] Mobile menu works correctly
- [ ] All CSS and JS load correctly (no broken styles)

---

## 🚨 Troubleshooting

### Forms not showing on website
- Make sure Contact Form 7 is activated
- Go to BHW Settings > Forms Setup
- Verify form IDs are selected correctly

### Email not sending
- Go to Contact Form 7 form > Mail tab
- Check email address is correct
- Try sending a test email from WordPress

### Styles look broken
- Go to: Settings > WP Super Cache
- Click: "Delete Cache"
- Hard refresh browser: Ctrl+Shift+R (or Cmd+Shift+R on Mac)

### Admin settings not visible
- Make sure child theme is activated
- Make sure you're logged in as admin
- Try logging out and back in

### Quote inquiries not saving
- Check that form shortcode is correct
- Verify form ID in BHW Settings > Forms Setup
- Check WordPress error logs in wp-content/debug.log

---

## 📞 Contact Support

If you need help, check:
1. The documentation files in `/bhw-wp/`
2. WordPress admin help menus
3. Contact Form 7 documentation

---

## ✅ You're Done!

Once all tests pass, your WordPress site is ready to capture leads!

**Next steps:**
- Monitor quote inquiries in WordPress admin
- Respond to customer quotes
- Keep WordPress and plugins updated
- Monitor website performance with WP Super Cache
