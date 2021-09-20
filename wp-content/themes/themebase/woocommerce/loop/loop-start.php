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
global $woocommerce_loop, $themebase_product_layout, $themebase_product_type;
$themebase_product_layout = $themebase_product_type = $themebase_product_column ='';
$themebase_pagination_type = themebase_get_meta_value('pagination_type');
$themebase_product_columns_cat = themebase_get_meta_value('product_columns');
$themebase_product_columns_layout_list_cat = themebase_get_meta_value('product_columns_layout_list');
$themebase_product_columns_layout_customize = Themebase::setting('product_column');
$themebase_product_columns_layout_list_customize = Themebase::setting('product_column_list');
$themebase_product_layout_cat = themebase_get_meta_value('product_layout');
$themebase_product_layout_customize = Themebase::setting('product_layouts');
$themebase_product_type_cat = themebase_get_meta_value('product_type');
$themebase_product_type_customize = Themebase::setting('product_type');
$themebase_product_type_product_other = Themebase::setting('other_product_type');

if(shortcode_exists('product') && isset($woocommerce_loop['product_layout'])){
	$themebase_product_layout = $woocommerce_loop['product_layout']; 
}elseif(is_product_category() && isset($themebase_product_layout_cat) && $themebase_product_layout_cat){
    $themebase_product_layout = $themebase_product_layout_cat;
}else{
    $themebase_product_layout = Themebase::setting('product_layouts');
}

if(shortcode_exists('product') && isset($woocommerce_loop['product_column_number'])){
	$themebase_product_column = $woocommerce_loop['product_column_number'];
}elseif(class_exists('WooCommerce') && 'product' == get_post_type()){
	if($themebase_product_layout === 'list' || $themebase_product_layout ==='list_grid'){
		if($themebase_product_columns_layout_list_cat && $themebase_product_columns_layout_list_cat != 'default'){
			$themebase_product_column = $themebase_product_columns_layout_list_cat;
		}else{
			$themebase_product_column = $themebase_product_columns_layout_list_customize;
		}
		
	}elseif($themebase_product_layout === 'grid' || $themebase_product_layout ==='grid_list'){
		if($themebase_product_columns_cat && $themebase_product_columns_cat != 'default'){
			$themebase_product_column = $themebase_product_columns_cat;
		}else{
			$themebase_product_column = $themebase_product_columns_layout_customize;
		}
	}
}elseif(!shortcode_exists('product')) {
    if($themebase_product_columns_layout_list_customize && ($themebase_product_layout === 'list' || $themebase_product_layout ==='list_grid')){
		$themebase_product_column = $themebase_product_columns_layout_list_customize;
	}elseif($themebase_product_columns_layout_customize && ($themebase_product_layout === 'grid' || $themebase_product_layout ==='grid_list')){
		$themebase_product_column = $themebase_product_columns_layout_customize;
	}
}

if($themebase_pagination_type && isset($themebase_pagination_type) ){
	$pagination_type = $themebase_pagination_type;
}else{
	$pagination_type = Themebase::setting('pagination_type');
}
if(is_singular('product')) {
	if($themebase_product_type_product_other && $themebase_product_type_product_other != 'default' )  {
		$themebase_product_type = $themebase_product_type_product_other;
	}else{
		$themebase_product_type = $themebase_product_type_customize;
	}
}elseif(shortcode_exists('product') && isset($woocommerce_loop['product_type'])){
	$themebase_product_type = $woocommerce_loop['product_type']; 
}elseif(is_product_category()){
	if(isset($themebase_product_type_cat) && $themebase_product_type_cat && $themebase_product_type_cat != "default"){ 
		$themebase_product_type = $themebase_product_type_cat;
	}else{
		$themebase_product_type = $themebase_product_type_customize;
	}
}else{
	$themebase_product_type = $themebase_product_type_customize;
}
$class_style = $class_product = '';

if($themebase_product_layout === 'list' || $themebase_product_layout ==='list_grid' || (isset($woocommerce_loop['product_layout']) && $woocommerce_loop['product_layout'] === 'list')){
	$class_product = 'product-list';
} else{
	$class_product = 'product-grid';		
}
if($themebase_product_layout != 'list' || $themebase_product_layout ==='list_grid' || $themebase_product_layout ==='grid_list' || (isset($woocommerce_loop['product_layout']) && $woocommerce_loop['product_layout'] != 'list')){
	if ($themebase_product_type == 1 ) {
	$class_style = ' product-style-1';
	}elseif ($themebase_product_type == 2 ) {
		$class_style = ' product-style-2';
	}elseif ($themebase_product_type == 3 ) {
		$class_style = ' product-style-3';
	}elseif ($themebase_product_type == 4 ) {
		$class_style = ' product-style-4';
	}elseif ($themebase_product_type == 5 ) {
		$class_style = ' product-style-1  product-style-5';
	}elseif ($themebase_product_type == 6 ) {
		$class_style = ' product-style-6';
	}elseif ($themebase_product_type == 7) {
		$class_style = 'product-style-7';
	} else{
		$class_style = 'product-style-default';
	}
}

?>

<div class="product-style <?php echo esc_attr($class_style); ?>">
	
<ul class="products  <?php echo esc_attr($class_product); ?> columns-<?php echo esc_attr($themebase_product_column); ?> pagination_<?php echo esc_attr($pagination_type); ?>">