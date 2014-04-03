<?php get_header(); ?>
	<!-- BEGIN PAGE -->
	<div id="page">
    <div id="page-inner" class="clearfix">
<div id="banner-top"><?php echo of_get_option( 'refresh_banner_top'); ?></div><div id="content">
				<?php refresh_breadcrumbs(); ?>	
			<?php if (have_posts()) : ?>
			
			<?php while(have_posts())  : the_post(); ?>
	<?php get_template_part('/includes/post'); ?>
			<?php endwhile; ?>
			<?php else : ?>
				<div class="post">
					<div class="posttitle">
						<h2><?php _e('404 Error&#58; Not Found', 'refresh'); ?></h2>
						<span class="posttime"></span>
					</div>
				</div>
			<?php endif; ?>
			<?php load_template (get_template_directory() . '/includes/pagenav.php'); ?>			
	      										
	</div>
			
<?php get_sidebar(); ?>
<?php get_footer(); ?>
