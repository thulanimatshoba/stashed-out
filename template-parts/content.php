<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Stashed_Out
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="uk-container uk-container-large">
        <?php stashed_out_post_thumbnail(); ?>
    </div>

    <header class="entry-header">
        <div class="uk-container uk-container-small">
            <?php
            if (is_singular()) :
                the_title('<h1 class="entry-title">', '</h1>');
            else :
                the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
            endif;

            if ('post' === get_post_type()) :
            ?>
                <div class="entry-meta">
                    <?php
                    stashed_out_posted_by();
                    stashed_out_posted_on();
                    stashed_out_posted_in();
                    ?>
                </div><!-- .entry-meta -->
            <?php endif; ?>
        </div>
    </header><!-- .entry-header -->



    <div class="entry-content">
        <div class="uk-container uk-container-small">
            <?php
            the_content(
                sprintf(
                    wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                        __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'stashed_out'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    wp_kses_post(get_the_title())
                )
            );

            wp_link_pages(
                array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'stashed_out'),
                    'after'  => '</div>',
                )
            );
            ?>
        </div>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <div class="uk-container uk-container-small uk-padding-small">
            <?php stashed_out_entry_footer(); ?>
        </div>
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->