<?php
	$icon_name = "icon_" . $atts['icon_type'];
	$iconClass = isset($atts[$icon_name])?$atts[$icon_name]:'';
    $button = $padding = '';
	
    if(!empty($atts['padding_top']) && is_numeric($atts['padding_top'])){
        $padding .= 'padding-top: ' . esc_attr($atts['padding_top']) . 'px;';
    }
    if(!empty($atts['padding_right']) && is_numeric($atts['padding_right'])){
        $padding .= 'padding-right: ' . esc_attr($atts['padding_right']) . 'px;';
    }
    if(!empty($atts['padding_bottom']) && is_numeric($atts['padding_bottom'])){
        $padding .= 'padding-bottom: ' . esc_attr($atts['padding_bottom']) . 'px;';
    }
    if(!empty($atts['padding_left']) && is_numeric($atts['padding_left'])){
        $padding .= 'padding-left: ' . esc_attr($atts['padding_left']) . 'px;';
    }
?>
<div class="zo-button-wraper <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>" style="text-align: <?php echo esc_attr($atts['align']);?>;">
    <?php
    if($atts['is_icon']=='yes'){
        if($atts['icon_align']=='left'){
            $atts['text'] = '<i class="' . esc_attr($iconClass) . '"></i>' . $atts['text'];
        }else{
            $atts['text'] .= '<i class="' . esc_attr($iconClass) . '"></i>';
        }
    }
    if ( !empty($atts['link']) && preg_match('/url/',$atts['link'])) {
        $link = zo_build_link( $atts['link'] );
        $button = '<a href="' . esc_attr( $link['url'] ) . '"'
            . ( $link['target'] ? ' target="' . esc_attr( $link['target'] ) . '"' : '' )
            . ( $link['title'] ? ' title="' . esc_attr( $link['title'] ) . '"' : '' )
            . ' class="zo-button ' . esc_attr($atts['class']) . ' ' . esc_attr($atts['button_style']) . '"'
			. ' style="'. esc_attr($padding) .'" '
            . '>' . $atts['text'] . '</a>';
    }else{
        $button = '<button'
            . ' class="zo-button ' . esc_attr($atts['class']) . ' ' . esc_attr($atts['button_style']) . '"'
			. ' style="'. esc_attr($padding) .'" '
            . '>' . $atts['text'] . '</button>';
    }
    echo balanceTags($button);
    ?>
</div>
