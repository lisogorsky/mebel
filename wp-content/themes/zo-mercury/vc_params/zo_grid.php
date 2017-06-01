<?php
	$params = array(
		array(
			"type" => "dropdown",
			"heading" => __("Show category?",'zo-mercury'),
			"param_name" => "post_show_cat",
			"value" => array(
				"No" => "false",
				"Yes" => "true",
				),
			"std" => 'false',
			"template" => array(
                'zo_grid--posts.php'
            )
		),
        array(
            "type" => "textfield",
            "heading" => __("Title",'zo-mercury'),
            "param_name" => "portfolio_title",
            "value" => "",
            "description" => __("Title for Portfolio",'zo-mercury'),
            "group" => __("General", 'zo-mercury'),
            "template" => array(
                'zo_grid--portfolio-filter-left.php'
            )
        ),
        array(
            "type" => "textarea",
            "heading" => __("Sub title",'zo-mercury'),
            "param_name" => "portfolio_sub_title",
            "value" => "",
            "description" => __("Sub Title for Portfolio",'zo-mercury'),
            "group" => __("General", 'zo-mercury'),
            "template" => array(
                'zo_grid--portfolio-filter-left.php'
            )
        ),
		array(
			"type" => "attach_image",
			"heading" => __("Background",'zo-mercury'),
            "param_name" => "portfolio_background",
			"description" => __("Background for Portfolio",'zo-mercury'),
			'dependency' => array(
				"element"=>"zo_cols",
				"value"=>array(
					"2 Columns",
					"6 Columns",
					"4 Columns",
					"3 Columns",
					"1 Column"
					)
				),
            "group" => __("General", 'zo-mercury'),
			"template" => array(
                'zo_grid--portfolio-filter-left.php'
            )
		),
	);
