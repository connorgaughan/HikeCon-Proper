<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php if(is_page(32)) : ?>

	<section class="single">
		<div class="container">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<div class="colored full white">
				<header>
					<h1><?php the_title(); ?></h1>
				</header>
				<div class="content">
					<?php the_content(); ?>
				</div>
			</div>
			<?php endwhile; ?>
			<?php wp_reset_query(); ?>
			<div class="colored full white">
				<header>
					<h2>Founders</h2>
				</header>
				<ul class="people founders">
				<?php query_posts(array('post_type' => 'member', 'level' => 'founders'));  while (have_posts ()): the_post(); ?> 
					
					<?php
						$company = get_post_meta($post->ID, 'dbt_company', true);
						$position = get_post_meta($post->ID, 'dbt_position', true);
						$twitterHandle = get_post_meta($post->ID, 'dbt_twitter', true);
						$tags = '@';
						$twitter = str_replace($tags, "", $twitterHandle);
					?>
					<?php if ( $post->ID == 47 ) {?>

						<li class="yellow">

					<?php } else { ?>

						<li>

					<?php } ?>
						<a class="modal" href="<?php bloginfo('url'); ?>/founders?pid=<?php echo $post->ID; ?>">
						<?php
							echo the_post_thumbnail('people');
							echo '<h4>'; echo the_title(); echo '</h4>';
							if($position){
							echo '<p>' . $position . '</p>';
							}
							if($company){
							echo '<p>' . $company . '</p>';
							}
							echo '<p>' . $twitterHandle . '</p>';
						?>	
						</a>
					</li>
								
				<?php endwhile; ?>
				</ul>
				<?php wp_reset_query(); ?>
			</div>
			<div class="colored full white">
				<header>
					<h2>Meet the Board</h2>
				</header>
				<ul class="people">
				<?php query_posts(array('post_type' => 'member', 'level' => 'board-member'));  while (have_posts ()): the_post(); ?> 
					
					<?php
						$company = get_post_meta($post->ID, 'dbt_company', true);
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
								if($company){
									echo '<p>' . $company . '</p>';
								}
								echo 		'<p>' . $twitterHandle . '</p>';
								echo ' 	</a></p>';

							} else {

								echo		the_post_thumbnail('people');
								echo		'<h4>' . the_title() . '</h4>';
								if($position){
									echo 		'<p>' . $position . '</p>';
								}
								if($company){
									echo '<p>' . $company . '</p>';
								}
								echo 		'<p>' . $twitterHandle . '</p>';
							}
						?>	
					</li>
								
				<?php endwhile; ?>
				</ul>
				<?php wp_reset_query(); ?>
			</div>
		</div>
		<div class="container">
			<div class="colored full white">
				<header>
					<h2>Volunteers</h2>
				</header>
				<ul class="people">
				<?php query_posts(array('post_type' => 'member', 'level' => 'volunteer'));  while (have_posts ()): the_post(); ?> 
					
					<?php
						$position = get_post_meta($post->ID, 'dbt_position', true);
						$company = get_post_meta($post->ID, 'dbt_company', true);
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
								if($company){
									echo '<p>' . $company . '</p>';
								}
								echo 		'<p>' . $twitterHandle . '</p>';
								echo ' 	</a></p>';

							} else {
								
								echo		the_post_thumbnail('people');
								echo		'<h4>'; the_title(); echo '</h4>';
								if($company){
									echo '<p>' . $company . '</p>';
								}
								echo 		'<p>' . $twitterHandle . '</p>';
							}
						?>	
					</li>
								
				<?php endwhile; ?>
				</ul>
				<?php wp_reset_query(); ?>
			</div>
		</div>
	</section>
<?php elseif(is_page('volunteer')) : ?>
	<section class="single">
		<div class="container">
			<div class="colored full white">
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<header>
					<h1><?php the_title(); ?></h1>
				</header>
				<?php volunteer_form(); ?>
				<?php endwhile; ?>
			</div>
		</div>
	</section>
<?php elseif(is_page('sponsor')) : ?>
	<section class="single">
		<div class="container">
			<div class="colored full white">
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<header>
					<h1><?php the_title(); ?></h1>
				</header>
				<?php sponsor_form(); ?>
				<?php endwhile; ?>
			</div>
		</div>
	</section>
<?php else : ?>
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<h2><?php the_title(); ?></h2>
	<?php the_content(); ?>
	<?php comments_template( '', true ); ?>
	<?php endwhile; ?>

<?php endif; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>