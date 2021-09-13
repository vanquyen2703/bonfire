<?php
/* 1: Remove Action */
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
remove_action('woocommerce_product_loop_start', 'woocommerce_maybe_show_product_subcategories');
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
remove_action('woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action('woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_proceed_to_checkout', 20);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);

/* 2: Add Action */
add_action('woocommerce_shop_loop_item_title', 'themebase_woocommerce_template_loop_product_title', 10);
add_action('woocommerce_after_subcategory_title', 'themebase_description_cat_product', 12);
add_action('woocommerce_before_shop_loop_item_title', 'themebase_woocommerce_product_image', 10);
add_action('woocommerce_product_image_sale_flash', 'woocommerce_show_product_loop_sale_flash', 10);
add_action('woocommerce_categories_left_toolbar', 'woocommerce_result_count', 10);
add_action('woocommerce_categories_view', 'themebase_woocommerce_list_view', 10);
add_action('woocommerce_categories_catalog_ordering', 'woocommerce_catalog_ordering', 10);
add_action('woocommerce_categories_filter', 'themebase_product_shop_filter', 10);
add_action('woocommerce_product_add_to_cart', 'woocommerce_template_loop_add_to_cart', 10);
add_action('woocommerce_product_excerpt', 'themebase_woocommerce_single_excerpt', 10);
add_action('woocommerce_product_action', 'themebase_wishlist_custom', 20);
add_action('woocommerce_product_action', 'themebase_compare_product', 30);
add_action('woocommerce_product_action', 'themebase_quickview', 10);
add_action('woocommerce_product_add_to_cart_text', 'themebase_woocommerce_product_add_to_cart_text');
add_action('woocommerce_before_single_product_summary', 'themebase_video_product', 10);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 35, 5);
add_action('woocommerce_cart_collaterals_before', 'woocommerce_cross_sell_display');
add_action('woocommerce_single_product_summary', 'themebase_model_information', 8);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
add_action('woocommerce_single_product_summary', 'themebase_size_guide_link', 9);
add_action('woocommerce_single_product_summary', 'themebase_stock_text_shop_page', 35);
add_action('woocommerce_single_product_summary', 'themebase_product_sharing', 40);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40, 5);
add_action('woocommerce_single_product_summary', 'themebase_category_mobile', 3);
add_action('woocommerce_after_single_product_other_summary', 'woocommerce_upsell_display', 15);
add_action('woocommerce_after_single_product_other_summary', 'woocommerce_output_related_products', 20);
add_action('woocommerce_widget_shopping_cart_buttons', 'themebase_woocommerce_widget_shopping_cart_proceed_to_checkout',15);
add_action('woocommerce_info_product', 'themebase_info_product', 10);
add_action('woocommerce_price_custom', 'woocommerce_template_loop_price', 10);
add_action('woocommerce_before_single_product_summary', 'themebase_show_sale_percentage_loop', 10);

/* 3: Add Filter */
add_filter('themebase_woocommerce_show_subcategories', 'woocommerce_maybe_show_product_subcategories');
add_filter('woocommerce_short_description', 'themebase_woocommerce_short_description', 10, 1);
add_filter('woocommerce_add_to_cart_fragments', 'themebase_woocommerce_header_add_to_cart_fragment', 30, 1);
add_filter('woocommerce_add_to_cart_fragments', 'themebase_woocommerce_header_add_to_cart_fragment_number', 30, 1);
add_filter('woocommerce_product_tabs', 'themebase_overide_product_tabs', 98);
add_filter('woocommerce_upsell_display_args', 'themebase_wc_change_number_related_products');
add_filter('woocommerce_output_related_products_args', 'themebase_related_products_args');

add_filter('woocommerce_get_image_size_gallery_thumbnail', function ($size) {
    return array(
        'width' => 570,
        'height' => 630,
        'crop' => 0,
    );
});
add_filter('woocommerce_product_reviews_tab_title', 'add_stars_to_reviews_tab_item', 98);
function add_stars_to_reviews_tab_item($title)
{
    global $product;

    $average_rating = $product->get_average_rating();

    if (!empty($average_rating) && $average_rating > 0)
        $title = '<div>' . $title . '</div>
        <div class="stars">' . wp_kses( $average_rating , themebase_allow_html()) . '</div>';

    return $title;
}
function themebase_model_information()
{
    global $product;

    $model_information = get_post_meta(get_the_ID(), 'model_information', true);
    if ($model_information != '') :?>
        <div class="model-information">
            <?php echo wp_kses( $model_information , themebase_allow_html()); ?>
        </div>
    <?php endif;
}
function themebase_category_mobile()
{
    global $product;

    $themebase_product_meta = Themebase::setting('single_product_meta_enable');
    $themebase_product_meta_multi = Themebase::setting('product_meta_multi');
    if ($themebase_product_meta) :?>
        <?php if (isset($themebase_product_meta_multi) && in_array('categories', $themebase_product_meta_multi)) : ?>
            <div class="cate-product">
                <?php echo wc_get_product_category_list($product->get_id(), ', '); ?>
            </div>
        <?php endif; ?>
    <?php endif;
}

