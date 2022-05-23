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


			<a href="<?php echo esc_url( __( 'http://localhost/wordpress/', 'home' ) ); ?>">
				<?php
				printf( "Home" ) ;
				?>
			</a>
			<span class="sep">|</span>
			<a href="<?php echo esc_url( __( 'http://localhost/wordpress/memebership/', 'membership' ) ); ?>">
				<?php
				printf( "Contact" ) ;
				?>
			</a>
			<span class="sep">|</span>
			<a href="<?php echo esc_url( __( 'http://localhost/events/', 'events' ) ); ?>">
				<?php
				printf( "Events" ) ;
				?>
			</a>
			<span class="sep">|</span>
			<a href="<?php echo esc_url( __( 'http://localhost/about-us/', 'about us' ) ); ?>">
				<?php
				printf( "About Us" ) ;
				?>
			</a>
			<br>
					
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'underscores' ), 'underscores', '<a href="https://github.com/cp3402-students/cp3402-2022-1-site-team08">group 8 </a>' );
				?>


		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
