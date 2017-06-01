<?php
$_search = array('M','G','K','m','g','k');
$memory_limit = (int)str_replace($_search, null, ini_get("memory_limit"));
$max_time = (int)ini_get("max_execution_time");
$post_max_size = (int)str_replace($_search, null, ini_get('post_max_size'));
?>
<div class="wrap tp-app">
	<h2><?php esc_html_e('Install Demo','zo-mercury'); ?></h2>
    <div class="notice notice-error">
        <p><?php echo wp_kses_post('Notice: Installing a demo provides pages, posts, images, theme options, widgets, sliders and more. <strong style="color:red;">IMPORTANT:</strong> The included plugins need to be installed and activated before you install a demo. Please check the "Server Info" bellow to ensure your server meets all requirements for a successful import. Settings that need attention will be listed in red.', 'cmstheme-import'); ?></p>
    </div>
    <div>
        <table>
            <tr>
                <th style="text-align: left; padding-right:30px;"><?php esc_html_e('Memory Limit:', 'zo-mercury') ?></th>
                <?php if($memory_limit >= 128): ?>
                    <td><?php echo sprintf(esc_html__('Currently: %s', 'zo-mercury'), $memory_limit); ?><span style="color:#46B450;"><?php echo esc_html__(' ok','zo-mercury') ?></span></td>
                <?php else: ?>
                    <td style="color: #D50000"><?php echo sprintf(esc_html__('Currently: %s (the minimum required 128M)', 'zo-mercury'), $memory_limit); ?></td>
                <?php endif; ?>
            </tr>
            <tr>
                <th style="text-align: left; padding-right:30px;"><?php esc_html_e('Max. Execution Time:', 'zo-mercury') ?></th>
                <?php if($max_time >= 60): ?>
                    <td><?php echo sprintf(esc_html__('Currently: %s', 'zo-mercury'), $max_time); ?><span style="color:#46B450;"><?php echo esc_html__(' ok','zo-mercury') ?></span></td>
                <?php else: ?>
                    <td style="color: #D50000"><?php echo sprintf(esc_html__('Currently: %s (the minimum required 60s)', 'zo-mercury'), $max_time); ?></td>
                <?php endif; ?>
            </tr>
            <tr>
                <th style="text-align: left; padding-right:30px;"><?php esc_html_e('Max. Post Size:', 'zo-mercury') ?></th>
                <?php if($post_max_size >= 32): ?>
                    <td><?php echo sprintf(esc_html__('Currently: %s', 'zo-mercury'), $post_max_size); ?><span style="color:#46B450;"><?php echo esc_html__(' ok','zo-mercury') ?></span></td>
                <?php else: ?>
                    <td style="color: #D50000"><?php echo sprintf(esc_html__('Currently: %s (the minimum required 32M)', 'zo-mercury'), $post_max_size); ?></td>
                <?php endif; ?>
            </tr>
        </table>
    </div>
	<?php if( isset($status) ) :  ?>
		<?php if($status == 200) : ?>
			<div class="notice notice-success">
				<p>Install Demo data <strong>Succcessfully!</strong> Have Fun :)</p>
				<p><a href="<?php echo esc_url( home_url( '/wp-admin' ) ); ?>">Please, login again to update database!</a></p>
			</div>
		<?php else : ?>
			<div class="notice notice-error">
				<p><strong>Error:</strong> Have some problem on server. Please try check log server and import again!</p>
			</div>
		<?php endif; ?>
	<?php else : ?>
    <div>
        <div class="import-block">
            <img src="<?php echo get_template_directory_uri() . '/sample-data/main/screenshot.png'; ?>"/>
            <div class="import-form">
                <form id="cmstheme-import-form" name="post" action="" method="post" autocomplete="off">
                    <input type="hidden" name="source_url" value="http://dn.joomexp.com/wordpress/mercury" />
                    <input type="hidden" name="demo_folder" value="main" />
                    <h2 class="import-title"><?php echo sprintf(esc_html__('Zo Mercury', 'zo-mercury'));?>
                    <input type="submit" id="import-btn-submit" class="button button-primary button-large" name="submit" value="<?php echo sprintf(esc_html__('Install', 'zo-mercury'));?>"/>
                    <a class="button button-primary button-large" href="http://demo.cms-theme.net/wordpress/mercury" target="_blank"><?php echo sprintf(esc_html__('Preview', 'zo-mercury'));?></a></h2>
                </form>
            </div>
        </div>
    </div>
	<?php endif; ?>
</div>
