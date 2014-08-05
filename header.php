<?php
/**
 * Created by PhpStorm.
 * User: fuyukogratton
 * Date: 7/28/14
 * Time: 6:22 PM
 */
?><!DOCTYPE html>
<html>
<head>
    <title><?php bloginfo( 'name' ); ?><?php wp_title(' - '); ?></title>
    <?php wp_head(); ?>
    <script>
        jQuery( document ).ready(function( $ ) {

            function grid_resize(){
                //get the vertical height of the product image
                var sample_grid = document.getElementById('grid-1');
                var new_height = sample_grid.offsetWidth;
                //apply to standard and metric that as its height
                for(i=1; i < 4; i++){
                    var class_name = ".row-".concat(i);
                    $(class_name).css( "height", new_height*i + "px");
                }

                $(".vertical").css("height", "100%");
                $(".vertical").css("width", "200%");
            }

            $( window ).load(function() {
                grid_resize();
            });

            $( window ).resize(function() {
                grid_resize();
            });
        });

    </script>
</head>

<body <?php body_class(); ?>>

    <div id="page">

        <header id="site-header" role="banner">

            <div id="grid-header-image" class="container">
                <div class="wrapper">
                    <?php include('header-grid.php'); ?>
                    <div id="site-headline"><?php echo get_theme_mod( 'fuyuko_net_header_headline' ); ?></div>
                    <div id="header-content-area">
                        <hgroup>
                            <img class="site-logo" src='<?php echo esc_url( get_theme_mod( 'fuyuko_net_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
                            <h1 id="site-title"><?php bloginfo( 'name' ); ?></h1>
                            <h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
                        </hgroup>
                    </div>

                </div>
            </div>
            <div id="header-nav-area">
                <div class="content-wrapper" style="padding: 0;">
                    <?php if ( get_theme_mod( 'fuyuko_net_logo' ) ) : ?>
                        <div class='site-logo'>
                            <a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                                <img src='<?php echo esc_url( get_theme_mod( 'fuyuko_net_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
                            </a>
                        </div>
                    <?php endif; ?>
                    <nav id="header-nav">
                        <?php get_search_form(); ?>
                        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
                    </nav>
                </div>
            </div>
        </header>

        <div id="main">