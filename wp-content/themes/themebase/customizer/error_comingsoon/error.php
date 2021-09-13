<?php
$section  = 'error404_page';
$priority = 1;
$prefix   = 'error404_page_';


Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'text',
    'settings'    => 'text_404',
    'label'       => esc_html__( 'Text 404', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => esc_html__( '404', 'themebase' ),
) );

Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'color',
    'settings'    => 'text_404_color',
    'label'       => esc_html__( 'Text 404 Color.', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '#ffffff',
    'output'      => array(
        array(
            'element'  => '.page-404 .text-404',
            'property' => 'color',
        ),
    ),
) );

Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'slider',
    'settings'    => 'text_404_size',
    'label'       => esc_html__( 'Text 404 Font Size', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 350,
    'transport'   => 'auto',
    'choices'     => array(
        'min'  => 10,
        'max'  => 1000,
        'step' => 1,
    ),
    'output'      => array(
        array(
            'element'  => '.page-404 .text-404',
            'property' => 'font-size',
            'units'    => 'px',
        ),
    ),
) );

Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'slider',
    'settings'    => 'text_404_line_height',
    'label'       => esc_html__( 'Line Height', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => 328,
    'choices'     => array(
        'min'  => 10,
        'max'  => 1000,
        'step' => 1,
    ),
    'output'      => array(
        array(
            'element'  => '.page-404 .text-404',
            'property' => 'line-height',
            'units'    => 'px',
        ),
    ),
) );

Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'slider',
    'settings'    => 'text_404_mb',
    'label'       => esc_html__( 'Margin Bottom', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 0,
    'transport'   => 'auto',
    'choices'     => array(
        'min'  => 10,
        'max'  => 1000,
        'step' => 1,
    ),
    'output'      => array(
        array(
            'element'  => '.page-404 .text-404',
            'property' => 'margin-bottom',
            'units'    => 'px',
        ),
    ),
) );

Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'text',
    'settings'    => 'error_title',
    'label'       => esc_html__( 'Title', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => esc_html__( 'Oops... looks like you got lost', 'themebase' ),
) );

Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'color',
    'settings'    => 'title_404_color',
    'label'       => esc_html__( 'Title Color.', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '#ffffff',
    'output'      => array(
        array(
            'element'  => '.page-404 h3.page-title',
            'property' => 'color',
        ),
    ),
) );

Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'text',
    'settings'    => 'error404_content',
    'label'       => esc_html__( 'Text content', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => esc_html__( 'Get back home by clicking the button', 'themebase' ),
) );

Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'color',
    'settings'    => 'content_404_color',
    'label'       => esc_html__( 'Text Content Color.', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '#ffffff',
    'output'      => array(
        array(
            'element'  => '.page-404 p',
            'property' => 'color',
        ),
    ),
) );

Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'text',
    'settings'    => 'go_back_home_404',
    'label'       => esc_html__( 'Button Go To Home', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => esc_html__( 'Go to home', 'themebase' ),
) );

Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'color',
    'settings'    => 'go_back_home_404_color',
    'label'       => esc_html__( 'Button 404 Text Color.', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => Themebase::PRIMARY_COLOR,
    'output'      => array(
        array(
            'element'  => '.page-404 .go-home',
            'property' => 'color',
        ),
    ),
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'color',
    'settings'    => 'go_back_home_404_bg_color',
    'label'       => esc_html__( 'Button 404 Background Color.', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '#FFFFFF',
    'output'      => array(
        array(
            'element'  => '.page-404 .go-home',
            'property' => 'background-color',
        ),
    ),
) );

Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'background',
    'settings'    => $prefix . 'bg_404',
    'label'       => esc_html__( 'Background images', 'themebase' ),
    'description' => esc_html__( 'Background image for 404 page', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => array(
        'background-color'      => '',
        'background-image'      => THEMEBASE_THEME_URI . '/assets/images/bg-404.jpg',
        'background-repeat'     => 'no-repeat',
        'background-size'       => 'cover',
        'background-attachment' => 'scroll',
        'background-position'   => 'center center',
    ),
    'output'      => array(
        array(
            'element' => 'body .page-404',
        ),
    ),
) );