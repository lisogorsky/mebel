(function($) {
	$(document).ready( function () {

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

		$('.formPopUp').click(function(e) { 
			e.preventDefault();
			$('#paranja, #window').slideDown(555); 
			if ($(this).hasClass('zamer')) {
				$('#window > div').hide(10);
				$('#window').css({'width':'400px', 'height':'355px'});
				$('#window form').show(10);
				$('form[name="feedback"] > h4').text('Вызовите замерщика!')
			}
			else if ($(this).hasClass('guaranty')) {
				$('#window form, #window > div').hide(10);
				$('#window').css({'width':'600px', 'height':'355px'});
				$('#window .guaranty-window').show(10);
			}
			else if ($(this).hasClass('sale')) {
				$('#window form, #window > div').hide(10);
				$('#window').css({'width':'400px', 'height':'255px'});
				$('#window .sale-window').show(10);
			}
			else {
				$('#window > div').hide(10);
				$('#window').css({'width':'400px', 'height':'355px'});
				$('#window form').show(10);
				$('form[name="feedback"] > h4').text('Закажите бесплатную консультацию!')
			}
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