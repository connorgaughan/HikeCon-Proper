<?php
/*
Template Name: Founders
*/
?>

<?php query_posts(array( 'post_type' => 'member',  'p' => $_GET['pid']) );  while (have_posts ()): the_post(); ?> 
	<article id="single-speaker" class="container">
		<?php if ( $_GET['pid'] == 47 ) {?>

			<div class="colored full yellow">

		<?php } else { ?>

			<div class="colored full red">

		<?php } ?>
			<?php
				$company = get_post_meta($post->ID, 'dbt_company', true);
				$website = get_post_meta($post->ID, 'dbt_website', true);
				$time = get_post_meta($post->ID, 'dbt_details', true);
				$twitterHandle = get_post_meta($post->ID, 'dbt_twitter', true);
				$tags = '@';
				$twitter = str_replace($tags, "", $twitterHandle);
				$url = preg_replace('#^https?://#', '', rtrim($website,'/'));
			?>
			<header class="left">
				<div class="photo">
					<?php the_post_thumbnail('people'); ?>

					<?php if ( $_GET['pid'] == 47 ) {?>

						<img class="location-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/_assets_production/images/icons/cloud-gate-bean.svg" alt="Bean" />

					<?php } else { ?>

						<img class="location-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/_assets_production/images/icons/san-francisco-bridge.svg" alt="Bridge" />

					<?php } ?>
				</div>

				<?php
					if( $twitterHandle ){
						echo '<p><a href="https://twitter.com/' . $twitter . '" target="blank">' . $twitterHandle . '</a></p>';
					}
					if( $website ){
						echo '<p><a href="http://' . $url . '">' . $company . '</a></p>';
					} else {

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
