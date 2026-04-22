# Travel Ticket Theme

A custom WordPress theme designed for travel ticket sales websites with advanced customization features, WooCommerce integration, and multi-language support.

## Features

### 1. Customizable Branding Colors
The theme includes a comprehensive color customization system accessible through the WordPress Customizer dashboard. Users can customize:

- **Primary Color**: Main brand color used for headers, primary elements
- **Secondary Color**: Secondary brand color for hover states and footer
- **Accent Color**: Highlight color for calls-to-action and featured elements
- **Text Color**: Default text color throughout the site
- **Background Color**: Site background color
- **Button Color**: Color for primary action buttons
- **Button Hover Color**: Hover state for buttons

#### How to Use:
1. Go to WordPress Admin Dashboard
2. Navigate to **Appearance > Customize**
3. Look for **Branding Colors** section
4. Adjust colors using the color pickers
5. Changes appear in real-time in the preview
6. Click **Publish** to save changes

#### Color System Features:
- Real-time preview in the Customizer
- CSS Custom Properties (Variables) for easy styling
- Automatic application to all theme elements
- Responsive design considerations
- WooCommerce integration

### 2. Multi-Language Support

The theme supports English and Indonesian languages with easy switching functionality.

#### Supported Languages:
- **English (en_US)** - Default language
- **Indonesian (id_ID)** - Optional language

#### How to Use:
1. Look for the **Language** selector in the header or footer
2. Select your preferred language from the dropdown
3. The page will reload with the selected language
4. Your preference is saved and will persist on subsequent visits

#### Language Files:
- Translation files are located in `/languages/` directory
- English: `travel-ticket-theme-en_US.po`
- Indonesian: `travel-ticket-theme-id_ID.po`

#### For Translators:
To add new strings or modify translations:
1. Edit the `.po` files in the languages directory
2. Use a PO file editor like Poedit for easier editing
3. The `.pot` template file contains all translatable strings

### 3. Dynamic Styling

The theme uses CSS Custom Properties (CSS Variables) for dynamic styling:

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

These variables are automatically updated when colors are changed in the Customizer.

### 4. Utility Classes

The theme includes utility classes for quick styling:

#### Color Classes:
- `.text-primary` - Primary text color
- `.text-secondary` - Secondary text color
- `.text-accent` - Accent text color
- `.bg-primary` - Primary background
- `.bg-secondary` - Secondary background
- `.bg-accent` - Accent background
- `.bg-light` - Light background
- `.border-primary` - Primary border color
- `.border-secondary` - Secondary border color
- `.border-accent` - Accent border color

#### Shadow Classes:
- `.shadow-sm` - Small shadow
- `.shadow` - Medium shadow
- `.shadow-lg` - Large shadow

#### Rounded Classes:
- `.rounded` - Standard border radius (4px)
- `.rounded-lg` - Large border radius (8px)

### 5. Component Styling

#### Ticket Cards
Pre-styled card components for displaying travel tickets:
- `.ticket-card` - Main card container
- `.ticket-header` - Header section with title and badges
- `.ticket-details` - Details grid section
- `.price-tag` - Price display styling

#### Buttons
Multiple button styles:
- `.btn` - Primary button
- `.btn-secondary` or `.btn-outline` - Secondary outlined button
- Automatic hover and focus states

#### Forms
Pre-styled form elements with focus states and validation styling:
- Color-coordinated input fields
- Dropdown styling
- Textarea styling
- Automatic focus highlighting

### 6. WooCommerce Integration

The theme is fully integrated with WooCommerce:
- Themed product cards
- Colored pricing display
- Star rating colors
- Add to cart button styling
- Checkout page customization

## File Structure

```
/
├── style.css                 # Main theme stylesheet
├── functions.php            # Theme functions and hooks
├── index.php                # Main template file
├── css/
│   └── colors.css          # Color system and utility styles
├── js/
│   ├── customizer-preview.js    # Real-time customizer updates
│   ├── language-switcher.js     # Language switching functionality
│   └── navigation.js             # Navigation functionality
├── inc/
│   ├── customizer.php           # Customizer configuration
│   ├── language-switcher.php    # Language switcher logic
│   ├── custom-header.php
│   ├── template-tags.php
│   ├── template-functions.php
│   └── jetpack.php
├── template-parts/
│   ├── language-switcher.php    # Language switcher template
│   ├── header.php
│   ├── footer.php
│   ├── content.php
│   └── content-*.php
├── languages/
│   ├── travel-ticket-theme-en_US.po
│   └── travel-ticket-theme-id_ID.po
└── images/                  # Theme images
```

## Installation & Setup

