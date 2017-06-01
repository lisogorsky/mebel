<?php
/**
 * Auto create css from Meta Options.
 *
 * @author ZoTheme
 * @version 1.0.0
 */
class Zo_Mercury_DynamicCss {

    function __construct() {
        add_action('wp_head', array($this, 'generate_css'));
    }

    /**
     * generate css inline.
     *
     * @since 1.0.0
     */
    public function generate_css() {
        global $zo_mercury_data, $zo_mercury_base;
        $css = $this->css_render();
        if (!empty($zo_mercury_data['dev_mode'])) {
            $css = $zo_mercury_base->compressCss($css);
        }
        echo '<style type="text/css" data-type="zo_shortcodes-custom-css">' . $css . '</style>';
    }

    /**
     * header css
     *
     * @since 1.0.0
     * @return string
     */
    public function css_render() {
        global $zo_mercury_data;
        $zo_mercury_meta = zo_mercury_post_meta();
        ob_start();

        /* Custom Css. */
        if (isset($zo_mercury_data['custom_css'])) {
            echo wp_filter_nohtml_kses(trim($zo_mercury_data['custom_css'])) . "\n";
        }

        // LAYOUT
        if (!empty($zo_mercury_data['body_background'])) {
            $body_bg = array();
            $body_bg = $zo_mercury_data['body_background'];
            if (!empty($zo_mercury_meta['page_body_bg_color'])) {
                $body_bg['background-color'] = esc_attr($zo_mercury_meta['page_body_bg_color']);
            }
            if (!empty($zo_mercury_meta['page_body_bg_image'])) {
                $body_bg['background-image'] = esc_url($zo_mercury_meta['page_body_bg_image']);
                if (!empty($zo_mercury_meta['page_body_bg_repeat'])) {
                    $body_bg['background-repeat'] = esc_attr($zo_mercury_meta['page_body_bg_repeat']);
                }
                if (!empty($zo_mercury_meta['page_body_bg_size'])) {
                    $body_bg['background-size'] = esc_attr($zo_mercury_meta['page_body_bg_size']);
                }
                if (!empty($zo_mercury_meta['page_body_bg_attachment'])) {
                    $body_bg['background-attachment'] = esc_attr($zo_mercury_meta['page_body_bg_attachment']);
                }
                if (!empty($zo_mercury_meta['page_body_bg_position'])) {
                    $body_bg['background-position'] = esc_attr($zo_mercury_meta['page_body_bg_position']);
                }
            }
            echo 'body{' . zo_mercury_general_background($body_bg) . '}';
        }

        // BOXED BACKGROUND
        if (!empty($zo_mercury_data['body_boxed_background'])) {
            $boxed_bg = array();
            $boxed_bg = $zo_mercury_data['body_boxed_background'];
            if (!empty($zo_mercury_meta['page_boxed_bg_color'])) {
                $body_bg['background-color'] = esc_attr($zo_mercury_meta['page_boxed_bg_color']);
            }
            if (!empty($zo_mercury_meta['page_boxed_image'])) {
                $body_bg['background-image'] = esc_url($zo_mercury_meta['page_boxed_image']);
            }
            echo 'body.zo-boxed #page{' . zo_mercury_general_background($boxed_bg) . '}';
        }

        // HEADER
        $header_bg = array();
        if (!empty($zo_mercury_data['bg_header'])) {
            $header_bg = $zo_mercury_data['bg_header'];
            $header_bg['background-color'] = '#FFFFFF';
            if (!empty($zo_mercury_meta['header_bg_color'])) {
                $header_bg['background-color'] = esc_attr($zo_mercury_meta['header_bg_color']);
            } elseif (!empty($zo_mercury_data['bg_header_color'])) {
                $header_bg['background-color'] = $zo_mercury_data['bg_header_color']['color'];
            }
            if (!empty($zo_mercury_meta['header_bg_image'])) {
                $header_bg['background-image'] = esc_url($zo_mercury_meta['header_bg_image']);
                if (!empty($zo_mercury_meta['header_bg_repeat'])) {
                    $header_bg['background-repeat'] = esc_attr($zo_mercury_meta['header_bg_repeat']);
                }
                if (!empty($zo_mercury_meta['header_bg_size'])) {
                    $header_bg['background-size'] = esc_attr($zo_mercury_meta['header_bg_size']);
                }
                if (!empty($zo_mercury_meta['header_bg_attachment'])) {
                    $header_bg['background-attachment'] = esc_attr($zo_mercury_meta['header_bg_attachment']);
                }
                if (!empty($zo_mercury_meta['header_bg_position'])) {
                    $header_bg['background-position'] = esc_attr($zo_mercury_meta['header_bg_position']);
                }
            }
            echo '#zo-header {' . zo_mercury_general_background($header_bg) . '}';
        }

        if (!empty($zo_mercury_meta['header_transparent'])) {
            if ($zo_mercury_meta['header_transparent'] == 'on') {
                echo '#zo-header.header-transparent{position: absolute;}';
            }
        } else {
            if (isset($zo_mercury_data['header_transparent']) && $zo_mercury_data['header_transparent']) {
                echo '#zo-header.header-transparent{position: absolute;}';
            }
        }
		
		if (!empty($zo_mercury_meta['header_padding'])) {
			echo '#zo-header:not(.header-fixed){
				padding: '.$zo_mercury_meta['header_padding'].';
			}';
		}

