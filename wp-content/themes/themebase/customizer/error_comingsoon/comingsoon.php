<?php
$section  = 'comingsoon';
$priority = 1;
$prefix   = 'comingsoon_page_';

/*Coming soon */
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'coming_soon_enable',
    'label'       => esc_html__( 'Activate under construction mode', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => '0',
    'choices'     => array(
        '0' => esc_html__( 'Off', 'themebase' ),
        '1' => esc_html__( 'On', 'themebase' ),
    ),
) );


Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'text',
    'settings'    => 'cm_title',
    'label'       => esc_html__( 'Title', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => esc_html__( 'Coming Soon!', 'themebase' ),
) );

Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'color',
    'settings'    => 'cm_text_title_color',
    'label'       => esc_html__( 'Text Title Color.', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '#ffffff',
    'output'      => array(
        array(
            'element'  => '.page-coming-soon .coming-soon h1',
            'property' => 'color',
        ),
    ),
) );

Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'text',
    'settings'    => 'cm_text_content',
    'label'       => esc_html__( 'Text content', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => esc_html__( 'We are currently working on an awesome new site. Stay tuned for more information. Subscribe to our newsletter to stay updated on our progress', 'themebase' ),
) );

Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'color',
    'settings'    => 'cm_text_content_color',
    'label'       => esc_html__( 'Text Content Color.', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '#ffffff',
    'output'      => array(
        array(
            'element'  => '.page-coming-soon .coming-soon .cm-info',
            'property' => 'color',
        ),
    ),
) );

Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'background',
    'settings'    => 'cm_bg_img',
    'label'       => esc_html__( 'Background Images', 'themebase' ),
    'description' => esc_html__( 'Background image for coming soon page', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => array(
        'background-image'      => THEMEBASE_THEME_URI . '/assets/images/bg-404.jpg',
        'background-repeat'     => 'no-repeat',
        'background-size'       => 'cover',
        'background-position'   => 'center center',
    ),
    'output'      => array(
        array(
            'element' => 'body .coming-soon-container',
        ),
    ),
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'color',
    'settings'    => 'coming_subcribe_border-color',
    'label'       => esc_html__( 'Form Coming Soon Input Border Color.', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '#ffffff',
    'output'      => array(
        array(
            'element'  => '.page-coming-soon .coming-subcribe .mc4wp-form-fields input[type=email]',
            'property' => 'border-color',
        ),
    ),
) );

Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'color',
    'settings'    => 'coming_subcribe_input',
    'label'       => esc_html__( 'Form Coming Soon Input Color.', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '',
    'output'      => array(
        array(
            'element'  => '.page-coming-soon .coming-subcribe .mc4wp-form-fields input[type=email],
            .page-coming-soon .coming-subcribe .mc4wp-form-fields input[type=email]::placeholder
            ',
            'property' => 'color',
        ),
    ),
) );

Themebase_Kirki::add_field( 'theme', array(
    'type'     => 'date',
    'settings' => 'coming_soon_countdown',
    'label'    => esc_html__( 'Countdown', 'themebase' ),
    'section'  => $section,
    'priority' => $priority ++,
    'default'  => Themebase_Helper::get_coming_soon_demo_date(),
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'color',
    'settings'    => 'countdown_border_color',
    'label'       => esc_html__( 'Countdown Border Color.', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '#ffffff',
    'output'      => array(
        array(
            'element'  => '.countdown_container .countdown-section',
            'property' => 'border-color',
        ),
    ),
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'color',
    'settings'    => 'countdown_bg_color',
    'label'       => esc_html__( 'Countdown Background Color.', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '#ffffff',
    'output'      => array(
        array(
            'element'  => '.countdown_container .countdown-section',
            'property' => 'background-color',
        ),
    ),
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'color',
    'settings'    => 'countdown_number_color',
    'label'       => esc_html__( 'Countdown Number Color.', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => Themebase::PRIMARY_COLOR,
    'output'      => array(
        array(
            'element'  => '.page-template-coming-soon .coming-soon .countdown-number',
            'property' => 'color',
        ),
    ),
) );

Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'slider',
    'settings'    => 'countdown_number_font_size',
    'label'       => esc_html__( 'Countdown Number Font Size', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 50,
    'transport'   => 'auto',
    'choices'     => array(
        'min'  => 10,
        'max'  => 70,
        'step' => 1,
    ),
    'output'      => array(
        array(
            'element'  => '.page-template-coming-soon .coming-soon .countdown-number',
            'property' => 'font-size',
            'units'    => 'px',
        ),
    ),
) );

Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'color',
    'settings'    => 'countdown_label_color',
    'label'       => esc_html__( 'Countdown Label Color.', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => Themebase::PRIMARY_COLOR,
    'output'      => array(
        array(
            'element'  => '.page-template-coming-soon .coming-soon .countdown-label',
            'property' => 'color',
        ),
    ),
) );

Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'slider',
    'settings'    => 'countdown_label_font_size',
    'label'       => esc_html__( 'Countdown Label Font Size', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 20,
    'transport'   => 'auto',
    'choices'     => array(
        'min'  => 10,
        'max'  => 70,
        'step' => 1,
    ),
    'output'      => array(
        array(
            'element'  => '.page-template-coming-soon .coming-soon .countdown-label',
            'property' => 'font-size',
            'units'    => 'px',
        ),
    ),
) );
