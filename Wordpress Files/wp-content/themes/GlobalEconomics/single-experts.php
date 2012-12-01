<?php get_header(); ?>
	<div id="main">
		<div class="main-holder">
			<div class="page-title">
				<h1>The Team</h1>
				<img src="<?php bloginfo('template_url'); ?>/images/network.jpg" alt="experts image" width="902" height="136" />
			</div>
			<div class="main-container">
				<div id="content">
				<?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?>
					<div class="profile">
						<h2><?php the_title(); ?></h2>
						<?php if(get_post_meta($post->ID,'description',true)): ?>
						 <p><?php echo get_post_meta($post->ID,'description',true); ?></p>
						<?php endif;?>
						<div class="info-box">
							 <?php if ( has_post_thumbnail() ):?>
								<div class="photo"><?php the_post_thumbnail('experts'); ?></div>
							<?php endif; ?>
							<dl class="info-list">
								<dt>Name</dt>
								<dd><?php the_title(); ?></dd>
								<?php if(get_post_meta($post->ID,'Title',true)): ?>
									<dt>Title</dt>
									<dd><?php echo get_post_meta($post->ID,'Title',true); ?></dd>
								<?php endif;?>
<?php if(get_post_meta($post->ID,'Location',true)): ?>
									<dt>Location</dt>
									<dd><?php echo get_post_meta($post->ID,'Location',true); ?></dd>
								<?php endif;?>
							<!-- <?php if(get_post_meta($post->ID,'Phone',true)): ?> 
									<dt>Phone</dt>
									<dd><?php echo get_post_meta($post->ID,'Phone',true); ?></dd>
								<?php endif;?>
								<?php if(get_post_meta($post->ID,'Expertise',true)): ?>
									<dt>Expertise</dt>
									<dd><?php echo get_post_meta($post->ID,'Expertise',true); ?><dd>
								<?php endif;?>	-->
								<?php if(get_post_meta($post->ID,'email',true)):?>					
									<dt>Contact</dt>
									<dd><a href="<?php echo get_post_meta($post->ID,'email',true); ?>" class="email">Email <?php echo get_post_meta($post->ID,'firstname',true); ?></a></dd>
								<?php endif;?>
							</dl>
							<ul class="actions">
							<!--	<?php if(get_post_meta($post->ID,'email',true)): ?>
									<li><a href="<?php echo get_post_meta($post->ID,'email',true); ?>" class="email">
<?php echo str_replace("mailto:","",get_post_meta($post->ID,'email',true)); ?>
</a></li>
								<?php endif;?>
								<?php if(get_post_meta($post->ID,'download cv',true)): ?>
									<li><a href="<?php echo get_post_meta($post->ID,'download cv',true); ?>" class="download">download cv</a></li>
								<?php endif;?>
								<?php if(get_post_meta($post->ID,'vcard',true)): ?>
									<li><a href="<?php echo get_post_meta($post->ID,'vcard',true); ?>" class="vcard">vcard</a></li>
								<?php endif;?>  -->
							</ul> 
						</div>
					<?php the_excerpt(); ?>
						<div style="clear:both;"></div>
					</div>
					<!-- <h3>REPRESENTATIVE MATTERS</h3>
					<?php the_content(); ?>  --!>
				</div>
				<?php endwhile; ?><?php else:?>
					<h2>Not Found</h2>
					<p>Sorry, but you are looking for something that isn't here.</p>
				<?php endif; ?>	
				<div id="sidebar">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Experts Sidebar') ) : ?><?php endif; ?>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>	