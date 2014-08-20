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
    <link href='http://fonts.googleapis.com/css?family=Bitter:400,700,400italic' rel='stylesheet' type='text/css'>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <div id="page">
        <header id="site-header" role="banner">
        <?php if(is_home() || is_front_page() || !is_single()){ ?>
            <div id="grid-header-image" class="container">
                <div class="wrapper">
                    <?php include('header-grid.php'); ?>
                    <div id="site-headline">
                    <?php
                        if(is_home() || is_front_page()){ //homepage
                            echo get_theme_mod( 'fuyuko_net_header_headline' );
                        }
                    else{
                        if ( is_day() ) :
                            printf( __( 'Daily Archives: %s', 'twentythirteen' ), get_the_date() );
                        elseif ( is_month() ) :
                            printf( __( 'Monthly Archives: %s', 'twentythirteen' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'twentythirteen' ) ) );
                        elseif ( is_year() ) :
                            printf( __( 'Yearly Archives: %s', 'twentythirteen' ), get_the_date( _x( 'Y', 'yearly archives date format', 'twentythirteen' ) ) );
						elseif ( is_page() ) :
							the_title();
                        else :
                            echo single_cat_title( '', false );
                        endif;

                    }
                    ?>
                    </div>
                    <div id="header-content-area">
                        <hgroup>
                            <img class="site-logo" src='<?php echo esc_url( get_theme_mod( 'fuyuko_net_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
                            <h1 id="site-title"><?php bloginfo( 'name' ); ?></h1>
                            <h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
                        </hgroup>
                    </div>

                </div>
            </div>
        <?php } ?>
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