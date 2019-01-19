( function( $ ) {

	$( function() {
		$( '.wpfaipc' ).iconpicker().on( 'iconpickerUpdated', function() {
			$( this ).trigger( 'change' );
		} );
	} );

} )( jQuery );