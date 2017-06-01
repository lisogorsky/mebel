<?php get_header('404');?>
	<div id="page">
		<div id="main">
			<div id="primary" class="site-content">
				<div id="content" role="main" class="container">
					<article id="post-0" class="entry-error404 no-results not-found">
						<header class="entry-header">
							<img src="<?php print get_template_directory_uri(); ?>/assets/images/direction.png" alt="<?php esc_html_e('404 Page Not Found', 'zo-mercury'); ?>" />
							<h1><?php esc_html_e('404', 'zo-mercury'); ?></h1>
							<h2><?php esc_html_e('PAGE NOT FOUND', 'zo-mercury'); ?></h2>
						</header>

						<div class="entry-content">
							<p><?php esc_html_e('Whoops, sorry, this page does not exist.', 'zo-mercury'); ?></p>
						</div><!-- .entry-content -->

						<footer class="entry-footer">
							<a class="btn btn-white btn-home" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Go Back Home', 'zo-mercury'); ?></a>
						</footer>
					</article><!-- #post-0 -->

				</div><!-- #content -->
			</div><!-- #primary -->
		</div><!-- #main -->
	</div><!-- #page -->
<?php get_footer('404'); ?>