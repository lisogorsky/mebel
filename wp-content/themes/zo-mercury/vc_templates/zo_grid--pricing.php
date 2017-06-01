<?php 
    /* get categories */
    $taxonomy = 'category';
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
?>
<div class="zo-grid-wrapper <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">

	<!-- Get Filter Query -->
	<?php if ( isset($atts['filter']) && $atts['filter'] == 1 ): ?>
        <div class="zo-grid-filter">
            <ul class="zo-filter-category list-unstyled list-inline">
                <li><a class="active" href="#" data-group="all"><?php esc_html_e("All", 'zo-mercury');?></a></li>
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
			$pricing_meta = zo_mercury_post_meta();
            ?>
			<div class="zo-pricing-item <?php echo esc_attr($atts['item_class']);?> ">
                <div class="zo-pricing-inner">
					<div class="zo-pricing-header">
						<div class="zo-pricing-price">
	                        <sup><?php esc_html_e('$', 'zo-mercury'); ?></sup>
	                        <span class="price"><?php echo esc_attr($pricing_meta['price']); ?></span>
	                        <span class="time"><?php esc_html_e('/', 'zo-mercury'); ?><?php echo esc_attr($pricing_meta['type']); ?></span>
	                    </div>
						<?php echo '<' . $atts['title_element'] . ' class = "zo-grid-title">';
						if($atts['title_link']){?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><?php the_title();?></a>
						<?php }else{
							the_title();
						}
						echo '</' . $atts['title_element'] .'>';?>
					</div>
					<div class="zo-pricing-content">
	                    <div class="zo-pricing-meta">
	                        <?php the_content(); ?>
	                    </div>
					</div>
                    <div class="zo-pricing-button zo-button-wraper template-zo_button">
						<?php 
							$button_text = (isset($pricing_meta['button_text']))?$pricing_meta['button_text']:'';
							echo do_shortcode( '[zo_pricing post_id="'.get_the_ID().'" title="'.$button_text.'"]' );
						?>
					</div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
    wp_reset_postdata();
    ?>
</div>