        $pt_bg = array();
        if (!empty($zo_mercury_data['pt_background'])) {
            $pt_bg = $zo_mercury_data['pt_background'];
            if (!empty($zo_mercury_meta['page_title_bg_color'])) {
                $pt_bg['background-color'] = esc_attr(['page_title_bg_color']);
            }
            if (!empty($zo_mercury_meta['page_title_bg_image'])) {
                $pt_bg['background-image'] = esc_url($zo_mercury_meta['page_title_bg_image']);
                if (!empty($zo_mercury_meta['page_title_bg_repeat'])) {
                    $pt_bg['background-repeat'] = esc_attr($zo_mercury_meta['page_title_bg_repeat']);
                }
                if (!empty($zo_mercury_meta['page_title_bg_size'])) {
                    $pt_bg['background-size'] = esc_attr($zo_mercury_meta['page_title_bg_size']);
                }
                if (!empty($zo_mercury_meta['page_title_bg_attachment'])) {
                    $pt_bg['background-attachment'] = esc_attr($zo_mercury_meta['page_title_bg_attachment']);
                }
                if (!empty($zo_mercury_meta['page_title_bg_position'])) {
                    $pt_bg['background-position'] = esc_attr($zo_mercury_meta['page_title_bg_position']);
                }
            }
        }
        if (!empty($zo_mercury_meta['page_title_text_alignment']) && $zo_mercury_meta['page_title_text_alignment'] != 'default') {
            $zo_mercury_data['pt_alignment'] = $zo_mercury_meta['page_title_text_alignment'];
        }
        if (!empty($zo_mercury_meta['page_title_text_horizontal_alignment']) && $zo_mercury_meta['page_title_text_horizontal_alignment'] != 'default') {
            $zo_mercury_data['pt_vertical_alignment'] = $zo_mercury_meta['page_title_text_horizontal_alignment'];
            if (!empty($zo_mercury_meta['page_title_text_padding_top']) && is_numeric($zo_mercury_meta['page_title_text_padding_top'])) {
                $zo_mercury_data['pt_text_padding']['padding-top'] = $zo_mercury_meta['page_title_text_padding_top'] . 'px';
            }
            if (!empty($zo_mercury_meta['page_title_text_padding_bottom']) && is_numeric($zo_mercury_meta['page_title_text_padding_bottom'])) {
                $zo_mercury_data['pt_text_padding']['padding-bottom'] = $zo_mercury_meta['page_title_text_padding_bottom'] . 'px';
            }
        }
        if (!empty($zo_mercury_meta['page_title_breadcrumb_display']) && $zo_mercury_meta['page_title_breadcrumb_display'] != 'default') {
            $zo_mercury_data['pt_breadcrumb'] = $zo_mercury_meta['page_title_breadcrumb_display'];
        }
        if (!empty($zo_mercury_meta['page_title_breadcrumb_position']) && $zo_mercury_meta['page_title_breadcrumb_position'] != 'default') {
            $zo_mercury_data['pt_breadcrumb_position'] = $zo_mercury_meta['page_title_breadcrumb_position'];
        }

