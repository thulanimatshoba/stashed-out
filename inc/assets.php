<?php
/**
 * Stashed Out scripts and styles
 *
 * @package Stashed_Out
 */

/**
 * Enqueue scripts and styles.
 */
function stashed_out_scripts() {
	wp_enqueue_style( 'stashed_out-style', get_stylesheet_uri(), array(), STASHED_OUT_VERSION );
	wp_enqueue_style( 'stashed_out-uikit-style', get_template_directory_uri() . '/uikit/css/uikit.min.css', array(), STASHED_OUT_VERSION );
	wp_style_add_data( 'stashed_out-style', 'rtl', 'replace' );
	wp_enqueue_style( 'font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css', array(), STASHED_OUT_VERSION );

	wp_enqueue_script( 'stashed_out-navigation', get_template_directory_uri() . '/js/navigation.js', array(), STASHED_OUT_VERSION, true );
	wp_enqueue_script( 'stashed_out-uikit', get_template_directory_uri() . '/uikit/js/uikit.min.js', array(), STASHED_OUT_VERSION, true );
	wp_enqueue_script( 'stashed_out-uikit-icons', get_template_directory_uri() . '/uikit/js/uikit-icons.min.js', array(), STASHED_OUT_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'stashed_out_scripts' );