function themebase_get_current_url()
{
    global $wp;
    $current_url = trailingslashit(home_url($wp->request));
    return $current_url;
}

if (!function_exists('themebase_woocommerce_product_add_to_cart_text')) {
    function themebase_woocommerce_product_add_to_cart_text()
    {
        global $product;
        $product_type = $product->get_type();
        if (!$product->is_in_stock()) {
            return esc_html__('Out of Stock', 'themebase');
        } else {
            switch ($product_type) {
                case 'simple':
                    if ($product->is_virtual('yes')) {
                        return esc_html__('Book now', 'themebase');
                    } else {
                        return esc_html__('Add to cart', 'themebase');
                    }
                    break;

                case 'grouped':
                    return esc_html__('Buy Product', 'themebase');
                    break;
                case 'external':
                    return esc_html__('Buy Product', 'themebase');
                    break;
                case 'variable':
                    if (is_product()) {
                        return esc_html__('Add to cart', 'themebase');
                    } else {
                        return esc_html__('Select Options', 'themebase');
                    }
                    break;
                default:
                    return esc_html__('Read more', 'themebase');
            }
        }
    }
}
function themebase_info_product()
{
    global $product, $woocommerce_loop, $post;
    ?>
    <?php if ((isset($woocommerce_loop['show_category_product']) && $woocommerce_loop['show_category_product'] === 'yes')): ?>
    <div class="category-product">
        <?php echo get_the_term_list($post->ID, 'product_cat', ' ', ', '); ?>
    </div>
<?php elseif (Themebase::setting('product_categories')) : ?>
    <div class="category-product">
        <?php echo get_the_term_list($post->ID, 'product_cat', ' ', ', '); ?>
    </div>
<?php endif; ?>

    <?php
    if ($product->is_type('variable')) {
        $variations = $product->get_available_variations();
        $args = array(
            'category' => array('category_slug')
        );

        foreach (wc_get_products($args) as $product) {

            foreach ($product->get_attributes() as $attr_name => $attr) {

                echo wc_attribute_label($attr_name); // attr label

                foreach ($attr->get_terms() as $term) {

                    echo wp_kses( $term->name , themebase_allow_html() ) ;
                }
            }
        }
        ?>
        <div class="show-attribute">
            <?php
            foreach ($product->get_attributes() as $key => $value) {
                if (count($value['options']) > 1) {
                    echo '<p>' . count($value['options']) . ' ' . wc_attribute_label($key) . 's</p>';
                }
            }
            ?>
        </div>
        <?php
    }
    ?>
    <?php
}

//Title product
function themebase_woocommerce_template_loop_product_title()
{
    global $product, $woocommerce_loop;
    ?>
    <h2 class="woocommerce-loop-product__title"><a href="<?php the_permalink(); ?>"
                                                   class="product-name"><?php echo get_the_title(); ?></a>
        <?php
        if (isset($woocommerce_loop['product_type']) && (isset($woocommerce_loop['show_attribute_on_title']) && $woocommerce_loop['show_attribute_on_title'] === 'yes') && (isset($woocommerce_loop['product_attr']) && $woocommerce_loop['product_attr'] !== '')) {
            $tax_attr = $woocommerce_loop['product_attr'];
            if ($product->is_type('variable')) {
                $attribute = $product->get_attribute($tax_attr);
                if ($attribute !== '') { ?>
                    <span class="name-attr">
                        <?php
                        echo '&#40;' . $attribute . '&#41;';
                        ?>
                        </span>
                    <?php
                }
            }
        }
        ?>
    </h2>
    <?php
}

// Filter Archive

function themebase_product_shop_filter()
{
    $shop_archive_filter = Themebase::setting('shop_archive_filter');
    ?>

    <?php if (isset($shop_archive_filter) && $shop_archive_filter): ?>
    <div class="shop-filter">
        <div class="btn-filter-product">
            <?php echo esc_html__('Filter', 'themebase'); ?> <i class="theme-icon-slider"> </i>
        </div>
    </div>
<?php endif; ?>
    <?php
}

//Single gallery thumbs navigation
add_action('woocommerce_before_single-product-thumb', 'themebase_single_gallery_nav', 10);
function themebase_woocommerce_account_menu_items()
{
    $items = array(
        'dashboard' => __('Account Dashboard', 'themebase'),
        'edit-account' => __('Account Information', 'themebase'),
        'edit-address' => __('Address Book', 'themebase'),
        'orders' => __('My Orders', 'themebase'),
        'downloads' => __('Downloads', 'themebase'),
        'customer-logout' => __('Logout', 'themebase'),
    );
    return $items;
}

