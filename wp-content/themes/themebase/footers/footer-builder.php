<?php
$choose_footer_builder = Themebase::setting('choose_footer_builder');
$footer_type = themebase_get_meta_value('footer_type');
$footer_class ='';
if (!empty($footer_type) && $footer_type !=='default'){
    $footer_class=$footer_type;
}else{
    $footer_class=$choose_footer_builder;
}
?>
<footer id="page-footer" class="page-footer footer-builder <?php echo esc_attr($footer_class);?>">
    <div class="footer-content">
        <?php
        if (!empty($footer_type) && $footer_type !=='default'){
        echo \Elementor\Plugin::$instance->frontend->get_builder_content(themebase_get_id_by_slug_footer($footer_type), true);
        }else{
            echo \Elementor\Plugin::$instance->frontend->get_builder_content(themebase_get_id_by_slug_footer($choose_footer_builder), true);
        }
        ?>
    </div>
</footer>