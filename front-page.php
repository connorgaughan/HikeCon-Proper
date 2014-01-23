<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<article id="home" class="scroll">
	<div class="container">
		<div class="colored full red">
			<h1><i class="icon-hike">HikeCon</i></h1>
		</div>
	</div>
</article>

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

<section id="locations" class="scroll">
	<div class="container">
		<article class="colored half blue">
			<?php query_posts('page_id=16');  while (have_posts ()): the_post(); ?> 
				<header>
					<h2><?php the_title(); ?></h2> 
				</header>
						
				<?php the_content(); ?> 

				<div id="sanfran-map" class="g-map">Google Map Goes Here</div>

				<?php
					$myExcerpt = get_the_excerpt();
					$tags = array("<p>", "</p>");
					$myExcerpt = str_replace($tags, "", $myExcerpt);
				?>

				<a class="button tickets" href="<?php echo $myExcerpt; ?>" target="blank">Buy Tickets</a>

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
						
				<?php the_content(); ?> 

				<div id="sanfran-map" class="g-map">SanFran Map Goes Here</div>

				<?php
					$myExcerpt = get_the_excerpt();
					$tags = array("<p>", "</p>");
					$myExcerpt = str_replace($tags, "", $myExcerpt);
				?>
				
				<a class="button tickets" href="<?php echo $myExcerpt; ?>" target="blank">Buy Tickets</a>

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

<article id="speakers" class="scroll">
	<div class="container">
		<div class="white">
			<header>
				<h3>Confirmed Speakers &amp; Workshops</h3>
			</header>
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
			<footer>
				<p>More Comming Soon</p>
			</footer>
		</div>
	</div>
</article>

<article id="sponsors" class="scroll">
	<div class="container">
		<div class="colored full light-green">
			<header>
				<h3>Sponsors</h3>
			</header>
		</div>
	</div>
</article>

<article id="board" class="scroll">
	<div class="container">
		<div class="white">
			<header>
				<h3>Board</h3>
			</header>
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
			<footer class="clearfix">
				<p><a href="<?php echo 	bloginfo(url); ?>/board-and-volunteers">Made possible by these great volunteers</a></p>
			</footer>
		</div>
	</div>
</article>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>