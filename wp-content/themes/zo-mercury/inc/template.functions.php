<?php
/**
 * Page title template
 * @since 1.0.0
 * @author ZoTheme
 */
/* Set Variable For Scss */
function zo_mercury_setvariablescss($var, $output, $var_default, $var_empty = null) {
    if (trim($var_empty) == null || trim($var_empty) == '')
        $var_empty = $var_default;
    $var = isset($var) ? (empty($var) ? $var_empty : esc_attr($var)) : $var_default;
    echo do_shortcode($output . ':' . $var . ';') . "\n";
}

//Load header top contact
function zo_mercury_header_top_contact($contact = array()) {
    echo '<ul class="header-top-contact">';
    if (!empty($contact['contact_email'])) {
        echo '<li class="contact-email"><i class="fa fa-envelope"></i> '
        . '<a href="mailto:' . esc_attr($contact['contact_email']) . '" title ="Email">' . esc_attr($contact['contact_email'])
        . '</a></li>';
    }
    if (!empty($contact['contact_phone'])) {
        echo '<li class="contact-phone"><i class="fa fa-phone"></i> ' . esc_attr($contact['contact_phone']) . '</li>';
    }
	if (!empty($contact['contact_description'])) {
        echo '<li class="contact_description">' . esc_attr($contact['contact_description']) . '</li>';
    }
    echo '</ul>';
}

//Load social links
function zo_mercury_header_top_social() {
    global $zo_mercury_data;
    $socials = $zo_mercury_data['social_link_header_top'];
    echo '<ul class="header-top-social">';
    foreach ($socials as $social => $key) {
        if (isset($zo_mercury_data[$social]) && $key) {
            echo '<li class="' . esc_attr($social) . '">';
            echo '<a href="' . esc_attr($zo_mercury_data[$social]) . '" title="' . esc_attr($social) . '">';
            echo '<i class="fa fa-' . esc_attr($social) . '"></i>';
            echo '</a></li>';
        }
    }
    echo '</ul>';
}

//Load social links
function zo_mercury_footer_social() {
    global $zo_mercury_data;
    $socials = $zo_mercury_data['social_link_header_top'];
    echo '<ul class="footer-social">';
    foreach ($socials as $social => $key) {
        if (isset($zo_mercury_data[$social]) && $key) {
            echo '<li class="' . esc_attr($social) . '">';
            echo '<a href="' . esc_attr($zo_mercury_data[$social]) . '" title="' . esc_attr($social) . '">';
            echo '<i class="fa fa-' . esc_attr($social) . '"></i>';
            echo '</a></li>';
        }
    }
    echo '</ul>';
}

//Load Header top navigation
function zo_mercury_header_top_navigation() {
    $attr = array(
        'menu' => zo_mercury_menu_location(),
        'menu_class' => 'nav-menu header-top-navigation',
    );
    $menu_locations = get_nav_menu_locations();
    if (!empty($menu_locations['top_navigation'])) {
        $attr['theme_location'] = 'top_navigation';
    }
    wp_nav_menu($attr);
}

//Load Page title
function zo_mercury_page_title() {
    global $zo_mercury_data;
    $zo_mercury_meta = zo_mercury_post_meta();
    $settings = array();
    //get theme options
    $settings = zo_mercury_page_title_default($zo_mercury_meta);
    if (is_page()) {
		if(!empty($zo_mercury_meta['page_title']) && $zo_mercury_meta['page_title'] == 'off'){
			
		}elseif(!empty($zo_mercury_meta['page_title']) && $zo_mercury_meta['page_title'] == 'on'){
			$settings = zo_mercury_page_title_page($settings, $zo_mercury_meta);
			zo_mercury_page_title_content($settings);
		}else {
			if (!empty($zo_mercury_data['page_title']) || !empty($zo_mercury_data['unit_test'])) {
				//get page options
				$settings = zo_mercury_page_title_page($settings, $zo_mercury_meta);
				zo_mercury_page_title_content($settings);
			}
		}
    } else {
        /* Page title post */
        $posttype = 'post';
        if (is_home()) {
            if (isset($zo_mercury_data['blog_pt_bar']) && empty($zo_mercury_data['blog_pt_bar'])) {
                return;
            } elseif (!empty($zo_mercury_data['blog_pt_bar'])) {
                $settings = zo_mercury_page_title_blog($settings, $zo_mercury_data);
            }
        } else {
            
        }
        zo_mercury_page_title_content($settings);
    }
}

/**
 * Get page title default from theme options.
 *
 * @author ZoTheme
 */
