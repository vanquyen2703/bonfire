<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;
global $product;
/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
}
$single_type = Themebase_Templates::get_product_single_style();
$themebase_product_thumbnails = themebase_get_meta_value('product_thumbnail_style');
if ($themebase_product_thumbnails != 'default') {
    $themebase_product_thumbnails = themebase_get_meta_value('product_thumbnail_style');
} elseif (Themebase::setting('product_thumbnails_style')) {
    $themebase_product_thumbnails = Themebase::setting('product_thumbnails_style');
} else {
    $themebase_product_thumbnails = 'vertical';
}
$class_thumbnails='';
if ($themebase_product_thumbnails === 'vertical') {
    $class_thumbnails = 'product-thumbnails-vertical';
} else {
    $class_thumbnails = 'product-thumbnails-horizontal';
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
    <div class="product-detail  <?php echo esc_attr($single_type); ?> <?php if($single_type ==='single_1'){echo esc_attr($class_thumbnails);}?>">
        <div class="row">
            <?php
            $gallery_ids = $product->get_gallery_image_ids();
            $gallery = empty($gallery_ids) ? 'no-gallery' : 'has-gallery';
            ?>
            <div class="col-xl-8 col-lg-8 col-sm-12 col-md-12 product-images-wrapper <?php echo esc_attr( $gallery ); ?>">
                <?php
                /**
                 * Hook: woocommerce_before_single_product_summary.
                 *
                 * @hooked woocommerce_show_product_sale_flash - 10
                 * @hooked woocommerce_show_product_images - 20
                 */
                do_action('woocommerce_before_single_product_summary');
                ?>
            </div>
            <div class="col-xl-4 col-lg-4 col-sm-12 col-md-12 product-detail-summary">
                <div class="summary entry-summary">
                    <?php
                    /**
                     * Hook: woocommerce_single_product_summary.
                     *
                     * @hooked woocommerce_template_single_title - 5
                     * @hooked woocommerce_template_single_rating - 10
                     * @hooked woocommerce_template_single_price - 10
					 * @hooked woocommerce_template_single_excerpt - 10
					 * @hooked themebase_stock_text_shop_page - 15
					 * @hooked woocommerce_template_single_meta - 15 - 5
                     * @hooked themebase_delivery_return - 15 - 7
                     * @hooked woocommerce_template_single_add_to_cart - 30
                     * @hooked woocommerce_template_single_sharing - 50
                     * @hooked WC_Structured_Data::generate_product_data() - 60
                     */
                    do_action('woocommerce_single_product_summary');
                    ?>

                    <?php
                        /**
                         * Hook: woocommerce_after_single_product_summary.
                         *
                         * @hooked woocommerce_output_product_data_tabs - 10
                         */
                        do_action('woocommerce_after_single_product_summary');
                    ?>
                </div>
            </div>
        </div>
    </div><!-- /. Product detail -->
</div>

<?php do_action('woocommerce_after_single_product'); ?>

