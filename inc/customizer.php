<?php
/**
 * Customizer configuration for Travel Ticket Theme
 * Handles branding colors and theme customization
 */

if ( ! function_exists( 'travel_ticket_customize_register' ) ) :

    function travel_ticket_customize_register( $wp_customize ) {
        // Set panel/section priority
        $priority = 0;

        // Add custom color section
        $wp_customize->add_section(
            'travel_ticket_colors',
            array(
                'title'      => __( 'Branding Colors', 'travel-ticket-theme' ),
                'description' => __( 'Customize your website branding colors', 'travel-ticket-theme' ),
                'priority'   => 160,
            )
        );

        // Primary Color
        $wp_customize->add_setting(
            'travel_ticket_primary_color',
            array(
                'default'           => '#0073aa',
                'sanitize_callback' => 'sanitize_hex_color',
                'transport'         => 'postMessage',
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'travel_ticket_primary_color_control',
                array(
                    'label'    => __( 'Primary Color', 'travel-ticket-theme' ),
                    'section'  => 'travel_ticket_colors',
                    'settings' => 'travel_ticket_primary_color',
                    'priority' => ++$priority,
                )
            )
        );

        // Secondary Color
        $wp_customize->add_setting(
            'travel_ticket_secondary_color',
            array(
                'default'           => '#005a87',
                'sanitize_callback' => 'sanitize_hex_color',
                'transport'         => 'postMessage',
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'travel_ticket_secondary_color_control',
                array(
                    'label'    => __( 'Secondary Color', 'travel-ticket-theme' ),
                    'section'  => 'travel_ticket_colors',
                    'settings' => 'travel_ticket_secondary_color',
                    'priority' => ++$priority,
                )
            )
        );

        // Accent Color
        $wp_customize->add_setting(
            'travel_ticket_accent_color',
            array(
                'default'           => '#ff6b35',
                'sanitize_callback' => 'sanitize_hex_color',
                'transport'         => 'postMessage',
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'travel_ticket_accent_color_control',
                array(
                    'label'    => __( 'Accent Color', 'travel-ticket-theme' ),
                    'section'  => 'travel_ticket_colors',
                    'settings' => 'travel_ticket_accent_color',
                    'priority' => ++$priority,
                )
            )
        );

        // Text Color
        $wp_customize->add_setting(
            'travel_ticket_text_color',
            array(
                'default'           => '#333333',
                'sanitize_callback' => 'sanitize_hex_color',
                'transport'         => 'postMessage',
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'travel_ticket_text_color_control',
                array(
                    'label'    => __( 'Text Color', 'travel-ticket-theme' ),
                    'section'  => 'travel_ticket_colors',
                    'settings' => 'travel_ticket_text_color',
                    'priority' => ++$priority,
                )
            )
        );

        // Background Color
        $wp_customize->add_setting(
            'travel_ticket_background_color',
            array(
                'default'           => '#ffffff',
                'sanitize_callback' => 'sanitize_hex_color',
                'transport'         => 'postMessage',
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'travel_ticket_background_color_control',
                array(
                    'label'    => __( 'Background Color', 'travel-ticket-theme' ),
                    'section'  => 'travel_ticket_colors',
                    'settings' => 'travel_ticket_background_color',
                    'priority' => ++$priority,
                )
            )
        );

        // Button Color
        $wp_customize->add_setting(
            'travel_ticket_button_color',
            array(
                'default'           => '#0073aa',
                'sanitize_callback' => 'sanitize_hex_color',
                'transport'         => 'postMessage',
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'travel_ticket_button_color_control',
                array(
                    'label'    => __( 'Button Color', 'travel-ticket-theme' ),
                    'section'  => 'travel_ticket_colors',
                    'settings' => 'travel_ticket_button_color',
                    'priority' => ++$priority,
                )
            )
        );

        // Button Hover Color
        $wp_customize->add_setting(
            'travel_ticket_button_hover_color',
            array(
                'default'           => '#005a87',
                'sanitize_callback' => 'sanitize_hex_color',
                'transport'         => 'postMessage',
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'travel_ticket_button_hover_color_control',
                array(
                    'label'    => __( 'Button Hover Color', 'travel-ticket-theme' ),
                    'section'  => 'travel_ticket_colors',
                    'settings' => 'travel_ticket_button_hover_color',
                    'priority' => ++$priority,
                )
            )
        );
    }

