<?php
/**
 * Front Page with full width sections.
 *
 * @author      Sridhar Katakam
 * @license      GPL-2.0+
 */
//* Enqueue Front page scripts and styles
add_action( 'wp_enqueue_scripts', 'sk_front_page_scripts_styles' );
function sk_front_page_scripts_styles() {
	wp_enqueue_style( 'bxslider-styles', get_stylesheet_directory_uri() . '/css/jquery.bxslider.css' );
	
	wp_enqueue_script( 'bxslider-js', get_stylesheet_directory_uri() . '/js/jquery.bxslider.min.js', array( 'jquery' ), '4.1.2', true );
	wp_enqueue_script( 'bxslider-init', get_stylesheet_directory_uri() . '/js/bxslider-init.js', array( 'bxslider-js' ), '1.0.0', true );
}
/**
 * Homepage Content
 *
 */
function sk_homepage_content() {
	//* Home Slider (Full Width) section
	genesis_widget_area( 'home-slider', array(
		'before'	=> '<div class="home-slider home-section home-odd">',
		'after'		=> '</div>',
	) );
	//* Horizontal Opt-in
	genesis_widget_area( 'horizontal-optin', array(
		'before' => '<div class="horizontal-optin home-section home-even"><div class="wrap">',
		'after' => '</div></div>',
	));
	//* 2-column Home Featured section
	echo '<div class="home-featured home-section home-odd"><div class="wrap">';
		genesis_widget_area( 'home-featured-left', array(
			'before'	=> '<div class="home-featured-left one-half first">',
			'after'		=> '</div>',
		) );
		genesis_widget_area( 'home-featured-right', array(
			'before'	=> '<div class="home-featured-right one-half">',
			'after'		=> '</div>',
		) );
	echo '</div></div>';
	//* Home Blog Posts section
	genesis_widget_area( 'home-blog', array(
		'before'	=> '<div class="home-blog home-section home-even"><div class="wrap">',
		'after'		=> '</div></div>',
	) );
	//* Home Testimonials section
	genesis_widget_area( 'home-testimonials', array(
		'before'	=> '<div class="home-testimonials home-section home-odd"><div class="wrap">',
		'after'		=> '</div></div>',
	) );
}
add_action( 'sk_content_area', 'sk_homepage_content' );
// Remove 'site-inner' from structural wrap
add_theme_support( 'genesis-structural-wraps', array(
	'header',
	'nav',
	'subnav',
	// 'site-inner',
	'footer-widgets',
	'footer'
) );
 
// Build the page
get_header();
do_action( 'sk_content_area' );
get_footer();