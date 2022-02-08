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
    <h3 class="uk-margin-auto uk-margin-auto-vertical"><?php _e('Thulani Mtshoba'); ?>
    </h3>
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
        <div class="stashed-out-shape" data-negative="false">
            <?php get_template_part('partials/svg/big-svg', 'after'); ?>
        </div>
        <div class="uk-container uk-container-large uk-padding-large">
            <?php get_template_part('partials/components/home', 'services'); ?>
        </div>
        <div class="stashed-out-shape top" data-negative="false">
            <?php get_template_part('partials/svg/big-svg', 'after'); ?>
        </div>
    </section>
<?php endif; ?>

<section id="latest-news">
    <div class="uk-container uk-container-large uk-padding-large">
        <?php get_template_part('partials/components/home', 'blog'); ?>
    </div>
</section>

<?php
get_footer();
