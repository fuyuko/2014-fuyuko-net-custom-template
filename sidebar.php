<?php
/**
 * Created by PhpStorm.
 * User: fuyukogratton
 * Date: 7/28/14
 * Time: 8:47 PM
 */

if ( is_active_sidebar( 'sidebar-all' ) ) : ?>
    <div id="secondary-content" role="complementary">
        <div class="sidebar-inner content-wrapper">
            <div class="widget-area">
                <?php dynamic_sidebar( 'sidebar-all' ); ?>
            </div><!-- .widget-area -->
        </div><!-- .sidebar-inner -->
    </div><!-- #tertiary -->
<?php endif; ?>