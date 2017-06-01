<?php

global $zo_mercury_base;
/* get local fonts. */
$local_fonts = is_admin() ? $zo_mercury_base->getListLocalFontsName() : array();
/**
 * Layout
 *
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => esc_html__('Layout', 'zo-mercury'),
    'icon' => 'el el-website',
    'fields' => array(
        array(
            'subtitle' => esc_html__('Controls the site layout.', 'zo-mercury'),
            'id' => 'body_layout',
            'type' => 'button_set',
            'title' => esc_html__('Layout', 'zo-mercury'),
            'default' => 'wide',
            'options' => array(
                'wide' => esc_html__('Wide', 'zo-mercury'),
                'boxed' => esc_html__('Boxed', 'zo-mercury'),
            )
        ),
        array(
            'title' => esc_html__('Site Width', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the overall site width. Enter value including any valid CSS unit, ex: 1200px. (minimun is standard bootstrap width)', 'zo-mercury'),
            'id' => 'body_width',
            'type' => 'slider',
            "default" => 1200,
            "min" => 1170,
            "step" => 10,
            "max" => 1600,
            'display_value' => 'text',
        ),
        array(
            'title' => esc_html__('Wide Left/Right Padding', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the left/right padding for page content when using 100% site width or 100% width page layout. Enter value including any valid CSS unit, ex: 20px.', 'zo-mercury'),
            'id' => 'body_padding',
            'type' => 'slider',
            "default" => 0,
            "min" => 0,
            "step" => 1,
            "max" => 200,
            'display_value' => 'text',
            'required' => array(0 => 'body_layout', 1 => '=', 2 => 'wide')
        ),
        array(
            'id' => 'body_background',
            'type' => 'background',
            'title' => esc_html__('Body Background', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the background of the body. (It is also display in the outer background area in boxed mode.)', 'zo-mercury'),
        ),
        array(
            'id' => 'body_boxed_background',
            'type' => 'background',
            'title' => esc_html__('Boxed Content Background', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the background of the outer background area in boxed mode.', 'zo-mercury'),
        ),
        array(
            'title' => esc_html__('Main Sidebar Width', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the width of the sidebar when only one sidebar is present. It is standard Bootstrap column, ex: 3 columns.', 'zo-mercury'),
            'id' => 'body_sidebar_size',
            'type' => 'slider',
            "default" => 3,
            "min" => 3,
            "step" => 1,
            "max" => 6,
            'display_value' => 'label'
        ),
        array(
            'subtitle' => esc_html__('Enable page loadding.', 'zo-mercury'),
            'id' => 'enable_page_loadding',
            'type' => 'switch',
            'title' => esc_html__('Enable Page Loadding', 'zo-mercury'),
            'default' => false,
        ),
        array(
            'subtitle' => esc_html__('Select Style Page Loadding.', 'zo-mercury'),
            'id' => 'page_loadding_style',
            'type' => 'select',
            'options' => array(
                '1' => 'Style 1',
                '2' => 'Style 2'
            ),
            'title' => esc_html__('Page Loadding Style', 'zo-mercury'),
            'default' => 'style-1',
            'required' => array(0 => 'enable_page_loadding', 1 => '=', 2 => 1)
        )
    )
);


/**
 * Colors
 *
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => esc_html__('Colors', 'zo-mercury'),
    'icon' => 'el el-brush',
    'fields' => array(
        array(
            'subtitle' => esc_html__('Controls the main highlight color throughout the theme.', 'zo-mercury'),
            'id' => 'primary_color',
            'type' => 'color',
            'transparent' => false,
            'title' => esc_html__('Primary Color', 'zo-mercury'),
            'default' => '#81d742'
        ),
        array(
            'subtitle' => esc_html__('Controls the secondary highlight color throughout the theme.', 'zo-mercury'),
            'id' => 'secondary_color',
            'type' => 'color',
            'title' => esc_html__('Secondary Color', 'zo-mercury'),
            'default' => '#b4bac6',
            'transparent' => false,
        ),
        array(
            'subtitle' => esc_html__('Controls the color of all text links.', 'zo-mercury'),
            'id' => 'link_color',
            'type' => 'link_color',
            'title' => esc_html__('Link Color', 'zo-mercury'),
            'output' => array('a'),
            'default' => array(
                'regular' => '#404d66',
                'hover' => '#81d742',
                'active' => '#81d742',
            )
        ),
    )
);

/**
 * Header Options
 *
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => esc_html__('Header', 'zo-mercury'),
    'icon' => 'el-icon-credit-card',
    'fields' => array(
        array(
            'id' => 'header_layout',
            'title' => esc_html__('Header Layouts', 'zo-mercury'),
            'subtitle' => esc_html__('Select a layout for header', 'zo-mercury'),
            'default' => '',
            'type' => 'image_select',
            'options' => array(
                '' => get_template_directory_uri() . '/assets/images/header-0.png',
                '1' => get_template_directory_uri() . '/assets/images/header-1.png',
            )
        ),
        array(
            'subtitle' => esc_html__('Turn on to have the header transparent', 'zo-mercury'),
            'id' => 'header_transparent',
            'type' => 'switch',
            'title' => esc_html__('Header Transparent', 'zo-mercury'),
            'default' => true,
        ),
        array(
            'subtitle' => esc_html__('Turn on to have the header area display at 100% width according to the window size. Turn off to follow site width.', 'zo-mercury'),
            'id' => 'wide_boxed_header',
            'type' => 'switch',
            'title' => esc_html__('100% Header Width', 'zo-mercury'),
            'default' => true,
        ),
        array(
            'subtitle' => esc_html__('Controls the background color and opacity for the header.', 'zo-mercury'),
            'id' => 'bg_header_color',
            'type' => 'color_rgba',
            'title' => esc_html__('Header Background Color', 'zo-mercury'),
            'default' => array(
                'color' => 'transparent',
                'alpha' => 1
            ),
        ),
        array(
            'subtitle' => esc_html__('Select an image for the header background. If left empty, the header background color will be used.', 'zo-mercury'),
            'id' => 'bg_header',
            'type' => 'background',
            'title' => esc_html__('Header Background Image', 'zo-mercury'),
            'background-color' => false,
        ),
        array(
            'id' => 'header_padding',
            'title' => esc_html__('Header Padding Large Screen', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the top/right/bottom/left padding for the header. For large screen (> 1500px) ex: 0px, 0px, 0px, 0px.', 'zo-mercury'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'default' => array(
                'padding-top' => '40px',
                'padding-right' => '100px',
                'padding-bottom' => '0',
                'padding-left' => '100px',
                'units' => 'px',
            )
        ),
        array(
            'id' => 'header_padding_md',
            'title' => esc_html__('Header Padding Medium Screen', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the top/right/bottom/left padding for the header. For medium screen ( > 992px & < 1500px) ex: 0px, 0px, 0px, 0px.', 'zo-mercury'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'default' => array(
                'padding-top' => '20px',
                'padding-right' => '15px',
                'padding-bottom' => '0',
                'padding-left' => '15px',
                'units' => 'px',
            )
        ),
    )
);
/* Header Top */
$this->sections[] = array(
    'title' => esc_html__('Header Top', 'zo-mercury'),
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'info_header_top',
            'type' => 'info',
            'style' => 'success',
            'title' => esc_html__('Header Top Settings', 'zo-mercury'),
            'icon' => 'el-icon-info-sign',
            'desc' => esc_html__('This is a setting for Header Top you have enabled from Header layout or Page Header layout!', 'zo-mercury'),
        ),
        array(
            'title' => esc_html__('Header Top Height', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the min height of the header top', 'zo-mercury'),
            'id' => 'header_top_height',
            'type' => 'slider',
            "default" => 45,
            "min" => 30,
            "step" => 1,
            "max" => 300,
            'display_value' => 'label'
        ),
        array(
            'subtitle' => esc_html__('Set background color header top.', 'zo-mercury'),
            'id' => 'bg_header_top_color',
            'type' => 'background',
            'title' => esc_html__('Header Top Background', 'zo-mercury'),
            'default' => array(
                'background-color' => '#404d66',
            ),
        ),
        array(
            'subtitle' => esc_html__('Set color header top.', 'zo-mercury'),
            'id' => 'header_top_color',
            'type' => 'color',
            'output' => array('#zo-header-top','#zo-header-top a'),
            'title' => esc_html__('Header Top Color', 'zo-mercury'),
            'default' => '#b4bac6',
        ),
        array(
            'id' => 'header_top_left',
            'type' => 'select',
            'title' => esc_html__('Header Content Left', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the content that displays in the top left section.', 'zo-mercury'),
            'default' => '1',
            'options' => array(
                '1' => 'Contact Info',
                '2' => 'Social Links',
                '3' => 'Navigation Top',
                '4' => 'Header Top Sidebar 1',
                '5' => 'Header Top Sidebar 2',
            ),
        ),
        array(
            'title' => esc_html__('Content Left Alignment', 'zo-mercury'),
            'subtitle' => 'Controls the header content left alignment.',
            'id' => 'content_left_alignment',
            'default' => 'left',
            'type' => 'button_set',
            'options' => array(
                'left' => esc_html__('Left', 'zo-mercury'),
                'center' => esc_html__('Center', 'zo-mercury'),
                'right' => esc_html__('Right', 'zo-mercury'),
            ),
        ),
        array(
            'id' => 'header_top_right',
            'type' => 'select',
            'title' => esc_html__('Header Content Right', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the content that displays in the top right section.', 'zo-mercury'),
            'options' => array(
                '1' => 'Contact Info',
                '2' => 'Social Links',
                '3' => 'Navigation Top',
                '4' => 'Header Top Sidebar 1',
                '5' => 'Header Top Sidebar 2',
            ),
            'default' => '2',
        ),
        array(
            'title' => esc_html__('Content Right Alignment', 'zo-mercury'),
            'subtitle' => 'Controls the header content right alignment.',
            'id' => 'content_right_alignment',
            'default' => 'right',
            'type' => 'button_set',
            'options' => array(
                'left' => esc_html__('Left', 'zo-mercury'),
                'center' => esc_html__('Center', 'zo-mercury'),
                'right' => esc_html__('Right', 'zo-mercury'),
            ),
        ),
        array(
            'title' => esc_html__('Phone Number For Contact Info', 'zo-mercury'),
            'id' => 'contact_phone',
            'type' => 'text',
            'default' => '+1-202-555-0117',
            'subtitle' => esc_html__('This content will display if you have "Contact Info" selected for the Header Content Left or Right option above.', 'zo-mercury'),
        ),
        array(
            'title' => esc_html__('Email Address For Contact Info', 'zo-mercury'),
            'id' => 'contact_email',
            'type' => 'text',
            'default' => 'info@zotheme.com',
            'subtitle' => esc_html__('This content will display if you have "Contact Info" selected for the Header Content Left or Right option above.', 'zo-mercury'),
        ),
		array(
            'title' => esc_html__('Description For Contact Info', 'zo-mercury'),
            'id' => 'contact_description',
            'type' => 'text',
            'default' => 'Welcome to Mercury, A repsonsive Single Property Theme',
            'subtitle' => esc_html__('This content will display if you have "Contact Info" selected for the Header Content Left or Right option above.', 'zo-mercury'),
        ),
    )
);
/* Logo */
$this->sections[] = array(
    'title' => esc_html__('Logo', 'zo-mercury'),
    'subsection' => true,
    'fields' => array(
        array(
            'title' => esc_html__('Logo Position', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the logo position. "Center" only works on Header 4', 'zo-mercury'),
            'id' => 'logo_position',
            'default' => 'left',
            'type' => 'button_set',
            'options' => array(
                'left' => esc_html__('Left', 'zo-mercury'),
                'right' => esc_html__('Right', 'zo-mercury'),
            )
        ),
        array(
            'title' => esc_html__('Select Logo', 'zo-mercury'),
            'subtitle' => esc_html__('Select an image file for your logo.', 'zo-mercury'),
            'id' => 'main_logo',
            'type' => 'media',
            'url' => true,
            'default' => array(
                'url' => get_template_directory_uri() . '/assets/images/logo.png'
            )
        ),
        array(
            'title' => esc_html__('Logo Max Height', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the max hegith of the logo, width of the logo is auto', 'zo-mercury'),
            'id' => 'logo_height',
            'type' => 'slider',
            "default" => 50,
            "min" => 30,
            "step" => 1,
            "max" => 300,
            'display_value' => 'label'
        ),
        array(
            'id' => 'logo_margin',
            'title' => esc_html__('Logo Margin Header Layout 1', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the top/right/bottom/left margins for the logo. Enter values including any valid CSS unit, ex: 25px, 50px, 25px, 0px..', 'zo-mercury'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'default' => array(
                'margin-top' => '0',
                'margin-right' => '50px',
                'margin-bottom' => '0',
                'margin-left' => '0',
                'units' => 'px',
            )
        ),
        array(
            'id' => 'logo_margin_2',
            'title' => esc_html__('Logo Margin Header Layout 2', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the top/right/bottom/left margins for the logo. Enter values including any valid CSS unit, ex: 25px, 50px, 25px, 0px..', 'zo-mercury'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'default' => array(
                'margin-top' => '40px',
                'margin-right' => '0',
                'margin-bottom' => '0',
                'margin-left' => '0',
                'units' => 'px',
            )
        ),
    )
);
/* Menu */
$this->sections[] = array(
    'title' => esc_html__('Menu', 'zo-mercury'),
    'subsection' => true,
    'fields' => array(
        array(
            'title' => esc_html__('Menu Alignment', 'zo-mercury'),
            'subtitle' => 'Controls the menu alignment.',
            'id' => 'menu_alignment',
            'default' => 'right',
            'type' => 'button_set',
            'options' => array(
                'left' => esc_html__('Left', 'zo-mercury'),
                'right' => esc_html__('Right', 'zo-mercury'),
            ),
        ),
        array(
            'title' => esc_html__('Menu Height', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the menu height.', 'zo-mercury'),
            'id' => 'nav_height',
            'type' => 'slider',
            "default" => 70,
            "min" => 30,
            "step" => 1,
            "max" => 300,
            'display_value' => 'label'
        ),
        array(
            'title' => esc_html__('Menu Height 2', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the menu height 2.', 'zo-mercury'),
            'id' => 'nav_height_2',
            'type' => 'slider',
            "default" => 130,
            "min" => 30,
            "step" => 1,
            "max" => 300,
            'display_value' => 'label'
        ),
        array(
            'title' => esc_html__('Menu Item Padding (Screen > 1200px)', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the right padding for menu text (left on RTL). In pixels.', 'zo-mercury'),
            'id' => 'nav_padding',
            'type' => 'slider',
            "default" => 25,
            "min" => 1,
            "step" => 1,
            "max" => 100,
            'display_value' => 'label'
        ),
        array(
            'title' => esc_html__('Menu Item Padding (992px < Screen < 1200px)', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the right padding for menu text (left on RTL). In pixels.', 'zo-mercury'),
            'id' => 'nav_padding_md',
            'type' => 'slider',
            "default" => 10,
            "min" => 1,
            "step" => 1,
            "max" => 100,
            'display_value' => 'label'
        ),
        array(
            'subtitle' => esc_html__('Turn on to display arrow indicators next to parent level menu items.', 'zo-mercury'),
            'id' => 'nav_indicator',
            'type' => 'switch',
            'title' => esc_html__('Menu Dropdown Indicator', 'zo-mercury'),
            'default' => false,
        ),
        array(
            'id' => 'nav_typography_first_level',
            'type' => 'typography',
            'title' => esc_html__('Menu Typography - First Level', 'zo-mercury'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => false,
            'color' => false,
            'font-style' => true,
            'letter-spacing' => true,
            'font-weight' => true,
            'font-family' => true,
            'line-height' => false,
            'text-align' => false,
            'output' => array('#zo-header .zo-header-navigation .nav-menu > li > a '),
            'units' => 'px',
            'text-transform' => true,
            'default' => array(
                'font-size' => '14px',
                'letter-spacing' => '0px',
                'text-transform' => 'uppercase',
                'font-family' => 'Montserrat',
                'font-weight' => '400',
            )
        ),
        array(
            'subtitle' => esc_html__('Controls the text color of first level menu items.', 'zo-mercury'),
            'id' => 'menu_color_first_level',
            'type' => 'link_color',
            'title' => esc_html__('Menu Color - First Level', 'zo-mercury'),
            'default' => array(
                'regular' => '#ffffff',
                'hover' => '#75b62e',
                'active' => '#75b62e',
            )
        ),
        array(
            'id' => 'nav_typography_sub_level',
            'type' => 'typography',
            'title' => esc_html__('Menu Typography - Sub Level', 'zo-mercury'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => false,
            'color' => false,
            'font-style' => true,
            'letter-spacing' => true,
            'font-weight' => true,
            'font-family' => true,
            'line-height' => false,
            'text-align' => false,
            'text-transform' => true,
            'output' => array('.nav-menu > li ul a ', '.nav-menu > ul > li ul a '),
            'units' => 'px',
            'default' => array(
                'font-size' => '14px',
                'letter-spacing' => '0px',
                'text-transform' => 'capitalize',
                'font-family' => 'Montserrat',
                'font-weight' => '400',
            )
        ),
        array(
            'subtitle' => esc_html__('Controls the text color of sub level menu items.', 'zo-mercury'),
            'id' => 'menu_color_sub_level',
            'title' => esc_html__('Menu Color - Sub Level', 'zo-mercury'),
            'type' => 'link_color',
            'default' => array(
                'regular' => '#404D66',
                'hover' => '#75b62e',
                'active' => '#75b62e',
            )
        ),
        array(
            'subtitle' => esc_html__('Enable mega menu.', 'zo-mercury'),
            'id' => 'menu_mega',
            'type' => 'switch',
            'title' => esc_html__('Mega Menu', 'zo-mercury'),
            'default' => true,
        ),
    )
);

/* Phone Menu */
$this->sections[] = array(
    'title' => __('Phone Menu', 'zo-mercury'),
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'pmenu_fsize_flevel',
            'type' => 'typography',
            'title' => esc_html__('Font - First Level', 'zo-mercury'),
            'google' => false,
            'font-backup' => false,
            'all_styles' => false,
            'color' => false,
            'text-align' => false,
			'letter-spacing' => true,
			'text-transform' => true,
            'units' => 'px',
            'default' => array(
				'font-family' => 'Montserrat',
				'font-weight' => 400,
                'font-size' => '14px',
				'line-height' => '40px'
            )
        ),
		array(
            'subtitle' => __('Controls the text color of first level menu items.', 'zo-mercury'),
            'id' => 'pmenu_color_first_level',
            'type' => 'color',
            'title' => __('Font Color - First Level', 'zo-mercury'),
            'default' => '#fff'
        ),
        array(
            'subtitle' => __('Controls the text hover color of first level menu items.', 'zo-mercury'),
            'id' => 'pmenu_color_hover_first_level',
            'type' => 'color',
            'title' => __('Font Color Hover - First Level', 'zo-mercury'),
            'default' => '#75b62e'
        ),
        array(
            'id' => 'pmenu_bg_color',
            'type' => 'color_rgba',
            'title' => __('Background', 'zo-mercury'),
            'default' => array(
				'color' => '#444'
			),
        ),
		array(
            'id' => 'pmenu_border_top',
            'type' => 'border',
            'title' => __('Border Top', 'zo-mercury'),
            'subtitle' => __('Set style for border top.', 'zo-mercury'),
			'default' => array(
				'border-top' => '0',
				'border-right' => '0',
				'border-bottom' => '0',
				'border-left' => '0',
				'border-style' => 'solid',
				'border-color' => 'transparent'
			)
        ),
		array(
            'id' => 'pmenu_border_bottom',
            'type' => 'border',
            'title' => __('Border Bottom', 'zo-mercury'),
            'subtitle' => __('Set style for border bottom.', 'zo-mercury'),
			'default' => array(
				'border-top' => '0',
				'border-right' => '0',
				'border-bottom' => '0',
				'border-left' => '0',
				'border-style' => 'solid',
				'border-color' => 'transparent'
			)
        ),
        array(
            'id' => 'pmenu_padding_flevel',
            'title' => __('Padding', 'zo-mercury'),
            'subtitle' => __('Padding phone menu wrapper.', 'zo-mercury'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'default' => array(
                'padding-top'     => '0',
                'padding-right'   => '0',
                'padding-bottom'  => '0',
                'padding-left'    => '0',
                'units'          => 'px',
            )
        ),
		array(
            'id' => 'pmenu_fsize_slevel',
            'type' => 'typography',
            'title' => esc_html__('Font - Sub Level', 'zo-mercury'),
            'google' => false,
            'font-backup' => false,
            'all_styles' => false,
            'color' => false,
            'text-align' => false,
			'letter-spacing' => true,
			'text-transform' => true,
            'units' => 'px',
            'default' => array(
				'font-family' => 'Montserrat',
				'font-weight' => 400,
                'font-size' => '13px',
				'line-height' => '30px'
            )
        ),
        array(
            'subtitle' => __('Controls the text color of sub level menu items.', 'zo-mercury'),
            'id' => 'pmenu_color_sub_level',
            'type' => 'color',
            'title' => __('Font Color - Sub Level', 'zo-mercury'),
            'default' => '#acacac'
        ),
        array(
            'subtitle' => __('Controls the text hover color of sub level menu items.', 'zo-mercury'),
            'id' => 'pmenu_color_hover_sub_level',
            'type' => 'color',
            'title' => __('Font Color Hover - Sub Level', 'zo-mercury'),
            'default' => '#75b62e'
        ),
        array(
            'id' => 'pmenu_padding_slevel',
            'title' => __('Padding', 'zo-mercury'),
            'subtitle' => __('Padding sub level.', 'zo-mercury'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'default' => array(
                'padding-top'     => '0',
                'padding-right'   => '15px;',
                'padding-bottom'  => '0',
                'padding-left'    => '15px',
                'units'          => 'px',
            )
        ),
	)
);

/* Header Sticky */
$this->sections[] = array(
    'title' => esc_html__('Sticky Header', 'zo-mercury'),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => esc_html__('Turn on to enable a sticky header.', 'zo-mercury'),
            'id' => 'menu_sticky',
            'type' => 'switch',
            'title' => esc_html__('Enable Sticky Header', 'zo-mercury'),
            'default' => false,
        ),
        array(
            'subtitle' => esc_html__('Enable sticky mode for menu Tablets.', 'zo-mercury'),
            'id' => 'menu_sticky_tablets',
            'type' => 'switch',
            'title' => esc_html__('Sticky Tablets', 'zo-mercury'),
            'default' => false,
            'required' => array(0 => 'menu_sticky', 1 => '=', 2 => 1)
        ),
        array(
            'subtitle' => esc_html__('Enable sticky mode for menu Mobile.', 'zo-mercury'),
            'id' => 'menu_sticky_mobile',
            'type' => 'switch',
            'title' => esc_html__('Sticky Mobile', 'zo-mercury'),
            'default' => false,
            'required' => array(0 => 'menu_sticky', 1 => '=', 2 => 1)
        ),
        array(
            'subtitle' => esc_html__('Controls the background color and opacity for the sticky header.', 'zo-mercury'),
            'id' => 'sticky_header_bg_color',
            'type' => 'color_rgba',
            'title' => esc_html__('Sticky Header Background Color', 'zo-mercury'),
            'default' => array(
                'color' => '#FFFFFF',
                'alpha' => 1,
                'rgab' => 'rgba(255,255,255,1)'
            ),
            'required' => array(0 => 'menu_sticky', 1 => '=', 2 => 1)
        ),
        array(
            'subtitle' => esc_html__('Select an image for the sticky header background. If left empty, the sticky header background color will be used.', 'zo-mercury'),
            'id' => 'sticky_header_bg_image',
            'type' => 'background',
            'title' => esc_html__('Sticky Header Background Image', 'zo-mercury'),
            'background-color' => 'false',
            'required' => array(0 => 'menu_sticky', 1 => '=', 2 => 1)
        ),
        array(
            'id' => 'sticky_header_padding',
            'title' => esc_html__('Sticky Header Padding Large Screen', 'zo-mercury'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('body .header-fixed #zo-header-top a'),
            'default' => array(
                'padding-top' => '0',
                'padding-right' => '100px',
                'padding-bottom' => '0',
                'padding-left' => '100px',
                'units' => 'px',
            ),
            'required' => array(0 => 'menu_sticky', 1 => '=', 2 => 1)
        ),
        array(
            'id' => 'sticky_header_padding_md',
            'title' => esc_html__('Sticky Header Padding Medium Screen', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the top/right/bottom/left padding for the header. For medium screen ( > 992px & < 1500px) ex: 0px, 0px, 0px, 0px.', 'zo-mercury'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'default' => array(
                'padding-top' => '0',
                'padding-right' => '15px',
                'padding-bottom' => '0',
                'padding-left' => '15px',
                'units' => 'px',
            ),
            'required' => array(0 => 'menu_sticky', 1 => '=', 2 => 1)
        ),
        array(
            'title' => esc_html__('Select Sticky Logo', 'zo-mercury'),
            'subtitle' => esc_html__('Select an image file for your sticky header logo.', 'zo-mercury'),
            'id' => 'sticky_logo',
            'type' => 'media',
            'url' => true,
            'default' => array(
                'url' => get_template_directory_uri() . '/assets/images/mercury-logo.png'
            ),
            'required' => array(0 => 'menu_sticky', 1 => '=', 2 => 1)
        ),
        array(
            'title' => esc_html__('Sticky Logo Max Height', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the max hegith of the logo, width of the logo is auto', 'zo-mercury'),
            'id' => 'sticky_logo_height',
            'type' => 'slider',
            "default" => 50,
            "min" => 30,
            "step" => 1,
            "max" => 300,
            'display_value' => 'label',
            'required' => array(0 => 'menu_sticky', 1 => '=', 2 => 1)
        ),
        array(
            'id' => 'sticky_logo_margin',
            'title' => esc_html__('Sticky Logo Margin', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the top/right/bottom/left margins for the logo. Enter values including any valid CSS unit, ex: 25px, 50px, 25px, 0px..', 'zo-mercury'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'default' => array(
                'margin-top' => '12px',
                'margin-right' => '50px',
                'margin-bottom' => '0',
                'margin-left' => '0',
                'units' => 'px',
            ),
            'required' => array(0 => 'menu_sticky', 1 => '=', 2 => 1)
        ),
        array(
            'title' => esc_html__('Sticky Menu Height', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the menu height.', 'zo-mercury'),
            'id' => 'sticky_nav_height',
            'type' => 'slider',
            "default" => 70,
            "min" => 30,
            "step" => 1,
            "max" => 300,
            'display_value' => 'label',
            'required' => array(0 => 'menu_sticky', 1 => '=', 2 => 1)
        ),
        array(
            'title' => esc_html__('Sticky Menu Item Padding', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the right padding for menu text (left on RTL). In pixels.', 'zo-mercury'),
            'id' => 'sticky_nav_padding',
            'type' => 'slider',
            "default" => 25,
            "min" => 10,
            "step" => 1,
            "max" => 200,
            'display_value' => 'label',
            'required' => array(0 => 'menu_sticky', 1 => '=', 2 => 1)
        ),
        array(
            'id' => 'sticky_nav_typography_first_level',
            'type' => 'typography',
            'title' => esc_html__('Sticky Menu Typography - First Level', 'zo-mercury'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => false,
            'color' => false,
            'font-style' => true,
            'letter-spacing' => true,
            'font-weight' => true,
            'font-family' => true,
            'line-height' => false,
            'text-align' => false,
            'output' => array('.header-fixed .menu-main-menu-container > ul > li > a '),
            'units' => 'px',
            'text-transform' => true,
            'default' => array(
                'font-size' => '14px',
                'letter-spacing' => '0px',
                'text-transform' => 'uppercase',
				'font-family' => 'Montserrat',
                'font-weight' => '400',
            ),
            'required' => array(0 => 'menu_sticky', 1 => '=', 2 => 1)
        ),
        array(
            'subtitle' => esc_html__('Controls the text color of first level menu items.', 'zo-mercury'),
            'id' => 'sticky_menu_color_first_level',
            'type' => 'color',
            'title' => esc_html__('Sticky Menu Color - First Level', 'zo-mercury'),
            'default' => '#404d66',
            'required' => array(0 => 'menu_sticky', 1 => '=', 2 => 1)
        ),
        array(
            'subtitle' => esc_html__('Controls the text hover color of first level menu items.', 'zo-mercury'),
            'id' => 'sticky_menu_color_hover_first_level',
            'type' => 'color',
            'title' => esc_html__('Sticky Menu Color Hover - First Level', 'zo-mercury'),
            'default' => '#81d742',
            'required' => array(0 => 'menu_sticky', 1 => '=', 2 => 1)
        ),
        array(
            'subtitle' => esc_html__('Controls the text hover color of first level menu items.', 'zo-mercury'),
            'id' => 'sticky_menu_color_active_first_level',
            'type' => 'color',
            'title' => esc_html__('Sticky Menu Color Active - First Level', 'zo-mercury'),
            'default' => '#81d742',
            'required' => array(0 => 'menu_sticky', 1 => '=', 2 => 1)
        ),
        array(
            'id' => 'sticky_nav_typography_sub_level',
            'type' => 'typography',
            'title' => esc_html__('Sticky Menu Typography - Sub Level', 'zo-mercury'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => false,
            'color' => false,
            'font-style' => true,
            'letter-spacing' => true,
            'font-weight' => true,
            'font-family' => true,
            'line-height' => false,
            'text-align' => false,
            'text-transform' => true,
            'output' => array('.header-fixed .menu-main-menu-container > li ul a '),
            'units' => 'px',
            'default' => array(
                'font-size' => '14px',
                'letter-spacing' => '0px',
                'text-transform' => 'initial',
				'font-family' => 'Montserrat',
                'font-weight' => '400',
            ),
            'required' => array(0 => 'menu_sticky', 1 => '=', 2 => 1)
        ),
        array(
            'subtitle' => esc_html__('Controls the text color of sub level menu items.', 'zo-mercury'),
            'id' => 'sticky_menu_color_sub_level',
            'type' => 'color',
            'title' => esc_html__('Sticky Menu Color - Sub Level', 'zo-mercury'),
            'default' => '#404d66',
            'required' => array(0 => 'menu_sticky', 1 => '=', 2 => 1)
        ),
        array(
            'subtitle' => esc_html__('Controls the text hover color of sub level menu items.', 'zo-mercury'),
            'id' => 'sticky_menu_color_hover_sub_level',
            'type' => 'color',
            'title' => esc_html__('Sticky Menu Color Hover - Sub Level', 'zo-mercury'),
            'default' => '#81d742',
            'required' => array(0 => 'menu_sticky', 1 => '=', 2 => 1)
        ),
    )
);


/**
 * Page Title
 *
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => esc_html__('Page Title & BC', 'zo-mercury'),
    'icon' => 'el-icon-map-marker',
    'fields' => array(
        array(
            'subtitle' => esc_html__('Turn on to have the page title area display.', 'zo-mercury'),
            'id' => 'page_title',
            'type' => 'switch',
            'title' => esc_html__('Page Title Show', 'zo-mercury'),
            'default' => true,
        ),
        array(
            'subtitle' => esc_html__('Turn on to have the page title area display at 100% width according to the window size. Turn off to follow site width.', 'zo-mercury'),
            'id' => 'pt_width',
            'type' => 'switch',
            'title' => esc_html__('100% Page Title Width', 'zo-mercury'),
            'default' => false,
        ),
        array(
            'title' => esc_html__('Page Title Height', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the height of the page title bar on desktop. Enter value including any valid CSS unit, ex: 100px.', 'zo-mercury'),
            'id' => 'pt_height',
            'type' => 'slider',
            "default" => 500,
            "min" => 1,
            "step" => 1,
            "max" => 800,
            'display_value' => 'label'
        ),
        array(
            'title' => esc_html__('Page Title Mobile Height', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the height of the page title bar on mobile. Enter value including any valid CSS unit, ex: 70px.', 'zo-mercury'),
            'id' => 'pt_mobile_height',
            'type' => 'slider',
            "default" => 400,
            "min" => 1,
            "step" => 1,
            "max" => 500,
            'display_value' => 'label'
        ),
        array(
            'id' => 'pt_background',
            'type' => 'background',
            'title' => esc_html__('Page Title Background', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the background of the page title.', 'zo-mercury'),
            'default' => array(
                'background-color' => '#01212e',
                'background-image' => get_template_directory_uri() . '/assets/images/mercury-page-title.jpg',
                'background-repeat' => '',
                'background-size' => '',
                'background-attachment' => '',
                'background-position' => ''
            )
        ),
        array(
            'subtitle' => esc_html__('Controls the border colors top/bottom of the page title.', 'zo-mercury'),
            'id' => 'pt_border_color',
            'type' => 'color',
            'title' => esc_html__('Page Title Borders Color', 'zo-mercury'),
            'default' => '#CDCDCD',
        ),
        array(
            'title' => esc_html__('Page Title Borders Width Top', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the width of the page title border top, ex: 2px.', 'zo-mercury'),
            'id' => 'pt_border_width_top',
            'type' => 'slider',
            "default" => 0,
            "min" => 0,
            "step" => 1,
            "max" => 50,
            'display_value' => 'label'
        ),
        array(
            'title' => esc_html__('Page Title Borders Width Bottom', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the width of the page title border bottom, ex: 2px.', 'zo-mercury'),
            'id' => 'pt_border_width_bottom',
            'type' => 'slider',
            "default" => 0,
            "min" => 0,
            "step" => 1,
            "max" => 50,
            'display_value' => 'label'
        ),
        array(
            'id' => 'pt_margin',
            'title' => esc_html__('Page Title Margin', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the top/right/bottom/left margins for the Page Title. Enter values including any valid CSS unit, ex: 0px, 0px, 80px, 0px.', 'zo-mercury'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'default' => array(
                'margin-top' => '0',
                'margin-right' => '0',
                'margin-bottom' => '80px',
                'margin-left' => '0',
                'units' => 'px',
            )
        ),
        array(
            'id' => 'pt_parallax',
            'title' => esc_html__('Enable Header Parallax', 'zo-mercury'),
            'type' => 'switch',
            'default' => false
        ),
    )
);
/* Page Title */
$this->sections[] = array(
    'title' => esc_html__('Page Title Text', 'zo-mercury'),
    'subsection' => true,
    'fields' => array(
        array(
            'title' => esc_html__('Page Title Text Alignment', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the page title bar text alignment.', 'zo-mercury'),
            'id' => 'pt_alignment',
            'default' => 'center',
            'type' => 'button_set',
            'options' => array(
                'left' => esc_html__('Left', 'zo-mercury'),
                'center' => esc_html__('Center', 'zo-mercury'),
                'right' => esc_html__('Right', 'zo-mercury'),
            )
        ),
        array(
            'title' => esc_html__('Page Title Vertical Alignment', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the page title bar text alignment.', 'zo-mercury'),
            'id' => 'pt_vertical_alignment',
            'default' => 'middle',
            'type' => 'button_set',
            'options' => array(
                'middle' => esc_html__('Middle', 'zo-mercury'),
                'custom' => esc_html__('Custom Padding', 'zo-mercury'),
            )
        ),
        array(
            'id' => 'pt_text_padding',
            'title' => esc_html__('Page Title Text Padding', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the top/bottom padding for the Page Title Text. Enter values including any valid CSS unit, ex: 0px, 80px', 'zo-mercury'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'default' => array(
                'padding-top' => '120px',
                'padding-right' => '0px',
                'padding-bottom' => '150px',
                'padding-left' => '0px',
                'units' => 'px',
            ),
            'required' => array(0 => 'pt_vertical_alignment', 1 => '=', 2 => 'custom')
        ),
        array(
            'id' => 'pg_typography',
            'type' => 'typography',
            'title' => esc_html__('Page Title Typography', 'zo-mercury'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'text-transform' => false,
            'text-align' => false,
            'output' => array('#zo-page-element-wrap .zo-page-title-text h1'),
            'units' => 'px',
            'subtitle' => esc_html__('Typography option with title text.', 'zo-mercury'),
            'default' => array(
                'font-weight' => '700',
                'font-family' => 'Montserrat',
                'font-backup' => 'Arial, Helvetica, sans-serif',
                'font-size' => '48px',
                'line-height' => '36px',
                'color' => '#fff'
            )
        ),
        array(
            'id' => 'pt_sub',
            'title' => 'Sub Title',
            'subtitle' => esc_html__('Enter the sub title you want displays in the bottom of Page Title.', 'zo-mercury'),
            'type' => 'text',
            'default' => ''
        ),
        array(
            'id' => 'pg_sub_typography',
            'type' => 'typography',
            'title' => esc_html__('Sub Title Typography', 'zo-mercury'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'text-transform' => true,
            'text-align' => false,
            'units' => 'px',
            'subtitle' => esc_html__('Typography option with sub title.', 'zo-mercury'),
            'default' => array(
                'font-weight' => '400',
                'font-family' => 'Roboto',
                'font-backup' => 'Arial, Helvetica, sans-serif',
                'font-size' => '22px',
                'line-height' => '24px'
            )
        ),
    )
);
/* Breadcrumb */
$this->sections[] = array(
    'title' => esc_html__('Breadcrumb', 'zo-mercury'),
    'subsection' => true,
    'fields' => array(
        array(
            'title' => esc_html__('Breadcrumbs Content Display', 'zo-mercury'),
            'subtitle' => esc_html__('Controls what displays in the breadcrumbs area.(Page Title Sidebar config from Widget)', 'zo-mercury'),
            'id' => 'pt_breadcrumb',
            'default' => 'breadcrumb',
            'type' => 'button_set',
            'options' => array(
                'none' => esc_html__('None', 'zo-mercury'),
                'breadcrumb' => esc_html__('Breadcrumbs', 'zo-mercury'),
                'sidebar' => esc_html__('Page Title Sidebar', 'zo-mercury'),
            )
        ),
        array(
            'title' => esc_html__('Breadcrumbs Position', 'zo-mercury'),
            'subtitle' => esc_html__('Controls where to displays in the Page Title area. (Symmetric is not avalaible when Page Title Alignment center)', 'zo-mercury'),
            'id' => 'pt_breadcrumb_position',
            'default' => 'bellow',
            'type' => 'button_set',
            'options' => array(
                'bellow' => esc_html__('Bellow', 'zo-mercury'),
                'above' => esc_html__('Above', 'zo-mercury'),
                'symmetric' => esc_html__('Symmetric', 'zo-mercury'),
            ),
            'required' => array(0 => 'pt_breadcrumb', 1 => '!=', 2 => 'none')
        ),
        array(
            'subtitle' => esc_html__('Controls the text before the breadcrumb menu.', 'zo-mercury'),
            'id' => 'breacrumb_prefix',
            'type' => 'text',
            'title' => esc_html__('Breadcrumbs Prefix', 'zo-mercury'),
            'default' => 'Home',
            'required' => array(0 => 'pt_breadcrumb', 1 => '=', 2 => 'breadcrumb')
        ),
        array(
            'id' => 'breacrumb_typography',
            'type' => 'typography',
            'title' => esc_html__('Breadcrumb Typography', 'zo-mercury'),
            'google' => true,
            'font-backup' => true,
			'font-style' => true,
            'all_styles' => true,
            'text-align' => false,
            'text-transform' => true,
            'units' => 'px',
            'subtitle' => esc_html__('Controls the Typography for the breadcrumbs text.', 'zo-mercury'),
            'default' => array(
                'color' => '#FFF',
                'font-backup' => 'Arial, Helvetica, sans-serif',
                'font-size' => '16px',
                'line-height' => '36px',
				'font-family' => 'Merriweather',
				'font-weight' => '400',
				'font-style' => 'italic'
            ),
            'required' => array(0 => 'pt_breadcrumb', 1 => '=', 2 => 'breadcrumb')
        ),
    )
);



/**
 * Footer
 *
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => esc_html__('Footer', 'zo-mercury'),
    'icon' => 'el el-th',
    'fields' => array(
        array(
            'title' => esc_html__('100% Footer Width', 'zo-mercury'),
            'subtitle' => esc_html__('Turn on to have the footer area display at 100% width according to the window size. Turn off to follow site width.', 'zo-mercury'),
            'id' => 'footer_width',
            'type' => 'switch',
            'default' => false,
        ),
        array(
            'id' => 'footer_padding',
            'title' => esc_html__('Footer Padding', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the top/right/bottom/left padding for the footer. Enter values including any valid CSS unit, ex: 43px, 40px, 0px, 0px.', 'zo-mercury'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'default' => array(
                'padding-top' => '70px',
                'padding-right' => '0px',
                'padding-bottom' => '40px',
                'padding-left' => '0px',
                'units' => 'px',
            ),
        ),
        array(
            'id' => 'footer_background',
            'type' => 'background',
            'title' => esc_html__('Footer Background', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the background of the footer.', 'zo-mercury'),
            'output' => array('footer #zo-footer-top'),
            'default' => array(
                'background-color' => '#242528'
            ),
        ),
        array(
            'subtitle' => esc_html__('Controls the border colors top of the Footer.', 'zo-mercury'),
            'id' => 'footer_border_color',
            'type' => 'color',
            'title' => esc_html__('Footer Borders Color', 'zo-mercury'),
            'default' => '#e1e5e7',
        ),
        array(
            'title' => esc_html__('Footer Borders Width Top', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the width of the Footer border top, ex: 2px.', 'zo-mercury'),
            'id' => 'footer_border_width_top',
            'type' => 'slider',
            "default" => 0,
            "min" => 0,
            "step" => 1,
            "max" => 50,
            'display_value' => 'label'
        ),
        array(
            'subtitle' => esc_html__('Enable back to top button.', 'zo-mercury'),
            'id' => 'footer_botton_back_to_top',
            'type' => 'switch',
            'title' => esc_html__('Back To Top', 'zo-mercury'),
            'default' => true,
        )
    )
);

/* Footer content */
$this->sections[] = array(
    'title' => esc_html__('Footer Widgets', 'zo-mercury'),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => esc_html__('Turn on to display footer widgets.', 'zo-mercury'),
            'id' => 'footer_widgets',
            'type' => 'switch',
            'title' => esc_html__('Footer Widgets', 'zo-mercury'),
            'default' => true,
        ),
        array(
            'title' => esc_html__('Number of Footer Columns', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the number of columns in the footer.', 'zo-mercury'),
            'id' => 'footer_column',
            'type' => 'slider',
            "default" => 3,
            "min" => 1,
            "step" => 1,
            "max" => 6,
            'display_value' => 'label',
            'required' => array(0 => 'footer_widgets', 1 => '=', 2 => 1)
        ),
        array(
            'id' => 'footer_heading_typography',
            'type' => 'typography',
            'title' => esc_html__('Footer Headings Typography', 'zo-mercury'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'text-align' => false,
            'text-transform' => true,
            'units' => 'px',
            'output' => array('#zo-footer-content h3'),
            'subtitle' => esc_html__('These settings control the typography for the footer headings.', 'zo-mercury'),
            'default' => array(
                'text-transform' => 'uppercase',
                'color' => '#fff',
                'font-weight' => '700',
                'font-family' => 'Montserrat',
                'font-backup' => 'Arial, Helvetica, sans-serif',
                'font-size' => '14px',
                'line-height' => '28px',
            ),
            'required' => array(0 => 'footer_widgets', 1 => '=', 2 => 1)
        ),
        array(
            'subtitle' => esc_html__('Controls the text color of the footer font.', 'zo-mercury'),
            'id' => 'footer_font_color',
            'type' => 'color',
            'transparent' => false,
            'title' => esc_html__('Footer Font Color', 'zo-mercury'),
            'output' => array('#zo-footer-content .textwidget'),
            'default' => '#656971',
            'required' => array(0 => 'footer_widgets', 1 => '=', 2 => 1)
        ),
        array(
            'subtitle' => esc_html__('Controls the text color of the footer link font.', 'zo-mercury'),
            'id' => 'footer_link_color',
            'type' => 'color',
            'transparent' => false,
            'title' => esc_html__('Footer Link Color', 'zo-mercury'),
            'output' => array('#zo-footer-content .textwidget a'),
            'default' => '#b4bac6',
            'required' => array(0 => 'footer_widgets', 1 => '=', 2 => 1)
        ),
    )
);

/* Footer Copyright */
$this->sections[] = array(
    'title' => esc_html__('Copyright', 'zo-mercury'),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => esc_html__('Turn on to display the copyright bar.', 'zo-mercury'),
            'id' => 'footer_copyright',
            'type' => 'switch',
            'title' => esc_html__('Copyright Bar', 'zo-mercury'),
            'default' => true,
        ),
        array(
            'id' => 'footer_copyright_padding',
            'title' => esc_html__('Copyright Padding', 'zo-mercury'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'subtitle' => esc_html__('Controls the top/bottom padding for the copyright area. Enter values including any valid CSS unit, ex: 20px, 15px.', 'zo-mercury'),
            'left' => false,
            'right' => false,
            'default' => array(
                'padding-top' => '10px',
                'padding-bottom' => '10px',
                'units' => 'px',
            ),
            'required' => array(0 => 'footer_copyright', 1 => '=', 2 => 1)
        ),
        array(
            'id' => 'footer_copyright_background',
            'type' => 'color',
            'transparent' => false,
            'title' => esc_html__('Copyright Background Color', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the background of the copyright.', 'zo-mercury'),
            'default' => '#000',
            'required' => array(0 => 'footer_copyright', 1 => '=', 2 => 1)
        ),
        array(
            'subtitle' => esc_html__('Controls the border colors top of the Copyright.', 'zo-mercury'),
            'id' => 'footer_copyright_border_color',
            'type' => 'color',
            'title' => esc_html__('Copyright Borders Color', 'zo-mercury'),
            'default' => '#CDCDCD',
            'required' => array(0 => 'footer_copyright', 1 => '=', 2 => 1)
        ),
        array(
            'title' => esc_html__('Copyright Borders Width Top', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the width of the Copyright border top, ex: 2px.', 'zo-mercury'),
            'id' => 'footer_copyright_border_width_top',
            'type' => 'slider',
            "default" => 0,
            "min" => 0,
            "step" => 1,
            "max" => 50,
            'display_value' => 'label',
            'required' => array(0 => 'footer_copyright', 1 => '=', 2 => 1)
        ),
        array(
            'title' => esc_html__('Copyright Alignment', 'zo-mercury'),
            'subtitle' => esc_html__('Controls Copyright alignment.', 'zo-mercury'),
            'id' => 'footer_copyright_alignment',
            'default' => 'left',
            'type' => 'button_set',
            'options' => array(
                'left' => esc_html__('Left', 'zo-mercury'),
                'center' => esc_html__('Center', 'zo-mercury'),
                'right' => esc_html__('Right', 'zo-mercury'),
            ),
            'required' => array(0 => 'footer_copyright', 1 => '=', 2 => 1)
        ),
        array(
            'id' => 'footer_copyright_text',
            'type' => 'textarea',
            'title' => esc_html__('Copyright Text', 'zo-mercury'),
            'subtitle' => esc_html__('Enter the text that displays in the copyright bar. HTML markup can be used.', 'zo-mercury'),
            'validate' => 'html_custom',
            'default' => 'Copyright <a href="#" target="_blank">Mercury Single Property</a>. Designed by <a href="#" target="_blank">LA Studio</a>   ',
            'allowed_html' => array(
                'a' => array(
                    'href' => array(),
                    'title' => array(),
                    'target' => array(),
                ),
                'br' => array(),
                'em' => array(),
                'strong' => array(),
                'script' => array()
            ),
            'required' => array(0 => 'footer_copyright', 1 => '=', 2 => 1)
        ),
        array(
            'subtitle' => esc_html__('Controls the text color of the Copyright font.', 'zo-mercury'),
            'id' => 'footer_copyright_font_color',
            'type' => 'color',
            'transparent' => false,
            'title' => esc_html__('Copyright Font Color', 'zo-mercury'),
            'default' => '#656971',
            'required' => array(0 => 'footer_copyright', 1 => '=', 2 => 1)
        ),
        array(
            'subtitle' => esc_html__('Controls the text color of the Copyright link font.', 'zo-mercury'),
            'id' => 'footer_copyright_link_color',
            'type' => 'color',
            'transparent' => false,
            'title' => esc_html__('Copyright Link Color', 'zo-mercury'),
            'default' => '#b4bac6',
            'required' => array(0 => 'footer_copyright', 1 => '=', 2 => 1)
        ),
        array(
            'id' => 'footer_copyright_extra',
            'type' => 'select',
            'title' => esc_html__('Copyright Extra Content', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the other info to displays in the copyright bar.', 'zo-mercury'),
            'options' => array(
                '0' => 'None',
                '1' => 'Social Links',
                '2' => 'Copyright Extra Sidebar',
            ),
            'default' => '1',
            'required' => array(0 => 'footer_copyright', 1 => '=', 2 => 1)
        ),
        array(
            'title' => esc_html__('Copyright Extra Position', 'zo-mercury'),
            'subtitle' => esc_html__('Controls where to displays in the Copyright area. (Symmetric is not avalaible when Copyright Alignment center)', 'zo-mercury'),
            'id' => 'footer_copyright_extra_position',
            'default' => 'symmetric',
            'type' => 'button_set',
            'options' => array(
                'above' => esc_html__('Above', 'zo-mercury'),
                'bellow' => esc_html__('Bellow', 'zo-mercury'),
                'symmetric' => esc_html__('Symmetric', 'zo-mercury'),
            ),
            'required' => array(0 => 'footer_copyright_extra', 1 => 'is_larger', 2 => 0)
        ),
    )
);


/**
 * Typography
 *
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => esc_html__('Typography', 'zo-mercury'),
    'icon' => 'el el-fontsize',
    'fields' => array(
        array(
            'id' => 'font_body',
            'type' => 'typography',
            'title' => esc_html__('Body Font', 'zo-mercury'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'letter-spacing' => true,
            'output' => array('body'),
            'units' => 'px',
            'default' => array(
                'color' => '#656971',
                'font-weight' => '400',
                'font-family' => 'Open Sans',
                'font-backup' => 'Arial, Helvetica, sans-serif',
                'font-size' => '14px',
                'line-height' => '28px',
            ),
            'subtitle' => esc_html__('Typography option with each property can be called individually.', 'zo-mercury'),
            'desc' => esc_html__('No units were entered for font-size, falling back to using pixels. Saved value "0" and not "". No units were entered for letter-spacing, falling back to using pixels. Saved value "0" and not "".', 'zo-mercury')
        ),
        array(
            'id' => 'font_h1',
            'type' => 'typography',
            'title' => esc_html__('H1 Headers Typography', 'zo-mercury'),
            'subtitle' => esc_html__('These settings control the typography for all H1 Headers.', 'zo-mercury'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'letter-spacing' => true,
            'units' => 'px',
            'default' => array(
                'color' => '#404d66',
                'font-weight' => '400',
                'font-family' => 'Montserrat',
                'font-backup' => 'Arial, Helvetica, sans-serif',
                'font-size' => '32px',
                'line-height' => '35px'
            )
        ),
        array(
            'id' => 'font_h1_margin',
            'title' => esc_html__('H1 Headers Margin', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the top/bottom margins for the H1. Enter values including any valid CSS unit, ex: 0px, 15px..', 'zo-mercury'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'left' => false,
            'right' => false,
            'default' => array(
                'margin-top' => '0',
                'margin-bottom' => '15px',
                'units' => 'px',
            )
        ),
        array(
            'id' => 'font_h2',
            'type' => 'typography',
            'title' => esc_html__('H2 Headers Typography', 'zo-mercury'),
            'subtitle' => esc_html__('These settings control the typography for all H2 Headers.', 'zo-mercury'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'letter-spacing' => true,
            'units' => 'px',
            'default' => array(
                'color' => '#404d66',
                'font-weight' => '400',
                'font-family' => 'Montserrat',
                'font-backup' => 'Arial, Helvetica, sans-serif',
                'font-size' => '30px',
                'line-height' => '36px'
            )
        ),
        array(
            'id' => 'font_h2_margin',
            'title' => esc_html__('H2 Headers Margin', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the top/bottom margins for the H2. Enter values including any valid CSS unit, ex: 0px, 15px..', 'zo-mercury'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'left' => false,
            'right' => false,
            'default' => array(
                'margin-top' => '0',
                'margin-bottom' => '15px',
                'units' => 'px',
            )
        ),
        array(
            'id' => 'font_h3',
            'type' => 'typography',
            'title' => esc_html__('H3 Headers Typography', 'zo-mercury'),
            'subtitle' => esc_html__('These settings control the typography for all H3 Headers.', 'zo-mercury'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'letter-spacing' => true,
            'units' => 'px',
            'default' => array(
                'color' => '#404d66',
                'font-weight' => '400',
                'font-family' => 'Montserrat',
                'font-backup' => 'Arial, Helvetica, sans-serif',
                'font-size' => '22px',
                'line-height' => '25px'
            )
        ),
        array(
            'id' => 'font_h3_margin',
            'title' => esc_html__('H3 Headers Margin', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the top/bottom margins for the H3. Enter values including any valid CSS unit, ex: 0px, 15px..', 'zo-mercury'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'left' => false,
            'right' => false,
            'default' => array(
                'margin-top' => '0',
                'margin-bottom' => '15px',
                'units' => 'px',
            )
        ),
        array(
            'id' => 'font_h4',
            'type' => 'typography',
            'title' => esc_html__('H4 Headers Typography', 'zo-mercury'),
            'subtitle' => esc_html__('These settings control the typography for all H4 Headers.', 'zo-mercury'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'letter-spacing' => true,
            'units' => 'px',
            'default' => array(
                'color' => '#404d66',
                'font-weight' => '400',
                'font-family' => 'Montserrat',
                'font-backup' => 'Arial, Helvetica, sans-serif',
                'font-size' => '20px',
                'line-height' => '24px'
            )
        ),
        array(
            'id' => 'font_h4_margin',
            'title' => esc_html__('H4 Headers Margin', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the top/bottom margins for the H4. Enter values including any valid CSS unit, ex: 0px, 15px..', 'zo-mercury'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'left' => false,
            'right' => false,
            'default' => array(
                'margin-top' => '0',
                'margin-bottom' => '15px',
                'units' => 'px',
            )
        ),
        array(
            'id' => 'font_h5',
            'type' => 'typography',
            'title' => esc_html__('H5 Headers Typography', 'zo-mercury'),
            'subtitle' => esc_html__('These settings control the typography for all H5 Headers.', 'zo-mercury'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'letter-spacing' => true,
            'units' => 'px',
            'default' => array(
                'color' => '#404d66',
                'font-weight' => '400',
                'font-family' => 'Montserrat',
                'font-backup' => 'Arial, Helvetica, sans-serif',
                'font-size' => '18px',
                'line-height' => '30px'
            )
        ),
        array(
            'id' => 'font_h5_margin',
            'title' => esc_html__('H5 Headers Margin', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the top/bottom margins for the H5. Enter values including any valid CSS unit, ex: 0px, 15px..', 'zo-mercury'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'left' => false,
            'right' => false,
            'default' => array(
                'margin-top' => '0',
                'margin-bottom' => '15px',
                'units' => 'px',
            )
        ),
        array(
            'id' => 'font_h6',
            'type' => 'typography',
            'title' => esc_html__('H6 Headers Typography', 'zo-mercury'),
            'subtitle' => esc_html__('These settings control the typography for all H6 Headers.', 'zo-mercury'),
            'letter-spacing' => true,
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'units' => 'px',
            'default' => array(
                'color' => '#404d66',
                'font-weight' => '400',
                'font-family' => 'Montserrat',
                'font-backup' => 'Arial, Helvetica, sans-serif',
                'font-size' => '16px',
                'line-height' => '20px'
            )
        ),
        array(
            'id' => 'font_h6_margin',
            'title' => esc_html__('H6 Headers Margin', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the top/bottom margins for the H6. Enter values including any valid CSS unit, ex: 0px, 15px..', 'zo-mercury'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'left' => false,
            'right' => false,
            'default' => array(
                'margin-top' => '0',
                'margin-bottom' => '15px',
                'units' => 'px',
            )
        ),
    )
);
/* Responsive headings */
$this->sections[] = array(
    'title' => esc_html__('Mobile Headings', 'zo-mercury'),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => esc_html__('Turn on for headings (H1 to H6) to change font size responsively on Mobile device.', 'zo-mercury'),
            'id' => 'mobile_heading',
            'type' => 'switch',
            'title' => esc_html__('Mobile Headings Typography', 'zo-mercury'),
            'default' => false,
        ),
        array(
            'title' => esc_html__('Mobile Headings Typography Sensitivity', 'zo-mercury'),
            'subtitle' => esc_html__('Values below 100% decrease rate of resizing, values above 100% increase rate of resizing. (In percent)', 'zo-mercury'),
            'id' => 'mobile_heading_sensitivity',
            'type' => 'slider',
            "default" => 70,
            "min" => 30,
            "step" => 5,
            "max" => 200,
            'display_value' => 'text',
            'required' => array(0 => 'mobile_heading', 1 => '=', 2 => 1)
        ),
    )
);
/* extra font. */
$this->sections[] = array(
    'title' => esc_html__('Extra Fonts', 'zo-mercury'),
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'google-font-1',
            'type' => 'typography',
            'title' => esc_html__('Extra Font 1', 'zo-mercury'),
            'subtitle' => esc_html__('Select a font to use throughout Typography settings', 'zo-mercury'),
            'google' => true,
            'font-backup' => false,
            'font-style' => true,
            'color' => false,
            'text-align' => false,
            'line-height' => false,
            'font-size' => false,
            'font-weight' => true,
            'subsets' => false,
            'default' => array(
                'font-family' => 'Montserrat'
            )
        ),
        array(
            'id' => 'google-font-selector-1',
            'type' => 'textarea',
            'title' => esc_html__('Elements', 'zo-mercury'),
            'subtitle' => esc_html__('Add the html tags, element ID or class as you need. Ex: body,a,.class-name,#tag-id,.. Note: Do not use characters: > * + & ^ @ ...), Or extend class ".zo-extra-font1" to use this font in the CSS code', 'zo-mercury'),
            'validate' => 'no_html',
            'default' => '.zo-extra-font1',
            'required' => array(
                0 => 'google-font-1',
                1 => '!=',
                2 => ''
            )
        ),
        array(
            'id' => 'google-font-2',
            'type' => 'typography',
            'title' => esc_html__('Extra Font 2', 'zo-mercury'),
            'subtitle' => esc_html__('Select a font to use throughout Typography settings', 'zo-mercury'),
            'google' => true,
            'font-backup' => false,
            'font-style' => true,
            'color' => false,
            'text-align' => false,
            'line-height' => false,
            'font-size' => false,
            'font-weight' => true,
            'subsets' => false,
            'default' => array(
                'font-family' => 'Merriweather',
				'font-weight' => '400',
				'font-style' => 'italic'
            )
        ),
        array(
            'id' => 'google-font-selector-2',
            'type' => 'textarea',
            'title' => esc_html__('Elements', 'zo-mercury'),
            'subtitle' => esc_html__('Add the html tags, element ID or class as you need. Ex: body,a,.class-name,#tag-id,.. Note: Do not use characters: > * + & ^ @ ...), Or extend class ".zo-extra-font1" to use this font in the CSS code', 'zo-mercury'),
            'validate' => 'no_html',
            'default' => '.zo-extra-font2',
            'required' => array(
                0 => 'google-font-2',
                1 => '!=',
                2 => ''
            )
        ),
        array(
            'id' => 'google-font-3',
            'type' => 'typography',
            'title' => esc_html__('Extra Font 3', 'zo-mercury'),
            'subtitle' => esc_html__('Select a font to use throughout Typography settings', 'zo-mercury'),
            'google' => true,
            'font-backup' => false,
            'font-style' => true,
            'color' => false,
            'text-align' => false,
            'line-height' => false,
            'font-size' => false,
            'font-weight' => true,
            'subsets' => false,
            'default' => array(
                'font-family' => 'Open Sans',
                'font-weight' => '600'
            )
        ),
        array(
            'id' => 'google-font-selector-3',
            'type' => 'textarea',
            'title' => esc_html__('Elements', 'zo-mercury'),
            'subtitle' => esc_html__('Add the html tags, element ID or class as you need. Ex: body,a,.class-name,#tag-id,.. Note: Do not use characters: > * + & ^ @ ...), Or extend class ".zo-extra-font1" to use this font in the CSS code', 'zo-mercury'),
            'validate' => 'no_html',
            'default' => '.zo-extra-font3',
            'required' => array(
                0 => 'google-font-3',
                1 => '!=',
                2 => ''
            )
        ),
    )
);

/* local fonts. */
$this->sections[] = array(
    'title' => esc_html__('Local Fonts', 'zo-mercury'),
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'local-fonts-1',
            'type' => 'select',
            'title' => esc_html__('Fonts 1', 'zo-mercury'),
            'options' => $local_fonts,
            'default' => '',
        ),
        array(
            'id' => 'local-fonts-selector-1',
            'type' => 'textarea',
            'title' => esc_html__('Selector 1', 'zo-mercury'),
            'subtitle' => esc_html__('add html tags ID or class (body,a,.class,#id)', 'zo-mercury'),
            'validate' => 'no_html',
            'default' => '',
            'required' => array(
                0 => 'local-fonts-1',
                1 => '!=',
                2 => ''
            )
        ),
        array(
            'id' => 'local-fonts-2',
            'type' => 'select',
            'title' => esc_html__('Fonts 2', 'zo-mercury'),
            'options' => $local_fonts,
            'default' => '',
        ),
        array(
            'id' => 'local-fonts-selector-2',
            'type' => 'textarea',
            'title' => esc_html__('Selector 2', 'zo-mercury'),
            'subtitle' => esc_html__('add html tags ID or class (body,a,.class,#id)', 'zo-mercury'),
            'validate' => 'no_html',
            'default' => '',
            'required' => array(
                0 => 'local-fonts-2',
                1 => '!=',
                2 => ''
            )
        )
    )
);

$this->sections[] = array(
    'title' => esc_html__('Button', 'zo-mercury'),
    'icon' => 'el el-minus',
    'fields' => array(
        array(
            'id' => 'btn_primary_info',
            'type' => 'info',
            'style' => 'success',
            'title' => esc_html__('Setting for Primary Button', 'zo-mercury'),
            'icon' => 'el-icon-info-sign',
            'desc' => esc_html__('This is a setting for Primary button, output class is <strong style="color: red;">btn-primary</strong> [You can using that class anywhere on the website]', 'zo-mercury'),
        ),
        array(
            'id' => 'btn_primary',
            'type' => 'link_color',
            'title' => esc_html__('Primary Button Background Color', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the background color for the Primary button', 'zo-mercury'),
            'active' => false,
            'default' => array(
                'regular' => '#75b62e',
                'hover' => '#75b62e',
            )
        ),
        array(
            'id' => 'btn_primary_color',
            'type' => 'link_color',
            'title' => esc_html__('Primary Button Color', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the color for the Primary button', 'zo-mercury'),
            'active' => false,
            'default' => array(
                'regular' => '#FFF',
                'hover' => '#FFF',
            )
        ),
        array(
            'id' => 'btn_primary_padding',
            'title' => esc_html__('Primary Button Padding', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the top/right/bottom/left padding for the button. Enter values including any valid CSS unit, ex: 10px, 20px, 10px, 20px.', 'zo-mercury'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'default' => array(
                'padding-top' => '7px',
                'padding-right' => '25px',
                'padding-bottom' => '7px',
                'padding-left' => '25px',
                'units' => 'px',
            )
        ),
        array(
            'id' => 'btn_primary_border',
            'title' => esc_html__('Primary Button Border', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the top/right/bottom/left border for the button', 'zo-mercury'),
            'type' => 'border',
            'default' => array(
                'border-color' => '#FFFFFF',
                'border-style' => 'solid',
                'border-width' => '0px'
            )
        ),
        array(
            'title' => esc_html__('Primary Button Border', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the border radius for the button', 'zo-mercury'),
            'id' => 'btn_primary_border_radius',
            'type' => 'slider',
            "default" => '0',
            "min" => 0,
            "step" => 1,
            "max" => 100,
            'display_value' => 'label',
        ),
        array(
            'id' => 'btn_primary_font',
            'type' => 'typography',
            'title' => esc_html__('Primary Button Font', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the font styles for the Primary button', 'zo-mercury'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => false,
            'color' => false,
            'font-style' => true,
            'letter-spacing' => true,
            'font-weight' => true,
            'font-family' => true,
            'line-height' => true,
            'text-align' => true,
            'units' => 'px',
            'text-transform' => true,
            'default' => array(
                'font-size' => '14px',
                'letter-spacing' => '0px',
                'text-transform' => 'uppercase',
                'line-height' => '36px',
                'font-family' => 'Montserrat',
				'font-weight'=> '700',
            )
        ),
    ),
);
$this->sections[] = array(
    'title' => esc_html__('Secondary', 'zo-mercury'),
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'btn_secondary_info',
            'type' => 'info',
            'style' => 'success',
            'title' => esc_html__('Setting for Secondary Button', 'zo-mercury'),
            'icon' => 'el-icon-info-sign',
            'desc' => esc_html__('This is a setting for Secondary button, output class is <strong style="color: red;">btn-secondary</strong> [You can using that class anywhere on the website]', 'zo-mercury'),
        ),
        array(
            'id' => 'btn_secondary',
            'type' => 'link_color',
            'title' => esc_html__('Secondary Button Background Color', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the background color for the secondary button', 'zo-mercury'),
            'active' => false,
            'default' => array(
                'regular' => '#fff',
                'hover' => '#81d742',
            )
        ),
        array(
            'id' => 'btn_secondary_color',
            'type' => 'link_color',
            'title' => esc_html__('Secondary Button Color', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the color for the secondary button', 'zo-mercury'),
            'active' => false,
            'default' => array(
                'regular' => '#81d742',
                'hover' => '#fff',
            )
        ),
        array(
            'id' => 'btn_secondary_padding',
            'title' => esc_html__('Secondary Button Padding', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the top/right/bottom/left padding for the button. Enter values including any valid CSS unit, ex: 10px, 20px, 10px, 20px.', 'zo-mercury'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'default' => array(
                'padding-top' => '10px',
                'padding-right' => '20px',
                'padding-bottom' => '10px',
                'padding-left' => '20px',
                'units' => 'px',
            )
        ),
        array(
            'id' => 'btn_secondary_border',
            'title' => esc_html__('Secondary Button Border', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the top/right/bottom/left border for the button', 'zo-mercury'),
            'type' => 'border',
            'default' => array(
                'border-color' => '#81d742',
                'border-style' => 'solid',
                'border-width' => '1px'
            )
        ),
        array(
            'title' => esc_html__('Primary Button Border', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the border radius for the button', 'zo-mercury'),
            'id' => 'btn_secondary_border_radius',
            'type' => 'slider',
            "default" => 0,
            "min" => 0,
            "step" => 1,
            "max" => 100,
            'display_value' => 'label',
        ),
        array(
            'id' => 'btn_secondary_font',
            'type' => 'typography',
            'title' => esc_html__('Secondary Button Font', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the font styles for the secondary button', 'zo-mercury'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => false,
            'color' => false,
            'font-style' => true,
            'letter-spacing' => true,
            'font-weight' => true,
            'font-family' => true,
            'line-height' => true,
            'text-align' => true,
            'units' => 'px',
            'text-transform' => true,
            'default' => array(
                'font-size' => '14px',
                'letter-spacing' => '0px',
                'text-transform' => 'uppercase',
                'line-height' => '36px',
                'font-family' => 'Montserrat',
				'font-weight'=> '700',
            )
        ),
    ),
);

/**
 * Blog
 *
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => esc_html__('Blog', 'zo-mercury'),
    'icon' => 'el el-file-edit',
    'fields' => array(
        array(
            'subtitle' => esc_html__('Turn on to have the blog content area display at 100% width according to the window size. Turn off to follow site width.', 'zo-mercury'),
            'id' => 'blog_layout_width',
            'type' => 'switch',
            'title' => esc_html__('100% Width Blog', 'zo-mercury'),
            'default' => false,
        ),
        array(
            'subtitle' => esc_html__('Turn on to show the page title bar for the assigned blog page or archive pages', 'zo-mercury'),
            'id' => 'blog_pt_bar',
            'type' => 'switch',
            'title' => esc_html__('Page Title Bar', 'zo-mercury'),
            'default' => true,
        ),
        array(
            'title' => esc_html__('Blog Page Title', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the title text that displays in the page title bar of the assigned blog page.', 'zo-mercury'),
            'id' => 'blog_pt',
            'type' => 'text',
            'default' => 'Blog Classic Left Sidebar',
            'required' => array(0 => 'blog_pt_bar', 1 => '=', 2 => 1)
        ),
        array(
            'title' => esc_html__('Blog Sub Title', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the subtitle text that displays in the page title bar of the assigned blog page.', 'zo-mercury'),
            'id' => 'blog_pt_sub',
            'type' => 'text',
            'default' => '',
            'required' => array(0 => 'blog_pt_bar', 1 => '=', 2 => 1)
        ),
        array(
            'id' => 'blog_layout',
            'type' => 'select',
            'title' => esc_html__('Blog Layout', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the layout for the assigned blog page', 'zo-mercury'),
            'options' => array(
                'medium' => 'Medium',
                'large' => 'Large',
                'grid' => 'Grid',
            ),
            'default' => 'large',
        ),
        array(
            'title' => esc_html__('Grid Layout Columns', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the amount of columns for the grid layout when using it for the assigned blog page.', 'zo-mercury'),
            'id' => 'blog_layout_grid',
            'type' => 'slider',
            "default" => 2,
            "min" => 2,
            "step" => 1,
            "max" => 4,
            'display_value' => 'text',
            'required' => array(0 => 'blog_layout', 1 => '=', 2 => 'grid')
        ),
        array(
            'subtitle' => esc_html__('Turn on to the masonry grid for the assigned blog page.', 'zo-mercury'),
            'id' => 'blog_layout_grid_masonry',
            'type' => 'switch',
            'title' => esc_html__('Masonry Model', 'zo-mercury'),
            'default' => false,
            'required' => array(0 => 'blog_layout', 1 => '=', 2 => 'grid')
        ),
        array(
            'title' => esc_html__('Display Sidebar', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the main sidebar for the Blog Layout', 'zo-mercury'),
            'id' => 'blog_layout_sidebar',
            'default' => 'left',
            'type' => 'button_set',
            'options' => array(
                'none' => esc_html__('None', 'zo-mercury'),
                'left' => esc_html__('Left Sidebar', 'zo-mercury'),
                'right' => esc_html__('Right Sidebar', 'zo-mercury'),
            ),
        ),
        array(
            'id' => 'blog_archive_layout',
            'type' => 'select',
            'title' => esc_html__('Blog Archive Layout', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the layout for the blog archive, tag and author pages.', 'zo-mercury'),
            'options' => array(
                'medium' => 'Medium',
                'large' => 'Large',
                'grid' => 'Grid',
            ),
            'default' => 'medium',
        ),
        array(
            'title' => esc_html__('Grid Archive Layout Columns', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the amount of columns for the Grid Archive, tag and author layout', 'zo-mercury'),
            'id' => 'blog_archive_layout_grid',
            'type' => 'slider',
            "default" => 3,
            "min" => 2,
            "step" => 1,
            "max" => 4,
            'display_value' => 'text',
            'required' => array(0 => 'blog_archive_layout', 1 => '=', 2 => 'grid')
        ),
        array(
            'subtitle' => esc_html__('Turn on to the masonry grid for the Archive, tag and author page', 'zo-mercury'),
            'id' => 'blog_archive_layout_grid_masonry',
            'type' => 'switch',
            'title' => esc_html__('Masonry Model', 'zo-mercury'),
            'default' => false,
            'required' => array(0 => 'blog_archive_layout', 1 => '=', 2 => 'grid')
        ),
        array(
            'title' => esc_html__('Display Sidebar', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the main sidebar for the blog archive, tag and author Layout', 'zo-mercury'),
            'id' => 'blog_archive_layout_sidebar',
            'default' => 'left',
            'type' => 'button_set',
            'options' => array(
                'none' => esc_html__('None', 'zo-mercury'),
                'left' => esc_html__('Left Sidebar', 'zo-mercury'),
                'right' => esc_html__('Right Sidebar', 'zo-mercury'),
            ),
        ),
        array(
            'id' => 'blog_search_layout',
            'type' => 'select',
            'title' => esc_html__('Blog Search Layout', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the layout for the blog Search result pages.', 'zo-mercury'),
            'options' => array(
                'medium' => 'Medium',
                'large' => 'Large',
                'grid' => 'Grid',
            ),
            'default' => 'grid',
        ),
        array(
            'title' => esc_html__('Grid Archive Layout Columns', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the amount of columns for the Grid Search layout', 'zo-mercury'),
            'id' => 'blog_search_layout_grid',
            'type' => 'slider',
            "default" => 2,
            "min" => 2,
            "step" => 1,
            "max" => 4,
            'display_value' => 'text',
            'required' => array(0 => 'blog_search_layout', 1 => '=', 2 => 'grid')
        ),
        array(
            'subtitle' => esc_html__('Turn on to the masonry grid for the search page', 'zo-mercury'),
            'id' => 'blog_search_layout_grid_masonry',
            'type' => 'switch',
            'title' => esc_html__('Masonry Model', 'zo-mercury'),
            'default' => true,
            'required' => array(0 => 'blog_search_layout', 1 => '=', 2 => 'grid')
        ),
        array(
            'title' => esc_html__('Display Sidebar', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the main sidebar for the blog search Layout', 'zo-mercury'),
            'id' => 'blog_search_layout_sidebar',
            'default' => 'left',
            'type' => 'button_set',
            'options' => array(
                'none' => esc_html__('None', 'zo-mercury'),
                'left' => esc_html__('Left Sidebar', 'zo-mercury'),
                'right' => esc_html__('Right Sidebar', 'zo-mercury'),
            ),
        ),
    )
);


/* Blog Meta */
$this->sections[] = array(
    'title' => esc_html__('Blog Meta', 'zo-mercury'),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => esc_html__('Controls the pagination type for the assigned blog page', 'zo-mercury'),
            'id' => 'blog_pagination',
            'type' => 'button_set',
            'title' => esc_html__('Pagination Type', 'zo-mercury'),
            'default' => 'pagination',
            'options' => array(
                'pagination' => esc_html__('Pagination', 'zo-mercury'),
                'button' => esc_html__('Load More Button', 'zo-mercury'),
            )
        ),
        array(
            'title' => esc_html__('Excerpt Length', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the number of words in the post excerpts for the assigned blog page', 'zo-mercury'),
            'id' => 'blog_excerpt',
            'type' => 'slider',
            "default" => 30,
            "min" => 0,
            "step" => 1,
            "max" => 500,
            'display_value' => 'text',
        ),
        array(
            'subtitle' => esc_html__('Turn on to show the Read More button for the blog page or archive pages', 'zo-mercury'),
            'id' => 'blog_post_readmore',
            'type' => 'switch',
            'title' => esc_html__('Display Read More button', 'zo-mercury'),
            'default' => false,
        ),
        array(
            'title' => esc_html__('Read More Text', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the text to displays in the Read More button', 'zo-mercury'),
            'id' => 'blog_post_readmore_text',
            'type' => 'text',
            'default' => '[Read more]',
            'required' => array(0 => 'blog_post_readmore', 1 => '=', 2 => 1)
        ),
        array(
            'subtitle' => esc_html__('Turn on to show the image / video for the blog page or archive pages', 'zo-mercury'),
            'id' => 'blog_post_feature_media',
            'type' => 'switch',
            'title' => esc_html__('Featured Image / Video on Blog Page', 'zo-mercury'),
            'default' => true,
        ),
        array(
            'title' => esc_html__('Post Title', 'zo-mercury'),
            'subtitle' => esc_html__('Turn on to display the post title that goes below the featured image on the blog page or archive pages.', 'zo-mercury'),
            'id' => 'blog_post_title',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => esc_html__('Author Info', 'zo-mercury'),
            'subtitle' => esc_html__('Turn on to display the author info on the blog page or archive pages.', 'zo-mercury'),
            'id' => 'blog_post_author',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => esc_html__('Blog Date', 'zo-mercury'),
            'subtitle' => esc_html__('Turn on to display the post meta date on the blog page or archive pages.', 'zo-mercury'),
            'id' => 'blog_post_date',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => esc_html__('Date Format', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the date format that displays in the post on the blog page or archive pages. <a href="http://codex.wordpress.org/Formatting_Date_and_Time" target="_blank">Formatting Date and Time</a>', 'zo-mercury'),
            'id' => 'blog_post_date_format',
            'type' => 'text',
            'default' => 'j F, Y',
            'required' => array(0 => 'blog_post_date', 1 => '=', 2 => 1)
        ),
        array(
            'title' => esc_html__('Post Categories', 'zo-mercury'),
            'subtitle' => esc_html__('Turn on to display the post meta categories on the blog page or archive pages.', 'zo-mercury'),
            'id' => 'blog_post_categories',
            'type' => 'switch',
            'default' => false,
        ),
        array(
            'title' => esc_html__('Post Tags', 'zo-mercury'),
            'subtitle' => esc_html__('Turn on to display the post meta tags on the blog page or archive pages.', 'zo-mercury'),
            'id' => 'blog_post_tags',
            'type' => 'switch',
            'default' => false,
        ),
        array(
            'title' => esc_html__('Post Comments', 'zo-mercury'),
            'subtitle' => esc_html__('Turn on to display the post meta comments on the blog page or archive pages.', 'zo-mercury'),
            'id' => 'blog_post_comment',
            'type' => 'switch',
            'default' => false,
        ),
        array(
            'title' => esc_html__('Social Sharing Box', 'zo-mercury'),
            'subtitle' => esc_html__('Turn on to display the social sharing box on the blog page or archive pages.', 'zo-mercury'),
            'id' => 'blog_post_social',
            'type' => 'switch',
            'default' => false,
        ),
    )
);

/* Single Posts */
$this->sections[] = array(
    'title' => esc_html__('Single Posts', 'zo-mercury'),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => esc_html__('Turn on to have the single post content area display at 100% width according to the window size. Turn off to follow site width.', 'zo-mercury'),
            'id' => 'blog_single_width',
            'type' => 'switch',
            'title' => esc_html__('100% Width Single Post', 'zo-mercury'),
            'default' => false,
        ),
        array(
            'title' => esc_html__('Display Sidebar', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the main sidebar for the single blog post', 'zo-mercury'),
            'id' => 'blog_single_sidebar',
            'default' => 'left',
            'type' => 'button_set',
            'options' => array(
                'none' => esc_html__('None', 'zo-mercury'),
                'left' => esc_html__('Left Sidebar', 'zo-mercury'),
                'right' => esc_html__('Right Sidebar', 'zo-mercury'),
            ),
        ),
        array(
            'title' => esc_html__('Featured Image / Video on Single Post', 'zo-mercury'),
            'subtitle' => esc_html__('Turn on to display featured images and videos on single blog posts.', 'zo-mercury'),
            'id' => 'blog_single_media',
            'type' => 'switch',
            'default' => false,
        ),
        array(
            'title' => esc_html__('Post Title', 'zo-mercury'),
            'subtitle' => esc_html__('Turn on to display the post title that goes below the featured image area.', 'zo-mercury'),
            'id' => 'blog_single_title',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => esc_html__('Author Info Box', 'zo-mercury'),
            'subtitle' => esc_html__('Turn on to display the author info box below posts.', 'zo-mercury'),
            'id' => 'blog_single_author',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => esc_html__('Post Date', 'zo-mercury'),
            'subtitle' => esc_html__('Turn on to display the post meta date.', 'zo-mercury'),
            'id' => 'blog_single_date',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => esc_html__('Date Format', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the date format that displays in the post. <a href="http://codex.wordpress.org/Formatting_Date_and_Time" target="_blank">Formatting Date and Time</a>', 'zo-mercury'),
            'id' => 'blog_single_date_format',
            'type' => 'text',
            'default' => 'j F, Y',
            'required' => array(0 => 'blog_single_date', 1 => '=', 2 => 1)
        ),
        array(
            'title' => esc_html__('Post Categories', 'zo-mercury'),
            'subtitle' => esc_html__('Turn on to display the post meta categories.', 'zo-mercury'),
            'id' => 'blog_single_categories',
            'type' => 'switch',
            'default' => false,
        ),
        array(
            'title' => esc_html__('Post Tags', 'zo-mercury'),
            'subtitle' => esc_html__('Turn on to display the post meta tags.', 'zo-mercury'),
            'id' => 'blog_single_tags',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => esc_html__('Social Sharing Box', 'zo-mercury'),
            'subtitle' => esc_html__('Turn on to display the social sharing box.', 'zo-mercury'),
            'id' => 'blog_single_social',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => esc_html__('Previous/Next Pagination', 'zo-mercury'),
            'subtitle' => esc_html__('Turn on to display the previous/next post pagination for single blog posts.', 'zo-mercury'),
            'id' => 'blog_single_pagination',
            'type' => 'switch',
            'default' => false,
        ),
        array(
            'title' => esc_html__('Related Posts', 'zo-mercury'),
            'subtitle' => esc_html__('Turn on to display related posts.', 'zo-mercury'),
            'id' => 'blog_single_related',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => esc_html__('Comments', 'zo-mercury'),
            'subtitle' => esc_html__('Turn on to display comments.', 'zo-mercury'),
            'id' => 'blog_single_comment',
            'type' => 'switch',
            'default' => true,
        ),
    ),
);

/* Portfolio */
$this->sections[] = array(
    'title' => esc_html__('Portfolio', 'zo-mercury'),
    'icon' => 'el el-tasks',
    'fields' => array(
        array(
            'subtitle' => esc_html__('Turn on to have the portfolio content area display at 100% width according to the window size. Turn off to follow site width.', 'zo-mercury'),
            'id' => 'portfolio_width',
            'type' => 'switch',
            'title' => esc_html__('100% Width Portfolio', 'zo-mercury'),
            'default' => false,
        ),
        array(
            'id' => 'portfolio_background',
            'type' => 'background',
            'title' => esc_html__('Portfolio Background', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the background of the portfolio page title.', 'zo-mercury'),
            'default' => array(
                'background-color' => '#FFF',
                'background-image' => get_template_directory_uri() . '/assets/images/mercury-page-title.jpg',
                'background-repeat' => '',
                'background-size' => '',
                'background-attachment' => '',
                'background-position' => ''
            )
        ),
        array(
            'title' => esc_html__('Display Sidebar', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the main sidebar for the portfolio archive', 'zo-mercury'),
            'id' => 'portfolio_sidebar',
            'default' => 'right',
            'type' => 'button_set',
            'options' => array(
                'none' => esc_html__('None', 'zo-mercury'),
                'left' => esc_html__('Left Sidebar', 'zo-mercury'),
                'right' => esc_html__('Right Sidebar', 'zo-mercury'),
            ),
        ),
        array(
            'title' => esc_html__('Featured Image / Video on Portfolio', 'zo-mercury'),
            'subtitle' => esc_html__('Turn on to display featured images and videos on portfolio archive.', 'zo-mercury'),
            'id' => 'portfolio_media',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => esc_html__('Portfolio Title', 'zo-mercury'),
            'subtitle' => esc_html__('Turn on to display the post title on portfolio archive', 'zo-mercury'),
            'id' => 'portfolio_title',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => esc_html__('Portfolio Author', 'zo-mercury'),
            'subtitle' => esc_html__('Turn on to display the author on portfolio archive', 'zo-mercury'),
            'id' => 'portfolio_author',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => esc_html__('Portfolio Client', 'zo-mercury'),
            'subtitle' => esc_html__('Turn on to display the client on portfolio archive.', 'zo-mercury'),
            'id' => 'portfolio_client',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => esc_html__('Portfolio Date', 'zo-mercury'),
            'subtitle' => esc_html__('Turn on to display the portfolio date on portfolio archive.', 'zo-mercury'),
            'id' => 'portfolio_date',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => esc_html__('Date Format', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the date format that displays on portfolio archive. <a href="http://codex.wordpress.org/Formatting_Date_and_Time" target="_blank">Formatting Date and Time</a>', 'zo-mercury'),
            'id' => 'portfolio_date_format',
            'type' => 'text',
            'default' => 'F j, Y',
            'required' => array(0 => 'portfolio_date', 1 => '=', 2 => 1)
        ),
        array(
            'title' => esc_html__('Categories', 'zo-mercury'),
            'subtitle' => esc_html__('Turn on to display the post meta categories on portfolio archive.', 'zo-mercury'),
            'id' => 'portfolio_categories',
            'type' => 'switch',
            'default' => true,
        )
    ),
);
/* Portfolio */
$this->sections[] = array(
    'title' => esc_html__('Single Post', 'zo-mercury'),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => esc_html__('Turn on to have the portfolio content area display at 100% width according to the window size. Turn off to follow site width.', 'zo-mercury'),
            'id' => 'portfolio_single_width',
            'type' => 'switch',
            'title' => esc_html__('100% Width Portfolio', 'zo-mercury'),
            'default' => false,
        ),
        array(
            'title' => esc_html__('Display Sidebar', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the main sidebar for the portfolio post', 'zo-mercury'),
            'id' => 'portfolio_single_sidebar',
            'default' => 'right',
            'type' => 'button_set',
            'options' => array(
                'none' => esc_html__('None', 'zo-mercury'),
                'left' => esc_html__('Left Sidebar', 'zo-mercury'),
                'right' => esc_html__('Right Sidebar', 'zo-mercury'),
            ),
        ),
        array(
            'title' => esc_html__('Featured Image / Video on Portfolio', 'zo-mercury'),
            'subtitle' => esc_html__('Turn on to display featured images and videos on portfolio posts.', 'zo-mercury'),
            'id' => 'portfolio_single_media',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => esc_html__('Portfolio Title', 'zo-mercury'),
            'subtitle' => esc_html__('Turn on to display the post title that goes below the featured image area.', 'zo-mercury'),
            'id' => 'portfolio_single_title',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => esc_html__('Portfolio Author', 'zo-mercury'),
            'subtitle' => esc_html__('Turn on to display the author below posts.', 'zo-mercury'),
            'id' => 'portfolio_single_author',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => esc_html__('Portfolio Author Label', 'zo-mercury'),
            'subtitle' => esc_html__('Enter the label for Author. (such as: Author, Designer,...)', 'zo-mercury'),
            'id' => 'portfolio_single_author_label',
            'type' => 'text',
            'default' => 'Author',
            'required' => array(0 => 'portfolio_single_author', 1 => '=', 2 => 1),
        ),
        array(
            'title' => esc_html__('Portfolio Client', 'zo-mercury'),
            'subtitle' => esc_html__('Turn on to display the client below posts.', 'zo-mercury'),
            'id' => 'portfolio_single_client',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => esc_html__('Portfolio Client Label', 'zo-mercury'),
            'subtitle' => esc_html__('Enter the label for Client. (such as: Client, Partner,...)', 'zo-mercury'),
            'id' => 'portfolio_single_client_label',
            'type' => 'text',
            'default' => 'Client',
            'required' => array(0 => 'portfolio_single_client', 1 => '=', 2 => 1),
        ),
        array(
            'title' => esc_html__('Portfolio Date', 'zo-mercury'),
            'subtitle' => esc_html__('Turn on to display the portfolio meta date.', 'zo-mercury'),
            'id' => 'portfolio_single_date',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => esc_html__('Portfolio Date Label', 'zo-mercury'),
            'subtitle' => esc_html__('Enter the label for Date. (such as: Created Date, Puslished,...)', 'zo-mercury'),
            'id' => 'portfolio_single_date_label',
            'type' => 'text',
            'default' => 'Created Date',
            'required' => array(0 => 'portfolio_single_date', 1 => '=', 2 => 1),
        ),
        array(
            'title' => esc_html__('Date Format', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the date format that displays in the post. <a href="http://codex.wordpress.org/Formatting_Date_and_Time" target="_blank">Formatting Date and Time</a>', 'zo-mercury'),
            'id' => 'portfolio_single_date_format',
            'type' => 'text',
            'default' => 'F j, Y',
            'required' => array(0 => 'portfolio_single_date', 1 => '=', 2 => 1)
        ),
        array(
            'title' => esc_html__('Portfolio Skills', 'zo-mercury'),
            'subtitle' => esc_html__('Turn on to display the skill below posts.', 'zo-mercury'),
            'id' => 'portfolio_single_skill',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => esc_html__('Portfolio Skill Label', 'zo-mercury'),
            'subtitle' => esc_html__('Enter the label for Skill. (such as: Skill, Technical,...)', 'zo-mercury'),
            'id' => 'portfolio_single_skill_label',
            'type' => 'text',
            'default' => 'Skill',
            'required' => array(0 => 'portfolio_single_skill', 1 => '=', 2 => 1),
        ),
        array(
            'title' => esc_html__('Categories', 'zo-mercury'),
            'subtitle' => esc_html__('Turn on to display the post meta categories.', 'zo-mercury'),
            'id' => 'portfolio_single_categories',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => esc_html__('Social Sharing Box', 'zo-mercury'),
            'subtitle' => esc_html__('Turn on to display the social sharing box.', 'zo-mercury'),
            'id' => 'portfolio_single_social',
            'type' => 'switch',
            'default' => true,
        ),
        array(
            'title' => esc_html__('Previous/Next Pagination', 'zo-mercury'),
            'subtitle' => esc_html__('Turn on to display the previous/next post pagination for portfolio posts.', 'zo-mercury'),
            'id' => 'portfolio_single_pagination',
            'type' => 'switch',
            'default' => true,
        ),
    ),
);

/* Social Links */
$this->sections[] = array(
    'title' => esc_html__('Social Media', 'zo-mercury'),
    'icon' => 'el el-share-alt',
    'fields' => array(
        array(
            'id' => 'social_link_header_top',
            'type' => 'checkbox',
            'title' => esc_html__('Show in Header Top', 'zo-mercury'),
            'subtitle' => esc_html__('Select Socials to show in header top', 'zo-mercury'),
            'options' => array(
                'facebook' => 'Facebook',
                'twitter' => 'Twitter',
                'google' => 'Google Plus',
                'pinterest' => 'Pinterest',
                'vimeo' => 'Vimeo',
                'youtube' => 'Youtube',
                'linkedin' => 'LinkedIn',
                'dribbble' => 'Dribbble',
                'rss' => 'RSS',
            ),
            'default' => array(
                'facebook' => '1',
                'twitter' => '1',
                'pinterest' => '1',
                'google' => '1',
                'linkedin' => '1',
            )
        ),
        array(
            'id' => 'social_link_copyright',
            'type' => 'checkbox',
            'title' => esc_html__('Show in Copyright Bar', 'zo-mercury'),
            'subtitle' => esc_html__('Select Socials to show in Copyright bar', 'zo-mercury'),
            'options' => array(
                'facebook' => 'Facebook',
                'twitter' => 'Twitter',
                'google' => 'Google Plus',
                'pinterest' => 'Pinterest',
                'vimeo' => 'Vimeo',
                'youtube' => 'Youtube',
                'linkedin' => 'LinkedIn',
                'dribbble' => 'Dribbble',
                'rss' => 'RSS',
            ),
            'default' => array(
                'facebook' => '1',
                'twitter' => '1',
                'pinterest' => '1',
                'google' => '1',
                'linkedin' => '1',
            )
        ),
        array(
            'id' => 'social_link_blog',
            'type' => 'sortable',
            'mode' => 'checkbox',
            'title' => esc_html__('Social Share Box', 'zo-mercury'),
            'subtitle' => esc_html__('Controls the social share box on the blog post', 'zo-mercury'),
            'options' => array(
                'facebook' => 'Facebook',
                'twitter' => 'Twitter',
                'pinterest' => 'Pinterest',
                'google' => 'Google Plus',
                'linkedin' => 'LinkedIn',
            ),
            'default' => array(
                'facebook' => '1',
                'twitter' => '1',
                'pinterest' => '1',
                'google' => '1',
                'linkedin' => '1',
            )
        ),
    )
);
$this->sections[] = array(
    'title' => esc_html__('Social Links', 'zo-mercury'),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => esc_html__('Input the Facebook Link', 'zo-mercury'),
            'id' => 'facebook',
            'type' => 'text',
            'title' => esc_html__('Facebook Link', 'zo-mercury'),
            'default' => '',
        ),
        array(
            'subtitle' => esc_html__('Input the Twitter Link', 'zo-mercury'),
            'id' => 'twitter',
            'type' => 'text',
            'title' => esc_html__('Twitter Link', 'zo-mercury'),
            'default' => '',
        ),
        array(
            'subtitle' => esc_html__('Input the Youtube Link', 'zo-mercury'),
            'id' => 'youtube',
            'type' => 'text',
            'title' => esc_html__('Youtube Link', 'zo-mercury'),
            'default' => '',
        ),
        array(
            'subtitle' => esc_html__('Input the Vimeo Link', 'zo-mercury'),
            'id' => 'vimeo',
            'type' => 'text',
            'title' => esc_html__('Vimeo Link', 'zo-mercury'),
            'default' => '',
        ),
        array(
            'subtitle' => esc_html__('Input the Instagram Link', 'zo-mercury'),
            'id' => 'instagram',
            'type' => 'text',
            'title' => esc_html__('Instagram Link', 'zo-mercury'),
            'default' => '',
        ),
        array(
            'subtitle' => esc_html__('Input the Google Plus Link', 'zo-mercury'),
            'id' => 'google',
            'type' => 'text',
            'title' => esc_html__('Google+ Link', 'zo-mercury'),
            'default' => '',
        ),
        array(
            'subtitle' => esc_html__('Input the Skype Link', 'zo-mercury'),
            'id' => 'skype',
            'type' => 'text',
            'title' => esc_html__('Skype Link', 'zo-mercury'),
            'default' => '',
        ),
        array(
            'subtitle' => esc_html__('Input the LinkedIn Link', 'zo-mercury'),
            'id' => 'linkedin',
            'type' => 'text',
            'title' => esc_html__('LinkedIn Link', 'zo-mercury'),
            'default' => '',
        ),
        array(
            'subtitle' => esc_html__('Input the RSS Link', 'zo-mercury'),
            'id' => 'rss',
            'type' => 'text',
            'title' => esc_html__('RSS Link', 'zo-mercury'),
            'default' => '',
        ),
        array(
            'subtitle' => esc_html__('Input the Yahoo Link', 'zo-mercury'),
            'id' => 'yahoo',
            'type' => 'text',
            'title' => esc_html__('Yahoo Link', 'zo-mercury'),
            'default' => '',
        ),
    )
);


/**
 * Custom CSS
 *
 * extra css for customer.
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => esc_html__('Custom CSS', 'zo-mercury'),
    'icon' => 'el-icon-bulb',
    'fields' => array(
        array(
            'id' => 'custom_css',
            'type' => 'ace_editor',
            'title' => esc_html__('CSS Code', 'zo-mercury'),
            'subtitle' => esc_html__('create your css code here.', 'zo-mercury'),
            'mode' => 'css',
            'theme' => 'monokai',
        )
    )
);

/**
 * Animations
 *
 * Animations options for theme. libs css, js.
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => esc_html__('Animations', 'zo-mercury'),
    'icon' => 'el-icon-magic',
    'fields' => array(
        array(
            'subtitle' => esc_html__('Enable animation parallax for images...', 'zo-mercury'),
            'id' => 'paralax',
            'type' => 'switch',
            'title' => esc_html__('Images Paralax', 'zo-mercury'),
            'default' => true
        ),
    )
);

/**
 * Optimal Core
 *
 * Optimal options for theme. optimal speed
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => esc_html__('Optimal Core', 'zo-mercury'),
    'icon' => 'el-icon-idea',
    'fields' => array(
        array(
            'subtitle' => esc_html__('no minimize , generate css over time...', 'zo-mercury'),
            'id' => 'dev_mode',
            'type' => 'switch',
            'title' => esc_html__('Dev Mode (not recommended)', 'zo-mercury'),
            'default' => false
        )
    )
);
