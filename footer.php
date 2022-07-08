<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Portfolio_Theme
 */

?>

	<footer id="colophon" class="site-footer">

		<div class="footer-menu">
			<nav id="footer-navigation" class="footer-navigation">
				<?php wp_nav_menu(array('theme_location' => 'footer')); ?>
			</nav>			
		</div>

		<div class="site-info">
			<p class="footer">&copy 2022 Natalie Ratayczak</p>
			<?php
			if ( function_exists( 'get_field' ) && is_singular() ) :
				$link = get_field( 'link3' );
				if( $link ) : 
    			$link_url = $link['url'];
   				$link_title = $link['title'];
    			$link_target = $link['target'] ? $link['target'] : '_self';
				?>
				<a class="icons_link" href="<?php echo esc_url( $link_url ); ?>"
    			target="<?php echo esc_attr( $link_target ); ?>
    			"><?php echo esc_html( $link_title ); ?>
					<p> | <?php the_field( 'icons_link_text' ); ?></p>
				</a>					
				<?php
				endif;
			endif;
			?>
			
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
