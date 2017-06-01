<?php
	global $zo_mercury_data;
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
	$show_cat = (isset($atts['post_show_cat'])&&($atts['post_show_cat']=='true'))?'show-cat':'';
	
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
                        <?php       }
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
            <div class="zo-grid-item <?php echo esc_attr($atts['item_class']);?> <?php echo (!empty($show_cat))?$show_cat:'';?>" <?php if($gap_style) echo balanceTags($gap_style);?> data-groups='[<?php echo implode(',', $groups);?>]'>
             <article id="post-<?php the_ID(); ?>" <?php post_class('post-teaser'); ?>>
				<?php
				switch(get_post_format()) {
					case '':
						?>
							<div class="zo-blog-image zo-grid-media">
								<a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel="">
									<?php
									if (has_post_thumbnail() && !post_password_required() && !is_attachment() && wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)):
										if ($atts['image_size'] == 'custom') {
											$attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
											$attachment_full_image = $attachment_image[0];
											$image_resize = zo_image_resize($attachment_full_image, $atts['image_width'], $atts['image_height'], true);
											echo '<img src="' . esc_attr($image_resize) . '" alt="' . get_the_title() . '">';
										} else {
											the_post_thumbnail($atts['image_size']);
										}
									else:
										echo '<img src="' . ZO_IMAGES . 'no-image.jpg" alt="' . get_the_title() . '" />';
									endif;
									?>
								</a>
							</div>
					  <?php
						$content = get_the_content();
						break;
					case 'video':
					   ?>
						<div class="zo-blog-image zo-blog-video">
							<?php echo zo_mercury_archive_video(); ?>
						</div>
							<?php

						 break;
					case 'gallery':
						?>
						<div class="zo-blog-image zo-grid-media  zo-blog-gallery">
							<?php echo zo_mercury_archive_gallery( 'full'); ?>
						</div>
						<?php
						 break;
					case 'audio':
					  ?>
						<div class="zo-blog-image zo-blog-audio">
							<?php if (has_post_thumbnail()) :
								if($atts['image_size']=='custom'){
									$attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
									$attachment_full_image = $attachment_image[0];
									$image_resize = zo_image_resize($attachment_full_image, $atts['image_width'], $atts['image_height'], true );
									echo '<img src="'. esc_attr($image_resize) .'" alt="' . get_the_title() . '">';
								}else{
									the_post_thumbnail($atts['image_size']);
								}
								?>
								<div class="overlay">
									<div class="overlay-inner">
										<a class="play-button" title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel="">
											<i class="fa fa-play"></i>
										</a>
										<?php echo zo_mercury_archive_audio(); ?>
									</div>
								</div>
							<?php else : ?>
								<?php echo zo_mercury_archive_audio(); ?>
							<?php endif; ?>
						</div>
					   <?php
						break;
					case 'link':
						?>
						<div class="zo-blog-image zo-grid-media  zo-blog-link">
							<?php if (has_post_thumbnail()) : ?>
								<?php the_post_thumbnail('full'); ?>
								<div class="overlay-link">
									<span class="link"><?php echo zo_mercury_archive_link(); ?></span>
								</div>
							<?php else : ?>
								<?php echo zo_mercury_archive_link(); ?>
							<?php endif; ?>
						</div>
						<?php
						break;
					case 'quote':
						?>
						<div class="zo-blog-image zo-grid-media  zo-blog-quote">
							<?php echo zo_mercury_archive_quote(); ?>
						</div>
						<?php
						break;
				}
                ?>
				<?php if(!empty($show_cat)){?>
					<div class="zo-grid-category"><?php the_terms( get_the_ID(), 'category', '', ' , ' ); ?></div>
                <?php
				}
                echo '<' . $atts['title_element'] . ' class = "zo-grid-title">';
                if($atts['title_link']){
                    ?>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><?php the_title();?></a>
                    <?php
                    echo '</' . $atts['title_element'] .'>';
                }else{
                    the_title();
                    echo '</' . $atts['title_element'] .'>';
                }?>
				<ul class="archive-detail">
                    <li class="zo-blog-author"><i class="fa fa-user"></i><?php the_author_posts_link(); ?></li>
                    <li class="zo-blog-date"><i class="fa fa-calendar"></i><span class="show-content"><?php the_time('F d, Y');?></span></li>
                </ul>
                <div class="zo-grid-content">
                    <p>  <?php
                        if(is_numeric($atts['num_words'])){
                            echo wp_trim_words( get_the_excerpt(), $atts['num_words'], '...' );
                        }else{
                            echo wp_trim_words( get_the_excerpt(), 10, '...' );
                        }
                        ?>
						<?php if(!empty($zo_mercury_data['blog_post_readmore'])){?>
							<a class="read-more" title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel="">
								<?php if(!empty($zo_mercury_data['blog_post_readmore_text']))
										echo esc_attr($zo_mercury_data['blog_post_readmore_text']);
									else
										echo esc_html__('[Read more]', 'zo-mercury'); ?>
							</a>
						<?php }?>
					</p>

                </div>
                </article>
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