add_filter('woocommerce_account_menu_items', 'themebase_woocommerce_account_menu_items');
add_filter('woocommerce_loop_add_to_cart_args', 'themebase_remove_rel', 10, 2);
function themebase_remove_rel($args, $product)
{
    unset($args['attributes']['rel']);
    return $args;
}

function themebase_custom_price_html()
{
    global $post;
    $sales_price_to = get_post_meta($post->ID, '_sale_price_dates_to', true);
    $sales_price_from = get_post_meta($post->ID, '_sale_price_dates_from', true);
    $strSaleFromTo = '';
    if ($sales_price_to != "" && $sales_price_from != "") {
        $sales_price_date_to = date("d/m", $sales_price_to);
        $sales_price_date_from = date("d/m", $sales_price_from);
        $strSaleFromTo = '<span class="date_from_to"> Promotion from: <span>' . $sales_price_date_from . ' - ' . $sales_price_date_to . '</span></span>';
    }
    echo wp_kses( $strSaleFromTo , themebase_allow_html());
}

function themebase_image_single_product_sc()
{
    global $product, $woocommerce_loop;
    $image_product = get_post_meta(get_the_ID(), 'image_product', true);
    $detect = new \Mobile_Detect();
    if ($image_product): ?>
        <div class="image-product-sc">
            <?php if ($detect->isTablet()): ?>
                <img src="<?php echo esc_url($image_product); ?>" alt="<?php echo esc_attr($product->get_title()); ?>"/>
                <?php
                if (isset($woocommerce_loop['single_type']) && $woocommerce_loop['show_custom_image'] === 'yes'): ?>
                    <?php
                    if ($woocommerce_loop['show_custom_image'] === 'yes') {
                        $has_custom_size = false;
                        $attachment_size[1] = '';
                        if (!empty($woocommerce_loop['custom_dimension']['width'])) {
                            $has_custom_size = true;
                            $attachment_size[0] = $woocommerce_loop['custom_dimension']['width'];
                        }

                        if (!empty($woocommerce_loop['custom_dimension']['height'])) {
                            $has_custom_size = true;
                            $attachment_size[1] = $woocommerce_loop['custom_dimension']['height'];
                        }
                    }
                    ?>

                    <?php if ($woocommerce_loop['show_custom_image'] === 'yes') : ?>
                        <?php
                        $image_url = Themebase_Helper::aq_resize(array(
                            'url' => $image_product,
                            'width' => $attachment_size[0],
                            'height' => $attachment_size[1],
                            'crop' => true,
                        ));
                        ?>
                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($product->get_title()); ?>"/>
                    <?php endif; ?>
                <?php else: ?>
                   <img src="<?php echo esc_url($image_product); ?>" alt="<?php echo esc_attr($product->get_title()); ?>"/>
                <?php endif; ?>
            <?php elseif ($detect->isMobile()): ?>
                <?php
                $image_url = Themebase_Helper::aq_resize(array(
                    'url' => $image_product,
                    'width' => '720',
                    'height' => '720',
                    'crop' => true,
                ));
                ?>
                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($product->get_title()); ?>"/>
            <?php else: ?>
                <?php
                if (isset($woocommerce_loop['single_type']) && $woocommerce_loop['show_custom_image'] === 'yes'): ?>
                    <?php
                    if ($woocommerce_loop['show_custom_image'] === 'yes') {
                        $has_custom_size = false;
                        $attachment_size[1] = '';
                        if (!empty($woocommerce_loop['custom_dimension']['width'])) {
                            $has_custom_size = true;
                            $attachment_size[0] = $woocommerce_loop['custom_dimension']['width'];
                        }

                        if (!empty($woocommerce_loop['custom_dimension']['height'])) {
                            $has_custom_size = true;
                            $attachment_size[1] = $woocommerce_loop['custom_dimension']['height'];
                        }
                    }
                    ?>

                    <?php if ($woocommerce_loop['show_custom_image'] === 'yes') : ?>
                        <?php
                        $image_url = Themebase_Helper::aq_resize(array(
                            'url' => $image_product,
                            'width' => $attachment_size[0],
                            'height' => $attachment_size[1],
                            'crop' => true,
                        ));
                        ?>
                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($product->get_title()); ?>"/>
                    <?php endif; ?>
                <?php else: ?>
                   <img src="<?php echo esc_url($image_product); ?>" alt="<?php echo esc_attr($product->get_title()); ?>"/>
                <?php endif; ?>
            <?php endif; ?>
            <?php themebase_percentage_price_sale(); ?>
        </div>
    <?php endif;
}
function themebase_woocommerce_list_view()
{
    $themebase_product_columns = themebase_get_meta_value('product_column');
    $themebase_product_layout = '';
    $themebase_product_columns = themebase_get_meta_value('product_columns');
    if ($themebase_product_columns) {
        $themebase_product_columns = themebase_get_meta_value('product_columns');
    } else {
        $themebase_product_columns = Themebase::setting('product_column');
    }
    if($themebase_product_columns == '1'){
        $themebase_product_layout = 'list';
    }else{
        $themebase_product_layout = 'grid';
    }
       if ($themebase_product_layout == 'list'){
         $list_change_col = Themebase::setting('product_column'); 
       }
   
    ?>
    <div class="list-view">
        <ul class="list-view-as">
            <?php if ($themebase_product_layout == 'grid'): ?>
                
                <li class="four-2">
                    <a class="active" href="#" id="grid4" data-layout="layout-grid"
                       data-column="<?php echo esc_attr($themebase_product_columns); ?>"><i class="theme-icon-grid"></i>
                    </a>
                </li>
                <li class="list-last">
                    <a class="" href="#" id="list1" data-layout="layout-list"
                       data-column="<?php echo esc_attr($themebase_product_columns); ?>"><i class="theme-icon-list"></i></a>
                </li>
            <?php endif; ?>
            <?php if ($themebase_product_layout == 'list'): ?>
                <li class="four-2">
                    <a class="" href="#" id="grid" data-layout="layout-grid"
                       data-column="<?php echo esc_attr($list_change_col); ?>"><i class="theme-icon-grid"></i>
                    </a>
                </li>
                <li class="list-last">
                    <a class="active" href="#" id="list1" data-layout="layout-list"
                       data-column="<?php echo esc_attr($themebase_product_columns); ?>"><i class="theme-icon-list"></i></a>
                </li>
                
            <?php endif; ?>
        </ul>
    </div>
    <?php
}

