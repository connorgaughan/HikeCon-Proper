<article id="sponsors" class="scroll">
	<div class="container">
		<div class="colored full light-green">
			<header>
				<h3>Sponsors</h3>
			</header>
			<div class="content">
				<ul class="tier-one">
				<?php query_posts(array( 'post_type' => 'sponsors'));  while (have_posts ()): the_post(); ?> 
					<?php $url = get_post_meta($post->ID, 'dbt_sponsors-link', true); ?>
					<li><a href="<?php echo $url ?>"><?php the_post_thumbnail(); ?></a></li>
									
				<?php endwhile; ?>
				</ul>
				<?php wp_reset_query(); ?>
			</div>
		</div>
	</div>
</article>