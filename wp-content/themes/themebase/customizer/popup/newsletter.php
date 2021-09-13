<?php
$section  = 'popup_newsletter';
$priority = 1;
$prefix   = 'popup_newsletter_';
Themebase_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => $prefix . 'show',
	'label'    => esc_html__( 'Show/Hide Popup', 'themebase' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '0',
	'choices'  => array(
		'0' => esc_html__( 'No', 'themebase' ),
		'1' => esc_html__( 'Yes', 'themebase' ),
	),
) );

themebase_Kirki::add_field( 'theme', array(
	'type'     => 'text',
	'settings' => $prefix . 'height',
	'label'    => esc_html__( 'Height Popup', 'themebase' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '504px',
	'required'  => array(
        array(
            'setting'  => 'popup_newsletter_show',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
    'output'      => array(
		array(
			'element'  => '.popup-newsletter',
			'property' => 'min-height',
		),
	), 
) );
themebase_Kirki::add_field( 'theme', array(
	'type'     => 'text',
	'settings' => $prefix .'width',
	'label'    => esc_html__( 'Width Popup', 'themebase' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '570px',
	'required'  => array(
        array(
            'setting'  => 'popup_newsletter_show',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
    'output'      => array(
		array(
			'element'  => '.popup-newsletter',
			'property' => 'width',
		),
	),  
) );
themebase_Kirki::add_field( 'theme', array(
	'type'        => 'color',
    'settings'    => $prefix . 'background',
    'label'       => esc_html__( 'Background', 'themebase' ),
    'description' => esc_html__( 'Controls background', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => '#fff',
    'output'      => array(
        array(
            'element' => '.popup-newsletter',
			'property' => 'background-color',
        ),
    ),
    'required'  => array(
        array(
            'setting'  => 'popup_newsletter_show',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );
themebase_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_form' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Title Form Popup', 'themebase' ) . '</div>',
	'required'  => array(
        array(
            'setting'  => 'popup_newsletter_show',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );
themebase_Kirki::add_field( 'theme', array(
	'type'     => 'text',
	'settings' => $prefix . 'title_form',
	'label'    => esc_html__( 'Title Form', 'themebase' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => esc_html__( 'Sign up newsletter', 'themebase' ),
	'required'  => array(
        array(
            'setting'  => 'popup_newsletter_show',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );
themebase_Kirki::add_field( 'theme', array(
    'type'        => 'color',
    'settings'    => $prefix . 'title_form_bg',
    'label'       => esc_html__( 'Background', 'themebase' ),
    'description' => esc_html__( 'Background title form', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => '#2c2c2c',
    'output'      => array(
        array(
            'element' => '.popup-title-form',
			'property' => 'background-color',
        ),
    ),
    'required'  => array(
        array(
            'setting'  => 'popup_newsletter_show',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );

themebase_Kirki::add_field( 'theme', array(
	'type'        => 'typography',
	'settings'    => $prefix . 'title_form_typography',
	'label'       => esc_html__( 'Font family', 'themebase' ),
	'description' => esc_html__( 'These settings control the title text.', 'themebase' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'required'  => array(
        array(
            'setting'  => 'popup_newsletter_show',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
	'default'     => array(
		'font-family'    =>  Themebase::PRIMARY_FONT,
		'variant'        => 'regular',
		'line-height'    => '28px',
		'letter-spacing' => '0',
		'text-transform' => 'none'
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
			'element' => '.popup-title-form',
		),
	),
) );
themebase_Kirki::add_field( 'theme', array(
	'type'        => 'color',
	'settings'    => 'title_form_color',
	'label'       => esc_html__( 'Color', 'themebase' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#fff',
	'required'  => array(
        array(
            'setting'  => 'popup_newsletter_show',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
	'output'      => array(
		array(
			'element'  => '.popup-title-form',
			'property' => 'color',
		),
	),
) );
themebase_Kirki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => 'title_form_size',
	'label'     => esc_html__( 'Font size', 'themebase' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 18,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 10,
		'max'  => 50,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'     => '.popup-title-form',
			'property'    => 'font-size',
			'units'       => 'px',
		),
	),
	'required'  => array(
        array(
            'setting'  => 'popup_newsletter_show',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );
themebase_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Heading title', 'themebase' ) . '</div>',
	'required'  => array(
        array(
            'setting'  => 'popup_newsletter_show',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );
themebase_Kirki::add_field( 'theme', array(
	'type'     => 'textarea',
	'settings' => $prefix . 'title',
	'label'    => esc_html__( 'Heading title', 'themebase' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => esc_html__( 'Sign up our newsletter and save 25% off for the next purchase!', 'themebase' ),
	'required'  => array(
        array(
            'setting'  => 'popup_newsletter_show',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );
themebase_Kirki::add_field( 'theme', array(
	'type'        => 'typography',
	'settings'    => $prefix . 'title_typography',
	'label'       => esc_html__( 'Font family', 'themebase' ),
	'description' => esc_html__( 'These settings control the title text.', 'themebase' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'required'  => array(
        array(
            'setting'  => 'popup_newsletter_show',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
	'default'     => array(
		'font-family'    =>  Themebase::PRIMARY_FONT,
		'variant'        => '500',
		'line-height'    => '24px',
		'letter-spacing' => '-0.1px',
		'text-transform' => 'initial',
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
			'element' => '.popup-newsletter-content .form-content h4',
		),
	),
) );
themebase_Kirki::add_field( 'theme', array(
	'type'        => 'color',
	'settings'    => $prefix .'title_color',
	'label'       => esc_html__( 'Color', 'themebase' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#2c2c2c',
	'output'      => array(
		array(
			'element'  => '.popup-newsletter-content .form-content h4',
			'property' => 'color',
		),
	),
	'required'  => array(
        array(
            'setting'  => 'popup_newsletter_show',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );
themebase_Kirki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => $prefix . 'title_size',
	'label'     => esc_html__( 'Font size', 'themebase' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 20,
	'transport' => 'auto',
	'required'  => array(
        array(
            'setting'  => 'popup_newsletter_show',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
	'choices'   => array(
		'min'  => 10,
		'max'  => 50,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'     => '.popup-newsletter-content .form-content h4',
			'property'    => 'font-size',
			'units'       => 'px',
		),
	),
) );
themebase_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_description' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'After Title', 'themebase' ) . '</div>',
	'required'  => array(
        array(
            'setting'  => 'popup_newsletter_show',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );
themebase_Kirki::add_field( 'theme', array(
	'type'     => 'textarea',
	'settings' => $prefix . 'description',
	'label'    => esc_html__( 'Description', 'themebase' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => esc_html__( 'Subscribe to our newsletters and don&rsquot; miss new arrivals, the latest fashion updates and our promotions.', 'themebase' ),
	'required'  => array(
        array(
            'setting'  => 'popup_newsletter_show',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );
themebase_Kirki::add_field( 'theme', array(
	'type'        => 'typography',
	'settings'    => $prefix . 'description_typography',
	'label'       => esc_html__( 'Font family', 'themebase' ),
	'description' => esc_html__( 'These settings control the title text.', 'themebase' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'required'  => array(
        array(
            'setting'  => 'popup_newsletter_show',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
	'default'     => array(
		'font-family'    =>  Themebase::PRIMARY_FONT,
		'variant'        => 'regular',
		'line-height'    => '22px',
		'letter-spacing' => '0',
		'text-transform' => 'initial',
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
			'element' => '.popup-newsletter-content .form-content p',
		),
	),
) );
themebase_Kirki::add_field( 'theme', array(
	'type'        => 'color',
	'settings'    => $prefix . 'description_color',
	'label'       => esc_html__( 'Color', 'themebase' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#707070',
	'output'      => array(
		array(
			'element'  => '.popup-newsletter-content .form-content p',
			'property' => 'color',
		),
	),
	'required'  => array(
        array(
            'setting'  => 'popup_newsletter_show',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );
themebase_Kirki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'    => $prefix . 'description_size',
	'label'     => esc_html__( 'Font size', 'themebase' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 16,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 10,
		'max'  => 50,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'     => '.popup-newsletter-content .form-content p',
			'property'    => 'font-size',
			'units'       => 'px',
		),
	),
	'required'  => array(
        array(
            'setting'  => 'popup_newsletter_show',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );
themebase_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_note' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Note', 'themebase' ) . '</div>',
	'required'  => array(
        array(
            'setting'  => 'popup_newsletter_show',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );
themebase_Kirki::add_field( 'theme', array(
	'type'     => 'textarea',
	'settings' => $prefix . 'note',
	'label'    => esc_html__( 'Note', 'themebase' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => esc_html__( 'Your Information will never be shared with any third party.', 'themebase' ),
	'required'  => array(
        array(
            'setting'  => 'popup_newsletter_show',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );
themebase_Kirki::add_field( 'theme', array(
	'type'        => 'typography',
	'settings'    => $prefix . 'not_typography',
	'label'       => esc_html__( 'Font family', 'themebase' ),
	'description' => esc_html__( 'These settings control the title text.', 'themebase' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'required'  => array(
        array(
            'setting'  => 'popup_newsletter_show',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
	'default'     => array(
		'font-family'    => Themebase::PRIMARY_FONT,
		'variant'        => '400',
		'line-height'    => 'initial',
		'letter-spacing' => '0',
		'text-transform' => 'initial'
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
			'element' => '.popup-newsletter-content .form-content .note',
		),
	),
) );
themebase_Kirki::add_field( 'theme', array(
	'type'        => 'color',
	'settings'    => $prefix . 'note_color',
	'label'       => esc_html__( 'Color', 'themebase' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#9a9a9a',
	'output'      => array(
		array(
			'element'  => '.popup-newsletter-content .form-content .note',
			'property' => 'color',
		),
	),
	'required'  => array(
        array(
            'setting'  => 'popup_newsletter_show',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );
themebase_Kirki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'    => $prefix . 'note_size',
	'label'     => esc_html__( 'Font size', 'themebase' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 16,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 10,
		'max'  => 50,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'     => '.popup-newsletter-content .form-content .note',
			'property'    => 'font-size',
			'units'       => 'px',
		),
	),
	'required'  => array(
        array(
            'setting'  => 'popup_newsletter_show',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );

themebase_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'form' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Custom Form', 'themebase' ) . '</div>',
	'required'  => array(
        array(
            'setting'  => 'popup_newsletter_show',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
) );
themebase_Kirki::add_field( 'theme', array(
	'type'        => 'color',
	'settings'    => $prefix . 'color_input',
	'label'       => esc_html__( ' Input and Label Color', 'themebase' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#9a9a9a',
	'required'  => array(
        array(
            'setting'  => 'popup_newsletter_show',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
	'output'      => array(
		array(
			'element'  => '.mc4wp-form-fields input[type=email], 
							.mc4wp-form-fields input[type=email]::placeholder',
							
			'property' => 'color',
		),
	),
) );
themebase_Kirki::add_field( 'theme', array(
	'type'        => 'color',
	'settings'    => $prefix . 'border_color',
	'label'       => esc_html__( 'Input Border Color', 'themebase' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#ebeeee',
	'required'  => array(
        array(
            'setting'  => 'popup_newsletter_show',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
	'output'      => array(
		array(
			'element'  => '.mc4wp-form-fields input[type=email]',
			'property' => 'border-color',
		),
	),
) );
themebase_Kirki::add_field( 'theme', array(
	'type'        => 'color',
	'settings'    => $prefix . 'color_button',
	'label'       => esc_html__( 'Button Color ', 'themebase' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#fff',
	'required'  => array(
        array(
            'setting'  => 'popup_newsletter_show',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
	'output'      => array(
		array(
			'element'  => '.mc4wp-form-fields input[type=submit]',
			'property' => 'color',
		),
	),
) );
themebase_Kirki::add_field( 'theme', array(
	'type'        => 'color',
	'settings'    => $prefix . 'hover_color_button',
	'label'       => esc_html__( 'Button Hover Color ', 'themebase' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#fff',
	'required'  => array(
        array(
            'setting'  => 'popup_newsletter_show',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
	'output'      => array(
		array(
			'element'  => '.mc4wp-form-fields input[type=submit]:hover',
			'property' => 'color',
		),
	),
) );
themebase_Kirki::add_field( 'theme', array(
	'type'        => 'color',
	'settings'    => $prefix . 'bg_button',
	'label'       => esc_html__( ' Button Background Color', 'themebase' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#2c2c2c',
	'required'  => array(
        array(
            'setting'  => 'popup_newsletter_show',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
	'output'      => array(
		array(
			'element'  => '.mc4wp-form-fields input[type=submit]',
			'property' => 'background-color',
		),
		array(
			'element'  => '.mc4wp-form-fields input[type=submit]',
			'property' => 'border-color',
		),
	),
) );
themebase_Kirki::add_field( 'theme', array(
	'type'        => 'color',
	'settings'    => $prefix . 'bg_hover_button',
	'label'       => esc_html__( 'Button Background Color Hover ', 'themebase' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => Themebase::PRIMARY_COLOR,
	'required'  => array(
        array(
            'setting'  => 'popup_newsletter_show',
            'operator' => '==',
            'value'    => 1,
        ),
    ), 
	'output'      => array(
		array(
			'element'  => '.mc4wp-form-fields input[type=submit]:hover',
			'property' => 'background-color',
		),
		array(
			'element'  => '.mc4wp-form-fields input[type=submit]:hover',
			'property' => 'border-color',
		),
	),
) );