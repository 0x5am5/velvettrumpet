jQuery(document).ready(function($) {
    function menuShow() {
         $('.menu').addClass('show');
        var t = setTimeout(function() {
            $('.menu').animate({ bottom: '-55px' }, 'slow');	
        }, 100);
    }
});