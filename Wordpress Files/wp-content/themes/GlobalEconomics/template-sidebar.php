<?php 
/*
	Template Name: sidebarPlatformDes
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


<div class="section widget_pages"><div class="title"><h3>Catalyst Course</h3></div><ul class="item-list">        <!-- Our writing -->
<li><a href="http://pymnts.com/commentary/Ready-Aim-Ignite/" title="" target="_blank">Ready Aim Ignite</a><a href="https://cpi.adobeconnect.com/_a812723998/p28i66eh9yt/" target="_blank">Presentation</a></li>
<li><a href="http://pymnts.com/commentary/platform-businesses-can-turn-junk-like-pez-dispensers-into-massive-profits/" title="" target="_blank">Platform Businesses can turn junk like pez Dispensers into Massive Profits</a></li>
<li><a href="http://pymnts.com/commentary/The-Secret-to-a-Profitable-Platform-Figuring-Out-Who-Pays-and-Who-Doesn-t/" title="" target="_blank">The Secret to a Profitable Platform Figuring Out Who Pays and Who Doesnt</a></li>
<li><a href="http://pymnts.com/commentary/Catalyst-Course-How-Facebook-Can-Avoid-Becoming-The-Next-MySpace/" target="_blank" title="">Catalyst Course How Facebook Can Avoid Becoming The Next MySpace</a></li>
<li><a href="http://www.pymnts.com/assets/Uploads/CC5.pdf" target="_blank" title="">How to Ignite a Platform Business and Rule a Platform-Centric Ecosystem</a></li>
       <!-- /Our writing -->
        </ul></div>

<div class="section widget_pages"><div class="title"><h3>Meet The Experts</h3></div><ul class="item-list">        <!-- MEET THE EXPERTS -->
<li><a href="/experts/david-s-evans/" title="David">David S. Evans</a></li>
<li><a href="/experts/karen-l-webster/" title="Karen L. Webster">Karen L. Webster</a></li>
<li><a href="/experts/richard-schmalensee-phd/" title="Posts by Richard Schmalensee">Richard Schmalensee</a></li> 

       <!-- /Lmeet the experts -->
        </ul></div>

<div class="section widget_pages"><div class="title"><h3>Platform Writings</h3></div><ul class="item-list">        <!-- OUR PROJECTS -->
<li><a href="http://papers.ssrn.com/sol3/papers.cfm?abstract_id=1974020" target="_blank">Platform Economics: Essays on Multi-Sided Businesses</a></li>
<li><a href="/wp-content/uploads/Downloads/The-Economics-of-the-Online-Advertising-Industry.pdf" target="_blank">The Economics of the Online Advertising Industry</a></li>
<li><a href="/wp-content/uploads/Downloads/Online-Advertising-Industry-Economics-Evolution-and-Privacy.pdf" target="_blank">The Online Advertising Industry: Economics, Evolution, and Privacy</a></li>
<li><a href="/wp-content/uploads/Downloads/The-Architecture-of-Product-Offerings.pdf" target="_blank">The Architecture of Product Offerings</a></li>
<!-- /our projetcs-->
</ul></div>

</div>
       <!-- /End Sidebar -->

			</div>
		</div>
	</div>
<?php get_footer(); ?>	