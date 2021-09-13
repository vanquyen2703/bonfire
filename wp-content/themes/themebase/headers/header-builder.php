<?php
$choose_header_builder = Themebase::setting('choose_header_builder');
$header_type = themebase_get_meta_value('header_type');
$header_class ='';
if (!empty($header_type) && $header_type !=='default'){
    $header_class=$header_type;
}else{
    $header_class=$choose_header_builder;
}
$class_sticky ='';
if (themebase_get_meta_value('meta_header_sticky') ==''){
    if (Themebase::setting('header_sticky_enable') == 1){
        $class_sticky = 'header-sticky';
    }
}elseif (themebase_get_meta_value('meta_header_sticky') == 'on'){
    $class_sticky = 'header-sticky';
}else{
    $class_sticky ='';
}
?>
<header class="site-header header-builder <?php echo esc_attr($class_sticky);?> <?php echo esc_attr($header_class);?>">
        <?php
        if (!empty($header_type) && $header_type !=='default'){
        echo \Elementor\Plugin::$instance->frontend->get_builder_content(themebase_get_id_by_slug($header_type), true);
        }else{
            echo \Elementor\Plugin::$instance->frontend->get_builder_content(themebase_get_id_by_slug($choose_header_builder), true);
        }
        ?>
</header>
