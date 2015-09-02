jQuery(function ($) {


	$('.slideshow').each(function() {

		var target = $(this),
              next = target.find('.show').next(),
              offset = Math.floor((Math.random() * 50) + 1);

		target.find('.show').fadeIn();

		if (target.find('li').length > 1) {
			setTimeout(function() {
				var ticker = setInterval(function() {

					target.find('.show').removeAttr('style class');
					next = next.addClass('show').fadeIn();
					next = next.is(':last-child') ? target.find('li:first-child') : next.next();

				}, 7000);			
			}, offset);
		}
	});

	var theWindow = $(window),
		windowWidth = theWindow.width() > 620 ? 'lrg' : 'sml',
		menu =  $('.menu-main-nav-container');

    // if ($('.home-page .menu-main-nav-container').length && windowWidth == 'lrg') {
    //     var t = setTimeout(function() {
    //         menu.animate({ 
    //         	top: '86px',
    //         	complete: function() {
    //         		menu.removeClass('hide');
    //         	} }, 'slow');	         
    //     }, 100);
    // }

    $('.mob-menu').click(function(e) {
    	menu.toggleClass('show').removeAttr('style');
        $(this).toggleClass('active');
    	e.preventDefault();
    });

	var isTouchDevice = 'ontouchstart' in document.documentElement;

	if(!isTouchDevice) {
	        $('body').addClass('desktop');
	}

	function menuShow() {
	 	$('.menu').addClass('show');
		var t = setTimeout(function() {
	    	$('.menu').animate({ bottom: '-55px' }, 'slow');	
		}, 100);
	}

	$('.mod-slider').each(function() {
		
	})
});