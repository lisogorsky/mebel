<?php
/**
 * Auto create .css file from Theme Options
 * @author ZoTheme
 * @version 1.0.0
 */
class Zo_Mercury_StaticCss {

    public $scss;

    function __construct() {
        global $zo_mercury_data;

        /* scss */
        $this->scss = new scssc();

        /* set paths scss */
        $this->scss->setImportPaths(get_template_directory() . '/assets/scss/');

        /* generate css over time */
        if (isset($zo_mercury_data['dev_mode']) && $zo_mercury_data['dev_mode']) {
            $this->generate_file();
        } else {
            /* save option generate css */
            add_action("redux/options/smof_data/saved", array(
                $this,
                'generate_file'
            ));
        }
    }

    /**
     * generate css file.
     *
     * @since 1.0.0
     */
    public function generate_file() {
        global $zo_mercury_data;
        if (!empty($zo_mercury_data)) {
            require_once(ABSPATH . 'wp-admin/includes/file.php');
            WP_Filesystem();
            global $wp_filesystem;

            /* write options to scss file */

            if (!$wp_filesystem->put_contents(get_template_directory() . '/assets/scss/options.scss', $this->css_render(), 0644)) {
                _e('Error saving file!', 'zo-mercury');
            }

            /* minimize CSS styles */
            if (!empty($zo_mercury_data['dev_mode'])) {
                $this->scss->setFormatter('scss_formatter_compressed');
            }

            /* compile scss to css */
            $css = $this->scss_render();

            $file = "static.css";
			
            /* write static.css file */
            if (!$wp_filesystem->put_contents(get_template_directory() . '/assets/css/' . $file, $css, 0644)) {
                _e('Error saving file!', 'zo-mercury');
            }
        }
    }

    /**
     * scss compile
     *
     * @since 1.0.0
     * @return string
     */
    public function scss_render() {
        /* compile scss to css */
        return $this->scss->compile('@import "master.scss"');
    }

