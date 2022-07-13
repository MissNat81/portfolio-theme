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
	
					<section class="about-container">					
					
						<article class="about-me">	
							<?php		
							if ( function_exists ('get_field') ) :
								if ( get_field( 'about_me_text' ) ) :
									?>
									<p><?php the_field('about_me_text'); ?></p>
									<?php
								endif;
							?>
						</article>

						<article class="contact-me">								
								<h3><?php the_field('header');?></h3>
								<nav id="social-navigation" class="social-navigation">
								<?php wp_nav_menu(array('theme_location' => 'social')); ?>
								</nav>
						</article>						
				
						<figure class="about-image">
								<?php
								$image = get_field('hero_image');
								$size = 'large'; // (thumbnail, medium, large, full or custom size)
								if( $image ) :
									echo wp_get_attachment_image( $image, $size );					
								endif;					
							?>		
						</figure>
							<?php	
							endif;
						?>
				</section>
				<?php
			

		endwhile; // End of the loop.
		?>


	</main><!-- #main -->

<?php
get_footer();
