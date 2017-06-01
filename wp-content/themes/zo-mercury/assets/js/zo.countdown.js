jQuery(document).ready(function($) {
	"use strict";
	/* Count Down */
	$(".zo-count-down").each(function () {
		var $this = $(this);
		var countdown_id = $this.attr('id');
		var get_date_count_down = $("#"+countdown_id+" > span").text();
		if(get_date_count_down.trim() && get_date_count_down.trim() != ""){
			$("#"+countdown_id).countdown(get_date_count_down, function(event) {
				$('#'+countdown_id+' .zo-count-down-days .zo-count-down-number').text(event.strftime('%D'));
				$('#'+countdown_id+' .zo-count-down-hours .zo-count-down-number').text(event.strftime('%H'));
				$('#'+countdown_id+' .zo-count-down-minutes .zo-count-down-number').text(event.strftime('%M'));
				$('#'+countdown_id+' .zo-count-down-seconds .zo-count-down-number').text(event.strftime('%S'));
			});
		}
	});
});