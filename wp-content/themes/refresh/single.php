<?php get_header(); ?><!-- BEGIN PAGE -->	<div id="page">	<div id="page-inner" class="clearfix">
<div id="banner-top"><?php echo of_get_option( 'refresh_banner_top'); ?></div>
		<div id="content"><?php refresh_breadcrumbs(); ?>
			<?php if(have_posts()) : ?>
			<?php while(have_posts())  : the_post(); ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
<span class="postmeta_box">
		<?php get_template_part('/includes/postmeta'); ?><?php edit_post_link('Edit', ' &#124; ', ''); ?>
	</span><!-- .entry-header -->
			<div class="entry" class="clearfix">
			<div><?php if ( of_get_option('refresh_ad2') <> "" ) { echo stripslashes(of_get_option('refresh_ad2')); } ?>
			<?php the_content(); ?> 
				<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'refresh' ), 'after' => '</div>' ) ); ?>
								<!-- <?php trackback_rdf(); ?> -->
		<?php  if (get_the_tags()) :?> <div class="tags-wrap"><span class="tags">Tagged width:</span><?php if("the_tags") the_tags(''); ?></div><?php endif;?></div>
							</div> <!-- end div .entry -->
<div class="gap"></div><?php if (of_get_option('refresh_author' ) =='1' ) {load_template(get_template_directory() . '/includes/author.php'); } ?>
		<!--<div id="single-nav" class="clearfix">
			<div id="single-nav-left"><?php previous_post_link('&laquo;<strong>%link</strong>'); ?></div>
		<div id="single-nav-right"><?php next_post_link('<strong>%link</strong>&raquo;'); ?></div>
			
        </div>-->
        <!-- END single-nav -->
			
			<?php endwhile; ?>
			<?php else : ?>
				<div class="post">
					<h3><?php _e('404 Error&#58; Not Found', 'refresh' ); ?></h3>
				</div>
			<?php endif; ?>
		</div> <!-- end div #content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>