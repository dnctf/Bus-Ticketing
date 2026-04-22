# Travel Ticket Theme - Quick Start Guide

## 🎨 Quick Setup (5 Minutes)

### Step 1: Activate the Theme
1. Log in to WordPress Dashboard
2. Go to **Appearance → Themes**
3. Find "Travel Ticket Theme"
4. Click **Activate**

### Step 2: Customize Colors
1. Go to **Appearance → Customize**
2. Click **Branding Colors**
3. Select your brand colors:
   - **Primary Color**: Main brand color
   - **Secondary Color**: Alternative color
   - **Accent Color**: Highlight/CTA color
   - **Text Color**: Default text
   - **Background Color**: Site background
   - **Button Color**: Button default state
   - **Button Hover Color**: Button hover state
4. See live preview on the right side
5. Click **Publish** to save

### Step 3: Choose Language
1. Find the **Language Selector** dropdown
2. Choose between:
   - 🇺🇸 English
   - 🇮🇩 Indonesian
3. Language preference is saved automatically

## 📁 Key Files

| File | Purpose |
|------|---------|
| `/inc/customizer.php` | Color customization settings |
| `/inc/language-switcher.php` | Language switching logic |
| `/css/colors.css` | All color-based styling |
| `/languages/` | Translation files |
| `/template-parts/language-switcher.php` | Language selector component |

## 🎯 Common Tasks

### Add Language Switcher to Header
Edit your header template file and add:
```php
<?php get_template_part( 'template-parts/language-switcher' ); ?>
```

### Get Current Language
```php
<?php 
    $current_lang = travel_ticket_get_current_language();
    echo $current_lang; // Output: en_US or id_ID
?>
```

### Display Language Switcher in Widget
```php
<?php travel_ticket_display_language_switcher(); ?>
```

### Access Colors in Custom Code
```php
<?php
    $primary = get_theme_mod( 'travel_ticket_primary_color', '#0073aa' );
    echo $primary;
?>
```

### Use Colors in CSS (CSS Variables)
```css
.my-element {
    color: var(--travel-ticket-primary-color);
    background: var(--travel-ticket-accent-color);
}
```

## 🛠️ Default Color Palette

| Element | Default Color | Use Case |
|---------|--------------|----------|
| Primary | #0073aa | Headers, Links, Main actions |
| Secondary | #005a87 | Hover states, Footer |
| Accent | #ff6b35 | Featured items, CTAs |
| Text | #333333 | Body text |
| Background | #ffffff | Page background |
| Button | #0073aa | Primary buttons |
| Button Hover | #005a87 | Button hover state |

## 💡 Pro Tips

1. **Use CSS Variables**: Always use `var(--travel-ticket-*)` in custom CSS for colors that respect customizer changes

2. **Test Color Contrast**: Make sure text color has good contrast against background

3. **Mobile Responsive**: All colors and layouts are mobile-optimized

4. **Cache Busting**: If colors don't update immediately, clear browser cache (Ctrl+Shift+Del)

5. **Translation Tips**: 
   - Add strings to `.po` files in `/languages/`
   - Use `__()` or `_e()` functions for all user-facing text
   - Example: `<?php echo __( 'Welcome', 'travel-ticket-theme' ); ?>`

## 🚀 Next Steps

1. Add your logo and site title
2. Create a menu under **Appearance → Menus**
3. Add pages and posts
4. Install WooCommerce for product/ticket selling
5. Set up payment gateway (Xendit)
6. Customize further with Additional CSS

## 📱 Responsive Breakpoints

- **Desktop**: 1024px and above
- **Tablet**: 768px - 1023px
- **Mobile**: Below 768px

All colors and styles automatically adjust for smaller screens.

## ✅ Checklist

- [ ] Theme activated
- [ ] Brand colors customized
- [ ] Language preference set
- [ ] Logo/branding added
- [ ] Navigation menu created
- [ ] Pages created
- [ ] WooCommerce configured
- [ ] Payment gateway set up

## 🆘 Troubleshooting

**Colors not changing?**
- Clear browser cache (Ctrl+Shift+Del)
- Refresh the Customizer page
- Check if JavaScript is enabled

**Language switcher not showing?**
- Add the template part to your header/footer
- Check translation files exist in `/languages/`
- Verify language files have correct naming

**WooCommerce styles look wrong?**
- Reinstall WooCommerce or regenerate CSS
- Clear theme cache if using a caching plugin
- Check browser console for JavaScript errors

## 📚 Full Documentation

See [README.md](README.md) for comprehensive documentation and advanced customization.

---

**Need Help?** Check the full documentation or contact theme support.
