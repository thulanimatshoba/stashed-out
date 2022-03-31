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
$info_blocks = carbon_get_the_post_meta('stashed_out_info_blocks');
$services = carbon_get_the_post_meta('stashed_out_services'); ?>

<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
<script>
    var typed = new Typed(".type", {
        strings: [
            "Ma ninja",
            "Lil boi",
            "Bro"
        ],
        typeSpeed: 60,
        backSpeed: 60,
        loop: true
    });
</script>

<style>
    #background-video {
        position: absolute;
        z-index: 0;
        object-fit: cover;
        width: 100%;
        height: 100%;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    @media (max-width: 750px) {
        #background-video {
            display: none;
        }
    }
</style>

<section id="hero" class="uk-flex uk-text-center">
    <!--    <video id="background-video" autoplay loop muted poster="https://assets.codepen.io/6093409/river.jpg">-->
    <!--        <source src="/wp-content/themes/stashed-out/img/ls-bg-video.mp4" type="video/mp4">-->
    <!--    </video>-->
    <h3 class="uk-margin-auto uk-margin-auto-vertical"><?php _e('Thulani Mtshoba'); ?><br><span><?php _e('You Know the vibes...'); ?><span class="type"></span></h3>
</section>

<!-- <span class="top-bg">
    <img src="https://suthemes.info/soap/wp-content/uploads/2021/06/bg-slider.png" />
</span> -->
<?php if ($info_blocks) : ?>
    <img src="https://suthemes.info/soap/wp-content/uploads/2021/06/bg-slider.png" class="vibes" />
    <section id="info-blocks" class="my-info-blocks">
        <div class="uk-container uk-container-large uk-padding">
            <?php get_template_part('partials/components/home-info', 'blocks'); ?>
        </div>
    </section>
<?php endif; ?>
<main id="primary" class="site-main">
    <?php
    while (have_posts()) :
        the_post();
        get_template_part('template-parts/pages/content', 'home');
    endwhile; // End of the loop.
    ?>
</main><!-- #main -->

<?php if ($services) : ?>
    <img src="https://suthemes.info/soap/wp-content/themes/soap/images/bg-testimonial-top.png" class="bottom-border" />
    <section id="services" class="my-services">
        <div class="uk-container uk-container-large uk-padding-large">
            <?php get_template_part('partials/components/home', 'services'); ?>
        </div>
    </section>
<?php endif; ?>

<img src="https://suthemes.info/soap/wp-content/uploads/2021/06/bg-slider.png" class="last-border" />
<section id="latest-news">
    <div class="uk-container uk-container-large uk-padding-large">
        <?php get_template_part('partials/components/home', 'blog'); ?>
    </div>
</section>

<?php
get_footer();
