<?php
/**
 * Created by PhpStorm.
 * User: fuyukogratton
 * Date: 7/28/14
 * Time: 9:07 PM
 */
?>

<article id="content-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">

            <div class="entry-thumbnail">
                <?php if ( has_post_thumbnail()) { ?>
                    <?php the_post_thumbnail(); ?>
                <?php } ?>
                <div class="entery-header-text">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                    <div class="entry-meta">
                        <?php edit_post_link( __( 'Edit'), '<span class="edit-link">', '</span>' ); ?>
                    </div><!-- .entry-meta -->
                </div>

            </div>



    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>') ); ?>
        <?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:') . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
    </div><!-- .entry-content -->

    <footer class="entry-meta">
        <?php if ( comments_open()) : ?>
            <div class="comments-link">
                <?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment') . '</span>', __( 'One comment so far'), __( 'View all % comments') ); ?>
            </div><!-- .comments-link -->
        <?php endif; // comments_open() ?>
    </footer><!-- .entry-meta -->
</article><!-- #post -->