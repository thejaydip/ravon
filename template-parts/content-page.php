<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Ravon
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
	<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	<?php the_post_thumbnail(); ?>

		<div class="entry-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'ravon' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );
			?>
		</div>
</article><!-- #post-## -->
