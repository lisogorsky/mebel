<?php 
	$icon_name = "icon_" . $atts['icon_type'];
	$iconClass = isset($atts[$icon_name])?$atts[$icon_name]:'';
	
    /* Custom style Icon */
	$icon_style = '';
    $icon_style .= 'text-align: ' . $atts['icon_align'] . ';';
    if(!empty($atts['icon_font_size']) && is_numeric($atts['icon_font_size'])){
        $icon_style .= 'font-size:' . $atts['icon_font_size'] . 'px;';
    }
	
?>
<div class="zo-fancyboxes-wraper <?php echo esc_attr($atts['template']);?> <?php echo (isset($atts['zo_fancybox_extra_content']) && ($atts['zo_fancybox_extra_content']=='true') && !empty($atts['extra_content']))?'extra-content':''?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <div class="zo-fancybox-item <?php echo (isset($atts['zo_fancybox_extra_content']) && ($atts['zo_fancybox_extra_content']=='true') && !empty($atts['extra_content']))?'row':''?>">
        <?php if($atts['icon_type']=='upload' && !empty($atts['image'])){
            echo '<div class="zo-fancybox-icon" style="'. esc_attr($icon_style) .'">';
            if ($atts['link_icon']=='yes'){
                echo '<a href="' . $atts['link_url'] . '" title="' . $atts['title_item'] . '" target= "' .$atts['link_target'] . '">';
            }
            if($atts['image_size']=='custom'){
                $attachment_image = wp_get_attachment_image_src($atts['image'], 'full', false);
                $attachment_full_image = $attachment_image[0];
                $image_resize = zo_image_resize($attachment_full_image, $atts['image_width'], $atts['image_height'], true );
                echo '<img src="'. esc_attr($image_resize) .'" title="' . $atts['title_item'] . '">';
            }else{
                $attachment_image = wp_get_attachment_image_src($atts['image'], $atts['image_size']);
                $image_url = $attachment_image[0];
                echo '<img src="'. esc_attr($image_url) .'" title="' . $atts['title_item'] . '">';
            }
            if ($atts['link_icon']=='yes'){
                echo '</a>';
            }
            echo '</div>';
        ?>
        <?php } elseif(!empty($iconClass)){ ?>
            <div class="zo-fancybox-icon" style="<?php echo esc_attr($icon_style);?>">
                <?php
                    if ($atts['link_icon']=='yes'){
                        echo '<a href="' . $atts['link_url'] . '" title="' . $atts['title_item'] . '" target= "' .$atts['link_target'] . '">';
                    }
                ?>
                <i class="<?php echo esc_attr($iconClass);?>"></i>
                <?php
                    if ($atts['link_icon']=='yes'){
                        echo '</a>';
                    }
                ?>
            </div>
        <?php }?>
        <div class="zo-fancybox-body <?php echo (isset($atts['zo_fancybox_extra_content']) && ($atts['zo_fancybox_extra_content']=='true') && !empty($atts['extra_content']))?'col-md-9 col-sm-8 col-xs-9':''?>">
            <?php if($atts['title_item']):
                echo '<' . $atts['title_element'] . ' class="zo-fancybox-title" style="text-align:' . $atts['title_align'] .';">';
                    if($atts['link_title']=='yes'){
                ?>
                    <a href="<?php echo esc_url($atts['link_url']);?>" target="<?php echo esc_attr($atts['link_target']);?>" title="<?php echo esc_attr($atts['title_item']);?>"><?php echo esc_attr($atts['title_item']);?></a>
                <?php
                    echo '</' . esc_attr($atts['title_element']) .'>';
                }else{
                    echo esc_attr($atts['title_item']);
                    echo '</' . esc_attr($atts['title_element']) .'>';
                }?>
            <?php endif;?>
            <?php if($atts['content_item']):?>
                <div class="zo-fancybox-content" style="text-align:<?php echo esc_attr($atts['content_align']);?>;">
                    <?php
                        echo balanceTags($atts['content_item']);
                    ?>
                    <?php
                        if($atts['link_content']=='yes'){
                            echo '<div class="zo-fancybox-link">';
                            echo '<a href="' . $atts['link_url'] .'" title="'. $atts['title_item'] .'" class="' . $atts['link_class'] .'" target= "' .$atts['link_target'] . '">'. $atts['link_text'] .'</a>';
                            echo '</div>';
                        }
                    ?>
                </div>
            <?php endif;?>
        </div>
		<?php if(isset($atts['zo_fancybox_extra_content']) && $atts['zo_fancybox_extra_content']=='true' && !empty($atts['extra_content'])):?>
			<div class="zo-fancybox-extra col-md-3 col-sm-4 col-xs-3">
				<?php
					echo balanceTags($atts['extra_content']);
				?>
			</div>
		<?php endif;?>
    </div>
</div>
