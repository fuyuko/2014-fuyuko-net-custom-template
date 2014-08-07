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
            <?php get_sidebar('footer'); ?>
            <div id="footer-content-area">
                <section class="secondary content-wrapper">
                    <p id="copyright">Copyright &copy; <?php echo date('Y'); ?> <?php bloginfo( 'title' ); ?></p>
                    <nav id="footer-nav">
                        <?php wp_nav_menu( array( 'theme_location' => 'footer-primary', 'menu_class' => 'nav-menu' ) ); ?>
                    </nav>

                </section>

            </div>
        </footer>
    </div><!--end of #page (header.php) -->

    <?php wp_footer(); ?>
</body>
</html>