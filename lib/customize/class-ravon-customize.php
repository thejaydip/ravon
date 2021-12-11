<?php
/**
 * Customize settings & options
 *
 * @package Ravon
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Ravon_Customize' ) ) {
	class Ravon_Customize {

		public function __construct() {

			// Add custom toggle control.
			if ( file_exists( get_parent_theme_file_path( 'lib/customize/controls/toggle/class-toggle-button.php' ) ) ) {
				require get_parent_theme_file_path( 'lib/customize/controls/toggle/class-toggle-button.php' );
			}
			// Add custom range slide control.
			if ( file_exists( get_parent_theme_file_path( 'lib/customize/controls/range-slide/class-range-slide.php' ) ) ) {
				require get_parent_theme_file_path( 'lib/customize/controls/range-slide/class-range-slide.php' );
			}

			add_action( 'customize_register', array( $this, 'ravon_customize_register' ) );
			add_action( 'wp_head', array( $this, 'ravon_customize_styles_output' ) );
			add_action( 'customize_preview_init', array( $this, 'ravon_customize_preview_init' ) );
		}

		/**
		* This hooks into 'customize_register' (available as of WP 3.4) and allows
		* you to add new sections and controls to the Theme Customize screen.
		*/
		public function ravon_customize_register ( $wp_customize ) {

				$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
				$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
				$wp_customize->remove_control( 'header_textcolor' );
				$wp_customize->remove_control( 'display_header_text' );
				$wp_customize->get_section( 'title_tagline' )->title 		= __( 'Site Identity', 'ravon' );

				// Register the custom control type.
				$wp_customize->register_control_type( 'Ravon_Toggle_Control' );

				// Register panel
				$wp_customize->add_section( 'ravon_header_options_panel', array(
					'title'          => __( 'Header', 'ravon' ),
					'capability'     => 'edit_theme_options',
					'priority'       => 110,
				) );
				$wp_customize->add_panel( 'ravon_pages_options_panel', array(
					'title'          => __( 'Pages', 'ravon' ),
					'capability'     => 'edit_theme_options',
					'priority'       => 120,
				) );
				$wp_customize->add_panel( 'ravon_blog_options_panel', array(
					'title'          => __( 'Blog', 'ravon' ),
					'capability'     => 'edit_theme_options',
					'priority'       => 120,
				) );
				$wp_customize->add_panel( 'ravon_footer_options_panel', array(
					'title'          => __( 'Footer', 'ravon' ),
					'capability'     => 'edit_theme_options',
					'priority'       => 120,
				) );
				$wp_customize->add_panel( 'ravon_typography_options_panel', array(
					'title'          => __( 'Typography', 'ravon' ),
					'capability'     => 'edit_theme_options',
					'priority'       => 120,
				) );
				$wp_customize->add_panel( 'ravon_general_options_panel', array(
					'title'          => __( 'General', 'ravon' ),
					'capability'     => 'edit_theme_options',
					'priority'       => 120,
				) );

			/* =========START HEADER SETTINGS======== */

				$wp_customize->add_setting( 'ravon_header_behavior', array(
					'default' 			=> 'default',
					'sanitize_callback' => 'esc_attr'
				) );

				$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ravon_header_behavior', array(
					'label'			=> __( 'Behaviour', 'ravon' ),
					'section'		=> 'ravon_header_options_panel',
					'settings'		=> 'ravon_header_behavior',
					'type'			=> 'select',
					'choices'		=> array(
											'default'	=> __( 'Default', 'ravon' ),
											'sticky'	=> __( 'Sticky', 'ravon' )
										)
				) ) );

				$wp_customize->add_setting( 'ravon_header_container', array(
					'default' 			=> 'container',
					'sanitize_callback' => 'esc_attr'
				) );

				$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ravon_header_container', array(
					'label'			=> __( 'Container', 'ravon' ),
					'section'		=> 'ravon_header_options_panel',
					'settings'		=> 'ravon_header_container',
					'type'			=> 'select',
					'choices'		=> array(
											'container'			=> __( 'Default', 'ravon' ),
											'container-fluid'	=> __( 'Fluid', 'ravon' )
										)
				) ) );

				// Add header background color
				$wp_customize->add_setting( 'ravon_header_bg_color', array(
					'default'			=> '',
					'sanitize_callback' => 'ravon_sanitize_hex_color',
					'transport'			=> 'postMessage'
				) );

				$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'ravon_header_bg_color', array(
					'label'      => __( 'Background Color', 'ravon' ),
					'section'    => 'ravon_header_options_panel',
					'settings'   => 'ravon_header_bg_color',
				) ) );

				// Add header text color
				$wp_customize->add_setting( 'ravon_header_text_color', array(
					'default'			=> '',
					'sanitize_callback' => 'ravon_sanitize_hex_color',
					'transport'			=> 'postMessage'
				) );

				$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'ravon_header_text_color', array(
					'label'      => __( 'Text Color', 'ravon' ),
					'section'    => 'ravon_header_options_panel',
					'settings'   => 'ravon_header_text_color',
				) ) );

				// Add header submenu text color
				$wp_customize->add_setting( 'ravon_header_submenu_text_color', array(
					'default'			=> '',
					'sanitize_callback' => 'ravon_sanitize_hex_color',
					'transport'			=> 'postMessage'
				) );

				$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'ravon_header_submenu_text_color', array(
					'label'      => __( 'Submenu Text Color', 'ravon' ),
					'section'    => 'ravon_header_options_panel',
					'settings'   => 'ravon_header_submenu_text_color',
				) ) );

			/* =========END HEADER SETTINGS======== */

			/* =========START PAGES SETTINGS======== */



			$wp_customize->add_section( 'ravon_pages_options_section', array(
				'title'         => __( 'Pages', 'ravon'),
				'priority'      => 10,
				'panel'         => 'ravon_pages_options_panel', 
			) );

			$wp_customize->add_setting( 'ravon_pages_container', array(
				'default' 			=> 'container',
				'sanitize_callback' => 'esc_attr'
			) );

			$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ravon_pages_container', array(
				'label'			=> __( 'Container', 'ravon' ),
				'section'		=> 'ravon_pages_options_section',
				'settings'		=> 'ravon_pages_container',
				'type'			=> 'select',
				'choices'		=> array(
										'container'			=> __( 'Default', 'ravon' ),
										'container-fluid'	=> __( 'Fluid', 'ravon' )
									)
			) ) );

			$wp_customize->add_setting( 'ravon_pages_sidebar', array(
				'default' 			=> 'right-sidebar',
				'sanitize_callback' => 'esc_attr'
			) );

			$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ravon_pages_sidebar', array(
				'label'			=> __( 'Select Sidebar', 'ravon' ),
				'section'		=> 'ravon_pages_options_section',
				'settings'		=> 'ravon_pages_sidebar',
				'type'			=> 'select',
				'choices'		=> array(
										''				=> __( 'None', 'ravon' ),
										'right-sidebar'	=> __( 'Right', 'ravon' ),
										'left-sidebar'	=> __( 'Left', 'ravon' )
									)
			) ) );

			/* =========END PAGES SETTINGS======== */

			/* =========START BLOG SETTINGS======== */

			/*---- Blog Single-----*/

			$wp_customize->add_section( 'ravon_blog_single_options_section', array(
				'title'         => __( 'Single', 'ravon'),
				'priority'      => 10,
				'panel'         => 'ravon_blog_options_panel', 
			) );

			$wp_customize->add_setting( 'ravon_blog_single_container', array(
				'default' 			=> 'container',
				'sanitize_callback' => 'esc_attr'
			) );

			$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ravon_blog_single_container', array(
				'label'			=> __( 'Container', 'ravon' ),
				'section'		=> 'ravon_blog_single_options_section',
				'settings'		=> 'ravon_blog_single_container',
				'type'			=> 'select',
				'choices'		=> array(
										'container'			=> __( 'Default', 'ravon' ),
										'container-fluid'	=> __( 'Fluid', 'ravon' )
									)
			) ) );

			$wp_customize->add_setting( 'ravon_blog_single_sidebar', array(
				'default' 			=> 'right-sidebar',
				'sanitize_callback' => 'esc_attr'
			) );

			$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ravon_blog_single_sidebar', array(
				'label'			=> __( 'Select Sidebar', 'ravon' ),
				'section'		=> 'ravon_blog_single_options_section',
				'settings'		=> 'ravon_blog_single_sidebar',
				'type'			=> 'select',
				'choices'		=> array(
										''				=> __( 'None', 'ravon' ),
										'right-sidebar'	=> __( 'Right', 'ravon' ),
										'left-sidebar'	=> __( 'Left', 'ravon' )
									)
			) ) );

			$wp_customize->add_setting( 'ravon_blog_single_enable_featured_image', array(
				'default'           => true,
				'sanitize_callback' => 'ravon_sanitize_toggle_callback',
			) );

			$wp_customize->add_control( new Ravon_Toggle_Control( $wp_customize, 'ravon_blog_single_enable_featured_image', array(
				'label'       => __( 'Featured Image', 'ravon' ),
				'section'     => 'ravon_blog_single_options_section',
				'type'        => 'toggle',
				'settings'    => 'ravon_blog_single_enable_featured_image',
			) ) );

			$wp_customize->add_setting( 'ravon_blog_single_enable_title', array(
				'default'           => true,
				'sanitize_callback' => 'ravon_sanitize_toggle_callback',
			) );

			$wp_customize->add_control( new Ravon_Toggle_Control( $wp_customize, 'ravon_blog_single_enable_title', array(
				'label'       => __( 'Title', 'ravon' ),
				'section'     => 'ravon_blog_single_options_section',
				'type'        => 'toggle',
				'settings'    => 'ravon_blog_single_enable_title',
			) ) );

			$wp_customize->add_setting( 'ravon_blog_single_enable_content', array(
				'default'           => true,
				'sanitize_callback' => 'ravon_sanitize_toggle_callback',
			) );

			$wp_customize->add_control( new Ravon_Toggle_Control( $wp_customize, 'ravon_blog_single_enable_content', array(
				'label'       => __( 'Content', 'ravon' ),
				'section'     => 'ravon_blog_single_options_section',
				'type'        => 'toggle',
				'settings'    => 'ravon_blog_single_enable_content',
			) ) );

			$wp_customize->add_setting( 'ravon_blog_single_enable_date', array(
				'default'           => true,
				'sanitize_callback' => 'ravon_sanitize_toggle_callback',
			) );

			$wp_customize->add_control( new Ravon_Toggle_Control( $wp_customize, 'ravon_blog_single_enable_date', array(
				'label'       => __( 'Date', 'ravon' ),
				'section'     => 'ravon_blog_single_options_section',
				'type'        => 'toggle',
				'settings'    => 'ravon_blog_single_enable_date',
			) ) );

			$wp_customize->add_setting( 'ravon_blog_single_enable_categories', array(
				'default'           => true,
				'sanitize_callback' => 'ravon_sanitize_toggle_callback',
			) );

			$wp_customize->add_control( new Ravon_Toggle_Control( $wp_customize, 'ravon_blog_single_enable_categories', array(
				'label'       => __( 'Categories', 'ravon' ),
				'section'     => 'ravon_blog_single_options_section',
				'type'        => 'toggle',
				'settings'    => 'ravon_blog_single_enable_categories',
			) ) );

			$wp_customize->add_setting( 'ravon_blog_single_enable_author', array(
				'default'           => true,
				'sanitize_callback' => 'ravon_sanitize_toggle_callback',
			) );

			$wp_customize->add_control( new Ravon_Toggle_Control( $wp_customize, 'ravon_blog_single_enable_author', array(
				'label'       => __( 'Author', 'ravon' ),
				'section'     => 'ravon_blog_single_options_section',
				'type'        => 'toggle',
				'settings'    => 'ravon_blog_single_enable_author',
			) ) );

			$wp_customize->add_setting( 'ravon_blog_single_enable_comments', array(
				'default'           => true,
				'sanitize_callback' => 'ravon_sanitize_toggle_callback',
			) );

			$wp_customize->add_control( new Ravon_Toggle_Control( $wp_customize, 'ravon_blog_single_enable_comments', array(
				'label'       => __( 'Comments', 'ravon' ),
				'section'     => 'ravon_blog_single_options_section',
				'type'        => 'toggle',
				'settings'    => 'ravon_blog_single_enable_comments',
			) ) );

			$wp_customize->add_setting( 'ravon_blog_single_enable_tags', array(
				'default'           => true,
				'sanitize_callback' => 'ravon_sanitize_toggle_callback',
			) );

			$wp_customize->add_control( new Ravon_Toggle_Control( $wp_customize, 'ravon_blog_single_enable_tags', array(
				'label'       => __( 'Tags', 'ravon' ),
				'section'     => 'ravon_blog_single_options_section',
				'type'        => 'toggle',
				'settings'    => 'ravon_blog_single_enable_tags',
			) ) );

			$wp_customize->add_setting( 'ravon_blog_single_title_color', array(
				'default'			=> '',
				'sanitize_callback' => 'ravon_sanitize_hex_color',
				'transport'			=> 'postMessage'
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'ravon_blog_single_title_color', array(
				'label'      		=> __( 'Title Color', 'ravon' ),
				'section'    		=> 'ravon_blog_single_options_section',
				'settings'   		=> 'ravon_blog_single_title_color',
				'active_callback'   => 'ravon_blog_single_title_callback',
			) ) );

			$wp_customize->add_setting( 'ravon_blog_single_content_color', array(
				'default'			=> '',
				'sanitize_callback' => 'ravon_sanitize_hex_color',
				'transport'			=> 'postMessage'
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'ravon_blog_single_content_color', array(
				'label'      		=> __( 'Content Text Color', 'ravon' ),
				'section'    		=> 'ravon_blog_single_options_section',
				'settings'   		=> 'ravon_blog_single_content_color',
				'active_callback'   => 'ravon_blog_single_content_callback',
			) ) );

			$wp_customize->add_setting( 'ravon_blog_single_meta_color', array(
				'default'			=> '',
				'sanitize_callback' => 'ravon_sanitize_hex_color',
				'transport'			=> 'postMessage'
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'ravon_blog_single_meta_color', array(
				'label'      		=> __( 'Meta Text Color', 'ravon' ),
				'section'    		=> 'ravon_blog_single_options_section',
				'settings'   		=> 'ravon_blog_single_meta_color',
				'active_callback'   => 'ravon_blog_single_meta_callback',
			) ) );

			$wp_customize->add_setting( 'ravon_blog_single_meta_hover_color', array(
				'default'			=> '',
				'sanitize_callback' => 'ravon_sanitize_hex_color',
				'transport'			=> 'postMessage'
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'ravon_blog_single_meta_hover_color', array(
				'label'      		=> __( 'Meta Text Hover Color', 'ravon' ),
				'section'    		=> 'ravon_blog_single_options_section',
				'settings'   		=> 'ravon_blog_single_meta_hover_color',
				'active_callback'   => 'ravon_blog_single_meta_callback',
			) ) );

			if ( ! function_exists( 'ravon_blog_single_title_callback' ) ) {
				function ravon_blog_single_title_callback( $control ) {
					if ( $control->manager->get_setting( 'ravon_blog_single_enable_title' )->value() === true ) {
						return true;
					} else {
						return false;
					}
				}
			}

			if ( ! function_exists( 'ravon_blog_single_content_callback' ) ) {
				function ravon_blog_single_content_callback( $control ) {
					if ( $control->manager->get_setting( 'ravon_blog_single_enable_content' )->value() === true ) {
						return true;
					} else {
						return false;
					}
				}
			}

			if ( ! function_exists( 'ravon_blog_single_meta_callback' ) ) {
				function ravon_blog_single_meta_callback( $control ) {
					if ( $control->manager->get_setting( 'ravon_blog_single_enable_author' )->value() === true || $control->manager->get_setting( 'ravon_blog_single_enable_categories' )->value() === true || $control->manager->get_setting( 'ravon_blog_single_enable_date' )->value() === true || $control->manager->get_setting( 'ravon_blog_single_enable_tags' )->value() === true ) {
						return true;
					} else {
						return false;
					}
				}
			}

			/*---- Blog Archive-----*/

			$wp_customize->add_section( 'ravon_blog_archive_options_section', array(
				'title'         => __( 'Archive', 'ravon'),
				'priority'      => 10,
				'panel'         => 'ravon_blog_options_panel', 
			) );

			$wp_customize->add_setting( 'ravon_blog_archive_container', array(
				'default' 			=> 'container',
				'sanitize_callback' => 'esc_attr'
			) );

			$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ravon_blog_archive_container', array(
				'label'			=> __( 'Container', 'ravon' ),
				'section'		=> 'ravon_blog_archive_options_section',
				'settings'		=> 'ravon_blog_archive_container',
				'type'			=> 'select',
				'choices'		=> array(
										'container'			=> __( 'Default', 'ravon' ),
										'container-fluid'	=> __( 'Fluid', 'ravon' )
									)
			) ) );

			$wp_customize->add_setting( 'ravon_blog_archive_column', array(
				'default' 			=> '2',
				'sanitize_callback' => 'esc_attr'
			) );

			$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ravon_blog_archive_column', array(
				'label'			=> __( 'Select Column', 'ravon' ),
				'section'		=> 'ravon_blog_archive_options_section',
				'settings'		=> 'ravon_blog_archive_column',
				'type'			=> 'select',
				'choices'		=> array(
										'2'	=> __( '2 Columns', 'ravon' ),
										'3'	=> __( '3 Columns', 'ravon' ),
										'4'	=> __( '4 Columns', 'ravon' ),
										'5'	=> __( '5 Columns', 'ravon' ),
										'6'	=> __( '6 Columns', 'ravon' )
									)
			) ) );

			$wp_customize->add_setting( 'ravon_blog_archive_enable_thumbnail', array(
				'default'           => true,
				'sanitize_callback' => 'ravon_sanitize_toggle_callback',
			) );

			$wp_customize->add_control( new Ravon_Toggle_Control( $wp_customize, 'ravon_blog_archive_enable_thumbnail', array(
				'label'       => __( 'Thumbnail', 'ravon' ),
				'section'     => 'ravon_blog_archive_options_section',
				'type'        => 'toggle',
				'settings'    => 'ravon_blog_archive_enable_thumbnail',
			) ) );

			$wp_customize->add_setting( 'ravon_blog_archive_enable_title', array(
				'default'           => true,
				'sanitize_callback' => 'ravon_sanitize_toggle_callback',
			) );

			$wp_customize->add_control( new Ravon_Toggle_Control( $wp_customize, 'ravon_blog_archive_enable_title', array(
				'label'       => __( 'Title', 'ravon' ),
				'section'     => 'ravon_blog_archive_options_section',
				'type'        => 'toggle',
				'settings'    => 'ravon_blog_archive_enable_title',
			) ) );

			$wp_customize->add_setting( 'ravon_blog_archive_enable_content', array(
				'default'           => true,
				'sanitize_callback' => 'ravon_sanitize_toggle_callback',
			) );

			$wp_customize->add_control( new Ravon_Toggle_Control( $wp_customize, 'ravon_blog_archive_enable_content', array(
				'label'       => __( 'Content', 'ravon' ),
				'section'     => 'ravon_blog_archive_options_section',
				'type'        => 'toggle',
				'settings'    => 'ravon_blog_archive_enable_content',
			) ) );

			$wp_customize->add_setting( 'ravon_blog_archive_enable_read_more', array(
				'default'           => true,
				'sanitize_callback' => 'ravon_sanitize_toggle_callback',
			) );

			$wp_customize->add_control( new Ravon_Toggle_Control( $wp_customize, 'ravon_blog_archive_enable_read_more', array(
				'label'       => __( 'Read More', 'ravon' ),
				'section'     => 'ravon_blog_archive_options_section',
				'type'        => 'toggle',
				'settings'    => 'ravon_blog_archive_enable_read_more',
			) ) );


			$wp_customize->add_setting( 'ravon_blog_archive_readmore_btn_text', array(
				'default' 			=> __( 'Continue Reading', 'ravon' ),
				'sanitize_callback' => 'sanitize_text_field'
			) );

			$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ravon_blog_archive_readmore_btn_text', array(
				'label'				=> __( 'Read More Text', 'ravon' ),
				'section'			=> 'ravon_blog_archive_options_section',
				'settings'			=> 'ravon_blog_archive_readmore_btn_text',
				'type'				=> 'text',
				'active_callback'   => 'ravon_blog_archive_readmore_btn_callback',
			) ) );

			$wp_customize->add_setting( 'ravon_blog_archive_text_alignment', array(
				'default' 			=> 'text-left',
				'sanitize_callback' => 'esc_attr'
			) );

			$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ravon_blog_archive_text_alignment', array(
				'label'			=> __( 'Text Align', 'ravon' ),
				'section'		=> 'ravon_blog_archive_options_section',
				'settings'		=> 'ravon_blog_archive_text_alignment',
				'type'			=> 'select',
				'choices'		=> array(
										'text-left'		=> __( 'Left', 'ravon' ),
										'text-center'	=> __( 'Center', 'ravon' ),
										'text-right'	=> __( 'Right', 'ravon' )
									)
			) ) );

			$wp_customize->add_setting( 'ravon_blog_archive_title_color', array(
				'default'			=> '',
				'sanitize_callback' => 'ravon_sanitize_hex_color',
				'transport'			=> 'postMessage'
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'ravon_blog_archive_title_color', array(
				'label'      		=> __( 'Title Color', 'ravon' ),
				'section'    		=> 'ravon_blog_archive_options_section',
				'settings'   		=> 'ravon_blog_archive_title_color',
				'active_callback'   => 'ravon_blog_archive_title_callback',
			) ) );

			$wp_customize->add_setting( 'ravon_blog_archive_title_hover_color', array(
				'default'			=> '',
				'sanitize_callback' => 'ravon_sanitize_hex_color',
				'transport'			=> 'postMessage'
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'ravon_blog_archive_title_hover_color', array(
				'label'      		=> __( 'Title Hover Color', 'ravon' ),
				'section'    		=> 'ravon_blog_archive_options_section',
				'settings'   		=> 'ravon_blog_archive_title_hover_color',
				'active_callback'   => 'ravon_blog_archive_title_callback',
			) ) );

			$wp_customize->add_setting( 'ravon_blog_archive_content_color', array(
				'default'			=> '',
				'sanitize_callback' => 'ravon_sanitize_hex_color',
				'transport'			=> 'postMessage'
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'ravon_blog_archive_content_color', array(
				'label'      		=> __( 'Content Text Color', 'ravon' ),
				'section'    		=> 'ravon_blog_archive_options_section',
				'settings'   		=> 'ravon_blog_archive_content_color',
				'active_callback'   => 'ravon_blog_archive_content_callback',
			) ) );

			$wp_customize->add_setting( 'ravon_blog_archive_read_more_btn_text_color', array(
				'default'			=> '',
				'sanitize_callback' => 'ravon_sanitize_hex_color',
				'transport'			=> 'postMessage'
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'ravon_blog_archive_read_more_btn_text_color', array(
				'label'      		=> __( 'Read More Text Color', 'ravon' ),
				'section'    		=> 'ravon_blog_archive_options_section',
				'settings'   		=> 'ravon_blog_archive_read_more_btn_text_color',
				'active_callback'   => 'ravon_blog_archive_readmore_btn_callback',
			) ) );

			$wp_customize->add_setting( 'ravon_blog_archive_read_more_btn_text_hover_color', array(
				'default'			=> '',
				'sanitize_callback' => 'ravon_sanitize_hex_color',
				'transport'			=> 'postMessage'
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'ravon_blog_archive_read_more_btn_text_hover_color', array(
				'label'      		=> __( 'Read More Text Hover Color', 'ravon' ),
				'section'    		=> 'ravon_blog_archive_options_section',
				'settings'   		=> 'ravon_blog_archive_read_more_btn_text_hover_color',
				'active_callback'   => 'ravon_blog_archive_readmore_btn_callback',
			) ) );

			if ( ! function_exists( 'ravon_blog_archive_readmore_btn_callback' ) ) {
				function ravon_blog_archive_readmore_btn_callback( $control ) {
					if ( $control->manager->get_setting( 'ravon_blog_archive_enable_read_more' )->value() === true ) {
						return true;
					} else {
						return false;
					}
				}
			}

			if ( ! function_exists( 'ravon_blog_archive_title_callback' ) ) {
				function ravon_blog_archive_title_callback( $control ) {
					if ( $control->manager->get_setting( 'ravon_blog_archive_enable_title' )->value() === true ) {
						return true;
					} else {
						return false;
					}
				}
			}

			if ( ! function_exists( 'ravon_blog_archive_content_callback' ) ) {
				function ravon_blog_archive_content_callback( $control ) {
					if ( $control->manager->get_setting( 'ravon_blog_archive_enable_content' )->value() === true ) {
						return true;
					} else {
						return false;
					}
				}
			}
			/* =========END BLOG SETTINGS======== */

			/* =========START 404 SETTINGS======== */

			$wp_customize->add_section( 'ravon_404_page_options_section', array(
				'title'         => __( '404 Page', 'ravon' ),
				'priority'      => 10,
				'panel'         => 'ravon_pages_options_panel', 
			) );

			$wp_customize->add_setting( 'ravon_404_page_container', array(
				'default' 			=> 'container',
				'sanitize_callback' => 'esc_attr'
			) );

			$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ravon_404_page_container', array(
				'label'			=> __( 'Container', 'ravon' ),
				'section'		=> 'ravon_404_page_options_section',
				'settings'		=> 'ravon_404_page_container',
				'type'			=> 'select',
				'choices'		=> array(
										'container'			=> __( 'Default', 'ravon' ),
										'container-fluid'	=> __( 'Fluid', 'ravon' )
									)
			) ) );

			$wp_customize->add_setting( 'ravon_404_page_title_color', array(
				'default'			=> '',
				'sanitize_callback' => 'ravon_sanitize_hex_color',
				'transport'			=> 'postMessage'
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'ravon_404_page_title_color', array(
				'label'      		=> __( 'Title Color', 'ravon' ),
				'section'    		=> 'ravon_404_page_options_section',
				'settings'   		=> 'ravon_404_page_title_color'
			) ) );

			/* =========END 404 SETTINGS======== */

			/* =========START FOOTER SETTINGS======== */

			$wp_customize->add_section( 'ravon_footer_options_section', array(
				'title'         => __( 'Footer', 'ravon'),
				'priority'      => 10,
				'panel'         => 'ravon_footer_options_panel', 
			) );

			$wp_customize->add_setting( 'ravon_footer_container', array(
				'default' 			=> 'container',
				'sanitize_callback' => 'esc_attr'
			) );

			$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ravon_footer_container', array(
				'label'			=> __( 'Container', 'ravon' ),
				'section'		=> 'ravon_footer_options_section',
				'settings'		=> 'ravon_footer_container',
				'type'			=> 'select',
				'choices'		=> array(
										'container'			=> __( 'Default', 'ravon' ),
										'container-fluid'	=> __( 'Fluid', 'ravon' )
									)
			) ) );

			$wp_customize->add_section( 'ravon_footer_options_general_section', array(
				'title'         => __( 'Copyright Text', 'ravon' ),
				'priority'      => 10,
				'panel'         => 'ravon_footer_options_panel', 
			) );

			// Add site footer copyright text
			$wp_customize->add_setting( 'ravon_site_footer_copyright', array(
				'default'			=> '',
				'sanitize_callback' => 'sanitize_text_field'
			) );
			$wp_customize->add_control( 'ravon_site_footer_copyright', array(
				'label'			=> __( 'Add Copyright Text', 'ravon' ),
				'type'			=> 'text',
				'section'		=> 'ravon_footer_options_general_section',
				'settings'		=> 'ravon_site_footer_copyright',
			) );

			$wp_customize->add_setting( 'ravon_footer_copyright_text_font_size', array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( 'ravon_footer_copyright_text_font_size', array(
				'label'       => __( 'Font Size', 'ravon' ),
				'section'     => 'ravon_footer_options_general_section',
				'type'        => 'text',
				'settings'    => 'ravon_footer_copyright_text_font_size',
			) );

			// Add footer background color
			$wp_customize->add_setting( 'ravon_footer_bg_color', array(
				'default'			=> '',
				'sanitize_callback' => 'ravon_sanitize_hex_color',
				'transport'			=> 'postMessage'
			) );
			$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'ravon_footer_bg_color', array(
				'label'      => __( 'Background Color', 'ravon' ),
				'section'    => 'ravon_footer_options_section',
				'settings'   => 'ravon_footer_bg_color',
			) ) );

			// Add footer text color
			$wp_customize->add_setting( 'ravon_footer_text_color', array(
				'default'			=> '',
				'sanitize_callback' => 'ravon_sanitize_hex_color',
				'transport'			=> 'postMessage'
			) );
			$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'ravon_footer_text_color', array(
				'label'      => __( 'Text Color', 'ravon' ),
				'section'    => 'ravon_footer_options_section',
				'settings'   => 'ravon_footer_text_color',
			) ) );

			/* =========END FOOTER SETTINGS======== */

			/* =========START TYPOGRAPHY SETTINGS======== */

			$wp_customize->add_section( 'ravon_body_typography_options_section', array(
				'title'         => __( 'Body', 'ravon' ),
				'priority'      => 10,
				'panel'         => 'ravon_typography_options_panel', 
			) );

			$wp_customize->add_setting( 'ravon_body_typography_font_color', array(
				'default'			=> '',
				'sanitize_callback' => 'ravon_sanitize_hex_color',
				'transport'			=> 'postMessage'
			) );
			$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'ravon_body_typography_font_color', array(
				'label'      => __( 'Color', 'ravon' ),
				'section'    => 'ravon_body_typography_options_section',
				'settings'   => 'ravon_body_typography_font_color',
			) ) );

			$wp_customize->add_setting( 'ravon_body_typography_font_size', array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( 'ravon_body_typography_font_size', array(
				'label'       => __( 'Font Size', 'ravon' ),
				'section'     => 'ravon_body_typography_options_section',
				'type'        => 'text',
				'settings'    => 'ravon_body_typography_font_size',
			) );

			$wp_customize->add_setting( 'ravon_body_typography_line_height', array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( 'ravon_body_typography_line_height', array(
				'label'       => __( 'Line Height', 'ravon' ),
				'section'     => 'ravon_body_typography_options_section',
				'type'        => 'text',
				'settings'    => 'ravon_body_typography_line_height',
			) );

			$wp_customize->add_setting( 'ravon_body_typography_letter_spacing', array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( 'ravon_body_typography_letter_spacing', array(
				'label'       => __( 'Letter Spacing', 'ravon' ),
				'section'     => 'ravon_body_typography_options_section',
				'type'        => 'text',
				'settings'    => 'ravon_body_typography_letter_spacing',
			) );

			$wp_customize->add_section( 'ravon_links_typography_options_section', array(
				'title'         => __( 'Links', 'ravon' ),
				'priority'      => 10,
				'panel'         => 'ravon_typography_options_panel',
			) );

			$wp_customize->add_setting( 'ravon_links_typography_font_color', array(
				'default'			=> '',
				'sanitize_callback' => 'ravon_sanitize_hex_color',
				'transport'			=> 'postMessage'
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'ravon_links_typography_font_color', array(
				'label'      => __( 'Color', 'ravon' ),
				'section'    => 'ravon_links_typography_options_section',
				'settings'   => 'ravon_links_typography_font_color',
			) ) );

			$wp_customize->add_setting( 'ravon_links_typography_font_hover_color', array(
				'default'			=> '',
				'sanitize_callback' => 'ravon_sanitize_hex_color',
				'transport'			=> 'postMessage'
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'ravon_links_typography_font_hover_color', array(
				'label'      => __( 'Hover Color', 'ravon' ),
				'section'    => 'ravon_links_typography_options_section',
				'settings'   => 'ravon_links_typography_font_hover_color',
			) ) );

			$wp_customize->add_setting( 'ravon_links_typography_font_size', array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( 'ravon_links_typography_font_size', array(
				'label'       => __( 'Font Size', 'ravon' ),
				'section'     => 'ravon_links_typography_options_section',
				'type'        => 'text',
				'settings'    => 'ravon_links_typography_font_size',
			) );

			$wp_customize->add_setting( 'ravon_links_typography_line_height', array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( 'ravon_links_typography_line_height', array(
				'label'       => __( 'Line Height', 'ravon' ),
				'section'     => 'ravon_links_typography_options_section',
				'type'        => 'text',
				'settings'    => 'ravon_links_typography_line_height',
			) );

			$wp_customize->add_setting( 'ravon_links_typography_letter_spacing', array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( 'ravon_links_typography_letter_spacing', array(
				'label'       => __( 'Letter Spacing', 'ravon' ),
				'section'     => 'ravon_links_typography_options_section',
				'type'        => 'text',
				'settings'    => 'ravon_links_typography_letter_spacing',
			) );

			$wp_customize->add_section( 'ravon_h1_typography_options_section', array(
				'title'         => __( 'Heading H1', 'ravon' ),
				'priority'      => 10,
				'panel'         => 'ravon_typography_options_panel', 
			) );

			$wp_customize->add_setting( 'ravon_h1_typography_font_color', array(
				'default'			=> '',
				'sanitize_callback' => 'ravon_sanitize_hex_color',
				'transport'			=> 'postMessage'
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ravon_h1_typography_font_color', array(
				'label'      => __( 'Color', 'ravon' ),
				'section'    => 'ravon_h1_typography_options_section',
				'settings'   => 'ravon_h1_typography_font_color',
			) ) );

			$wp_customize->add_setting( 'ravon_h1_typography_font_size', array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( 'ravon_h1_typography_font_size', array(
				'label'       => __( 'Font Size', 'ravon' ),
				'section'     => 'ravon_h1_typography_options_section',
				'type'        => 'text',
				'settings'    => 'ravon_h1_typography_font_size',
			) );

			$wp_customize->add_setting( 'ravon_h1_typography_line_height', array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( 'ravon_h1_typography_line_height', array(
				'label'       => __( 'Line Height', 'ravon' ),
				'section'     => 'ravon_h1_typography_options_section',
				'type'        => 'text',
				'settings'    => 'ravon_h1_typography_line_height',
			) );

			$wp_customize->add_setting( 'ravon_h1_typography_letter_spacing', array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( 'ravon_h1_typography_letter_spacing', array(
				'label'       => __( 'Letter Spacing', 'ravon' ),
				'section'     => 'ravon_h1_typography_options_section',
				'type'        => 'text',
				'settings'    => 'ravon_h1_typography_letter_spacing',
			) );

			$wp_customize->add_section( 'ravon_h2_typography_options_section', array(
				'title'         => __( 'Heading H2', 'ravon' ),
				'priority'      => 10,
				'panel'         => 'ravon_typography_options_panel',
			) );

			$wp_customize->add_setting( 'ravon_h2_typography_font_color', array(
				'default'			=> '',
				'sanitize_callback' => 'ravon_sanitize_hex_color',
				'transport'			=> 'postMessage'
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'ravon_h2_typography_font_color', array(
				'label'      => __( 'Color', 'ravon' ),
				'section'    => 'ravon_h2_typography_options_section',
				'settings'   => 'ravon_h2_typography_font_color',
			) ) );

			$wp_customize->add_setting( 'ravon_h2_typography_font_size', array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( 'ravon_h2_typography_font_size', array(
				'label'       => __( 'Font Size', 'ravon' ),
				'section'     => 'ravon_h2_typography_options_section',
				'type'        => 'text',
				'settings'    => 'ravon_h2_typography_font_size',
			) );

			$wp_customize->add_setting( 'ravon_h2_typography_line_height', array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( 'ravon_h2_typography_line_height', array(
				'label'       => __( 'Line Height', 'ravon' ),
				'section'     => 'ravon_h2_typography_options_section',
				'type'        => 'text',
				'settings'    => 'ravon_h2_typography_line_height',
			) );

			$wp_customize->add_setting( 'ravon_h2_typography_letter_spacing', array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( 'ravon_h2_typography_letter_spacing', array(
				'label'       => __( 'Letter Spacing', 'ravon' ),
				'section'     => 'ravon_h2_typography_options_section',
				'type'        => 'text',
				'settings'    => 'ravon_h2_typography_letter_spacing',
			) );

			$wp_customize->add_section( 'ravon_h3_typography_options_section', array(
				'title'         => __( 'Heading H3', 'ravon' ),
				'priority'      => 10,
				'panel'         => 'ravon_typography_options_panel',
			) );

			$wp_customize->add_setting( 'ravon_h3_typography_font_color', array(
				'default'			=> '',
				'sanitize_callback' => 'ravon_sanitize_hex_color',
				'transport'			=> 'postMessage'
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'ravon_h3_typography_font_color', array(
				'label'      => __( 'Color', 'ravon' ),
				'section'    => 'ravon_h3_typography_options_section',
				'settings'   => 'ravon_h3_typography_font_color',
			) ) );

			$wp_customize->add_setting( 'ravon_h3_typography_font_size', array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( 'ravon_h3_typography_font_size', array(
				'label'       => __( 'Font Size', 'ravon' ),
				'section'     => 'ravon_h3_typography_options_section',
				'type'        => 'text',
				'settings'    => 'ravon_h3_typography_font_size',
			) );

			$wp_customize->add_setting( 'ravon_h3_typography_line_height', array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( 'ravon_h3_typography_line_height', array(
				'label'       => __( 'Line Height', 'ravon' ),
				'section'     => 'ravon_h3_typography_options_section',
				'type'        => 'text',
				'settings'    => 'ravon_h3_typography_line_height',
			) );

			$wp_customize->add_setting( 'ravon_h3_typography_letter_spacing', array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( 'ravon_h3_typography_letter_spacing', array(
				'label'       => __( 'Letter Spacing', 'ravon' ),
				'section'     => 'ravon_h3_typography_options_section',
				'type'        => 'text',
				'settings'    => 'ravon_h3_typography_letter_spacing',
			) );

			$wp_customize->add_section( 'ravon_h4_typography_options_section', array(
				'title'         => __( 'Heading H4', 'ravon' ),
				'priority'      => 10,
				'panel'         => 'ravon_typography_options_panel',
			) );

			$wp_customize->add_setting( 'ravon_h4_typography_font_color', array(
				'default'			=> '',
				'sanitize_callback' => 'ravon_sanitize_hex_color',
				'transport'			=> 'postMessage'
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'ravon_h4_typography_font_color', array(
				'label'      => __( 'Color', 'ravon' ),
				'section'    => 'ravon_h4_typography_options_section',
				'settings'   => 'ravon_h4_typography_font_color',
			) ) );

			$wp_customize->add_setting( 'ravon_h4_typography_font_size', array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( 'ravon_h4_typography_font_size', array(
				'label'       => __( 'Font Size', 'ravon' ),
				'section'     => 'ravon_h4_typography_options_section',
				'type'        => 'text',
				'settings'    => 'ravon_h4_typography_font_size',
			) );

			$wp_customize->add_setting( 'ravon_h4_typography_line_height', array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( 'ravon_h4_typography_line_height', array(
				'label'       => __( 'Line Height', 'ravon' ),
				'section'     => 'ravon_h4_typography_options_section',
				'type'        => 'text',
				'settings'    => 'ravon_h4_typography_line_height',
			) );

			$wp_customize->add_setting( 'ravon_h4_typography_letter_spacing', array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( 'ravon_h4_typography_letter_spacing', array(
				'label'       => __( 'Letter Spacing', 'ravon' ),
				'section'     => 'ravon_h4_typography_options_section',
				'type'        => 'text',
				'settings'    => 'ravon_h4_typography_letter_spacing',
			) );

			$wp_customize->add_section( 'ravon_h5_typography_options_section', array(
				'title'         => __( 'Heading H5', 'ravon' ),
				'priority'      => 10,
				'panel'         => 'ravon_typography_options_panel',
			) );

			$wp_customize->add_setting( 'ravon_h5_typography_font_color', array(
				'default'			=> '',
				'sanitize_callback' => 'ravon_sanitize_hex_color',
				'transport'			=> 'postMessage'
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ravon_h5_typography_font_color', array(
				'label'      => __( 'Color', 'ravon' ),
				'section'    => 'ravon_h5_typography_options_section',
				'settings'   => 'ravon_h5_typography_font_color',
			) ) );

			$wp_customize->add_setting( 'ravon_h5_typography_font_size', array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( 'ravon_h5_typography_font_size', array(
				'label'       => __( 'Font Size', 'ravon' ),
				'section'     => 'ravon_h5_typography_options_section',
				'type'        => 'text',
				'settings'    => 'ravon_h5_typography_font_size',
			) );

			$wp_customize->add_setting( 'ravon_h5_typography_line_height', array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( 'ravon_h5_typography_line_height', array(
				'label'       => __( 'Line Height', 'ravon' ),
				'section'     => 'ravon_h5_typography_options_section',
				'type'        => 'text',
				'settings'    => 'ravon_h5_typography_line_height',
			) );

			$wp_customize->add_setting( 'ravon_h5_typography_letter_spacing', array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( 'ravon_h5_typography_letter_spacing', array(
				'label'       => __( 'Letter Spacing', 'ravon' ),
				'section'     => 'ravon_h5_typography_options_section',
				'type'        => 'text',
				'settings'    => 'ravon_h5_typography_letter_spacing',
			) );

			$wp_customize->add_section( 'ravon_h6_typography_options_section', array(
				'title'         => __( 'Heading H6', 'ravon' ),
				'priority'      => 10,
				'panel'         => 'ravon_typography_options_panel',
			) );

			$wp_customize->add_setting( 'ravon_h6_typography_font_color', array(
				'default'			=> '',
				'sanitize_callback' => 'ravon_sanitize_hex_color',
				'transport'			=> 'postMessage'
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control(  $wp_customize, 'ravon_h6_typography_font_color', array(
				'label'      => __( 'Color', 'ravon' ),
				'section'    => 'ravon_h6_typography_options_section',
				'settings'   => 'ravon_h6_typography_font_color',
			) ) );

			$wp_customize->add_setting( 'ravon_h6_typography_font_size', array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( 'ravon_h6_typography_font_size', array(
				'label'       => __( 'Font Size', 'ravon' ),
				'section'     => 'ravon_h6_typography_options_section',
				'type'        => 'text',
				'settings'    => 'ravon_h6_typography_font_size',
			) );

			$wp_customize->add_setting( 'ravon_h6_typography_line_height', array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( 'ravon_h6_typography_line_height', array(
				'label'       => __( 'Line Height', 'ravon' ),
				'section'     => 'ravon_h6_typography_options_section',
				'type'        => 'text',
				'settings'    => 'ravon_h6_typography_line_height',
			) );

			$wp_customize->add_setting( 'ravon_h6_typography_letter_spacing', array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( 'ravon_h6_typography_letter_spacing', array(
				'label'       => __( 'Letter Spacing', 'ravon' ),
				'section'     => 'ravon_h6_typography_options_section',
				'type'        => 'text',
				'settings'    => 'ravon_h6_typography_letter_spacing',
			) );

			/* =========END TYPOGRAPHY SETTINGS======== */

			// Toggle sanitization
			function ravon_sanitize_toggle_callback( $checked ) {

				return ( ( isset( $checked ) && true === $checked ) ? true : false );
			}

			// Color sanitization
			function ravon_sanitize_hex_color( $color ) {
				if ( $unhashed = sanitize_hex_color_no_hash( $color ) ) {
					return '#' . $unhashed;
				}
				return $color;
			}

		} // end of ravon_customize_register()

		public function ravon_customize_preview_init() {
		
			$theme_version = wp_get_theme()->get( 'Version' );

			wp_enqueue_script( 
			   'ravon-customizer', // Give the script a unique ID
			   get_template_directory_uri() . '/lib/customize/ravon-customizer.js', // Define the path to the JS file
			   array( 'jquery', 'customize-preview' ), // Define dependencies
			   $theme_version, // Define a version (optional) 
			   true // Specify whether to put in footer (leave this true)
			);
		} // end of ravon_customize_preview_init()

		public function ravon_customize_styles_output() {
			
			get_template_part( 'lib/customize/ravon-customizer-style' );
			
		} // end of ravon_customize_styles_output()
	}
}
$Ravon_Customize = new Ravon_Customize();
