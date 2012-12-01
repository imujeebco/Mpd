<?php get_header(); ?>
	<div id="main">
		<div class="main-holder">
			<div class="page-title">
				<img src="<?php bloginfo('template_url'); ?>/images/img13.jpg" alt="image description" width="902" height="151" />
			</div>		
			<div class="main-container">
				<div id="content">
					<div class="posts">
						<?php if (have_posts()) : ?>
						<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
							<?php /* If this is a category archive */ if (is_category()) { ?>
							<h1>Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h1>
							<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
							<h1>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h1>
							<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
							<h1>Archive for <?php the_time('F jS, Y'); ?></h1>
							<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
							<h1>Archive for <?php the_time('F, Y'); ?></h1>
							<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
							<h1>Archive for <?php the_time('Y'); ?></h1>
							<?php /* If this is an author archive */ } elseif (is_author()) { ?>
							<h1>Author Archive</h1>
							<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
							<h1>Blog Archives</h1>
							<?php } ?>
						<?php while (have_posts()) : the_post(); ?>
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
								<p>By <?php the_author_link(); ?> on <span class="date"><?php the_time('F j, Y'); ?></span></p>
							</div>
							<?php the_excerpt(); ?>
							<a href="<?php the_permalink(); ?>">Read more &raquo;</a>
						</div>
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
