<?php
/**
 * Language switcher functionality for Travel Ticket Theme
 */

if ( ! function_exists( 'travel_ticket_language_switcher' ) ) :

    function travel_ticket_language_switcher() {
        $current_lang = get_locale();
        $languages = array(
            'en_US' => array(
                'code' => 'en',
                'name' => __( 'English', 'travel-ticket-theme' ),
                'flag' => '🇺🇸',
            ),
            'id_ID' => array(
                'code' => 'id',
                'name' => __( 'Indonesian', 'travel-ticket-theme' ),
                'flag' => '🇮🇩',
            ),
        );

        $output = '<div class="language-switcher">';
        $output .= '<label for="travel-ticket-language">' . esc_html__( 'Language', 'travel-ticket-theme' ) . ': </label>';
        $output .= '<select id="travel-ticket-language" class="travel-ticket-language-select" onchange="travel_ticket_switch_language(this.value)">';

        foreach ( $languages as $locale => $lang_info ) {
            $selected = ( $current_lang === $locale ) ? 'selected' : '';
            $output .= '<option value="' . esc_attr( $locale ) . '" ' . $selected . '>';
            $output .= esc_html( $lang_info['flag'] . ' ' . $lang_info['name'] );
            $output .= '</option>';
        }

        $output .= '</select>';
        $output .= '</div>';

        return $output;
    }

endif;

if ( ! function_exists( 'travel_ticket_display_language_switcher' ) ) :

    function travel_ticket_display_language_switcher() {
        echo travel_ticket_language_switcher(); // phpcs:ignore
    }

endif;

/**
 * Get available languages
 */
if ( ! function_exists( 'travel_ticket_get_available_languages' ) ) :

    function travel_ticket_get_available_languages() {
        return apply_filters( 'travel_ticket_available_languages', array(
            'en_US' => 'English',
            'id_ID' => 'Indonesian',
        ) );
    }

endif;

/**
 * Get current language
 */
if ( ! function_exists( 'travel_ticket_get_current_language' ) ) :

    function travel_ticket_get_current_language() {
        return get_locale();
    }

endif;

/**
 * Enqueue language switcher script
 */
if ( ! function_exists( 'travel_ticket_enqueue_language_script' ) ) :

    function travel_ticket_enqueue_language_script() {
        wp_enqueue_script(
            'travel-ticket-language-switcher',
            get_template_directory_uri() . '/js/language-switcher.js',
            array(),
            '1.0.0',
            true
        );

        // Localize script with data
        wp_localize_script( 'travel-ticket-language-switcher', 'travelTicketLang', array(
            'ajax_url' => admin_url( 'admin-ajax.php' ),
            'nonce' => wp_create_nonce( 'travel_ticket_language_nonce' ),
        ) );
    }

endif;

add_action( 'wp_enqueue_scripts', 'travel_ticket_enqueue_language_script' );

/**
 * AJAX handler to change language
 */
if ( ! function_exists( 'travel_ticket_change_language_ajax' ) ) :

    function travel_ticket_change_language_ajax() {
        check_ajax_referer( 'travel_ticket_language_nonce', 'nonce' );

        $language = sanitize_text_field( wp_unslash( $_POST['language'] ?? 'en_US' ) );

        // Store language preference in session/cookie
        setcookie( 'travel_ticket_language', $language, time() + ( 86400 * 365 ), '/' );

        wp_send_json_success( array( 'language' => $language ) );
    }

endif;

add_action( 'wp_ajax_travel_ticket_change_language', 'travel_ticket_change_language_ajax' );
add_action( 'wp_ajax_nopriv_travel_ticket_change_language', 'travel_ticket_change_language_ajax' );

/**
 * Set language from cookie or user locale
 */
if ( ! function_exists( 'travel_ticket_set_language' ) ) :

    function travel_ticket_set_language() {
        if ( is_user_logged_in() ) {
            $user_language = get_user_meta( get_current_user_id(), 'travel_ticket_language', true );
            if ( ! empty( $user_language ) ) {
                return $user_language;
            }
        }

        // Check for language cookie
        if ( isset( $_COOKIE['travel_ticket_language'] ) ) {
            return sanitize_text_field( wp_unslash( $_COOKIE['travel_ticket_language'] ) );
        }

        // Return default language
        return 'en_US';
    }

endif;
