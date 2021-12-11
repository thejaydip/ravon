/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 */
( function( $ ) {

	"use strict";

	/* Header */

	//Update header background color in real time...
	wp.customize( 'ravon_header_bg_color', function( value ) {
		value.bind( function( newval ) {
			$( '.site-header' ).css( 'background-color', newval );
		} );
	} );

	//Update header text color in real time...
	wp.customize( 'ravon_header_text_color', function( value ) {
		value.bind( function( newval ) {
			$( '.site-header .main-navigation ul li a' ).css( 'color', newval );
		} );
	} );

	//Update header submenu text color in real time...
	wp.customize( 'ravon_header_submenu_text_color', function( value ) {
		value.bind( function( newval ) {
			$( '.site-header .main-navigation ul li ul.sub-menu li a' ).css( 'color', newval );
		} );
	} );

	//Update body text color in real time...
	wp.customize( 'ravon_body_typography_font_color', function( value ) {
		value.bind( function( newval ) {
			$( 'body' ).css( 'color', newval );
		} );
	} );
	
	//Update links text color in real time...
	var $ravon_links_typography_font_color = '';
	var $ravon_links_typography_font_hover_color = '';
	wp.customize( 'ravon_links_typography_font_color', function( value ) {
		value.bind( function( to ) {
			$ravon_links_typography_font_color = to;
			$( 'a' ).css( 'color', to );
			if ( ! $ravon_links_typography_font_hover_color ) {
				wp.customize( 'ravon_links_typography_font_hover_color', function( value ) {
					$( document ).on( 'mouseenter', 'a', function () {
						$( this ).css( 'color', '' );
					}).on( 'mouseleave', 'a', function() {
						$( this ).css( 'color', $ravon_links_typography_font_color );
					});
				});
			}
		});
	});
	wp.customize( 'ravon_links_typography_font_hover_color', function( value ) { 
		value.bind( function( to ) {
			$ravon_links_typography_font_hover_color = to;
			$( document ).on( 'mouseenter', 'a', function () {
				$( this ).css( 'color', to );
			}).on( 'mouseleave', 'a', function() {
				$( this ).css( 'color', $ravon_links_typography_font_color );
			});
		});
	});

	//Update h1 color in real time...
	wp.customize( 'ravon_h1_typography_font_color', function( value ) {
		value.bind( function( newval ) {
			$( 'h1' ).css( 'color', newval );
		} );
	} );

	//Update h2 color in real time...
	wp.customize( 'ravon_h2_typography_font_color', function( value ) {
		value.bind( function( newval ) {
			$( 'h2' ).css( 'color', newval );
		} );
	} );

	//Update h3 color in real time...
	wp.customize( 'ravon_h3_typography_font_color', function( value ) {
		value.bind( function( newval ) {
			$( 'h3' ).css( 'color', newval );
		} );
	} );

	//Update h4 color in real time...
	wp.customize( 'ravon_h4_typography_font_color', function( value ) {
		value.bind( function( newval ) {
			$( 'h4' ).css( 'color', newval );
		} );
	} );

	//Update h5 color in real time...
	wp.customize( 'ravon_h5_typography_font_color', function( value ) {
		value.bind( function( newval ) {
			$( 'h5' ).css( 'color', newval );
		} );
	} );

	//Update h6 color in real time...
	wp.customize( 'ravon_h6_typography_font_color', function( value ) {
		value.bind( function( newval ) {
			$( 'h6' ).css( 'color', newval );
		} );
	} );

	//* Blog Archive */

	var $ravon_blog_archive_title_color = '';
	var $ravon_blog_archive_title_hover_color = '';
	wp.customize( 'ravon_blog_archive_title_color', function( value ) {
		value.bind( function( to ) {
			$ravon_blog_archive_title_color = to;
			$( '.archive-wrapper-section .entry-title a' ).css( 'color', to );
			if ( ! $ravon_blog_archive_title_hover_color ) {
				wp.customize( 'ravon_blog_archive_title_hover_color', function( value ) {
					$( document ).on( 'mouseenter', '.archive-wrapper-section .entry-title a', function () {
						$( this ).css( 'color', '' );
					}).on( 'mouseleave', '.archive-wrapper-section .entry-title a', function() {
						$( this ).css( 'color', $ravon_blog_archive_title_color );
					});
				});
			}
		});
	});
	wp.customize( 'ravon_blog_archive_title_hover_color', function( value ) { 
		value.bind( function( to ) {
			$ravon_blog_archive_title_hover_color = to;
			$( document ).on( 'mouseenter', '.archive-wrapper-section .entry-title a', function () {
				$( this ).css( 'color', to );
			}).on( 'mouseleave', '.archive-wrapper-section .entry-title a', function() {
				$( this ).css( 'color', $ravon_blog_archive_title_color );
			});
		});
	});

	wp.customize( 'ravon_blog_archive_content_color', function( value ) {
		value.bind( function( newval ) {
			$( '.archive-wrapper-section .entry-content' ).css( 'color', newval );
		} );
	} );

	var $ravon_blog_archive_read_more_btn_text_color = '';
	var $ravon_blog_archive_read_more_btn_text_hover_color = '';
	wp.customize( 'ravon_blog_archive_read_more_btn_text_color', function( value ) {
		value.bind( function( to ) {
			$ravon_blog_archive_read_more_btn_text_color = to;
			$( '.archive-wrapper-section .readmore_button a' ).css( 'color', to );
			if ( ! $ravon_blog_archive_read_more_btn_text_hover_color ) {
				wp.customize( 'ravon_blog_archive_read_more_btn_text_hover_color', function( value ) {
					$( document ).on( 'mouseenter', '.archive-wrapper-section .readmore_button a', function () {
						$( this ).css( 'color', '' );
					}).on( 'mouseleave', '.archive-wrapper-section .readmore_button a', function() {
						$( this ).css( 'color', $ravon_blog_archive_read_more_btn_text_color );
					});
				});
			}
		});
	});

	wp.customize( 'ravon_blog_archive_read_more_btn_text_hover_color', function( value ) { 
		value.bind( function( to ) {
			$ravon_blog_archive_read_more_btn_text_hover_color = to;
			$( document ).on( 'mouseenter', '.archive-wrapper-section .readmore_button a', function () {
				$( this ).css( 'color', to );
			}).on( 'mouseleave', '.archive-wrapper-section .readmore_button a', function() {
				$( this ).css( 'color', $ravon_blog_archive_read_more_btn_text_color );
			});
		});
	});

	/* Blog Single */

	wp.customize( 'ravon_blog_single_title_color', function( value ) {
		value.bind( function( newval ) {
			$( '.post-wrapper-section .entry-title' ).css( 'color', newval );
		} );
	} );

	wp.customize( 'ravon_blog_single_content_color', function( value ) {
		value.bind( function( newval ) {
			$( '.post-wrapper-section .entry-content' ).css( 'color', newval );
		} );
	} );

	wp.customize( 'ravon_blog_single_meta_color', function( value ) {
		value.bind( function( newval ) {
			$( '.post-wrapper-section .entry-meta' ).css( 'color', newval );
		} );
	} );

	var $ravon_blog_single_meta_color = '';
	var $ravon_blog_single_meta_hover_color = '';
	wp.customize( 'ravon_blog_single_meta_color', function( value ) {
		value.bind( function( to ) {
			$ravon_blog_single_meta_color = to;
			$( '.post-wrapper-section .entry-meta a' ).css( 'color', to );
			if ( ! $ravon_blog_single_meta_hover_color ) {
				wp.customize( 'ravon_blog_single_meta_hover_color', function( value ) {
					$( document ).on( 'mouseenter', '.post-wrapper-section .entry-meta a', function () {
						$( this ).css( 'color', '' );
					}).on( 'mouseleave', '.post-wrapper-section .entry-meta a', function() {
						$( this ).css( 'color', $ravon_blog_single_meta_color );
					});
				});
			}
		});
	});

	wp.customize( 'ravon_blog_single_meta_hover_color', function( value ) { 
		value.bind( function( to ) {
			$ravon_blog_single_meta_hover_color = to;
			$( document ).on( 'mouseenter', '.post-wrapper-section .entry-meta a', function () {
				$( this ).css( 'color', to );
			}).on( 'mouseleave', '.post-wrapper-section .entry-meta a', function() {
				$( this ).css( 'color', $ravon_blog_single_meta_color );
			});
		});
	});

	/* 404 Page*/
	
	wp.customize( 'ravon_404_page_title_color', function( value ) {
		value.bind( function( newval ) {
			$( '.error-page-wrapper .page-title' ).css( 'color', newval );
		} );
	} );

	/* Footer */

	wp.customize( 'ravon_footer_bg_color', function( value ) {
		value.bind( function( newval ) {
			$( '.site-footer' ).css( 'background-color', newval );
		} );
	} );

	wp.customize( 'ravon_footer_text_color', function( value ) {
		value.bind( function( newval ) {
			$( '.site-footer' ).css( 'color', newval );
		} );
	} );

} )( jQuery );