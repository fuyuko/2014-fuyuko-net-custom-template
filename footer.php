<?php
/**
 * Created by PhpStorm.
 * User: fuyukogratton
 * Date: 7/28/14
 * Time: 6:23 PM
 */

?>
        </div><!--end of #main (header.php) -->
        <footer id="site-footer" role="contentinfo">
            <div id="footer-content-area" class="content-wrapper">
                <nav id="footer-nav">
                    <?php wp_nav_menu( array( 'theme_location' => 'footer-primary', 'menu_class' => 'nav-menu' ) ); ?>
                </nav>
                <p class="copyright">Copyright &copy; <?php echo date('Y'); ?> <?php bloginfo( 'title' ); ?></p>
            </div>
        </footer>
    </div><!--end of #page (header.php) -->

    <?php wp_footer(); ?>
</body>
</html>