<?php
/*
Template Name: Homepage Template
*/
?>
<?php get_header(); ?>
	<div id="main">
		<div class="main-holder">
			<div class="promo">
				<ul class="items-list">
				<?php $front = get_cat_id('Front');?>
				  <?php query_posts('posts_per_page=5&cat='.$front);?><?php global $i; $i=0; ?>
					 <?php if(have_posts()): ?>
						  <?php while(have_posts()): the_post();?>
								<li <?php if($i==0):?> class="active" <?php endif; ?>>
									<?php if ( has_post_thumbnail() ):?><?php the_post_thumbnail('front'); ?><?php endif; ?>
									<div class="caption">
										<h2><?php the_title(); ?></h2>
										<?php the_excerpt(); ?>
										<a href="<?php the_permalink(); ?>" class="more">Read more</a>
									</div>
								</li>
						  <?php $i++; endwhile; ?>
					 <?php endif; ?>
				<?php wp_reset_query(); ?>
				</ul>
				<?php if($i < 2): ?><div style="display:none;"><?php endif; ?>
					<ul class="switcher">
						<?php for($j=0;$j<$i;$j++): ?>
							<li<?php if($j==0) echo ' class="active"'; ?>><a href="#"><span><?php echo $j+1; ?></span></a></li>
						<?php endfor; ?>
					</ul>
				<?php if($i < 2): ?></div><?php endif; ?>
			</div>
			<div class="boxes">
				<div class="box">
					<div class="holder">
						<div class="frame">
							<?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?>
								<?php the_content(); ?>
							<?php endwhile; ?><?php endif; ?>	
						</div>
					</div>
				</div>

                                <div class="search-box">
				 	<div class="headline">
						<h2>What We Believe</h2>
					</div>
					<div class="search-box-text-cont">
						MPD is about bringing out client insights from leading experts and how we use both to stimulate new thinking and ignite innovation. 
					</div><!--//search-box-text-cont-->
					<div class="image">
						<!--<img src="<?php bloginfo('template_url'); ?>/images/img05.jpg" alt="image description" width="344" height="164" />-->
						<img src="<?php bloginfo('template_url'); ?>/images/img05.jpg" alt="image description" width="344" height="140" />
					</div>
			<!--		<?php theme_get_search_form(); ?> -->
                                        <ul class="mpd_hb_list">
                                               <li class="mpd_publications_box" onclick="window.location='/our-approach/what-we-believe#publication'; return false;"><a href="/our-approach/what-we-believe#publication">Publications</a></li>
                                               <li class="mpd_perspectives_box" onclick="window.location='/our-approach/what-we-believe#perspective'; return false;"><a href="/our-approach/what-we-believe#perspective">Perspectives</a></li>
                                               <li class="mpd_people_box" onclick="window.location='/our-approach/what-we-believe#people'; return false;"><a href="/our-approach/what-we-believe#people">People</a></li>
                                        </ul>
				<div class="mpd_clear"></div>

				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>	