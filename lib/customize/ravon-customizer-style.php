<?php
/**
 * This will output the Customizer CSS to the live theme's WP head.
 *
 * @package Ravon
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<!--Ravon Customizer CSS--> 
<style type="text/css">
	<?php
	$ravon_header_bg_color				= get_theme_mod( 'ravon_header_bg_color', '' );
	$ravon_header_text_color			= get_theme_mod( 'ravon_header_text_color', '' );
	$ravon_header_submenu_text_color	= get_theme_mod( 'ravon_header_submenu_text_color', '' );
	?>
	<?php if ( $ravon_header_bg_color ) : ?>
		/* Header Background Color */
		.site-header.has-header, .site-header.has-video { background-color: <?php echo sprintf( '%s', $ravon_header_bg_color ); ?>; }
	<?php endif; ?>

	<?php if ( $ravon_header_text_color ) : ?>
		/* Header Text Color */
		.site-header .main-navigation ul li a { color: <?php echo sprintf( '%s', $ravon_header_text_color ); ?>; }
	<?php endif; ?>

	<?php if ( $ravon_header_submenu_text_color ) : ?>
		/* Header Submenu Text Color */
		.site-header .main-navigation ul li ul.sub-menu li a { color: <?php echo sprintf( '%s', $ravon_header_submenu_text_color ); ?>; }
	<?php endif; ?>

	<?php
	$ravon_body_typography_font_color 		= get_theme_mod( 'ravon_body_typography_font_color', '' );
	$ravon_body_typography_font_size 		= get_theme_mod( 'ravon_body_typography_font_size', '' );
	$ravon_body_typography_line_height 		= get_theme_mod( 'ravon_body_typography_line_height', '' );
	$ravon_body_typography_letter_spacing 	= get_theme_mod( 'ravon_body_typography_letter_spacing', '' );
	?>
	<?php if ( $ravon_body_typography_font_color ) : ?>
		body { color: <?php echo sprintf( '%s', $ravon_body_typography_font_color ); ?>; }
	<?php endif; ?>

	<?php if ( $ravon_body_typography_font_size ) : ?>
		body { font-size: <?php echo sprintf( '%s', $ravon_body_typography_font_size ); ?>; }
	<?php endif; ?>

	<?php if ( $ravon_body_typography_line_height ) : ?>
		body { line-height: <?php echo sprintf( '%s', $ravon_body_typography_line_height ); ?>; }
	<?php endif; ?>

	<?php if ( $ravon_body_typography_letter_spacing ) : ?>
		body { letter-spacing: <?php echo sprintf( '%s', $ravon_body_typography_letter_spacing ); ?>; }
	<?php endif; ?>

	<?php
	$ravon_links_typography_font_color 			= get_theme_mod( 'ravon_links_typography_font_color', '' );
	$ravon_links_typography_font_hover_color 	= get_theme_mod( 'ravon_links_typography_font_hover_color', '' );
	$ravon_links_typography_font_size 			= get_theme_mod( 'ravon_links_typography_font_size', '' );
	$ravon_links_typography_line_height 		= get_theme_mod( 'ravon_links_typography_line_height', '' );
	$ravon_links_typography_letter_spacing 		= get_theme_mod( 'ravon_links_typography_letter_spacing', '' );
	?>
	<?php if ( $ravon_links_typography_font_color ) : ?>
		a { color: <?php echo sprintf( '%s', $ravon_links_typography_font_color ); ?>; }
	<?php endif; ?>

	<?php if ( $ravon_links_typography_font_hover_color ) : ?>
		a:hover { color: <?php echo sprintf( '%s', $ravon_links_typography_font_hover_color ); ?>; }
	<?php endif; ?>

	<?php if ( $ravon_links_typography_font_size ) : ?>
		a { font-size: <?php echo sprintf( '%s', $ravon_links_typography_font_size ); ?>; }
	<?php endif; ?>

	<?php if ( $ravon_links_typography_line_height ) : ?>
		a { line-height: <?php echo sprintf( '%s', $ravon_links_typography_line_height ); ?>; }
	<?php endif; ?>

	<?php if ( $ravon_links_typography_letter_spacing ) : ?>
		a { letter-spacing: <?php echo sprintf( '%s', $ravon_links_typography_letter_spacing ); ?>; }
	<?php endif; ?>

	<?php
	$ravon_h1_typography_font_color 		= get_theme_mod( 'ravon_h1_typography_font_color', '' );
	$ravon_h1_typography_font_size 			= get_theme_mod( 'ravon_h1_typography_font_size', '' );
	$ravon_h1_typography_line_height 		= get_theme_mod( 'ravon_h1_typography_line_height', '' );
	$ravon_h1_typography_letter_spacing 	= get_theme_mod( 'ravon_h1_typography_letter_spacing', '' );
	?>
	<?php if ( $ravon_h1_typography_font_color ) : ?>
		h1 { color: <?php echo sprintf( '%s', $ravon_h1_typography_font_color ); ?>; }
	<?php endif; ?>

	<?php if ( $ravon_h1_typography_font_size ) : ?>
		h1 { font-size: <?php echo sprintf( '%s', $ravon_h1_typography_font_size ); ?>; }
	<?php endif; ?>

	<?php if ( $ravon_h1_typography_line_height ) : ?>
		h1 { line-height: <?php echo sprintf( '%s', $ravon_h1_typography_line_height ); ?>; }
	<?php endif; ?>

	<?php if ( $ravon_h1_typography_letter_spacing ) : ?>
		h1 { letter-spacing: <?php echo sprintf( '%s', $ravon_h1_typography_letter_spacing ); ?>; }
	<?php endif; ?>

	<?php
	$ravon_h2_typography_font_color 		= get_theme_mod( 'ravon_h2_typography_font_color', '' );
	$ravon_h2_typography_font_size 			= get_theme_mod( 'ravon_h2_typography_font_size', '' );
	$ravon_h2_typography_line_height 		= get_theme_mod( 'ravon_h2_typography_line_height', '' );
	$ravon_h2_typography_letter_spacing 	= get_theme_mod( 'ravon_h2_typography_letter_spacing', '' );
	?>
	<?php if ( $ravon_h2_typography_font_color ) : ?>
		h2 { color: <?php echo sprintf( '%s', $ravon_h2_typography_font_color ); ?>; }
	<?php endif; ?>

	<?php if ( $ravon_h2_typography_font_size ) : ?>
		h2 { font-size: <?php echo sprintf( '%s', $ravon_h2_typography_font_size ); ?>; }
	<?php endif; ?>

	<?php if ( $ravon_h2_typography_line_height ) : ?>
		h2 { line-height: <?php echo sprintf( '%s', $ravon_h2_typography_line_height ); ?>; }
	<?php endif; ?>

	<?php if ( $ravon_h2_typography_letter_spacing ) : ?>
		h2 { letter-spacing: <?php echo sprintf( '%s', $ravon_h2_typography_letter_spacing ); ?>; }
	<?php endif; ?>

	<?php
	$ravon_h3_typography_font_color 		= get_theme_mod( 'ravon_h3_typography_font_color', '' );
	$ravon_h3_typography_font_size 			= get_theme_mod( 'ravon_h3_typography_font_size', '' );
	$ravon_h3_typography_line_height 		= get_theme_mod( 'ravon_h3_typography_line_height', '' );
	$ravon_h3_typography_letter_spacing 	= get_theme_mod( 'ravon_h3_typography_letter_spacing', '' );
	?>
	<?php if ( $ravon_h3_typography_font_color ) : ?>
		h3 { color: <?php echo sprintf( '%s', $ravon_h3_typography_font_color ); ?>; }
	<?php endif; ?>

	<?php if ( $ravon_h3_typography_font_size ) : ?>
		h3 { font-size: <?php echo sprintf( '%s', $ravon_h3_typography_font_size ); ?>; }
	<?php endif; ?>

	<?php if ( $ravon_h3_typography_line_height ) : ?>
		h3 { line-height: <?php echo sprintf( '%s', $ravon_h3_typography_line_height ); ?>; }
	<?php endif; ?>

	<?php if ( $ravon_h3_typography_letter_spacing ) : ?>
		h3 { letter-spacing: <?php echo sprintf( '%s', $ravon_h3_typography_letter_spacing ); ?>; }
	<?php endif; ?>

	<?php
	$ravon_h4_typography_font_color 		= get_theme_mod( 'ravon_h4_typography_font_color', '' );
	$ravon_h4_typography_font_size 			= get_theme_mod( 'ravon_h4_typography_font_size', '' );
	$ravon_h4_typography_line_height 		= get_theme_mod( 'ravon_h4_typography_line_height', '' );
	$ravon_h4_typography_letter_spacing 	= get_theme_mod( 'ravon_h4_typography_letter_spacing', '' );
	?>
	<?php if ( $ravon_h4_typography_font_color ) : ?>
		h4 { color: <?php echo sprintf( '%s', $ravon_h4_typography_font_color ); ?>; }
	<?php endif; ?>

	<?php if ( $ravon_h4_typography_font_size ) : ?>
		h4 { font-size: <?php echo sprintf( '%s', $ravon_h4_typography_font_size ); ?>; }
	<?php endif; ?>

	<?php if ( $ravon_h4_typography_line_height ) : ?>
		h4 { line-height: <?php echo sprintf( '%s', $ravon_h4_typography_line_height ); ?>; }
	<?php endif; ?>

	<?php if ( $ravon_h4_typography_letter_spacing ) : ?>
		h4 { letter-spacing: <?php echo sprintf( '%s', $ravon_h4_typography_letter_spacing ); ?>; }
	<?php endif; ?>

	<?php
	$ravon_h5_typography_font_color 		= get_theme_mod( 'ravon_h5_typography_font_color', '' );
	$ravon_h5_typography_font_size 			= get_theme_mod( 'ravon_h5_typography_font_size', '' );
	$ravon_h5_typography_line_height 		= get_theme_mod( 'ravon_h5_typography_line_height', '' );
	$ravon_h5_typography_letter_spacing 	= get_theme_mod( 'ravon_h5_typography_letter_spacing', '' );
	?>
	<?php if ( $ravon_h5_typography_font_color ) : ?>
		h5 { color: <?php echo sprintf( '%s', $ravon_h5_typography_font_color ); ?>; }
	<?php endif; ?>

	<?php if ( $ravon_h5_typography_font_size ) : ?>
		h5 { font-size: <?php echo sprintf( '%s', $ravon_h5_typography_font_size ); ?>; }
	<?php endif; ?>

	<?php if ( $ravon_h5_typography_line_height ) : ?>
		h5 { line-height: <?php echo sprintf( '%s', $ravon_h5_typography_line_height ); ?>; }
	<?php endif; ?>

	<?php if ( $ravon_h5_typography_letter_spacing ) : ?>
		h5 { letter-spacing: <?php echo sprintf( '%s', $ravon_h5_typography_letter_spacing ); ?>; }
	<?php endif; ?>

	<?php
	$ravon_h6_typography_font_color 		= get_theme_mod( 'ravon_h6_typography_font_color', '' );
	$ravon_h6_typography_font_size 			= get_theme_mod( 'ravon_h6_typography_font_size', '' );
	$ravon_h6_typography_line_height 		= get_theme_mod( 'ravon_h6_typography_line_height', '' );
	$ravon_h6_typography_letter_spacing 	= get_theme_mod( 'ravon_h6_typography_letter_spacing', '' );
	?>
	<?php if ( $ravon_h6_typography_font_color ) : ?>
		h6 { color: <?php echo sprintf( '%s', $ravon_h6_typography_font_color ); ?>; }
	<?php endif; ?>

	<?php if ( $ravon_h6_typography_font_size ) : ?>
		h6 { font-size: <?php echo sprintf( '%s', $ravon_h6_typography_font_size ); ?>; }
	<?php endif; ?>

	<?php if ( $ravon_h6_typography_line_height ) : ?>
		h6 { line-height: <?php echo sprintf( '%s', $ravon_h6_typography_line_height ); ?>; }
	<?php endif; ?>

	<?php if ( $ravon_h6_typography_letter_spacing ) : ?>
		h6 { letter-spacing: <?php echo sprintf( '%s', $ravon_h6_typography_letter_spacing ); ?>; }
	<?php endif; ?>

	<?php
	$ravon_blog_archive_title_color				= get_theme_mod( 'ravon_blog_archive_title_color', '' );
	$ravon_blog_archive_title_hover_color		= get_theme_mod( 'ravon_blog_archive_title_hover_color', '' );
	$ravon_blog_archive_content_color			= get_theme_mod( 'ravon_blog_archive_content_color', '' );
	$ravon_blog_archive_read_more_color			= get_theme_mod( 'ravon_blog_archive_read_more_btn_text_color', '' );
	$ravon_blog_archive_read_more_hover_color	= get_theme_mod( 'ravon_blog_archive_read_more_btn_text_hover_color', '' );
	?>
	<?php if ( $ravon_blog_archive_title_color ) : ?>
		.archive-wrapper-section .entry-title a { color: <?php echo sprintf( '%s', $ravon_blog_archive_title_color ); ?>; }
	<?php endif; ?>

	<?php if ( $ravon_blog_archive_title_hover_color ) : ?>
		.archive-wrapper-section .entry-title a:hover { color: <?php echo sprintf( '%s', $ravon_blog_archive_title_hover_color ); ?>; }
	<?php endif; ?>

	<?php if ( $ravon_blog_archive_content_color ) : ?>
		.archive-wrapper-section .entry-content { color: <?php echo sprintf( '%s', $ravon_blog_archive_content_color ); ?>; }
	<?php endif; ?>

	<?php if ( $ravon_blog_archive_read_more_color ) : ?>
		.archive-wrapper-section .readmore_button a { color: <?php echo sprintf( '%s', $ravon_blog_archive_read_more_color ); ?>; }
	<?php endif; ?>

	<?php if ( $ravon_blog_archive_read_more_hover_color ) : ?>
		.archive-wrapper-section .readmore_button a:hover { color: <?php echo sprintf( '%s', $ravon_blog_archive_read_more_hover_color ); ?>; }
	<?php endif; ?>

	<?php
	$ravon_blog_single_title_color		= get_theme_mod( 'ravon_blog_single_title_color', '' );
	$ravon_blog_single_content_color	= get_theme_mod( 'ravon_blog_single_content_color', '' );
	$ravon_blog_single_meta_color		= get_theme_mod( 'ravon_blog_single_meta_color', '' );
	$ravon_blog_single_meta_hover_color	= get_theme_mod( 'ravon_blog_single_meta_hover_color', '' );
	?>
	<?php if ( $ravon_blog_single_title_color ) : ?>
		.post-wrapper-section .entry-title { color: <?php echo sprintf( '%s', $ravon_blog_single_title_color ); ?>; }
	<?php endif; ?>

	<?php if ( $ravon_blog_single_content_color ) : ?>
		.post-wrapper-section .entry-content { color: <?php echo sprintf( '%s', $ravon_blog_single_content_color ); ?>; }
	<?php endif; ?>

	<?php if ( $ravon_blog_single_meta_color ) : ?>
		.post-wrapper-section .entry-meta, .post-wrapper-section .entry-meta a { color: <?php echo sprintf( '%s', $ravon_blog_single_meta_color ); ?>; }
	<?php endif; ?>

	<?php if ( $ravon_blog_single_meta_hover_color ) : ?>
		.post-wrapper-section .entry-meta a:hover { color: <?php echo sprintf( '%s', $ravon_blog_single_meta_hover_color ); ?>; }
	<?php endif; ?>

	<?php
	$ravon_404_page_title_color	= get_theme_mod( 'ravon_404_page_title_color', '' );
	?>
	<?php if ( $ravon_404_page_title_color ) : ?>
		.error-page-wrapper .page-title { color: <?php echo sprintf( '%s', $ravon_404_page_title_color ); ?>; }
	<?php endif; ?>

	<?php
	$ravon_footer_bg_color					= get_theme_mod( 'ravon_footer_bg_color', '' );
	$ravon_footer_text_color				= get_theme_mod( 'ravon_footer_text_color', '' );
	$ravon_footer_copyright_text_font_size	= get_theme_mod( 'ravon_footer_copyright_text_font_size', '' );
	?>
	<?php if ( $ravon_footer_bg_color ) : ?>
		/* Footer Background Color */
		.site-footer { background-color: <?php echo sprintf( '%s', $ravon_footer_bg_color ); ?>; }
	<?php endif; ?>
	<?php if ( $ravon_footer_text_color ) : ?>
		/* Footer Background Color */
		.site-footer { color: <?php echo sprintf( '%s', $ravon_footer_text_color ); ?>; }
	<?php endif; ?>
	<?php if ( $ravon_footer_copyright_text_font_size ) : ?>
		/* Footer Copyright Font Size */
		.site-footer .copyright-text { font-size: <?php echo sprintf( '%s', $ravon_footer_copyright_text_font_size ); ?>; }
	<?php endif; ?>
</style> 
<!--/Ravon Customizer CSS-->
