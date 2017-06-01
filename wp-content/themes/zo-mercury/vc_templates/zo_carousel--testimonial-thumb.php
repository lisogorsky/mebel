<?php
wp_enqueue_script('slick-js', get_template_directory_uri(). '/assets/js/slick.min.js', array('jquery'), '1.5.7');
wp_enqueue_style('slick-css', get_template_directory_uri(). '/assets/css/slick.css');
wp_enqueue_script('zo-slick-main', get_template_directory_uri(). '/assets/js/zo_testimonial.js', array('jquery'), '1.0');
?>
<div class="zo-slick-wrap">
    <div class="zo-testimonial-default <?php echo esc_attr($atts['template']); ?>" id="<?php echo esc_attr($atts['html_id']); ?>">
        <?php $posts = $atts['posts']; ?>
        <div class="zo-testimonial-nav">
            <?php while($posts->have_posts()) :
                $posts->the_post();
                ?>
                <div>
                    <?php if(has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail( 'medium' ); ?>
                    <?php endif ?>
                </div>
            <?php endwhile; ?>
        </div>
        <div class="zo-testimonial-wrap">
            <?php while($posts->have_posts()) :
                $posts->the_post();
                $zo_mercury_meta = zo_mercury_post_meta();
                ?>
                <div>
                    <div class="zo-testimonial-body">
                        <div class="zo-testimonial-info">
                            <h6 class="zo-testimonial-title"><?php the_title();?></h6>
							<?php $position = isset( $zo_mercury_meta['position'] ) ? $zo_mercury_meta['position'] : '';?>
                            <div class="zo-testimonial-position"><?php echo balanceTags($position); ?></div>
                        </div>
                        <div class="zo-testimonial-content"><?php the_content(); ?></div>
                    </div>
                </div>
            <?php endwhile;
            wp_reset_postdata();
            ?>
        </div>
    </div>
</div>