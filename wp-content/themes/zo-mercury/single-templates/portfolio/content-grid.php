<?php
/**
 * The default template for displaying content
 *
 *
 * @package ZoTheme
 * @subpackage Zo Theme
 * @since 1.0.0
 */
?>

<?php
$meta_data = zo_mercury_post_meta_data();
$images = !empty($meta_data->_zo_portfolio_images) ? $meta_data->_zo_portfolio_images : '';
$image_ids = explode(',', $images);
?>
<article id="portfolio-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="intent-portfolio-default">
        <?php if(has_post_thumbnail()) : ?>
			<div class="zo-grid-view">
				<?php echo zo_mercury_post_thumbnail($post->ID,600,600, true, true,true);
                ?>
				<div class="zo-grid-mask"></div>
				<a href="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'full')['0'];?>" class="prettyPhoto zo-grid-overlay" data-rel="prettyPhoto[pp_gal]"><i class="fa fa-expand"></i></a>
			</div>
        <?php endif ?>
    </div>
</article>
<script type="text/javascript">
    jQuery(document).ready(function(){
        /*  prettyPhoto  */
        jQuery("[class ^='prettyPhoto']").prettyPhoto({
            allow_resize: true,
            default_width: 800,
            default_height: 600,
            horizontal_padding: 20
        });
    })
</script>