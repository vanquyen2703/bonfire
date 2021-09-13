<?php
$section  = 'shop_archive';
$priority = 1;
$prefix   = 'shop_archive_';
$registered_sidebars = Themebase_Helper::get_registered_sidebars();
Themebase_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'General', 'themebase' ) . '</div>',
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'shop_layout',
    'label'       => esc_html__( 'Shop Layout', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 'full_width',
    'choices'     => array(
        'wide' => esc_html__( 'Wide', 'themebase' ),
        'full_width'   => esc_html__( 'Full Width', 'themebase' ),
        'boxed'   => esc_html__( 'Boxed', 'themebase' )
    ),
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'select',
    'settings'    => 'shop_sidebar_left',
    'label'       => esc_html__( 'Sidebar Left', 'themebase' ),
    'description' => esc_html__( 'Select sidebar left.', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => '',
    'choices'     => $registered_sidebars,
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'select',
    'settings'    => 'shop_sidebar_right',
    'label'       => esc_html__( 'Sidebar Right', 'themebase' ),
    'description' => esc_html__( 'Select sidebar right.', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => '',
    'choices'     => $registered_sidebars,
) );
Themebase_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Toolbar', 'themebase' ) . '</div>',
) );
Themebase_Kirki::add_field( 'theme', array(
	'type'        => 'toggle',
	'settings'    => 'shop_archive_toolbar',
	'label'       => esc_html__( 'Show/Hide Toolbar', 'themebase' ),
	'description' => esc_html__( 'Turn on to show toolbar', 'themebase' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 1,
) );

Themebase_Kirki::add_field( 'theme', array(
	'type'        => 'toggle',
	'settings'    => 'shop_archive_catalog_ordering',
	'label'       => esc_html__( 'Show/Hide Catalog Ordering', 'themebase' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 1,
	'required'  => array(
        array(
            'setting'  => 'shop_archive_toolbar',
            'operator' => 'contains',
            'value'    => 1,
        ),
    ), 
) );

Themebase_Kirki::add_field( 'theme', array(
	'type'        => 'toggle',
	'settings'    => 'shop_archive_filter',
	'label'       => esc_html__( 'Show/Hide Filter', 'themebase' ),
    'description' => esc_html__( 'Works when selecting the left sidebar or right sidebar', 'themebase' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 1,
	'required'  => array(
        array(
            'setting'  => 'shop_archive_toolbar',
            'operator' => 'contains',
            'value'    => 1,
        ),
    ), 
) );

Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'toggle',
    'settings'    => 'shop_archive_filter_top',
    'label'       => esc_html__( 'Filter Top', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 0,
    'required'  => array(
        array(
            'setting'  => 'shop_archive_toolbar',
            'operator' => 'contains',
            'value'    => 1,
        ),
        array(
            'setting'  => 'shop_archive_filter',
            'operator' => 'contains',
            'value'    => 1,
        ),
    ),
) );

Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'product_column',
    'label'       => esc_html__( 'Product Column', 'themebase' ),
    'description' => esc_html__( 'Option 4 col not for cases where the page has 2 sidebars (left and right)', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => '3',
    'choices'     => array(
        '1' => esc_html__( '1', 'themebase' ),
        '2' => esc_html__( '2', 'themebase' ),
        '3' => esc_html__( '3', 'themebase' ),
        '4' => esc_html__( '4', 'themebase' ),
    ),
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'select',
    'settings'    => 'product_layout',
    'label'       => esc_html__( 'Product Layout', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => '7',
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
    'required'  => array(
        array(
            'setting'  => 'product_column',
            'operator' => '!==',
            'value'    => '1',
        ),
    ),
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'pagination_type',
    'label'       => esc_html__( 'Pagination Type', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 'number',
    'choices'     => array(
        'number' => esc_html__( 'Number', 'themebase' ),
        'infinite_scrolling' => esc_html__( 'Infinite Scrolling', 'themebase' ),
    ),
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'number',
    'settings'    => 'shop_archive_number_item',
    'label'       => esc_html__( 'Number items', 'themebase' ),
    'description' => esc_html__( 'Controls the number of products display on the shop archive page', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 6,
    'choices'     => array(
        'min'  => 1,
        'max'  => 30,
        'step' => 1,
    ),
) );

Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'toggle',
    'settings'    => 'show_hide_banner',
    'label'       => esc_html__( 'Show/Hide Banner', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 0,
) );

Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'select',
    'settings'    => 'product_banner',
    'label'       => esc_html__( 'Select Banner', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => '',
    'choices'     => themebase_get_template(),
    'required'  => array(
        array(
            'setting'  => 'show_hide_banner',
            'operator' => 'contains',
            'value'    => 1,
        ),
    ),
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'toggle',
    'settings'    => 'custom_size_product_image',
    'label'       => esc_html__( 'Show/Hide Custom Product Image Size', 'lusion' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 0,
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'number',
    'settings'    => 'product_image_width',
    'label'       => esc_html__( 'Product Image Width (Required)', 'lusion' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 750,
    'choices'     => array(
        'min'  => 1,
        'max'  => 1000,
        'step' => 1,
    ),
    'required'  => array(
        array(
            'setting'  => 'custom_size_product_image',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'number',
    'settings'    => 'product_image_height',
    'label'       => esc_html__( 'Product Image Height (Required)', 'lusion' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 1000,
    'choices'     => array(
        'min'  => 1,
        'max'  => 1000,
        'step' => 1,
    ),
    'required'  => array(
        array(
            'setting'  => 'custom_size_product_image',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );