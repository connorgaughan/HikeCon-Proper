<?php
/**
 * The Template for displaying all single posts
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<article id="single-speaker">
	<div class="container">
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
				</div>

				<h1><?php the_title(); ?></h1>

				<?php
					if( $twitterHandle ){
						echo '<p><a href="https://twitter.com/' . $twitter . '" target="blank">' . $twitterHandle . '</a></p>';
					}
				?>
			</header>
			<section class="right">
				<?php 
					if( $title ){
						echo '<h2>' . $title . '</h2><time>' . $time . '</time>';
					}
					the_content(); 
				?>
			</section>
		</div>	
	</div>
</article>
<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>