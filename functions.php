<?php
/**
 * Created by PhpStorm.
 * User: fuyukogratton
 * Date: 7/28/14
 * Time: 7:58 PM
 */

/***********************************

Script & Stylesheet Management

 ***********************************/
function fuyuko_net_scripts_styles(){
    // Loads our main stylesheet.
    wp_enqueue_style( '2014_fuyuko_net_style', get_stylesheet_uri(), array(), '2017-07-28' );
}
add_action( 'wp_enqueue_scripts', 'fuyuko_net_scripts_styles' );

/***********************************

Menu Location

 ***********************************/
function fuyuko_net_menu_setup(){
    register_nav_menu( 'primary', __( 'Site Navigation Menu', '2014_fuyuko_net' ) );
    register_nav_menu( 'footer-primary', __( 'Footer Primary Menu', '2014_fuyuko_net' ) );
}
add_action( 'after_setup_theme', 'fuyuko_net_menu_setup' );

/***********************************

Widget Registration

 ***********************************/
function fuyuko_net_widgets_setup(){
    register_sidebar( array(
        'name'          => __( 'Sidebar Widget Area - All Pages', '2014_fuyuko_net' ),
        'id'            => 'sidebar-all',
        'description'   => __( 'Appears Secondary Content Area for All Pages.', '2014_fuyuko_net' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'fuyuko_net_widgets_setup' );

/***********************************

Customizer

 ***********************************/
function fuyuko_net_customize_setup( $wp_customize ) {
    //All our sections, settings, and controls will be added here

    $wp_customize->add_section( 'fuyuko_net_logo_section' , array(
        'title'       => __( 'Logo', '2014_fuyuko_net' ),
        'priority'    => 30,
        'description' => 'Upload a logo in the header',
    ) );

    $wp_customize->add_setting( 'fuyuko_net_logo' );


    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'fuyuko_net_logo', array(
        'label'    => __( 'Logo', '2014_fuyuko_net' ),
        'section'  => 'fuyuko_net_logo_section',
        'settings' => 'fuyuko_net_logo',
    ) ) );
}
add_action( 'customize_register', 'fuyuko_net_customize_setup' );