<?php
	$params = array(
		array(
			"type" => "dropdown",
			"heading" => __("Title Size",'zo-mercury'),
			"param_name" => "zo_title_size",
			"value" => array(
					"H2" => "h2",
					"H3" => "h3",
					"H4" => "h4",
					"H5" => "h5",
					"H6" => "h6"
			)
		),
		array(
			"type" => "colorpicker",
			"heading" => __("Icon - Color",'zo-mercury'),
			"param_name" => "zo_fancybox_icon_color",
			"value" => "transparent",
		),

        array(
			"type" => "colorpicker",
			"heading" => __("Title Color",'zo-mercury'),
			"param_name" => "zo_fancybox_title_color",
			"value" => "",
		),
		array(
			"type" => "colorpicker",
			"heading" => __("Content Color",'zo-mercury'),
			"param_name" => "zo_fancybox_content_color",
			"value" => "",
		),
	);
