( function( $ ) {
	//Adds that cool shit on the menu when you hover
	$( '.main-navigation a' ).each( function() {
		$( this ).attr( 'data-hover', $( this ).text() );
	} );
}( jQuery ) );
