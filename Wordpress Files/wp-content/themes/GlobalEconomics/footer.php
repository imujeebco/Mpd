				<div class="navbar">
					<div class="holder">
						<div class="frame">
							<?php $walker = new Walker_Custom_Menu(); ?>
							<?php wp_nav_menu(array('container' => '','theme_location' => 'main','menu_id' => 'nav','walker' => $walker)); ?>
						</div>
					</div>
				</div>
				<div id="footer">
					<div class="footer-holder">
						<div class="right-panel">
							<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Subscribe Sidebar') ) : ?><?php endif; ?>
							<div class="social">
								<strong class="title">Follow us</strong>
								<ul>
									<li><a href="https://twitter.com/pymnts" class="twitter" target="_blank">twitter</a></li>
									<li><a href="https://www.linkedin.com/company/pymnts.com" class="linkedin" target="_blank">Linkedin</a></li>
									<li><a href="https://www.youtube.com/user/pymnts" class="youtube" target="_blank">YouTube</a></li>
									<li><a href="https://www.facebook.com/pymnts" class="facebook" target="_blank">Facebook</a></li>
									<li><a href="http://pymnts.com/NewsListing_Controller/rss" class="rss" target="_blank">RSS</a></li>
								</ul>
							</div>
						</div>
						<div class="nav-holder">
						<?php wp_nav_menu(array( 'container_class' => '', 'theme_location' => 'bottom', 'menu_id' => '','menu_class'=>'bottom'));?>
						</div>
					</div>
					<div class="copyright">
						<ul>
							<li>&copy; <?php echo date('Y') ?>  Market Platform Dynamics</li>
							<li><a href="/editorial-policy/">Editorial Policy</a></li>
							<li><a href="/privacy-policy/">Privacy Policy</a></li>
						</ul>
					</div>
				</div>
				<a class="hidden" href="#wrapper">Back to top</a>
			</div>
		<?php wp_footer(); ?>
	</body>
</html>