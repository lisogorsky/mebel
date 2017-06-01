
<?php
$item_title     = $atts['item_title'];
$icon           = $atts['icon'];
$show_value     = $atts['show_value'];
$value          = $atts['value'];
$value_suffix   = $atts['value_suffix'];
$bg_color       = $atts['bg_color'];
$color          = $atts['color'];
$width          = $atts['width'];
$height         = $atts['height'];
$border_radius  = $atts['border_radius'];
$vertical       = ($atts['mode']=='vertical')?true:false;
$striped        = ($atts['striped']=='yes')?true:false;

$html_id_width = $zo_progress_style = $progress_bar_bg = $progress_icon = $progress_bar_border_radius = ''; 
if(!empty($width)){ $html_id_width = 'width:' . esc_attr($width) . ';';}

if(!empty($bg_color)){ $zo_progress_style .= 'background-color:' . esc_attr($bg_color) . ';';}
if(!empty($width)){$zo_progress_style .= 'width:' . esc_attr($width) . ';';}
if(!empty($height)){$zo_progress_style .= 'height:' . esc_attr($height) . ';';}
if(!empty($border_radius)){
	$zo_progress_style .= 'border-radius:' . esc_attr($border_radius) . ';';
	$zo_progress_style .= '-webkit-border-radius:' . esc_attr($border_radius) . ';';
	$progress_bar_border_radius .= 'border-radius:' . esc_attr($border_radius) . ';';
	$progress_bar_border_radius .= '-webkit-border-radius:' . esc_attr($border_radius) . ';';
}

if(!empty($color)){$progress_bar_bg = 'background-color:' . esc_attr($color) . ';';}

$progress_icon .= 'text-align:' . $atts['icon_align'] . ';';
if(!empty($atts['icon_font_size'])){$progress_icon .= 'font-size:' . $atts['icon_font_size'] . 'px;';}
if(!empty($atts['icon_color'])){$progress_icon .= 'color:' . $atts['icon_color'] . ';';}

?>

<div class="zo-progress-wraper <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>" <?php if($html_id_width) echo 'style="'. esc_attr($html_id_width) .'"';?>>
    <?php if($icon):?>
        <div class="zo-progress-icon" style="<?php echo esc_attr($progress_icon);?>">
            <i class="<?php echo esc_attr($icon);?>"></i>
        </div>
    <?php endif;?>
    <?php if($item_title):?>
		<?php
			echo '<' . $atts['element'] . ' class="zo-progress-title" style="'. esc_attr($atts['align']) .'">';
			echo apply_filters('the_title',$item_title);
			echo '</' . $atts['element'] . '>';
		?>
    <?php endif;?>
    <div class="zo-progress progress<?php if($vertical){ echo ' vertical bottom'; } ?> <?php if($striped){echo ' progress-striped';}?>" <?php if($zo_progress_style){ echo 'style="'. esc_attr($zo_progress_style) .'"';}?>>
        <div id="item-<?php echo esc_attr($atts['html_id']); ?>"
            class="progress-bar" role="progressbar"
			<?php if($progress_bar_bg) echo 'style="'. esc_attr($progress_bar_bg) .' '. esc_attr($progress_bar_border_radius) .'"';?>
            data-valuetransitiongoal="<?php echo esc_attr($value); ?>">
			<?php if($show_value=='true'): ?>
				<div class="progress-bar-value"><?php echo esc_attr($value);?><span><?php echo balanceTags($value_suffix);?></span></div>
			<?php endif; ?>
        </div>
    </div>
</div>
