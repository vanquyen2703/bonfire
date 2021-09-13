<?php
$panel    = 'blog';
$priority = 1;
Themebase_Kirki::add_section( 'blog_general', array(
	'title'    => esc_html__( 'General', 'themebase' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );
Themebase_Kirki::add_section( 'blog_archive', array(
	'title'    => esc_html__( 'Blog Archive', 'themebase' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );
Themebase_Kirki::add_section( 'blog_single', array(
	'title'    => esc_html__( 'Blog Single Post', 'themebase' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );