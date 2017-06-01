<?php

add_filter('rwmb_meta_boxes', 'exam_meta_boxes');

function exam_meta_boxes($meta_boxes) {
    $menus = array();
    $menus[''] = 'Default';
    $obj_menus = wp_get_nav_menus();
    foreach ($obj_menus as $obj_menu) {
        $menus[$obj_menu->term_id] = $obj_menu->name;
    }
    $meta_boxes[] = array(
        'title' => esc_html__('Page Settings', 'zo-mercury'),
        'post_types' => 'page',
        'tabs' => array(
            'layout' => array(
                'label' => esc_html__('Layout', 'zo-mercury'),
                'icon' => 'fa fa-columns'
            ),
            'header' => array(
                'label' => esc_html__('Header', 'zo-mercury'),
                'icon' => 'fa fa-header'
            ),
            'menu' => array(
                'label' => esc_html__('Menu', 'zo-mercury'),
                'icon' => 'fa fa-bars'
            ),
            'page_title' => array(
                'label' => esc_html__('Page Title', 'zo-mercury'),
                'icon' => 'fa fa-text-width'
            ),
            'content' => array(
                'label' => esc_html__('Content', 'zo-mercury'),
                'icon' => 'fa fa-newspaper-o'
            ),
            'footer' => array(
                'label' => esc_html__('Footer', 'zo-mercury'),
                'icon' => 'fa fa-credit-card'
            ),
        ),
        'tab_style' => 'left',
        'fields' => array(
            // Layout tab
            array(
                'id' => 'page_layout',
                'name' => esc_html__('Layout', 'zo-mercury'),
                'type' => 'select',
                'options' => array('0' => 'Default', 'wide' => 'Wide', 'boxed' => 'Boxed'),
                'desc' => esc_html__('Select boxed or wide layout (Default by theme option, Boxed width define by theme option).', 'zo-mercury'),
                'tab' => 'layout',
            ),
            array(
                'id' => 'page_body_bg_color',
                'name' => esc_html__('Body Background Color', 'zo-mercury'),
                'type' => 'color',
                'default' => '',
                'desc' => esc_html__('Controls the background color for the body background. Hex code, ex: #000', 'zo-mercury'),
                'tab' => 'layout',
            ),
            array(
                'id' => 'page_body_bg_image',
                'name' => esc_html__('Body Background Image', 'zo-mercury'),
                'type' => 'file_input',
                'desc' => esc_html__('Select an image to use for the background.', 'zo-mercury'),
                'tab' => 'layout',
            ),
            array(
                "type" => "select",
                "name" => esc_html__("Background Position", 'zo-mercury'),
                'desc' => esc_html__('Choose to have the background image position', 'zo-mercury'),
                "id" => "page_body_bg_position",
                "options" => array(
                    "" => "Theme Default",
                    "left top" => "Left Top",
                    "left center" => "Left Center",
                    "left bottom" => "Left Bottom",
                    "right top" => "Right Top",
                    "right center" => "Right Center",
                    "right bottom" => "Right Bottom",
                    "center top" => "Center Top",
                    "center center" => "Center Center",
                    "center bottom" => "Center Bottom"
                ),
                'tab' => 'layout',
            ),
            array(
                "type" => "select",
                "name" => esc_html__("Background Attachment", 'zo-mercury'),
                'desc' => esc_html__('Choose to have the background image attachment.', 'zo-mercury'),
                "id" => "page_body_bg_attachment",
                "options" => array(
                    "" => "Theme Default",
                    "scroll" => "Scroll",
                    "fixed" => "Fixed",
                    "local" => "Local"
                ),
                'tab' => 'layout',
            ),
            array(
                "type" => "select",
                "name" => esc_html__("Background Size", 'zo-mercury'),
                'desc' => esc_html__('Choose to have the background image size.', 'zo-mercury'),
                "id" => "page_body_bg_size",
                "options" => array(
                    "" => "Theme Default",
                    "cover" => "Cover",
                    "contain" => "Contain"
                ),
                'tab' => 'layout',
            ),
            array(
                "type" => "select",
                "name" => esc_html__("Background Repeat", 'zo-mercury'),
                'desc' => esc_html__('Select how the background image repeats.', 'zo-mercury'),
                "id" => "page_body_bg_repeat",
                "options" => array(
                    "" => "Tile",
                    "repeat-x" => "Tile Horizontally",
                    "repeat-y" => "Tile Vertically",
                    "no-repeat" => "No Repeat"
                ),
                'tab' => 'layout',
            ),
            array(
                'id' => 'page_boxed_bg_color',
                'name' => esc_html__('Boxed Background Color', 'zo-mercury'),
                'type' => 'color',
                'default' => '',
                'desc' => esc_html__('Controls the background color for the body background. Hex code, ex: #000', 'zo-mercury'),
                'tab' => 'layout',
            ),
            array(
                'id' => 'page_boxed_image',
                'name' => esc_html__('Boxed Background Image', 'zo-mercury'),
                'type' => 'file_input',
                'desc' => esc_html__('Select an image to use for the background.', 'zo-mercury'),
                'tab' => 'layout',
            ),
            // End Layout tab
            // Header Tab
            array(
                'id' => 'header_layout',
                'name' => esc_html__('Header Layout', 'zo-mercury'),
                'desc' => esc_html__('Choose header layout.', 'zo-mercury'),
                'type' => 'image_select',
                'options' => array(
                    'default' => get_template_directory_uri() . '/assets/images/h-default.jpg',
                    '' => get_template_directory_uri() . '/assets/images/header-0.png',
                    '1' => get_template_directory_uri() . '/assets/images/header-1.png',
                ),
				'default' => '',
                'tab' => 'header',
            ),
            array(
                'id' => 'header_width',
                'name' => esc_html__('100% Header Width', 'zo-mercury'),
                'desc' => esc_html__('Choose to set header width to 100% of the browser width. Select "No" for site width.', 'zo-mercury'),
                'type' => 'select',
                'options' => array('' => 'Default', 'on' => 'Yes', 'off' => 'No'),
                'tab' => 'header',
            ),
            array(
                'id' => 'header_transparent',
                'name' => esc_html__('Header Transparent', 'zo-mercury'),
                'desc' => esc_html__('Choose Yes to have the header transparent', 'zo-mercury'),
                'type' => 'select',
                'options' => array('' => 'Default', 'on' => 'Yes', 'off' => 'No'),
                'tab' => 'header',
            ),
            array(
                'id' => 'header_padding',
                'name' => esc_html__('Header Padding', 'zo-mercury'),
                'desc' => esc_html__('ex: 1px 1px 1px 1px, 1px 1px ...', 'zo-mercury'),
                'type' => 'text',
                'tab' => 'header',
            ),
            array(
                'id' => 'header_bg_color',
                'name' => esc_html__('Header Background Color', 'zo-mercury'),
                'type' => 'color',
                'rgba' => true,
                'default' => '',
                'desc' => esc_html__('Controls the background color for the header.', 'zo-mercury'),
                'tab' => 'header',
            ),
            array(
                'id' => 'header_bg_image',
                'name' => esc_html__('Header Background Image', 'zo-mercury'),
                'type' => 'file_input',
                'desc' => esc_html__('Select an image to use for the background.', 'zo-mercury'),
                'tab' => 'header',
            ),
            array(
                "type" => "select",
                "name" => esc_html__("Background Position", 'zo-mercury'),
                'desc' => esc_html__('Choose to have the background image position', 'zo-mercury'),
                "id" => "header_bg_position",
                "options" => array(
                    "" => "Theme Default",
                    "left top" => "Left Top",
                    "left center" => "Left Center",
                    "left bottom" => "Left Bottom",
                    "right top" => "Right Top",
                    "right center" => "Right Center",
                    "right bottom" => "Right Bottom",
                    "center top" => "Center Top",
                    "center center" => "Center Center",
                    "center bottom" => "Center Bottom"
                ),
                'tab' => 'header',
            ),
            array(
                "type" => "select",
                "name" => esc_html__("Background Attachment", 'zo-mercury'),
                'desc' => esc_html__('Choose to have the background image attachment.', 'zo-mercury'),
                "id" => "header_bg_attachment",
                "options" => array(
                    "" => "Theme Default",
                    "scroll" => "Scroll",
                    "fixed" => "Fixed",
                    "local" => "Local"
                ),
                'tab' => 'header',
            ),
            array(
                "type" => "select",
                "name" => esc_html__("Background Size", 'zo-mercury'),
                'desc' => esc_html__('Choose to have the background image size.', 'zo-mercury'),
                "id" => "header_bg_size",
                "options" => array(
                    "" => "Theme Default",
                    "cover" => "Cover",
                    "contain" => "Contain"
                ),
                'tab' => 'header',
            ),
            array(
                "type" => "select",
                "name" => esc_html__("Background Repeat", 'zo-mercury'),
                'desc' => esc_html__('Select how the background image repeats.', 'zo-mercury'),
                "id" => "header_bg_attachment",
                "options" => array(
                    "" => "Tile",
                    "repeat-x" => "Tile Horizontally",
                    "repeat-y" => "Tile Vertically",
                    "no-repeat" => "No Repeat"
                ),
                'tab' => 'header',
            ),
            array(
                'id' => 'header_logo',
                'name' => esc_html__('Custom Logo', 'zo-mercury'),
                'desc' => esc_html__('Select a logo for this page. If empty, it will show logo from theme option', 'zo-mercury'),
                'type' => 'file_input',
                'tab' => 'header',
            ),
            //MENU
            array(
                'id' => 'primary',
                'name' => esc_html__('Main Navigation Menu', 'zo-mercury'),
                'desc' => esc_html__('Select which menu displays on this page.', 'zo-mercury'),
                'type' => 'select',
                'options' => $menus,
                'tab' => 'menu',
            ),
            array(
                'id' => 'header_menu_color',
                'name' => esc_html__('Menu Color - First Level', 'zo-mercury'),
                'type' => 'color',
                'std' => '',
                'tab' => 'menu',
            ),
            array(
                'id' => 'header_menu_color_hover',
                'name' => esc_html__('Menu Hover - First Level', 'zo-mercury'),
                'type' => 'color',
                'std' => '',
                'tab' => 'menu',
            ),
            array(
                'id' => 'header_menu_color_active',
                'name' => esc_html__('Menu Active - First Level', 'zo-mercury'),
                'type' => 'color',
                'std' => '',
                'tab' => 'menu',
            ),
            array(
                'id' => 'header_sub_menu_color',
                'name' => esc_html__('Menu Color - Sub Level', 'zo-mercury'),
                'type' => 'color',
                'std' => '',
                'tab' => 'menu',
            ),
            array(
                'id' => 'header_sub_menu_color_hover',
                'name' => esc_html__('Menu Hover Active - Sub Level', 'zo-mercury'),
                'type' => 'color',
                'std' => '',
                'tab' => 'menu',
            ),
            //Page Title
            array(
                'id' => 'page_title',
                'name' => esc_html__('Page Title', 'zo-mercury'),
                'desc' => esc_html__('Choose to show or hide the page title bar.', 'zo-mercury'),
                'type' => 'select',
                'options' => array('on' => 'Show', 'off' => 'Hide'),
                'tab' => 'page_title',
            ),
            array(
                'id' => 'page_title_width',
                'name' => esc_html__('100% Page Title Width', 'zo-mercury'),
                'desc' => esc_html__('Choose to set the page title content to 100% of the browser width. Select "No" for site width. Only works with wide layout mode.', 'zo-mercury'),
                'type' => 'select',
                'options' => array('default' => 'Default', 'true' => 'Yes', 'false' => 'No'),
                'tab' => 'page_title',
            ),
            array(
                'id' => 'page_title_height',
                'name' => esc_html__('Page Title Height', 'zo-mercury'),
                'desc' => esc_html__('Set the height of the page title bar. In pixels ex: 100px.', 'zo-mercury'),
                'type' => 'text',
                'tab' => 'page_title',
            ),
            array(
                'id' => 'page_title_mobile_height',
                'name' => esc_html__('Page Title Mobile Height', 'zo-mercury'),
                'desc' => esc_html__('Set the height of the page title bar on mobile. In pixels ex: 100px.', 'zo-mercury'),
                'type' => 'text',
                'tab' => 'page_title',
            ),
			array(
                'id' => 'page_title_margin',
                'name' => esc_html__('Page Title Margin', 'zo-mercury'),
                'desc' => esc_html__('Set the margin of the page title bar. In pixels ex: 10px 20px 50px 0.', 'zo-mercury'),
                'type' => 'text',
                'tab' => 'page_title',
            ),
            array(
                'id' => 'page_title_bg_color',
                'name' => esc_html__('Page Title Background Color', 'zo-mercury'),
                'type' => 'color',
                'default' => '',
                'desc' => esc_html__('Controls the background color for the page title. Hex code, ex: #000', 'zo-mercury'),
                'tab' => 'page_title',
            ),
            array(
                'id' => 'page_title_bg_image',
                'name' => esc_html__('Page Title Background Image', 'zo-mercury'),
                'type' => 'file_input',
                'desc' => esc_html__('Select an image to use for the background.', 'zo-mercury'),
                'tab' => 'page_title',
            ),
            array(
                "type" => "select",
                "name" => esc_html__("Background Position", 'zo-mercury'),
                'desc' => esc_html__('Choose to have the background image position', 'zo-mercury'),
                "id" => "page_title_bg_position",
                'tab' => 'page_title',
                "options" => array(
                    "" => "Theme Default",
                    "left top" => "Left Top",
                    "left center" => "Left Center",
                    "left bottom" => "Left Bottom",
                    "right top" => "Right Top",
                    "right center" => "Right Center",
                    "right bottom" => "Right Bottom",
                    "center top" => "Center Top",
                    "center center" => "Center Center",
                    "center bottom" => "Center Bottom"
                )
            ),
            array(
                "type" => "select",
                "name" => esc_html__("Background Attachment", 'zo-mercury'),
                'desc' => esc_html__('Choose to have the background image attachment.', 'zo-mercury'),
                "id" => "page_title_bg_attachment",
                'tab' => 'page_title',
                "options" => array(
                    "" => "Theme Default",
                    "scroll" => "Scroll",
                    "fixed" => "Fixed",
                    "local" => "Local"
                )
            ),
            array(
                "type" => "select",
                "name" => esc_html__("Background Size", 'zo-mercury'),
                'desc' => esc_html__('Choose to have the background image size.', 'zo-mercury'),
                "id" => "page_title_bg_size",
                'tab' => 'page_title',
                "options" => array(
                    "" => "Theme Default",
                    "cover" => "Cover",
                    "contain" => "Contain"
                )
            ),
            array(
                "type" => "select",
                "name" => esc_html__("Background Repeat", 'zo-mercury'),
                'desc' => esc_html__('Select how the background image repeats.', 'zo-mercury'),
                "id" => "page_title_bg_attachment",
                'tab' => 'page_title',
                "options" => array(
                    "" => "Tile",
                    "repeat-x" => "Tile Horizontally",
                    "repeat-y" => "Tile Vertically",
                    "no-repeat" => "No Repeat"
                )
            ),
            array(
                'id' => 'page_title_text_bar',
                'name' => esc_html__('Page Title Text', 'zo-mercury'),
                'desc' => esc_html__('Choose to show or hide the page title bar text.', 'zo-mercury'),
                'type' => 'select',
                'tab' => 'page_title',
                'options' => array('on' => 'Show', 'off' => 'Hide'),
            ),
            array(
                'id' => 'page_title_text_alignment',
                'name' => esc_html__('Text Alignment', 'zo-mercury'),
                'desc' => esc_html__('Choose the title and subhead text alignment.', 'zo-mercury'),
                'type' => 'select',
                'tab' => 'page_title',
                'options' => array(
                    'default' => esc_html__('Default', 'zo-mercury'),
                    'left' => esc_html__('Left', 'zo-mercury'),
                    'center' => esc_html__('Center', 'zo-mercury'),
                    'right' => esc_html__('Right', 'zo-mercury'),
                )
            ),
            array(
                'id' => 'page_title_text_horizontal_alignment',
                'name' => esc_html__('Text Horizotal Alignment', 'zo-mercury'),
                'desc' => esc_html__('Choose the title and subhead text horizotal alignment.', 'zo-mercury'),
                'type' => 'select',
                'tab' => 'page_title',
                'options' => array(
                    'default' => esc_html__('Default', 'zo-mercury'),
                    'middle' => esc_html__('Middle', 'zo-mercury'),
                    'custom' => esc_html__('Custom Padding', 'zo-mercury'),
                )
            ),
            array(
                'id' => 'page_title_text_padding_top',
                'name' => esc_html__('Padding Top', 'zo-mercury'),
                'desc' => esc_html__('Set the padding top of the page title text. In pixels ex: 100.', 'zo-mercury'),
                'type' => 'text',
                'tab' => 'page_title',
            ),
            array(
                'id' => 'page_title_text_padding_bottom',
                'name' => esc_html__('Padding Bottom', 'zo-mercury'),
                'desc' => esc_html__('Set the padding bottom of the page title text. In pixels ex: 100.', 'zo-mercury'),
                'type' => 'text',
                'tab' => 'page_title',
            ),
            array(
                'id' => 'page_title_text',
                'name' => esc_html__('Page Title Custom Text', 'zo-mercury'),
                'desc' => esc_html__('Insert custom text for the page title bar.', 'zo-mercury'),
                'type' => 'text',
                'tab' => 'page_title',
            ),
            array(
                'id' => 'page_title_sub_text',
                'name' => esc_html__('Page Title Custom Sub Text', 'zo-mercury'),
                'desc' => esc_html__('Insert custom subhead text for the page title bar.', 'zo-mercury'),
                'type' => 'text',
                'tab' => 'page_title',
            ),
            array(
                'id' => 'page_title_breadcrumb_display',
                'name' => esc_html__('Breadcrumbs', 'zo-mercury'),
                'desc' => esc_html__('Choose to display the breadcrumbs, sidebar or none.', 'zo-mercury'),
                'type' => 'select',
                'tab' => 'page_title',
                'options' => array(
                    'default' => esc_html__('Default', 'zo-mercury'),
                    'none' => esc_html__('None', 'zo-mercury'),
                    'breadcrumb' => esc_html__('Breadcrumbs', 'zo-mercury'),
                    'sidebar' => esc_html__('Page Title Sidebar', 'zo-mercury'),
                )
            ),
            array(
                'id' => 'page_title_breadcrumb_position',
                'name' => esc_html__('Breadcrumbs Position', 'zo-mercury'),
                'desc' => esc_html__('Controls where to displays in the Page Title area. (Symmetric is not avalaible when Page Title Text Alignment center)', 'zo-mercury'),
                'type' => 'select',
                'options' => array(
                    'default' => esc_html__('Default', 'zo-mercury'),
                    'bellow' => esc_html__('Bellow', 'zo-mercury'),
                    'above' => esc_html__('Above', 'zo-mercury'),
                    'symmetric' => esc_html__('Symmetric', 'zo-mercury'),
                ),
                'tab' => 'page_title',
            ),
            //Content
            array(
                'id' => 'content_width',
                'name' => esc_html__('Content Width', 'zo-mercury'),
                'desc' => esc_html__('Choose the content width, Container is standard width (1170px), Container Fluid is full content width by Layout', 'zo-mercury'),
                'type' => 'select',
                'options' => array('container' => 'Container', 'container-fluid' => 'Container Fluid'),
                'tab' => 'content',
                'std' => 'container-fluid',
            ),
            array(
                'id' => 'content_sidebar',
                'name' => esc_html__('Sidebar', 'zo-mercury'),
                'desc' => esc_html__('Choose the main sidebar for the content, default is full width content (no sidebar). Sidebar width is define from theme option', 'zo-mercury'),
                'type' => 'image_select',
                'options' => array(
                    'default' => get_template_directory_uri() . '/assets/images/mercury-no-sidebar.jpg',
                    'left' => get_template_directory_uri() . '/assets/images/mercury-left-sidebar.jpg',
                    'right' => get_template_directory_uri() . '/assets/images/mercury-right-sidebar.jpg',
                ),
                'std' => 'default',
                'tab' => 'content',
            ),
            //Footer
            array(
                'id' => 'footer_layout',
                'name' => esc_html__('Footer Layout', 'zo-mercury'),
                'desc' => esc_html__('Choose footer layout.', 'zo-mercury'),
                'type' => 'image_select',
                'options' => array(
					'default' => get_template_directory_uri() . '/assets/images/h-default.jpg',
                    '' => get_template_directory_uri() . '/assets/images/footer-0.png',
                    '1' => get_template_directory_uri() . '/assets/images/footer-1.png',
                ),
                'tab' => 'footer',
            ),
            array(
                'id' => 'footer_width',
                'name' => esc_html__('100% Footer Width', 'zo-mercury'),
                'desc' => esc_html__('Choose to set footer width to 100% of the browser width. Select "No" for site width.', 'zo-mercury'),
                'type' => 'select',
                'options' => array('' => 'Default', 'on' => 'Yes', 'off' => 'No'),
                'tab' => 'footer',
            ),
            array(
                'id' => 'footer_widget',
                'name' => esc_html__('Display Footer Widget Area', 'zo-mercury'),
                'desc' => esc_html__('Choose to show or hide the footer widget area.', 'zo-mercury'),
                'type' => 'select',
                'options' => array('' => 'Default', 'on' => 'Yes', 'off' => 'No'),
                'tab' => 'footer',
            ),
            array(
                'id' => 'footer_bg_color',
                'name' => esc_html__('Footer Background Color', 'zo-mercury'),
                'type' => 'color',
                'default' => '',
                'desc' => esc_html__('Controls the background color for the footer. Hex code, ex: #000', 'zo-mercury'),
                'tab' => 'footer',
            ),
            array(
                'id' => 'footer_bg_image',
                'name' => esc_html__('Footer Background Image', 'zo-mercury'),
                'type' => 'file_input',
                'desc' => esc_html__('Select an image to use for the background.', 'zo-mercury'),
                'tab' => 'footer',
                'clone' => false,
            ),
            array(
                "type" => "select",
                "name" => esc_html__("Background Position", 'zo-mercury'),
                'desc' => esc_html__('Choose to have the background image position', 'zo-mercury'),
                "id" => "footer_bg_position",
                "options" => array(
                    "" => "Theme Default",
                    "left top" => "Left Top",
                    "left center" => "Left Center",
                    "left bottom" => "Left Bottom",
                    "right top" => "Right Top",
                    "right center" => "Right Center",
                    "right bottom" => "Right Bottom",
                    "center top" => "Center Top",
                    "center center" => "Center Center",
                    "center bottom" => "Center Bottom"
                ),
                'tab' => 'footer',
            ),
            array(
                "type" => "select",
                "name" => esc_html__("Background Attachment", 'zo-mercury'),
                'desc' => esc_html__('Choose to have the background image attachment.', 'zo-mercury'),
                "id" => "footer_bg_attachment",
                "options" => array(
                    "" => "Theme Default",
                    "scroll" => "Scroll",
                    "fixed" => "Fixed",
                    "local" => "Local"
                ),
                'tab' => 'footer',
            ),
            array(
                "type" => "select",
                "name" => esc_html__("Background Size", 'zo-mercury'),
                'desc' => esc_html__('Choose to have the background image size.', 'zo-mercury'),
                "id" => "footer_bg_size",
                "options" => array(
                    "" => "Theme Default",
                    "cover" => "Cover",
                    "contain" => "Contain"
                ),
                'tab' => 'footer',
            ),
            array(
                "type" => "select",
                "name" => esc_html__("Background Repeat", 'zo-mercury'),
                'desc' => esc_html__('Select how the background image repeats.', 'zo-mercury'),
                "id" => "footer_bg_attachment",
                "options" => array(
                    "" => "Tile",
                    "repeat-x" => "Tile Horizontally",
                    "repeat-y" => "Tile Vertically",
                    "no-repeat" => "No Repeat"
                ),
                'tab' => 'footer',
            ),
            array(
                'id' => 'footer_copyright',
                'name' => esc_html__('Display Copyright', 'zo-mercury'),
                'desc' => esc_html__('Choose to show or hide the copyright area.', 'zo-mercury'),
                'type' => 'select',
                'options' => array('' => 'Default', 'on' => 'Yes', 'off' => 'No'),
                'tab' => 'footer',
            ),
            array(
                'id' => 'footer_copyright_bg_color',
                'name' => esc_html__('Copyright Background Color', 'zo-mercury'),
                'type' => 'color',
                'default' => '',
                'desc' => esc_html__('Controls the background color for the copyright. Hex code, ex: #000', 'zo-mercury'),
                'tab' => 'footer',
            ),
			array(
                'id' => 'footer_logo',
                'name' => esc_html__('Custom Logo for Footer 01', 'zo-mercury'),
                'desc' => esc_html__('Select a logo Footer for this page. If empty, it will show logo from theme option', 'zo-mercury'),
                'type' => 'file_input',
                'tab' => 'footer',
            ),
        ),
    );

    $meta_boxes[] = array(
        'title' => esc_html__('Extra', 'zo-mercury'),
        'post_types' => 'testimonial',
        'fields' => array(
            array(
                'id' => 'position',
                'name' => esc_html__('Position', 'zo-mercury'),
                'type' => 'text',
            ),
        ),
    );
	$meta_boxes[] = array(
        'title' => esc_html__('Team Options', 'zo-mercury'),
        'post_types' => 'team',
        'tabs' => array(
            'profile' => array(
                'label' => esc_html__('Profile', 'zo-mercury'),
                'icon' => 'dashicons-welcome-learn-more'
            ),
            'social' => array(
                'label' => esc_html__('Social', 'zo-mercury'),
                'icon' => 'dashicons-share'
            ),
        ),
        'tab_style' => 'left',
        'fields' => array(
			array(
				'id' 	=> 'team_position',
				'name' 	=> esc_html__('Position', 'zo-mercury'),
				'type' 	=> 'text',
				'tab' 	=> 'profile',
			),
			array(
				'id' 			=> 'team_facebook',
				'name' 			=> esc_html__('Facebook', 'zo-mercury'),
				'type' 			=> 'text',
				'value' 		=> '',
				'placeholder'	=> 'Input link Facebok',
				'tab' 			=> 'social',
			),
			array(
				'id' 			=> 'team_twitter',
				'name' 			=> esc_html__('Twitter', 'zo-mercury'),
				'type' 			=> 'text',
				'value' 		=> '',
				'placeholder'	=> 'Input link Twitter',
				'tab' 			=> 'social',
			),
			array(
				'id' 			=> 'team_google',
				'name' 			=> esc_html__('Google', 'zo-mercury'),
				'type' 			=> 'text',
				'value' 		=> '',
				'placeholder'	=> 'Input link Google',
				'tab' 			=> 'social',
			),
			array(
				'id' 			=> 'team_in',
				'name' 			=> esc_html__('Linked in', 'zo-mercury'),
				'type' 			=> 'text',
				'value' 		=> '',
				'placeholder'	=> 'Input Linked In',
				'tab' 			=> 'social',
			),
        ),
    );
	$meta_boxes[] = array(
        'title' => esc_html__('Pricing Options', 'zo-mercury'),
        'post_types' => 'pricing',
        'tabs' => array(
            'general' => array(
                'label' => esc_html__('General', 'zo-mercury'),
                'icon' => 'dashicons-admin-generic'
            ),
        ),
        'tab_style' => 'left',
        'fields' => array(
			array(
				'id' => 'price',
				'name' => esc_html__('Price','zo-mercury'),
				'type' => 'text',
				'tab' 	=> 'general',
			),
			array(
				'id' => 'discount',
				'name' => esc_html__('Discount','zo-mercury'),
				'type' => 'text',
				'tab' 	=> 'general',
			),
			array(
				'id' => 'type',
				'name' => esc_html__('Type','zo-mercury'),
				'type' => 'select',
				'options' => array(
					'1' => 'Daily',
					'month' => 'Monthly',
					'365' => 'Yearly'
				),
				'tab' 	=> 'general',
			),
			array(
				'id' => 'button_text',
				'name' => esc_html__('Button Text','zo-mercury'),
				'type' => 'text',
				'tab' 	=> 'general',
				'default' => 'general',
			)
        ),
    );

    return $meta_boxes;
}

?>