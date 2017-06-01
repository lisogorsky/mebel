<?php
/**
 * The Template for displaying all single posts
 *
 * @package ZoTheme
 * @subpackage Zo Theme
 * @since 1.0.0
 */
$settings = zo_mercury_portfolio_setting();
$sidebar_size = (int)$settings['body_sidebar_size'];
$content_size = 12;
if($settings['portfolio_single_sidebar']!='none'){
    $content_size = 12 - $sidebar_size;
}
wp_enqueue_script('mercury-portfolio-prettyphoto', get_template_directory_uri() . '/assets/js/zo_portfolio_prettyphoto.js', array('jquery'), '1.0', true);
get_header(); ?>
<div class="<?php echo esc_attr($settings['portfolio_single_width']);?>">
    <div class="row">
        <?php if($settings['portfolio_single_sidebar'] == 'left'){?>
			<div class="col-xs-12 col-sm-<?php echo esc_attr($sidebar_size);?> col-md-<?php echo esc_attr($sidebar_size);?> col-lg-<?php echo esc_attr($sidebar_size);?>">
				<?php get_sidebar(); ?>
			</div>
        <?php }?>
        <div id="primary" class="col-xs-12 col-sm-<?php echo esc_attr($content_size);?> col-md-<?php echo esc_attr($content_size);?> col-lg-<?php echo esc_attr($content_size);?>">
            <div id="content" role="main">

                <?php while (have_posts()) : the_post(); ?>

                    <?php
                        $meta_data = zo_mercury_post_meta_data();
                    ?>
                    <article id="portfolio-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="zo-portfolio-default">
                            <?php if(!empty($settings['portfolio_single_media'])){ ?>
                            <div class="zo-portfolio-media">
                                <div class="media-image">
                                    <?php if(has_post_thumbnail()) : ?>
                                        <div class="zo-portfolio-image">
                                            <?php the_post_thumbnail( 'full' ); ?>
                                        </div>
                                    <?php endif ?>
                                </div>
                                <?php if(!empty($meta_data->_zo_portfolio_images)){
                                    $images = !empty($meta_data->_zo_portfolio_images) ? $meta_data->_zo_portfolio_images : '';
                                    $image_ids = explode(',', $images);
                                ?>
                                <div id="portfolio-gallery-<?php the_ID(); ?>" class="portfolio-gallery row">
                                    <?php foreach ($image_ids as $image_id) :
                                        $attachment_thumb = wp_get_attachment_image_src($image_id, 'thumbnail', false);
                                        $attachment_image = wp_get_attachment_image_src($image_id, 'full', false);
                                        if($attachment_image[0] != ''):
                                        echo '<div class="portfolio-item col-md-2"><a href="'. esc_url( $attachment_image[0] ) .'" rel="prettyPhoto[pp_gal]"><img src="'. esc_url($attachment_thumb[0]) .'"  alt="'. esc_attr( get_the_title() ) .'" title="'. esc_attr( get_the_title() ).'"/></a></div>';
                                        endif;
                                    endforeach; ?>
                                </div>
                                <?php }?>
                            </div>
                            <?php }?>
                            <div class="zo-portfolio-detail">
                                <?php if(!empty($settings['portfolio_single_title'])){ ?>
                                <div class="zo-portfolio-title">
                                    <h2><?php the_title(); ?></h2>
                                </div>
                                <?php }?>
                                <?php if(!empty($settings['portfolio_single_author'])){ ?>
                                <div class="portfolio-author row">
                                    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 zo-portfolio-label">
                                        <?php echo esc_attr($settings['portfolio_single_author_label']); ?>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
                                        <?php if(!empty($meta_data->_zo_portfolio_author)) echo esc_attr($meta_data->_zo_portfolio_author); ?>
                                    </div>
                                </div>
                                <?php }?>
                                <?php if(!empty($settings['portfolio_single_client'])){ ?>
                                <div class="portfolio-client row">
                                    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 zo-portfolio-label">
                                        <?php echo esc_attr($settings['portfolio_single_client_label']); ?>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
                                        <?php if(!empty($meta_data->_zo_portfolio_client)) echo esc_attr($meta_data->_zo_portfolio_client); ?>
                                    </div>
                                </div>
                                <?php }?>
                                <?php if(!empty($settings['portfolio_single_date'])){ ?>
                                <div class="portfolio-date row">
                                    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 zo-portfolio-label">
                                        <?php echo esc_attr($settings['portfolio_single_date_label']); ?>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
                                        <?php
                                            $format = 'M d Y';
                                            if(!empty($settings['portfolio_single_date_format'])){
                                                $format = $settings['portfolio_single_date_format'];
                                            }
                                            if(!empty($meta_data->_zo_portfolio_date)) echo mysql2date($format, $meta_data->_zo_portfolio_date);
                                        ?>
                                    </div>
                                </div>
                                <?php }?>
                                <?php if(!empty($settings['portfolio_single_skill'])){ ?>
                                <div class="portfolio-skill row">
                                    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 zo-portfolio-label">
                                        <?php echo esc_attr($settings['portfolio_single_skill_label']); ?>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
                                        <?php if(!empty($meta_data->_zo_portfolio_skills)) echo esc_attr($meta_data->_zo_portfolio_skills); ?>
                                    </div>
                                </div>
                                <?php }?>
                                <?php if(!empty($settings['portfolio_single_categories'])){ ?>
                                <div class="portfolio-category row">
                                    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 zo-portfolio-label">
                                        <?php echo _e('Category', 'zo-mercury') ?>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
                                        <?php the_terms( get_the_ID(), 'portfolio-category', '', ' / ' );?>
                                    </div>
                                </div>
                                <?php }?>
                                <div class="zo-portfolio-content">
                                    <?php the_content();?>
                                </div>
                                <?php if(!empty($settings['portfolio_single_social'])){?>
                                <div class="portfolio-share row">
                                    <div class="col-md-12">
                                             <?php zo_mercury_social_share();?>
                                    </div>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </article>

                    <?php if(!empty($settings['portfolio_single_pagination'])) zo_mercury_post_nav(); ?>

                    <?php comments_template('', true); ?>

                <?php endwhile; // end of the loop. ?>
            </div><!-- #content -->
        </div><!-- #primary -->
        <?php if($settings['portfolio_single_sidebar'] == 'right'){?>
        <div class="col-xs-12 col-sm-<?php echo esc_attr($sidebar_size);?> col-md-<?php echo esc_attr($sidebar_size);?> col-lg-<?php echo esc_attr($sidebar_size);?>">
            <?php get_sidebar(); ?>
        </div>
        <?php }?>
    </div>
    <div class="single-container">
        <?php if (is_active_sidebar('sidebar-content')) : ?>
            <div class="container-fluid"><?php dynamic_sidebar('sidebar-content'); ?></div>
        <?php endif; ?>
    </div>
</div>
<?php get_footer(); ?>