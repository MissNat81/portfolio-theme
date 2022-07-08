<?php
/**
 * The template for displaying all single projects posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
			<section class="project-header">
				<h1 class="project-title"><?php the_title(); ?></h1>
			</section>

			<section class="individual-project">
			<?php				

				if ( function_exists ( 'get_field' ) ) :

					$image = get_field('hero_image');
					$size = 'large'; // (thumbnail, medium, large, full or custom size)
					if( $image ) :
    					echo wp_get_attachment_image( $image, $size );
					endif;
				?>

				<section class="content-overview">
				<?php
					if ( get_field( 'about_header' ) ) :
					?>
						<h2><?php the_field( 'about_header' ); ?></h2>
					<?php
					endif;
		
					if (get_field ( 'project_overview' ) ) :
						?>
						<p class="overview"><?php the_field( 'project_overview' ); ?></p>
						<?php
						if( get_field ( 'collaborators_title' ) ) : 
						?>
							<h2><?php the_field( 'collaborators_title' ) ;?></h2>
						<?php
						endif;
						if ( get_field ( 'collaborators' ) ) :
						?>
							<p><?php the_field( 'collaborators' );?></p>
						<?php
						endif;
						?>
						<div class="link-site">
						<?php						
							$link = get_field( 'link' );
							if( $link ) : 
								$link_url = $link['url'];
	  							$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
							?>
								<a class="live-site" href="<?php echo esc_url( $link_url ); ?>"
								target="<?php echo esc_attr( $link_target ); ?>
								"><?php echo esc_html( $link_title ); ?>
								</a>							
							<?php
							endif;	
							$link = get_field( 'link2' );
							if( $link ) : 
								$link_url = $link['url'];
	  							$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
							?>
								<a class="github-site" href="<?php echo esc_url( $link_url ); ?>"
								target="<?php echo esc_attr( $link_target ); ?>
								"><?php echo esc_html( $link_title ); ?>
								</a>							
							<?php
							endif;	
							?>
						</div>
						<?php
					endif;
					?>
				</section>

				<section class="tech">
				<?php
					if ( get_field ( 'tech_stack_title' ) ) :
					?>
						<h2><?php the_field( 'tech_stack_title' ); ?></h2>
					<?php
					endif;
					?>
					<div class="icon-images">
					<?php
						if ( have_rows ( 'icons' ) ) :
							while ( have_rows( 'icons' ) ): 
								the_row();								
								$image = get_sub_field( 'icon' );
    							$size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)
								if( $image ) :
        							echo wp_get_attachment_image( $image, $size );	
    							endif;						
							endwhile;
						endif;
						
						if ( get_field ( 'role_title' ) ) : 
						?>
							<h2><?php the_field( 'role_title' ) ;?></h2>
						<?php
						endif;
						if ( get_field ( 'roles' ) ) :
						?>
							<p><?php the_field( 'roles' );?></p>
						<?php
						endif;							
						?>						
					</div>
				</section>
				

				<section class="process">
					<div class="btn-process">
					<?php
						if (get_field ( 'design_title' ) ) :
						?>
						<button class="btn-1"><?php the_field( 'design_title' ); ?></button>
						<?php
						endif;

						if (get_field ( 'development_title' ) ) :
							?>
							<button class="btn-2"><?php the_field( 'development_title' ); ?></button>
							<?php
						endif;
						
						?>
					</div> 

					<div class="content-process">
						<div class="content1">
							<?php
							if ( have_rows( 'design_content' ) ) :
								while (have_rows('design_content') ) :
									the_row();
									?>
									<p class="content_1"><?php the_sub_field( 'content1' ); ?></p>
									<?php
									$image = get_sub_field ('image1');
									$size  = 'large'; // (thumbnail, medium, large, full or custom size)
									if ( $image ) :
										echo wp_get_attachment_image( $image, $size, "", ["class" => "image_1", "alt" => "screenshot of site" ] );
									endif;									
									?>								
									<p class="content_2"><?php the_sub_field( 'content2' ); ?></p>
									<?php
									if ( is_single( 28 ) ) :										
									get_template_part( 'template-parts/content', 'page' );
									endif;											
									$image = get_sub_field ('image2');
									$size  = 'large'; // (thumbnail, medium, large, full or custom size)
									if ( $image ) :
										echo wp_get_attachment_image( $image, $size, "", ["class" => "image_2", "alt" => "screenshot of site" ] );
									endif;
									?>
									<p class="content_3"><?php the_sub_field( 'content3' ); ?></p>
									<?php
									$image = get_sub_field ('image3');
									$size  = 'large'; // (thumbnail, medium, large, full or custom size)
									if ( $image ) :
										echo wp_get_attachment_image( $image, $size, "", ["class" => "image_3", "alt" => "screenshot of site" ] );
									endif;									
								endwhile;
							endif;			
							?>
						</div>

						<div class="content2">
							<?php
							if ( have_rows( 'development_content' ) ) :
								while (have_rows('development_content') ) :
									the_row();
									?>
									<p class="content_dev_1"><?php the_sub_field( 'content_dev1' ); ?></p>
									<?php
									$image = get_sub_field ('image_dev1');
									$size  = 'large'; // (thumbnail, medium, large, full or custom size)
									if ( $image ) :
										echo wp_get_attachment_image( $image, $size, "", ["class" => "image_dev_1", "alt" => "screenshot of site" ] );
									endif;									
									if (!$image ) :
										?>
										<hr>
										<?php
									endif;
									?>	
									<p class="content_dev_2"><?php the_sub_field( 'content_dev2' ); ?></p>	
									<?php	
															
									if (is_single(30) ) :											
									get_template_part( 'template-parts/content', 'page' );						endif;								
																											
									$image = get_sub_field ('image_dev2');
									$size  = 'large'; // (thumbnail, medium, large, full or custom size)
									if ( $image ) :
										echo wp_get_attachment_image( $image, $size, "", ["class" => "image_dev_2", "alt" => "screenshot of site" ] );
									endif;
									?>								
									<p class="content_dev_3"><?php the_sub_field( 'content_dev3' ); ?></p>
									<?php	
									$image = get_sub_field ('image_dev3');
									$size  = 'large'; // (thumbnail, medium, large, full or custom size)
									if ( $image ) :
										echo wp_get_attachment_image( $image, $size, "", ["class" => "image_dev_3", "alt" => "screenshot of site" ] );
									endif;
								endwhile;
							endif;												
							?>
						</div>			
					</div>
				</section>

				<section class="reflection">
					<?php
					if ( get_field( 'reflection_title' ) ) :
					?>
						<h2><?php the_field( 'reflection_title' );?></h2>
					<?php
					endif;

					if (get_field( 'reflection_content' ) ) :
					?>
						<p><?php the_field( 'reflection_content' );?></p>
					<?php
					endif;
					?>
				</section>
					
				<?php

				endif;
			?>
			</section>
			<?php

			
			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__('', 'portfolio-theme' ) . '</span> <span class="nav-title"> %title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( '', 'portfolio-theme' ) . '</span> <span class="nav-title">%title</span>',
				)
			);

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
