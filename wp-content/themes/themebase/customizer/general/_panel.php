<?php
$panel    = 'general';
$priority = 1;
Themebase_Kirki::add_section( 'layout-config', array(
    'title'    => esc_html__( 'Layout', 'themebase' ),
    'panel'    => $panel,
    'priority' => $priority ++,
) );
Themebase_Kirki::add_section( 'color-config', array(
	'title'    => esc_html__( 'Color', 'themebase' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );
Themebase_Kirki::add_section( 'typography-config', array(
	'title'    => esc_html__( 'Typography', 'themebase' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );
Themebase_Kirki::add_section( 'preloader-config', array(
	'title'    => esc_html__( 'Preloader', 'themebase' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );
Themebase_Kirki::add_section( 'breadcrumb-config', array(
	'title'    => esc_html__( 'Breadcrumbs & Page Title', 'themebase' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );