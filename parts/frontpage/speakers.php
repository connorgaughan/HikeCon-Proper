<article id="speakers" class="container scroll">
	<div class="white">
		<header>
			<h3>Confirmed Speakers &amp; Workshops</h3>
		</header>

		<div class="content">
			<h4>San Francisco</h4>
			<p>
				<?php query_posts(array( 'post_type' => 'speakers', 'location' => 'san-francisco'));  while (have_posts ()): the_post(); ?> 
						
					<a href="<?php print the_permalink(); ?>"><?php the_title(); ?></a> 
								
				<?php endwhile; ?>
				<?php wp_reset_query(); ?>
			</p>

			<h4>Chicago</h4>
			<p>
				<?php query_posts(array( 'post_type' => 'speakers', 'location' => 'chicago'));  while (have_posts ()): the_post(); ?> 
						
					<a href="<?php print the_permalink(); ?>"><?php the_title(); ?></a> 
								
				<?php endwhile; ?>
				<?php wp_reset_query(); ?>
			</p>
		</div>

		<footer>
			<p>More Comming Soon</p>
		</footer>
	</div>
</article>