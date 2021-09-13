<?php
$section  = 'breadcrumb-config';
$priority = 1;
$prefix   = 'general_';

Themebase_Kirki::add_field( 'theme', array(
    'type'     => 'custom',
    'settings' => $prefix . 'group_title_' . $priority ++,
    'section'  => $section,
    'priority' => $priority ++,
    'default'  => '<div class="big_title">' . esc_html__( 'Styling', 'themebase' ) . '</div>',
) );

Themebase_Kirki::add_field( 'theme', array(
    'type'     => 'custom',
    'settings' => $prefix . 'group_title_' . $priority ++,
    'section'  => $section,
    'priority' => $priority ++,
    'default'  => '<div>' . esc_html__( 'Note: Does Not Apply To Product Pages.', 'themebase' ) . '</div>',
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'      => 'spacing',
    'settings'  => $prefix . 'padding',
    'label'     => esc_html__( 'Padding', 'themebase' ),
    'description' => esc_html__( 'Default padding:39px(top), 40px(bottom).', 'themebase' ),
    'section'   => $section,
    'priority'  => $priority ++,
    'default'   => array(
        'top'    => '',
        'bottom' => '',
    ),
    'transport' => 'auto',
    'output'    => array(
        array(
            'element'  => array(
                '.side-breadcrumb, .side-breadcrumb.has-img',
            ),
            'property' => 'padding',
        ),
    ),
) );

Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'background',
    'settings'    => $prefix . 'background',
    'label'       => esc_html__( 'Background', 'themebase' ),
    'description' => esc_html__( 'Controls the background of breadcrumb. Note: Setting background image for breadcrumbs on the specific page has priority over that on customizing section which is the default for all pages. Background color is not applied when background image is applied.', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => array(
        'background-color'      => '',
        'background-image'      => '',
        'background-repeat'     => 'no-repeat',
        'background-size'       => 'cover',
        'background-attachment' => 'scroll',
        'background-position'   => 'center center',
    ),
    'output'      => array(
        array(
            'element' => '.side-breadcrumb',
        ),
    ),
) );

Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'radio-buttonset',
    'settings'    => $prefix . 'align',
    'label'       => esc_html__( 'Align', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 'left',
    'choices'     => array(
        'left'    => esc_html__( 'Left', 'themebase' ),
        'center'    => esc_html__( 'Center', 'themebase' ),
        'right'    => esc_html__( 'Right', 'themebase' ),
    ),
) );

Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'color',
    'settings'    => 'background_overlay',
    'label'       => esc_html__( 'Background Overlay', 'themebase' ),
    'description' => esc_html__( 'Controls the background overlay of breadcrumb.', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => '',
    'output'      => array(
        array(
            'element' => '.side-breadcrumb:before',
            'property' => 'background'
        ),
    ),
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'     => 'text',
    'settings' => 'bg_opacity',
    'label'    => __( 'Enter opacity to set background opacity, default: 0.6.', 'themebase' ),
    'section'  => $section,
    'default'  => '0.6',
    'priority' => $priority ++,
    'output'   => array(
        array(
            'element'  => '.side-breadcrumb:before',
            'property' => 'opacity',
        ),
    ),
) );

