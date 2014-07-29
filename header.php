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
</head>

<body <?php body_class(); ?>>

    <div id="page">

        <header id="site-header" role="banner">
            <div id="header-content-area" class="content-wrapper">
                <hgroup>
                    <h1 id="site-title"><?php bloginfo( 'name' ); ?></h1>
                    <h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
                </hgroup>
            </div>
            <nav id="header-nav">
                <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
            </nav>
        </header>

        <div id="main">