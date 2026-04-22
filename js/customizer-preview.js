/**
 * Travel Ticket Theme - Customizer Preview Script
 * Handles real-time color customization preview
 */

(function( $ ) {
    'use strict';

    // Primary Color
    wp.customize( 'travel_ticket_primary_color', function( value ) {
        value.bind( function( newval ) {
            // Update CSS variables
            $( 'html' ).get( 0 ).style.setProperty( '--travel-ticket-primary-color', newval );
            
            // Update links
            $( 'a' ).css( 'color', newval );
            
            // Update header background
            $( '.site-header' ).css( 'background-color', newval );
            
            // Update ticket cards border
            $( '.ticket-card' ).css( 'border-top-color', newval );
            
            // Update button color if not specifically set
            $( '.btn, button, input[type="button"], input[type="submit"]' ).css( 'background-color', newval );
        } );
    } );

    // Secondary Color
    wp.customize( 'travel_ticket_secondary_color', function( value ) {
        value.bind( function( newval ) {
            $( 'html' ).get( 0 ).style.setProperty( '--travel-ticket-secondary-color', newval );
            
            // Update link hover
            $( 'style' ).append( '<style>a:hover { color: ' + newval + ' !important; }</style>' );
            
            // Update footer
            $( '.site-footer' ).css( 'background-color', newval );
        } );
    } );

    // Accent Color
    wp.customize( 'travel_ticket_accent_color', function( value ) {
        value.bind( function( newval ) {
            $( 'html' ).get( 0 ).style.setProperty( '--travel-ticket-accent-color', newval );
            
            // Update accent elements
            $( '.badge-featured' ).css( 'background-color', newval );
            $( '.price-tag' ).css( 'color', newval );
            $( '.primary-menu a:hover' ).css( 'color', newval );
        } );
    } );

    // Text Color
    wp.customize( 'travel_ticket_text_color', function( value ) {
        value.bind( function( newval ) {
            $( 'html' ).get( 0 ).style.setProperty( '--travel-ticket-text-color', newval );
            $( 'body' ).css( 'color', newval );
            $( 'h1, h2, h3, h4, h5, h6' ).css( 'color', newval );
        } );
    } );

    // Background Color
    wp.customize( 'travel_ticket_background_color', function( value ) {
        value.bind( function( newval ) {
            $( 'html' ).get( 0 ).style.setProperty( '--travel-ticket-background-color', newval );
            $( 'body' ).css( 'background-color', newval );
        } );
    } );

    // Button Color
    wp.customize( 'travel_ticket_button_color', function( value ) {
        value.bind( function( newval ) {
            $( 'html' ).get( 0 ).style.setProperty( '--travel-ticket-button-color', newval );
            $( '.btn, button, input[type="button"], input[type="submit"]' ).css( 'background-color', newval );
        } );
    } );

    // Button Hover Color
    wp.customize( 'travel_ticket_button_hover_color', function( value ) {
        value.bind( function( newval ) {
            $( 'html' ).get( 0 ).style.setProperty( '--travel-ticket-button-hover-color', newval );
        } );
    } );

})( jQuery );
