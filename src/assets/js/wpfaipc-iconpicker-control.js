( function( $ ) {

	$( function() {
		$( '.wpfaipc' ).iconpicker({
			hideOnSelect: true,
		}).on( 'iconpickerUpdated', function() {
			$( this ).trigger( 'change' );
		} );
	} );

} )( jQuery );