function themebase_percentage_price_sale()
{
    global $product, $post, $woocommerce_loop;
    $labels = '';
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
}

function themebase_woocommerce_product_image()
{
    global $product, $woocommerce_loop;
    $class_img = $second_image = $has_second_image = '';
    $attachment_ids = $product->get_gallery_image_ids();
    $themebase_product_columns = themebase_get_meta_value('product_columns');
    $custom_size_product_image = Themebase::setting('custom_size_product_image');
    $product_image_width = Themebase::setting('product_image_width');
    $product_image_height = Themebase::setting('product_image_height');
    if ($themebase_product_columns) {
        $themebase_product_columns = themebase_get_meta_value('product_columns');
    } else {
        $themebase_product_columns = Themebase::setting('product_column');
    }
    if (is_array( $attachment_ids ) && !empty($attachment_ids) ){
        $class_img = 'img-first';
        $has_second_image ='has-second-image';
    }
    ?>
    <div class="image-product <?php echo esc_attr($has_second_image); ?>">
    <?php if (isset($woocommerce_loop['product_type']) && $woocommerce_loop['show_custom_image'] === 'yes'): ?>
        <?php
        if ($woocommerce_loop['show_custom_image'] === 'yes') {
            $has_custom_size = false;
            $attachment_size[1] = '';
            if (!empty($woocommerce_loop['custom_dimension']['width'])) {
                $has_custom_size = true;
                $attachment_size[0] = $woocommerce_loop['custom_dimension']['width'];
            }

            if (!empty($woocommerce_loop['custom_dimension']['height'])) {
                $has_custom_size = true;
                $attachment_size[1] = $woocommerce_loop['custom_dimension']['height'];
            }
        }
        ?>

        <?php if (is_array( $attachment_ids ) && !empty($attachment_ids) ): ?>
            <?php if ($woocommerce_loop['show_custom_image'] === 'yes') : ?>
                <?php
                $full_image_size = wp_get_attachment_url( $attachment_ids[0] );
                $last_image_url = Themebase_Helper::aq_resize(array(
                    'url' => $full_image_size,
                    'width' => $attachment_size[0],
                    'height' => $attachment_size[1],
                    'crop' => true,
                ));
                ?>
                <a class="img-last" href="<?php echo esc_url(get_permalink($product->get_id())); ?>"
                   title="<?php echo esc_attr($product->get_title()); ?>">
                    <img class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                         src="<?php echo esc_url($last_image_url); ?>" alt="<?php echo esc_attr($product->get_title()); ?>"
                         srcset="<?php echo esc_url($last_image_url); ?>" width=<?php echo $attachment_size[0]; ?> height=<?php echo $attachment_size[1]; ?> />
                </a>
            <?php endif; ?>
        <?php endif; ?>
        <?php if ($woocommerce_loop['show_custom_image'] === 'yes') : ?>
            <?php
            $full_image_size = get_the_post_thumbnail_url(null, 'full');
            $image_url = Themebase_Helper::aq_resize(array(
                'url' => $full_image_size,
                'width' => $attachment_size[0],
                'height' => $attachment_size[1],
                'crop' => true,
            ));
            ?>
            <a class="<?php echo esc_attr($class_img); ?>" href="<?php echo esc_url(get_permalink($product->get_id())); ?>"
               title="<?php echo esc_attr($product->get_title()); ?>">
                <img class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                     src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($product->get_title()); ?>"
                     srcset="<?php echo esc_url($image_url); ?>" 
                     width=<?php echo $attachment_size[0]; ?> height=<?php echo $attachment_size[1]; ?> />
            </a>
        <?php endif; ?>

    <?php else: ?>
        <?php 
        if (count($attachment_ids) && isset($attachment_ids[0])) {
            $second_image = wp_get_attachment_image($attachment_ids[0], 'woocommerce_thumbnail');
        }
        if ($second_image != ''): ?>
			<?php if(Themebase::setting('custom_size_product_image') && (isset($product_image_width)) && (isset($product_image_height)) && ($product_image_width !== '') && ($product_image_height !== '')): ?>
				<?php $second_image = wp_get_attachment_image_src($attachment_ids[0], 'full'); ?>
				<a class="img-last" href="<?php echo esc_url(get_permalink($product->get_id())); ?>"
				   title="<?php echo esc_attr($product->get_title()); ?>">
					<?php 
					$image_url = Themebase_Helper::aq_resize(array(
						'url' => $second_image[0],
						'width' => $product_image_width,
						'height' => $product_image_height,
						'crop' => true,
					));?>
					<img class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
						 src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($product->get_title()); ?>"
						 srcset="<?php echo esc_url($image_url); ?>" width="<?php echo $product_image_width; ?>" height="<?php echo $product_image_height; ?>" />
				</a>
			<?php else: ?>
				<a class="img-last" href="<?php echo esc_url(get_permalink($product->get_id())); ?>"
				   title="<?php echo esc_attr($product->get_title()); ?>">
					<?php echo wp_kses($second_image, array(
						'img' => array(
							'width' => array(),
							'height' => array(),
							'src' => array(),
							'class' => array(),
							'alt' => array(),
							'id' => array(),
						)
					)); ?>
				</a>
			<?php endif; ?>
        <?php endif; ?>
        <?php if ((Themebase::setting('custom_size_product_image')) && (isset($product_image_width)) && (isset($product_image_height)) && ($product_image_width !== '') && ($product_image_height !== '')) : ?>
            <?php
                $full_image_size = get_the_post_thumbnail_url(null, 'full');
                $image_url = Themebase_Helper::aq_resize(array(
                    'url' => $full_image_size,
                    'width' => $product_image_width,
                    'height' => $product_image_height,
                    'crop' => true,
                ));
            ?>
            <a  class="<?php echo esc_attr($class_img); ?>"  href="<?php echo esc_url(get_permalink($product->get_id())); ?>"
                   title="<?php echo esc_attr($product->get_title()); ?>">
                <img class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                     src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($product->get_title()); ?>"
                     srcset="<?php echo esc_url($image_url); ?>" width="<?php echo $product_image_width; ?>" height="<?php echo $product_image_height; ?>" />
            </a>

        <?php else: ?>
            <a class="<?php echo esc_attr($class_img); ?>" href="<?php echo esc_url(get_permalink($product->get_id())); ?>"
               title="<?php echo esc_attr($product->get_title()); ?>">
                <?php echo woocommerce_get_product_thumbnail(); ?>
            </a>
        <?php endif; ?>
    <?php endif; ?>
   </div>
   <?php 
}

