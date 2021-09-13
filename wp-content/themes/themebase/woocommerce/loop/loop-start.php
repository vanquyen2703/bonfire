<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $woocommerce_loop;
$themebase_product_columns = themebase_get_meta_value('product_columns');
$themebase_pagination_type = themebase_get_meta_value('pagination_type');
$woocommerce_loop['product_column_number'] = '';
if(isset($woocommerce_loop['product_column_number']) && !is_shop() && !is_tax() && !is_singular('product')){
	$themebase_product_column = wc_get_loop_prop( 'columns' );
}elseif($themebase_product_columns){
	$themebase_product_column = $themebase_product_columns;
}else{
	$themebase_product_column = Themebase::setting('product_column');
}
if($themebase_pagination_type){
	$pagination_type = $themebase_pagination_type;
}else{
	$pagination_type = Themebase::setting('pagination_type');
}
if(is_singular('product')){
	$themebase_product_layout = Themebase::setting('other_product_layout');
}else{
	if ( $themebase_product_column != 1){
		$themebase_product_layout = Themebase::setting('product_layout');
	}else{
		$themebase_product_layout = 'list';
	}
}
$class_style_1 = $class_product = '';

if ( $themebase_product_column == 1){
	$class_product = 'product-list';
}else{
	$class_product = 'product-grid';
}
if ($themebase_product_layout == 5) {
	$class_style_1 = ' product-style-1';
}elseif ($themebase_product_layout == 7) {
	$class_style_1 = ' product-style-2 product-action-horizontal-bottom';
} else{
	$class_style_1 = '';
}
?>
<div class="product-style <?php echo esc_attr($class_style_1); ?> product-style-<?php echo esc_attr($themebase_product_layout); ?>">
	
<ul class="products  <?php echo esc_attr($class_product); ?> columns-<?php echo esc_attr($themebase_product_column); ?> pagination_<?php echo esc_attr($pagination_type); ?>">
