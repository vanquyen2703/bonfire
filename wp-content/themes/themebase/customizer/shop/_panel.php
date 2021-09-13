<?php
$panel    = 'shop';
$priority = 1;
Themebase_Kirki::add_section( 'general_shop', array(
	'title'    => esc_html__( 'General', 'themebase' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );
Themebase_Kirki::add_section( 'shop_archive', array(
	'title'    => esc_html__( 'Shop Archive', 'themebase' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );
Themebase_Kirki::add_section( 'shop_single', array(
	'title'    => esc_html__( 'Shop Single', 'themebase' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );
Themebase_Kirki::add_section( 'shopping_cart', array(
	'title'    => esc_html__( 'Shopping Cart', 'themebase' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );