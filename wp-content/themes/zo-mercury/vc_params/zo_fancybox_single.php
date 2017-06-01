<?php
$params = array(
    array(
        "type" => "dropdown",
        "heading" => __("SVG Icon",'zo-mercury'),
        "param_name" => "zo_fancybox_svg",
        "value" => array(
            "" => "0",
            "Calendar" => "calendar",
            "IN SQ.FT" => "insq",
            "Bedrooms" => "bedrooms",
            "Bathrooms" => "bathrooms",
            "Floors" => "floors",
            "Car Parking" => "parking",
        ),
        "template" => array(
            'zo_fancybox_single--svg.php'
        )
    ),
	array(
		"type" => "dropdown",
		"heading" => __ ( 'Extra Content', 'zo-mercury' ),
		"param_name" => "zo_fancybox_extra_content",
		"value" => array(
			"Yes" => "true",
			"No" => "false"
		),
		"std" => false,
		"template" => array(
			'zo_fancybox_single.php'
		),
	),
	array(
		"type" => "textarea",
		"heading" => __("Content Item",'zo-mercury'),
		"param_name" => "extra_content",
		"template" => array(
			'zo_fancybox_single.php'
		),
	),
);
