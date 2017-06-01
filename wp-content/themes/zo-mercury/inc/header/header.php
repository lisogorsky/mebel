<?php
/**
 * @name : Default
 * @package : ZoTheme
 * @author : ZoTheme
 */
global $zo_mercury_data, $zo_mercury_meta;
$container = 'container-fluid';
if (!empty($zo_mercury_meta->_zo_header_width)) {
    if ($zo_mercury_meta->_zo_header_width == 'off') {
        $container = 'container';
    }
} else {
    if (isset($zo_mercury_data['wide_boxed_header']) && !$zo_mercury_data['wide_boxed_header']) {
        $container = 'container';
    }
}
$transparent = '';
if (!empty($zo_mercury_meta->_zo_header_transparent)) {
    if ($zo_mercury_meta->_zo_header_transparent == 'on') {
        $transparent = 'header-transparent';
    }
} else {
    if (isset($zo_mercury_data['header_transparent']) && $zo_mercury_data['header_transparent']) {
        $transparent = 'header-transparent';
    }
}
$logo = get_template_directory_uri() . '/assets/logo.png';
if (!empty($zo_mercury_meta->_zo_header_logo)) {
    $logo = wp_get_attachment_url($zo_mercury_meta->_zo_header_logo);
} else {
    if (!empty($zo_mercury_data['main_logo']['url']))
        $logo = $zo_mercury_data['main_logo']['url'];
}
?>
<!-- Header Navigation -->
<div id="zo-header" class="zo-main-header header-default <?php echo esc_attr($transparent); ?> <?php
if (!empty($zo_mercury_data['menu_sticky'])) {
    echo 'no-sticky';
}
?> <?php
if (!empty($zo_mercury_data['menu_sticky_tablets'])) {
    echo 'sticky-tablets';
}
?> <?php
if (!empty($zo_mercury_data['menu_sticky_mobile'])) {
    echo 'sticky-mobile';
}
?> <?php
if (!empty($zo_mercury_meta->_zo_enable_header_menu)) {
    echo 'header-menu-custom';
}
?>">
    <div class="<?php echo esc_attr($container); ?>">
        <div class="row zo-header-main">
            <div id="zo-header-logo" class="zo-header-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img class="zo-main-logo" alt="" src="<?php echo esc_url($logo); ?>">
                    <?php echo zo_mercury_page_header_sticky_logo(); ?>
                </a>
				<div class="zo-header-extra hidden-xs">
					<?php 
					$header_top_left = !empty($zo_mercury_data['header_top_left']) ? $zo_mercury_data['header_top_left'] : 1;
					switch ($header_top_left) {
						case 1:
							$contact = array();
							$contact['contact_email'] = isset($zo_mercury_data['contact_email']) ? $zo_mercury_data['contact_email'] : '';
							$contact['contact_phone'] = isset($zo_mercury_data['contact_phone']) ? $zo_mercury_data['contact_phone'] : '';
							zo_mercury_header_top_contact($contact);
							break;
						case 2:
							zo_mercury_header_top_social();
							break;
						case 3:
							zo_mercury_header_top_navigation();
							break;
						case 4:
							if (is_active_sidebar('header-top-sidebar-1')) {
								dynamic_sidebar('header-top-sidebar-1');
							}
							break;
						case 5:
							if (is_active_sidebar('header-top-sidebar-2')) {
								dynamic_sidebar('header-top-sidebar-2');
							}
							break;
					}
					?>
				</div>
            </div>
            <div class="zo-header-secondary">
                <?php if (is_active_sidebar('navigation-right-sidebar')): ?>
                    <div class="zo-header-navigation-left">
                    <?php endif; ?>
                    <div class="zo-header-navigation">
                        <nav id="site-navigation" class="main-navigation">
                            <?php
                            $attr = array(
                                'menu' => zo_mercury_menu_location(),
                                'items_wrap' => '<ul class="nav-menu menu-main-menu">%3$s</ul>',
                            );
                            $menu_locations = get_nav_menu_locations();
                            if (!empty($menu_locations['primary'])) {
                                $attr['theme_location'] = 'primary';
                            }
                            /* enable mega menu. */
                            if (class_exists('HeroMenuWalker')) {
                                $attr['walker'] = new HeroMenuWalker();
                            }
                            /* main nav. */
                            wp_nav_menu($attr);
                            ?>
                        </nav>
                    </div>
                    <?php if (is_active_sidebar('navigation-right-sidebar')): ?>
                    </div>
                    <div id="zo-header-navigation-right" class="zo-header-navigation-right">
                        <?php dynamic_sidebar('navigation-right-sidebar'); ?>
                    </div>
                <?php endif; ?>
            </div>
            <div id="zo-menu-mobile" class="collapse navbar-collapse"><i class="fa fa-bars"></i></div>
        </div>
    </div>
</div>
<!-- #site-navigation -->
<!--#zo-header-->
