<?php
$choose_footer_builder = Themebase::setting('choose_footer_builder');
$footer_type = themebase_get_meta_value('footer_type');
if (class_exists( 'Apr_Core' )):
    if (isset($footer_type) && $footer_type == 'default'|| is_post_type_archive()=='portfolio') {
        if (Themebase::setting('enable_footer_builder') == '1') {
            echo '<div class="footer-content">';
            echo \Elementor\Plugin::$instance->frontend->get_builder_content(themebase_get_id_by_slug($choose_footer_builder), true);
            echo '</div>';
        } else {
            get_template_part('templates/footer/footer-default');
        }
    } else {
        if ($footer_type !==''){
            echo '<div class="footer-content">';
            echo \Elementor\Plugin::$instance->frontend->get_builder_content(themebase_get_id_by_slug($footer_type), true);
            echo '</div>';
        }else{
            get_template_part('templates/footer/footer-default');
        }
    }

else:
    get_template_part('templates/footer/footer-default');
endif;