        //PAGE TITLE
        echo '#zo-page-element-wrap {';
        // Background
        echo zo_mercury_general_background($pt_bg);

        // Page Title Margin
        if(!empty($zo_mercury_meta['page_title_margin'])){
             echo 'margin: ' . esc_attr($zo_mercury_meta['page_title_margin']) . ';';
        }else{
            if (!empty($zo_mercury_data['pt_margin']['margin-top']))
                echo 'margin-top: ' . esc_attr($zo_mercury_data['pt_margin']['margin-top']) . ';';
            if (!empty($zo_mercury_data['pt_margin']['margin-left']))
                echo 'margin-left: ' . esc_attr($zo_mercury_data['pt_margin']['margin-left']) . ';';
            if (!empty($zo_mercury_data['pt_margin']['margin-bottom']))
                echo 'margin-bottom: ' . esc_attr($zo_mercury_data['pt_margin']['margin-bottom']) . ';';
            if (!empty($zo_mercury_data['pt_margin']['margin-right']))
                echo 'margin-right: ' . esc_attr($zo_mercury_data['pt_margin']['margin-right']) . ';';
        }

        // Page Title Height
        if (!empty($zo_mercury_data['pt_vertical_alignment']) && $zo_mercury_data['pt_vertical_alignment'] == 'middle') {
            if (!empty($zo_mercury_meta['page_title_height']) && is_numeric($zo_mercury_meta['page_title_height'])) {
                echo 'height: ' . esc_attr($zo_mercury_meta['page_title_height']) . 'px;';
            } else {
                if (!empty($zo_mercury_data['pt_height']))
                    echo 'height: ' . esc_attr($zo_mercury_data['pt_height']) . 'px;';
            }
        }else {
            if (!empty($zo_mercury_meta['page_title_height']) && is_numeric($zo_mercury_meta['page_title_height'])) {
                echo 'min-height: ' . esc_attr($zo_mercury_meta['page_title_height']) . 'px;';
            } else {
                if (!empty($zo_mercury_data['pt_height']))
                    echo 'min-height: ' . esc_attr($zo_mercury_data['pt_height']) . 'px;';
            }
        }

        // Page Title Border
        if (!empty($zo_mercury_data['pt_border_color'])) {
            if (!empty($zo_mercury_data['pt_border_width_top'])) {
                echo 'border-top: ' . $zo_mercury_data['pt_border_width_top'] . 'px solid ' . $zo_mercury_data['pt_border_color'] . ';';
            }
            if (!empty($zo_mercury_data['pt_border_width_bottom'])) {
                echo 'border-bottom: ' . $zo_mercury_data['pt_border_width_bottom'] . 'px solid ' . $zo_mercury_data['pt_border_color'] . ';';
            }
        }
        echo '}';

        echo '@media(max-width: 991px) {';
        echo '#zo-page-element-wrap {';
        //Page Title Mobile Height
        if (!empty($zo_mercury_data['pt_vertical_alignment']) && $zo_mercury_data['pt_vertical_alignment'] == 'middle') {
            if (!empty($zo_mercury_meta['page_title_mobile_height']) && is_numeric($zo_mercury_meta['page_title_mobile_height'])) {
                echo 'height: ' . esc_attr($zo_mercury_meta['page_title_mobile_height']) . 'px;';
            } else {
                if (!empty($zo_mercury_data['pt_mobile_height'])) {
                    echo 'height: ' . esc_attr($zo_mercury_data['pt_mobile_height']) . 'px;';
                }
            }
        } else {
            if (!empty($zo_mercury_meta['page_title_mobile_height']) && is_numeric($zo_mercury_meta['page_title_mobile_height'])) {
                echo 'min-height: ' . esc_attr($zo_mercury_meta['page_title_mobile_height']) . 'px;';
            } else {
                if (!empty($zo_mercury_data['pt_mobile_height'])) {
                    echo 'min-height: ' . esc_attr($zo_mercury_data['pt_mobile_height']) . 'px;';
                }
            }
        }
        echo '}';
        echo '}';

