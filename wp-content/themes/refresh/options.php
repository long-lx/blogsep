<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}


function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __('One', 'refresh'),
		'two' => __('Two', 'refresh'),
		'three' => __('Three', 'refresh'),
		'four' => __('Four', 'refresh'),
		'five' => __('Five', 'refresh')
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __('French Toast', 'refresh'),
		'two' => __('Pancake', 'refresh'),
		'three' => __('Omelette', 'refresh'),
		'four' => __('Crepe', 'refresh'),
		'five' => __('Waffle', 'refresh')
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '13px',
		'face' => 'false',
		'style' => 'normal',
		'color' => '#555' );

	$typography_entrytitle = array(
		'size' => '28px',
		'face' => 'false',
		'style' => 'normal',
		'color' => '#555555' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

$options = array();
$options[] = array(
		'desc' => '<h2 style="color: #FFF !important;">Upgrade to Premium Theme & Enable Full Features!</h2>
		<li>SEO Optimized WordPress Theme.</li>
		<li><a href="https://developers.google.com/speed/pagespeed/insights">Page Speed</a> Optimize for better result.</li>
		<li>Color Customize of theme.</li>
		<li>Custom Widgets and Functions.</li>
		<li>Social Media Integration.</li>
		<li>Responsive Website Design.</li>
		<li>Different Website Layout to Select.</li>
		<li>Many of Other customize feature for your blog or webiste.</li>
		<p><span class="buypre"><a href="http://www.wrock.org/product/refresh-wordpress-theme/">Upgrade Now</a></span><span class="buypred"><a href="http://www.wrock.org/shop/">Shop More Themes !</a></span></p>',
		'class' => 'tesingh',
		'type' => 'info');
	$options[] = array(
		'name' => __('Basic Settings', 'refresh'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('Custom Favicon URL', 'refresh'),
		'desc' => __('Enter Favicon Image URL Specify a 16px x 16px image in .ico format .', 'refresh'),
		'id' => 'refresh_favicon',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('Upload Site Logo', 'refresh'),
		'desc' => __('Upload Website Logo "max height = 50px" and max width= 184px" to fit here. Note you can upload any size it will automatic resize .', 'refresh'),
		'id' => 'refresh_logo',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Show Author Profile', 'refresh'),
		'desc' => __('Check the box to show Author Profile Below the Post and Pages.', 'refresh'),
		'id' => 'refresh_author',
		'std' => '',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Show Latest Posts in Sidebar', 'refresh'),
		'desc' => __('Show 5 Latest Posts with Thumbnail in Sidebar.', 'refresh'),
		'id' => 'refresh_activate_ltposts',
		'std' => '1',
		'type' => 'checkbox');
	$options[] = array(
		'name' => __('Show Search on top navigation', 'refresh'),
		'desc' => __('Check or Uncheck Box to show or hide search', 'refresh'),
		'id' => 'refresh_topsearch',
		'std' => '1',
		'type' => 'checkbox');
	$options[] = array(
		'name' => __('Show share buttons on Top Navigation', 'refresh'),
		'desc' => __('Check or uncheck Box to show and hide share buttons', 'refresh'),
		'id' => 'refresh_sharebut',
		'std' => '1',
		'type' => 'checkbox');
		
$options[] = array(
		'name' => __('Social Media', 'refresh'),
		'type' => 'heading');
		
		$options[] = array(
		'name' => __('Facebook Link', 'refresh'),
		'desc' => __('Enter your Facebook URL if you have one.', 'refresh'),
		'id' => 'refresh_fb',
		'std' => '',
		'type' => 'text');
		$options[] = array(
		'name' => __('Twitter Follow Link', 'refresh'),
		'desc' => __('Enter your Twitter URL if you have one.', 'refresh'),
		'id' => 'refresh_tw',
		'std' => '',
		'type' => 'text');
		$options[] = array(
		'name' => __('RSS Feed URL', 'refresh'),
		'desc' => __('Enter your RSS Feed URL if you have one', 'refresh'),
		'id' => 'refresh_rss',
		'std' => '',
		'type' => 'text');
		$options[] = array(
		'name' => __('Linked In URL', 'refresh'),
		'desc' => __('Enter your Linkedin URL if you have one.', 'refresh'),
		'id' => 'refresh_in',
		'std' => '',
		'type' => 'text');
		$options[] = array(
		'name' => __('Pinterest In URL', 'refresh'),
		'desc' => __('Enter your Pinterest URL if you have one.', 'refresh'),
		'id' => 'refresh_pinterest',
		'std' => '',
		'type' => 'text');
		$options[] = array(
		'name' => __('Skype In URL', 'refresh'),
		'desc' => __('Enter your skype URL if you have one.', 'refresh'),
		'id' => 'refresh_skype',
		'std' => '',
		'type' => 'text');
		$options[] = array(
		'name' => __('Vimeo In URL', 'refresh'),
		'desc' => __('Enter your vimeo URL if you have one.', 'refresh'),
		'id' => 'refresh_vimeo',
		'std' => '',
		'type' => 'text');
		$options[] = array(
		'name' => __('Flickr In URL', 'refresh'),
		'desc' => __('Enter your flickr URL if you have one.', 'refresh'),
		'id' => 'refresh_flickr',
		'std' => '',
		'type' => 'text');
		$options[] = array(
		'name' => __('Dribbble In URL', 'refresh'),
		'desc' => __('Enter your dribbble URL if you have one.', 'refresh'),
		'id' => 'refresh_dribbble',
		'std' => '',
		'type' => 'text');		
		$options[] = array(
		'name' => __('YouTube Channel Link', 'refresh'),
		'desc' => __('Enter your YouTube URL if you have one.', 'refresh'),
		'id' => 'refresh_youtube',
		'std' => '',
		'type' => 'text');
		$options[] = array(
		'name' => __('Google+ URL', 'refresh'),
		'desc' => __('Enter your Google+ Link if you have one.', 'refresh'),
		'id' => 'refresh_gp',
		'std' => '',
		'type' => 'text');
		
$options[] = array(
		'name' => __('Custom Styling', 'refresh'),
		'type' => 'heading');
	$options[] = array(
		'name' => __('Custom CSS', 'refresh'),
		'desc' => __('Quickly add some CSS to your theme by adding it to this block.', 'refresh'),
		'id' => 'refresh_customcss',
		'std' => '',
		'type' => 'textarea');
		
$options[] = array(
		'name' => __('Ads Management', 'refresh'),
		'type' => 'heading');
	$options[] = array(
		'name' => __('Paste Ads code below navigation', 'refresh'),
		'desc' => __('Activate Ads Space Below Navigation and put code in below test field.', 'refresh'),
		'id' => 'refresh_banner_top',
		'std' => '',
		'type' => 'textarea');
	$options[] = array(
		 'name' => __( 'AD Code For Single Post', 'refresh' ),
            'desc' => 'Paste Ad code for single post it show ads below post title and before content.',
            'id' => 'refresh_ad2',
            'std' => '',
            'type' => 'textarea');
     $options[] = array(
		'name' => __( 'AD Code For Footer', 'refresh' ),
		'desc' => __('Paste Ad Code for Footer Area.', 'refresh'),
            'id' => 'refresh_ad1',
            'std' => '',
            'type' => 'textarea');	
		
$options[] = array(
		'name' => __('Premium Features', 'refresh'),
		'type' => 'heading');
		
		
		$options[] = array(
		'desc' => '<span class="pre-title">New Features</span>', 
		'type' => 'info');
		
		
		$options[] = array(
		'name' => __('Popular Posts in Sidebar', 'refresh'),
		'desc' => __('Display Popular Post Sidebar Widget.', 'refresh'),
		'id' => 'refresh_popular',
		'std' => '0',
		'type' => 'checkbox');
		
		$options[] = array(
		'name' => __('Responsive Website Design', 'refresh'),
		'desc' => __('Enable Responsive Design for you website to increase exprience on Mobile Devices', 'refresh'),
		'id' => 'refresh_responsive',
		'std' => '0',
		'type' => 'checkbox');
		$options[] = array(
		'name' => __('Excerpt Length (Number of words display in post description)', 'refresh'),
		'desc' => __('Number of words display in every post description Default is 45.', 'refresh'),
		'id' => 'refresh_excerp',
		'std' => '45',
		'class' => 'mini',
		'type' => 'text');
		$options[] = array(
		'name' =>  __('Change Background', 'refresh'),
		'desc' => __('Change the background CSS Color or Image.', 'refresh'),
		'id' => 'refresh_bg',
		'std' => $background_defaults,
		'type' => 'background' );
		$options[] = array(
		'name' => __('Change Link Color', 'refresh'),
		'desc' => __('Select Links Color.', 'refresh'),
		'id' => 'refresh_linkcolor',
		'std' => '#2A7FB3',
		'type' => 'color' 
);
		$options[] = array(
		'desc' => __('Change Link Hover Color.', 'refresh'),
		'id' => 'refresh_linkhover',
		'std' => '#9db2b2',
		'type' => 'color' );
		$options[] = array(
		'desc' => __('Navigation and Logo Text Color.', 'refresh'),
		'id' => 'refresh_topnavilink',
		'std' => '#ffffff',
		'type' => 'color' );
		$options[] = array(
		'desc' => __('Change Top Menu Navigation Background Color.', 'refresh'),
		'id' => 'refresh_topnavicolor',
		'std' => '',
		'type' => 'color' );
		$options[] = array(
		'name' => __('Page Number Navigation Color Chnage ', 'refresh'),
		'desc' => __('Change Current Page Background.', 'refresh'),
		'id' => 'refresh_pageanvibg',
		'std' => '#1AD6B8',
		'type' => 'color' );
		$options[] = array(
			'desc' => __('Change backgroud color of other pages.', 'refresh'),
		'id' => 'refresh_pageanvia',
		'std' => '#ffffff',
		'type' => 'color' );
		$options[] = array(
		'desc' => __('Numbers text Color Change.', 'refresh'),
		'id' => 'refresh_pageanvilink',
		'std' => '#333',
		'type' => 'color' );
		
		$options[] = array( 'name' => __('Customize Theme Fonts', 'refresh'),
		'desc' => __('Change <b>Body (Theme) Font</b> color and Size.', 'refresh'),
		'id' => "refresh_bodyfonts",
		'std' => $typography_defaults,
		'type' => 'typography' );
		$options[] = array( 
		'desc' => __('Change <b>H1 Posts and Pages Title </b>Font color or Size.', 'refresh'),
		'id' => "refresh_entrytitle",
		'std' => $typography_entrytitle,
		'type' => 'typography' );
		$options[] = array(
		'name' => __('Footer Widget Area Settings', 'refresh'),
		'desc' => __('Show or Hide Footer Widget Area.', 'refresh'),
		'id' => 'refresh_footerwidget',
		'std' => 'on',
		'type' => 'radio',
		'options' => array(
						'on' => 'Show',
						'off' => 'Hide'
						));
						
		$options[] = array(
		'name' => __('Show or Hide "Continue reading" Button', 'refresh'),
		'desc' => __('Show or Hode "Continue reading" or read more Button  Button .', 'refresh'),
		'id' => 'refresh_countinue',
		'std' => 'on',
		'type' => 'radio',
		'options' => array(
						'on' => 'Show',
						'off' => 'Hide'
						));
		$options[] = array(
		    'desc' => 'Paste You Custom text for Continue reading <b>Default: Continue reading &raquo; </b>.',
            'id' => 'refresh_fullstory',
            'std' => 'Continue reading &raquo;',
            'type' => 'text');							
		$options[] = array(
		'desc' => '<span class="pre-titleseo">SEO & Meta Options</span>', 
		'type' => 'info');
		$options[] = array(
		'name' => __('Google+ Publisher URL', 'refresh'),
		'desc' => __('Paste Your Google Publisher URL https://plus.google.com/YOUR-GOOGLE+ID/posts.', 'refresh'),
		'id' => 'refresh_googlepub',
		'std' => '',
		'type' => 'text');
		$options[] = array(
		'name' => __('Bing Site Verification', 'refresh'),
		'desc' => __('Enter the ID only. It will be verified by Yahoo as well.', 'refresh'),
		'id' => 'refresh_bingvari',
		'std' => '',
		'type' => 'text');
		$options[] = array(
		'name' => __('Google Site varification', 'refresh'),
		'desc' => __('Enter your ID only.', 'refresh'),
		'id' => 'refresh_googlevari',
		'std' => '',
		'type' => 'text');
		
$options[] = array(
		'name' => __('Footer Script Area', 'refreh'),
		'desc' => __('Enter Code for footer like google analytics.', 'refresh'),
		'id' => 'refresh_scriptfooter',
		'std' => '',
		'type' => 'textarea');
		
		$options[] = array(
		'desc' => '<span class="pre-titlecus">Customization</span>', 
		'type' => 'info');
		$options[] = array(
		'name' => __('Breadcrumbs Options', 'refresh'),
		'desc' => __('Check Box to Enable or Disable Breadcrumbs.', 'refresh'),
		'id' => 'refresh_bread',
		'std' => '1',
		'type' => 'checkbox');
		$options[] = array(
		'name' => __('Show Tags', 'refresh'),
		'desc' => __('Check Box to Show or Hide Tags ', 'refresh'),
		'id' => 'refresh_tags',
		'std' => '1',
		'type' => 'checkbox');
		$options[] = array(
		'name' => __('Next and Previous Post Link', 'refresh'),
		'desc' => __('Show or Hide Next and Previous Post Link below every post.', 'refresh'),
		'id' => 'refresh_links',
		'std' => 'on',
		'type' => 'radio',
		'options' => array(
						'on' => 'Show',
						'off' => 'Hide'
						));
		$options[] = array(
		'name' => __('Show or Hide Copy Right Text', 'refresh'),
		'desc' => __('Show or Hode Copyright Text and Link.', 'refresh'),
		'id' => 'refresh_copyright',
		'std' => 'on',
		'type' => 'radio',
		'options' => array(
						'on' => 'Show',
						'off' => 'Hide'
						));
		$options[] = array(
		    'desc' => 'Paste Ad code for single post it show ads below post title and before content.',
            'id' => 'refresh_ftarea',
            'std' => '&#169; 2013 Designed by: <a href="http://www.wrock.org/refresh" title="wRock.Org">wRock.Org</a>',
            'type' => 'textarea');				
		
	return $options;
}