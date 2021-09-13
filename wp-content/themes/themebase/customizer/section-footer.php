<?php
$section  = 'footer';
$priority = 1;
$prefix   = 'footer_';
$link_id =Themebase::setting('choose_footer_builder');
$link = '<a target="_blank" href="edit.php?post_type=footer" class="link_edit_header_buider">Go to footer buider</a>';
$footers = Themebase_Helper::get_footer_list();
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'toggle',
    'settings'    => 'enable_footer_builder',
    'label'       => esc_html__( 'Enable Footer Builder', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 0,
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'footer_layout',
    'label'       => esc_html__( 'Footer Layout', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 'full_width',
    'choices'     => array(
        'wide' => esc_html__( 'Wide', 'themebase' ),
        'full_width'   => esc_html__( 'Full Width', 'themebase' )
    ),
    'required'  => array(
        array(
            'setting'  => 'enable_footer_builder',
            'operator' => '==',
            'value'    => 0,
        ),
    ),
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'color',
    'settings'    => 'footer_bg_color',
    'label'       => esc_html__( 'Background Color', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '#f8f8f8',
    'output'      => array(
        array(
            'element'  => '.footer-default, .list-hours ul li span:last-child',
            'property' => 'background-color',
        ),
    ),
    'required'  => array(
        array(
            'setting'  => 'enable_footer_builder',
            'operator' => '==',
            'value'    => 0,
        ),
    ),
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'color',
    'settings'    => 'footer_text_color',
    'label'       => esc_html__( 'Color text', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '',
    'output'      => array(
        array(
            'element'  => '.footer-default p, .footer-default .list-hours ul li',
            'property' => 'color',
        ),
    ),
    'required'  => array(
        array(
            'setting'  => 'enable_footer_builder',
            'operator' => '==',
            'value'    => 0,
        ),
    ),
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'color',
    'settings'    => 'footer_link_color',
    'label'       => esc_html__( 'Color link', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
    'default'     => '',
    'output'      => array(
        array(
            'element'  => '.footer-default a',
            'property' => 'color',
        ),
    ),
    'required'  => array(
        array(
            'setting'  => 'enable_footer_builder',
            'operator' => '==',
            'value'    => 0,
        ),
    ),
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'color',
    'settings'    => 'footer_link_hover_color',
    'label'       => esc_html__( 'Color link hover', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'transport'   => 'auto',
     'default'     => '',
    'output'      => array(
        array(
            'element'  => '.footer-default a:hover',
            'property' => 'color',
        ),
    ),
    'required'  => array(
        array(
            'setting'  => 'enable_footer_builder',
            'operator' => '==',
            'value'    => 0,
        ),
    ),
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'select',
    'settings'    => 'choose_footer_builder',
    'label'       => esc_html__( 'Default Footer', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'choices'     => themebase_get_footers_post_type(),
    'required'  => array(
        array(
            'setting'  => 'enable_footer_builder',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
) );
Themebase_Kirki::add_field( 'my_config', array(
    'type'     => 'custom',
    'settings' => 'link_edit_footer_buider',
    'section'     => $section,
    'priority'    => $priority ++,
    'default'  => $link,
    'required'  => array(
        array(
            'setting'  => 'enable_footer_builder',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'     => 'textarea',
    'settings' => 'footer_copyright',
    'label'    => esc_html__( 'Copyright', 'themebase' ),
    'section'  => $section,
    'priority' => $priority ++,
    'default' => wp_kses( __(' <p>Copyright &copy;2020 <a href="#">Themebase</a> - All Rights Reserved.</p>', 'themebase'),
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
    'required'  => array(
        array(
            'setting'  => 'enable_footer_builder',
            'operator' => '==',
            'value'    => 0,
        ),
    ), 
) );
