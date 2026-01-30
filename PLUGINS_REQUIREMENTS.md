# 📦 WordPress Plugins & Requirements

## 🎯 Essential Plugins (Required)

### 1. **Contact Form 7** ⭐ REQUIRED
- **Purpose:** Form handling and submission storage
- **Status:** FREE
- **Why needed:**
  - Displays forms on website
  - Saves submissions to database
  - Sends email notifications
  - Integrates with our custom post types
- **Install:** `wp plugin install contact-form-7 --activate`
- **Cost:** Free
- **Setup time:** 10 minutes

---

## 🛠️ Recommended Plugins (Optional But Good)

### 2. **WP Super Cache**
- **Purpose:** Performance optimization
- **Status:** FREE
- **Why helpful:**
  - Caches pages for faster loading
  - Your landing page will load super fast
  - Essential for production
- **Install:** `wp plugin install wp-super-cache --activate`
- **Cost:** Free
- **Impact:** 2-3x faster page loads

### 3. **Yoast SEO**
- **Purpose:** Search engine optimization
- **Status:** FREE (with paid upgrade option)
- **Why helpful:**
  - Improves Google ranking
  - Helps with blog posts (if you add them)
  - Meta tags, sitemaps, readability checks
- **Install:** `wp plugin install yoast-seo --activate`
- **Cost:** Free version is enough
- **Benefit:** Better SEO for organic traffic

### 4. **Wordfence Security**
- **Purpose:** Website security
- **Status:** FREE (with paid option)
- **Why helpful:**
  - Protects against hacks
  - Login security
  - Malware scanning
  - Firewall protection
- **Install:** `wp plugin install wordfence --activate`
- **Cost:** Free version is sufficient
- **Importance:** Critical for production site

### 5. **Google Site Kit**
- **Purpose:** Analytics integration
- **Status:** FREE
- **Why helpful:**
  - See visitor stats in WordPress admin
  - Monitor performance
  - Connect Google Analytics, Search Console
- **Install:** `wp plugin install google-site-kit --activate`
- **Cost:** Free
- **Setup time:** 5 minutes

---

## 📋 Installation Instructions

### Via Command Line (VPS)

```bash
# SSH to VPS
ssh bhw-vps

# Navigate to WordPress
cd /home/bhw/public_html

# Install all plugins
wp plugin install contact-form-7 wp-super-cache yoast-seo wordfence google-site-kit --activate

# Verify installation
wp plugin list
```

### Via WordPress Admin

1. Go to: `https://bhwlogistics.id/wp-admin/`
2. Navigate to: **Plugins > Add New**
3. Search for each plugin name
4. Click **Install Now**
5. Click **Activate**

---

## ✅ What You DON'T Need

### ❌ WooCommerce
- Not needed (you're not selling products)

### ❌ Jetpack
- Not needed (Wordfence + Site Kit covers it)

### ❌ Elementor / Page Builder
- Not needed (we built custom theme)

### ❌ Akismet
- Optional (but good to have for spam filtering)

### ❌ Additional Security Plugins
- Wordfence is enough

### ❌ Multiple Cache Plugins
- Use only one (WP Super Cache is good)

---

## 🔧 Plugin Configuration Guide

### Contact Form 7 Setup

**After installation:**

1. Go to: **Contact > Contact Forms**
2. Click: **Add New**
3. Create two forms:

#### Form 1: Quote Request
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

**Mail tab:**
- To: [your email address]
- Subject: `New Quote Request from [your-name]`
- Message:
  ```
  New quote inquiry:

  Name: [your-name]
  Email: [your-email]
  Phone: [your-phone]
  Service: [your-service]
  From: [your-pickup]
  To: [your-destination]
  ```

#### Form 2: Newsletter
```html
<div class="newsletter-input-group">
  <input type="email" name="newsletter-email" required placeholder="Enter your email">
  [submit class:btn-secondary "Subscribe"]
</div>
```

**Mail tab:**
- To: [your email address]
- Subject: `New Newsletter Subscriber`
- Message:
  ```
  New subscriber: [newsletter-email]
  ```

### WP Super Cache Setup

1. Go to: **Settings > WP Super Cache**
2. Click: **Easy** tab
3. Check: **Caching On (Recommended)**
4. Click: **Update Status**

That's it! Cache is enabled.

### Yoast SEO Setup

1. Go to: **SEO** (new menu)
2. Complete the setup wizard:
   - Select your site type
   - Choose focus keywords
   - Add business info
3. That's it!

### Wordfence Setup

1. Go to: **Wordfence > Firewall**
2. Enable protection (usually default)
3. Go to: **Wordfence > Scan**
4. Run an initial scan
5. Done!

### Google Site Kit Setup

1. Go to: **Google Site Kit**
2. Click: **Start Setup**
3. Sign in with Google account
4. Grant permissions
5. Connect Google Analytics (optional but helpful)

---

## 📊 Plugin Impact Summary

| Plugin | Purpose | Impact | Must Have |
|--------|---------|--------|-----------|
| Contact Form 7 | Forms | Essential for quotes | YES ✅ |
| WP Super Cache | Speed | 2-3x faster loads | Highly Recommended |
| Yoast SEO | SEO | Better Google ranking | Recommended |
| Wordfence | Security | Protection from hacks | Recommended |
| Google Site Kit | Analytics | See visitor stats | Optional |

---

## 🚨 Important Notes

### Contact Form 7 is NOT Optional
- Without it, forms won't work
- It's the only way to capture quote inquiries
- Must be installed before configuring BHW Settings

### Security is Important
- Always install Wordfence
- Keeps your site safe from attacks
- Free version is sufficient

### Performance Matters
- Install WP Super Cache
- Your site will load 2-3x faster
- Better for SEO and user experience
- Especially important for Indonesia with slower connections

### Don't Overload With Plugins
- Too many plugins = slower site
- We've only included essential ones
- Stick to the 5 recommended plugins

---

## 🔄 After Installation

Once plugins are installed:

1. **Go to BHW Settings > Forms Setup**
   - Select your Contact Form 7 forms
   - This connects our theme to the forms

2. **Test the forms**
   - Fill out quote form
   - Submit
   - Check WordPress admin > Quote Inquiries

3. **Check performance**
   - Visit site
   - Should feel fast (thanks to WP Super Cache)

4. **Run security scan**
   - Wordfence > Scan
   - Should be clean

---

## 📲 Plugin Management Tips

### Disable Plugins You Don't Use
- Less is better
- Fewer plugins = faster site
- Only keep what you need

### Keep Plugins Updated
- Go to: **Plugins > All Plugins**
- Install updates when available
- WordPress will notify you

### Monitor Performance
- Go to: **Site Health** (Dashboard)
- Fix any warnings
- Shows if plugins are causing issues

---

## 💾 Required Versions

- **WordPress:** 6.0 or higher
- **PHP:** 8.0 or higher (your VPS already has this)
- **MySQL:** 8.0 or higher (your VPS already has this)

---

## ✅ Final Checklist

Before going live:

- [ ] Contact Form 7 installed and activated
- [ ] Quote form created in Contact Form 7
- [ ] Newsletter form created in Contact Form 7
- [ ] BHW Settings > Forms Setup configured
- [ ] WP Super Cache enabled
- [ ] Wordfence security enabled
- [ ] Test form submission
- [ ] Test quote appears in admin
- [ ] Test newsletter signup

---

**Status:** Ready to Install Plugins! 🎉

**Next Step:** Run the installation command on VPS
```bash
ssh bhw-vps
cd /home/bhw/public_html
wp plugin install contact-form-7 wp-super-cache yoast-seo wordfence google-site-kit --activate
```
