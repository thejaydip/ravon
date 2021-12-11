<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Ravon
 */

get_header();
$ravon_404_page_container	= get_theme_mod( 'ravon_404_page_container', 'container' );
?>
	<section class="error-page-wrapper full-screen">
		<div class="<?php echo esc_attr( $ravon_404_page_container ); ?>">
			<div class="row">
				<div class="col">
						<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'ravon' ); ?></h1>
						<p><?php get_search_form(); ?></p>
				</div><!-- .col -->
			</div><!-- .row -->
		</div><!-- .container -->
	</section><!-- .page-header-wrapper -->
<?php
get_footer();
