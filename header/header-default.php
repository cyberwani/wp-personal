<?php

/**
 * @package favepersonal
 *
 * This file is part of the FavePersonal Theme for WordPress
 * http://crowdfavorite.com/wordpress/themes/favepersonal/
 *
 * Copyright (c) 2008-2011 Crowd Favorite, Ltd. All rights reserved.
 * http://crowdfavorite.com
 *
 * **********************************************************************
 * This program is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. 
 * **********************************************************************
 */

if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); }
if (CFCT_DEBUG) { cfct_banner(__FILE__); }

$blog_desc = get_bloginfo('description');
$title_description = (is_home() && !empty($blog_desc) ? ' - '.$blog_desc : '');
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" <?php language_attributes() ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" <?php language_attributes() ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" <?php language_attributes() ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes() ?>> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo('charset') ?>" />
	<title><?php wp_title( '-', true, 'right' ); echo esc_html( get_bloginfo('name'), 1 ).$title_description; ?></title>
	<?php /*
	Empty conditional comment prevents blocking downloads in IE8. Good ol' IE.
	See http://www.phpied.com/conditional-comments-block-downloads/ for more info. */ ?>
	<!--[if IE]><![endif]-->
	
	<!-- <link rel="stylesheet" type="text/css" media="screen, print, handheld" href="<?php bloginfo('template_url') ?>/css/css.php?ver=<?php echo CFCT_URL_VERSION; ?>" /> -->
	<style type="text/css" media="screen">
	/* This is only colors, plan to get this working from /css/color.php */
	body {
		background-color: <?php echo cf_kuler_color('dark', 'body_background'); ?>;
	}
	a {
		color: <?php echo cf_kuler_color('darkest', 'a'); ?>;
		text-decoration: none;
	}
	a:hover {
		color: <?php echo cf_kuler_color('medium', 'a_hover'); ?>;
	}

	/** Header
	 -------------------------------------------------- */
	#header {
		background-color: <?php echo cf_kuler_color('darkest', 'header_background'); ?>;
		border-bottom: 4px solid <?php echo cf_kuler_color('dark', 'header_border'); ?>;
	}
	#header a {
		color: <?php echo cf_kuler_color('lightest', 'header_a'); ?>;
	}
	#header a:hover {
		color: <?php echo cf_kuler_color('medium', 'header_a_hover'); ?>;
	}
	/* Menu */
	#header #nav-main ul li,
	#header .menu ul li {
		border-bottom: 3px solid <?php echo cf_kuler_color('darkest', 'header_menu_li_border'); ?>;
	}
	#header #nav-main ul li:hover,
	#header #nav-main ul li.current_page_item,
	#header #nav-main ul li.current-menu-parent,
	#header .menu ul li:hover,
	#header .menu ul li.current_page_item,
	#header .menu ul li.current_page_parent {
		border-bottom: 3px solid <?php echo cf_kuler_color('dark', 'header_menu_li_border_hover'); ?>;
	}
	/* Sub Menu */
	#header ul ul li a:hover {
		color: <?php echo cf_kuler_color('darkest', 'header_menu_li_a_hover'); ?>;
	}
	#header #nav-main ul ul,
	#header .menu ul ul {
		background: <?php echo cf_kuler_color('dark', 'header_menu_ul_ul_background'); ?>;
		border: 3px solid <?php echo cf_kuler_color('darkest', 'header_menu_ul_ul_border'); ?>;
		border-top: 0;
	}
	#header #nav-main ul ul li,
	#header #nav-main ul ul li:hover,
	#header #nav-main ul ul li.current_page_item,
	#header .menu ul ul li,
	#header .menu ul ul li:hover,
	#header .menu ul ul li.current_page_item {
		border-bottom: 0;
	}
	#header #nav-main ul ul li.current_page_item > a,
	#header .menu ul ul li.current_page_item > a {
		border-left: 3px solid <?php echo cf_kuler_color('darkest', 'header_menu_current_a_border_left'); ?>;
		border-right: 3px solid <?php echo cf_kuler_color('darkest', 'header_menu_current_a_border_right'); ?>;
	}

	/** Masthead
	 -------------------------------------------------- */
	#masthead {
		background-color: <?php echo cf_kuler_color('dark', 'masthead_background'); ?>;
	}
	/* featured posts */
	#featured-posts .featured {
		background-color: <?php echo cf_kuler_color('darkest', 'featured_posts_background') ?>;
	}
	#featured-posts .featured-title,
	#featured-posts .has-featured-img .featured-format {
		background-color: <?php echo cf_kuler_color('darkest', 'featured_posts_title_background') ?>;
		color: <?php echo cf_kuler_color('lightest', 'featured_posts_title_color') ?>;
	}
	#featured-posts .featured-content {
		color: <?php echo cf_kuler_color('lightest', 'featured_posts_content_color') ?>;
	}
	/* gallery */
	/* set bg color to tile featured gallery with less than 4 images */
	#featured-posts .gallery-img-excerpt li.excerpt-img-0 {
		background-color: <?php echo cf_kuler_color('light', 'featured_gallery_img_0') ?>;
	}
	#featured-posts .gallery-img-excerpt li.excerpt-img-1 {
		background-color: <?php echo cf_kuler_color('medium', 'featured_gallery_img_1') ?>;
	}
	#featured-posts .gallery-img-excerpt li.excerpt-img-2 {
		background-color: <?php echo cf_kuler_color('medium', 'featured_gallery_img_2') ?>;
	}
	#featured-posts .gallery-img-excerpt li.excerpt-img-3 {
		background-color: <?php echo cf_kuler_color('light', 'featured_gallery_img_3') ?>;
	}
	/* video */
	#featured-posts .featured-format-video {
		background-color: <?php echo cf_kuler_color('medium', 'featured_format_video_background') ?>;
	}
	
	/* rollover */
	#featured-posts .featured:hover .featured-content {
		background-color: rgb(<?php echo_hex(cf_kuler_color('light', 'featured_posts_hover_background')); ?>); /* fallback for IE */
		background-color: rgba(<?php echo_hex(cf_kuler_color('light', 'featured_posts_hover_background')); ?>, .8);
		color: <?php echo cf_kuler_color('darkest', 'featured_posts_hover_color') ?>;
	}
	
	/** Post
	 -------------------------------------------------- */
	.post-title {
		color: <?php echo cf_kuler_color('dark', 'post_title_color'); ?>;
	}
	.post-meta a:hover {
		color: <?php echo cf_kuler_color('darkest', 'post_meta_a_hover_color'); ?>;
	}
	.post-media a:hover {
		border-bottom-color: <?php echo cf_kuler_color('medium', 'post_media_hover_border'); ?>;
	}
	.link-screenshot:hover {
		border-bottom-color: <?php echo cf_kuler_color('medium', 'link_screenshot_hover_border'); ?>;
	}

	/** Sidebar, Widgets, Search Results
	 -------------------------------------------------- */
	.bio-box a {
		color: <?php echo cf_kuler_color('darkest', 'bio_box_a'); ?>;
	}
	.bio-box a:hover {
		color: <?php echo cf_kuler_color('lightest', 'bio_box_a_hover'); ?>;
	}
	.bio-box-gallery a.bio-carousel-nav:hover {
		background-color: <?php echo cf_kuler_color('medium', 'bio_box_carousel_hover_background'); ?>;
	}
	.bio-box-gallery,
	.bio-box-content,
	.bio-box-links {
		background-color: <?php echo cf_kuler_color('medium', 'bio_box_content_background'); ?>;
		color: <?php echo cf_kuler_color('lightest', 'bio_box_content_color'); ?>;
	}
	.bio-box-title {
		color: <?php echo cf_kuler_color('darkest', 'bio_box_title_color'); ?>;
	}
	.bio-box-links ul li a:hover {
		border-color: <?php echo cf_kuler_color('darkest', 'bio_box_links_a_hover_border'); ?>;
	}
	.widget-title,
	.widget_search form,
	.search-title {
		color: <?php echo cf_kuler_color('dark', 'widget_title_color'); ?>;
		background-color: <?php echo cf_kuler_color('light', 'widget_title_background'); ?>;
	}
	.search-title em {
		color: <?php echo cf_kuler_color('darkest', 'search_title_em_color'); ?>;
	}
	.widget_search form #s {
		color: <?php echo cf_kuler_color('darkest', 'widget_search_s_color'); ?>;
	}
	.widget_search form label {
		color: <?php echo cf_kuler_color('dark', 'widget_search_label_color'); ?>;
	}
	.widget_search form label.focus {
		color: <?php echo cf_kuler_color('medium', 'widget_search_label_focus_color'); ?>;
	}
	.widget_search form #searchsubmit:hover,
	.widget_search form #searchsubmit:focus {
		background-color: <?php echo cf_kuler_color('dark', 'widget_search_submit_hover_background'); ?>;
	}
	.widget_search form #searchsubmit:active {
		background-color: <?php echo cf_kuler_color('darkest', 'widget_search_submit_active_background'); ?>;
	}

	/** Footer
	 -------------------------------------------------- */
	#footer {
		color: <?php echo cf_kuler_color('lightest', 'footer_color'); ?>;
		background-color: <?php echo cf_kuler_color('dark', 'footer_background'); ?>;
	}
	#footer a {
		color: <?php echo cf_kuler_color('light', 'footer_a'); ?>;
	}
	
	/** Utilities
	 -------------------------------------------------- */
	.wp-caption dd {
		color: <?php echo cf_kuler_color('dark', 'wp_caption_dd_color'); ?>;
		background-color: <?php echo cf_kuler_color('lightest', 'wp_caption_dd_background'); ?>;
	}
	.post .gallery-img-excerpt li a:hover,
	.attachment-next a:hover,
	.attachment-prev a:hover {
		border-bottom-color: <?php echo cf_kuler_color('medium', 'gallery_nav_border_hover'); ?>;
	}
	.post .gallery-img-excerpt li.gallery-view-all a {
		background-color: <?php echo cf_kuler_color('lightest', 'gallery_view_all_background'); ?>;
	}
	.post .gallery-img-excerpt li.gallery-view-all a:hover {
		background-color: <?php echo cf_kuler_color('light', 'gallery_view_all_hover_background'); ?>;
	}
	.post .gallery-thumbs a:hover {
		border-bottom-color: <?php echo cf_kuler_color('medium', 'gallery_thumbs_a_hover_border'); ?>;
	}
	.post .gallery-thumbs a.activated {
		border-bottom-color: <?php echo cf_kuler_color('darkest', 'gallery_thumbs_a_activated_border'); ?>;
	}
	.edit-link a {
		background-color: <?php echo cf_kuler_color('dark', 'edit_link_background'); ?>;
	}
	.edit-link a:hover {
		background-color: <?php echo cf_kuler_color('darkest', 'edit_link_background_hover'); ?>;
	}
	
	
	/* Shortcode Gallery */
	#content .gallery-item .gallery-icon a:hover {
		border-bottom-color: <?php echo cf_kuler_color('medium', 'gallery_icon_a_hover_border'); ?>;
	}
	
	/* Social */
	#social #reply-title,
	#social .social-nav,
	#social .social-nav a span {
		background-color: <?php echo cf_kuler_color('light', 'social-heading_background'); ?>;
	}
	#social .social-heading {
		color: <?php echo cf_kuler_color('dark', 'social_heading_color'); ?>;
	}
	#social .social-nav a,
	#social #submit,
	#facebook_signin,
	#twitter_signin {
		background-color: <?php echo cf_kuler_color('dark', 'social_button_background'); ?>;
	}
	#social .social-nav a:hover,
	#social #submit:hover,
	#facebook_signin:hover,
	#twitter_signin:hover {
		background-color: <?php echo cf_kuler_color('darkest', 'social_button_hover_background'); ?>;
	}		
	#social .social-nav a {
		color: <?php echo cf_kuler_color('dark', 'social_a_color'); ?>;
	}
	#social .social-current-tab a,
	#social .social-nav a:hover {
		color: <?php echo cf_kuler_color('darkest', 'social_nav_a_color'); ?>;
		background-color: <?php echo cf_kuler_color('darkest', 'social_nav_a_background'); ?>;
	}
	#social .social-posted-from {
		background-color: <?php echo cf_kuler_color('light', 'social_posted_form_background'); ?>;
	}
	#social .comment-awaiting-moderation {
		background-color: <?php echo cf_kuler_color('light', 'social_moderation_background'); ?>;
		color: <?php echo cf_kuler_color('darkest', 'social_moderation_color'); ?>;
	}
	#social .social-posted-when:hover,
	#social .social-actions a:hover {
		color: <?php echo cf_kuler_color('medium', 'a_hover'); ?>;
	}
	</style>

	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<!--[if IE 7]>
		<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url'); ?>/css/ie7.css?ver=<?php echo CFCT_URL_VERSION; ?>" />
		<style type="text/css" media="screen">
			#featured-posts .featured:hover .featured-content {
				background-color: <?php echo cf_kuler_color('light', 'featured_posts_hover_content_background'); ?>;
			}
		</style>
	<![endif]-->

<?php
	/* Add JavaScript to pages with the comment form to support threaded comments (when in use). */
	if ( is_singular() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	wp_head(); 
?>
</head>
<body <?php body_class(); ?>>
	<header id="header">
		<div class="container clearfix">
			<h1><a href="<?php bloginfo('url') ?>/" title="Home" rel="home"><?php bloginfo('name') ?></a></h1>
			<?php wp_nav_menu( array(
				'container' => 'nav',
				'container_id' => 'nav-main',
				'theme_location' => 'main',
				'depth' => 2
			)); ?>
		</div><!-- .container -->
	</header><!-- #header -->
	
<?php

cfcp_header_display();

?>	
	
	<section id="content">
		<div class="container clearfix">
