(function($) {
	$(document).ready( function () {

		$('a[href="#callToMaster"]').click(function () {
			elementClick = $(this).attr("href");
			destination = $(elementClick).offset().top;
			$("html, body").animate({scrollTop: destination}, 2000);
			return false;
		});

	});
})(jQuery);