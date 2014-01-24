<article id="board" class="scroll">
	<div class="container">
		<div class="white">
			<header>
				<h3>Board</h3>
			</header>
			<div class="content">
				<ul class="people">
				<?php query_posts(array('post_type' => 'member', 'level' => 'board-member'));  while (have_posts ()): the_post(); ?> 
					
					<?php
						$position = get_post_meta($post->ID, 'dbt_position', true);
						$company = get_post_meta($post->ID, 'dbt_company', true);
						$twitterHandle = get_post_meta($post->ID, 'dbt_twitter', true);
						$tags = '@';
						$twitter = str_replace($tags, "", $twitterHandle);
					?>

					<li>
						<h4><?php the_title(); ?></h4>
						<?php
							if($position){
								echo '<p>' . $position . '</p>';
							}
							if($company){
								echo '<p>' . $company . '</p>';
							}
						?>
					</li>
								
				<?php endwhile; ?>
				</ul>
				<?php wp_reset_query(); ?>
			</div>
			<footer>
				<p><a href="<?php echo 	bloginfo(url); ?>/board-and-volunteers">Made possible by these great volunteers</a></p>
			</footer>
		</div>
	</div>
</article>