<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );
if ( ! empty( $tabs ) ) : ?>
<?php
    global $post, $product, $themebase_settings;
	$tab_width = get_post_meta(get_the_ID(), 'tab_width', true);
	if ($tab_width) {
	    $tab_width_content = $tab_width;
	} else {
	    $tab_width_content = Themebase::setting('single_product_tab');
	}
    $custom_tab_title = get_post_meta(get_the_id(), 'custom_tab_title', true);
    $custom_tab_content = get_post_meta(get_the_id(), 'custom_tab_content', true);
    $single_delivery_content = Themebase::setting('single_delivery_content');
    $single_product_delivery = Themebase::setting('single_product_delivery');
    $single_product_title_shipping_policy = Themebase::setting('single_product_title_shipping_policy');
?>
<div class="product-tab tab-<?php echo esc_attr($tab_width_content);?>">
	<?php if($tab_width_content === 'full_width') : ?>
		<ul class="tabs wc-tabs" role="tablist">
			<?php foreach ( $tabs as $key => $tab ) : ?>
				<li class="<?php echo esc_attr( $key ); ?>_tab" id="tab-title-<?php echo esc_attr( $key ); ?>" role="tab" aria-controls="tab-<?php echo esc_attr( $key ); ?>">
					<a href="#tab-<?php echo esc_attr( $key ); ?>">
						<?php echo wp_kses( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $tab['title'], $key ),themebase_allow_html() ); ?>
					</a>
				</li>
			<?php endforeach; ?>

			<?php if ($single_delivery_content !== '' && $single_product_delivery === '1' && $single_product_title_shipping_policy !== '') {
		        ?>
		        <li  class="tab-delivery"><a href="#delivery-return-content"><?php echo esc_html($single_product_title_shipping_policy) ?></a></li>
		    <?php } ?>

            <?php if ($custom_tab_title && $custom_tab_content) : ?>
                <li  class="tab-custom1_tab"><a href="#tab-custom2"><?php echo esc_html($custom_tab_title) ?></a></li>
            <?php endif; ?>
		</ul>
        <div class="tab-content">
			<?php foreach ( $tabs as $key => $tab ) : ?>
				<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--<?php echo esc_attr( $key ); ?> panel entry-content wc-tab" id="tab-<?php echo esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="tab-title-<?php echo esc_attr( $key ); ?>">
					<?php
					if ( isset( $tab['callback'] ) ) {
						call_user_func( $tab['callback'], $key, $tab );
					}
					?>
				</div>
			<?php endforeach; ?>
	        <?php if ($single_delivery_content !== '' && $single_product_delivery === '1' && $single_product_title_shipping_policy !== '') {
		        ?>
		        <div class="woocommerce-Tabs-panel panel entry-content wc-tab" id="delivery-return-content"  role="tabpanel" >
	                <?php echo \Elementor\Plugin::$instance->frontend->get_builder_content($single_delivery_content, true); ?>
	            </div>
		    	<?php } ?>
			<?php if ($custom_tab_title && $custom_tab_content) : ?>
	            <div class="woocommerce-Tabs-panel panel entry-content wc-tab" id="tab-custom2"  role="tabpanel"> 
	                <?php echo wpautop(do_shortcode($custom_tab_content)) ?>
	            </div>
	        <?php endif; ?>
        </div>

		<?php do_action( 'woocommerce_product_after_tabs' ); ?>
	<?php else : ?>
		<div class="woocommerce-tabs wc-tabs-wrapper">
	        <div class="accordion_holder toggle">
				<?php foreach ( $tabs as $key => $tab ) : ?>

					<h6 class="title-holder clearfix <?php echo esc_attr($key) ?>_tab">
						<span class="tab-title"><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ); ?></span>
					</h6>
					<div class="accordion_content">
						<div class="accordion_content_inner">
							<?php call_user_func( $tab['callback'], $key, $tab ) ?>
						</div>
					</div>

				<?php endforeach; ?>

			</div>
			<?php if ($custom_tab_title && $custom_tab_content) : ?>
				<div class="accordion_holder toggle">
		            <h6 class="title-holder clearfix"><?php echo esc_html($custom_tab_title) ?>
		            </h6>
		            <div class="accordion_content">
		                <?php echo wpautop(do_shortcode($custom_tab_content)) ?>
		            </div>
		        </div>
            <?php endif; ?>
			<?php if ($single_delivery_content !== '' && $single_product_delivery === '1') {
	        ?>
	        <div class="delivery-return accordion_holder toggle">
	            <h6 class="title-holder clearfix"><?php echo esc_html($single_product_title_shipping_policy); ?>
	            </h6>
	            <div id="delivery-return-content" class="accordion_content">
	                <?php echo \Elementor\Plugin::$instance->frontend->get_builder_content($single_delivery_content, true); ?>
	            </div>
	        </div>
	    	<?php } ?>
		</div>
	<?php endif; ?>
</div>
<?php endif; ?>
