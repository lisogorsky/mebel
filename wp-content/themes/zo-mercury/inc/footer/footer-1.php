<?php 
global $zo_mercury_data;
$zo_mercury_meta = zo_mercury_post_meta();

$container='container';
if(!empty($zo_mercury_meta['footer_width'])){
    if ($zo_mercury_meta['footer_width'] == 'on') {
        $container = 'container-fluid';
    }
}else{
    if(isset($zo_mercury_data['footer_width']) && $zo_mercury_data['footer_width']){
        $container='container-fluid';
    }
}

if(!empty($zo_mercury_meta['footer_widget'])){
    if ($zo_mercury_meta['footer_widget'] == 'on') {
        $zo_mercury_data['footer_widgets'] = 1;
    } else {
        $zo_mercury_data['footer_widgets'] = 0;
    }
}

if(!empty($zo_mercury_meta['footer_copyright'])){
    if ($zo_mercury_meta['footer_copyright'] == 'on') {
        $zo_mercury_data['footer_copyright'] = 1;
    } else {
        $zo_mercury_data['footer_copyright'] = 0;
    }
}

$logo = get_template_directory_uri() . '/assets/images/mercury-logo.png';
if (!empty($zo_mercury_meta['footer_logo'])) {
    $logo = $zo_mercury_meta['footer_logo'];
} else {
    if (!empty($zo_mercury_data['footer_logo']['url'])) {
        $logo = $zo_mercury_data['footer_logo']['url'];
    }
}
?>

<?php if (!empty($zo_mercury_data['footer_widgets']) && $zo_mercury_data['footer_widgets']){ ?>
<div id="zo-footer" class="zo-footer1">
    <div class="<?php echo esc_attr($container);?>">
        <footer class="row" id="zo-footer-content">
            <div id="zo-footer-logo" class="zo-footer-logo col-lg-3 col-md-3 col-sm-3">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img alt="" src="<?php echo esc_url($logo); ?>">
                </a>
            </div>
			<?php if ( is_active_sidebar( 'sidebar-10' ) ) { ?>
				<div class="zo-footer-secondary col-lg-9 col-md-9 col-sm-9">
					<?php dynamic_sidebar( 'sidebar-10' ); ?>
				</div>
			<?php }?>
        </footer>
    </div>
</div>
<?php } ?>
<?php if(!empty($zo_mercury_data['footer_copyright'])) {?>
<div id="zo-footer-copyright" class="zo-footer-copyright1">
    <div class="<?php echo esc_attr($container);?>">
        <footer>
			<div class="zo-copyright-secondary">
				<?php if(!empty($zo_mercury_data['footer_copyright_extra'])){
					if($zo_mercury_data['footer_copyright_extra']==1) {
						zo_mercury_footer_social();
					}else{
						if (is_active_sidebar('copyright-extra')) dynamic_sidebar('copyright-extra');
					}
				}
				?>
			</div>
			<div class="zo-footer-copyright-notice">
				<?php if ( is_active_sidebar( 'copyright-extra1' ) ) { ?>
					<?php dynamic_sidebar( 'copyright-extra1' ); ?>
				<?php }elseif(!empty($zo_mercury_data['footer_copyright_text'])) echo html_entity_decode( $zo_mercury_data['footer_copyright_text'] ); ?>
			</div>
        </footer>
    </div>
</div>
<?php } ?>
