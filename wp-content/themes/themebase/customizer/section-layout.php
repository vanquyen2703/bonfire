<?php
$section  = 'layout';
$priority = 1;
$prefix   = 'site_';
Themebase_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => $prefix . 'layout',
	'label'       => esc_html__( 'General', 'themebase' ),
	'description' => esc_html__( 'Controls the site general.', 'themebase' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'wide',
	'choices'     => array(
		'boxed' => esc_html__( 'Boxed', 'themebase' ),
		'wide'  => esc_html__( 'Wide', 'themebase' ),
	),
) );
Themebase_Kirki::add_field( 'theme', array(
	'type'        => 'dimension',
	'settings'    => $prefix . 'width',
	'label'       => esc_html__( 'Site Width', 'themebase' ),
	'description' => esc_html__( 'Controls the overall site width. Enter value including any valid CSS unit, ex: 1200px.', 'themebase' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1200px',
) );