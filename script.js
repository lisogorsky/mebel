(function($) {
	$(document).ready( function () {

		$('a[href="#callToMaster"]').click(function () {
			elementClick = $(this).attr("href");
			destination = $(elementClick).offset().top;
			$("html, body").animate({scrollTop: destination}, 2000);
			return false;
		});

		window.onscroll = function () {
			if ( window.pageYOffset > 200 ) {
				$('#rightButton').show(1000);
			} else {
				$('#rightButton').hide(1000);
			}
		};

		$('#rightButton .fa-times').click(function() {
			$('#rightButton').remove();
		})

		$('#rightButton .fa-lg').hover(function() {
			$(this).parent().prev().show();
		}, function() {
			$(this).parent().prev().hide();	
		})

		$('.formPopUp').click(function() { 
			$('#paranja, #window').slideDown(555); 
		})

		var a = location.hash;
		if (a == "#thanks") {
			setTimeout(function() {
				$('#thanks').fadeOut(1000);
			},5000);
		}
		if (a == "#error") {
			setTimeout(function() {
				$('#error').fadeOut(1000);
			},5000);
			setTimeout(function() {
				$('#formPopUp').click();
			},6000);
		}
		

	});
})(jQuery);