//Single Product
add_action('themebase_get_product_image', 'themebase_get_product_image');

function themebase_get_product_image()
{
    global $post, $product;
    $thumbnail_size = apply_filters('woocommerce_product_thumbnails_large_size', 'full');
    $post_thumbnail_id = get_post_thumbnail_id($post->ID);
    $full_size_image = wp_get_attachment_image_src($post_thumbnail_id, $thumbnail_size);
    $single_type = Themebase_Templates::get_product_single_style();
    ?>
    <figure class="woocommerce-product-gallery__wrapper product-gallery-custom">
        <?php
        $attachment_ids = $product->get_gallery_image_ids();
        if (has_post_thumbnail()) {
            $attributes = array(
                'title' => get_post_field('post_title', $post_thumbnail_id),
                'data-caption' => get_post_field('post_excerpt', $post_thumbnail_id),
                'data-src' => $full_size_image[0],
                'data-large_image' => $full_size_image[0],
                'data-large_image_width' => $full_size_image[1],
                'data-large_image_height' => $full_size_image[2]
            );

            if (has_post_thumbnail()) {
                $html = '<div data-thumb="' . get_the_post_thumbnail_url($post->ID, 'woocommerce_single') . '" class="woocommerce-product-gallery__image"><a href="' . esc_url($full_size_image[0]) . '">';
                $html .= get_the_post_thumbnail($post->ID, 'woocommerce_single', $attributes);
                $html .= '</a></div>';
            } else {
                $html = '<div class="woocommerce-product-gallery__image--placeholder">';
                $html .= sprintf('<img src="%s" alt="%s" class="wp-post-image" />', esc_url(wc_placeholder_img_src()), esc_html__('Awaiting product image', 'themebase'));
                $html .= '</div>';
            }

            echo apply_filters('woocommerce_single_product_image_thumbnail_html', $html, get_post_thumbnail_id($post->ID));
        }
        if ($attachment_ids && has_post_thumbnail()) { ?>
            <?php foreach ($attachment_ids as $attachment_id) {
                $full_size_image = wp_get_attachment_image_src($attachment_id, 'full');
                $thumbnail = wp_get_attachment_image_src($attachment_id, 'woocommerce_single');
                $attributes = array(
                    'title' => get_post_field('post_title', $attachment_id),
                    'data-caption' => get_post_field('post_excerpt', $attachment_id),
                    'data-src' => $full_size_image[0],
                    'data-large_image' => $full_size_image[0],
                    'data-large_image_width' => $full_size_image[1],
                    'data-large_image_height' => $full_size_image[2],
                );
                $html = '<div data-thumb="' . esc_url($full_size_image[0]) . '" class="woocommerce-product-gallery__image"><a href="' . esc_url($full_size_image[0]) . '">';
                $html .= wp_get_attachment_image($attachment_id, 'woocommerce_single', false, $attributes);
                $html .= '</a></div>';
                echo apply_filters('woocommerce_single_product_image_thumbnail_html', $html, $attachment_id);
            } ?>
            <?php
        }
        ?>
    </figure>
    <?php
}

