/**
 * Created by John Nguyen on 03-08-2015.
 */
jQuery(document).ready(function ($) {
    "use strict";
	var loading = $('<div>', { class: 'pageload-overlay'});
	$('body').append(loading);
    $('.zo-masonry').each(function(){
        var $grid = $(this),
            $parent = $(this).parent().attr('id');

        var options = zoMasonry[$parent];
				options.columnHeight = Math.floor(options.columnWidth * options.grid_ratio);
        $grid.find('.zo-masonry-item').resizable({
            grid:[
                options.columnWidth + options.grid_margin,
                options.columnWidth * options.grid_ratio + options.grid_margin
            ],
            autoHide: true,
            start:function(){
                $grid.data('resize', false);
            },
            resize:function(){
                $grid.shuffle('update');
            },
            stop: function( event, ui ){
                $grid.data('resize', true);
				$('body').addClass('zoMasonry-loading');
                var w = Math.floor((ui.size.width+options.grid_margin)/(options.columnWidth+options.grid_margin)),
                    h = Math.floor((ui.size.height+options.grid_margin)/(options.columnHeight+options.grid_margin)),
                    item = $(ui.element).data('index'),
                    pid = $(ui.element).data('id');
							console.log(h);
								/* add like. */
							  $.post(ajaxurl, {
                    action : 'zo_masonry_save',
                    pid : pid,
                    id : $parent,
                    item : item,
                    width: w,
                    height: h,
                    dataType: "json"
                }, function(response) {
					$('body').removeClass('zoMasonry-loading');
                });
            }
        });
    });
});
