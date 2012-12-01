<?php get_header(); ?>
	<div id="main">
		<div class="main-holder">
			<div class="page-title">
				<?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?>
					<h1><?php the_title(); ?></h1>
					<?php if ( has_post_thumbnail() ):?>
						<?php the_post_thumbnail(); ?>
					<?php else:?>
					
<?php

$parents = get_post_ancestors( get_the_ID() );
/* Get the ID of the 'top most' Page if not return current page ID */
$id = ($parents) ? $parents[count($parents)-1]: 0;
//echo '**' . $id . ' **';
if($id != 0 && has_post_thumbnail( $id )) {
	echo get_the_post_thumbnail( $id, 'full');
} else {

?>
						
						<img src="<?php bloginfo('template_url'); ?>/images/img19.jpg" alt="image description" width="902" height="81" />
<?php } ?>
						
					<?php endif; ?>
				<?php endwhile; ?><?php endif; ?>		 
			</div>
			<div class="main-container">
				<?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?>
					<div id="content">
						<?php remove_filter('the_content','wpautop')?><?php the_content(); ?>
					</div>
				<?php endwhile; ?><?php endif; ?>		
				<?php global $post;?>
				<?php if($post->post_parent){$parent=$post->post_parent;}else{$parent=$post->ID;}?>
				<?php $name = get_post($parent); ?>
				<?php if(get_pages('child_of='.$parent)):?>
					<div id="sidebar">
						<div class="section widget_pages">
							<?php if(get_post_meta($name->ID,'title',true)): ?>
								<div class="title">
									<h3><?php echo get_post_meta($name->ID,'title',true); ?></h3>
								</div>
							<?php else:?>
								<div class="title">
									<h3><?php echo $name->post_title ?></h3>
								</div>
							<?php endif;?>
							<ul class="item-list">
							  <?php wp_list_pages('title_li=&depth=2&child_of='.$parent); ?>
							</ul>
						</div>
					</div>
				<?php else:?>
				<div id="sidebar">
					<?php	dynamic_sidebar('Default Right Sidebar');?>
				</div>
				<?php endif; ?>	
			</div>
		</div>
	</div>
<?php get_footer(); ?>
