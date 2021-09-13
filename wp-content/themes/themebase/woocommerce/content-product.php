<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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
defined( 'ABSPATH' ) || exit;
global $product, $woocommerce_loop;
// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
$entries_count = 0;
$animation = Themebase::setting( 'product_css_animation' );
$post_term_arr = get_the_terms( get_the_ID(), 'product_cat' );
$themebase_product_columns = themebase_get_meta_value('product_columns');
$post_term_filters = '';
$post_term_names = '';
if( is_array( $post_term_arr ) && count( $post_term_arr ) > 0 ) {
    foreach ( $post_term_arr as $post_term ) {

        $post_term_filters .= $post_term->slug . ' ';
        $post_term_names .= $post_term->name . ', ';
    }
}
if(isset($woocommerce_loop['product_column_number']) && !is_shop() && !is_tax() && !is_singular('product')){
	$themebase_product_column = wc_get_loop_prop( 'columns' );
}elseif($themebase_product_columns){
	$themebase_product_column = $themebase_product_columns;
}else{
	$themebase_product_column = Themebase::setting('product_column');
}
$class_action = '';
if (!Themebase::setting('show_action')) {
	$class_action = 'hide-action';
}
$post_term_filters = trim( $post_term_filters );
$post_term_names = substr( $post_term_names, 0, -2 );
$classes[] = $post_term_filters;
$classes[] = 'product';
?>
<li <?php post_class($classes); ?>>
	<div class="product-content clearfix">
		<div class="product-top">
			<?php
				/**
				 * Hook: woocommerce_before_shop_loop_item_title.
				 *
				 * @hooked woocommerce_show_product_loop_sale_flash - 10
				 * @hooked themebase_woocommerce_product_image - 10
				 */
				do_action( 'woocommerce_before_shop_loop_item_title' );
			?>
			<div class="product-action">
                <?php
                /**
                 * Hook: woocommerce_product_action.
                 *
                 * @hooked woocommerce_template_loop_add_to_cart - 10
                 */
                do_action( 'woocommerce_product_add_to_cart' );
                ?>
				 <div class="group-action <?php echo esc_attr($class_action);?>">
                    <?php
                    /**
                     * Hook: woocommerce_product_action.
                     *
                     * @hooked themebase_quickview - 10
                     * @hooked themebase_wishlist_custom - 20
                     * @hooked themebase_compare_product - 30
                     */
                    do_action( 'woocommerce_product_action' );
                    ?>
                </div>
			</div>
		</div>
		<div class="product-desc">
			
				<div class="product-content-info">
				<?php 

					do_action( 'woocommerce_info_product' );
	            ?>
				<?php 
					/**
					 * Hook: woocommerce_shop_loop_item_title.
					 *
					 * @hooked woocommerce_template_loop_product_title - 10
					 */
					do_action( 'woocommerce_shop_loop_item_title' );

				?>
				<div class="product-price">
					<?php
						/**
						 * Hook: woocommerce_after_shop_loop_item_title.
						 *
						 * @hooked woocommerce_template_loop_rating - 5
						 * @hooked woocommerce_template_loop_price - 10
						 */
						do_action( 'woocommerce_after_shop_loop_item_title' );
						
					?>
					
	            </div>
	           
				<?php
					if(isset($woocommerce_loop['product_type']) && ($woocommerce_loop['product_type'] == '5')){
						do_action( 'woocommerce_price_custom' );
					}
				?><?php do_action( 'woocommerce_product_excerpt' );  ?>
		        <div class="product-action">
					 <div class="group-action <?php echo esc_attr($class_action);?>">
	                    <?php
	                    /**
	                     * Hook: woocommerce_product_action.
	                     *
	                     * @hooked themebase_quickview - 10
	                     * @hooked themebase_wishlist_custom - 20
	                     * @hooked themebase_compare_product - 30
	                     */
	                    do_action( 'woocommerce_product_action' );
	                    ?>
	                </div> 
					<?php
						/**
						 * Hook: woocommerce_product_action.
						 *
						 * @hooked woocommerce_template_loop_add_to_cart - 10
						 */
						do_action( 'woocommerce_product_add_to_cart' );
						
					?>
				</div>
			</div>
		</div>
	</div>
</li>