function zo_mercury_page_title_default($zo_mercury_meta = array()) {
    global $zo_mercury_data;
    $settings = array();
    //Page Title Settings
    $settings['pt_width'] = !empty($zo_mercury_data['pt_width']) ? (int) $zo_mercury_data['pt_width'] : 0;
    $settings['pt_parallax'] = !empty($zo_mercury_data['pt_parallax']) ? (int) $zo_mercury_data['pt_parallax'] : 0;
    $settings['pt_alignment'] = !empty($zo_mercury_data['pt_alignment']) ? $zo_mercury_data['pt_alignment'] : 'left';
    $settings['pt_vertical_alignment'] = !empty($zo_mercury_data['pt_vertical_alignment']) ? $zo_mercury_data['pt_vertical_alignment'] : 'middle';
    $settings['pt_breadcrumb'] = !empty($zo_mercury_data['pt_breadcrumb']) ? $zo_mercury_data['pt_breadcrumb'] : 'breadcrumb';
    $settings['pt_breadcrumb_position'] = !empty($zo_mercury_data['pt_breadcrumb_position']) ? $zo_mercury_data['pt_breadcrumb_position'] : 'bellow';
    $settings['breacrumb_prefix'] = !empty($zo_mercury_data['breacrumb_prefix']) ? $zo_mercury_data['breacrumb_prefix'] : '';
    if (!empty($zo_mercury_meta['page_title_sub_text'])) {
        $settings['pt_sub'] = $zo_mercury_meta['page_title_sub_text'];
    } else {
        $settings['pt_sub'] = !empty($zo_mercury_data['pt_sub']) ? $zo_mercury_data['pt_sub'] : '';
    }
    return $settings;
}

function zo_mercury_page_title_page($settings = array(), $zo_mercury_meta = array()) {
    if (!empty($zo_mercury_meta['page_title_width']) && $zo_mercury_meta['page_title_width'] != 'default') {
        $settings['pt_width'] = $zo_mercury_meta['page_title_width'];
    }
    if (!empty($zo_mercury_meta['page_title_text_alignment']) && $zo_mercury_meta['page_title_text_alignment'] != 'default') {
        $settings['pt_alignment'] = $zo_mercury_meta['page_title_text_alignment'];
    }
    if (!empty($zo_mercury_meta['page_title_text_horizontal_alignment']) && $zo_mercury_meta['page_title_text_horizontal_alignment'] != 'default') {
        $settings['pt_vertical_alignment'] = $zo_mercury_meta['page_title_text_horizontal_alignment'];
    }
    if (!empty($zo_mercury_meta['page_title_breadcrumb_display']) && $zo_mercury_meta['page_title_breadcrumb_display'] != 'default') {
        $settings['pt_breadcrumb'] = $zo_mercury_meta['page_title_breadcrumb_display'];
    }
    if (!empty($zo_mercury_meta['page_title_breadcrumb_position']) && $zo_mercury_meta['page_title_breadcrumb_position'] != 'default') {
        $settings['pt_breadcrumb_position'] = $zo_mercury_meta['page_title_breadcrumb_position'];
    }
    return $settings;
}

function zo_mercury_page_title_blog($settings = array(), $zo_mercury_data) {
    if (!empty($zo_mercury_data['blog_layout_width'])) {
        $settings['pt_width'] = $zo_mercury_data['blog_layout_width'];
    }
    if (!empty($zo_mercury_data['blog_pt_sub'])) {
        $settings['pt_sub'] = $zo_mercury_data['blog_pt_sub'];
    }
    return $settings;
}

