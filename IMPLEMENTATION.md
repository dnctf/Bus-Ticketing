# Implementation Guide - Travel Ticket Theme

## Overview

The Travel Ticket Theme now includes comprehensive customizable branding colors and multi-language support. This guide explains how everything works and how to use it effectively.

## 🎨 Customizable Branding Colors System

### Architecture

The color customization system is built using WordPress Customizer API with real-time preview.

#### Key Components:

1. **Color Settings** (`/inc/customizer.php`)
   - Manages color customizer panels
   - 7 customizable color options
   - Real-time transport for instant preview

2. **Color Configuration** (`/inc/config.php`)
   - Default color palette
   - Pre-built color schemes (5 variations)
   - Helper functions for color management

3. **Dynamic CSS** (`/inc/customizer.php` & `/css/colors.css`)
   - CSS Custom Properties (Variables)
   - Automatically generated inline styles
   - Applied to all theme elements

4. **Real-time Preview** (`/js/customizer-preview.js`)
   - Live color updates in Customizer
   - jQuery-based preview system
   - WP Customize API integration

### Customizable Colors

| Setting | Purpose | Default |
|---------|---------|---------|
| Primary Color | Headers, links, main CTAs | #0073aa |
| Secondary Color | Hover states, footer | #005a87 |
| Accent Color | Featured items, highlights | #ff6b35 |
| Text Color | Body text | #333333 |
| Background Color | Page background | #ffffff |
| Button Color | Primary button state | #0073aa |
| Button Hover Color | Button hover/focus state | #005a87 |

### How It Works

1. **User selects color** in Customizer → Branding Colors section
2. **WordPress stores setting** using `set_theme_mod()`
3. **Real-time preview updates** via `customizer-preview.js`
4. **CSS variables updated** in inline styles
5. **Theme frontend applies** colors via CSS custom properties

### CSS Variables

All colors are available as CSS custom properties:

```css
:root {
    --travel-ticket-primary-color: #0073aa;
    --travel-ticket-secondary-color: #005a87;
    --travel-ticket-accent-color: #ff6b35;
    --travel-ticket-text-color: #333333;
    --travel-ticket-background-color: #ffffff;
    --travel-ticket-button-color: #0073aa;
    --travel-ticket-button-hover-color: #005a87;
}
```

### Using Colors in Custom Code

**In PHP:**
```php
<?php
    $primary = get_theme_mod( 'travel_ticket_primary_color', '#0073aa' );
    echo $primary; // Output: #0073aa or user-selected color
?>
```

**In CSS:**
```css
.my-element {
    color: var(--travel-ticket-primary-color);
    background: var(--travel-ticket-accent-color);
    border-color: var(--travel-ticket-secondary-color);
}
```

**In JavaScript:**
```javascript
// Get computed CSS variable value
const primaryColor = getComputedStyle(document.documentElement)
    .getPropertyValue('--travel-ticket-primary-color').trim();
console.log(primaryColor);
```

### Pre-built Color Schemes

The theme includes 5 pre-configured color schemes:

1. **Default Blue** - Professional blue theme
2. **Tropical Vibes** - Green and natural colors
3. **Sunset** - Warm orange and yellow
4. **Ocean Blue** - Deep water-inspired blues
5. **Forest Green** - Nature-inspired greens

To apply a scheme programmatically:
```php
<?php travel_ticket_apply_color_scheme( 'tropical' ); ?>
```

## 🌐 Multi-Language Support

### Architecture

The language system uses WordPress text domain and translation files (.po).

#### Key Components:

1. **Language Switcher** (`/inc/language-switcher.php`)
   - AJAX-based language switching
   - Cookie/localStorage persistence
   - User preference handling

2. **Language Selector UI** (`/template-parts/language-switcher.php`)
   - Dropdown component
   - Flag emoji display
   - Responsive design

3. **Translation Files** (`/languages/`)
   - English (.po file)
   - Indonesian (.po file)

