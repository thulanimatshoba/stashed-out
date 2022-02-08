<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Stashed_Out
 */

?>
<?php if (get_theme_mod('sn_bottom_footer_section_show_setting') == "Yes") { ?>
<div class="footer-wrapper">
<?php if (get_theme_mod('tm-footer-callout-display') == "Yes") { ?>
    <div class="footer-top">
        <div class="uk-container">
            <div class="footer-callout clearfix">
                <div class="footer-callout-image">
                    <a href="<?php echo get_permalink(get_theme_mod('tm-footer-callout-link')) ?>"><img src="<?php echo wp_get_attachment_url(get_theme_mod('tm-footer-callout-image')) ?>"></a>
                </div>

                <div class="footer-callout-text">
                    <h2 class="uk-h2"><a href="<?php echo get_permalink(get_theme_mod('tm-footer-callout-link')) ?>"><?php echo get_theme_mod('tm-footer-callout-headline') ?></a></h2>
                    <?php echo wpautop(get_theme_mod('tm-footer-callout-text')) ?>
                    <p><a href="<?php echo get_permalink(get_theme_mod('tm-footer-callout-link')) ?>"><strong><?php _e('Learn more &raquo;');  ?></strong></a></p>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>

	<footer id="colophon" class="site-footer">
		<div class="site-info uk-text-center">
            <div>
                <?php _e('All rights reserved &copy;');?> <?php echo date("Y"); echo " "; bloginfo('name'); ?>
            </div>
            <div>
                <?php printf( esc_html__( 'Developed by: %2$s', 'stashed_out' ), 'stashed_out', '<a target="_blank" href="http://thulanimatshoba.co.za">Thulani Matshoba</a>' ); ?>
            </div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	<?php } ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
