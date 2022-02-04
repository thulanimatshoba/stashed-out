<?php
/**
 * Template part for displaying page content in front-page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Stashed_Out
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="uk-container uk-container-large">
        <header class="entry-header">
            <?php the_title('<h1 class="entry-title uk-text-center uk-padding">', '</h1>'); ?>
        </header><!-- .entry-header -->

        <?php stashed_out_post_thumbnail(); ?>

        <div class="entry-content">
            <?php
            the_content();

            wp_link_pages(
                array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'stashed_out'),
                    'after' => '</div>',
                )
            );
            ?>
        </div><!-- .entry-content -->

        <?php if (get_edit_post_link()) : ?>
            <footer class="entry-footer">
                <?php
                edit_post_link(
                    sprintf(
                        wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                            __('Edit <span class="screen-reader-text">%s</span>', 'stashed_out'),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        wp_kses_post(get_the_title())
                    ),
                    '<span class="edit-link">',
                    '</span>'
                );
                ?>
            </footer><!-- .entry-footer -->
        <?php endif; ?>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
