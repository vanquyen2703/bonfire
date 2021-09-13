<?php
$section  = 'shopping_cart';
$priority = 1;
$prefix   = 'shopping_cart_';
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'radio-buttonset',
    'settings'    => $prefix . 'layout',
    'label'       => esc_html__( 'Cart Layout', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 'layout1',
    'choices'     => array(
        'layout1'    => esc_html__( 'Layout 1', 'themebase' ),
        'layout2'    => esc_html__( 'Layout 2', 'themebase' ),
    ),
) );
Themebase_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => $prefix . 'cross_sells_enable',
	'label'       => esc_html__( 'Cross-sells products', 'themebase' ),
	'description' => esc_html__( 'Turn on to display the cross-sells products section. This is helpful if you have dozens of products with cross-sells and you don\'t want to go and edit each single page.', 'themebase' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'themebase' ),
		'1' => esc_html__( 'On', 'themebase' ),
	),
) );
Themebase_Kirki::add_field( 'theme', array(
	'type'     => 'text',
	'settings' => 'cross_title',
	'label'    => esc_html__( 'Title Cross Sells Products', 'themebase' ),
	'section'  => $section,
	'priority' => $priority ++,
	'required'  => array(
        array(
            'setting'  => 'shopping_cart_cross_sells_enable',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
    'default' => wp_kses( __('You may be interested in&hellip;','themebase'),
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
	
) );
