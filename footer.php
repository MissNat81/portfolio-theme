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
			

			<!-- <nav id="social-navigation" class="social-navigation">
			<?php wp_nav_menu(array('theme_location' => 'social')); ?>
			</nav> -->			

		<div class="site-info">
			<p class="footer">&copy 2022 Natalie Ratayczak</p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
