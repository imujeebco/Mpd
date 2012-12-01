<?php
/*
Template Name: Taxonomy Template
*/
?>
<?php get_header(); ?>
	<div id="main">
		<div class="main-holder">
			<div class="page-title">
			<?php global $wp_query;
//$wp_query = new WP_Query( array( "orderby"=>"title", "order"=>"ASC" ) ); 
//$obj = new WP_Query( array( "orderby"=>"title", "order"=>"ASC" ) ); 
$obj=$wp_query->queried_object;

 ?>
			<!-- <h1><?php echo $obj->name; ?></h1> -->

				 <h1><?php echo ((strtolower($obj->name)=="all")?'The Team':ucwords($obj->name)); ?></h1>
				 <img src="<?php bloginfo('template_url'); ?>/images/img06.jpg" alt="image description" width="902" height="136"/>	 
			</div>
			<div class="intro">
				<?php echo $obj->description; ?>
			</div>
<!--			<div>&nbsp;</div>-->

			<h3>Management</h3>
			<!--<div class="search-bar">
				<strong class="ttl">Search</strong>
				<?php //theme_get_search_form(); ?>
			</div>-->
			<ul class="profile-list">
				<?php $x = 0; ?>
				 <?php if(have_posts()): ?>
					  <?php while(have_posts()): the_post();?>
						<li>
							<div class="photo">
							<?php if ( has_post_thumbnail() ):?><?php the_post_thumbnail('experts'); ?><?php endif; ?>
							</div>
							<dl class="info-list">
							      <div class="dtteam"><div class="link">
									<a href="<?php the_permalink(); ?>"><?php the_title();?></a>
								</div></div>
                                                              <dd><?php echo get_post_meta($post->ID,'position',true); ?></dd>
								<div class="link">
									<a href="<?php the_permalink(); ?>">Full Bio &raquo;</a>
								</div>

				<!--				<?php if(get_post_meta($post->ID,'Title/Location',true)): ?>
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
							</ul> -->
						</li> 
						
						<?php if($x == 4) { ?> <div class="profile_clear"></div><div class="profile_divider"></div><h3>Consultants</h3> <?php } ?>
						
					  <?php $x++; ?>						
					  <?php endwhile; ?>
				 <?php endif; ?>
			</ul>
			<div class="paging">
				<div class="hold">
					<div>
						<?php wp_pagenavi(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>	