<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}
if (!class_exists('Themebase_Custom_Style')) {
    Class Themebase_Custom_Style
    {
        public function __construct()
        {
            add_action('wp_footer', array($this, 'style_css'));
			
        }

        public function style_css()
        {
            wp_register_style('custom-style', false);
            wp_enqueue_style('custom-style');
            $style_css = "";
            $style_css .= $this->primary_color_css();
            $style_css .= $this->breadcrumbs();
            $style_css .= $this->site_background();
            $style_css .= $this->mb_single_product_background();
            $style_css .= $this->mb_category_background();
            $style_css .= $this->body_bg_image();
            $style_css .= $this->general_shop_background();
            $style_css .= $this->header();
            $style_css .= $this->site_width();
            $style_css .= $this->remove_space_top();
            $style_css .= $this->remove_space_bottom();
            $style_css .= $this->scroll_top_color();
            $style_css .= $this->color_title_breadcrumb();
            $style_css .= $this->color_link_title_breadcrumb();
            $style_css .= $this->icon_button_add_to_cart();
			$style_css = Themebase_Minify::css( $style_css );
            wp_add_inline_style( 'custom-style',html_entity_decode($style_css, ENT_QUOTES));
        }

        # Check color
        function check_color($color_1, $color_2)
        {
            $check_color = themebase_get_meta_value($color_1);
            if (isset($check_color) && $check_color !== '') {
                $color = $check_color;
            } else {
                $color = Themebase::setting($color_2);
            }
            return $color;
        }

        # Regardless of the name, this function works for both primary and highlight color, gradient additionally.
        function primary_color_css()
        {
            $hasGra = themebase_get_meta_value('enable_gradient');
            $color = $this->check_color('site_color', 'primary_color');
            $css = '';

            if (isset($color) && $color !== '') {
                $css = "
					.icon-sticky::before {
						color: $color;
					}
                    
                    ";
            }
            return $css;
        }

        function breadcrumbs()
        {
            $align_breadcrumbs = themebase_get_meta_value('align_breadcrumbs');
            $breadcrumbs_color = themebase_get_meta_value('breadcrumbs_color');
            $breadcrumbs_opacity = get_post_meta(get_the_ID(), 'breadcrumbs_opacity', true);
            $breadcrumbs_bg_overlay = get_post_meta(get_the_ID(), 'breadcrumbs_bg_overlay', true);
            $title_color = get_post_meta(get_the_ID(), 'title_color', true);
            $link_color = get_post_meta(get_the_ID(), 'link_color', true);
            $css = '';

            if (isset($align_breadcrumbs) && $align_breadcrumbs !== 'default' && $align_breadcrumbs !== '') {
                $css .= "
                div.side-breadcrumb{
                    text-align: {$align_breadcrumbs};
                }";
            }
            if (isset($breadcrumbs_color) && $breadcrumbs_color != '') {
                $css .= "
                div.side-breadcrumb .breadcrumb > li,
                div.side-breadcrumb .breadcrumb{
                    color: {$breadcrumbs_color};
                }";
            }
            if (isset($title_color) && $title_color != '') {
                $css .= "
                div.side-breadcrumb .page-title h1, div.side-breadcrumb .page-title h2 {
                    color: {$title_color};
                }";
            }
            if (isset($link_color) && $link_color != '') {
                $css .= "
                div.side-breadcrumb .breadcrumb .home,
                div.side-breadcrumb .breadcrumb li a,
                div.side-breadcrumb .breadcrumb li:before {
                    color: {$link_color};
                }";
            }
            if (isset($breadcrumbs_opacity) && $breadcrumbs_opacity != '') {
                $css .= "
                div.side-breadcrumb:before {
                    opacity: {$breadcrumbs_opacity};
                }";
            }
            if (isset($breadcrumbs_bg_overlay) && $breadcrumbs_bg_overlay != '') {
                $css .= "
                div.side-breadcrumb:before {
                    background-color: {$breadcrumbs_bg_overlay};
                }";
            }
            return $css;
        }

        function site_background()
        {
            $site_background = themebase_get_meta_value('site_background');
            $css = '';
            if ($site_background != '') {
                $css = "
                body{
                    background-color: {$site_background}!important;
                }";
            }
            return $css;
        }

        function mb_single_product_background()
        {
            $background_color_single_product = themebase_get_meta_value('background_color_single_product');
            $css = '';
            if ($background_color_single_product != '') {
                $css = "
                .single-product .wrapper{
                    background-color: {$background_color_single_product} !important;
                }";
            }
            return $css;
        }

        function mb_category_background()
        {

            global $wp_query;
            $cat = $wp_query->get_queried_object();
            $term_id = isset($cat->term_id) ? $cat->term_id : 0;
            $bg_color_cate = get_term_meta($term_id, 'bg_color_cate', true);

            $css = '';
            if (isset($bg_color_cate) && $bg_color_cate != '') {
                $css = "
                body.post-type-archive-product, body.single-product, body.tax-product_cat{
                    background-color: {$bg_color_cate};
                }";
            }
            return $css;
        }

        function body_bg_image()
        {
            $body_bg_image = themebase_get_meta_value('body_bg_image');
            $css = '';
            if ($body_bg_image != '') {
                $css = "
                body{
                    background-image: url($body_bg_image) !important;
                }";
            }
            return $css;
        }

        function general_shop_background()
        {
            $general_shop_background = Themebase::setting('general_shop_background');
            $css = '';
            if ($general_shop_background != '') {
                $css = "
                .post-type-archive-product,
                .single-product,
                .tax-product_cat{
                    background-color: {$general_shop_background};
                }";
            }
            return $css;
        }

        function header()
        {
            $sticky_bg = themebase_get_meta_value('sticky_bg');

            $choose_header_builder = Themebase::setting('choose_header_builder');
            $header_type = themebase_get_meta_value('header_type');
            $css = '';
            if (isset($sticky_bg) && $sticky_bg !== '') {
                $css = "
                    .header-sticky.is-sticky,
                    .header-default.header-sticky.is-sticky, .header-sticky.is-sticky.header-1 .bg-header , .header-sticky.is-sticky:not(.header-1) .elementor > .elementor-inner > .elementor-section-wrap > .elementor-element{
                        background-color: {$sticky_bg}!important;
                    }
                ";
            }
            if (is_singular('header')) {
                global $post;
                $id = $post->ID;
            } else {
                if (!empty($header_type) && $header_type !== 'default') {
                    $id = themebase_get_id_by_slug(themebase_get_meta_value('header_type'));
                } else {
                    $id = themebase_get_id_by_slug(Themebase::setting('choose_header_builder'));
                }
            }
            $header_fix_bg = get_post_meta($id, 'header_fix_bg', true);
            if (isset($header_fix_bg) && $header_fix_bg != '') {
                $css .= "
                     .header-fixed .site-header:not(.is-sticky) > .elementor > .elementor-inner > .elementor-section-wrap > .elementor-element{
                        background-color: {$header_fix_bg}!important;
                    }
                ";
            }
            return $css;
        }

        function site_width()
        {
            $site_width = themebase_get_meta_value('site_width');
            $css = '';
            if (isset($site_width) && $site_width != '') {
                $css = "
                 @media (min-width: 1200px){
                    .site-width > .wrapper > .container,
                    .elementor-inner .elementor-section.elementor-section-boxed>.elementor-container{
                        max-width: {$site_width};
                    }
                }";
            }
            return $css;
        }

        function remove_space_top()
        {
            $remove_space_top = themebase_get_meta_value('remove_space_top');
            $css = '';
            if ($remove_space_top != '') {
                $css = "
                .remove_space_top .side-breadcrumb{
                    margin-bottom: 0 !important;
                }
                .remove_space_top .site-header+.wrapper{
                    padding-top: 0 !important;
                }";
            }
            return $css;
        }

        function remove_space_bottom()
        {
            $remove_space_bottom = themebase_get_meta_value('remove_space_bottom');
            $css = '';
            if ($remove_space_bottom != '') {
                $css = "
               .remove_space_bottom #page-footer,
               .remove_space_bottom  + #page-footer{
                    margin-top: 0 !important;
                }
                ";
            }
            return $css;
        }

        function scroll_top_color()
        {
            $scroll_top_color = themebase_get_meta_value('scroll_top_color');
            $css = '';
            if ($scroll_top_color != '') {
                $css = "
                .scroll-to-top {
                    background: {$scroll_top_color};
                }
                ";
            }
            return $css;
        }

        function color_title_breadcrumb()
        {
            $color_page_title = themebase_get_meta_value('color_page_title');
            $css = '';
            if($color_page_title!= ''){
                $css = "
                .side-breadcrumb .page-title h1, .side-breadcrumb .page-title h2,.breadcrumb li {
                    color: {$color_page_title};
                }
                .side-breadcrumb .page-title h1:after, .side-breadcrumb .page-title h2:after{
                        background-color: {$color_page_title};
                }
                ";
            }
            return $css;
        }
        function color_link_title_breadcrumb()
        {
            $color_breadcrumb_link = themebase_get_meta_value('color_breadcrumb_link');
            $css = '';
            if($color_breadcrumb_link!= ''){
                $css = "
                .breadcrumb li a,.breadcrumb li .home,.breadcrumb li:before {
                    color: {$color_breadcrumb_link};
                }
                ";
            }
            return $css;
        }
        function icon_button_add_to_cart()
        {
            $unicode_add_to_cart = Themebase::setting('unicode_add_to_cart');
            $css = '';
            if($unicode_add_to_cart!= ''){
                $css = "
                .product-style-2 .product-grid .product-top .product-action .action-item .add-cart-btn a:before{
                    content: '$unicode_add_to_cart';
                    font-weight: 900;
                    font-family: 'Font Awesome 5 Free';
                }
                ";
            }
            return $css;
        }
    }

    new Themebase_Custom_Style();
}