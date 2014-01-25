<header>
	<?php wp_nav_menu( array( 'container' => 'nav', 'container_class' => 'menu', 'theme_location' => 'primary' ) ); ?>
	<div class="sticky">
		<button class="hamburger lines-button x" type="button" role="button" aria-label="Toggle Navigation">
			<span class="lines"></span>
		</button>
		<div class="container">
			<div class="sanfran tickets">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/_assets_production/images/icons/san-francisco-bridge.svg" alt="Bridge" />
				<p class="fade-out"><span class="red">San Francisco</span> @ Adobe &mdash;<br />April 5, 2014</p>
				<p class="get-tickets"><a href="#">Get Tickets</a></p>
			</div>
			<div class="chi tickets">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/_assets_production/images/icons/cloud-gate-bean.svg" alt="Bean" />
				<p class="fade-out"><span class="red">Chicago</span> @ Morningstar &mdash;<br />October 25, 2014</p>
				<p class="get-tickets"><a href="#">Get Tickets</a></p>
			</div>
		</div>
	</div>
</header>
