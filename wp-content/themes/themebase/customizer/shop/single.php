<?php
$section = 'shop_single';
$priority = 1;
$prefix = 'single_product_';
$registered_sidebars = Themebase_Helper::get_registered_sidebars();
$block_name = themebase_get_save_template();
Themebase_Kirki::add_field('theme', array(
    'type' => 'radio-buttonset',
    'settings' => 'single_layout',
    'label' => esc_html__('Single Layout', 'themebase'),
    'section' => $section,
    'priority' => $priority++,
    'default' => 'full_width',
    'choices' => array(
        'wide' => esc_html__('Wide', 'themebase'),
        'full_width' => esc_html__('Full Width', 'themebase'),
		'boxed'   => esc_html__( 'Boxed', 'themebase' )
    ),
));
Themebase_Kirki::add_field('theme', array(
    'type' => 'select',
    'settings' => 'single_sidebar_left',
    'label' => esc_html__('Sidebar Left', 'themebase'),
    'description' => esc_html__('Select sidebar left.', 'themebase'),
    'section' => $section,
    'priority' => $priority++,
    'default' => '',
    'choices' => $registered_sidebars,
));
Themebase_Kirki::add_field('theme', array(
    'type' => 'select',
    'settings' => 'single_sidebar_right',
    'label' => esc_html__('Sidebar Right', 'themebase'),
    'description' => esc_html__('Select sidebar right.', 'themebase'),
    'section' => $section,
    'priority' => $priority++,
    'default' => '',
    'choices' => $registered_sidebars,
));
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'single_style',
    'label'       => esc_html__( 'Single Type', 'themebase' ),
    'description' => esc_html__( 'Select single type', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 'single_1',
    'choices'     => array(
        'single_default' => esc_html__( 'Single Default', 'themebase' ),
        'single_1' => esc_html__( 'Single 1', 'themebase' ),
        'single_2' => esc_html__( 'Single 2', 'themebase' ),
    ),
) );
Themebase_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'single_zoom_image',
	'label'       => esc_html__( 'Show/Hide Zoom Image', 'themebase' ),
	'description' => esc_html__( 'Turn on to display zoom main image.', 'themebase' ),
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
    'settings'    => 'product_thumbnails_style',
    'label'       => esc_html__( 'Product Thumbnails Style', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 'vertical',
    'choices'     => array(
        'horizontal' => esc_html__( 'Horizontal', 'themebase' ),
        'vertical' => esc_html__( 'Vertical', 'themebase' ),
    ),
    'required' => array(
        array(
            'setting' => 'single_style',
            'operator' => '==',
            'value' => 'single_1',
        ),
    ),
) );
Themebase_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'single_ajax_cart',
	'label'       => esc_html__( 'Show/Hide Ajax Add To Cart', 'themebase' ),
	'description' => esc_html__( 'Turn on to display ajax add to cart.', 'themebase' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '0',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'themebase' ),
		'1' => esc_html__( 'On', 'themebase' ),
	),
) );

Themebase_Kirki::add_field('theme', array(
    'type' => 'text',
    'settings' => 'single_product_prev',
    'label' => esc_html__('Enter Icon Class Button Prev', 'themebase'),
    'section' => $section,
    'priority' => $priority++,
    'default' => 'theme-icon-back',
));

