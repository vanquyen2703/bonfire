<?php
$header_layout = Themebase::setting('header_layout_style');
if ($header_layout == 'wide') {
    $container = 'container-fluid';
} elseif ($header_layout == 'full_width') {
    $container = 'container';
} else {
    $container = 'container-fluid';
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
<header class="site-header header-default <?php echo esc_attr($class_sticky);?>">
    <div class="<?php echo esc_attr($container); ?>">
        <div class="header-main-content d-flex align-items-center row">
             <div class="menu-icon menu_bar align-items-center col-md-3 col-sm-3 col-xs-3">
                <span class="theme-icon-menu"></span>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-xs-6 header-logo">
                <?php get_template_part('templates/header/site', 'branding'); ?>
            </div>
            <?php if (has_nav_menu('primary')): ?>
                <div class="navigation-top menu-col-center col-xl-9 col-lg-9 col-md-8 col-sm-8">
                    <nav id="site-navigation" class="apr-nav-menu--main apr-nav-menu__container ">
                        <?php Themebase::menu_primary(); ?>
                    </nav>
                </div>
            <?php endif; ?>
            <div class="header-group menu-col-right justify-content-end col-xl-1 col-lg-1 col-md-3 col-sm-3 col-xs-3">
                <?php
                $show_cart = Themebase::setting('show_cart');
                $show_search = Themebase::setting('show_search');
                $show_account = Themebase::setting('show_account');
				
                if ($show_search) {
                    ?>
                    <div class="header-search not-show-field">
                         <div class="btn-search toggle-search">
                            <i class="theme-icon-search"></i>
                        </div>
                        <?php Themebase_Templates::get_search_box();?>
                    </div>
                    <?php
                }
				if (class_exists('WooCommerce') && $show_account) {
                    Themebase_Templates::get_setting_template();
                } 
				if (class_exists('WooCommerce') && $show_cart) {
                    Themebase_Templates::get_minicart_template();
                }
                ?>

            </div>
           
        </div>
    </div>
</header>
<?php Themebase_Templates::mobile_menu();?>