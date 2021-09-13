<?php
$section  = 'blog_archive';
$priority = 1;
$prefix   = 'blog_archive_';
$on = esc_html__( 'On', 'themebase' );
$off = esc_html__( 'Off', 'themebase' );
$registered_sidebars = Themebase_Helper::get_registered_sidebars();
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'select',
    'settings'    => 'blog_sidebar_left',
    'label'       => esc_html__( 'Sidebar Left', 'themebase' ),
    'description' => esc_html__( 'Select sidebar left.', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => '',
    'choices'     => $registered_sidebars,
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'select',
    'settings'    => 'blog_sidebar_right',
    'label'       => esc_html__( 'Sidebar Right', 'themebase' ),
    'description' => esc_html__( 'Select sidebar right.', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 'blog_sidebar',
    'choices'     => $registered_sidebars,
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'radio-buttonset',
    'settings'    => $prefix . 'layout',
    'label'       => esc_html__( 'Blog Layout', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 'list',
    'choices'     => array(
        'list'    => esc_html__( 'List', 'themebase' ),
        'grid'    => esc_html__( 'Grid', 'themebase' ),
        'masonry'    => esc_html__( 'Masonry', 'themebase' ),
    ),
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'radio-buttonset',
    'settings'    => $prefix . 'layout_list_style',
    'label'       => esc_html__( 'Layout Style', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 'style_1',
    'choices'     => array(
        'style_1'    => esc_html__( 'Style 1', 'themebase' ),
        'style_2'    => esc_html__( 'Style 2', 'themebase' )
    ),
    'required'  => array(
        array(
            'setting'  => 'blog_archive_layout',
            'operator' => '==',
            'value'    => 'list',
        ),
    ),
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'radio-buttonset',
    'settings'    => $prefix . 'columns_grid',
    'label'       => esc_html__( ' Number Columns', 'themebase' ),
    'description' => esc_html__( 'Select columns for blog.', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => '2',
    'choices'     => array(
        '2' => esc_html__( '2 col', 'themebase' ),
        '3' => esc_html__( '3 col', 'themebase' ),
        '4' => esc_html__( '4 col', 'themebase' ),
    ),
    'required'  => array(
        array(
            'setting'  => 'blog_archive_layout',
            'operator' => '==',
            'value'    => 'grid',
        ),
    ),
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'radio-buttonset',
    'settings'    => $prefix . 'columns_masonry',
    'label'       => esc_html__( ' Number Columns', 'themebase' ),
    'description' => esc_html__( 'Select columns for blog.', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => '2',
    'choices'     => array(
        '2' => esc_html__( '2 col', 'themebase' ),
        '3' => esc_html__( '3 col', 'themebase' ),
        '4' => esc_html__( '4 col', 'themebase' ),
    ),
    'required'  => array(
         array(
            'setting'  => 'blog_archive_layout',
            'operator' => '==',
            'value'    => 'masonry',
        ),
    ),
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'radio-buttonset',
    'settings'    => $prefix . 'meta_enable',
    'label'       => esc_html__( 'Post Meta', 'themebase' ),
    'description' => esc_html__( 'Turn on to display the meta post.', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => '1',
    'choices'     => array(
        '0' => $off,
        '1' => $on,
    ),
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'multicheck',
    'settings'    => $prefix . 'meta',
    'label'       => esc_attr__( 'Post Meta', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => array( 'date', 'author', 'comment' , 'tags' , 'categories' ),
    'choices'     => array(
        'date'        => esc_attr__( 'Date', 'themebase' ),
        'author'      => esc_attr__( 'Author', 'themebase' ),
        'comment'     => esc_attr__( 'Comment', 'themebase' ),
        'tags'        => esc_attr__( 'Tags', 'themebase' ),
        'categories'  => esc_attr__( 'Categories', 'themebase' ),
    ),
    'required'  => array(
         array(
            'setting'  => 'blog_archive_meta_enable',
            'operator' => '==',
            'value'    => 1,
        ),

        array(
            'setting'  => 'blog_archive_layout_list_style',
            'operator' => '!==',
            'value'    => 'style_2',
        ),
    ),
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'multicheck',
    'settings'    => $prefix . 'meta_list_style_2',
    'label'       => esc_attr__( 'Post Meta', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => array( 'categories','date', 'comment' ),
    'choices'     => array(
        'date'        => esc_attr__( 'Date', 'themebase' ),
        'author'      => esc_attr__( 'Author', 'themebase' ),
        'comment'     => esc_attr__( 'Comment', 'themebase' ),
        'tags'        => esc_attr__( 'Tags', 'themebase' ),
        'categories'  => esc_attr__( 'Categories', 'themebase' ),
    ),
     'required'  => array(
        array(
            'setting'  => 'blog_archive_meta_enable',
            'operator' => '==',
            'value'    => 1,
        ),
        array(
            'setting'  => 'blog_archive_layout_list_style',
            'operator' => '==',
            'value'    => 'style_2',
        ),
    ),
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'radio-buttonset',
    'settings'    => $prefix . 'desc_enable',
    'label'       => esc_html__( 'Post Description', 'themebase' ),
    'description' => esc_html__( 'Turn on to display the description post.', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => '1',
    'choices'     => array(
        '0' => $off,
        '1' => $on,
    ),
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'      => 'slider',
    'settings'  => 'limit_desc',
    'label'     => esc_html__( 'Limit characters description', 'themebase' ),
    'section'   => $section,
    'priority'  => $priority ++,
    'default'   => 300,
    'transport' => 'auto',
    'choices'   => array(
        'min'  => 30,
        'max'  => 500,
        'step' => 1,
    ),
    'required'  => array(
         array(
            'setting'  => 'blog_archive_desc_enable',
            'operator' => '==',
            'value'    => 1,
        ),
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
    'default'     => array( 'facebook', 'twitter', 'pinterest', 'gmail' ),
    'choices'     => array(
        'facebook'    => esc_attr__( 'Facebook', 'themebase' ),
        'twitter'     => esc_attr__( 'Twitter', 'themebase' ),
        'pinterest'   => esc_attr__( 'Pinterest', 'themebase' ),
        'gmail'    => esc_attr__( 'Gmail', 'themebase' ),
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
    'settings'    => $prefix . 'pagination',
    'label'       => esc_html__( 'Pagination type', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => 'number',
    'choices'     => array(
        'load_more' => esc_html__( 'Load more', 'themebase' ),
        'next_prev'   => esc_html__( 'Next/Prev', 'themebase' ),
        'number' => esc_html__( 'Number', 'themebase' ),
    ),
) );