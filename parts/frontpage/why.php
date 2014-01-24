<article id="why" class="scroll">
	<div class="container">
		<div class="colored full purple">
			<ul class="tabs">
				<li><a href="#what">What is Hike?</a></li>
				<li><a href="#purpose">Purpose &amp; goal</a></li>
				<li><a href="#go">Why should I go?</a></li>

				<div id="what">
					<?php query_posts('page_id=10');  while (have_posts ()): the_post(); ?> 
					
						<h3><?php the_title(); ?></h3> 
						
						<?php the_content(); ?> 

					<?php endwhile; ?>
					<?php wp_reset_query(); ?>
				</div>
				<div id="purpose">
					<?php query_posts('page_id=12');  while (have_posts ()): the_post(); ?> 
					
						<h3><?php the_title(); ?></h3> 
						
						<?php the_content(); ?> 
					
					<?php endwhile; ?>
					<?php wp_reset_query(); ?>
				</div>
				<div id="go">
					<?php query_posts('page_id=14');  while (have_posts ()): the_post(); ?> 
					
						<h3><?php the_title(); ?></h3> 
						
						<?php the_content(); ?> 
					
					<?php endwhile; ?>
					<?php wp_reset_query(); ?>
				</div>
			</ul>
		</div>
	</div>
</article>