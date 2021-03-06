(function ($) {
    "use strict";
    $(document).ready(function(){
        var $menu = $('.nav-menu');
        $menu.find('ul.sub-menu > li').each(function(){
            var $submenu = $(this).find('>ul');
            if($submenu.length == 1){
                $(this).hover(function(){
                    if($submenu.offset().left + $submenu.width() > $(window).width()){
                        $submenu.addClass('back');
                    }else if($submenu.offset().left < 0){
                        $submenu.addClass('back');
                    }
                }, function(){
                    $submenu.removeClass('back');
                });
            }
        });
        /* Menu drop down*/
        $('.nav-menu li.menu-item-has-children').append('<span class="zo-menu-toggle"><i class="fa fa-angle-down"></i></span>');
        $('.zo-menu-toggle').click(function(){
            $(this).prev().toggleClass('submenu-open');
        });
		/* Menu drop down*/
        $('.widget-area .menu .menu-item-has-children,.wpb_widgetised_column .menu .menu-item-has-children').append('<span class="zo-menu-toggle"><i class="fa fa-angle-right"></i></span>');
        $('.widget-area .menu li.menu-item-has-children,.wpb_widgetised_column .menu li.menu-item-has-children').click(function(){
            $(this).find('.zo-menu-toggle').prev().toggleClass('submenu-open');
        });
    });

})(jQuery);
