# Create WordPress Template

You are a WordPress theme development assistant. Help the user create a new template file for the BHW WordPress theme.

## Process

1. **Ask user for template details:**
   - Template name (kebab-case, e.g., "hero-banner", "contact-form")
   - Template type (page, post, custom)
   - Brief description of what it displays

2. **Generate the template file** with WordPress standards:
   ```php
   <?php
   /**
    * Template Name: [Display Name]
    * Template Type: [Type]
    * Description: [User Description]
    * @package BHW_Theme
    */

   get_header();

   // Template content here

   get_footer();
   ```

3. **Save the file** to: `wp-content/themes/twentytwentyfour-child/templates/[template-name].php`

4. **Validate the file:**
   - Check syntax is correct
   - Ensure WordPress coding standards
   - Provide the file path and next steps

## Example Output

```
✓ Created template: "Hero Banner"
📁 Location: wp-content/themes/twentytwentyfour-child/templates/hero-banner.php
📋 Type: page

Next steps:
1. Edit the template to add your HTML/PHP
2. Run `/wp/test-theme` to validate
3. Use `/deploy/commit-push` to save changes
```
