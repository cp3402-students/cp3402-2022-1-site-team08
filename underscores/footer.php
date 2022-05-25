<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Townsville_Jazz_Club
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
						
		</div><!-- .site-info -->

		<?php
		wp_nav_menu( array( 
			'theme_location' => 'my-custom-menu', 
			'container_class' => 'custom-menu-class' ) ); 
		?>

		<?php wp_footer(); ?>
	</footer><!-- #colophon -->
</div><!-- #page -->

</body>
</html>
