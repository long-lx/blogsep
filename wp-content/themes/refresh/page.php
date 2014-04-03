<?php get_header(); ?>
	<!-- BEGIN PAGE -->
	<div id="page">
    <div id="page-inner" class="clearfix">

<div id="banner-top"><?php echo of_get_option( 'refresh_banner_top'); ?></div>
		<div id="pagecont">	<?php refresh_breadcrumbs(); ?>
			<?php if(have_posts()) : ?><?php while(have_posts())  : the_post(); ?>
					<div id="pagepost-<?php the_ID(); ?>" class="pagepost clearfix">					
						<h1 class="entry-title"><?php the_title(); ?></h1>
							<div class="entry" class="clearfix">
																
								<?php the_content(); ?>
								<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'refresh' ), 'after' => '</div>' ) ); ?>
								<!-- <?php trackback_rdf(); ?> -->
							</div> <!-- end div .entry -->
						<?php load_template (get_template_directory() . '/includes/postmeta.php'); ?>
							<div class="comments">
								<?php comments_template(); ?>
							</div> <!-- end div .comments -->
					</div> <!-- end div .post -->

			<?php endwhile; ?>
			<?php else : ?>
				<div class="post">
					<h3><?php _e('404 Error&#58; Not Found', 'refresh'); ?></h3>
				</div>
			<?php endif; ?>
			      										
		</div> <!-- end div #content -->
			
<?php get_sidebar(); ?>
<?php get_footer(); ?>