function zo_mercury_page_title_content($settings = array()) {
    global $zo_mercury_base;
    $pa_class = '';
    $pa_style = '';
    if ((int) $settings['pt_parallax'] == 1) {
        $pa_class = "zo_header_parallax";
        $pa_style = 'style="background-position: 50% 0;background-attachment:fixed;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;"';
    }
    $container = 'container';
    if ($settings['pt_width']) {
        $container = 'container-fluid';
    }
    ?>
    <div id="zo-page-element-wrap" class="<?php
    echo esc_attr($pa_class);
    echo ' ' . $settings['pt_breadcrumb_position'];
    ?>" <?php echo do_shortcode($pa_style); ?>>
        <div class="<?php echo esc_attr($container); ?> zo-page-title-container">
            <div class="zo-page-title-content">
                <?php if ($settings['pt_alignment'] == 'left' && $settings['pt_breadcrumb_position'] == 'symmetric') { ?>
                    <div class="zo-page-title-text">
                        <h1><?php $zo_mercury_base->getPageTitle(); ?></h1>
                        <?php
                        if ($settings['pt_sub'] != '')
                            echo '<div class="zo-page-title-sub">' . $settings['pt_sub'] . '</div>';
                        ?>
                    </div>
                    <?php
                    if ($settings['pt_breadcrumb'] != 'none') {
                        zo_mercury_page_title_breadcrumb($settings['pt_breadcrumb'], 'zo-page-title-secondary');
                    }
                } elseif ($settings['pt_alignment'] == 'right' && $settings['pt_breadcrumb_position'] == 'symmetric') {
                    if ($settings['pt_breadcrumb'] != 'none') {
                        zo_mercury_page_title_breadcrumb($settings['pt_breadcrumb'], 'zo-page-title-secondary');
                    }
                    ?>
                    <div class="zo-page-title-text">
                        <h1><?php $zo_mercury_base->getPageTitle(); ?></h1>
                        <?php
                        if ($settings['pt_sub'] != '')
                            echo '<div class="zo-page-title-sub">' . $settings['pt_sub'] . '</div>';
                        ?>
                    </div>
                <?php }else { //Align center    ?>
                    <div class="zo-page-title-text">
                        <?php if ($settings['pt_breadcrumb_position'] != 'above') { ?>
                            <h1><?php $zo_mercury_base->getPageTitle(); ?></h1>
                            <?php
                            if ($settings['pt_sub'] != '')
                                echo '<div class="zo-page-title-sub">' . $settings['pt_sub'] . '</div>';
                            ?>
                            <?php
                            if ($settings['pt_breadcrumb'] != 'none') {
                                zo_mercury_page_title_breadcrumb($settings['pt_breadcrumb'], 'zo-page-title-secondary-bellow');
                            }
                        } else {
                            if ($settings['pt_breadcrumb'] != 'none') {
                                zo_mercury_page_title_breadcrumb($settings['pt_breadcrumb'], 'zo-page-title-secondary-above');
                            }
                            ?>
                            <h1><?php $zo_mercury_base->getPageTitle(); ?></h1>
                            <?php
                            if ($settings['pt_sub'] != '')
                                echo '<div class="zo-page-title-sub">' . $settings['pt_sub'] . '</div>';
                        }
                        ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php
}

/**
 *
 * @author ZoTheme
 */
function zo_mercury_page_title_breadcrumb($breadcrumb_type = 'breadcrumb', $class = 'zo-page-title-secondary') {
    global $zo_mercury_base;
    if ($breadcrumb_type == 'breadcrumb') {
        ?>
        <div id="breadcrumb-text" class="<?php echo esc_attr($class); ?> breadcrumb-text">
            <?php $zo_mercury_base->getBreadCrumb(); ?>
        </div>
    <?php } else { ?>
        <div id="zo-page-title-secondary" class="<?php echo esc_attr($class); ?> zo-page-title-custom-widget">
            <?php
            if (is_active_sidebar('page-title-sidebar')) {
                dynamic_sidebar('page-title-sidebar');
            }
            ?>
        </div>
        <?php
    }
}

/**
 * Get Header Layout.
 *
 * @author ZoTheme
 */
function zo_mercury_header() {
    global $zo_mercury_data;
    $zo_mercury_meta = zo_mercury_post_meta();

    /* header for page */
    if (!empty($zo_mercury_meta['header_layout']) && $zo_mercury_meta['header_layout'] != 'default') {
        $zo_mercury_data['header_layout'] = $zo_mercury_meta['header_layout'];
    }else{
		$zo_mercury_data['header_layout'] = '';
	}
    /* load template. */
    get_template_part('inc/header/header', $zo_mercury_data['header_layout']);
}

/**
 * Get Header Layout.
 *
 * @author ZoTheme
 */
function zo_mercury_footer() {
    global $zo_mercury_data;
	$zo_mercury_meta = zo_mercury_post_meta();

    /* Footer for page */
	if (!empty($zo_mercury_meta['footer_layout']) && $zo_mercury_meta['footer_layout'] != 'default') {
        $zo_mercury_data['footer_layout'] = $zo_mercury_meta['footer_layout'];
    }else{
		$zo_mercury_data['footer_layout'] = '';
	}
    /* load template. */
    get_template_part('inc/footer/footer', $zo_mercury_data['footer_layout']);
}

if (!function_exists('zo_mercury_page_header_sticky_logo')) {

    function zo_mercury_page_header_sticky_logo() {
        global $zo_mercury_data;
        $zo_mercury_meta = zo_mercury_post_meta();
        $logo = isset($zo_mercury_data['sticky_logo']['url']) ? $zo_mercury_data['sticky_logo']['url'] : '';
        if (!empty($logo)) {
            $logo = '<img class="zo-sticky-logo" src="' . esc_url($logo) . '" alt="'. esc_html__('Sticky Logo','zo-mercury') .'"/>';
        }
        return $logo;
    }

}

function zo_mercury_general_background($setting = array()) {
    $css = '';
// Background color
    if (!empty($setting['background-color'])) {
        $css .= 'background-color: ' . esc_attr($setting['background-color']) . ';';
    }

// Background image.
    if (!empty($setting['background-image'])) {
        $css .= 'background-image: url("' . esc_attr($setting['background-image']) . '");';
    }

// Background image options
    if (!empty($setting['background-repeat'])) {
        $css .= 'background-repeat: ' . esc_attr($setting['background-repeat']) . ';';
    }
    if (!empty($setting['background-position'])) {
        $css .= 'background-position: ' . esc_attr($setting['background-position']) . ';';
    }
    if (!empty($setting['background-size'])) {
        $css .= 'background-size: ' . esc_attr($setting['background-size']) . ';';
    }
    if (!empty($setting['background-attachment'])) {
        $css .= 'background-attachment: ' . esc_attr($setting['background-attachment']) . ';';
    }

    return $css;
}

function zo_mercury_general_typography($setting = array()) {
    $css = '';
// Font
    if (!empty($setting['font-family'])) {
        $css .= 'font-family: ' . esc_attr($setting['font-family']);
// Font backup
        if (!empty($setting['font-backup'])) {
            $css .= ',' . esc_attr($setting['font-backup']) . '';
        }
        $css .= ';';
    }
    if (!empty($setting['font-weight'])) {
        $css .= 'font-weight: ' . esc_attr($setting['font-weight']) . ';';
    }
    if (!empty($setting['font-size'])) {
        $css .= 'font-size: ' . esc_attr($setting['font-size']) . ';';
    }
	if (!empty($setting['font-style'])) {
        $css .= 'font-style: ' . esc_attr($setting['font-style']) . ';';
    }
    if (!empty($setting['text-align'])) {
        $css .= 'text-align: ' . esc_attr($setting['text-align']) . ';';
    }
    if (!empty($setting['font-weight'])) {
        $css .= 'font-weight: ' . esc_attr($setting['font-weight']) . ';';
    }
    if (!empty($setting['line-height'])) {
        $css .= 'line-height: ' . esc_attr($setting['line-height']) . ';';
    }
    if (!empty($setting['color'])) {
        $css .= 'color: ' . esc_attr($setting['color']) . ';';
    }
    if (!empty($setting['letter-spacing'])) {
        $css .= 'letter-spacing: ' . esc_attr($setting['letter-spacing']) . ';';
    }

    return $css;
}

function zo_mercury_calc_font_size($font_size = '0', $sensitivity = 100) {
    $font_size = str_replace('px', '', $font_size);
    $font_size = (int) $font_size;
    $new_size = 0;
    if ($sensitivity >= 100) {
        $new_size = (int) ($font_size * ($sensitivity - 100)) / 100 + $font_size;
    } else {
        $new_size = (int) ($font_size * $sensitivity) / 100;
    }
    return $new_size . 'px';
}

/**
 * Get menu location ID.
 *
 * @param string $option
 * @return NULL
 */
function zo_mercury_menu_location($option = 'primary') {
    $zo_mercury_meta = zo_mercury_post_meta();
    /* get menu id from page setting */
    return (!empty($zo_mercury_meta[$option])) ? $zo_mercury_meta[$option] : null;
}

function zo_mercury_get_page_loading() {
    global $zo_mercury_data;

    if (!empty($zo_mercury_data['enable_page_loadding'])) {
        echo '<div id="zo-loadding">';
        switch ($zo_mercury_data['page_loadding_style']) {
            case '2':
                echo '<div class="ball"></div>';
                break;
            default:
                echo '<div class="loader"></div>';
                break;
        }
        echo '</div>';
    }
}

/**
 * Add body layout
 *
 * @author CmsTheme
 * @since 1.0.0
 */
add_filter('body_class', function($classes) {
    global $zo_mercury_data;
    $zo_mercury_meta = zo_mercury_post_meta();
    if (!empty($zo_mercury_meta['page_layout']) && $zo_mercury_meta['page_layout'] != '0') {
        //Page option
        if ($zo_mercury_meta['page_layout'] == 'boxed') {
            array_push($classes, 'zo-boxed');
        } else {
            array_push($classes, 'zo-wide');
        }
    } else {
        //Theme option
        if (isset($zo_mercury_data['body_layout']) && $zo_mercury_data['body_layout'] == 'boxed') {
            array_push($classes, 'zo-boxed');
        } else {
            array_push($classes, 'zo-wide');
        }
    }
    if (!empty($zo_mercury_meta['page_dark'])) {
        array_push($classes, 'zo-dark');
    } else {
        if (isset($zo_mercury_data['body_layout_dark']) && $zo_mercury_data['body_layout_dark']) {
            array_push($classes, 'zo-dark');
        }
    }
	if(!empty($zo_mercury_data['unit_test'])) {
		array_push($classes, 'unit-test');
	}
    return $classes;
});

/**
 * Media Audio.
 *
 * @param string $before
 * @param string $after
 * @return bool|string
 */
function zo_mercury_archive_audio() {
    global $zo_mercury_base, $zo_mercury_data;
    /* get shortcode audio. */
    $shortcode = $zo_mercury_base->getShortcodeFromContent('audio', get_the_content());

    if ($shortcode) {
        return do_shortcode($shortcode);
    }
    return false;
}

/**
 * Media Video.
 * @return bool|string
 */
function zo_mercury_archive_video() {

    global $wp_embed, $zo_mercury_base, $zo_mercury_data;
    /* Get Local Video */
    $local_video = $zo_mercury_base->getShortcodeFromContent('video', get_the_content());

    /* Get Youtobe or Vimeo */
    $remote_video = $zo_mercury_base->getShortcodeFromContent('embed', get_the_content());

    if ($local_video) {
        /* view local. */
        return do_shortcode($local_video);
    } elseif ($remote_video) {
        /* view youtobe or vimeo. */
        return do_shortcode($wp_embed->run_shortcode($remote_video));
        ;
    }
    return false;
}

/**
 * Gallerry Images
 *
 * @author ZoTheme
 * @since 1.0.0
 * @param string $image_size
 * @return bool|string
 */
function zo_mercury_archive_gallery($image_size = 'full') {
    global $zo_mercury_base, $zo_mercury_data;
    /* get shortcode gallery. */
    $shortcode = $zo_mercury_base->getShortcodeFromContent('gallery', get_the_content());
    if ($shortcode != '') {
        preg_match('/\[gallery.*ids=.(.*).\]/', $shortcode, $ids);

        if (!empty($ids)) {

            $array_id = explode(",", $ids[1]);
            ob_start();
            ?>
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php $i = 0; ?>
                    <?php foreach ($array_id as $image_id): ?>
                        <?php
                        $attachment_image = wp_get_attachment_image_src($image_id, $image_size, false);
                        if ($attachment_image[0] != ''):
                            ?>
                            <div class="item <?php
                            if ($i == 0) {
                                echo 'active';
                            }
                            ?>">
                                <img data-src="holder.js" src="<?php echo esc_url($attachment_image[0]); ?>" alt="" />
                            </div>
                            <?php
                            $i++;
                        endif;
                        ?>
                    <?php endforeach; ?>
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="fa fa-angle-right"></span>
                </a>
            </div>
            <?php
            return ob_get_clean();
        } else {
            return false;
        }
    } elseif (has_post_thumbnail()) {
        return get_the_post_thumbnail($image_size);
    }
    return false;
}

/**
 * Quote Text.
 *
 * @author ZoTheme
 * @since 1.0.0
 */
function zo_mercury_archive_quote() {
    global $zo_mercury_data;
    /* get text. */
    preg_match('/\<blockquote\>(.*)\<\/blockquote\>/', get_the_content(), $blockquote);

    if (!empty($blockquote[0])) {
        return do_shortcode($blockquote[0]);
    }
    return false;
}

/**
 * Post link
 *
 * @author Zacky
 * @since 1.0.0
 */
function zo_mercury_archive_link() {
    /* get text. */
    preg_match("/<a(.*)href=\"(.*)\"(.*)<\/a>/", get_the_content(), $link);
    if (!empty($link[0])) {
        return do_shortcode($link[0]);
    }
    return false;
}

/**
 * Get social share link
 *
 * @return string
 * @author Zacky
 * @since 1.0.0
 */
function zo_mercury_social_share() {
    global $zo_mercury_data;
    if (!empty($zo_mercury_data['blog_single_social']) && !empty($zo_mercury_data['social_link_blog'])) {
        $socials = $zo_mercury_data['social_link_blog'];
        ?>
        <ul class="social-list">
            <?php
            foreach ($socials as $key => $value) {
                if ($value) {
                    switch ($key) {
                        case 'facebook':
                            ?>
                            <li class="box">
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>" onclick="javascript:void window.open(this.href, '', 'width=600,height=300,resizable=true,left=200px,top=200px');
                                        return false;"><i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <?php
                            break;
                        case 'twitter':
                            ?>
                            <li class="box">
                                <a href="https://twitter.com/intent/tweet?text=<?php echo get_the_title(); ?>&url=<?php echo get_the_permalink(); ?>" onclick="javascript:void window.open(this.href, '', 'width=600,height=300,resizable=true,left=200px,top=200px');
                                        return false;"><i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <?php
                            break;
                        case 'pinterest':
                            ?>
                            <li>
                                <a class="pinterest" href="http://pinterest.com/pin/create/button?url=<?php echo get_the_permalink(); ?>" onclick="javascript:void window.open(this.href, '', 'width=600,height=300,resizable=true,left=200px,top=200px');
                                        return false;" title="Share to Pinterest"><i class="fa fa-pinterest-p"></i>
                                </a>
                            </li>
                            <?php
                            break;
                        case 'linkedin':
                            ?>
                            <li class="box">
                                <a href="https://www.linkedin.com/cws/share?url=<?php echo get_the_permalink(); ?>" onclick="javascript:void window.open(this.href, '', 'width=600,height=300,resizable=true,left=200px,top=200px');
                                        return false;"><i class="fa fa-linkedin"></i>
                                </a>
                            </li>
                            <?php
                            break;
                        case 'google':
                            ?>
                            <li class="box">
                                <a href="https://plus.google.com/share?url=<?php echo get_the_permalink(); ?>" onclick="javascript:void window.open(this.href, '', 'width=600,height=300,resizable=true,left=200px,top=200px');
                                        return false;"><i class="fa fa-google-plus"></i>
                                </a>
                            </li>
                            <?php
                            break;
                    }
                }
            }
            ?>
        </ul>
        <?php
    }
}

function zo_mercury_comment_nav() {
// Are there comments to navigate through?
    if (get_comment_pages_count() > 1 && get_option('page_comments')) :
        ?>
        <nav class="navigation comment-navigation" role="navigation">
            <div class="nav-links">
                <?php
                if ($prev_link = get_previous_comments_link(__('Older Comments', 'zo-mercury'))) :
                    printf('<div class="nav-previous">%s</div>', $prev_link);
                endif;

                if ($next_link = get_next_comments_link(__('Newer Comments', 'zo-mercury'))) :
                    printf('<div class="nav-next">%s</div>', $next_link);
                endif;
                ?>
            </div><!-- .nav-links -->
        </nav><!-- .comment-navigation -->
        <?php
    endif;
}

function zo_mercury_get_blog_search() {
    global $zo_mercury_data;
    $settings = array(
        'blog_layout_width' => 'container',
        'blog_search_layout' => 'large',
        'blog_search_layout_sidebar' => 'none',
        'body_sidebar_size' => 3
    );
    if (!empty($zo_mercury_data['blog_layout_width']) && $zo_mercury_data['blog_layout_width']) {
        $settings['blog_layout_width'] = 'container-fluid';
    }
    if (!empty($zo_mercury_data['blog_search_layout'])) {
        $settings['blog_search_layout'] = $zo_mercury_data['blog_search_layout'];
    }
    if (!empty($zo_mercury_data['blog_search_layout_sidebar'])) {
        $settings['blog_search_layout_sidebar'] = $zo_mercury_data['blog_search_layout_sidebar'];
    }
    if (!empty($zo_mercury_data['body_sidebar_size'])) {
        $settings['body_sidebar_size'] = $zo_mercury_data['body_sidebar_size'];
    }
    return $settings;
}

function zo_mercury_get_blog_setting() {
    global $zo_mercury_data;
    $settings = array(
        'blog_layout_width' => 'container',
        'blog_layout' => 'large',
        'blog_layout_sidebar' => 'none',
        'body_sidebar_size' => 3,
        'blog_archive_layout' => 'large',
        'blog_archive_layout_sidebar' => 'none',
    );
    if (!empty($zo_mercury_data['blog_layout_width']) && $zo_mercury_data['blog_layout_width']) {
        $settings['blog_layout_width'] = 'container-fluid';
    }
    if (!empty($zo_mercury_data['blog_layout'])) {
        $settings['blog_layout'] = $zo_mercury_data['blog_layout'];
    }
    if (!empty($zo_mercury_data['blog_layout_sidebar'])) {
        $settings['blog_layout_sidebar'] = $zo_mercury_data['blog_layout_sidebar'];
    }
    if (!empty($zo_mercury_data['body_sidebar_size'])) {
        $settings['body_sidebar_size'] = $zo_mercury_data['body_sidebar_size'];
    }
    if (!empty($zo_mercury_data['blog_archive_layout'])) {
        $settings['blog_archive_layout'] = $zo_mercury_data['blog_archive_layout'];
    }
    if (!empty($zo_mercury_data['blog_archive_layout_sidebar'])) {
        $settings['blog_archive_layout_sidebar'] = $zo_mercury_data['blog_archive_layout_sidebar'];
    }
    return $settings;
}

function zo_mercury_custom_excerpt_length($length) {
    global $zo_mercury_data;
    if (!empty($zo_mercury_data['blog_excerpt'])) {
        $length = (int) $zo_mercury_data['blog_excerpt'];
    }
    return $length;
}
add_filter('excerpt_length', 'zo_mercury_custom_excerpt_length', 999);

function zo_mercury_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'zo_mercury_excerpt_more');

