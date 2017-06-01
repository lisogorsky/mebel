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
?>

<?php if (!empty($zo_mercury_data['footer_widgets']) && $zo_mercury_data['footer_widgets']){ ?>
<div id="zo-footer" class="zo-footer">
    <div class="<?php echo esc_attr($container);?>">
        <footer id="zo-footer-content">
            <?php
                $columns = (int)$zo_mercury_data['footer_column'];
                $column_width = ($columns==5) ? 2 : 12/ $columns;
                if($columns==1){
                    $small_column = 12;
                }else{
                    $small_column = ($columns>=3) ? 4 : 6;
                }
            ?>
            <div class="zo-footer-columns zo-footer-columns-<?php echo esc_attr($columns); ?> zo-footer-widget-area row">
                <?php for($i=1; $i<7; $i++) :
                    if($i <= $columns){ ?>
                        <div class="zo-footer-column<?php echo ( $i == $columns ) ? ' zo-footer-column-last' : ''; ?> col-lg-<?php echo esc_attr($column_width); ?> col-md-<?php echo esc_attr($column_width); ?> col-sm-<?php echo esc_attr($small_column);?>">
                        <?php if (is_active_sidebar('footer-sidebar-' . $i)) dynamic_sidebar('footer-sidebar-' . $i); ?>
                        </div>
                <?php } endfor; ?>
            </div>
        </footer>
    </div>
</div>
<?php if (is_active_sidebar('footer-extra')){?>
	<div id="zo-footer-extra" class="zo-footer-extra">
		<div class="<?php echo esc_attr($container);?>">
			<?php dynamic_sidebar('footer-extra');?>
		</div>
	</div>
<?php }?> 
<?php } ?>
<?php if(!empty($zo_mercury_data['footer_copyright'])) {?>
<div id="zo-footer-copyright" class="zo-footer-copyright">
    <div class="<?php echo esc_attr($container);?>">
        <footer>
            <?php if(!empty($zo_mercury_data['footer_copyright_extra'])){
                if(!empty($zo_mercury_data['footer_copyright_alignment']) && !empty($zo_mercury_data['footer_copyright_extra_position']) && $zo_mercury_data['footer_copyright_alignment']!='right' && $zo_mercury_data['footer_copyright_extra_position']!='above'){?>
                    <div class="zo-footer-copyright-notice">
                        <div><?php if(!empty($zo_mercury_data['footer_copyright_text'])) echo html_entity_decode( $zo_mercury_data['footer_copyright_text'] ); ?></div>
                    </div>
                    <div class="zo-copyright-secondary">
                        <?php
                            if(!empty($zo_mercury_data['footer_copyright_extra'])){
                                if($zo_mercury_data['footer_copyright_extra']==1) {
                                    zo_mercury_footer_social();
                                }else{
                                    if (is_active_sidebar('copyright-extra')) dynamic_sidebar('copyright-extra');
                                }
                            }
                        ?>
                    </div>
                <?php }else{ ?>
                    <div class="zo-copyright-secondary">
                        <?php
                            if(!empty($zo_mercury_data['footer_copyright_extra'])){
                                if($zo_mercury_data['footer_copyright_extra']==1) {
                                    zo_mercury_footer_social();
                                }else{
                                    if (is_active_sidebar('copyright-extra')) dynamic_sidebar('copyright-extra');
                                }
                            }
                        ?>
                    </div>
                    <div class="zo-footer-copyright-notice">
                        <div><?php if(!empty($zo_mercury_data['footer_copyright_text'])) echo html_entity_decode( $zo_mercury_data['footer_copyright_text'] ); ?></div>
                    </div>
                <?php } ?>
            <?php }else{?>
            <div class="zo-footer-copyright-notice">
                <div><?php if(!empty($zo_mercury_data['footer_copyright_text'])) echo html_entity_decode( $zo_mercury_data['footer_copyright_text'] ); ?></div>
            </div>
            <?php } ?>
        </footer>
    </div>
</div>
<?php } ?>
