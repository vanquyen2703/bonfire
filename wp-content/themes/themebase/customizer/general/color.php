<?php
$section  = 'color-config';
$priority = 1;
$prefix   = 'general_';
$show = esc_html__( 'Show', 'themebase' );
$hide = esc_html__( 'Hide', 'themebase' );

/*--------------------------------------------------------------
# Color
--------------------------------------------------------------*/
Themebase_Kirki::add_field( 'theme', array(
    'type'     => 'custom',
    'settings' => $prefix . 'group_color' . $priority ++,
    'section'  => $section,
    'priority' => $priority ++,
    'default'  => '<div class="big_title">' . esc_html__( 'Color', 'themebase' ) . '</div>',
) );

Themebase_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => 'primary_color',
	'label'       => esc_html__( 'Primary Color', 'themebase' ),
	'description' => esc_html__( 'If you select a color, there is only one main color, while two colors change it to a gradient.', 'themebase' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '',
) );

/*--------------------------------------------------------------
# Body background
--------------------------------------------------------------*/

Themebase_Kirki::add_field( 'theme', array(
    'type'     => 'custom',
    'settings' => $prefix . 'group_bg' . $priority ++,
    'section'  => $section,
    'priority' => $priority ++,
    'default'  => '<div class="big_title">' . esc_html__( 'Body background', 'themebase' ) . '</div>',
) );

Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'background',
    'settings'    => $prefix . 'image_body',
    'label'       => esc_html__( 'Background', 'themebase' ),
    'description' => esc_html__( 'Controls background of the outer background area in boxed mode.', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
	'transport'   => 'auto',
    'default'     => array(
        'background-color'      => 'rgba(255,255,255,0)',
        'background-image'      => '',
        'background-repeat'     => 'no-repeat',
        'background-size'       => 'contain',
        'background-attachment' => 'scroll',
        'background-position'   => 'center center',
    ),
    'output'      => array(
        array(
            'element' => 'html body',
        ),
    ),
) );

/*--------------------------------------------------------------
# Button Color
--------------------------------------------------------------*/

Themebase_Kirki::add_field( 'theme', array(
    'type'     => 'custom',
    'settings' => $prefix . 'group_title_button' . $priority ++,
    'section'  => $section,
    'priority' => $priority ++,
    'default'  => '<div class="big_title">' . esc_html__( 'Button', 'themebase' ) . '</div>',
) );

Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'toggle',
    'settings' => 'btn_custom',
    'label'    => esc_html__( 'Enable Custom', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 0,
) );

Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'color-alpha',
    'settings'    => 'btn_primary_color',
    'label'       => esc_html__( 'Button Primary', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '',
    'required'  => array(
        array(
            'setting'  => 'btn_custom',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'color-alpha',
    'settings'    => 'btn_dark_color',
    'label'       => esc_html__( 'Button Dark', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => Themebase::HEADING_COLOR,
    'required'  => array(
        array(
            'setting'  => 'btn_custom',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'color-alpha',
    'settings'    => 'btn_light_color',
    'label'       => esc_html__( 'Button Light', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '#ebeeee',
    'required'  => array(
        array(
            'setting'  => 'btn_custom',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
) );