function zo_mercury_blog_single_setting() {
    global $zo_mercury_data;
    $settings = array(
        'blog_single_width' => 'container',
        'blog_single_sidebar' => 'none',
        'body_sidebar_size' => 3,
        'blog_single_media' => '',
        'blog_single_title' => '',
        'blog_single_author' => '',
        'blog_single_date' => '',
        'blog_single_date_format' => 'l, F j, Y',
        'blog_single_categories' => '',
        'blog_single_tags' => '',
        'blog_single_social' => '',
        'blog_single_pagination' => '',
        'blog_single_related' => '',
        'blog_single_comment' => ''
    );
    if (!empty($zo_mercury_data['blog_single_width']) && $zo_mercury_data['blog_single_width']) {
        $settings['blog_single_width'] = 'container-fluid';
    }
    if (!empty($zo_mercury_data['blog_single_sidebar'])) {
        $settings['blog_single_sidebar'] = $zo_mercury_data['blog_single_sidebar'];
    }
    if (!empty($zo_mercury_data['body_sidebar_size'])) {
        $settings['body_sidebar_size'] = $zo_mercury_data['body_sidebar_size'];
    }
    if (!empty($zo_mercury_data['blog_single_media'])) {
        $settings['blog_single_media'] = $zo_mercury_data['blog_single_media'];
    }
    if (!empty($zo_mercury_data['blog_single_title'])) {
        $settings['blog_single_title'] = $zo_mercury_data['blog_single_title'];
    }
    if (!empty($zo_mercury_data['blog_single_author'])) {
        $settings['blog_single_author'] = $zo_mercury_data['blog_single_author'];
    }
    if (!empty($zo_mercury_data['blog_single_date'])) {
        $settings['blog_single_date'] = $zo_mercury_data['blog_single_date'];
    }
    if (!empty($zo_mercury_data['blog_single_date_format'])) {
        $settings['blog_single_date_format'] = $zo_mercury_data['blog_single_date_format'];
    }
    if (!empty($zo_mercury_data['blog_single_categories'])) {
        $settings['blog_single_categories'] = $zo_mercury_data['blog_single_categories'];
    }
    if (!empty($zo_mercury_data['blog_single_tags'])) {
        $settings['blog_single_tags'] = $zo_mercury_data['blog_single_tags'];
    }
    if (!empty($zo_mercury_data['blog_single_social'])) {
        $settings['blog_single_social'] = $zo_mercury_data['blog_single_social'];
    }
    if (!empty($zo_mercury_data['blog_single_pagination'])) {
        $settings['blog_single_pagination'] = $zo_mercury_data['blog_single_pagination'];
    }
    if (!empty($zo_mercury_data['blog_single_related'])) {
        $settings['blog_single_related'] = $zo_mercury_data['blog_single_related'];
    }
    if (!empty($zo_mercury_data['blog_single_comment'])) {
        $settings['blog_single_comment'] = $zo_mercury_data['blog_single_comment'];
    }
    return $settings;
}