function themebase_single_gallery_nav()
{
    global $product;
    $gallery_ids = $product->get_gallery_image_ids();

    $single_type = Themebase_Templates::get_product_single_style();
    ?>
    <?php if ($single_type == 'single_1' && $gallery_ids && has_post_thumbnail()): ?>
    <div class="product-list-thumbnails">
        <?php
        echo '<img class="no-lazyload" src="' . esc_url(themebase_resizeImage('152', '205')) . '" alt = "' . get_the_title(get_post_thumbnail_id()) . '">';
        foreach ($gallery_ids as $key => $value) {
            $full_image_size = wp_get_attachment_url($value, 'full');
            $image_url_2 = Themebase_Helper::aq_resize(array(
                'url' => $full_image_size,
                'width' => 152,
                'height' => 205,
                'crop' => true,
            ));
            echo '<img class="no-lazyload" src="' . esc_url($image_url_2) . '" alt ="' . get_the_title($value) . '">';
        }
        ?>
    </div>
<?php endif; ?>
    <?php
}

function themebase_compare_product()
{
    global $product, $woocommerce_loop;
    $compare = (get_option('yith_woocompare_compare_button_in_products_list') == 'yes');
    ?>
    <?php
    if ((isset($woocommerce_loop['show_compare']) && $woocommerce_loop['show_compare'] === 'yes') && $compare) {
        printf('<div class="action-item compare-product"><a data-toggle="tooltip" data-placement="top" href="%s" class="%s" data-product_id="%d"><i class="theme-icon-shuffle"></i></a><span class="tooltip-custom">' . esc_html__("Compare", "themebase") . '</span></div>', themebase_add_compare_action($product->get_id()), 'add_to_compare compare button', $product->get_id(), esc_html__('Compare', 'themebase'));
    } elseif (is_shop() || ((is_tax('product_tag')|| is_tax('product_cat') || is_product() || is_tax('yith_product_brand') || is_cart()) && class_exists('WooCommerce'))){
        if ($compare && Themebase::setting('product_compare')) {
            printf('<div class="action-item compare-product"><a data-toggle="tooltip" data-placement="top" href="%s" class="%s" data-product_id="%d"><i class="theme-icon-shuffle"></i></a><span class="tooltip-custom">' . esc_html__("Compare", "themebase") . '</span></div>', themebase_add_compare_action($product->get_id()), 'add_to_compare compare button', $product->get_id(), esc_html__('Compare', 'themebase'));
        }
    }
    ?>
    <?php
}

function themebase_add_compare_action($product_id)
{
    $action = 'yith-woocompare-add-product';
    $url_args = array('action' => $action, 'id' => $product_id);
    return wp_nonce_url(add_query_arg($url_args), $action);
}

