<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Portfolio_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();
			
			?>
			<header class="about-page-title">
			<h1>This is<span class="dark-font"> me</span></h1>
			</header>
	
			<section class="about">
			<?php			
			if (function_exists ('get_field') ) :
			
				// $image = get_field('hero_image');
				// 	$size = 'full'; // (thumbnail, medium, large, full or custom size)
				// 	if( $image ) :
				// 		echo wp_get_attachment_image( $image, $size );
				// 	endif;

				

				if (get_field( 'about_me_text' ) ) :
					?>
					<p><?php the_field('about_me_text'); ?></p>
					<?php
				endif;
					
			endif;
			?>
			</section>

			<section class="contact-me">
				<h3>Want to get in touch?</h3>

				<nav id="social-navigation" class="social-navigation">
				<?php wp_nav_menu(array('theme_location' => 'social')); ?>
				</nav>
				
			</section>

			<?php
			get_template_part( 'template-parts/content', 'page' );
			
			

			

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
