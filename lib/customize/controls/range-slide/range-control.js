( function ( $ ) {
	$( document ).ready( function ( $ ) {
		$( 'input[data-input-type]' ).on( 'input change', function () {
			var _self_val = $( this ).val();
			$( this ).parent().find( '.ravon-range-value' ).html( _self_val );
			$( this ).val( _self_val );
		});
	})
})(jQuery);