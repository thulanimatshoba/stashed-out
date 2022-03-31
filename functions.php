<?php

/**
 * Stashed Out functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Stashed_Out
 */

if (!defined('STASHED_OUT_VERSION')) {
	// Replace the version number of the theme on each release.
	define('STASHED_OUT_VERSION', '1.0.0');
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
// if (class_exists('WooCommerce')) {
// 	require get_template_directory() . '/inc/woocommerce.php';
// }

add_action('after_setup_theme', function () {
	add_theme_support('woocommerce');
});

/**
 * Load Kirki
 */
require get_template_directory() . '/inc/kirki.php';

/**
 * Assets.
 */
require get_template_directory() . '/inc/assets.php';

/**
 * Filters.
 */
require get_template_directory() . '/inc/filters.php';

/**
 * GA Tracking.
 */
require get_template_directory() . '/inc/ga-tracking.php';

/**
 * Post Meta
 */
require get_template_directory() . '/inc/post-meta.php';