Themebase_Kirki::add_field('theme', array(
    'type' => 'text',
    'settings' => 'single_product_next',
    'label' => esc_html__('Enter Icon Class Button Next', 'themebase'),
    'section' => $section,
    'priority' => $priority++,
    'default' => 'theme-icon-next',
));
Themebase_Kirki::add_field('theme', array(
    'type' => 'radio-buttonset',
    'settings' => 'single_product_meta_enable',
    'label' => esc_html__('Show/Hide Product Meta', 'themebase'),
    'description' => esc_html__('Turn on to display the product meta.', 'themebase'),
    'section' => $section,
    'priority' => $priority++,
    'default' => '1',
    'choices' => array(
        '0' => esc_html__('Off', 'themebase'),
        '1' => esc_html__('On', 'themebase'),
    ),
));
Themebase_Kirki::add_field('theme', array(
    'type' => 'multicheck',
    'settings' => 'product_meta_multi',
    'label' => esc_html__('Product Meta', 'themebase'),
    'section' => $section,
    'priority' => $priority++,
    'default' => array('categories', 'description', 'availability'),
    'choices' => array(
        'availability' => esc_html__('Availability', 'themebase'),
        'sku' => esc_html__('SKU', 'themebase'),
        'categories' => esc_html__('Categories', 'themebase'),
        'tags' => esc_html__('Tags', 'themebase'),
        'brands' => esc_html__('Brands', 'themebase'),
        'description' => esc_html__('Quick Description', 'themebase')
    ),
    'required' => array(
        array(
            'setting' => 'single_product_meta_enable',
            'operator' => '==',
            'value' => 1,
        ),
    ),
));
Themebase_Kirki::add_field('theme', array(
    'type' => 'radio-buttonset',
    'settings' => 'single_product_tab',
    'label' => esc_html__('Tab Width', 'themebase'),
    'section' => $section,
    'priority' => $priority++,
    'default' => '1',
    'choices' => array(
        'default' => esc_html__('Default', 'themebase'),
        'full_width' => esc_html__('Full width', 'themebase'),
    ),
));
Themebase_Kirki::add_field('theme', array(
    'type' => 'radio-buttonset',
    'settings' => 'single_product_delivery',
    'label' => esc_html__('Show Shipping Policy', 'themebase'),
    'description' => esc_html__('Turn on to display the delivery.', 'themebase'),
    'section' => $section,
    'priority' => $priority++,
    'default' => '1',
    'choices' => array(
        '0' => esc_html__('Off', 'themebase'),
        '1' => esc_html__('On', 'themebase'),
    ),
));
Themebase_Kirki::add_field('theme', array(
    'type' => 'text',
    'settings' => 'single_product_title_shipping_policy',
    'label' => esc_html__('Shipping Policy Title', 'themebase'),
    'section' => $section,
    'priority' => $priority++,
    'default' => esc_html__('Free Delivery and Returns', 'themebase'),
));

Themebase_Kirki::add_field('theme', array(
    'type' => 'select',
    'settings' => 'single_delivery_content',
    'label' => esc_html__('Delivery Content', 'themebase'),
    'description' => esc_html__('You can create templates in Templates -> Add New', 'themebase'),
    'section' => $section,
    'priority' => $priority++,
    'default' => '',
    'choices' => $block_name,
    'required' => array(
        array(
            'setting' => 'single_product_delivery',
            'operator' => '==',
            'value' => 1,
        ),
    ),
));
Themebase_Kirki::add_field('theme', array(
    'type' => 'radio-buttonset',
    'settings' => 'single_product_sharing_enable',
    'label' => esc_html__('Product sharing', 'themebase'),
    'description' => esc_html__('Turn on to display the product sharing.', 'themebase'),
    'section' => $section,
    'priority' => $priority++,
    'default' => '0',
    'choices' => array(
        '0' => esc_html__('Off', 'themebase'),
        '1' => esc_html__('On', 'themebase'),
    ),
));
Themebase_Kirki::add_field('theme', array(
    'type' => 'number',
    'settings' => 'per_limit',
    'label' => esc_html__('Product Number', 'themebase'),
    'description' => esc_html__('Displayed Related, Upsell, Cross-sell Products.', 'themebase'),
    'section' => $section,
    'priority' => $priority++,
    'default' => '3',
));

Themebase_Kirki::add_field('theme', array(
    'type' => 'radio-buttonset',
    'settings' => 'single_product_related_enable',
    'label' => esc_html__('Related products', 'themebase'),
    'description' => esc_html__('Turn on to display the related products section.', 'themebase'),
    'section' => $section,
    'priority' => $priority++,
    'default' => '0',
    'choices' => array(
        '1' => esc_html__('Off', 'themebase'),
        '0' => esc_html__('On', 'themebase'),
    ),
));
Themebase_Kirki::add_field('theme', array(
    'type' => 'radio-buttonset',
    'settings' => 'single_product_other_product_position',
    'label' => esc_html__('Position Related, Upsell, Cross-sell Products', 'themebase'),
    'section' => $section,
    'priority' => $priority++,
    'default' => 'out',
    'choices' => array(
        'in' => esc_html__('In', 'themebase'),
        'out' => esc_html__('Out', 'themebase'),
    ),
));
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'select',
    'settings'    => 'other_product_layout',
    'label'       => esc_html__( 'Related, Upsell Product Layout ', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 'default',
    'choices'     => array(
        'default' => esc_html__( 'Default', 'themebase' ),
        '1' => esc_html__( 'Style 1', 'themebase' ),
        '2' => esc_html__( 'Style 2', 'themebase' ),
        '3' => esc_html__( 'Style 3', 'themebase' ),
        '4' => esc_html__( 'Style 4', 'themebase' ),
        '5' => esc_html__( 'Style 5', 'themebase' ),
        '6' => esc_html__( 'Style 6', 'themebase' ),
        '7' => esc_html__( 'Style 7', 'themebase' ),
    ),
) );
Themebase_Kirki::add_field('theme', array(
    'type' => 'number',
    'settings' => 'related_limit',
    'label' => esc_html__('Related Products Limit', 'themebase'),
    'section' => $section,
    'priority' => $priority++,
    'default' => '4',
    'required' => array(
        array(
            'setting' => 'single_product_related_enable',
            'operator' => '==',
            'value' => 0,
        ),
    ),
));

