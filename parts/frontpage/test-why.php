<article id="why" class="scroll">
	<div class="container">
		<div class="colored full purple">
			<header>
				<ul class="tabs">
					<li><a data-slide-index="0" href="">What is Hike?</a></li>
					<li><a data-slide-index="1" href="">Purpose &amp; goal</a></li>
					<li><a data-slide-index="2" href="">Why should I go?</a></li>
				</ul>
			</header>
			<div class="content">
				<ul class="slider">
					<li><div id="what">
						<?php query_posts('page_id=10');  while (have_posts ()): the_post(); ?> 
							
							<h3><?php the_title(); ?></h3> 
								
							<?php the_content(); ?> 

						<?php endwhile; ?>
						<?php wp_reset_query(); ?>
					</div></li>
					<li><div id="purpose">
						<?php query_posts('page_id=12');  while (have_posts ()): the_post(); ?> 
							
							<h3><?php the_title(); ?></h3> 
							
							<?php the_content(); ?> 
							
						<?php endwhile; ?>
						<?php wp_reset_query(); ?>
					</div></li>
					<li><div id="go">
						<?php query_posts('page_id=14');  while (have_posts ()): the_post(); ?> 
							
							<h3><?php the_title(); ?></h3> 
								
							<?php the_content(); ?> 
							<div class="underline"></div>
							
						<?php endwhile; ?>
						<?php wp_reset_query(); ?>
					</div>
				</ul>
			</div>
		</div>
	</div>
</article>