<?php
define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
require_once dirname( __FILE__ ) . '/inc/options-framework.php';
include_once('baztro.php');
function refresh_scripts() {
	/*
	 * Loads our main stylesheet.
	 */
	wp_enqueue_style( 'refresh-style', get_stylesheet_uri() );
	
	// Add Monda font, used in the main stylesheet.
	wp_enqueue_style( 'monda', get_template_directory_uri() . '/fonts/monda.css', array(), '1.1' );
	/**
	* Enqueues the javascript for comment replys 
	* 
	**/
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	}
add_action( 'wp_enqueue_scripts', 'refresh_scripts' );
/**
 * Sets up the content width value based on the theme's design.
 */
if ( ! isset( $content_width ) )
	$content_width = 770;
	
	function refresh_hdmenu() {	
		wp_nav_menu();
	}
	
function refresh_post_meta_data() {
	printf( __( '<span class="%1$s"></span>%2$s<span class="%3$s"></span>%4$s', 'refresh' ),
	'meta-prep meta-prep-author posted', 
	sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="timestamp updated">%3$s</span></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_html( get_the_date() )
	),
	'byline',
	sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
		get_author_posts_url( get_the_author_meta( 'ID' ) ),
		sprintf( esc_attr__( 'View all posts by %s', 'refresh' ), get_the_author() ),
		esc_attr( get_the_author() )
		)
	);
}

/* Enable support for post-thumbnails ********************************************/
		
	// If we want to ensure that we only call this function if
	// the user is working with WP 2.9 or higher,
	// let's instead make sure that the function exists first
	
function refresh_theme_setup() { 
		add_theme_support( 'post-thumbnails' );	
		add_image_size( 'defaultthumb', 160, 160 , true );
		
		
	    load_theme_textdomain('refresh', get_template_directory() . '/languages');
		
        add_editor_style();
		
	
        add_theme_support('automatic-feed-links');
		}
		register_nav_menus(
			array(
 				'refresh-navigation' => __('Navigation', 'refresh'),
				)		
		);
		
		add_theme_support('custom-background', array(
			'default-color' => 'fff',
			));
	add_action( 'after_setup_theme', 'refresh_theme_setup' );
	

/* Excerpt ********************************************/

    function refresh_excerptlength_teaser($length) {
    return 12;
    }
    function refresh_excerptlength_index($length) {
    return 45;
    }
    function refresh_excerptmore($more) {
    return '...';
    }
    
    
    function refresh_excerpt($length_callback='', $more_callback='') {
    global $post;
    add_filter('excerpt_length', $length_callback);
 
    add_filter('excerpt_more', $more_callback);
   
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>'.$output.'</p>';
    echo $output;
    }

	

/* Widgets ********************************************/

    function refresh_widgets_init() {
	
	$categories = get_categories( array( 'hide_empty'=> 0 ) );
//echo '<pre>',print_r($categories,1),'</pre>';die;
	//foreach ( $categories as $category ) {
	//echo '<pre>',print_r($category,1),'</pre>';die;
		register_sidebar( array(
			//'id' => $category->category_nicename . '-sidebar',
			'name' => __( 'Sidebar Right', 'refresh' ),
			'before_widget' => '<div id="%2$s" class="box clearfloat"><div class="boxinside clearfloat">',
			'after_widget' => '</div></div>',
			'before_title' => '<h4 class="widgettitle">',
			'after_title' => '</h4>',
		) );
	//}
	/*
	register_sidebar(array(
		'name' => __( 'Sidebar Right', 'refresh' ),
	    'before_widget' => '<div class="box clearfloat"><div class="boxinside clearfloat">',
	    'after_widget' => '</div></div>',
	    'before_title' => '<h4 class="widgettitle">',
	    'after_title' => '</h4>',
	));*/
	
	
	register_sidebar(array(
		'name' => __( 'Footer 1 (Premium Only)', 'refresh' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
	    'after_widget' => '</div>',
	    'before_title' => '<h4>',
	    'after_title' => '</h4>',
	));

	register_sidebar(array(
		'name' => __( 'Footer 2 (Premium Only)', 'refresh' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
	    'after_widget' => '</div>',
	    'before_title' => '<h4>',
	    'after_title' => '</h4>',
	));	

	register_sidebar(array(
		'name' => __( 'Footer 3 (Premium Only)', 'refresh' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
	    'after_widget' => '</div>',
	    'before_title' => '<h4>',
	    'after_title' => '</h4>',
	));	
}
add_action('widgets_init', 'refresh_widgets_init');
//---------------------------- [ Pagenavi Function ] ------------------------------//
 
function refresh_pagenavi() {
  global $wp_query, $wp_rewrite;
  $pages = '';
  $max = $wp_query->max_num_pages;
  if (!$current = get_query_var('paged')) $current = 1;
  $args['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
  $args['total'] = $max;
  $args['current'] = $current;
 
  $total = 1;
  $args['mid_size'] = 3;
  $args['end_size'] = 1;
  $args['prev_text'] = '&#171; Prev';
  $args['next_text'] = 'Next &raquo;';
 
  if ($max > 1) echo '<div class="wp-pagenavi">';
 echo $pages . paginate_links($args);
 if ($max > 1) echo '</div>';
}

/**
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @since Refresh 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string Filtered title.
 */
function refresh_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'refresh' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'refresh_wp_title', 10, 2 );
?>