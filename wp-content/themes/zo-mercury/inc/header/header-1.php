<?php
/**
 * @name : Default
 * @package : ZoTheme
 * @author : ZoTheme
 */
?>
<?php
global $zo_mercury_data;
$zo_mercury_meta = zo_mercury_post_meta();

$transparent = '';
if (!empty($zo_mercury_meta['header_transparent'])) {
    if ($zo_mercury_meta['header_transparent'] == 'on') {
        $transparent = 'header-transparent';
    }
} else {
    if (isset($zo_mercury_data['header_transparent']) && $zo_mercury_data['header_transparent']) {
        $transparent = 'header-transparent';
    }
}
$container = 'container-fluid';
if (!empty($zo_mercury_meta['header_width'])) {
    if ($zo_mercury_meta['header_width'] == 'off') {
        $container = 'container';
    }
} else {
    if (isset($zo_mercury_data['wide_boxed_header']) && !$zo_mercury_data['wide_boxed_header']) {
        $container = 'container';
    }
}
$logo = get_template_directory_uri() . '/assets/images/mercury-logo.png';
if (!empty($zo_mercury_meta['header_logo'])) {
    $logo = $zo_mercury_meta['header_logo'];
} else {
    if (!empty($zo_mercury_data['main_logo']['url'])) {
        $logo = $zo_mercury_data['main_logo']['url'];
    }
}
?>



<!-- Header Navigation -->
<div id="zo-header" class="zo-main-header header-default zo-header01 <?php echo esc_attr($transparent); ?> <?php
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
if (!empty($zo_mercury_meta['enable_header_menu'])) {
    echo 'header-menu-custom';
}
?>">

    <!-- Header Top -->
    <div id="zo-header-top">
        <div class="<?php echo esc_attr($container); ?>">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 header-top-left">
                    <?php
                    switch ($zo_mercury_data['header_top_left']) {
                        case 1:
                            $contact = array();
                            $contact['contact_phone'] = isset($zo_mercury_data['contact_phone']) ? $zo_mercury_data['contact_phone'] : '';
                            $contact['contact_email'] = isset($zo_mercury_data['contact_email']) ? $zo_mercury_data['contact_email'] : '';
                            $contact['contact_description'] = isset($zo_mercury_data['contact_description']) ? $zo_mercury_data['contact_description'] : '';
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
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 header-top-right">
                    <?php
                    switch ($zo_mercury_data['header_top_right']) {
                        case 1:
                            $contact = array();
                            $contact['contact_phone'] = isset($zo_mercury_data['contact_phone']) ? $zo_mercury_data['contact_phone'] : '';
                            $contact['contact_email'] = isset($zo_mercury_data['contact_email']) ? $zo_mercury_data['contact_email'] : '';
							$contact['contact_description'] = isset($zo_mercury_data['contact_description']) ? $zo_mercury_data['contact_description'] : '';
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
        </div>
    </div>
    <div class="<?php echo esc_attr($container); ?>">
        <div class="row">
			<div class="zo-header-main">
				<div class="col-xs-12">
					<div id="zo-header-logo" class="zo-header-logo">
						<a href="<?php echo esc_url(home_url('/')); ?>">
							<img class="zo-main-logo" alt="" src="<?php echo esc_url($logo); ?>">
							<?php echo zo_mercury_page_header_sticky_logo(); ?>
						</a>
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
										'menu_class' => 'nav-menu menu-main-menu',
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
    </div>
</div>
<!-- #site-navigation -->
<!--#zo-header-->
