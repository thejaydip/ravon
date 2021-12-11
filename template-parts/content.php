<?php
/**
 * The default template for displaying content
 *
 * @package Ravon
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$ravon_blog_archive_enable_thumbnail 	= get_theme_mod( 'ravon_blog_archive_enable_thumbnail', true );
$ravon_blog_archive_enable_title 		= get_theme_mod( 'ravon_blog_archive_enable_title', true );
$ravon_blog_archive_enable_content 		= get_theme_mod( 'ravon_blog_archive_enable_content', true );
$ravon_blog_archive_enable_read_more 	= get_theme_mod( 'ravon_blog_archive_enable_read_more', true );
$ravon_blog_archive_readmore_btn_text 	= get_theme_mod( 'ravon_blog_archive_readmore_btn_text', __( 'Continue Reading', 'ravon' ) );
$ravon_blog_archive_text_alignment		= get_theme_mod( 'ravon_blog_archive_text_alignment', 'text-left' );
?>
<div id="post-<?php the_ID(); ?>" <?php post_class( "col blog-list {$ravon_blog_archive_text_alignment}" ); ?>>
	<?php if ( true === $ravon_blog_archive_enable_thumbnail && has_post_thumbnail() ) { ?>
		<a href="<?php the_permalink(); ?>">
			<div class="post-thumb">
				<?php the_post_thumbnail(); ?>
			</div>
		</a>
	<?php } ?>
	<?php if ( true === $ravon_blog_archive_enable_title ) { ?>
		<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	<?php } ?>
	<?php if ( true === $ravon_blog_archive_enable_content && get_the_content() ) { ?>
		<div class="entry-content"><?php echo wp_trim_words( get_the_content(), 40, '...' ); ?></div>
	<?php } ?>
	<?php if ( true === $ravon_blog_archive_enable_read_more ) { ?>
		<div class="readmore_button"><a href="<?php the_permalink(); ?>"><?php echo sprintf( '%s', $ravon_blog_archive_readmore_btn_text );?></a></div>
	<?php } ?>
</div>
