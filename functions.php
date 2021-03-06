<?php
/**
 * Created by PhpStorm.
 * User: fuyukogratton
 * Date: 7/28/14
 * Time: 7:58 PM
 */

/***********************************

Script & Stylesheet Management
 * theme's default stylesheet - style.css

 ***********************************/
function fuyuko_net_scripts_styles(){
    // Loads our main stylesheet.
    wp_enqueue_style( '2014_fuyuko_net_style', get_stylesheet_uri(), array(), '2017-07-28' );

    if(!is_single()){ //grid-layout.js only needed for homepage site header
        wp_enqueue_script( 'jquery' );
        wp_enqueue_script( '2014_fuyuko_net_gridlayout', get_template_directory_uri() . '/js/grid-layout.js', 'jquery');
    }
}
add_action( 'wp_enqueue_scripts', 'fuyuko_net_scripts_styles' );

/***********************************

Menu Location
 * Site Navigation Menu - in the header area (primary nav)
 * Footer Primary Menu - in the footer area

 ***********************************/
function fuyuko_net_menu_setup(){
    register_nav_menu( 'primary', __( 'Site Navigation Menu', '2014_fuyuko_net' ) );
    register_nav_menu( 'footer-primary', __( 'Footer Primary Menu', '2014_fuyuko_net' ) );
}
add_action( 'after_setup_theme', 'fuyuko_net_menu_setup' );

/***********************************

Widget Registration
 * Sidebar Widget Area - All Pages

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

    register_sidebar( array(
        'name'          => __( 'Footer Widget Area - 3 Columns', '2014_fuyuko_net' ),
        'id'            => 'sidebar-footer-3',
        'description'   => __( 'Appears in Footer Area for All Pages.', '2014_fuyuko_net' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s third">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Widget Area - Full Width', '2014_fuyuko_net' ),
        'id'            => 'sidebar-footer-full',
        'description'   => __( 'Appears in Footer Area for All Pages.', '2014_fuyuko_net' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s whole">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'fuyuko_net_widgets_setup' );

/***********************************

Customizer
 * logo image upload - fuyuko_net_logo
 * background image upload - fuyuko_net_header_bg

 ***********************************/
function fuyuko_net_customize_setup( $wp_customize ) {

    //section defined
    $wp_customize->add_section( 'fuyuko_net_logo_section' , array(
        'title'       => __( 'Header and Logo', '2014_fuyuko_net' ),
        'priority'    => 30,
        'description' => 'Header Related Setting.',
    ) );

    //logo image upload - fuyuko_net_logo
    $wp_customize->add_setting( 'fuyuko_net_logo' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'fuyuko_net_logo', array(
        'label'    => __( 'Logo', '2014_fuyuko_net' ),
        'section'  => 'fuyuko_net_logo_section',
        'settings' => 'fuyuko_net_logo',
    ) ) );

    //background image upload - fuyuko_net_header_bg
    $wp_customize->add_setting( 'fuyuko_net_header_bg' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'fuyuko_net_header_bg', array(
        'label'    => __( 'Header Background', '2014_fuyuko_net' ),
        'section'  => 'fuyuko_net_logo_section',
        'settings' => 'fuyuko_net_header_bg',
    ) ) );

    //Site Headline - fuyuko_net_header_headline
    $wp_customize->add_setting( 'fuyuko_net_header_headline');
    $wp_customize->add_control('uyuko_net_header_headline', array(
        'label'      => __('Site Headline', '2014_fuyuko_net'),
        'section'    => 'fuyuko_net_logo_section',
        'settings'   => 'fuyuko_net_header_headline'
    ));
}
add_action( 'customize_register', 'fuyuko_net_customize_setup' );

/***********************************

Remove Jumping To More Position

 ***********************************/
function remove_more_jump_link($link) { 
	$offset = strpos($link, '#more-');
	if ($offset) {
		$end = strpos($link, '"',$offset);
	}
	if ($end) {
		$link = substr_replace($link, '', $offset, $end-$offset);
	}
	return $link;
}
add_filter('the_content_more_link', 'remove_more_jump_link');