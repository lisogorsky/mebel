<?php
/**
 * The Template for displaying all single posts
 *
 * @package ZoTheme
 * @subpackage Zo Theme
 * @since 1.0.0
 */
$settings = zo_mercury_blog_single_setting();
$sidebar_size = (int)$settings['body_sidebar_size'];
$content_size = 12;
if($settings['blog_single_sidebar']!='none'){
    $content_size = 12 - $sidebar_size;
}
$content = '';
get_header(); ?>
<div class="<?php echo esc_attr($settings['blog_single_width']);?>">
    <div class="row">
        <?php if($settings['blog_single_sidebar'] == 'left'){?>
            <div class="col-xs-12 col-sm-<?php echo esc_attr($sidebar_size);?> col-md-<?php echo esc_attr($sidebar_size);?> col-lg-<?php echo esc_attr($sidebar_size);?>">
                <?php get_sidebar(); ?>
            </div>
        <?php }?>
        <div id="primary" class="col-xs-12 col-sm-<?php echo esc_attr($content_size);?> col-md-<?php echo esc_attr($content_size);?> col-lg-<?php echo esc_attr($content_size);?>">
            <article id="post-<?php the_ID(); ?>" <?php post_class('post-teaser zo-blog-single'); ?>>
				<?php while ( have_posts() ) { the_post(); ?>
				<?php if(!empty($settings['blog_single_media'])) {?>
					<div class="zo-blog-media">
						<?php 
						switch(get_post_format()){
							case '':
								if(has_post_thumbnail()){
									echo '<div class="zo-blog-image">';
									the_post_thumbnail(  'full' );
									echo '</div>';
								}
								$content = get_the_content();
								break;
							case 'video':
								echo '<div class="zo-blog-video">';
								echo zo_mercury_archive_video();
								echo '</div>';
								$content = apply_filters('the_content', preg_replace(array('/\[embed(.*)](.*)\[\/embed\]/', '/\[video(.*)](.*)\[\/video\]/'), '', get_the_content(), 1));
								break;
							case 'gallery':
								echo '<div class="zo-blog-gallery">';
								echo zo_mercury_archive_gallery('full');
								echo '</div>';
								$content = apply_filters('the_content', preg_replace('/\[gallery.*ids=.(.*).\]/', '', get_the_content()));
								break;
							case 'audio':
								echo '<div class="zo-blog-audio">';
								// Check image
								if(has_post_thumbnail()) {
									echo '<div class="zo-blog-audio zo-image-media">';
								   ?>
									<a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php the_post_thumbnail(  'full' ); ?></a>
								<?php
								}
								else {
									echo '<div class="zo-blog-audio">';
								}
								echo zo_mercury_archive_audio();
								echo '</div>';
								$content = apply_filters('the_content', preg_replace(array('/\[embed(.*)](.*)\[\/embed\]/', '/\[audio(.*)](.*)\[\/audio\]/'), '', get_the_content(), 1));
								break;
							case 'link':
								echo '<div class="zo-blog-link">';
								echo zo_mercury_archive_link();
								echo '</div>';
								$content = apply_filters('the_content', preg_replace('/<a(.*)href=\"(.*)\"(.*)<\/a>/', '', get_the_content()));
								break;
							case 'quote':
								if(has_post_thumbnail()) {
									echo '<div class="zo-blog-quote zo-image-media">';
									?>
									<a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php the_post_thumbnail(  'full' ); ?></a>
									<?php

								}
								else {
									echo '<div class="zo-blog-quote">';
								}
								 echo zo_mercury_archive_quote();
								echo '</div>';
								$content = apply_filters('the_content', preg_replace('/<blockquote>(.*)<\/blockquote>/', '', get_the_content()));
								break;
						}?>
					</div>
					<?php }?>
                    <div class="zo-blog-detail">
						<?php if(!empty($settings['blog_single_title'])){?>
							<h2 class="zo-blog-title">
								<?php the_title(); ?>
							</h2>
						<?php }?>
						<?php if( !empty($settings['blog_single_date']) || !empty($settings['blog_single_tags'])){?>
							<div class="zo-blog-meta">
								<ul>
									<?php if( !empty($settings['blog_single_author'])) {?>
										<li class="zo-blog-author"><?php the_author_posts_link(); ?></li>
									<?php }?>
									<?php if(!empty($settings['blog_single_date'])){?>
										<li class="zo-blog-date"></i>
											<?php
											$date_format = 'M.d, Y';
											if(!empty($settings['blog_single_date_format'])){
												$date_format = $settings['blog_single_date_format'];
											}
											echo get_the_date($date_format); ?>
										</li>
									<?php }?>
									<?php if(has_category() && !empty($settings['blog_single_categories'])): ?>
										<li class="zo-blog-category"><i class="fa fa-folder"></i><?php the_terms( get_the_ID(), 'category', '', ' / ' ); ?></li>
									<?php endif; ?>
								</ul>
							</div>
						<?php }?>
						<div class="zo-blog-content">
							<?php 
								if(!empty($content)){
									echo balanceTags($content);
								}else{
									the_content();
								}
								wp_link_pages( array(
									'before'      => '<p class="page-links"><span class="page-links-title">' . __( 'Pages:', 'zo-mercury' ) . '</span>',
									'after'       => '</p>',
									'link_before' => '<span>',
									'link_after'  => '</span>',
									'pagelink'    => '%',
									'separator'   => '<span class="screen-reader-text">, </span>',
								) );
							?>
						</div>
                    </div><!--End detail-->
                    <div class="zo-blog-link row">
                      <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8  zo-blog-tags">
                          <?php if(has_tag() && !empty($settings['blog_single_tags'])){ ?>
                              <div class="zo-blog-tag"><i class="fa fa-tags"></i><?php the_tags('', ',' ); ?></div>
                          <?php } ?>
                      </div>
                      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4  social-share">
                          <?php if(!empty($settings['blog_single_social'])){?>
                              <?php zo_mercury_social_share(); ?>
                          <?php }?>
                      </div>
                     </div>

                    <?php if(!empty($settings['blog_single_pagination'])){
                        zo_mercury_post_nav();
                    }?>

                    <?php if(!empty($settings['blog_single_comment'])){
                        comments_template( '', true );
                    }?>

                <?php } // end of the loop. ?>
            </article><!-- #content -->
        </div><!-- #primary -->
        <?php if($settings['blog_single_sidebar'] == 'right'){?>
            <div class="col-xs-12 col-sm-<?php echo esc_attr($sidebar_size);?> col-md-<?php echo esc_attr($sidebar_size);?> col-lg-<?php echo esc_attr($sidebar_size);?>">
                <?php get_sidebar(); ?>
            </div>
        <?php }?>
    </div>
</div>
<?php get_footer(); ?>
