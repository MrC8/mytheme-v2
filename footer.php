<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wiatheme
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info container">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'wiatheme' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'wiatheme' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'wiatheme' ), 'wiatheme', '<a href="http://underscores.me/" rel="designer">Underscores.me</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
    </div><!-- #inner-wrap -->
</div><!-- #page -->
<a href="#" class="totop"></a>
<?php wp_footer(); ?>

</body>
</html>
