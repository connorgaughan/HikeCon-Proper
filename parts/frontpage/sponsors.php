<article id="sponsors" class="container scroll">
	<div class="colored full light-green">
		<header>
			<h3>Sponsors</h3>
		</header>
		<div class="content">
			<?php query_posts(array( 'post_type' => 'sponsors', 'tiers' => 'tier-one'));  while (have_posts ()): the_post(); ?> 
						
				<a href="<?php print the_permalink(); ?>"><?php the_post_thumbnail(); ?></a> 
								
			<?php endwhile; ?>
			<?php wp_reset_query(); ?>
		</div>
	</div>
</article>