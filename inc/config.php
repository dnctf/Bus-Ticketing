<?php
/**
 * Theme Configuration and Constants
 *
 * @package Travel_Ticket_Theme
 */

// Define theme constants
define( 'TRAVEL_TICKET_THEME_VERSION', '1.0.0' );
define( 'TRAVEL_TICKET_THEME_NAME', 'Travel Ticket Theme' );
define( 'TRAVEL_TICKET_THEME_TEXT_DOMAIN', 'travel-ticket-theme' );
define( 'TRAVEL_TICKET_THEME_AUTHOR', 'GitHub Copilot' );

/**
 * Default Color Palette
 */
if ( ! function_exists( 'travel_ticket_get_default_colors' ) ) :

    function travel_ticket_get_default_colors() {
        return array(
            'primary'        => '#0073aa',
            'secondary'      => '#005a87',
            'accent'         => '#ff6b35',
            'text'           => '#333333',
            'background'     => '#ffffff',
            'button'         => '#0073aa',
            'button_hover'   => '#005a87',
            'light_bg'       => '#f5f5f5',
            'border'         => '#dddddd',
        );
    }

endif;

/**
 * Get all customizer color settings
 */
if ( ! function_exists( 'travel_ticket_get_all_colors' ) ) :

    function travel_ticket_get_all_colors() {
        $defaults = travel_ticket_get_default_colors();

        return array(
            'travel_ticket_primary_color'        => get_theme_mod( 'travel_ticket_primary_color', $defaults['primary'] ),
            'travel_ticket_secondary_color'      => get_theme_mod( 'travel_ticket_secondary_color', $defaults['secondary'] ),
            'travel_ticket_accent_color'         => get_theme_mod( 'travel_ticket_accent_color', $defaults['accent'] ),
            'travel_ticket_text_color'           => get_theme_mod( 'travel_ticket_text_color', $defaults['text'] ),
            'travel_ticket_background_color'     => get_theme_mod( 'travel_ticket_background_color', $defaults['background'] ),
            'travel_ticket_button_color'         => get_theme_mod( 'travel_ticket_button_color', $defaults['button'] ),
            'travel_ticket_button_hover_color'   => get_theme_mod( 'travel_ticket_button_hover_color', $defaults['button_hover'] ),
        );
    }

endif;

/**
 * Predefined Color Schemes for quick switching
 */
if ( ! function_exists( 'travel_ticket_get_color_schemes' ) ) :

    function travel_ticket_get_color_schemes() {
        return apply_filters( 'travel_ticket_color_schemes', array(
            'default' => array(
                'name'      => __( 'Default Blue', 'travel-ticket-theme' ),
                'colors'    => array(
                    'primary'        => '#0073aa',
                    'secondary'      => '#005a87',
                    'accent'         => '#ff6b35',
                    'text'           => '#333333',
                    'background'     => '#ffffff',
                    'button'         => '#0073aa',
                    'button_hover'   => '#005a87',
                ),
            ),
            'tropical' => array(
                'name'      => __( 'Tropical Vibes', 'travel-ticket-theme' ),
                'colors'    => array(
                    'primary'        => '#00a86b',
                    'secondary'      => '#008855',
                    'accent'         => '#ff6b35',
                    'text'           => '#333333',
                    'background'     => '#f0fdf4',
                    'button'         => '#00a86b',
                    'button_hover'   => '#008855',
                ),
            ),
            'sunset' => array(
                'name'      => __( 'Sunset', 'travel-ticket-theme' ),
                'colors'    => array(
                    'primary'        => '#ff6b35',
                    'secondary'      => '#d84315',
                    'accent'         => '#ffc107',
                    'text'           => '#333333',
                    'background'     => '#fff8e1',
                    'button'         => '#ff6b35',
                    'button_hover'   => '#d84315',
                ),
            ),
            'ocean' => array(
                'name'      => __( 'Ocean Blue', 'travel-ticket-theme' ),
                'colors'    => array(
                    'primary'        => '#006994',
                    'secondary'      => '#004d7a',
                    'accent'         => '#00d4ff',
                    'text'           => '#1a3a52',
                    'background'     => '#f5fafb',
                    'button'         => '#006994',
                    'button_hover'   => '#004d7a',
                ),
            ),
            'forest' => array(
                'name'      => __( 'Forest Green', 'travel-ticket-theme' ),
                'colors'    => array(
                    'primary'        => '#2d5016',
                    'secondary'      => '#1b3d0a',
                    'accent'         => '#ff9500',
                    'text'           => '#2d2d2d',
                    'background'     => '#f1f7f0',
                    'button'         => '#2d5016',
                    'button_hover'   => '#1b3d0a',
                ),
            ),
        ) );
    }

endif;

/**
 * Get a specific color scheme
 */
if ( ! function_exists( 'travel_ticket_get_color_scheme' ) ) :

    function travel_ticket_get_color_scheme( $scheme_key ) {
        $schemes = travel_ticket_get_color_schemes();

        return isset( $schemes[ $scheme_key ] ) ? $schemes[ $scheme_key ] : $schemes['default'];
    }

endif;

/**
 * Apply a color scheme
 */
if ( ! function_exists( 'travel_ticket_apply_color_scheme' ) ) :

    function travel_ticket_apply_color_scheme( $scheme_key ) {
        $scheme = travel_ticket_get_color_scheme( $scheme_key );

        if ( isset( $scheme['colors'] ) ) {
            foreach ( $scheme['colors'] as $setting => $color ) {
                set_theme_mod( 'travel_ticket_' . $setting . '_color', $color );
            }
            return true;
        }

        return false;
    }

endif;

/**
 * Available Features
 */
if ( ! function_exists( 'travel_ticket_get_features' ) ) :

    function travel_ticket_get_features() {
        return array(
            'customizable_colors'  => true,
            'multilingual_support' => true,
            'woocommerce_support'  => true,
            'responsive_design'    => true,
            'accessibility'        => true,
            'custom_header'        => true,
            'custom_background'    => true,
            'selective_refresh'    => true,
        );
    }

endif;

/**
 * Theme Info
 */
if ( ! function_exists( 'travel_ticket_get_theme_info' ) ) :

    function travel_ticket_get_theme_info() {
        return array(
            'name'        => TRAVEL_TICKET_THEME_NAME,
            'version'     => TRAVEL_TICKET_THEME_VERSION,
            'author'      => TRAVEL_TICKET_THEME_AUTHOR,
            'text_domain' => TRAVEL_TICKET_THEME_TEXT_DOMAIN,
            'uri'         => get_template_directory_uri(),
            'dir'         => get_template_directory(),
        );
    }

endif;
