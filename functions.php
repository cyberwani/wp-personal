<?php

/**
 * @package carrington-personal
 *
 * This file is part of the Carrington Personal Theme for WordPress
 * http://crowdfavorite.com/wordpress/themes/carrington-personal/
 *
 * Copyright (c) 2008-2010 Crowd Favorite, Ltd. All rights reserved.
 * http://crowdfavorite.com
 *
 * **********************************************************************
 * This program is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. 
 * **********************************************************************
 */

if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); }

load_theme_textdomain('carrington-personal');

/**
 * Set this to "true" to turn on debugging mode.
 * Debug helps with development by showing you the paths of the files loaded by Carrington.
 */
define('CFCT_DEBUG', false);

define('CFCT_PATH', trailingslashit(TEMPLATEPATH));

/**
 * Theme version.
 */
define('CFCT_THEME_VERSION', '1.0');

/**
 * Theme URL version.
 * Added to query var at the end of assets to force browser cache to reload after upgrade.
 */
define('CFCT_URL_VERSION', '0.2');

/**
 * Includes
 */
include_once(CFCT_PATH.'carrington-core/carrington.php');
include_once(CFCT_PATH.'functions/sidebars.php');
include_once(CFCT_PATH.'plugins/cf-compat/cf-compat.php');

if ( ! function_exists( 'carrington_personal_setup' ) ) {
	function carrington_personal_setup() {
		// Add default posts and comments RSS feed links to head
		add_theme_support( 'automatic-feed-links' );
		
		// This theme uses post thumbnails
		add_theme_support( 'post-thumbnails' );
		// Set thumbnail size (width, height, crop)
		set_post_thumbnail_size(150, 120, true);
		// New image size for featured image
		add_image_size( 'featured-img', 300, 170, true );
		
		// Add post formats
		add_theme_support( 'post-formats', array('aside','audio','gallery','image','link','video','status','quote','chat'));
		
		register_nav_menus(array(
			'main' => __( 'Main Navigation', 'carrington-personal' ),
			'footer' => __( 'Footer Navigation', 'carrington-personal' )
		));
		
		// Let's load some scripts
		if( !is_admin()){
			wp_enqueue_script('global', get_bloginfo('template_directory').'/js/global.js', array('jquery'), CFCT_URL_VERSION);
		}
		
	}
}
add_action( 'after_setup_theme', 'carrington_personal_setup' );

/**
 * Kuler Color Integration
 * http://kuler.adobe.com
 */

// Convert color to RGB so we can use background opacity
function hex2rgb( $color ) {
	if ( $color[0] == '#' ) {
			$color = substr( $color, 1 );
	}
	if ( strlen( $color ) == 6 ) {
			list( $r, $g, $b ) = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
	} elseif ( strlen( $color ) == 3 ) {
			list( $r, $g, $b ) = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
	} else {
			return false;
	}
	$r = hexdec( $r );
	$g = hexdec( $g );
	$b = hexdec( $b );
	return array( $r, $g, $b );
}
function echo_hex($color2hex) {
	$color_array = hex2rgb($color2hex);
	for ($i=0; $i < 3; $i++) { 
		echo $color_array[$i].',';
	}
}

// Replaces "[...]" with something more pretty
function cfcp_excerpt_more( $more ) {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'cfcp_excerpt_more' );

// Common date formatting. Uses plugins/cf-compat/
function cfcp_date() {
	global $post;
	return cf_relative_time_ago($post->post_date, '', 'ago', '4', 'm.d.y', '');
}

// Prettier captions
function cfcp_img_captions($attr, $content = null) {
	$output = apply_filters('img_caption_shortcode', '', $attr, $content);
	if (condition) {
		# code...
	}
	if ($output != '') {
		return $output;
	}
	extract(shortcode_atts(array(
		'id'	=> '',
		'align'	=> 'alignnone',
		'width'	=> '',
		'caption' => ''
	), $attr));
	if ( 1 > (int) $width || empty($caption) ) {
		return $content;
	}
	if ( $id ) {
		$id = 'id="' . $id . '" ';
	}
	return '
		<dl ' . $id . 'class="wp-caption ' .$align. '" style="width: ' .$width. 'px">
			<dt>'.do_shortcode( $content ).'</dt>
			<dd class="wp-caption-text">' .$caption. '</dd>
		</dl>';
}
add_shortcode('wp_caption', 'cfcp_img_captions');
add_shortcode('caption', 'cfcp_img_captions');