        if (!empty($zo_mercury_data['pt_alignment'])) {

            if ($zo_mercury_data['pt_alignment'] != 'center' && $zo_mercury_data['pt_breadcrumb'] != 'none' && $zo_mercury_data['pt_breadcrumb_position'] == 'symmetric') {
                echo '#zo-page-element-wrap .zo-page-title-content{ display: table;width: 100%;}';
                echo '#zo-page-element-wrap .zo-page-title-content .zo-page-title-text,';
                echo '#zo-page-element-wrap .zo-page-title-content .zo-page-title-secondary{';
                echo 'width: 50%; display: table-cell;';
                echo '}';
            }

            if ($zo_mercury_data['pt_alignment'] == 'right') {
                echo '#zo-page-element-wrap .zo-page-title-content .zo-page-title-text {text-align: right;}';
                echo '#zo-page-element-wrap .zo-page-title-content .zo-page-title-secondary {text-align: left;}';
            } elseif ($zo_mercury_data['pt_alignment'] == 'left') {
                echo '#zo-page-element-wrap .zo-page-title-content .zo-page-title-text {text-align: left;}';
                echo '#zo-page-element-wrap .zo-page-title-content .zo-page-title-secondary {text-align: right;}';
            } else {
                echo '#zo-page-element-wrap .zo-page-title-content .zo-page-title-text {text-align: center;}';
            }
        }
        if (!empty($zo_mercury_data['pt_vertical_alignment'])) {
            if ($zo_mercury_data['pt_vertical_alignment'] == 'middle') {
                echo '#zo-page-element-wrap .zo-page-title-container{';
                echo 'height: 100%;';
                echo '}';

                echo '#zo-page-element-wrap .zo-page-title-content{';
                echo 'height: 100%; display: table;width: 100%;';
                echo '}';

                echo '#zo-page-element-wrap .zo-page-title-content .zo-page-title-text,';
                echo '#zo-page-element-wrap .zo-page-title-content .zo-page-title-secondary{';
                echo 'vertical-align: middle; display: table-cell;position: relative;z-index: 1;';
                echo '}';
            } elseif ($zo_mercury_data['pt_vertical_alignment'] == 'custom') {
                echo '#zo-page-element-wrap .zo-page-title-container{';
                if (!empty($zo_mercury_data['pt_text_padding']['padding-top']))
                    echo 'padding-top: ' . $zo_mercury_data['pt_text_padding']['padding-top'] . ';';
                if (!empty($zo_mercury_data['pt_text_padding']['padding-bottom']))
                    echo 'padding-bottom: ' . $zo_mercury_data['pt_text_padding']['padding-bottom'] . ';';
                echo '}';
            }
        }

        // FOOTER
        $footer_bg = array();
        if (!empty($zo_mercury_data['footer_background'])) {
            $footer_bg = $zo_mercury_data['footer_background'];
            if (!empty($zo_mercury_meta['footer_bg_color'])) {
                $footer_bg['background-color'] = esc_attr($zo_mercury_meta['footer_bg_color']);
            }
            if (!empty($zo_mercury_meta['footer_bg_image'])) {
                $footer_bg['background-image'] = esc_url($zo_mercury_meta['footer_bg_image']);
            }
            if (!empty($zo_mercury_meta['footer_bg_repeat'])) {
                $footer_bg['background-repeat'] = esc_attr($zo_mercury_meta['footer_bg_repeat']);
            }
            if (!empty($zo_mercury_meta['footer_bg_size'])) {
                $footer_bg['background-size'] = esc_attr($zo_mercury_meta['footer_bg_size']);
            }
            if (!empty($zo_mercury_meta['footer_bg_attachment'])) {
                $footer_bg['background-attachment'] = esc_attr($zo_mercury_meta['footer_bg_attachment']);
            }
            if (!empty($zo_mercury_meta['footer_bg_position'])) {
                $footer_bg['background-position'] = esc_attr($zo_mercury_meta['footer_bg_position']);
            }
			if (!empty($zo_mercury_meta['footer_bg_color'])) {
				echo '#page #zo-footer {';
			}else{
				echo '#zo-footer {';
			} 

            // Background
            echo zo_mercury_general_background($footer_bg);
            // Footer Content Borders
            if (!empty($zo_mercury_data['footer_border_color'])) {
                if (!empty($zo_mercury_data['footer_border_width_top'])) {
                    echo 'border-top: ' . $zo_mercury_data['footer_border_width_top'] . 'px solid ' . $zo_mercury_data['footer_border_color'] . ';';
                }
            }
            echo '}';
        }