    /**
     * main css
     *
     * @since 1.0.0
     * @return string
     */
    public function css_render() {
        global $zo_mercury_data, $zo_mercury_base;
        ob_start();

        /* Local Fonts */
        $zo_mercury_base->setTypographyLocal($zo_mercury_data['local-fonts-1'], $zo_mercury_data['local-fonts-selector-1']);
        $zo_mercury_base->setTypographyLocal($zo_mercury_data['local-fonts-2'], $zo_mercury_data['local-fonts-selector-2']);
        /* Extra Fonts */
        $zo_mercury_base->setGoogleFont($zo_mercury_data['google-font-1'], wp_filter_nohtml_kses($zo_mercury_data['google-font-selector-1']));
        $zo_mercury_base->setGoogleFont($zo_mercury_data['google-font-2'], wp_filter_nohtml_kses($zo_mercury_data['google-font-selector-2']));
        $zo_mercury_base->setGoogleFont($zo_mercury_data['google-font-3'], wp_filter_nohtml_kses($zo_mercury_data['google-font-selector-3']));
        
        zo_mercury_setvariablescss($zo_mercury_data['primary_color'], '$primary_color', '#81d742');
        zo_mercury_setvariablescss($zo_mercury_data['secondary_color'], '$secondary_color', '#b4bac6');
        zo_mercury_setvariablescss($zo_mercury_data['link_color']['regular'], '$link_color', '#404d66');
        zo_mercury_setvariablescss($zo_mercury_data['link_color']['hover'], '$link_color_hover', '#81d742');
        /* ==========================================================================
          Start Header
          ========================================================================== */
        // Page Layout
        if (!empty($zo_mercury_data['body_width']) && is_numeric($zo_mercury_data['body_width'])) {
            $width = (int) $zo_mercury_data['body_width'];
        }
        echo '@media(min-width: 1170px) {';
        echo 'body.zo-boxed #page{';
        echo 'width: ' . $width . 'px;';
        echo '}';
        echo 'body.zo-boxed #page .header-fixed{';
        echo 'width: ' . $width . 'px;';
        echo 'max-width: 100%;';
        echo '}';
        echo 'body.zo-boxed #page .header-transparent{';
        echo 'width: ' . $width . 'px;';
        echo 'max-width: 100%;';
        echo '}';
        echo '}';
        /* Header Main */
        if (!empty($zo_mercury_data['header_padding'])) {
			echo '@media (min-width: 1500px){';
				echo '#zo-header:not(.header-fixed) {';
					if (!empty($zo_mercury_data['header_padding']['padding-top'])) {
						echo 'padding-top: ' . esc_attr($zo_mercury_data['header_padding']['padding-top']) . ';';
					}
					if (!empty($zo_mercury_data['header_padding']['padding-left'])) {
						echo 'padding-left: ' . esc_attr($zo_mercury_data['header_padding']['padding-left']) . ';';
					}
					if (!empty($zo_mercury_data['header_padding']['padding-bottom'])) {
						echo 'padding-bottom: ' . esc_attr($zo_mercury_data['header_padding']['padding-bottom']) . ';';
					}
					if (!empty($zo_mercury_data['header_padding']['padding-right'])) {
						echo 'padding-right: ' . esc_attr($zo_mercury_data['header_padding']['padding-right']) . ';';
					}
				echo '}';
            echo '}';
        }
        if (!empty($zo_mercury_data['header_padding_md'])) {
			echo '@media (min-width: 992px) and (max-width: 1499px){';
				echo '#zo-header:not(.header-fixed) {';
					if (!empty($zo_mercury_data['header_padding_md']['padding-top'])) {
						echo 'padding-top: ' . esc_attr($zo_mercury_data['header_padding_md']['padding-top']) . ';';
					}
					if (!empty($zo_mercury_data['header_padding_md']['padding-left'])) {
						echo 'padding-left: ' . esc_attr($zo_mercury_data['header_padding_md']['padding-left']) . ';';
					}
					if (!empty($zo_mercury_data['header_padding_md']['padding-bottom'])) {
						echo 'padding-bottom: ' . esc_attr($zo_mercury_data['header_padding_md']['padding-bottom']) . ';';
					}
					if (!empty($zo_mercury_data['header_padding_md']['padding-right'])) {
						echo 'padding-right: ' . esc_attr($zo_mercury_data['header_padding_md']['padding-right']) . ';';
					}
				echo '}';
            echo '}';
        }
				
        //SETTING LOGO
        if (!empty($zo_mercury_data['logo_position'])) {
			echo '#zo-header #zo-header-logo {';
				if ($zo_mercury_data['logo_position'] == 'right') {
					echo 'float: right;';
				} else {
					echo 'float: left;';
				}
			echo '}';
        }
		if(!empty($zo_mercury_data['logo_margin'])) {
			echo '#zo-header #zo-header-logo > a {';
				if (!empty($zo_mercury_data['logo_margin']['margin-top'])) {
					echo 'margin-top: ' . esc_attr($zo_mercury_data['logo_margin']['margin-top']) . ';';
				}
				if (!empty($zo_mercury_data['logo_margin']['margin-left'])) {
					echo 'margin-left: ' . esc_attr($zo_mercury_data['logo_margin']['margin-left']) . ';';
				}
				if (!empty($zo_mercury_data['logo_margin']['margin-bottom'])) {
					echo 'margin-bottom: ' . esc_attr($zo_mercury_data['logo_margin']['margin-bottom']) . ';';
				}
				if (!empty($zo_mercury_data['logo_margin']['margin-right'])) {
					echo 'margin-right: ' . esc_attr($zo_mercury_data['logo_margin']['margin-right']) . ';';
				}
			echo '}';
		}
		if(!empty($zo_mercury_data['logo_margin_2'])) {
			echo '@media (min-width: 768px){';
				echo '#zo-header.zo-header01 #zo-header-logo > a {';
					if (!empty($zo_mercury_data['logo_margin_2']['margin-top'])) {
						echo 'margin-top: ' . esc_attr($zo_mercury_data['logo_margin_2']['margin-top']) . ';';
					}
					if (!empty($zo_mercury_data['logo_margin_2']['margin-left'])) {
						echo 'margin-left: ' . esc_attr($zo_mercury_data['logo_margin_2']['margin-left']) . ';';
					}
					if (!empty($zo_mercury_data['logo_margin_2']['margin-bottom'])) {
						echo 'margin-bottom: ' . esc_attr($zo_mercury_data['logo_margin_2']['margin-bottom']) . ';';
					}
					if (!empty($zo_mercury_data['logo_margin_2']['margin-right'])) {
						echo 'margin-right: ' . esc_attr($zo_mercury_data['logo_margin_2']['margin-right']) . ';';
					}
				echo '}';
			echo '}';
		}
		if (!empty($zo_mercury_data['logo_height'])) {
			echo '@media (min-width: 768px) { ';
				echo '#zo-header-logo img {
					max-height: '. esc_attr($zo_mercury_data['logo_height']) .'px;
				}';
            echo '}';
		}
        if (isset($zo_mercury_data['sticky_logo']['url']) && !empty($zo_mercury_data['sticky_logo']['url'])) {
            echo '#zo-header.header-fixed .zo-main-logo{
                    display: none;
            }';
        }
        //SETTING STICKY LOGO
        if (!empty($zo_mercury_data['sticky_logo_margin'])) {
            echo '#zo-header.header-fixed #zo-header-logo > a {';
            if (!empty($zo_mercury_data['sticky_logo_margin']['margin-top'])) {
                echo 'margin-top: ' . esc_attr($zo_mercury_data['sticky_logo_margin']['margin-top']) . ';';
            }
            if (!empty($zo_mercury_data['sticky_logo_margin']['margin-left'])) {
                echo 'margin-left: ' . esc_attr($zo_mercury_data['sticky_logo_margin']['margin-left']) . ';';
            }
            if (!empty($zo_mercury_data['sticky_logo_margin']['margin-bottom'])) {
                echo 'margin-bottom: ' . esc_attr($zo_mercury_data['sticky_logo_margin']['margin-bottom']) . ';';
            }
            if (!empty($zo_mercury_data['sticky_logo_margin']['margin-right'])) {
                echo 'margin-right: ' . esc_attr($zo_mercury_data['sticky_logo_margin']['margin-right']) . ';';
            }
            echo '}';
        }
        if (!empty($zo_mercury_data['logo_position'])) {
            echo '#zo-header .zo-header-secondary{';
            if ($zo_mercury_data['logo_position'] == 'right') {
                echo 'float: left;';
            } else if ($zo_mercury_data['menu_alignment'] == 'left') {
                echo 'float: left;';
            } else {
                echo 'float: right;';
            }
            echo '}';
        }
        //MENU HEIGHT
        if (!empty($zo_mercury_data['nav_height'])) {
			echo '@media (min-width: 992px){ ';
				echo '#zo-header .zo-header-navigation .nav-menu > li > a {';
					echo 'line-height: ' . esc_attr($zo_mercury_data['nav_height']) . 'px;';
				echo '}';
				echo '#zo-header-navigation-right { 
					line-height: ' . esc_attr($zo_mercury_data['nav_height']) . 'px;
				}';
				echo '#zo-header .zo-header-secondary .header-top-contact { 
					line-height: ' . esc_attr($zo_mercury_data['nav_height']) . 'px;
				}';
				/*HEADER EXTRA*/
				echo '#zo-header .zo-header-extra {';
					echo 'line-height: ' . esc_attr($zo_mercury_data['nav_height']) . 'px;';
				echo '}';
			echo '}';
        }
        if (!empty($zo_mercury_data['nav_height_2'])) {
			echo '@media (min-width: 992px){ ';
				echo '#zo-header.zo-header01 .zo-header-navigation .nav-menu > li > a {';
					echo 'line-height: ' . esc_attr($zo_mercury_data['nav_height_2']) . 'px;';
				echo '}';
				echo '.zo-header01 #zo-header-navigation-right { 
					line-height: ' . esc_attr($zo_mercury_data['nav_height_2']) . 'px;
				}';
				echo '#zo-header.zo-header01 .zo-header-secondary .header-top-contact { 
					line-height: ' . esc_attr($zo_mercury_data['nav_height_2']) . 'px;
				}';
				/*HEADER EXTRA*/
				echo '#zo-header.zo-header01 .zo-header-extra {';
					echo 'line-height: ' . esc_attr($zo_mercury_data['nav_height_2']) . 'px;';
				echo '}';
			echo '}';
        }
        //MENU STICKY HEIGHT
        if (!empty($zo_mercury_data['sticky_nav_height'])) {
            echo '#zo-header.header-fixed .nav-menu > li > a {';
            echo 'line-height: ' . esc_attr($zo_mercury_data['sticky_nav_height']) . 'px;';
            echo '}';
			echo '#zo-header.header-fixed .zo-header-extra {';
            echo 'line-height: ' . esc_attr($zo_mercury_data['sticky_nav_height']) . 'px;';
            echo '}';
            echo '#zo-header.header-fixed #zo-header-navigation-right{ line-height: ' . esc_attr($zo_mercury_data['sticky_nav_height']) . 'px;}';
        }

        //Header Top Background
        if (!empty($zo_mercury_data['bg_header_top_color'])) {
            echo '#zo-header-top{';
            echo zo_mercury_general_background($zo_mercury_data['bg_header_top_color']);
            echo '}';
        }

        if (!empty($zo_mercury_data['header_top_height'])) {
            echo '#zo-header-top{';
            echo 'min-height: ' . esc_attr($zo_mercury_data['header_top_height']) . 'px;';
            echo '}';
            echo '#zo-header-top .header-top-social li{';
            echo 'line-height: ' . esc_attr($zo_mercury_data['header_top_height']) . 'px;';
            echo '}';
            echo '#zo-header-top .header-top-contact li{';
            echo 'line-height: ' . esc_attr($zo_mercury_data['header_top_height']) . 'px;';
            echo '}';
            echo '#zo-header-top .header-top-navigation > li > a{';
            echo 'line-height: ' . esc_attr($zo_mercury_data['header_top_height']) . 'px;';
            echo '}';
        }//'output'  => array('body #zo-header-top'),
        //Header content left
        if (!empty($zo_mercury_data['content_left_alignment'])) {
            echo '#zo-header-top .header-top-left {';
            echo 'text-align: ' . esc_attr($zo_mercury_data['content_left_alignment']) . ';';
            echo '}';
			echo '@media (max-width:767px){
				#zo-header-top .header-top-left {
					text-align: center;
				}
			}';
        }
        //Header content right
        if (!empty($zo_mercury_data['content_right_alignment']) && $zo_mercury_data['content_right_alignment'] == 'right') {
            echo '#zo-header-top .header-top-right {';
            echo 'text-align: ' . esc_attr($zo_mercury_data['content_right_alignment']) . ';';
            echo '}';
			echo '@media (max-width:767px){
				#zo-header-top .header-top-right {
					text-align: center;
				}
			}';
        }

        //Navigation padding
        if (!empty($zo_mercury_data['nav_padding'])) {
			echo '@media (min-width: 1200px){';
				echo '.zo-header-navigation .nav-menu > li {
					padding-right: ' . $zo_mercury_data['nav_padding'] . 'px;
				}';
				echo '.zo-header-navigation .nav-menu > li:last-child {
					padding-right: 0;
				}';
			echo '}';
        }
        if (!empty($zo_mercury_data['nav_padding_md'])) {
			echo '@media (min-width: 992px) and (max-width: 1199px) {';
				echo '.zo-header-navigation .nav-menu > li {
					padding-right: ' . $zo_mercury_data['nav_padding_md'] . 'px;
				}';
				echo '.zo-header-navigation .nav-menu > li:last-child {
					padding-right: 0;
				}';
			echo '}';
        }
        //Nav Indicator
        if (!empty($zo_mercury_data['nav_indicator']) && !$zo_mercury_data['nav_indicator']) {
            echo '.zo-header-navigation .zo-menu-toggle {display: none;}';
        }

        /* End Header Main */

        /* Sticky Header */
        if (!empty($zo_mercury_data['sticky_header_bg_image'])) {
            echo '#zo-header.header-fixed {';
				$sticky_bg = $zo_mercury_data['sticky_header_bg_image'];
				echo zo_mercury_general_background($sticky_bg);
				if (!empty($zo_mercury_data['sticky_header_bg_color'])) {
					echo 'background-color:' . $zo_mercury_data['sticky_header_bg_color']['rgba'] . ';';
				} else {
					echo 'background-color: #FFFFFF;';
				}
				if (!empty($zo_mercury_data['sticky_header_padding']['padding-top'])) {
					echo 'padding-top: ' . esc_attr($zo_mercury_data['sticky_header_padding']['padding-top']) . ';';
				}
				if (!empty($zo_mercury_data['sticky_header_padding']['padding-left'])) {
					echo 'padding-left: ' . esc_attr($zo_mercury_data['sticky_header_padding']['padding-left']) . ';';
				}
				if (!empty($zo_mercury_data['sticky_header_padding']['padding-bottom'])) {
					echo 'padding-bottom: ' . esc_attr($zo_mercury_data['sticky_header_padding']['padding-bottom']) . ';';
				}
				if (!empty($zo_mercury_data['sticky_header_padding']['padding-right'])) {
					echo 'padding-right: ' . esc_attr($zo_mercury_data['sticky_header_padding']['padding-right']) . ';';
				}
            echo '}';
        }
        if (!empty($zo_mercury_data['sticky_header_padding_md'])) {
			echo '@media (min-width: 992px) and (max-width: 1500px){';
				echo '#zo-header.header-fixed {';
					if (!empty($zo_mercury_data['sticky_header_padding_md']['padding-top'])) {
						echo 'padding-top: ' . esc_attr($zo_mercury_data['sticky_header_padding_md']['padding-top']) . ';';
					}
					if (!empty($zo_mercury_data['sticky_header_padding_md']['padding-left'])) {
						echo 'padding-left: ' . esc_attr($zo_mercury_data['sticky_header_padding_md']['padding-left']) . ';';
					}
					if (!empty($zo_mercury_data['sticky_header_padding_md']['padding-bottom'])) {
						echo 'padding-bottom: ' . esc_attr($zo_mercury_data['sticky_header_padding_md']['padding-bottom']) . ';';
					}
					if (!empty($zo_mercury_data['sticky_header_padding_md']['padding-right'])) {
						echo 'padding-right: ' . esc_attr($zo_mercury_data['sticky_header_padding_md']['padding-right']) . ';';
					}
				echo '}';
            echo '}';
        }
        //SETTING LOGO
        if (!empty($zo_mercury_data['sticky_logo_margin'])) {
            echo '#zo-header .header-fixed #zo-header-logo{';
            // Margin
            if (!empty($zo_mercury_data['sticky_logo_margin']['margin-top'])) {
                echo 'margin-top: ' . esc_attr($zo_mercury_data['sticky_logo_margin']['margin-top']) . ';';
            }
            if (!empty($zo_mercury_data['sticky_logo_margin']['margin-left'])) {
                echo 'margin-left: ' . esc_attr($zo_mercury_data['sticky_logo_margin']['margin-left']) . ';';
            }
            if (!empty($zo_mercury_data['sticky_logo_margin']['margin-bottom'])) {
                echo 'margin-bottom: ' . esc_attr($zo_mercury_data['sticky_logo_margin']['margin-bottom']) . ';';
            }
            if (!empty($zo_mercury_data['sticky_logo_margin']['margin-right'])) {
                echo 'margin-right: ' . esc_attr($zo_mercury_data['sticky_logo_margin']['margin-right']) . ';';
            }
            echo '}';
        }
        /* End Sticky Header */
		
        /* Color - Main Menu */
		echo '@media (min-width: 992px) {';
			if (!empty($zo_mercury_data['menu_color_first_level']) && !empty($zo_mercury_data['menu_color_first_level']['regular'])) {
				echo ".zo-header-navigation .nav-menu > li,
					.zo-header-navigation .nav-menu > li > a,
					.widget_cart_search_wrap a {
						color: " . esc_attr($zo_mercury_data['menu_color_first_level']['regular']) . ";
				}";
				echo ".nav-menu > li > a {
					border-bottom: 5px solid transparent;
				}";
			}

			if (!empty($zo_mercury_data['menu_color_first_level']) && !empty($zo_mercury_data['menu_color_first_level']['hover'])) {
				echo ".zo-header-navigation .nav-menu > li:hover,
				.zo-header-navigation .nav-menu > li:hover > a,
				.widget_cart_search_wrap a:hover {
					color:" . esc_attr($zo_mercury_data['menu_color_first_level']['hover']) . ";
				}";
				echo ".zo-header-navigation .nav-menu > li:hover > a {
					border-bottom-color: " . esc_attr($zo_mercury_data['menu_color_first_level']['hover']) . ";
				}";
			}
			if (!empty($zo_mercury_data['menu_color_first_level']) && !empty($zo_mercury_data['menu_color_first_level']['active'])) {
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
					color:" . esc_attr($zo_mercury_data['menu_color_first_level']['active']) . ";

				}";
				echo ".zo-header-navigation .nav-menu > li.current-menu-parent > a,
				.zo-header-navigation .nav-menu > li.current-menu-item > a,
				.zo-header-navigation .nav-menu > li.current-menu-ancestor > a,
				.zo-header-navigation .nav-menu > li.current_page_item > a,
				.zo-header-navigation .nav-menu > li.current_page_ancestor > a {
					border-bottom: 5px solid " . esc_attr($zo_mercury_data['menu_color_first_level']['active']) . ";
				}";
			}
			/* Sub Menu */
			if (!empty($zo_mercury_data['menu_color_sub_level']) && !empty($zo_mercury_data['menu_color_sub_level']['regular'])) {
				echo ".zo-header-navigation .nav-menu > li ul li,
				.zo-header-navigation .nav-menu > li ul li > a {
					color:" . esc_attr($zo_mercury_data['menu_color_sub_level']['regular']) . ";
				}";
			}
			if (!empty($zo_mercury_data['menu_color_sub_level']) && !empty($zo_mercury_data['menu_color_sub_level']['hover'])) {
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
				.zo-header-navigation .nav-menu > li ul li.current_page_item > a {
					color:" . esc_attr($zo_mercury_data['menu_color_sub_level']['hover']) . ";
				}";
				echo '.nav-menu > li ul.sub-menu li a .menu-title:after{
					background: '. esc_attr($zo_mercury_data['menu_color_sub_level']['hover']) .';
				}';
			}
		echo '}';
		
		// Phone Menu - Screen < 992px
		echo '@media(max-width: 991px) {';
			if(!empty($zo_mercury_data['pmenu_fsize_flevel'])) { 
				echo '.nav-menu > li, .nav-menu > li > a, .widget_cart_search_wrap a {';
					if(!empty($zo_mercury_data['pmenu_fsize_flevel']['font-family']))
						echo 'font-family: '. esc_attr($zo_mercury_data['pmenu_fsize_flevel']['font-family']) .';';
					if(!empty($zo_mercury_data['pmenu_fsize_flevel']['font-weight']))
						echo 'font-weight: '. esc_attr($zo_mercury_data['pmenu_fsize_flevel']['font-weight']) .';';
					if(!empty($zo_mercury_data['pmenu_fsize_flevel']['text-transform']))
						echo 'text-transform: '. esc_attr($zo_mercury_data['pmenu_fsize_flevel']['text-transform']) .';';
					if(!empty($zo_mercury_data['pmenu_fsize_flevel']['font-size']))
						echo 'font-size: '. esc_attr($zo_mercury_data['pmenu_fsize_flevel']['font-size']) .';';
					if(!empty($zo_mercury_data['pmenu_fsize_flevel']['letter-spacing']))
						echo 'letter-spacing: '. esc_attr($zo_mercury_data['pmenu_fsize_flevel']['letter-spacing']) .';';
					if(!empty($zo_mercury_data['pmenu_fsize_flevel']['line-height']))
						echo 'line-height: '. esc_attr($zo_mercury_data['pmenu_fsize_flevel']['line-height']) .';';
				echo '}';
			}
			if(!empty($zo_mercury_data['pmenu_color_first_level'])) {
				echo ".nav-menu > li, .nav-menu > li > a, .widget_cart_search_wrap a {
					color:". esc_attr($zo_mercury_data['pmenu_color_first_level']) .";
				}";
			}
			if(!empty($zo_mercury_data['pmenu_color_hover_first_level'])){
				echo ".nav-menu > li:hover, 
					.nav-menu > li.active,
					.nav-menu > li.active > a,
					.nav-menu > li.active:hover,
					.nav-menu > li:hover > a, 
					.nav-menu > li:hover > a:active, 
					.widget_cart_search_wrap a:hover, 
					.nav-menu > li.current_page_item,
					.nav-menu > li.current_page_ancestor,
					.nav-menu > li.current-menu-item ,
					.nav-menu > li.current-menu-ancestor,
					.nav-menu > li.current_page_item > a,
					.nav-menu > li.current_page_ancestor > a,
					.nav-menu > li.current-menu-item > a,
					.nav-menu > li.current-menu-ancestor > a { ";
					echo "color:". esc_attr($zo_mercury_data['pmenu_color_hover_first_level']) .";";
				echo "}";
			}
			if(!empty($zo_mercury_data['pmenu_bg_color'])){
				echo ".zo-header-navigation {";
					if(!empty($zo_mercury_data['pmenu_bg_color']['rgba'])){
						echo "background-color:". esc_attr($zo_mercury_data['pmenu_bg_color']['rgba']) .";";
					} elseif(!empty($zo_mercury_data['pmenu_bg_color']['color'])) {
						echo "background-color:". esc_attr($zo_mercury_data['pmenu_bg_color']['color']) .";";
					}
				echo "}";
			}
			if(!empty($zo_mercury_data['pmenu_border_top'])) {
				echo '.zo-header-navigation {';
					if(!empty($zo_mercury_data['pmenu_border_top']['border-top']))
						echo 'border-top-width: '. esc_attr($zo_mercury_data['pmenu_border_top']['border-top']) .';';
					if(!empty($zo_mercury_data['pmenu_border_top']['border-style']))
						echo 'border-top-style: '. esc_attr($zo_mercury_data['pmenu_border_top']['border-style']) .';';
					if(!empty($zo_mercury_data['pmenu_border_top']['border-color']))
						echo 'border-top-color: '. esc_attr($zo_mercury_data['pmenu_border_top']['border-color']) .';';
				echo '}';
			}
			if(!empty($zo_mercury_data['pmenu_border_bottom'])) {
				echo '.zo-header-navigation {';
					if(!empty($zo_mercury_data['pmenu_border_bottom']['border-top']))
						echo 'border-bottom-width: '. esc_attr($zo_mercury_data['pmenu_border_bottom']['border-top']) .';';
					if(!empty($zo_mercury_data['pmenu_border_bottom']['border-style']))
						echo 'border-bottom-style: '. esc_attr($zo_mercury_data['pmenu_border_bottom']['border-style']) .';';
					if(!empty($zo_mercury_data['pmenu_border_bottom']['border-color']))
						echo 'border-bottom-color: '. esc_attr($zo_mercury_data['pmenu_border_bottom']['border-color']) .';';
				echo '}';
			}
			if(!empty($zo_mercury_data['pmenu_padding_flevel'])) {
				echo '.zo-header-navigation {';
					if(!empty($zo_mercury_data['pmenu_padding_flevel']['padding-top']) || $zo_mercury_data['pmenu_padding_flevel']['padding-top'] == '0') 
						echo 'padding-top: '. esc_attr($zo_mercury_data['pmenu_padding_flevel']['padding-top']) .';';
					if(!empty($zo_mercury_data['pmenu_padding_flevel']['padding-right']) || $zo_mercury_data['pmenu_padding_flevel']['padding-right'] == '0') 
						echo 'padding-right: '. esc_attr($zo_mercury_data['pmenu_padding_flevel']['padding-right']) .';';
					if(!empty($zo_mercury_data['pmenu_padding_flevel']['padding-bottom']) || $zo_mercury_data['pmenu_padding_flevel']['padding-bottom'] == '0') 
						echo 'padding-bottom: '. esc_attr($zo_mercury_data['pmenu_padding_flevel']['padding-bottom']) .';';
					if(!empty($zo_mercury_data['pmenu_padding_flevel']['padding-left']) || $zo_mercury_data['pmenu_padding_flevel']['padding-left'] == '0') 
						echo 'padding-left: '. esc_attr($zo_mercury_data['pmenu_padding_flevel']['padding-left']) .';';
				echo '}';
			}
			if(!empty($zo_mercury_data['pmenu_fsize_slevel'])) { 
				echo '.nav-menu > li ul > li, .nav-menu > li ul > li > a {';
					if(!empty($zo_mercury_data['pmenu_fsize_slevel']['font-family']))
						echo 'font-family: '. esc_attr($zo_mercury_data['pmenu_fsize_slevel']['font-family']) .';';
					if(!empty($zo_mercury_data['pmenu_fsize_slevel']['font-weight']))
						echo 'font-weight: '. esc_attr($zo_mercury_data['pmenu_fsize_slevel']['font-weight']) .';';
					if(!empty($zo_mercury_data['pmenu_fsize_slevel']['text-transform']))
						echo 'text-transform: '. esc_attr($zo_mercury_data['pmenu_fsize_slevel']['text-transform']) .';';
					if(!empty($zo_mercury_data['pmenu_fsize_slevel']['font-size']))
						echo 'font-size: '. esc_attr($zo_mercury_data['pmenu_fsize_slevel']['font-size']) .';';
					if(!empty($zo_mercury_data['pmenu_fsize_slevel']['letter-spacing']))
						echo 'letter-spacing: '. esc_attr($zo_mercury_data['pmenu_fsize_slevel']['letter-spacing']) .';';
					if(!empty($zo_mercury_data['pmenu_fsize_slevel']['line-height']))
						echo 'line-height: '. esc_attr($zo_mercury_data['pmenu_fsize_slevel']['line-height']) .';';
				echo '}';
			}
			if(!empty($zo_mercury_data['pmenu_color_sub_level'])){
				echo ".nav-menu > li ul > li,
					.nav-menu > li ul li > a {
					color:". esc_attr($zo_mercury_data['pmenu_color_sub_level']) .";
				}";
			}
			if(!empty($zo_mercury_data['pmenu_color_hover_sub_level'])){
				echo ".nav-menu > li ul li:hover > a,
				.nav-menu > li ul li:hover,
				.nav-menu > li ul a:focus,
				.nav-menu > li ul li.current_page_item > a,
				.nav-menu > li ul li.current_page_item,
				.nav-menu > li ul li.current-menu-item > a,
				.nav-menu > li ul li.current-menu-item,
				.nav-menu > li ul li.current-menu-parent > a,
				.nav-menu > li ul li.current-menu-parent,
				.nav-menu > li ul li.current-menu-ancestor > a,
				.nav-menu > li ul li.current-menu-ancestor {
					color:". esc_attr($zo_mercury_data['pmenu_color_hover_sub_level']) .";
				}";
			}
			if(!empty($zo_mercury_data['pmenu_padding_slevel'])) {
				echo '.nav-menu ul.sub-menu {';
					if(!empty($zo_mercury_data['pmenu_padding_slevel']['padding-top']) || $zo_mercury_data['pmenu_padding_slevel']['padding-top'] == '0') 
						echo 'padding-top: '. esc_attr($zo_mercury_data['pmenu_padding_slevel']['padding-top']) .';';
					if(!empty($zo_mercury_data['pmenu_padding_slevel']['padding-right']) || $zo_mercury_data['pmenu_padding_slevel']['padding-right'] == '0') 
						echo 'padding-right: '. esc_attr($zo_mercury_data['pmenu_padding_slevel']['padding-right']) .';';
					if(!empty($zo_mercury_data['pmenu_padding_slevel']['padding-bottom']) || $zo_mercury_data['pmenu_padding_slevel']['padding-bottom'] == '0') 
						echo 'padding-bottom: '. esc_attr($zo_mercury_data['pmenu_padding_slevel']['padding-bottom']) .';';
					if(!empty($zo_mercury_data['pmenu_padding_slevel']['padding-left']) || $zo_mercury_data['pmenu_padding_slevel']['padding-left'] == '0') 
						echo 'padding-left: '. esc_attr($zo_mercury_data['pmenu_padding_slevel']['padding-left']) .';';
				echo '}';
			}
		echo '}';

        /* Sticky Menu */
        if (!empty($zo_mercury_data['sticky_menu_color_first_level'])) {
            echo ".header-fixed .nav-menu > li,
			.header-fixed .nav-menu > li > a,
			.header-fixed .widget_cart_search_wrap a,
			#zo-header.header-fixed .zo-header-extra,
			#zo-header.header-fixed .zo-header-extra a {
				color:" . esc_attr($zo_mercury_data['sticky_menu_color_first_level']) . ";
			}";
        }
        if (!empty($zo_mercury_data['sticky_menu_color_hover_first_level'])) {
            echo ".header-fixed .nav-menu > li:hover,
			.header-fixed .nav-menu > li:hover > a,
			.header-fixed .widget_cart_search_wrap a:hover,
			#zo-header.header-fixed .zo-header-extra a:hover{
				color:" . esc_attr($zo_mercury_data['sticky_menu_color_hover_first_level']) . ";
			}";
            echo ".header-fixed .nav-menu > li:hover {
				border-bottom-color: " . esc_attr($zo_mercury_data['sticky_menu_color_hover_first_level']) . ";
			}";
        }
        if (!empty($zo_mercury_data['sticky_menu_color_active_first_level'])) {
            echo ".header-fixed .nav-menu > li.current-menu-item,
			.header-fixed .nav-menu > li.current-menu-ancestor,
			.header-fixed .nav-menu > li.current_page_item,
			.header-fixed .nav-menu > li.current_page_ancestor,
			.header-fixed .nav-menu > li.current-menu-parent,
			.header-fixed .nav-menu > li.current-menu-item > a,
			.header-fixed .nav-menu > li.current-menu-ancestor > a,
			.header-fixed .nav-menu > li.current_page_item > a,
			.header-fixed .nav-menu > li.current_page_ancestor > a,
			.header-fixed .nav-menu > li.current-menu-parent > a,
			.header-fixed .widget_cart_search_wrap a:active,
			.header-fixed .widget_cart_search_wrap a:focus {
				color:" . esc_attr($zo_mercury_data['sticky_menu_color_active_first_level']) . ";
			}";
        }

        /* Sub Menu */
        if (!empty($zo_mercury_data['sticky_menu_color_sub_level'])) {
            echo ".header-fixed .nav-menu > li ul li,
			.header-fixed .nav-menu > li ul li > a {
				color:" . esc_attr($zo_mercury_data['sticky_menu_color_sub_level']) . ";
			}";
        }
        if (!empty($zo_mercury_data['sticky_menu_color_hover_sub_level'])) {
            echo ".header-fixed .nav-menu > li ul a:focus,
			.header-fixed .nav-menu > li ul li:hover,
			.header-fixed .nav-menu > li ul li.current-menu-item,
			.header-fixed .nav-menu > li ul li.current-menu-parent,
			.header-fixed .nav-menu > li ul li.current-menu-ancestor,
			.header-fixed .nav-menu > li ul li.current_page_item,
			.header-fixed .nav-menu > li ul li:hover > a,
			.header-fixed .nav-menu > li ul li.current-menu-item > a,
			.header-fixed .nav-menu > li ul li.current-menu-parent > a,
			.header-fixed .nav-menu > li ul li.current-menu-ancestor > a,
			.header-fixed .nav-menu > li ul li.current_page_item > a {
				color:" . esc_attr($zo_mercury_data['sticky_menu_color_hover_sub_level']) . ";
			}";
        }
        /* End Sub Menu */
        /* End Sticky Menu */
        /* End Main Menu */


        /* ==========================================================================
          End Header
          ========================================================================== */



        /* ==========================================================================
          Start Footer
          ========================================================================== */

        if (!empty($zo_mercury_data['footer_padding'])) {
            echo '#zo-footer{';
            // Padding
            if (!empty($zo_mercury_data['footer_padding']['padding-top'])) {
                echo 'padding-top: ' . esc_attr($zo_mercury_data['footer_padding']['padding-top']) . ';';
            }
            if (!empty($zo_mercury_data['footer_padding']['padding-left'])) {
                echo 'padding-left: ' . esc_attr($zo_mercury_data['footer_padding']['padding-left']) . ';';
            }
            if (!empty($zo_mercury_data['footer_padding']['padding-bottom'])) {
                echo 'padding-bottom: ' . esc_attr($zo_mercury_data['footer_padding']['padding-bottom']) . ';';
            }
            if (!empty($zo_mercury_data['footer_padding']['padding-right'])) {
                echo 'padding-right: ' . esc_attr($zo_mercury_data['footer_padding']['padding-right']) . ';';
            }

            echo '}';
        }
        // Footer Copyright Borders
        if (!empty($zo_mercury_data['footer_copyright_padding'])) {
            echo '#zo-footer-copyright {';
            // Padding
            if (!empty($zo_mercury_data['footer_copyright_padding']['padding-top'])) {
                echo 'padding-top: ' . esc_attr($zo_mercury_data['footer_copyright_padding']['padding-top']) . ';';
            }
            if (!empty($zo_mercury_data['footer_copyright_padding']['padding-left'])) {
                echo 'padding-left: ' . esc_attr($zo_mercury_data['footer_copyright_padding']['padding-left']) . ';';
            }
            if (!empty($zo_mercury_data['footer_copyright_padding']['padding-bottom'])) {
                echo 'padding-bottom: ' . esc_attr($zo_mercury_data['footer_copyright_padding']['padding-bottom']) . ';';
            }
            if (!empty($zo_mercury_data['footer_copyright_padding']['padding-right'])) {
                echo 'padding-right: ' . esc_attr($zo_mercury_data['footer_copyright_padding']['padding-right']) . ';';
            }

            // Footer Content Borders
            if (!empty($zo_mercury_data['footer_copyright_border_color'])) {
                if (!empty($zo_mercury_data['footer_copyright_border_width_top'])) {
                    echo 'border-top: ' . $zo_mercury_data['footer_copyright_border_width_top'] . 'px solid ' . $zo_mercury_data['footer_copyright_border_color'] . ';';
                }
            }
            /* Copyright Font Color */
            if (!empty($zo_mercury_data['footer_copyright_font_color'])) {
                echo 'color: ' . $zo_mercury_data['footer_copyright_font_color'] . ';';
            }
            /* Copyright Link Color */
            if (!empty($zo_mercury_data['footer_copyright_link_color'])) {
                echo 'a {color: ' . $zo_mercury_data['footer_copyright_link_color'] . ';}';
            }
            echo '}';
			 /* Copyright Font Color */
            if (!empty($zo_mercury_data['footer_copyright_font_color'])) {
				echo '#zo-footer-copyright .footer-social a {';
					echo 'color: ' . $zo_mercury_data['footer_copyright_font_color'] . ';';
				echo '}';
            }
        }
        if (!empty($zo_mercury_data['footer_copyright_alignment']) && !empty($zo_mercury_data['footer_copyright_extra_position']) && $zo_mercury_data['footer_copyright_alignment'] != 'center' && $zo_mercury_data['footer_copyright_extra_position'] == 'symmetric') {
            echo '#zo-footer-copyright footer{ display: table; width: 100%;}';
            echo '#zo-footer-copyright .zo-footer-copyright-notice{ display: table-cell; width: 60%;}';
            echo '#zo-footer-copyright .zo-copyright-secondary{ display: table-cell; width: 40%;}';
        }
        if (!empty($zo_mercury_data['footer_copyright_alignment']) && $zo_mercury_data['footer_copyright_alignment'] == 'center') {
            echo '#zo-footer-copyright footer{ text-align: center;}';
        }
        /* End Footer */

        // TYPOGRAPHY
        if (!empty($zo_mercury_data['font_h1'])) {
            echo 'body h1{';
            echo zo_mercury_general_typography($zo_mercury_data['font_h1']);
            if (!empty($zo_mercury_data['font_h1_margin'])) {
                echo 'margin-top:' . $zo_mercury_data['font_h1_margin']['margin-top'] . ';';
                echo 'margin-bottom:' . $zo_mercury_data['font_h1_margin']['margin-bottom'] . ';';
            }
            echo '}';
        }

        if (!empty($zo_mercury_data['font_h2'])) {
            echo 'body h2{';
            echo zo_mercury_general_typography($zo_mercury_data['font_h2']);
            if (!empty($zo_mercury_data['font_h2_margin'])) {
                echo 'margin-top:' . $zo_mercury_data['font_h2_margin']['margin-top'] . ';';
                echo 'margin-bottom:' . $zo_mercury_data['font_h2_margin']['margin-bottom'] . ';';
            }
            echo '}';
        }

        if (!empty($zo_mercury_data['font_h3'])) {
            echo 'body h3{';
            echo zo_mercury_general_typography($zo_mercury_data['font_h3']);
            if (!empty($zo_mercury_data['font_h3_margin'])) {
                echo 'margin-top:' . $zo_mercury_data['font_h3_margin']['margin-top'] . ';';
                echo 'margin-bottom:' . $zo_mercury_data['font_h3_margin']['margin-bottom'] . ';';
            }
            echo '}';
        }

        if (!empty($zo_mercury_data['font_h4'])) {
            echo 'body h4{';
            echo zo_mercury_general_typography($zo_mercury_data['font_h4']);
            if (!empty($zo_mercury_data['font_h4_margin'])) {
                echo 'margin-top:' . $zo_mercury_data['font_h4_margin']['margin-top'] . ';';
                echo 'margin-bottom:' . $zo_mercury_data['font_h4_margin']['margin-bottom'] . ';';
            }
            echo '}';
        }

        if (!empty($zo_mercury_data['font_h5'])) {
            echo 'body h5{';
            echo zo_mercury_general_typography($zo_mercury_data['font_h5']);
            if (!empty($zo_mercury_data['font_h5_margin'])) {
                echo 'margin-top:' . $zo_mercury_data['font_h5_margin']['margin-top'] . ';';
                echo 'margin-bottom:' . $zo_mercury_data['font_h5_margin']['margin-bottom'] . ';';
            }
            echo '}';
        }

        if (!empty($zo_mercury_data['font_h6'])) {
            echo 'body h6{';
            echo zo_mercury_general_typography($zo_mercury_data['font_h6']);
            if (!empty($zo_mercury_data['font_h6_margin'])) {
                echo 'margin-top:' . $zo_mercury_data['font_h6_margin']['margin-top'] . ';';
                echo 'margin-bottom:' . $zo_mercury_data['font_h6_margin']['margin-bottom'] . ';';
            }
            echo '}';
        }

        if (!empty($zo_mercury_data['mobile_heading_sensitivity'])) {
            $scale = (int) $zo_mercury_data['mobile_heading_sensitivity'];
            echo '@media(max-width: 767px) {';
            if (!empty($zo_mercury_data['font_h1'])) {
                echo 'body h1{ font-size: ' . zo_mercury_calc_font_size($zo_mercury_data['font_h1']['font-size'], $scale) . ';}';
            }
            if (!empty($zo_mercury_data['font_h2'])) {
                echo 'body h2{ font-size: ' . zo_mercury_calc_font_size($zo_mercury_data['font_h2']['font-size'], $scale) . ';}';
            }
            if (!empty($zo_mercury_data['font_h3'])) {
                echo 'body h3{ font-size: ' . zo_mercury_calc_font_size($zo_mercury_data['font_h3']['font-size'], $scale) . ';}';
            }
            if (!empty($zo_mercury_data['font_h4'])) {
                echo 'body h4{ font-size: ' . zo_mercury_calc_font_size($zo_mercury_data['font_h4']['font-size'], $scale) . ';}';
            }
            if (!empty($zo_mercury_data['font_h5'])) {
                echo 'body h5{ font-size: ' . zo_mercury_calc_font_size($zo_mercury_data['font_h5']['font-size'], $scale) . ';}';
            }
            if (!empty($zo_mercury_data['font_h6'])) {
                echo 'body h6{ font-size: ' . zo_mercury_calc_font_size($zo_mercury_data['font_h6']['font-size'], $scale) . ';}';
            }
            echo '}';
        }
        //BUTTON
        if (!empty($zo_mercury_data['btn_primary'])) {
            echo '.btn-primary{';
            if (!empty($zo_mercury_data['btn_primary']['regular'])) {
                echo 'background:' . $zo_mercury_data['btn_primary']['regular'] . ';';
            }
            if (!empty($zo_mercury_data['btn_primary_color']['regular'])) {
                echo 'color:' . $zo_mercury_data['btn_primary_color']['regular'] . ';';
            }
            if (!empty($zo_mercury_data['btn_primary_padding'])) {
                // Padding
                if (!empty($zo_mercury_data['btn_primary_padding']['padding-top']) || $zo_mercury_data['btn_primary_padding']['padding-top'] == '0') {
                    echo 'padding-top: ' . esc_attr($zo_mercury_data['btn_primary_padding']['padding-top']) . ';';
                }
                if (!empty($zo_mercury_data['btn_primary_padding']['padding-left']) || $zo_mercury_data['btn_primary_padding']['padding-left'] == '0') {
                    echo 'padding-left: ' . esc_attr($zo_mercury_data['btn_primary_padding']['padding-left']) . ';';
                }
                if (!empty($zo_mercury_data['btn_primary_padding']['padding-bottom']) || $zo_mercury_data['btn_primary_padding']['padding-bottom'] == '0') {
                    echo 'padding-bottom: ' . esc_attr($zo_mercury_data['btn_primary_padding']['padding-bottom']) . ';';
                }
                if (!empty($zo_mercury_data['btn_primary_padding']['padding-right']) || $zo_mercury_data['btn_primary_padding']['padding-right'] == '0') {
                    echo 'padding-right: ' . esc_attr($zo_mercury_data['btn_primary_padding']['padding-right']) . ';';
                }
            }
            if (!empty($zo_mercury_data['btn_primary_font'])) {
                echo zo_mercury_general_typography($zo_mercury_data['btn_primary_font']);
            }
            if (!empty($zo_mercury_data['btn_primary_border_radius'])) {
                echo 'border-radius: ' . $zo_mercury_data['btn_primary_border_radius'] . 'px;';
            }
            if (!empty($zo_mercury_data['btn_primary_border'])) {
                if (!empty($zo_mercury_data['btn_primary_border']['border-width']) && !empty($zo_mercury_data['btn_primary_border']['border-color']) && !empty($zo_mercury_data['btn_primary_border']['border-style'])) {
                    echo 'border: ' . $zo_mercury_data['btn_primary_border']['border-width'] . ' ' . $zo_mercury_data['btn_primary_border']['border-style'] . ' ' . $zo_mercury_data['btn_primary_border']['border-color'] . ' !important;';
                }else {
					echo 'border: none;';
				}
            }
            echo '}';
            echo '.btn-primary:hover{';
            if (!empty($zo_mercury_data['btn_primary']['hover'])) {
                echo 'background:' . $zo_mercury_data['btn_primary']['hover'] . ';';
            }
            if (!empty($zo_mercury_data['btn_primary_color']['hover'])) {
                echo 'color:' . $zo_mercury_data['btn_primary_color']['hover'] . ';';
            }
            echo '}';
        }
        if (!empty($zo_mercury_data['btn_secondary'])) {
            echo '.btn-secondary{';
            if (!empty($zo_mercury_data['btn_secondary']['regular'])) {
                echo 'background:' . $zo_mercury_data['btn_secondary']['regular'] . ';';
            }
            if (!empty($zo_mercury_data['btn_secondary_color']['regular'])) {
                echo 'color:' . $zo_mercury_data['btn_secondary_color']['regular'] . ';';
            }
            if (!empty($zo_mercury_data['btn_secondary_padding'])) {
                // Padding
                if (!empty($zo_mercury_data['btn_secondary_padding']['padding-top'])) {
                    echo 'padding-top: ' . esc_attr($zo_mercury_data['btn_secondary_padding']['padding-top']) . ';';
                }
                if (!empty($zo_mercury_data['btn_secondary_padding']['padding-left'])) {
                    echo 'padding-left: ' . esc_attr($zo_mercury_data['btn_secondary_padding']['padding-left']) . ';';
                }
                if (!empty($zo_mercury_data['btn_secondary_padding']['padding-bottom'])) {
                    echo 'padding-bottom: ' . esc_attr($zo_mercury_data['btn_secondary_padding']['padding-bottom']) . ';';
                }
                if (!empty($zo_mercury_data['btn_secondary_padding']['padding-right'])) {
                    echo 'padding-right: ' . esc_attr($zo_mercury_data['btn_secondary_padding']['padding-right']) . ';';
                }
            }
            if (!empty($zo_mercury_data['btn_secondary_font'])) {
                echo zo_mercury_general_typography($zo_mercury_data['btn_secondary_font']);
            }
            if (!empty($zo_mercury_data['btn_secondary_border_radius'])) {
                echo 'border-radius: ' . $zo_mercury_data['btn_secondary_border_radius'] . 'px;';
            }
            if (!empty($zo_mercury_data['btn_secondary_border'])) {
                if (!empty($zo_mercury_data['btn_secondary_border']['border-width']) && !empty($zo_mercury_data['btn_secondary_border']['border-color']) && !empty($zo_mercury_data['btn_secondary_border']['border-style'])) {
                    echo 'border: ' . $zo_mercury_data['btn_secondary_border']['border-width'] . ' ' . $zo_mercury_data['btn_secondary_border']['border-style'] . ' ' . $zo_mercury_data['btn_secondary_border']['border-color'] . ';';
                }
            }
            echo '}';
            echo '.btn-secondary:hover{';
            if (!empty($zo_mercury_data['btn_secondary']['hover'])) {
                echo 'background:' . $zo_mercury_data['btn_secondary']['hover'] . ';';
            }
            if (!empty($zo_mercury_data['btn_secondary_color']['hover'])) {
                echo 'color:' . $zo_mercury_data['btn_secondary_color']['hover'] . ';';
            }
            echo '}';
        }
        if (!empty($zo_mercury_data['breacrumb_typography'])) {
            echo '#breadcrumb-text{';
            echo zo_mercury_general_typography($zo_mercury_data['breacrumb_typography']);
            echo '}';
        }
        return ob_get_clean();
    }

}
new Zo_Mercury_StaticCss();