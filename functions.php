<?php
/**
 * Created by PhpStorm.
 * User: fuyukogratton
 * Date: 7/28/14
 * Time: 7:58 PM
 */

function fuyuko_net_custom_setup(){
    register_nav_menu( 'primary', __( 'Site Navigation Menu', '2014-fuyuko-net-custom-template' ) );
    register_nav_menu( 'footer-primary', __( 'Footer Primary Menu', '2014-fuyuko-net-custom-template' ) );
}
add_action( 'after_setup_theme', 'fuyuko_net_custom_setup' );

function fuyuko_net_scripts_styles(){
    // Loads our main stylesheet.
    wp_enqueue_style( '2014-fuyuko-net-custom-template-style', get_stylesheet_uri(), array(), '2017-07-28' );
}
add_action( 'wp_enqueue_scripts', 'fuyuko_net_scripts_styles' );

function fuyuko_net_widgets_init(){
    register_sidebar( array(
        'name'          => __( 'Sidebar Widget Area - All Pages', '014-fuyuko-net-custom-template' ),
        'id'            => 'sidebar-all',
        'description'   => __( 'Appears Secondary Content Area for All Pages.', '014-fuyuko-net-custom-template' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'fuyuko_net_widgets_init' );