        if (!empty($zo_mercury_meta['footer_copyright_bg_color'])) {
            echo '#page #zo-footer-copyright {';
            echo 'background-color: ' . esc_attr($zo_mercury_meta['footer_copyright_bg_color']) . ';';
            echo '}';
        } else {
            if (!empty($zo_mercury_data['footer_copyright_background'])) {
                echo '#zo-footer-copyright {';
                echo 'background-color: ' . esc_attr($zo_mercury_data['footer_copyright_background']) . ';';
                echo '}';
            }
        }
        // Background color



        /* Custom Menu Color */
        echo '@media (min-width: 992px){';
            if (!empty($zo_mercury_meta['header_menu_color'])) {
                echo ".zo-header-navigation .nav-menu > li,
				.zo-header-navigation .nav-menu > li > a,
				.widget_cart_search_wrap a {
					color: " . esc_attr($zo_mercury_meta['header_menu_color']) . ";
				}\n";
            }
            if (!empty($zo_mercury_meta['header_menu_color_hover'])) {
                echo ".zo-header-navigation .nav-menu > li:hover,
				.nav-menu > li:hover > a,
				.widget_cart_search_wrap a:hover {
					color: " . esc_attr($zo_mercury_meta['header_menu_color_hover']) . ";
				}\n";
                echo ".zo-header-navigation .nav-menu > li:hover {
					border-bottom-color: " . esc_attr($zo_mercury_meta['header_menu_color_hover']) . ";
				}\n";
            }
            if (!empty($zo_mercury_meta['header_menu_color_active'])) {
                echo ".zo-header-navigation .nav-menu > li.current-menu-item,
				.zo-header-navigation .nav-menu > li.current-menu-ancestor,
				.zo-header-navigation .nav-menu > li.current_page_item,
				.zo-header-navigation .nav-menu > li.current_page_ancestor,
				.zo-header-navigation .nav-menu > li.current-menu-parent,
				.zo-header-navigation .nav-menu > li.current-menu-item > a,
				.zo-header-navigation .nav-menu > li.current-menu-ancestor > a,
				.zo-header-navigation .nav-menu > li.current_page_item > a,
				.zo-header-navigation .nav-menu > li.current_page_ancestor > a,
				.zo-header-navigation .nav-menu > li.current-menu-parent > a,
				.widget_cart_search_wrap a:active,
				.widget_cart_search_wrap a:focus {
					color: " . esc_attr($zo_mercury_meta['header_menu_color_active']) . ";
				}\n";
                echo ".zo-header-navigation .nav-menu > li.current-menu-parent > a,
				.zo-header-navigation .nav-menu > li.current-menu-item > a,
				.zo-header-navigation .nav-menu > li.current-menu-ancestor > a,
				.zo-header-navigation .nav-menu > li.current_page_item > a,
				.zo-header-navigation .nav-menu > li.current_page_ancestor > a {
					border-bottom-color: " . esc_attr($zo_mercury_meta['header_menu_color_active']) . ";
				}\n";
            }
            /* Sub Level */
            if (!empty($zo_mercury_meta['header_sub_menu_color'])) {
                echo ".zo-header-navigation .nav-menu > li ul li,
				.zo-header-navigation .nav-menu > li ul li > a {
                    color:" . esc_attr($zo_mercury_meta['header_sub_menu_color']) . ";
                }";
            }
            if (!empty($zo_mercury_meta['header_sub_menu_color_hover'])) {
                echo ".zo-header-navigation .nav-menu > li ul a:focus,
				.zo-header-navigation .nav-menu > li ul li:hover,
				.zo-header-navigation .nav-menu > li ul li.current-menu-item,
                                .zo-header-navigation .nav-menu > li ul li.current-menu-parent,
                                .zo-header-navigation .nav-menu > li ul li.current-menu-ancestor,
                                .zo-header-navigation .nav-menu > li ul li.current_page_item,
				.zo-header-navigation .nav-menu > li ul li:hover > a,
                                .zo-header-navigation .nav-menu > li ul li.current-menu-item > a,
				.zo-header-navigation .nav-menu > li ul li.current-menu-parent > a,
                                .zo-header-navigation .nav-menu > li ul li.current-menu-ancestor > a,
				.zo-header-navigation .nav-menu > li ul li.current_page_item > a  {
                    color:" . esc_attr($zo_mercury_meta['header_sub_menu_color_hover']) . ";
                }";
            }
		echo '}';

        /* Start Page Title */
        if (!empty($zo_mercury_meta['page_title']) && $zo_mercury_meta['page_title'] == 'on') {
            echo "#zo-page-element-wrap {";
            if (!empty($zo_mercury_meta['page_title_height'])) {
                echo 'height: ' . esc_attr($zo_mercury_meta['page_title_height']) . 'px;';
            }
            if (!empty($zo_mercury_meta['page_title_background_color'])) {
                echo 'background-color: ' . esc_attr($zo_mercury_meta['page_title_background_color']) . ';';
            }
            if (!empty($zo_mercury_meta['page_title_background_image'])) {
                echo "background-image: url('" . esc_url(wp_get_attachment_image_src($zo_mercury_meta['page_title_background_image'], 'full')[0]) . "');";
            }
            if (!empty($zo_mercury_meta['page_title_background_repeat'])) {
                echo 'background-repeat:' . esc_attr($zo_mercury_meta['page_title_background_repeat']) . ' ;';
            }
            if (!empty($zo_mercury_meta['page_title_background_position'])) {
                echo 'background-position: ' . esc_attr($zo_mercury_meta['page_title_background_position']) . ';';
            }
            if (!empty($zo_mercury_meta['page_title_background_cover'])) {
                echo 'background-size:' . esc_attr($zo_mercury_meta['page_title_background_cover']) . ' ;';
            }
            if (!empty($zo_mercury_meta['page_title_background_fixed'])) {
                echo 'background-attachment:' . esc_attr($zo_mercury_meta['page_title_background_fixed']) . ' ;';
            }
            if (!empty($zo_mercury_meta['page_title_margin'])) {
                echo "margin: " . esc_attr($zo_mercury_meta['page_title_margin']) . ";";
            }
            echo "}\n";

            /* Page Title Text */
            if (!empty($zo_mercury_meta['page_title_text_bar']) && $zo_mercury_meta['page_title_text_bar'] == 'on') {
                if (!empty($zo_mercury_meta['page_title_text_alignment'])) {
                    if ($zo_mercury_meta['page_title_text_alignment'] != 'center' && !empty($zo_mercury_meta['page_title_breadcrumb_display']) &&
                            $zo_mercury_meta['page_title_breadcrumb_display'] != 'none' && !empty($zo_mercury_meta['page_title_breadcrumb_position']) && $zo_mercury_meta['page_title_breadcrumb_position'] == 'symmetric') {
                        echo '#zo-page-element-wrap .zo-page-title-content{ display: table;width: 100%;}';
                        echo '#zo-page-element-wrap .zo-page-title-content .zo-page-title-text,';
                        echo '#zo-page-element-wrap .zo-page-title-content .zo-page-title-secondary{';
                        echo 'width: 50%; display: table-cell;';
                        echo '}';
                    }
                    if ($zo_mercury_meta['page_title_text_alignment'] == 'right') {
                        echo '#zo-page-element-wrap .zo-page-title-content .zo-page-title-text {text-align: right;}';
                        echo '#zo-page-element-wrap .zo-page-title-content .zo-page-title-secondary {text-align: left;}';
                    } else if ($zo_mercury_meta['page_title_text_alignment'] == 'left') {
                        echo '#zo-page-element-wrap .zo-page-title-content .zo-page-title-text {text-align: left;}';
                        echo '#zo-page-element-wrap .zo-page-title-content .zo-page-title-secondary {text-align: right;}';
                    } else {
                        echo '#zo-page-element-wrap .zo-page-title-content .zo-page-title-text {text-align: center;}';
                    }
                }
            }
        }
        return ob_get_clean();
    }

}

new Zo_Mercury_DynamicCss();