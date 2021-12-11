<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Ravon
 */

get_header();

$ravon_pages_container = get_theme_mod( 'ravon_pages_container', 'container' );
$ravon_pages_sidebar   = get_theme_mod( 'ravon_pages_sidebar', 'right-sidebar' );
?>
	<section class="page-wrapper-section">
		<div class="<?php echo esc_attr( $ravon_pages_container ); ?>">
			<div class="row">
				<?php
				if ( 'left-sidebar' === $ravon_pages_sidebar ) {
					?>
					<div class="col-lg-4 col-12">
						<?php get_sidebar(); ?>
					</div>
					<?php
				}
				?>
				<div class="col-lg-8 col-12">
					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'template-parts/content', 'page' ); ?>

						<?php
							// If comments are open or we have at least one comment, load up the comment template
							if ( comments_open() || '0' != get_comments_number() ) :
								comments_template();
							endif;
						?>

					<?php endwhile; // end of the loop. ?>
				</div>
				<?php
				if ( 'right-sidebar' === $ravon_pages_sidebar ) {
					?>
					<div class="col-lg-4 col-12">
						<?php get_sidebar(); ?>
					</div>
					<?php
				}
				?>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- .page-wrapper-section -->
<?php
get_footer();
