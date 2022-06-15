<?php
/**
 * The template for displaying projects archive page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Portfolio_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">
		<?php

		$args = array(
			'post-type'			=> 'portfolio-projects',
			'posts_per_page'	=> -1,
			'order'				=> 'ASC',
			'orderby'			=> 'title'
		);

		$query = new WP_Query( $args );

		if ($query -> have_posts() ) :
			?>
			<header class="page-title"><h1>My Projects</h1></header>
			<section class="projects">
			<?php
				while ( $query -> have_posts() ) :
					$query -> the_post();
					?>
					<article class="project-item">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail(); ?>
							<h2><?php the_title(); ?></h2>
							<p><?php the_excerpt(); ?></p>
						</a>
						
					</article>
					<?php
				endwhile;
				wp_reset_postdata();

			?>
			</section>
			<?php
		endif;
		?>

	</main><!-- #main -->

<?php
get_footer();
