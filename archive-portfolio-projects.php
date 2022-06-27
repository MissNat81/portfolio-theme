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
			<header class="page-title">
				<h1>Pro<span class="dark-font">jects</span></h1>
			</header>
			<section class="projects fade-left">
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
							<?php if( get_field('tech_stack') ): ?> 
								<p><?php the_field('tech_stack') ?> </p>
							<?php endif; ?> 
							<!-- <p><?php the_excerpt(); ?></p>	 -->
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
