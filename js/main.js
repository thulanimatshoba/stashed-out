( function( $ ) {
	//Adds that cool shit on the menu when you hover
	$( '.main-navigation a' ).each( function() {
		$( this ).attr( 'data-hover', $( this ).text() );
	} );
}( jQuery ) );

function progressBarScroll() {
	const winScroll = document.body.scrollTop || document.documentElement.scrollTop,
		height = document.documentElement.scrollHeight - document.documentElement.clientHeight,
		scrolled = ( winScroll / height ) * 100;
	document.getElementById( 'progress-bar' ).style.width = scrolled + '%';
}

window.onscroll = function() {
	progressBarScroll();
};
