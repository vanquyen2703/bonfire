<?php
$section  = 'layout-config';
$priority = 1;
$prefix   = 'layout_';
$registered_sidebars = Themebase_Helper::get_registered_sidebars();
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'radio-buttonset',
    'settings'    => $prefix . 'site',
    'label'       => esc_html__( 'General Layout', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 'full_width',
    'choices'     => array(
        'wide' => esc_html__( 'Wide', 'themebase' ),
        'full_width'   => esc_html__( 'Full Width', 'themebase' ),
        'boxed' => esc_html__( 'Boxed', 'themebase' ),
    ),
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'dimension',
    'settings'    => $prefix . 'width',
    'label'       => esc_html__( 'Site Width', 'themebase' ),
    'description' => esc_html__( 'Controls the overall site width (layout: full width). Enter value including any valid CSS unit, ex: 1170px.', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => '1200px',
    'output'      => array(
        array(
            'element' => '.container, .elementor-inner .elementor-section.elementor-section-boxed>.elementor-container',
            'property'    => 'max-width',
            'media_query' => '@media (min-width: 1200px)'
        ),
    ),
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'select',
    'settings'    => 'general_left_sidebar',
    'label'       => esc_html__( 'Sidebar Left', 'themebase' ),
    'description' => esc_html__( 'Select sidebar left.', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => '',
    'choices'     => $registered_sidebars,
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'select',
    'settings'    => 'general_right_sidebar',
    'label'       => esc_html__( 'Sidebar Right', 'themebase' ),
    'description' => esc_html__( 'Select sidebar right.', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => '',
    'choices'     => $registered_sidebars,
) );