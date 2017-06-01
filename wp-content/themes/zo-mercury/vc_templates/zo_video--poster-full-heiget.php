<div class="zo-video-play-wrapper zo-video-custom zo-video-post-full-height" id="<?php echo esc_attr($atts['html_id']); ?>" style="background: url('<?php echo esc_url( $atts['thumbnail_url'] ); ?>'); background-size: cover; background-repeat: no-repeat;">
	<a class="play-button" href="#" title="Click to Play Video"
	   data-player="<?php echo esc_attr($atts['html_id']); ?>-player"
	   data-type="<?php echo esc_attr($atts['video']['type']); ?>">
		<span><i class="fa fa-play"></i></span>
		<div class="zo-video-content">
			<?php do_shortcode($content); ?>
		</div>
	</a>
	<div class="video-player">
		<?php echo balanceTags($atts['video']['url']);?>
	</div>
</div>