endif;

add_action( 'customize_register', 'travel_ticket_customize_register' );

/**
 * Generate dynamic CSS based on customizer settings
 */
if ( ! function_exists( 'travel_ticket_get_custom_colors_css' ) ) :

    function travel_ticket_get_custom_colors_css() {
        $primary_color = get_theme_mod( 'travel_ticket_primary_color', '#0073aa' );
        $secondary_color = get_theme_mod( 'travel_ticket_secondary_color', '#005a87' );
        $accent_color = get_theme_mod( 'travel_ticket_accent_color', '#ff6b35' );
        $text_color = get_theme_mod( 'travel_ticket_text_color', '#333333' );
        $background_color = get_theme_mod( 'travel_ticket_background_color', '#ffffff' );
        $button_color = get_theme_mod( 'travel_ticket_button_color', '#0073aa' );
        $button_hover_color = get_theme_mod( 'travel_ticket_button_hover_color', '#005a87' );

        $css = "
        /* Travel Ticket Theme - Custom Colors */
        :root {
            --travel-ticket-primary-color: {$primary_color};
            --travel-ticket-secondary-color: {$secondary_color};
            --travel-ticket-accent-color: {$accent_color};
            --travel-ticket-text-color: {$text_color};
            --travel-ticket-background-color: {$background_color};
            --travel-ticket-button-color: {$button_color};
            --travel-ticket-button-hover-color: {$button_hover_color};
        }

        body {
            color: {$text_color};
            background-color: {$background_color};
        }

        a {
            color: {$primary_color};
        }

        a:hover,
        a:focus {
            color: {$secondary_color};
        }

        h1, h2, h3, h4, h5, h6 {
            color: {$text_color};
        }

        .btn, button, input[type=\"button\"], input[type=\"submit\"] {
            background-color: {$button_color};
        }

        .btn:hover, button:hover, input[type=\"button\"]:hover, input[type=\"submit\"]:hover {
            background-color: {$button_hover_color};
        }

        .site-header {
            background-color: {$primary_color};
        }

        .primary-menu a {
            color: #ffffff;
        }

        .primary-menu a:hover {
            color: {$accent_color};
        }

        .site-footer {
            background-color: {$secondary_color};
            color: #ffffff;
        }

        .site-footer a {
            color: {$accent_color};
        }

        .site-footer a:hover {
            color: #ffffff;
        }

        .ticket-card {
            border-top: 3px solid {$primary_color};
        }

        .price-tag {
            color: {$accent_color};
            font-weight: bold;
        }

        .badge-featured {
            background-color: {$accent_color};
            color: #ffffff;
        }
        ";

        return apply_filters( 'travel_ticket_custom_colors_css', $css );
    }

endif;

/**
 * Enqueue dynamic CSS from customizer settings
 */
if ( ! function_exists( 'travel_ticket_enqueue_custom_styles' ) ) :

    function travel_ticket_enqueue_custom_styles() {
        $custom_css = travel_ticket_get_custom_colors_css();
        wp_add_inline_style( 'travel-ticket-theme-style', $custom_css );
    }

endif;

add_action( 'wp_enqueue_scripts', 'travel_ticket_enqueue_custom_styles' );

/**
 * Enqueue custom styles for Customizer preview
 */
if ( ! function_exists( 'travel_ticket_customizer_preview_styles' ) ) :

    function travel_ticket_customizer_preview_styles() {
        wp_enqueue_script(
            'travel-ticket-customizer-preview',
            get_template_directory_uri() . '/js/customizer-preview.js',
            array( 'customize-preview' ),
            '1.0.0',
            true
        );
    }

endif;

add_action( 'customize_preview_init', 'travel_ticket_customizer_preview_styles' );
