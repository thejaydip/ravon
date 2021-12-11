<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Ravon
 */
$ravon_footer_container 		= get_theme_mod( 'ravon_footer_container', 'container' );
$ravon_site_footer_copyright 	= get_theme_mod( 'ravon_site_footer_copyright', '' );
?>
	</div><!-- #content -->
		<footer id="colophon" class="site-footer">
			<div class="<?php echo esc_attr( $ravon_footer_container ); ?>">
				<div class="row">
					<div class="copyright-text"><?php
						if ( ! empty( $ravon_site_footer_copyright ) ) {
							echo esc_html( $ravon_site_footer_copyright );
						} else {
							echo esc_html( 'Copyright&copy;2020-2021', 'ravon' ); 
						}
					?></div>
				</div>
			</div>
		</footer><!-- #colophon -->
</div><!-- #page .site-wrapper -->

<?php wp_footer(); ?>
</body>
</html>
