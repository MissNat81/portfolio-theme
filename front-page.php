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

		<section class="introduction">
			<?php
			// if (function_exists('get_field') ) {
			// 	if (get_field('intro_text')) {
			// 		echo '<p class="line-1 anim-typewriter">';
			// 		the_field('intro_text');
			// 		echo '</p>';
			// 	}
			// }
			?>
		</section>
		<?php
		while ( have_posts() ) :
			the_post();
			
			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
