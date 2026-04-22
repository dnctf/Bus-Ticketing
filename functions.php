<?php

if ( ! function_exists( 'travel_ticket_theme_setup' ) ) :

function travel_ticket_theme_setup() {

    load_theme_textdomain( 'travel-ticket-theme', get_template_directory() . '/languages' );

    add_theme_support( 'automatic-feed-links' );

    add_theme_support( 'title-tag' );

    add_theme_support( 'post-thumbnails' );

    add_theme_support( 'html5', array(

        'search-form',

        'comment-form',

        'comment-list',

        'gallery',

        'caption',

    ) );

    add_theme_support( 'custom-background', apply_filters( 'travel_ticket_theme_custom_background_args', array(

        'default-color' => 'ffffff',

        'default-image' => '',

    ) ) );

    add_theme_support( 'customize-selective-refresh-widgets' );

    add_theme_support( 'woocommerce' );

    register_nav_menus( array(

        'menu-1' => esc_html__( 'Primary', 'travel-ticket-theme' ),

    ) );

}

endif;

add_action( 'after_setup_theme', 'travel_ticket_theme_setup' );

function travel_ticket_theme_content_width() {

    $GLOBALS['content_width'] = apply_filters( 'travel_ticket_theme_content_width', 640 );

}

add_action( 'after_setup_theme', 'travel_ticket_theme_content_width', 0 );

function travel_ticket_theme_widgets_init() {

    register_sidebar( array(

        'name'          => esc_html__( 'Sidebar', 'travel-ticket-theme' ),

        'id'            => 'sidebar-1',

        'description'   => esc_html__( 'Add widgets here.', 'travel-ticket-theme' ),

        'before_widget' => '<section id="%1$s" class="widget %2$s">',

        'after_widget'  => '</section>',

        'before_title'  => '<h2 class="widget-title">',

        'after_title'  => '</h2>',

    ) );

}

add_action( 'widgets_init', 'travel_ticket_theme_widgets_init' );

function travel_ticket_theme_scripts() {

    wp_enqueue_style( 'travel-ticket-theme-style', get_stylesheet_uri(), array(), _S_VERSION );

    wp_style_add_data( 'travel-ticket-theme-style', 'rtl', 'replace' );

    wp_enqueue_script( 'travel-ticket-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {

        wp_enqueue_script( 'comment-reply' );

    }

}

add_action( 'wp_enqueue_scripts', 'travel_ticket_theme_scripts' );

require get_template_directory() . '/inc/custom-header.php';

require get_template_directory() . '/inc/config.php';

require get_template_directory() . '/inc/template-tags.php';

require get_template_directory() . '/inc/template-functions.php';

require get_template_directory() . '/inc/customizer.php';

require get_template_directory() . '/inc/language-switcher.php';

if ( defined( 'JETPACK__VERSION' ) ) {

    require get_template_directory() . '/inc/jetpack.php';

}