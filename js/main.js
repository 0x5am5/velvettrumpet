jQuery(function ($) {

	slideshow();
	function slideshow(selector) { 

	var slides = selector ? selector : $('.slideshow');

		slides.each(function() {

			var target = selector ? selector : $(this),
	              next = target.find('.show').next();

			target.find('.show').fadeIn();

			var ticker = setInterval(function() {

				target.find('.show').removeAttr('style class');
				next = next.addClass('show').fadeIn();
				next = next.is(':last-child') ? target.find('div:first-child') : next.next();

			}, 7000);
		});
	}	

	var theWindow = $(window),
		windowWidth = theWindow.width() > 620 ? 'lrg' : 'sml',
		menu =  $('.menu-main-nav-container');

    if ($('.home-page .menu-main-nav-container').length && windowWidth == 'lrg') {
        var t = setTimeout(function() {
            menu.animate({ 
            	top: '86px',
            	complete: function() {
            		menu.removeClass('hide');
            	} }, 'slow');	         
        }, 100);
    }

    $('.mob-menu').click(function(e) {
    	menu.toggleClass('show').removeAttr('style');
        $(this).toggleClass('active');
    	e.preventDefault();
    });

var isTouchDevice = 'ontouchstart' in document.documentElement;

if(!isTouchDevice) {
        $('body').addClass('desktop');
}
});