function themebase_quickview()
{
    global $product, $woocommerce_loop, $woocommerce;
    ?>
    <?php


    if ((isset($woocommerce_loop['show_quickview']) && $woocommerce_loop['show_quickview'] === 'yes') && class_exists('YITH_WCQV')) {
        printf('<div data-toggle="tooltip" data-placement="top" data-original-title="' . esc_attr__('Quick View', 'themebase') . '" class="action-item quick-view"><a class="button yith-wcqv-button" href="#" data-product_id="%d" ><i class="theme-icon-search-1"></i></a><span class="tooltip-custom">' . esc_html__("Quick View", "themebase") . '</span></div>', $product->get_id(), esc_html__('Quick View', 'themebase'), esc_html__('Quick View', 'themebase'));
    }elseif (is_shop() || ((is_tax('product_tag')|| is_tax('product_cat') || is_product() || is_tax('yith_product_brand') || is_cart()) && class_exists('WooCommerce'))){
        if (class_exists('YITH_WCQV') && Themebase::setting('product_quickview') ) {
            printf('<div data-toggle="tooltip" data-placement="top" data-original-title="' . esc_attr__('Quick View', 'themebase') . '" class="action-item quick-view"><a class="button yith-wcqv-button" href="#" data-product_id="%d" ><i class="theme-icon-search-1"></i></a><span class="tooltip-custom">' . esc_html__("Quick View", "themebase") . '</span></div>', $product->get_id(), esc_html__('Quick View', 'themebase'), esc_html__('Quick View', 'themebase'));

        }
    }
    ?>
    <?php
}

function themebase_wishlist_custom()
{
    global $woocommerce_loop;
    ?>
    <?php if ((isset($woocommerce_loop['show_wishlist']) && $woocommerce_loop['show_wishlist'] === 'yes') && class_exists('YITH_WCWL')) : ?>
    <div class="action-item wishlist-btn">
        <span class="tooltip-custom"><?php echo esc_html__("Wishlist", "themebase"); ?></span>
        <?php
        echo do_shortcode('[yith_wcwl_add_to_wishlist]');
        ?>
    </div>
<?php elseif (is_shop() || ((is_tax('product_tag')|| is_tax('product_cat') || is_product() || is_tax('yith_product_brand') || is_cart()) && class_exists('WooCommerce'))) : ?>
    <?php if (class_exists('YITH_WCWL') && Themebase::setting('product_wishlist')) : ?>
        <div class="action-item wishlist-btn">
            <span class="tooltip-custom"><?php echo esc_html__("Wishlist", "themebase"); ?></span>
            <?php
            echo do_shortcode('[yith_wcwl_add_to_wishlist]');
            ?>
        </div>
    <?php endif; ?>
<?php endif; ?>
    <?php
}

function themebase_video_product()
{
    global $product;
    $video_product = get_post_meta(get_the_ID(), 'video_product', true);
    ?>
    <?php if ($video_product): ?>
    <div class="video-product">
        <a data-fancybox href="<?php echo esc_url($video_product); ?>"><i class="fas fa-play"></i></a>
    </div>
<?php endif; ?>
    <?php
}

function themebase_size_guide_link()
{
    global $product;
    $size_guide_link = get_post_meta(get_the_ID(), 'size_guide_link', true);
    ?>
    <?php if ($size_guide_link): ?>
    <div class="size-guide-product">
        <a target="_blank" href="<?php echo esc_url($size_guide_link); ?>"><?php echo esc_html__('Size Guide', 'themebase') ?></a>
    </div>
<?php endif; ?>
    <?php
}


function themebase_description_cat_product($category)
{
    $cat_id = $category->term_id;
    $prod_term = get_term($cat_id, 'product_cat');
    $description = $prod_term->description;

    echo '<p>' . $description . '</p>';
}

if (!function_exists('themebase_woocommerce_show_subcategories')) {

    /**
     * Output the start of a product loop. By default this is a UL.
     *
     * @param bool $echo Should echo?.
     * @return string
     */
    function themebase_woocommerce_show_subcategories($echo = true)
    {
        ob_start();
        if ($echo) {
            echo apply_filters('themebase_woocommerce_show_subcategories', ob_get_clean());
        } else {
            return apply_filters('themebase_woocommerce_show_subcategories', ob_get_clean());
        }
    }
}
function themebase_woocommerce_header_add_to_cart_fragment_number($fragments)
{
    ob_start();

	?>
		<span class="count"><?php echo WC()->cart->cart_contents_count; ?></span>
	<?php
	$fragments['.shopping-cart-button .count'] = ob_get_clean();
	return $fragments;
}
function themebase_woocommerce_header_add_to_cart_fragment($fragments)
{
    $_cartQty = WC()->cart->cart_contents_count;
    $_cartTotal = WC()->cart->get_cart_total();
    $fragments['.cart-title .count-product-cart'] = '<span class="count-product-cart">' . $_cartQty . '</span>';
    $fragments['.shopping_cart .woocommerce-mini-cart__total .woocommerce-Price-amount'] = '' . $_cartTotal . '';
    $fragments['.wp-amount .cart-amount'] = '<div class="cart-amount">' . $_cartTotal . '</div>';
    return $fragments;
}

