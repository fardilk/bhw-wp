# BHW Freight Services WordPress Theme

Professional WordPress theme for BHW Freight Services, a logistics company specializing in freight delivery across Indonesia.

## Features

- ✅ Fully responsive design (mobile, tablet, desktop)
- ✅ Modern, professional design with teal/navy/orange color scheme
- ✅ Service showcase sections
- ✅ Statistics and testimonials
- ✅ Quote request form (Contact Form 7 integration)
- ✅ Newsletter signup
- ✅ Mobile-optimized menu
- ✅ Smooth scrolling and animations
- ✅ SEO-friendly structure
- ✅ Accessibility standards (WCAG)

## Installation

1. Upload the `bhw-freight-services` folder to `/wp-content/themes/`
2. Go to WordPress Admin > Appearance > Themes
3. Click "Activate" on "BHW Freight Services"
4. Configure theme options if needed

## Requirements

- WordPress 5.0+
- Contact Form 7 plugin (for quote forms)
- PHP 7.2+

## Theme Structure

```
bhw-freight-services/
├── style.css              # Theme metadata
├── functions.php          # Theme functionality
├── header.php             # Header template
├── footer.php             # Footer template
├── index.php              # Main template
├── assets/
│   ├── css/              # Stylesheets
│   │   ├── reset.css
│   │   ├── variables.css
│   │   ├── layout.css
│   │   ├── components.css
│   │   └── responsive.css
│   ├── js/               # JavaScript files
│   │   ├── main.js
│   │   └── form-handler.js
│   └── images/           # Images folder
└── README.md             # This file
```

## Customization

### Colors

Edit `/assets/css/variables.css` to change brand colors:
- Primary: `--color-primary: #44B5A0;`
- Secondary: `--color-secondary: #0C2E4A;`
- Accent: `--color-accent: #FF9800;`

### Logo

Replace `/assets/images/logo.png` with your company logo.

### Forms

The theme uses Contact Form 7. Configure form IDs in WordPress Admin > BHW Settings

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers

## Credits

- Design: BHW Freight Services
- Built with HTML5, CSS3, Vanilla JavaScript

## License

GPL v2 or later
