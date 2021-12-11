<?php
/**
 * The template for displaying search results pages.
 *
 * @package Ravon
 */

get_header();

$ravon_search_page_container = get_theme_mod( 'ravon_blog_archive_container', 'container' );
$ravon_blog_archive_column   = get_theme_mod( 'ravon_blog_archive_column', '2' );

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
<section class="search-result-wrapper-section">
	<div class="<?php echo esc_attr( $ravon_search_page_container ); ?>">
		<div class="row">
			<div class="col">
				<?php printf( '<h1 class="page-title">%1$s <span>%2$s</span></h1>', esc_html__( 'Search Results for:', 'ravon' ), get_search_query() ); ?>
			</div><!-- .col -->
		</div><!-- .row -->
	</div><!-- .container -->
</section>
<section class="archive-wrapper-section">
	<div class="<?php echo esc_attr( $ravon_search_page_container ); ?>">
		<?php if ( have_posts() ) : ?>
			<div class="<?php echo esc_attr( $class ); ?>">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/content' ); ?>
				<?php endwhile; ?>
			</div>
		<?php else : ?>
			<div class="row row-cols-1">
				<div class="col">
					<?php get_template_part( 'template-parts/content', 'none' ); ?>
				</div>
			</div>
		<?php endif; ?>
		<?php get_template_part( 'template-parts/pagination' ); ?>
	</div>
</section>
<?php
get_footer();
