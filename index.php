<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Ravon
 */

get_header();
$ravon_blog_archive_container = get_theme_mod( 'ravon_blog_archive_container', 'container' );
$ravon_blog_archive_column    = get_theme_mod( 'ravon_blog_archive_column', '2' );

$class = '';
switch ( $ravon_blog_archive_column ) {

	case '1':
			$class .= 'row row-cols-1';
		break;
	case '2':
	default:
			$class .= 'row row-cols-1 row-cols-sm-2';
		break;
	case '3':
			$class .= 'row row-cols-1 row-cols-lg-3 row-cols-sm-2';
		break;
	case '4':
			$class .= 'row row-cols-1 row-cols-xl-4 row-cols-lg-3 row-cols-sm-2';
			break;
	case '5':
			$class .= 'row row-cols-1 row-cols-xl-5 row-cols-lg-3 row-cols-sm-2';
			break;
	case '6':
			$class .= 'row row-cols-1 row-cols-xl-6 row-cols-lg-3 row-cols-sm-2';
		break;
}
?>
	<section class="archive-wrapper-section">
		<div class="<?php echo esc_attr( $ravon_blog_archive_container ); ?>">
			<div class="<?php echo esc_attr( $class ); ?>">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'template-parts/content' ); ?>
					<?php endwhile; ?>
				<?php else : ?>
					<div class="col-12">
						<?php get_template_part( 'template-parts/content', 'none' ); ?>
					</div><!-- .post-wrapper -->
				<?php endif; ?>
			</div>
			<div class="row">
				<?php get_template_part( 'template-parts/pagination' );?>
			</div>
		</div>
	</section>

<?php
get_footer();
