<?php if(is_front_page()) : ?>
<header class="front">
<?php else : ?>
<header>
<?php endif; ?>
	<nav class="menu">
		<a href="<?php echo bloginfo('url'); ?>"><img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/_assets_production/images/icons/hike-logo.svg" alt="HikeCon" />
		<?php wp_nav_menu( array( 'container' => '', 'container_class' => '', 'theme_location' => 'primary' ) ); ?>
</nav>
	<button class="hamburger lines-button x" type="button" role="button" aria-label="Toggle Navigation">
			<span class="lines"></span>
		</button>
	<div class="sticky">
		<div class="container">
			<div class="sanfran tickets">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/_assets_production/images/icons/san-francisco-bridge-gray.svg" alt="Bridge" />
				<p class="fade-out"><span class="red">San Francisco</span> @ Adobe &mdash;<br />April 5, 2014</p>
				<p class="fade-out"><span class="red">San Francisco</span> @ Adobe &mdash;<br />April 5, 2014</p>
				<p class="get-tickets">Sold Out</p>
			</div>
			<div class="chi tickets">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/_assets_production/images/icons/cloud-gate-bean-gray.svg" alt="Bean" />
				<p class="fade-out"><span class="red">Chicago</span> @ Morningstar &mdash;<br />October 25, 2014</p>
				<p class="get-tickets"><a href="#">Get Tickets</a></p>
			</div>
		</div>
	</div>
</header>
