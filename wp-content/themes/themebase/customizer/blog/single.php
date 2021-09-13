<?php
$section  = 'blog_single';
$priority = 1;
$prefix   = 'single_post_';
$on = esc_html__( 'On', 'themebase' );
$off = esc_html__( 'Off', 'themebase' );
$registered_sidebars = Themebase_Helper::get_registered_sidebars();
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'select',
    'settings'    => 'blog_single_sidebar_left',
    'label'       => esc_html__( 'Sidebar Left', 'themebase' ),
    'description' => esc_html__( 'Select sidebar left.', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => '',
    'choices'     => $registered_sidebars,
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'select',
    'settings'    => 'blog_single_sidebar_right',
    'label'       => esc_html__( 'Sidebar Right', 'themebase' ),
    'description' => esc_html__( 'Select sidebar right.', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 'blog_sidebar',
    'choices'     => $registered_sidebars,
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'multicheck',
    'settings'    => $prefix . 'meta',
    'label'       => esc_attr__( 'Post Meta', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => array( 'date', 'categories' , 'comment'),
    'choices'     => array(
        'date'        => esc_attr__( 'Date', 'themebase' ),
        'categories'  => esc_attr__( 'Categories', 'themebase' ),
        'comment'     => esc_attr__( 'Comment', 'themebase' ),
        'author'      => esc_attr__( 'Author', 'themebase' ),
    ),
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'radio-buttonset',
    'settings'    => $prefix . 'comment_enable',
    'label'       => esc_html__( 'Single comment', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => '1',
    'choices'     => array(
        '0' => $off,
        '1' => $on,
    ),
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'radio-buttonset',
    'settings'    => $prefix . 'tag_enable',
    'label'       => esc_html__( 'Show Tags', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => '1',
    'choices'     => array(
        '0' => $off,
        '1' => $on,
    ),
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'radio-buttonset',
    'settings'    => $prefix . 'description_author_enable',
    'label'       => esc_html__( 'Show author', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => '1',
    'choices'     => array(
        '0' => $off,
        '1' => $on,
    ),
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'radio-buttonset',
    'settings'    => $prefix . 'share_enable',

    'label'       => esc_html__( 'Post Sharing', 'themebase' ),
    'description' => esc_html__( 'Turn on to display the social sharing on blog single posts.', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => '0',
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
    'default'     => array( 'facebook', 'twitter', 'pinterest' ),
    'choices'     => array(
        'facebook'    => esc_attr__( 'Facebook', 'themebase' ),
        'twitter'     => esc_attr__( 'Twitter', 'themebase' ),
        'pinterest'   => esc_attr__( 'Pinterest', 'themebase' ),
        'whatsapp'    => esc_attr__( 'Whatsapp', 'themebase' ),
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
    'settings'    => 'single_post_related_enable',
    'label'       => esc_html__( 'Other news', 'themebase' ),
    'description' => esc_html__( 'Turn on to display other news post on blog single posts.', 'themebase' ),
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
    'settings' => 'other_news_title',
    'label'    => esc_html__( 'Title other news', 'themebase' ),
    'section'  => $section,
    'priority' => $priority ++,
    'default' => wp_kses( __('Other news from the Themebase:','themebase'),
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
            'setting'  => 'single_post_related_enable',
            'operator' => '==',
            'value'    => '1',
        ),
    ),
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'            => 'number',
    'settings'        => 'single_post_related_number',
    'label'           => esc_html__( 'Number of other posts item', 'themebase' ),
    'section'         => $section,
    'priority'        => $priority ++,
    'default'         => 3,
    'choices'         => array(
        'min'  => 0,
        'max'  => 50,
        'step' => 1,
    ),
    'active_callback' => array(
        array(
            'setting'  => 'single_post_related_enable',
            'operator' => '==',
            'value'    => '1',
        ),
    ),
) );