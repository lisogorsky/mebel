<?php
echo '<div id="'. esc_attr($atts['html_id']) .'" class="zo-count-down '. esc_attr($atts['class']) .'">';
echo '<span style="display: none;">'. esc_attr($atts['year']) .'/'. esc_attr($atts['month']) .'/'. esc_attr($atts['day']) .'</span>';
echo '
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 zo-count-down-days">
	<div class="zo-count-down-wrap">
		<div class="zo-count-down-number">0</div>
		<div class="zo-count-down-label">' . esc_html__('Days','zo-mercury') . '</div>
	</div>
</div>';
echo '
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 zo-count-down-hours">
	<div class="zo-count-down-wrap">
		<div class="zo-count-down-number">0</div>
		<div class="zo-count-down-label">' . esc_html__('Hours','zo-mercury') . '</div>
	</div>
</div>';
echo '
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 zo-count-down-minutes">
	<div class="zo-count-down-wrap">
		<div class="zo-count-down-number">0</div>
		<div class="zo-count-down-label">' . esc_html__('Minutes','zo-mercury') . '</div>
	</div>
</div>';
echo '
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 zo-count-down-seconds">
	<div class="zo-count-down-wrap">
		<div class="zo-count-down-number">0</div>
		<div class="zo-count-down-label">' . esc_html__('Seconds','zo-mercury') . '</div>
	</div>
</div>';
echo '</div>';