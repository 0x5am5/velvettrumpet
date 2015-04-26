
$(function() {

	var footer = $('.footer'),
		next = footer.find('.show').next();

	var ticker = setTimeout(function() {
		footer.find('.show').removeclass('show');
		next = next.addClass('show');
		next = next.is(':last-child') ? footer.find('li:first-child') : next.next();
	}, 7000);
});