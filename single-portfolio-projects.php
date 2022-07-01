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
			<div class="project-header">
				<h1 class="project-title"><?php the_title(); ?></h1>
			</div>
			<?php
			// get_template_part( 'template-parts/content', 'page' );
			?>
			<article class="individual-project">
			<?php				

				if ( function_exists ( 'get_field' ) ) :

					$image = get_field('hero_image');
				$size = 'large'; // (thumbnail, medium, large, full or custom size)
				if( $image ) :
    				echo wp_get_attachment_image( $image, $size );
				endif;
 

				?>
					<div class="overview">
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
						endif;
						?>
					</div>

					<div class="tech">
					<?php
						if (get_field ( 'teck_stack' ) ) :
							?>
							<h2><?php the_field( 'teck_stack' ); ?></h2>
							<?php
						endif;
						?>
						<div class="icon-images">
						<?php
							$image = get_field('icons');
							$size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)
							if( $image ) :
    							echo wp_get_attachment_image( $image, $size );
							endif;
							$image2 = get_field('icons2');
							$size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)
							if( $image ) :
    							echo wp_get_attachment_image( $image2, $size );
							endif;
												$image3 = get_field('icons3');
							$size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)
							if( $image ) :
    							echo wp_get_attachment_image( $image3, $size );
							endif;	
							?>
						</div>
					</div>
				

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
								if (get_field ( 'design_content' ) ) :
								?>
									<p><?php the_field( 'design_content' ); ?></p>						
								<?php
								endif;
								?>
							</div>

							<div class="content2">
							<?php
								if (get_field ( 'development_content' ) ) :
								?>
									<p><?php the_field( 'development_content' ); ?></p>
									<?php
									// $video_mp4 =  get_field('mp4_video'); // MP4 Field Name
									// // $attr =  array(
									// // 	'mp4'      => $video_mp4,
									// // 	'preload'  => 'auto',
									// // 	'width'=> '275px'
									// // 	);
									// 	echo wp_video_shortcode(  $video_mp4 );
									?>
									<div class="video-content">									
									<div class="video">
									<?php
									get_template_part( 'template-parts/content', 'page' );
									?>
									</div>
									<div class="video-text">
									<?php
									if (get_field( 'video_text' ) ) :
									?>									
									<p><?php the_field( 'video_text' ); ?></p>
									</div>
									<?php
									endif;
									?>
									</div>
									<?php
								endif;
							?>
							</div>				
										
						</div>
					</section>

					<section class="reflection">
						<div class="reflection-content">
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
						</div>
					</section>
					
					<?php

				endif;
			?>
			</article>
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