function zo_mercury_portfolio_setting() {
    global $zo_mercury_data;
    $settings = array(
        'portfolio_single_width' => 'container',
        'portfolio_single_sidebar' => 'none',
        'body_sidebar_size' => 3,
        'portfolio_single_media' => '',
        'portfolio_single_title' => '',
        'portfolio_single_author' => '',
        'portfolio_single_client' => '',
        'portfolio_single_skill' => '',
        'portfolio_single_date' => '',
        'portfolio_single_author_label' => '',
        'portfolio_single_client_label' => '',
        'portfolio_single_skill_label' => '',
        'portfolio_single_date_label' => '',
        'portfolio_single_date_format' => 'l, F j, Y',
        'portfolio_single_categories' => '',
        'portfolio_single_social' => '',
        'portfolio_single_pagination' => '',
    );
    if (!empty($zo_mercury_data['portfolio_single_width']) && $zo_mercury_data['portfolio_single_width']) {
        $settings['portfolio_single_width'] = 'container-fluid';
    }
    if (!empty($zo_mercury_data['portfolio_single_sidebar'])) {
        $settings['portfolio_single_sidebar'] = $zo_mercury_data['portfolio_single_sidebar'];
    }
    if (!empty($zo_mercury_data['body_sidebar_size'])) {
        $settings['body_sidebar_size'] = $zo_mercury_data['body_sidebar_size'];
    }
    if (!empty($zo_mercury_data['portfolio_single_media'])) {
        $settings['portfolio_single_media'] = $zo_mercury_data['portfolio_single_media'];
    }
    if (!empty($zo_mercury_data['portfolio_single_title'])) {
        $settings['portfolio_single_title'] = $zo_mercury_data['portfolio_single_title'];
    }
    if (!empty($zo_mercury_data['portfolio_single_author'])) {
        $settings['portfolio_single_author'] = $zo_mercury_data['portfolio_single_author'];
    }
    if (!empty($zo_mercury_data['portfolio_single_skill'])) {
        $settings['portfolio_single_skill'] = $zo_mercury_data['portfolio_single_skill'];
    }
    if (!empty($zo_mercury_data['portfolio_single_client'])) {
        $settings['portfolio_single_client'] = $zo_mercury_data['portfolio_single_client'];
    }
    if (!empty($zo_mercury_data['portfolio_single_date'])) {
        $settings['portfolio_single_date'] = $zo_mercury_data['portfolio_single_date'];
    }
    if (!empty($zo_mercury_data['portfolio_single_author_label'])) {
        $settings['portfolio_single_author_label'] = $zo_mercury_data['portfolio_single_author_label'];
    }
    if (!empty($zo_mercury_data['portfolio_single_skill_label'])) {
        $settings['portfolio_single_skill_label'] = $zo_mercury_data['portfolio_single_skill_label'];
    }
    if (!empty($zo_mercury_data['portfolio_single_client_label'])) {
        $settings['portfolio_single_client_label'] = $zo_mercury_data['portfolio_single_client_label'];
    }
    if (!empty($zo_mercury_data['portfolio_single_date_label'])) {
        $settings['portfolio_single_date_label'] = $zo_mercury_data['portfolio_single_date_label'];
    }
    if (!empty($zo_mercury_data['portfolio_single_date_format'])) {
        $settings['portfolio_single_date_format'] = $zo_mercury_data['portfolio_single_date_format'];
    }
    if (!empty($zo_mercury_data['portfolio_single_categories'])) {
        $settings['portfolio_single_categories'] = $zo_mercury_data['portfolio_single_categories'];
    }
    if (!empty($zo_mercury_data['portfolio_single_social'])) {
        $settings['portfolio_single_social'] = $zo_mercury_data['portfolio_single_social'];
    }
    if (!empty($zo_mercury_data['portfolio_single_pagination'])) {
        $settings['portfolio_single_pagination'] = $zo_mercury_data['portfolio_single_pagination'];
    }
    return $settings;
}