Themebase_Kirki::add_field( 'theme', array(
    'type'     => 'custom',
    'settings' => $prefix . 'group_title_' . $priority ++,
    'section'  => $section,
    'priority' => $priority ++,
    'default'  => '<div class="big_title">' . esc_html__( 'Page Title', 'themebase' ) . '</div>',
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'     => 'custom',
    'settings' => $prefix . 'group_title_' . $priority ++,
    'section'  => $section,
    'priority' => $priority ++,
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'     => 'radio-buttonset',
    'settings' => 'page_title',
    'label'    => esc_html__( 'Page Title.', 'themebase' ),
    'section'  => $section,
    'priority' => $priority ++,
    'default'  => '1',
    'choices'  => array(
        '0' => esc_html__( 'Hide', 'themebase' ),
        '1' => esc_html__( 'Show', 'themebase' ),
    ),
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'typography',
    'settings'    => 'page_title_typography',
    'label'       => esc_html__( 'Typography', 'themebase' ),
    'description' => esc_html__( 'These settings control the typography for page title.', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => array(
        'font-family'    => Themebase::PRIMARY_FONT,
        'variant'        => '400',
        'letter-spacing' => '0em',
        'font-size'      =>  '34px',
    ),
	'choices'     => array(
		'variant' => array(
			'100',
			'100italic',
			'200',
			'200italic',
			'300',
			'300italic',
			'regular',
			'italic',
			'500',
			'500italic',
			'600',
			'600italic',
			'700',
			'700italic',
			'800',
			'800italic',
			'900',
			'900italic',
		),
	),
    'output'      => array(
        array(
            'media_query' => '@media (min-width: 1200px)',
            'element' => '.side-breadcrumb .page-title h1',
        ),
    ),
    'required'  => array(
        array(
            'setting'  => 'page_title',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'color',
    'settings'    => 'page_title_color',
    'label'       => esc_html__( 'Color for page title', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '',
    'output'      => array(
        array(
            'element'  => '.side-breadcrumb .page-title h1',
            'property' => 'color',
        ),
    ),
    'required'  => array(
        array(
            'setting'  => 'page_title',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
) );

Themebase_Kirki::add_field( 'theme', array(
    'type'     => 'custom',
    'settings' => $prefix . 'group_title_' . $priority ++,
    'section'  => $section,
    'priority' => $priority ++,
    'default'  => '<div class="big_title">' . esc_html__( 'Breadcrumb', 'themebase' ) . '</div>',
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'     => 'radio-buttonset',
    'settings' => 'breadcrumb',
    'label'    => esc_html__( 'Breadcrumb.', 'themebase' ),
    'section'  => $section,
    'priority' => $priority ++,
    'default'  => '1',
    'choices'  => array(
        '0' => esc_html__( 'Hide', 'themebase' ),
        '1' => esc_html__( 'Show', 'themebase' ),
    ),
) );

Themebase_Kirki::add_field( 'theme', array(
    'type'     => 'radio-buttonset',
    'settings' => 'link_align',
    'label'    => esc_html__( 'Align breadcrumb link.', 'themebase' ),
    'section'  => $section,
    'priority' => $priority ++,
    'default'  => 'right',
    'choices'  => array(
        'left' => esc_html__( 'Left', 'themebase' ),
        'right' => esc_html__( 'Right', 'themebase' ),
        'center' => esc_html__( 'Center', 'themebase' ),
    ),
    'output'      => array(
        array(
            'element'  => '.side-breadcrumb .breadcrumb',
            'property' => 'text-align',
        ),
    ),
    'required'  => array(
        array(
            'setting'  => 'page_title',
            'operator' => '==',
            'value'    => 0,
        ),
        array(
            'setting' => 'breadcrumb',
            'operator' => '==',
            'value'    => 1,
        ),
    ),

) );

// Icon link

Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'typography',
    'settings'    => 'link_typography',
    'label'       => esc_html__( 'Typography', 'themebase' ),
    'description' => esc_html__( 'These settings control the typography for breadcrumb link.', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => array(
        'font-family'    => Themebase::PRIMARY_FONT,
        'variant'    => '400',
        'letter-spacing' => '0',
        'text-transform' => 'Capitalize'
    ),
	'choices'     => array(
		'variant' => array(
			'100',
			'100italic',
			'200',
			'200italic',
			'300',
			'300italic',
			'regular',
			'italic',
			'500',
			'500italic',
			'600',
			'600italic',
			'700',
			'700italic',
			'800',
			'800italic',
			'900',
			'900italic',
		),
	),
    'output'      => array(
        array(
            'element' => '.breadcrumb li, 
                        .breadcrumb li a',
        ),
    ),
    'required' => array(
        array(
            'setting' => 'breadcrumb',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'slider',
    'settings'    => 'text_font_size',
    'label'       => esc_html__( 'Breadcrumb Link Font Size', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => '',
    'transport'   => 'auto',
    'choices'     => array(
        'min'  => 10,
        'max'  => 30,
        'step' => 1,
    ),
    'output'      => array(
        array(
            'element'  => '.breadcrumb li:before, 
                            .breadcrumb li:last-child, 
                            .breadcrumb li a',
            'property' => 'font-size',
            'units'    => 'px',
        ),
    ),
    'required' => array(
        array(
            'setting' => 'breadcrumb',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
) );

Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'color',
    'settings'    => 'link_color',
    'label'       => esc_html__( 'Color for breadcrumb link', 'themebase' ),
    'description' => esc_html__( 'Note: Does Not Apply To Product Pages.', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '',
    'output'      => array(
        array(
            'element'  => '.breadcrumb li .home, .breadcrumb li a, .breadcrumb li:before',
            'property' => 'color',
        ),
    ),
    'required' => array(
        array(
            'setting' => 'breadcrumb',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
) );

Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'color',
    'settings'    => 'text_color',
    'label'       => esc_html__( 'Color for breadcrumb', 'themebase' ),
    'description' => esc_html__( 'Note: Does Not Apply To Product Pages.', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '',
    'output'      => array(
        array(
            'element'  => '.breadcrumb li',
            'property' => 'color',
        ),
    ),
    'required' => array(
        array(
            'setting' => 'breadcrumb',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
) );




