<?php
/**
 * Stashed Out filters and functions
 *
 * @package Stashed_Out
 */

if ( ! function_exists( 'stashed_out_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function stashed_out_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Stashed Out, use a find and replace
		 * to change 'stashed_out' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'stashed_out', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/**
		 * Thumbnail  Custom Sizes
		 */
		add_image_size( 'featured-thumb', 600, 320, array( 'center', 'center' ) );
		add_image_size( 'featured-square', 300, 300, array( 'center', 'center' ) );
		add_image_size( 'featured-big', 1240, 660, array( 'center', 'center' ) );
		add_image_size( 'featured-small', 120, 80, array( 'center', 'center' ) );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'top-menu'        => esc_html__( 'Header Menu', 'stashed_out' ),
				'footer-menu'     => esc_html__( 'Footer Menu', 'stashed_out' ),
                'social'          => esc_html__('Social Menu', 'stashed_out' ),
				'off-canvas-menu' => esc_html__( 'Off Canvas Menu', 'stashed_out' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'stashed_out_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'stashed_out_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function stashed_out_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'stashed_out_content_width', 640 );
}
add_action( 'after_setup_theme', 'stashed_out_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function stashed_out_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'stashed_out' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'stashed_out' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'stashed_out_widgets_init' );

if ( ! function_exists( 'stashed_out_get_post_views' ) ) :

    function stashed_out_get_post_views( $postID ){
        $count_key = 'post_views_count';
        $count = get_post_meta( $postID, $count_key, true );
        if( $count == '' ){
            delete_post_meta( $postID, $count_key );
            add_post_meta( $postID, $count_key, '0' );
            return 0;
        }
        return $count;
    }

endif;

// function to count views.
if ( ! function_exists( 'stashed_out_update_post_views' ) ) :

    function stashed_out_update_post_views( $postID ) {
        if( !current_user_can('administrator' ) ) {
            $user_ip = $_SERVER[ 'REMOTE_ADDR' ]; //retrieve the current IP address of the visitor
            $key = $user_ip . 'x' . $postID; //combine post ID & IP to form unique key
            $value = array( $user_ip, $postID ); // store post ID & IP as separate values (see note)
            $visited = get_transient( $key ); //get transient and store in variable

            //check to see if the Post ID/IP ($key) address is currently stored as a transient
            if( false === ( $visited ) ) {

                //store the unique key, Post ID & IP address for 12 hours if it does not exist
                set_transient( $key, $value, 60*60*12 );

                // now run post views function
                $count_key = 'post_views_count';
                $count = get_post_meta( $postID, $count_key, true );
                if( $count == '' ) {
                    $count = 0;
                    delete_post_meta( $postID, $count_key );
                    add_post_meta( $postID, $count_key, '0' );
                } else {
                    $count++;
                    update_post_meta( $postID, $count_key, $count );
                }
            }
        }
    }

endif;
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

//This grabs the first uploaded image in a post
function stashed_out_placeholder_image() {
    $files = get_children('post_parent='.get_the_ID().'&post_type=attachment
    &post_mime_type=image&order=desc');
    if( $files ) :
        $keys = array_reverse( array_keys( $files ) );
        $j = 0;
        $num = $keys[ $j ];
        $image = wp_get_attachment_image( $num, 'large', true );
        $imagepieces = explode('"', $image );
        $imagepath = $imagepieces[1];
        $main = wp_get_attachment_url( $num );
        $template = get_template_directory();
        $the_title = get_the_title();
        print "<img src='$main' alt='$the_title' class='featured-thumb' />";
    endif;
}