4. **JavaScript Handler** (`/js/language-switcher.js`)
   - AJAX communication
   - Page reload handling
   - Preference storage

### Supported Languages

- **English** (en_US) - Default
- **Indonesian** (id_ID) - Optional

### How Language Switching Works

1. **User selects language** from dropdown
2. **JavaScript sends AJAX request** with language choice
3. **Server saves preference** to cookie
4. **Page reloads** with new language
5. **WordPress loads appropriate** translation file
6. **All strings display** in selected language

### Translation System

**How WordPress loads translations:**

```php
load_theme_textdomain( 'travel-ticket-theme', 
    get_template_directory() . '/languages' );
```

**How to use translatable strings:**

```php
<?php
    // Simple text
    echo __( 'Welcome', 'travel-ticket-theme' );
    
    // With output escaping
    echo esc_html__( 'Welcome', 'travel-ticket-theme' );
    
    // With sprintf formatting
    printf( __( 'Welcome to %s', 'travel-ticket-theme' ), 'Site Name' );
?>
```

### Adding Translations

**Structure of .po files:**

```po
msgid "Original English Text"
msgstr "Translated Text"

msgid "Book Now"
msgstr "Pesan Sekarang"
```

**File locations:**
- English: `/languages/travel-ticket-theme-en_US.po`
- Indonesian: `/languages/travel-ticket-theme-id_ID.po`

### Adding New Languages

1. **Create new .po file**
   ```
   /languages/travel-ticket-theme-[locale_code].po
   ```

2. **Copy structure** from existing .po files

3. **Translate all strings** (msgstr values)

4. **Update language switcher** in `inc/language-switcher.php`:
   ```php
   'fr_FR' => array(
       'code' => 'fr',
       'name' => __( 'Français', 'travel-ticket-theme' ),
       'flag' => '🇫🇷',
   ),
   ```

5. **Clear caches** and test

## 📁 File Organization

### New Files Created

```
/inc/
├── config.php                      # Theme configuration & constants
├── customizer.php                  # Customizer API setup
└── language-switcher.php           # Language switching logic

/css/
└── colors.css                      # Color system & utility styles

/js/
├── customizer-preview.js           # Real-time customizer updates
└── language-switcher.js            # Language switcher functionality

/languages/
├── travel-ticket-theme-en_US.po    # English translations
└── travel-ticket-theme-id_ID.po    # Indonesian translations

/template-parts/
└── language-switcher.php           # Language selector template

/
├── README.md                       # Full documentation
└── QUICK-START.md                  # Quick start guide
```

## 🔧 Integration Points

### In functions.php

All new files are automatically included:

```php
require get_template_directory() . '/inc/config.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/language-switcher.php';
```

### In style.css

Color system CSS is imported:

```css
@import url('css/colors.css');
```

## 🎯 Usage Examples

### Example 1: Display Language Switcher

```php
<?php get_template_part( 'template-parts/language-switcher' ); ?>
```

### Example 2: Get Current Language

```php
<?php 
    $lang = travel_ticket_get_current_language();
    // Output: en_US or id_ID
?>
```

### Example 3: Use Branding Colors

```css
.custom-box {
    border-left: 4px solid var(--travel-ticket-primary-color);
    background: var(--travel-ticket-accent-color);
    color: #ffffff;
}
```

### Example 4: Conditional Logic Based on Language

```php
<?php 
    if ( 'id_ID' === travel_ticket_get_current_language() ) {
        echo __( 'Selamat datang', 'travel-ticket-theme' );
    } else {
        echo __( 'Welcome', 'travel-ticket-theme' );
    }
?>
```

### Example 5: Add Custom Color Using Utility Class

```html
<div class="text-primary">Primary colored text</div>
<div class="bg-accent text-white">Accent background</div>
<button class="btn">Button styled with primary color</button>
```

