<?php
$panel    = 'popup';
$priority = 1;
Themebase_Kirki::add_section( 'popup_newsletter', array(
	'title'    => esc_html__( 'Newsletter', 'themebase' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );
Themebase_Kirki::add_section( 'popup_account', array(
	'title'    => esc_html__( 'Account', 'themebase' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );