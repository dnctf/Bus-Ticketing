/**
 * Travel Ticket Theme - Language Switcher Script
 * Handles language switching functionality
 */

function travel_ticket_switch_language( language ) {
    'use strict';

    // Show loading indicator (optional)
    var spinner = jQuery( '<span class="language-loading">...</span>' );

    jQuery.ajax( {
        type: 'POST',
        url: travelTicketLang.ajax_url,
        data: {
            action: 'travel_ticket_change_language',
            language: language,
            nonce: travelTicketLang.nonce,
        },
        success: function( response ) {
            if ( response.success ) {
                // Reload page to apply language changes
                window.location.reload();
            } else {
                console.error( 'Language switch failed', response );
            }
        },
        error: function( error ) {
            console.error( 'AJAX error:', error );
        },
    } );
}

/**
 * Initialize language switcher on document ready
 */
jQuery( document ).ready( function( $ ) {
    'use strict';

    // Add any initialization code for language switcher here
    var languageSelect = $( '.travel-ticket-language-select' );

    if ( languageSelect.length > 0 ) {
        languageSelect.on( 'change', function() {
            travel_ticket_switch_language( this.value );
        } );
    }

    // Persist language preference
    if ( localStorage.getItem( 'travel_ticket_language' ) ) {
        var savedLanguage = localStorage.getItem( 'travel_ticket_language' );
        languageSelect.val( savedLanguage );
    }
} );

// Store language preference in localStorage
function travel_ticket_store_language_preference( language ) {
    'use strict';

    localStorage.setItem( 'travel_ticket_language', language );
}
