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

	<section id="board" class="scroll">
		<div class="container">
			<div class="colored full white">
				<header>
					<h3>Meet the Board</h3>
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
						<?php
							if($twitterHandle){
								echo '	<a href="https://twitter.com/' . $twitter . '" target="blank">';
								echo		'<h4>' . the_post_thumbnail('people') . '</h4>';
								echo		the_title();
											if($position){
												echo '<p>' . $position . '</p>';
											}
											if($company){
												echo '<p>' . $company . '</p>';
											}
								echo ' 	</a></p>';
							} else {
								echo	'<h4>' . the_post_thumbnail('people') . '</h4>';
								echo	the_title();

								if($position){
									echo '<p>' . $position . '</p>';
								}
								if($company){
									echo '<p>' . $company . '</p>';
								}
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
					<h3>Volunteers</h3>
				</header>
				<ul class="members">
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
								echo		'<h5>' . the_post_thumbnail('people') . '</h5>';
								echo		the_title();
											if($position){
												echo '<p>' . $position . '</p>';
											}
											if($company){
												echo '<p>' . $company . '</p>';
											}
								echo ' 	</a></p>';
							} else {
								echo	'<h5>' . the_post_thumbnail('people') . '</h5>';
								echo	the_title();

								if($position){
									echo '<p>' . $position . '</p>';
								}
								if($company){
									echo '<p>' . $company . '</p>';
								}
							}
						?>	
					</li>
								
				<?php endwhile; ?>
				</ul>
				<?php wp_reset_query(); ?>
			</div>
		</div>
	</section>

<?php elseif(is_page(34)) : ?>

<?php else : ?>

	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<h2><?php the_title(); ?></h2>
	<?php the_content(); ?>
	<?php comments_template( '', true ); ?>
	<?php endwhile; ?>

<?php endif; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>