<div class="zo-carousel-wrap">
    <div class="zo-carousel <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']); ?>">
        <?php
        $posts = $atts['posts'];
		while ($posts->have_posts()) :
			$posts->the_post();
			$zo_mercury_meta = zo_mercury_post_meta();
			?>
			<div class="row">
				<div class="col-md-11 col-sm-12">
					<div class="zo-carousel-item">
						<div class="zo-testimonial-content">
							<?php the_content(); ?>
						</div>
						<div class="row">
							<div class="zo-testimonial-thumb col-md-2 col-sm-3 col-xs-4">
								<?php if(has_post_thumbnail()) : ?>
									<?php the_post_thumbnail( 'thumbnail' ); ?>
								<?php endif ?>
							</div>

							<div class="col-md-10 col-sm-9 col-xs-8">
								<h6 class="zo-testimonial-title"><?php the_title();?></h6>
								<?php $position = isset( $zo_mercury_meta['position'] ) ? $zo_mercury_meta['position'] : '';?>
								<p class="zo-testimonial-position"><?php echo esc_attr( $position );?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
		endwhile;
        wp_reset_postdata();
        ?>
    </div>
</div>
