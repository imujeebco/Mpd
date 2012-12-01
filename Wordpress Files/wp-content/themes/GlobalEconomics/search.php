<?php get_header(); ?>
	<?php if(isset($_REQUEST['exp'])): ?>
		<div id="main">
			<div class="main-holder">
				<div class="page-title">
					<?php global $wp_query; ?>
					<h1>Search</h1>
					 <img src="<?php bloginfo('template_url'); ?>/images/img06.jpg" alt="image description" width="902" height="136"/>	 
				</div>
				<div class="search-bar">
					<strong class="ttl">Search</strong>
					<?php theme_get_search_form(); ?>
				</div>
				<?php query_posts(array_merge($wp_query->query,array('post_type'=>'experts'))); ?>
				<?php if(have_posts()): ?>
				<ul class="profile-list">					
					  <?php while(have_posts()): the_post();?>
						<li>
							<div class="photo">
							<?php if ( has_post_thumbnail() ):?><?php the_post_thumbnail('experts'); ?><?php endif; ?>
								<div class="link">
									<a href="<?php the_permalink(); ?>">read more &raquo;</a>
								</div>
							</div>
							<dl class="info-list">
								<dt>Name</dt>
								<dd><?php the_title(); ?></dd>
								<?php if(get_post_meta($post->ID,'Title/Location',true)): ?>
									<dt>Title/Location</dt>
									<dd><?php echo get_post_meta($post->ID,'Title/Location',true); ?></dd>
								<?php endif;?>
								<?php if(get_post_meta($post->ID,'Phone',true)): ?>
									<dt>Phone</dt>
									<dd><?php echo get_post_meta($post->ID,'Phone',true); ?></dd>
								<?php endif;?>
								<?php if(get_post_meta($post->ID,'Expertise',true)): ?>
									<dt>Expertise</dt>
									<dd><?php echo get_post_meta($post->ID,'Expertise',true); ?><dd>
								<?php endif;?>
							</dl>
							<ul class="actions">
								<?php if(get_post_meta($post->ID,'email',true)): ?>
									<li><a href="<?php echo get_post_meta($post->ID,'email',true); ?>" class="email">email</a></li>
								<?php endif;?>
								<?php if(get_post_meta($post->ID,'download cv',true)): ?>
									<li><a href="<?php echo get_post_meta($post->ID,'download cv',true); ?>" class="download">download cv</a></li>
								<?php endif;?>
								<?php if(get_post_meta($post->ID,'vcard',true)): ?>
									<li><a href="<?php echo get_post_meta($post->ID,'vcard',true); ?>" class="vcard">vcard</a></li>
								<?php endif;?>
							</ul>
						</li>
					<?php endwhile; ?>					 
				</ul>
				<div class="paging">
					<div class="hold">
						<div>
							<?php wp_pagenavi(); ?>
						</div>
					</div>
				</div>
				<?php endif; wp_reset_query(); ?>
			</div>
		</div>
	<?php else: ?>
		<div id="main">
			<div class="main-holder">
				<div class="page-title">
					<img src="<?php bloginfo('template_url'); ?>/images/img13.jpg" alt="image description" width="902" height="151" />
				</div>		
				<div class="main-container">
					<div id="content">
						<div class="posts">
							<?php if (have_posts()) : ?><?php global $post; ?>								
								<h1>Search Results</h1>
							<?php while (have_posts()) : the_post(); ?>
								<?php if ('experts' != get_post_type()):?>
									<div class="post">
										<div class="title">
											<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
										</div>
										<?php the_excerpt(); ?>
										<a href="<?php the_permalink(); ?>">Read more &raquo;</a>
									</div>
								<?php endif; ?>
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
	<?php endif; ?>			
<?php get_footer(); ?>	