/* FX.Slide */
/* toggle window for the login section */
/* Works with mootools-release-1.11 */
/* more info at http://demos.mootools.net/Fx.Slide */

//-vertical

window.addEvent('domready', function(){

	$('login').setStyle('height','85px');
	$('login').setStyle('border-bottom','1px solid #1E1E1E');
	var mySlide = new Fx.Slide('login').hide();
	$('login').setStyle('visibility','visible'); //starts the panel in closed state

    $('open').addEvent('click', function(e){
		e = new Event(e);
		mySlide.toggle();
		e.stop();
	});

    $('close').addEvent('click', function(e){
		e = new Event(e);
		mySlide.slideOut();
		e.stop();
	});

});



