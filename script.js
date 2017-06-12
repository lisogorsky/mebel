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
			if ($(this).hasClass('zamer')) {
				$('#window > div').hide(10);
				$('#window').css({'width':'400px', 'height':'355px'});
				$('#window form').show(10);
				$('form[name="feedback"] > h4').text('Вызовите замерщика!');
				$('#paranja, #window').slideDown(555); 
			}
			else if ($(this).hasClass('guaranty')) {
				$('#window form, #window > div').hide(10);
				$('#window').css({'width':'515px', 'height':'470px'});
				$('#window .guaranty-window').show(10);
				$('#paranja, #window').slideDown(555); 
			}
			else if ($(this).hasClass('sale')) {
				$('#window form, #window > div').hide(10);
				$('#window').css({'width':'400px', 'height':'185px'});
				$('#window .sale-window').show(10);
				$('#paranja, #window').slideDown(555); 
			}
			else {
				$('#window > div').hide(10);
				$('#window').css({'width':'400px', 'height':'355px'});
				$('#window form').show(10);
				$('form[name="feedback"] > h4').text('Закажите бесплатную консультацию!');
				$('#paranja, #window').slideDown(555); 
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
		
		$('.map1').click(function() {
			$('.map2 .wpb_wrapper > p, .map3 .wpb_wrapper > p').css('background','#fff');
			$('.map1 .wpb_wrapper > p').css('background','#BFBFBF');
			$('#map2, #map3').fadeOut(777);
			$('#map1').fadeIn(777);
		})
		$('.map2').click(function() {
			$('.map1 .wpb_wrapper > p, .map3 .wpb_wrapper > p').css('background','#fff');
			$('.map2 .wpb_wrapper > p').css('background','#BFBFBF');
			$('#map1, #map3').fadeOut(777);
			$('#map2').fadeIn(777);
		})
		$('.map3').click(function() {
			$('.map1 .wpb_wrapper > p, .map2 .wpb_wrapper > p').css('background','#fff');
			$('.map3 .wpb_wrapper > p').css('background','#BFBFBF');
			$('#map1, #map2').fadeOut(777);
			$('#map3').fadeIn(777);
		})

	});
})(jQuery);