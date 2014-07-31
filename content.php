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


            <?php
                if ( has_post_thumbnail()) {
                    $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                }
            ?>
            <div class="entry-thumbnail" <?php if($url != NULL){ echo 'style="background-image: url(' . $url . ');"';} ?>>
                <div class="entry-header-text">

                    <?php if ( is_single() ) : ?>
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                    <?php else : ?>
                        <h1 class="entry-title">
                            <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                        </h1>
                    <?php endif; // is_single() ?>

                    <div class="entry-meta">
                        <?php the_date('F j, Y', '<h6 class="date">', '</h6>'); ?>
                        <?php edit_post_link( __( 'Edit'), '<span class="edit-link">', '</span>' ); ?>
                        <?php
                            $categories_list = get_the_category_list( ', ' );
                            if ( $categories_list ) {
                            echo '<span class="categories-links">' . $categories_list . '</span>';
                            }
                        ?>
                        <?php
                            $tag_list = get_the_tag_list( '', ", " );
                            if ( $tag_list ) {
                                echo '<span class="tags-links">' . $tag_list . '</span>';
                            }
                        ?>
                    </div><!-- .entry-meta -->
                </div><!-- .entery-header-text -->
            </div><!-- .entry-thumbnail -->



    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>') ); ?>
        <?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:') . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
    </div><!-- .entry-content -->

    <footer class="entry-meta">
        <?php if ( comments_open()){
            if(!is_page() && !is_single()){
        ?>
                <div class="comments-link">
                    <?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment') . '</span>', __( 'One comment so far'), __( 'View all % comments') ); ?>
                </div><!-- .comments-link -->
        <?php   }else{ ?>
                <?php comments_template(); ?>
        <?php
                }
            } // comments_open()
        ?>
    </footer><!-- .entry-meta -->
</article><!-- #post -->