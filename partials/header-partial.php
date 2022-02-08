<header id="masthead" class="site-header">
    <div class="site-branding">
        <?php
        the_custom_logo();
        if (is_front_page() && is_home()) : ?>
            <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                      rel="home"><?php bloginfo('name'); ?></a></h1>
        <?php
        else : ?>
            <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                     rel="home"><?php bloginfo('name'); ?></a></p>
        <?php endif;
        $stashed_out_description = get_bloginfo('description', 'display');
        if ($stashed_out_description || is_customize_preview()) : ?>
            <p class="site-description"><?php echo $stashed_out_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
        <?php endif; ?>
    </div><!-- .site-branding -->

    <div class="header-intro uk-text-center">
        <h2><?php _e('2lanie Matshoba', 'stashed_out');?></h2>
        <h4><?php _e('Web Developer / Runner', 'stashed_out'); ?></h4>
    </div>

    <div class="social-menu uk-text-center">
        <?php get_template_part('partials/menus/social', 'menu'); ?>
    </div>

    <nav id="site-navigation" class="main-navigation">
        <i class="fa fa-bars" aria-hidden="true"></i>
        <?php get_template_part('partials/menus/header', 'menu'); ?>
    </nav><!-- #site-navigation -->
</header><!-- #masthead -->
