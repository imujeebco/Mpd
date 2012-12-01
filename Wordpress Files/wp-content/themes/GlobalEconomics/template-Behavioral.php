<?php 
/*
	Template Name: Behavioral
*/	
get_header(); ?>
<style>.page-title h1 {
font: 15px/34px 'Ubuntu-Regular', sans-serif;
}</style>

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
<li><a href="/experts/david-s-evans/" title="Murphy">David S Evans</a></li>
<li><a href="/experts/karen-l-webster/" title="Karen L. Webster">Karen L. Webster</a></li>
<li><a href="/experts/chad-w-coffman/" title="Chad">Chad W Coffman</a></li>
<li><a href="/experts/richard-schmalensee-phd" title="Richard">Richard Schmalensee</a></li>
<li><a href="/experts/margaret-weichert/" title="Brian">Margaret Weichert</a></li>
<li><a href="/experts/brian-smith/" title="Brian">Brian Smith</a></li>
<li><a href="/experts/rosa-m-abrantes-metz/" title="Rosa">Rosa M. Abrantes-Metz</a></li>
<li><a href="/experts/gloria-colgan/" title="gloria">Gloria Colgan</a></li>
<li><a href="/experts/frank-jones/" title="Frank">Frank Jones</a></li>
<li><a href="/experts/james-shanahan/" title="James"> James Shanahan</a></li>
<li><a href="/experts/charles-rosenblatt/" title="Charles">Charles Rosenblatt</a></li>
<li><a href="/experts/ronald-mann" title="ronald">Ronald Mann</a></li>
       <!-- /Lmeet the experts -->
        </ul></div>


<div class="section widget_pages"><div class="title"><h3>Our Writings</h3></div><ul class="item-list">        <!-- Our writing -->

<li><a href="/wp-content/uploads/Downloads/The-Effect-of-the-Consumer-Financial-Protection-Agency-Act-of-2009-on-Consumer-Credit.pdf" title="" target="_blank">The Effect of the Consumer Financial Protection Agency Act of 2009 on Consumer Credit </a></li>
<li><a href="/wp-content/uploads/Downloads/How-the-Consumer-Financial-Protection-Agency-Act-of-2009-Would-Change-the-Law-and-Regulation-of-Consumer-Financial-Products.pdf" title="" target="_blank">How the Consumer Financial Protection Agency Act of 2009 Would Change the Law and Regulation of Consumer Financial Products</a></li>
<li><a href="/wp-content/uploads/Downloads/Evans-Behavioral-Economics-Women-in-Finance-Breakfast-14Nov2011.pptx" title="" target="_blank">Behavioral Economics Presentation</a></li>
<li><a href="http://pymnts.com/regulations/cfpb/CFPB-Enforcement-A-Cautionary-Tale/" title="" target="_blank">CFPB Enforcement A Cautionary Tale</a></li>
<li><a href="/wp-content/uploads/Downloads/MPD-Payments-Litigation-and-Regulation-Brochure-Sept%202012.pdf" title="" target="_blank">Litigation and Regulation Brochure</a></li>
<li><a href="/wp-content/uploads/Downloads/Economic-Analysis.pdf" title="" target="_blank">Economic Analysis of Claims in Support of the ‘Durbin Amendment’ to Regulate Debit Card Interchange Fees</a></li>
<li><a href="/wp-content/uploads/Downloads/The-Effect-of-the-Consumer-Financial-Protection-Agency-Act-of-2009-on-Consumer-Credit.pdf" title="" target="_blank">The Effect of the Consumer Financial Protection Agency Act of 2009 on Consumer Credit</a></li>
<li><a href="/wp-content/uploads/Downloads/The-Effect-of-Regulatory-Intervention-in-Two-Sided-Markets-An-Assessment-of-Interchange-Fee-Capping-in-Australia.pdf" title="" target="_blank">The Effect of Regulatory Intervention in Two-Sided Markets: An Assessment of Interchange-Fee Capping in Australia</a></li>
<li><a href="/wp-content/uploads/Downloads/Economic-Analysis-of-the-Effects-of-the-Federal-Reserve-Board.pdf" title="" target="_blank">Economic Analysis of the Effects of the Federal Reserve Board’s Proposed Debit Card Interchange Fee Regulations on Consumers and Small Businesses</a></li>
<li><a href="/wp-content/uploads/Downloads/Lessons-From-the-Recent-Orders.pdf" title="" target="_blank">Lessons from the Recent Orders</a></li>

       <!-- /Our writing -->
        </ul></div>


<div class="section widget_pages"><div class="title"><h3>Regulation</h3></div><ul class="item-list">        <!-- OUR PROJECTS -->
<li><a href="http://www.pymnts.com/briefingroom/regulation/The-Role-and-Regulation-of-Interchange-Fees-in-European-Payments-Cards-br/" title="" target="_blank">The Role and Regulation of Interchange Fees in European Payments Cards</a></li>
<li><a href="/wp-content/uploads/Downloads/The-Economics-of-Interchange-Fees-and-their-Regulation-An-Overview.pdf" title="" target="_blank">The Economics of Interchange Fees and their Regulation: An Overview by Richard Schmalensee, David Evans</a></li>
       <!-- /our projetcs-->
        </ul></div>

<div class="section widget_pages"><div class="title"><h3>Behavioral Economics</h3></div><ul class="item-list">        <!-- OUR PROJECTS -->
<li><a href="http://pymnts.com/commentary/pymnts-voice/the-new-economics-of-consumer-behavior-and-why-you-need-to-know-about-it/" title="" target="_blank">The New Economics of Consumer Behavior and Why You Need to Know About It</a></li>
<li><a href="http://pymnts.com/commentary/pymnts-voice/is-behavioral-economics-in-control-2/" title="" target="_blank">Is Behavioral Economics In-Control?</a></li>
<li><a href="http://www.pymnts.com/journal/201-2/march-3/the-behavioral-economics-of-paying-and-borrowing" title="" target="_blank">The Behavioral Economics of Paying and Borrowing</a></li>
        </ul></div>
</div>
       <!-- /End Sidebar -->
			</div>
		</div>
	</div>
<?php get_footer(); ?>