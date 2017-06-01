<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package ZoTheme
 * @subpackage Zo Theme
 * @since 1.0.0
 * @author ZoTheme
 */
get_header();
$zo_mercury_meta = zo_mercury_post_meta();
$container = 'container';
if (!empty($zo_mercury_meta['content_width'])) {
    $container = $zo_mercury_meta['content_width'];
}
$content_size = 12;
$sidebar = '';
$had_sidebar ='';
if (!empty($zo_mercury_meta['content_sidebar']) && $zo_mercury_meta['content_sidebar'] != 'default') {
    $sidebar_size = zo_mercury_sidebar_width();
    $content_size = 12 - $sidebar_size;
    $sidebar = $zo_mercury_meta['content_sidebar'];
    $had_sidebar = 'zo-content-sidebar';
}
?>
<div id="page-default" class="<?php echo esc_attr($container); ?>">
    <div id="primary" class="row">
        <?php if ($sidebar == 'left') { ?>
            <div class="col-xs-12 col-sm-<?php echo esc_attr($sidebar_size); ?> col-md-<?php echo esc_attr($sidebar_size); ?> col-lg-<?php echo esc_attr($sidebar_size); ?>">
                <?php get_sidebar(); ?>
            </div>
        <?php } ?>
        <div id="content" role="main" <?php if($sidebar) {echo 'class="col-xs-12 col-sm-'.esc_attr($content_size).' col-md-'.esc_attr($content_size).' col-lg-'.esc_attr($content_size).' '.esc_attr($had_sidebar). '"' ;}?>>
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('single-templates/content', 'page'); ?>
                <?php comments_template('', true); ?>
            <?php endwhile; // end of the loop. ?>
        </div><!-- #content -->
        <?php if ($sidebar == 'right') { ?>
            <div class="col-xs-12 col-sm-<?php echo esc_attr($sidebar_size); ?> col-md-<?php echo esc_attr($sidebar_size); ?> col-lg-<?php echo esc_attr($sidebar_size); ?>">
                <?php get_sidebar(); ?>
            </div>
        <?php } ?>
    </div><!-- #primary -->
</div>
<?php get_footer(); ?>
