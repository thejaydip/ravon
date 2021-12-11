<?php
/**
 * Template part for displaying single posts.
 *
 * @package Ravon
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$ravon_blog_single_enable_featured_image= get_theme_mod( 'ravon_blog_single_enable_featured_image', true );
$ravon_blog_single_enable_title			= get_theme_mod( 'ravon_blog_single_enable_title', true );
$ravon_blog_single_enable_content		= get_theme_mod( 'ravon_blog_single_enable_content', true );
$ravon_blog_single_enable_date			= get_theme_mod( 'ravon_blog_single_enable_date', true );
$ravon_blog_single_enable_categories	= get_theme_mod( 'ravon_blog_single_enable_categories', true );
$ravon_blog_single_enable_author		= get_theme_mod( 'ravon_blog_single_enable_author', true );
$ravon_blog_single_enable_tags			= get_theme_mod( 'ravon_blog_single_enable_tags', true );
?>
<div class="post-wrapper-hentry">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="post-content-wrapper post-content-wrapper-single post-content-wrapper-single-post">
			<?php if ( true === $ravon_blog_single_enable_featured_image && has_post_thumbnail() ) { ?>
				<div class="post-thumbnail">
					<?php the_post_thumbnail(); ?>
				</div>
			<?php } ?>
			<div class="entry-data-wrapper">
				<div class="entry-header-wrapper">
				<?php if ( true === $ravon_blog_single_enable_title ) { ?>	
					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header><!-- .entry-header -->
				<?php } ?>
					<div class="entry-meta entry-meta-header-after">
						<?php
						if ( true === $ravon_blog_single_enable_author ) {

							$post_author_id = get_post_field( 'post_author', get_the_ID() );
							// Post Author
							printf( '<span class="byline entry-meta-icon">%1$s <span class="author vcard"><a class="entry-author-link url fn n" href="%2$s" rel="author"><span class="entry-author-name">%3$s</span></a></span></span>',
								/* translators: %s: post author */
								esc_html_x( 'By', 'post author', 'ravon' ),
								esc_url( get_author_posts_url( get_the_author_meta( 'ID', $post_author_id ) ) ),
								esc_html( get_the_author_meta( 'display_name', $post_author_id ) )
							);
						}

						if ( true === $ravon_blog_single_enable_categories ) {
							// Post date
							$post_categories = get_the_category();
							$post_cat_output = array();
							if ( ! empty( $post_categories ) ) {
							    foreach( $post_categories as $category ) {
							        $post_cat_output[] = '<li><a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a></li>';
							    }
							}
							$post_category = implode( ', ', $post_cat_output );
							?>
								<span class="post-date entry-meta-icon">
									<ul><?php echo sprintf( '%s', $post_category );?></ul>
								</span>
							<?php
						}
						if ( true === $ravon_blog_single_enable_date ) {
						
							// Post date
							$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
							if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
								$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
							}

							$time_string = sprintf( $time_string,
								esc_attr( get_the_date( 'c' ) ),
								esc_html( get_the_date('d F Y') ),
								esc_attr( get_the_modified_date( 'c' ) ),
								esc_html( get_the_modified_date() )
							);

							// Posted On
							printf( '<span class="posted-on entry-meta-icon"><span class="screen-reader-text">%1$s</span>%2$s</span>',
								esc_html_x( 'Posted on', 'post date', 'ravon' ),
								wp_kses( $time_string, array( 'time' => array( 'class' => array(), 'datetime' => array() ) ) )
							);
						}

						if ( get_edit_post_link() ) {
							// Post Edit Link
							printf( '<span class="post-edit-link-meta entry-meta-icon"><span class="screen-reader-text">%1$s</span><a class="post-edit-link" href="%2$s">%3$s</a></span>',
								esc_html( get_the_title() ),
								esc_url( get_edit_post_link() ),
								/* translators: %s: post edit link label */
								esc_html_x( 'Edit', 'post edit link label', 'ravon' )
							);
						}
						?>
					</div><!-- .entry-meta -->
				</div><!-- .entry-header-wrapper -->
				<?php if ( true === $ravon_blog_single_enable_content ) { ?>	
					<div class="entry-content">
						<?php the_content(); ?>
					</div><!-- .entry-content -->
				<?php } ?>
				<?php
				$tags_list = get_the_tag_list( '', _x(', ', 'Used between tag, there is a space after the comma.', 'ravon' ) );
				if ( true === $ravon_blog_single_enable_tags && $tags_list ) {
					?>
						<div class="entry-meta entry-meta-footer">
						<?php
							/* translators: %s: posted in tags */
							printf( '<span class="tags-links tags-links-single">' . esc_html__( 'Tagged: %1$s', 'ravon' ) . '</span>', wp_kses_post( $tags_list ) );
						?>
						</div>
					<?php
				}
				?>
			</div><!-- .entry-data-wrapper -->
		</div><!-- .post-content-wrapper -->
	</article><!-- #post-## -->
</div><!-- .post-wrapper-hentry -->
