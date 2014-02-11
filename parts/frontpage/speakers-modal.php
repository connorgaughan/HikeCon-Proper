<article id="speakers-modal" class="container scroll">
	<div class="white">
		<header>
			<h3>Speakers &amp; Workshops</h3>
		</header>

		<div class="content">
			<ul class="people">
				<?php query_posts(array(
					'post_type' => 'speakers', 
					'p' => $_GET['pid'])
					);  while (have_posts ()): the_post(); ?> 
					
					<?php
						$details = get_post_meta($post->ID, 'dbt_details', true);
						$twitterHandle = get_post_meta($post->ID, 'dbt_talk-twitter', true);
						$company = get_post_meta($post->ID, 'dbt_talk-company', true);
						$website = get_post_meta($post->ID, 'dbt_talk-website', true);
						$tags = '@';
						$twitter = str_replace($tags, "", $twitterHandle);
					?>
				<?php if ( has_term('san-francisco', 'location' ) ) {?>
					<li>
				<?php } elseif ( has_term('chicago', 'location' ) ) {?>
					<li class="yellow">
				<?php } ?>
						<a class="modal" href="<?php bloginfo('url'); ?>/speakers?pid=<?php echo $post->ID; ?>">
							<?php the_post_thumbnail('people'); ?>
							<h4><?php the_title(); ?></h4>
							<p><?php echo $company; ?></p>
							<p><?php echo $twitterHandle; ?></p>
							<?php if ( has_term('san-francisco', 'location' ) ) {?>

								<p class="small">San Francisco</p>

							<?php } elseif ( has_term('chicago', 'location' ) ) {?>

								<p class="small">Chicago</p>

							<?php } ?>
						</a>
					</li>
								
				<?php endwhile; ?>
				</ul>
				<?php wp_reset_query(); ?>
		</div>
	</div>
</article>