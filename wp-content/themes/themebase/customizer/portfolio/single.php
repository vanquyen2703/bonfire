<?php
$section  = 'portfolio_single';
$priority = 1;
$prefix   = 'portfolio_single_';

Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'select',
    'settings'    => $prefix . 'layout_content',
    'label'       => esc_html__( 'Portfolio Layout', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 'portfolio-layout1',
    'choices'     => array(
        'portfolio-layout1'    => esc_html__( 'Layout 1', 'themebase' ),
        'portfolio-layout2'    => esc_html__( 'Layout 2', 'themebase' ),
        'portfolio-layout3'    => esc_html__( 'Layout 3', 'themebase' ),
    ),
) );

Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'radio-buttonset',
    'settings'    => $prefix . 'category_enable',

    'label'       => esc_html__( 'Category', 'themebase' ),
    'description' => esc_html__( 'Turn on to display category portfolio information.', 'themebase' ),
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
    'settings'    => $prefix . 'share_enable',

    'label'       => esc_html__( 'Portfolio Sharing', 'themebase' ),
    'description' => esc_html__( 'Turn on to display the social sharing on portfolio single posts.', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => '1',
    'choices'     => array(
        '0' => esc_html__( 'Off', 'themebase' ),
        '1' => esc_html__( 'On', 'themebase' ),
    ),
) );


Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'multicheck',
    'settings'    => $prefix . 'item_enable',
    'label'       => esc_attr__( 'Sharing Links', 'themebase' ),
    'description' => esc_html__( 'Check to the box to enable social share links.', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => array( 'facebook', 'twitter','pinterest' ),
    'choices'     => array(
        'facebook'    => esc_attr__( 'Facebook', 'themebase' ),
        'twitter'     => esc_attr__( 'Twitter', 'themebase' ),
        'pinterest' => esc_attr__( 'Pinterest', 'themebase' ),
    ),
    'required'    => array(
        array(
            'setting'  => $prefix . 'share_enable',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
) );


Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'radio-buttonset',
    'settings'    => $prefix . 'related_enable',
    'label'       => esc_html__( 'Other portfolio', 'themebase' ),
    'description' => esc_html__( 'Turn on to display other news portfolio on portfolio single.', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => '0',
    'choices'     => array(
        '0' => esc_html__( 'Off', 'themebase' ),
        '1' => esc_html__( 'On', 'themebase' ),
    ),
) );

Themebase_Kirki::add_field( 'theme', array(
    'type'     => 'textarea',
    'settings' => $prefix . 'other_title',
    'label'    => esc_html__( 'Title other portfolio', 'themebase' ),
    'section'  => $section,
    'priority' => $priority ++,
    'default' => wp_kses( __('Related Projects','themebase'),
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

    'active_callback' => array(
        array(
            'setting'  => $prefix . 'related_enable',
            'operator' => '==',
            'value'    => '1',
        ),
    ),
) );

Themebase_Kirki::add_field( 'theme', array(
    'type'            => 'number',
    'settings'        => $prefix . 'related_number',
    'label'           => esc_html__( 'Number of other portfolio item', 'themebase' ),
    'section'         => $section,
    'priority'        => $priority ++,
    'default'         => 4,
    'choices'         => array(
        'min'  => 0,
        'max'  => 50,
        'step' => 1,
    ),
    'active_callback' => array(
        array(
            'setting'  => $prefix . 'related_enable',
            'operator' => '==',
            'value'    => '1',
        ),
    ),
) );