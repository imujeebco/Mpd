<?php
/*
Template Name: Testimonials Template
*/
?>

<?php get_header(); ?>

<div id="content">

	<?php if (have_posts()) : ?>
	
	<?php while (have_posts()) : the_post(); ?>
	<div class="post" id="post-<?php the_ID(); ?>">
		<div class="title">
			<h1><?php the_title(); ?></h1>
		</div>
		<div class="content">
			<?php the_content(); ?>
			
			<?php
				query_posts(array(
					'post_type' => 'page',
					'post_status' => 'publish',
					'post_parent' => testimonialsPageID
				));
				
				if (have_posts()) : while (have_posts()) : the_post();
			?>
			
			<blockquote>
				<?php the_content(); ?>
			</blockquote>
				
			<?php endwhile; ?>
			
			<div class="navigation">
				<div class="next"><?php next_posts_link('Older Entries &raquo;') ?></div>
				<div class="prev"><?php previous_posts_link('&laquo; Newer Entries') ?></div>
			</div>
			
			<?php endif; ?>
			
			<?php wp_reset_query(); ?>
		</div>
	</div>
	<?php endwhile; ?>
	
	<?php else : ?>
	<div class="post">
		<div class="title">
			<h1>Not Found</h1>
		</div>
		<div class="conent">
			<p>Sorry, but you are looking for something that isn't here.</p>
		</div>
	</div>
	<?php endif; ?>
	
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