function themebase_woocommerce_single_excerpt()
{
    global $post;
    ?>
    <div class="desc">
        <?php if(isset($post->post_excerpt) &&  $post->post_excerpt):?>
            <?php echo apply_filters('woocommerce_short_description', $post->post_excerpt) ?>
        <?php else:?>
            <?php 
             $tit = get_the_content('', '', FALSE);
                echo substr($tit, 0, 290);
            ?>
        <?php endif;?>
    </div>
    <?php
}

function themebase_woocommerce_short_description($post_excerpt)
{
    $content = str_replace(']]>', ']]&gt;', $post_excerpt);
    return $content;
}

function themebase_stock_text_shop_page()
{
    global $product;
    $avail = esc_html__('Availability: ', 'themebase');
    $availability = $product->get_availability();
    $themebase_product_meta_enable = Themebase::setting('single_product_meta_enable');
    $themebase_product_meta_multi = Themebase::setting('product_meta_multi');
    if (isset($themebase_product_meta_multi) && in_array('availability', $themebase_product_meta_multi) && $themebase_product_meta_enable) {
        if ($product->is_in_stock()) {
            echo '<div class="availability"><strong>' . $avail . '</strong><span class="stock">' . $product->get_stock_quantity() . esc_html__(' In Stock', 'themebase') . '</span></div>';
        } else {
            echo '<div class="availability"><strong>' . $avail . '</strong><span class="stock">' . esc_html__(' Out Stock', 'themebase') . '</span></div>';
        }
    }

}
function themebase_product_sharing()
{
    if ( Themebase::setting( 'single_product_sharing_enable' ) === '1' ) : 
        Themebase_Templates::product_sharing(); 
    endif; 

}
function themebase_overide_product_tabs($tabs)
{
    global $product, $post;
    $tab_review = Themebase::setting('single_product_review');
    $tab_desc = Themebase::setting('single_product_desc');
    $rename_info = Themebase::setting('single_product_rename_info');
    $rename_desc = Themebase::setting('single_product_rename_desc');

    if (isset($tab_desc) && $tab_desc && !empty(get_the_content())) {
        unset($tabs['description']);
    } else {
        if (isset($rename_desc) && $rename_desc != '' && $post->post_content) {
            $tabs['description']['title'] = $rename_desc;
        }
    }

    if (isset($tab_review) && $tab_review) {
        unset($tabs['reviews']);
    }

    if ($product && ($product->has_attributes() || apply_filters('wc_product_enable_dimensions_display', $product->has_weight() || $product->has_dimensions()))) {
        if (isset($rename_info) && $rename_info != '') {
            $tabs['additional_information']['title'] = $rename_info;
        }
    }

    return $tabs;
}

/**
 * Change number of related products output
 */
function themebase_woo_related_products_limit()
{
    global $product;

    $args['posts_per_page'] = 6;
    return $args;
}

function themebase_related_products_args($args)
{
    $related_limit = Themebase::setting('related_limit');
    $args['posts_per_page'] = $related_limit; // 4 related products
    return $args;
}

/**
 * Change number of upsells output
 */

function themebase_wc_change_number_related_products($args)
{
    $upsell_limit = Themebase::setting('upsell_limit');
    $args['posts_per_page'] = $upsell_limit; // Change this number
    $args['columns'] = $upsell_limit; // This is the number shown per row.
    return $args;
}

if (!function_exists('themebase_woocommerce_support')) {
    add_action('after_setup_theme', 'themebase_woocommerce_support');
    function themebase_woocommerce_support()
    {
        add_theme_support('woocommerce');
        add_theme_support('wc-product-gallery-lightbox');
    }
}
add_filter('woocommerce_default_address_fields', 'themebase_custom_override_default_address_field');
function themebase_custom_override_default_address_field($address_field)
{
    $array_placeholder = 'House number and street name *';
    $address_field['address_1']['placeholder'] = $array_placeholder;

    return $address_field;
}

if (!function_exists('themebase_woocommerce_widget_shopping_cart_proceed_to_checkout')) {

    /**
     * Output the proceed to checkout button.
     */
    function themebase_woocommerce_widget_shopping_cart_proceed_to_checkout()
    {
        echo '<a href="' . esc_url(wc_get_checkout_url()) . '" class="button checkout wc-forward">' . esc_html__('Checkout', 'themebase') . '</a>';
    }
}
