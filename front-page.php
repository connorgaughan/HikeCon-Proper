<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<!-- I'm going to do a really rough idea of what the framework should be like by my best interpretation of HTML standards -->

<header id="sticky-dates"> <!-- although this took me a while to debate, it made sense to use this as our header as the site does not have a traditional placement for the nav within the header - also the header is sticky - also the header does not have the site name (which it should). Point is, I need there to be a proper header and having the event dates is not quite appropriate but still structurally functional -->
	<ul>
		<li>San Fran ... dates</li>
		<li>Chicago ... dates</li>
	</ul>
</header>

<nav> <!-- not sure where to best place the nav considering that it's somewhat hidden and that our header is going to be sticky. I'll let you dictate proper placement for this. -->
	<ul>
		<li></li>
	</ul>
</nav>

<article id="red-title">
	<h1>Hikecon.com</h1>
</article>

<article id="purple-what-is-hike">
	<h2>What is Hike</h2>
	<p>lorem ipsum...</p>
	<ul>
		<li>Purpose &amp; Goals</li>
		<li>Why should I go?</li>
	</ul>
</article>

<section> <!-- you can either add the ID or CLASS to the either the section or article tag below. -->
	<article id="blue-san-francisco"> <!-- you can choose to keep this article or only leave it as a section - if there is content on here however (which there is), I chose to use an article tag. Even so, I'm not entirely sold on the idea. I prefer less tags all the time over more tags -->
		<hgroup> <!-- this isn't entirely required but this just so happens to be a good eample to showcase where an hgroup can be used -->
			<h2>San Fran</h2>
			<h3>April 4</h3>
		</hgroup>
		<p>portfolio<br>
		registration</p>
		<h3>april 5</h3>
		<p> <!-- lists can also work for this areat istead of a p tag -->
		.... Post party</p>
		button
		yellow content
	</article>
</section>

<section> <!-- you can either add the ID or CLASS to the either the section or article tag below. -->
	<article id="green-chicago"> <!-- you can choose to keep this article or only leave it as a section - if there is content on here however (which there is), I chose to use an article tag. -->
		<hgroup> <!-- this isn't entirely required but this just so happens to be a good eample to showcase where an hgroup can be used -->
			<h2>San Fran</h2>
			<h3>April 4</h3>
		</hgroup>
		<p>portfolio<br>
		registration</p>
		<h3>april 5</h3>
		<p> <!-- lists can also work for this area istead of a P tag -->
		.... Post party</p>
		button
		yellow content
	</article>
</section>

<article id="orange-sponsors">
	<h2>Sponsors</h2>
	<figure> <!-- ho ho ho, it's a figure tag. figures are used to illustrate images, codeblocks, graphs and charts. I used a figure to house all the images. I actually am not 100% certain that it should be a single figure per image. if that's the case, it's way too much code for my linking. In this example, I use one figure to house all logo images. -->
		<img src="logo" title="" alt="">
		<figurecaption>logo caption</figurecaption><!-- dont bother if there is not going to be captions, just alt text the image if that's the case. -->
	
		<img src="logo" title="" alt="">
		<figurecaption>logo caption</figurecaption><!-- dont bother if there is not going to be captions, just alt text the image if that's the case. -->
	
		<img src="logo" title="" alt="">
		<figurecaption>logo caption</figurecaption><!-- dont bother if there is not going to be captions, just alt text the image if that's the case. -->
	
		<img src="logo" title="" alt="">
		<figurecaption>logo caption</figurecaption><!-- dont bother if there is not going to be captions, just alt text the image if that's the case. -->
	
		<img src="logo" title="" alt="">
		<figurecaption>logo caption</figurecaption><!-- dont bother if there is not going to be captions, just alt text the image if that's the case. -->
	
		<img src="logo" title="" alt="">
		<figurecaption>logo caption</figurecaption><!-- dont bother if there is not going to be captions, just alt text the image if that's the case. -->
	
		<img src="logo" title="" alt="">
		<figurecaption>logo caption</figurecaption><!-- dont bother if there is not going to be captions, just alt text the image if that's the case. -->
	
		<img src="logo" title="" alt="">
		<figurecaption>logo caption</figurecaption><!-- dont bother if there is not going to be captions, just alt text the image if that's the case. -->
	</figure>
</article>

<article class="standard-white"> <!-- this can be a class as the items added under here - like volunteers would pull from this style -->
	<h2>Board</h2>
	<p>or list or whatever of the members</p>
</article>

<article class="standard-white">
	<h2>Something else we might add in the future - like volunteers or something</h2>
	<p>lorem ipsum
</article>


<!-- 

Again I didn't want to mess with what you did. Keep in mind that what I provided above is mostly a suggestion. A valid suggestion as it closely follows web standards but it's not like I've ever been wrong before. I'd say this is mostly 80% accurate. 
A good way to think about this is that you need to use the term "DIV" as little as possible. Most of your items should sit in an article, section, aside, figure etc. 

-->

<section id="home" class="scroll">
	<div class="container">
		<div class="colored full red">
			<h1><i class="icon-hike">HikeCon</i></h1>
		</div>
	</div>
</section>

<section id="why" class="scroll">
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
</section>

<section id="locations" class="scroll">
	<div class="container">
		<div class="colored half blue">
			<?php query_posts('page_id=16');  while (have_posts ()): the_post(); ?> 
				<header>
					<h2><?php the_title(); ?></h2> 
				</header>
						
				<?php the_content(); ?> 

				<div id="sanfran-map">Google Map Goes Here</div>

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
		</div>
		<div class="colored half green">
			<?php query_posts('page_id=18');  while (have_posts ()): the_post(); ?> 
				
				<header>
					<h2><?php the_title(); ?></h2> 
				</header>
						
				<?php the_content(); ?> 

				<div id="sanfran-map">SanFran Map Goes Here</div>

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
		</div>
	</div>
</section>

<section id="speakers" class="scroll">
	<div class="container">
		<div class="colored full white">
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
</section>

<section id="sponsors" class="scroll">
	<div class="container">
		<div class="colored full light-green">
			<header>
				<h3>Sponsors</h3>
			</header>
		</div>
	</div>
</section>

<section id="board" class="scroll">
	<div class="container">
		<div class="colored full white">
			<header>
				<h3>Board</h3>
			</header>
			<ul class="members">
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
			<footer>
				<p><a href="<?php echo 	bloginfo(url); ?>/board-and-volunteers">Made possible by these great volunteers</a></p>
			</footer>
		</div>
	</div>
</section>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>