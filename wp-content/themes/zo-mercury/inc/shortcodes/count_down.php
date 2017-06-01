<?php
vc_map(array(
	"name" => 'ZO Count Down',
    "base" => "zo_count_down",
    "icon" => "zo_icon_for_vc",
    "category" => __('ZoTheme Shortcodes', 'zo-mercury'),
    "params" => array(
		array(
			"type" => "textfield",
			"heading" => __("Extra Class",'zo-mercury'),
			"param_name" => "class",
			"value" => "",
			"description" => __("",'zo-mercury'),
			"group" => __("Query Settings", 'zo-mercury')
		),
        array(
            "type" => "dropdown",
            "heading" => __("Day",'zo-mercury'),
            "param_name" => "day",
            "value" => array(
                '1' => 1,
                '2' => 2,
                '3' => 3,
                '4' => 4,
                '5' => 5,
                '6' => 6,
                '7' => 7,
                '8' => 8,
                '9' => 9,
                '10' => 10,
                '11' => 11,
                '12' => 12,
                '13' => 13,
                '14' => 14,
                '15' => 15,
                '16' => 16,
                '17' => 17,
                '18' => 18,
                '19' => 19,
                '20' => 20,
                '21' => 21,
                '22' => 22,
                '23' => 23,
                '24' => 24,
                '25' => 25,
                '26' => 26,
                '27' => 27,
                '28' => 28,
                '29' => 29,
                '30' => 30,
                '31' => 31
            ),
            "group" => __("Query Settings", 'zo-mercury')
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Month",'zo-mercury'),
            "param_name" => "month",
            "value" => array(
                '1' => 1,
                '2' => 2,
                '3' => 3,
                '4' => 4,
                '5' => 5,
                '6' => 6,
                '7' => 7,
                '8' => 8,
                '9' => 9,
                '10' => 10,
                '11' => 11,
                '12' => 12
            ),
            "group" => __("Query Settings", 'zo-mercury')
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Year",'zo-mercury'),
            "param_name" => "year",
            "value" => array(
                '2016' => 2016,
                '2017' => 2017,
                '2018' => 2018,
                '2019' => 2019,
                '2020' => 2020,
                '2021' => 2021,
                '2022' => 2022,
                '2023' => 2023,
                '2024' => 2024,
                '2025' => 2025,
            ),
            "group" => __("Query Settings", 'zo-mercury')
        ),
		array(
			"type" => "zo_template",
			"param_name" => "zo_template",
			"shortcode" => "zo_count_down",
			"admin_label" => true,
			"heading" => __("Shortcode Template",'zo-mercury'),
			"group" => __("Query Settings", 'zo-mercury'),
		)
	)
));

class WPBakeryShortCode_zo_count_down extends ZoShortcode{
	protected function content($atts, $content = null){
		$atts_extra = shortcode_atts(array(
			'class' => '',
			'day' => 1,
			'month' => 1,
			'year' => 2017,
			'zo_template' => 'zo_count_down.php'
		), $atts);
		$atts = array_merge($atts_extra,$atts);
		
		/* Load Count Down */
		$atts['html_id'] = zoHtmlID('zo-count-down');
		wp_enqueue_script('countdown', get_template_directory_uri() . '/assets/js/jquery.countdown.min.js', array( 'jquery' ), '2.0.3', true);
		wp_enqueue_script('zo-countdown', get_template_directory_uri() . '/assets/js/zo.countdown.js', array( 'jquery' ), '1.0.0', true);
		
		return parent::content($atts, $content);
	}
}