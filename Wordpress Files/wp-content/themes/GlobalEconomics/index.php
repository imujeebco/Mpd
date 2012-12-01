<?php get_header(); ?>
	<div id="main">
		<div class="main-holder">
		<div class="page-title">
				<?php if (have_posts()) : ?>
					<h1>MPD In The News</h1>
					<?php if ( has_post_thumbnail() ):?>
						<?php the_post_thumbnail(); ?>
					<?php else:?>
						<img src="<?php bloginfo('template_url'); ?>/images/img19.jpg" alt="image description" width="902" height="81" />
					<?php endif; ?><?php endif; ?>		 
			</div>
			<div class="main-container">
				<div id="content">
					<div class="posts">
						<?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?>
						<?php 
							if(!in_category( 'front', $post->ID ))
							{						
						?> 
						<div class="post">
							<div class="title">
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							</div>
							<div class="posted">
								<ul class="links">
									<li><div class="comment-link"><?php comments_popup_link('0 comments', '1 comment', '% comments'); ?></div></li>
									<li><?php echo str_replace(array('{url}','{title}'),array(get_permalink(),get_the_title()),st_makeEntries()); ?></li>
									<li><a href="http://twitter.com/home?status=<?php echo str_replace('+', '%20', urlencode( the_title()) ); ?>%20-%<?php echo urlencode(the_permalink()); ?>"><img src="<?php bloginfo('template_url'); ?>/images/ico-twitter.gif" alt="image description" width="14" height="13" /></a></li>
								</ul>
								<p>By <?php the_author_link(); ?>   <!--    on <span class="date"><?php the_time('F j, Y'); ?></span></p>    -->
							</div>
							<?php the_excerpt(); ?>
							<a href="<?php the_permalink(); ?>">Read more &raquo;</a>
						</div>
						<?php
							}	
						?>
						<?php endwhile; ?><?php else:?>
						<div class="post">
							<div class="title">
								<h2>Not Found</h2>
							</div>
							<p>Sorry, but you are looking for something that isn't here.</p>
						</div>
						<?php endif; ?>
					</div>
					<div class="paging">
						<div class="hold">
							<div>
								<?php wp_pagenavi(); ?>
							</div>
						</div>
					</div>
				</div>
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>	