function zo_mercury_portfolio_archive_setting() {
    global $zo_mercury_data;
    $settings = array(
        'portfolio_width' => 'container',
        'portfolio_sidebar' => 'none',
        'body_sidebar_size' => 3,
        'portfolio_media' => '',
        'portfolio_title' => '',
        'portfolio_author' => '',
        'portfolio_client' => '',
        'portfolio_skill' => '',
        'portfolio_date' => '',
        'portfolio_date_format' => 'l, F j, Y',
        'portfolio_categories' => '',
    );
    if (!empty($zo_mercury_data['portfolio_width']) && $zo_mercury_data['portfolio_width']) {
        $settings['portfolio_width'] = 'container-fluid';
    }
    if (!empty($zo_mercury_data['portfolio_sidebar'])) {
        $settings['portfolio_sidebar'] = $zo_mercury_data['portfolio_sidebar'];
    }
    if (!empty($zo_mercury_data['body_sidebar_size'])) {
        $settings['body_sidebar_size'] = $zo_mercury_data['body_sidebar_size'];
    }
    if (!empty($zo_mercury_data['portfolio_media'])) {
        $settings['portfolio_media'] = $zo_mercury_data['portfolio_media'];
    }
    if (!empty($zo_mercury_data['portfolio_title'])) {
        $settings['portfolio_title'] = $zo_mercury_data['portfolio_title'];
    }
    if (!empty($zo_mercury_data['portfolio_author'])) {
        $settings['portfolio_author'] = $zo_mercury_data['portfolio_author'];
    }
    if (!empty($zo_mercury_data['portfolio_client'])) {
        $settings['portfolio_client'] = $zo_mercury_data['portfolio_client'];
    }
    if (!empty($zo_mercury_data['portfolio_date'])) {
        $settings['portfolio_date'] = $zo_mercury_data['portfolio_date'];
    }
    if (!empty($zo_mercury_data['portfolio_date_format'])) {
        $settings['portfolio_date_format'] = $zo_mercury_data['portfolio_date_format'];
    }
    if (!empty($zo_mercury_data['portfolio_categories'])) {
        $settings['portfolio_categories'] = $zo_mercury_data['portfolio_categories'];
    }
    return $settings;
}

