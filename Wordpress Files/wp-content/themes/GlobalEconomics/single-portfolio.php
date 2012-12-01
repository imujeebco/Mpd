<?php get_header(); ?>
<div class="main-container">

<div class="portfolio_top_cats">

	<?php
		$get_terms = wp_get_post_terms(get_the_ID(),'portfolio_category'); 
		$port_terms = '';
		$x = 0;
		foreach( $get_terms as $get_term) :
			if($x == 0)
				$port_terms = $get_term->slug;
			else
				$port_terms .= ', ' . $get_term->slug;
			$x++;
		endforeach;			
	?>

	<?php
	$terms = get_terms("portfolio_category");
	$count = count($terms);
	$port_arr = explode(', ',$port_terms);
	if ( $count > 0 ){
		echo '<ul id="portfolio-filters">';
		foreach ( $terms as $term ) {
			
			if(in_array(strtolower($term->name),$port_arr))
				echo '<li><a href="javascript:void(0);" class="current">' . $term->name . '</a></li>';
			else
				echo '<li><a href="javascript:void(0);">' . $term->name . '</a></li>';
			
		}
		echo '</ul>';
		
	}
	?>
	
	<div class="single_port_next_prev_links">
	
		<div class="left">
			<?php previous_post_link('%link', '&lt; PREV. PROJECT'); ?> 
		</div>
		
		<div class="right">
			<?php next_post_link('%link', 'NEXT PROJECT &gt;'); ?> 
		</div>
		<div class="clear"></div>
	
	</div><!--//single_port_next_prev_links-->
	<div class="clear"></div>
</div><!--//portfolio_top_cats-->

<div class="portfolio_details_video_img">
	<?php echo '**' . get_option(THEME_SLUG."_portfolio_details_force_full_width") . '**'; ?>
	<?php if(has_post_thumbnail()) { ?>
		<div align="center"><?php the_post_thumbnail('large'); ?></div>
	<?php } elseif(get_post_meta(get_the_ID(),THEME_SLUG."_featured_video_url",true) != '') { ?>

		<?php if(get_post_meta(get_the_ID(),THEME_SLUG."_featured_video_type",true) == 'youtube') {  
			$get_vid_id = explode('?v=',get_post_meta(get_the_ID(),THEME_SLUG."_featured_video_url",true));
			if(get_option(THEME_SLUG."_portfolio_details_force_full_width"))
				echo '<div class="video-container"><iframe src="http://www.youtube.com/embed/' . end($get_vid_id) . '" frameborder="0" allowfullscreen></iframe></div>';
			else
				echo '<div align="center"><iframe src="http://www.youtube.com/embed/' . end($get_vid_id) . '" frameborder="0" allowfullscreen></iframe></div>';
		} else { 
			$get_vid_id = explode('/',get_post_meta(get_the_ID(),THEME_SLUG."_featured_video_url",true));
			if(get_option(THEME_SLUG."_portfolio_details_force_full_width"))
				echo '<div class="video-container"><iframe src="http://player.vimeo.com/video/' . end($get_vid_id) . '?title=0&amp;byline=0&amp;portrait=0&amp;badge=0"  frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';
			else
				echo '<div align="center"><iframe src="http://player.vimeo.com/video/' . end($get_vid_id) . '?title=0&amp;byline=0&amp;portrait=0&amp;badge=0"  frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';
		} ?>
		
	<?php } ?>
	<div class="clear"></div>

</div><!--//portfolio_details_video_img-->

<div class="scroll-pane">
<div id="content">
	<?php if(have_posts()) : while(have_posts()) : the_post(); theme_head(); ?>
	
	
		<div class="portfolio_details_left">
			<h1><?php the_title(); ?></h1>
			
			<?php the_content(); ?>
		</div><!--//portfolio_details_left-->
		
		<div class="portfolio_details_right">
			<h3>Project Details</h3>
			
			<p><?php if(get_option(THEME_SLUG."_portfolio_details_date_category")) { ?>Date: <?php the_time('F jS, Y'); ?><br /> <?php } ?>
				Client: <?php echo get_post_meta(get_the_ID(),THEME_SLUG."_client_name",true); ?><br />
				<?php if(get_option(THEME_SLUG."_portfolio_details_date_category")) { ?>Category: <?php echo $port_terms; ?><?php } ?>
			</p>
			<?php if(get_option(THEME_SLUG."_portfolio_details_testimonial")) { ?>
			<p class="client_details_testi">"<?php echo get_post_meta(get_the_ID(),THEME_SLUG."_client_testimonial",true); ?>"</p>
			<?php } ?>
			
			<div class="port_details_client_name_image">
				<img src="<?php echo get_post_meta(get_the_ID(),THEME_SLUG."_client_testimonial_image",true); ?>" alt=" " />
				
				<?php echo get_post_meta(get_the_ID(),THEME_SLUG."_client_name",true); ?>
				<div class="clear"></div>
			</div><!--//port_details_client_name_image-->
			
		</div><!--//portfolio_details_right-->
		
		<div class="clear"></div>
			
	<?php endwhile; endif; ?>
	<div class="clear"></div>
</div><!-- #content -->
<div class="clear"></div>
</div>
<?php get_footer(); ?>