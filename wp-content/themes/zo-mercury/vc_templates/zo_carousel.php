<div class="zo-carousel-wrap">
    <div class="zo-carousel <?php echo esc_attr($atts['template']); ?>" id="<?php echo esc_attr($atts['html_id']); ?>">
        <?php
        $posts = $atts['posts'];
        while ($posts->have_posts()) :
            $posts->the_post();
            ?>
            <div class="zo-carousel-item">
                <?php
                    if (has_post_thumbnail() && !post_password_required() && !is_attachment() && wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)):
                        if($atts['image_size']=='custom'){
                            $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
                            $attachment_full_image = $attachment_image[0];
                            $image_resize = zo_image_resize($attachment_full_image, $atts['image_width'], $atts['image_height'], true );
                        }else{
                            the_post_thumbnail($atts['image_size']);
                        }
						$img_full = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)[0];
                    else:
                        $img_full = ZO_IMAGES . 'no-image.jpg';
						$image_resize = $img_full;
                    endif;?>
                <div class="zo-carousel-view">
					<?php echo '<img src="'. esc_attr($image_resize) .'" alt="' . get_the_title() . '">';?>
					<div class="zo-carousel-mask"></div>
					<?php  echo '<' . $atts['title_element'] . ' class = "zo-carousel-title">';
                    if($atts['title_link']){
					?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><span><?php the_title();?></span></a>
					<?php
						echo '</' . $atts['title_element'] .'>';
					}else{
						echo '<span>';
						the_title();
						echo '</span>';
						echo '</' . $atts['title_element'] .'>';
					}?>
					<a class="prettyPhoto zo-carousel-overlay" rel="prettyPhoto[pp_gal]" href="<?php echo esc_url($img_full); ?>" ><i class="fa fa-expand"></i></a>
				</div>
            </div>
        <?php
        endwhile;
        wp_reset_postdata();
        ?>
    </div>
</div>
