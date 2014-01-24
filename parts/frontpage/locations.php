<section id="locations" class="scroll">
	<div class="container">
		<article class="colored half blue">
			<?php query_posts('page_id=16');  while (have_posts ()): the_post(); ?> 
				<header>
					<h2><?php the_title(); ?></h2> 
				</header>

				<div class="content">		
					<?php the_content(); ?> 

					<div id="sanfran-map" class="g-map">Google Map Goes Here</div>

					<?php
						$myExcerpt = get_the_excerpt();
						$tags = array("<p>", "</p>");
						$myExcerpt = str_replace($tags, "", $myExcerpt);
					?>

					<a class="button tickets" href="<?php echo $myExcerpt; ?>" target="blank">Buy Tickets</a>
				</div>

				<footer class="ticket-info">
					<p>Earlybird (until 3/1) &mdash; $30</p>
					<p>Students &mdash; $30</p>
					<p>General Admisison &mdash; $80</p>
				</footer>

			<?php endwhile; ?>
			<?php wp_reset_query(); ?>
		</article>

		<article class="colored half green">
			<?php query_posts('page_id=18');  while (have_posts ()): the_post(); ?> 
				
				<header>
					<h2><?php the_title(); ?></h2> 
				</header>
				
				<div class="content">

					<?php the_content(); ?> 

					<div id="sanfran-map" class="g-map">SanFran Map Goes Here</div>

					<?php
						$myExcerpt = get_the_excerpt();
						$tags = array("<p>", "</p>");
						$myExcerpt = str_replace($tags, "", $myExcerpt);
					?>
					
					<a class="button tickets" href="<?php echo $myExcerpt; ?>" target="blank">Buy Tickets</a>

				</div>

				<footer class="ticket-info">
					<p>Earlybird (until 3/1) &mdash; $30</p>
					<p>Students &mdash; $30</p>
					<p>General Admisison &mdash; $80</p>
				</footer>

			<?php endwhile; ?>
			<?php wp_reset_query(); ?>
		</article>
	</div>
</section>