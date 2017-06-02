<?php 
    /* get categories */
    $taxonomy = 'category_portfolio';
    $_category = array();
    if(!isset($atts['cat']) || $atts['cat']==''){
        $terms = get_terms($taxonomy);
        foreach ($terms as $cat){
            $_category[] = $cat->term_id;
        }
    } else {
        $_category  = explode(',', $atts['cat']);
    }
    $atts['categories'] = $_category;
	
	/* Gap */
	$gap = (int) $atts['item_gap'];
	$gap_left_right = $gap / 2;
	$gap_style = '';
	if($gap >= 0){
		$gap_style = 'style="
			padding-left: '. esc_attr($gap_left_right) .'px;
			padding-right: '. esc_attr($gap_left_right) .'px;
			margin-bottom: '. esc_attr($gap) .'px;
		"';
	}
	
?>
<div class="zo-grid-wrapper <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">

	<!-- Get Filter Query -->
	<?php if ( isset($atts['filter']) && $atts['filter'] == 1 ): ?>
		<div class="zo-grid-filter ">
			<ul class="zo-filter-category list-unstyled list-inline">
				<li><a class="active" href="#" data-group="all"><?php esc_html_e("Все фото", 'zo-mercury');?></a></li>
				<?php
					$posts = $atts['posts'];
					$query = $posts->query;
					$taxs  = array();
					if(isset($query['tax_query'])){
						$tax_query=$query['tax_query'];
						foreach($tax_query as $tax){
							if(is_array($tax)){
								$taxs[] = $tax['terms'];
							}
						}
					}
					foreach ($atts['categories'] as $category):
						if(!empty($taxs)){
							if(in_array($category,$taxs)) {
								$term = get_term($category, $taxonomy);
						   ?>
								<li><a href="#" data-group="<?php echo esc_attr('category-' . $term->slug); ?>"><?php echo esc_attr($term->name); ?></a></li>
				<?php 		}
						}else{
							$term = get_term($category, $taxonomy);
				?>
							<li><a href="#" data-group="<?php echo esc_attr('category-' . $term->slug); ?>"><?php echo esc_attr($term->name); ?></a></li>
				<?php
						} 
					endforeach; 
				?>
			</ul>
		</div>
	<?php endif; ?>
		
	<div class="row zo-grid <?php echo esc_attr($atts['grid_class']);?>">
		<?php
		$posts = $atts['posts'];
		$size = ( isset($atts['layout']) && $atts['layout']=='basic')?'thumbnail':'medium';
		while($posts->have_posts()){
			$posts->the_post();
			$groups = array();
			$groups[] = '"all"';
			foreach(zoGetCategoriesByPostID(get_the_ID(),$taxonomy) as $category){
				$groups[] = '"category-'.$category->slug.'"';
			}
			?>
			<div class="zo-grid-item <?php echo esc_attr($atts['item_class']);?>" <?php if($gap_style) echo balanceTags($gap_style);?> data-groups='[<?php echo implode(',', $groups);?>]'>
				<?php
					if (has_post_thumbnail() && !post_password_required() && !is_attachment() && wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)):
						if($atts['image_size']=='custom'){
							$attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
							$attachment_full_image = $attachment_image[0];
							$image_resize = zo_image_resize($attachment_full_image, $atts['image_width'], $atts['image_height'], true );
						}else{
							$image_resize = get_the_post_thumbnail($atts['image_size']);
						}
						$img_full = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)[0];
					else:
						$img_full = ZO_IMAGES . 'no-image.jpg';
						$image_resize = $img_full;
					endif;
				?>
				<div class="zo-grid-view">
					<?php echo '<img src="'. esc_attr($image_resize) .'" alt="' . get_the_title() . '">';?>
					<div class="zo-grid-mask"></div>
					<a class="prettyPhoto zo-grid-overlay" data-rel="prettyPhoto[pp_gal]" href="<?php echo esc_url($img_full); ?>" ><i class="fa fa-expand"></i></a>
				</div>
			</div>
			<?php
		}
		?>
	</div>
	<?php if(isset($atts['pagination']) && $atts['pagination']) {?>
		<nav class="navigation paging-navigation clearfix" role="navigation">
				<div class="pagination loop-pagination">
					<?php print($atts['pagination']); ?>
				</div><!-- .pagination -->
		</nav><!-- .navigation -->
	<?php }?>
	
	<?php
	wp_reset_postdata();
	?>
</div>

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
