<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Ravon
 */

get_header();

$ravon_blog_single_container		= get_theme_mod( 'ravon_blog_single_container', 'container' );
$ravon_blog_single_sidebar			= get_theme_mod( 'ravon_blog_single_sidebar', 'right-sidebar' );
$ravon_blog_single_enable_comments	= get_theme_mod( 'ravon_blog_single_enable_comments', true );
?>
	<section class="post-wrapper-section">
		<div class="<?php echo esc_attr( $ravon_blog_single_container ); ?>">
			<div class="row">
				<?php
				if ( 'left-sidebar' === $ravon_blog_single_sidebar ) {
					?>
					<div class="col-lg-4 col-12">
						<?php get_sidebar(); ?>
					</div>
					<?php
				}
				?>
				<div class="col-lg-8 col-12 content-area">
					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'template-parts/content', 'single' ); ?>

						<?php
							// If comments are open or we have at least one comment, load up the comment template
							if ( true === $ravon_blog_single_enable_comments && ( comments_open() || '0' !== get_comments_number() ) ) :
								comments_template();
							endif;
						?>

					<?php endwhile; // end of the loop. ?>
				</div>
				<?php
				if ( 'right-sidebar' === $ravon_blog_single_sidebar ) {
					?>
					<div class="col-lg-4 col-12">
						<?php get_sidebar(); ?>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</section>

<?php
get_footer();
