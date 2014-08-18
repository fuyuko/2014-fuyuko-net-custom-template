<?php
/**
 * Created by PhpStorm.
 * User: fuyukogratton
 * Date: 7/28/14
 * Time: 8:47 PM
 */
?>

    <div id="footer-widgets" role="complementary">
        <div class="sidebar-inner content-wrapper">
            <div class="widget-area">
                <?php
                if ( is_active_sidebar( 'sidebar-footer-3' ) ) :
                    dynamic_sidebar( 'sidebar-footer-3' );
                endif;
                if ( is_active_sidebar( 'sidebar-footer-full' ) ) :
                    dynamic_sidebar( 'sidebar-footer-full' );
                endif;
                ?>
            </div><!-- .widget-area -->
        </div><!-- .sidebar-inner -->
    </div><!-- #tertiary -->
