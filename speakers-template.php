<?php
/*
Template Name: Speakers
*/
?>

<?php query_posts(array( 'post_type' => 'speakers',  'p' => $_GET['pid']) );  while (have_posts ()): the_post(); ?> 
	<article id="single-speaker" class="container">
		<div class="colored full red">
			<?php
				$title = get_post_meta($post->ID, 'dbt_talk-title', true);
				$time = get_post_meta($post->ID, 'dbt_talk-details', true);
				$twitterHandle = get_post_meta($post->ID, 'dbt_talk-twitter', true);
				$tags = '@';
				$twitter = str_replace($tags, "", $twitterHandle);
			?>
			<header class="left">
				<div class="photo">
					<?php the_post_thumbnail('people'); ?>

					<?php if ( has_term('san-francisco', 'location' ) ) {?>

						<img class="location-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/_assets_production/images/icons/san-francisco-bridge.svg" alt="Bridge" />

					<?php } elseif ( has_term('chicago', 'location' ) ) {?>

						<img class="location-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/_assets_production/images/icons/cloud-gate-bean.svg" alt="Bean" />

					<?php } ?>
				</div>

				<?php
					if( $twitterHandle ){
						echo '<p><a href="https://twitter.com/' . $twitter . '" target="blank">' . $twitterHandle . '</a></p>';
					}
					if( $title ){
						echo '<p><a href="http://' . $title . '">' . $title . '</a></p>';
					}
				?>
			</header>
			<section class="right">
				<h1><?php the_title(); ?></h1>
				<?php 
					if( $time ){
						echo '<time>' . $time . '</time>';
					}
					the_content(); 
				?>
			</section>
		</div>	
</article>
<?php endwhile; ?>
<?php wp_reset_query(); ?>
