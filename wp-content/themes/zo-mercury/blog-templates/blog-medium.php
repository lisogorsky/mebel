<?php
/* Start the Loop */
global $zo_mercury_data;

while ( have_posts() ) : the_post();
    ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('post-teaser blog-medium'); ?>>
        <div class="row">
            <div class="zo-blog-media col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <?php
            switch(get_post_format()){
                case '':
                    if(!empty($zo_mercury_data['blog_post_feature_media']) && has_post_thumbnail()){?>
                        <div class="zo-blog-image">
                            <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php the_post_thumbnail(  'full' ); ?></a>
                        </div>
                    <?php }
                    break;
                case 'video':
                    if(!empty($zo_mercury_data['blog_post_feature_media'])){
                        echo '<div class="zo-blog-video">';
                        echo zo_mercury_archive_video();
                        echo '</div>';
                    }
                    break;
                case 'gallery':
                    if(!empty($zo_mercury_data['blog_post_feature_media'])){
                        echo '<div class="zo-blog-image zo-blog-gallery">';
                        echo zo_mercury_archive_gallery('full');

                        echo '</div>';
                    }
                    break;
                case 'audio':
                    echo '<div class="zo-blog-audio">';
                    if(has_post_thumbnail()) {
                        ?>
                        <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php the_post_thumbnail(  'full' ); ?></a>
                        <?php
                    }

                    echo zo_mercury_archive_audio();
                    echo '</div>';
                    break;
                case 'link':
                    echo '<div class="zo-blog-link">';
                    echo zo_mercury_archive_link();
                    echo '</div>';
                    break;
                case 'quote':
                    if(has_post_thumbnail()) {
                        echo '<div class="zo-blog-quote">';
                        ?>
                        <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php the_post_thumbnail(  'full' ); ?></a>
                        <?php

                    }
                    else {
                        echo '<div class="zo-blog-quote">';

                    }
                    echo zo_mercury_archive_quote();
                    echo '</div>';
                    break;
            }?>
            </div>
            <div class="zo-blog-detail col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <?php if(!empty($zo_mercury_data['blog_post_title'])){?>
                <h2 class="zo-blog-title">
                    <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php the_title(); ?></a>
                </h2>
                <?php }?>

                <div class="zo-blog-content">
                    <?php
						if(get_post_type( get_the_ID() ) != 'page'):
							the_excerpt();
						endif;
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
                <div class="zo-blog-link">
                    <div class="zo-blog-readmore col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <?php if(!empty($zo_mercury_data['blog_post_readmore'])){?>
                        <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel="">
                            <?php if(!empty($zo_mercury_data['blog_post_readmore_text']))
                                    echo esc_attr($zo_mercury_data['blog_post_readmore_text']);
                                else
                                    echo esc_html__('[Read More]', 'zo-mercury'); ?>
                        </a>
                        <?php }?>
                    </div>
                    <div class="zo-blog-social col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <?php if(!empty($zo_mercury_data['blog_post_social'])){?>
                            <?php zo_mercury_social_share(); ?>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
        <div class="zo-blog-meta">
            <ul>
                <?php if(!empty($zo_mercury_data['blog_post_author'])){?>
                    <li class="zo-blog-author">
                        <?php the_author_link(); ?>
                    </li>
                <?php }?>
                <?php if(!empty($zo_mercury_data['blog_post_date'])){?>
                    <li class="zo-blog-date">
                        <?php
                        $date_format = 'j F, Y';
                        if(!empty($zo_mercury_data['blog_post_date_format'])){
                            $date_format = $zo_mercury_data['blog_post_date_format'];
                        }
                        echo get_the_date($date_format); ?>
                    </li>
                <?php }?>
                <?php if(!empty($zo_mercury_data['blog_post_categories'])){?>
                    <li class="zo-blog-category">
                        <?php the_terms( get_the_ID(), 'category', '', ', ' ); ?>
                    </li>
                <?php }?>
                <?php if(has_tag() && !empty($zo_mercury_data['blog_post_tags'])){ ?>
                    <li class="zo-blog-tag"><?php the_tags('', ', ' ); ?></li>
                <?php } ?>
                <?php if(!empty($zo_mercury_data['blog_post_comment'])){?>
                    <li class="zo-blog-comment">
                        <a href="<?php the_permalink(); ?>#comment"><?php echo comments_number('0','1','%'); ?></a><?php echo esc_html__(' Comments', 'zo-mercury'); ?>
                    </li>
                <?php }?>
            </ul>
        </div>
    </article>
<?php
endwhile;

zo_mercury_paging_nav();
?>
