<?php
/**
 * The template for displaying site header
 * @package Ravon
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$blog_info		= get_bloginfo( 'name' );
$description 	= get_bloginfo( 'description', 'display' );
$show_title   	= ( true === get_theme_mod( 'display_title_and_tagline', true ) );
$ravon_header_behavior 	= get_theme_mod( 'ravon_header_behavior', 'default' );
$ravon_header_container = get_theme_mod( 'ravon_header_container', 'container' );
$header_class 			= $show_title ? 'site-title' : 'screen-reader-text';
$sticky_header_class = ( 'sticky' === $ravon_header_behavior ) ? ' sticky' : '';
?>
<header id="masthead" class="site-header has-header<?php echo esc_attr( $sticky_header_class );?>">
	<div class="<?php echo esc_attr( $ravon_header_container );?>">
		<div class="row">
			<div class="col-xl-4 col-lg-4 col-12 align-self-md-center">
				<div class="site-branding">
					<?php
					if ( has_custom_logo() ) :
						the_custom_logo();
						
						if ( $blog_info ) : ?>
							<?php if ( is_front_page() && ! is_paged() ) : ?>
								<h1 class="<?php echo esc_attr( $header_class ); ?>"><?php echo esc_html( $blog_info ); ?></h1>
							<?php elseif ( is_front_page() || is_home() ) : ?>
								<h1 class="<?php echo esc_attr( $header_class ); ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( $blog_info ); ?></a></h1>
							<?php else : ?>
								<p class="<?php echo esc_attr( $header_class ); ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( $blog_info ); ?></a></p>
							<?php endif; ?>
						<?php endif; 
					else :
						if ( $blog_info ) : ?>
							<?php if ( is_front_page() && ! is_paged() ) : ?>
								<h1 class="<?php echo esc_attr( $header_class ); ?>"><?php echo esc_html( $blog_info ); ?></h1>
							<?php elseif ( is_front_page() || is_home() ) : ?>
								<h1 class="<?php echo esc_attr( $header_class ); ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( $blog_info ); ?></a></h1>
							<?php else : ?>
								<p class="<?php echo esc_attr( $header_class ); ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( $blog_info ); ?></a></p>
							<?php endif; ?>
						<?php endif; 

						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo $description; // phpcs:ignore WordPress.Security.EscapeOutput ?></p>
						<?php
						endif;
					endif;
					?>
				</div>
			</div>
			<div class="col-xl-8 col-lg-8 col-12 align-self-md-center">
				<nav id="site-navigation" class="navbar navbar-expand-lg navbar-dark black" role="navigation">
					<div class="navbar-brand">
						<?php
					if ( has_custom_logo() ) :
						the_custom_logo();
						
						if ( $blog_info ) : ?>
							<?php if ( is_front_page() && ! is_paged() ) : ?>
								<h1 class="<?php echo esc_attr( $header_class ); ?>"><?php echo esc_html( $blog_info ); ?></h1>
							<?php elseif ( is_front_page() || is_home() ) : ?>
								<h1 class="<?php echo esc_attr( $header_class ); ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( $blog_info ); ?></a></h1>
							<?php else : ?>
								<p class="<?php echo esc_attr( $header_class ); ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( $blog_info ); ?></a></p>
							<?php endif; ?>
						<?php endif; 
					else :
						if ( $blog_info ) : ?>
							<?php if ( is_front_page() && ! is_paged() ) : ?>
								<h1 class="<?php echo esc_attr( $header_class ); ?>"><?php echo esc_html( $blog_info ); ?></h1>
							<?php elseif ( is_front_page() || is_home() ) : ?>
								<h1 class="<?php echo esc_attr( $header_class ); ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( $blog_info ); ?></a></h1>
							<?php else : ?>
								<p class="<?php echo esc_attr( $header_class ); ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( $blog_info ); ?></a></p>
							<?php endif; ?>
						<?php endif; 

						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo $description; // phpcs:ignore WordPress.Security.EscapeOutput ?></p>
						<?php
						endif;
					endif;
					?>
					</div>

					<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo esc_attr( 'Toggle navigation', 'ravon' ); ?>"><span class="navbar-toggler-icon"></span>
					</button>
					<div id="navbarSupportedContent" class="collapse navbar-collapse main-navigation"><?php
						wp_nav_menu( array(
							'theme_location'=> 'primary-menu',
							'menu_id' 		=> 'primary-menu',
							'menu_class'	=> 'ravon-menu-wrap'
						) );
					?></div>
				</nav><!-- .navbar -->
			</div>
		</div>
	</div>
</header><!-- #masthead -->
