<?php
$section = 'advanced';
$priority = 1;
$prefix = 'advanced_';

Themebase_Kirki::add_field('theme', array(
    'type' => 'custom',
    'settings' => $prefix . 'group_title_' . $priority++,
    'section' => $section,
    'priority' => $priority++,
    'default' => '<div class="big_title">' . esc_html__('Go to top', 'themebase') . '</div>',
));

Themebase_Kirki::add_field('theme', array(
    'type' => 'toggle',
    'settings' => 'scroll_top_enable',
    'label' => esc_html__('Go To Top Button', 'themebase'),
    'description' => esc_html__('Turn on to show go to top button.', 'themebase'),
    'section' => $section,
    'priority' => $priority++,
    'default' => 1,
));
Themebase_Kirki::add_field('theme', array(
    'type' => 'custom',
    'settings' => $prefix . 'group_title_' . $priority++,
    'section' => $section,
    'priority' => $priority++,
    'default' => '<div class="big_title">' . esc_html__('Purchase theme', 'themebase') . '</div>',
));

Themebase_Kirki::add_field('theme', array(
    'type' => 'toggle',
    'settings' => 'purchase_theme_enable',
    'label' => esc_html__('Purchase theme Button', 'themebase'),
    'description' => esc_html__('Turn on to show purchase theme button.', 'themebase'),
    'section' => $section,
    'priority' => $priority++,
    'default' => 0,
));
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'text',
    'settings'    => 'price_theme',
    'label'       => esc_html__( 'Price Theme', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => esc_html__( '19', 'themebase' ),
    'required'  => array(
        array(
            'setting'  => 'purchase_theme_enable',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
) );
Themebase_Kirki::add_field( 'theme', array(
    'type'        => 'text',
    'settings'    => 'link_theme',
    'label'       => esc_html__( 'Link', 'themebase' ),
    'section'     => $section,
    'priority'    => $priority ++,
    'default'     => esc_html__( '', 'themebase' ),
    'required'  => array(
        array(
            'setting'  => 'purchase_theme_enable',
            'operator' => '==',
            'value'    => 1,
        ),
    ),
) );
Themebase_Kirki::add_field('theme', array(
    'type' => 'custom',
    'settings' => $prefix . 'group_title_' . $priority++,
    'section' => $section,
    'priority' => $priority++,
    'default' => '<div class="big_title">' . esc_html__('Style', 'themebase') . '</div>',
));

Themebase_Kirki::add_field('theme', array(
    'type' => 'toggle',
    'settings' => 'custom_css_enable',
    'label' => esc_html__('Custom CSS', 'themebase'),
    'description' => esc_html__('Turn on to enable custom css.', 'themebase'),
    'section' => $section,
    'priority' => $priority++,
    'default' => 1,
));

Themebase_Kirki::add_field('theme', array(
    'type' => 'code',
    'settings' => 'custom_css',
    'section' => $section,
    'priority' => $priority++,
    'default' => 'body{background-color:#fff;}',
    'choices' => array(
        'language' => 'css',
        'theme' => 'monokai',
    ),
    'transport' => 'postMessage',
    'js_vars' => array(
        array(
            'element' => '#themebase-style-inline-css',
            'function' => 'html',
        ),
    ),
));

Themebase_Kirki::add_field('theme', array(
    'type' => 'toggle',
    'settings' => 'custom_js_enable',
    'label' => esc_html__('Custom Javascript', 'themebase'),
    'description' => esc_html__('Turn on to enable custom javascript', 'themebase'),
    'section' => $section,
    'priority' => $priority++,
    'default' => 0,
));

Themebase_Kirki::add_field('theme', array(
    'type' => 'code',
    'settings' => 'custom_js',
    'section' => $section,
    'priority' => $priority++,
    'default'  => '
		(function ($) {
			"use strict";
		})(jQuery);',
	'choices'  => array(
		'language' => 'javascript',
		'theme'    => 'monokai',
	),
));