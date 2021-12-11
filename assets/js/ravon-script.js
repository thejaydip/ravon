( function( $ ) {

	"use strict";

		$( window ).scroll( function() {
			if ( $( '.site-header' ).hasClass( 'sticky' ) ) {
				if ( $( this ).scrollTop() > 0 ) {
					$( '.site-header' ).addClass( 'header-scrolled' );
				} else {
					$( '.site-header' ).removeClass( 'header-scrolled' );
				}
			}
		});

		onWindowResize();
		function onWindowResize() {
			
			var headerHeight = $( '.site-header' ).outerHeight();
			
			if ( $( '.site-header' ).hasClass( 'sticky' ) ) {

				if ( $( window ).width() > 1024 ) {

					if ( $( 'body' ).hasClass( 'admin-bar' ) ) {
					
					var adminbarHeight = $( '#wpadminbar' ).outerHeight();

						$( '.site-header' ).css( 'top', adminbarHeight );
					}

					$( '.site-content' ).css( 'margin-top', headerHeight );

				} else {
					$( '.site-content, .site-header' ).removeAttr( 'style' );
				}
			}

			if ( $( window ).width() > 991 ) {

				$(document).on( 'mouseenter', '.menu-item', function() {
					$(this).children( '.sub-menu' ).addClass( 'submenu-show' );
				}).on( 'mouseleave', '.menu-item', function() {
				    $(this).children( '.sub-menu' ).removeClass( 'submenu-show' );
				});

				$(document).on( 'mouseenter', '.page_item_has_children', function() {
					$(this).children( '.children' ).addClass( 'submenu-show' );
				}).on( 'mouseleave', '.page_item_has_children', function() {
				    $( this ).children( '.children' ).removeClass( 'submenu-show' );
				});
			}

			$( '.full-screen' ).css( 'min-height', $( window ).height() - headerHeight );
		}

		$( window ).on( 'resize', function() {

			onWindowResize();
			
		});

} )( jQuery );