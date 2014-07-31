<?php
/**
 * Created by PhpStorm.
 * User: fuyukogratton
 * Date: 7/28/14
 * Time: 6:22 PM
 */

get_header();
?>
    <div id="primary-content" class="content-area">
        <div id="content" class="site-content" role="main">
            <?php if ( have_posts() ) : ?>

                <?php /* The loop */ ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'content'); ?>
                <?php endwhile; ?>

            <?php else : ?>
                <?php get_template_part( 'content'); ?>
            <?php endif; ?>

        </div><!-- #content-content -->
    </div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>