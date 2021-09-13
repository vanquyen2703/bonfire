<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     3.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

global $product;
$featured = $product->is_featured();
$postdatestamp = '';
$themebase_product_meta = Themebase::setting('single_product_meta_enable');
$themebase_product_meta_multi = Themebase::setting('product_meta_multi');
?>
<?php if ($themebase_product_meta) :
    if ($product->get_sku() || $product->get_tag_ids()):
    ?>

    <div class="product_meta <?php if (isset($themebase_product_meta_multi) && in_array('brands', $themebase_product_meta_multi)) {
        echo 'show-brands';
    } ?>">

        <?php do_action('woocommerce_product_meta_start'); ?>
        <?php if (isset($themebase_product_meta_multi) && in_array('sku', $themebase_product_meta_multi)) : ?>
            <?php if (wc_product_sku_enabled() && ($product->get_sku() || $product->is_type('variable'))) : ?>
                <span class="sku_wrapper"><strong><?php esc_html__('SKU:', 'themebase'); ?></strong> <span
                            class="sku"><?php echo esc_html($sku = $product->get_sku()) ? $sku : esc_html__('N/A', 'themebase'); ?></span></span>
            <?php endif; ?>
        <?php endif; ?>
        <?php if (isset($themebase_product_meta_multi) && in_array('tags', $themebase_product_meta_multi)) : ?>
            <?php echo wc_get_product_tag_list($product->get_id(), ', ', '<span class="tagged_as"><strong>' . _n('Tag:', 'Tags:', count($product->get_tag_ids()), 'themebase') . '</strong> ', '</span>'); ?>
        <?php endif; ?>
        <?php do_action('woocommerce_product_meta_end'); ?>

    </div>

<?php endif;endif; ?>