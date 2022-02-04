<?php
/**
 * Template Name: Home Page
 *
 * This is the template that displays the front page by default.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Stashed_Out
 */

get_header();

$services = carbon_get_the_post_meta('stashed_out_services'); ?>
    <section id="hero" class="uk-flex uk-text-center">
        <h3 class="uk-margin-auto uk-margin-auto-vertical"><?php _e('Thulani Mtshoba'); ?><span class="type"></span>
        </h3>

        <script>
            require('typed.js');
            let typed = new Typed('.type', {
                strings: [
                    "This is a JavaScript library",
                    "This is an ES6 module",
                    "You know the vibes..."
                ],
                typeSpeed: 60,
                backSpeed: 60,
                loop: true
            });
        </script>
    </section>

    <main id="primary" class="site-main">
        <?php
        while (have_posts()) :
            the_post();
            get_template_part('template-parts/pages/content', 'home');
        endwhile; // End of the loop.
        ?>
    </main><!-- #main -->

<?php if ($services) : ?>
    <section id="services" class="my-services">
        <div class="uk-container uk-container-large">
            <?php get_template_part('partials/components/home', 'services'); ?>
        </div>
    </section>
<?php endif; ?>

    <div class="latest-news">
        <div class="uk-container uk-padding-large">
            <?php get_template_part( 'partials/components/home', 'blog' ); ?>
        </div>
    </div>

<?php
get_footer();
