$(document).ready(function() {
	$('.expander').on('click', function () {
		$(this).parent().parent().parent().parent().children('tbody').toggle()
	});
});