Themebase_Kirki::add_field('theme', array(
    'type' => 'radio-buttonset',
    'settings' => 'single_product_up_sells_enable',
    'label' => esc_html__('Up-sells products', 'themebase'),
    'description' => esc_html__('Turn on to display the up-sells products section.', 'themebase'),
    'section' => $section,
    'priority' => $priority++,
    'default' => '0',
    'choices' => array(
        '1' => esc_html__('Off', 'themebase'),
        '0' => esc_html__('On', 'themebase'),
    ),
));

Themebase_Kirki::add_field('theme', array(
    'type' => 'number',
    'settings' => 'upsell_limit',
    'label' => esc_html__('Up-sells Products Limit', 'themebase'),
    'section' => $section,
    'priority' => $priority++,
    'default' => '4',
    'required' => array(
        array(
            'setting' => 'single_product_up_sells_enable',
            'operator' => '==',
            'value' => 0,
        ),
    ),
));

Themebase_Kirki::add_field('theme', array(
    'type' => 'text',
    'settings' => 'related_title',
    'label' => esc_html__('Title Related Products', 'themebase'),
    'section' => $section,
    'priority' => $priority++,
    'required' => array(
        array(
            'setting' => 'single_product_related_enable',
            'operator' => '==',
            'value' => 0,
        ),
    ),
    'default' => wp_kses(__('Related Products', 'themebase'),
        array(
            'a' => array(
                'href' => array(),
                'title' => array(),
                'target' => array(),
            ),
            'p' => array('class' => array()),
            'br' => array(),
            'i' => array(
                'class' => array(),
                'aria-hidden' => array(),
            ),
        )),

));
Themebase_Kirki::add_field('theme', array(
    'type' => 'text',
    'settings' => 'upsel_title',
    'label' => esc_html__('Title Upsell Products', 'themebase'),
    'section' => $section,
    'priority' => $priority++,
    'required' => array(
        array(
            'setting' => 'single_product_up_sells_enable',
            'operator' => '==',
            'value' => 0,
        ),
    ),
    'default' => wp_kses(__('Upsell Products', 'themebase'),
        array(
            'a' => array(
                'href' => array(),
                'title' => array(),
                'target' => array(),
            ),
            'p' => array('class' => array()),
            'br' => array(),
            'i' => array(
                'class' => array(),
                'aria-hidden' => array(),
            ),
        )),

));

Themebase_Kirki::add_field('theme', array(
    'type' => 'custom',
    'settings' => $prefix . 'single_product_' . $priority++,
    'section' => $section,
    'priority' => $priority++,
    'default' => '<div class="big_title">' . esc_html__('Product Tab', 'themebase') . '</div>',
));

Themebase_Kirki::add_field('theme', array(
    'type' => 'toggle',
    'settings' => 'single_product_desc',
    'label' => esc_html__('Remove Details Tab', 'themebase'),
    'section' => $section,
    'priority' => $priority++,
    'default' => 0
));

Themebase_Kirki::add_field('theme', array(
    'type' => 'toggle',
    'settings' => 'single_product_review',
    'label' => esc_html__('Remove Reviews Tab', 'themebase'),
    'section' => $section,
    'priority' => $priority++,
    'default' => 0
));
Themebase_Kirki::add_field('theme', array(
    'type' => 'text',
    'settings' => 'single_product_rename_desc',
    'label' => esc_html__('Rename Details Tab', 'themebase'),
    'section' => $section,
    'priority' => $priority++,
    'default' => esc_html__('Details', 'themebase'),
));

Themebase_Kirki::add_field('theme', array(
    'type' => 'text',
    'settings' => 'single_product_rename_info',
    'label' => esc_html__('Rename Information Tab', 'themebase'),
    'section' => $section,
    'priority' => $priority++,
    'default' => esc_html__('More Information', 'themebase'),
));
