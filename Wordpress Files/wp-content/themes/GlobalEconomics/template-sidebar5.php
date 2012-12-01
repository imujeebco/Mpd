<?php 
/*
	Template Name: sidebarTemplate5
*/	
get_header(); ?>
	<div id="main">
		<div class="main-holder">
			<div class="page-title">
				<?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?>
					<h1><?php the_title(); ?></h1>
					<?php if ( has_post_thumbnail() ):?>
						<?php the_post_thumbnail(); ?>
					<?php else:?>
						<img src="<?php bloginfo('template_url'); ?>/images/img19.jpg" alt="image description" width="902" height="81" />
					<?php endif; ?>
				<?php endwhile; ?><?php endif; ?>		 
			</div>
			<div class="main-container">
				<div id="content">
				<?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?>
					<div id="content">
						<?php remove_filter('the_content','wpautop')?><?php the_content(); ?>
					</div>
				<?php endwhile; ?><?php endif; ?>		
				<?php global $post;?>
				<?php if($post->post_parent){$parent=$post->post_parent;}else{$parent=$post->ID;}?>
				<?php $name = get_post($parent); ?>

				</div>
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

<div class="section widget_pages"><div class="title"><h3>Meet The Experts</h3></div><ul class="item-list">        <!-- MEET THE EXPERTS -->
<li><a href="/experts/david-s-evans/" title="David">David S. Evans</a></li>
<li><a href="/experts/karen-l-webster/" title="Karen L. Webster">Karen L. Webster</a></li>
<li><a href="/experts/margaret-weichert/" title="Margaret">Margaret Weichert</a></li> 
<li><a href="/experts/brian-smith/" title="Brian">Brian Smith</a></li>
<li><a href="/experts/gloria-colgan/" title="Gloria">Gloria Colgan</a></li> 
<li><a href="/experts/james-shanahan/" title="James Shanahan">James Shanahan</a></li>

       <!-- /Lmeet the experts -->
        </ul></div>

<div class="section widget_pages"><div class="title"><h3>Our Publications</h3></div><ul class="item-list">        <!-- Our writing -->
       <!-- /Our writing -->
        </ul></div>

</div>
       <!-- /End Sidebar -->
			</div>
		</div>
	</div>
<?php get_footer(); ?>	