/* Add social Author */
add_action('show_user_profile', 'zo_mercury_extra_profile_fields');
add_action('edit_user_profile', 'zo_mercury_extra_profile_fields');
function zo_mercury_extra_profile_fields($user) {
    ?>
    <h3><?php esc_html_e('Social Pages: ', 'zo-mercury'); ?></h3>
    <table class="form-table">
        <tr>
            <th><label for="facebook"><?php esc_html_e('Facebook', 'zo-mercury'); ?></label></th>
            <td>
                <input type="text" name="facebook" id="facebook" value="<?php echo esc_attr(get_the_author_meta('facebook', $user->ID)); ?>" class="regular-text" /><br />
                <span class="description"><?php esc_html_e('Please enter your link Facebook.', 'zo-mercury'); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="twitter"><?php esc_html_e('Twitter', 'zo-mercury'); ?></label></th>
            <td>
                <input type="text" name="twitter" id="twitter" value="<?php echo esc_attr(get_the_author_meta('twitter', $user->ID)); ?>" class="regular-text" /><br />
                <span class="description"><?php esc_html_e('Please enter your link Twitter.', 'zo-mercury'); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="linkedin"><?php esc_html_e('Linkedin', 'zo-mercury'); ?></label></th>
            <td>
                <input type="text" name="linkedin" id="linkedin" value="<?php echo esc_attr(get_the_author_meta('linkedin', $user->ID)); ?>" class="regular-text" /><br />
                <span class="description"><?php esc_html_e('Please enter your link Linkedin.', 'zo-mercury'); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="google"><?php esc_html_e('Google +', 'zo-mercury'); ?></label></th>
            <td>
                <input type="text" name="google" id="google" value="<?php echo esc_attr(get_the_author_meta('google', $user->ID)); ?>" class="regular-text" /><br />
                <span class="description"><?php esc_html_e('Please enter your link Google +.', 'zo-mercury'); ?></span>
            </td>
        </tr>
    </table>
    <?php
}

