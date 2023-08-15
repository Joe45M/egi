/**
 * Fix the lazy load transition overriding our custom transitions
 */

window.addEventListener( 'DOMContentLoaded', ( event ) => {
	console.log( 'DOM loaded. Script booting.' );

	document.querySelectorAll( '.lazyloaded' ).forEach( ( el ) => {
		el.classList.remove( 'lazyloaded' );
	} );

	console.log( 'Booting link clicks...' );


} );
