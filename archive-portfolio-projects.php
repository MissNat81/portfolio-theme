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
			'post_type'			=> 'portfolio-projects',
			'posts_per_page'	=> -1,
			'order'				=> 'DESC',
			'orderby'			=> 'title'
		);

		$query = new WP_Query( $args );

		if ($query -> have_posts() ) :
			?>
			<header class="page-title waviy">
				<h1>
   				<span style="--i:1">P</span>
				<span style="--i:2">r</span>
				<span style="--i:3">o</span>
				<span style="--i:4">j</span>
				<span style="--i:5">e</span>
				<span style="--i:6">c</span>
				<span style="--i:7">t</span>
				<span style="--i:8">s</span>


   				</h1>
			</header>
			<section class="projects">
			<?php
				while ( $query -> have_posts() ) :
					$query -> the_post();
					?>				
						<article class="project-item">
					<a href="<?php the_permalink(); ?>">
						<div class="content">
							<div class="content-overlay"></div>						
						<?php the_post_thumbnail('medium'); ?>	
						<div class="content-details fade-in-left">	
							<h2 class="project-title"><?php the_title(); ?></h2>
							<!-- <?php if( get_field('icon') ): ?>
								<img class="icon" src="<?php the_field('icon'); ?>" />
							<?php endif; ?> -->
							<p><?php the_excerpt(); ?></p>	
						</div>
						
						</div>
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
