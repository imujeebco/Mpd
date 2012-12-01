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
                        <?php global $post; ?>
			<?php $info=get_userdata($post->post_author); ?>
			<?php global $wpdb; $result = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_title = '".$info->display_name . "' ORDER BY ID LIMIT 1"); $_auth = array_shift($result); ?>
			<div class="main-container">
				<div id="content">
					<div class="posts">
					<?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?>
						<div class="post">
							<div class="title">
								<h1><?php the_title(); ?></h1>
							</div>
							<div class="posted">
								<ul class="links">
									<li><div class="comment-link"><?php comments_popup_link('0 comments', '1 comment', '% comments'); ?></div></li>
									<li><?php echo str_replace(array('{url}','{title}'),array(get_permalink(),get_the_title()),st_makeEntries()); ?></li>
									<li><a href="http://twitter.com/home?status=<?php echo str_replace('+', '%20', urlencode( the_title()) ); ?>%20-%<?php echo urlencode(the_permalink()); ?>"><img src="<?php bloginfo('template_url'); ?>/images/ico-twitter.gif" alt="image description" width="14" height="13" /></a></li>
								</ul>
						<!--		<p>By <a href="<?php echo get_permalink($_auth->ID); ?>" class="author"><?php echo $_auth->post_title; ?></a> on <span class="date"><?php the_time('F j, Y'); ?></span></p>               -->
							</div>							
							 <?php if ( has_post_thumbnail() ):?>
								 <div class="image">
									<?php the_post_thumbnail('post'); ?>
								</div>	
							<?php endif; ?>
							<?php the_content(); ?>
							<dl class="tags">
								<?php the_tags('<dd><dt>Tagged:</dt>: ', ', ', '</li></dd>'); ?>
							</dl>
						</div>
						<div class="section-info">						
						
						<!--
							<div class="info-box">
								<h2>About the Author</h2>
								<div class="photo">
									<?php $_id = get_post_thumbnail_id($_auth->ID); if($_id): ?>
										<?php $_image = wp_get_attachment_image_src($_id,'experts',false); ?>
										<img src="<?php echo $_image[0]; ?>" alt="" width="224" />
									<?php endif; ?>
									<div class="link">
										<a href="<?php echo get_permalink($_auth->ID); ?>">read more &raquo;</a>
									</div>
								</div>
								<dl class="info-list">
									<dt>Name</dt>
									<dd><?php echo $_auth->post_title; ?></dd>
									<?php if(get_post_meta($_auth->ID,'Title/Location',true)): ?>
										<dt>Title/Location</dt>
										<dd><?php echo get_post_meta($_auth->ID,'Title/Location',true); ?></dd>
									<?php endif;?>
									<?php if(get_post_meta($_auth->ID,'Phone',true)): ?>
										<dt>Phone</dt>
										<dd><?php echo get_post_meta($_auth->ID,'Phone',true); ?></dd>
									<?php endif;?>
									<?php if(get_post_meta($_auth->ID,'Expertise',true)): ?>
										<dt>Expertise</dt>
										<dd><?php echo get_post_meta($_auth->ID,'Expertise',true); ?><dd>
									<?php endif;?>
								</dl>
								<ul class="actions">
									<?php if(get_post_meta($_auth->ID,'email',true)): ?>
										<li><a href="<?php echo get_post_meta($_auth->ID,'email',true); ?>" class="email">email</a></li>
									<?php endif;?>
									<?php if(get_post_meta($_auth->ID,'download cv',true)): ?>
										<li><a href="<?php echo get_post_meta($_auth->ID,'download cv',true); ?>" class="download">download cv</a></li>
									<?php endif;?>
									<?php if(get_post_meta($_auth->ID,'vcard',true)): ?>
										<li><a href="<?php echo get_post_meta($_auth->ID,'vcard',true); ?>" class="vcard">vcard</a></li>
									<?php endif;?>
								</ul>
							</div>-->
							<div class="topiclist">
							<?php related_posts(); ?>
							</div>
						</div>
						<?php comments_template(); ?>
						<?php endwhile; ?>
						<div class="navigation">
							<div class="prev"><?php previous_post_link('&laquo; %link') ?></div>
							<div class="next"><?php next_post_link('%link &raquo;') ?></div>
						</div>
						<?php else:?>
							<div class="post">
								<div class="title">
									<h1>Not Found</h1>
								</div>
								<p>Sorry, but you are looking for something that isn't here.</p>
							</div>	
						<?php endif; ?>
					</div>
				</div>
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>	