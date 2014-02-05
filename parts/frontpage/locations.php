<section id="locations" class="scroll">
	<div class="container">
		<article class="colored half blue" id="sanfran" itemscope itemtype="http://schema.org/Event">
			<?php query_posts('page_id=16');  while (have_posts ()): the_post(); ?> 
				<header>
					<img class="bridge" src="<?php echo get_stylesheet_directory_uri(); ?>/_assets_production/images/icons/san-francisco-bridge.svg" alt="Golden Gate Bridge" />
					<h2><?php the_title(); ?></h2> 
				</header>

				<div class="content">		
					<?php the_content(); ?> 

					<div id="sanfran-map" class="g-map"></div>

					<?php
						$myExcerpt = get_the_excerpt();
						$tags = array("<p>", "</p>");
						$myExcerpt = str_replace($tags, "", $myExcerpt);
					?>

					<a class="button tickets" href="<?php echo $myExcerpt; ?>" target="blank">Buy Tickets</a>
				</div>

				<div class="ticket-info">
					<p>Earlybird (until 3/1) &mdash; $30</p>
					<p>Students &mdash; $30</p>
					<p>General Admisison &mdash; $80</p>
				</div>

			<?php endwhile; ?>
			<?php wp_reset_query(); ?>
		</article>

		<article class="colored half green" id="chicago" itemscope itemtype="http://schema.org/Event">
			<?php query_posts('page_id=18');  while (have_posts ()): the_post(); ?> 
				
				<header>
					<img class="bean" src="<?php echo get_stylesheet_directory_uri(); ?>/_assets_production/images/icons/cloud-gate-bean.svg" alt="Cloud Gate Bean" />
					<h2><?php the_title(); ?></h2>
				</header>
				
				<div class="content">

					<?php the_content(); ?> 

					<div id="chicago-map" class="g-map">SanFran Map Goes Here</div>

					<?php
						$myExcerpt = get_the_excerpt();
						$tags = array("<p>", "</p>");
						$myExcerpt = str_replace($tags, "", $myExcerpt);
					?>
					
					<a class="button tickets" href="<?php echo $myExcerpt; ?>" target="blank">Buy Tickets</a>

				</div>

				<div class="ticket-info">
					<p>Earlybird (until 3/1) &mdash; $30</p>
					<p>Students &mdash; $30</p>
					<p>General Admisison &mdash; $80</p>
				</div>

			<?php endwhile; ?>
			<?php wp_reset_query(); ?>
		</article>
	</div>
</section>