### Prerequisites
- WordPress 5.0 or higher
- PHP 7.4 or higher
- WooCommerce plugin (optional but recommended)

### Installation Steps

1. **Download/Upload Theme**
   - Extract the theme folder to `/wp-content/themes/`
   - Or upload via WordPress Admin: Appearance > Themes > Add New

2. **Activate Theme**
   - Go to WordPress Admin Dashboard
   - Navigate to Appearance > Themes
   - Find "Travel Ticket Theme" and click Activate

3. **Configure Language**
   - Go to Settings > General
   - Set the Site Language to your preferred language
   - Or use the language switcher if added to your site

4. **Customize Colors**
   - Go to Appearance > Customize
   - Navigate to "Branding Colors" section
   - Adjust colors to match your brand
   - Preview changes in real-time
   - Click Publish to save

5. **Add Language Switcher**
   - Add the language switcher widget or template part to your header/footer
   - Edit your header template and add: `<?php get_template_part( 'template-parts/language-switcher' ); ?>`

## Customization Guide

### Changing Default Colors

If you want to change the default colors before customization:

1. Edit `/inc/customizer.php`
2. Find the color settings with default values
3. Change the `'default'` parameter for each color
4. Save and reload the Customizer

### Adding Custom Color Settings

To add additional color settings:

1. Edit `/inc/customizer.php`
2. Add a new setting block:

```php
$wp_customize->add_setting(
    'travel_ticket_your_color',
    array(
        'default'           => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    )
);

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'travel_ticket_your_color_control',
        array(
            'label'    => __( 'Your Color Label', 'travel-ticket-theme' ),
            'section'  => 'travel_ticket_colors',
            'settings' => 'travel_ticket_your_color',
        )
    )
);
```

3. Update `/css/colors.css` to use the new variable
4. Update `/js/customizer-preview.js` for real-time updates

### Adding New Languages

To add a new language:

1. Create a new `.po` file in `/languages/` with the locale code (e.g., `travel-ticket-theme-es_ES.po`)
2. Copy the structure from existing `.po` files
3. Translate all strings
4. Update `/inc/language-switcher.php` to include the new language

### Creating Custom Themes with Base Colors

Use the CSS Custom Properties to create variations:

```css
/* Dark theme variation */
.theme-dark {
    --travel-ticket-primary-color: #1a1a1a;
    --travel-ticket-secondary-color: #333333;
    --travel-ticket-background-color: #222222;
    --travel-ticket-text-color: #ffffff;
}
```

## Hooks & Filters

### Available Hooks

#### Actions
- `travel_ticket_customize_register` - Customize registration
- `travel_ticket_enqueue_custom_styles` - Custom styles enqueueing

#### Filters
- `travel_ticket_custom_colors_css` - Modify custom colors CSS
- `travel_ticket_available_languages` - Modify available languages

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## CSS Grid & Flexbox

The theme uses modern CSS Grid and Flexbox for responsive layouts. The ticket details section automatically adjusts on smaller screens.

## Accessibility

- Semantic HTML structure
- ARIA labels for form elements
- Keyboard navigation support
- Color contrast compliance
- Focus states for interactive elements

## Performance Optimization

- Minified CSS and JavaScript
- Efficient CSS Custom Properties usage
- Lazy loading support for images
- Optimized color generation
- Minimal HTTP requests

## Troubleshooting

### Colors not updating in Customizer
1. Clear browser cache
2. Make sure JavaScript is enabled
3. Check `/js/customizer-preview.js` is enqueued correctly

### Language switcher not working
1. Verify translation files exist in `/languages/`
2. Check if language files have correct naming format
3. Ensure AJAX is enabled on the website
4. Check browser console for JavaScript errors

### WooCommerce styles not applying
1. Make sure WooCommerce plugin is installed and activated
2. Verify theme supports WooCommerce: `add_theme_support( 'woocommerce' );`
3. Check if WooCommerce CSS is loaded after theme CSS

## Support & Resources

- WordPress Theme Documentation: https://developer.wordpress.org/themes/
- WordPress Customizer API: https://developer.wordpress.org/plugins/customize/
- WooCommerce Theme Developer: https://docs.woocommerce.com/
- WordPress Internationalization: https://developer.wordpress.org/plugins/internationalization/

## License

This theme is licensed under the GPL v2 or later. See LICENSE file for details.

## Version History

### Version 1.0.0
- Initial release
- Customizable branding colors
- Multi-language support (English & Indonesian)
- WooCommerce integration
- Responsive design
- Comprehensive styling system

## Credits

**Developer:** GitHub Copilot
**Created:** April 22, 2026

---

For more information or support, please visit the WordPress theme documentation or contact the theme developer.
