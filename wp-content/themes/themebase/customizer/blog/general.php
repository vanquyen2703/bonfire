<?php
$section  = 'blog_general';
$priority = 1;
$prefix   = 'blog_general_';
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'text',
    'settings'    => 'blog_title',
    'label'       => esc_html__( 'Blog Title', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => esc_html__( 'Blogs', 'themebase' ),
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'radio-buttonset',
    'settings'    => $prefix . 'layout',
    'label'       => esc_html__( 'Blog Layout', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 'full_width',
    'choices'     => array(
        'wide' => esc_html__( 'Wide', 'themebase' ),
        'full_width'   => esc_html__( 'Full Width', 'themebase' ),
        'boxed'   => esc_html__( 'Boxed', 'themebase' ),
    ),
) );
