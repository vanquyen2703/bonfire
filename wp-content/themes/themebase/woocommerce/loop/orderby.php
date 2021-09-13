<?php
/**
 * Show options for ordering
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
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
 * @version     3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<form class="woocommerce-ordering" method="get">
	<select name="orderby" class="orderby" aria-label="<?php esc_attr_e( 'Sort by', 'themebase' ); ?>">
		<?php
		    $catalog_orderby = apply_filters( 'woocommerce_catalog_orderby', array(
		        'menu_order' => __( 'Default sorting', 'themebase' ),

		    'popularity' => __( 'Popularity', 'themebase' ),

		    'rating'     => __( 'Average rating', 'themebase' ),

		    'date'       => __( 'Latest products', 'themebase' ),

		    'price'      => __( 'Price: low to high', 'themebase' ),

		    'price-desc' => __( 'Price: high to low', 'themebase' )
		) );

		if ( get_option( 'woocommerce_enable_review_rating' ) == 'no' )
		    unset( $catalog_orderby['rating'] ); ?>
		<?php foreach ( $catalog_orderby as $id => $name ) : ?>
			<option value="<?php echo esc_attr( $id ); ?>" <?php selected( $orderby, $id ); ?>><?php echo esc_html( $name ); ?></option>
		<?php endforeach; ?>
	</select>
	<input type="hidden" name="paged" value="1" />
	<?php wc_query_string_form_fields( null, array( 'orderby', 'submit', 'paged', 'product-page' ) ); ?>
</form>
