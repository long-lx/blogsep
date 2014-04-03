<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
	<?php //comments_popup_script(); // off by default ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> id="top">
<div class="wrapper">
<div id="flot">
	<div id="header">
<div id="header-top">
		<div id="logo">
		<?php if (of_get_option( 'refresh_logo' )): ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo of_get_option( 'refresh_logo' ); ?>" height="" width="" alt=""/></a>
      			<?php else : ?>        
            <h1 class="site-title">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
      
    <?php endif; // header image was removed (again) ?>
		</div>
	<ul class="w-related">
		<li><a href="http://www.septeni.co.jp/" target="_blank"><img src="/wp-content/themes/refresh/images/logo_septeni_corp.gif" width="42" height="25" alt="" /></a></li>
		<li><a href="http://labs.septeni.co.jp/" target="_blank"><img src="/wp-content/themes/refresh/images/logo_septeni_blog_corp.gif" width="165" height="25" alt="" /></a></li>
	</ul>
	</div>
    <div id="header-inner" class="clearfix">
		<div class="inner">
			<p class="tit-head">The SEPTENI TECHNOLOGY Blog</p>
			<div id="spc"><div class="box-search"></div><div id="searchacc"><?php if ( of_get_option('refresh_topsearch' ) =='1') { ?>
	<?php get_search_form(); ?><?php } ?>
</div>
</div>
<div id="navigation" style="display:none;">
<div id="navigation-inner" class="clearfix">
	<div id="navigation" class="secondary">		<?php wp_nav_menu(array('container' => '', 'theme_location' => 'refresh-navigation', 'fallback_cb' => 'refresh_hdmenu')); ?>
		</div><!-- end div #myslidemenu -->
    </div> <!-- end div #navigation-inner -->
	</div> <!-- end div #navigation -->
   </div> </div> <!-- end div #header-inner -->
	</div>	
</div>
	