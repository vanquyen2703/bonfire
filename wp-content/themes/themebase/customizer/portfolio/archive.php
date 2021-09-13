<?php
$section  = 'portfolio_archive';
$priority = 1;
$prefix   = 'portfolio_';
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'text',
    'settings'    =>  $prefix . 'title',
    'label'       => esc_html__( 'Portfolio Title', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => esc_html__( 'portfolio', 'themebase' ),
) );

Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'radio-buttonset',
    'settings'    => $prefix . 'layout',
    'label'       => esc_html__( 'Portfolio Layout General', 'themebase' ),
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
    'type'        => 'radio-buttonset',
    'settings'    => $prefix . 'layout2',
    'label'       => esc_html__( 'Portfolio Layout', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 'layout2',
    'choices'     => array(
        'layout1'    => esc_html__( 'Layout 1', 'themebase' ),
        'layout2'    => esc_html__( 'Layout 2', 'themebase' ),
    ),
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'radio-buttonset',
    'settings'    => $prefix . 'columns',
    'label'       => esc_html__( 'Layout Columns', 'themebase' ),
    'description' => esc_html__( 'Select columns for Portfolio.', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => '3',
    'choices'     => array(
        '1' => esc_html__( '1 col', 'themebase' ),
        '2'   => esc_html__( '2 col', 'themebase' ),
        '3' => esc_html__( '3 col', 'themebase' ),
        '4' => esc_html__( '4 col', 'themebase' ),
    ),
) );

Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'radio-buttonset',
    'settings'    => $prefix . 'pagination',
    'label'       => esc_html__( 'Pagination type', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 'number',
    'choices'     => array(
        'load_more' => esc_html__( 'Load more', 'themebase' ),
        'next_prev'   => esc_html__( 'Next/Prev', 'themebase' ),
        'number' => esc_html__( 'Number', 'themebase' ),
        'none' => esc_html__( 'None', 'themebase' ),
    ),
) );

Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'number',
    'settings'    => $prefix . 'number_cate',
    'label'       => esc_html__( 'Number of categories to show', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => '3',
) );

Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'number',
    'settings'    =>   $prefix . 'archive_number_item',
    'label'       => esc_html__( 'Post show per page', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 6,
    'choices'     => array(
        'min'  => 1,
        'max'  => 30,
        'step' => 1,
    ),
) );

