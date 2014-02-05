<article id="board" class="container scroll">
	<div class="white">
		<header>
			<h3>Board</h3>
		</header>

		<div class="content">
			<ul class="people">
				<?php query_posts(array('post_type' => 'member', 'level' => 'board-member'));  while (have_posts ()): the_post(); ?> 
					
					<?php
						$position = get_post_meta($post->ID, 'dbt_position', true);
						$twitterHandle = get_post_meta($post->ID, 'dbt_twitter', true);
						$tags = '@';
						$twitter = str_replace($tags, "", $twitterHandle);
					?>

					<li>
						<?php
							if($twitterHandle){
								echo '	<a href="https://twitter.com/' . $twitter . '" target="blank">';
								echo		the_post_thumbnail('people');
								echo		'<h4>'; the_title(); echo '</h4>';
							if($position){
								echo 		'<p>' . $position . '</p>';
							}
								echo 		'<p>' . $twitterHandle . '</p>';
								echo ' 	</a></p>';

							} else {

								echo		the_post_thumbnail('people');
								echo		'<h4>' . the_title() . '</h4>';
							if($position){
								echo 		'<p>' . $position . '</p>';
							}
								echo 		'<p>' . $twitterHandle . '</p>';
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
</article>