add_action('personal_options_update', 'zo_mercury_save_extra_profile_fields');
add_action('edit_user_profile_update', 'zo_mercury_save_extra_profile_fields');
function zo_mercury_save_extra_profile_fields($user_id) {

    if (!current_user_can('edit_user', $user_id))
        return false;
    update_user_meta($user_id, 'twitter', $_POST['twitter']);
    update_user_meta($user_id, 'facebook', $_POST['facebook']);
    update_user_meta($user_id, 'linkedin', $_POST['linkedin']);
    update_user_meta($user_id, 'google', $_POST['google']);
}

/**
 * loadmore
 */
function zo_mercury_masonry_loadmore() {

    $paged = ( $_POST['startPage']) ? $_POST['startPage'] : 1;
    $zo_data = $_POST['zo_data'];
    $order = (isset($zo_data['order'])) ? $zo_masonry['order'] : '';

    $args = array(
        'orderby' => $zo_data['orderby'],
        'order' => $order,
        'paged' => $paged,
        'post_status' => 'publish',
        'posts_per_page' => $zo_data['posts_per_page'],
        'post_type' => $zo_data['post_type']
    );

    $posts = new WP_Query($args);
    $size = ( isset($atts['layout']) && $atts['layout'] == 'basic') ? 'medium' : 'full';
    $taxo = 'portfolio-category';
    $tag = 'portfolio-tag';

    while ($posts->have_posts()) {
        $posts->the_post();
        $groups = array();
        $groups[] = '"all"';
        foreach (zoGetCategoriesByPostID(get_the_ID(), $taxo) as $category) {
            $groups[] = '"category-' . $category->slug . '"';
        }
        ?>
        <div class="zo-ajax zo-grid-item <?php echo esc_attr($zo_data['item_class']); ?>" data-groups='[<?php echo implode(',', $groups); ?>]'
             data-order-newest='<?php the_date(); ?>' data-order-title='<?php the_title(); ?>'>
                 <?php get_template_part('single-templates/portfolio/content', 'grid'); ?>
        </div>
        <?php
    }
    wp_reset_postdata();
    die();
}
add_action('wp_ajax_zo_mercury_masonry_loadmore', 'zo_mercury_masonry_loadmore');
add_action('wp_ajax_nopriv_zo_mercury_masonry_loadmore', 'zo_mercury_masonry_loadmore');

function zo_mercury_post_meta($post_id = null) {
    $post_id = empty($post_id) ? get_the_ID() : $post_id;
    $arr = array();
    $temp = get_post_meta($post_id);
    if (is_array($temp)) {
        foreach ($temp as $key => $value) {
            if (count($value) == 1) {
                $arr[$key] = $value[0];
            } else {
                $arr[$key] = $value;
            }
        }
    }
    return $arr;
}

function zo_mercury_sidebar_width() {
    global $zo_mercury_data;
    $sidebar = 3;
    if (!empty($zo_mercury_data['body_sidebar_size'])) {
        $sidebar = (int) $zo_mercury_data['body_sidebar_size'];
    }
    return $sidebar;
}

if( !function_exists('zo_mercury_get_data_options') ) {
	function zo_mercury_get_data_options($key) {
		global $zo_mercury_data;
		return isset($zo_mercury_data[$key]) ? $zo_mercury_data[$key] : NULL;
	}
}