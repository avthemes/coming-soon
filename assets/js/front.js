/**
 * Subscribe widget front-end script
 */
(function( $ ) {

	$( window ).resize( avAdjustTopOffset );
	$( window ).on("orientationchange", avAdjustTopOffset );
	avAdjustTopOffset();

	if( $('#counter').length > 0 ) {

		var date = $('#counter').attr('data-date');

		if( ( date != "" ) || date !== null ) {

			// Set the date we're counting down to
			var countDownDate = new Date( date ).getTime();

			var x = setInterval(function() {

				var now = new Date().getTime();
				var distance = countDownDate - now;

				var days = Math.floor(distance / (1000 * 60 * 60 * 24));
				var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
				var seconds = Math.floor((distance % (1000 * 60)) / 1000);

				document.getElementById("counter").innerHTML = days + "d " + hours + "h "
				+ minutes + "m " + seconds + "s ";

				if (distance < 0) {
					clearInterval(x);
					document.getElementById("counter").innerHTML = "Any time now!";
				}
			}, 1000);
		}
	}
	
})( jQuery );

function avAdjustTopOffset() {

	var bodyHeight 		= jQuery('body').height();
	var contentHeight 	= jQuery('#main-content').height();
	var footerHeight 	= jQuery('#footer').height(); 
	var topOffset		= Math.floor( ( bodyHeight - ( contentHeight + footerHeight ) ) / 2 ); 
	jQuery('body').css('padding-top', topOffset+'px');

	if( contentHeight >= ( bodyHeight - footerHeight ) ) {

		jQuery('#footer').css('position', 'relative');
	}
	else {

		jQuery('#footer').css('position', 'absolute');
	}
}