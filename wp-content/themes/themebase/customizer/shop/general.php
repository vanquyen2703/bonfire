<?php
$section  = 'general_shop';
$priority = 1;
$prefix   = 'general_shop_';
Themebase_Kirki::add_field( 'theme', array(
	'type'        => 'number',
	'settings'    => 'number_cate',
	'label'       => esc_html__( '[Desktop] Number of categories to show', 'themebase' ),
	'description' => esc_html__( 'This option will work if you select to display categories in shop archive page.', 'themebase' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '4',
) );
/*--------------------------------------------------------------
# Product Button
--------------------------------------------------------------*/
Themebase_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Product Button', 'themebase' ) . '</div>',
) );
Themebase_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'add_to_cart',
	'label'       => esc_html__( 'Show Add to Cart button', 'themebase' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'themebase' ),
		'1' => esc_html__( 'On', 'themebase' ),
	),
) );
Themebase_Kirki::add_field('theme', array(
    'type' => 'text',
    'settings' => 'unicode_add_to_cart',
    'label' => esc_html__('Enter Icon Unicode Button Add to Cart', 'themebase'),
    'section' => $section,
    'priority' => $priority++,
    'default' => '',
));
Themebase_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'product_price',
	'label'       => esc_html__( 'Show Product Price', 'themebase' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'themebase' ),
		'1' => esc_html__( 'On', 'themebase' ),
	),
) );
Themebase_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'product_categories',
	'label'       => esc_html__( 'Show Product Categories', 'themebase' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'themebase' ),
		'1' => esc_html__( 'On', 'themebase' ),
	),
) );
Themebase_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'product_quickview',
	'label'       => esc_html__( 'Show Quickview', 'themebase' ),
	'description' => esc_html__( 'This option will work if you install and active YITH Quickview plugin.', 'themebase' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '0',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'themebase' ),
		'1' => esc_html__( 'On', 'themebase' ),
	),
) );
Themebase_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'product_compare',
	'label'       => esc_html__( 'Show Compare', 'themebase' ),
	'description' => esc_html__( 'This option will work if you install and active YITH Compare plugin.', 'themebase' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '0',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'themebase' ),
		'1' => esc_html__( 'On', 'themebase' ),
	),
) );
Themebase_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'product_wishlist',
	'label'       => esc_html__( 'Show Wishlist', 'themebase' ),
	'description' => esc_html__( 'This option will work if you install and active YITH Wishlist plugin.', 'themebase' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '0',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'themebase' ),
		'1' => esc_html__( 'On', 'themebase' ),
	),
) );
/*--------------------------------------------------------------
# Product Lable
--------------------------------------------------------------*/
Themebase_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Product Infomation', 'themebase' ) . '</div>',
) );
Themebase_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'show_category_mobile',
	'label'       => esc_html__( 'Show Category on Mobile', 'themebase' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'none',
	'choices'     => array(
		'none' => esc_html__( 'Off', 'themebase' ),
		'block' => esc_html__( 'On', 'themebase' ),
	),
	'output'    => array(
        array(
            'element'  => array(
                '.category-product',
            ),
            'media_query' => '@media (max-width: 767px)',
            'property' => 'display',
        ),
    ),
) );
Themebase_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'show_rating_mobile',
	'label'       => esc_html__( 'Show Rating on Mobile', 'themebase' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'none',
	'choices'     => array(
		'none' => esc_html__( 'Off', 'themebase' ),
		'block' => esc_html__( 'On', 'themebase' ),
	),
	'output'    => array(
        array(
            'element'  => array(
                '.rating-product',
            ),
            'media_query' => '@media (max-width: 767px)',
            'property' => 'display',
        ),
    ),
) );
Themebase_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'show_attribute_mobile',
	'label'       => esc_html__( 'Show Attribute on Mobile', 'themebase' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'none',
	'choices'     => array(
		'none' => esc_html__( 'Off', 'themebase' ),
		'block' => esc_html__( 'On', 'themebase' ),
	),
	'output'    => array(
        array(
            'element'  => array(
                '.show-attribute',
            ),
            'media_query' => '@media (max-width: 767px)',
            'property' => 'display',
        ),
    ),
) );
/*--------------------------------------------------------------
# Product Lable
--------------------------------------------------------------*/
Themebase_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Product Label', 'themebase' ) . '</div>',
) );
Themebase_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'hot_lable',
	'label'       => esc_html__( 'Show "Hot" Label', 'themebase' ),
	'description' => esc_html__( 'Will be show in the featured product.', 'themebase' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'themebase' ),
		'1' => esc_html__( 'On', 'themebase' ),
	),
) );
Themebase_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'new_lable',
	'label'       => esc_html__( 'Show "New" Label', 'themebase' ),
	'description' => esc_html__( 'Will be show in the recent product.', 'themebase' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'themebase' ),
		'1' => esc_html__( 'On', 'themebase' ),
	),
) );
Themebase_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'sale_lable',
	'label'       => esc_html__( 'Show "Sale" Label', 'themebase' ),
	'description' => esc_html__( 'Will be show in the sale product.', 'themebase' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'themebase' ),
		'1' => esc_html__( 'On', 'themebase' ),
	),
) );
Themebase_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'percentage_lable',
	'label'       => esc_html__( 'Show Sale Price Percentage', 'themebase' ),
	'description' => esc_html__( 'Will be show in the special product.', 'themebase' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '0',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'themebase' ),
		'1' => esc_html__( 'On', 'themebase' ),
	),
	'required'  => array(
        array(
            'setting'  => 'sale_lable',
            'operator' => 'contains',
            'value'    => '1',
        ),
    ), 
) );
Themebase_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'shop_archive_new_days',
	'label'       => esc_html__( 'New Badge (Days)', 'themebase' ),
	'description' => esc_html__( 'If the product was published within the newness time frame display the new badge.', 'themebase' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '7',
	'choices'     => array(
		'0'  => esc_html__( 'None', 'themebase' ),
		'1'  => esc_html__( '1 day', 'themebase' ),
		'2'  => esc_html__( '2 days', 'themebase' ),
		'3'  => esc_html__( '3 days', 'themebase' ),
		'4'  => esc_html__( '4 days', 'themebase' ),
		'5'  => esc_html__( '5 days', 'themebase' ),
		'6'  => esc_html__( '6 days', 'themebase' ),
		'7'  => esc_html__( '7 days', 'themebase' ),
		'8'  => esc_html__( '8 days', 'themebase' ),
		'9'  => esc_html__( '9 days', 'themebase' ),
		'10' => esc_html__( '10 days', 'themebase' ),
		'15' => esc_html__( '15 days', 'themebase' ),
		'20' => esc_html__( '20 days', 'themebase' ),
		'25' => esc_html__( '25 days', 'themebase' ),
		'30' => esc_html__( '30 days', 'themebase' ),
		'60' => esc_html__( '60 days', 'themebase' ),
		'90' => esc_html__( '90 days', 'themebase' ),
	),
) );