## 🚀 Performance Optimization

### Color System Performance

- **CSS Variables** - Native browser support, zero runtime overhead
- **Inline Styles** - Cached inline CSS, not dynamically generated per page load
- **Selective Refresh** - Only updated elements rerender in Customizer

### Language System Performance

- **Gettext** - Native WordPress translation system, optimized
- **Cookie Storage** - Language preference cached in browser
- **Lazy Loading** - Translation files loaded only when needed

## ✅ Best Practices

### For Color Customization

1. **Always use CSS variables** in custom CSS
2. **Provide good contrast** between text and background colors
3. **Test colors** in Customizer preview before publishing
4. **Use utility classes** for quick color application
5. **Document custom colors** if adding more

### For Multi-Language Support

1. **Wrap all user-facing text** with translation functions
2. **Use descriptive message IDs** in .po files
3. **Test both languages** thoroughly
4. **Keep translations in sync** across .po files
5. **Use proper locale codes** (en_US, not en-us)

### For Development

1. **Use WP_DEBUG** in wp-config.php for debugging
2. **Clear theme cache** when making changes
3. **Test in different browsers** and devices
4. **Validate color codes** before saving
5. **Check translation completeness** before deploying

## 🐛 Troubleshooting

### Colors Not Updating

**Problem**: Colors don't change when modified in Customizer

**Solutions**:
1. Clear browser cache (Ctrl+Shift+Del)
2. Disable any caching plugins temporarily
3. Check browser console for JavaScript errors
4. Verify `customizer-preview.js` is loaded
5. Check that `travel_ticket_get_custom_colors_css()` is called

### Language Switcher Not Working

**Problem**: Language doesn't change or switcher doesn't appear

**Solutions**:
1. Verify translation files exist in `/languages/`
2. Check file naming: `travel-ticket-theme-[locale].po`
3. Enable AJAX in WordPress settings
4. Check browser console for AJAX errors
5. Verify nonce is being generated correctly

### WooCommerce Colors Not Applied

**Problem**: Product pages don't use theme colors

**Solutions**:
1. Verify WooCommerce theme support: `add_theme_support( 'woocommerce' )`
2. Clear WooCommerce CSS cache
3. Check that `.woocommerce` selectors are in `colors.css`
4. Regenerate WooCommerce static CSS files

## 📊 Customizer Structure

```
Appearance > Customize
    └── Branding Colors (Custom Section)
        ├── Primary Color (Color Control)
        ├── Secondary Color (Color Control)
        ├── Accent Color (Color Control)
        ├── Text Color (Color Control)
        ├── Background Color (Color Control)
        ├── Button Color (Color Control)
        └── Button Hover Color (Color Control)
```

## 🔐 Security Considerations

- **Color Validation**: All colors sanitized with `sanitize_hex_color()`
- **Translation Files**: .po files are text-based, no code execution
- **AJAX Nonce**: Language switching request validated with nonce
- **Capability Checks**: Customizer access restricted to users with edit_theme_options
- **Escaping**: All output properly escaped with `esc_html()`, `esc_attr()`

## 📈 Scalability

The system is designed to scale:

- **Add more colors**: Simply add more settings in `customizer.php`
- **Add more languages**: Create new .po files and update language-switcher.php
- **Add color schemes**: Expand `travel_ticket_get_color_schemes()` in `config.php`
- **Custom styling**: All colors available as CSS variables for easy override

## 🎓 Learning Resources

- [WordPress Customizer API](https://developer.wordpress.org/plugins/customize/)
- [WordPress Internationalization](https://developer.wordpress.org/plugins/internationalization/)
- [CSS Custom Properties](https://developer.mozilla.org/en-US/docs/Web/CSS/--*)
- [WordPress Security](https://developer.wordpress.org/plugins/security/)

---

**Version**: 1.0.0  
**Last Updated**: April 22, 2026  
**Author**: GitHub Copilot
