/* jshint devel:true */
console.log('\'Allo \'Allo!');

$(document).ready(function() {
	
	//smoothscrol
	$('.scroll').click( function() { // Au clic sur un élément
		var page = $(this).attr('href'); // Page cible
		var speed = 450; // Durée de l'animation (en ms)
		$('html, body').animate( { scrollTop: $(page).offset().top }, speed ); // Go
		return false;
	});

	//svg map
	$('#map').vectorMap({
	    map: 'france_fr',
		hoverOpacity: 0.8,
		hoverColor: "#a0171e",
		backgroundColor: "transparent",
		color: "#736f80",
		selectedColor: '#a0171e',
		borderColor: "#fff",
		enableZoom: false,
		showTooltip: true,
	    onRegionClick: function(element, code, region)
	    {
	   //      var message = 'Région : "'
	   //          + region 
	   //          + '" || Id : "'
	   //          + code
				// + '"';
         
	   //      alert(message);
	   	location.href= 'section.html#' + region;
	    }
	});
});
