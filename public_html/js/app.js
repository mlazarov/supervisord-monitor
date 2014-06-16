$(document).ready(function() {
	$('.expander').on('click', function () {
		$(this).parent().parent().parent().parent().children('tbody').toggle()
	});

	$('.server tbody tr span.pull-right').parent().parent().parent().parent().children('thead').children().children().addClass('info')
	var $wrapper = $('.server-list');

	$wrapper.find('.server').sort(function (a, b) {
	    return +a.dataset.order + +b.dataset.order;
	})
	.appendTo( $wrapper );
});