<?php
/**
 * Product loop sale flash
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/sale-flash.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see         http://docs.woothemes.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

global $post, $product;
$labels =  $sales_html ='';
$labels = '';
$featured = false;
$themebase_new_lable_day = Themebase::setting('shop_archive_new_days');
$postdate = get_the_date( 'F d, Y g:i a', $post->ID );
$today = date("F j, Y, g:i a"); 
$old_date = (( 60 * 60 * 24 ) * $themebase_new_lable_day);
$postdatestamp  = strtotime( $postdate) + $old_date;
$postdatestamp_today  = strtotime( $today ) ; 
if (Themebase::setting('hot_lable')) {
    $featured = $product->is_featured();
    if ($featured) {
        $hot_html = '<span class="label-product on-hot"><span>'. esc_html__('Hot', 'themebase') .'</span></span>';
        $labels .= $hot_html;
    }
}
if (Themebase::setting('sale_lable') && $product->is_on_sale()) {
	if (Themebase::setting('percentage_lable')) {
		$percentage = $sale_price = '';
		// Main Price
		$regular_price_min = $product->is_type('variable') ? $product->get_variation_regular_price('min', true) : $product->get_regular_price();
		$regular_price_max = $product->is_type('variable') ? $product->get_variation_regular_price('max', true) : $product->get_regular_price();
		$sale_price_min = $product->is_type('variable') ? $product->get_variation_sale_price('min', true) : $product->get_sale_price();
		$sale_price_max = $product->is_type('variable') ? $product->get_variation_sale_price('max', true) : $product->get_sale_price();
		if ($regular_price_min !== $sale_price_min || $regular_price_max !== $sale_price_max && $product->is_on_sale()) {
			// Percentage calculation and text
			$percentage_price_min = round(($regular_price_min - $sale_price_min) / $regular_price_min * 100);
			$percentage_price_max = round(($regular_price_max - $sale_price_max) / $regular_price_max * 100);
			if($product->is_type('variable')){
				if ($percentage_price_max > 0 && $percentage_price_min == 0) {
					$sales_html = '<span class="label-product on-sale percentage">' . esc_html__('-', 'themebase') . $percentage_price_max . '%</span>';
					echo wp_kses ($sales_html, themebase_allow_html());
				} elseif ($percentage_price_min > 0 && $percentage_price_max == 0) {
					$sales_html = '<span class="label-product on-sale percentage">' . esc_html__('-', 'themebase') . $percentage_price_min . '%</span>';
					echo wp_kses ($sales_html, themebase_allow_html());
				} else {
					$sales_html = '<span class="label-product on-sale upto">' . esc_html__('Upto ', 'themebase') . $percentage_price_max .'%</span>';
					echo wp_kses ($sales_html, themebase_allow_html());
				}
			}else{
				$sale_price = round( ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100 );
				$sales_html = '<span class="label-product on-sale percentage">' . esc_html__('-', 'themebase') . $sale_price . '%</span>';
				echo wp_kses ($sales_html, themebase_allow_html());
			}
		}
	}else{
		$sales_html = apply_filters('woocommerce_sale_flash', '<span class="label-product on-sale"><span>'.esc_html__( 'Sale ', 'themebase' ).'</span></span>', $post, $product);
		$labels .= $sales_html;
	}
}
if (Themebase::setting('new_lable')){
    if ( $postdatestamp > $postdatestamp_today ) { // If the product was published within the newness time frame display the new badge
        $new_html = '<span class="label-product new"><span>' . esc_html__( 'New', 'themebase' ) . '</span></span>';
        $labels .= $new_html;
    }
}
$label_class= '';
if($featured){
    $label_class = "hot-label";
}else if($product->is_on_sale() && !$featured){
    $label_class = "sale-label";
}else if ( $postdatestamp > $postdatestamp_today ){
    $label_class = "new-label";
}
else if ($product->is_on_sale() && $postdatestamp > $postdatestamp_today){
    $label_class = "sale-label";
}
else if ($featured && $postdatestamp > $postdatestamp_today){
    $label_class = "hot-label";
}
else if ($product->is_on_sale() && $featured){
    $label_class = "hot-label";
}
else if ($product->is_on_sale() && $featured && $postdatestamp > $postdatestamp_today){
    $label_class = "hot-label";
}
else{
    $label_class = "";
}
if(Themebase::setting('sale_lable') && $product->is_on_sale() || $featured || $postdatestamp > $postdatestamp_today){
    echo  wp_kses( $labels ,themebase_allow_html() );
}
